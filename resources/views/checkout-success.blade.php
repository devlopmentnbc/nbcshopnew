@extends('layouts.app')

@section('title', 'Order Confirmed - NBC')

@section('content')

    <div class="rbt-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="checkout-card text-center mb--40">
                        <div class="mb--20">
                            <i class="fa-solid fa-circle-check" style="font-size: 56px; color: #2fb344;"></i>
                        </div>
                        <h4 class="title mb--10">Thank you, {{ $order->name }}!</h4>
                        <p class="mb--0">Your order has been placed successfully.</p>
                        <p class="mb-0">Order Number: <strong>{{ $order->order_number }}</strong></p>
                    </div>

                    <!-- Payment Slip Card for Bank Transfer / Non-Card Orders -->
                    <div class="checkout-card mb--30 border-warning" style="background-color: #fffdf5;">
                        <h5 class="title mb--15 d-flex align-items-center justify-content-between">
                            <span><i class="fa-solid fa-receipt text-warning me-2"></i> Payment Slip / Proof</span>
                            @if ($order->payment_slip)
                                <span class="badge bg-success text-white">Slip Uploaded</span>
                            @else
                                <span class="badge bg-warning text-dark">Action Needed</span>
                            @endif
                        </h5>

                        @if ($order->payment_slip)
                            <div class="alert alert-success d-flex align-items-center gap-3 mb-3">
                                <i class="fa-solid fa-check-circle fs-4"></i>
                                <div>
                                    <strong class="d-block">Payment slip has been received!</strong>
                                    <small>Our team is verifying your payment details.</small>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                <a href="{{ asset($order->payment_slip) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill">
                                    <i class="fa-solid fa-external-link me-1"></i> View Uploaded Payment Slip
                                </a>
                            </div>
                        @else
                            <p class="small text-muted mb-3">If you paid via Bank Deposit or Transfer, please upload your receipt/slip image below so we can process your order faster.</p>
                        @endif

                        <form action="{{ route('checkout.upload_slip', $order->order_number) }}" method="POST" enctype="multipart/form-data" class="row g-2 align-items-center">
                            @csrf
                            <div class="col">
                                <input type="file" name="payment_slip" accept="image/*,application/pdf" required class="form-control form-control-sm">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <i class="fa-solid fa-upload me-1"></i> {{ $order->payment_slip ? 'Replace Slip' : 'Upload Slip' }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="checkout-card mb--30">
                        <h5 class="title mb--20">Order Summary</h5>
                        <ul class="checkout-summary-list list-unstyled mb--20">
                            @foreach ($order->items as $item)
                                <li class="d-flex align-items-center justify-content-between py-2">
                                    <div class="d-flex align-items-center gap-3">
                                        @if ($item->image)
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                                width="50" height="50" style="object-fit: cover; border-radius: 6px;">
                                        @endif
                                        <div>
                                            <p class="mb-0" style="font-size: 14px;">{{ $item->name }}</p>
                                            <span class="text-muted" style="font-size: 13px;">Qty: {{ $item->quantity }}</span>
                                        </div>
                                    </div>
                                    <span class="price" style="font-size: 14px; white-space: nowrap;">
                                        LKR {{ number_format($item->line_total_lkr, 2) }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between py-2">
                            <p class="mb-0">Subtotal</p>
                            <p class="price mb-0">LKR {{ number_format($order->subtotal_lkr, 2) }}</p>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <p class="mb-0 text-muted">Shipping</p>
                            <p class="price mb-0 text-muted">
                                {{ $order->shipping_fee_lkr > 0 ? 'LKR ' . number_format($order->shipping_fee_lkr, 2) : 'Free' }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <p class="mb-0 text-muted">Payment Method</p>
                            <p class="mb-0 fw-semibold text-primary">
                                @if ($order->payment_method === 'bank_transfer')
                                    Bank Transfer / Deposit
                                @elseif ($order->payment_method === 'pay_online')
                                    Pay Online (Card)
                                @else
                                    Cash on Delivery
                                @endif
                            </p>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between py-2">
                            <p class="mb-0"><strong>Total</strong></p>
                            <p class="price mb-0" style="font-weight: 700;">LKR {{ number_format($order->total_lkr, 2) }}</p>
                        </div>
                    </div>

                    <div class="row g-4 mb--30">
                        <div class="col-md-4">
                            <div class="checkout-card h-100">
                                <h6 class="title mb--10">Contact</h6>
                                <p class="mb-0">{{ $order->name }}</p>
                                <p class="mb-0">{{ $order->phone }}</p>
                                <p class="mb-0">{{ $order->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkout-card h-100">
                                <h6 class="title mb--10">Payment Details</h6>
                                <p class="mb-1">Method: 
                                    <strong>
                                        @if ($order->payment_method === 'bank_transfer')
                                            Bank Transfer
                                        @elseif ($order->payment_method === 'pay_online')
                                            Pay Online
                                        @else
                                            Cash on Delivery
                                        @endif
                                    </strong>
                                </p>
                                <p class="mb-0">Payment Status: <span class="badge {{ $order->payment_status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">{{ ucfirst($order->payment_status ?? 'pending') }}</span></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkout-card h-100">
                                <h6 class="title mb--10">Delivery Address</h6>
                                <p class="mb-0">{{ $order->delivery_address_line1 }}</p>
                                @if ($order->delivery_address_line2)
                                    <p class="mb-0">{{ $order->delivery_address_line2 }}</p>
                                @endif
                                <p class="mb-0">
                                    {{ $order->delivery_city }}{{ $order->delivery_state ? ', ' . $order->delivery_state : '' }}
                                    {{ $order->delivery_postal_code }}
                                </p>
                                <p class="mb-0">{{ $order->delivery_country }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('shop') }}" class="rbt-btn btn-gradient">
                            <span class="btn-text">Continue Shopping</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .checkout-card {
            background: #fff;
            border: 1px solid #eceef2;
            border-radius: 10px;
            padding: 24px;
        }
        .checkout-summary-list li:not(:last-child) {
            border-bottom: 1px solid #f0f0f0;
        }
    </style>

@endsection
