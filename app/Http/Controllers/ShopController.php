<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['brand', 'category', 'subCategory', 'attributeValues.attribute', 'images'])
            ->where('status', true);

        // Filter by Brand
        if ($request->filled('brand')) {
            $brandSlug = $request->input('brand');
            $query->whereHas('brand', function ($q) use ($brandSlug) {
                $q->where('slug', $brandSlug)->orWhere('id', $brandSlug);
            });
        }

        // Filter by Category
        if ($request->filled('category')) {
            $catSlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($catSlug) {
                $q->where('slug', $catSlug)->orWhere('id', $catSlug);
            });
        }

        // Filter by SubCategory
        if ($request->filled('sub_category')) {
            $subSlug = $request->input('sub_category');
            $query->whereHas('subCategory', function ($q) use ($subSlug) {
                $q->where('slug', $subSlug)->orWhere('id', $subSlug);
            });
        }

        // Filter by Search Query
        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sort = $request->input('sort', 'latest');
        match ($sort) {
            'name_asc' => $query->orderBy('name', 'asc'),
            'name_desc' => $query->orderBy('name', 'desc'),
            'oldest' => $query->oldest(),
            default => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();

        $brands = Brand::withCount(['products' => function($q) {
            $q->where('status', true);
        }])->get();

        $categories = Category::withCount(['products' => function($q) {
            $q->where('status', true);
        }])->get();

        return view('shop', compact('products', 'brands', 'categories'));
    }
}
