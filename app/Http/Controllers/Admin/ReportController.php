<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    /**
     * Display report dashboard with dynamic metrics, charts, and table breakdowns.
     */
    public function index(Request $request)
    {
        $range = $request->input('range', 'last_30_days');
        $customStart = $request->input('start_date');
        $customEnd = $request->input('end_date');

        [$startDate, $endDate, $rangeLabel] = $this->getDateRange($range, $customStart, $customEnd);

        // 1. Core KPIs
        $totalRevenue = (float) Order::whereBetween('created_at', [$startDate, $endDate])
            ->where(function ($q) {
                $q->whereIn('payment_status', ['paid', 'completed'])
                  ->orWhere('status', 'completed');
            })
            ->sum('total_lkr');

        $totalOrders = Order::whereBetween('created_at', [$startDate, $endDate])->count();
        $completedOrders = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 'completed')->count();
        $avgOrderValue = $totalOrders > 0 ? ($totalRevenue / $totalOrders) : 0;
        $totalShippingFee = (float) Order::whereBetween('created_at', [$startDate, $endDate])->sum('shipping_fee_lkr');

        $totalUnitsSold = (int) OrderItem::whereHas('order', function ($q) use ($startDate, $endDate) {
            $q->whereBetween('created_at', [$startDate, $endDate]);
        })->sum('quantity');

        $newCustomers = User::whereBetween('created_at', [$startDate, $endDate])->count();

        // 2. Payment Method Breakdown
        $codOrdersCount = Order::whereBetween('created_at', [$startDate, $endDate])
            ->whereIn('payment_method', ['cash_on_delivery', 'cod', 'cash'])
            ->count();
        $codRevenue = (float) Order::whereBetween('created_at', [$startDate, $endDate])
            ->whereIn('payment_method', ['cash_on_delivery', 'cod', 'cash'])
            ->sum('total_lkr');

        $cardOrdersCount = Order::whereBetween('created_at', [$startDate, $endDate])
            ->whereIn('payment_method', ['pay_online', 'card', 'cybersource', 'online'])
            ->count();
        $cardRevenue = (float) Order::whereBetween('created_at', [$startDate, $endDate])
            ->whereIn('payment_method', ['pay_online', 'card', 'cybersource', 'online'])
            ->sum('total_lkr');

        // 3. Status Distribution
        $statusCounts = [
            'pending' => Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 'pending')->count(),
            'processing' => Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 'processing')->count(),
            'completed' => Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 'completed')->count(),
            'cancelled' => Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 'cancelled')->count(),
        ];

        // 4. Sales Trend Chart Data (Daily or Monthly depending on range duration)
        $daysDiff = $startDate->diffInDays($endDate);
        $chartLabels = [];
        $chartRevenue = [];
        $chartOrders = [];

        if ($daysDiff <= 31) {
            $period = Carbon::parse($startDate)->daysUntil($endDate);
            foreach ($period as $date) {
                $dayStr = $date->format('Y-m-d');
                $chartLabels[] = $date->format('M d');
                
                $dayRev = (float) Order::whereDate('created_at', $dayStr)
                    ->where(function ($q) {
                        $q->whereIn('payment_status', ['paid', 'completed'])
                          ->orWhere('status', 'completed');
                    })
                    ->sum('total_lkr');

                $dayCount = Order::whereDate('created_at', $dayStr)->count();

                $chartRevenue[] = round($dayRev, 2);
                $chartOrders[] = $dayCount;
            }
        } else {
            $current = $startDate->copy()->startOfMonth();
            while ($current->lte($endDate)) {
                $chartLabels[] = $current->format('M Y');

                $monthRev = (float) Order::whereYear('created_at', $current->year)
                    ->whereMonth('created_at', $current->month)
                    ->where(function ($q) {
                        $q->whereIn('payment_status', ['paid', 'completed'])
                          ->orWhere('status', 'completed');
                    })
                    ->sum('total_lkr');

                $monthCount = Order::whereYear('created_at', $current->year)
                    ->whereMonth('created_at', $current->month)
                    ->count();

                $chartRevenue[] = round($monthRev, 2);
                $chartOrders[] = $monthCount;

                $current->addMonth();
            }
        }

        // 5. Top Performing Products
        $topProducts = OrderItem::select(
                'name',
                'image',
                'price_lkr',
                DB::raw('SUM(quantity) as total_qty'),
                DB::raw('SUM(line_total_lkr) as total_revenue')
            )
            ->whereHas('order', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->groupBy('name', 'image', 'price_lkr')
            ->orderByDesc('total_qty')
            ->take(10)
            ->get();

        // Fallback for top products if no sales in period
        if ($topProducts->isEmpty()) {
            $topProducts = Product::latest()->take(5)->get()->map(function ($p) {
                return (object) [
                    'name' => $p->name,
                    'image' => $p->image,
                    'price_lkr' => 0,
                    'total_qty' => 0,
                    'total_revenue' => 0,
                ];
            });
        }

        // 6. Category Performance
        $categorySales = Category::withCount('products')
            ->get()
            ->map(function ($cat) use ($startDate, $endDate) {
                $items = OrderItem::whereHas('product', function ($p) use ($cat) {
                    $p->where('category_id', $cat->id);
                })->whereHas('order', function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('created_at', [$startDate, $endDate]);
                });

                return (object) [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'image' => $cat->image,
                    'product_count' => $cat->products_count,
                    'units_sold' => (int) $items->sum('quantity'),
                    'total_revenue' => (float) $items->sum('line_total_lkr'),
                ];
            })
            ->sortByDesc('total_revenue')
            ->values();

        // 7. Top Spending Customers
        $topCustomers = Order::select(
                'name',
                'email',
                'phone',
                DB::raw('COUNT(id) as total_orders'),
                DB::raw('SUM(total_lkr) as total_spent')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('name', 'email', 'phone')
            ->orderByDesc('total_spent')
            ->take(10)
            ->get();

        // 8. Recent Orders in Range
        $recentOrders = Order::whereBetween('created_at', [$startDate, $endDate])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.reports.index', compact(
            'range',
            'rangeLabel',
            'startDate',
            'endDate',
            'totalRevenue',
            'totalOrders',
            'completedOrders',
            'avgOrderValue',
            'totalShippingFee',
            'totalUnitsSold',
            'newCustomers',
            'codOrdersCount',
            'codRevenue',
            'cardOrdersCount',
            'cardRevenue',
            'statusCounts',
            'chartLabels',
            'chartRevenue',
            'chartOrders',
            'topProducts',
            'categorySales',
            'topCustomers',
            'recentOrders'
        ));
    }

    /**
     * Export sales report as downloadable CSV.
     */
    public function export(Request $request)
    {
        $range = $request->input('range', 'last_30_days');
        $customStart = $request->input('start_date');
        $customEnd = $request->input('end_date');

        [$startDate, $endDate, $rangeLabel] = $this->getDateRange($range, $customStart, $customEnd);

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        $filename = 'sales_report_' . $startDate->format('Ymd') . '_to_' . $endDate->format('Ymd') . '.csv';

        $response = new StreamedResponse(function () use ($orders) {
            $handle = fopen('php://output', 'w');

            // Add UTF-8 BOM for Excel compatibility
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            // CSV Headers
            fputcsv($handle, [
                'Order Number',
                'Date',
                'Customer Name',
                'Email',
                'Phone',
                'Delivery City',
                'Payment Method',
                'Payment Status',
                'Order Status',
                'Subtotal (LKR)',
                'Shipping Fee (LKR)',
                'Total Amount (LKR)',
            ]);

            foreach ($orders as $order) {
                fputcsv($handle, [
                    '#' . $order->order_number,
                    $order->created_at ? $order->created_at->format('Y-m-d H:i:s') : 'N/A',
                    $order->name,
                    $order->email,
                    $order->phone,
                    $order->delivery_city ?? $order->billing_city ?? 'N/A',
                    strtoupper(str_replace('_', ' ', $order->payment_method)),
                    ucfirst($order->payment_status),
                    ucfirst($order->status),
                    number_format($order->subtotal_lkr, 2, '.', ''),
                    number_format($order->shipping_fee_lkr, 2, '.', ''),
                    number_format($order->total_lkr, 2, '.', ''),
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');

        return $response;
    }

    /**
     * Helper to compute start & end Carbon dates based on requested preset.
     */
    private function getDateRange(string $range, ?string $customStart, ?string $customEnd): array
    {
        $now = Carbon::now();

        switch ($range) {
            case 'today':
                $startDate = $now->copy()->startOfDay();
                $endDate = $now->copy()->endOfDay();
                $rangeLabel = 'Today (' . $now->format('M d, Y') . ')';
                break;

            case 'last_7_days':
                $startDate = $now->copy()->subDays(6)->startOfDay();
                $endDate = $now->copy()->endOfDay();
                $rangeLabel = 'Last 7 Days (' . $startDate->format('M d') . ' - ' . $endDate->format('M d, Y') . ')';
                break;

            case 'this_month':
                $startDate = $now->copy()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                $rangeLabel = 'This Month (' . $now->format('F Y') . ')';
                break;

            case 'this_year':
                $startDate = $now->copy()->startOfYear();
                $endDate = $now->copy()->endOfYear();
                $rangeLabel = 'This Year (' . $now->format('Y') . ')';
                break;

            case 'custom':
                if ($customStart && $customEnd) {
                    $startDate = Carbon::parse($customStart)->startOfDay();
                    $endDate = Carbon::parse($customEnd)->endOfDay();
                    $rangeLabel = 'Custom Range (' . $startDate->format('M d, Y') . ' - ' . $endDate->format('M d, Y') . ')';
                } else {
                    $startDate = $now->copy()->subDays(29)->startOfDay();
                    $endDate = $now->copy()->endOfDay();
                    $rangeLabel = 'Last 30 Days';
                }
                break;

            case 'last_30_days':
            default:
                $startDate = $now->copy()->subDays(29)->startOfDay();
                $endDate = $now->copy()->endOfDay();
                $rangeLabel = 'Last 30 Days (' . $startDate->format('M d') . ' - ' . $endDate->format('M d, Y') . ')';
                break;
        }

        return [$startDate, $endDate, $rangeLabel];
    }
}
