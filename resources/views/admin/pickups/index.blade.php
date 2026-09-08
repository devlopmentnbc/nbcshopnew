@extends('admin.layouts.app')

@section('title', 'Courier Pickups - Admin')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">

    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Courier Pickups</h1>
            <p class="mt-1 text-[14px] text-ink-500">Select orders, view weight totals, and schedule a Citypak courier pickup.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="#pickup-history" class="inline-flex h-10 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="history" class="h-4 w-4"></i>
                Pickup History
            </a>
            <a href="{{ route('admin.orders.index') }}" class="inline-flex h-10 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="shopping-bag" class="h-4 w-4"></i>
                All Orders
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-base border border-success-600/20 bg-success-50 p-4 text-success-700">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="h-5 w-5 text-success-600"></i>
                <p class="text-[14px] font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-base border border-danger-600/20 bg-danger-50 p-4 text-danger-700">
            <div class="flex items-center gap-3">
                <i data-lucide="alert-circle" class="h-5 w-5 text-danger-600"></i>
                <p class="text-[14px] font-medium">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-base border border-danger-600/20 bg-danger-50 p-4 text-danger-700">
            <ul class="list-disc pl-5 space-y-1 text-[13px]">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main Form -->
    <form action="{{ route('admin.pickups.store') }}" method="POST" id="pickup-schedule-form">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- LEFT: Orders Table (takes 2/3) -->
            <div class="lg:col-span-2">
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">

                    <!-- Table Heading -->
                    <div class="mb-4 flex flex-wrap items-center justify-between gap-3 border-b border-surface-line pb-4">
                        <div class="flex items-center gap-3">
                            <h2 class="text-[16px] font-semibold text-ink-900">Select Orders</h2>
                            <span class="inline-flex h-6 items-center rounded-full bg-brand-50 px-2.5 text-[12px] font-bold text-brand-700 border border-brand-200">
                                {{ count($pendingOrders) }} available
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" id="btn-select-all" class="inline-flex h-8 items-center gap-1.5 rounded-base border border-surface-line px-3 text-[12px] font-semibold text-ink-600 hover:bg-surface-muted transition-colors">
                                <i data-lucide="check-square" class="h-3.5 w-3.5 text-brand-600"></i> Select All
                            </button>
                            <button type="button" id="btn-deselect-all" class="inline-flex h-8 items-center gap-1.5 rounded-base border border-surface-line px-3 text-[12px] font-semibold text-ink-600 hover:bg-surface-muted transition-colors">
                                <i data-lucide="square" class="h-3.5 w-3.5 text-ink-400"></i> Clear
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    @if($pendingOrders->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[700px] text-left text-[14px]">
                                <thead>
                                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                                        <th class="pb-3 pr-3 w-10 text-center font-semibold">
                                            <input type="checkbox" id="checkbox-master" class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-500 cursor-pointer">
                                        </th>
                                        <th class="pb-3 pr-4 font-semibold">Order</th>
                                        <th class="pb-3 pr-4 font-semibold">Customer</th>
                                        <th class="pb-3 pr-4 font-semibold text-center">Qty</th>
                                        <th class="pb-3 pr-4 font-semibold text-right">Weight</th>
                                        <th class="pb-3 pr-4 font-semibold text-right">Total</th>
                                        <th class="pb-3 font-semibold text-center">Payment</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-surface-line">
                                    @foreach($pendingOrders as $order)
                                        @php
                                            $orderWeight = $order->total_weight_grams;
                                            $isCod = in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']);
                                            $codCollect = ($isCod && strtolower($order->payment_status) !== 'paid') ? $order->total_lkr : 0;
                                            $totalQty = $order->items->sum('quantity');
                                        @endphp
                                        <tr class="order-row hover:bg-surface-body/70 transition-colors cursor-pointer" data-order-id="{{ $order->id }}">
                                            <td class="py-4 pr-3 text-center" onclick="event.stopPropagation();">
                                                <input type="checkbox"
                                                       name="order_ids[]"
                                                       value="{{ $order->id }}"
                                                       class="order-checkbox h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-500 cursor-pointer"
                                                       data-weight="{{ $orderWeight }}"
                                                       data-cod="{{ $codCollect }}">
                                            </td>
                                            <td class="py-4 pr-4">
                                                <a href="{{ route('admin.orders.show', $order->id) }}" target="_blank" onclick="event.stopPropagation();" class="font-bold text-brand-600 hover:underline block text-[15px]">
                                                    #{{ $order->order_number }}
                                                </a>
                                                <span class="text-[12px] text-ink-400">{{ $order->created_at->format('M d, Y') }}</span>
                                            </td>
                                            <td class="py-4 pr-4">
                                                <p class="font-semibold text-ink-900 text-[13px]">{{ $order->name }}</p>
                                                <p class="text-ink-400 text-[12px]">{{ $order->delivery_city ?: ($order->billing_city ?: 'Colombo') }}</p>
                                            </td>
                                            <td class="py-4 pr-4 text-center text-[13px] text-ink-700">
                                                {{ $totalQty }} {{ Str::plural('item', $totalQty) }}
                                            </td>
                                            <td class="py-4 pr-4 text-right text-[13px] font-semibold text-ink-900">
                                                @if($orderWeight >= 1000)
                                                    {{ number_format($orderWeight / 1000, 2) }} kg
                                                @else
                                                    {{ $orderWeight }} g
                                                @endif
                                            </td>
                                            <td class="py-4 pr-4 text-right font-semibold text-ink-900 text-[14px]">
                                                LKR {{ number_format($order->total_lkr, 2) }}
                                            </td>
                                            <td class="py-4 text-center">
                                                @if($isCod)
                                                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2.5 py-0.5 text-[12px] font-bold text-amber-700 border border-amber-200">
                                                        <i data-lucide="banknote" class="h-3 w-3"></i> COD
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2.5 py-0.5 text-[12px] font-bold text-indigo-700 border border-indigo-200">
                                                        <i data-lucide="credit-card" class="h-3 w-3"></i> Card
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="py-12 text-center text-ink-400">
                            <i data-lucide="package-check" class="mx-auto h-10 w-10 mb-3 text-ink-300"></i>
                            <p class="text-[16px] font-semibold text-ink-700">No pending orders</p>
                            <p class="text-[14px] text-ink-400 mt-1">All orders have been assigned to pickups.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- RIGHT: Summary + Pickup Form (takes 1/3) -->
            <div class="lg:col-span-1 space-y-6 lg:sticky lg:top-20 self-start">

                <!-- Summary Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                    <h3 class="text-[14px] font-semibold text-ink-900 mb-4 flex items-center gap-2">
                        <i data-lucide="calculator" class="h-4 w-4 text-brand-600"></i>
                        Pickup Summary
                    </h3>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between py-2 border-b border-surface-line">
                            <span class="text-[13px] text-ink-500">Selected Orders</span>
                            <span class="text-[16px] font-bold text-ink-900" id="summary-count">0</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-surface-line">
                            <span class="text-[13px] text-ink-500">Total Weight</span>
                            <div class="text-right">
                                <span class="text-[16px] font-bold text-ink-900 block" id="summary-weight-formatted">0.00 kg</span>
                                <span class="text-[11px] text-ink-400" id="summary-weight-grams">0 grams</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-[13px] text-ink-500">COD to Collect</span>
                            <span class="text-[16px] font-bold text-ink-900" id="summary-cod">LKR 0.00</span>
                        </div>
                    </div>
                </div>

                <!-- Pickup Details Form -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
                    <h3 class="text-[14px] font-semibold text-ink-900 mb-4 flex items-center gap-2">
                        <i data-lucide="calendar" class="h-4 w-4 text-brand-600"></i>
                        Pickup Details
                    </h3>

                    <div class="space-y-4">
                        <!-- Date -->
                        <label class="block">
                            <span class="text-[13px] font-semibold text-ink-700">Pickup Date</span>
                            <input type="date" name="pickup_date" value="{{ old('pickup_date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}"
                                   class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none" required>
                        </label>

                        <!-- Time -->
                        <div class="grid grid-cols-2 gap-3">
                            <label class="block">
                                <span class="text-[13px] font-semibold text-ink-700">From</span>
                                <select name="pickup_from_time" class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                                    <option value="09:00" selected>09:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="13:00">01:00 PM</option>
                                    <option value="15:00">03:00 PM</option>
                                </select>
                            </label>
                            <label class="block">
                                <span class="text-[13px] font-semibold text-ink-700">To</span>
                                <select name="pickup_to_time" class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                                    <option value="12:00">12:00 PM</option>
                                    <option value="15:00">03:00 PM</option>
                                    <option value="18:00" selected>06:00 PM</option>
                                </select>
                            </label>
                        </div>

                        <!-- Contact -->
                        <label class="block">
                            <span class="text-[13px] font-semibold text-ink-700">Contact Person</span>
                            <input type="text" name="contact_person" value="{{ old('contact_person', $senderDefaults['contact_person']) }}"
                                   class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none" required>
                        </label>

                        <label class="block">
                            <span class="text-[13px] font-semibold text-ink-700">Contact Phone</span>
                            <input type="text" name="contact_number" value="{{ old('contact_number', $senderDefaults['contact_number']) }}"
                                   class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none" required>
                        </label>

                        <!-- Address -->
                        <label class="block">
                            <span class="text-[13px] font-semibold text-ink-700">Pickup Address</span>
                            <input type="text" name="address_line_1" value="{{ old('address_line_1', $senderDefaults['address_line_1']) }}"
                                   class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none" required>
                        </label>

                        <div class="grid grid-cols-2 gap-3">
                            <label class="block">
                                <span class="text-[13px] font-semibold text-ink-700">Address Line 2</span>
                                <input type="text" name="address_line_2" value="{{ old('address_line_2', $senderDefaults['address_line_2']) }}"
                                       class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                            </label>
                            <label class="block">
                                <span class="text-[13px] font-semibold text-ink-700">City</span>
                                <input type="text" name="city" value="{{ old('city', $senderDefaults['city']) }}"
                                       class="mt-1.5 h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none" required>
                            </label>
                        </div>

                        <!-- Notes -->
                        <label class="block">
                            <span class="text-[13px] font-semibold text-ink-700">Notes (optional)</span>
                            <textarea name="notes" rows="2" placeholder="Special instructions for courier..."
                                      class="mt-1.5 w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none"></textarea>
                        </label>

                        <!-- Submit -->
                        <button type="submit" id="btn-submit-pickup" disabled
                                class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-base bg-brand-600 text-[14px] font-semibold text-white hover:bg-brand-700 shadow-sm transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                            <i data-lucide="truck" class="h-4 w-4"></i>
                            <span id="submit-btn-text">Select orders first</span>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </form>

    <!-- Pickup History Section -->
    <div id="pickup-history" class="mt-10">
        <div class="mb-6">
            <h2 class="text-[20px] font-semibold text-ink-900">Pickup History</h2>
            <p class="mt-1 text-[14px] text-ink-500">Past scheduled courier pickups and their associated orders.</p>
        </div>

        <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            @if($pickups->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[800px] text-left text-[14px]">
                        <thead>
                            <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                                <th class="pb-3 pr-4 font-semibold">Pickup #</th>
                                <th class="pb-3 pr-4 font-semibold">Date & Time</th>
                                <th class="pb-3 pr-4 font-semibold">Contact</th>
                                <th class="pb-3 pr-4 font-semibold text-center">Orders</th>
                                <th class="pb-3 pr-4 font-semibold text-right">Weight</th>
                                <th class="pb-3 pr-4 font-semibold text-right">COD Total</th>
                                <th class="pb-3 pr-4 font-semibold text-center">Status</th>
                                <th class="pb-3 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-line">
                            @foreach($pickups as $pickup)
                                <tr class="hover:bg-surface-body/70 transition-colors">
                                    <td class="py-4 pr-4">
                                        <span class="font-bold text-brand-600 text-[15px]">{{ $pickup->pickup_number }}</span>
                                        @if($pickup->citypak_pickup_id)
                                            <span class="block text-[11px] text-ink-400 font-mono">API: {{ $pickup->citypak_pickup_id }}</span>
                                        @endif
                                    </td>
                                    <td class="py-4 pr-4 text-[13px]">
                                        <span class="font-semibold text-ink-900">{{ $pickup->pickup_date ? $pickup->pickup_date->format('M d, Y') : 'N/A' }}</span>
                                        <span class="block text-ink-400 text-[12px]">{{ $pickup->pickup_from_time }} – {{ $pickup->pickup_to_time }}</span>
                                    </td>
                                    <td class="py-4 pr-4 text-[13px]">
                                        <span class="text-ink-900">{{ $pickup->contact_person }}</span>
                                        <span class="block text-ink-400 text-[12px]">{{ $pickup->contact_number }}</span>
                                    </td>
                                    <td class="py-4 pr-4 text-center font-semibold text-ink-900">
                                        {{ $pickup->total_orders }}
                                    </td>
                                    <td class="py-4 pr-4 text-right font-semibold text-ink-900">
                                        {{ $pickup->formatted_weight }}
                                    </td>
                                    <td class="py-4 pr-4 text-right font-semibold text-ink-900">
                                        LKR {{ number_format($pickup->total_cod_amount, 2) }}
                                    </td>
                                    <td class="py-4 pr-4 text-center">
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[12px] font-bold text-emerald-700 border border-emerald-200">
                                            <i data-lucide="check-circle" class="h-3 w-3"></i> {{ $pickup->status }}
                                        </span>
                                    </td>
                                    <td class="py-4 text-right">
                                        <button type="button"
                                                class="btn-view-pickup-details inline-flex h-8 items-center gap-1 rounded-base border border-surface-line px-3 text-[13px] font-semibold text-brand-600 hover:bg-brand-50 transition-colors"
                                                data-pickup-id="{{ $pickup->id }}">
                                            <i data-lucide="eye" class="h-4 w-4"></i> View
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $pickups->links() }}
                </div>
            @else
                <div class="py-12 text-center text-ink-400">
                    <i data-lucide="clock" class="mx-auto h-10 w-10 mb-3 text-ink-300"></i>
                    <p class="text-[16px] font-semibold text-ink-700">No pickups yet</p>
                    <p class="text-[14px] text-ink-400 mt-1">Scheduled pickups will appear here.</p>
                </div>
            @endif
        </div>
    </div>
