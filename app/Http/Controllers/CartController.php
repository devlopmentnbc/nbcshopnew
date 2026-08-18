<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Product + variant data for the "Add to Cart" picker modal used on
     * listing pages (home/shop cards), which have no inline variant picker.
     */
    public function productModalData(Product $product)
    {
        $product->load('attributeValues.attribute');

        $currency = session('currency', 'LKR');
        $symbol = $currency === 'USD' ? '$' : 'LKR ';

        $variants = $product->attributeValues->map(function ($val) use ($currency, $symbol) {
            $regular = (float) ($currency === 'USD' ? $val->pivot->price_usd : $val->pivot->price_lkr);
            $saleRaw = $currency === 'USD' ? $val->pivot->sale_price_usd : $val->pivot->sale_price_lkr;
            $hasSale = $saleRaw && (float) $saleRaw > 0 && (float) $saleRaw < $regular;
            $sale = $hasSale ? (float) $saleRaw : null;
            $discountPercent = $hasSale && $regular > 0 ? (int) round((1 - ($sale / $regular)) * 100) : 0;

            return [
                'id' => $val->id,
                'attribute_name' => $val->attribute->name ?? 'Attribute',
                'value_name' => $val->value_name,
                'metric' => $val->metric,
                'stock' => (int) ($val->pivot->stock ?? 0),
                'has_sale' => $hasSale,
                'discount_percent' => $discountPercent,
                'regular_formatted' => $symbol . number_format($regular, 2),
                'price_formatted' => $symbol . number_format($hasSale ? $sale : $regular, 2),
            ];
        })->values();

        $defaultVariant = $product->defaultAttributeValue();

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'image' => $product->image ? asset($product->image) : asset('assets/images/product-img/electronics/electronics-bg-trans-10-a-1-hover.webp'),
            'url' => route('product.details', $product->slug ?: $product->id),
            'default_attribute_value_id' => $defaultVariant?->id,
            'variants' => $variants,
            'pricing' => $product->pricingSummary(),
        ]);
    }

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
            'attribute_value_id' => 'nullable|integer|exists:attribute_values,id',
            'attributes' => 'nullable|array',
        ]);

        $productId = $request->input('product_id');
        $quantity = (int) $request->input('quantity', 1);
        $selectedAttrs = $request->input('attributes', []);
        $requestedAttributeValueId = $request->input('attribute_value_id');

        $product = Product::with(['attributeValues', 'images'])->findOrFail($productId);

        // Resolve which variant this line item is for: the requested one if it
        // actually belongs to this product, otherwise the default (cheapest).
        $variant = $requestedAttributeValueId
            ? $product->attributeValues->firstWhere('id', (int) $requestedAttributeValueId)
            : null;
        $variant = $variant ?: $product->defaultAttributeValue();

        $cart = session()->get('cart', []);

        // Unique cart key (product_id + variant) so different variants of the
        // same product become separate line items.
        $cartKey = (string) $productId;
        if ($variant) {
            $cartKey .= '-' . $variant->id;
        }

        if ($variant) {
            $priceLkr = (float) ($variant->pivot->sale_price_lkr ?: $variant->pivot->price_lkr);
            $priceUsd = (float) ($variant->pivot->sale_price_usd ?: $variant->pivot->price_usd);
            $variantName = $variant->value_name;
        } else {
            $priceLkr = 0.0;
            $priceUsd = 0.0;
            $variantName = null;
        }

        $displayName = $variantName ? "{$product->name} - {$variantName}" : $product->name;

        // Image URL
        $imageUrl = ($variant && $variant->pivot->image)
            ? asset($variant->pivot->image)
            : ($product->image ? asset($product->image) : asset('assets/images/product-img/electronics/electronics-bg-trans-10-a-1-hover.webp'));

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'key' => $cartKey,
                'product_id' => $product->id,
                'attribute_value_id' => $variant?->id,
                'variant_name' => $variantName,
                'name' => $displayName,
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
