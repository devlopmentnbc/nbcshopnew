@extends('admin.layouts.app')

@section('title', 'Domestic Shipping & Citypak Settings - Admin')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Domestic Shipping & Citypak Courier Settings</h1>
            <p class="mt-1 text-[14px] text-ink-500">Configure base shipping fee, free shipping threshold, and Citypak Courier integration for Sri Lanka.</p>
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

    <form action="{{ route('admin.settings.shipping.update') }}" method="POST" class="space-y-6 max-w-4xl">
        @csrf

        <!-- Domestic Shipping Rates & Limits Card -->
        <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
            <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3 flex items-center gap-2">
                <i data-lucide="truck" class="h-5 w-5 text-brand-600"></i>
                Domestic Shipping Rates & Order Limits
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
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
                    <p class="text-[13px] text-ink-400 mb-2">Orders with subtotal greater than or equal to this amount receive FREE shipping.</p>
                    <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                        <span class="inline-flex items-center bg-surface-muted px-4 text-[14px] font-semibold text-ink-500 border-r border-surface-line select-none">LKR</span>
                        <input type="number" step="0.01" min="0" id="free_shipping_threshold" name="free_shipping_threshold"
                            value="{{ old('free_shipping_threshold', $freeThreshold) }}" required
                            class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-800 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Allowed Payment Methods Ticks Section -->
            <div class="pt-4 border-t border-surface-line">
                <label class="block text-[15px] font-semibold text-ink-900 mb-1">
                    Allowed Payment Methods for Shipping
                </label>
                <p class="text-[13px] text-ink-500 mb-4">Select which payment methods are available for domestic delivery orders.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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
            <div class="pt-4 border-t border-surface-line">
                <label class="block text-[15px] font-semibold text-ink-900 mb-1">
                    Maximum Order Amount Limits per Payment Method
                </label>
                <p class="text-[13px] text-ink-500 mb-4">Set the maximum order total limit allowed per customer for COD and Card/Bank payments.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="max_cod_order_limit" class="block text-[14px] font-semibold text-ink-800 mb-1">
                            Max Limit for COD (LKR) <span class="text-danger-500">*</span>
                        </label>
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
                        <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                            <span class="inline-flex items-center bg-surface-muted px-4 text-[14px] font-semibold text-ink-500 border-r border-surface-line select-none">LKR</span>
                            <input type="number" step="0.01" min="0" id="max_card_order_limit" name="max_card_order_limit"
                                value="{{ old('max_card_order_limit', $maxCardLimit ?? '20000.00') }}" required
                                class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-800 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Citypak Courier API Configuration Card -->
        <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
            <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3 flex items-center gap-2">
                <i data-lucide="package-check" class="h-5 w-5 text-brand-600"></i>
                Citypak Courier API Configuration (Sri Lanka)
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="citypak_environment" class="block text-[14px] font-semibold text-ink-800 mb-1">
                        API Environment Mode <span class="text-danger-500">*</span>
                    </label>
                    <select id="citypak_environment" name="citypak_environment" required
                        class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        <option value="staging" {{ old('citypak_environment', $citypakEnvironment) === 'staging' ? 'selected' : '' }}>Sandbox / Staging (staging.citypak.lk)</option>
                        <option value="production" {{ old('citypak_environment', $citypakEnvironment) === 'production' ? 'selected' : '' }}>Production (falcon.citypak.lk)</option>
                    </select>
                </div>

                <div>
                    <label for="citypak_api_key" class="block text-[14px] font-semibold text-ink-800 mb-1">
                        Citypak API Key / Bearer Token
                    </label>
                    <input type="text" id="citypak_api_key" name="citypak_api_key"
                        value="{{ old('citypak_api_key', $citypakApiKey) }}" placeholder="Enter Citypak API Key"
                        class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-800 font-mono focus:border-brand-600 focus:outline-none">
                </div>
            </div>

            <!-- Merchant Sender Information -->
            <div class="pt-4 border-t border-surface-line space-y-4">
                <h3 class="text-[15px] font-semibold text-ink-900">Merchant / Warehouse Sender Info (Default for Pickups & Waybills)</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="citypak_from_name" class="block text-[13px] font-semibold text-ink-700 mb-1">Sender Name / Business Name <span class="text-danger-500">*</span></label>
                        <input type="text" id="citypak_from_name" name="citypak_from_name" value="{{ old('citypak_from_name', $citypakFromName) }}" required
                            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                    </div>

                    <div>
                        <label for="citypak_from_contact_name" class="block text-[13px] font-semibold text-ink-700 mb-1">Contact Person <span class="text-danger-500">*</span></label>
                        <input type="text" id="citypak_from_contact_name" name="citypak_from_contact_name" value="{{ old('citypak_from_contact_name', $citypakFromContactName) }}" required
                            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                    </div>

                    <div>
                        <label for="citypak_from_contact_1" class="block text-[13px] font-semibold text-ink-700 mb-1">Primary Phone <span class="text-danger-500">*</span></label>
                        <input type="text" id="citypak_from_contact_1" name="citypak_from_contact_1" value="{{ old('citypak_from_contact_1', $citypakFromContact1) }}" required
                            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 font-mono focus:border-brand-600 focus:outline-none">
                    </div>

                    <div>
                        <label for="citypak_from_contact_2" class="block text-[13px] font-semibold text-ink-700 mb-1">Secondary Phone (Optional)</label>
                        <input type="text" id="citypak_from_contact_2" name="citypak_from_contact_2" value="{{ old('citypak_from_contact_2', $citypakFromContact2) }}"
                            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 font-mono focus:border-brand-600 focus:outline-none">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="citypak_from_address_line_1" class="block text-[13px] font-semibold text-ink-700 mb-1">Address Line 1 <span class="text-danger-500">*</span></label>
                        <input type="text" id="citypak_from_address_line_1" name="citypak_from_address_line_1" value="{{ old('citypak_from_address_line_1', $citypakFromAddressLine1) }}" required
                            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                    </div>

                    <div>
                        <label for="citypak_from_address_line_2" class="block text-[13px] font-semibold text-ink-700 mb-1">Address Line 2 (Optional)</label>
                        <input type="text" id="citypak_from_address_line_2" name="citypak_from_address_line_2" value="{{ old('citypak_from_address_line_2', $citypakFromAddressLine2) }}"
                            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                    </div>

                    <div>
                        <label for="citypak_from_address_line_4" class="block text-[13px] font-semibold text-ink-700 mb-1">City <span class="text-danger-500">*</span></label>
                        <input type="text" id="citypak_from_address_line_4" name="citypak_from_address_line_4" value="{{ old('citypak_from_address_line_4', $citypakFromAddressLine4) }}" required
                            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                <i data-lucide="save" class="h-4 w-4"></i>
                Save All Settings
            </button>
        </div>
    </form>
</main>
@endsection
