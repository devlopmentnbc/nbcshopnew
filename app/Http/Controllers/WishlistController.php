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
                'count'         => 0,
                'items'         => [],
                'details'       => [],
            ]);
        }

        $wishlists = Auth::user()->wishlists()->get();

        $items   = [];
        $details = [];

        $defaultImage = asset('assets/images/nbc/Nature\'s Secret/nature-secrets-logo.png');

        foreach ($wishlists as $w) {
            // The key we use to match heart-button state on product cards
            $key = $w->product_id
                ? (string) $w->product_id
                : (string) $w->product_key;

            $items[] = $key;

            // ---------- resolve product ----------
            $prod = null;

            if ($w->product_id) {
                $prod = Product::find($w->product_id);
            }

            if (!$prod && $w->product_key) {
                $prod = Product::where('slug', $w->product_key)
                    ->orWhere('id', is_numeric($w->product_key) ? (int) $w->product_key : null)
                    ->first();
            }

            // ---------- build detail entry ----------
            if ($prod) {
                // Resolve image URL — products stored in public/uploads/products/
                $imageUrl = $prod->image
                    ? asset($prod->image)
                    : $defaultImage;

                $details[] = [
                    'id'    => $w->id,
                    'key'   => $key,
                    'name'  => $prod->name,
                    'image' => $imageUrl,
                    'price' => method_exists($prod, 'formattedPrice')
                        ? $prod->formattedPrice()
                        : 'LKR ' . number_format($prod->price ?? 0, 2),
                    'sku'   => $prod->sku ?: ('#' . $prod->id),
                    'url'   => route('product.details', ['slug' => $prod->slug ?? $prod->id]),
                ];
            } else {
                // Wishlist entry with no matching product in DB
                $details[] = [
                    'id'    => $w->id,
                    'key'   => $key,
                    'name'  => $w->product_key
                        ? ucwords(str_replace(['-', '_'], ' ', $w->product_key))
                        : 'Product #' . $key,
                    'image' => $defaultImage,
                    'price' => '—',
                    'sku'   => '#' . strtoupper(substr(md5($key), 0, 6)),
                    'url'   => route('shop'),
                ];
            }
        }

        return response()->json([
            'authenticated' => true,
            'count'         => count($items),
            'items'         => $items,
            'details'       => $details,
        ]);
    }

    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'authenticated' => false,
                'message'       => 'Please sign in to add items to your wishlist.',
            ], 401);
        }

        $userId    = Auth::id();
        $productId = $request->input('product_id');
        $productKey = $request->input('product_key');

        if (!$productId && !$productKey) {
            return response()->json([
                'authenticated' => true,
                'message'       => 'Invalid product reference.',
            ], 400);
        }

        // If productKey looks numeric, try treating it as product_id
        if (!$productId && $productKey && is_numeric($productKey)) {
            $productId  = (int) $productKey;
            $productKey = null;
        }

        $query = Wishlist::where('user_id', $userId);

        if ($productId) {
            $query->where(function ($q) use ($productId, $productKey) {
                $q->where('product_id', $productId);
                if ($productKey) {
                    $q->orWhere('product_key', $productKey);
                }
            });
        } else {
            $query->where('product_key', $productKey);
        }

        $existing = $query->first();

        if ($existing) {
            $existing->delete();
            $added = false;
        } else {
            Wishlist::create([
                'user_id'     => $userId,
                'product_id'  => $productId ?: null,
                'product_key' => $productKey ?: null,
            ]);
            $added = true;
        }

        $count = Wishlist::where('user_id', $userId)->count();

        return response()->json([
            'authenticated' => true,
            'added'         => $added,
            'count'         => $count,
            'message'       => $added
                ? 'Product added to your wishlist.'
                : 'Product removed from your wishlist.',
        ]);
    }
}
