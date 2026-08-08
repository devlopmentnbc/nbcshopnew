<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductDetailsController extends Controller
{
    public function show(?string $slug = null): View
    {
        $identifier = $slug ?? request()->query('slug') ?? request()->query('id');
        $relations = [
            'brand',
            'category',
            'subCategory',
            'attributeValues.attribute',
            'images',
            'reviews.user',
        ];

        $product = null;

        if ($identifier) {
            $product = Product::with($relations)
                ->where(function ($query) use ($identifier) {
                    $query->where('slug', $identifier);

                    if (is_numeric($identifier)) {
                        $query->orWhere('id', (int) $identifier);
                    }
                })
                ->first();
        }

        if (!$product) {
            $product = Product::with($relations)
                ->where('status', true)
                ->latest()
                ->first();
        }

        $similarProducts = collect();

        if ($product) {
            $similarProducts = Product::with(['brand', 'category', 'attributeValues'])
                ->where('status', true)
                ->where('category_id', $product->category_id)
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
                $fallbackProducts = Product::with(['brand', 'category', 'attributeValues'])
                    ->where('status', true)
                    ->where('category_id', $product->category_id)
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
