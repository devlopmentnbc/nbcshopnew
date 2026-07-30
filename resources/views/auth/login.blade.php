@extends('layouts.app')

@section('title', 'Customer Sign In - Unimart')

@section('content')


<!-- Start Preloader Area  -->
<div class="rbt-preloader">
    <div class="rbt-preloader-inner">
        <svg class="rbt-preloader-cart" role="img" aria-label="Shopping cart line animation" viewbox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                <g class="rbt-preloader-cart-track" stroke="hsla(0,10%,10%,0.1)">
                    <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"></polyline>
                    <circle cx="43" cy="111" r="13"></circle>
                    <circle cx="102" cy="111" r="13"></circle>
                </g>
                <g class="rbt-preloader-cart-lines" stroke="currentColor">
                    <polyline class="rbt-preloader-cart-top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" stroke-dasharray="338 338" stroke-dashoffset="-338"></polyline>
                    <g class="rbt-preloader-cart-wheel1" transform="rotate(-90,43,111)">
                        <circle class="rbt-preloader-cart-wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68"></circle>
                    </g>
                    <g class="rbt-preloader-cart-wheel2" transform="rotate(90,102,111)">
                        <circle class="rbt-preloader-cart-wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68"></circle>
                    </g>
                </g>
            </g>
        </svg>
        <div class="preloader-text">
            <p class="preloader-msg">Gearing up something amazing for you…</p>
            <p class="preloader-msg preloader-msg--last">Still waiting? Magic takes a moment! ✨</p>
        </div>
    </div>
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
                            <img src="{{ asset('assets/images/nbc/logo-nbc2.png') }}" alt="Unimart Logo Images">
                        </a>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>
                <p class="description">Unimart is a E-commerce Template. Worldwide electronics store since 1978.</p>
                <div class="rbt-inner-search-field style-one rbt-search-field-rounded rbt-search-field-sm-width">
                    <input type="text" placeholder="Search for products">
                    <button class="rbt-round-btn search-btn rbt-text-color-gray-500" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
            <div class="rbt-tab rbt-round-shape-tab">
                <ul class="nav nav-tabs mb--0" id="mobile-menuTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="rbt-tab-mobilemenu-1" data-bs-toggle="tab" data-bs-target="#rbt-tab-pane-mobilemenu-1" type="button" role="tab" aria-controls="rbt-tab-pane-mobilemenu-1" aria-selected="true">
                            <i class="fa-solid fa-bars-sort"></i>
                            Menu
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rbt-tab-mobilemenu-2" data-bs-toggle="tab" data-bs-target="#rbt-tab-pane-mobilemenu-2" type="button" role="tab" aria-controls="rbt-tab-pane-mobilemenu-2" aria-selected="false">
                            <i class="fa-sharp fa-regular fa-layer-group"></i>
                            Catagories
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="mobile-menuTabContent">
                    <div class="tab-pane fade show active" id="rbt-tab-pane-mobilemenu-1" role="tabpanel" aria-labelledby="rbt-tab-mobilemenu-1" tabindex="0">
                        <nav class="rbt-mainmenu-nav">
    <ul class="mainmenu">
        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="#!">Home <i class="fa-regular fa-chevron-down"></i></a>
            <!-- Start Mega Menu  -->
<div class="rbt-megamenu rbt-prsentation-megamenu rbt-width-fullscreen">
    <div class="rbt-megamenu-wrapper">
        <div class="container p_sm--0 p_md--0 p_lg--0">
            <div class="row row--12 home-plesentation-wrapper single-dropdown-menu-presentation mt_dec--24 mb_sm--0">

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-1">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-electronics.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-1.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-electronics.html">Electronics One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-2">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-fashion.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-5.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-fashion.html">Fashion One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-3">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-furniture.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-8.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-furniture.html">Furniture One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-4">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-printing-service.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-6.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-printing-service.html">Print Service One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-5">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-cosmetic-beauty.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-2.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-cosmetic-beauty.html">Cosmetic Beauty One</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-6">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-sports.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-9.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-sports.html">Sports One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-7">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-glass.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-3.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-glass.html">Glass One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-8">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-phone-case.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-4.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-phone-case.html">Phone One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-9">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-accessories.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-10.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-accessories.html">Accessories One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

                <!-- Start Single Demo  -->
                <div class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                    <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="home-jewellery.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                            </div>
                            <div class="content">
                                <h2 class="rbt-title h4"><a href="home-jewellery.html">jewellery One</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Demo  -->

            </div>

            <div class="load-demo-btn text-center pt--24 pt_sm--0 pt_lg--0 position-relative">
                <a href="index.html#rbt-demo-presentation-section" class="rbt-btn-grp rbt-has-separator-shape justify-content-center rbt-scroll-trigger fade_in animation-order-2 pb_sm--0">
                    <span class="rbt-btn rbt-btn-single rbt-btn rbt-marquee-btn marquee-auto rbt-btn-md has-primary-overlay has-no-hover-transform">
                        <span data-text="View All The Trending Collection">
                            VIEW ALL DEMOS (81+) New drops every month 🔥
                        </span>
                    </span>
                    <span class="rbt-btn rbt-btn-single animated-icon-btn round-sm defalt-primary-bg p--0">
                        <span class="animated-icon">
                            <svg class="icon_external" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 15.5 15.5">
                                <g class="icon-wrapper">
                                    <path class="icon-rectangle" d="m7.75,0c.41,0,.75.34.75.75s-.34.75-.75.75H3.08c-.87,0-1.58.71-1.58,1.58v9.33c0,.87.71,1.58,1.58,1.58h9.33c.87,0,1.58-.71,1.58-1.58v-4.67c0-.41.34-.75.75-.75s.75.34.75.75v4.67c0,1.7-1.38,3.08-3.08,3.08H3.08c-1.7,0-3.08-1.38-3.08-3.08V3.08C0,1.38,1.38,0,3.08,0h4.67Z" stroke-width="0">
                                    </path>
                                    <path class="icon-arrow-el-one" d="m15.5,0v4.29c0,.41-.34.75-.75.75s-.75-.34-.75-.75V1.5h-2.75c-.38,0-.69-.28-.74-.65v-.1c0-.41.33-.75.74-.75h4.25Z" stroke-width="0" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px 0px;" data-svg-origin="15.5 0" transform="matrix(1,0,0,1,0,0)">
                                    </path>
                                    <path class="icon-arrow-line-one" d="m14.22.22c.29-.29.77-.29,1.06,0,.29.29.29.77,0,1.06L5.95,10.61c-.29.29-.77.29-1.06,0-.29-.29-.29-.77,0-1.06.4-.4.76-.76,1.09-1.09l.47-.47c.37-.37.7-.7,1-1l.34-.34.46-.46.41-.41c.74-.74,1.29-1.29,2.09-2.09l.61-.61c.17-.17.34-.34.53-.53.13-.13.25-.25.36-.36l.59-.59c.08-.08.16-.16.23-.23l.36-.36c.1-.1.19-.19.26-.26l.42-.42s.07-.07.11-.11Z" stroke-width="0" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px 0px;" data-svg-origin="15.4975004196167 0.002499997615814209" transform="matrix(1,0,0,1,0,0)">
                                    </path>
                                    <path class="icon-arrow-el-two" d="m15.5,0v4.29c0,.41-.34.75-.75.75s-.75-.34-.75-.75V1.5h-2.75c-.38,0-.69-.28-.74-.65v-.1c0-.41.33-.75.74-.75h4.25Z" stroke-width="0" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px 0px;" data-svg-origin="15.5 0" transform="matrix(1,0,0,1,0,0)">
                                    </path>
                                    <path class="icon-arrow-line-two" d="m14.22.22c.29-.29.77-.29,1.06,0,.29.29.29.77,0,1.06L5.95,10.61c-.29.29-.77.29-1.06,0-.29-.29-.29-.77,0-1.06.4-.4.76-.76,1.09-1.09l.47-.47c.37-.37.7-.7,1-1l.34-.34.46-.46.41-.41c.74-.74,1.29-1.29,2.09-2.09l.61-.61c.17-.17.34-.34.53-.53.13-.13.25-.25.36-.36l.59-.59c.08-.08.16-.16.23-.23l.36-.36c.1-.1.19-.19.26-.26l.42-.42s.07-.07.11-.11Z" stroke-width="0" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px 0px;" data-svg-origin="15.4975004196167 0.002499997615814209" transform="matrix(1,0,0,1,0,0)">
                                    </path>
                                </g>
                            </svg>
                        </span>
                    </span>
                </a>
                <span class="rbt-overlay-counter counter-md rbt-scroll-trigger fade_in animation-order-4">
                    <span class="odometer" data-count="100">00</span>
                    <span class="counter-suffix">+</span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- End Mega Menu  -->
        </li>

        <li class="with-rbt-megamenu has-menu-child-item">
            <a href="#!">Shop <i class="fa-regular fa-chevron-down"></i></a>
            <!-- Start Mega Menu  -->
<div class="rbt-megamenu grid-item-3 pl_sm--0 pl_md--0 pl_lg--0">
    <div class="rbt-megamenu-wrapper">
        <div class="row d-none d-xl-flex">
            <div class="col-lg-12">
                <div class="mega-top-banner bg-two">
                    <div class="rbt-banner-inner justify-content-start">
                        <div class="rbt-banner-content">
                            <h2 class="title">Buy One and Get 50% Off the Second Purchase Now</h2>
                            <p class="b3 desc">Send us your idea, it may appear on Unimart.</p>
                        </div>
                        <div class="pricing-action d-flex flex-column align-items-center rbt-gap--8">
                            <div class="rbt-pricing-part d-flex">
                                <span class="rbt-price-text offer-price">Rs. 189.00</span>
                                <del class="rbt-dis-price-text">Rs. 295.00</del>
                            </div>
                            <a class="rbt-btn rbt-btn-sm rbt-btn-black" href="product-single-default.html">View
                                Details</a>
                        </div>
                        <a href="#" class="product-img position-bottom"><img src="{{ asset('assets/images/splash/menu-banner/menu-prd-01.webp') }}" alt="Eccommerce Product"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row--16">
            <div class="col-lg-12 col-xl-6 col-xxl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                <p class="rbt-short-title h5">Shop Pages</p>
                <ul class="mega-menu-item">
                    <li>
                        <a href="{{ route('shop') }}">
                            Shop Default
                            <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
                                SHOP
                            </div>
                        </a>
                    </li>
                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                    <li><a href="shop-filter-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                    <li><a href="shop-filter-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                    <li><a href="shop-sticky-sidebar.html">Sticky Sidebar Shop
                            <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                POPULAR
                            </div>
                        </a></li>
                    <li><a href="shop-collapsible-sidebar.html">Collapse Sidebar Shop</a></li>
                    <li><a href="shop-scroll-sidebar.html">Scroll Sidebar Shop</a></li>
                    <li><a href="shop-loadmore.html">Load More Button</a></li>
                    <li><a href="shop-sm-categories.html">Shop Small Categories</a></li>
                    <li><a href="products-inside-border-column-shop.html">Bordered inside
                            Products Shop</a></li>
                    <li><a href="products-show-rating-shop.html">
                            Products Show Rating
                            <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded">
                                HOT
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12 col-xl-6 col-xxl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                <p class="rbt-short-title h5">Custom Pages</p>
                <ul class="mega-menu-item">
                    <li><a href="shop-filter-grid-two.html">Two Columns</a></li>
                    <li><a href="shop-filter-grid-three.html">Three Columns</a></li>
                    <li><a href="shop-filter-grid-four.html">Four Columns
                            <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded ml--8">
                                POPULAR
                            </div>
                        </a></li>
                    <li><a href="shop-wider.html">Three Columns Wide</a></li>
                    <li><a href="shop-wider-four.html">
                            Four Columns
                            <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded ml--8">
                                POPULAR
                            </div>
                        </a></li>
                    <li><a href="shop-wider-five.html">Five Columns Wide</a></li>

                    <li><a href="shop-wider-six.html">Six Columns Wide</a></li>

                    <li><a href="shop-featured.html">Featured Products</a></li>
                    <li><a href="shop-best-prds.html">Best Selling Products</a></li>
                    <li><a href="shop-collapse-filter-top.html">Hidden Side Bar Shop</a></li>
                    <li><a href="products-show-countdown-shop-style-two.html">Products Show
                            Countdown Two</a>
                    </li>
                    <li><a href="products-even-list-shop.html">Even List Products</a></li>
                </ul>
            </div>
            <div class="col-lg-12 col-xl-6 col-xxl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                <p class="rbt-short-title h5">Custom Pages</p>
                <ul class="mega-menu-item">
                    <li><a href="shop-no-page-heading.html">Shop No Page Heading</a></li>
                    <li><a href="shop-only-category.html">Shop Only Category</a></li>
                    <li><a href="shop-offcanvas-sidebar-left.html">Shop offcanvas Left</a></li>
                    <li><a href="shop-offcanvas-sidebar-right.html">Shop offcanvas Right</a></li>
                    <li><a href="shop-offcanvas-sidebar-top.html">Shop offcanvas top</a></li>
                    <li><a href="shop-offcanvas-sidebar-bottom.html">Shop offcanvas Bottom</a></li>
                    <li><a href="shop-collapse-filter-bottom.html">Shop Filter Collapse Bottom</a></li>
                    <li><a href="shop-collapse-filter-left.html">Shop Filter Collapse Left</a></li>
                    <li><a href="shop-collapse-filter-right.html">Shop Filter Collapse Right</a></li>
                    <li><a href="products-show-progressbar-shop.html">Products Show
                            Progress-bar</a></li>
                    <li><a href="products-show-countdown-shop.html">Products Show
                            Countdown</a></li>
                    <li><a href="#!">Infinite Scroll
                            <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                Coming Soon
                            </div>
                        </a>
                    </li>
                    <li><a href="#!">Shop Classic
                            <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                Coming Soon
                            </div>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Mega Menu  -->
        </li>

        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="#!">Pages <i class="fa-regular fa-chevron-down"></i></a>
            <!-- Start Mega Menu  -->
