@extends('layouts.app')

@section('title', "Nature's Beauty Creations | Official Online Shop")

@section('content')
    <div class="nbc-home-sections">
        <!-- Start Component Area -->
        <div class="rbt-component-area rbt-products-banner-area rbt-bg-color-white nbc-home-hero">
            <div class="wrapper nbc-hero-wrapper">
                @php
                    $displayBanners = isset($banners) && $banners->count() > 0 ? $banners : null;
                    $defaultHeroBanners = [
                        asset('assets/images/nbc/banner1.jpg'),
                        asset('assets/images/nbc/banner2.jpg'),
                        asset('assets/images/nbc/banner3.jpg'),
                        asset('assets/images/nbc/banner4.jpg'),
                        asset('assets/images/nbc/banner5.jpg'),
                    ];
                @endphp

                <div id="nbcHeroBanner"
                    class="rbt-product-banner rbt-product-banner-style-four rbt-product-banner-style-four-hv-one rbt-hero-banner rbt-banner-four-var-two rbt-banner-four-var-two-medium rbt-bg-color-brand-100 rbt-scroll-trigger fade_in animation-order-3 nbc-hero-banner"
                    style="background-image: url('{{ $displayBanners ? asset($displayBanners[0]->web_image) : asset('assets/images/nbc/banner1.jpg') }}')">
                    <div class="nbc-hero-slides" aria-hidden="true">
                        @if ($displayBanners)
                            @foreach ($displayBanners as $index => $banner)
                                @if ($banner->link)
                                    <a href="{{ $banner->link }}"
                                        class="nbc-hero-slide{{ $index === 0 ? ' is-active' : '' }}"
                                        style="display: block; position: absolute; inset: 0;">
                                        <picture style="width: 100%; height: 100%; display: block;">
                                            @if ($banner->mobile_image)
                                                <source media="(max-width: 767px)"
                                                    srcset="{{ asset($banner->mobile_image) }}">
                                            @endif
                                            <img src="{{ asset($banner->web_image) }}" alt="{{ $banner->title ?? '' }}"
                                                style="width: 100%; height: 100%; object-fit: cover;"
                                                @if ($index > 0) loading="lazy" @endif>
                                        </picture>
                                    </a>
                                @else
                                    <picture class="nbc-hero-slide{{ $index === 0 ? ' is-active' : '' }}"
                                        style="display: block; position: absolute; inset: 0;">
                                        @if ($banner->mobile_image)
                                            <source media="(max-width: 767px)"
                                                srcset="{{ asset($banner->mobile_image) }}">
                                        @endif
                                        <img src="{{ asset($banner->web_image) }}" alt="{{ $banner->title ?? '' }}"
                                            style="width: 100%; height: 100%; object-fit: cover;"
                                            @if ($index > 0) loading="lazy" @endif>
                                    </picture>
                                @endif
                            @endforeach
                        @else
                            @foreach ($defaultHeroBanners as $index => $banner)
                                <img class="nbc-hero-slide{{ $index === 0 ? ' is-active' : '' }}"
                                    src="{{ $banner }}" alt=""
                                    @if ($index > 0) loading="lazy" @endif>
                            @endforeach
                        @endif
                    </div>
                    <div class="rbt-banner-inner">
                        <div
                            class="rbt-product-banner-content text-center p--72 p_sm--32 d-flex justify-content-center align-items-center">
                        </div>
                        <div class="rbt-product-img rbt-scroll-trigger zoom_in animation-order-3" aria-hidden="true">
                            <img src="{{ $displayBanners ? asset($displayBanners[0]->web_image) : asset('assets/images/nbc/banner1.jpg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="nbc-hero-pagination" aria-label="Choose banner">
                        @if ($displayBanners)
                            @foreach ($displayBanners as $index => $banner)
                                <button class="{{ $index === 0 ? 'is-active' : '' }}" type="button"
                                    aria-label="Show banner {{ $index + 1 }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"></button>
                            @endforeach
                        @else
                            @foreach ($defaultHeroBanners as $index => $banner)
                                <button class="{{ $index === 0 ? 'is-active' : '' }}" type="button"
                                    aria-label="Show banner {{ $index + 1 }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"></button>
                            @endforeach
                        @endif
                    </div>
                </div>


            </div>
        </div>
        <!-- End Component Area -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const hero = document.getElementById('nbcHeroBanner');
                if (!hero) return;

                const slides = Array.from(hero.querySelectorAll('.nbc-hero-slide'));
                const dots = Array.from(hero.querySelectorAll('.nbc-hero-pagination button'));
                const previous = hero.querySelector('.nbc-hero-arrow--previous');
                const next = hero.querySelector('.nbc-hero-arrow--next');
                let current = 0;
                let autoplay;

                function showSlide(index) {
                    current = (index + slides.length) % slides.length;
                    slides.forEach((slide, slideIndex) => slide.classList.toggle('is-active', slideIndex === current));
                    dots.forEach((dot, dotIndex) => {
                        const active = dotIndex === current;
                        dot.classList.toggle('is-active', active);
                        dot.setAttribute('aria-current', active ? 'true' : 'false');
                    });
                }

                function startAutoplay() {
                    window.clearInterval(autoplay);
                    autoplay = window.setInterval(() => showSlide(current + 1), 5500);
                }

                previous?.addEventListener('click', function() {
                    showSlide(current - 1);
                    startAutoplay();
                });
                next?.addEventListener('click', function() {
                    showSlide(current + 1);
                    startAutoplay();
                });
                dots.forEach((dot, index) => dot.addEventListener('click', function() {
                    showSlide(index);
                    startAutoplay();
                }));
                hero.addEventListener('mouseenter', () => window.clearInterval(autoplay));
                hero.addEventListener('mouseleave', startAutoplay);
                startAutoplay();
            });
        </script>

        <!-- Start Component Area -->
        <div class="rbt-component-area rbt-brands-area rbt-bg-color-white rbt-section-gap2 nbc-brand-section">
            <div class="rbt-fullwidth-wrapper">
                <div
                    class="rbt-gray-contain-box rbt-gray-contain-box-style-one has-bg-image has-bg-image-01 pt--80 pb--80">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12">
                                <div
                                    class="rbt-component-section-title rbt-gap--4 mb--40 p-0 border-0 text-center align-items-center">
                                    <h2 class="rbt-title rbt-scroll-trigger zoom_in animation-order-2"><span
                                            class="rbt-bold--text">Our trusted </span>Brands</h2>

                                </div>
                            </div>
                        </div>

                        <!-- Start Brands Area -->
                        <div class="row row--12 mt_dec--60 nbc-brand-grid">
                            @forelse($brands ?? [] as $brand)
                                @php
                                    $order = $loop->iteration;
                                    $animOrder = (($order - 1) % 5) + 1;

                                    // Images are stored directly in public/uploads/brands/ so use asset() directly
                                    if ($brand->image) {
                                        $logoSrc = asset($brand->image);
                                    } else {
                                        // Map brand slugs to known local logo files
                                        $logoMap = [
                                            'natures-secret' =>
                                                "assets/images/nbc/Nature's Secret/nature-secrets-logo.png",
                                            'misumi' => 'assets/images/nbc/Misumi/misumi-logo.png',
                                            'selfie' => 'assets/images/nbc/Selfie/selfie-logo.png',
                                            'panda-baby' => 'assets/images/nbc/Panda Baby/panda-baby-logo.png',
                                            'champion' => 'assets/images/nbc/Champion/champion-logo.png',
                                            'chandi-panda' => 'assets/images/nbc/Chandi Panda/chandi-panda-logo.png',
                                            'elithe' => 'assets/images/nbc/Elithe/elithe-logo.png',
                                            'mydoc' => 'assets/images/nbc/Mydoc/mydoc-logo.png',
                                        ];
                                        $logoSrc = asset(
                                            $logoMap[$brand->slug] ?? 'assets/images/brands/brand-a-01.webp',
                                        );
                                    }
                                @endphp
                                <div class="nbc-brand-item mt--60">
                                    <div
                                        class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-{{ $animOrder }}">
                                        <div class="inner">
                                            <a href="{{ route('shop', ['brand' => $brand->slug]) }}"
                                                class="brand-image d-block rbt-scroll-trigger zoom_in animation-order-{{ $animOrder }}"
                                                title="View {{ $brand->name }} Products">
                                                <img src="{{ $logoSrc }}" alt="{{ $brand->name }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-4 text-muted">No brands available.</div>
                            @endforelse
                        </div>
                        <!-- End Brands Area -->
                    </div>
                </div>

            </div>

        </div>
        <!-- End Component Area -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const brandCarousel = document.querySelector('.nbc-brand-grid');
                const responsiveBrands = window.matchMedia('(max-width: 991px)');
                let brandTimer = null;
                let resumeTimer = null;

                if (!brandCarousel) {
                    return;
                }

                const stopBrandCarousel = function() {
                    window.clearInterval(brandTimer);
                    brandTimer = null;
                };

                const advanceBrandCarousel = function() {
                    if (!responsiveBrands.matches) {
                        return;
                    }

                    const firstBrand = brandCarousel.querySelector('.nbc-brand-item');
                    const carouselStyles = window.getComputedStyle(brandCarousel);
                    const carouselGap = parseFloat(carouselStyles.columnGap) || 0;
                    const step = firstBrand ? firstBrand.getBoundingClientRect().width + carouselGap : 164;
                    const end = brandCarousel.scrollWidth - brandCarousel.clientWidth;

                    if (brandCarousel.scrollLeft >= end - step / 2) {
                        brandCarousel.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        brandCarousel.scrollBy({
                            left: step,
                            behavior: 'smooth'
                        });
                    }
                };

                const startBrandCarousel = function() {
                    stopBrandCarousel();
                    if (responsiveBrands.matches) {
                        brandTimer = window.setInterval(advanceBrandCarousel, 3200);
                    }
                };

                const pauseThenResume = function() {
                    stopBrandCarousel();
                    window.clearTimeout(resumeTimer);
                    resumeTimer = window.setTimeout(startBrandCarousel, 4000);
                };

                brandCarousel.addEventListener('pointerenter', stopBrandCarousel);
                brandCarousel.addEventListener('pointerleave', startBrandCarousel);
                brandCarousel.addEventListener('touchstart', stopBrandCarousel, {
                    passive: true
                });
                brandCarousel.addEventListener('touchend', pauseThenResume, {
                    passive: true
                });
                window.addEventListener('resize', startBrandCarousel);

                startBrandCarousel();
            });
        </script>




        <!-- Start New Arrivals Area -->
        <div class="rbt-component-area rbt-products-area nbc-product-section mb--60">
            <div class="rbt-fullwidth-wrapper">
                <div class="rbt-gray-contain-box rbt-gray-contain-box-style-one rbt-bg-color-white pt--60 pb--60">
                    <div class="container">

                        <div class="row align-items-center mb--30">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="rbt-component-section-title border-0 p-0 text-start">
                                    <span
                                        class="rbt-card-subtitle b1 rbt-text-color-heading mt--0 rbt-scroll-trigger fade_in animation-order-1">Fresh
                                        additions</span>
                                    <h2 class="rbt-title rbt-scroll-trigger fade_in animation-order-2"><span
                                            class="rbt-bold--text">Shop our </span>New Arrivals</h2>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 text-md-end text-start mt_sm--15">
                                <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-secondary rbt-btn-sm rounded-pill">
                                    <span class="btn-text">View All</span>
                                    <span class="btn-icon"><i class="fa-solid fa-arrow-right ml--4"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="nbc-product-carousel-wrapper position-relative">
                            <!-- Start New Arrivals Card Area -->
                            <div class="row row--12 nbc-product-track" id="homeNewArrivalsContainer">
                                @forelse ($newArrivals as $product)
                                    <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6">
                                        <div
                                            class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                            <div class="rbt-card-img top-rounded-md">
                                                <a href="{{ route('product.details', $product->slug ?: $product->id) }}">
                                                    <img class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                        src="{{ $product->image ? asset($product->image) : asset('assets/images/nbc/Misumi/Momo Perfume.png') }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                                <div class="rbt-badge-wrapper rbt-content-top-left">
                                                    <div class="rbt-product-badge rbt-product-badge-bg-primary">NEW</div>
                                                </div>
                                                <button
                                                    class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                                    type="button" data-tooltip="Add to wishlist"
                                                    data-tooltip-position="left"><i
                                                        class="fa-regular fa-heart"></i></button>
                                            </div>
                                            <div class="rbt-card-body rbt-bg-color-white">
                                                <div class="rbt-card-top-content">
                                                    <a href="#"
                                                        class="rbt-card-subtitle rbt-card-catagories-text mt--12">
                                                        {{ $product->brand ? $product->brand->name : ($product->category ? $product->category->name : 'NBC Shop') }}
                                                    </a>
                                                    <h2 class="rbt-card-title">
                                                        <a
                                                            href="{{ route('product.details', $product->slug ?: $product->id) }}">{{ $product->name }}</a>
                                                    </h2>
                                                    <div class="rbt-card-rating">
                                                        <ul class="rbt-rating-icon-list">
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        </ul>
                                                        <p class="rating-digit">(5.0)</p>
                                                    </div>
                                                    @php $newArrivalPricing = $product->pricingSummary(); @endphp
                                                    <div class="pricing-part">
                                                        @if ($newArrivalPricing['has_sale'])
                                                            <del
                                                                class="price-text">{{ $newArrivalPricing['regular_formatted'] }}</del>
                                                            <span
                                                                class="price-text">{{ $newArrivalPricing['price_formatted'] }}</span>
                                                            <span
                                                                class="rbt-offer-badge">-{{ $newArrivalPricing['discount_percent'] }}%</span>
                                                        @else
                                                            <span
                                                                class="price-text">{{ $newArrivalPricing['price_formatted'] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="rbt-card-footer d-flex footer-content-btn">
                                                    <a class="rbt-btn rbt-btn-sm has-left-icon nbc-add-to-cart"
                                                        href="#" data-product-id="{{ $product->id }}">
                                                        <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                                                    </a>
                                                    <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                        <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                            data-tooltip="Add to Compare" data-tooltip-position="top"
                                                            type="button"><i
                                                                class="fa-regular fa-scale-balanced"></i></button>
                                                        <button class="rbt-watch-btn rbt-quick-btn tooltips top-right"
                                                            data-tooltip="Quick View" data-tooltip-position="top"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#quickviewModal"><i
                                                                class="fa-sharp fa-regular fa-eye"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-4 text-muted">No new arrivals available.</div>
                                @endforelse
                            </div>

                            <div class="nbc-product-navigation" aria-label="New Arrivals carousel controls">
                                <button id="homeNewArrivalsPrevious" type="button" aria-label="Previous products">
                                    <i class="fa-regular fa-arrow-left"></i>
                                </button>
                                <button id="homeNewArrivalsNext" type="button" aria-label="Next products">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End New Arrivals Area -->

        @if (!empty($featuredPromotion))
            <!-- Start Component Area -->
            <div
                class="rbt-component-area rbt-counterdown-area rbt-bg-color-white rbt-section-gapTop nbc-promotion-section">
                <div class="rbt-fullwidth-wrapper">

                    <div
                        class="rbt-counterdown-section rbt-counterdown-section-style-two rbt-scroll-trigger zoom_in animation-order-1 rbt-bg-color-gray-100">
                        <div class="row row--0 justify-content-end">
                            <div class="col-xl-6 col-md-12 col-12">
                                <div>
                                    <img src="{{ asset($featuredPromotion->image) }}"
                                        alt="{{ $featuredPromotion->name ?? 'Nature\'s Beauty Creations promotion' }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12 col-12">
                                <div class="rbt-counterdown-content rbt-counterdown-content-right-position">
                                    <p class="rbt-subtitle mb--0 rbt-scroll-trigger fade_in animation-order-1">
                                        {{ $featuredPromotion->promotion_label ?? 'Our Special Discount' }}
                                    </p>
                                    <h2 class="rbt-title rbt-scroll-trigger fade_in animation-order-2 rbt-text-regular">
                                        <span
                                            class="rbt-bold--text">{{ $featuredPromotion->name ?? 'Up to 20% Off' }}</span>
                                    </h2>
                                    @if (!empty($featuredPromotion->description))
                                        <p class="rbt-description mt--12 mb--0">{{ $featuredPromotion->description }}</p>
                                    @endif
                                    <div class="rbt-countdown-section d-flex mt--32">
                                        <div class="rbt-countdown-one cd-border-style rbt-countdown-lg bg-variation-black">
                                            <div class="countdown"
                                                data-date="{{ $featuredPromotion->ends_at?->format('Y-m-d') ?? '2026-12-30' }}"
                                                data-time="{{ $featuredPromotion->ends_at?->format('H:i') ?? '23:59' }}">
                                                <div class="countdown-container days">
                                                    <span class="countdown-value">87</span>
                                                    <span class="countdown-heading">Days</span>
                                                </div>
                                                <div class="countdown-container hours">
                                                    <span class="countdown-value">23</span>
                                                    <span class="countdown-heading">Hours</span>
                                                </div>
                                                <div class="countdown-container minutes">
                                                    <span class="countdown-value">38</span>
                                                    <span class="countdown-heading">Minutes</span>
                                                </div>
                                                <div class="countdown-container seconds">
                                                    <span class="countdown-value">27</span>
                                                    <span class="countdown-heading">Seconds</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Component Area -->
        @endif

        @if ($saleProducts->isNotEmpty())
        <!-- Start On Sale Products Area -->
        <div class="rbt-component-area rbt-products-area nbc-product-section nbc-sale-section rbt-section-gap2Bottom">
            <div class="rbt-fullwidth-wrapper">
                <div class="rbt-gray-contain-box rbt-gray-contain-box-style-one rbt-bg-color-gray-light pt--80 pb--80">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div
                                    class="rbt-component-section-title rbt-gap--4 text-center border-0 p-0 align-items-center">
                                    <span
                                        class="rbt-card-subtitle b1 rbt-text-color-heading mt--0 rbt-scroll-trigger fade_in animation-order-1">
                                        Limited-time savings
                                    </span>
                                    <h2 class="rbt-title rbt-scroll-trigger fade_in animation-order-2">
                                        <span class="rbt-bold--text">Shop products </span>on sale
                                    </h2>

                                    <div class="mobile-horizontal-scroll-section">
                                        <div
                                            class="rbt-product-nav-section mt--12 rbt-scroll-trigger fade_in animation-order-2 justify-content-center">
                                            <ul class="rbt-product-nav-grp">
                                                <li><a href="#on-sale-products" class="rbt-product-nav active">On
                                                        Sale</a></li>
                                            </ul>
                                            <ul class="rbt-product-nav-grp">
                                                <li>
                                                    <a href="{{ route('shop') }}" class="rbt-product-nav"
                                                        aria-label="View all products">
                                                        View All
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="on-sale-products" class="row row--12 mt_dec--24">
                            @foreach ($saleProducts as $index => $product)
                                <x-nbc-product-card :product="$product" :animation-order="($index % 4) + 1" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End On Sale Products Area -->
        @endif

        @include('partials.home-story-section', ['number' => 1, 'story' => $storySections[1]])

        <!-- Start Best Sellers Area -->
        <div class="rbt-component-area rbt-products-area nbc-product-section mb--60">
            <div class="rbt-fullwidth-wrapper">
                <div class="rbt-gray-contain-box rbt-gray-contain-box-style-one rbt-bg-color-gray-light pt--60 pb--60">
                    <div class="container">

                        <div class="row align-items-center mb--30">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="rbt-component-section-title border-0 p-0 text-start">
                                    <span
                                        class="rbt-card-subtitle b1 rbt-text-color-heading mt--0 rbt-scroll-trigger fade_in animation-order-1">Customer
                                        favourites</span>
                                    <h2 class="rbt-title rbt-scroll-trigger fade_in animation-order-2"><span
                                            class="rbt-bold--text">Shop our </span>Best Sellers</h2>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 text-md-end text-start mt_sm--15">
                                <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-secondary rbt-btn-sm rounded-pill">
                                    <span class="btn-text">View All</span>
                                    <span class="btn-icon"><i class="fa-solid fa-arrow-right ml--4"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="nbc-product-carousel-wrapper position-relative">
                            <!-- Start Best Sellers Card Area -->
                            <div class="row row--12 nbc-product-track" id="homeBestSellersContainer">
                                @forelse ($bestSellers as $product)
                                    <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6">
                                        <div
                                            class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                            <div class="rbt-card-img top-rounded-md">
                                                <a href="{{ route('product.details', $product->slug ?: $product->id) }}">
                                                    <img class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                        src="{{ $product->image ? asset($product->image) : asset('assets/images/nbc/Nature\'s Secret/herbel-hair-oil1.png') }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                                <div class="rbt-badge-wrapper rbt-content-top-left">
                                                    <div class="rbt-product-badge rbt-product-badge-bg-secondary">BEST
                                                        SELLER</div>
                                                </div>
                                                <button
                                                    class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                                    type="button" data-tooltip="Add to wishlist"
                                                    data-tooltip-position="left"><i
                                                        class="fa-regular fa-heart"></i></button>
                                            </div>
                                            <div class="rbt-card-body rbt-bg-color-white">
                                                <div class="rbt-card-top-content">
                                                    <a href="#"
                                                        class="rbt-card-subtitle rbt-card-catagories-text mt--12">
                                                        {{ $product->brand ? $product->brand->name : ($product->category ? $product->category->name : 'NBC Shop') }}
                                                    </a>
                                                    <h2 class="rbt-card-title">
                                                        <a
                                                            href="{{ route('product.details', $product->slug ?: $product->id) }}">{{ $product->name }}</a>
                                                    </h2>
                                                    <div class="rbt-card-rating">
                                                        <ul class="rbt-rating-icon-list">
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        </ul>
                                                        <p class="rating-digit">(5.0)</p>
                                                    </div>
                                                    @php $bestSellerPricing = $product->pricingSummary(); @endphp
                                                    <div class="pricing-part">
                                                        @if ($bestSellerPricing['has_sale'])
                                                            <del
                                                                class="price-text">{{ $bestSellerPricing['regular_formatted'] }}</del>
                                                            <span
                                                                class="price-text">{{ $bestSellerPricing['price_formatted'] }}</span>
                                                            <span
                                                                class="rbt-offer-badge">-{{ $bestSellerPricing['discount_percent'] }}%</span>
                                                        @else
                                                            <span
                                                                class="price-text">{{ $bestSellerPricing['price_formatted'] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="rbt-card-footer d-flex footer-content-btn">
                                                    <a class="rbt-btn rbt-btn-sm has-left-icon nbc-add-to-cart"
                                                        href="#" data-product-id="{{ $product->id }}">
                                                        <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                                                    </a>
                                                    <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                        <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                            data-tooltip="Add to Compare" data-tooltip-position="top"
                                                            type="button"><i
                                                                class="fa-regular fa-scale-balanced"></i></button>
                                                        <button class="rbt-watch-btn rbt-quick-btn tooltips top-right"
                                                            data-tooltip="Quick View" data-tooltip-position="top"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#quickviewModal"><i
                                                                class="fa-sharp fa-regular fa-eye"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-4 text-muted">No best sellers available.</div>
                                @endforelse
                            </div>

                            <div class="nbc-product-navigation" aria-label="Best Sellers carousel controls">
                                <button id="homeBestSellersPrevious" type="button" aria-label="Previous products">
                                    <i class="fa-regular fa-arrow-left"></i>
                                </button>
                                <button id="homeBestSellersNext" type="button" aria-label="Next products">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Best Sellers Area -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const bestContainer = document.getElementById('homeBestSellersContainer');
                const newContainer = document.getElementById('homeNewArrivalsContainer');
                const bestPrevious = document.getElementById('homeBestSellersPrevious');
                const bestNext = document.getElementById('homeBestSellersNext');
                const newPrevious = document.getElementById('homeNewArrivalsPrevious');
                const newNext = document.getElementById('homeNewArrivalsNext');

                if (typeof window.Swiper !== 'function') return;

                function initProductSwiper(container) {
                    if (!container) return null;
                    const slides = Array.from(container.children);
                    if (slides.length === 0) return null;

                    const wrapper = document.createElement('div');
                    wrapper.className = 'swiper-wrapper';

                    slides.forEach(function(slide) {
                        slide.classList.add('swiper-slide');
                        wrapper.appendChild(slide);
                    });

                    container.appendChild(wrapper);
                    container.classList.add('swiper');

                    return new window.Swiper(container, {
                        autoplay: false,
                        grabCursor: true,
                        loop: slides.length > 4,
                        observer: true,
                        observeParents: true,
                        slidesPerView: 1.2,
                        spaceBetween: 12,
                        speed: 500,
                        breakpoints: {
                            576: {
                                slidesPerView: 2,
                                spaceBetween: 16
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 20
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 24
                            },
                            1200: {
                                slidesPerView: 4,
                                spaceBetween: 24
                            }
                        }
                    });
                }

                const bestSwiper = initProductSwiper(bestContainer);
                const newSwiper = initProductSwiper(newContainer);

                if (bestPrevious && bestSwiper) {
                    bestPrevious.addEventListener('click', function() {
                        bestSwiper.slidePrev();
                    });
                }
                if (bestNext && bestSwiper) {
                    bestNext.addEventListener('click', function() {
                        bestSwiper.slideNext();
                    });
                }

                if (newPrevious && newSwiper) {
                    newPrevious.addEventListener('click', function() {
                        newSwiper.slidePrev();
                    });
                }
                if (newNext && newSwiper) {
                    newNext.addEventListener('click', function() {
                        newSwiper.slideNext();
                    });
                }
            });
        </script>

        <!-- Start Component Area -->
        <div class="rbt-component-area rbt-catagories-area rbt-bg-color-white rbt-section-gap nbc-category-section">
            <div class="rbt-fullwidth-wrapper">
                <div class="row">
                    <div
                        class="col-lg-12 d-flex justify-content-between flex-row align-items-end mb--40 flex-wrap rbt-gap--16">
                        <div class="rbt-component-section-title rbt-gap--4 mb--0 p-0 border-0">
                            <h2 class="rbt-title rbt-scroll-trigger fade_in animation-order-1">Discover your <span
                                    class="rbt-bold--text">daily care ritual</span></h2>
                        </div>
                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm-2 rbt-scroll-trigger fade_in animation-order-2"
                            href="categories-list.html">
                            <span class="btn-text">View All Categories</span>
                            <span class="btn-icon ml--4"><i
                                    class="fa-sharp fa-solid fa-arrow-up-right-from-square"></i></span>
                        </a>
                    </div>
                </div>

                <!-- Start Card Area -->
                <div id="nbcCategoryTrack" class="row row--12 mt_dec--24 nbc-category-track">

                    @forelse ($categories as $index => $category)
                        <div class="col-lg-1-5 col-md-4 col-6 mt--24">
                            <div
                                class="rbt-cat-box rbt-cat-box-5 variation-one rbt-scroll-trigger fade_in animation-order-{{ ($index % 5) + 1 }}">
                                <div class="inner">
                                    <div class="rbt-image-portion position-relative overflow-hidden">
                                        <a href="{{ route('shop', ['category' => $category->slug ?: $category->id]) }}">
                                            <img class="rbt-scroll-trigger zoom_in animation-order-{{ ($index % 5) + 1 }}"
                                                src="{{ $category->image ? asset($category->image) : asset('assets/images/nbc/Nature\'s Secret/herbel-hair-oil1.png') }}"
                                                alt="{{ $category->name }}">
                                        </a>
                                        <div class="rbt-right-corner-portion bottom--position">
                                            <div class="rbt-corner-portion-wrapper">
                                                <a href="{{ route('shop', ['category' => $category->slug ?: $category->id]) }}"
                                                    class="rbt-card-link-btn"><i
                                                        class="fa-solid fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content text-center">
                                        <p class="title">
                                            <a
                                                href="{{ route('shop', ['category' => $category->slug ?: $category->id]) }}">{{ $category->name }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="nbc-category-navigation" aria-label="Category carousel controls">
                    <button id="nbcCategoryPrevious" type="button" aria-label="Previous categories">
                        <i class="fa-regular fa-arrow-left"></i>
                    </button>
                    <button id="nbcCategoryNext" type="button" aria-label="Next categories">
                        <i class="fa-regular fa-arrow-right"></i>
                    </button>
                </div>
                <!-- End Card Area -->
            </div>

        </div>
        <!-- End Component Area -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const track = document.getElementById('nbcCategoryTrack');
                const previous = document.getElementById('nbcCategoryPrevious');
                const next = document.getElementById('nbcCategoryNext');

                if (!track || !previous || !next || typeof window.Swiper !== 'function') return;

                const slides = Array.from(track.children);
                const wrapper = document.createElement('div');
                wrapper.className = 'swiper-wrapper';

                slides.forEach(function(slide) {
                    slide.classList.add('swiper-slide');
                    wrapper.appendChild(slide);
                });

                track.appendChild(wrapper);
                track.classList.add('swiper');

                new window.Swiper(track, {
                    autoplay: {
                        delay: 2800,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    grabCursor: true,
                    loop: true,
                    navigation: {
                        nextEl: next,
                        prevEl: previous,
                    },
                    slidesPerView: 1.25,
                    spaceBetween: 12,
                    speed: 900,
                    breakpoints: {
                        576: {
                            slidesPerView: 2
                        },
                        768: {
                            slidesPerView: 3
                        },
                        992: {
                            slidesPerView: 4
                        },
                        1200: {
                            slidesPerView: 5
                        },
                        1440: {
                            slidesPerView: 6
                        },
                    },
                });
            });
        </script>

        @include('partials.home-story-section', ['number' => 2, 'story' => $storySections[2]])
    </div>
    <!-- Start Component Area -->
    <div class="rbt-component-area rbt-quick-inf-area rbt-bg-color-primary ptb--24">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="rbt-inf-box-wrapper rbt-inf-box-wrapper-style-one">

                        <ul class="rbt-inf-box-wrapper-list rbt-gap-sm justify-content-between">
                            <li>
                                <div class="rbt-inf-box flex-row">
                                    <div class="rbt-inf-box-icon">
                                        <i class="fa-light fa-truck-fast"></i>
                                    </div>
                                    <div class="rbt-inf-box-content align-items-start">
                                        <h2 class="rbt-inf-box-title">Islandwide Delivery</h2>
                                        <p class="rbt-inf-box-desc">Delivered across Sri Lanka</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rbt-inf-box flex-row">
                                    <div class="rbt-inf-box-icon">
                                        <i class="fa-light fa-headset"></i>
                                    </div>
                                    <div class="rbt-inf-box-content align-items-start">
                                        <h2 class="rbt-inf-box-title">Customer Care</h2>
                                        <p class="rbt-inf-box-desc">Help with your online order</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rbt-inf-box flex-row">
                                    <div class="rbt-inf-box-icon">
                                        <i class="fa-light fa-box"></i>
                                    </div>
                                    <div class="rbt-inf-box-content align-items-start">
                                        <h2 class="rbt-inf-box-title">Authentic Products</h2>
                                        <p class="rbt-inf-box-desc">Directly from NBC</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rbt-inf-box flex-row">
                                    <div class="rbt-inf-box-icon">
                                        <i class="fa-light fa-ticket"></i>
                                    </div>
                                    <div class="rbt-inf-box-content align-items-start">
                                        <h2 class="rbt-inf-box-title">Secure Shopping</h2>
                                        <p class="rbt-inf-box-desc">Shop online with confidence</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Component Area -->

    <!-- Start Footer aera -->

@endsection
