<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Get cart contents & summary JSON
     */
    public function getCart(Request $request)
    {
        $cart = session()->get('cart', []);
        
        // Filter out expired cart items (> 7 days)
        $now = now()->timestamp;
        $cleanedCart = [];
        $totalItems = 0;
        $subtotalLkr = 0;
        $subtotalUsd = 0;

        foreach ($cart as $key => $item) {
            if (isset($item['expires_at']) && $item['expires_at'] < $now) {
                continue;
            }
            $cleanedCart[$key] = $item;
            $totalItems += $item['quantity'];
            $subtotalLkr += ($item['price_lkr'] ?? 0) * $item['quantity'];
            $subtotalUsd += ($item['price_usd'] ?? 0) * $item['quantity'];
        }

        if (count($cleanedCart) !== count($cart)) {
            session()->put('cart', $cleanedCart);
        }

        $userCountry = session('country_code', 'LK');
        $currency = session('currency', 'LKR');

        $shippingService = new \App\Services\ShippingService();
        $shippingCost = $shippingService->calculateShipping(
            destinationCountry: $userCountry,
            currency: $currency,
            subtotal: ($currency === 'USD' ? $subtotalUsd : $subtotalLkr)
        );

        $formattedShipping = $currency === 'USD'
            ? '$' . number_format($shippingCost, 2)
            : 'LKR ' . number_format($shippingCost, 2);

        $subtotalDisplay = $currency === 'USD' ? $subtotalUsd : $subtotalLkr;
        $formattedSubtotal = $currency === 'USD'
            ? '$' . number_format($subtotalUsd, 2)
            : 'LKR ' . number_format($subtotalLkr, 2);

        $finalTotalRaw = $subtotalDisplay + $shippingCost;
        $formattedFinalTotal = $currency === 'USD'
            ? '$' . number_format($finalTotalRaw, 2)
            : 'LKR ' . number_format($finalTotalRaw, 2);

        return response()->json([
            'status' => 'success',
            'cart' => array_values($cleanedCart),
            'currency' => $currency,
            'total_items' => $totalItems,
            'subtotal_lkr' => number_format($subtotalLkr, 2),
            'subtotal_usd' => number_format($subtotalUsd, 2),
            'shipping_cost' => $shippingCost,
            'formatted_shipping' => $formattedShipping,
            'formatted_subtotal' => $formattedSubtotal,
            'formatted_final_total' => $formattedFinalTotal,
            'subtotal_lkr_raw' => $subtotalLkr,
            'formatted_subtotal_lkr' => 'LKR ' . number_format($subtotalLkr, 2),
        ]);
    }

    /**
     * Add product to session cart (persists for 7 days)
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'attributes' => 'nullable|array',
        ]);

        $productId = $request->input('product_id');
        $quantity = (int) $request->input('quantity', 1);
        $selectedAttrs = $request->input('attributes', []);

        $product = Product::with(['attributeValues', 'images'])->findOrFail($productId);

        $cart = session()->get('cart', []);

        // Unique cart key (product_id + attributes)
        $cartKey = (string) $productId;
        if (!empty($selectedAttrs)) {
            ksort($selectedAttrs);
            $cartKey .= '-' . md5(json_encode($selectedAttrs));
        }

        // Calculate prices from variants/pivot
        $pricesLkr = $product->attributeValues->map(function ($val) {
            return $val->pivot->sale_price_lkr ?: $val->pivot->price_lkr;
        })->filter(fn($p) => $p > 0);
        $priceLkr = $pricesLkr->isNotEmpty() ? (float) $pricesLkr->min() : 0.0;

        $pricesUsd = $product->attributeValues->map(function ($val) {
            return $val->pivot->sale_price_usd ?: $val->pivot->price_usd;
        })->filter(fn($p) => $p > 0);
        $priceUsd = $pricesUsd->isNotEmpty() ? (float) $pricesUsd->min() : 0.0;

        // Image URL
        $imageUrl = $product->image ? asset($product->image) : asset('assets/images/product-img/electronics/electronics-bg-trans-10-a-1-hover.webp');

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'key' => $cartKey,
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'url' => route('product.details', $product->slug ?: $product->id),
                'image' => $imageUrl,
                'price_lkr' => (float) $priceLkr,
                'price_usd' => (float) $priceUsd,
                'formatted_price_lkr' => 'LKR ' . number_format($priceLkr, 2),
                'quantity' => $quantity,
                'attributes' => $selectedAttrs,
                'added_at' => now()->timestamp,
                'expires_at' => now()->addDays(7)->timestamp,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully!',
            'cart_data' => $this->getCart($request)->getData(),
        ]);
    }

    /**
     * Update item quantity in session cart
     */
    public function update(Request $request)
    {
        $request->validate([
            'cart_key' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartKey = $request->input('cart_key');
        $quantity = (int) $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Cart updated successfully!',
            'cart_data' => $this->getCart($request)->getData(),
        ]);
    }

    /**
     * Remove item from session cart
     */
    public function remove(Request $request)
    {
        $request->validate([
            'cart_key' => 'required|string',
        ]);

        $cartKey = $request->input('cart_key');
        $cart = session()->get('cart', []);

        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Item removed from cart!',
            'cart_data' => $this->getCart($request)->getData(),
        ]);
    }

    /**
     * Clear session cart
     */
    public function clear(Request $request)
    {
        session()->forget('cart');
        return response()->json([
            'status' => 'success',
            'message' => 'Cart cleared!',
            'cart_data' => $this->getCart($request)->getData(),
        ]);
    }
}