<div class="rbt-megamenu rbt-width-fullscreen mega-has-bg-img mega-bg-one p-0 ">
    <!-- Start Mega Menu  -->
    <div class="rbt-megamenu-wrapper bg-transparent">
        <div class="wrapper">
            <div class="row row--12 mt_dec--12">
                <div class="col-xl-9">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="row">
                            <div class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">Inner Pages</p>
                                <ul class="mega-menu-item">
                                    <li><a href="contact.html">Contact Page One</a></li>
                                    <li><a href="about.html">About Us One</a></li>
                                    <li><a href="faq-page-01.html">FAQs One</a></li>
                                    <li><a href="contact-two.html">Contact Page Two</a></li>
                                    <li><a href="about-two.html">About Us Two</a></li>
                                    <li><a href="contact-four.html">Contact Page Four</a></li>
                                    <li><a href="faq-page-02.html">FAQs Two</a></li>
                                    <li><a href="find-store.html">Find A Store</a></li>
                                    <li><a href="compare-product.html">Compare Products</a></li>
                                    <li><a href="compare-empty-page.html">Compare Empty</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">Inner Pages</p>
                                <ul class="mega-menu-item">
                                    <li><a href="team-page-one.html">Team One</a></li>
                                    <li><a href="team-page-two.html">Team Two</a></li>
                                    <li><a href="team-page-three.html">Team Three</a></li>
                                    <li><a href="team-page-four.html">Team Four</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="error-404.html">Error 404</a></li>
                                    <li><a href="error-maintanance.html">Maintanace</a></li>
                                    <li><a href="portfolio-default.html">Portfolio Default</a></li>
                                    <li><a href="portfolio-grid-layout-full-width.html">Portfolio Full Width</a></li>
                                    <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">Inner Pages</p>
                                <ul class="mega-menu-item">
                                    <li><a href="blog-default.html">Blog Default</a></li>
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                    <li><a href="blog-modern.html">Blog Modern</a></li>
                                    <li><a href="blog-infinite-scroll.html">Blog Infinite Scroll</a></li>
                                    <li><a href="blog-load-more.html">Blog load-more</a></li>
                                    <li><a href="blog-single.html">Blog Details</a></li>
                                    <li><a href="brand-list.html">Brand List</a></li>
                                    <li><a href="#!">Blog Timeline
                                            <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                Coming
                                            </div>
                                        </a></li>
                                    <li><a href="#!">Blog Gallery
                                            <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                Coming
                                            </div>
                                        </a></li>

                                </ul>
                            </div>
                            <div class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">Shop User Pages</p>
                                <ul class="mega-menu-item">
                                    <li><a href="my-order-history.html">Order History</a></li>
                                    <li><a href="my-wishlist.html">Wishlist</a></li>
                                    <li><a href="my-payment-methods.html">Payment Methods</a></li>
                                    <li><a href="account-info.html">Personal info</a></li>
                                    <li><a href="account-notifications.html">Notifications</a></li>
                                    <li><a href="help-center.html">User Help Center</a></li>
                                    <li><a href="terms-policy.html">Terms and conditions</a></li>
                                    <li><a href="signin.html">Sign In</a></li>
                                    <li><a href="signup.html">Sign Up</a></li>
                                    <li><a href="#!">Membership Details
                                            <div class="rbt-product-badge rbt-product-badge-bg-success border-rounded">
                                                Coming
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">E-commerce</p>
                                <ul class="mega-menu-item">
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="return-policy.html">
                                            Return Policy
                                            <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                New
                                            </div>
                                        </a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="checkout-delivery-step-one.html">Checkout Page</a></li>
                                    <li><a href="checkout-delivery-step-two.html">Checkout Delivary Info</a></li>
                                    <li><a href="checkout-payment.html">Checkout Payment</a></li>
                                    <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                    <li><a href="checkout-thankyou.html">Thank You</a></li>
                                    <li><a href="categories-list.html">Categories List</a></li>
                                    <li><a href="offer-list-page.html">Offer List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr class="rbt-separator rbt-separator-gray200 mb--16 mt--16 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                            </div>
                            <div class="col-lg-12">
                                <ul class="rbt-nav-brand-list liststyle d-flex justify-content-xl-between">
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-01.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-02.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-03.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-04.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-05.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-06.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-07.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-01.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-02.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                    <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-03.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mega Menu  -->
</div>
<!-- End Mega Menu  -->
        </li>

        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="#!">Elements <i class="fa-regular fa-chevron-down"></i></a>
            <!-- Start Mega Menu  -->
<div class="rbt-megamenu container pl_sm--0 pl_md--0 pl_lg--0">
    <div class="rbt-megamenu-wrapper">
        <div class="row row--12 d-flex justify-content-between">
            <div class="col-xl-9">
                <div class="h-100 d-flex flex-column justify-content-between">
                    <div class="row row--12">
                        <div class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                            <p class="rbt-short-title h5">Base Elements</p>
                            <ul class="mega-menu-item">
                                <li><a href="element-titles.html">Title Styles</a></li>
                                <li><a href="element-carousels.html">Carosels Styles</a></li>
                                <li><a href="element-sliders.html">Sliders Styles</a></li>
                                <li><a href="element-product-banner.html">Banner Styles</a></li>
                                <li><a href="element-button.html">Button Styles</a></li>
                                <li><a href="element-brands.html">Brands Styles</a></li>
                                <li><a href="element-list-styles.html">List Styles</a></li>
                                <li><a href="#!">Icon Box Styles
                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                            Coming
                                        </div>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                            <p class="rbt-short-title h5">Template Elements</p>
                            <ul class="mega-menu-item">
                                <li><a href="element-hotspot-styles.html">Hotspot Styles</a></li>
                                <li><a href="element-countdown-styles.html">Countdown Styles</a></li>
                                <li><a href="element-insta-post.html">Instagram Posts</a></li>
                                <li><a href="element-products.html">Product Card Styles</a></li>
                                <li><a href="element-catagories-style.html">Catagories Card Styles</a></li>
                                <li><a href="element-video-styles.html">Video Styles</a></li>
                                <li><a href="element-header-styles.html">Header Styles</a></li>
                                <li><a href="element-footer-styles.html">Footer Styles</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                            <p class="rbt-short-title h5">Template Elements</p>
                            <ul class="mega-menu-item">
                                <li><a href="element-table-styles.html">Table Styles</a></li>
                                <li><a href="element-social-buttons.html">Social Buttons</a></li>
                                <li><a href="element-image-gallary.html">Image Gallary</a></li>
                                <li><a href="element-team-styles.html">Team Card Styles</a></li>
                                <li><a href="element-accordion-styles.html">Accordion Styles</a></li>
                                <li><a href="element-portfolio-styles.html">PortFolio Card Styles</a></li>
                                <li><a href="element-blog-styles.html">Blog Card Styles</a></li>
                                <li><a href="element-review-card.html">Review Cards</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                            <p class="rbt-short-title h5">E-Commerce</p>
                            <ul class="mega-menu-item">
                                <li><a href="element-recent-products.html">Recent Products</a></li>
                                <li><a href="element-featured-products.html">Featured Products</a></li>
                                <li><a href="element-best-selling-products.html">Best Selling Products</a></li>
                                <li><a href="element-single-product.html">Single Product</a></li>
                                <li><a href="element-sale-products.html">Sale Products</a></li>
                                <li><a href="element-pricing.html">Pricing Styles</a></li>
                                <li><a href="element-cart.html">Cart Styles</a></li>
                                <li><a href="#">Order Tracking
                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                            Coming
                                        </div>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row row--12 d-none d-xl-flex">
                        <div class="col-12">
                            <hr class="rbt-separator rbt-separator-gray200 mb--16 mt--16 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                        </div>
                        <div class="col-lg-12">
                            <ul class="rbt-nav-brand-list liststyle d-flex justify-content-xl-between">
                                <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-01.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-02.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-03.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-04.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-05.webp') }}" alt="Ecommerce Brand Image"></a></li>
                                <li><a href="shop-by-brands.html"><img src="{{ asset('assets/images/brands/brand-a-06.webp') }}" alt="Ecommerce Brand Image"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-two">
                    <div class="mega-top-banner">
                        <div class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                            <div class="rbt-banner-content">
                                <h2 class="title rbt-text-color-white">New Aurora Watch</h2>
                                <p class="b3 desc rbt-text-color-gray-200">Send your idea, appear Unimart.</p>
                            </div>
                            <a class="rbt-btn rbt-btn-sm" href="#">View Details</a>
                            <a href="#" class="product-img position-bottom mt--24"><img src="{{ asset('assets/images/splash/menu-banner/menu-prd-03-lg.webp') }}" alt="Eccommerce Product"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Mega Menu  -->
        </li>

        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="#!">Core Features <i class="fa-regular fa-chevron-down"></i></a>
            <!-- Start Mega Menu  -->
<div class="rbt-megamenu p-0 container">
    <!-- Start Mega Menu  -->
    <div class="rbt-megamenu-wrapper p--0">
        <div class="wrapper">
            <div class="row row--0 mt_dec--32">
                <div class="col-xl-8 mt--24 rbt-scroll-trigger zoom_in animation-order-2">
                    <div class="rbt-inner-menu-wrapper p--24 p_sm--0 p_md--0 p_lg--0">
                        <div class="row row-12 mt_dec--16">
                            <div class="col-12 col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">Ultimate User Experience</p>
                                <ul class="mega-menu-item">
                                    <li><a href="customize-options.html">Easy to Customize Codes</a></li>
                                    <li><a href="page-customizability.html">Highly Customizable Elements</a></li>
                                    <li><a href="performance.html">Fast Performance
                                            <div class="rbt-product-badge rbt-product-badge-bg-red border-rounded">
                                                Hot
                                            </div>
                                        </a></li>
                                    <li><a href="header-builder.html">Ultimate Header Layouts</a></li>
                                    <li><a href="footer-builder.html">Excessive Footer Variation</a></li>
                                    <li><a href="advanced-megamenu.html">Advanced Mega Menu</a></li>
                                    <li><a href="popup-builder.html">Popup & Sidebar Search</a></li>
                                    <li><a href="boost-features.html">All Boost Sales Features
                                            <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                New
                                            </div>
                                        </a></li>
                                    <li><a href="mobile-first.html">Mobile-first Experience</a></li>
                                    <li><a href="#!">User Feedback
                                            <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                Coming
                                            </div>
                                        </a></li>
                                    <li><a href="#!">Seamless Integration
                                            <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                Coming
                                            </div>
                                        </a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">Flexible Shopping</p>
                                <ul class="mega-menu-item">
                                    <li><a href="product-filtering.html">Smart Product Filtering</a></li>
                                    <li><a href="variant-switcher.html">Variant Swatches
                                            <div class="rbt-product-badge rbt-product-badge-bg-secondary border-rounded">
                                                Fully Ready
                                            </div>
                                        </a></li>
                                    <li><a href="compare-table-builder.html">Product Compare</a></li>
                                    <li><a href="wishlist-builder.html">WishLists Builder</a></li>
                                    <li><a href="quick-view.html">Quick View</a></li>
                                    <li><a href="flash-sell-management.html">Flash Sales Management</a></li>
                                    <li><a href="cart-builder.html">Cart Upsell
                                            <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                New
                                            </div>
                                        </a></li>
                                    <li><a href="size-chart-builder.html">Size Chart Variation</a></li>
                                    <li><a href="sticky-cart-builder.html">Sticky Add To Cart</a></li>
                                    <li><a href="product-display.html">Product Video & 3D View</a></li>
                                    <li><a href="multi-step-checkout.html">Multi-Step Checkout</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                <p class="rbt-short-title h5">Boost Sales</p>
                                <ul class="mega-menu-item">
                                    <li><a href="notifications.html">Back To Stock Notification</a></li>
                                    <li><a href="sales-popup.html">Sales Popup</a></li>
                                    <li><a href="pre-order.html">Pre Order</a></li>
                                    <li><a href="backorder.html">Backorder</a></li>
                                    <li><a href="partial-payment.html">Partial Payment</a></li>
                                    <li><a href="shareable-cart.html">Shareable Cart</a></li>
                                    <li><a href="bulk-amount-purchase.html">Bulk Amount Purchase</a></li>
                                    <li><a href="stock-progressbar.html">Stock Progress Bar</a></li>
                                    <li><a href="sale-push-notification.html">Sales Push Notification</a></li>
                                    <li><a href="offer-management.html">Special Offers Management</a></li>
                                    <li><a href="free-shipping.html">Free Shipping Threshold</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mt--24 single-mega-item rbt-scroll-trigger zoom_in animation-order-2">
                    <img class="h-100" src="{{ asset('assets/images/header-bg/megamenu-banner-hr-01.webp') }}" alt="Eccommerce Banner">
                </div>
            </div>
        </div>
    </div>
    <!-- End Mega Menu  -->
</div>
<!-- End Mega Menu  -->
        </li>

        <li class="has-dropdown position-relative">
            <a href="#!">More <i class="fa-regular fa-chevron-down"></i></a>
            <ul class="submenu">
                <li><a href="docs/index.htm">Documentation</a></li>
                <li><a href="https://www.youtube.com/@rainbow-themes/videos">Video Tutorials</a></li>
                <li>
                    <a href="https://support.rainbowit.net/support/login">
                        Support Center
                        <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
                            24/7
                        </div>
                    </a>
                </li>
                <li><a href="docs/doc-changelog.html">Change Log</a></li>
                <li><a href="https://rainbowthemes.net/contact/">Contact Us</a></li>
                <li><a href="https://rainbowthemes.net/faqs/">FAQ</a></li>
                <li><a href="https://rainbowthemes.net/services/">Customization</a></li>
            </ul>
        </li>
    </ul>
