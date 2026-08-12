@extends('admin.layouts.app')

@section('title', 'Order Management - Admin')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Orders</h1>
            <p class="mt-1 text-[14px] text-ink-500">Track, filter, and manage customer orders (Online, WhatsApp, Direct / Manual channel).</p>
        </div>
        <div>
            <a href="{{ route('admin.orders.create') }}" class="inline-flex h-10 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white hover:bg-brand-700 shadow-sm transition-colors">
                <i data-lucide="plus-circle" class="h-4 w-4"></i>
                Create Order Manually
            </a>
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



    <!-- Main Table Card -->
    <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        
        <!-- Quick Order Type Tabs -->
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4 border-b border-surface-line pb-4">
            <div class="flex flex-wrap items-center gap-2">
                @php $ot = request('order_type', 'all'); @endphp
                <a href="{{ route('admin.orders.index', array_merge(request()->except('order_type', 'page'), ['order_type' => 'all'])) }}" class="inline-flex h-9 items-center rounded-base px-3.5 text-[13px] font-semibold transition-colors {{ $ot === 'all' || !$ot ? 'bg-brand-600 text-white' : 'bg-surface-muted text-ink-700 hover:bg-surface-line' }}">
                    All Types ({{ $totalOrdersCount }})
                </a>
                <a href="{{ route('admin.orders.index', array_merge(request()->except('order_type', 'page'), ['order_type' => 'online'])) }}" class="inline-flex h-9 items-center gap-1.5 rounded-base px-3.5 text-[13px] font-semibold transition-colors {{ $ot === 'online' ? 'bg-blue-600 text-white' : 'bg-blue-50 text-blue-700 hover:bg-blue-100' }}">
                    <i data-lucide="globe" class="h-4 w-4"></i>
                    Online ({{ $onlineOrdersCount }})
                </a>
                <a href="{{ route('admin.orders.index', array_merge(request()->except('order_type', 'page'), ['order_type' => 'whatsapp'])) }}" class="inline-flex h-9 items-center gap-1.5 rounded-base px-3.5 text-[13px] font-semibold transition-colors {{ $ot === 'whatsapp' ? 'bg-emerald-600 text-white' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' }}">
                    <i data-lucide="message-square" class="h-4 w-4"></i>
                    WhatsApp ({{ $whatsappOrdersCount }})
                </a>
                <a href="{{ route('admin.orders.index', array_merge(request()->except('order_type', 'page'), ['order_type' => 'other'])) }}" class="inline-flex h-9 items-center gap-1.5 rounded-base px-3.5 text-[13px] font-semibold transition-colors {{ $ot === 'other' ? 'bg-purple-600 text-white' : 'bg-purple-50 text-purple-700 hover:bg-purple-100' }}">
                    <i data-lucide="file-text" class="h-4 w-4"></i>
                    Other Channel ({{ $otherOrdersCount }})
                </a>
            </div>

            @if(request()->hasAny(['search', 'payment_method', 'order_type', 'status', 'payment_status']))
                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1 text-[13px] font-medium text-danger-600 hover:underline">
                    <i data-lucide="x" class="h-4 w-4"></i> Clear Filters
                </a>
            @endif
        </div>

        <!-- Search and Filter Form Bar -->
        <form action="{{ route('admin.orders.index') }}" method="GET" class="mb-6 flex flex-wrap items-center gap-3">
            @if(request('order_type'))
                <input type="hidden" name="order_type" value="{{ request('order_type') }}">
            @endif

            <!-- Search input -->
            <div class="relative flex-1 min-w-[240px]">
                <i data-lucide="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search by Order #, Name, Phone, or Email..." class="h-10 w-full rounded-base border border-surface-line bg-surface-body pl-9 pr-4 text-[14px] text-ink-700 placeholder:text-ink-400 focus:border-brand-600 focus:outline-none">
            </div>

            <!-- Payment Method Filter -->
            <div class="w-44">
                <select name="payment_method" onchange="this.form.submit()" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                    <option value="all">All Payment Methods</option>
                    <option value="cod" {{ request('payment_method') === 'cod' ? 'selected' : '' }}>COD (Cash on Delivery)</option>
                    <option value="card" {{ request('payment_method') === 'card' ? 'selected' : '' }}>Card / Pay Online</option>
                    <option value="bank_transfer" {{ request('payment_method') === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                </select>
            </div>

            <!-- Order Status filter -->
            <div class="w-40">
                <select name="status" onchange="this.form.submit()" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                    <option value="all">All Order Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <!-- Payment Status filter -->
            <div class="w-40">
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
            <table class="w-full min-w-[1000px] text-left text-[14px]">
                <thead>
                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                        <th class="pb-3 pr-4 font-semibold">Order Details</th>
                        <th class="pb-3 pr-4 font-semibold">Type</th>
                        <th class="pb-3 pr-4 font-semibold">Customer</th>
                        <th class="pb-3 pr-4 font-semibold">Payment Method</th>
                        <th class="pb-3 pr-4 font-semibold">Payment Status</th>
                        <th class="pb-3 pr-4 font-semibold">Slip</th>
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

                            <!-- Order Type Badge -->
                            <td class="py-4 pr-4">
                                @if ($order->order_type === 'whatsapp')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[12px] font-bold text-emerald-700 border border-emerald-200">
                                        <i data-lucide="message-square" class="h-3 w-3"></i> WhatsApp
                                    </span>
                                @elseif ($order->order_type === 'other')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-purple-50 px-2.5 py-0.5 text-[12px] font-bold text-purple-700 border border-purple-200">
                                        <i data-lucide="file-text" class="h-3 w-3"></i> Other
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2.5 py-0.5 text-[12px] font-bold text-blue-700 border border-blue-200">
                                        <i data-lucide="globe" class="h-3 w-3"></i> Online
                                    </span>
                                @endif
                            </td>

                            <!-- Customer Info -->
                            <td class="py-4 pr-4">
                                <div class="text-[13px]">
                                    <p class="font-semibold text-ink-900">{{ $order->name }}</p>
                                    <p class="text-ink-500 font-mono text-[12px]">{{ $order->phone }}</p>
                                    <p class="text-ink-400 text-[12px] truncate max-w-[150px]">{{ $order->email }}</p>
                                </div>
                            </td>

                            <!-- Payment Method -->
                            <td class="py-4 pr-4">
                                @if (in_array(strtolower($order->payment_method), ['bank_transfer', 'bank']))
                                    <span class="inline-flex items-center gap-1 rounded-full bg-sky-50 px-2.5 py-0.5 text-[12px] font-semibold text-sky-700 border border-sky-200">
                                        <i data-lucide="landmark" class="h-3.5 w-3.5"></i> Bank Transfer
                                    </span>
                                @elseif (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']))
                                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2.5 py-0.5 text-[12px] font-semibold text-amber-700 border border-amber-200">
                                        <i data-lucide="banknote" class="h-3.5 w-3.5"></i> COD
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2.5 py-0.5 text-[12px] font-semibold text-indigo-700 border border-indigo-200">
                                        <i data-lucide="credit-card" class="h-3.5 w-3.5"></i> Card (Online)
                                    </span>
                                @endif
                            </td>

                            <!-- Payment Status Dropdown -->
                            <td class="py-4 pr-4">
                                <form action="{{ route('admin.orders.updatePaymentStatus', $order->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    @php
                                        $pStatus = strtolower(trim($order->payment_status ?? 'pending'));
                                        $psStyle = match($pStatus) {
                                            'paid' => "background-color: #16a34a !important; color: #ffffff !important; border: 1px solid #15803d !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 1.8rem !important;",
                                            'pending' => "background-color: #d97706 !important; color: #ffffff !important; border: 1px solid #b45309 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 1.8rem !important;",
                                            'failed', 'unpaid' => "background-color: #dc2626 !important; color: #ffffff !important; border: 1px solid #b91c1c !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 1.8rem !important;",
                                            default => "background-color: #4b5563 !important; color: #ffffff !important; border: 1px solid #374151 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important;",
                                        };
                                    @endphp
                                    <select name="payment_status" onchange="this.form.submit()" style="{!! $psStyle !!}" class="h-8 rounded-base px-3 text-[13px] font-bold focus:outline-none cursor-pointer">
                                        <option value="pending" {{ strtolower($order->payment_status) === 'pending' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Pending</option>
                                        <option value="paid" {{ strtolower($order->payment_status) === 'paid' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Paid</option>
                                        <option value="failed" {{ strtolower($order->payment_status) === 'failed' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Failed</option>
                                    </select>
                                </form>
                            </td>

                            <!-- Slip Indicator -->
                            <td class="py-4 pr-4">
                                @if ($order->payment_slip)
                                    <a href="{{ asset($order->payment_slip) }}" target="_blank" class="inline-flex items-center gap-1 rounded bg-emerald-100 px-2 py-1 text-[11px] font-bold text-emerald-800 hover:bg-emerald-200" title="View Payment Slip">
                                        <i data-lucide="paperclip" class="h-3.5 w-3.5"></i> Slip Attached
                                    </a>
                                @else
                                    <span class="text-[12px] text-ink-300 italic">No slip</span>
                                @endif
                            </td>

                            <!-- Order Status Dropdown -->
                            <td class="py-4 pr-4">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    @php
                                        $oStatus = strtolower(trim($order->status ?? 'pending'));
                                        $osStyle = match($oStatus) {
                                            'completed' => "background-color: #16a34a !important; color: #ffffff !important; border: 1px solid #15803d !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 1.8rem !important;",
                                            'processing' => "background-color: #2563eb !important; color: #ffffff !important; border: 1px solid #1d4ed8 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 1.8rem !important;",
                                            'pending' => "background-color: #d97706 !important; color: #ffffff !important; border: 1px solid #b45309 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 1.8rem !important;",
                                            'cancelled', 'canceled' => "background-color: #dc2626 !important; color: #ffffff !important; border: 1px solid #b91c1c !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 1.8rem !important;",
                                            default => "background-color: #4b5563 !important; color: #ffffff !important; border: 1px solid #374151 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important;",
                                        };
                                    @endphp
                                    <select name="status" onchange="this.form.submit()" style="{!! $osStyle !!}" class="h-8 rounded-base px-3 text-[13px] font-bold focus:outline-none cursor-pointer">
                                        <option value="pending" {{ strtolower($order->status) === 'pending' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Pending</option>
                                        <option value="processing" {{ strtolower($order->status) === 'processing' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Processing</option>
                                        <option value="completed" {{ strtolower($order->status) === 'completed' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Completed</option>
                                        <option value="cancelled" {{ strtolower($order->status) === 'cancelled' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Cancelled</option>
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
                            <td colspan="10" class="py-12 text-center text-ink-400">
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
