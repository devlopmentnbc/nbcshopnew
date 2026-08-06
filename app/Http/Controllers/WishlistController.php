<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function getItems()
    {
        if (!Auth::check()) {
            return response()->json([
                'authenticated' => false,
                'count' => 0,
                'items' => [],
                'details' => [],
            ]);
        }

        $wishlists = Auth::user()->wishlists()->with('product')->get();

        $items = [];
        $details = [];

        foreach ($wishlists as $w) {
            $key = $w->product_id ? (string) $w->product_id : (string) $w->product_key;
            $items[] = $key;

            $name = 'Product #' . $key;
            $image = asset('admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png');
            $price = 'LKR 0.00';
            $sku = '#' . $key;
            $url = route('shop');

            if ($w->product) {
                $name = $w->product->name;
                $image = $w->product->image ? asset($w->product->image) : $image;
                $price = $w->product->formattedPrice();
                $sku = $w->product->sku ?: ('#' . $w->product->id);
                $url = route('product.details', ['product' => $w->product->slug ?? $w->product->id]);
            } else if ($w->product_key) {
                // Try to find matching Product by slug or id
                $prod = Product::where('slug', $w->product_key)
                    ->orWhere('id', $w->product_key)
                    ->first();

                if ($prod) {
                    $name = $prod->name;
                    $image = $prod->image ? asset($prod->image) : $image;
                    $price = $prod->formattedPrice();
                    $sku = $prod->sku ?: ('#' . $prod->id);
                    $url = route('product.details', ['product' => $prod->slug ?? $prod->id]);
                } else {
                    $name = ucwords(str_replace(['-', '_'], ' ', $w->product_key));
                    $sku = '#' . strtoupper(substr(md5($w->product_key), 0, 6));

                    if (str_contains(strtolower($w->product_key), 'dandruff')) {
                        $image = asset('admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png');
                        $price = 'LKR 450.00';
                    } else if (str_contains(strtolower($w->product_key), 'cucumber')) {
                        $image = asset('admin-assets/images/nbcimages/Brand Pics 2/cucumber facial wash.png');
                        $price = 'LKR 380.00';
                    } else if (str_contains(strtolower($w->product_key), 'oil')) {
                        $image = asset('admin-assets/images/nbcimages/Brand Pics 2/Hair oil 1.png');
                        $price = 'LKR 620.00';
                    }
                }
            }

            $details[] = [
                'id' => $w->id,
                'key' => $key,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'sku' => $sku,
                'url' => $url,
            ];
        }

        return response()->json([
            'authenticated' => true,
            'count' => count($items),
            'items' => $items,
            'details' => $details,
        ]);
    }

    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'authenticated' => false,
                'message' => 'Please sign in to add items to your wishlist.',
            ], 401);
        }

        $userId = Auth::id();
        $productId = $request->input('product_id');
        $productKey = $request->input('product_key');

        if (!$productId && !$productKey) {
            return response()->json([
                'authenticated' => true,
                'message' => 'Invalid product reference.',
            ], 400);
        }

        $query = Wishlist::where('user_id', $userId);
        if ($productId) {
            $query->where('product_id', $productId);
        } else {
            $query->where(function($q) use ($productId, $productKey) {
                if ($productId) {
                    $q->where('product_id', $productId);
                }
                if ($productKey) {
                    $q->orWhere('product_key', $productKey);
                }
            });
        }

        $existing = $query->first();

        if ($existing) {
            $existing->delete();
            $added = false;
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId ?: null,
                'product_key' => $productKey ?: null,
            ]);
            $added = true;
        }

        $count = Wishlist::where('user_id', $userId)->count();

        return response()->json([
            'authenticated' => true,
            'added' => $added,
            'count' => $count,
            'message' => $added ? 'Product added to your wishlist.' : 'Product removed from your wishlist.',
        ]);
    }
}
