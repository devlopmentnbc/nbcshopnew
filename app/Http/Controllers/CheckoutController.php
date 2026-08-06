<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\ShippingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page with contact/address form and order summary.
     */
    public function index(ShippingService $shippingService)
    {
        $cart = $this->getValidCart();

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        [$subtotal, $totalItems] = $this->cartTotals($cart);

        $user = Auth::user();
        $countries = Country::where('status', true)->orderBy('name', 'asc')->get();

        // Calculate initial Sri Lanka shipping fee (1kg fixed weight)
        $initialShippingFee = $shippingService->calculateShipping(
            'Sri Lanka',
            1000,
            'LKR',
            '',
            '',
            $subtotal
        );

        $initialTotal = $subtotal + $initialShippingFee;

        return view('checkout', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'totalItems' => $totalItems,
            'user' => $user,
            'countries' => $countries,
            'initialShippingFee' => $initialShippingFee,
            'initialTotal' => $initialTotal,
        ]);
    }

    /**
     * AJAX endpoint to calculate shipping fee based on country, city, postal code.
     */
    public function calculateShipping(Request $request, ShippingService $shippingService)
    {
        $cart = $this->getValidCart();
        [$subtotal, ] = $this->cartTotals($cart);

        $country = $request->input('country', 'Sri Lanka');
        $city = $request->input('city', 'Colombo');
        $postalCode = $request->input('postal_code', '00000');

        // Fixed weight of 1kg (1000g)
        $weightGrams = 1000;

        $shippingFee = $shippingService->calculateShipping(
            $country,
            $weightGrams,
            'LKR',
            $city,
            $postalCode,
            $subtotal
        );

        $total = $subtotal + $shippingFee;
        $isLocal = strtolower(trim($country)) === 'sri lanka' || strtolower(trim($country)) === 'lk';

        return response()->json([
            'success' => true,
            'country' => $country,
            'is_local' => $isLocal,
            'shipping_fee_lkr' => $shippingFee,
            'formatted_shipping_fee' => $shippingFee > 0 ? 'LKR ' . number_format($shippingFee, 2) : 'Free',
            'subtotal_lkr' => $subtotal,
            'formatted_subtotal' => 'LKR ' . number_format($subtotal, 2),
            'total_lkr' => $total,
            'formatted_total' => 'LKR ' . number_format($total, 2),
            'weight_kg' => 1.0,
        ]);
    }

    /**
     * Validate checkout form, create the order, clear the cart, redirect to confirmation.
     */
    public function store(Request $request, ShippingService $shippingService)
    {
        $cart = $this->getValidCart();

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],

            'billing_address_line1' => ['required', 'string', 'max:255'],
            'billing_address_line2' => ['nullable', 'string', 'max:255'],
            'billing_city' => ['required', 'string', 'max:100'],
            'billing_state' => ['nullable', 'string', 'max:100'],
            'billing_postal_code' => ['nullable', 'string', 'max:20'],
            'billing_country' => ['required', 'string', 'max:100'],

            'delivery_same_as_billing' => ['nullable', 'boolean'],
            'delivery_address_line1' => ['required_if:delivery_same_as_billing,0', 'nullable', 'string', 'max:255'],
            'delivery_address_line2' => ['nullable', 'string', 'max:255'],
            'delivery_city' => ['required_if:delivery_same_as_billing,0', 'nullable', 'string', 'max:100'],
            'delivery_state' => ['nullable', 'string', 'max:100'],
            'delivery_postal_code' => ['nullable', 'string', 'max:20'],
            'delivery_country' => ['required_if:delivery_same_as_billing,0', 'nullable', 'string', 'max:100'],

            'payment_method' => ['required', 'string', 'in:cash_on_delivery,pay_online'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $sameAsBilling = $request->boolean('delivery_same_as_billing');
        $deliveryCountry = $sameAsBilling ? $validated['billing_country'] : $validated['delivery_country'];
        $deliveryCity = $sameAsBilling ? $validated['billing_city'] : ($validated['delivery_city'] ?? '');
        $deliveryPostal = $sameAsBilling ? ($validated['billing_postal_code'] ?? '') : ($validated['delivery_postal_code'] ?? '');

        [$subtotal, ] = $this->cartTotals($cart);

        // Fixed weight of 1kg (1000g)
        $shippingFee = $shippingService->calculateShipping(
            $deliveryCountry,
            1000,
            'LKR',
            $deliveryCity,
            $deliveryPostal,
            $subtotal
        );

        $order = DB::transaction(function () use ($validated, $sameAsBilling, $cart, $subtotal, $shippingFee) {
            $order = Order::create([
                'order_number' => $this->generateOrderNumber(),
                'user_id' => Auth::id(),
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],

                'billing_address_line1' => $validated['billing_address_line1'],
                'billing_address_line2' => $validated['billing_address_line2'] ?? null,
                'billing_city' => $validated['billing_city'],
                'billing_state' => $validated['billing_state'] ?? null,
                'billing_postal_code' => $validated['billing_postal_code'] ?? null,
                'billing_country' => $validated['billing_country'],

                'delivery_same_as_billing' => $sameAsBilling,
                'delivery_address_line1' => $sameAsBilling ? $validated['billing_address_line1'] : $validated['delivery_address_line1'],
                'delivery_address_line2' => $sameAsBilling ? ($validated['billing_address_line2'] ?? null) : ($validated['delivery_address_line2'] ?? null),
                'delivery_city' => $sameAsBilling ? $validated['billing_city'] : $validated['delivery_city'],
                'delivery_state' => $sameAsBilling ? ($validated['billing_state'] ?? null) : ($validated['delivery_state'] ?? null),
                'delivery_postal_code' => $sameAsBilling ? ($validated['billing_postal_code'] ?? null) : ($validated['delivery_postal_code'] ?? null),
                'delivery_country' => $sameAsBilling ? $validated['billing_country'] : $validated['delivery_country'],

                'notes' => $validated['notes'] ?? null,
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'pending',

                'subtotal_lkr' => $subtotal,
                'shipping_fee_lkr' => $shippingFee,
                'total_lkr' => $subtotal + $shippingFee,
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'] ?? null,
                    'name' => $item['name'],
                    'image' => $item['image'] ?? null,
                    'price_lkr' => $item['price_lkr'] ?? 0,
                    'quantity' => $item['quantity'],
                    'line_total_lkr' => ($item['price_lkr'] ?? 0) * $item['quantity'],
                    'attributes' => $item['attributes'] ?? [],
                ]);
            }

            return $order;
        });

        if ($validated['payment_method'] === 'pay_online') {
            return redirect()->route('payments.cybersource.pay', $order->order_number);
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order->order_number);
    }

    /**
     * Order confirmation page.
     */
    public function success(string $orderNumber)
    {
        $order = Order::with('items')->where('order_number', $orderNumber)->firstOrFail();

        return view('checkout-success', compact('order'));
    }

    /**
     * Pull the session cart, dropping any expired entries.
     */
    private function getValidCart(): array
    {
        $cart = session()->get('cart', []);
        $now = now()->timestamp;

        $valid = array_filter($cart, function ($item) use ($now) {
            return !isset($item['expires_at']) || $item['expires_at'] >= $now;
        });

        if (count($valid) !== count($cart)) {
            session()->put('cart', $valid);
        }

        return $valid;
    }

    private function cartTotals(array $cart): array
    {
        $subtotal = 0.0;
        $totalItems = 0;

        foreach ($cart as $item) {
            $subtotal += ($item['price_lkr'] ?? 0) * $item['quantity'];
            $totalItems += $item['quantity'];
        }

        return [$subtotal, $totalItems];
    }

    private function generateOrderNumber(): string
    {
        do {
            $number = 'ORD-' . now()->format('ymd') . '-' . strtoupper(Str::random(6));
        } while (Order::where('order_number', $number)->exists());

        return $number;
    }
}
