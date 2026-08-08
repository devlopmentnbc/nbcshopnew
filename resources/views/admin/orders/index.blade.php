@extends('admin.layouts.app')

@section('title', 'Order Management - Admin')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Orders</h1>
            <p class="mt-1 text-[14px] text-ink-500">Track, filter, and manage customer orders for Cash on Delivery (COD) and Card (Pay Online).</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-base border border-success-600/20 bg-success-50 p-4 text-success-700">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="h-5 w-5 text-success-600"></i>
                <p class="text-[14px] font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Metrics Bar -->
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Orders Card -->
        <a href="{{ route('admin.orders.index') }}" class="rounded-card border border-surface-line bg-surface-card p-5 shadow-card transition-all hover:border-brand-400">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[13px] font-semibold uppercase text-ink-400">Total Orders</p>
                    <h3 class="mt-2 text-[26px] font-bold text-ink-900">{{ number_format($totalOrdersCount) }}</h3>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-base bg-brand-50 text-brand-600">
                    <i data-lucide="shopping-bag" class="h-6 w-6"></i>
                </div>
            </div>
        </a>

        <!-- COD Orders Card -->
        <a href="{{ route('admin.orders.index', ['payment_method' => 'cod']) }}" class="rounded-card border {{ request('payment_method') === 'cod' ? 'border-amber-500 ring-2 ring-amber-200' : 'border-surface-line' }} bg-surface-card p-5 shadow-card transition-all hover:border-amber-400">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[13px] font-semibold uppercase text-amber-600">COD Orders</p>
                    <h3 class="mt-2 text-[26px] font-bold text-ink-900">{{ number_format($codOrdersCount) }}</h3>
                    <p class="text-[12px] text-ink-400 mt-1">Cash on Delivery</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-base bg-amber-50 text-amber-600">
                    <i data-lucide="banknote" class="h-6 w-6"></i>
                </div>
            </div>
        </a>

        <!-- Card (Online) Orders Card -->
        <a href="{{ route('admin.orders.index', ['payment_method' => 'card']) }}" class="rounded-card border {{ request('payment_method') === 'card' ? 'border-indigo-500 ring-2 ring-indigo-200' : 'border-surface-line' }} bg-surface-card p-5 shadow-card transition-all hover:border-indigo-400">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[13px] font-semibold uppercase text-indigo-600">Card / Online</p>
                    <h3 class="mt-2 text-[26px] font-bold text-ink-900">{{ number_format($cardOrdersCount) }}</h3>
                    <p class="text-[12px] text-ink-400 mt-1">CyberSource Payment</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-base bg-indigo-50 text-indigo-600">
                    <i data-lucide="credit-card" class="h-6 w-6"></i>
                </div>
            </div>
        </a>

        <!-- Revenue Card -->
        <div class="rounded-card border border-surface-line bg-surface-card p-5 shadow-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[13px] font-semibold uppercase text-success-600">Paid Revenue</p>
                    <h3 class="mt-2 text-[22px] font-bold text-ink-900">LKR {{ number_format($totalRevenue, 2) }}</h3>
                    <p class="text-[12px] text-ink-400 mt-1">Completed & Paid</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-base bg-success-50 text-success-600">
                    <i data-lucide="circle-dollar-sign" class="h-6 w-6"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        
        <!-- Filter Tabs & Quick Filters -->
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4 border-b border-surface-line pb-4">
            <!-- Payment Method Filter Tabs -->
            <div class="flex flex-wrap items-center gap-2">
                @php $pm = request('payment_method', 'all'); @endphp
                <a href="{{ route('admin.orders.index', array_merge(request()->except('payment_method', 'page'), ['payment_method' => 'all'])) }}" class="inline-flex h-9 items-center rounded-base px-3.5 text-[13px] font-semibold transition-colors {{ $pm === 'all' || !$pm ? 'bg-brand-600 text-white' : 'bg-surface-muted text-ink-700 hover:bg-surface-line' }}">
                    All Orders ({{ $totalOrdersCount }})
                </a>
                <a href="{{ route('admin.orders.index', array_merge(request()->except('payment_method', 'page'), ['payment_method' => 'cod'])) }}" class="inline-flex h-9 items-center gap-1.5 rounded-base px-3.5 text-[13px] font-semibold transition-colors {{ $pm === 'cod' ? 'bg-amber-600 text-white' : 'bg-amber-50 text-amber-700 hover:bg-amber-100' }}">
                    <i data-lucide="banknote" class="h-4 w-4"></i>
                    COD Orders ({{ $codOrdersCount }})
                </a>
                <a href="{{ route('admin.orders.index', array_merge(request()->except('payment_method', 'page'), ['payment_method' => 'card'])) }}" class="inline-flex h-9 items-center gap-1.5 rounded-base px-3.5 text-[13px] font-semibold transition-colors {{ $pm === 'card' ? 'bg-indigo-600 text-white' : 'bg-indigo-50 text-indigo-700 hover:bg-indigo-100' }}">
                    <i data-lucide="credit-card" class="h-4 w-4"></i>
                    Card / Online Orders ({{ $cardOrdersCount }})
                </a>
            </div>

            @if(request()->hasAny(['search', 'payment_method', 'status', 'payment_status']))
                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1.5 text-[13px] font-medium text-danger-600 hover:underline">
                    <i data-lucide="x" class="h-4 w-4"></i>
                    Clear All Filters
                </a>
            @endif
        </div>

        <!-- Search and Filter Form Bar -->
        <form action="{{ route('admin.orders.index') }}" method="GET" class="mb-6 flex flex-wrap items-center gap-3">
            @if(request('payment_method'))
                <input type="hidden" name="payment_method" value="{{ request('payment_method') }}">
            @endif

            <!-- Search input -->
            <div class="relative flex-1 min-w-[240px]">
                <i data-lucide="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search by Order #, Name, Phone, or Email..." class="h-10 w-full rounded-base border border-surface-line bg-surface-body pl-9 pr-4 text-[14px] text-ink-700 placeholder:text-ink-400 focus:border-brand-600 focus:outline-none">
            </div>

            <!-- Order Status filter -->
            <div class="w-44">
                <select name="status" onchange="this.form.submit()" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                    <option value="all">All Order Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <!-- Payment Status filter -->
            <div class="w-44">
                <select name="payment_status" onchange="this.form.submit()" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                    <option value="all">All Payment Statuses</option>
                    <option value="pending" {{ request('payment_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ request('payment_status') === 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="failed" {{ request('payment_status') === 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <button type="submit" class="h-10 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white hover:bg-brand-700 transition-colors">
                Search
            </button>
        </form>

        <!-- Orders Table -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-[960px] text-left text-[14px]">
                <thead>
                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                        <th class="pb-3 pr-4 font-semibold">Order Details</th>
                        <th class="pb-3 pr-4 font-semibold">Customer</th>
                        <th class="pb-3 pr-4 font-semibold">Payment Method</th>
                        <th class="pb-3 pr-4 font-semibold">Payment Status</th>
                        <th class="pb-3 pr-4 font-semibold">Order Status</th>
                        <th class="pb-3 pr-4 font-semibold">Total</th>
                        <th class="pb-3 pr-4 font-semibold">Date</th>
                        <th class="pb-3 pr-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-line">
                    @forelse ($orders as $order)
                        <tr class="hover:bg-surface-body/70 transition-colors">
                            <!-- Order Number & Items Count -->
                            <td class="py-4 pr-4">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="font-bold text-brand-600 hover:underline block text-[15px]">
                                    #{{ $order->order_number }}
                                </a>
                                <span class="text-[12px] text-ink-400">
                                    {{ $order->items->count() }} {{ Str::plural('item', $order->items->count()) }}
                                </span>
                            </td>

                            <!-- Customer Info -->
                            <td class="py-4 pr-4">
                                <div class="text-[13px]">
                                    <p class="font-semibold text-ink-900">{{ $order->name }}</p>
                                    <p class="text-ink-500 font-mono text-[12px]">{{ $order->phone }}</p>
                                    <p class="text-ink-400 text-[12px] truncate max-w-[180px]">{{ $order->email }}</p>
                                </div>
                            </td>

                            <!-- Payment Method (COD vs Card) -->
                            <td class="py-4 pr-4">
                                @if (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']))
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-[12px] font-semibold text-amber-700 border border-amber-200">
                                        <i data-lucide="banknote" class="h-3.5 w-3.5 text-amber-600"></i>
                                        COD (Cash on Delivery)
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-50 px-3 py-1 text-[12px] font-semibold text-indigo-700 border border-indigo-200">
                                        <i data-lucide="credit-card" class="h-3.5 w-3.5 text-indigo-600"></i>
                                        Card (Pay Online)
                                    </span>
                                @endif
                            </td>

                            <!-- Payment Status -->
                            <td class="py-4 pr-4">
                                <form action="{{ route('admin.orders.updatePaymentStatus', $order->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <select name="payment_status" onchange="this.form.submit()" class="h-8 rounded-base border border-surface-line bg-surface-body px-2 text-[12px] font-semibold focus:outline-none 
                                        {{ $order->payment_status === 'paid' ? 'text-success-600 bg-success-50 border-success-200' : '' }}
                                        {{ $order->payment_status === 'pending' ? 'text-warning-600 bg-warning-50 border-warning-200' : '' }}
                                        {{ $order->payment_status === 'failed' ? 'text-danger-600 bg-danger-50 border-danger-200' : '' }}">
                                        <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                                    </select>
                                </form>
                            </td>

                            <!-- Order Status Dropdown -->
                            <td class="py-4 pr-4">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="h-8 rounded-base border border-surface-line bg-surface-body px-2 text-[12px] font-semibold focus:outline-none
                                        {{ $order->status === 'completed' ? 'text-success-700 bg-success-50 border-success-300' : '' }}
                                        {{ $order->status === 'processing' ? 'text-brand-700 bg-brand-50 border-brand-300' : '' }}
                                        {{ $order->status === 'pending' ? 'text-amber-700 bg-amber-50 border-amber-300' : '' }}
                                        {{ $order->status === 'cancelled' ? 'text-danger-700 bg-danger-50 border-danger-300' : '' }}">
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>

                            <!-- Total LKR -->
                            <td class="py-4 pr-4 font-semibold text-ink-900 text-[14px]">
                                LKR {{ number_format($order->total_lkr, 2) }}
                            </td>

                            <!-- Order Date -->
                            <td class="py-4 pr-4 text-[13px] text-ink-500 whitespace-nowrap">
                                {{ $order->created_at ? $order->created_at->format('M d, Y') : 'N/A' }}
                                <span class="block text-[11px] text-ink-400">{{ $order->created_at ? $order->created_at->format('h:i A') : '' }}</span>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 pr-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-flex h-8 px-3 items-center gap-1 rounded-base border border-surface-line text-[13px] font-semibold text-brand-600 hover:bg-brand-50 transition-colors" title="View Order Details">
                                        <i data-lucide="eye" class="h-4 w-4"></i>
                                        View
                                    </a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete order #{{ $order->order_number }}?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-400 hover:bg-danger-50 hover:text-danger-500 transition-colors" title="Delete Order">
                                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-12 text-center text-ink-400">
                                <i data-lucide="shopping-bag-open" class="mx-auto h-10 w-10 mb-3 text-ink-300"></i>
                                <p class="text-[16px] font-semibold text-ink-700">No orders found</p>
                                <p class="text-[14px] text-ink-400 mt-1">Try adjusting your filters or search terms.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </div>
</main>
@endsection
