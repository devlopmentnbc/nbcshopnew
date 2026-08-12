@extends('admin.layouts.app')

@section('title', 'Reports & Analytics - Nature\'s Beauty Creations Admin')

@section('content')
<main class="min-h-[calc(100vh-140px)] px-4 py-6 lg:px-6">
    <!-- Header & Date Filter Bar -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-brand-50 px-2.5 py-0.5 text-[12px] font-bold text-brand-600">
                    <i data-lucide="bar-chart-3" class="mr-1 h-3.5 w-3.5"></i> Real-time Analytics
                </span>
                <span class="text-[13px] font-medium text-ink-400">• {{ $rangeLabel }}</span>
            </div>
            <h1 class="mt-1 text-[24px] font-bold text-ink-900">Reports & Store Analytics</h1>
            <p class="mt-1 text-[14px] text-ink-500">
                Track sales revenue, order volumes, customer acquisition, payment method performance, and top products.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <!-- Filter Form -->
            <form id="report-filter-form" action="{{ route('admin.reports.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
                <select name="range" onchange="toggleCustomDateInputs(this.value)" class="h-11 rounded-base border border-surface-line bg-surface-card px-3 text-[14px] font-medium text-ink-700 focus:border-brand-600">
                    <option value="today" {{ $range === 'today' ? 'selected' : '' }}>Today</option>
                    <option value="last_7_days" {{ $range === 'last_7_days' ? 'selected' : '' }}>Last 7 Days</option>
                    <option value="last_30_days" {{ $range === 'last_30_days' ? 'selected' : '' }}>Last 30 Days</option>
                    <option value="this_month" {{ $range === 'this_month' ? 'selected' : '' }}>This Month</option>
                    <option value="this_year" {{ $range === 'this_year' ? 'selected' : '' }}>This Year</option>
                    <option value="custom" {{ $range === 'custom' ? 'selected' : '' }}>Custom Date Range...</option>
                </select>

                <div id="custom-date-container" class="{{ $range === 'custom' ? 'flex' : 'hidden' }} items-center gap-2">
                    <input type="date" name="start_date" value="{{ request('start_date', $startDate->format('Y-m-d')) }}" class="h-11 rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-700 focus:border-brand-600">
                    <span class="text-ink-400 text-xs">to</span>
                    <input type="date" name="end_date" value="{{ request('end_date', $endDate->format('Y-m-d')) }}" class="h-11 rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-700 focus:border-brand-600">
                </div>

                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                    <i data-lucide="filter" class="h-4 w-4"></i> Apply Filter
                </button>
            </form>

            <!-- Export CSV -->
            <a href="{{ route('admin.reports.export', request()->all()) }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line bg-surface-card px-4 text-[14px] font-semibold text-ink-700 transition-colors hover:bg-surface-muted">
                <i data-lucide="download" class="h-4 w-4 text-brand-600"></i>
                Export CSV
            </a>
        </div>
    </div>

    <!-- Metric Summary Cards -->
    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <!-- Net Sales Revenue -->
        <article class="rounded-card border border-surface-line bg-surface-card p-5 shadow-card transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <p class="text-[13px] font-semibold text-ink-500">Net Sales Revenue</p>
                <div class="grid h-10 w-10 place-items-center rounded-base bg-success-50 text-success-600">
                    <i data-lucide="dollar-sign" class="h-5 w-5"></i>
                </div>
            </div>
            <h2 class="mt-2 text-[26px] font-bold text-ink-900">LKR {{ number_format($totalRevenue, 2) }}</h2>
            <p class="mt-1 text-[12px] text-ink-400">
                Paid & Completed Orders in period
            </p>
        </article>

        <!-- Total Orders -->
        <article class="rounded-card border border-surface-line bg-surface-card p-5 shadow-card transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <p class="text-[13px] font-semibold text-ink-500">Total Orders</p>
                <div class="grid h-10 w-10 place-items-center rounded-base bg-brand-50 text-brand-600">
                    <i data-lucide="shopping-bag" class="h-5 w-5"></i>
                </div>
            </div>
            <h2 class="mt-2 text-[26px] font-bold text-ink-900">{{ number_format($totalOrders) }}</h2>
            <p class="mt-1 text-[12px] text-ink-400">
                <span class="font-semibold text-success-600">{{ number_format($completedOrders) }} Completed</span>
                ({{ $totalOrders > 0 ? round(($completedOrders / $totalOrders) * 100, 1) : 0 }}% completion)
            </p>
        </article>

        <!-- Average Order Value (AOV) -->
        <article class="rounded-card border border-surface-line bg-surface-card p-5 shadow-card transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <p class="text-[13px] font-semibold text-ink-500">Avg. Order Value (AOV)</p>
                <div class="grid h-10 w-10 place-items-center rounded-base bg-purple-50 text-purple-600">
                    <i data-lucide="trending-up" class="h-5 w-5"></i>
                </div>
            </div>
            <h2 class="mt-2 text-[26px] font-bold text-ink-900">LKR {{ number_format($avgOrderValue, 2) }}</h2>
            <p class="mt-1 text-[12px] text-ink-400">
                Average spend per transaction
            </p>
        </article>

        <!-- Units Sold & Shipping -->
        <article class="rounded-card border border-surface-line bg-surface-card p-5 shadow-card transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <p class="text-[13px] font-semibold text-ink-500">Items Sold & Shipping</p>
                <div class="grid h-10 w-10 place-items-center rounded-base bg-amber-50 text-amber-600">
                    <i data-lucide="package-check" class="h-5 w-5"></i>
                </div>
            </div>
            <h2 class="mt-2 text-[26px] font-bold text-ink-900">{{ number_format($totalUnitsSold) }} <span class="text-sm font-normal text-ink-500">units</span></h2>
            <p class="mt-1 text-[12px] text-ink-400">
                LKR {{ number_format($totalShippingFee, 2) }} shipping fees collected
            </p>
        </article>
    </section>

    <!-- Visual Charts Grid -->
    <section class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
        <!-- Main Sales Trend Chart (Takes 2 cols on XL) -->
        <article class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card xl:col-span-2">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                <div>
                    <h2 class="text-[18px] font-bold text-ink-900">Sales & Revenue Trend</h2>
                    <p class="text-[13px] text-ink-400">Revenue trajectory for {{ $rangeLabel }}</p>
                </div>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-[12px] font-semibold text-emerald-700">
                    <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span> Revenue (LKR)
                </span>
            </div>

            <div id="sales-trend-chart" class="min-h-[320px] w-full"></div>
        </article>

        <!-- Payment Method & Status Share (Takes 1 col on XL) -->
        <article class="flex flex-col gap-6">
            <!-- Payment Share -->
            <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card flex-1">
                <h2 class="text-[17px] font-bold text-ink-900 mb-1">Payment Method Breakdown</h2>
                <p class="text-[13px] text-ink-400 mb-4">COD vs Online Card Transactions</p>
                
                <div id="payment-method-chart" class="min-h-[200px] w-full"></div>

                <div class="mt-4 grid grid-cols-2 gap-3 pt-3 border-t border-surface-line">
                    <div class="rounded-base border border-amber-200 bg-amber-50/60 p-3 text-center">
                        <span class="text-[11px] font-bold uppercase text-amber-700">Cash on Delivery</span>
                        <p class="text-[18px] font-bold text-amber-900 mt-0.5">{{ $codOrdersCount }} <span class="text-[12px] font-normal text-amber-700">orders</span></p>
                        <p class="text-[11px] font-mono text-amber-800">LKR {{ number_format($codRevenue, 2) }}</p>
                    </div>
                    <div class="rounded-base border border-indigo-200 bg-indigo-50/60 p-3 text-center">
                        <span class="text-[11px] font-bold uppercase text-indigo-700">Card (CyberSource)</span>
                        <p class="text-[18px] font-bold text-indigo-900 mt-0.5">{{ $cardOrdersCount }} <span class="text-[12px] font-normal text-indigo-700">orders</span></p>
                        <p class="text-[11px] font-mono text-indigo-800">LKR {{ number_format($cardRevenue, 2) }}</p>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <!-- Tabbed Detailed Breakdown Tables -->
    <section class="mt-6 rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <!-- Tab Navigation Buttons -->
        <div class="flex flex-wrap items-center gap-2 border-b border-surface-line pb-4">
            <button type="button" onclick="switchReportTab('products')" id="tab-btn-products" class="tab-btn inline-flex items-center gap-2 rounded-base px-4 py-2.5 text-[14px] font-semibold text-brand-600 bg-brand-50 border border-brand-200 transition-colors">
                <i data-lucide="package" class="h-4 w-4"></i> Top Products
            </button>
            <button type="button" onclick="switchReportTab('categories')" id="tab-btn-categories" class="tab-btn inline-flex items-center gap-2 rounded-base px-4 py-2.5 text-[14px] font-semibold text-ink-500 hover:bg-surface-muted transition-colors">
                <i data-lucide="list-tree" class="h-4 w-4"></i> Category Analytics
            </button>
            <button type="button" onclick="switchReportTab('customers')" id="tab-btn-customers" class="tab-btn inline-flex items-center gap-2 rounded-base px-4 py-2.5 text-[14px] font-semibold text-ink-500 hover:bg-surface-muted transition-colors">
                <i data-lucide="users" class="h-4 w-4"></i> Customer Insights
            </button>
            <button type="button" onclick="switchReportTab('recent-orders')" id="tab-btn-recent-orders" class="tab-btn inline-flex items-center gap-2 rounded-base px-4 py-2.5 text-[14px] font-semibold text-ink-500 hover:bg-surface-muted transition-colors">
                <i data-lucide="file-text" class="h-4 w-4"></i> Recent Orders Log
            </button>
        </div>

        <!-- Tab 1: Top Performing Products -->
        <div id="tab-content-products" class="tab-content mt-4 block">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px]">
                    <thead>
                        <tr class="border-b border-surface-line text-[12px] font-bold uppercase text-ink-400">
                            <th scope="col" class="py-3 pr-4">Rank & Product</th>
                            <th scope="col" class="py-3 pr-4 text-center">Price</th>
                            <th scope="col" class="py-3 pr-4 text-center">Units Sold</th>
                            <th scope="col" class="py-3 text-right">Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($topProducts as $index => $item)
                            <tr class="hover:bg-surface-body/70 transition-colors">
                                <td class="py-3.5 pr-4">
                                    <div class="flex items-center gap-3">
                                        <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-surface-muted text-[12px] font-bold text-ink-600">
                                            #{{ $index + 1 }}
                                        </span>
                                        @if (!empty($item->image))
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="h-10 w-10 rounded-base bg-surface-body object-cover border border-surface-line shrink-0">
                                        @else
                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-base bg-surface-muted text-ink-400 text-[10px] border border-surface-line font-bold">NBC</div>
                                        @endif
                                        <span class="font-semibold text-ink-900 text-[14px]">
                                            {{ $item->name }}
                                        </span>
                                    </div>
                                </td>
                                <td class="py-3.5 pr-4 text-center text-[13px] text-ink-700 font-mono">
                                    LKR {{ number_format($item->price_lkr, 2) }}
                                </td>
                                <td class="py-3.5 pr-4 text-center">
                                    <span class="inline-flex items-center rounded-full bg-brand-50 px-3 py-1 text-[13px] font-bold text-brand-600">
                                        {{ number_format($item->total_qty) }} units
                                    </span>
                                </td>
                                <td class="py-3.5 text-right font-bold text-ink-900 text-[14px]">
                                    LKR {{ number_format($item->total_revenue, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-ink-400">No product sales data for this period.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab 2: Category Analytics -->
        <div id="tab-content-categories" class="tab-content mt-4 hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px]">
                    <thead>
                        <tr class="border-b border-surface-line text-[12px] font-bold uppercase text-ink-400">
                            <th scope="col" class="py-3 pr-4">Category Name</th>
                            <th scope="col" class="py-3 pr-4 text-center">Catalog Products</th>
                            <th scope="col" class="py-3 pr-4 text-center">Units Sold</th>
                            <th scope="col" class="py-3 text-right">Category Revenue</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($categorySales as $cat)
                            <tr class="hover:bg-surface-body/70 transition-colors">
                                <td class="py-3.5 pr-4">
                                    <div class="flex items-center gap-3">
                                        @if (!empty($cat->image))
                                            <img src="{{ asset($cat->image) }}" alt="{{ $cat->name }}" class="h-9 w-9 rounded-full object-cover border border-surface-line">
                                        @else
                                            <div class="grid h-9 w-9 place-items-center rounded-full bg-emerald-50 text-emerald-700 font-bold text-xs">
                                                {{ strtoupper(substr($cat->name, 0, 2)) }}
                                            </div>
                                        @endif
                                        <span class="font-semibold text-ink-900 text-[14px]">{{ $cat->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3.5 pr-4 text-center text-ink-700">
                                    {{ $cat->product_count }} items
                                </td>
                                <td class="py-3.5 pr-4 text-center">
                                    <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-[13px] font-bold text-emerald-700">
                                        {{ number_format($cat->units_sold) }} units
                                    </span>
                                </td>
                                <td class="py-3.5 text-right font-bold text-ink-900 text-[14px]">
                                    LKR {{ number_format($cat->total_revenue, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-ink-400">No category performance recorded.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab 3: Customer Insights -->
        <div id="tab-content-customers" class="tab-content mt-4 hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px]">
                    <thead>
                        <tr class="border-b border-surface-line text-[12px] font-bold uppercase text-ink-400">
                            <th scope="col" class="py-3 pr-4">Customer Name</th>
                            <th scope="col" class="py-3 pr-4">Contact Info</th>
                            <th scope="col" class="py-3 pr-4 text-center">Orders Placed</th>
                            <th scope="col" class="py-3 text-right">Total Spent</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($topCustomers as $cust)
                            <tr class="hover:bg-surface-body/70 transition-colors">
                                <td class="py-3.5 pr-4">
                                    <span class="font-semibold text-ink-900 block text-[14px]">{{ $cust->name }}</span>
                                </td>
                                <td class="py-3.5 pr-4 text-ink-600 text-[13px]">
                                    <p>{{ $cust->email }}</p>
                                    <p class="font-mono text-ink-400 text-[11px]">{{ $cust->phone }}</p>
                                </td>
                                <td class="py-3.5 pr-4 text-center">
                                    <span class="inline-flex items-center rounded-full bg-purple-50 px-3 py-1 text-[13px] font-bold text-purple-700">
                                        {{ $cust->total_orders }} orders
                                    </span>
                                </td>
                                <td class="py-3.5 text-right font-bold text-ink-900 text-[14px]">
                                    LKR {{ number_format($cust->total_spent, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-ink-400">No customer activity recorded for this date range.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab 4: Recent Orders Log -->
        <div id="tab-content-recent-orders" class="tab-content mt-4 hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px]">
                    <thead>
                        <tr class="border-b border-surface-line text-[12px] font-bold uppercase text-ink-400">
                            <th scope="col" class="py-3 pr-4">Order Number</th>
                            <th scope="col" class="py-3 pr-4">Date</th>
                            <th scope="col" class="py-3 pr-4">Customer</th>
                            <th scope="col" class="py-3 pr-4 text-center">Payment Method</th>
                            <th scope="col" class="py-3 pr-4 text-center">Status</th>
                            <th scope="col" class="py-3 text-right">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($recentOrders as $order)
                            <tr class="hover:bg-surface-body/70 transition-colors">
                                <td class="py-3.5 pr-4">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="font-bold text-brand-600 hover:underline">
                                        #{{ $order->order_number }}
                                    </a>
                                </td>
                                <td class="py-3.5 pr-4 text-ink-500 text-[13px]">
                                    {{ $order->created_at ? $order->created_at->format('M d, Y H:i') : 'N/A' }}
                                </td>
                                <td class="py-3.5 pr-4 text-ink-800 text-[13px]">
                                    <p class="font-medium text-ink-900">{{ $order->name }}</p>
                                    <p class="text-[11px] text-ink-400">{{ $order->email }}</p>
                                </td>
                                <td class="py-3.5 pr-4 text-center">
                                    @if (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']))
                                        <span class="inline-flex items-center gap-1 rounded bg-amber-50 px-2.5 py-1 text-[12px] font-semibold text-amber-800">
                                            COD
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded bg-indigo-50 px-2.5 py-1 text-[12px] font-semibold text-indigo-800">
                                            Card (Online)
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3.5 pr-4 text-center">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-[12px] font-bold
                                        {{ $order->status === 'completed' ? 'bg-success-50 text-success-600' : '' }}
                                        {{ $order->status === 'processing' ? 'bg-brand-50 text-brand-600' : '' }}
                                        {{ $order->status === 'pending' ? 'bg-amber-50 text-amber-600' : '' }}
                                        {{ $order->status === 'cancelled' ? 'bg-danger-50 text-danger-500' : '' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="py-3.5 text-right font-bold text-ink-900 text-[14px]">
                                    LKR {{ number_format($order->total_lkr, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-ink-400">No orders found in this period.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<!-- Load ApexCharts CDN for interactive analytics charts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    function toggleCustomDateInputs(value) {
        const container = document.getElementById('custom-date-container');
        if (value === 'custom') {
            container.classList.remove('hidden');
            container.classList.add('flex');
        } else {
            container.classList.add('hidden');
            container.classList.remove('flex');
        }
    }

    function switchReportTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        
        // Reset tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('text-brand-600', 'bg-brand-50', 'border', 'border-brand-200');
            btn.classList.add('text-ink-500', 'hover:bg-surface-muted');
        });

        // Show active content & style active button
        const activeContent = document.getElementById('tab-content-' + tabName);
        const activeBtn = document.getElementById('tab-btn-' + tabName);

        if (activeContent) activeContent.classList.remove('hidden');
        if (activeBtn) {
            activeBtn.classList.remove('text-ink-500', 'hover:bg-surface-muted');
            activeBtn.classList.add('text-brand-600', 'bg-brand-50', 'border', 'border-brand-200');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Render 1. Sales Trend Chart
        const chartLabels = @json($chartLabels);
        const chartRevenue = @json($chartRevenue);
        const chartOrders = @json($chartOrders);

        const trendOptions = {
            series: [{
                name: 'Net Revenue (LKR)',
                type: 'column',
                data: chartRevenue
            }, {
                name: 'Orders Count',
                type: 'line',
                data: chartOrders
            }],
            chart: {
                height: 320,
                type: 'line',
                toolbar: { show: false },
                fontFamily: 'Cabin, sans-serif'
            },
            colors: ['#0da487', '#215ada'],
            stroke: {
                width: [0, 3],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    borderRadius: 4
                }
            },
            dataLabels: { enabled: false },
            xaxis: {
                categories: chartLabels,
                labels: {
                    style: { colors: '#64748b', fontSize: '12px' }
                }
            },
            yaxis: [{
                title: { text: 'Revenue (LKR)', style: { color: '#0da487' } },
                labels: {
                    formatter: function (val) {
                        return 'LKR ' + Number(val).toLocaleString();
                    },
                    style: { colors: '#64748b' }
                }
            }, {
                opposite: true,
                title: { text: 'Orders Count', style: { color: '#215ada' } },
                labels: {
                    formatter: function (val) {
                        return Math.round(val);
                    },
                    style: { colors: '#64748b' }
                }
            }],
            grid: {
                borderColor: '#e2e8f0',
                strokeDashArray: 4
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            }
        };

        const salesChart = new ApexCharts(document.querySelector("#sales-trend-chart"), trendOptions);
        salesChart.render();

        // Render 2. Payment Method Chart
        const codCount = {{ $codOrdersCount }};
        const cardCount = {{ $cardOrdersCount }};

        const paymentOptions = {
            series: [codCount, cardCount],
            labels: ['Cash on Delivery (COD)', 'Card Pay Online'],
            chart: {
                type: 'donut',
                height: 220,
                fontFamily: 'Cabin, sans-serif'
            },
            colors: ['#f5b24f', '#426de0'],
            legend: {
                position: 'bottom',
                fontSize: '12px'
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return Math.round(val) + "%";
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%'
                    }
                }
            }
        };

        const paymentChart = new ApexCharts(document.querySelector("#payment-method-chart"), paymentOptions);
        paymentChart.render();
    });
</script>
@endsection
