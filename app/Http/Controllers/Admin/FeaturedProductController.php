<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    /**
     * Display Best Sellers product management page.
     */
    public function bestSellers()
    {
        $bestSellers = Product::with(['brand', 'category', 'attributeValues'])
            ->where('is_best_seller', true)
            ->latest()
            ->get();

        $availableProducts = Product::with(['brand', 'category'])
            ->where('is_best_seller', false)
            ->where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.featured.best_sellers', compact('bestSellers', 'availableProducts'));
    }

    /**
     * Add a product to Best Sellers.
     */
    public function addBestSeller(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $currentCount = Product::where('is_best_seller', true)->count();

        if ($currentCount >= 6) {
            return redirect()->back()->with('error', 'Maximum limit reached! You can only add up to 6 products for Best Sellers.');
        }

        $product = Product::findOrFail($request->product_id);

        if ($product->is_best_seller) {
            return redirect()->back()->with('info', 'This product is already in Best Sellers.');
        }

        $product->update(['is_best_seller' => true]);

        return redirect()->back()->with('success', 'Product successfully added to Best Sellers.');
    }

    /**
     * Remove a product from Best Sellers.
     */
    public function removeBestSeller(Product $product)
    {
        $product->update(['is_best_seller' => false]);

        return redirect()->back()->with('success', 'Product removed from Best Sellers successfully.');
    }

    /**
     * Display New Arrivals product management page.
     */
    public function newArrivals()
    {
        $newArrivals = Product::with(['brand', 'category', 'attributeValues'])
            ->where('is_new_arrival', true)
            ->latest()
            ->get();

        $availableProducts = Product::with(['brand', 'category'])
            ->where('is_new_arrival', false)
            ->where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.featured.new_arrivals', compact('newArrivals', 'availableProducts'));
    }

    /**
     * Add a product to New Arrivals.
     */
    public function addNewArrival(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $currentCount = Product::where('is_new_arrival', true)->count();

        if ($currentCount >= 6) {
            return redirect()->back()->with('error', 'Maximum limit reached! You can only add up to 6 products for New Arrivals.');
        }

        $product = Product::findOrFail($request->product_id);

        if ($product->is_new_arrival) {
            return redirect()->back()->with('info', 'This product is already in New Arrivals.');
        }

        $product->update(['is_new_arrival' => true]);

        return redirect()->back()->with('success', 'Product successfully added to New Arrivals.');
    }

    /**
     * Remove a product from New Arrivals.
     */
    public function removeNewArrival(Product $product)
    {
        $product->update(['is_new_arrival' => false]);

        return redirect()->back()->with('success', 'Product removed from New Arrivals successfully.');
    }
}
