<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Promotion;
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

        $bestSellers = Product::with(['brand', 'category', 'attributeValues'])
            ->where('status', true)
            ->where('is_best_seller', true)
            ->latest()
            ->take(6)
            ->get();

        if ($bestSellers->isEmpty()) {
            $bestSellers = Product::with(['brand', 'category', 'attributeValues'])
                ->where('status', true)
                ->latest()
                ->take(6)
                ->get();
        }

        $newArrivals = Product::with(['brand', 'category', 'attributeValues'])
            ->where('status', true)
            ->where('is_new_arrival', true)
            ->latest()
            ->take(6)
            ->get();

        if ($newArrivals->isEmpty()) {
            $newArrivals = Product::with(['brand', 'category', 'attributeValues'])
                ->where('status', true)
                ->latest()
                ->take(6)
                ->get();
        }

        $featuredPromotion = null;

        if (Schema::hasTable('promotions')) {
            $featuredPromotion = Promotion::currentlyActive()
                ->with(['productTarget', 'brandTarget', 'categoryTarget', 'subCategoryTarget'])
                ->latest('starts_at')
                ->first();
        }

        $brands = Brand::where('status', true)
            ->withCount('products')
            ->orderByDesc('products_count')
            ->get();

        return view('home', [
            'banners' => $banners,
            'bestSellers' => $bestSellers,
            'newArrivals' => $newArrivals,
            'featuredPromotion' => $featuredPromotion,
            'featuredPromotionUrl' => $featuredPromotion
                ? $this->promotionUrl($featuredPromotion)
                : route('shop'),
            'brands' => $brands,
        ]);
    }


    private function promotionUrl(Promotion $promotion): string
    {
        return match ($promotion->target_type) {
            'product' => route('product.details', [
                'slug' => $promotion->productTarget?->slug ?? $promotion->target_id,
            ]),
            'brand' => route('shop', [
                'brand' => $promotion->brandTarget?->slug ?? $promotion->target_id,
            ]),
            'category' => route('shop', [
                'category' => $promotion->categoryTarget?->slug ?? $promotion->target_id,
            ]),
            'sub_category' => route('shop', [
                'sub_category' => $promotion->subCategoryTarget?->slug ?? $promotion->target_id,
            ]),
            default => route('shop'),
        };
    }
}
