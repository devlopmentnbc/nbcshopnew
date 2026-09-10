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
                <h1 class="text-[24px] font-semibold text-ink-900 flex flex-wrap items-center gap-2.5">
                    Order #{{ $order->order_number }}
                    
                    <!-- Order Type Badge -->
                    @if ($order->order_type === 'whatsapp')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-[12px] font-bold text-emerald-700 border border-emerald-200">
                            <i data-lucide="message-square" class="h-3.5 w-3.5"></i> WhatsApp Order
                        </span>
                    @elseif ($order->order_type === 'other')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-purple-50 px-3 py-1 text-[12px] font-bold text-purple-700 border border-purple-200">
                            <i data-lucide="file-text" class="h-3.5 w-3.5"></i> Direct / Other Channel
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-[12px] font-bold text-blue-700 border border-blue-200">
                            <i data-lucide="globe" class="h-3.5 w-3.5"></i> Online Store
                        </span>
                    @endif

                    <!-- Payment Method Badge -->
                    @if (in_array(strtolower($order->payment_method), ['bank_transfer', 'bank']))
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-sky-50 px-3 py-1 text-[12px] font-semibold text-sky-700 border border-sky-200">
                            <i data-lucide="landmark" class="h-3.5 w-3.5"></i> Bank Transfer
                        </span>
                    @elseif (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']))
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

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Left 2 Columns: Items & Address & Slip -->
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

        <!-- Right Column: Management & Payment Slip -->
        <div class="space-y-6">
            <!-- Citypak Courier Fulfillment Card -->
            <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-3 flex items-center justify-between">
                    <span class="flex items-center gap-2">
                        <i data-lucide="truck" class="h-5 w-5 text-emerald-600"></i>
                        Citypak Courier Fulfillment
                    </span>
                    @if ($order->citypak_tracking_number || $order->citypak_order_id)
                        <span class="inline-flex items-center gap-1 rounded bg-emerald-50 px-2.5 py-0.5 text-[11px] font-bold text-emerald-700 border border-emerald-200">
                            Dispatched
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 rounded bg-amber-50 px-2.5 py-0.5 text-[11px] font-bold text-amber-700 border border-amber-200">
                            Not Dispatched
                        </span>
                    @endif
                </h3>

                @if ($order->citypak_tracking_number || $order->citypak_order_id)
                    <div class="space-y-3 text-[14px]">
                        <div class="grid grid-cols-2 gap-3 bg-surface-body p-3 rounded-base border border-surface-line">
                            <div>
                                <span class="text-[11px] uppercase text-ink-400 font-semibold block">Citypak Order ID</span>
                                <span class="font-bold text-ink-900">#{{ $order->citypak_order_id ?: 'N/A' }}</span>
                            </div>
                            <div>
                                <span class="text-[11px] uppercase text-ink-400 font-semibold block">Tracking Number</span>
                                <span class="font-mono font-bold text-brand-600">{{ $order->citypak_tracking_number ?: 'N/A' }}</span>
                            </div>
                            @if ($order->citypak_delivery_facility_code)
                                <div>
                                    <span class="text-[11px] uppercase text-ink-400 font-semibold block">Facility Code</span>
                                    <span class="text-ink-700">{{ $order->citypak_delivery_facility_code }}</span>
                                </div>
                            @endif
                            @if ($order->citypak_status)
                                <div>
                                    <span class="text-[11px] uppercase text-ink-400 font-semibold block">Latest Status</span>
                                    <span class="inline-flex items-center rounded bg-emerald-100 px-2 py-0.5 text-[11px] font-bold text-emerald-800">
                                        {{ $order->citypak_status }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Print Waybill PDF & Pickup Buttons -->
                        <div class="pt-2 flex flex-wrap gap-2">
                            <a href="{{ route('admin.orders.citypak.waybill', $order->id) }}" target="_blank" class="flex-1 h-9 rounded-base bg-brand-600 px-3 text-[13px] font-semibold text-white hover:bg-brand-700 transition-colors flex items-center justify-center gap-1.5">
                                <i data-lucide="printer" class="h-4 w-4"></i> Print Waybill (A4)
                            </a>
                            <a href="{{ route('admin.orders.citypak.waybill', [$order->id, 'page_size' => '4X6', 'per_page_waybill_count' => 1]) }}" target="_blank" class="h-9 rounded-base border border-surface-line bg-surface-body px-3 text-[13px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors flex items-center justify-center gap-1">
                                4x6 Label
                            </a>
                            <button type="button" onclick="openPickupModal(1, {{ max(500, intval($order->total_weight_grams)) }})" class="h-9 rounded-base bg-amber-600 px-3 text-[13px] font-semibold text-white hover:bg-amber-700 transition-colors flex items-center justify-center gap-1.5 cursor-pointer">
                                <i data-lucide="truck" class="h-4 w-4"></i> Request Pickup
                            </button>
                        </div>

                        <!-- Tracking History Section -->
                        @if (!empty($order->citypak_tracking_history))
                            <div class="pt-3 border-t border-surface-line">
                                <h4 class="text-[13px] font-semibold text-ink-800 mb-2">Delivery Activity Log</h4>
                                <div class="space-y-2 max-h-40 overflow-y-auto pr-1">
                                    @foreach (array_reverse($order->citypak_tracking_history) as $log)
                                        <div class="text-[12px] p-2 rounded bg-surface-body border border-surface-line flex justify-between items-center">
                                            <div>
                                                <span class="font-bold text-ink-900 block">{{ $log['status'] ?? ($log['status_type'] ?? 'UPDATE') }}</span>
                                                @if (!empty($log['reason']))
                                                    <span class="text-danger-600 block text-[11px]">{{ $log['reason'] }}</span>
                                                @endif
                                            </div>
                                            <span class="text-ink-400 font-mono text-[11px]">{{ $log['action_datetime'] ?? '' }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-[13px] text-ink-500">Dispatch this order to Citypak Courier for doorstep delivery in Sri Lanka.</p>
                    
                    <form action="{{ route('admin.orders.citypak.dispatch', $order->id) }}" method="POST" class="pt-2 space-y-3 border-t border-surface-line">
                        @csrf
                        <div>
                            <label class="block text-[12px] font-semibold text-ink-700 mb-1">Package Description (Max 128 chars)</label>
                            <input type="text" name="description" value="{{ Str::limit(implode(', ', $order->items->pluck('name')->toArray()), 120) }}" maxlength="128" required class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-800">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Weight (Grams)</label>
                                <input type="number" name="weight_g" value="{{ max(1, $order->total_weight_grams) }}" min="1" max="100000" required class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-800">
                            </div>
                            <div>
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Pieces Count</label>
                                <input type="number" name="number_of_pieces" value="{{ min(20, max(1, $order->items->sum('quantity'))) }}" min="1" max="20" required class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-800">
                            </div>
                        </div>

                        @if (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']) && strtolower($order->payment_status) !== 'paid')
                            <div>
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">COD Collection Amount (LKR)</label>
                                <input type="number" step="0.01" name="cash_on_delivery_amount" value="{{ $order->total_lkr }}" required class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] font-bold text-emerald-700">
                            </div>
                        @endif

                        <button type="submit" onclick="return confirm('Dispatch order #{{ $order->order_number }} to Citypak Courier?');" class="w-full h-10 rounded-base text-[14px] font-bold text-white transition-opacity hover:opacity-90 flex items-center justify-center gap-2 shadow-xs cursor-pointer" style="background-color: #059669 !important; color: #ffffff !important; border: 1px solid #047857 !important;">
                            <i data-lucide="send" class="h-4 w-4"></i> Dispatch to Citypak Courier Now
                        </button>
                    </form>
                @endif
            </div>
            <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
                <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-3">Order Management</h3>
                
                <!-- Order Status Form -->
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-2">Order Fulfillment Status</label>
                    <div class="flex gap-2">
                        @php
                            $oStatusShow = strtolower(trim($order->status ?? 'pending'));
                            $osShowStyle = match($oStatusShow) {
                                'completed' => "background-color: #16a34a !important; color: #ffffff !important; border: 1px solid #15803d !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 2rem !important;",
                                'processing' => "background-color: #2563eb !important; color: #ffffff !important; border: 1px solid #1d4ed8 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 2rem !important;",
                                'pending' => "background-color: #d97706 !important; color: #ffffff !important; border: 1px solid #b45309 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 2rem !important;",
                                'cancelled', 'canceled' => "background-color: #dc2626 !important; color: #ffffff !important; border: 1px solid #b91c1c !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 2rem !important;",
                                default => "background-color: #4b5563 !important; color: #ffffff !important; border: 1px solid #374151 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important;",
                            };
                        @endphp
                        <select name="status" style="{!! $osShowStyle !!}" class="h-10 flex-1 rounded-base px-3 text-[14px] font-bold focus:outline-none cursor-pointer">
                            <option value="pending" {{ strtolower($order->status) === 'pending' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Pending</option>
                            <option value="processing" {{ strtolower($order->status) === 'processing' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Processing</option>
                            <option value="completed" {{ strtolower($order->status) === 'completed' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Completed</option>
                            <option value="cancelled" {{ strtolower($order->status) === 'cancelled' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Cancelled</option>
                        </select>
                        <button type="submit" class="h-10 rounded-base bg-brand-600 px-4 text-[13px] font-semibold text-white hover:bg-brand-700 transition-colors">
                            Update
                        </button>
                    </div>
                </form>

                <!-- Payment Status Form -->
                <form action="{{ route('admin.orders.updatePaymentStatus', $order->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-2">Payment Status</label>
                    <div class="flex gap-2 mb-3">
                        @php
                            $pStatusShow = strtolower(trim($order->payment_status ?? 'pending'));
                            $psShowStyle = match($pStatusShow) {
                                'paid' => "background-color: #16a34a !important; color: #ffffff !important; border: 1px solid #15803d !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 2rem !important;",
                                'pending' => "background-color: #d97706 !important; color: #ffffff !important; border: 1px solid #b45309 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 2rem !important;",
                                'failed', 'unpaid' => "background-color: #dc2626 !important; color: #ffffff !important; border: 1px solid #b91c1c !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; background-image: url(\"data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3e%3cpath stroke=%27%23ffffff%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272.5%27 d=%27m6 8 4 4 4-4%27/%3e%3c/svg%3e\") !important; background-position: right 0.5rem center !important; background-repeat: no-repeat !important; background-size: 1.1em 1.1em !important; padding-left: 0.75rem !important; padding-right: 2rem !important;",
                                default => "background-color: #4b5563 !important; color: #ffffff !important; border: 1px solid #374151 !important; font-weight: 700 !important; border-radius: 8px !important; appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important;",
                            };
                        @endphp
                        <select name="payment_status" style="{!! $psShowStyle !!}" class="h-10 flex-1 rounded-base px-3 text-[14px] font-bold focus:outline-none cursor-pointer">
                            <option value="pending" {{ strtolower($order->payment_status) === 'pending' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Pending</option>
                            <option value="paid" {{ strtolower($order->payment_status) === 'paid' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Paid</option>
                            <option value="failed" {{ strtolower($order->payment_status) === 'failed' ? 'selected' : '' }} style="background-color: #fff !important; color: #333 !important;">Failed</option>
                        </select>
                        <button type="submit" class="h-10 rounded-base bg-brand-600 px-4 text-[13px] font-semibold text-white hover:bg-brand-700 transition-colors">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <!-- Payment Slip Card -->
            <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-3 flex items-center justify-between">
                    <span class="flex items-center gap-2">
                        <i data-lucide="file-check" class="h-5 w-5 text-brand-600"></i>
                        Payment Slip / Proof
                    </span>
                    @if ($order->payment_slip)
                        <span class="inline-flex items-center gap-1 rounded bg-emerald-50 px-2.5 py-0.5 text-[11px] font-bold text-emerald-700 border border-emerald-200">
                            Uploaded
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 rounded bg-amber-50 px-2.5 py-0.5 text-[11px] font-bold text-amber-700 border border-amber-200">
                            Missing
                        </span>
                    @endif
                </h3>

                @if ($order->payment_slip)
                    <div class="rounded-base border border-surface-line bg-surface-body p-3 text-center">
                        @php $ext = pathinfo($order->payment_slip, PATHINFO_EXTENSION); @endphp
                        @if (in_array(strtolower($ext), ['pdf']))
                            <div class="py-6">
                                <i data-lucide="file-text" class="mx-auto h-12 w-12 text-brand-600 mb-2"></i>
                                <p class="text-[13px] font-bold text-ink-800">PDF Payment Slip Document</p>
                            </div>
                        @else
                            <a href="{{ asset($order->payment_slip) }}" target="_blank" title="Click to view full image">
                                <img src="{{ asset($order->payment_slip) }}" alt="Payment Slip" class="mx-auto max-h-48 rounded border border-surface-line object-contain shadow-sm hover:opacity-90 transition-opacity">
                            </a>
                        @endif
                        <div class="mt-3 flex items-center justify-center gap-2">
                            <a href="{{ asset($order->payment_slip) }}" target="_blank" class="inline-flex items-center gap-1 text-[13px] font-semibold text-brand-600 hover:underline">
                                <i data-lucide="external-link" class="h-4 w-4"></i> View / Download Slip
                            </a>
                        </div>
                    </div>
                @else
                    <p class="text-[13px] text-ink-500">No payment slip image or document has been uploaded for this order yet.</p>
                @endif

                <!-- Upload / Replace Payment Slip Form -->
                <form action="{{ route('admin.orders.uploadSlip', $order->id) }}" method="POST" enctype="multipart/form-data" class="pt-2 border-t border-surface-line space-y-3">
                    @csrf
                    <label class="block text-[12px] font-semibold uppercase text-ink-500">
                        {{ $order->payment_slip ? 'Replace Slip Document' : 'Upload Payment Slip' }}
                    </label>
                    <input type="file" name="payment_slip" accept="image/*,application/pdf" required class="block w-full text-[12px] text-ink-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-base file:border-0 file:text-[12px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100">
                    <button type="submit" class="w-full h-9 rounded-base bg-brand-600 text-[13px] font-semibold text-white hover:bg-brand-700 transition-colors flex items-center justify-center gap-1.5">
                        <i data-lucide="upload" class="h-4 w-4"></i> Save Payment Slip
                    </button>
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
                                <i data-lucide="user-x" class="h-3.5 w-3.5"></i> Guest / Manual Customer
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('admin.components.citypak-pickup-modal')
@endsection