</nav>
                    </div>
                    <div class="tab-pane fade" id="rbt-tab-pane-mobilemenu-2" role="tabpanel" aria-labelledby="rbt-tab-mobilemenu-2" tabindex="0">
                        <nav class="rbt-mainmenu-nav">
    <ul class="mainmenu">
        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="shop-by-categories.html">
                <span><i class="rbt-catagories-icon mr--8 fa-regular fa-house-chimney"></i></span>Home & Garden
                <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
            </a>
            <!-- Start Mega Menu  -->
            <div class="rbt-megamenu grid-item-5 pl_sm--0 pl_md--0 pl_lg--0">
                <div class="container p_sm--0 p_md--0 p_lg--0">
                    <div class="rbt-megamenu-wrapper">
                        <!-- Start Card Area -->
                        <div class="row row--12">
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <p class="rbt-short-title h5">Home & Garden</p>
                                <ul class="mega-menu-item">
                                    <li><a href="shop-by-category.html">Furniture</a></li>
                                    <li><a href="shop-by-category.html">Living Room Sets</a></li>
                                    <li><a href="shop-by-category.html">Sofas & Couches</a></li>
                                    <li><a href="shop-by-category.html">Coffee Tables</a></li>
                                    <li><a href="shop-by-category.html">Bedroom Furniture</a></li>
                                    <li><a href="shop-by-category.html">Mattresses & Bedding</a></li>
                                    <li><a href="shop-by-category.html">Wardrobes & Storage</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <p class="rbt-short-title h5">More Home & Garden</p>
                                <ul class="mega-menu-item">
                                    <li><a href="shop-by-category.html">Home Decor</a></li>
                                    <li><a href="shop-by-category.html">Clocks & Mirrors</a></li>
                                    <li><a href="shop-by-category.html">Curtains & Blinds</a></li>
                                    <li><a href="shop-by-category.html">Rugs & Carpets</a></li>
                                    <li><a href="shop-by-category.html">Lighting & Lamps</a></li>
                                    <li><a href="shop-by-category.html">Outdoor Furniture</a></li>
                                    <li><a href="shop-by-category.html">BBQ & Grills</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <div class="rbt-menu-offer-card">
                                    <div class="mega-top-banner rbt-bg-color-extra-six">
                                        <div class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                                            <div class="rbt-banner-content">
                                                <h2 class="title">All For Garden</h2>
                                                <p class="b3 desc">Send your idea, appear Unimart.</p>
                                            </div>
                                            <a class="rbt-btn rbt-btn-sm rbt-btn-black" href="product-single-default.html">View Details</a>
                                            <a href="#" class="product-img position-bottom mt--24"><img src="{{ asset('assets/images/splash/menu-banner/menu-prd-garden.webp') }}" alt="Eccommerce Product"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card Area -->
                    </div>
                </div>
            </div>
            <!-- End Mega Menu  -->
        </li>

        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="shop-by-categories.html">
                <span><i class="rbt-catagories-icon mr--8 fa-regular fa-mobile-notch"></i></span>Smart Phones
                <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
            </a>
            <!-- Start Mega Menu  -->
            <div class="rbt-megamenu grid-item-5 pl_sm--0 pl_md--0 pl_lg--0">
                <div class="container p_sm--0 p_md--0 p_lg--0">
                    <div class="rbt-megamenu-wrapper">
                        <!-- Start Card Area -->
                        <div class="row row--12">
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <p class="rbt-short-title h5">Smart Phones</p>
                                <ul class="mega-menu-item">
                                    <li><a href="shop-by-category.html">Latest Models</a></li>
                                    <li><a href="shop-by-category.html">5G Phones</a></li>
                                    <li><a href="shop-by-category.html">Android Phones</a></li>
                                    <li><a href="shop-by-category.html">iPhones</a></li>
                                    <li><a href="shop-by-category.html">Gaming Phones</a></li>
                                    <li><a href="shop-by-category.html">Budget Phones</a></li>
                                    <li><a href="shop-by-category.html">Accessories</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <p class="rbt-short-title h5">Tablets & Accessories</p>
                                <ul class="mega-menu-item">
                                    <li><a href="shop-by-category.html">Latest Tablets</a></li>
                                    <li><a href="shop-by-category.html">Android Tablets</a></li>
                                    <li><a href="shop-by-category.html">iPads</a></li>
                                    <li><a href="shop-by-category.html">Tablet Keyboards</a></li>
                                    <li><a href="shop-by-category.html">Stylus Pens</a></li>
                                    <li><a href="shop-by-category.html">Screen Protectors</a></li>
                                    <li><a href="shop-by-category.html">Tablet Cases</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-two">
                                    <div class="mega-top-banner">
                                        <div class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                                            <div class="rbt-banner-content">
                                                <h2 class="title rbt-text-color-white">Apple 16 Pro</h2>
                                                <p class="b3 desc rbt-text-color-gray-200">Send your idea,
                                                    appear Unimart.</p>
                                            </div>
                                            <a class="rbt-btn rbt-btn-sm" href="#">View Details</a>
                                            <a href="#" class="product-img position-bottom mt--24"><img src="{{ asset('assets/images/splash/menu-banner/menu-prd-apple.webp') }}" alt="Eccommerce Product"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card Area -->
                    </div>
                </div>
            </div>
            <!-- End Mega Menu  -->
        </li>
        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="shop-by-categories.html">
                <span><i class="rbt-catagories-icon mr--8 fa-regular fa-desktop"></i></span>Electronics Gadgets
                <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
            </a>
            <!-- Start Mega Menu  -->
            <div class="rbt-megamenu grid-item-5 pl_sm--0 pl_md--0 pl_lg--0">
                <div class="container p_sm--0 p_md--0 p_lg--0">
                    <div class="rbt-megamenu-wrapper">
                        <!-- Start Card Area -->
                        <div class="row row--12">
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <p class="rbt-short-title h5">Wearable Tech</p>
                                <ul class="mega-menu-item">
                                    <li><a href="shop-by-category.html">Smartwatches</a></li>
                                    <li><a href="shop-by-category.html">Fitness Trackers</a></li>
                                    <li><a href="shop-by-category.html">VR & AR Headsets</a></li>
                                    <li><a href="shop-by-category.html">Smart Glasses</a></li>
                                    <li><a href="shop-by-category.html">Sleep Trackers</a></li>
                                    <li><a href="shop-by-category.html">Wearable Cameras</a></li>
                                    <li><a href="shop-by-category.html">Wireless Earbuds</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <p class="rbt-short-title h5">Smart Home & Office</p>
                                <ul class="mega-menu-item">
                                    <li><a href="shop-by-category.html">Smart Speakers</a></li>
                                    <li><a href="shop-by-category.html">Smart Plugs & Lights</a></li>
                                    <li><a href="shop-by-category.html">Home Security Systems</a></li>
                                    <li><a href="shop-by-category.html">Streaming Devices</a></li>
                                    <li><a href="shop-by-category.html">External Monitors</a></li>
                                    <li><a href="shop-by-category.html">Portable Projectors</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                <div class="rbt-menu-offer-card rbt-bg-color-brand-50 rbt-rounded--12">
                                    <div class="mega-top-banner">
                                        <div class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                                            <div class="rbt-banner-content">
                                                <h2 class="title">Straps of Colors</h2>
                                                <p class="b3 desc">Send your idea, appear Unimart.</p>
                                            </div>
                                            <a class="rbt-btn rbt-btn-sm rbt-btn-black" href="product-single-default.html">View Details</a>
                                            <a href="#" class="product-img position-bottom mt--24"><img src="{{ asset('assets/images/splash/menu-banner/menu-prd-02-lg.webp') }}" alt="Eccommerce Product"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card Area -->
                    </div>
                </div>
            </div>
            <!-- End Mega Menu  -->
        </li>
        <li>
            <a href="shop-by-categories.html">
                <span><i class="rbt-catagories-icon mr--8 fa-regular fa-shirt"></i></span>Fashion Wear
            </a>
        </li>
        <li>
            <a href="shop-by-categories.html">
                <span><i class="rbt-catagories-icon mr--8 fa-regular fa-camera"></i></span>Cameras &amp; Photo
            </a>
        </li>
        <li>
            <a href="shop-by-categories.html">
                <span><i class="rbt-catagories-icon mr--8 fa-regular fa-cauldron"></i></span>Cooking Items
            </a>
        </li>
        <li>
            <a href="shop-by-categories.html">
                <span><i class="rbt-catagories-icon mr--8 fa-regular fa-heart-pulse"></i></span>Health &amp; Beauty
            </a>
        </li>
        <li>
            <a href="categories-list.html">
                View All Categories
            </a>
        </li>
    </ul>
