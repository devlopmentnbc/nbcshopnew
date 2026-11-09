@extends('layouts.app')

@section('title', isset($product) ? $product->name . ' - NBC Shop' : 'Product Details - NBC Shop')

@section('content')
    </div>
    <!-- End Preloader Area -->

    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="mobile-menu-top">
                <div class="inner-top">
                    <div class="content">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/nbc/logo-nbc2.png') }}" alt="NBC Logo Images">
                            </a>
                        </div>
                        <div class="rbt-btn-close">
                            <button class="close-button rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>

                </div>
                <div class="rbt-tab rbt-round-shape-tab">
                    <ul class="nav nav-tabs mb--0" id="mobile-menuTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="rbt-tab-mobilemenu-1" data-bs-toggle="tab"
                                data-bs-target="#rbt-tab-pane-mobilemenu-1" type="button" role="tab"
                                aria-controls="rbt-tab-pane-mobilemenu-1" aria-selected="true">
                                <i class="fa-solid fa-bars-sort"></i>
                                Menu
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rbt-tab-mobilemenu-2" data-bs-toggle="tab"
                                data-bs-target="#rbt-tab-pane-mobilemenu-2" type="button" role="tab"
                                aria-controls="rbt-tab-pane-mobilemenu-2" aria-selected="false">
                                <i class="fa-sharp fa-regular fa-layer-group"></i>
                                Categories
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Side Nav -->
    <div class="rbt-offcanvas-cat-side-menu rbt-category-sidemenu ">
        <div class="inner-wrapper">
            <div class="rbt-categories-sidebar d-flex">
                <div class="rbt-sidebar-left-content">
                    <div class="rbt-sidebar-left-inner">
                        <!-- Start sidebar left header -->
                        <div class="rbt-sidebar-left-content-head">
                            <div class="rbt-categories-sidebar-top-content mb--24">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('assets/images/nbc/logo-nbc2.png') }}" alt="NBC Logo">
                                    </a>
                                </div>
                                <button class="rbt-sidebar-close-btn">
                                    <i class="fa-sharp fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <div
                                class="rbt-access-box rbt-scroll-trigger fade_in animation-order-1 rbt-access-box-has-bg-hover rbt-access-box-has-bg-hover-white d-inline-block">
                                <a href="#!" class="rbt-access-box-wrapper" data-bs-toggle="modal"
                                    data-bs-target="#signinModal">
                                    <div
                                        class="rbt-round-btn rbt-bg-color-brand-300 rbt-text-color-primary has-rbt-sm-fsize">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    <div class="content">
                                        <p>Log in/Sign Up</p>
                                        <span>Access Account</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End sidebar left header -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Side Nav -->
    <!-- <a class="close_side_menu" href="javascript:void(0);"></a> -->
    <div class="rbt-breadcrumb-two rbt-bg-color-white nbc-product-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-breadcrumb-inner d-flex align-items-center justify-content-between">
                        <ul class="rbt-breadcrumb-page-list justify-content-start mt--0">
                            <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                            <li>
                                <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                            </li>
                            @if ($product?->category)
                                <li class="rbt-breadcrumb-item">
                                    <a href="{{ route('shop', ['category' => $product->category->slug ?: $product->category->id]) }}">
                                        {{ $product->category->name }}
                                    </a>
                                </li>
                                <li>
                                    <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                                </li>
                            @endif
                            <li class="rbt-breadcrumb-item active" aria-current="page">
                                {{ $product?->name ?? 'Product Details' }}
                            </li>
                        </ul>

                        <div class="rbt-single-nav">

                            <div class="rbt-products-nav">


                                <a href="{{ route('shop') }}" class="rbt-product-nav-btn rbt-round-btn tooltips"
                                    data-tooltip="Back To Products" data-tooltip-position="top">
                                    <i class="fa-regular fa-grid-2"></i>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Component Area -->
    <div
        class="rbt-component-area rbt-single-product-area nbc-product-details-area rbt-bg-color-white rbt-section-gapBottom">
        <div class="container">
            <div class="row row--20 mt_dec--16 justify-content-center">
                <div class="col-xl-7 col-lg-12 col-12 mt--16 nbc-fresh-product-gallery-container">
                    <div class="nbc-fresh-product-gallery" data-product-gallery>
                        <div class="nbc-fresh-product-gallery__stage">
                            <a class="nbc-fresh-product-gallery__enlarge" data-gallery-enlarge
                                data-fancybox="product-gallery"
                                href="{{ isset($product) && $product->image ? asset($product->image) : (isset($product) && $product->images?->first() ? asset($product->images->first()->image_path) : asset('assets/images/product-single/earphone/earphone-05.webp')) }}"
                                aria-label="Enlarge product image">
                                <i class="fa-regular fa-arrows-maximize"></i>
                            </a>

                           <!-- <button class="nbc-fresh-product-gallery__arrow nbc-fresh-product-gallery__arrow--prev"
                                type="button" data-gallery-prev aria-label="Previous product image">
                                <i class="fa-regular fa-arrow-left"></i>
                            </button> -->

                            <img class="nbc-fresh-product-gallery__main" data-gallery-main
                                src="{{ isset($product) && $product->image ? asset($product->image) : (isset($product) && $product->images?->first() ? asset($product->images->first()->image_path) : asset('assets/images/product-single/earphone/earphone-05.webp')) }}"
                                alt="{{ isset($product) ? $product->name : 'Product image' }}">

                            <!-- <button class="nbc-fresh-product-gallery__arrow nbc-fresh-product-gallery__arrow--next"
                                type="button" data-gallery-next aria-label="Next product image">
                                <i class="fa-regular fa-arrow-right"></i>
                            </button> -->
                        </div>

                        <div class="nbc-fresh-product-gallery__thumbs" data-gallery-thumbs aria-label="Product images">
                            @if (isset($product) && $product->image)
                                <button class="nbc-fresh-product-gallery__thumb is-active" type="button"
                                    data-gallery-thumb data-image="{{ asset($product->image) }}"
                                    aria-label="View main image" aria-pressed="true">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                </button>
                            @endif

                            @if (isset($product) && $product->images)
                                @foreach ($product->images as $index => $galleryImage)
                                    <button
                                        class="nbc-fresh-product-gallery__thumb {{ !$product->image && $loop->first ? 'is-active' : '' }}"
                                        type="button" data-gallery-thumb
                                        data-image="{{ asset($galleryImage->image_path) }}"
                                        aria-label="View product image {{ $index + 1 }}"
                                        aria-pressed="{{ !$product->image && $loop->first ? 'true' : 'false' }}">
                                        <img src="{{ asset($galleryImage->image_path) }}"
                                            alt="{{ $product->name }}">
                                    </button>
                                @endforeach
                            @endif

                            @if (!isset($product) || (!$product->image && (!$product->images || $product->images->isEmpty())))
                                <button class="nbc-fresh-product-gallery__thumb is-active" type="button"
                                    data-gallery-thumb
                                    data-image="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}"
                                    aria-label="View product image" aria-pressed="true">
                                    <img src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}"
                                        alt="Product image">
                                </button>
                            @endif
                        </div>
                    </div>

                    <script>
                        (function() {
                            const gallery = document.currentScript.previousElementSibling;
                            if (!gallery || !gallery.matches('[data-product-gallery]')) return;

                            const mainImage = gallery.querySelector('[data-gallery-main]');
                            const enlargeLink = gallery.querySelector('[data-gallery-enlarge]');
                            const thumbnails = Array.from(gallery.querySelectorAll('[data-gallery-thumb]'));
                            const previousButton = gallery.querySelector('[data-gallery-prev]');
                            const nextButton = gallery.querySelector('[data-gallery-next]');
                            let activeIndex = Math.max(0, thumbnails.findIndex(function(thumbnail) {
                                return thumbnail.classList.contains('is-active');
                            }));
                            let autoplayTimer = null;

                            function syncStageToImageRatio() {
                                if (!mainImage.naturalWidth || !mainImage.naturalHeight) return;
                                gallery.style.setProperty(
                                    '--nbc-gallery-image-ratio',
                                    mainImage.naturalWidth + ' / ' + mainImage.naturalHeight
                                );
                            }

                            function restartAutoplay() {
                                window.clearInterval(autoplayTimer);
                                if (thumbnails.length < 2) return;
                                autoplayTimer = window.setInterval(function() {
                                    selectImage(activeIndex + 1);
                                }, 4000);
                            }

                            function selectImage(index) {
                                if (!thumbnails.length) return;
                                activeIndex = (index + thumbnails.length) % thumbnails.length;
                                const selected = thumbnails[activeIndex];
                                const imageUrl = selected.dataset.image;

                                mainImage.classList.add('is-changing');
                                mainImage.src = imageUrl;
                                enlargeLink.href = imageUrl;
                                thumbnails.forEach(function(thumbnail, thumbnailIndex) {
                                    const active = thumbnailIndex === activeIndex;
                                    thumbnail.classList.toggle('is-active', active);
                                    thumbnail.setAttribute('aria-pressed', active ? 'true' : 'false');
                                });
                                selected.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'nearest',
                                    inline: 'nearest'
                                });
                            }

                            mainImage.addEventListener('load', function() {
                                syncStageToImageRatio();
                                mainImage.classList.remove('is-changing');
                            });
                            if (mainImage.complete) syncStageToImageRatio();
                            thumbnails.forEach(function(thumbnail, index) {
                                thumbnail.addEventListener('click', function() {
                                    selectImage(index);
                                    restartAutoplay();
                                });
                            });
                            previousButton.addEventListener('click', function() {
                                selectImage(activeIndex - 1);
                                restartAutoplay();
                            });
                            nextButton.addEventListener('click', function() {
                                selectImage(activeIndex + 1);
                                restartAutoplay();
                            });

                            if (thumbnails.length < 2) {
                                previousButton.hidden = true;
                                nextButton.hidden = true;
                            } else {
                                gallery.addEventListener('mouseenter', function() {
                                    window.clearInterval(autoplayTimer);
                                });
                                gallery.addEventListener('mouseleave', restartAutoplay);
                                gallery.addEventListener('focusin', function() {
                                    window.clearInterval(autoplayTimer);
                                });
                                gallery.addEventListener('focusout', restartAutoplay);
                                restartAutoplay();
                            }
                        })();
                    </script>
                </div>
                <div class="col-xl-5 col-lg-12 col-12 mt--16 nbc-product-summary-column">
                    <div class="rbt-single-product-content ptb--0 rbt-product-variations"
                        data-variations='{"global":{"types":{"rbt_product_attribute_color":{"type":"color","label":"Color","attributes":[{"color":"#2B2B2B","label":"Black","slug":"black"},{"color":"#cc999d","label":"Pink","slug":"pink"},{"color":"#9C9B9E","label":"Dark","slug":"dark"},{"color":"#F2EDE7","label":"White","slug":"white"},{"color":"#a09fa4","label":"Gray","slug":"gray"}]},"rbt_product_attribute_size":{"type":"dropdown","label":"Size","attributes":[{"label":"Select","slug":""},{"label":"Extra Large","slug":"xl"},{"label":"Large","slug":"lg"},{"label":"Medium","slug":"md"},{"label":"Small","slug":"sm"},{"label":"Extra Small","slug":"xs"}]},"rbt_product_attribute_layout":{"type":"image","label":"Brand","attributes":[{"image_url":"assets/images/product-single/ear-add-prd/eadd-prd-1.webp","label":"Go Pro","alt":"Go Pro"},{"image_url":"assets/images/product-single/ear-add-prd/eadd-prd-2.webp","label":"Watch","alt":"watch"},{"image_url":"assets/images/product-single/ear-add-prd/eadd-prd-3.webp","label":"Camera","alt":"Camera"},{"image_url":"assets/images/product-single/ear-add-prd/eadd-prd-4.webp","label":"Airpod","alt":"Airpod"}]},"rbt_product_attribute_style":{"type":"button","label":"Style","attributes":[{"label":"Casual","slug":"casual"},{"label":"Formal","slug":"formal"},{"label":"Extrime","slug":"extrime"}]}}},"local":[{"attributes":{"rbt_product_attribute_color":"#2B2B2B","rbt_product_attribute_style":"casual","rbt_product_attribute_size":"xl","rbt_product_attribute_layout":"assets/images/product-single/ear-add-prd/eadd-prd-1.webp"},"price":{"regular":950,"sale":120},"description":"Alt Content","sku":"headphone-with-black-extra-large","images":{"thumbnails":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}},"full":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}}},"quantity":150},{"attributes":{"rbt_product_attribute_color":"#2B2B2B","rbt_product_attribute_style":"formal","rbt_product_attribute_size":"xl","rbt_product_attribute_layout":"assets/images/product-single/ear-add-prd/eadd-prd-2.webp"},"price":{"regular":950,"sale":120},"description":"Alt Content","sku":"headphone-with-black-extra-large","images":{"thumbnails":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}},"full":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}}},"quantity":150},{"attributes":{"rbt_product_attribute_color":"#2B2B2B","rbt_product_attribute_style":"casual","rbt_product_attribute_size":"lg","rbt_product_attribute_layout":"assets/images/product-single/ear-add-prd/eadd-prd-2.webp"},"price":{"regular":530,"sale":230},"description":"Alt Content","sku":"headphone-with-black-extra-large","images":{"thumbnails":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}},"full":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}}},"quantity":150},{"attributes":{"rbt_product_attribute_color":"#2B2B2B","rbt_product_attribute_style":"casual","rbt_product_attribute_size":"xl","rbt_product_attribute_layout":"assets/images/product-single/ear-add-prd/eadd-prd-2.webp"},"price":{"regular":530,"sale":230},"description":"Alt Content","sku":"headphone-with-black-extra-large","images":{"thumbnails":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}},"full":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}}},"quantity":150},{"attributes":{"rbt_product_attribute_color":"#2B2B2B","rbt_product_attribute_style":"formal","rbt_product_attribute_size":"sm","rbt_product_attribute_layout":"assets/images/product-single/ear-add-prd/eadd-prd-3.webp"},"price":{"regular":920,"sale":240},"description":"Alt Content","sku":"headphone-with-black-extra-large","images":{"thumbnails":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}},"full":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}}},"quantity":150},{"attributes":{"rbt_product_attribute_color":"#cc999d","rbt_product_attribute_size":"xl","rbt_product_attribute_style":"formal","rbt_product_attribute_layout":"assets/images/product-single/ear-add-prd/eadd-prd-4.webp"},"price":{"regular":1200,"sale":130},"description":"Alt Content","sku":"headphone-with-black-extra-large","images":{"thumbnails":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}},"full":{"1":{"url":"assets/images/product-single/earphone/earphone-04.webp","alt":"Alt Content"},"2":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"},"3":{"url":"assets/images/product-single/earphone/earphone-01.webp","alt":"Alt Content"},"4":{"url":"assets/images/product-single/earphone/earphone-03.webp","alt":"Alt Content"},"5":{"url":"assets/images/product-single/earphone/earphone-02.webp","alt":"Alt Content"}}},"quantity":150}]}'>

                        <div class="nbc-product-badges" aria-label="Product labels">
                            @if (isset($product) && $product->is_new_arrival)
                                <span class="nbc-product-badge">New</span>
                            @endif
                            @if (isset($product) && ($product->is_on_sale || $product->discount_percentage))
                                <span class="nbc-product-badge nbc-product-badge--sale">Sale</span>
                            @endif
                        </div>
                        <a href="{{ route('shop') }}"
                            class="rbt-card-subtitle rbt-card-catagories-text mt--16">{{ isset($product) && $product->category ? $product->category->name : 'Category' }}</a>
                        <h2 class="rbt-card-title mt--12">{{ isset($product) ? $product->name : 'Product Name' }}
                        </h2>
                        <p class="description-text b2 mt--16 nbc-summary-description">
                            {!! isset($product) && $product->short_description ? nl2br(e($product->short_description)) : 'No description available.' !!}
                        </p>
                        @php
                            $summaryDefaultVariant = isset($product) ? $product->defaultAttributeValue() : null;
                            $summaryCurrency = session('currency', 'LKR');
                            $summarySymbol = $summaryCurrency === 'USD' ? '$' : 'LKR ';

                            if ($summaryDefaultVariant) {
                                $summaryRegular = (float) ($summaryCurrency === 'USD' ? $summaryDefaultVariant->pivot->price_usd : $summaryDefaultVariant->pivot->price_lkr);
                                $summarySale = $summaryCurrency === 'USD' ? $summaryDefaultVariant->pivot->sale_price_usd : $summaryDefaultVariant->pivot->sale_price_lkr;
                                $summaryHasSale = $summarySale && (float) $summarySale > 0 && (float) $summarySale < $summaryRegular;
                                $summaryDiscountPct = $summaryHasSale && $summaryRegular > 0 ? round((1 - ((float) $summarySale / $summaryRegular)) * 100) : 0;
                                $summaryDisplayPrice = $summaryHasSale ? (float) $summarySale : $summaryRegular;
                            } else {
                                $summaryRegular = 0;
                                $summaryHasSale = false;
                                $summaryDiscountPct = 0;
                                $summaryDisplayPrice = 0;
                            }
                        @endphp
                        <div class="rbt-info-wrapper d-flex justify-content-between mt--16 nbc-summary-price">
                            <div class="rbt-store-price-1">
                                <div class="pricing-part mt--0">
                                    <del class="price-text js-nbc-regular-price"
                                        style="{{ $summaryHasSale ? '' : 'display:none' }}">{{ $summarySymbol }}{{ number_format($summaryRegular, 2) }}</del>
                                    <span
                                        class="price-text js-nbc-sale-price">{{ $summaryDefaultVariant ? $summarySymbol . number_format($summaryDisplayPrice, 2) : (isset($product) ? $product->formattedPrice() : 'N/A') }}</span>
                                    <span class="rbt-offer-badge js-nbc-offer-badge"
                                        style="{{ $summaryHasSale ? '' : 'display:none' }}">-{{ $summaryDiscountPct }}%</span>
                                </div>
                            </div>
                            <div class="rbt-quick-access-banner-action-btn d-flex align-items-center">
                                <button class="rbt-btn rbt-btn-xs rbt-btn-secondary d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#findstoreModal">
                                    <i class="fa-regular fa-location-dot mr--4"></i> Find A Near Store
                                </button>
                            </div>
                        </div>
                        <div class="rbt-info-wrapper d-flex mt--24 nbc-summary-rating">
                            <div class="rbt-card-rating mt--0">
                                <ul class="rbt-rating-icon-list">
                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                </ul>
                                <p class="rating-digit">(46)</p>
                                <div class="prd-info-section has-left-separator">
                                    <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                            class="fa-solid fa-bag-shopping"></i></span>
                                                    90+ Sold Recently
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                            class="fa-solid fa-truck"></i></span>
                                                    Free shipping
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                            class="fa-solid fa-rotate-left"></i></span>
                                                    7 Days Return Plicy
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rbt-verticle-arrow rbt-arrow-prev">
                                            <i class="fa-regular fa-chevron-up"></i>
                                        </div>
                                        <div class="rbt-verticle-arrow rbt-arrow-next">
                                            <i class="fa-regular fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nbc-product-benefits">
                            <span><i class="fa-solid fa-truck"></i> Free islandwide shipping</span>
                            <span><i class="fa-solid fa-shield-check"></i> Authentic NBC product</span>
                        </div>
                        <div class="rbt-info-wrapper d-flex mt--12 nbc-summary-sku">

                            <div class="prd-info-section has-left-separator">
                                <br>
                                <!-- <div class="prd-id-text">
                                        <p class="text-bold">All Europe</p>
                                        <a href="#" class="rbt-brand-img tooltips" data-tooltip="All Europe Delivary" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-02.webp') }}" alt="Small icon Brand"></a>
                                    </div>
                                </div>
                                <div class="prd-info-section has-left-separator">
                                    <div class="prd-id-text">
                                        <p class="text-bold">Verified:</p>
                                        <span class="rbt-brand-img tooltips" data-tooltip="Verified Product" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-03.webp') }}" alt="Small icon Brand"></span>
                                    </div>
                                </div>
                                <div class="prd-info-section has-left-separator">
                                    <div class="prd-id-text">
                                        <p class="text-bold">Brand:</p>
                                        <a href="#" class="rbt-brand-img tooltips" data-tooltip="Product Brand" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-01.webp') }}" alt="Small icon Brand"></a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="rbt-info-wrapper d-flex mt--24 rbt-gap--12 flex-wrap">
                                <div class="prd-info-section">
                                    <a class="rbt-quick-info-tag d-flex align-items-center rbt-gap--8 rbt-flash-animation" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z" fill="url(#paint0_linear_3632_18878)"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z" fill="#FC9502"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z" fill="#FCE202"></path>
                                            <defs>
                                                <lineargradient id="paint0_linear_3632_18878" x1="11.9995" y1="22.0148" x2="11.9995" y2="2.01511" gradientunits="userSpaceOnUse">
                                                    <stop offset="1" stop-color="#FF4C0D"></stop>
                                                    <stop offset="1" stop-color="#FC9502"></stop>
                                                </lineargradient>
                                            </defs>
                                        </svg>
                                        <p><strong>34 products sold in last 10 hours.</strong></p>
                                    </a>
                                </div>
                                <div class="prd-info-section">
                                    <a class="rbt-quick-info-tag d-flex align-items-center rbt-gap--8 rbt-shiny" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewbox="0 0 14 10" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.98586 5.18652C1.93484 5.12038 1.88687 5.05807 1.84423 5.00038C2.25958 4.44469 2.71871 3.92381 3.21712 3.44281C4.28087 2.42212 5.61949 1.53911 7 1.53911C8.38051 1.53911 9.71837 2.42212 10.7829 3.44281C11.2813 3.92383 11.7404 4.44471 12.1558 5.00038C11.7402 5.55588 11.2811 6.07675 10.7829 6.55796C9.71837 7.57865 8.38051 8.46166 7 8.46166C5.61949 8.46166 4.28163 7.57865 3.21712 6.55796C2.77476 6.13114 2.36329 5.67282 1.98586 5.18652ZM13.7297 4.58042L13.0916 5.00038L13.7297 5.42035L13.7282 5.42266L13.7259 5.42574L13.7183 5.43804L13.6901 5.47958C13.5374 5.70347 13.378 5.92253 13.2119 6.13645C12.789 6.68142 12.3279 7.19501 11.8322 7.67326C10.6915 8.76779 8.98433 10 7 10C5.01566 10 3.3085 8.76779 2.16785 7.67326C1.47767 7.00644 0.855254 6.27156 0.30991 5.47958C0.300444 5.46579 0.291053 5.45194 0.281736 5.43804L0.274122 5.42574L0.271837 5.42266L0.271076 5.42112C0.271076 5.42035 0.270314 5.42035 0.908409 5.00038L0.270314 4.58042L0.271837 4.57811L0.274122 4.57503L0.281736 4.56273C0.323524 4.49897 0.366683 4.43614 0.411182 4.37428C0.932338 3.63825 1.52073 2.95324 2.16861 2.32828C3.30773 1.23144 5.01566 0 7 0C8.98433 0 10.6915 1.23221 11.8322 2.32674C12.5223 2.99355 13.1448 3.72843 13.6901 4.52042L13.7183 4.56196L13.7259 4.57426L13.7282 4.57734L13.7289 4.57888L13.7297 4.58042ZM13.0916 5.00038L13.7297 4.58042L14 5.00038L13.7297 5.42035L13.0916 5.00038ZM0.270314 4.58042L0.908409 5.00038L0.270314 5.42035L0 5.00038L0.270314 4.58042ZM6.23855 5.00038C6.23855 4.79639 6.31877 4.60075 6.46157 4.4565C6.60437 4.31225 6.79805 4.23121 7 4.23121C7.20195 4.23121 7.39563 4.31225 7.53842 4.4565C7.68122 4.60075 7.76145 4.79639 7.76145 5.00038C7.76145 5.20438 7.68122 5.40002 7.53842 5.54427C7.39563 5.68852 7.20195 5.76956 7 5.76956C6.79805 5.76956 6.60437 5.68852 6.46157 5.54427C6.31877 5.40002 6.23855 5.20438 6.23855 5.00038ZM7 2.69287C6.39415 2.69287 5.81312 2.93598 5.38472 3.36873C4.95632 3.80147 4.71565 4.38839 4.71565 5.00038C4.71565 5.61238 4.95632 6.1993 5.38472 6.63204C5.81312 7.06479 6.39415 7.3079 7 7.3079C7.60585 7.3079 8.18688 7.06479 8.61528 6.63204C9.04367 6.1993 9.28435 5.61238 9.28435 5.00038C9.28435 4.38839 9.04367 3.80147 8.61528 3.36873C8.18688 2.93598 7.60585 2.69287 7 2.69287Z" fill="#24BD25"></path>
                                        </svg>
                                        <p><strong>20 people are viewing this</strong></p>
                                    </a>
                                </div>
                            </div> -->

                            <!-- Dynamic Attributes Section -->
                            @if (isset($product) && $product->attributeValues && $product->attributeValues->count() > 0)
                                @php
                                    $groupedAttributes = $product->attributeValues->groupBy(function ($item) {
                                        return $item->attribute->name ?? 'Attribute';
                                    });
                                    $defaultVariant = $product->defaultAttributeValue();
                                @endphp
                                <style>
                                    #nbcProductAttributes .nbc-variant-pill.is-active {
                                        border-color: var(--color-primary, #dc2626) !important;
                                        background-color: rgba(220, 38, 38, 0.06) !important;
                                        color: var(--color-primary, #dc2626) !important;
                                    }
                                </style>
                                <div class="rbt-product-attributes-wrapper mt--24" id="nbcProductAttributes"
                                    data-currency="{{ session('currency', 'LKR') }}">
                                    @foreach ($groupedAttributes as $attrName => $values)
                                        <div class="rbt-attribute-group mb--16">
                                            <label class="rbt-title b2 mb--8 d-block"
                                                style="font-weight: 600; color: #222;">{{ $attrName }}:</label>
                                            <div class="d-flex flex-wrap align-items-center" style="gap: 8px;">
                                                @foreach ($values as $val)
                                                    <button type="button"
                                                        class="rbt-attr-pill nbc-variant-pill px-3 py-2 border rounded d-inline-flex align-items-center {{ $defaultVariant && $defaultVariant->id === $val->id ? 'is-active' : '' }}"
                                                        data-attribute-value-id="{{ $val->id }}"
                                                        data-value-name="{{ $val->value_name }}"
                                                        data-regular-lkr="{{ $val->pivot->price_lkr }}"
                                                        data-regular-usd="{{ $val->pivot->price_usd }}"
                                                        data-sale-lkr="{{ $val->pivot->sale_price_lkr }}"
                                                        data-sale-usd="{{ $val->pivot->sale_price_usd }}"
                                                        style="border: 1px solid #e2e8f0; background-color: #f8fafc; border-radius: 8px; font-size: 14px; color: #1e293b; font-weight: 500; cursor: pointer;">
                                                        <span>{{ $val->value_name }}</span>
                                                        @if ($val->metric)
                                                            <span class="ms-1 text-muted"
                                                                style="font-size: 12px; opacity: 0.8; margin-left: 4px;">({{ $val->metric }})</span>
                                                        @endif
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <script>
                                    (function() {
                                        const wrapper = document.getElementById('nbcProductAttributes');
                                        if (!wrapper) return;

                                        const currency = wrapper.dataset.currency === 'USD' ? 'USD' : 'LKR';
                                        const regularEls = document.querySelectorAll('.js-nbc-regular-price');
                                        const saleEls = document.querySelectorAll('.js-nbc-sale-price');
                                        const badgeEls = document.querySelectorAll('.js-nbc-offer-badge');
                                        const addToCartBtns = document.querySelectorAll('.js-nbc-add-to-cart');

                                        function formatAmount(amount) {
                                            const num = Number(amount || 0);
                                            return currency === 'USD'
                                                ? ('$' + num.toFixed(2))
                                                : ('LKR ' + num.toLocaleString('en-LK', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                                        }

                                        function selectVariant(pill) {
                                            wrapper.querySelectorAll('.nbc-variant-pill').forEach(function(p) {
                                                p.classList.remove('is-active');
                                            });
                                            pill.classList.add('is-active');

                                            const regular = Number((currency === 'USD' ? pill.dataset.regularUsd : pill.dataset.regularLkr) || 0);
                                            const saleRaw = currency === 'USD' ? pill.dataset.saleUsd : pill.dataset.saleLkr;
                                            const sale = Number(saleRaw || 0);
                                            const hasSale = saleRaw && sale > 0 && sale < regular;
                                            const discountPct = hasSale && regular > 0 ? Math.round((1 - (sale / regular)) * 100) : 0;
                                            const displayPrice = hasSale ? sale : regular;

                                            regularEls.forEach(function(el) {
                                                el.textContent = formatAmount(regular);
                                                el.style.display = hasSale ? '' : 'none';
                                            });
                                            saleEls.forEach(function(el) {
                                                el.textContent = formatAmount(displayPrice);
                                            });
                                            badgeEls.forEach(function(el) {
                                                el.textContent = '-' + discountPct + '%';
                                                el.style.display = hasSale ? '' : 'none';
                                            });

                                            addToCartBtns.forEach(function(btn) {
                                                btn.dataset.attributeValueId = pill.dataset.attributeValueId;
                                            });
                                        }

                                        wrapper.querySelectorAll('.nbc-variant-pill').forEach(function(pill) {
                                            pill.addEventListener('click', function() {
                                                selectVariant(pill);
                                            });
                                        });
                                    })();
                                </script>
                            @endif
                            <!-- <div class="rbt-countdown-banner rbt-countdown-banner-sm rbt-countdown-banner-has-bg-01">
                                    <span class="b3 rbt-title">Special Offer :</span>
                                    <div class="rbt-countdown-section">
                                        <div class="rbt-countdown-one bg-variation-white cd-border-style">
                                            <div class="countdown" data-date="2026-12-30">
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
                                    <span class="rbt-desc b4">Remains until the end of the offer.</span>
                                </div> -->
                        </div>

                        <!-- <div class="rbt-info-wrapper d-block mt--24">
                                <div class="rbt-prd-qty-area">
                                    <p class="prd-qty-txt"><strong>Only {{ isset($product) ? $product->totalStock() : 0 }} pc left</strong></p>
                                    <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar w-50"></div>
                                    </div>
                                </div>
                            </div> -->

                        <div class="product-btn-grp">
                            <div class="rbt-qty-area">
                                <button class="qty-item-btn qty-item-btn-decr"><i
                                        class="fa-solid fa-minus"></i></button>
                                <input type="number" class="items-qty-input" value="1" min="1">
                                <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <a class="rbt-btn rbt-btn-border has-left-icon d-block text-center btn-add-to-cart js-nbc-add-to-cart"
                                href="#" data-product-id="{{ isset($product) ? $product->id : '' }}"
                                data-attribute-value-id="{{ $summaryDefaultVariant?->id }}"><i
                                    class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                        </div>
                        <div class="prd-btn-grp">
                            <a class="rbt-btn d-block text-center" href="#">Buy Now</a>
                        </div>
                        <div class="rbt-quick-link-grp">
                            <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#compareviewModal"
                                type="button"><i class="fa-sharp fa-regular fa-copy"></i>Compare Product</button>
                            <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#wishlistModal"
                                type="button"><i class="fa-sharp fa-regular fa-heart"></i>Add To Wishlist</button>
                            <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#socialShareModal"
                                type="button"><i class="fa-sharp fa-regular fa-share-nodes"></i>Share</button>
                        </div>



                        <div class="rbt-info-wrapper d-block mt--24">
                            <!-- <div class="rbt-info-box rbt-bg-color-brand-50">
                                    <p class="text-bold rbt-info-title b1">Additional Offers</p>
                                    <div class="rbt-coupon-container">
                                        <div class="swiper rbt-couponSwiper rbt-swiper-scrollbar-bottom">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide rbt-scroll-trigger fade_in animation-order-1">
                                                    <div class="rbt-coupon">
                                                        <div class="inner rbt-text-copy-activation">
                                                            <div class="left-part">
                                                                <input type="text" value="WELCOME100" readonly="" class="rbt-coupon-code-text rbt-has-right-shepe-border rbt-copy-value-field">
                                                            </div>
                                                            <div class="coupon-details">
                                                                <h2 class="rbt-coupon-info-title b1">UP TO 30% OFF</h2>
                                                                <p class="rbt-coupon-info-sub-title b3 mt--4">For orders
                                                                    over Rs. 9.90</p>
                                                                <ul class="rbt-coupon-info-list mt--12">
                                                                    <li><span>12/18/2023 14:00 ~ 12/25/2023 14:00</span>
                                                                    </li>
                                                                    <li><span>The minimum spend for this coupon
                                                                            <strong>Rs. 200.00</strong></span></li>
                                                                </ul>
                                                            </div>
                                                            <button class="copy-icon rbt-round-btn rbt-bg-primary rbt-copy-btn" data-tooltip="Copy">
                                                                <i class="fa-sharp fa-regular fa-copy"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide rbt-scroll-trigger fade_in animation-order-1">
                                                    <div class="rbt-coupon">
                                                        <div class="inner rbt-text-copy-activation">
                                                            <div class="left-part">
                                                                <input type="text" value="WELCOME100" readonly="" class="rbt-coupon-code-text rbt-has-right-shepe-border rbt-copy-value-field">
                                                            </div>
                                                            <div class="coupon-details">
                                                                <h2 class="rbt-coupon-info-title b1">UP TO 30% OFF</h2>
                                                                <p class="rbt-coupon-info-sub-title b3 mt--4">For orders
                                                                    over Rs. 9.90</p>
                                                                <ul class="rbt-coupon-info-list mt--12">
                                                                    <li><span>12/18/2023 14:00 ~ 12/25/2023 14:00</span>
                                                                    </li>
                                                                    <li><span>The minimum spend for this coupon
                                                                            <strong>Rs. 200.00</strong></span></li>
                                                                </ul>
                                                            </div>
                                                            <button class="copy-icon rbt-round-btn rbt-bg-primary rbt-copy-btn" data-tooltip="Copy">
                                                                <i class="fa-sharp fa-regular fa-copy"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide rbt-scroll-trigger fade_in animation-order-1">
                                                    <div class="rbt-coupon rbt-coupon-expired">
                                                        <div class="inner rbt-text-copy-activation">
                                                            <div class="left-part">
                                                                <input type="text" value="WELCOME100" readonly="" class="rbt-coupon-code-text rbt-has-right-shepe-border rbt-copy-value-field">
                                                            </div>
                                                            <div class="coupon-details">
                                                                <h2 class="rbt-coupon-info-title b1">UP TO 30% OFF</h2>
                                                                <p class="rbt-coupon-info-sub-title b3 mt--4">For orders
                                                                    over Rs. 9.90</p>
                                                                <ul class="rbt-coupon-info-list mt--12">
                                                                    <li><span>12/18/2023 14:00 ~ 12/25/2023 14:00</span>
                                                                    </li>
                                                                    <li><span>The minimum spend for this coupon
                                                                            <strong>Rs. 200.00</strong></span></li>
                                                                </ul>
                                                            </div>
                                                            <button class="rbt-btn rbt-bg-color-gray-300 shadow-none rbt-btn-sm">
                                                                Expired
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbt-swiper-scrollbar swiper-scrollbar"></div>
                                        </div>
                                    </div>
                                </div> -->
                        </div>
                        <!-- <hr class="rbt-separator rbt-separator-gray200 mt--24 mb--24">
                            <div class="rbt-info-wrapper d-block mt--24">
                                <div class="rbt-info-box rbt-bg-color-brand-50">
                                    <p class="text-bold rbt-info-title b1">Alternative For This Product</p>
                                    <div class="rbt-list-product-container d-flex flex-column rbt-gap--24">
                                        <div class="rbt-single-element d-flex align-items-center">
                                            <div class="rbt-card rbt-product-card rbt-list-view-variation rbt-list-view-sm rbt-prd-sing-add-card">
                                                <div class="inner">
                                                    <div class="rbt-card-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}"><img src="{{ asset('assets/images/product-single/ear-add-prd/eadd-prd-1.webp') }}" alt="Card Image"></a>
                                                    </div>
                                                    <div class="rbt-card-body d-flex rbt-gap--8 align-items-center">
                                                        <div class="left-part">
                                                            <a href="shop-by-category.html" class="rbt-card-subtitle b4 rbt-card-catagories-text mt--0"><i class="fa-regular fa-camera mr--4"></i>
                                                                Camera</a>
                                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Sony Alpha A7 IV
                                                                    Full-Frame Camera</a></h2>
                                                        </div>
                                                        <div class="right-part">
                                                            <div class="rbt-card-rating">
                                                                <ul class="rbt-rating-icon-list">
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                </ul>
                                                                <p class="rating-digit">(46)</p>
                                                            </div>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 116.34</del>
                                                                <span class="price-text">Rs. 69.78</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbt-create-new-btn">
                                                <button class="rbt-btn rbt-btn-xs text-nowrap" data-bs-toggle="modal" data-bs-target="#quickviewModal">ADD <i class="fa-solid fa-plus ml--4"></i></button>
                                            </div>
                                        </div>
                                        <div class="rbt-single-element d-flex align-items-center">
                                            <div class="rbt-card rbt-product-card rbt-list-view-variation rbt-list-view-sm rbt-prd-sing-add-card">
                                                <div class="inner">
                                                    <div class="rbt-card-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}"><img src="{{ asset('assets/images/product-single/ear-add-prd/eadd-prd-2.webp') }}" alt="Card Image"></a>
                                                    </div>
                                                    <div class="rbt-card-body d-flex rbt-gap--8 align-items-center">
                                                        <div class="left-part">
                                                            <a href="shop-by-category.html" class="rbt-card-subtitle b4 rbt-card-catagories-text mt--0"><i class="fa-regular fa-watch-smart mr--4"></i>
                                                                Smartwatch</a>
                                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Fitbit Sense 2
                                                                    Advanced Smartwatch</a></h2>
                                                        </div>
                                                        <div class="right-part">
                                                            <div class="rbt-card-rating">
                                                                <ul class="rbt-rating-icon-list">
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                </ul>
                                                                <p class="rating-digit">(46)</p>
                                                            </div>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 116.34</del>
                                                                <span class="price-text">Rs. 69.78</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbt-create-new-btn">
                                                <button class="rbt-btn rbt-btn-xs text-nowrap" data-bs-toggle="modal" data-bs-target="#quickviewModal">ADD <i class="fa-solid fa-plus ml--4"></i></button>
                                            </div>
                                        </div>
                                        <div class="rbt-single-element d-flex align-items-center">
                                            <div class="rbt-card rbt-product-card rbt-list-view-variation rbt-list-view-sm rbt-prd-sing-add-card">
                                                <div class="inner">
                                                    <div class="rbt-card-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}"><img src="{{ asset('assets/images/product-single/ear-add-prd/eadd-prd-3.webp') }}" alt="Card Image"></a>
                                                    </div>
                                                    <div class="rbt-card-body d-flex rbt-gap--8 align-items-center">
                                                        <div class="left-part">
                                                            <a href="shop-by-category.html" class="rbt-card-subtitle b4 rbt-card-catagories-text mt--0"><i class="fa-regular fa-camera mr--4"></i>
                                                                Camera</a>
                                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">GoPro HERO12 Black
                                                                    Action Camera</a></h2>
                                                        </div>
                                                        <div class="right-part">
                                                            <div class="rbt-card-rating">
                                                                <ul class="rbt-rating-icon-list">
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                </ul>
                                                                <p class="rating-digit">(46)</p>
                                                            </div>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 116.34</del>
                                                                <span class="price-text">Rs. 69.78</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbt-create-new-btn">
                                                <button class="rbt-btn rbt-btn-xs text-nowrap" data-bs-toggle="modal" data-bs-target="#quickviewModal">ADD <i class="fa-solid fa-plus ml--4"></i></button>
                                            </div>
                                        </div>
                                        <div class="rbt-single-element d-flex align-items-center">
                                            <div class="rbt-card rbt-product-card rbt-list-view-variation rbt-list-view-sm rbt-prd-sing-add-card">
                                                <div class="inner">
                                                    <div class="rbt-card-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}"><img src="{{ asset('assets/images/product-single/ear-add-prd/eadd-prd-4.webp') }}" alt="Card Image"></a>
                                                    </div>
                                                    <div class="rbt-card-body d-flex rbt-gap--8 align-items-center">
                                                        <div class="left-part">
                                                            <a href="shop-by-category.html" class="rbt-card-subtitle b4 rbt-card-catagories-text mt--0"><i class="fa-regular fa-headphones mr--4"></i>
                                                                Headphones</a>
                                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Apple AirPods Max
                                                                    Over-Ear Headphones</a></h2>
                                                        </div>
                                                        <div class="right-part">
                                                            <div class="rbt-card-rating">
                                                                <ul class="rbt-rating-icon-list">
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                    <li><i class="fa-solid fa-star"></i></li>
                                                                </ul>
                                                                <p class="rating-digit">(46)</p>
                                                            </div>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 116.34</del>
                                                                <span class="price-text">Rs. 69.78</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbt-create-new-btn">
                                                <button class="rbt-btn rbt-btn-xs text-nowrap" data-bs-toggle="modal" data-bs-target="#quickviewModal">ADD <i class="fa-solid fa-plus ml--4"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <!--
                            <hr class="rbt-separator rbt-separator-gray200 mt--24">
                            <div class="rbt-info-wrapper d-block mt--24">
                                <ul class="product-details-list shipment-details-list">
                                    <li>
                                        <span class="rbt-bold--text mr--4">Brand :</span>
                                        <span class="text">Sony Corporation Ltd</span>
                                    </li>
                                    <li>
                                        <span class="rbt-bold--text mr--4">Resolution :</span>
                                        <span class="text">3840×2160</span>
                                    </li>
                                    <li>
                                        <span class="rbt-bold--text mr--4">Release years :</span>
                                        <span class="text"> Jan 2022</span>
                                    </li>
                                    <li>
                                        <span class="rbt-bold--text mr--4">Motherboard :</span>
                                        <span class="text"> Samsung</span>
                                        <span class="text d-block"> ATX, ITX, microATX, Mini-ITX</span>
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fa-sharp fa-regular fa-truck"></i></span>
                                        <div class="right-content">
                                            <span class="rbt-bold--text mr--4">Ships :</span>
                                            <span class="text">2–3 weeks Free Shipping</span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fa-regular fa-bag-shopping"></i></span>
                                        <div class="right-content">
                                            <span class="rbt-bold--text mr--4">7 Days Returns :</span>
                                            <span class="text"> Free return within 7 days of purchase</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr class="rbt-separator rbt-separator-gray200 mt--24 mb--24">
                            <div class="rbt-info-wrapper d-block mt--24">
                                <div class="rbt-info-box rbt-bg-color-brand-50">
                                    <div class="rbt-payment-info-container">
                                        <ul class="payment-img-link">
                                            <li><a href="#"><img src="{{ asset('assets/images/payment-brand/image-01.webp') }}" alt="Payment Brand Image"></a></li>
                                        </ul>
                                        <span class="b2 rbt-text-medium text-center rbt-text-color-heading mt--12 d-block">Guaranteed
                                            safe & secure checkout</span>
                                    </div>
                                </div>
                            </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Component Area -->

    <!-- Start Combo Product Area -->
    <!-- <div class="rbt-component-area rbt-section-gap rbt-bg-color-gray-light"> -->
    <!-- <div class="container">
                <div class="rbt-combo-prd-box rbt-bg-color-white">
                    <div class="row justify-content-between">
                        <div class="col-lg-2">
                            <div class="rbt-combo-title-section">
                                <i class="fa-regular fa-cube"></i>
                                <h2 class="rbt-title h5">There's more in the complete bundle</h2>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="rbt-combo-prd-content-section">
                                <div class="rbt-prd-pricing-box rbt-bg-color-white">
                                    <div class="rbt-pricing-box-top">
                                        <div class="rbt-prd-img-area">
                                            <div class="single-product-img-box">
                                                <span class="icon h6"><i class="fa-solid fa-plus"></i></span>
                                                <label class="rbt-img" for="rbt-cmb-prd-1">
                                                    <img src="{{ asset('assets/images/product-single/ear-add-prd/eadd-prd-checkbox-1.webp') }}" alt="Card Image">
                                                </label>
                                            </div>
                                            <div class="single-product-img-box">
                                                <span class="icon h6"><i class="fa-solid fa-plus"></i></span>
                                                <label class="rbt-img" for="rbt-cmb-prd-2">
                                                    <img src="{{ asset('assets/images/product-single/ear-add-prd/eadd-prd-checkbox-2.webp') }}" alt="Card Image">
                                                </label>
                                            </div>
                                            <div class="single-product-img-box">
                                                <span class="icon h6"><i class="fa-solid fa-plus"></i></span>
                                                <label class="rbt-img" for="rbt-cmb-prd-3">
                                                    <img src="{{ asset('assets/images/product-single/ear-add-prd/eadd-prd-checkbox-3.webp') }}" alt="Card Image">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="rbt-pricing-area">
                                            <div class="price d-flex align-items-center justify-content-center rbt-gap--4">
                                                <p class="mb--0 h6">Total:</p>
                                                <p class="mb--0 rbt-text-bold h4">Rs. 1563.46</p>
                                            </div>
                                            <div class="rbt-button-group mt--16 text-center mt_sm--8">
                                                <button class="rbt-btn rbt-btn-md">
                                                    <i class="fa-regular fa-cart-shopping mr--4"></i> Add To Cart All
                                                </button>
                                                <button class="rbt-btn rbt-btn-md rbt-btn-border">
                                                    Add All To Wishlist
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rbt-pricing-box-bottom">
                                        <ul class="rbt-combo-prd-list  liststyle">
                                            <li class="rbt-single-prd">
                                                <div class="input-part">
                                                    <input id="rbt-cmb-prd-1" class="rbt-check-green" type="checkbox" name="rbt-cmb-prd-1">
                                                    <label for="rbt-cmb-prd-1">G244F 23.8 inch FHD 4k apid IPS 70Hz Super
                                                        Vertical </label>
                                                </div>
                                                <div class="single-prd-select-area">
                                                    <div class="rbt-modern-select single-prd-select rbt-sm-size">
                                                        <select class="rbt-select-activation">
                                                            <option>Extra Large</option>
                                                            <option>Large</option>
                                                            <option>Medium</option>
                                                            <option>Small</option>
                                                            <option>Extra Small</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="pricing-part mt--0">
                                                    <del class="price-text">Rs. 116.34</del>
                                                    <span class="price-text">Rs. 69.78</span>
                                                </div>
                                            </li>
                                            <li class="rbt-single-prd">
                                                <div class="input-part">
                                                    <input id="rbt-cmb-prd-2" class="rbt-check-green" type="checkbox" name="rbt-cmb-prd-2">
                                                    <label for="rbt-cmb-prd-2">Philips PerfectCare Elite Plus GC9682/80
                                                        Steam Generator Iron </label>
                                                </div>
                                                <div class="single-prd-select-area">
                                                    <div class="rbt-modern-select single-prd-select rbt-sm-size">
                                                        <select class="rbt-select-activation">
                                                            <option>Extra Large</option>
                                                            <option>Large</option>
                                                            <option>Medium</option>
                                                            <option>Small</option>
                                                            <option>Extra Small</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="pricing-part mt--0">
                                                    <del class="price-text">Rs. 116.34</del>
                                                    <span class="price-text">Rs. 69.78</span>
                                                </div>
                                            </li>
                                            <li class="rbt-single-prd">
                                                <div class="input-part">
                                                    <input id="rbt-cmb-prd-3" class="rbt-check-green" type="checkbox" name="rbt-cmb-prd-3">
                                                    <label for="rbt-cmb-prd-3">Get Great Discounts on a Xiaomi Branded
                                                        TWS.</label>
                                                </div>
                                                <div class="single-prd-select-area">
                                                    <div class="rbt-modern-select single-prd-select rbt-sm-size">
                                                        <select class="rbt-select-activation">
                                                            <option>Extra Large</option>
                                                            <option>Large</option>
                                                            <option>Medium</option>
                                                            <option>Small</option>
                                                            <option>Extra Small</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="pricing-part mt--0">
                                                    <del class="price-text">Rs. 116.34</del>
                                                    <span class="price-text">Rs. 69.78</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- End Combo Product Area -->

    <!-- Start Single Product Tab Area -->
    <div class="rbt-component-area rbt-section-gap rbt-bg-color-gray-light pt--0">
        <div class="container">
            <div class="row row--12 mt_dec--24">
                <div class="col-xl-8 mt--24">
                    <div class="rbt-tab rbt-product-single-details-tab rbt-fshape-tab">
                        <div class="rbt-tab-nav-wrapper">
                            <ul class="nav nav-tabs" id="rbt-single-productTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="rbt-description-tab" data-bs-toggle="tab"
                                        href="#rbt-description" role="tab" aria-controls="rbt-description"
                                        aria-selected="true">
                                        Description
                                        <span class="rbt-fshape-portion rbt-fshape-left-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M0.505402 49.9854C116.894 49.9991 -64.388 49.9777 52 49.9914C52 31.2633 52 20.7632 52 2.03504C40.8 1.63545 35.5357 4.56594 32.5357 10.5615L22.0357 38.5324C18.0017 47.9353 6.6182 49.4495 0.505402 49.9854Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M38.793 1.97666C35.457 3.50832 33.2276 5.91092 31.6412 9.08146L31.6178 9.1283L21.1076 37.1263C18.9861 42.0545 15.232 44.7995 11.3024 46.3063C7.3457 47.8234 3.2411 48.0696 0.566002 47.9886C0.566002 47.9886 0.529102 49.2057 0.505402 49.9856C3.3303 50.0711 7.7257 49.8177 12.019 48.1715C16.3338 46.5171 20.5747 43.4403 22.9549 37.8925L22.9639 37.8713C22.9639 37.8713 32.0421 12.7293 33.4534 9.92838C34.8648 7.12739 36.7799 5.09976 39.6283 3.79203C43.5435 1.50049 52 2.03525 52 2.03525C52 20.7634 52 31.2635 52 49.9916L51.9982 0.0363376C46.331 -0.164216 42.0898 0.46304 38.793 1.97666Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="rbt-fshape-portion rbt-fshape-right-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="rbt-specification-tab" data-bs-toggle="tab"
                                        href="#rbt-specification" role="tab" aria-controls="rbt-specification"
                                        aria-selected="false">
                                        How to Use
                                        <span class="rbt-fshape-portion rbt-fshape-left-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M0.505402 49.9854C116.894 49.9991 -64.388 49.9777 52 49.9914C52 31.2633 52 20.7632 52 2.03504C40.8 1.63545 35.5357 4.56594 32.5357 10.5615L22.0357 38.5324C18.0017 47.9353 6.6182 49.4495 0.505402 49.9854Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M38.793 1.97666C35.457 3.50832 33.2276 5.91092 31.6412 9.08146L31.6178 9.1283L21.1076 37.1263C18.9861 42.0545 15.232 44.7995 11.3024 46.3063C7.3457 47.8234 3.2411 48.0696 0.566002 47.9886C0.566002 47.9886 0.529102 49.2057 0.505402 49.9856C3.3303 50.0711 7.7257 49.8177 12.019 48.1715C16.3338 46.5171 20.5747 43.4403 22.9549 37.8925L22.9639 37.8713C22.9639 37.8713 32.0421 12.7293 33.4534 9.92838C34.8648 7.12739 36.7799 5.09976 39.6283 3.79203C43.5435 1.50049 52 2.03525 52 2.03525C52 20.7634 52 31.2635 52 49.9916L51.9982 0.0363376C46.331 -0.164216 42.0898 0.46304 38.793 1.97666Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="rbt-fshape-portion rbt-fshape-right-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>

                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="rbt-reviews-tab" data-bs-toggle="tab"
                                        href="#rbt-reviews" role="tab" aria-controls="rbt-reviews"
                                        aria-selected="false">
                                        Ingredients
                                        <span class="rbt-fshape-portion rbt-fshape-left-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M0.505402 49.9854C116.894 49.9991 -64.388 49.9777 52 49.9914C52 31.2633 52 20.7632 52 2.03504C40.8 1.63545 35.5357 4.56594 32.5357 10.5615L22.0357 38.5324C18.0017 47.9353 6.6182 49.4495 0.505402 49.9854Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M38.793 1.97666C35.457 3.50832 33.2276 5.91092 31.6412 9.08146L31.6178 9.1283L21.1076 37.1263C18.9861 42.0545 15.232 44.7995 11.3024 46.3063C7.3457 47.8234 3.2411 48.0696 0.566002 47.9886C0.566002 47.9886 0.529102 49.2057 0.505402 49.9856C3.3303 50.0711 7.7257 49.8177 12.019 48.1715C16.3338 46.5171 20.5747 43.4403 22.9549 37.8925L22.9639 37.8713C22.9639 37.8713 32.0421 12.7293 33.4534 9.92838C34.8648 7.12739 36.7799 5.09976 39.6283 3.79203C43.5435 1.50049 52 2.03525 52 2.03525C52 20.7634 52 31.2635 52 49.9916L51.9982 0.0363376C46.331 -0.164216 42.0898 0.46304 38.793 1.97666Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="rbt-fshape-portion rbt-fshape-right-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="rbt-question-tab" data-bs-toggle="tab"
                                        href="#rbt-question" role="tab" aria-controls="rbt-question"
                                        aria-selected="false">
                                        Ratings & Reviews
                                        <span class="rbt-fshape-portion rbt-fshape-left-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M0.505402 49.9854C116.894 49.9991 -64.388 49.9777 52 49.9914C52 31.2633 52 20.7632 52 2.03504C40.8 1.63545 35.5357 4.56594 32.5357 10.5615L22.0357 38.5324C18.0017 47.9353 6.6182 49.4495 0.505402 49.9854Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M38.793 1.97666C35.457 3.50832 33.2276 5.91092 31.6412 9.08146L31.6178 9.1283L21.1076 37.1263C18.9861 42.0545 15.232 44.7995 11.3024 46.3063C7.3457 47.8234 3.2411 48.0696 0.566002 47.9886C0.566002 47.9886 0.529102 49.2057 0.505402 49.9856C3.3303 50.0711 7.7257 49.8177 12.019 48.1715C16.3338 46.5171 20.5747 43.4403 22.9549 37.8925L22.9639 37.8713C22.9639 37.8713 32.0421 12.7293 33.4534 9.92838C34.8648 7.12739 36.7799 5.09976 39.6283 3.79203C43.5435 1.50049 52 2.03525 52 2.03525C52 20.7634 52 31.2635 52 49.9916L51.9982 0.0363376C46.331 -0.164216 42.0898 0.46304 38.793 1.97666Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="rbt-fshape-portion rbt-fshape-right-portion">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                                viewbox="0 0 52 50" fill="none">
                                                <path class="rbt-svg-fill-one"
                                                    d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z">
                                                </path>
                                                <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @if (false)
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="rbt-description" role="tabpanel"
                                aria-labelledby="rbt-description-tab">
                                <div class="rbt-product-single-description">
                                    <div class="rbt-block-desc b1 mb--0 nbc-product-tab-content">
                                        {!! filled($product?->description) ? \App\Support\ProductText::format($product->description) : '<p>Description is not available for this product.</p>' !!}
                                    </div>
                                    <!-- <p class="rbt-block-desc b1 mb--0 mt--12">Quisque varius diam vel metus mattis, id aliquam diam rhoncus.
                        Proin vitae
                        magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat
                        ligula. Fusce
                        fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies sodales nunc, in pellentesque
                        lorem mattis quis.
                        Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt.
                        Suspendisse velit ex,
                        aliquet vel ornare vel, dignissim a tortor. Morbi ut sapien vitae odio accumsan gravida. Morbi vitae
                        erat auctor,
                        eleifend nunc a, lobortis neque. Praesent aliquam dignissim viverra. Maecenas lacus odio, feugiat eu
                        nunc sit amet,
                        maximus sagittis dolor. </p>
                    <div class="rbt-block-banner-img mt--32">
                        <img src="{{ asset('assets/images/product-single/single-prd-banner/single-prd-banner-01.webp') }}" alt="Ecommerce Product Banner">
                    </div>
                    <p class="rbt-block-desc b1 mb--0 mt--12">Quisque varius diam vel metus mattis, id aliquam diam rhoncus.
                        Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel,
                        blandit feugiat ligula. Fusce fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies
                        sodales nunc, in pellentesque lorem mattis quis. Cras imperdiet est in nunc tristique lacinia.
                        Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim
                        a tortor. Morbi ut sapien vitae odio accumsan gravida. Morbi vitae erat auctor, eleifend nunc a,
                        lobortis neque. Praesent aliquam dignissim viverra. Maecenas lacus odio, feugiat eu nunc sit amet,
                        maximus sagittis dolor. </p>
                    <p class="rbt-block-desc b1 mb--0 mt--12">sunt in culpa qui officia deserunt mollit anim id est
                        laborum.nunc, in pellentesque lorem mattis quis. Cras imperdiet
                        est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex,
                        aliquet vel ornare
                        vel, dignissim a tortor. Morbi ut sapien vitae odio accumsan gravida. Morbi vitae erat auctor,
                        eleifend nunc a, lobortis
                        neque. Praesent aliquam dignissim viverra. Maecenas lacus odio, feugiat eu nunc sit</p>
                    <div class="rbt-block-banner-video mt--32">
                        <video src="{{ asset('assets/videos/prd-single-dtls-video-01.mp4') }}" muted="" loop="" autoplay=""></video>
                    </div>
                    <div class="rbt-prd-feature-area mt--32">
                        <div class="row row--12 mt_dec--24 rbt-mobile-row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt--24">
                                <div class="rbt-prd-feature-card rbt-bg-color-brand-50 rbt-curved-style-box">
                                    <div class="rbt-inner text-center">
                                        <span class="icon"><i class="fa-regular fa-microphone-lines"></i></span>
                                        <p class="title b1">Microphone built-in</p>
                                        <p class="desc b2">Lorem ipsum simply dummy
                                            text printing typesetting.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt--24">
                                <div class="rbt-prd-feature-card rbt-bg-color-brand-50 rbt-curved-style-box">
                                    <div class="rbt-inner text-center">
                                        <span class="icon"><i class="fa-regular fa-droplet-slash"></i></span>
                                        <p class="title b1">Water resistant</p>
                                        <p class="desc b2">Lorem ipsum simply dummy
                                            text printing typesetting.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt--24">
                                <div class="rbt-prd-feature-card rbt-bg-color-brand-50 rbt-curved-style-box">
                                    <div class="rbt-inner text-center">
                                        <span class="icon"><i class="fa-regular fa-battery-bolt"></i></span>
                                        <p class="title b1">Long lasting battery</p>
                                        <p class="desc b2">Lorem ipsum simply dummy
                                            text printing typesetting.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="rbt-block-desc b1 mb--0 mt--12">Egestas purus a luctus ridiculus ac malesuada arcu a. Euismod
                        dapibus commodo metus phasellus blandit suspendisse
                        euismod orci tellus. Habitasse hendrerit dolor euismod varius nisi. Platea praesent nisi ultrices
                        rhoncus volutpat
                        nostra. Efficitur dui nec massa nulla nostra nunc massa ornare fermentum. Parturient turpis per
                        adipiscing vestibulum
                        donec tincidunt ligula. Purus tristique ut dolor mollis ut cras scelerisque nec. Massa dis mus
                        senectus tortor ligula.
                        Ullamcorper molestie placerat bibendum hac aptent volutpat ad laoreet</p>
                    <p class="rbt-block-desc b1 mb--0 mt--12">Scelerisque sociosqu sagittis bibendum quam id;
                        ultrices placerat adipiscing. Imperdiet egestas ullamcorper cras blandit himenaeos auctor lacus
                        commodo. Feugiat quisque
                        nascetur tincidunt duis phasellus, sagittis euismod. Donec nisl senectus risus nullam quisque
                        vivamus. Dapibus pulvinar
                        lobortis auctor quam neque. Nibh at maximus taciti mattis rutrum viverra. Dictum ipsum tortor nibh
                        parturient laoreet
                        ullamcorper rhoncus tincidunt. At risus aliquam ligula ut vivamus mi sodales volutpat. Cursus
                        sodales hendrerit donec
                        efficitur penatibus.</p>
                    <div class="rbt-block-banner-img mt--32">
                        <img src="{{ asset('assets/images/product-single/single-prd-banner/single-prd-banner-02.webp') }}" alt="Ecommerce Product Banner">
                    </div> -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="rbt-specification" role="tabpanel"
                                aria-labelledby="rbt-specification-tab">
                                <div class="rbt-product-single-description">
                                    <div class="rbt-block-desc b1 mb--0 nbc-product-tab-content">
                                        {!! filled($product?->how_to_use) ? \App\Support\ProductText::format($product->how_to_use) : '<p>Usage instructions are not available for this product.</p>' !!}
                                    </div>
                                </div>
                                <!-- <div class="rbt-prd-single-specification-info">
                    <div class="rbt-single-specification">
                        <label class="b1 title">Brand :</label>
                        <ul class="rbt-specification-list">
                            <li>Custom acoustic platform delivers powerful, immersive sound</li>
                            <li>Active Noise Cancelling (ANC) adapts to your personal fit to keep you immersed in the</li>
                            <li>Transparency mode blends your listening experience with the world around you</li>
                            <li>Spatial audio for Dolby Atmos surrounds you with sound?</li>
                            <li>Three new acoustic vents to improve audio precision and gently pressure for a more </li>
                            <li>IPX4-rated sweat and water resistant earbuds*</li>
                        </ul>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Design :</label>
                        <ul class="rbt-specification-list">
                            <li>One-touch pairing instantly connects with every device in your iCloud accounts</li>
                            <li>Receive software updates and new features automatically</li>
                            <li>Industry-leading Class 1 Bluetooth® for extended range and fewer dropouts</li>
                            <li>Spatial audio for Dolby Atmos surrounds you with sound?</li>
                            <li>High-quality call performance from upgraded voice-targeting microphones</li>
                            <li>Spatial audio for Dolby Atmos surrounds you with sound?</li>
                        </ul>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Alternate names</label>
                        <div class="rbt-specification-content">
                            <span class="desc">iPad 5</span>
                        </div>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Brand</label>
                        <div class="rbt-specification-content">
                            <span class="desc">Apple</span>
                        </div>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Model</label>
                        <div class="rbt-specification-content">
                            <span class="desc">IPad Air Wi-Fi + Cellular</span>
                        </div>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Release date</label>
                        <div class="rbt-specification-content">
                            <span class="desc">September 2013</span>
                        </div>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Dimensions (mm)</label>
                        <div class="rbt-specification-content">
                            <span class="desc">240.00 x 169.50 x 7.50</span>
                        </div>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Weight (g)</label>
                        <div class="rbt-specification-content">
                            <span class="desc">478.00</span>
                        </div>
                    </div>
                    <div class="rbt-single-specification">
                        <label class="b1 title">Battery capacity (mAh)</label>
                        <div class="rbt-specification-content">
                            <span class="desc">8820</span>
                        </div>
                    </div>
                </div> -->
                            </div>
                            <div class="tab-pane fade" id="rbt-reviews" role="tabpanel"
                                aria-labelledby="rbt-reviews-tab">
                                <div class="rbt-product-single-reviews-area">
                                    <div class="rbt-product-single-description">
                                        <div class="rbt-block-desc b1 mb--0 nbc-product-tab-content">
                                            {!! filled($product?->ingredients) ? \App\Support\ProductText::format($product->ingredients) : '<p>Ingredient information is not available for this product.</p>' !!}
                                        </div>
                                    </div>
                                    <!-- <div class="rbt-review-statistics-section">
                        <div class="row row--12 mt_dec--24">
                            <div class="col-md-6 mt--24">
                                <div class="rbt-avr-review">
                                    <span class="rbt-abr-review-number-text">4.33</span>
                                    <div class="rbt-abr-review-content">
                                        <ul class="rbt-rating-icon-list">
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                        <p class="rating-text b3 mt--8 rbt-text-color-gray-700">Based on 19 Review</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt--24">
                                <div class="rbt-rating-breakdown">
                                    <div class="rbt-rating-item">
                                        <span class="icon"><i class="fa-solid fa-star rbt-rated-icon"></i></span>
                                        <span class="number-text">5</span>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-50"></div>
                                        </div>
                                        <span class="number-text">6</span>
                                    </div>
                                    <div class="rbt-rating-item">
                                        <span class="icon"><i class="fa-solid fa-star rbt-rated-icon"></i></span>
                                        <span class="number-text">4</span>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-25"></div>
                                        </div>
                                        <span class="number-text">4</span>
                                    </div>
                                    <div class="rbt-rating-item">
                                        <span class="icon"><i class="fa-solid fa-star rbt-rated-icon"></i></span>
                                        <span class="number-text">3</span>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-75"></div>
                                        </div>
                                        <span class="number-text">6</span>
                                    </div>
                                    <div class="rbt-rating-item">
                                        <span class="icon"><i class="fa-solid fa-star rbt-rated-icon"></i></span>
                                        <span class="number-text">2</span>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-75"></div>
                                        </div>
                                        <span class="number-text">6</span>
                                    </div>
                                    <div class="rbt-rating-item">
                                        <span class="icon"><i class="fa-solid fa-star rbt-rated-icon"></i></span>
                                        <span class="number-text">1</span>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-50"></div>
                                        </div>
                                        <span class="number-text">9</span>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                                </div>

                                <!-- <div class="rbt-prd-single-reviews-list-area">
                    <ul class="rbt-comment-list">
                        <!-- Start Single Comment
                        <li class="comment">
                            <div class="comment-body">
                                <div class="single-comment">
                                    <div class="comment-img">
                                        <img src="{{ asset('assets/images/blog-details/blog-commenter-1.webp') }}" alt="Author Images">
                                    </div>
                                    <div class="comment-inner">
                                        <ul class="rbt-rating-icon-list">
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                        <div class="comment-meta">
                                            <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                        </div>
                                        <div class="comment-text">
                                            <p class="title">No longer available to buy new</p>
                                            <p class="b1">Duis hendrerit velit scelerisque felis tempus, id
                                                porta
                                                libero venenatis. Nulla facilisi. Phasellus viverra
                                                magna commodo dui lacinia tempus. Donec malesuada nunc
                                                non dui posuere, fringilla vestibulum urna mollis.
                                                Integer condimentum ac sapien quis maximus. </p>
                                            <ul class="rbt-commented-img-list">
                                                <li>
                                                    <a data-fancybox="review-image" href="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-01.webp') }}" class="rbt-commented-img">
                                                        <img src="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-01.webp') }}" alt="Eccommerce Product Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-fancybox="review-image" href="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-02.webp') }}" class="rbt-commented-img">
                                                        <img src="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-02.webp') }}" alt="Eccommerce Product Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-fancybox="review-image" href="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-03.webp') }}" class="rbt-commented-img">
                                                        <img src="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-03.webp') }}" alt="Eccommerce Product Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-fancybox="review-image" href="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-04.webp') }}" class="rbt-commented-img has-more-link" data-black-overlay="7">
                                                        <img src="{{ asset('assets/images/product-single/single-prd-review/prd-rev-img-04.webp') }}" alt="Eccommerce Product Image">
                                                        <span class="text">
                                                            +5 Images
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <! -- End Single Comment  -->

                                <!-- Start Single Comment
                        <li class="comment">
                            <div class="comment-body">
                                <div class="single-comment">
                                    <div class="comment-img">
                                        <img src="{{ asset('assets/images/blog-details/blog-commenter-2.webp') }}" alt="Author Images">
                                    </div>
                                    <div class="comment-inner">
                                        <ul class="rbt-rating-icon-list">
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                        <div class="comment-meta">
                                            <div class="time-spent">Nov 23, 2018 at 12:23 pm
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            <p class="title">No longer available to buy new</p>
                                            <p class="b1">Pellentesque habitant morbi tristique
                                                senectus et
                                                netus et malesuada fames ac turpis egestas.
                                                Suspendisse
                                                lobortis cursus lacinia. Vestibulum vitae leo id
                                                diam
                                                pellentesque ornare.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- End Single Comment  -->

                                <!-- Start Single Comment
                                <li class="comment">
                                    <div class="comment-body">
                                        <div class="single-comment">
                                            <div class="comment-img">
                                                <img src="{{ asset('assets/images/blog-details/blog-commenter-3.webp') }}"
                                                    alt="Author Images">
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                </ul>
                                                <div class="comment-meta">
                                                    <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                                </div>
                                                <div class="comment-text">
                                                    <p class="title">No longer available to buy new</p>
                                                    <p class="b1">Duis hendrerit velit scelerisque felis tempus, id
                                                        porta
                                                        libero venenatis. Nulla facilisi. Phasellus viverra
                                                        magna commodo dui lacinia tempus. Donec malesuada nunc
                                                        non dui posuere, fringilla vestibulum urna mollis.
                                                        Integer condimentum ac sapien quis maximus. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Single Comment
                                </ul>
                            </div> -->

                            <div class="rbt-reviews-form">
                              <!--  <form class="rbt-contact-form">
                                    <div class="rbt-fshape-box-outline-style">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div
                                                    class="rbt-component-section-title rbt-contact-form-title rbt-bg-color-white">
                                                    <h2 class="rbt-title h6"><span class="rbt-bold--text">Add A
                                                            Review</span></h2>
                                                    <span class="rbt-fshape-right-portion">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="52"
                                                            height="50" viewbox="0 0 52 50" fill="none">
                                                            <path
                                                                d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z"
                                                                fill="var(--color-white)"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z"
                                                                fill="var(--color-brand-100)"></path>
                                                        </svg>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="rbt-fshape-box rbt-bg-color-white rbt-contact-form-fshape">

                                            <div class="row">
                                                <div class="col-12 mb--16">
                                                    <div class="rbt-contact-input-field-grp">
                                                        <ul class="rbt-review-inp-list">
                                                            <li class="rbt-review-inp">
                                                                <input id="rbt-review-radio-1" type="radio"
                                                                    name="rbt-review-radio">
                                                                <label for="rbt-review-radio-1">
                                                                    <span class="rbt-rating-icon-list">
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                    </span>
                                                                </label>
                                                            </li>

                                                            <li class="rbt-review-inp">
                                                                <input id="rbt-review-radio-2" type="radio"
                                                                    name="rbt-review-radio">
                                                                <label for="rbt-review-radio-2">
                                                                    <span class="rbt-rating-icon-list">
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                    </span>
                                                                </label>
                                                            </li>

                                                            <li class="rbt-review-inp">
                                                                <input id="rbt-review-radio-3" type="radio"
                                                                    name="rbt-review-radio">
                                                                <label for="rbt-review-radio-3">
                                                                    <span class="rbt-rating-icon-list">
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                    </span>
                                                                </label>
                                                            </li>

                                                            <li class="rbt-review-inp">
                                                                <input id="rbt-review-radio-4" type="radio"
                                                                    name="rbt-review-radio">
                                                                <label for="rbt-review-radio-4">
                                                                    <span class="rbt-rating-icon-list">
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                    </span>
                                                                </label>
                                                            </li>

                                                            <li class="rbt-review-inp">
                                                                <input id="rbt-review-radio-5" type="radio"
                                                                    name="rbt-review-radio">
                                                                <label for="rbt-review-radio-5">
                                                                    <span class="rbt-rating-icon-list">
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                        <span><i
                                                                                class="fa-solid fa-star rbt-rated-icon"></i></span>
                                                                    </span>
                                                                </label>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb--16">
                                                    <div class="rbt-contact-input-field-grp">
                                                        <label for="email">Your Review Title</label>
                                                        <input class="rbt-contact-input-field" type="email"
                                                            id="email">
                                                    </div>
                                                </div>

                                                <div class="col-12 mb--16">
                                                    <div class="rbt-contact-input-field-grp">
                                                        <label for="message">Your review</label>
                                                        <textarea class="rbt-contact-input-field" name="message" id="message"></textarea>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-md-end mt--8 rbt-gap--12 flex-wrap">
                                                    <button class="rbt-btn rbt-btn-md rbt-btn-border">Upload
                                                        Image</button>
                                                    <a class="rbt-btn rbt-btn-md" href="#">Submit Now</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form> -->
                            </div>

                        </div>

                        <div class="tab-pane fade" id="rbt-question" role="tabpanel"
                            aria-labelledby="rbt-question-tab">
                            <div class="nbc-product-reviews">
                                <div class="nbc-product-reviews__summary">
                                    <strong>{{ number_format((float) ($product?->reviews->avg('rating') ?? 0), 1) }}</strong>
                                    <span>
                                        @for ($star = 1; $star <= 5; $star++)
                                            <i class="fa-solid fa-star {{ $star <= round($product?->reviews->avg('rating') ?? 0) ? 'rbt-rated-icon' : '' }}"></i>
                                        @endfor
                                    </span>
                                    <p>{{ $product?->reviews->count() ?? 0 }} verified customer {{ ($product?->reviews->count() ?? 0) === 1 ? 'review' : 'reviews' }}</p>
                                </div>

                                @if (session('review_success'))
                                    <div class="alert alert-success">{{ session('review_success') }}</div>
                                @endif

                                <div class="nbc-product-reviews__list">
                                    @forelse ($product?->reviews ?? collect() as $review)
                                        <article class="nbc-product-review">
                                            <div class="nbc-product-review__heading">
                                                <div>
                                                    <strong>{{ $review->display_name }}</strong>
                                                    <span>{{ $review->created_at->format('d M Y') }}</span>
                                                </div>
                                                <span aria-label="{{ $review->rating }} out of 5 stars">
                                                    @for ($star = 1; $star <= 5; $star++)
                                                        <i class="fa-solid fa-star {{ $star <= $review->rating ? 'rbt-rated-icon' : '' }}"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                            @if ($review->title)
                                                <h3>{{ $review->title }}</h3>
                                            @endif
                                            <p>{{ $review->comment }}</p>
                                        </article>
                                    @empty
                                        <p class="nbc-product-reviews__empty">There are no reviews yet. Be the first to review this product.</p>
                                    @endforelse
                                </div>

                                @auth
                                    <form class="nbc-product-review-form" method="POST"
                                        action="{{ route('product.reviews.store', $product) }}">
                                        @csrf
                                        <h3>Write a review</h3>
                                        <div class="row row--12">
                                            <div class="col-md-4 mb--16">
                                                <label for="review-rating">Rating</label>
                                                <select id="review-rating" name="rating" required>
                                                    <option value="">Choose a rating</option>
                                                    @foreach ([5, 4, 3, 2, 1] as $rating)
                                                        <option value="{{ $rating }}" @selected(old('rating') == $rating)>{{ $rating }} stars</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-8 mb--16">
                                                <label for="review-title">Review title</label>
                                                <input id="review-title" name="title" maxlength="120"
                                                    value="{{ old('title') }}" placeholder="Summarise your experience">
                                            </div>
                                            <div class="col-12 mb--16">
                                                <label for="review-comment">Your review</label>
                                                <textarea id="review-comment" name="comment" maxlength="2000" required
                                                    placeholder="Tell others about this product">{{ old('comment') }}</textarea>
                                            </div>
                                        </div>
                                        @if ($errors->hasAny(['rating', 'title', 'comment']))
                                            <div class="alert alert-danger">
                                                @foreach (['rating', 'title', 'comment'] as $field)
                                                    @error($field)<div>{{ $message }}</div>@enderror
                                                @endforeach
                                            </div>
                                        @endif
                                        <button class="rbt-btn rbt-btn-md" type="submit">Submit Review</button>
                                    </form>
                                @else
                                    <p class="nbc-product-reviews__login">Please <a href="{{ route('login') }}">sign in</a> to write a review.</p>
                                @endauth
                            </div>
                        </div>

                        <!-- <div class="tab-pane fade" id="rbt-question-template" role="tabpanel"
                            aria-labelledby="rbt-question-tab">
                            <div class="rbt-prd-single-faq-section">
                                <div class="rbt-section-title-area rbt-bg-color-gray-light">
                                    <h2 class="rbt-block-title h6 mb--0">Frequently Asked Questions? Look here</h2>
                                </div>
                                <div class="rbt-accordion-style rbt-accordion-01 accordion">
                                    <div class="accordion" id="accordionExampleb4">
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header card-header" id="headingOne1">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne1"
                                                    aria-expanded="true" aria-controls="collapseOne1">
                                                    What if I just had renovation work done?
                                                </button>
                                            </h2>
                                            <div id="collapseOne1" class="accordion-collapse collapse show"
                                                role="region" aria-labelledby="headingOne1"
                                                data-bs-parent="#accordionExampleb4">
                                                <div class="accordion-body card-body">
                                                    If you've recently had renovation work done, we can provide specialized
                                                    cleaning
                                                    services tailored to post-renovation needs. Our team is equipped to
                                                    handle the extra
                                                    dust and debris that comes with renovations, ensuring your space is
                                                    spotless and
                                                    ready for use.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item card">
                                            <h2 class="accordion-header card-header" id="headingOne2">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne2"
                                                    aria-expanded="false" aria-controls="collapseOne2">
                                                    Do I get a discount if I’m a frequent customer?
                                                </button>
                                            </h2>
                                            <div id="collapseOne2" class="accordion-collapse collapse" role="region"
                                                aria-labelledby="headingOne2" data-bs-parent="#accordionExampleb4">
                                                <div class="accordion-body card-body">
                                                    Yes, we offer discounts to our loyal customers. If you use our services
                                                    frequently,
                                                    you may qualify for special pricing or promotional offers. Please
                                                    contact our
                                                    customer service team for more details on available discounts.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item card">
                                            <h2 class="accordion-header card-header" id="headingOne3">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne3"
                                                    aria-expanded="false" aria-controls="collapseOne3">
                                                    Can I give specific instructions to the cleaners and ask for special
                                                    requests?
                                                </button>
                                            </h2>
                                            <div id="collapseOne3" class="accordion-collapse collapse" role="region"
                                                aria-labelledby="headingOne3" data-bs-parent="#accordionExampleb4">
                                                <div class="accordion-body card-body">
                                                    Absolutely! We understand that every space has unique needs. You can
                                                    provide
                                                    specific instructions and request special services to ensure your
                                                    cleaning needs are
                                                    met exactly as you prefer. Our team is committed to accommodating your
                                                    requirements.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item card">
                                            <h2 class="accordion-header card-header" id="headingOne4">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne4"
                                                    aria-expanded="false" aria-controls="collapseOne4">
                                                    What if I don’t have a mop, bucket, or vacuum?
                                                </button>
                                            </h2>
                                            <div id="collapseOne4" class="accordion-collapse collapse" role="region"
                                                aria-labelledby="headingOne4" data-bs-parent="#accordionExampleb4">
                                                <div class="accordion-body card-body">
                                                    No problem at all! Our cleaning team comes fully equipped with all the
                                                    necessary
                                                    supplies, including mops, buckets, and vacuums. You don’t need to
                                                    provide any
                                                    cleaning tools or equipment.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item card">
                                            <h2 class="accordion-header card-header" id="headingOne5">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne5"
                                                    aria-expanded="false" aria-controls="collapseOne5">
                                                    Do you clean offices and other commercial spaces?
                                                </button>
                                            </h2>
                                            <div id="collapseOne5" class="accordion-collapse collapse" role="region"
                                                aria-labelledby="headingOne5" data-bs-parent="#accordionExampleb4">
                                                <div class="accordion-body card-body">
                                                    Yes, we offer cleaning services for both residential and commercial
                                                    spaces,
                                                    including offices. Our team is experienced in handling the specific
                                                    cleaning needs
                                                    of commercial environments, ensuring a clean and professional setting
                                                    for your
                                                    business.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    @endif
                    @include('components.product-detail-tabs', ['product' => $product])
                </div>
            </div>
            <div class="col-xl-4 mt--24 rbt-single-mobile-view-sidebar">
              <!--  <div class="rbt-tab rbt-product-single-details-tab rbt-fshape-tab">
                    <div class="rbt-tab-nav-wrapper">
                        <ul class="nav nav-tabs" id="rbt-product-recomTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="rbt-viewd-prd-tab" data-bs-toggle="tab"
                                    href="#rbt-viewd-prd" role="tab" aria-controls="rbt-viewd-prd"
                                    aria-selected="true">
                                    Recently Viewed
                                    <span class="rbt-fshape-portion rbt-fshape-left-portion">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                            viewbox="0 0 52 50" fill="none">
                                            <path class="rbt-svg-fill-one"
                                                d="M0.505402 49.9854C116.894 49.9991 -64.388 49.9777 52 49.9914C52 31.2633 52 20.7632 52 2.03504C40.8 1.63545 35.5357 4.56594 32.5357 10.5615L22.0357 38.5324C18.0017 47.9353 6.6182 49.4495 0.505402 49.9854Z">
                                            </path>
                                            <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M38.793 1.97666C35.457 3.50832 33.2276 5.91092 31.6412 9.08146L31.6178 9.1283L21.1076 37.1263C18.9861 42.0545 15.232 44.7995 11.3024 46.3063C7.3457 47.8234 3.2411 48.0696 0.566002 47.9886C0.566002 47.9886 0.529102 49.2057 0.505402 49.9856C3.3303 50.0711 7.7257 49.8177 12.019 48.1715C16.3338 46.5171 20.5747 43.4403 22.9549 37.8925L22.9639 37.8713C22.9639 37.8713 32.0421 12.7293 33.4534 9.92838C34.8648 7.12739 36.7799 5.09976 39.6283 3.79203C43.5435 1.50049 52 2.03525 52 2.03525C52 20.7634 52 31.2635 52 49.9916L51.9982 0.0363376C46.331 -0.164216 42.0898 0.46304 38.793 1.97666Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="rbt-fshape-portion rbt-fshape-right-portion">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                            viewbox="0 0 52 50" fill="none">
                                            <path class="rbt-svg-fill-one"
                                                d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z">
                                            </path>
                                            <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="rbt-recom-prd-tab" data-bs-toggle="tab"
                                    href="#rbt-recom-prd" role="tab" aria-controls="rbt-recom-prd"
                                    aria-selected="false">
                                    Recommended
                                    <span class="rbt-fshape-portion rbt-fshape-left-portion">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                            viewbox="0 0 52 50" fill="none">
                                            <path class="rbt-svg-fill-one"
                                                d="M0.505402 49.9854C116.894 49.9991 -64.388 49.9777 52 49.9914C52 31.2633 52 20.7632 52 2.03504C40.8 1.63545 35.5357 4.56594 32.5357 10.5615L22.0357 38.5324C18.0017 47.9353 6.6182 49.4495 0.505402 49.9854Z">
                                            </path>
                                            <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M38.793 1.97666C35.457 3.50832 33.2276 5.91092 31.6412 9.08146L31.6178 9.1283L21.1076 37.1263C18.9861 42.0545 15.232 44.7995 11.3024 46.3063C7.3457 47.8234 3.2411 48.0696 0.566002 47.9886C0.566002 47.9886 0.529102 49.2057 0.505402 49.9856C3.3303 50.0711 7.7257 49.8177 12.019 48.1715C16.3338 46.5171 20.5747 43.4403 22.9549 37.8925L22.9639 37.8713C22.9639 37.8713 32.0421 12.7293 33.4534 9.92838C34.8648 7.12739 36.7799 5.09976 39.6283 3.79203C43.5435 1.50049 52 2.03525 52 2.03525C52 20.7634 52 31.2635 52 49.9916L51.9982 0.0363376C46.331 -0.164216 42.0898 0.46304 38.793 1.97666Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="rbt-fshape-portion rbt-fshape-right-portion">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                            viewbox="0 0 52 50" fill="none">
                                            <path class="rbt-svg-fill-one"
                                                d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z">
                                            </path>
                                            <path class="rbt-svg-fill-two" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="rbt-viewd-prd" role="tabpanel"
                            aria-labelledby="rbt-viewd-prd-tab">
                            <div class="rbt-single-prd-viewed-prd-area">
                                <div class="rbt-list-card-box rbt-list-card-box border-0 p-0">
                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">GoPro HERO12 Black
                                                        Action Camera</a></h2>
                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">Nespresso Vertuo Plus
                                                        Coffee Machine</a></h2>
                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-02.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">Fitbit Sense 2 Advanced
                                                        Smartwatch</a></h2>
                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-03.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">Bose QuietComfort Ultra
                                                        Earbuds</a></h2>
                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rbt-recom-prd" role="tabpanel"
                            aria-labelledby="rbt-recom-prd-tab">
                            <div class="rbt-single-prd-recom-prd-area">
                                <div class="rbt-list-card-box rbt-list-card-box border-0 p-0">
                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">Bose QuietComfort Ultra
                                                        Earbuds</a></h2>

                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">Breville Barista Pro
                                                        Espresso Machine</a></h2>

                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-02.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">OnePlus Watch 2 AMOLED
                                                        Display</a></h2>

                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-03.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                        <div class="inner">
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-rating">
                                                    <ul class="rbt-rating-icon-list">
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                        <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    </ul>
                                                    <p class="rating-digit">(46)</p>
                                                </div>
                                                <h2 class="rbt-card-title"><a
                                                        href="{{ route('product.details') }}">GoPro HERO12 Black
                                                        Action Camera</a></h2>

                                                <div class="pricing-part">
                                                    <del class="price-text">Rs. 295.00</del>
                                                    <span class="price-text">Rs. 179.98</span>
                                                </div>
                                            </div>
                                            <div class="rbt-card-img rbt-bg-color-default rbt-curved-style-box">
                                                <a href="{{ route('product.details') }}"><img
                                                        src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04.webp') }}"
                                                        alt="Card Image"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="rbt-block-banner-img mt--32">
                    <img src="{{ asset('assets/images/product-single/single-prd-banner/single-prd-banner-a-01.webp') }}"
                        alt="Ecommerce Product Banner">
                </div> -->
            </div>
        </div>
    </div>
    </div>
    <!-- End Single Product Tab Area -->

    <!-- Start Video Review Area -->
    <div class="rbt-component-area rbt-section-gap rbt-bg-color-white nbc-hidden-review-videos">
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-12 d-flex justify-content-between flex-row align-items-center flex-wrap rbt-gap--16 mb--24">
                    <div class="rbt-component-section-title rbt-gap--4 p-0 mb--0 border-0">
                        <h2 class="rbt-title h4"><span class="rbt-bold--text">Review Videos for this product</span></h2>
                    </div>
                    <a class="rbt-btn rbt-btn-gray-light rbt-btn-xs" data-fancybox="gallery"
                        href="{{ asset('assets/videos/vedio-review-1.mp4') }}">
                        <span class="btn-icon mr--8"><i class="fa-regular fa-play"></i></span>
                        <span class="btn-text">Play All</span>
                    </a>
                </div>
            </div>
            <div class="row row--12 mt_dec--24 rbt-mobile-row">
                <div class="col-lg-3 col-md-6 col-12 mt--24">
                    <div
                        class="rbt-card rbt-video-review-card rbt-bg-color-brand-50 rbt-scroll-trigger animation-order-1 fade_in">
                        <a class="inner stretched-link cursor-pointer" data-fancybox="gallery"
                            href="{{ asset('assets/videos/vedio-review-1.mp4') }}">
                            <div class="rbt-video-gallery position-relative">
                                <div class="video-item">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/vedio-review-img-02.webp') }}"
                                        alt="Eccommerce Review Video Image">
                                    <video class="hover-video" src="{{ asset('assets/videos/vedio-review-1.mp4') }}"
                                        muted="" loop="" autoplay=""></video>
                                </div>
                            </div>
                            <div class="rbt-video-body d-flex">
                                <div class="rbt-reviwer-img">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/reviewer-img-01.webp') }}"
                                        alt="Eccommerce Reviewer Image">
                                </div>
                                <div class="rbt-reviwer-content">
                                    <span class="rbt-title">Samsung Galaxy Buds 2 Pro Wireless Earbuds</span>
                                    <span class="rbt-subtitle">CEONTHEMAKING</span>
                                    <span class="rbt-meta-dat">March 6, 2018</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mt--24">
                    <div
                        class="rbt-card rbt-video-review-card rbt-bg-color-brand-50 rbt-scroll-trigger animation-order-2 fade_in">
                        <a class="inner stretched-link cursor-pointer" data-fancybox="gallery"
                            href="{{ asset('assets/videos/vedio-review-1.mp4') }}">
                            <div class="rbt-video-gallery position-relative">
                                <div class="video-item">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/vedio-review-img-02.webp') }}"
                                        alt="Eccommerce Review Video Image">
                                    <video class="hover-video" src="{{ asset('assets/videos/vedio-review-1.mp4') }}"
                                        muted="" loop="" autoplay=""></video>
                                </div>
                            </div>
                            <div class="rbt-video-body d-flex">
                                <div class="rbt-reviwer-img">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/reviewer-img-01.webp') }}"
                                        alt="Eccommerce Reviewer Image">
                                </div>
                                <div class="rbt-reviwer-content">
                                    <span class="rbt-title">Apple AirPods (3rd Generation) with MagSafe</span>
                                    <span class="rbt-subtitle">CEONTHEMAKING</span>
                                    <span class="rbt-meta-dat">March 6, 2018</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt--24">
                    <div
                        class="rbt-card rbt-video-review-card rbt-bg-color-brand-50 rbt-scroll-trigger animation-order-3 fade_in">
                        <a class="inner stretched-link cursor-pointer" data-fancybox="gallery"
                            href="{{ asset('assets/videos/vedio-review-1.mp4') }}">
                            <div class="rbt-video-gallery position-relative">
                                <div class="video-item">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/vedio-review-img-03.webp') }}"
                                        alt="Eccommerce Review Video Image">
                                    <video class="hover-video" src="{{ asset('assets/videos/vedio-review-1.mp4') }}"
                                        muted="" loop="" autoplay=""></video>
                                </div>
                            </div>
                            <div class="rbt-video-body d-flex">
                                <div class="rbt-reviwer-img">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/reviewer-img-01.webp') }}"
                                        alt="Eccommerce Reviewer Image">
                                </div>
                                <div class="rbt-reviwer-content">
                                    <span class="rbt-title">Sony WF-1000XM5 Noise-Canceling Earbuds</span>
                                    <span class="rbt-subtitle">CEONTHEMAKING</span>
                                    <span class="rbt-meta-dat">March 6, 2018</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt--24">
                    <div
                        class="rbt-card rbt-video-review-card rbt-bg-color-brand-50 rbt-scroll-trigger animation-order-4 fade_in">
                        <a class="inner stretched-link cursor-pointer" data-fancybox="gallery"
                            href="{{ asset('assets/videos/vedio-review-1.mp4') }}">
                            <div class="rbt-video-gallery position-relative">
                                <div class="video-item">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/vedio-review-img-04.webp') }}"
                                        alt="Eccommerce Review Video Image">
                                    <video class="hover-video" src="{{ asset('assets/videos/vedio-review-1.mp4') }}"
                                        muted="" loop="" autoplay=""></video>
                                </div>
                            </div>
                            <div class="rbt-video-body d-flex">
                                <div class="rbt-reviwer-img">
                                    <img src="{{ asset('assets/images/product-single/vedio-rev-img/reviewer-img-01.webp') }}"
                                        alt="Eccommerce Reviewer Image">
                                </div>
                                <div class="rbt-reviwer-content">
                                    <span class="rbt-title">JBL Live Pro 2 VS Live Free 2 VS Reflect Aero</span>
                                    <span class="rbt-subtitle">CEONTHEMAKING</span>
                                    <span class="rbt-meta-dat">March 6, 2018</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video Review Area -->
    <!-- Start Component Area -->
    <div class="rbt-component-area rbt-section-gap rbt-bg-color-gray-light pt--0">
        <div class="container">

            <!-- Start Product Single Component -->
            <div
                class="rbt-fshape-box-outline-style rbt-fshape-box-outline-style-extend-width rbt-product-fshape-box-outline-style">
                <div class="row rbt-section-gap2Top pt_sm--100 pt_md--80 pt--0">
                    <div class="col-lg-12 rbt-fshape-row position-relative">
                        <div class="rbt-component-section-title rbt-bg-color-white">
                            <h2 class="rbt-title text-start h4"><span class="rbt-bold--text">Similar Products</span></h2>
                            <span class="rbt-fshape-right-portion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                    viewbox="0 0 52 50" fill="none">
                                    <path
                                        d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z"
                                        fill="var(--color-white)"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z"
                                        fill="var(--color-brand-100)"></path>
                                </svg>
                            </span>
                        </div>

                        <a class="rbt-link position-absolute d-inline-block rbt-text-color-primary rbt-text-medium rbt-gap--8 justify-content-center rbt-btn-link"
                            href="{{ route('shop') }}">
                            <span class="btn-text">View All Products</span>
                            <span class="btn-icon"><i
                                    class="fa-sharp fa-solid fa-arrow-up-right-from-square rbt-color-primary"></i></span>
                        </a>
                    </div>
                </div>

                <div class="rbt-component-area rbt-fshape-box rbt-bg-color-white nbc-product-section">
                    <!-- Start Card Area -->
                    <div class="row row--12 mt_dec--24 nbc-similar-products-grid">
                        @forelse ($similarProducts as $similarProduct)
                            <x-nbc-product-card :product="$similarProduct" :animation-order="($loop->iteration % 4) + 1" />
                        @empty
                            <div class="col-12 mt--24">
                                <p class="mb--0 text-center">No similar products are available at the moment.</p>
                            </div>
                        @endforelse
                    </div>

                    @if (false)
                    <div class="row row--12 mt_dec--24">
                        <!-- Start Single Card  -->
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mt--24">
                            <div class="rbt-card rbt-product-card has-hover-box-shadow">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-2">
                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                        <a href="{{ route('product.details') }}">
                                            <img class="rbt-prd-img"
                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-10-a-1.webp') }}"
                                                alt="Card Image">
                                            <img class="rbt-hover-img"
                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-10-a-1-hover.webp') }}"
                                                alt="Card Image">
                                        </a>
                                        <div class="rbt-badge-wrapper rbt-content-top-left">
                                            <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded">NEW
                                            </div>
                                            <div
                                                class="rbt-product-badge rbt-product-badge-bg-secondary-gradient border-rounded">
                                                Best Seller</div>
                                        </div>
                                        <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                            <button class="rbt-search-btn rbt-quick-btn tooltips" type="button"
                                                data-bs-toggle="modal" data-bs-target="#quickviewModal"
                                                data-tooltip="Quick View" data-tooltip-position="left"><i
                                                    class="fa-regular fa-magnifying-glass-plus"></i></button>
                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button"
                                                data-bs-toggle="modal" data-bs-target="#wishlistModal"
                                                data-tooltip="Add to wishlist" data-tooltip-position="left"><i
                                                    class="fa-regular fa-heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="rbt-card-body">
                                        <a href="shop-by-categories.html"
                                            class="rbt-card-subtitle rbt-card-catagories-text">Electronics & Gadgets</a>
                                        <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Ultra-Thin
                                                Modern Tech
                                                Quiet Noise Cancelling Laptop</a></h2>
                                        <div class="rbt-card-rating">
                                            <ul class="rbt-rating-icon-list">
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            </ul>
                                            <p class="rating-digit">(46)</p>
                                            <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                                    class="fa-solid fa-bag-shopping"></i></span>
                                                            90+ Sold Recently
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                                    class="fa-solid fa-truck"></i></span>
                                                            Free shipping
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                                    class="fa-solid fa-rotate-left"></i></span>
                                                            7 Days Return Plicy
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rbt-verticle-arrow rbt-arrow-prev">
                                                    <i class="fa-regular fa-chevron-up"></i>
                                                </div>
                                                <div class="rbt-verticle-arrow rbt-arrow-next">
                                                    <i class="fa-regular fa-chevron-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-part">
                                            <span class="price-text">Rs. 50.00 - Rs. 179.98</span>
                                            <div
                                                class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                9 in Stock</div>
                                        </div>
                                        <div class="prd-btn-grp">
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation"
                                                href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To
                                                Compare</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="prd-details-area rbt-has-show-more">
                                    <div class="wrapper rbt-has-show-more-inner-content">
                                        <ul class="product-details-list">
                                            <li>
                                                <span class="rbt-bold--text">Brand :</span>
                                                <span class="text">Sony Corporation Ltd</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Resolution :</span>
                                                <span class="text">3840×2160</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Release years :</span>
                                                <span class="text"> Jan 2022</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Motherboard :</span>
                                                <span class="text"> Samsung</span>
                                                <span class="text d-block"> ATX, ITX, microATX, Mini-ITX</span>
                                            </li>
                                        </ul>
                                        <ul class="product-details-list shipment-details-list">
                                            <li>
                                                <span class="icon"><i class="fa-sharp fa-regular fa-truck"></i></span>
                                                <div class="right-content">
                                                    <span class="rbt-bold--text">Ships :</span>
                                                    <span class="text">2–3 weeks Free Shipping</span>
                                                    <br>
                                                    <a href="#" class="shipment-quick-link rbt-btn-link">Get
                                                        delivery dates</a>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="fa-regular fa-bag-shopping"></i></span>
                                                <div class="right-content">
                                                    <span class="rbt-bold--text">Pickup :</span>
                                                    <a href="#" class="shipment-quick-link rbt-btn-link">Check
                                                        Availability</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rbt-show-more-btn-area">
                                        <button class="rbt-show-more-btn">Show More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->


                        <!-- Start Single Card  -->
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mt--24">
                            <div class="rbt-card rbt-product-card has-hover-box-shadow">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                        <a href="{{ route('product.details') }}">
                                            <img class="rbt-prd-img"
                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-12-a-1.webp') }}"
                                                alt="Card Image">
                                            <img class="rbt-hover-img"
                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-12-a-1-hover.webp') }}"
                                                alt="Card Image">
                                        </a>
                                        <div class="rbt-badge-wrapper rbt-content-top-left">
                                            <div class="rbt-product-badge rbt-product-badge-bg-secondary border-rounded">
                                                Sale</div>
                                        </div>
                                        <div class="rbt-discount-badge right--corner-style tooltips"
                                            data-tooltip="👁️ 16 People are Watching This Item"
                                            data-tooltip-position="bottom">
                                            <span><i class="fa-regular fa-eye"></i>16</span>
                                        </div>
                                        <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                            <button class="rbt-search-btn rbt-quick-btn tooltips" type="button"
                                                data-bs-toggle="modal" data-bs-target="#quickviewModal"
                                                data-tooltip="Quick View" data-tooltip-position="left"><i
                                                    class="fa-regular fa-magnifying-glass-plus"></i></button>
                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button"
                                                data-bs-toggle="modal" data-bs-target="#wishlistModal"
                                                data-tooltip="Add to wishlist" data-tooltip-position="left"><i
                                                    class="fa-regular fa-heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="rbt-card-body">
                                        <a href="shop-by-categories.html"
                                            class="rbt-card-subtitle rbt-card-catagories-text">Photography & Outdoor</a>
                                        <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Keurig
                                                Polaroid 4K
                                                Waterproof Smart Action Camera</a></h2>
                                        <div class="rbt-card-rating">
                                            <ul class="rbt-rating-icon-list">
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            </ul>
                                            <p class="rating-digit">(46)</p>
                                            <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                        class="fa-solid fa-truck"></i></span>
                                                Free shipping
                                            </div>
                                        </div>
                                        <div class="pricing-part">
                                            <del class="price-text">Rs. 295.00</del>
                                            <span class="price-text">Rs. 179.98</span>
                                            <span class="rbt-offer-badge">-30%</span>
                                            <div
                                                class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                12 in Stock</div>
                                        </div>
                                        <div class="prd-btn-grp">
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation"
                                                href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To
                                                Compare</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="prd-details-area rbt-has-show-more">
                                    <div class="wrapper rbt-has-show-more-inner-content">
                                        <ul class="product-details-list">
                                            <li>
                                                <span class="rbt-bold--text">Brand :</span>
                                                <span class="text">Sony Corporation Ltd</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Resolution :</span>
                                                <span class="text">3840×2160</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Release years :</span>
                                                <span class="text"> Jan 2022</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Motherboard :</span>
                                                <span class="text"> Samsung</span>
                                                <span class="text d-block"> ATX, ITX, microATX, Mini-ITX</span>
                                            </li>
                                        </ul>
                                        <ul class="product-details-list shipment-details-list">
                                            <li>
                                                <span class="icon"><i class="fa-sharp fa-regular fa-truck"></i></span>
                                                <div class="right-content">
                                                    <span class="rbt-bold--text">Ships :</span>
                                                    <span class="text">2–3 weeks Free Shipping</span>
                                                    <br>
                                                    <a href="#" class="shipment-quick-link rbt-btn-link">Get
                                                        delivery dates</a>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="fa-regular fa-bag-shopping"></i></span>
                                                <div class="right-content">
                                                    <span class="rbt-bold--text">Pickup :</span>
                                                    <a href="#" class="shipment-quick-link rbt-btn-link">Check
                                                        Availability</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rbt-show-more-btn-area">
                                        <button class="rbt-show-more-btn">Show More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mt--24">
                            <div class="rbt-card rbt-product-card has-hover-box-shadow">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-3">
                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                        <a href="{{ route('product.details') }}">
                                            <img class="rbt-prd-img"
                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-03-a-1.webp') }}"
                                                alt="Card Image">
                                            <img class="rbt-hover-img"
                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-03-a-1-hover.webp') }}"
                                                alt="Card Image">
                                        </a>
                                        <div class="rbt-discount-badge right--corner-style tooltips"
                                            data-tooltip="👁️ 16 People are Watching This Item"
                                            data-tooltip-position="bottom">
                                            <span><i class="fa-regular fa-eye"></i>16</span>
                                        </div>
                                        <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                            <button class="rbt-search-btn rbt-quick-btn tooltips" type="button"
                                                data-bs-toggle="modal" data-bs-target="#quickviewModal"
                                                data-tooltip="Quick View" data-tooltip-position="left"><i
                                                    class="fa-regular fa-magnifying-glass-plus"></i></button>
                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button"
                                                data-bs-toggle="modal" data-bs-target="#wishlistModal"
                                                data-tooltip="Add to wishlist" data-tooltip-position="left"><i
                                                    class="fa-regular fa-heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="rbt-card-body">
                                        <a href="shop-by-categories.html"
                                            class="rbt-card-subtitle rbt-card-catagories-text">Watch &
                                            Music</a>
                                        <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Cubitt
                                                Smart Watch CTS
                                                Waterproof Fitness Tracker Watch PRO</a></h2>
                                        <div class="rbt-card-rating">
                                            <ul class="rbt-rating-icon-list">
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            </ul>
                                            <p class="rating-digit">(46)</p>
                                            <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                        class="fa-solid fa-truck"></i></span>
                                                Free shipping
                                            </div>
                                        </div>
                                        <div class="pricing-part">
                                            <span class="price-text">Rs. 99.98</span>
                                            <div
                                                class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                4 in Stock</div>
                                        </div>
                                        <div class="prd-btn-grp">
                                            <button
                                                class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon"
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target="#popup-cartModal"><i
                                                    class="fa-regular fa-cart-shopping"></i> Add To Cart</button>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation"
                                                href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To
                                                Compare</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="prd-details-area rbt-has-show-more">
                                    <div class="wrapper rbt-has-show-more-inner-content">
                                        <ul class="product-details-list">
                                            <li>
                                                <span class="rbt-bold--text">Brand :</span>
                                                <span class="text">Sony Corporation Ltd</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Resolution :</span>
                                                <span class="text">3840×2160</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Release years :</span>
                                                <span class="text"> Jan 2022</span>
                                            </li>
                                            <li>
                                                <span class="rbt-bold--text">Motherboard :</span>
                                                <span class="text"> Samsung</span>
                                                <span class="text d-block"> ATX, ITX, microATX, Mini-ITX</span>
                                            </li>
                                        </ul>
                                        <ul class="product-details-list shipment-details-list">
                                            <li>
                                                <span class="icon"><i class="fa-sharp fa-regular fa-truck"></i></span>
                                                <div class="right-content">
                                                    <span class="rbt-bold--text">Ships :</span>
                                                    <span class="text">2–3 weeks Free Shipping</span>
                                                    <br>
                                                    <a href="#" class="shipment-quick-link rbt-btn-link">Get
                                                        delivery dates</a>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="fa-regular fa-bag-shopping"></i></span>
                                                <div class="right-content">
                                                    <span class="rbt-bold--text">Pickup :</span>
                                                    <a href="#" class="shipment-quick-link rbt-btn-link">Check
                                                        Availability</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rbt-show-more-btn-area">
                                        <button class="rbt-show-more-btn">Show More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-xxl-3 col-xl-3 col-lg-12 col-md-6 col-sm-6 col-6 mt--24">
                            <div class="rbt-card rbt-beta-shop-card rbt-bg-color-primary">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-4">
                                    <div class="rbt-card-img rbt-bg-color-default">
                                        <a href="#"><img
                                                src="{{ asset('assets/images/product-img/beta-shop/shop-beta-img-01.webp') }}"
                                                alt="Card Image"></a>
                                    </div>
                                    <div class="rbt-card-content">
                                        <h2 class="rbt-card-title h5"><a href="#">Beats Brand is now on <br
                                                    class="d-none d-lg-block"> Unimart Platform</a>
                                        </h2>
                                        <p class="b4 desc rbt-text-medium">Shop Beats Headphones & Earbuds</p>
                                        <a class="rbt-btn rbt-btn-white rbt-btn-sm has-left-icon" href="#">Shop
                                            Beats <i class="fa-solid fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                    </div>
                    @endif
                    <!-- End Card Area -->
                </div>
            </div>
            <!-- End Product Single Component -->

        </div>
    </div>
    <!-- End Component Area -->

    <!-- Start Component Area -->
    <div class="rbt-component-area rbt-section-gap rbt-bg-color-white nbc-hidden-frequently-bought">
        <div class="container">

            <div
                class="rbt-fshape-box-outline-style rbt-fshape-box-outline-style-primary-stroke rbt-fshape-box-outline-style-extend-width rbt-product-fshape-box-outline-style">
                <div class="row rbt-section-gap2Top pt_sm--100 pt_md--80 pt--0">
                    <div class="col-lg-12">
                        <div class="rbt-component-section-title rbt-bg-color-white">
                            <h2 class="rbt-title h4"><span class="rbt-bold--text">Frequently Bought Together</span></h2>
                            <span class="rbt-fshape-right-portion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="52" height="50"
                                    viewbox="0 0 52 50" fill="none">
                                    <path
                                        d="M51.5337 49.984C-64.8544 49.9977 116.427 49.9764 0.0390625 49.9901C0.0390625 31.262 0.0390625 20.7619 0.0390625 2.03378C11.2391 1.63419 16.5034 4.56468 19.5034 10.5602L30.0034 38.5311C34.0374 47.934 45.4209 49.4481 51.5337 49.984Z"
                                        fill="var(--color-white)"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.246 1.97519C16.582 3.50685 18.8114 5.90944 20.3979 9.07997L20.4213 9.12681L30.9315 37.1248C33.053 42.053 36.807 44.7979 40.7367 46.3047C44.6934 47.8219 48.798 48.068 51.4731 47.987C51.4731 47.987 51.51 49.2041 51.5337 49.984C48.7087 50.0695 44.3134 49.8162 40.02 48.17C35.7052 46.5155 31.4643 43.4388 29.0842 37.891L29.0751 37.8698C29.0751 37.8698 19.997 12.7279 18.5857 9.92689C17.1743 7.12591 15.2591 5.09828 12.4108 3.79055C8.49554 1.49902 0.0390625 2.03378 0.0390625 2.03378C0.0390625 20.7619 0.0390625 31.262 0.0390625 49.9901L0.0408325 0.0348727C5.70805 -0.16568 9.9493 0.461575 13.246 1.97519Z"
                                        fill="var(--color-primary)"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="rbt-component-area rbt-fshape-box rbt-bg-color-white">
                    <!-- Start Card Area -->
                    <div class="row row--12">

                        <div class="col-md-12 col-12">
                            <div
                                class="rbt-swiper-container-one rbt-fashion-prd-card-activation-2-container rbt-arrow-between rbt-arrow-between-lg-dis">
                                <div class="swiper rbt-fashion-prd-card-activation-2">
                                    <div class="swiper-wrapper">
                                        <!-- Start Single Card  -->
                                        <div class="swiper-slide">
                                            <div class="rbt-card rbt-product-card">
                                                <div class="inner rbt-scroll-trigger fade_in animation-order-1">
                                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}">
                                                            <img class="rbt-prd-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                alt="Card Image">
                                                            <img class="rbt-hover-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1-hover.webp') }}"
                                                                alt="Card Image">
                                                        </a>
                                                        <div
                                                            class="rbt-product-badge rbt-product-badge-bg-danger border-rounded rbt-content-top-left">
                                                            Hot</div>
                                                        <div
                                                            class="rbt-product-badge rbt-product-badge-bg-secondary-gradient border-rounded rbt-content-top-left">
                                                            Best Seller</div>
                                                        <div
                                                            class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                                            <button class="rbt-search-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#quickviewModal"
                                                                data-tooltip="Quick View"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-magnifying-glass-plus"></i></button>
                                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#wishlistModal"
                                                                data-tooltip="Add to wishlist"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-heart"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <div class="rbt-color-select-area">
                                                            <ul
                                                                class="rbt-switcher-color-list product-switcher-activation">
                                                                <li class="active"><a
                                                                        class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#2B2B2B"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                        data-tooltip="Black" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips "
                                                                        data-switcher-color="#a09fa4"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                        data-tooltip="Red" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#cc999d"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                        data-tooltip="Pink" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                            </ul>
                                                            <a class="prd-link-text"
                                                                href="{{ route('product.details') }}">+12
                                                                More Items</a>
                                                        </div>
                                                        <a href="shop-by-categories.html"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Headphones
                                                            &
                                                            Music</a>
                                                        <h2 class="rbt-card-title"><a
                                                                href="{{ route('product.details') }}">Samsung Quiet
                                                                Comfort
                                                                Noise Cancelling Earbuds - Black</a></h2>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(30)</p>
                                                            <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span
                                                                                class="icon mr--4"><i
                                                                                    class="fa-solid fa-bag-shopping"></i></span>
                                                                            90+ Sold Recently
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span
                                                                                class="icon mr--4"><i
                                                                                    class="fa-solid fa-truck"></i></span>
                                                                            Free shipping
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span
                                                                                class="icon mr--4"><i
                                                                                    class="fa-solid fa-rotate-left"></i></span>
                                                                            7 Days Return Plicy
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rbt-verticle-arrow rbt-arrow-prev">
                                                                    <i class="fa-regular fa-chevron-up"></i>
                                                                </div>
                                                                <div class="rbt-verticle-arrow rbt-arrow-next">
                                                                    <i class="fa-regular fa-chevron-down"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 257.00</del>
                                                            <span class="price-text">Rs. 167.99</span>
                                                            <span class="rbt-offer-badge">-30%</span>
                                                            <div
                                                                class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                                12 in Stock</div>
                                                        </div>
                                                        <div class="rbt-prd-qty-area">
                                                            <p class="prd-qty-txt">Only <strong>54</strong> pc left</p>
                                                            <div class="progress" role="progressbar"
                                                                aria-label="Shipping-progress" aria-valuenow="50"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar w-50"></div>
                                                            </div>
                                                        </div>
                                                        <div class="prd-btn-grp">
                                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"
                                                                href="#"><i
                                                                    class="fa-regular fa-cart-shopping"></i> Add To
                                                                Cart</a>
                                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation rbt-compare-bottom-sidenav-activation"
                                                                href="#"><i
                                                                    class="fa-regular fa-file-plus-minus"></i>Add To
                                                                Compare</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->

                                        <!-- Start Single Card  -->
                                        <div class="swiper-slide">
                                            <div class="rbt-card rbt-product-card">
                                                <div class="inner rbt-scroll-trigger fade_in animation-order-2">
                                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}">
                                                            <img class="rbt-prd-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1.webp') }}"
                                                                alt="Card Image">
                                                            <img class="rbt-hover-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1-hover.webp') }}"
                                                                alt="Card Image">
                                                        </a>
                                                        <div
                                                            class="rbt-product-badge rbt-product-badge-bg-secondary-gradient border-rounded rbt-content-top-left">
                                                            Best Seller</div>
                                                        <div
                                                            class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                                            <button class="rbt-search-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#quickviewModal"
                                                                data-tooltip="Quick View"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-magnifying-glass-plus"></i></button>
                                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#wishlistModal"
                                                                data-tooltip="Add to wishlist"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-heart"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <div class="rbt-color-select-area">
                                                            <ul
                                                                class="rbt-switcher-color-list product-switcher-activation">
                                                                <li class="active"><a
                                                                        class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#bdb6d6"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1.webp') }}"
                                                                        data-tooltip="Purple"
                                                                        data-tooltip-position="top" href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips "
                                                                        data-switcher-color="#486788"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-2.webp') }}"
                                                                        data-tooltip="Blue" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#1a1a1a"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-3.webp') }}"
                                                                        data-tooltip="Black" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                            </ul>
                                                            <a class="prd-link-text"
                                                                href="{{ route('product.details') }}">+12
                                                                More Items</a>
                                                        </div>
                                                        <a href="shop-by-categories.html"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Headphones
                                                            &
                                                            Music</a>
                                                        <h2 class="rbt-card-title"><a
                                                                href="{{ route('product.details') }}">Keurig K-Duo Bose
                                                                Noise
                                                                Cancelling Headphones 700 </a></h2>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(10)</p>
                                                            <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                                        class="fa-solid fa-bag-shopping"></i></span>
                                                                90+ Sold Recently
                                                            </div>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 195.00</del>
                                                            <span class="price-text">Rs. 179.98</span>
                                                        </div>
                                                        <div class="rbt-prd-qty-area">
                                                            <p class="prd-qty-txt">Only <strong>36</strong> pc left</p>
                                                            <div class="progress" role="progressbar"
                                                                aria-label="Shipping-progress" aria-valuenow="50"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar w-50"></div>
                                                            </div>
                                                        </div>
                                                        <div class="prd-btn-grp">
                                                            <button
                                                                class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"><i
                                                                    class="fa-regular fa-cart-shopping"></i> Add To
                                                                Cart</button>
                                                            <button
                                                                class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#addedcomparisonModal"><i
                                                                    class="fa-regular fa-file-plus-minus"></i>Add To
                                                                Compare</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->

                                        <!-- Start Single Card  -->
                                        <div class="swiper-slide">
                                            <div class="rbt-card rbt-product-card">
                                                <div class="inner rbt-scroll-trigger fade_in animation-order-3">
                                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}">
                                                            <img class="rbt-prd-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1.webp') }}"
                                                                alt="Card Image">
                                                            <img class="rbt-hover-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1-hover.webp') }}"
                                                                alt="Card Image">
                                                        </a>
                                                        <div
                                                            class="rbt-product-badge rbt-product-badge-bg-green border-rounded rbt-content-top-left">
                                                            New</div>
                                                        <div
                                                            class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                                            <button class="rbt-search-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#quickviewModal"
                                                                data-tooltip="Quick View"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-magnifying-glass-plus"></i></button>
                                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#wishlistModal"
                                                                data-tooltip="Add to wishlist"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-heart"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <div class="rbt-color-select-area">
                                                            <ul
                                                                class="rbt-switcher-color-list product-switcher-activation">
                                                                <li class="active"><a
                                                                        class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#202020"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1.webp') }}"
                                                                        data-tooltip="Black" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips "
                                                                        data-switcher-color="#9e9e9e"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-2.webp') }}"
                                                                        data-tooltip="Gray" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#171717"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-3.webp') }}"
                                                                        data-tooltip="Light Black"
                                                                        data-tooltip-position="top" href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                            </ul>
                                                            <a class="prd-link-text"
                                                                href="{{ route('product.details') }}">+12
                                                                More Items</a>
                                                        </div>
                                                        <a href="shop-by-categories.html"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Electronics
                                                            &
                                                            Camera</a>
                                                        <h2 class="rbt-card-title"><a
                                                                href="{{ route('product.details') }}">GoPro HERO 11 4K
                                                                Action
                                                                Camera with SD Card</a></h2>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(16)</p>
                                                            <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span
                                                                                class="icon mr--4"><i
                                                                                    class="fa-solid fa-bag-shopping"></i></span>
                                                                            90+ Sold Recently
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span
                                                                                class="icon mr--4"><i
                                                                                    class="fa-solid fa-truck"></i></span>
                                                                            Free shipping
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span
                                                                                class="icon mr--4"><i
                                                                                    class="fa-solid fa-rotate-left"></i></span>
                                                                            7 Days Return Plicy
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rbt-verticle-arrow rbt-arrow-prev">
                                                                    <i class="fa-regular fa-chevron-up"></i>
                                                                </div>
                                                                <div class="rbt-verticle-arrow rbt-arrow-next">
                                                                    <i class="fa-regular fa-chevron-down"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 356.00</del>
                                                            <span class="price-text">Rs. 189.99</span>
                                                            <span class="rbt-offer-badge">-30%</span>
                                                            <div
                                                                class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                                In Stock</div>
                                                        </div>
                                                        <div class="rbt-prd-qty-area">
                                                            <p class="prd-qty-txt">Only <strong>87</strong> pc left</p>
                                                            <div class="progress" role="progressbar"
                                                                aria-label="Shipping-progress" aria-valuenow="50"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar w-50"></div>
                                                            </div>
                                                        </div>
                                                        <div class="prd-btn-grp">
                                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"
                                                                href="#"><i
                                                                    class="fa-regular fa-cart-shopping"></i> Add To
                                                                Cart</a>
                                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation"
                                                                href="#"><i
                                                                    class="fa-regular fa-file-plus-minus"></i>Add To
                                                                Compare</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->

                                        <!-- Start Single Card  -->
                                        <div class="swiper-slide">
                                            <div class="rbt-card rbt-product-card">
                                                <div class="inner rbt-scroll-trigger fade_in animation-order-4">
                                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                                        <a href="{{ route('product.details') }}">
                                                            <img class="rbt-prd-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1.webp') }}"
                                                                alt="Card Image">
                                                            <img class="rbt-hover-img"
                                                                src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1-hover.webp') }}"
                                                                alt="Card Image">
                                                        </a>
                                                        <div
                                                            class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded rbt-content-top-left">
                                                            Trending</div>
                                                        <div
                                                            class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                                            <button class="rbt-search-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#quickviewModal"
                                                                data-tooltip="Quick View"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-magnifying-glass-plus"></i></button>
                                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#wishlistModal"
                                                                data-tooltip="Add to wishlist"
                                                                data-tooltip-position="left"><i
                                                                    class="fa-regular fa-heart"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <div class="rbt-color-select-area">
                                                            <ul
                                                                class="rbt-switcher-color-list product-switcher-activation">
                                                                <li class="active"><a
                                                                        class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#afb1b3"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1.webp') }}"
                                                                        data-tooltip="Gray" data-tooltip-position="top"
                                                                        href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips "
                                                                        data-switcher-color="#7796b9"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-2.webp') }}"
                                                                        data-tooltip="Sky Blue"
                                                                        data-tooltip-position="top" href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                                <li><a class="rbt-switcher--color tooltips"
                                                                        data-switcher-color="#b84a5f"
                                                                        data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-3.webp') }}"
                                                                        data-tooltip="Pink Red"
                                                                        data-tooltip-position="top" href="#">
                                                                        <div class="rbt-color-circle"></div>
                                                                    </a></li>
                                                            </ul>
                                                            <a class="prd-link-text"
                                                                href="{{ route('product.details') }}">+12
                                                                More Items</a>
                                                        </div>
                                                        <a href="shop-by-categories.html"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Tablets &
                                                            Accessories</a>
                                                        <h2 class="rbt-card-title"><a
                                                                href="{{ route('product.details') }}">Samsung Galaxy
                                                                N-569 Tab
                                                                S7 with Stylish – 8GB/128GB</a></h2>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(25)</p>
                                                            <div class="rbt-text-group"> <span class="icon mr--4"><i
                                                                        class="fa-solid fa-bag-shopping"></i></span>
                                                                90+ Sold Recently
                                                            </div>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 356.00</del>
                                                            <span class="price-text">Rs. 159.99</span>
                                                        </div>
                                                        <div class="rbt-prd-qty-area">
                                                            <p class="prd-qty-txt">Only <strong>57</strong> pc left</p>
                                                            <div class="progress" role="progressbar"
                                                                aria-label="Shipping-progress" aria-valuenow="50"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar w-50"></div>
                                                            </div>
                                                        </div>
                                                        <div class="prd-btn-grp">
                                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"
                                                                href="#"><i
                                                                    class="fa-regular fa-cart-shopping"></i> Add To
                                                                Cart</a>
                                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation"
                                                                href="#"><i
                                                                    class="fa-regular fa-file-plus-minus"></i>Add To
                                                                Compare</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->
                                    </div>
                                </div>
                                <div class="rbt-swiper-arrow rbt-arrow-left rbt-arrow-gray rbt-arrow-lg">
                                    <div class="custom-overflow">
                                        <i class="rbt-icon fa-regular fa-arrow-left"></i>
                                        <i class="rbt-icon-top fa-regular fa-arrow-left"></i>
                                    </div>
                                </div>
                                <div class="rbt-swiper-arrow rbt-arrow-right rbt-arrow-gray rbt-arrow-lg">
                                    <div class="custom-overflow">
                                        <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                        <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Area -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Component Area -->

    <!-- Start Quick View Modal Area  -->
    <div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="quickviewModal" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="rbt-folder-shape-right-portion">
                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90"
                        fill="none">
                        <path
                            d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z"
                            fill="white"></path>
                    </svg>
                </div>

                <div class="modal-header">
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="rbt-top-folder-shape-wrapper">
                    <div
                        class="rbt-content-trs-portion rbt-arrow-between rbt-swiper-container-one rbt-arrow-between-lg-dis">
                        <!-- Start banner part -->
                        <div class="swiper rbt-qs-wrapper-slide-acivation">
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <!-- Start Component Area -->
                                    <div class="rbt-single-product-area">
                                        <div class="row row--16">
                                            <div class="col-lg-6 col-12">
                                                <div
                                                    class="rbt-product-view-slider rbt-single-product-media-area  rbt-single-product-media-has-folder-shape">
                                                    <div
                                                        class="swiper rbt-arrow-between rbt-product-single-slider-activation rbt-arrow-show-dfl">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-swiper-arrow rbt-modal-arrow-sm-left"
                                                            data-rbt-position-horigental="3">
                                                            <div class="custom-overflow">
                                                                <i class="rbt-icon fa-regular fa-arrow-left"></i>
                                                                <i class="rbt-icon-top fa-regular fa-arrow-left"></i>
                                                            </div>
                                                        </div>

                                                        <div class="rbt-swiper-arrow rbt-modal-arrow-sm-right"
                                                            data-rbt-position-horigental="86">
                                                            <div class="custom-overflow">
                                                                <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                                                <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div
                                                        class="swiper rbt-product-thumb-slider-activation mt--24 mt_sm--16">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mt_sm--12 content">
                                                <a href="shop-by-category.html"
                                                    class="rbt-card-subtitle rbt-card-catagories-text mt--0">Headphones</a>
                                                <div class="rbt-card-title h4"><a
                                                        href="{{ route('product.details') }}">Beats
                                                        Wireless Earbuds with
                                                        Charging Case - Bluetooth In-Ear Headphones</a></div>
                                                <div class="rbt-scroll-vertical-wrapper rbt-vertical-height-sm">
                                                    <div class="rbt-scroll-vertical content">
                                                        <p class="description-text b2">
                                                            At vero eos et accusamus et iusto dignissimos ducimus blanditiis
                                                            praesentium voluptatu
                                                            atque...
                                                        </p>
                                                        <div
                                                            class="rbt-info-wrapper d-flex justify-content-between mt--16">
                                                            <div class="pricing-part mt--0">
                                                                <del class="price-text">Rs. 295.00</del>
                                                                <span class="price-text">Rs. 179.98</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">SKU:</p>
                                                                    <p> HN-508801</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16">
                                                            <div class="rbt-card-rating mt--0">
                                                                <ul class="rbt-rating-icon-list">
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                </ul>
                                                                <p class="rating-digit">(46)</p>
                                                                <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <div class="rbt-text-group"> <span
                                                                                    class="icon mr--4"><i
                                                                                        class="fa-solid fa-bag-shopping"></i></span>
                                                                                90+ Sold Recently
                                                                            </div>
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <div class="rbt-text-group"> <span
                                                                                    class="icon mr--4"><i
                                                                                        class="fa-solid fa-truck"></i></span>
                                                                                Free shipping
                                                                            </div>
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <div class="rbt-text-group"> <span
                                                                                    class="icon mr--4"><i
                                                                                        class="fa-solid fa-rotate-left"></i></span>
                                                                                7 Days Return Plicy
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rbt-verticle-arrow rbt-arrow-prev">
                                                                        <i class="fa-regular fa-chevron-up"></i>
                                                                    </div>
                                                                    <div class="rbt-verticle-arrow rbt-arrow-next">
                                                                        <i class="fa-regular fa-chevron-down"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div
                                                                    class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                                    9 in Stock</div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--8">
                                                            <div class="prd-info-section">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">Brand:</p>
                                                                    <a href="shop-by-brands.html"
                                                                        class="rbt-brand-img tooltips"
                                                                        data-tooltip="Product Brand"
                                                                        data-tooltip-position="top"><img
                                                                            src="{{ asset('assets/images/icons/small-brand/sm-brand-b-01.webp') }}"
                                                                            alt="Small icon Brand"></a>
                                                                </div>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">All Europe</p>
                                                                    <a href="shop-by-brands.html"
                                                                        class="rbt-brand-img tooltips"
                                                                        data-tooltip="All Europe Delivary"
                                                                        data-tooltip-position="top"><img
                                                                            src="{{ asset('assets/images/icons/small-brand/sm-brand-b-02.webp') }}"
                                                                            alt="Small icon Brand"></a>
                                                                </div>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">Verified:</p>
                                                                    <span class="rbt-brand-img tooltips"
                                                                        data-tooltip="Verified Product"
                                                                        data-tooltip-position="top"><img
                                                                            src="{{ asset('assets/images/icons/small-brand/sm-brand-b-03.webp') }}"
                                                                            alt="Small icon Brand"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16 rbt-gap--8 flex-wrap">
                                                            <div class="prd-info-section">
                                                                <a class="rbt-quick-info-tag d-flex align-items-center rbt-gap--8 rbt-shiny"
                                                                    href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="14" height="10"
                                                                        viewbox="0 0 14 10" fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1.98586 5.18652C1.93484 5.12038 1.88687 5.05807 1.84423 5.00038C2.25958 4.44469 2.71871 3.92381 3.21712 3.44281C4.28087 2.42212 5.61949 1.53911 7 1.53911C8.38051 1.53911 9.71837 2.42212 10.7829 3.44281C11.2813 3.92383 11.7404 4.44471 12.1558 5.00038C11.7402 5.55588 11.2811 6.07675 10.7829 6.55796C9.71837 7.57865 8.38051 8.46166 7 8.46166C5.61949 8.46166 4.28163 7.57865 3.21712 6.55796C2.77476 6.13114 2.36329 5.67282 1.98586 5.18652ZM13.7297 4.58042L13.0916 5.00038L13.7297 5.42035L13.7282 5.42266L13.7259 5.42574L13.7183 5.43804L13.6901 5.47958C13.5374 5.70347 13.378 5.92253 13.2119 6.13645C12.789 6.68142 12.3279 7.19501 11.8322 7.67326C10.6915 8.76779 8.98433 10 7 10C5.01566 10 3.3085 8.76779 2.16785 7.67326C1.47767 7.00644 0.855254 6.27156 0.30991 5.47958C0.300444 5.46579 0.291053 5.45194 0.281736 5.43804L0.274122 5.42574L0.271837 5.42266L0.271076 5.42112C0.271076 5.42035 0.270314 5.42035 0.908409 5.00038L0.270314 4.58042L0.271837 4.57811L0.274122 4.57503L0.281736 4.56273C0.323524 4.49897 0.366683 4.43614 0.411182 4.37428C0.932338 3.63825 1.52073 2.95324 2.16861 2.32828C3.30773 1.23144 5.01566 0 7 0C8.98433 0 10.6915 1.23221 11.8322 2.32674C12.5223 2.99355 13.1448 3.72843 13.6901 4.52042L13.7183 4.56196L13.7259 4.57426L13.7282 4.57734L13.7289 4.57888L13.7297 4.58042ZM13.0916 5.00038L13.7297 4.58042L14 5.00038L13.7297 5.42035L13.0916 5.00038ZM0.270314 4.58042L0.908409 5.00038L0.270314 5.42035L0 5.00038L0.270314 4.58042ZM6.23855 5.00038C6.23855 4.79639 6.31877 4.60075 6.46157 4.4565C6.60437 4.31225 6.79805 4.23121 7 4.23121C7.20195 4.23121 7.39563 4.31225 7.53842 4.4565C7.68122 4.60075 7.76145 4.79639 7.76145 5.00038C7.76145 5.20438 7.68122 5.40002 7.53842 5.54427C7.39563 5.68852 7.20195 5.76956 7 5.76956C6.79805 5.76956 6.60437 5.68852 6.46157 5.54427C6.31877 5.40002 6.23855 5.20438 6.23855 5.00038ZM7 2.69287C6.39415 2.69287 5.81312 2.93598 5.38472 3.36873C4.95632 3.80147 4.71565 4.38839 4.71565 5.00038C4.71565 5.61238 4.95632 6.1993 5.38472 6.63204C5.81312 7.06479 6.39415 7.3079 7 7.3079C7.60585 7.3079 8.18688 7.06479 8.61528 6.63204C9.04367 6.1993 9.28435 5.61238 9.28435 5.00038C9.28435 4.38839 9.04367 3.80147 8.61528 3.36873C8.18688 2.93598 7.60585 2.69287 7 2.69287Z"
                                                                            fill="#24BD25"></path>
                                                                    </svg>
                                                                    <p><strong>20 people are viewing this</strong></p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16">
                                                            <div class="prd-info-section">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">Color:</p>
                                                                    <div class="rbt-color-select-area">
                                                                        <ul
                                                                            class="rbt-switcher-color-list rbt-switcher-color-list-lg product-switcher-activation">
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-one"
                                                                                    data-switcher-color="#2B2B2B"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}"
                                                                                    data-tooltip="Black"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li class="active"><a
                                                                                    class="rbt-switcher--color tooltips rbt-switcher--color-two"
                                                                                    data-switcher-color="#cc999d"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-02.webp') }}"
                                                                                    data-tooltip="Pink"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-three"
                                                                                    data-switcher-color="#9C9B9E"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-04.webp') }}"
                                                                                    data-tooltip="Dark"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-four"
                                                                                    data-switcher-color="#F2EDE7"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}"
                                                                                    data-tooltip="White"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-five rbt-switcher--disable disabled"
                                                                                    data-switcher-color="#a09fa4"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}"
                                                                                    data-tooltip="Gray"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16">
                                                            <div class="product-styles-grp d-flex mt--0">
                                                                <p class="text-bold title">Style :</p>
                                                                <div class="content d-flex flex-wrap">
                                                                    <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn active"
                                                                        href="#">Headphones
                                                                        Only</a>
                                                                    <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn"
                                                                        href="#">Charging
                                                                        Stand</a>
                                                                    <a class="rbt-btn rbt-btn-border rbt-btn-sm disabled"
                                                                        href="#">Headphones + Charging
                                                                        Stand</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="separator-top has-sm-spacer"></div>
                                                        <div class="product-btn-grp">
                                                            <div class="rbt-qty-area">
                                                                <button class="qty-item-btn qty-item-btn-decr"><i
                                                                        class="fa-solid fa-minus"></i></button>
                                                                <input type="number" class="items-qty-input"
                                                                    value="05" min="01">
                                                                <button class="qty-item-btn qty-item-btn-incr"><i
                                                                        class="fa-solid fa-plus"></i></button>
                                                            </div>
                                                            <a class="rbt-btn rbt-btn-border has-left-icon d-block text-center"
                                                                href="#" data-bs-toggle="modal"
                                                                data-bs-target="#popup-cartModal"><i
                                                                    class="fa-regular fa-cart-shopping"></i> Add To
                                                                Cart</a>
                                                        </div>
                                                        <div class="prd-btn-grp">
                                                            <a class="rbt-btn d-block text-center" href="#">Buy
                                                                Now</a>
                                                        </div>
                                                        <div class="rbt-quick-link-grp mt--12">
                                                            <button class="rbt-quick-link" data-bs-toggle="modal"
                                                                data-bs-target="#compareviewModal" type="button"><i
                                                                    class="fa-sharp fa-regular fa-copy"></i>Compare
                                                                Product</button>
                                                            <button class="rbt-quick-link" data-bs-toggle="modal"
                                                                data-bs-target="#wishlistModal" type="button"><i
                                                                    class="fa-sharp fa-regular fa-heart"></i>Add To
                                                                Wishlist</button>
                                                            <button class="rbt-quick-link" data-bs-toggle="modal"
                                                                data-bs-target="#socialShareModal" type="button"><i
                                                                    class="fa-sharp fa-regular fa-share-nodes"></i>Share</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Component Area -->
                                </div>

                                <div class="swiper-slide">
                                    <!-- Start Component Area -->
                                    <div class="rbt-single-product-area">
                                        <div class="row row--16">
                                            <div class="col-lg-6 col-12">
                                                <div
                                                    class="rbt-product-view-slider rbt-single-product-media-area  rbt-single-product-media-has-folder-shape">
                                                    <div
                                                        class="swiper rbt-arrow-between rbt-product-single-slider-activation rbt-arrow-show-dfl">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="thumbnail radius-16">
                                                                    <div class="rbt-product-single-img">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-swiper-arrow rbt-modal-arrow-sm-left"
                                                            data-rbt-position-horigental="3">
                                                            <div class="custom-overflow">
                                                                <i class="rbt-icon fa-regular fa-arrow-left"></i>
                                                                <i class="rbt-icon-top fa-regular fa-arrow-left"></i>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-swiper-arrow rbt-modal-arrow-sm-right"
                                                            data-rbt-position-horigental="86">
                                                            <div class="custom-overflow">
                                                                <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                                                <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="swiper rbt-product-thumb-slider-activation mt--24 mt_sm--16">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <button class="thumbnail d-block">
                                                                    <span class="rbt-thumb-img-sm">
                                                                        <img class="w-100"
                                                                            src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}"
                                                                            alt="Product Images">
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mt_sm--12 content">
                                                <a href="shop-by-category.html"
                                                    class="rbt-card-subtitle rbt-card-catagories-text mt--0">Headphones</a>
                                                <div class="rbt-card-title h4"><a
                                                        href="{{ route('product.details') }}">Beats
                                                        Wireless
                                                        Earbuds with Charging Case - Bluetooth In-Ear Headphones</a></div>
                                                <div class="rbt-scroll-vertical-wrapper rbt-vertical-height-sm">
                                                    <div class="rbt-scroll-vertical content">
                                                        <p class="description-text b2">
                                                            At vero eos et accusamus et iusto dignissimos ducimus blanditiis
                                                            praesentium voluptatu
                                                            atque...
                                                        </p>
                                                        <div
                                                            class="rbt-info-wrapper d-flex justify-content-between mt--16">
                                                            <div class="pricing-part mt--0">
                                                                <del class="price-text">Rs. 295.00</del>
                                                                <span class="price-text">Rs. 179.98</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">SKU:</p>
                                                                    <p> HN-508801</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16">
                                                            <div class="rbt-card-rating mt--0">
                                                                <ul class="rbt-rating-icon-list">
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i>
                                                                    </li>
                                                                </ul>
                                                                <p class="rating-digit">(46)</p>
                                                                <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <div class="rbt-text-group"> <span
                                                                                    class="icon mr--4"><i
                                                                                        class="fa-solid fa-bag-shopping"></i></span>
                                                                                90+ Sold Recently
                                                                            </div>
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <div class="rbt-text-group"> <span
                                                                                    class="icon mr--4"><i
                                                                                        class="fa-solid fa-truck"></i></span>
                                                                                Free shipping
                                                                            </div>
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <div class="rbt-text-group"> <span
                                                                                    class="icon mr--4"><i
                                                                                        class="fa-solid fa-rotate-left"></i></span>
                                                                                7 Days Return Plicy
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rbt-verticle-arrow rbt-arrow-prev">
                                                                        <i class="fa-regular fa-chevron-up"></i>
                                                                    </div>
                                                                    <div class="rbt-verticle-arrow rbt-arrow-next">
                                                                        <i class="fa-regular fa-chevron-down"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div
                                                                    class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                                    9 in Stock</div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--8">
                                                            <div class="prd-info-section">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">Brand:</p>
                                                                    <a href="shop-by-brands.html"
                                                                        class="rbt-brand-img tooltips"
                                                                        data-tooltip="Product Brand"
                                                                        data-tooltip-position="top"><img
                                                                            src="{{ asset('assets/images/icons/small-brand/sm-brand-b-01.webp') }}"
                                                                            alt="Small icon Brand"></a>
                                                                </div>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">All Europe</p>
                                                                    <a href="shop-by-brands.html"
                                                                        class="rbt-brand-img tooltips"
                                                                        data-tooltip="All Europe Delivary"
                                                                        data-tooltip-position="top"><img
                                                                            src="{{ asset('assets/images/icons/small-brand/sm-brand-b-02.webp') }}"
                                                                            alt="Small icon Brand"></a>
                                                                </div>
                                                            </div>
                                                            <div class="prd-info-section has-left-separator">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">Verified:</p>
                                                                    <span class="rbt-brand-img tooltips"
                                                                        data-tooltip="Verified Product"
                                                                        data-tooltip-position="top"><img
                                                                            src="{{ asset('assets/images/icons/small-brand/sm-brand-b-03.webp') }}"
                                                                            alt="Small icon Brand"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16 rbt-gap--8 flex-wrap">
                                                            <div class="prd-info-section">
                                                                <a class="rbt-quick-info-tag d-flex align-items-center rbt-gap--8 rbt-shiny"
                                                                    href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="14" height="10"
                                                                        viewbox="0 0 14 10" fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1.98586 5.18652C1.93484 5.12038 1.88687 5.05807 1.84423 5.00038C2.25958 4.44469 2.71871 3.92381 3.21712 3.44281C4.28087 2.42212 5.61949 1.53911 7 1.53911C8.38051 1.53911 9.71837 2.42212 10.7829 3.44281C11.2813 3.92383 11.7404 4.44471 12.1558 5.00038C11.7402 5.55588 11.2811 6.07675 10.7829 6.55796C9.71837 7.57865 8.38051 8.46166 7 8.46166C5.61949 8.46166 4.28163 7.57865 3.21712 6.55796C2.77476 6.13114 2.36329 5.67282 1.98586 5.18652ZM13.7297 4.58042L13.0916 5.00038L13.7297 5.42035L13.7282 5.42266L13.7259 5.42574L13.7183 5.43804L13.6901 5.47958C13.5374 5.70347 13.378 5.92253 13.2119 6.13645C12.789 6.68142 12.3279 7.19501 11.8322 7.67326C10.6915 8.76779 8.98433 10 7 10C5.01566 10 3.3085 8.76779 2.16785 7.67326C1.47767 7.00644 0.855254 6.27156 0.30991 5.47958C0.300444 5.46579 0.291053 5.45194 0.281736 5.43804L0.274122 5.42574L0.271837 5.42266L0.271076 5.42112C0.271076 5.42035 0.270314 5.42035 0.908409 5.00038L0.270314 4.58042L0.271837 4.57811L0.274122 4.57503L0.281736 4.56273C0.323524 4.49897 0.366683 4.43614 0.411182 4.37428C0.932338 3.63825 1.52073 2.95324 2.16861 2.32828C3.30773 1.23144 5.01566 0 7 0C8.98433 0 10.6915 1.23221 11.8322 2.32674C12.5223 2.99355 13.1448 3.72843 13.6901 4.52042L13.7183 4.56196L13.7259 4.57426L13.7282 4.57734L13.7289 4.57888L13.7297 4.58042ZM13.0916 5.00038L13.7297 4.58042L14 5.00038L13.7297 5.42035L13.0916 5.00038ZM0.270314 4.58042L0.908409 5.00038L0.270314 5.42035L0 5.00038L0.270314 4.58042ZM6.23855 5.00038C6.23855 4.79639 6.31877 4.60075 6.46157 4.4565C6.60437 4.31225 6.79805 4.23121 7 4.23121C7.20195 4.23121 7.39563 4.31225 7.53842 4.4565C7.68122 4.60075 7.76145 4.79639 7.76145 5.00038C7.76145 5.20438 7.68122 5.40002 7.53842 5.54427C7.39563 5.68852 7.20195 5.76956 7 5.76956C6.79805 5.76956 6.60437 5.68852 6.46157 5.54427C6.31877 5.40002 6.23855 5.20438 6.23855 5.00038ZM7 2.69287C6.39415 2.69287 5.81312 2.93598 5.38472 3.36873C4.95632 3.80147 4.71565 4.38839 4.71565 5.00038C4.71565 5.61238 4.95632 6.1993 5.38472 6.63204C5.81312 7.06479 6.39415 7.3079 7 7.3079C7.60585 7.3079 8.18688 7.06479 8.61528 6.63204C9.04367 6.1993 9.28435 5.61238 9.28435 5.00038C9.28435 4.38839 9.04367 3.80147 8.61528 3.36873C8.18688 2.93598 7.60585 2.69287 7 2.69287Z"
                                                                            fill="#24BD25"></path>
                                                                    </svg>
                                                                    <p><strong>20 people are viewing this</strong></p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16">
                                                            <div class="prd-info-section">
                                                                <div class="prd-id-text">
                                                                    <p class="text-bold">Color:</p>
                                                                    <div class="rbt-color-select-area">
                                                                        <ul
                                                                            class="rbt-switcher-color-list rbt-switcher-color-list-lg product-switcher-activation">
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-one"
                                                                                    data-switcher-color="#2B2B2B"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}"
                                                                                    data-tooltip="Black"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li class="active"><a
                                                                                    class="rbt-switcher--color tooltips rbt-switcher--color-two"
                                                                                    data-switcher-color="#cc999d"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-02.webp') }}"
                                                                                    data-tooltip="Pink"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-three"
                                                                                    data-switcher-color="#9C9B9E"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-04.webp') }}"
                                                                                    data-tooltip="Dark"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-four"
                                                                                    data-switcher-color="#F2EDE7"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}"
                                                                                    data-tooltip="White"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                            <li><a class="rbt-switcher--color tooltips rbt-switcher--color-five rbt-switcher--disable disabled"
                                                                                    data-switcher-color="#a09fa4"
                                                                                    data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}"
                                                                                    data-tooltip="Gray"
                                                                                    data-tooltip-position="top"
                                                                                    href="#">
                                                                                    <div class="rbt-color-circle"></div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-info-wrapper d-flex mt--16">
                                                            <div class="product-styles-grp d-flex mt--0">
                                                                <p class="text-bold title">Style :</p>
                                                                <div class="content d-flex flex-wrap">
                                                                    <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn active"
                                                                        href="#">Headphones
                                                                        Only</a>
                                                                    <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn"
                                                                        href="#">Charging
                                                                        Stand</a>
                                                                    <a class="rbt-btn rbt-btn-border rbt-btn-sm disabled"
                                                                        href="#">Headphones + Charging
                                                                        Stand</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="separator-top has-sm-spacer"></div>
                                                        <div class="product-btn-grp">
                                                            <div class="rbt-qty-area">
                                                                <button class="qty-item-btn qty-item-btn-decr"><i
                                                                        class="fa-solid fa-minus"></i></button>
                                                                <input type="number" class="items-qty-input"
                                                                    value="05" min="01">
                                                                <button class="qty-item-btn qty-item-btn-incr"><i
                                                                        class="fa-solid fa-plus"></i></button>
                                                            </div>
                                                            <a class="rbt-btn rbt-btn-border has-left-icon d-block text-center"
                                                                href="#" data-bs-toggle="modal"
                                                                data-bs-target="#popup-cartModal"><i
                                                                    class="fa-regular fa-cart-shopping"></i> Add To
                                                                Cart</a>
                                                        </div>
                                                        <div class="prd-btn-grp">
                                                            <a class="rbt-btn d-block text-center" href="#">Buy
                                                                Now</a>
                                                        </div>
                                                        <div class="rbt-quick-link-grp mt--12">
                                                            <button class="rbt-quick-link" data-bs-toggle="modal"
                                                                data-bs-target="#compareviewModal" type="button"><i
                                                                    class="fa-sharp fa-regular fa-copy"></i>Compare
                                                                Product</button>
                                                            <button class="rbt-quick-link" data-bs-toggle="modal"
                                                                data-bs-target="#wishlistModal" type="button"><i
                                                                    class="fa-sharp fa-regular fa-heart"></i>Add To
                                                                Wishlist</button>
                                                            <button class="rbt-quick-link" data-bs-toggle="modal"
                                                                data-bs-target="#socialShareModal" type="button"><i
                                                                    class="fa-sharp fa-regular fa-share-nodes"></i>Share</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Component Area -->
                                </div>


                            </div>
                        </div>
                        <!-- End banner part -->

                        <!-- Start slider navigation buttons -->
                        <div class="rbt-swiper-arrow rbt-modal-arrow-left rbt-arrow-gray rbt-arrow-lg">
                            <div class="custom-overflow">
                                <i class="rbt-icon fa-regular fa-arrow-left"></i>
                                <i class="rbt-icon-top fa-regular fa-arrow-left"></i>
                            </div>
                        </div>
                        <div class="rbt-swiper-arrow rbt-modal-arrow-right rbt-arrow-gray rbt-arrow-lg">
                            <div class="custom-overflow">
                                <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                            </div>
                        </div>
                        <!-- End slider navigation buttons -->
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End Quick View Modal Area  -->
    <!-- Start Popup Cart Modal Area  -->
    <div class="rbt-default-modal has-rbt-top-folder-shape modal fade" id="popup-cartModal" tabindex="-1"
        role="dialog" aria-modal="true" aria-labelledby="popup-cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered xxs-size">
            <div class="modal-content">
                <div class="rbt-folder-shape-right-portion">
                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90"
                        fill="none">
                        <path
                            d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z"
                            fill="white"></path>
                    </svg>
                </div>
                <div class="modal-header">
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="rbt-modal-cart rbt-top-folder-shape-wrapper rbt-sidebar-cart">
                    <div class="overflow-hidden position-relative rbt-content-trs-portion">
                        <div class="inner-wrapper">
                            <div class="inner-top">
                                <div class="rbt-cart-header">
                                    <div class="title-section">
                                        <h3 class="title mb--0 h6" id="popup-cartModalLabel"><i
                                                class="fa-sharp fa-regular fa-cart-shopping mr--12"></i> Your cart</h3>
                                    </div>
                                    {{-- <div class="rbt-quick-info-tag d-flex mt--16 rbt-flash-animation">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z" fill="url(#paint0_linear_47_23655)"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z" fill="#FC9502"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z" fill="#FCE202"></path>
                                        <defs>
                                            <lineargradient id="paint0_linear_47_23655" x1="11.9995" y1="22.0148" x2="11.9995" y2="2.01511" gradientunits="userSpaceOnUse">
                                                <stop offset="1" stop-color="#FF4C0D"></stop>
                                                <stop offset="1" stop-color="#FC9502"></stop>
                                            </lineargradient>
                                        </defs>
                                    </svg>
                                    <p>Limited Item, <strong>checkout within <span class="rbt-countdown-cart">10m
                                                00s</span></strong></p>
                                </div> --}}
                                </div>
                                <nav class="side-nav w-100">
                                    <ul class="rbt-minicart-wrapper">
                                        <li class="minicart-item">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/product-img/cart-product/cart-product-01.webp') }}"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title h6"><a href="#">Apple 12inch iPad </a></h3>
                                                <span class="quantity">1x <span class="price">Rs. 359.00</span></span>
                                                <div class="bottom-part">
                                                    <div class="rbt-qty-area">
                                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                                class="fa-solid fa-minus"></i></button>
                                                        <input type="number" class="items-qty-input" value="01"
                                                            min="1">
                                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                    <button class="edit-btn border-0" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#quickviewEditCartModal"><i
                                                            class="fa-regular fa-pen"></i> Edit</button>
                                                </div>
                                            </div>
                                            <div class="close-btn">
                                                <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                                            </div>
                                        </li>

                                        <li class="minicart-item">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/product-img/cart-product/cart-product-02.webp') }}"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title h6"><a href="#">Apple Watch 8 Pro </a></h3>
                                                <span class="quantity">1x <span class="price">Rs. 288.00</span></span>
                                                <div class="bottom-part">
                                                    <div class="rbt-qty-area">
                                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                                class="fa-solid fa-minus"></i></button>
                                                        <input type="number" class="items-qty-input" value="15"
                                                            min="1">
                                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                    <button class="edit-btn border-0" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#quickviewEditCartModal"><i
                                                            class="fa-regular fa-pen"></i> Edit</button>
                                                </div>
                                            </div>
                                            <div class="close-btn">
                                                <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                                            </div>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                            <div class="rbt-minicart-footer mt--16">
                                <div class="minicart-quick-access-area">
                                    <a href="#" class="single-quick-access rbt-note-btn">
                                        <span class="icon"><i class="fa-regular fa-pen"></i></span>
                                        <span class="text">Note</span>
                                    </a>
                                    <span class="hr-sepator"></span>
                                    <a href="#" class="single-quick-access rbt-shipping-btn">
                                        <span class="icon"><i class="fa-regular fa-truck-fast"></i></span>
                                        <span class="text">Shipping</span>
                                    </a>
                                    <span class="hr-sepator"></span>
                                    <a href="#" class="single-quick-access rbt-coupon-btn">
                                        <span class="icon"><i class="fa-regular fa-ticket"></i></span>
                                        <span class="text">Coupon</span>
                                    </a>
                                </div>
                                <hr class="mb--0 mt--16">
                                <div class="rbt-cart-subttotal">
                                    <p>Subtotal (2 items)</p>
                                    <p class="price">Rs. 758.00</p>
                                </div>
                                <div class="rbt-cart-subttotal">
                                    <p>Shipping</p>
                                    <p class="price">Rs. 10.00</p>
                                </div>
                                <hr class="mb--0">
                                <div class="rbt-cart-subttotal">
                                    <p class="subtotal"><strong>Total</strong></p>
                                    <p class="price">Rs. 768.00</p>
                                </div>
                                {{-- <div class="offer-progress-area">
                                <p class="offer-text">Add <strong>Rs. 248.00</strong> More To Get <strong>Free
                                        Shipping</strong></p>
                                <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar w-75"></div>
                                </div>
                            </div> --}}
                                <div class="rbt-minicart-bottom mt--24">
                                    <div class="checkout-btn mt--20">
                                        <a href="checkout-delivery-step-one.html" class="rbt-btn w-100 text-center">
                                            <span class="btn-text">Checkout</span>
                                        </a>
                                    </div>
                                    <div class="share-btn-grp rbt-link-hover">
                                        <a href="cart.html" class="share-btn"><i class="fa-regular fa-pen mr--4"></i>
                                            View
                                            Cart</a>
                                        <button data-bs-toggle="modal" data-bs-target="#socialShareModal"
                                            type="button" class="share-btn"><i
                                                class="fa-sharp fa-solid fa-link mr--4"></i> Share
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rbt-offcanvas-inner-popup">
                            <div class="rbt-offcanvas-inner-popup-card note-popup">
                                <div class="rbt-offcanvas-card-inner">
                                    <h3 class="rbt-title rbt-text-bold h6">
                                        <span class="mr--4"><i class="fa-regular fa-pen"></i></span>
                                        Add note for seller
                                    </h3>
                                    <form>
                                        <div class="rbt-input-field-grp mb--12">
                                            <textarea class="rbt-text-field" name="message"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                        <div class="rbt-btn-group mt--16">
                                            <button
                                                class="rbt-btn rbt-btn-md rbt-btn-primary d-block w-100">Apply</button>
                                            <button
                                                class="rbt-btn rbt-btn-md rbt-btn-naked d-block w-100 mt--8 mb--8 rbt-popup-close-btn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="rbt-offcanvas-inner-popup">
                            <div class="rbt-offcanvas-inner-popup-card shipping-popup">
                                <div class="rbt-offcanvas-card-inner">
                                    <h3 class="rbt-title rbt-text-bold h6">
                                        <span class="mr--4"><i class="fa-light fa-truck-fast"></i></span>
                                        Estimate shipping rates
                                    </h3>
                                    <form>
                                        <div class="rbt-input-field-grp mb--12">
                                            <div
                                                class="rbt-dropdown-select filter-select rbt-modern-select search-by-category">
                                                <select class="w-100 rbt-select-activation" data-live-search="true"
                                                    data-live-search-placeholder="Search City">
                                                    <option>Select your City</option>
                                                    <option>New York</option>
                                                    <option>London</option>
                                                    <option>Paris</option>
                                                    <option>Tokyo</option>
                                                    <option>Dubai</option>
                                                    <option>Singapore</option>
                                                    <option>Sydney</option>
                                                    <option>Berlin</option>
                                                    <option>Toronto</option>
                                                    <option>Los Angeles</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="rbt-input-field-grp mb--12">
                                            <input type="text" placeholder="State / County">
                                        </div>
                                        <div class="rbt-input-field-grp mb--12">
                                            <input type="text" placeholder="City">
                                        </div>
                                        <div class="rbt-input-field-grp">
                                            <input type="text" placeholder="Postcode / ZIP">
                                        </div>
                                        <div class="rbt-btn-group mt--16">
                                            <button class="rbt-btn rbt-btn-md rbt-btn-primary d-block w-100">Calculate
                                                shipping rates</button>
                                            <button
                                                class="rbt-btn rbt-btn-md rbt-btn-naked d-block w-100 mt--8 mb--8 rbt-popup-close-btn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="rbt-offcanvas-inner-popup">
                            <div class="rbt-offcanvas-inner-popup-card coupon-popup">
                                <div class="rbt-offcanvas-card-inner">
                                    <h3 class="rbt-title rbt-text-bold h6">
                                        <span class="mr--4"><i class="fa-regular fa-ticket"></i></span>
                                        Select or input Coupon
                                    </h3>
                                    <div class="rbt-coupon-wrapper rbt-bg-color-white">
                                        <div class="rbt-coupon">
                                            <div class="inner rbt-text-copy-activation">
                                                <div class="left-part">
                                                    <input type="text" value="WELCOME100" readonly=""
                                                        class="rbt-coupon-code-text rbt-has-right-shepe-border rbt-copy-value-field">
                                                </div>
                                                <div class="coupon-details">
                                                    <h2 class="rbt-coupon-info-title b1">UP TO 30% OFF</h2>
                                                    <p class="rbt-coupon-info-sub-title b3 mt--4">For orders over Rs. 9.90
                                                    </p>
                                                    <ul class="rbt-coupon-info-list mt--12">
                                                        <li><span>12/18/2023 14:00 ~ 12/25/2023 14:00</span></li>
                                                        <li><span>The minimum spend for this coupon <strong>Rs.
                                                                    200.00</strong></span></li>
                                                    </ul>
                                                </div>
                                                <button class="copy-icon rbt-round-btn rbt-bg-primary rbt-copy-btn"
                                                    data-tooltip="Copy">
                                                    <i class="fa-sharp fa-regular fa-copy"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="rbt-coupon">
                                            <div class="inner rbt-text-copy-activation">
                                                <div class="left-part">
                                                    <input type="text" value="WELCOME100" readonly=""
                                                        class="rbt-coupon-code-text rbt-has-right-shepe-border rbt-copy-value-field">
                                                </div>
                                                <div class="coupon-details">
                                                    <h2 class="rbt-coupon-info-title b1">UP TO 30% OFF</h2>
                                                    <p class="rbt-coupon-info-sub-title b3 mt--4">For orders over Rs. 9.90
                                                    </p>
                                                    <ul class="rbt-coupon-info-list mt--12">
                                                        <li><span>12/18/2023 14:00 ~ 12/25/2023 14:00</span></li>
                                                        <li><span>The minimum spend for this coupon <strong>Rs.
                                                                    200.00</strong></span></li>
                                                    </ul>
                                                </div>
                                                <button class="copy-icon rbt-round-btn rbt-bg-primary rbt-copy-btn"
                                                    data-tooltip="Copy">
                                                    <i class="fa-sharp fa-regular fa-copy"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="rbt-input-field-grp mt--24">
                                            <p class="b1 mb--12 rbt-text-color-gray-600">If you have coupon code, please
                                                apply it below.</p>
                                            <input type="text" placeholder="Coupon code">
                                        </div>
                                        <div class="rbt-btn-group mt--16">
                                            <button
                                                class="rbt-btn rbt-btn-md rbt-btn-primary d-block w-100">Apply</button>
                                            <button
                                                class="rbt-btn rbt-btn-md rbt-btn-naked d-block w-100 mt--8 mb--8 rbt-popup-close-btn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popup Cart Modal Area  -->
    <!-- Start Quick View Modal Area  -->
    <div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="quickviewEditCartModal" tabindex="-1"
        role="dialog" aria-modal="true" aria-labelledby="quickviewEditCartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rbt-cart-edit-area">

            <div class="modal-content">

                <div class="rbt-folder-shape-right-portion">
                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90"
                        fill="none">
                        <path
                            d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z"
                            fill="white"></path>
                    </svg>
                </div>

                <div class="modal-header">
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="rbt-top-folder-shape-wrapper">
                    <!-- Start Component Area -->
                    <div class="rbt-single-product-area rbt-bg-color-white rbt-content-trs-portion">

                        <div class="rbt-title rbt-modal-title mb--16 h6">Edit Option For You</div>
                        <div class="row row--8 mt_dec--12">
                            <div class="col-md-6 col-12 mt--12">
                                <div class="rbt-cart-product-edit-area">
                                    <a href="#" class="rbt-cart-product-thumb">
                                        <img src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}"
                                            alt="Product Thumbnail">
                                    </a>
                                    <div class="rbt-product-info">
                                        <p class="rbt-card-title h6" id="quickviewEditCartModalLabel"><a
                                                href="#">2021
                                                Apple 12.9-inch iPad Pro Wi-Fi 512GB Gray Space</a></p>
                                        <div class="pricing-part mb--12 mt--0">
                                            <del class="price-text">Rs. 295.00</del>
                                            <span class="price-text">Rs. 179.98</span>
                                        </div>
                                        <div class="rbt-qty-area rbt-qty-sm">
                                            <button class="qty-item-btn qty-item-btn-decr"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <input type="number" class="items-qty-input" value="05"
                                                min="01">
                                            <button class="qty-item-btn qty-item-btn-incr"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mt--12 pl--32">
                                <div class="rbt-single-product-content">

                                    <div class="rbt-info-wrapper d-flex mt--0">
                                        <div class="prd-info-section">
                                            <div class="prd-id-text">
                                                <p class="text-bold">Color:</p>
                                                <div class="rbt-color-select-area">
                                                    <ul
                                                        class="rbt-switcher-color-list rbt-switcher-color-list-lg product-switcher-activation">
                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-one"
                                                                data-switcher-color="#2B2B2B"
                                                                data-src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}"
                                                                data-tooltip="Black" data-tooltip-position="top"
                                                                href="#">
                                                                <div class="rbt-color-circle"></div>
                                                            </a></li>
                                                        <li class="active"><a
                                                                class="rbt-switcher--color tooltips rbt-switcher--color-two"
                                                                data-switcher-color="#cc999d"
                                                                data-src="{{ asset('assets/images/product-single/earphone/earphone-02.webp') }}"
                                                                data-tooltip="Pink" data-tooltip-position="top"
                                                                href="#">
                                                                <div class="rbt-color-circle"></div>
                                                            </a></li>
                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-three"
                                                                data-switcher-color="#9C9B9E"
                                                                data-src="{{ asset('assets/images/product-single/earphone/earphone-04.webp') }}"
                                                                data-tooltip="Dark" data-tooltip-position="top"
                                                                href="#">
                                                                <div class="rbt-color-circle"></div>
                                                            </a></li>
                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-four"
                                                                data-switcher-color="#F2EDE7"
                                                                data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}"
                                                                data-tooltip="White" data-tooltip-position="top"
                                                                href="#">
                                                                <div class="rbt-color-circle"></div>
                                                            </a></li>
                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-five rbt-switcher--disable disabled"
                                                                data-switcher-color="#a09fa4"
                                                                data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}"
                                                                data-tooltip="White" data-tooltip-position="top"
                                                                href="#">
                                                                <div class="rbt-color-circle"></div>
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rbt-info-wrapper d-flex justify-content-between mt--12">
                                        <div class="product-styles-grp d-flex mt--0">
                                            <p class="text-bold title">Size :</p>
                                            <div class="single-prd-select-area rbt-bg-color-brand-50 rbt-radius">
                                                <div class="rbt-modern-select single-prd-select rbt-sm-size">
                                                    <select class="rbt-select-activation">
                                                        <option>Extra Large</option>
                                                        <option>Large</option>
                                                        <option>Medium</option>
                                                        <option>Small</option>
                                                        <option>Extra Small</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rbt-info-wrapper d-flex mt--12">
                                        <div class="product-styles-grp d-flex mt--0">
                                            <p class="text-bold title">Style :</p>
                                            <div class="content d-flex flex-wrap">
                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn active"
                                                    href="#">Headphones Only</a>
                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm disabled"
                                                    href="#">Headphones +
                                                    Charging Stand</a>
                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn"
                                                    href="#">Charging Stand</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <a class="rbt-btn d-block text-center rbt-btn-sm rbt-square-btn has-left-icon mt--24 mt_sm--16"
                                    href="#">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                    Update Cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Component Area -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick View Modal Area  -->
        <!-- Start Coupon Collection Modal Area  -->
    <div class="rbt-default-modal modal fade" id="findstoreModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered xl-size">
            <div class="modal-content p--0">

                <div class="modal-header">
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="rbt-google-map bg-color-white">
                    <iframe class="w-100"
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319"
                        height="600" style="border:0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Coupon Collection Modal Area  -->

    <!-- Start Footer aera -->

@endsection
