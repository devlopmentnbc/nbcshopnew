<?php

namespace App\Support;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/**
 * Storefront catalog helpers: slug lookups, active-product counts and clean
 * listing URLs. Lookups are memoised per request (the tables are small).
 *
 * Listing URL scheme:
 *   /{category}                  category
 *   /{category}/{sub-category}   sub-category
 *   /brands/{brand}              brand (when no category is selected)
 *   /shop                        everything else (search, all products)
 * Secondary filters (brand on a category page, sort, search, page) stay in
 * the query string.
 */
class Catalog
{
    /** @return Collection<string, Category> keyed by slug */
    public static function categories(): Collection
    {
        return once(fn () => Category::where('status', true)->get()->keyBy('slug'));
    }

    /** @return Collection<string, SubCategory> keyed by slug, parent loaded */
    public static function subCategories(): Collection
    {
        return once(function () {
            $categories = self::categories()->keyBy('id');

            return SubCategory::where('status', true)->get()
                ->filter(fn ($sub) => $categories->has($sub->category_id))
                ->each(fn ($sub) => $sub->setRelation('category', $categories[$sub->category_id]))
                ->keyBy('slug');
        });
    }

    /** @return Collection<string, Brand> keyed by slug */
    public static function brands(): Collection
    {
        return once(fn () => Brand::where('status', true)->get()->keyBy('slug'));
    }

    public static function category($slugOrId): ?Category
    {
        return self::find(self::categories(), $slugOrId);
    }

    public static function subCategory($slugOrId): ?SubCategory
    {
        return self::find(self::subCategories(), $slugOrId);
    }

    public static function brand($slugOrId): ?Brand
    {
        return self::find(self::brands(), $slugOrId);
    }

    /**
     * Active products per brand id.
     */
    public static function brandCounts(): Collection
    {
        return once(fn () => DB::table('products')
            ->where('status', true)
            ->whereNotNull('brand_id')
            ->groupBy('brand_id')
            ->selectRaw('brand_id, COUNT(*) AS c')
            ->pluck('c', 'brand_id'));
    }

    /**
     * Active products per category id (main or additional placement).
     */
    public static function categoryCounts(): Collection
    {
        return once(fn () => self::placementCounts('category_id'));
    }

    /**
     * Active products per sub-category id (main or additional placement).
     */
    public static function subCategoryCounts(): Collection
    {
        return once(fn () => self::placementCounts('sub_category_id'));
    }

    public static function productCount(Brand|Category|SubCategory $model): int
    {
        $counts = match (true) {
            $model instanceof Brand => self::brandCounts(),
            $model instanceof Category => self::categoryCounts(),
            default => self::subCategoryCounts(),
        };

        return (int) ($counts[$model->id] ?? 0);
    }

    /**
     * Navigation data: brands, categories and their sub-categories that have
     * active products, in admin-defined order. Empty entries are hidden until
     * products are added to them.
     *
     * @return array{brands: Collection, categories: Collection}
     */
    public static function menu(): array
    {
        return once(function () {
            $subsByCategory = self::subCategories()
                ->filter(fn ($sub) => self::productCount($sub) > 0)
                ->sortBy([['sort_order', 'asc'], ['id', 'asc']])
                ->groupBy('category_id');

            $categories = self::categories()
                ->filter(fn ($c) => self::productCount($c) > 0)
                ->sortBy([['sort_order', 'asc'], ['id', 'asc']])
                ->each(function ($c) use ($subsByCategory) {
                    $c->products_count = self::productCount($c);
                    $c->setRelation('subCategories', ($subsByCategory[$c->id] ?? collect())->values());
                })
                ->values();

            $brands = self::brands()
                ->filter(fn ($b) => self::productCount($b) > 0)
                ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)
                ->values();

            return compact('brands', 'categories');
        });
    }

    /**
     * Clean listing URL for a set of filters, e.g.
     *   ['category' => 'skin-care', 'brand' => 'iris', 'sort' => 'name_asc']
     *   -> /skin-care?brand=iris&sort=name_asc
     * Returns null when a category / sub-category / brand value is unknown.
     */
    public static function listingUrl(array $filters): ?string
    {
        $filters = array_filter($filters, fn ($v) => is_scalar($v) && trim((string) $v) !== '');
        if (isset($filters['page']) && (int) $filters['page'] <= 1) {
            unset($filters['page']);
        }

        $category = isset($filters['category']) ? self::category($filters['category']) : null;
        $sub = isset($filters['sub_category']) ? self::subCategory($filters['sub_category']) : null;
        $brand = isset($filters['brand']) ? self::brand($filters['brand']) : null;

        if ((isset($filters['category']) && ! $category)
            || (isset($filters['sub_category']) && ! $sub)
            || (isset($filters['brand']) && ! $brand)) {
            return null;
        }

        // Path holds the most specific of sub-category > category > brand.
        unset($filters['category'], $filters['sub_category']);

        if ($sub) {
            return $sub->url(self::withBrand($filters, $brand));
        }
        if ($category) {
            return $category->url(self::withBrand($filters, $brand));
        }

        unset($filters['brand']);

        return $brand ? $brand->url($filters) : route('shop', $filters);
    }

    /**
     * First URL segments already used by the site, which a category slug must
     * never take (a category at /{slug} would be unreachable or hide a page).
     */
    public static function reservedSlugs(): array
    {
        $segments = collect(Route::getRoutes()->getRoutes())
            ->map(fn ($route) => explode('/', trim($route->uri(), '/'))[0])
            ->reject(fn ($segment) => $segment === '' || str_starts_with($segment, '{'));

        $publicDirs = collect(glob(public_path('*')) ?: [])->map(fn ($path) => basename($path));

        return $segments->merge($publicDirs)
            ->merge(['brands', 'shop', 'sitemap.xml', 'robots.txt', 'index.php', 'storage'])
            ->map(fn ($s) => strtolower($s))
            ->unique()
            ->values()
            ->all();
    }

    private static function withBrand(array $filters, ?Brand $brand): array
    {
        unset($filters['brand']);

        return $brand ? ['brand' => $brand->slug] + $filters : $filters;
    }

    private static function find(Collection $items, $slugOrId)
    {
        if ($slugOrId === null || $slugOrId === '') {
            return null;
        }

        return $items->get((string) $slugOrId)
            ?? (ctype_digit((string) $slugOrId) ? $items->firstWhere('id', (int) $slugOrId) : null);
    }

    private static function placementCounts(string $column): Collection
    {
        $main = DB::table('products')
            ->where('status', true)
            ->whereNotNull($column)
            ->select('id as product_id', "{$column} as target_id");

        $extra = DB::table('product_categories')
            ->join('products', 'products.id', '=', 'product_categories.product_id')
            ->where('products.status', true)
            ->whereNotNull("product_categories.{$column}")
            ->select('product_categories.product_id', "product_categories.{$column} as target_id");

        return DB::query()
            ->fromSub($main->union($extra), 'placements')
            ->groupBy('target_id')
            ->selectRaw('target_id, COUNT(DISTINCT product_id) AS c')
            ->pluck('c', 'target_id');
    }
}