</nav>
                    </div>
                </div>
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
                                    <img src="{{ asset('assets/images/nbc/logo-nbc2.png') }}" alt="Unimart Logo">
                                </a>
                            </div>
                            <button class="rbt-sidebar-close-btn">
                                <i class="fa-sharp fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="rbt-access-box rbt-scroll-trigger fade_in animation-order-1 rbt-access-box-has-bg-hover rbt-access-box-has-bg-hover-white d-inline-block">
                            <a href="#!" class="rbt-access-box-wrapper" data-bs-toggle="modal" data-bs-target="#signinModal">
                                <div class="rbt-round-btn rbt-bg-color-brand-300 rbt-text-color-primary has-rbt-sm-fsize">
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

                    <div class="rbt-sidebar-tabs-wrapper">
                        <div class="rbt-sidebar-tabs-inner">
                            <!-- Start tabs -->
                            <ul class="rbt-sidebar-sub-categories nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <li>
                                    <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-1" data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-1" type="button" role="tab" aria-controls="rbt-nav-pill-1" aria-selected="true">
                                        <span class="rbt-round-btn">
                                            <i class="fa-regular fa-camera"></i>
                                        </span>
                                        <span class="rbt-content">
                                            <span class="rbt-sub-category-title">
                                                <span>Camera & Photo</span>
                                            </span>
                                            <span class="description">Popular Camera & Photo accessories</span>
                                        </span>
                                        <span class="icon">
                                            <i class="fa-regular fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </li>
                                <li>
                                    <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-2" data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-2" type="button" role="tab" aria-controls="rbt-nav-pill-2" aria-selected="false">
                                        <span class="rbt-round-btn">
                                            <i class="fa-regular fa-watch-apple"></i>
                                        </span>
                                        <span class="rbt-content">
                                            <span class="rbt-sub-category-title">
                                                <span>All Watches</span>
                                                <span class="rbt-product-badge rbt-product-badge-bg-primary">EXCLUSIVE</span>
                                            </span>
                                            <span class="description">Pages with a demonstration
                                                of Smartwatches</span>
                                        </span>
                                        <span class="icon">
                                            <i class="fa-regular fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </li>
                                <li>
                                    <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-3" data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-3" type="button" role="tab" aria-controls="rbt-nav-pill-3" aria-selected="false">
                                        <span class="rbt-round-btn">
                                            <i class="fa-sharp fa-regular fa-camcorder"></i>
                                        </span>
                                        <span class="rbt-content">
                                            <span class="rbt-sub-category-title">
                                                <span>TVs, Audio-Video</span>
                                            </span>
                                            <span class="description">Top TVs, Audio-Videothe most famous brands</span>
                                        </span>
                                        <span class="icon">
                                            <i class="fa-regular fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </li>
                                <li>
                                    <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-4" data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-4" type="button" role="tab" aria-controls="rbt-nav-pill-4" aria-selected="false">
                                        <span class="rbt-round-btn">
                                            <i class="fa-light fa-game-console-handheld"></i>
                                        </span>
                                        <span class="rbt-content">
                                            <span class="rbt-sub-category-title">
                                                <span>Gaming</span>
                                                <span class="rbt-product-badge rbt-bg-color-green">TRENDING</span>
                                            </span>
                                            <span class="description">Accessories for Games from
                                                the best brands</span>
                                        </span>
                                        <span class="icon">
                                            <i class="fa-regular fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </li>
                                <li>
                                    <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-5" data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-5" type="button" role="tab" aria-controls="rbt-nav-pill-5" aria-selected="false">
                                        <span class="rbt-round-btn">
                                            <i class="fa-sharp fa-regular fa-headphones"></i>
                                        </span>
                                        <span class="rbt-content">
                                            <span class="rbt-sub-category-title">
                                                <span>Headphones & Music</span>
                                            </span>
                                            <span class="description">Catalog best Headphones
                                                & Music here now</span>
                                        </span>
                                        <span class="icon">
                                            <i class="fa-regular fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </li>
                                <li>
                                    <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-6" data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-6" type="button" role="tab" aria-controls="rbt-nav-pill-6" aria-selected="false">
                                        <span class="rbt-round-btn">
                                            <i class="fa-sharp fa-regular fa-blender-phone"></i>
                                        </span>
                                        <span class="rbt-content">
                                            <span class="rbt-sub-category-title">
                                                <span>Appliances</span>
                                                <span class="rbt-product-badge rbt-bg-color-danger">HOT</span>
                                            </span>
                                            <span class="description">Full list links of all
                                                House Appliances active</span>
                                        </span>
                                        <span class="icon">
                                            <i class="fa-regular fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </li>
                            </ul>
                            <!-- End tabs -->

                            <!-- Start quick links -->
                            <div class="rbt-sidebar-quick-links-part">
                                <div class="rbt-sidebar-bottom-inner">
                                    <hr class="rbt-separator rbt-separator-gray200 mb--24">
                                    <nav class="rbt-sidebar-nav">
                                        <h2 class="rbt-sub-category-title h4">
                                            <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Quick Links
                                                <span class="icon"><i class="fa-regular fa-chevron-down"></i></span>
                                            </a>
                                        </h2>
                                        <div class="collapse" id="collapseExample">
                                            <ul class="rbt-sidebar-quick-links">
                                                <li><a href="about.html">About us</a></li>
                                                <li><a href="#">Reviews</a></li>
                                                <li><a href="#">Delivery & payment</a></li>
                                                <li><a href="blogs.html">Blog Articles</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                    <hr class="rbt-separator rbt-separator-gray200 mb--24 mt--24">
                                    <nav class="rbt-sidebar-nav">
                                        <h2 class="rbt-sub-category-title h4">
                                            <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                                More Links
                                                <span class="icon"><i class="fa-regular fa-chevron-down"></i></span>
                                            </a>
                                        </h2>
                                        <div class="collapse" id="collapseExample2">
                                            <ul class="rbt-sidebar-quick-links">
                                                <li><a href="contact.html">Contacts</a></li>
                                                <li><a href="#">Information</a></li>
                                                <li><a href="terms-policy.html">Terms & Conditions</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <!-- End quick links -->
                        </div>
                    </div>

                    <!-- Start sidebar footer -->
                    <div class="rbt-sidebar-left-content-footer">
                        <div class="rbt-sidebar-contact-area">
                            <div class="rbt-sidebar-contact-inner rbt-link-hover">
                                <p class="rbt-contact-text">Boston, 44 Main street</p>
                                <a class="rbt-contact-links" href="tel:+1(917)722-7425">+1(917)722-7425 (the call is
                                    free)</a>
                                <p class="rbt-contact-text mt--12">Mon-Sun 9.00 - 18.00</p>
                                <a class="rbt-contact-links" href="/cdn-cgi/l/email-protection#6206070f0d22071a030f120e074c010d0f"><span class="__cf_email__" data-cfemail="debabbb3b19ebba6bfb3aeb2bbf0bdb1b3">[email&#160;protected]</span></a>
                                <a class="rbt-contact-links d-block" href="find-store.html">View on map</a>
                            </div>
                        </div>
                    </div>
                    <!-- End sidebar footer -->

                </div>
            </div>

            <div class="rbt-sidebar-right-content">
                <div class="rbt-sidebar-right-inner">

                    <!-- Start tab content -->
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- Start single Category Tab content -->
                        <div class="rbt-tab-content tab-pane fade show active" id="rbt-nav-pill-1" role="tabpanel" aria-labelledby="rbt-tab-cat-sidebar-1" tabindex="0">
                            <div class="rbt-sub-category-products">
    <div class="rbt-category-products-inner">

        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-7.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Action Camera</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Sports Cameras</a></li>
                <li><a href="shop-by-category.html">Underwater Cameras</a></li>
                <li><a href="shop-by-category.html">360 Cameras</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-8.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Camera lenses</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">VR Cameras</a></li>
                <li><a href="shop-by-category.html">Panoramic Cameras </a></li>
                <li><a href="shop-by-category.html">3D Cameras</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-9.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Digital Camera</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Drone Cameras</a></li>
                <li><a href="shop-by-category.html">Helmet Cameras</a></li>
                <li><a href="shop-by-category.html">Dual-Lens Cameras</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-10.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">DSLR</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Compact 360 Cameras</a></li>
                <li><a href="shop-by-category.html">DSLR Cameras</a></li>
                <li><a href="shop-by-category.html">Mirrorless Cameras</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-11.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Handycam</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Point-and-Shoot Cameras</a></li>
                <li><a href="shop-by-category.html">Bridge Cameras</a></li>
                <li><a href="shop-by-category.html">Compact Cameras</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-12.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Mirrorless Camera</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Full-Frame Mirrorless</a></li>
                <li><a href="shop-by-category.html">APS-C Mirrorless</a></li>
                <li><a href="shop-by-category.html">Micro Four Thirds Mirrorless</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-13.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Dash Cam</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Compact Mirrorless</a></li>
                <li><a href="shop-by-category.html">Medium Format Mirrorless</a></li>
                <li><a href="shop-by-category.html">Panoramic</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-14.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Video Camera</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Digital Camcorders</a></li>
                <li><a href="shop-by-category.html">Professional Camcorders</a></li>
                <li><a href="shop-by-category.html">4K Camcorders</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-15.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Instant Camera</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Compact Camcorders</a></li>
                <li><a href="shop-by-category.html">High Definition (HD) Camcorders</a></li>
                <li><a href="shop-by-category.html">Panoramic</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-16.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Camera Accessories</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">SD Cards (High-Speed)</a></li>
                <li><a href="shop-by-category.html">MicroSD Cards</a></li>
                <li><a href="shop-by-category.html">External Hard Drives</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-17.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Camera Tripod</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Travel Tripods</a></li>
                <li><a href="shop-by-category.html">Tabletop Tripods</a></li>
                <li><a href="shop-by-category.html">Monopods</a></li>
            </ul>
        </div>
        <!-- End product singel -->

    </div>
    <!-- Start banner -->
    <div class="rbt-sidebar-banner">
        <div class="rbt-banner-img">
            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}" alt="Banner Image">
        </div>
        <div class="rbt-sidebar-banner-content">
            <p class="rbt-sidebar-banner-text">Camera Accessories
                <span class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th December</span>
            </p>
            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span class="rbt-text-regular">On All Brands</span>
            </h2>
            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
        </div>
    </div>
    <!-- End banner -->

</div>
                        </div>
                        <!-- End single Category Tab content -->

                        <!-- Start single Category Tab content -->
                        <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-2" role="tabpanel" aria-labelledby="rbt-tab-cat-sidebar-2" tabindex="0">
                            <div class="rbt-sub-category-products">
    <div class="rbt-category-products-inner">

        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-1.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Fitness Tracker</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Smart Bands</a></li>
                <li><a href="shop-by-category.html">Heart Rate Monitors</a></li>
                <li><a href="shop-by-category.html">Sleep Trackers</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-2.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Bluetooth</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Luxury Bluetooth Watches</a></li>
                <li><a href="shop-by-category.html">Hybrid Smartwatches</a></li>
                <li><a href="shop-by-category.html">Kids' Smartwatches</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-3.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Hybrid</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Fitness Hybrid Watches</a></li>
                <li><a href="shop-by-category.html">Smart Hybrid Watches</a></li>
                <li><a href="shop-by-category.html">Classic Hybrid Watches</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-4.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Regular</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Analog Watches</a></li>
                <li><a href="shop-by-category.html">Digital Watches</a></li>
                <li><a href="shop-by-category.html">Dress Watches</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-5.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Touchscreen</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Smartwatches</a></li>
                <li><a href="shop-by-category.html">Fitness Trackers</a></li>
                <li><a href="shop-by-category.html">Hybrid Smartwatches</a></li>
            </ul>
        </div>
        <!-- End product singel -->

    </div>
    <!-- Start banner -->
    <div class="rbt-sidebar-banner">
        <div class="rbt-banner-img">
            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}" alt="Banner Image">
        </div>
        <div class="rbt-sidebar-banner-content">
            <p class="rbt-sidebar-banner-text">Starting From <span class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                    December</span></p>
            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span class="rbt-text-regular">On All Brands</span>
            </h2>
            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
        </div>
    </div>
    <!-- End banner -->

</div>
                        </div>
                        <!-- End single Category Tab content -->

                        <!-- Start single Category Tab content -->
                        <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-3" role="tabpanel" aria-labelledby="rbt-tab-cat-sidebar-3" tabindex="0">
                            <div class="rbt-sub-category-products">
    <div class="rbt-category-products-inner">

        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-18.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">QLED TV</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li>
                    <a href="shop-by-categories.html" class="rbt-underline-btn btn-white">
                        View All
                        <i class="fa-regular fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-19.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Smart TV</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li>
                    <a href="shop-by-categories.html" class="rbt-underline-btn btn-white">
                        View All
                        <i class="fa-regular fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-20.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">UHD TV</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li>
                    <a href="shop-by-categories.html" class="rbt-underline-btn btn-white">
                        View All
                        <i class="fa-regular fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-21.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">HD TV</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li>
                    <a href="shop-by-categories.html" class="rbt-underline-btn btn-white">
                        View All
                        <i class="fa-regular fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-22.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">LED TV</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li>
                    <a href="shop-by-categories.html" class="rbt-underline-btn btn-white">
                        View All
                        <i class="fa-regular fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-23.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">4K TV</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li>
                    <a href="shop-by-categories.html" class="rbt-underline-btn btn-white">
                        View All
                        <i class="fa-regular fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End product singel -->

    </div>
    <!-- Start banner -->
    <div class="rbt-sidebar-banner">
        <div class="rbt-banner-img">
            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}" alt="Banner Image">
        </div>
        <div class="rbt-sidebar-banner-content">
            <p class="rbt-sidebar-banner-text">Starting From <span class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                    December</span></p>
            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span class="rbt-text-regular">On All Brands</span>
            </h2>
            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
        </div>
    </div>
    <!-- End banner -->

</div>
                        </div>
                        <!-- End single Category Tab content -->

                        <!-- Start single Category Tab content -->
                        <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-4" role="tabpanel" aria-labelledby="rbt-tab-cat-sidebar-4" tabindex="0">
                            <div class="rbt-sub-category-products">
    <div class="rbt-category-products-inner">

        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-24.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Gaming Keyboard</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Apex Gamer Pro</a></li>
                <li><a href="shop-by-category.html">Stealth Strike Keyboard</a></li>
                <li><a href="shop-by-category.html">Rapid Fire RGB</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-25.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Gaming Headset</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">SoundStorm Pro</a></li>
                <li><a href="shop-by-category.html">EchoMaster Elite</a></li>
                <li><a href="shop-by-category.html">BattleTune 360</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-26.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Gaming Chair</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Elite Gamer Throne</a></li>
                <li><a href="shop-by-category.html">Turbo Comfort Seat</a></li>
                <li><a href="shop-by-category.html">Pro Series Gaming Chair</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-27.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Mouse Pads</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">GlidePro Mouse Pad</a></li>
                <li><a href="shop-by-category.html">PixelPerfect Pad</a></li>
                <li><a href="shop-by-category.html">EagleEye Mouse Mat</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-28.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Joystick</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">ProGamer Joystick</a></li>
                <li><a href="shop-by-category.html">Precision Play Controller</a></li>
                <li><a href="shop-by-category.html">TurboGrip Joystick</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-29.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">VR headset</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">VisionSphere VR Headset</a></li>
                <li><a href="shop-by-category.html">ImmersiveEye VR Goggles</a></li>
                <li><a href="shop-by-category.html">RealityFusion Headset</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-30.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">PlayStation Acce...</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Crystal Clear Faceplate</a></li>
                <li><a href="shop-by-category.html">ComfortFit Chair</a></li>
                <li><a href="shop-by-category.html">Dynamic RGB LED</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-31.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Gaming Desk</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">ProGamer Desk</a></li>
                <li><a href="shop-by-category.html">Titan Gaming Station</a></li>
                <li><a href="shop-by-category.html">Arcade Pro Desk</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-32.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Gaming Sofa</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Victory Lounge</a></li>
                <li><a href="shop-by-category.html">Pixel Perch</a></li>
                <li><a href="shop-by-category.html">Gamer's Retreat</a></li>
            </ul>
        </div>
        <!-- End product singel -->

    </div>
    <!-- Start banner -->
    <div class="rbt-sidebar-banner">
        <div class="rbt-banner-img">
            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}" alt="Banner Image">
        </div>
        <div class="rbt-sidebar-banner-content">
            <p class="rbt-sidebar-banner-text">Starting From <span class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                    December</span></p>
            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span class="rbt-text-regular">On All Brands</span>
            </h2>
            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
        </div>
    </div>
    <!-- End banner -->

</div>
                        </div>
                        <!-- End single Category Tab content -->

                        <!-- Start single Category Tab content -->
                        <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-5" role="tabpanel" aria-labelledby="rbt-tab-cat-sidebar-5" tabindex="0">
                            <div class="rbt-sub-category-products">

    <div class="rbt-category-products-inner">
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-33.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Bluetooth Headphone</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">SoundWave Pro</a></li>
                <li><a href="shop-by-category.html">AeroSound Bluetooth</a></li>
                <li><a href="shop-by-category.html">PulseBeats Wireless</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-34.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Headphone Stand</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Audio Aegis</a></li>
                <li><a href="shop-by-category.html">Harmonic Holder</a></li>
                <li><a href="shop-by-category.html">Headset Haven</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-35.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Home Theater</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Cinematic Sound Bar</a></li>
                <li><a href="shop-by-category.html">Ultra HD Projector</a></li>
                <li><a href="shop-by-category.html">4K Smart TV</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-36.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Bluetooth Speaker</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">SoundWave Pro</a></li>
                <li><a href="shop-by-category.html">BassBlaster 360</a></li>
                <li><a href="shop-by-category.html">AeroSound Compact</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-37.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Soundbar</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Versatile Soundbar</a></li>
                <li><a href="shop-by-category.html">Signature Series Soundbar</a></li>
                <li><a href="shop-by-category.html">ProSound Soundbar</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-38.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Microphone</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">SoundWave Pro</a></li>
                <li><a href="shop-by-category.html">EchoSphere Mic</a></li>
                <li><a href="shop-by-category.html">ClearCast 3000</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-39.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Voice Recorder</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">EchoNote Pro</a></li>
                <li><a href="shop-by-category.html">VoxCapture 3000</a></li>
                <li><a href="shop-by-category.html">SoundScribe</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-40.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Sound Card</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">AeroSound Pro</a></li>
                <li><a href="shop-by-category.html">EchoMaster FX</a></li>
                <li><a href="shop-by-category.html">Vortex SoundBlaster</a></li>
            </ul>
        </div>
        <!-- End product singel -->

    </div>
    <!-- Start banner -->
    <div class="rbt-sidebar-banner">
        <div class="rbt-banner-img">
            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}" alt="Banner Image">
        </div>
        <div class="rbt-sidebar-banner-content">
            <p class="rbt-sidebar-banner-text">Starting From <span class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                    December</span></p>
            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span class="rbt-text-regular">On All Brands</span>
            </h2>
            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
        </div>
    </div>
    <!-- End banner -->
