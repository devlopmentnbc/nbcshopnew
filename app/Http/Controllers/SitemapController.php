<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Support\Catalog;
use App\Support\Seo;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * XML sitemaps, generated live from the catalog:
 *   /sitemap.xml             index of the three files below
 *   /sitemap-pages.xml       home, /shop, /categories
 *   /sitemap-categories.xml  categories, sub-categories and brands that have active products
 *   /sitemap-products.xml    active products, each with its images
 *
 * Only clean canonical URLs are listed (no search, sort, filter, page=1 or
 * tracking variants). <lastmod> is the real last change; no <priority> /
 * <changefreq> (Google ignores them).
 */
class SitemapController extends Controller
{
    private const FILES = ['sitemap-pages.xml', 'sitemap-categories.xml', 'sitemap-products.xml'];

    public function index(): Response
    {
        $lastmods = [
            'sitemap-pages.xml' => $this->latestProductUpdate(),
            'sitemap-categories.xml' => collect($this->listingUrls())->max('lastmod'),
            'sitemap-products.xml' => $this->latestProductUpdate(),
        ];

        $sitemaps = collect(self::FILES)->map(fn ($file) => [
            'loc' => Seo::canonical($file),
            'lastmod' => $lastmods[$file],
        ]);

        return $this->xml('sitemaps.index', ['sitemaps' => $sitemaps]);
    }

    public function pages(): Response
    {
        $latest = $this->latestProductUpdate();

        $urls = collect(['/', 'shop', 'categories'])->map(fn ($path) => [
            'loc' => Seo::canonical($path),
            'lastmod' => $latest,
            'images' => [],
        ]);

        return $this->xml('sitemaps.urlset', ['urls' => $urls]);
    }

    public function categories(): Response
    {
        return $this->xml('sitemaps.urlset', ['urls' => collect($this->listingUrls())]);
    }

    public function products(): Response
    {
        $urls = Product::query()
            ->where('status', true)
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->with(['images:id,product_id,image_path,sort_order'])
            ->orderBy('id')
            ->get(['id', 'slug', 'image', 'updated_at'])
            ->map(fn ($product) => [
                'loc' => Seo::canonical('product-details/' . $product->slug),
                'lastmod' => $product->updated_at,
                'images' => collect([$product->image])
                    ->merge($product->images->pluck('image_path'))
                    ->filter()
                    ->unique()
                    ->map(fn ($path) => Seo::canonical(implode('/', array_map('rawurlencode', explode('/', ltrim($path, '/'))))))
                    ->values()
                    ->all(),
            ]);

        return $this->xml('sitemaps.urlset', ['urls' => $urls]);
    }

    /**
     * Category, sub-category and brand pages with at least one active product.
     * lastmod = the later of the listing's own edit and its newest product edit.
     */
    private function listingUrls(): array
    {
        return once(function () {
            $newest = [
                'category_id' => $this->newestProductPer('category_id'),
                'sub_category_id' => $this->newestProductPer('sub_category_id'),
                'brand_id' => $this->newestProductPer('brand_id'),
            ];

            $row = fn ($model, string $key) => [
                'loc' => Seo::canonical(parse_url($model->url(), PHP_URL_PATH)),
                'lastmod' => collect([$model->updated_at, $newest[$key][$model->id] ?? null])->filter()->max(),
                'images' => [],
            ];

            return collect()
                ->merge(Catalog::categories()->filter(fn ($c) => Catalog::productCount($c) > 0)->map(fn ($c) => $row($c, 'category_id')))
                ->merge(Catalog::subCategories()->filter(fn ($s) => Catalog::productCount($s) > 0)->map(fn ($s) => $row($s, 'sub_category_id')))
                ->merge(Catalog::brands()->filter(fn ($b) => Catalog::productCount($b) > 0)->map(fn ($b) => $row($b, 'brand_id')))
                ->values()
                ->all();
        });
    }

    /**
     * Newest active-product updated_at per category / sub-category / brand id,
     * counting additional category placements too.
     *
     * @return Collection<int, Carbon>
     */
    private function newestProductPer(string $column): Collection
    {
        $main = DB::table('products')
            ->where('status', true)
            ->whereNotNull($column)
            ->select(["{$column} as target_id", 'updated_at']);

        if ($column !== 'brand_id') {
            $main->union(
                DB::table('product_categories')
                    ->join('products', 'products.id', '=', 'product_categories.product_id')
                    ->where('products.status', true)
                    ->whereNotNull("product_categories.{$column}")
                    ->select(["product_categories.{$column} as target_id", 'products.updated_at'])
            );
        }

        return DB::query()->fromSub($main, 'p')
            ->groupBy('target_id')
            ->selectRaw('target_id, MAX(updated_at) AS lastmod')
            ->pluck('lastmod', 'target_id')
            ->map(fn ($date) => Carbon::parse($date));
    }

    private function latestProductUpdate(): ?Carbon
    {
        $date = DB::table('products')->where('status', true)->max('updated_at');

        return $date ? Carbon::parse($date) : null;
    }

    private function xml(string $view, array $data): Response
    {
        return response(view($view, $data)->render(), 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
