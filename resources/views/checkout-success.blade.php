@extends('layouts.app')

@section('title', 'Order Confirmed - Unimart')

@section('content')

    <div class="rbt-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-card text-center mb--40">
                        <div class="mb--20">
                            <i class="fa-solid fa-circle-check" style="font-size: 56px; color: #2fb344;"></i>
                        </div>
                        <h4 class="title mb--10">Thank you, {{ $order->name }}!</h4>
                        <p class="mb--0">Your order has been placed successfully.</p>
                        <p class="mb-0">Order Number: <strong>{{ $order->order_number }}</strong></p>
                    </div>

                    <div class="checkout-card mb--30">
                        <h5 class="title mb--20">Order Summary</h5>
                        <ul class="checkout-summary-list list-unstyled mb--20">
                            @foreach ($order->items as $item)
                                <li class="d-flex align-items-center justify-content-between py-2">
                                    <div class="d-flex align-items-center gap-3">
                                        @if ($item->image)
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}"
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
                        <hr class="my-2">
                        <div class="d-flex justify-content-between py-2">
                            <p class="mb-0"><strong>Total</strong></p>
                            <p class="price mb-0" style="font-weight: 700;">LKR {{ number_format($order->total_lkr, 2) }}</p>
                        </div>
                    </div>

                    <div class="row g-4 mb--30">
                        <div class="col-md-6">
                            <div class="checkout-card h-100">
                                <h6 class="title mb--10">Contact</h6>
                                <p class="mb-0">{{ $order->name }}</p>
                                <p class="mb-0">{{ $order->phone }}</p>
                                <p class="mb-0">{{ $order->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
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