</div>
                        </div>
                        <!-- End single Category Tab content -->

                        <!-- Start single Category Tab content -->
                        <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-6" role="tabpanel" aria-labelledby="rbt-tab-cat-sidebar-6" tabindex="0">
                            <div class="rbt-sub-category-products">
    <div class="rbt-category-products-inner">
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-41.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Air Conditioner</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">CoolBreeze Pro</a></li>
                <li><a href="shop-by-category.html">ChillMaster Elite</a></li>
                <li><a href="shop-by-category.html">AirFlow Genius</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-42.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Geyser</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">AquaFlow Geysers</a></li>
                <li><a href="shop-by-category.html">TurboHeat Geysers</a></li>
                <li><a href="shop-by-category.html">EcoHeat Geysers</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-43.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Oven</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">CrispBake Oven</a></li>
                <li><a href="shop-by-category.html">QuickHeat Convection Oven</a></li>
                <li><a href="shop-by-category.html">PerfectBake Electric Oven</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-44.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Air Fryer</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">CrispMaster Air Fryer</a></li>
                <li><a href="shop-by-category.html">Healthy Fry Pro</a></li>
                <li><a href="shop-by-category.html">QuickCrisp Air Fryer</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-45.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Washing Machine</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">EcoClean Pro</a></li>
                <li><a href="shop-by-category.html">UltraWash 360</a></li>
                <li><a href="shop-by-category.html">QuickSpin Deluxe</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-46.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Sewing Machine</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">StitchPro 300</a></li>
                <li><a href="shop-by-category.html">SewMaster Deluxe</a></li>
                <li><a href="shop-by-category.html">QuiltCraft Elite</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-47.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Air Purifier</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">PureAir Breeze</a></li>
                <li><a href="shop-by-category.html">FreshFlow Purifier</a></li>
                <li><a href="shop-by-category.html">BreatheEasy Pro</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-48.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Vacuum Cleaner</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">PowerSweep Pro</a></li>
                <li><a href="shop-by-category.html">UltraClean Cyclone</a></li>
                <li><a href="shop-by-category.html">DustBuster Max</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-49.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Blender</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Smoothie Master Pro</a></li>
                <li><a href="shop-by-category.html">NutriBlend Ultra</a></li>
                <li><a href="shop-by-category.html">EcoBlend Portable Blender</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-50.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Cooker</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">PowerMix 3000</a></li>
                <li><a href="shop-by-category.html">Frozen Fusion Blender</a></li>
                <li><a href="shop-by-category.html">UltraSmooth Blender</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-51.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Iron</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">Blender & Chop Duo</a></li>
                <li><a href="shop-by-category.html">TurboMix Professional</a></li>
                <li><a href="shop-by-category.html">BlendSmart 2-in-1</a></li>
            </ul>
        </div>
        <!-- End product singel -->
        <!-- Start product singel -->
        <div class="rbt-sub-category-product">
            <a href="#" class="rbt-sidebar-category-img">
                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-52.webp') }}" alt="Product Image">
            </a>
            <h2 class="rbt-category-offcanvas-header h5"><a href="shop-by-categories.html">Mini Heater</a></h2>
            <ul class="rbt-product-features has-link-underline-effect">
                <li><a href="shop-by-category.html">HeatWave Blanket</a></li>
                <li><a href="shop-by-category.html">ThermoCushion </a></li>
                <li><a href="shop-by-category.html">SootheHeat Massager</a></li>
            </ul>
        </div>
        <!-- End product singel -->

    </div>
    <!-- Start banner -->
    <div class="rbt-sidebar-banner">
        <div class="rbt-banner-img">
            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}" alt="Banner Image">
        </div>
        <div class="rbt-sidebar-banner-content">
            <p class="rbt-sidebar-banner-text">Starting From <span class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                    December</span></p>
            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span class="rbt-text-regular">On All Brands</span>
            </h2>
            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
        </div>
    </div>
    <!-- End banner -->

</div>
                        </div>
                        <!-- End single Category Tab content -->
                    </div>

                    <!-- End tab content -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Side Nav -->
<!-- Start Side Nav -->
<div class="rbt-cart-side-menu rbt-sidebar-cart">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="rbt-cart-header">
                <div class="title-section">
                    <h2 class="title mb--0 h6"><i class="fa-sharp fa-regular fa-cart-shopping mr--12"></i> Your cart
                    </h2>
                </div>
                <div class="rbt-quick-info-tag d-flex mt--16 rbt-flash-animation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z" fill="url(#paint0_linear_47_2365484)"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z" fill="#FC9502"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z" fill="#FCE202"></path>
                        <defs>
                            <lineargradient id="paint0_linear_47_2365484" x1="11.9995" y1="22.0148" x2="11.9995" y2="2.01511" gradientunits="userSpaceOnUse">
                                <stop offset="1" stop-color="#FF4C0D"></stop>
                                <stop offset="1" stop-color="#FC9502"></stop>
                            </lineargradient>
                        </defs>
                    </svg>
                    <p>Limited Item, <strong>checkout within <span class="rbt-countdown-cart">10m 00s</span></strong>
                    </p>
                </div>
                <div class="rbt-btn-close" id="btn_sideNavClose">
                    <button class="minicart-close-button rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="rbt-minicart-wrapper">
                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="product-single-default.html">
                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-10-a-1-hover.webp') }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title h6"><a href="product-single-default.html">JBL PartyBox 100W Speaker</a>
                            </h3>
                            <span class="quantity">1x <span class="price">Rs. 359.00</span></span>
                            <div class="bottom-part">
                                <div class="rbt-qty-area">
                                    <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" class="items-qty-input" value="01" min="1">
                                    <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <button class="edit-btn" type="button" data-bs-toggle="modal" data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
                                    Edit</button>
                            </div>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="product-single-default.html">
                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1-hover.webp') }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title h6"><a href="product-single-default.html">Apple Watch Ultra 2</a></h3>
                            <span class="quantity">1x <span class="price">Rs. 359.00</span></span>
                            <div class="bottom-part">
                                <div class="rbt-qty-area">
                                    <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" class="items-qty-input" value="01" min="1">
                                    <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <button class="edit-btn" type="button" data-bs-toggle="modal" data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
                                    Edit</button>
                            </div>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="product-single-default.html">
                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1-hover.webp') }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title h6"><a href="product-single-default.html">PlayStation Wireless
                                    Headphone</a>
                            </h3>
                            <span class="quantity">1x <span class="price">Rs. 759.00</span></span>
                            <div class="bottom-part">
                                <div class="rbt-qty-area">
                                    <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" class="items-qty-input" value="01" min="1">
                                    <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <button class="edit-btn" type="button" data-bs-toggle="modal" data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
                                    Edit</button>
                            </div>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="product-single-default.html">
                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-02-a-1-hover.webp') }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title h6"><a href="product-single-default.html">Awei CL-115M USB 2.4A Cable </a>
                            </h3>
                            <span class="quantity">1x <span class="price">Rs. 459.00</span></span>
                            <div class="bottom-part">
                                <div class="rbt-qty-area">
                                    <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" class="items-qty-input" value="01" min="1">
                                    <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <button class="edit-btn" type="button" data-bs-toggle="modal" data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
                                    Edit</button>
                            </div>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="product-single-default.html">
                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-03-a-1-hover.webp') }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title h6"><a href="product-single-default.html">MaxGreen 45W Power Adapter</a>
                            </h3>
                            <span class="quantity">1x <span class="price">Rs. 999.00</span></span>
                            <div class="bottom-part">
                                <div class="rbt-qty-area">
                                    <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" class="items-qty-input" value="01" min="1">
                                    <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <button class="edit-btn" type="button" data-bs-toggle="modal" data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
                                    Edit</button>
                            </div>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="product-single-default.html">
                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-05-a-1-hover.webp') }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title h6"><a href="product-single-default.html">Havit PB90 Power Bank </a></h3>
                            <span class="quantity">1x <span class="price">Rs. 288.00</span></span>
                            <div class="bottom-part">
                                <div class="rbt-qty-area">
                                    <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" class="items-qty-input" value="01" min="1">
                                    <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <button class="edit-btn" type="button" data-bs-toggle="modal" data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
                                    Edit</button>
                            </div>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </li>
                </ul>
                <div class="minicart-quick-access-area mt--24">
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
                <div class="minicart-inc-items-area mt--12">
                    <h3 class="title h6 positin-top">You May Also Like</h3>
                    <div class="bottom-area">
                        <div class="swiper rbt-dot-top-right inc-item-swiper-activation rbt-minicart-wrapper overflow-hidden">
                            <div class="swiper-wrapper">
                                <!-- single slide -->
                                <div class="swiper-slide">
                                    <div class="minicart-item">
                                        <div class="thumbnail">
                                            <a href="product-single-default.html">
                                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1-hover.webp') }}" alt="Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title h6"><a href="product-single-default.html">Keurig K-Duo 4K
                                                    Waterproof Action
                                                    Video Camera </a></h3>
                                            <span class="quantity"><span class="price">Rs. 345.00</span></span>
                                        </div>
                                        <a href="#!" class="add-itembtn tooltips" data-bs-toggle="modal" data-bs-target="#addedcartModal" data-tooltip="Add to Cart"><i class="fa-regular fa-cart-plus"></i></a>
                                    </div>
                                </div>
                                <!-- single slide -->
                                <div class="swiper-slide">
                                    <div class="minicart-item">
                                        <div class="thumbnail">
                                            <a href="product-single-default.html">
                                                <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-06-a-1-hover.webp') }}" alt="Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title h6"><a href="product-single-default.html">Full Amoled HD
                                                    Streaming Webcam</a>
                                            </h3>
                                            <span class="quantity"><span class="price">Rs. 189.00</span></span>
                                        </div>
                                        <a href="#!" class="add-itembtn tooltips" data-bs-toggle="modal" data-bs-target="#addedcartModal" data-tooltip="Add to Cart"><i class="fa-regular fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="rbt-swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="rbt-minicart-footer">
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
            <div class="offer-progress-area">
                <p class="offer-text">Add <strong>Rs. 248.00</strong> More To Get <strong>Free Shipping</strong></p>
                <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar w-75"></div>
                </div>
            </div>
            <div class="rbt-minicart-bottom mt--24">
                <div class="checkout-btn mt--20">
                    <a class="rbt-btn w-100 text-center" href="#">
                        <span class="btn-text">Checkout</span>
                    </a>
                </div>
                <div class="share-btn-grp rbt-link-hover">
                    <a href="cart.html" class="share-btn"><i class="fa-regular fa-pen mr--4"></i> View Cart</a>
                    <button data-bs-toggle="modal" data-bs-target="#socialShareModal" type="button" class="share-btn"><i class="fa-sharp fa-solid fa-link mr--4"></i> Share Cart</button>
                </div>
            </div>
        </div>
    </div>
    <a href="#!" class="rbt-close-inner-popup rbt-popup-close-btn"></a>
    <div class="rbt-offcanvas-inner-popup">
    <div class="rbt-offcanvas-inner-popup-card note-popup">
        <div class="rbt-offcanvas-card-inner">
            <h3 class="rbt-title rbt-text-bold h6">
                <span class="mr--4"><i class="fa-regular fa-pen"></i></span>
                Add note for seller
            </h3>
            <form method="POST" action="{{ route('login.submit') }}">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger mb--20 p-3 rounded" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="tab-content" id="signinTabContent">
        <div class="tab-pane fade show active" id="rbt-tab-pane-1" role="tabpanel" aria-labelledby="rbt-tab-id-1" tabindex="0">
            <div class="rbt-input-field-grp">
                <label class="rbt-field-label" for="signin_email">Your Email Address<span class="rbt-text-color-danger">*</span></label>
                <input class="rbt-input-field" id="signin_email" name="email" type="email" value="{{ old('email', 'customer@example.com') }}" placeholder="Enter Email Address" required autofocus>
            </div>
            <div class="rbt-input-field-grp mt--20">
                <label class="rbt-field-label" for="signin_password">Password<span class="rbt-text-color-danger">*</span></label>
                <input class="rbt-input-field" id="signin_password" name="password" type="password" value="password" placeholder="Enter Password" required>
            </div>
            <div class="rbt-inner-content mt--20 flex-wrap gap-2 d-flex justify-content-between align-items-center">
                <div class="rbt-check-box">
                    <input class="rbt-check-box-input" type="checkbox" name="remember" id="signin_remember">
                    <label class="rbt-check-box-label" for="signin_remember">Remember me</label>
                </div>
            </div>
            <div class="mt--30">
                <button type="submit" class="rbt-btn rbt-switch-btn rbt-switch-y w-100 btn-gradient">
                    <span class="btn-text">Sign In</span>
                </button>
            </div>
        </div>
    </div>
