@extends('admin.layouts.app')

@section('title', 'Create Order Manually - Admin')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.orders.index') }}" class="inline-flex h-10 w-10 items-center justify-center rounded-base border border-surface-line bg-surface-card text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-5 w-5"></i>
            </a>
            <div>
                <h1 class="text-[24px] font-semibold text-ink-900">Create Order Manually</h1>
                <p class="mt-1 text-[14px] text-ink-500">Add an order manually for WhatsApp, phone, or offline channels.</p>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-base border border-danger-500/20 bg-danger-50 p-4 text-danger-700">
            <div class="flex items-center gap-3 mb-2">
                <i data-lucide="alert-circle" class="h-5 w-5 text-danger-600"></i>
                <p class="text-[15px] font-semibold">Please correct the following errors:</p>
            </div>
            <ul class="list-disc list-inside text-[14px] space-y-1 pl-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Left 2 Columns: Details & Items -->
            <div class="space-y-6 lg:col-span-2">
                
                <!-- Order Classification & Customer Information Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-5">
                    <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-3 flex items-center gap-2">
                        <i data-lucide="user" class="h-5 w-5 text-brand-600"></i>
                        Customer & Order Type
                    </h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <!-- Order Type -->
                        <div class="sm:col-span-2">
                            <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">
                                Order Type / Origin Channel <span class="text-danger-500">*</span>
                            </label>
                            <select name="order_type" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] font-semibold text-ink-900 focus:border-brand-600 focus:outline-none">
                                <option value="whatsapp" {{ old('order_type') === 'whatsapp' ? 'selected' : '' }}>💬 WhatsApp Order</option>
                                <option value="other" {{ old('order_type', 'other') === 'other' ? 'selected' : '' }}>📞 Other / Direct Channel</option>
                                <option value="online" {{ old('order_type') === 'online' ? 'selected' : '' }}>🌐 Online Store</option>
                            </select>
                            <p class="text-[12px] text-ink-400 mt-1">Classifies whether this order originated via WhatsApp, front store, or manual order.</p>
                        </div>

                        <!-- Link Registered User (Optional) -->
                        <div class="sm:col-span-2">
                            <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">
                                Registered User (Optional Auto-Fill)
                            </label>
                            <select id="user_select" name="user_id" onchange="autoFillUser(this)" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                <option value="">-- Guest Customer / Not Registered --</option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}" 
                                            data-name="{{ $u->name }}" 
                                            data-email="{{ $u->email }}" 
                                            data-phone="{{ $u->phone }}"
                                            {{ old('user_id') == $u->id ? 'selected' : '' }}>
                                        {{ $u->name }} ({{ $u->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Full Name -->
                        <div>
                            <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">Customer Name <span class="text-danger-500">*</span></label>
                            <input type="text" id="name_input" name="name" value="{{ old('name') }}" placeholder="e.g. John Doe" required class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">Phone Number <span class="text-danger-500">*</span></label>
                            <input type="text" id="phone_input" name="phone" value="{{ old('phone') }}" placeholder="e.g. 077 123 4567" required class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        </div>

                        <!-- Email Address -->
                        <div class="sm:col-span-2">
                            <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">Email Address <span class="text-danger-500">*</span></label>
                            <input type="email" id="email_input" name="email" value="{{ old('email') }}" placeholder="customer@example.com" required class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Addresses Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-5">
                    <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-3 flex items-center gap-2">
                        <i data-lucide="map-pin" class="h-5 w-5 text-brand-600"></i>
                        Shipping & Billing Address
                    </h3>

                    <!-- Billing Address Fields -->
                    <div class="space-y-4">
                        <h4 class="text-[14px] font-bold text-ink-800 uppercase tracking-wide">Billing Address</h4>
                        
                        <div>
                            <label class="block text-[13px] font-medium text-ink-600 mb-1">Address Line 1 <span class="text-danger-500">*</span></label>
                            <input type="text" name="billing_address_line1" value="{{ old('billing_address_line1') }}" placeholder="Street address or P.O. Box" required class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-[13px] font-medium text-ink-600 mb-1">Address Line 2 (Optional)</label>
                            <input type="text" name="billing_address_line2" value="{{ old('billing_address_line2') }}" placeholder="Apartment, suite, unit, building, floor" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <label class="block text-[13px] font-medium text-ink-600 mb-1">City <span class="text-danger-500">*</span></label>
                                <input type="text" name="billing_city" value="{{ old('billing_city', 'Colombo') }}" required class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[13px] font-medium text-ink-600 mb-1">State / Province</label>
                                <input type="text" name="billing_state" value="{{ old('billing_state', 'Western') }}" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[13px] font-medium text-ink-600 mb-1">Postal Code</label>
                                <input type="text" name="billing_postal_code" value="{{ old('billing_postal_code') }}" placeholder="10100" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[13px] font-medium text-ink-600 mb-1">Country <span class="text-danger-500">*</span></label>
                            <select name="billing_country" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                <option value="Sri Lanka" {{ old('billing_country') === 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                @foreach ($countries as $c)
                                    @if ($c->name !== 'Sri Lanka')
                                        <option value="{{ $c->name }}" {{ old('billing_country') === $c->name ? 'selected' : '' }}>{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="border-t border-surface-line pt-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="delivery_same_toggle" name="delivery_same_as_billing" value="1" checked onchange="toggleDeliverySection(this)" class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-500">
                            <span class="text-[14px] font-medium text-ink-800">Delivery address is the same as billing address</span>
                        </label>
                    </div>

                    <!-- Delivery Address Section (Hidden if same) -->
                    <div id="delivery_section" class="hidden space-y-4 border-t border-surface-line pt-4">
                        <h4 class="text-[14px] font-bold text-ink-800 uppercase tracking-wide">Delivery Address</h4>
                        
                        <div>
                            <label class="block text-[13px] font-medium text-ink-600 mb-1">Delivery Address Line 1</label>
                            <input type="text" name="delivery_address_line1" value="{{ old('delivery_address_line1') }}" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-[13px] font-medium text-ink-600 mb-1">Delivery Address Line 2</label>
                            <input type="text" name="delivery_address_line2" value="{{ old('delivery_address_line2') }}" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <label class="block text-[13px] font-medium text-ink-600 mb-1">City</label>
                                <input type="text" name="delivery_city" value="{{ old('delivery_city') }}" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[13px] font-medium text-ink-600 mb-1">State</label>
                                <input type="text" name="delivery_state" value="{{ old('delivery_state') }}" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[13px] font-medium text-ink-600 mb-1">Postal Code</label>
                                <input type="text" name="delivery_postal_code" value="{{ old('delivery_postal_code') }}" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[13px] font-medium text-ink-600 mb-1">Country</label>
                            <select name="delivery_country" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                <option value="Sri Lanka">Sri Lanka</option>
                                @foreach ($countries as $c)
                                    @if ($c->name !== 'Sri Lanka')
                                        <option value="{{ $c->name }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Order Items Selection Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                    <div class="flex items-center justify-between border-b border-surface-line pb-3">
                        <h3 class="text-[16px] font-semibold text-ink-900 flex items-center gap-2">
                            <i data-lucide="shopping-bag" class="h-5 w-5 text-brand-600"></i>
                            Order Items
                        </h3>
                        <button type="button" onclick="addItemRow()" class="inline-flex h-9 items-center gap-1.5 rounded-base bg-brand-50 px-3 text-[13px] font-semibold text-brand-600 hover:bg-brand-100 transition-colors">
                            <i data-lucide="plus-circle" class="h-4 w-4"></i> Add Item
                        </button>
                    </div>

                    <div id="items_container" class="space-y-3">
                        <!-- Dynamic Item Rows populated by JS -->
                    </div>

                    <div class="border-t border-surface-line pt-4 space-y-2 text-[14px]">
                        <div class="flex justify-between text-ink-600">
                            <span>Items Subtotal:</span>
                            <span id="calculated_subtotal" class="font-bold text-ink-900">LKR 0.00</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Payment, Status & Slip Upload -->
            <div class="space-y-6">

                <!-- Order Fulfillment & Payment Settings Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                    <h3 class="text-[16px] font-semibold text-ink-900 border-b border-surface-line pb-3">Status & Payment</h3>

                    <!-- Payment Method -->
                    <div>
                        <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">Payment Method <span class="text-danger-500">*</span></label>
                        <select name="payment_method" id="payment_method_select" onchange="checkSlipRequirement()" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] font-semibold text-ink-900 focus:border-brand-600 focus:outline-none">
                            <option value="cash_on_delivery" {{ old('payment_method') === 'cash_on_delivery' ? 'selected' : '' }}>💵 Cash on Delivery (COD)</option>
                            <option value="bank_transfer" {{ old('payment_method') === 'bank_transfer' ? 'selected' : '' }}>🏦 Bank Transfer / Deposit</option>
                            <option value="pay_online" {{ old('payment_method') === 'pay_online' ? 'selected' : '' }}>💳 Credit/Debit Card (Pay Online)</option>
                            <option value="other" {{ old('payment_method') === 'other' ? 'selected' : '' }}>✨ Other Payment Method</option>
                        </select>
                    </div>

                    <!-- Payment Status -->
                    <div>
                        <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">Payment Status <span class="text-danger-500">*</span></label>
                        <select name="payment_status" id="payment_status_select" onchange="checkSlipRequirement(); updateSelectColors();" class="h-10 w-full rounded-base border px-3 text-[14px] font-bold focus:outline-none cursor-pointer">
                            <option value="pending" {{ old('payment_status') === 'pending' ? 'selected' : '' }} style="background-color: #fff; color: #333;">Pending</option>
                            <option value="paid" {{ old('payment_status') === 'paid' ? 'selected' : '' }} style="background-color: #fff; color: #333;">Paid</option>
                            <option value="failed" {{ old('payment_status') === 'failed' ? 'selected' : '' }} style="background-color: #fff; color: #333;">Failed</option>
                        </select>
                    </div>

                    <!-- Fulfillment Status -->
                    <div>
                        <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">Fulfillment Status <span class="text-danger-500">*</span></label>
                        <select name="status" id="fulfillment_status_select" onchange="updateSelectColors();" class="h-10 w-full rounded-base border px-3 text-[14px] font-bold focus:outline-none cursor-pointer">
                            <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }} style="background-color: #fff; color: #333;">Pending</option>
                            <option value="processing" {{ old('status') === 'processing' ? 'selected' : '' }} style="background-color: #fff; color: #333;">Processing</option>
                            <option value="completed" {{ old('status', 'completed') === 'completed' ? 'selected' : '' }} style="background-color: #fff; color: #333;">Completed</option>
                            <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }} style="background-color: #fff; color: #333;">Cancelled</option>
                        </select>
                    </div>

                    <!-- Shipping Fee -->
                    <div>
                        <label class="block text-[13px] font-semibold uppercase text-ink-500 mb-1.5">Shipping Fee (LKR)</label>
                        <input type="number" step="0.01" min="0" name="shipping_fee_lkr" id="shipping_fee_input" value="{{ old('shipping_fee_lkr', '0.00') }}" oninput="updateGrandTotal()" placeholder="0.00" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] font-semibold text-ink-900 focus:border-brand-600 focus:outline-none">
                    </div>

                    <div class="border-t border-surface-line pt-3 mt-3">
                        <div class="flex justify-between items-center text-[16px] font-bold text-brand-600">
                            <span>Estimated Grand Total:</span>
                            <span id="grand_total_display">LKR 0.00</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Slip Upload Box -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-3">
                    <h3 class="text-[16px] font-semibold text-ink-900 flex items-center justify-between">
                        <span>Payment Slip / Receipt</span>
                        <span id="slip_badge" class="text-[11px] font-medium bg-amber-50 text-amber-700 px-2 py-0.5 rounded border border-amber-200">Optional</span>
                    </h3>
                    <p class="text-[12px] text-ink-500">Upload bank slip, WhatsApp payment receipt image or proof file (JPG, PNG, WEBP, PDF up to 4MB).</p>
                    
                    <div>
                        <input type="file" name="payment_slip" accept="image/*,application/pdf" class="block w-full text-[13px] text-ink-600 file:mr-3 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[13px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100">
                    </div>
                </div>

                <!-- Admin Notes Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-3">
                    <h3 class="text-[16px] font-semibold text-ink-900">Order Notes</h3>
                    <textarea name="notes" rows="3" placeholder="Additional notes or customer instructions..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-800 focus:border-brand-600 focus:outline-none">{{ old('notes') }}</textarea>
                </div>

                <!-- Action Button -->
                <div>
                    <button type="submit" class="w-full h-12 rounded-base bg-brand-600 text-[15px] font-bold text-white hover:bg-brand-700 shadow-md transition-all flex items-center justify-center gap-2">
                        <i data-lucide="check-circle" class="h-5 w-5"></i> Create Order Now
                    </button>
                </div>

            </div>
        </div>
    </form>
