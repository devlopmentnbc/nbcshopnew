<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CategoryListController extends Controller
{
    /**
     * Storefront page listing every active category; each links to the shop filtered by it.
     */
    public function index(): View
    {
        $categories = Category::where('status', true)
            ->with(['subCategories' => fn ($q) => $q->where('status', true)->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->each(function ($category) {
                // Count products listed under the category as main or additional category.
                $category->products_count = Product::where('status', true)->inCategory($category->id)->count();
            });

        return view('categories', compact('categories'));
    }
}
