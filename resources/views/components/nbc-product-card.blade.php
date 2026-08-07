@props(['product', 'animationOrder' => 1])

@php
    if (is_object($product)) {
        $id = $product->id;
        $name = $product->name;
        $slug = $product->slug ?? \Illuminate\Support\Str::slug($name);
        $image = $product->image ? asset($product->image) : asset('admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png');
        $brandName = $product->brand?->name ?? "Nature's Secret";
        $brandSlug = $product->brand?->slug ?? "natures-secret";
        $priceFormatted = $product->formattedPrice();
        $detailUrl = route('product.details', ['slug' => $slug]);
    } else {
        $id = $product['id'] ?? 1;
        $name = $product['name'] ?? 'Product';
        $slug = \Illuminate\Support\Str::slug($name);
        $image = asset($product['image'] ?? 'admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png');
        $brandName = $product['brand'] ?? "Nature's Secret";
        $brandSlug = $product['brand_slug'] ?? 'natures-secret';
        $priceFormatted = $product['sale_price'] ?? ($product['original_price'] ?? 'LKR 0.00');
        $detailUrl = route('product.details', ['slug' => $slug]);
    }
@endphp

<div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
    <div class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-{{ $animationOrder }}">
        <div class="rbt-card-img top-rounded-md">
            <a href="{{ $detailUrl }}">
                <img class="rbt-scroll-trigger fade_in animation-order-{{ $animationOrder }} rbt-prd-img"
                    src="{{ $image }}" alt="{{ $name }}" style="height: 200px; object-fit: contain; padding: 10px;">
            </a>
            <button class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips nbc-wishlist-toggle"
                type="button" data-product-id="{{ $id }}"
                data-tooltip="Add to wishlist" data-tooltip-position="left"
                aria-label="Add {{ $name }} to wishlist">
                <i class="fa-regular fa-heart"></i>
            </button>
        </div>

        <div class="rbt-card-body rbt-bg-color-white">
            <div class="rbt-card-top-content">
                <a href="{{ route('shop', ['brand' => $brandSlug]) }}"
                    class="rbt-card-subtitle rbt-card-catagories-text">{{ $brandName }}</a>
                <h2 class="rbt-card-title">
                    <a href="{{ $detailUrl }}">{{ $name }}</a>
                </h2>
                <div class="rbt-card-rating">
                    <ul class="rbt-rating-icon-list" aria-label="5 out of 5 stars">
                        @for ($star = 0; $star < 5; $star++)
                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                        @endfor
                    </ul>
                    <p class="rating-digit">(5.0)</p>
                </div>
                <div class="pricing-part">
                    <span class="price-text font-weight-bold text-success">{{ $priceFormatted }}</span>
                </div>
            </div>

            <div class="rbt-card-footer d-flex footer-content-btn mt-3">
                <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation nbc-add-to-cart w-100 justify-content-center" href="#"
                    data-product-id="{{ $id }}"
                    data-product-name="{{ $name }}"
                    data-product-price="{{ $priceFormatted }}"
                    data-product-image="{{ $image }}"
                    data-product-url="{{ $detailUrl }}">
                    <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                </a>
            </div>
        </div>
    </div>
</div>
