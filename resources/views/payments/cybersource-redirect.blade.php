@extends('layouts.app')

@section('title', 'Redirecting to Payment Gateway... - Unimart')

@section('content')
    <div class="rbt-section-gap">
        <div class="container text-center py-5">
            <div class="spinner-border text-primary mb-3" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h4 class="title mb-2">Redirecting to Payment Gateway</h4>
            <p class="text-muted mb-4">Please wait while we transfer you securely to complete your payment for Order #{{ $order->order_number }}.</p>
            
            <form id="cybersourceForm" action="{{ $endpoint }}" method="POST">
                @foreach ($fields as $name => $value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
                <button type="submit" class="rbt-btn btn-gradient text-white">
                    <span class="btn-text">Click here if not redirected automatically</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('cybersourceForm').submit();
        });
    </script>
@endsection
