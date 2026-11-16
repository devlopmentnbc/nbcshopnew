<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use App\Support\HomeStorySections;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $banners = Banner::where('status', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $bestSellers = Product::with(['brand', 'category', 'attributeValues'])->withAvg('reviews', 'rating')->withCount('reviews')
            ->where('status', true)
            ->where('is_best_seller', true)
            ->latest()
            ->take(12)
            ->get();

        if ($bestSellers->isEmpty()) {
            $bestSellers = Product::with(['brand', 'category', 'attributeValues'])->withAvg('reviews', 'rating')->withCount('reviews')
                ->where('status', true)
                ->latest()
                ->take(12)
                ->get();
        }

        $newArrivals = Product::with(['brand', 'category', 'attributeValues'])->withAvg('reviews', 'rating')->withCount('reviews')
            ->where('status', true)
            ->where('is_new_arrival', true)
            ->latest()
            ->take(12)
            ->get();

        if ($newArrivals->isEmpty()) {
            $newArrivals = Product::with(['brand', 'category', 'attributeValues'])->withAvg('reviews', 'rating')->withCount('reviews')
                ->where('status', true)
                ->latest()
                ->take(12)
                ->get();
        }

        // Selected in Admin > Featured > On Sale (max 4).
        $saleProducts = Product::with(['brand', 'category', 'attributeValues'])->withAvg('reviews', 'rating')->withCount('reviews')
            ->where('status', true)
            ->where('is_on_sale', true)
            ->latest()
            ->take(4)
            ->get();

        $featuredPromotion = null;

        if (Schema::hasTable('promotions')) {
            $featuredPromotion = Promotion::currentlyActive()
                ->with(['productTarget', 'brandTarget', 'categoryTarget', 'subCategoryTarget'])
                ->latest('starts_at')
                ->first();
        }

        // Only brands / categories with active products (empty ones are hidden until stocked).
        $brands = \App\Support\Catalog::brands()
            ->each(fn ($brand) => $brand->products_count = \App\Support\Catalog::productCount($brand))
            ->filter(fn ($brand) => $brand->products_count > 0)
            ->sortByDesc('products_count')
            ->values();

        $categories = \App\Support\Catalog::menu()['categories'];

        return view('home', [
            'storySections' => HomeStorySections::forHome(),
            'banners' => $banners,
            'bestSellers' => $bestSellers,
            'newArrivals' => $newArrivals,
            'saleProducts' => $saleProducts,
            'featuredPromotion' => $featuredPromotion,
            'featuredPromotionUrl' => $featuredPromotion
                ? $this->promotionUrl($featuredPromotion)
                : route('shop'),
            'brands' => $brands,
            'brandsBackgroundUrl' => \App\Http\Controllers\Admin\HomeBrandsSettingController::backgroundUrl(),
            'categories' => $categories,
        ]);
    }


    private function promotionUrl(Promotion $promotion): string
    {
        // Link straight to the clean URL; fall back to /shop if the target is gone or inactive.
        $target = match ($promotion->target_type) {
            'product' => $promotion->productTarget,
            'brand' => $promotion->brandTarget,
            'category' => $promotion->categoryTarget,
            'sub_category' => $promotion->subCategoryTarget,
            default => null,
        };

        if (! $target || ! $target->status) {
            return route('shop');
        }

        if ($target instanceof \App\Models\SubCategory && ! $target->category?->status) {
            return route('shop');
        }

        return $target->url();
    }
}