</form>
                                    <!-- End tabs content -->

                                </div>

                                <!-- Separator -->
                                <div class="d-flex align-items-center justify-content-center mb--24 mt--24">
                                    <hr class="rbt-separator rbt-bg-color-gray-light mb--0">
                                    <span class="pl--8 pr--8 b4 rbt-text-medium">OR</span>
                                    <hr class="rbt-separator rbt-bg-color-gray-light mb--0">
                                </div>

                                <!-- Start social login button -->
                                <button type="submit" class="rbt-btn rbt-btn-border rbt-social-login-btn d-block w-100 mb--16 rbt-social-login-btn">
                                    <img class="icon" src="{{ asset('assets/images/icons/fb-icon.webp') }}" alt="Icon">
                                    Continue with Facebook
                                </button>
                                <button type="submit" class="rbt-btn rbt-btn-border rbt-social-login-btn d-block w-100 rbt-social-login-btn">
                                    <img class="icon" src="{{ asset('assets/images/icons/google-icon.webp') }}" alt="Icon">
                                    Continue with Google
                                </button>
                                <!-- End social login button -->

                                <div class="rbt-login-system-switch rbt-link-hover">
                                    Don't have an account?
                                    <a class="rbt-switch-btn" href="signup.html"><span>Create an account</span></a>
                                </div>
                            </div>

                            <!-- Start slider -->
                            <div class="rbt-login-form-bottom rbt-swiper-container-pagination position-relative">
                                <div class="swiper rbt-log-slide-activation pb--40">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="rbt-client-review">
                                                <ul class="rbt-rating-icon-list d-flex justify-content-center">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rbt-review-text mt--8 mb--12">
                                                    "The shirt fits great, very good quality of the material. Training
                                                    in it is pure
                                                    pleasure."
                                                </p>
                                                <div class="d-flex flex-wrap justify-content-center rbt-gap--8">
                                                    <h3 class="mb--0 h6">Szilagyi Erik</h3>
                                                    <div class="rbt-verified-badge badge-rounded">
                                                        <i class="fa-sharp fa-solid fa-shield-check"></i>
                                                        Verified Reviewer
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rbt-client-review">
                                                <ul class="rbt-rating-icon-list d-flex justify-content-center">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rbt-review-text mt--8 mb--12">
                                                    "The shirt fits great, very good quality of the material. Training
                                                    in it is pure
                                                    pleasure."
                                                </p>
                                                <div class="d-flex flex-wrap justify-content-center rbt-gap--8">
                                                    <h3 class="mb--0 h6">Szilagyi Erik</h3>
                                                    <div class="rbt-verified-badge badge-rounded">
                                                        <i class="fa-sharp fa-solid fa-shield-check"></i>
                                                        Verified Reviewer
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rbt-client-review">
                                                <ul class="rbt-rating-icon-list d-flex justify-content-center">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rbt-review-text mt--8 mb--12">
                                                    "The shirt fits great, very good quality of the material. Training
                                                    in it is pure
                                                    pleasure."
                                                </p>
                                                <div class="d-flex flex-wrap justify-content-center rbt-gap--8">
                                                    <h3 class="mb--0 h6">Szilagyi Erik</h3>
                                                    <div class="rbt-verified-badge badge-rounded">
                                                        <i class="fa-sharp fa-solid fa-shield-check"></i>
                                                        Verified Reviewer
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rbt-client-review">
                                                <ul class="rbt-rating-icon-list d-flex justify-content-center">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rbt-review-text mt--8 mb--12">
                                                    "The shirt fits great, very good quality of the material. Training
                                                    in it is pure
                                                    pleasure."
                                                </p>
                                                <div class="d-flex flex-wrap justify-content-center rbt-gap--8">
                                                    <h3 class="mb--0 h6">Szilagyi Erik</h3>
                                                    <div class="rbt-verified-badge badge-rounded">
                                                        <i class="fa-sharp fa-solid fa-shield-check"></i>
                                                        Verified Reviewer
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination rbt-swiper-progress rbt-swiper-pagination-dot-extend">
                                    </div>
                                </div>
                            </div>
                            <!-- End slider -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Component Area -->

    <!-- Start Quick View Modal Area  -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="quickviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="rbt-folder-shape-right-portion">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90" fill="none">
                    <path d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z" fill="white"></path>
                </svg>
            </div>

            <div class="modal-header">
                <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="rbt-top-folder-shape-wrapper">
                <div class="rbt-content-trs-portion rbt-arrow-between rbt-swiper-container-one rbt-arrow-between-lg-dis">
                    <!-- Start banner part -->
                    <div class="swiper rbt-qs-wrapper-slide-acivation">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <!-- Start Component Area -->
                                <div class="rbt-single-product-area">
                                    <div class="row row--16">
                                        <div class="col-lg-6 col-12">
                                            <div class="rbt-product-view-slider rbt-single-product-media-area  rbt-single-product-media-has-folder-shape">
                                                <div class="swiper rbt-arrow-between rbt-product-single-slider-activation rbt-arrow-show-dfl">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-swiper-arrow rbt-modal-arrow-sm-left" data-rbt-position-horigental="3">
                                                        <div class="custom-overflow">
                                                            <i class="rbt-icon fa-regular fa-arrow-left"></i>
                                                            <i class="rbt-icon-top fa-regular fa-arrow-left"></i>
                                                        </div>
                                                    </div>

                                                    <div class="rbt-swiper-arrow rbt-modal-arrow-sm-right" data-rbt-position-horigental="86">
                                                        <div class="custom-overflow">
                                                            <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                                            <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="swiper rbt-product-thumb-slider-activation mt--24 mt_sm--16">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 mt_sm--12 content">
                                            <a href="shop-by-category.html" class="rbt-card-subtitle rbt-card-catagories-text mt--0">Headphones</a>
                                            <div class="rbt-card-title h4"><a href="product-single-default.html">Beats
                                                    Wireless Earbuds with
                                                    Charging Case - Bluetooth In-Ear Headphones</a></div>
                                            <div class="rbt-scroll-vertical-wrapper rbt-vertical-height-sm">
                                                <div class="rbt-scroll-vertical content">
                                                    <p class="description-text b2">
                                                        At vero eos et accusamus et iusto dignissimos ducimus blanditiis
                                                        praesentium voluptatu
                                                        atque...
                                                    </p>
                                                    <div class="rbt-info-wrapper d-flex justify-content-between mt--16">
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
                                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-bag-shopping"></i></span>
                                                                            90+ Sold Recently
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-truck"></i></span>
                                                                            Free shipping
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-rotate-left"></i></span>
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
                                                            <div class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                                9 in Stock</div>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-info-wrapper d-flex mt--8">
                                                        <div class="prd-info-section">
                                                            <div class="prd-id-text">
                                                                <p class="text-bold">Brand:</p>
                                                                <a href="shop-by-brands.html" class="rbt-brand-img tooltips" data-tooltip="Product Brand" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-01.webp') }}" alt="Small icon Brand"></a>
                                                            </div>
                                                        </div>
                                                        <div class="prd-info-section has-left-separator">
                                                            <div class="prd-id-text">
                                                                <p class="text-bold">All Europe</p>
                                                                <a href="shop-by-brands.html" class="rbt-brand-img tooltips" data-tooltip="All Europe Delivary" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-02.webp') }}" alt="Small icon Brand"></a>
                                                            </div>
                                                        </div>
                                                        <div class="prd-info-section has-left-separator">
                                                            <div class="prd-id-text">
                                                                <p class="text-bold">Verified:</p>
                                                                <span class="rbt-brand-img tooltips" data-tooltip="Verified Product" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-03.webp') }}" alt="Small icon Brand"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-info-wrapper d-flex mt--16 rbt-gap--8 flex-wrap">
                                                        <div class="prd-info-section">
                                                            <a class="rbt-quick-info-tag d-flex align-items-center rbt-gap--8 rbt-shiny" href="#">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewbox="0 0 14 10" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.98586 5.18652C1.93484 5.12038 1.88687 5.05807 1.84423 5.00038C2.25958 4.44469 2.71871 3.92381 3.21712 3.44281C4.28087 2.42212 5.61949 1.53911 7 1.53911C8.38051 1.53911 9.71837 2.42212 10.7829 3.44281C11.2813 3.92383 11.7404 4.44471 12.1558 5.00038C11.7402 5.55588 11.2811 6.07675 10.7829 6.55796C9.71837 7.57865 8.38051 8.46166 7 8.46166C5.61949 8.46166 4.28163 7.57865 3.21712 6.55796C2.77476 6.13114 2.36329 5.67282 1.98586 5.18652ZM13.7297 4.58042L13.0916 5.00038L13.7297 5.42035L13.7282 5.42266L13.7259 5.42574L13.7183 5.43804L13.6901 5.47958C13.5374 5.70347 13.378 5.92253 13.2119 6.13645C12.789 6.68142 12.3279 7.19501 11.8322 7.67326C10.6915 8.76779 8.98433 10 7 10C5.01566 10 3.3085 8.76779 2.16785 7.67326C1.47767 7.00644 0.855254 6.27156 0.30991 5.47958C0.300444 5.46579 0.291053 5.45194 0.281736 5.43804L0.274122 5.42574L0.271837 5.42266L0.271076 5.42112C0.271076 5.42035 0.270314 5.42035 0.908409 5.00038L0.270314 4.58042L0.271837 4.57811L0.274122 4.57503L0.281736 4.56273C0.323524 4.49897 0.366683 4.43614 0.411182 4.37428C0.932338 3.63825 1.52073 2.95324 2.16861 2.32828C3.30773 1.23144 5.01566 0 7 0C8.98433 0 10.6915 1.23221 11.8322 2.32674C12.5223 2.99355 13.1448 3.72843 13.6901 4.52042L13.7183 4.56196L13.7259 4.57426L13.7282 4.57734L13.7289 4.57888L13.7297 4.58042ZM13.0916 5.00038L13.7297 4.58042L14 5.00038L13.7297 5.42035L13.0916 5.00038ZM0.270314 4.58042L0.908409 5.00038L0.270314 5.42035L0 5.00038L0.270314 4.58042ZM6.23855 5.00038C6.23855 4.79639 6.31877 4.60075 6.46157 4.4565C6.60437 4.31225 6.79805 4.23121 7 4.23121C7.20195 4.23121 7.39563 4.31225 7.53842 4.4565C7.68122 4.60075 7.76145 4.79639 7.76145 5.00038C7.76145 5.20438 7.68122 5.40002 7.53842 5.54427C7.39563 5.68852 7.20195 5.76956 7 5.76956C6.79805 5.76956 6.60437 5.68852 6.46157 5.54427C6.31877 5.40002 6.23855 5.20438 6.23855 5.00038ZM7 2.69287C6.39415 2.69287 5.81312 2.93598 5.38472 3.36873C4.95632 3.80147 4.71565 4.38839 4.71565 5.00038C4.71565 5.61238 4.95632 6.1993 5.38472 6.63204C5.81312 7.06479 6.39415 7.3079 7 7.3079C7.60585 7.3079 8.18688 7.06479 8.61528 6.63204C9.04367 6.1993 9.28435 5.61238 9.28435 5.00038C9.28435 4.38839 9.04367 3.80147 8.61528 3.36873C8.18688 2.93598 7.60585 2.69287 7 2.69287Z" fill="#24BD25"></path>
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
                                                                    <ul class="rbt-switcher-color-list rbt-switcher-color-list-lg product-switcher-activation">
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-one" data-switcher-color="#2B2B2B" data-src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li class="active"><a class="rbt-switcher--color tooltips rbt-switcher--color-two" data-switcher-color="#cc999d" data-src="{{ asset('assets/images/product-single/earphone/earphone-02.webp') }}" data-tooltip="Pink" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-three" data-switcher-color="#9C9B9E" data-src="{{ asset('assets/images/product-single/earphone/earphone-04.webp') }}" data-tooltip="Dark" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-four" data-switcher-color="#F2EDE7" data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}" data-tooltip="White" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-five rbt-switcher--disable disabled" data-switcher-color="#a09fa4" data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}" data-tooltip="Gray" data-tooltip-position="top" href="#">
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
                                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn active" href="#">Headphones
                                                                    Only</a>
                                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn" href="#">Charging
                                                                    Stand</a>
                                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm disabled" href="#">Headphones + Charging
                                                                    Stand</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="separator-top has-sm-spacer"></div>
                                                    <div class="product-btn-grp">
                                                        <div class="rbt-qty-area">
                                                            <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                                            <input type="number" class="items-qty-input" value="05" min="01">
                                                            <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                                        </div>
                                                        <a class="rbt-btn rbt-btn-border has-left-icon d-block text-center" href="#" data-bs-toggle="modal" data-bs-target="#popup-cartModal"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                                    </div>
                                                    <div class="prd-btn-grp">
                                                        <a class="rbt-btn d-block text-center" href="#">Buy Now</a>
                                                    </div>
                                                    <div class="rbt-quick-link-grp mt--12">
                                                        <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#compareviewModal" type="button"><i class="fa-sharp fa-regular fa-copy"></i>Compare
                                                            Product</button>
                                                        <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#wishlistModal" type="button"><i class="fa-sharp fa-regular fa-heart"></i>Add To
                                                            Wishlist</button>
                                                        <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#socialShareModal" type="button"><i class="fa-sharp fa-regular fa-share-nodes"></i>Share</button>
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
                                            <div class="rbt-product-view-slider rbt-single-product-media-area  rbt-single-product-media-has-folder-shape">
                                                <div class="swiper rbt-arrow-between rbt-product-single-slider-activation rbt-arrow-show-dfl">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail radius-16">
                                                                <div class="rbt-product-single-img">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-swiper-arrow rbt-modal-arrow-sm-left" data-rbt-position-horigental="3">
                                                        <div class="custom-overflow">
                                                            <i class="rbt-icon fa-regular fa-arrow-left"></i>
                                                            <i class="rbt-icon-top fa-regular fa-arrow-left"></i>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-swiper-arrow rbt-modal-arrow-sm-right" data-rbt-position-horigental="86">
                                                        <div class="custom-overflow">
                                                            <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                                            <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper rbt-product-thumb-slider-activation mt--24 mt_sm--16">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-4.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <button class="thumbnail d-block">
                                                                <span class="rbt-thumb-img-sm">
                                                                    <img class="w-100" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Product Images">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 mt_sm--12 content">
                                            <a href="shop-by-category.html" class="rbt-card-subtitle rbt-card-catagories-text mt--0">Headphones</a>
                                            <div class="rbt-card-title h4"><a href="product-single-default.html">Beats
                                                    Wireless
                                                    Earbuds with Charging Case - Bluetooth In-Ear Headphones</a></div>
                                            <div class="rbt-scroll-vertical-wrapper rbt-vertical-height-sm">
                                                <div class="rbt-scroll-vertical content">
                                                    <p class="description-text b2">
                                                        At vero eos et accusamus et iusto dignissimos ducimus blanditiis
                                                        praesentium voluptatu
                                                        atque...
                                                    </p>
                                                    <div class="rbt-info-wrapper d-flex justify-content-between mt--16">
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
                                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-bag-shopping"></i></span>
                                                                            90+ Sold Recently
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-truck"></i></span>
                                                                            Free shipping
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-rotate-left"></i></span>
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
                                                            <div class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                                9 in Stock</div>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-info-wrapper d-flex mt--8">
                                                        <div class="prd-info-section">
                                                            <div class="prd-id-text">
                                                                <p class="text-bold">Brand:</p>
                                                                <a href="shop-by-brands.html" class="rbt-brand-img tooltips" data-tooltip="Product Brand" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-01.webp') }}" alt="Small icon Brand"></a>
                                                            </div>
                                                        </div>
                                                        <div class="prd-info-section has-left-separator">
                                                            <div class="prd-id-text">
                                                                <p class="text-bold">All Europe</p>
                                                                <a href="shop-by-brands.html" class="rbt-brand-img tooltips" data-tooltip="All Europe Delivary" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-02.webp') }}" alt="Small icon Brand"></a>
                                                            </div>
                                                        </div>
                                                        <div class="prd-info-section has-left-separator">
                                                            <div class="prd-id-text">
                                                                <p class="text-bold">Verified:</p>
                                                                <span class="rbt-brand-img tooltips" data-tooltip="Verified Product" data-tooltip-position="top"><img src="{{ asset('assets/images/icons/small-brand/sm-brand-b-03.webp') }}" alt="Small icon Brand"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rbt-info-wrapper d-flex mt--16 rbt-gap--8 flex-wrap">
                                                        <div class="prd-info-section">
                                                            <a class="rbt-quick-info-tag d-flex align-items-center rbt-gap--8 rbt-shiny" href="#">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewbox="0 0 14 10" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.98586 5.18652C1.93484 5.12038 1.88687 5.05807 1.84423 5.00038C2.25958 4.44469 2.71871 3.92381 3.21712 3.44281C4.28087 2.42212 5.61949 1.53911 7 1.53911C8.38051 1.53911 9.71837 2.42212 10.7829 3.44281C11.2813 3.92383 11.7404 4.44471 12.1558 5.00038C11.7402 5.55588 11.2811 6.07675 10.7829 6.55796C9.71837 7.57865 8.38051 8.46166 7 8.46166C5.61949 8.46166 4.28163 7.57865 3.21712 6.55796C2.77476 6.13114 2.36329 5.67282 1.98586 5.18652ZM13.7297 4.58042L13.0916 5.00038L13.7297 5.42035L13.7282 5.42266L13.7259 5.42574L13.7183 5.43804L13.6901 5.47958C13.5374 5.70347 13.378 5.92253 13.2119 6.13645C12.789 6.68142 12.3279 7.19501 11.8322 7.67326C10.6915 8.76779 8.98433 10 7 10C5.01566 10 3.3085 8.76779 2.16785 7.67326C1.47767 7.00644 0.855254 6.27156 0.30991 5.47958C0.300444 5.46579 0.291053 5.45194 0.281736 5.43804L0.274122 5.42574L0.271837 5.42266L0.271076 5.42112C0.271076 5.42035 0.270314 5.42035 0.908409 5.00038L0.270314 4.58042L0.271837 4.57811L0.274122 4.57503L0.281736 4.56273C0.323524 4.49897 0.366683 4.43614 0.411182 4.37428C0.932338 3.63825 1.52073 2.95324 2.16861 2.32828C3.30773 1.23144 5.01566 0 7 0C8.98433 0 10.6915 1.23221 11.8322 2.32674C12.5223 2.99355 13.1448 3.72843 13.6901 4.52042L13.7183 4.56196L13.7259 4.57426L13.7282 4.57734L13.7289 4.57888L13.7297 4.58042ZM13.0916 5.00038L13.7297 4.58042L14 5.00038L13.7297 5.42035L13.0916 5.00038ZM0.270314 4.58042L0.908409 5.00038L0.270314 5.42035L0 5.00038L0.270314 4.58042ZM6.23855 5.00038C6.23855 4.79639 6.31877 4.60075 6.46157 4.4565C6.60437 4.31225 6.79805 4.23121 7 4.23121C7.20195 4.23121 7.39563 4.31225 7.53842 4.4565C7.68122 4.60075 7.76145 4.79639 7.76145 5.00038C7.76145 5.20438 7.68122 5.40002 7.53842 5.54427C7.39563 5.68852 7.20195 5.76956 7 5.76956C6.79805 5.76956 6.60437 5.68852 6.46157 5.54427C6.31877 5.40002 6.23855 5.20438 6.23855 5.00038ZM7 2.69287C6.39415 2.69287 5.81312 2.93598 5.38472 3.36873C4.95632 3.80147 4.71565 4.38839 4.71565 5.00038C4.71565 5.61238 4.95632 6.1993 5.38472 6.63204C5.81312 7.06479 6.39415 7.3079 7 7.3079C7.60585 7.3079 8.18688 7.06479 8.61528 6.63204C9.04367 6.1993 9.28435 5.61238 9.28435 5.00038C9.28435 4.38839 9.04367 3.80147 8.61528 3.36873C8.18688 2.93598 7.60585 2.69287 7 2.69287Z" fill="#24BD25"></path>
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
                                                                    <ul class="rbt-switcher-color-list rbt-switcher-color-list-lg product-switcher-activation">
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-one" data-switcher-color="#2B2B2B" data-src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li class="active"><a class="rbt-switcher--color tooltips rbt-switcher--color-two" data-switcher-color="#cc999d" data-src="{{ asset('assets/images/product-single/earphone/earphone-02.webp') }}" data-tooltip="Pink" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-three" data-switcher-color="#9C9B9E" data-src="{{ asset('assets/images/product-single/earphone/earphone-04.webp') }}" data-tooltip="Dark" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-four" data-switcher-color="#F2EDE7" data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}" data-tooltip="White" data-tooltip-position="top" href="#">
                                                                                <div class="rbt-color-circle"></div>
                                                                            </a></li>
                                                                        <li><a class="rbt-switcher--color tooltips rbt-switcher--color-five rbt-switcher--disable disabled" data-switcher-color="#a09fa4" data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}" data-tooltip="Gray" data-tooltip-position="top" href="#">
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
                                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn active" href="#">Headphones
                                                                    Only</a>
                                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn" href="#">Charging
                                                                    Stand</a>
                                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm disabled" href="#">Headphones + Charging
                                                                    Stand</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="separator-top has-sm-spacer"></div>
                                                    <div class="product-btn-grp">
                                                        <div class="rbt-qty-area">
                                                            <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                                            <input type="number" class="items-qty-input" value="05" min="01">
                                                            <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
                                                        </div>
                                                        <a class="rbt-btn rbt-btn-border has-left-icon d-block text-center" href="#" data-bs-toggle="modal" data-bs-target="#popup-cartModal"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                                    </div>
                                                    <div class="prd-btn-grp">
                                                        <a class="rbt-btn d-block text-center" href="#">Buy Now</a>
                                                    </div>
                                                    <div class="rbt-quick-link-grp mt--12">
                                                        <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#compareviewModal" type="button"><i class="fa-sharp fa-regular fa-copy"></i>Compare
                                                            Product</button>
                                                        <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#wishlistModal" type="button"><i class="fa-sharp fa-regular fa-heart"></i>Add To
                                                            Wishlist</button>
                                                        <button class="rbt-quick-link" data-bs-toggle="modal" data-bs-target="#socialShareModal" type="button"><i class="fa-sharp fa-regular fa-share-nodes"></i>Share</button>
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
    <!-- Start Wishlist Modal Area  -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="socialShareModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="socialShareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered xxs-size">
        <div class="modal-content">

            <div class="rbt-folder-shape-right-portion">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90" fill="none">
                    <path d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z" fill="white"></path>
                </svg>
            </div>

            <div class="modal-header">
                <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="rbt-top-folder-shape-wrapper">
                <div class="rbt-bg-color-white rbt-content-trs-portion">
                    <div class="rbt-title mb--8 rbt-text-bold" id="socialShareModalLabel">Share Options</div>
                    <div class="rbt-social-share-wrapper">

                        <ul class="social-icon rbt-social-default mt--16 mt_sm--0 rbt-social-default-v1 lg-size justify-content-start">
                            <li>
                                <a class="facebook-btn" href="https://www.facebook.com">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a class="tiktok-btn" href="https://www.tiktok.com">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                            <li>
                                <a class="pinterest-btn" href="https://www.pinterest.com">
                                    <i class="fa-brands fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a class="tumblr-btn" href="https://www.tumblr.com/">
                                    <i class="fa-brands fa-tumblr"></i>
                                </a>
                            </li>
                            <li>
                                <a class="telegram-btn" href="https://www.telegram.com">
                                    <i class="fa-brands fa-telegram"></i>
                                </a>
                            </li>
                            <li>
                                <a class="whatsapp-btn" href="https://www.whatsapp.com/">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                            <li>
                                <a class="email-btn" href="/cdn-cgi/l/email-protection#c5b6aaa8a0aaaba085a0bda4a8b5a9a0eba6aaa8">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="rbt-copy-link-part rbt-text-copy-activation mt--24 mt_sm--8 w-100">
                            <input class="rbt-copy-value-field w-100" type="text" value="https://unimart.template/wishlist" readonly="">
                            <button class="rbt-btn rbt-btn-xs has-left-icon rbt-copy-btn" data-tooltip="Copy to clipboard">
                                <i class="fa-regular fa-copy"></i>
                                <span class="rbt-btn-text">Copy</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wishlist Modal Area  -->
    <!-- Start Quick View Modal Area  -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="quickviewEditCartModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="quickviewEditCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rbt-cart-edit-area">

        <div class="modal-content">

            <div class="rbt-folder-shape-right-portion">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90" fill="none">
                    <path d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z" fill="white"></path>
                </svg>
            </div>

            <div class="modal-header">
                <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal" aria-label="Close">
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
                                    <img src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}" alt="Product Thumbnail">
                                </a>
                                <div class="rbt-product-info">
                                    <p class="rbt-card-title h6" id="quickviewEditCartModalLabel"><a href="#">2021
                                            Apple 12.9-inch iPad Pro Wi-Fi 512GB Gray Space</a></p>
                                    <div class="pricing-part mb--12 mt--0">
                                        <del class="price-text">Rs. 295.00</del>
                                        <span class="price-text">Rs. 179.98</span>
                                    </div>
                                    <div class="rbt-qty-area rbt-qty-sm">
                                        <button class="qty-item-btn qty-item-btn-decr"><i class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="items-qty-input" value="05" min="01">
                                        <button class="qty-item-btn qty-item-btn-incr"><i class="fa-solid fa-plus"></i></button>
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
                                                <ul class="rbt-switcher-color-list rbt-switcher-color-list-lg product-switcher-activation">
                                                    <li><a class="rbt-switcher--color tooltips rbt-switcher--color-one" data-switcher-color="#2B2B2B" data-src="{{ asset('assets/images/product-single/earphone/earphone-05.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                            <div class="rbt-color-circle"></div>
                                                        </a></li>
                                                    <li class="active"><a class="rbt-switcher--color tooltips rbt-switcher--color-two" data-switcher-color="#cc999d" data-src="{{ asset('assets/images/product-single/earphone/earphone-02.webp') }}" data-tooltip="Pink" data-tooltip-position="top" href="#">
                                                            <div class="rbt-color-circle"></div>
                                                        </a></li>
                                                    <li><a class="rbt-switcher--color tooltips rbt-switcher--color-three" data-switcher-color="#9C9B9E" data-src="{{ asset('assets/images/product-single/earphone/earphone-04.webp') }}" data-tooltip="Dark" data-tooltip-position="top" href="#">
                                                            <div class="rbt-color-circle"></div>
                                                        </a></li>
                                                    <li><a class="rbt-switcher--color tooltips rbt-switcher--color-four" data-switcher-color="#F2EDE7" data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}" data-tooltip="White" data-tooltip-position="top" href="#">
                                                            <div class="rbt-color-circle"></div>
                                                        </a></li>
                                                    <li><a class="rbt-switcher--color tooltips rbt-switcher--color-five rbt-switcher--disable disabled" data-switcher-color="#a09fa4" data-src="{{ asset('assets/images/product-single/earphone/earphone-03.webp') }}" data-tooltip="White" data-tooltip-position="top" href="#">
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
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn active" href="#">Headphones Only</a>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm disabled" href="#">Headphones +
                                                Charging Stand</a>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn" href="#">Charging Stand</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <a class="rbt-btn d-block text-center rbt-btn-sm rbt-square-btn has-left-icon mt--24 mt_sm--16" href="#">
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
    <!-- Start Wishlist Modal Area  -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="wishlistModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog sm-size modal-dialog-centered">
        <div class="modal-content">
            <div class="rbt-folder-shape-right-portion">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90" fill="none">
                    <path d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z" fill="white"></path>
                </svg>
            </div>
            <div class="modal-header">
                <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="rbt-top-folder-shape-wrapper">
                <div class="rbt-bg-color-white rbt-content-trs-portion">
                    <div class="rbt-wishlist-modal-content">
                        <div class="rbt-title rbt-text-bold h5" id="wishlistModalLabel">Product Wishlist</div>
                        <div class="rbt-transparent-table-one-wrapper rbt-has-bg-gray pt--0 pb--0 mb--16">
                            <table class="rbt-transparent-table-one mb--0 rbt-wishlist-table">
                                <tbody>
                                    <!-- Start single wishlist product row -->
                                    <tr>
                                        <td class="rbt-product-remove-btn-wrapper">
                                            <button class="rbt-product-remove-btn rbt-round-btn">
                                                <span><i class="fa-solid fa-xmark"></i></span>
                                            </button>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="product-single-default.html">
                                                <img src="{{ asset('assets/images/wishlist/wishlist-prd-1.webp') }}" alt="Product image">
                                            </a>
                                        </td>
                                        <td class="rbt-wish-product-info">
                                            <div class="rbt-wish-product-name h6">
                                                <a href="product-single-default.html">
                                                    JBL PartyBox 100W Speaker
                                                </a>
                                            </div>
                                            <div class="rbt-product-price-text rbt-text-color-primary">
                                                <span>Rs. 159.00</span>
                                            </div>
                                            <span class="rbt-product-id"><span class="rbt-text-semi-bold">SKU:</span>
                                                #180036458</span>
                                        </td>

                                        <td>
                                            <div class="rbt-button-group">
                                                <a class="rbt-btn rbt-btn-sm has-left-icon" href="cart.html">
                                                    <i class="fa-regular fa-cart-shopping"></i>
                                                    Add To Cart
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End single wishlist product row -->

                                    <!-- Start single wishlist product row -->
                                    <tr>
                                        <td class="rbt-product-remove-btn-wrapper">
                                            <button class="rbt-product-remove-btn rbt-round-btn">
                                                <span><i class="fa-solid fa-xmark"></i></span>
                                            </button>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="product-single-default.html">
                                                <img src="{{ asset('assets/images/wishlist/wishlist-prd-2.webp') }}" alt="Product image">
                                            </a>
                                        </td>
                                        <td class="rbt-wish-product-info">
                                            <div class="rbt-wish-product-name h6">
                                                <a href="product-single-default.html">
                                                    Fossil Gen 6 Hybrid Smartwatch
                                                </a>
                                            </div>
                                            <div class="rbt-product-price-text rbt-text-color-primary">
                                                <span>Rs. 209.00</span>
                                            </div>
                                            <span class="rbt-product-id"><span class="rbt-text-semi-bold">SKU:</span>
                                                #180036565</span>
                                        </td>

                                        <td>
                                            <div class="rbt-button-group">
                                                <a class="rbt-btn rbt-btn-sm has-left-icon" href="cart.html">
                                                    <i class="fa-regular fa-cart-shopping"></i>
                                                    Add To Cart
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End single wishlist product row -->
                                </tbody>
                            </table>
                        </div>
                        <div class="rbt-wishlist-modal-footer d-flex flex-wrap rbt-gap--16 justify-content-between align-items-center">
                            <a href="wishlist.html" class="rbt-link"><span class="icon mr--4"><i class="fa-sharp fa-regular fa-heart"></i></span>Open wishlist page</a>
                            <a href="{{ route('shop') }}" class="rbt-link">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wishlist Modal Area  -->
    <!-- Start Compare View Modal Area  -->
