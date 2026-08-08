@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - Nature\'s Beauty Creations')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Welcome Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3 text-left">
        <div>
            <h1 class="lg:text-[24px] text-[20px] font-semibold text-ink-900">
                Welcome back, {{ Auth::user() ? Auth::user()->name : 'Admin' }} 👋
            </h1>
            <p class="mt-1 text-[14px] text-ink-500">Here's real-time sales, order, and product reports for Nature's Beauty Creations.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.orders.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 transition-colors hover:bg-surface-muted">
                <i data-lucide="shopping-bag" class="h-4 w-4 text-brand-600"></i>
                View All Orders
            </a>
            <a href="{{ route('admin.products.create') }}" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                <i data-lucide="plus" class="h-4 w-4"></i>
                Add Product
            </a>
        </div>
    </div>

    <!-- Banner -->


    <!-- Metric Cards -->
    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4" aria-label="Dashboard metrics">
        <!-- Total Revenue -->
        <article class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex items-center justify-between gap-4">
                <div class="border-l-2 border-admin-teal pl-3">
                    <p class="text-[14px] font-medium text-ink-400">Total Revenue</p>
                    <div class="mt-1 flex flex-wrap items-center gap-2">
                        <strong class="text-[24px] font-bold leading-none text-ink-900">LKR {{ number_format($totalRevenue, 2) }}</strong>
                    </div>
                    <p class="text-[12px] text-ink-500 mt-1">Paid & Completed Orders</p>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-base bg-success-50 text-admin-teal">
                    <i data-lucide="circle-dollar-sign" class="h-6 w-6"></i>
                </div>
            </div>
        </article>

        <!-- Total Orders -->
        <article class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex items-center justify-between gap-4">
                <div class="border-l-2 border-brand-500 pl-3">
                    <p class="text-[14px] font-medium text-ink-400">Total Orders</p>
                    <div class="mt-1 flex flex-wrap items-center gap-2">
                        <strong class="text-[26px] font-bold leading-none text-ink-900">{{ number_format($totalOrders) }}</strong>
                    </div>
                    <p class="text-[12px] text-ink-500 mt-1">
                        <span class="text-amber-600 font-semibold">{{ $codOrdersCount }} COD</span> · 
                        <span class="text-indigo-600 font-semibold">{{ $cardOrdersCount }} Card</span>
                    </p>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-base bg-brand-50 text-brand-600">
                    <i data-lucide="shopping-cart" class="h-6 w-6"></i>
                </div>
            </div>
        </article>

        <!-- Total Products -->
        <article class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex items-center justify-between gap-4">
                <div class="border-l-2 border-danger-500 pl-3">
                    <p class="text-[14px] font-medium text-ink-400">Total Products</p>
                    <div class="mt-1 flex flex-wrap items-center gap-2">
                        <strong class="text-[26px] font-bold leading-none text-ink-900">{{ number_format($totalProducts) }}</strong>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="text-[12px] font-semibold text-danger-500 hover:underline mt-1 block">Manage Catalog &rarr;</a>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-base bg-danger-50 text-danger-500">
                    <i data-lucide="package" class="h-6 w-6"></i>
                </div>
            </div>
        </article>

        <!-- Total Customers -->
        <article class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex items-center justify-between gap-4">
                <div class="border-l-2 border-purple-500 pl-3">
                    <p class="text-[14px] font-medium text-ink-400">Total Customers</p>
                    <div class="mt-1 flex flex-wrap items-center gap-2">
                        <strong class="text-[26px] font-bold leading-none text-ink-900">{{ number_format($totalCustomers) }}</strong>
                    </div>
                    <p class="text-[12px] text-ink-500 mt-1">Registered Customer Accounts</p>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-base bg-purple-50 text-purple-600">
                    <i data-lucide="users" class="h-6 w-6"></i>
                </div>
            </div>
        </article>
    </section>

    <!-- Categories Real Overview -->
    <!-- <section class="mt-6 rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <div class="flex items-center justify-between gap-3">
            <h2 class="text-[20px] font-semibold text-ink-900">Product Categories ({{ $categories->count() }})</h2>
            <a href="{{ route('admin.categories.index') }}" class="text-[14px] font-semibold text-brand-600 hover:text-brand-700">View all categories &rarr;</a>
        </div>
        <div class="no-scrollbar mt-5 flex flex-nowrap gap-5 overflow-x-auto pb-2">
            @forelse ($categories as $cat)
                <a href="{{ route('admin.products.index', ['category_id' => $cat->id]) }}" class="group min-w-[120px] text-center">
                    <span class="mx-auto flex h-[90px] w-[90px] items-center justify-center rounded-full border border-surface-line bg-surface-body p-2 transition duration-300 group-hover:border-brand-500">
                        @if ($cat->image)
                            <img src="{{ asset($cat->image) }}" alt="{{ $cat->name }}" class="h-full w-full object-contain transition-transform duration-300 group-hover:scale-110 rounded-full">
                        @else
                            <span class="text-ink-500 font-bold text-lg">
                                {{ strtoupper(substr($cat->name, 0, 2)) }}
                            </span>
                        @endif
                    </span>
                    <span class="mt-2 block truncate text-[14px] font-semibold text-ink-800 transition-colors group-hover:text-brand-600">
                        {{ $cat->name }}
                    </span>
                    <span class="text-[12px] text-ink-400 block">
                        {{ $cat->products_count }} {{ Str::plural('Product', $cat->products_count) }}
                    </span>
                </a>
            @empty
                <p class="text-ink-400 text-sm py-4">No categories configured yet.</p>
            @endforelse
        </div>
    </section> -->

    <!-- Recent Orders & Best Selling Products -->
    <section class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-2">
        <!-- Recent Orders -->
        <article class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-surface-line pb-4">
                <h2 class="text-[18px] font-semibold text-ink-900">Recent Orders</h2>
                <a href="{{ route('admin.orders.index') }}" class="text-[13px] font-semibold text-brand-600 hover:underline">View All Orders &rarr;</a>
            </div>
            <div class="dashboard-scrollbar overflow-x-auto mt-2">
                <table class="w-full min-w-[500px] text-left text-[14px]">
                    <thead>
                        <tr class="text-[12px] uppercase text-ink-400 border-b border-surface-line">
                            <th scope="col" class="py-3 pr-4 font-semibold">Order</th>
                            <th scope="col" class="py-3 pr-4 font-semibold">Customer</th>
                            <th scope="col" class="py-3 pr-4 font-semibold">Payment</th>
                            <th scope="col" class="py-3 pr-4 font-semibold">Status</th>
                            <th scope="col" class="py-3 font-semibold text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($recentOrders as $order)
                            <tr class="hover:bg-surface-body/70 transition-colors">
                                <td class="py-3 pr-4">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="font-semibold text-brand-600 hover:underline block">
                                        #{{ $order->order_number }}
                                    </a>
                                    <span class="text-[11px] text-ink-400">{{ $order->created_at ? $order->created_at->format('M d, Y') : '' }}</span>
                                </td>
                                <td class="py-3 pr-4 text-ink-800">
                                    <p class="font-medium text-[13px] text-ink-900">{{ $order->name }}</p>
                                    <p class="text-[11px] text-ink-400 font-mono">{{ $order->phone }}</p>
                                </td>
                                <td class="py-3 pr-4">
                                    @if (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']))
                                        <span class="inline-flex items-center gap-1 rounded bg-amber-50 px-2 py-0.5 text-[11px] font-semibold text-amber-700">
                                            COD
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded bg-indigo-50 px-2 py-0.5 text-[11px] font-semibold text-indigo-700">
                                            Card
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3 pr-4">
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[11px] font-semibold
                                        {{ $order->status === 'completed' ? 'bg-success-50 text-success-600' : '' }}
                                        {{ $order->status === 'processing' ? 'bg-brand-50 text-brand-600' : '' }}
                                        {{ $order->status === 'pending' ? 'bg-amber-50 text-amber-600' : '' }}
                                        {{ $order->status === 'cancelled' ? 'bg-danger-50 text-danger-500' : '' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="py-3 text-right font-semibold text-ink-900 text-[13px]">
                                    LKR {{ number_format($order->total_lkr, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-ink-400 text-sm">
                                    No orders recorded yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </article>

        <!-- Top Performing Products -->
        <article class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-surface-line pb-4">
                <h2 class="text-[18px] font-semibold text-ink-900">Top Performing Products</h2>
                <a href="{{ route('admin.products.index') }}" class="text-[13px] font-semibold text-brand-600 hover:underline">View Catalog &rarr;</a>
            </div>

            <div class="dashboard-scrollbar overflow-x-auto mt-2">
                <table class="w-full min-w-[500px] text-left">
                    <thead>
                        <tr class="text-[12px] uppercase text-ink-400 border-b border-surface-line">
                            <th scope="col" class="py-3 pr-4 font-semibold">Product</th>
                            <th scope="col" class="py-3 pr-4 font-semibold text-center">Price</th>
                            <th scope="col" class="py-3 pr-4 font-semibold text-center">Units Sold</th>
                            <th scope="col" class="py-3 font-semibold text-right">Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($bestSellingItems as $item)
                            <tr class="hover:bg-surface-body/70 transition-colors">
                                <td class="py-3 pr-4">
                                    <div class="flex items-center gap-3">
                                        @if (!empty($item->image))
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="h-10 w-10 rounded-base bg-surface-body object-cover border border-surface-line">
                                        @else
                                            <div class="flex h-10 w-10 items-center justify-center rounded-base bg-surface-muted text-ink-400 text-[10px] border border-surface-line">NBC</div>
                                        @endif
                                        <span class="font-semibold text-ink-900 text-[13px] truncate max-w-[180px] block">
                                            {{ $item->name }}
                                        </span>
                                    </div>
                                </td>
                                <td class="py-3 pr-4 text-center text-[13px] text-ink-700">
                                    LKR {{ number_format($item->price_lkr, 2) }}
                                </td>
                                <td class="py-3 pr-4 text-center">
                                    <span class="inline-flex items-center rounded bg-brand-50 px-2 py-0.5 text-[12px] font-bold text-brand-600">
                                        {{ $item->total_qty }}
                                    </span>
                                </td>
                                <td class="py-3 text-right font-semibold text-ink-900 text-[13px]">
                                    LKR {{ number_format($item->total_amount, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-ink-400 text-sm">
                                    No sales data recorded yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </article>
    </section>

    <!-- Payment Methods Quick Action & Breakdown -->
    <section class="mt-6 rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <h2 class="text-[18px] font-semibold text-ink-900 mb-4">Payment Method Summary</h2>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!-- COD Box -->
            <div class="rounded-base border border-amber-200 bg-amber-50/50 p-5 flex items-center justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 text-[14px] font-bold text-amber-800">
                        <i data-lucide="banknote" class="h-5 w-5 text-amber-600"></i>
                        Cash on Delivery (COD)
                    </span>
                    <p class="text-[24px] font-bold text-amber-900 mt-2">{{ $codOrdersCount }} Orders</p>
                    <p class="text-[13px] text-amber-700 mt-1">Orders paid upon customer delivery</p>
                </div>
                <a href="{{ route('admin.orders.index', ['payment_method' => 'cod']) }}" class="inline-flex h-10 items-center rounded-base bg-amber-600 px-4 text-[13px] font-semibold text-white hover:bg-amber-700 transition-colors">
                    Filter COD &rarr;
                </a>
            </div>

            <!-- Card Box -->
            <div class="rounded-base border border-indigo-200 bg-indigo-50/50 p-5 flex items-center justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 text-[14px] font-bold text-indigo-800">
                        <i data-lucide="credit-card" class="h-5 w-5 text-indigo-600"></i>
                        Card Payment (CyberSource)
                    </span>
                    <p class="text-[24px] font-bold text-indigo-900 mt-2">{{ $cardOrdersCount }} Orders</p>
                    <p class="text-[13px] text-indigo-700 mt-1">Orders paid online via credit/debit card</p>
                </div>
                <a href="{{ route('admin.orders.index', ['payment_method' => 'card']) }}" class="inline-flex h-10 items-center rounded-base bg-indigo-600 px-4 text-[13px] font-semibold text-white hover:bg-indigo-700 transition-colors">
                    Filter Card &rarr;
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
