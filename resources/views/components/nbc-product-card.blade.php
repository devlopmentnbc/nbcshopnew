@props(['product', 'animationOrder' => 1])

<div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
    <div class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-{{ $animationOrder }}">
        <div class="rbt-card-img top-rounded-md">
            <a href="{{ route('product.details') }}">
                <img class="rbt-scroll-trigger fade_in animation-order-{{ $animationOrder }} rbt-prd-img"
                    src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
            </a>
            <div class="rbt-badge-wrapper rbt-content-top-left">
                <div class="rbt-product-badge rbt-product-badge-bg-secondary">SALE</div>
            </div>
            <button class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                type="button" data-tooltip="Add to wishlist" data-tooltip-position="left"
                aria-label="Add {{ $product['name'] }} to wishlist">
                <i class="fa-regular fa-heart"></i>
            </button>
        </div>

        <div class="rbt-card-body rbt-bg-color-white">
            <div class="rbt-card-top-content">
                <a href="{{ route('shop', ['brand' => $product['brand_slug']]) }}"
                    class="rbt-card-subtitle rbt-card-catagories-text">{{ $product['brand'] }}</a>
                <h2 class="rbt-card-title">
                    <a href="{{ route('product.details') }}">{{ $product['name'] }}</a>
                </h2>
                <div class="rbt-card-rating">
                    <ul class="rbt-rating-icon-list" aria-label="5 out of 5 stars">
                        @for ($star = 0; $star < 5; $star++)
                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                        @endfor
                    </ul>
                    <p class="rating-digit">({{ $product['reviews'] }})</p>
                </div>
                <div class="pricing-part">
                    <del class="price-text">{{ $product['original_price'] }}</del>
                    <span class="price-text">{{ $product['sale_price'] }}</span>
                    <span class="rbt-offer-badge">-{{ $product['discount'] }}%</span>
                </div>
            </div>

            <div class="rbt-card-footer d-flex footer-content-btn">
                <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation" href="#">
                    <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                </a>
                <div class="rbt-quick-btn-grp has-mixup-midlayer">
                    <button class="rbt-compare-btn rbt-quick-btn tooltips" data-tooltip="Add to Compare"
                        data-tooltip-position="top" type="button" aria-label="Compare {{ $product['name'] }}">
                        <i class="fa-regular fa-scale-balanced"></i>
                    </button>
                    <button class="rbt-watch-btn rbt-quick-btn tooltips top-right" data-tooltip="Quick View"
                        data-tooltip-position="top" type="button" data-bs-toggle="modal"
                        data-bs-target="#quickviewModal" aria-label="Quick view {{ $product['name'] }}">
                        <i class="fa-sharp fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
