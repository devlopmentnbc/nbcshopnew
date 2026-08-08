<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the Admin Dashboard with real-time reports and store analytics.
     */
    public function index()
    {
        // 1. Core Real Metrics
        $totalRevenue = Order::whereIn('payment_status', ['paid', 'completed'])
            ->orWhere('status', 'completed')
            ->sum('total_lkr');
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalCustomers = User::count();

        // 2. COD vs Card Orders Breakdown
        $codOrdersCount = Order::whereIn('payment_method', ['cash_on_delivery', 'cod', 'cash'])->count();
        $cardOrdersCount = Order::whereIn('payment_method', ['pay_online', 'card', 'cybersource', 'online'])->count();

        // 3. Recent Orders
        $recentOrders = Order::with('items')->latest()->take(6)->get();

        // 4. Best Selling Products (aggregated from order items)
        $bestSellingItems = OrderItem::select('name', 'image', 'price_lkr', DB::raw('SUM(quantity) as total_qty'), DB::raw('SUM(line_total_lkr) as total_amount'))
            ->groupBy('name', 'image', 'price_lkr')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();

        // Fallback for best sellers if no orders placed yet
        if ($bestSellingItems->isEmpty()) {
            $bestSellingItems = Product::latest()->take(5)->get()->map(function($p) {
                return (object)[
                    'name' => $p->name,
                    'image' => $p->image,
                    'price_lkr' => $p->price_lkr,
                    'total_qty' => 0,
                    'total_amount' => 0,
                ];
            });
        }

        // 5. Category breakdown with real product counts
        $categories = Category::withCount('products')->get();

        // 6. Monthly Revenue for current year (Jan-Dec)
        $monthlyRevenue = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyRevenue[] = (float) Order::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->sum('total_lkr');
        }

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'totalCustomers',
            'codOrdersCount',
            'cardOrdersCount',
            'recentOrders',
            'bestSellingItems',
            'categories',
            'monthlyRevenue'
        ));
    }
}