</main>

<!-- Pickup Orders Modal -->
<div id="pickup-details-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4" role="dialog" aria-modal="true">
    <div data-modal-backdrop="" class="absolute inset-0 bg-ink-900/50 transition-opacity duration-300"></div>
    <div class="relative w-full max-w-2xl rounded-card bg-surface-card shadow-lift overflow-hidden">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-surface-line px-6 py-4">
            <div class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-base bg-brand-50 text-brand-600">
                    <i data-lucide="truck" class="h-5 w-5"></i>
                </span>
                <div>
                    <h3 class="text-[16px] font-semibold text-ink-900" id="modal-pickup-title">Pickup Details</h3>
                    <p class="text-[13px] text-ink-500" id="modal-pickup-subtitle">Orders in this pickup</p>
                </div>
            </div>
            <button type="button" id="btn-close-modal" class="inline-flex h-8 w-8 items-center justify-center rounded-base text-ink-400 transition-colors hover:bg-surface-muted hover:text-ink-700">
                <i data-lucide="x" class="h-4 w-4"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="px-6 py-5 max-h-[60vh] overflow-y-auto" id="modal-orders-content">
            <div class="text-center py-8 text-ink-400">Loading...</div>
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-between border-t border-surface-line px-6 py-4">
            <span class="text-[13px] text-ink-500" id="modal-total-summary"></span>
            <button type="button" id="btn-modal-close" class="h-10 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 transition-colors hover:bg-surface-muted">
                Close
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const masterCheckbox = document.getElementById('checkbox-master');
    const checkboxes = document.querySelectorAll('.order-checkbox');
    const orderRows = document.querySelectorAll('.order-row');
    const summaryCount = document.getElementById('summary-count');
    const summaryWeightFormatted = document.getElementById('summary-weight-formatted');
    const summaryWeightGrams = document.getElementById('summary-weight-grams');
    const summaryCod = document.getElementById('summary-cod');
    const submitBtn = document.getElementById('btn-submit-pickup');
    const submitBtnText = document.getElementById('submit-btn-text');

    function updateSummary() {
        let count = 0, weight = 0, cod = 0;

        checkboxes.forEach(cb => {
            if (cb.checked) {
                count++;
                weight += parseInt(cb.dataset.weight || 0);
                cod += parseFloat(cb.dataset.cod || 0);
            }
        });

        summaryCount.textContent = count;
        summaryWeightGrams.textContent = weight.toLocaleString() + ' grams';
        summaryWeightFormatted.textContent = weight >= 1000
            ? (weight / 1000).toFixed(2) + ' kg'
            : weight + ' g';
        summaryCod.textContent = 'LKR ' + cod.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        if (count > 0) {
            submitBtn.disabled = false;
            submitBtnText.textContent = 'Schedule Pickup (' + count + (count === 1 ? ' order)' : ' orders)');
        } else {
            submitBtn.disabled = true;
            submitBtnText.textContent = 'Select orders first';
        }

        if (masterCheckbox && checkboxes.length > 0) {
            masterCheckbox.checked = count === checkboxes.length;
        }
    }

    // Row click toggles checkbox
    orderRows.forEach(row => {
        row.addEventListener('click', function(e) {
            if (e.target.tagName === 'INPUT' || e.target.tagName === 'A') return;
            const cb = this.querySelector('.order-checkbox');
            if (cb) { cb.checked = !cb.checked; updateSummary(); }
        });
    });

    checkboxes.forEach(cb => cb.addEventListener('change', updateSummary));

    if (masterCheckbox) {
        masterCheckbox.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = masterCheckbox.checked);
            updateSummary();
        });
    }

    document.getElementById('btn-select-all')?.addEventListener('click', function() {
        checkboxes.forEach(cb => cb.checked = true);
        updateSummary();
    });

    document.getElementById('btn-deselect-all')?.addEventListener('click', function() {
        checkboxes.forEach(cb => cb.checked = false);
        updateSummary();
    });

    // Modal logic
    const pickupModal = document.getElementById('pickup-details-modal');
    const modalContent = document.getElementById('modal-orders-content');
    const modalTitle = document.getElementById('modal-pickup-title');
    const modalSubtitle = document.getElementById('modal-pickup-subtitle');
    const modalSummary = document.getElementById('modal-total-summary');

    function closeModal() {
        pickupModal?.classList.add('hidden');
        pickupModal?.classList.remove('flex');
    }

    document.getElementById('btn-close-modal')?.addEventListener('click', closeModal);
    document.getElementById('btn-modal-close')?.addEventListener('click', closeModal);
    pickupModal?.addEventListener('click', function(e) { if (e.target === pickupModal) closeModal(); });

    document.querySelectorAll('.btn-view-pickup-details').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.pickupId;
            pickupModal.classList.remove('hidden');
            pickupModal.classList.add('flex');
            modalContent.innerHTML = '<div class="text-center py-8 text-ink-400">Loading...</div>';

            fetch('/admin/pickups/' + id)
                .then(r => r.json())
                .then(data => {
                    if (!data.success || !data.pickup) {
                        modalContent.innerHTML = '<p class="text-center py-6 text-danger-600">Failed to load.</p>';
                        return;
                    }
                    const p = data.pickup;
                    modalTitle.textContent = 'Pickup #' + p.pickup_number;
                    modalSubtitle.textContent = (p.pickup_date || '') + ' | ' + p.contact_person;

                    if (p.orders && p.orders.length) {
                        let html = '<div class="divide-y divide-surface-line">';
                        p.orders.forEach(o => {
                            html += '<div class="flex items-center justify-between py-3">'
                                + '<div>'
                                + '<p class="font-semibold text-ink-900 text-[14px]">#' + o.order_number + ' – ' + o.name + '</p>'
                                + '<p class="text-[12px] text-ink-400">' + (o.delivery_city || o.billing_city || 'Colombo') + ' | ' + o.phone + '</p>'
                                + (o.citypak_tracking_number ? '<p class="text-[12px] font-mono text-brand-600 mt-0.5">Tracking: ' + o.citypak_tracking_number + '</p>' : '')
                                + '</div>'
                                + '<div class="text-right">'
                                + '<p class="font-semibold text-ink-900">LKR ' + parseFloat(o.total_lkr).toLocaleString('en-US', {minimumFractionDigits:2}) + '</p>'
                                + '<a href="/admin/orders/' + o.id + '" target="_blank" class="text-[12px] text-brand-600 hover:underline font-semibold">View →</a>'
                                + '</div></div>';
                        });
                        html += '</div>';
                        modalContent.innerHTML = html;
                        const w = p.total_weight_grams >= 1000 ? (p.total_weight_grams/1000).toFixed(2)+' kg' : p.total_weight_grams+' g';
                        modalSummary.textContent = p.total_orders + ' orders | ' + w + ' | COD: LKR ' + parseFloat(p.total_cod_amount).toLocaleString('en-US',{minimumFractionDigits:2});
                    } else {
                        modalContent.innerHTML = '<p class="text-center py-6 text-ink-400">No orders linked to this pickup.</p>';
                    }
                    if (window.lucide) lucide.createIcons();
                })
                .catch(() => {
                    modalContent.innerHTML = '<p class="text-center py-6 text-danger-600">Error loading pickup details.</p>';
                });
        });
    });
});
</script>
@endsection