</main>

<script>
    const productsData = @json($products);
    let itemRowCounter = 0;

    function autoFillUser(selectEl) {
        const option = selectEl.options[selectEl.selectedIndex];
        if (option && option.value) {
            document.getElementById('name_input').value = option.getAttribute('data-name') || '';
            document.getElementById('email_input').value = option.getAttribute('data-email') || '';
            document.getElementById('phone_input').value = option.getAttribute('data-phone') || '';
        }
    }

    function toggleDeliverySection(checkbox) {
        const section = document.getElementById('delivery_section');
        if (checkbox.checked) {
            section.classList.add('hidden');
        } else {
            section.classList.remove('hidden');
        }
    }

    function addItemRow(selectedProductId = null, qty = 1, initialPrice = 0) {
        itemRowCounter++;
        const container = document.getElementById('items_container');
        const rowId = 'item_row_' + itemRowCounter;

        let productOptions = '<option value="">-- Select Product --</option>';
        productsData.forEach(p => {
            productOptions += `<option value="${p.id}">${p.name} (#${p.id})</option>`;
        });

        const rowHtml = `
            <div id="${rowId}" class="flex flex-wrap items-center gap-3 p-3 rounded-base bg-surface-body border border-surface-line">
                <div class="flex-1 min-w-[180px]">
                    <select name="items[${itemRowCounter}][product_id]" id="product_select_${itemRowCounter}" onchange="onProductSelect(this, ${itemRowCounter})" required class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-2 text-[13px] font-medium text-ink-900 focus:border-brand-600 focus:outline-none">
                        ${productOptions}
                    </select>
                </div>
                <div class="w-40 min-w-[140px]">
                    <select name="items[${itemRowCounter}][variant]" id="variant_select_${itemRowCounter}" onchange="onVariantSelect(this, ${itemRowCounter})" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-2 text-[13px] font-medium text-ink-900 focus:border-brand-600 focus:outline-none">
                        <option value="">-- Variant --</option>
                    </select>
                </div>
                <div class="w-20">
                    <input type="number" min="1" name="items[${itemRowCounter}][quantity]" value="${qty}" id="qty_${itemRowCounter}" oninput="calculateTotals()" required placeholder="Qty" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-2 text-[13px] text-center font-bold text-ink-900 focus:border-brand-600 focus:outline-none">
                </div>
                <div class="w-28">
                    <input type="number" step="0.01" min="0" name="items[${itemRowCounter}][price_lkr]" value="${initialPrice}" id="price_${itemRowCounter}" oninput="calculateTotals()" required placeholder="Price LKR" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-2 text-[13px] font-semibold text-ink-900 focus:border-brand-600 focus:outline-none">
                </div>
                <div class="w-28 text-right font-bold text-[13px] text-ink-900" id="row_total_${itemRowCounter}">
                    LKR 0.00
                </div>
                <div>
                    <button type="button" onclick="removeItemRow('${rowId}')" class="h-9 w-9 rounded-base border border-surface-line bg-surface-card text-danger-500 hover:bg-danger-50 flex items-center justify-center transition-colors">
                        <i data-lucide="trash-2" class="h-4 w-4"></i>
                    </button>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', rowHtml);
        if (window.lucide) {
            window.lucide.createIcons();
        }
        calculateTotals();
    }

    function onProductSelect(selectEl, rowNum) {
        const productId = selectEl.value;
        const variantSelect = document.getElementById('variant_select_' + rowNum);
        const priceInput = document.getElementById('price_' + rowNum);

        variantSelect.innerHTML = '';

        if (!productId) {
            variantSelect.innerHTML = '<option value="">-- Variant --</option>';
            priceInput.value = '0.00';
            calculateTotals();
            return;
        }

        const product = productsData.find(p => p.id == productId);
        if (!product) return;

        let hasVariants = product.attribute_values && product.attribute_values.length > 0;

        if (hasVariants) {
            product.attribute_values.forEach((av, idx) => {
                const pivot = av.pivot || {};
                const price = parseFloat(pivot.sale_price_lkr || pivot.price_lkr || 0);
                const attrName = av.attribute ? av.attribute.name : 'Option';
                const valName = av.value_name || av.value || '';
                const variantLabel = `${attrName}: ${valName}`;
                
                const option = document.createElement('option');
                option.value = variantLabel;
                option.dataset.price = price;
                option.textContent = `${variantLabel} - LKR ${price.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
                
                if (idx === 0) {
                    option.selected = true;
                    priceInput.value = price.toFixed(2);
                }
                
                variantSelect.appendChild(option);
            });
        } else {
            const option = document.createElement('option');
            option.value = '';
            option.dataset.price = 0;
            option.textContent = 'Standard / Default';
            variantSelect.appendChild(option);
            priceInput.value = '0.00';
        }

        calculateTotals();
    }

    function onVariantSelect(variantSelectEl, rowNum) {
        const selectedOption = variantSelectEl.options[variantSelectEl.selectedIndex];
        if (selectedOption && selectedOption.dataset && selectedOption.dataset.price !== undefined) {
            const price = parseFloat(selectedOption.dataset.price) || 0;
            document.getElementById('price_' + rowNum).value = price.toFixed(2);
        }
        calculateTotals();
    }

    function removeItemRow(rowId) {
        const row = document.getElementById(rowId);
        if (row) {
            row.remove();
        }
        calculateTotals();
    }

    function calculateTotals() {
        let subtotal = 0;
        const rows = document.querySelectorAll('#items_container > div');
        rows.forEach(row => {
            const qtyInput = row.querySelector('input[name*="[quantity]"]');
            const priceInput = row.querySelector('input[name*="[price_lkr]"]');
            const rowTotalEl = row.querySelector('[id^="row_total_"]');

            if (qtyInput && priceInput) {
                const qty = parseInt(qtyInput.value) || 0;
                const price = parseFloat(priceInput.value) || 0;
                const total = qty * price;
                subtotal += total;
                if (rowTotalEl) {
                    rowTotalEl.textContent = 'LKR ' + total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }
            }
        });

        document.getElementById('calculated_subtotal').textContent = 'LKR ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        updateGrandTotal(subtotal);
    }

    function updateGrandTotal(subtotalValue = null) {
        if (subtotalValue === null) {
            let subtotal = 0;
            const rows = document.querySelectorAll('#items_container > div');
            rows.forEach(row => {
                const qtyInput = row.querySelector('input[name*="[quantity]"]');
                const priceInput = row.querySelector('input[name*="[price_lkr]"]');
                if (qtyInput && priceInput) {
                    subtotal += (parseInt(qtyInput.value) || 0) * (parseFloat(priceInput.value) || 0);
                }
            });
            subtotalValue = subtotal;
        }

        const shipping = parseFloat(document.getElementById('shipping_fee_input').value) || 0;
        const grandTotal = subtotalValue + shipping;
        document.getElementById('grand_total_display').textContent = 'LKR ' + grandTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function checkSlipRequirement() {
        const pm = document.getElementById('payment_method_select').value;
        const ps = document.getElementById('payment_status_select').value;
        const badge = document.getElementById('slip_badge');

        if (pm === 'bank_transfer' || ps === 'paid') {
            badge.textContent = 'Recommended';
            badge.className = 'text-[11px] font-medium bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded border border-emerald-200';
        } else {
            badge.textContent = 'Optional';
            badge.className = 'text-[11px] font-medium bg-amber-50 text-amber-700 px-2 py-0.5 rounded border border-amber-200';
        }
    }

    function updateSelectColors() {
        const psSelect = document.getElementById('payment_status_select');
        if (psSelect) {
            const val = (psSelect.value || '').toLowerCase();
            psSelect.style.setProperty('appearance', 'none', 'important');
            psSelect.style.setProperty('-webkit-appearance', 'none', 'important');
            psSelect.style.setProperty('-moz-appearance', 'none', 'important');
            psSelect.style.setProperty('border-radius', '8px', 'important');
            psSelect.style.setProperty('padding-left', '0.75rem', 'important');
            psSelect.style.setProperty('padding-right', '2rem', 'important');
            psSelect.style.setProperty('background-position', 'right 0.5rem center', 'important');
            psSelect.style.setProperty('background-repeat', 'no-repeat', 'important');
            psSelect.style.setProperty('background-size', '1.1em 1.1em', 'important');
            psSelect.style.setProperty('background-image', "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e\")", 'important');

            if (val === 'paid') {
                psSelect.style.setProperty('background-color', '#16a34a', 'important');
                psSelect.style.setProperty('color', '#ffffff', 'important');
                psSelect.style.setProperty('border', '1px solid #15803d', 'important');
                psSelect.style.setProperty('font-weight', '700', 'important');
            } else if (val === 'pending') {
                psSelect.style.setProperty('background-color', '#d97706', 'important');
                psSelect.style.setProperty('color', '#ffffff', 'important');
                psSelect.style.setProperty('border', '1px solid #b45309', 'important');
                psSelect.style.setProperty('font-weight', '700', 'important');
            } else if (val === 'failed') {
                psSelect.style.setProperty('background-color', '#dc2626', 'important');
                psSelect.style.setProperty('color', '#ffffff', 'important');
                psSelect.style.setProperty('border', '1px solid #b91c1c', 'important');
                psSelect.style.setProperty('font-weight', '700', 'important');
            }
        }

        const fsSelect = document.getElementById('fulfillment_status_select');
        if (fsSelect) {
            const val = (fsSelect.value || '').toLowerCase();
            fsSelect.style.setProperty('appearance', 'none', 'important');
            fsSelect.style.setProperty('-webkit-appearance', 'none', 'important');
            fsSelect.style.setProperty('-moz-appearance', 'none', 'important');
            fsSelect.style.setProperty('border-radius', '8px', 'important');
            fsSelect.style.setProperty('padding-left', '0.75rem', 'important');
            fsSelect.style.setProperty('padding-right', '2rem', 'important');
            fsSelect.style.setProperty('background-position', 'right 0.5rem center', 'important');
            fsSelect.style.setProperty('background-repeat', 'no-repeat', 'important');
            fsSelect.style.setProperty('background-size', '1.1em 1.1em', 'important');
            fsSelect.style.setProperty('background-image', "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e\")", 'important');

            if (val === 'completed') {
                fsSelect.style.setProperty('background-color', '#16a34a', 'important');
                fsSelect.style.setProperty('color', '#ffffff', 'important');
                fsSelect.style.setProperty('border', '1px solid #15803d', 'important');
                fsSelect.style.setProperty('font-weight', '700', 'important');
            } else if (val === 'processing') {
                fsSelect.style.setProperty('background-color', '#2563eb', 'important');
                fsSelect.style.setProperty('color', '#ffffff', 'important');
                fsSelect.style.setProperty('border', '1px solid #1d4ed8', 'important');
                fsSelect.style.setProperty('font-weight', '700', 'important');
            } else if (val === 'pending') {
                fsSelect.style.setProperty('background-color', '#d97706', 'important');
                fsSelect.style.setProperty('color', '#ffffff', 'important');
                fsSelect.style.setProperty('border', '1px solid #b45309', 'important');
                fsSelect.style.setProperty('font-weight', '700', 'important');
            } else if (val === 'cancelled') {
                fsSelect.style.setProperty('background-color', '#dc2626', 'important');
                fsSelect.style.setProperty('color', '#ffffff', 'important');
                fsSelect.style.setProperty('border', '1px solid #b91c1c', 'important');
                fsSelect.style.setProperty('font-weight', '700', 'important');
            }
        }
    }

    // Add initial item row on page load
    document.addEventListener('DOMContentLoaded', function() {
        addItemRow();
        checkSlipRequirement();
        updateSelectColors();
    });
</script>
@endsection
