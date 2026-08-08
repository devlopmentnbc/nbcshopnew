@extends('layouts.app')

@section('title', 'Checkout - NBC')

@section('content')

    <div class="rbt-breadcrumb-two rbt-bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-breadcrumb-inner text-left">
                        <ul class="rbt-breadcrumb-page-list justify-content-start mt--0">
                            <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-section-gap">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger mb--30 p-3 rounded" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('checkout.store') }}" id="checkoutForm">
                @csrf
                <div class="row g-5">
                    <div class="col-lg-7">
                        <div class="checkout-card mb--30">
                            <h5 class="title mb--20">Contact Information</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="name">Full Name<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="name" name="name" type="text"
                                            value="{{ old('name', $user->name ?? '') }}" placeholder="Your full name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="phone">Phone Number<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="phone" name="phone" type="tel"
                                            value="{{ old('phone', $user->phone ?? '') }}" placeholder="07X XXX XXXX"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="email">Email Address<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="email" name="email" type="email"
                                            value="{{ old('email', $user->email ?? '') }}" placeholder="you@example.com"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-card mb--30">
                            <h5 class="title mb--20">Billing Address</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_address_line1">Address Line 1<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="billing_address_line1"
                                            name="billing_address_line1" type="text"
                                            value="{{ old('billing_address_line1') }}" placeholder="House / Street"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_address_line2">Address Line 2</label>
                                        <input class="rbt-input-field" id="billing_address_line2"
                                            name="billing_address_line2" type="text"
                                            value="{{ old('billing_address_line2') }}"
                                            placeholder="Apartment, suite, etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_city">City<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="billing_city" name="billing_city" type="text"
                                            value="{{ old('billing_city') }}" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_state">State / Province</label>
                                        <input class="rbt-input-field" id="billing_state" name="billing_state"
                                            type="text" value="{{ old('billing_state') }}"
                                            placeholder="State / Province">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_postal_code">Postal Code</label>
                                        <input class="rbt-input-field" id="billing_postal_code"
                                            name="billing_postal_code" type="text"
                                            value="{{ old('billing_postal_code') }}" placeholder="Postal Code">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_country">Country<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <select class="rbt-input-field" id="billing_country" name="billing_country"
                                            required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}"
                                                    {{ old('billing_country', 'Sri Lanka') === $country->name ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-card mb--30">
                            <div class="d-flex justify-content-between align-items-center mb--20 flex-wrap gap-2">
                                <h5 class="title mb-0">Delivery Address</h5>
                                <div class="rbt-check-box">
                                    <input class="rbt-check-box-input" type="checkbox" name="delivery_same_as_billing"
                                        id="delivery_same_as_billing" value="1"
                                        {{ (session()->hasOldInput() ? old('delivery_same_as_billing') : true) ? 'checked' : '' }}>
                                    <label class="rbt-check-box-label" for="delivery_same_as_billing">Same as billing
                                        address</label>
                                </div>
                            </div>

                            <div id="deliveryAddressFields" class="row" style="display: none;">
                                <div class="col-md-12">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_address_line1">Address Line 1<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="delivery_address_line1"
                                            name="delivery_address_line1" type="text"
                                            value="{{ old('delivery_address_line1') }}" placeholder="House / Street">
                                    </div>
                                </div>
                                <div class="col-md-12 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_address_line2">Address Line 2</label>
                                        <input class="rbt-input-field" id="delivery_address_line2"
                                            name="delivery_address_line2" type="text"
                                            value="{{ old('delivery_address_line2') }}"
                                            placeholder="Apartment, suite, etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_city">City<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="delivery_city" name="delivery_city"
                                            type="text" value="{{ old('delivery_city') }}" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_state">State / Province</label>
                                        <input class="rbt-input-field" id="delivery_state" name="delivery_state"
                                            type="text" value="{{ old('delivery_state') }}"
                                            placeholder="State / Province">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_postal_code">Postal Code</label>
                                        <input class="rbt-input-field" id="delivery_postal_code"
                                            name="delivery_postal_code" type="text"
                                            value="{{ old('delivery_postal_code') }}" placeholder="Postal Code">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_country">Country<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <select class="rbt-input-field" id="delivery_country" name="delivery_country">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}"
                                                    {{ old('delivery_country', 'Sri Lanka') === $country->name ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-card mb--30">
                            <div class="rbt-input-field-grp mb--0">
                                <label class="rbt-field-label" for="notes">Order Notes (optional)</label>
                                <textarea class="rbt-input-field" id="notes" name="notes" rows="3"
                                    placeholder="Notes about your order, e.g. delivery instructions">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="checkout-card checkout-summary-card">
                            <h5 class="title mb--20">Order Summary</h5>

                            <ul class="checkout-summary-list list-unstyled mb--20">
                                @foreach ($cart as $item)
                                    <li class="d-flex align-items-center justify-content-between py-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="50"
                                                height="50" style="object-fit: cover; border-radius: 6px;">
                                            <div>
                                                <p class="mb-0" style="font-size: 14px;">{{ $item['name'] }}</p>
                                                <span class="text-muted" style="font-size: 13px;">Qty:
                                                    {{ $item['quantity'] }}</span>
                                            </div>
                                        </div>
                                        <span class="price" style="font-size: 14px; white-space: nowrap;">
                                            LKR {{ number_format(($item['price_lkr'] ?? 0) * $item['quantity'], 2) }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                            <hr class="my-2">
                            <div class="d-flex justify-content-between py-2">
                                <p class="mb-0">Subtotal ({{ $totalItems }} item{{ $totalItems === 1 ? '' : 's' }})
                                </p>
                                <p class="price mb-0">LKR {{ number_format($subtotal, 2) }}</p>
                            </div>
                            <div class="d-flex justify-content-between py-2 align-items-center">
                                <span class="text-muted" style="font-size: 13px;">Package Weight</span>
                                <span class="badge bg-light text-dark border" style="font-size: 12px;">1 kg (Fixed)</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <p class="mb-0 text-muted">Shipping</p>
                                <p class="price mb-0 text-muted fw-semibold" id="shippingFeeText">
                                    {{ ($initialShippingFee ?? 0) > 0 ? 'LKR ' . number_format($initialShippingFee, 2) : 'Free' }}
                                </p>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between py-2 mb--20">
                                <p class="mb-0"><strong>Total</strong></p>
                                <p class="price mb-0 text-primary" style="font-weight: 700; font-size: 18px;"
                                    id="orderTotalText">LKR {{ number_format($initialTotal ?? $subtotal, 2) }}</p>
                            </div>

                            <div class="payment-method-box border-top pt-3 mt-3">
                                <h6 class="title mb--15" style="font-size: 15px;">Payment Method<span
                                        class="rbt-text-color-danger">*</span></h6>
                                <div class="payment-methods">
                                    <div class="payment-option mb--15">
                                        <div
                                            class="form-check p-3 border rounded d-flex align-items-center gap-3 custom-payment-choice">
                                            <input class="form-check-input mt-0 cursor-pointer" type="radio"
                                                name="payment_method" id="payment_cod" value="cash_on_delivery"
                                                {{ old('payment_method', 'cash_on_delivery') === 'cash_on_delivery' ? 'checked' : '' }}
                                                required>
                                            <label class="form-check-label flex-grow-1 cursor-pointer" for="payment_cod">
                                                <strong class="d-block text-dark" style="font-size: 14px;">Cash on
                                                    Delivery (COD)</strong>
                                                <small class="text-muted d-block"
                                                    style="font-size: 12px; line-height: 1.3;">Pay with cash upon physical
                                                    delivery of your order.</small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <div
                                            class="form-check p-3 border rounded d-flex align-items-center gap-3 custom-payment-choice">
                                            <input class="form-check-input mt-0 cursor-pointer" type="radio"
                                                name="payment_method" id="payment_online" value="pay_online"
                                                {{ old('payment_method') === 'pay_online' ? 'checked' : '' }} required>
                                            <label class="form-check-label flex-grow-1 cursor-pointer"
                                                for="payment_online">
                                                <strong class="d-block text-dark" style="font-size: 14px;">Pay
                                                    Online</strong>
                                                <small class="text-muted d-block"
                                                    style="font-size: 12px; line-height: 1.3;">Pay securely online using
                                                    your Credit or Debit Card via Payment Gateway.</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt--30">
                    <div class="col-12 text-end">
                        <button type="submit" class="rbt-btn btn-gradient btn-md icon-hover w-100 w-md-auto"
                            id="submitOrderBtn">
                            <span class="btn-text" id="btnText">Place Order (Cash on Delivery)</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        .checkout-card {
            background: #fff;
            border: 1px solid #eceef2;
            border-radius: 10px;
            padding: 24px;
        }

        .checkout-summary-card {
            position: sticky;
            top: 24px;
        }

        .checkout-summary-list li:not(:last-child) {
            border-bottom: 1px solid #f0f0f0;
        }

        .custom-payment-choice {
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            background-color: #fafafa;
        }

        .custom-payment-choice:hover {
            border-color: #2f57ef !important;
            background-color: #f4f6ff;
        }

        .custom-payment-choice input:checked~label .fw-bold {
            color: #2f57ef;
        }

        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    <script>
        (function() {
            var sameAsBillingCheckbox = document.getElementById('delivery_same_as_billing');
            var deliveryFields = document.getElementById('deliveryAddressFields');

            function toggleDeliveryFields() {
                if (!sameAsBillingCheckbox || !deliveryFields) return;
                var isSame = sameAsBillingCheckbox.checked;
                deliveryFields.style.display = isSame ? 'none' : 'flex';

                var deliveryInputs = deliveryFields.querySelectorAll('input, select');
                deliveryInputs.forEach(function(input) {
                    if (isSame) {
                        input.removeAttribute('required');
                    } else {
                        input.setAttribute('required', 'required');
                    }
                });
            }

            if (sameAsBillingCheckbox) {
                sameAsBillingCheckbox.addEventListener('change', toggleDeliveryFields);
                toggleDeliveryFields();
            }

            var codRadio = document.getElementById('payment_cod');
            var onlineRadio = document.getElementById('payment_online');
            var btnText = document.getElementById('btnText');

            function updateSubmitButton() {
                if (onlineRadio && onlineRadio.checked) {
                    btnText.textContent = 'Proceed to Payment Gateway';
                } else {
                    btnText.textContent = 'Place Order (Cash on Delivery)';
                }
            }

            if (codRadio && onlineRadio) {
                codRadio.addEventListener('change', updateSubmitButton);
                onlineRadio.addEventListener('change', updateSubmitButton);
                updateSubmitButton();
            }

            function updateShipping() {
                var sameAsBilling = sameAsBillingCheckbox ? sameAsBillingCheckbox.checked : true;
                var countryEl = sameAsBilling ? document.getElementById('billing_country') : document.getElementById(
                    'delivery_country');
                var cityEl = sameAsBilling ? document.getElementById('billing_city') : document.getElementById(
                    'delivery_city');
                var postalEl = sameAsBilling ? document.getElementById('billing_postal_code') : document.getElementById(
                    'delivery_postal_code');

                var country = (countryEl && countryEl.value) ? countryEl.value : 'Sri Lanka';
                var city = (cityEl && cityEl.value) ? cityEl.value : '';
                var postalCode = (postalEl && postalEl.value) ? postalEl.value : '';

                var shippingFeeText = document.getElementById('shippingFeeText');
                var orderTotalText = document.getElementById('orderTotalText');

                if (shippingFeeText) shippingFeeText.textContent = 'Calculating...';

                fetch('{{ route('checkout.calculate_shipping') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            country: country,
                            city: city,
                            postal_code: postalCode
                        })
                    })
                    .then(function(res) {
                        if (!res.ok) {
                            throw new Error('HTTP error ' + res.status);
                        }
                        return res.json();
                    })
                    .then(function(data) {
                        if (data && data.success) {
                            if (shippingFeeText) shippingFeeText.textContent = data.formatted_shipping_fee;
                            if (orderTotalText) orderTotalText.textContent = data.formatted_total;
                        }
                    })
                    .catch(function(err) {
                        console.error('Error calculating shipping:', err);
                        if (shippingFeeText) shippingFeeText.textContent =
                            '{{ ($initialShippingFee ?? 0) > 0 ? 'LKR ' . number_format($initialShippingFee, 2) : 'Free' }}';
                        if (orderTotalText) orderTotalText.textContent =
                            'LKR {{ number_format($initialTotal ?? $subtotal, 2) }}';
                    });
            }

            var billingCountryEl = document.getElementById('billing_country');
            var deliveryCountryEl = document.getElementById('delivery_country');
            if (billingCountryEl) billingCountryEl.addEventListener('change', updateShipping);
            if (deliveryCountryEl) deliveryCountryEl.addEventListener('change', updateShipping);
            if (sameAsBillingCheckbox) sameAsBillingCheckbox.addEventListener('change', updateShipping);
        })();
    </script>

@endsection
