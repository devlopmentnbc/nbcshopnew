@extends('admin.layouts.app')

@section('title', 'Order #' . $order->order_number . ' - Admin')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.orders.index') }}" class="inline-flex h-10 w-10 items-center justify-center rounded-base border border-surface-line bg-surface-card text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-5 w-5"></i>
            </a>
            <div>
                <h1 class="text-[24px] font-semibold text-ink-900 flex items-center gap-3">
                    Order #{{ $order->order_number }}
                    @if (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']))
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-[12px] font-semibold text-amber-700 border border-amber-200">
                            <i data-lucide="banknote" class="h-3.5 w-3.5"></i> COD
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-50 px-3 py-1 text-[12px] font-semibold text-indigo-700 border border-indigo-200">
                            <i data-lucide="credit-card" class="h-3.5 w-3.5"></i> Card (Pay Online)
                        </span>
                    @endif
                </h1>
                <p class="mt-1 text-[14px] text-ink-500">Placed on {{ $order->created_at ? $order->created_at->format('F d, Y \a\t h:i A') : 'N/A' }}</p>
            </div>
        </div>

        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex h-10 items-center gap-2 rounded-base border border-danger-500/20 bg-danger-50 px-4 text-[14px] font-semibold text-danger-600 hover:bg-danger-100 transition-colors">
                <i data-lucide="trash-2" class="h-4 w-4"></i>
                Delete Order
            </button>
        </form>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-base border border-success-600/20 bg-success-50 p-4 text-success-700">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="h-5 w-5 text-success-600"></i>
                <p class="text-[14px] font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Left 2 Columns: Items & Address -->
        <div class="space-y-6 lg:col-span-2">
            <!-- Order Items Card -->
            <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-4 mb-4 flex items-center justify-between">
                    <span>Ordered Items ({{ $order->items->count() }})</span>
                    <span class="text-[14px] font-normal text-ink-500">Subtotal: LKR {{ number_format($order->subtotal_lkr, 2) }}</span>
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-[14px]">
                        <thead>
                            <tr class="border-b border-surface-line text-[12px] uppercase text-ink-400">
                                <th class="pb-3 pr-4 font-semibold">Item</th>
                                <th class="pb-3 pr-4 font-semibold text-right">Price</th>
                                <th class="pb-3 pr-4 font-semibold text-center">Qty</th>
                                <th class="pb-3 text-right font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-line">
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="py-4 pr-4">
                                        <div class="flex items-center gap-3">
                                            @if ($item->image)
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="h-12 w-12 rounded-base bg-surface-body object-cover border border-surface-line">
                                            @else
                                                <div class="flex h-12 w-12 items-center justify-center rounded-base bg-surface-muted text-ink-400 text-[11px] border border-surface-line">No Image</div>
                                            @endif
                                            <div>
                                                <p class="font-semibold text-ink-900">{{ $item->name }}</p>
                                                @if (!empty($item->attributes) && is_array($item->attributes))
                                                    <div class="flex flex-wrap gap-1 mt-1">
                                                        @foreach ($item->attributes as $key => $val)
                                                            <span class="inline-flex rounded border border-surface-line bg-surface-body px-1.5 py-0.5 text-[11px] text-ink-600">
                                                                {{ is_numeric($key) ? $val : ucfirst($key) . ': ' . $val }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 pr-4 text-right font-medium text-ink-700">
                                        LKR {{ number_format($item->price_lkr, 2) }}
                                    </td>
                                    <td class="py-4 pr-4 text-center font-bold text-ink-900">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="py-4 text-right font-semibold text-ink-900">
                                        LKR {{ number_format($item->line_total_lkr, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Totals Breakdown -->
                <div class="mt-6 border-t border-surface-line pt-4 space-y-2 text-[14px]">
                    <div class="flex justify-between text-ink-600">
                        <span>Items Subtotal:</span>
                        <span class="font-semibold text-ink-900">LKR {{ number_format($order->subtotal_lkr, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-ink-600">
                        <span>Shipping Fee:</span>
                        <span class="font-semibold text-ink-900">
                            {{ $order->shipping_fee_lkr > 0 ? 'LKR ' . number_format($order->shipping_fee_lkr, 2) : 'Free Shipping' }}
                        </span>
                    </div>
                    <div class="flex justify-between text-[18px] font-bold text-brand-600 border-t border-surface-line pt-3 mt-3">
                        <span>Grand Total:</span>
                        <span>LKR {{ number_format($order->total_lkr, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Customer Notes -->
            @if ($order->notes)
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                    <h3 class="text-[16px] font-semibold text-ink-900 mb-2">Order Notes / Instructions</h3>
                    <p class="text-[14px] text-ink-600 bg-surface-body p-4 rounded-base border border-surface-line italic">
                        "{{ $order->notes }}"
                    </p>
                </div>
            @endif

            <!-- Addresses Card -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <!-- Billing Address -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                    <h3 class="text-[15px] font-semibold text-ink-900 border-b border-surface-line pb-3 mb-3 flex items-center gap-2">
                        <i data-lucide="receipt" class="h-4 w-4 text-brand-600"></i>
                        Billing Address
                    </h3>
                    <div class="text-[14px] text-ink-700 space-y-1">
                        <p class="font-semibold text-ink-900">{{ $order->name }}</p>
                        <p>{{ $order->billing_address_line1 }}</p>
                        @if ($order->billing_address_line2) <p>{{ $order->billing_address_line2 }}</p> @endif
                        <p>{{ $order->billing_city }}@if ($order->billing_state), {{ $order->billing_state }}@endif</p>
                        <p>{{ $order->billing_country }} {{ $order->billing_postal_code ? ' - ' . $order->billing_postal_code : '' }}</p>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                    <h3 class="text-[15px] font-semibold text-ink-900 border-b border-surface-line pb-3 mb-3 flex items-center gap-2">
                        <i data-lucide="truck" class="h-4 w-4 text-brand-600"></i>
                        Shipping Address
                    </h3>
                    @if ($order->delivery_same_as_billing)
                        <span class="inline-block rounded bg-surface-muted px-2 py-1 text-[12px] font-medium text-ink-500 mb-2">Same as billing address</span>
                        <div class="text-[14px] text-ink-700 space-y-1">
                            <p class="font-semibold text-ink-900">{{ $order->name }}</p>
                            <p>{{ $order->billing_address_line1 }}</p>
                            <p>{{ $order->billing_city }}, {{ $order->billing_country }}</p>
                        </div>
                    @else
                        <div class="text-[14px] text-ink-700 space-y-1">
                            <p class="font-semibold text-ink-900">{{ $order->name }}</p>
                            <p>{{ $order->delivery_address_line1 }}</p>
                            @if ($order->delivery_address_line2) <p>{{ $order->delivery_address_line2 }}</p> @endif
                            <p>{{ $order->delivery_city }}@if ($order->delivery_state), {{ $order->delivery_state }}@endif</p>
                            <p>{{ $order->delivery_country }} {{ $order->delivery_postal_code ? ' - ' . $order->delivery_postal_code : '' }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column: Status & Customer Info -->
        <div class="space-y-6">
            <!-- Management Card -->
            <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-4 mb-4">Order Management</h3>
                
                <!-- Order Status Form -->
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mb-6">
                    @csrf
                    @method('PATCH')
                    <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-2">Order Fulfillment Status</label>
                    <div class="flex gap-2">
                        <select name="status" class="h-10 flex-1 rounded-base border border-surface-line bg-surface-body px-3 text-[14px] font-semibold text-ink-800 focus:border-brand-600 focus:outline-none">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="h-10 rounded-base bg-brand-600 px-4 text-[13px] font-semibold text-white hover:bg-brand-700 transition-colors">
                            Update
                        </button>
                    </div>
                </form>

                <!-- Payment Status Form -->
                <form action="{{ route('admin.orders.updatePaymentStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-2">Payment Status</label>
                    <div class="flex gap-2">
                        <select name="payment_status" class="h-10 flex-1 rounded-base border border-surface-line bg-surface-body px-3 text-[14px] font-semibold text-ink-800 focus:border-brand-600 focus:outline-none">
                            <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                        <button type="submit" class="h-10 rounded-base bg-brand-600 px-4 text-[13px] font-semibold text-white hover:bg-brand-700 transition-colors">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <!-- Customer Details Card -->
            <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-4 mb-4">Customer Details</h3>
                <div class="space-y-3 text-[14px]">
                    <div>
                        <span class="text-[12px] uppercase text-ink-400 font-semibold block">Customer Name</span>
                        <span class="font-semibold text-ink-900">{{ $order->name }}</span>
                    </div>
                    <div>
                        <span class="text-[12px] uppercase text-ink-400 font-semibold block">Phone Number</span>
                        <span class="font-mono text-ink-800">{{ $order->phone }}</span>
                    </div>
                    <div>
                        <span class="text-[12px] uppercase text-ink-400 font-semibold block">Email Address</span>
                        <a href="mailto:{{ $order->email }}" class="text-brand-600 hover:underline">{{ $order->email }}</a>
                    </div>
                    <div>
                        <span class="text-[12px] uppercase text-ink-400 font-semibold block">Account Type</span>
                        @if ($order->user_id)
                            <span class="inline-flex items-center gap-1 rounded bg-brand-50 px-2 py-0.5 text-[12px] font-semibold text-brand-600">
                                <i data-lucide="user-check" class="h-3.5 w-3.5"></i> Registered User (#{{ $order->user_id }})
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded bg-surface-muted px-2 py-0.5 text-[12px] font-semibold text-ink-600">
                                <i data-lucide="user-x" class="h-3.5 w-3.5"></i> Guest Checkout
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
