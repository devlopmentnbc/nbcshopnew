<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SlugRedirect;
use App\Models\SubCategory;
use App\Support\Catalog;
use App\Support\Seo;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * /shop - all products, or a search. Old filter URLs (?category=, ?sub_category=,
     * ?brand=) 301 to their clean URL; unknown filter values are a 404.
     */
    public function index(Request $request)
    {
        if ($request->hasAny(['category', 'sub_category', 'brand'])) {
            return $this->redirectToCleanUrl($request->query());
        }

        return $this->listing($request);
    }

    /**
     * /brands/{brand}
     */
    public function brand(Request $request, string $brand)
    {
        $model = Catalog::brand($brand);

        if (! $model || $model->slug !== $brand || $request->hasAny(['category', 'sub_category', 'brand'])) {
            return $this->redirectToCleanUrl(['brand' => $brand] + $request->except('brand'));
        }

        return $this->listing($request, brand: $model);
    }

    /**
     * /{category}
     */
    public function category(Request $request, string $category)
    {
        $model = Catalog::category($category);

        if (! $model || $model->slug !== $category || $request->hasAny(['category', 'sub_category'])) {
            return $this->redirectToCleanUrl(['category' => $category] + $request->except('category'));
        }

        return $this->listing($request, category: $model, brand: $this->queryBrand($request));
    }

    /**
     * /{category}/{subCategory}
     */
    public function subCategory(Request $request, string $category, string $subCategory)
    {
        $model = Catalog::subCategory($subCategory);

        // Unknown slug, wrong parent in the path, or stray filter params -> canonical URL.
        if (! $model || $model->slug !== $subCategory || $model->category->slug !== $category
            || $request->hasAny(['category', 'sub_category'])) {
            return $this->redirectToCleanUrl(
                ['sub_category' => $subCategory] + $request->except(['category', 'sub_category'])
            );
        }

        return $this->listing($request, subCategory: $model, brand: $this->queryBrand($request));
    }

    private function listing(Request $request, ?Category $category = null, ?SubCategory $subCategory = null, ?Brand $brand = null)
    {
        $query = Product::with(['brand', 'category', 'subCategory', 'attributeValues.attribute', 'images'])->withAvg('reviews', 'rating')->withCount('reviews')
            ->where('status', true);

        if ($brand) {
            $query->where('brand_id', $brand->id);
        }

        if ($subCategory) {
            $query->inSubCategory([$subCategory->id]);
        } elseif ($category) {
            $query->inCategory([$category->id]);
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        $sort = $request->input('sort', 'latest');
        match ($sort) {
            'name_asc' => $query->orderBy('name', 'asc'),
            'name_desc' => $query->orderBy('name', 'desc'),
            'oldest' => $query->oldest(),
            default => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();

        $activeCategory = $category ?? $subCategory?->category;

        // Sidebar: only brands / categories that have products (plus the active one).
        $brands = Catalog::brands()
            ->each(fn ($b) => $b->products_count = Catalog::productCount($b))
            ->filter(fn ($b) => $b->products_count > 0 || $b->is($brand))
            ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)
            ->values();

        $categories = Catalog::categories()
            ->each(fn ($c) => $c->products_count = Catalog::productCount($c))
            ->filter(fn ($c) => $c->products_count > 0 || $c->is($activeCategory))
            ->sortBy([['sort_order', 'asc'], ['id', 'asc']])
            ->values();

        // Current filters, used to build the sidebar links.
        $filters = array_filter([
            'category' => $category?->slug,
            'sub_category' => $subCategory?->slug,
            'brand' => $brand?->slug,
            'search' => $request->input('search'),
            'sort' => $request->input('sort'),
        ]);

        $page = $this->pageMeta($subCategory ?? $category, $brand, $request);

        return view('shop', compact(
            'products', 'brands', 'categories', 'filters',
            'activeCategory', 'subCategory', 'brand', 'page'
        ));
    }

    /**
     * Title, heading, breadcrumbs, canonical and robots for the listing page.
     */
    private function pageMeta(Category|SubCategory|null $place, ?Brand $brand, Request $request): array
    {
        $crumbs = [['label' => 'Shop', 'url' => route('shop')]];

        if ($place instanceof SubCategory) {
            $crumbs[] = ['label' => $place->category->name, 'url' => $place->category->url()];
        }

        if ($place && $brand) {
            // e.g. /skin-care?brand=iris -> "Iris Skin Care", crumb back to the category
            $crumbs[] = ['label' => $place->name, 'url' => $place->url()];
            $heading = "{$brand->name} {$place->name}";
        } else {
            $heading = $place?->name ?? $brand?->name;
        }

        $empty = ($place && Catalog::productCount($place) === 0)
            || ($brand && Catalog::productCount($brand) === 0);

        // SEO Title from admin for a plain category / sub-category / brand page;
        // combined pages (brand within a category) keep the generated title.
        $single = $place && $brand ? null : ($place ?? $brand);
        $title = match (true) {
            $single !== null && filled($single->meta_title) => $single->meta_title,
            $heading !== null => "{$heading} - Nature's Beauty Creations",
            default => 'Herbal Cosmetics Sri Lanka – Shop All Products | NBC Shop',
        };

        $description = match (true) {
            $single !== null && filled($single->meta_description) => $single->meta_description,
            $single === null && $place === null && $brand === null => \App\Support\SeoDescriptionSeed::SHOP,
            default => Seo::DEFAULT_DESCRIPTION,
        };

        // <h1>: the admin "H1 Heading" for a plain page, else the name; breadcrumbs keep the name.
        $h1 = match (true) {
            $single !== null && filled($single->h1_heading) => $single->h1_heading,
            $heading !== null => $heading,
            $request->filled('search') => 'Shop Our Products',
            default => \App\Support\SeoH1Seed::SHOP,
        };

        return [
            'title' => $title,
            'description' => $description,
            'heading' => $h1,
            'crumbs' => $crumbs,
            'current' => $heading ?? null,
            // Clean path only: brand-on-category, sort and search variations point to the main page.
            'canonical' => Seo::canonical(null, ['page']),
            // Empty listings and search results are not indexed (links are still followed).
            // Combination pages (brand within a category) are duplicates of the category page.
            'robots' => ($empty || $request->filled('search') || ($place && $brand)) ? 'noindex, follow' : 'index, follow',
        ];
    }

    /**
     * ?brand= on a category / sub-category page. Unknown brand -> 404.
     */
    private function queryBrand(Request $request): ?Brand
    {
        if (! $request->filled('brand')) {
            return null;
        }

        return Catalog::brand($request->input('brand')) ?? abort(404);
    }

    /**
     * 301 to the clean URL for these filters. A slug that no longer exists is
     * looked up in the redirect table; anything still unknown is a 404.
     */
    private function redirectToCleanUrl(array $filters)
    {
        foreach (['sub_category', 'category', 'brand'] as $key) {
            if (empty($filters[$key]) || Catalog::listingUrl([$key => $filters[$key]])) {
                continue;
            }

            $target = SlugRedirect::resolve($key, (string) $filters[$key]) ?? abort(404);

            unset($filters[$key]);
            if ($target instanceof Brand) {
                $filters['brand'] = $target->slug;
            } elseif ($target instanceof SubCategory) {
                unset($filters['category']);
                $filters['sub_category'] = $target->slug;
            } else {
                unset($filters['sub_category']);
                $filters['category'] = $target->slug;
            }
        }

        $url = Catalog::listingUrl($filters) ?? abort(404);

        // Never redirect to the URL we are already on.
        if ($url === request()->fullUrl()) {
            abort(404);
        }

        return redirect()->to($url, 301);
    }

    /**
     * AJAX Live Search endpoint for header search popup.
     */
    public function liveSearch(Request $request)
    {
        $queryStr = trim($request->input('q', ''));
        if (strlen($queryStr) < 2) {
            return response()->json([
                'status' => 'success',
                'query' => $queryStr,
                'count' => 0,
                'products' => [],
            ]);
        }

        $matches = Product::where('status', true)
            ->where(function ($q) use ($queryStr) {
                $q->where('name', 'like', "%{$queryStr}%")
                  ->orWhere('description', 'like', "%{$queryStr}%")
                  ->orWhere('sku', 'like', "%{$queryStr}%");
            });

        $total = (clone $matches)->count();

        // The popup scrolls, so show a generous batch; anything beyond it is reachable via "View all".
        $products = $matches->with(['category', 'brand', 'attributeValues'])
            ->take(30)
            ->get();

        $results = $products->map(function ($product) {
            $pricing = $product->pricingSummary();
            $image = $product->image ? asset($product->image) : asset('assets/images/nbc/logo-nbc2.png');

            return [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $image,
                'category' => $product->category->name ?? null,
                'brand' => $product->brand->name ?? null,
                'url' => $product->url(),
                'price_formatted' => $pricing['price_formatted'] ?? ('LKR ' . number_format($product->price_lkr ?? 0, 2)),
                'regular_formatted' => $pricing['regular_formatted'] ?? null,
                'has_sale' => $pricing['has_sale'] ?? false,
            ];
        });

        return response()->json([
            'status' => 'success',
            'query' => $queryStr,
            'count' => $total,
            'products' => $results,
            'view_all_url' => route('shop', ['search' => $queryStr]),
        ]);
    }
}
