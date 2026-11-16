@props(['product', 'animationOrder' => 1])

@php
    if (is_object($product)) {
        $id = $product->id;
        $name = $product->name;
        $slug = $product->slug ?? \Illuminate\Support\Str::slug($name);
        $image = $product->image ? asset($product->image) : asset('admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png');
        $imageAlt = $product->imageAlt();
        $brandName = $product->brand?->name;
        // Only link real, active brands (an invented fallback slug created a dead brand URL).
        $brandUrl = $product->brand?->status ? $product->brand->url() : null;
        $priceFormatted = $product->formattedPrice();
        $detailUrl = $product->url();
        $defaultAttributeValueId = $product->relationLoaded('attributeValues') ? $product->defaultAttributeValue()?->id : null;
    } else {
        $id = $product['id'] ?? 1;
        $name = $product['name'] ?? 'Product';
        $slug = \Illuminate\Support\Str::slug($name);
        $image = asset($product['image'] ?? 'admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png');
        $imageAlt = $product['image_alt'] ?? $name;
        $brandName = $product['brand'] ?? null;
        $brandUrl = !empty($product['brand_slug']) ? route('brand.show', $product['brand_slug']) : null;
        $priceFormatted = $product['sale_price'] ?? ($product['original_price'] ?? 'LKR 0.00');
        $detailUrl = route('product.details', ['slug' => $slug]);
        $defaultAttributeValueId = null;
    }
@endphp

<div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
    <div class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-{{ $animationOrder }}">
        <div class="rbt-card-img top-rounded-md">
            <a href="{{ $detailUrl }}">
                <img class="rbt-scroll-trigger fade_in animation-order-{{ $animationOrder }} rbt-prd-img"
                    src="{{ $image }}" alt="{{ $imageAlt }}">
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
                @if ($brandUrl)
                    <a href="{{ $brandUrl }}"
                        class="rbt-card-subtitle rbt-card-catagories-text">{{ $brandName }}</a>
                @elseif ($brandName)
                    <span class="rbt-card-subtitle rbt-card-catagories-text">{{ $brandName }}</span>
                @endif
                <h2 class="rbt-card-title">
                    <a href="{{ $detailUrl }}">{{ $name }}</a>
                </h2>
                @include('partials.product-rating', ['product' => $product])
                <div class="pricing-part">
                    <span class="price-text">{{ $priceFormatted }}</span>
                </div>
            </div>

            <div class="rbt-card-footer d-flex footer-content-btn">
                <a class="rbt-btn rbt-btn-sm has-left-icon nbc-add-to-cart" href="#"
                    data-product-id="{{ $id }}"
                    data-attribute-value-id="{{ $defaultAttributeValueId }}"
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
