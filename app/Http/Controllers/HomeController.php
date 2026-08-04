<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredPromotion = null;

        if (Schema::hasTable('promotions')) {
            $featuredPromotion = Promotion::currentlyActive()
                ->with(['productTarget', 'brandTarget', 'categoryTarget', 'subCategoryTarget'])
                ->latest('starts_at')
                ->first();
        }

        return view('home', [
            'featuredPromotion' => $featuredPromotion,
            'featuredPromotionUrl' => $featuredPromotion
                ? $this->promotionUrl($featuredPromotion)
                : route('shop'),
        ]);
    }

    private function promotionUrl(Promotion $promotion): string
    {
        return match ($promotion->target_type) {
            'product' => route('product.details', [
                'product' => $promotion->productTarget?->slug ?? $promotion->target_id,
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