<div class="rbt-default-modal modal fade  has-rbt-top-folder-shape" id="compareviewModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="compareviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered xl-size">
        <div class="modal-content">


            <div class="rbt-folder-shape-right-portion">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90" fill="none">
                    <path d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z" fill="white"></path>
                </svg>
            </div>


            <div class="modal-header">
                <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="rbt-top-folder-shape-wrapper">
                <!-- Start Componente Area -->
                <div class="rbt-component-area rbt-compare-table-area rbt-content-trs-portion">
                    <div class="row">
                        <div class="col-12">
                            <div class="rbt-component-section-title rbt-gap--4 mb--24 p-0 border-0 text-left">
                                <div id="compareviewModalLabel" class="rbt-title mb--0"><span class="rbt-text-bold h4">Compare Product</span></div>
                            </div>
                        </div>
                        <div class="col-12 rbt-scrollable-content">
                            <!-- Start Compare Table -->
<table class="rbt-compare-table">
    <tbody>
        <tr>
            <td></td>
            <td>
                <div class="rbt-input-field-grp">
                    <input class="rbt-input-field" type="text" placeholder="Search and Select Product">
                    <button class="rbt-search-btn"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </td>
            <td>
                <div class="rbt-input-field-grp">
                    <input class="rbt-input-field" type="text" placeholder="Search and Select Product">
                    <button class="rbt-search-btn"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </td>
            <td>
                <div class="rbt-input-field-grp">
                    <input class="rbt-input-field" type="text" placeholder="Search and Select Product">
                    <button class="rbt-search-btn"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </td>
            <td>
                <div class="rbt-input-field-grp">
                    <input class="rbt-input-field" type="text" placeholder="Search and Select Product">
                    <button class="rbt-search-btn"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </td>
        </tr>
        <tr class="rbt-compare-prd-table-head">
            <td class="rbt-compare-table-title">
                <div class="rbt-compare-values">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewbox="0 0 56 56" fill="none">
                            <path d="M28 7.5C25.0767 7.5 22.6975 9.88262 22.6975 12.8112C22.6936 13.7244 22.9272 14.6229 23.3755 15.4184C23.8237 16.214 24.4712 16.8793 25.2543 17.349C26.0823 17.8506 27.0319 18.1157 28 18.1157C28.9681 18.1157 29.9177 17.8506 30.7458 17.349C31.5289 16.8794 32.1764 16.2141 32.6247 15.4185C33.073 14.6229 33.3066 13.7244 33.3025 12.8112C33.3025 9.88262 30.9234 7.5 28 7.5ZM35.1392 42.6269H31.1667L31.1675 42.6225V19.1112C30.1963 19.61 29.1025 19.8638 28 19.8638C26.8975 19.8638 25.8038 19.61 24.8325 19.1112V42.6225L24.8334 42.6269H20.8609C19.8457 42.628 18.8723 43.0318 18.1544 43.7496C17.4364 44.4674 17.0324 45.4406 17.031 46.4559V47.6258C17.031 47.8578 17.1232 48.0804 17.2873 48.2445C17.4514 48.4086 17.674 48.5008 17.906 48.5008H38.094C38.3261 48.5008 38.5487 48.4086 38.7127 48.2445C38.8768 48.0804 38.969 47.8578 38.969 47.6258V46.4559C38.9676 45.4406 38.5637 44.4674 37.8457 43.7496C37.1277 43.0318 36.1544 42.628 35.1392 42.6269ZM12.2439 33.8524C15.9495 33.8524 18.9657 30.8371 18.9657 27.1306C18.9657 26.8629 18.9989 25.8575 18.8922 25.6134L18.8904 25.6055L13.5914 13.6871H21C20.9292 13.1059 20.9292 12.5183 21 11.9371H12.2395C12.0724 11.9416 11.9097 11.9922 11.7695 12.0833C11.6293 12.1744 11.517 12.3025 11.445 12.4534L5.60003 25.6037L5.59915 25.6064C5.4889 25.854 5.52128 26.8506 5.52128 27.1297C5.52215 30.8363 8.5374 33.8524 12.2439 33.8524ZM12.243 14.9611L16.744 25.0849H7.73853L12.243 14.9611ZM50.477 25.9529C50.4762 25.9161 50.4604 25.8803 50.4552 25.8435C50.4438 25.7612 50.4333 25.6799 50.4009 25.6064L50.4 25.6037L44.555 12.4525C44.4837 12.3013 44.3716 12.1729 44.2315 12.0818C44.0913 11.9906 43.9286 11.9402 43.7614 11.9362H35C35.0709 12.5174 35.0709 13.1051 35 13.6862H42.4086L37.1097 25.6046L37.1079 25.6125C37.086 25.6633 37.0834 25.7219 37.0712 25.777C37.0589 25.8356 37.0362 25.8934 37.0362 25.952L37.0344 25.959V27.1289C37.0344 30.8354 40.0497 33.8506 43.757 33.8506C47.4627 33.8506 50.4788 30.8354 50.4788 27.1289V25.959L50.477 25.9529ZM39.256 25.0849L43.757 14.9611L48.2615 25.0849H39.256Z" fill="#E6E6E6"></path>
                        </svg>
                    </span>
                    <p class="rbt-compare-table-text">Find and select products to see the
                        differences
                        and similarities between them</p>
                </div>
            </td>
            <td>
                <div class="rbt-compare-item-wrapper">
                    <button class="rbt-product-remove-btn">
                        <i class="fa-sharp fa-solid fa-xmark"></i>
                    </button>
                    <a href="product-single-default.html" class="rbt-product-item-img">
                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-1.webp') }}" alt="Product Image">
                    </a>
                    <div class="rbt-compare-values">
                        <a href="#" class="rbt-product-item-category">
                            T-shirts
                        </a>
                        <p class="rbt-product-item-title h6">
                            <a href="product-single-default.html">Signature Hooded Wrap Coat</a>
                        </p>
                        <a class="rbt-btn rbt-btn-sm has-left-icon" href="#">
                            <i class="fa-regular fa-cart-shopping"></i>
                            Add To Cart
                        </a>
                    </div>
                </div>
            </td>
            <td>
                <div class="rbt-compare-item-wrapper">
                    <button class="rbt-product-remove-btn">
                        <i class="fa-sharp fa-solid fa-xmark"></i>
                    </button>
                    <a href="product-single-default.html" class="rbt-product-item-img">
                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-2.webp') }}" alt="Product Image">
                    </a>
                    <div class="rbt-compare-values">
                        <a href="#" class="rbt-product-item-category">
                            Tiered
                        </a>
                        <p class="rbt-product-item-title h6">
                            <a href="product-single-default.html">Long Belted Wrap Full Coat</a>
                        </p>
                        <a class="rbt-btn rbt-btn-sm has-left-icon" href="#">
                            <i class="fa-regular fa-cart-shopping"></i>
                            Add To Cart
                        </a>
                    </div>
                </div>
            </td>
            <td>
                <div class="rbt-compare-item-wrapper">
                    <button class="rbt-product-remove-btn">
                        <i class="fa-sharp fa-solid fa-xmark"></i>
                    </button>
                    <a href="product-single-default.html" class="rbt-product-item-img">
                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-3.webp') }}" alt="Product Image">
                    </a>
                    <div class="rbt-compare-values">
                        <a href="#" class="rbt-product-item-category">
                            Sleeveless
                        </a>
                        <p class="rbt-product-item-title h6">
                            <a href="product-single-default.html">Zipper Neckline Bateau T-Shirt</a>
                        </p>
                        <a class="rbt-btn rbt-btn-sm has-left-icon" href="#">
                            <i class="fa-regular fa-cart-shopping"></i>
                            Add To Cart
                        </a>
                    </div>
                </div>
            </td>
            <td>
                <div class="rbt-compare-item-wrapper">
                    <button class="rbt-product-remove-btn">
                        <i class="fa-sharp fa-solid fa-xmark"></i>
                    </button>
                    <a href="product-single-default.html" class="rbt-product-item-img">
                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-4.webp') }}" alt="Product Image">
                    </a>
                    <div class="rbt-compare-values">
                        <a href="#" class="rbt-product-item-category">
                            T-shirts
                        </a>
                        <p class="rbt-product-item-title h6">
                            <a href="product-single-default.html">Masculine Tailored Pants</a>
                        </p>
                        <a class="rbt-btn rbt-btn-sm has-left-icon" href="#">
                            <i class="fa-regular fa-cart-shopping"></i>
                            Add To Cart
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rbt-product-feature-name">Customer Rating</td>
            <td>
                <div class="rbt-compare-values">
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
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
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
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
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
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
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
                </div>
            </td>
        </tr>
        <tr>
            <td class="rbt-product-feature-name">Price</td>
            <td>
                <div class="rbt-compare-values">
                    <span class="rbt-product-price">Rs. 149.79</span>
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    <span class="rbt-product-price">Rs. 155.98</span>
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    <span class="rbt-product-price">Rs. 233.44</span>
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    <span class="rbt-product-price">Rs. 159.99</span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rbt-product-feature-name">Sold By</td>
            <td>
                <div class="rbt-compare-values">
                    A4C Online
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    World Electronics
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    Transcom Digital
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    Esquare Electric
                </div>
            </td>
        </tr>
        <tr>
            <td class="rbt-product-feature-name">Color</td>
            <td>
                <div class="rbt-compare-values">
                    Black
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    Green
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    Black
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    Gray
                </div>
            </td>
        </tr>
        <tr>
            <td class="rbt-product-feature-name">Fit Type</td>
            <td>
                <div class="rbt-compare-values">
                    In-Ear
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    In-Ear
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    In-Ear
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    In-Ear
                </div>
            </td>
        </tr>
        <tr>
            <td class="rbt-product-feature-name">Item Dimensions</td>
            <td>
                <div class="rbt-compare-values">
                    0.67 x 0.79 x 1.65 inches
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    -----
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    1.73 x 3.94 x 6.3 inches
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    6.5 x 4 x 2 inches
                </div>
            </td>
        </tr>
        <tr>
            <td class="rbt-product-feature-name">Special Features</td>
            <td>
                <div class="rbt-compare-values">
                    wireless, voice assistant, Bluetooth, noise cancellation, adaptive, wireless
                    charging
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    Lightweight, Microphone Included, Fast Charging, Noise Cancellation
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    wireless, voice assistant, Bluetooth, noise cancellation, adaptive, wireless
                    charging
                </div>
            </td>
            <td>
                <div class="rbt-compare-values">
                    wireless, voice assistant, Bluetooth, noise cancellation, adaptive, wireless
                    charging
                </div>
            </td>
        </tr>
    </tbody>
</table>
<!-- End Compare Table -->
                        </div>
                    </div>
                </div>
                <!-- End Componente Area -->
            </div>


        </div>
    </div>
</div>
<!-- End Compare View Modal Area -->

    <!-- Start Footer aera -->

@endsection
