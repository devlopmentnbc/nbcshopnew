<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of orders with filters for COD, Card (Pay Online), status, and search.
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

        // Filter by Payment Method (COD vs Card / Pay Online)
        if ($request->filled('payment_method') && $request->input('payment_method') !== 'all') {
            $pm = strtolower(trim($request->input('payment_method')));
            if (in_array($pm, ['cod', 'cash_on_delivery', 'cash'])) {
                $query->whereIn('payment_method', ['cash_on_delivery', 'cod', 'cash']);
            } elseif (in_array($pm, ['card', 'pay_online', 'cybersource', 'online'])) {
                $query->whereIn('payment_method', ['pay_online', 'card', 'cybersource', 'online']);
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
        $codOrdersCount = Order::whereIn('payment_method', ['cash_on_delivery', 'cod', 'cash'])->count();
        $cardOrdersCount = Order::whereIn('payment_method', ['pay_online', 'card', 'cybersource', 'online'])->count();
        $totalRevenue = Order::whereIn('payment_status', ['paid', 'completed'])->sum('total_lkr');

        $orders = $query->paginate(15)->appends($request->all());

        return view('admin.orders.index', compact(
            'orders',
            'totalOrdersCount',
            'codOrdersCount',
            'cardOrdersCount',
            'totalRevenue'
        ));
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
     * Update the payment status of the specified order.
     */
    public function updatePaymentStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_status' => ['required', 'string', 'in:pending,paid,failed'],
        ]);

        $order->update(['payment_status' => $validated['payment_status']]);

        return redirect()->back()->with('success', "Order #{$order->order_number} payment status updated to " . ucfirst($validated['payment_status']));
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
}
