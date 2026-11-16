{{-- Real rating from reviews; renders nothing for products without reviews. Usage: @include('partials.product-rating', ['product' => $product]) --}}
@php
    $ratingSummary = is_object($product) ? $product->ratingSummary() : null;
@endphp
@if ($ratingSummary)
    <div class="rbt-card-rating">
        <ul class="rbt-rating-icon-list" aria-label="{{ $ratingSummary['average'] }} out of 5 stars">
            @for ($star = 1; $star <= 5; $star++)
                <li><i class="fa-solid fa-star {{ $star <= round($ratingSummary['average']) ? 'rbt-rated-icon' : '' }}"></i></li>
            @endfor
        </ul>
        <p class="rating-digit">({{ number_format($ratingSummary['average'], 1) }}) · {{ $ratingSummary['count'] }} {{ $ratingSummary['count'] === 1 ? 'review' : 'reviews' }}</p>
    </div>
@endif
