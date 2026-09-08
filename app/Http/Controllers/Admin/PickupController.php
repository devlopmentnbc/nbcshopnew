<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CitypakPickup;
use App\Models\Order;
use App\Models\Setting;
use App\Services\CitypakService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PickupController extends Controller
{
    /**
     * Display the Pickups overview page: list unassigned orders and past pickups history.
     */
    public function index(Request $request)
    {
        // Unpicked orders query: Orders without assigned pickup ID
        $ordersQuery = Order::with(['items.product', 'user'])
            ->whereNull('citypak_pickup_id')
            ->whereNotIn('status', ['cancelled', 'returned']);

        // Optional search filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $ordersQuery->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('citypak_tracking_number', 'like', "%{$search}%");
            });
        }

        // Optional order status filter
        if ($request->filled('status')) {
            $ordersQuery->where('status', $request->status);
        }

        $pendingOrders = $ordersQuery->latest()->get();

        // Past pickups paginated
        $pickups = CitypakPickup::with('orders')->latest()->paginate(10);

        // Pre-fill sender pickup default info from settings
        $senderDefaults = [
            'contact_person' => Setting::get('citypak_from_contact_name', 'Dispatch Manager'),
            'contact_number' => Setting::get('citypak_from_contact_1', '0771234567'),
            'address_line_1' => Setting::get('citypak_from_address_line_1', 'No 123 Main Street'),
            'address_line_2' => Setting::get('citypak_from_address_line_2', ''),
            'city' => Setting::get('citypak_from_address_line_4', 'Colombo'),
        ];

        return view('admin.pickups.index', compact('pendingOrders', 'pickups', 'senderDefaults'));
    }

    /**
     * Store a newly created Courier Pickup request.
     */
    public function store(Request $request, CitypakService $citypakService)
    {
        $validated = $request->validate([
            'order_ids' => 'required|array|min:1',
            'order_ids.*' => 'exists:orders,id',
            'pickup_date' => 'required|date',
            'pickup_from_time' => 'required|string',
            'pickup_to_time' => 'required|string',
            'contact_person' => 'required|string|max:150',
            'contact_number' => 'required|string|max:30',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'notes' => 'nullable|string|max:500',
        ]);

        $orders = Order::whereIn('id', $validated['order_ids'])->with('items.product')->get();

        if ($orders->isEmpty()) {
            return redirect()->back()->with('error', 'Please select at least one valid order to create a pickup request.');
        }

        // Calculate summary metrics
        $totalOrdersCount = $orders->count();
        $totalWeightGrams = 0;
        $totalCodAmount = 0;

        foreach ($orders as $order) {
            $totalWeightGrams += $order->total_weight_grams;
            if (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']) && strtolower($order->payment_status) !== 'paid') {
                $totalCodAmount += floatval($order->total_lkr);
            }
        }

        // Format dates/times for Citypak API
        $fromDatetimeStr = date('d/m/Y', strtotime($validated['pickup_date'])) . ' ' . $validated['pickup_from_time'];
        $toDatetimeStr = date('d/m/Y', strtotime($validated['pickup_date'])) . ' ' . $validated['pickup_to_time'];

        $apiPayload = [
            'pickup_address_line_1' => $validated['address_line_1'],
            'pickup_address_line_2' => $validated['address_line_2'] ?? '',
            'pickup_address_line_3' => '',
            'pickup_address_line_4_city' => $validated['city'],
            'pickup_contact_person' => $validated['contact_person'],
            'pickup_contact_number_1' => $validated['contact_number'],
            'estimated_pickup_weight_grams' => $totalWeightGrams,
            'estimated_waybill_count' => $totalOrdersCount,
            'pickup_from_datetime' => $fromDatetimeStr,
            'pickup_to_datetime' => $toDatetimeStr,
        ];

        // Call Citypak API
        $apiResult = $citypakService->createPickup($apiPayload);

        // Generate custom local pickup tracking number if missing
        $pickupNumber = 'PU-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $citypakPickupId = $apiResult['pickup_id'] ?? null;

        // Save pickup record
        $pickup = CitypakPickup::create([
            'pickup_number' => $pickupNumber,
            'citypak_pickup_id' => $citypakPickupId,
            'pickup_date' => $validated['pickup_date'],
            'pickup_from_time' => $validated['pickup_from_time'],
            'pickup_to_time' => $validated['pickup_to_time'],
            'contact_person' => $validated['contact_person'],
            'contact_number' => $validated['contact_number'],
            'address_line_1' => $validated['address_line_1'],
            'address_line_2' => $validated['address_line_2'] ?? null,
            'city' => $validated['city'],
            'total_orders' => $totalOrdersCount,
            'total_weight_grams' => $totalWeightGrams,
            'total_cod_amount' => $totalCodAmount,
            'status' => 'SCHEDULED',
            'notes' => $validated['notes'] ?? null,
        ]);

        // Link orders to this pickup
        Order::whereIn('id', $orders->pluck('id'))->update([
            'citypak_pickup_id' => $pickup->id,
        ]);

        $msg = "Pickup request #{$pickup->pickup_number} successfully scheduled for {$totalOrdersCount} orders (Total Weight: " . $pickup->formatted_weight . ").";
        if (!$apiResult['success']) {
            $msg .= " Note: Local record saved ({$apiResult['message']}).";
        }

        return redirect()->route('admin.pickups.index')->with('success', $msg);
    }

    /**
     * Display detailed modal/JSON response for a specific Pickup.
     */
    public function show(CitypakPickup $pickup)
    {
        $pickup->load('orders.items.product');
        return response()->json([
            'success' => true,
            'pickup' => $pickup,
            'orders' => $pickup->orders,
        ]);
    }
}
