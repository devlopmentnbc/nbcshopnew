@extends('admin.layouts.app')

@section('title', 'Domestic Shipping Settings - Admin NBC IT')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Domestic Shipping Settings (Sri Lanka)</h1>
            <p class="mt-1 text-[14px] text-ink-500">Configure base shipping fee for Sri Lanka and set free shipping minimum order threshold.</p>
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

    @if ($errors->any())
        <div class="mb-6 rounded-base border border-danger-500/20 bg-danger-50 p-4 text-danger-600">
            <ul class="list-disc pl-5 text-[14px]">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Content Card -->
    <div class="max-w-2xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <form action="{{ route('admin.settings.shipping.update') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="domestic_shipping_fee" class="block text-[14px] font-semibold text-ink-800 mb-1">
                    Base Domestic Shipping Fee (LKR) <span class="text-danger-500">*</span>
                </label>
                <p class="text-[13px] text-ink-400 mb-2">Standard shipping cost charged for orders delivered within Sri Lanka.</p>
                <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                    <span class="inline-flex items-center bg-surface-muted px-4 text-[14px] font-semibold text-ink-500 border-r border-surface-line select-none">LKR</span>
                    <input type="number" step="0.01" min="0" id="domestic_shipping_fee" name="domestic_shipping_fee"
                        value="{{ old('domestic_shipping_fee', $domesticFee) }}" required
                        class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-800 focus:outline-none">
                </div>
            </div>

            <div>
                <label for="free_shipping_threshold" class="block text-[14px] font-semibold text-ink-800 mb-1">
                    Free Shipping Threshold (LKR) <span class="text-danger-500">*</span>
                </label>
                <p class="text-[13px] text-ink-400 mb-2">Orders with subtotal greater than or equal to this amount in Sri Lanka receive <strong>FREE Shipping</strong> (0 LKR).</p>
                <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                    <span class="inline-flex items-center bg-surface-muted px-4 text-[14px] font-semibold text-ink-500 border-r border-surface-line select-none">LKR</span>
                    <input type="number" step="0.01" min="0" id="free_shipping_threshold" name="free_shipping_threshold"
                        value="{{ old('free_shipping_threshold', $freeThreshold) }}" required
                        class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-800 focus:outline-none">
                </div>
            </div>

            <!-- Allowed Payment Methods Ticks Section -->
            <div class="pt-6 border-t border-surface-line">
                <label class="block text-[15px] font-semibold text-ink-900 mb-1">
                    Allowed Payment Methods for Shipping
                </label>
                <p class="text-[13px] text-ink-500 mb-4">Select which payment methods are available for domestic delivery orders. Tick the boxes to activate.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- COD Availability Checkbox Card -->
                    <label class="flex items-start gap-3 p-4 rounded-base border border-surface-line bg-surface-body hover:border-brand-600 cursor-pointer transition-colors">
                        <input type="checkbox" name="enable_shipping_cod" value="1" {{ old('enable_shipping_cod', $enableCod ?? '1') == '1' ? 'checked' : '' }}
                            class="mt-1 h-5 w-5 rounded border-surface-line text-brand-600 focus:ring-brand-600 cursor-pointer">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-[14px] font-semibold text-ink-900">Cash on Delivery (COD)</span>
                                <span class="inline-flex items-center rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-bold text-emerald-800">💵 COD</span>
                            </div>
                            <p class="text-[12px] text-ink-500 mt-1">Available for Cash on Delivery physical shipments</p>
                        </div>
                    </label>

                    <!-- Card / Online / Bank Slip Availability Checkbox Card -->
                    <label class="flex items-start gap-3 p-4 rounded-base border border-surface-line bg-surface-body hover:border-brand-600 cursor-pointer transition-colors">
                        <input type="checkbox" name="enable_shipping_card" value="1" {{ old('enable_shipping_card', $enableCard ?? '1') == '1' ? 'checked' : '' }}
                            class="mt-1 h-5 w-5 rounded border-surface-line text-brand-600 focus:ring-brand-600 cursor-pointer">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-[14px] font-semibold text-ink-900">Card / Bank Payment</span>
                                <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-0.5 text-[11px] font-bold text-blue-800">💳 Card / Slip</span>
                            </div>
                            <p class="text-[12px] text-ink-500 mt-1">Available for Online Card & Bank Slip shipments</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Maximum Order Amount Limits Section -->
            <div class="pt-6 border-t border-surface-line">
                <label class="block text-[15px] font-semibold text-ink-900 mb-1">
                    Maximum Order Amount Limits per Payment Method
                </label>
                <p class="text-[13px] text-ink-500 mb-4">Set the maximum order total limit allowed per customer for COD and Card/Bank payments.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="max_cod_order_limit" class="block text-[14px] font-semibold text-ink-800 mb-1">
                            Max Limit for COD (LKR) <span class="text-danger-500">*</span>
                        </label>
                        <p class="text-[12px] text-ink-400 mb-2">Maximum allowed total for Cash on Delivery (e.g. 10,000 LKR).</p>
                        <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                            <span class="inline-flex items-center bg-surface-muted px-4 text-[14px] font-semibold text-ink-500 border-r border-surface-line select-none">LKR</span>
                            <input type="number" step="0.01" min="0" id="max_cod_order_limit" name="max_cod_order_limit"
                                value="{{ old('max_cod_order_limit', $maxCodLimit ?? '10000.00') }}" required
                                class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-800 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label for="max_card_order_limit" class="block text-[14px] font-semibold text-ink-800 mb-1">
                            Max Limit for Card / Bank (LKR) <span class="text-danger-500">*</span>
                        </label>
                        <p class="text-[12px] text-ink-400 mb-2">Maximum allowed total for Card & Bank Transfer (e.g. 20,000 LKR).</p>
                        <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                            <span class="inline-flex items-center bg-surface-muted px-4 text-[14px] font-semibold text-ink-500 border-r border-surface-line select-none">LKR</span>
                            <input type="number" step="0.01" min="0" id="max_card_order_limit" name="max_card_order_limit"
                                value="{{ old('max_card_order_limit', $maxCardLimit ?? '20000.00') }}" required
                                class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-800 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-surface-line flex justify-end gap-3">
                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                    <i data-lucide="save" class="h-4 w-4"></i>
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
