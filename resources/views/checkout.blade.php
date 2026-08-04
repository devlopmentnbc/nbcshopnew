@extends('layouts.app')

@section('title', 'Checkout - Unimart')

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
                                        <label class="rbt-field-label" for="name">Full Name<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="name" name="name" type="text"
                                            value="{{ old('name', $user->name ?? '') }}" placeholder="Your full name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="phone">Phone Number<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="phone" name="phone" type="tel"
                                            value="{{ old('phone', $user->phone ?? '') }}" placeholder="07X XXX XXXX" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="email">Email Address<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="email" name="email" type="email"
                                            value="{{ old('email', $user->email ?? '') }}" placeholder="you@example.com" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-card mb--30">
                            <h5 class="title mb--20">Billing Address</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_address_line1">Address Line 1<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="billing_address_line1" name="billing_address_line1" type="text"
                                            value="{{ old('billing_address_line1') }}" placeholder="House / Street" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_address_line2">Address Line 2</label>
                                        <input class="rbt-input-field" id="billing_address_line2" name="billing_address_line2" type="text"
                                            value="{{ old('billing_address_line2') }}" placeholder="Apartment, suite, etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_city">City<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="billing_city" name="billing_city" type="text"
                                            value="{{ old('billing_city') }}" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_state">State / Province</label>
                                        <input class="rbt-input-field" id="billing_state" name="billing_state" type="text"
                                            value="{{ old('billing_state') }}" placeholder="State / Province">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_postal_code">Postal Code</label>
                                        <input class="rbt-input-field" id="billing_postal_code" name="billing_postal_code" type="text"
                                            value="{{ old('billing_postal_code') }}" placeholder="Postal Code">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="billing_country">Country<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="billing_country" name="billing_country" type="text"
                                            value="{{ old('billing_country', 'Sri Lanka') }}" placeholder="Country" required>
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
                                    <label class="rbt-check-box-label" for="delivery_same_as_billing">Same as billing address</label>
                                </div>
                            </div>

                            <div id="deliveryAddressFields" class="row" style="display: none;">
                                <div class="col-md-12">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_address_line1">Address Line 1<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="delivery_address_line1" name="delivery_address_line1" type="text"
                                            value="{{ old('delivery_address_line1') }}" placeholder="House / Street">
                                    </div>
                                </div>
                                <div class="col-md-12 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_address_line2">Address Line 2</label>
                                        <input class="rbt-input-field" id="delivery_address_line2" name="delivery_address_line2" type="text"
                                            value="{{ old('delivery_address_line2') }}" placeholder="Apartment, suite, etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_city">City<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="delivery_city" name="delivery_city" type="text"
                                            value="{{ old('delivery_city') }}" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_state">State / Province</label>
                                        <input class="rbt-input-field" id="delivery_state" name="delivery_state" type="text"
                                            value="{{ old('delivery_state') }}" placeholder="State / Province">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_postal_code">Postal Code</label>
                                        <input class="rbt-input-field" id="delivery_postal_code" name="delivery_postal_code" type="text"
                                            value="{{ old('delivery_postal_code') }}" placeholder="Postal Code">
                                    </div>
                                </div>
                                <div class="col-md-6 mt--20">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="delivery_country">Country<span class="rbt-text-color-danger">*</span></label>
                                        <input class="rbt-input-field" id="delivery_country" name="delivery_country" type="text"
                                            value="{{ old('delivery_country', 'Sri Lanka') }}" placeholder="Country">
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
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                width="50" height="50" style="object-fit: cover; border-radius: 6px;">
                                            <div>
                                                <p class="mb-0" style="font-size: 14px;">{{ $item['name'] }}</p>
                                                <span class="text-muted" style="font-size: 13px;">Qty: {{ $item['quantity'] }}</span>
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
                                <p class="mb-0">Subtotal ({{ $totalItems }} item{{ $totalItems === 1 ? '' : 's' }})</p>
                                <p class="price mb-0">LKR {{ number_format($subtotal, 2) }}</p>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <p class="mb-0 text-muted">Shipping</p>
                                <p class="price mb-0 text-muted">Free</p>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between py-2">
                                <p class="mb-0"><strong>Total</strong></p>
                                <p class="price mb-0" style="font-weight: 700;">LKR {{ number_format($subtotal, 2) }}</p>
                            </div>

                            <button type="submit" class="rbt-btn w-100 text-center btn-gradient mt--20">
                                <span class="btn-text">Place Order</span>
                            </button>
                        </div>
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
    </style>

    <script>
        (function () {
            var sameAsBillingCheckbox = document.getElementById('delivery_same_as_billing');
            var deliveryFields = document.getElementById('deliveryAddressFields');
            var requiredDeliveryInputs = deliveryFields.querySelectorAll('#delivery_address_line1, #delivery_city, #delivery_country');

            function toggleDeliveryFields() {
                var sameAsBilling = sameAsBillingCheckbox.checked;
                deliveryFields.style.display = sameAsBilling ? 'none' : 'flex';
                requiredDeliveryInputs.forEach(function (input) {
                    if (sameAsBilling) {
                        input.removeAttribute('required');
                    } else {
                        input.setAttribute('required', 'required');
                    }
                });
            }

            sameAsBillingCheckbox.addEventListener('change', toggleDeliveryFields);
            toggleDeliveryFields();
        })();
    </script>

@endsection
