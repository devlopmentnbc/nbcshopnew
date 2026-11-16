<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SlugRedirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductDetailsController extends Controller
{
    public function show(?string $slug = null): View|RedirectResponse
    {
        $product = $this->findProduct($slug);

        // Old ?id= / ?slug= links, numeric ids, case or hyphen typos, renamed slugs -> canonical URL.
        if ($product && ($slug === null || $slug !== $product->slug || request()->hasAny(['id', 'slug']))) {
            if (filled($product->slug)) {
                return redirect()->to($product->url(), 301);
            }
        }

        abort_unless($product, 404);

        return $this->render($product->getKey());
    }

    /**
     * Resolve the product a URL refers to, or null (-> 404).
     */
    private function findProduct(?string $slug): ?Product
    {
        $identifier = $slug ?? request()->query('slug') ?? request()->query('id');

        if (! is_string($identifier) || trim($identifier) === '') {
            return null;
        }

        $product = Product::where('slug', $identifier)->first();

        if (! $product && ctype_digit($identifier)) {
            $product = Product::find((int) $identifier);
        }

        // Stray leading / trailing hyphens or different letter case (e.g. "serum-").
        if (! $product) {
            $cleaned = strtolower(trim($identifier, "- \t"));
            $product = $cleaned !== '' ? Product::where('slug', $cleaned)->first() : null;
        }

        // A slug the product used to have.
        if (! $product) {
            $product = SlugRedirect::resolve('product', $identifier);
        }

        return $product;
    }

    private function render(int $productId): View
    {
        $relations = [
            'brand',
            'category',
            'subCategory',
            'attributeValues.attribute',
            'images',
            'reviews.user',
        ];

        $product = Product::with($relations)->findOrFail($productId);

        $similarProducts = collect();

        if ($product) {
            $categoryIds = $product->allCategoryIds();

            $similarProducts = Product::with(['brand', 'category', 'attributeValues'])->withAvg('reviews', 'rating')->withCount('reviews')
                ->where('status', true)
                ->inCategory($categoryIds)
                ->when(
                    $product->brand_id,
                    fn ($query, $brandId) => $query->where('brand_id', $brandId),
                    fn ($query) => $query->whereNull('brand_id')
                )
                ->whereKeyNot($product->getKey())
                ->latest()
                ->limit(4)
                ->get();

            if ($similarProducts->count() < 4) {
                $fallbackProducts = Product::with(['brand', 'category', 'attributeValues'])->withAvg('reviews', 'rating')->withCount('reviews')
                    ->where('status', true)
                    ->inCategory($categoryIds)
                    ->whereKeyNot($product->getKey())
                    ->whereNotIn('id', $similarProducts->pluck('id'))
                    ->latest()
                    ->limit(4 - $similarProducts->count())
                    ->get();

                $similarProducts = $similarProducts->concat($fallbackProducts);
            }
        }

        return view('product-details', compact('product', 'similarProducts'));
    }
}
