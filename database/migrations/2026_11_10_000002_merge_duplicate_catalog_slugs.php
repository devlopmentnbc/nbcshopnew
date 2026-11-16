<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * SEO audit clean-up of duplicate / misspelt catalog entries.
 *
 * Every step is guarded: an entry is only removed when it still has no
 * products (main or additional placement) and no promotion targets it, and
 * only when the entry it merges into exists. Its old slug is kept as a 301.
 */
return new class extends Migration
{
    public function up(): void
    {
        // natures-secret (empty, misspelt) -> natures-secrets
        $this->mergeEmpty('brand', 'brands', 'natures-secret', 'natures-secrets');

        // bundles -> gift-sets (slug rename only; the display name is unchanged)
        $bundles = DB::table('categories')->where('slug', 'bundles')->first();
        if ($bundles && ! DB::table('categories')->where('slug', 'gift-sets')->exists()) {
            DB::table('categories')->where('id', $bundles->id)->update(['slug' => 'gift-sets', 'updated_at' => now()]);
            $this->redirect('category', 'bundles', $bundles->id);
        }

        // gifts (empty duplicate of Bundles) -> gift-sets
        $this->mergeEmpty('category', 'categories', 'gifts', 'gift-sets');

        // anti-acneanti-blemish (empty, overlaps Acne-Prone) -> acne-prone
        $this->mergeEmpty('sub_category', 'sub_categories', 'anti-acneanti-blemish', 'acne-prone');
    }

    public function down(): void
    {
        // Data clean-up is not reversed (deleted rows were empty).
        $bundles = DB::table('slug_redirects')->where(['type' => 'category', 'old_slug' => 'bundles'])->first();
        if ($bundles && ! DB::table('categories')->where('slug', 'bundles')->exists()) {
            DB::table('categories')->where('id', $bundles->target_id)->update(['slug' => 'bundles']);
            DB::table('slug_redirects')->where('id', $bundles->id)->delete();
        }
    }

    private function mergeEmpty(string $type, string $table, string $fromSlug, string $toSlug): void
    {
        $from = DB::table($table)->where('slug', $fromSlug)->first();
        $to = DB::table($table)->where('slug', $toSlug)->first();

        if (! $from || ! $to || ! $this->isEmpty($type, $from->id)) {
            return;
        }

        DB::transaction(function () use ($type, $table, $from, $to, $fromSlug) {
            // Move any redirects that pointed at the removed row to the new target.
            DB::table('slug_redirects')->where('target_type', $type)->where('target_id', $from->id)
                ->update(['target_id' => $to->id]);
            $this->redirect($type, $fromSlug, $to->id);

            if ($type === 'category') {
                // Its (empty) sub-categories go with it; keep their URLs working too.
                foreach (DB::table('sub_categories')->where('category_id', $from->id)->get() as $sub) {
                    $this->redirect('sub_category', $sub->slug, $to->id, 'category');
                }
            }

            DB::table($table)->where('id', $from->id)->delete();
        });
    }

    private function isEmpty(string $type, int $id): bool
    {
        $promoted = DB::table('promotions')->where('target_type', $type)->where('target_id', $id)->exists();

        $hasProducts = match ($type) {
            'brand' => DB::table('products')->where('brand_id', $id)->exists(),
            'category' => DB::table('products')->where('category_id', $id)->exists()
                || DB::table('product_categories')->where('category_id', $id)->exists()
                // a promotion on one of its sub-categories would be lost by the cascade
                || DB::table('promotions')->where('target_type', 'sub_category')
                    ->whereIn('target_id', DB::table('sub_categories')->where('category_id', $id)->pluck('id'))->exists(),
            'sub_category' => DB::table('products')->where('sub_category_id', $id)->exists()
                || DB::table('product_categories')->where('sub_category_id', $id)->exists(),
        };

        return ! $promoted && ! $hasProducts;
    }

    /**
     * $targetType lets a removed sub-category redirect to a category page.
     */
    private function redirect(string $type, string $oldSlug, int $targetId, ?string $targetType = null): void
    {
        DB::table('slug_redirects')->updateOrInsert(
            ['type' => $type, 'old_slug' => $oldSlug],
            ['target_type' => $targetType ?? $type, 'target_id' => $targetId, 'created_at' => now(), 'updated_at' => now()]
        );
    }
};
