<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of orders with filters for COD, Card (Pay Online), Order Type, status, and search.
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'items'])->latest();

        // Search by order number, customer name, email, or phone
        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by Order Type (online, whatsapp, other)
        if ($request->filled('order_type') && $request->input('order_type') !== 'all') {
            $query->where('order_type', strtolower(trim($request->input('order_type'))));
        }

        // Filter by Payment Method (COD vs Card / Pay Online vs Bank Transfer)
        if ($request->filled('payment_method') && $request->input('payment_method') !== 'all') {
            $pm = strtolower(trim($request->input('payment_method')));
            if (in_array($pm, ['cod', 'cash_on_delivery', 'cash'])) {
                $query->whereIn('payment_method', ['cash_on_delivery', 'cod', 'cash']);
            } elseif (in_array($pm, ['card', 'pay_online', 'cybersource', 'online'])) {
                $query->whereIn('payment_method', ['pay_online', 'card', 'cybersource', 'online']);
            } elseif (in_array($pm, ['bank_transfer', 'bank', 'transfer'])) {
                $query->whereIn('payment_method', ['bank_transfer', 'bank', 'transfer']);
            } else {
                $query->where('payment_method', $pm);
            }
        }

        // Filter by Order Status
        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        // Filter by Payment Status
        if ($request->filled('payment_status') && $request->input('payment_status') !== 'all') {
            $query->where('payment_status', $request->input('payment_status'));
        }

        // Summary Counts for Stats Cards
        $totalOrdersCount = Order::count();
        $onlineOrdersCount = Order::where(function($q) {
            $q->where('order_type', 'online')->orWhereNull('order_type');
        })->count();
        $whatsappOrdersCount = Order::where('order_type', 'whatsapp')->count();
        $otherOrdersCount = Order::where('order_type', 'other')->count();

        $codOrdersCount = Order::whereIn('payment_method', ['cash_on_delivery', 'cod', 'cash'])->count();
        $cardOrdersCount = Order::whereIn('payment_method', ['pay_online', 'card', 'cybersource', 'online'])->count();
        $totalRevenue = Order::whereIn('payment_status', ['paid', 'completed'])->sum('total_lkr');

        $orders = $query->paginate(15)->appends($request->all());

        return view('admin.orders.index', compact(
            'orders',
            'totalOrdersCount',
            'onlineOrdersCount',
            'whatsappOrdersCount',
            'otherOrdersCount',
            'codOrdersCount',
            'cardOrdersCount',
            'totalRevenue'
        ));
    }

    /**
     * Show form for creating a new order manually by Admin.
     */
    public function create()
    {
        $products = Product::with(['attributeValues.attribute'])->where('status', true)->orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();
        $countries = Country::where('status', true)->orderBy('name', 'asc')->get();

        return view('admin.orders.create', compact('products', 'users', 'countries'));
    }

    /**
     * Store a manually created order in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_type' => ['required', 'string', 'in:online,whatsapp,other'],
            'user_id' => ['nullable', 'exists:users,id'],
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

            'payment_method' => ['required', 'string', 'in:cash_on_delivery,bank_transfer,pay_online,other'],
            'payment_status' => ['required', 'string', 'in:pending,paid,failed'],
            'status' => ['required', 'string', 'in:pending,processing,completed,cancelled'],
            'shipping_fee_lkr' => ['nullable', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'payment_slip' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:4096'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
            'items.*.price_lkr' => ['required', 'numeric', 'min:0'],
            'items.*.variant' => ['nullable', 'string'],
        ]);

        $sameAsBilling = $request->boolean('delivery_same_as_billing', true);
        $shippingFee = floatval($validated['shipping_fee_lkr'] ?? 0);

        // Upload Payment Slip if present
        $slipPath = null;
        if ($request->hasFile('payment_slip')) {
            $file = $request->file('payment_slip');
            $filename = 'slip_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/slips');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $slipPath = 'uploads/slips/' . $filename;
        }

        $order = DB::transaction(function () use ($validated, $sameAsBilling, $shippingFee, $slipPath) {
            $subtotal = 0.0;
            $itemsData = [];

            foreach ($validated['items'] as $itemInput) {
                $product = Product::find($itemInput['product_id']);
                $qty = intval($itemInput['quantity']);
                $price = floatval($itemInput['price_lkr']);
                $lineTotal = $qty * $price;
                $subtotal += $lineTotal;

                $attrArray = [];
                if (!empty($itemInput['variant'])) {
                    $attrArray['variant'] = $itemInput['variant'];
                }

                $itemsData[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price_lkr' => $price,
                    'quantity' => $qty,
                    'line_total_lkr' => $lineTotal,
                    'attributes' => $attrArray,
                ];
            }

            $order = Order::create([
                'order_number' => $this->generateOrderNumber(),
                'user_id' => $validated['user_id'] ?? null,
                'order_type' => $validated['order_type'],
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
                'payment_status' => $validated['payment_status'],
                'payment_slip' => $slipPath,
                'subtotal_lkr' => $subtotal,
                'shipping_fee_lkr' => $shippingFee,
                'total_lkr' => $subtotal + $shippingFee,
                'status' => $validated['status'],
            ]);

            foreach ($itemsData as $itemData) {
                $itemData['order_id'] = $order->id;
                OrderItem::create($itemData);
            }

            return $order;
        });

        return redirect()->route('admin.orders.show', $order->id)->with('success', "Order #{$order->order_number} created successfully.");
    }

    /**
     * Display the specified order details.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the status of the specified order.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:pending,processing,completed,cancelled'],
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', "Order #{$order->order_number} status updated to " . ucfirst($validated['status']));
    }

    /**
     * Update the payment status of the specified order, with optional payment slip upload.
     */
    public function updatePaymentStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_status' => ['required', 'string', 'in:pending,paid,failed'],
            'payment_slip' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:4096'],
        ]);

        $updateData = ['payment_status' => $validated['payment_status']];

        if ($request->hasFile('payment_slip')) {
            $file = $request->file('payment_slip');
            $filename = 'slip_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/slips');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $updateData['payment_slip'] = 'uploads/slips/' . $filename;
        }

        $order->update($updateData);

        return redirect()->back()->with('success', "Order #{$order->order_number} payment status updated to " . ucfirst($validated['payment_status']));
    }

    /**
     * Upload or update payment slip for an order.
     */
    public function uploadSlip(Request $request, Order $order)
    {
        $request->validate([
            'payment_slip' => ['required', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:4096'],
        ]);

        $file = $request->file('payment_slip');
        $filename = 'slip_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('uploads/slips');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        $file->move($destinationPath, $filename);

        $order->update([
            'payment_slip' => 'uploads/slips/' . $filename,
        ]);

        return redirect()->back()->with('success', "Payment slip uploaded successfully for Order #{$order->order_number}.");
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        $orderNumber = $order->order_number;
        $order->items()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', "Order #{$orderNumber} has been deleted.");
    }

    /**
     * Dispatch order to Citypak Courier API.
     */
    public function dispatchCitypak(Request $request, Order $order, \App\Services\CitypakService $citypakService)
    {
        $result = $citypakService->createOrder($order, $request->all());

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json($result, $result['success'] ? 200 : 400);
        }

        if ($result['success']) {
            $msg = "Order #{$order->order_number} successfully dispatched to Citypak Courier! (Tracking Number: " . ($result['tracking_number'] ?? 'N/A') . ")";
            return redirect()->back()->with('success', $msg);
        }

        return redirect()->back()->with('error', "Citypak Dispatch Failed: " . ($result['message'] ?? 'Unknown error'));
    }

    /**
     * Stream Waybill PDF for the specified order.
     */
    public function printWaybill(Request $request, Order $order, \App\Services\CitypakService $citypakService)
    {
        if (empty($order->citypak_order_id) && empty($order->citypak_tracking_number)) {
            return redirect()->back()->with('error', 'This order has not been dispatched to Citypak yet.');
        }

        $pageSize = $request->input('page_size', 'A4');
        $perPageCount = intval($request->input('per_page_waybill_count', 4));

        if ($order->citypak_order_id) {
            return $citypakService->getWaybillPdfByOrderId($order->citypak_order_id, $pageSize, $perPageCount);
        }

        return $citypakService->getWaybillPdfByTrackingNumbers([$order->citypak_tracking_number], $pageSize, $perPageCount);
    }

    /**
     * Track order live status via Citypak API.
     */
    public function trackCitypak(Order $order, \App\Services\CitypakService $citypakService)
    {
        if (empty($order->citypak_tracking_number)) {
            return response()->json([
                'success' => false,
                'message' => 'No Citypak tracking number found for this order.',
            ], 404);
        }

        $result = $citypakService->trackOrder($order->citypak_tracking_number);
        return response()->json($result);
    }

    /**
     * Request courier pickup from Citypak.
     */
    public function createPickup(Request $request, \App\Services\CitypakService $citypakService)
    {
        $validated = $request->validate([
            'pickup_address_line_1' => ['required', 'string', 'max:255'],
            'pickup_address_line_2' => ['nullable', 'string', 'max:255'],
            'pickup_address_line_3' => ['nullable', 'string', 'max:255'],
            'pickup_address_line_4_city' => ['required', 'string', 'max:100'],
            'pickup_contact_person' => ['required', 'string', 'max:150'],
            'pickup_contact_number_1' => ['required', 'string', 'max:30'],
            'estimated_pickup_weight_grams' => ['required', 'integer', 'min:1'],
            'estimated_waybill_count' => ['required', 'integer', 'min:1'],
            'pickup_from_datetime' => ['required', 'string'],
            'pickup_to_datetime' => ['required', 'string'],
        ]);

        $result = $citypakService->createPickup($validated);

        if ($result['success']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', 'Pickup request failed: ' . $result['message']);
    }

    private function generateOrderNumber(): string
    {
        do {
            $number = 'ORD-' . now()->format('ymd') . '-' . strtoupper(Str::random(6));
        } while (Order::where('order_number', $number)->exists());

        return $number;
    }
}
