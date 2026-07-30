@extends('layouts.app')

@section('title', "Nature's Beauty Creations | Official Online Shop")

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
                                <img src="{{ asset('assets/images/nbc/logo-nbc2.png') }}" alt="Nature's Beauty Creations">
                            </a>
                        </div>
                        <div class="rbt-btn-close">
                            <button class="close-button rbt-round-btn" aria-label="Close menu"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                    <p class="description">Authentic herbal beauty, skin care and personal care products from Nature's
                        Beauty Creations.</p>
                    <div class="rbt-inner-search-field style-one rbt-search-field-rounded rbt-search-field-sm-width">
                        <input type="text" placeholder="Search for products">
                        <button class="rbt-round-btn search-btn rbt-text-color-gray-500" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
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
                    <div class="tab-content" id="mobile-menuTabContent">
                        <div class="tab-pane fade show active" id="rbt-tab-pane-mobilemenu-1" role="tabpanel"
                            aria-labelledby="rbt-tab-mobilemenu-1" tabindex="0">
                            <nav class="rbt-mainmenu-nav">
                                <ul class="mainmenu">
                                    <li class="with-rbt-megamenu has-menu-child-item position-static">
                                        <a href="#!">Home <i class="fa-regular fa-chevron-down"></i></a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu rbt-prsentation-megamenu rbt-width-fullscreen">
                                            <div class="rbt-megamenu-wrapper">
                                                <div class="container p_sm--0 p_md--0 p_lg--0">
                                                    <div
                                                        class="row row--12 home-plesentation-wrapper single-dropdown-menu-presentation mt_dec--24 mb_sm--0">

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-1">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-electronics.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-1.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-electronics.html">Electronics
                                                                                One</a></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-2">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-fashion.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-5.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-fashion.html">Fashion One</a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-3">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-furniture.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-8.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-furniture.html">Furniture One</a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-4">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-printing-service.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-6.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-printing-service.html">Print
                                                                                Service One</a></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-5">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-cosmetic-beauty.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-2.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-cosmetic-beauty.html">Cosmetic
                                                                                Beauty One</a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-6">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-sports.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-9.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-sports.html">Sports One</a></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-7">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-glass.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-3.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-glass.html">Glass One</a></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-8">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-phone-case.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-4.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-phone-case.html">Phone One</a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-9">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-accessories.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-10.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-accessories.html">Accessories
                                                                                One</a></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                        <!-- Start Single Demo  -->
                                                        <div
                                                            class="col-lg-1-5 col-md-12 col-sm-12 col-12 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                                <div class="inner">
                                                                    <div class="thumbnail">
                                                                        <a href="home-jewellery.html"><img
                                                                                src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}"
                                                                                alt="Demo Images"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="rbt-title h4"><a
                                                                                href="home-jewellery.html">jewellery
                                                                                One</a></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Demo  -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Mega Menu  -->
                                    </li>

                                    <li class="with-rbt-megamenu has-menu-child-item">
                                        <a href="#!">Skin Care <i class="fa-regular fa-chevron-down"></i></a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu grid-item-3 pl_sm--0 pl_md--0 pl_lg--0">
                                            <div class="rbt-megamenu-wrapper">
                                                <div class="row d-none d-xl-flex">
                                                    <div class="col-lg-12">
                                                        <div class="mega-top-banner bg-two">
                                                            <div class="rbt-banner-inner justify-content-start">
                                                                <div class="rbt-banner-content">
                                                                    <h2 class="title">Buy One and Get 50% Off the Second
                                                                        Purchase Now</h2>
                                                                    <p class="b3 desc">Send us your idea, it may appear on
                                                                        Unimart.</p>
                                                                </div>
                                                                <div
                                                                    class="pricing-action d-flex flex-column align-items-center rbt-gap--8">
                                                                    <div class="rbt-pricing-part d-flex">
                                                                        <span class="rbt-price-text offer-price">Rs.
                                                                            189.00</span>
                                                                        <del class="rbt-dis-price-text">Rs. 295.00</del>
                                                                    </div>
                                                                    <a class="rbt-btn rbt-btn-sm rbt-btn-black"
                                                                        href="product-single-default.html">View
                                                                        Details</a>
                                                                </div>
                                                                <a href="#" class="product-img position-bottom"><img
                                                                        src="{{ asset('assets/images/splash/menu-banner/menu-prd-01.webp') }}"
                                                                        alt="Eccommerce Product"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row--16">
                                                    <div
                                                        class="col-lg-12 col-xl-6 col-xxl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                        <p class="rbt-short-title h5">Shop Pages</p>
                                                        <ul class="mega-menu-item">
                                                            <li>
                                                                <a href="{{ route('shop') }}">
                                                                    Shop Default
                                                                    <div
                                                                        class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
                                                                        SHOP
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                                            </li>
                                                            <li><a href="shop-filter-list-left-sidebar.html">Shop List Left
                                                                    Sidebar</a></li>
                                                            <li><a href="shop-filter-list-right-sidebar.html">Shop List
                                                                    Right Sidebar</a></li>
                                                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                            <li><a href="shop-sticky-sidebar.html">Sticky Sidebar Shop
                                                                    <div
                                                                        class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                                        POPULAR
                                                                    </div>
                                                                </a></li>
                                                            <li><a href="shop-collapsible-sidebar.html">Collapse Sidebar
                                                                    Shop</a></li>
                                                            <li><a href="shop-scroll-sidebar.html">Scroll Sidebar Shop</a>
                                                            </li>
                                                            <li><a href="shop-loadmore.html">Load More Button</a></li>
                                                            <li><a href="shop-sm-categories.html">Shop Small Categories</a>
                                                            </li>
                                                            <li><a href="products-inside-border-column-shop.html">Bordered
                                                                    inside
                                                                    Products Shop</a></li>
                                                            <li><a href="products-show-rating-shop.html">
                                                                    Products Show Rating
                                                                    <div
                                                                        class="rbt-product-badge rbt-product-badge-bg-danger border-rounded">
                                                                        HOT
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-lg-12 col-xl-6 col-xxl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                        <p class="rbt-short-title h5">Custom Pages</p>
                                                        <ul class="mega-menu-item">
                                                            <li><a href="shop-filter-grid-two.html">Two Columns</a></li>
                                                            <li><a href="shop-filter-grid-three.html">Three Columns</a>
                                                            </li>
                                                            <li><a href="shop-filter-grid-four.html">Four Columns
                                                                    <div
                                                                        class="rbt-product-badge rbt-product-badge-bg-danger border-rounded ml--8">
                                                                        POPULAR
                                                                    </div>
                                                                </a></li>
                                                            <li><a href="shop-wider.html">Three Columns Wide</a></li>
                                                            <li><a href="shop-wider-four.html">
                                                                    Four Columns
                                                                    <div
                                                                        class="rbt-product-badge rbt-product-badge-bg-green border-rounded ml--8">
                                                                        POPULAR
                                                                    </div>
                                                                </a></li>
                                                            <li><a href="shop-wider-five.html">Five Columns Wide</a></li>

                                                            <li><a href="shop-wider-six.html">Six Columns Wide</a></li>

                                                            <li><a href="shop-featured.html">Featured Products</a></li>
                                                            <li><a href="shop-best-prds.html">Best Selling Products</a>
                                                            </li>
                                                            <li><a href="shop-collapse-filter-top.html">Hidden Side Bar
                                                                    Shop</a></li>
                                                            <li><a href="products-show-countdown-shop-style-two.html">Products
                                                                    Show
                                                                    Countdown Two</a>
                                                            </li>
                                                            <li><a href="products-even-list-shop.html">Even List
                                                                    Products</a></li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-lg-12 col-xl-6 col-xxl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                        <p class="rbt-short-title h5">Custom Pages</p>
                                                        <ul class="mega-menu-item">
                                                            <li><a href="shop-no-page-heading.html">Shop No Page
                                                                    Heading</a></li>
                                                            <li><a href="shop-only-category.html">Shop Only Category</a>
                                                            </li>
                                                            <li><a href="shop-offcanvas-sidebar-left.html">Shop offcanvas
                                                                    Left</a></li>
                                                            <li><a href="shop-offcanvas-sidebar-right.html">Shop offcanvas
                                                                    Right</a></li>
                                                            <li><a href="shop-offcanvas-sidebar-top.html">Shop offcanvas
                                                                    top</a></li>
                                                            <li><a href="shop-offcanvas-sidebar-bottom.html">Shop offcanvas
                                                                    Bottom</a></li>
                                                            <li><a href="shop-collapse-filter-bottom.html">Shop Filter
                                                                    Collapse Bottom</a></li>
                                                            <li><a href="shop-collapse-filter-left.html">Shop Filter
                                                                    Collapse Left</a></li>
                                                            <li><a href="shop-collapse-filter-right.html">Shop Filter
                                                                    Collapse Right</a></li>
                                                            <li><a href="products-show-progressbar-shop.html">Products Show
                                                                    Progress-bar</a></li>
                                                            <li><a href="products-show-countdown-shop.html">Products Show
                                                                    Countdown</a></li>
                                                            <li><a href="#!">Infinite Scroll
                                                                    <div
                                                                        class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                                        Coming Soon
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li><a href="#!">Shop Classic
                                                                    <div
                                                                        class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
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
                                        <a href="#!">Bath & Body <i class="fa-regular fa-chevron-down"></i></a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu rbt-width-fullscreen mega-has-bg-img mega-bg-one p-0 ">
                                            <!-- Start Mega Menu  -->
                                            <div class="rbt-megamenu-wrapper bg-transparent">
                                                <div class="wrapper">
                                                    <div class="row row--12 mt_dec--12">
                                                        <div class="col-xl-9">
                                                            <div class="h-100 d-flex flex-column justify-content-between">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">Inner Pages</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="contact.html">Contact Page One</a>
                                                                            </li>
                                                                            <li><a href="about.html">About Us One</a></li>
                                                                            <li><a href="faq-page-01.html">FAQs One</a>
                                                                            </li>
                                                                            <li><a href="contact-two.html">Contact Page
                                                                                    Two</a></li>
                                                                            <li><a href="about-two.html">About Us Two</a>
                                                                            </li>
                                                                            <li><a href="contact-four.html">Contact Page
                                                                                    Four</a></li>
                                                                            <li><a href="faq-page-02.html">FAQs Two</a>
                                                                            </li>
                                                                            <li><a href="find-store.html">Find A Store</a>
                                                                            </li>
                                                                            <li><a href="compare-product.html">Compare
                                                                                    Products</a></li>
                                                                            <li><a href="compare-empty-page.html">Compare
                                                                                    Empty</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">Inner Pages</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="team-page-one.html">Team One</a>
                                                                            </li>
                                                                            <li><a href="team-page-two.html">Team Two</a>
                                                                            </li>
                                                                            <li><a href="team-page-three.html">Team
                                                                                    Three</a></li>
                                                                            <li><a href="team-page-four.html">Team Four</a>
                                                                            </li>
                                                                            <li><a href="privacy-policy.html">Privacy
                                                                                    Policy</a></li>
                                                                            <li><a href="error-404.html">Error 404</a></li>
                                                                            <li><a
                                                                                    href="error-maintanance.html">Maintanace</a>
                                                                            </li>
                                                                            <li><a href="portfolio-default.html">Portfolio
                                                                                    Default</a></li>
                                                                            <li><a
                                                                                    href="portfolio-grid-layout-full-width.html">Portfolio
                                                                                    Full Width</a></li>
                                                                            <li><a href="portfolio-details.html">Portfolio
                                                                                    Details</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">Inner Pages</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="blog-default.html">Blog
                                                                                    Default</a></li>
                                                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                                                            <li><a href="blog-sidebar.html">Blog
                                                                                    Sidebar</a></li>
                                                                            <li><a href="blog-modern.html">Blog Modern</a>
                                                                            </li>
                                                                            <li><a href="blog-infinite-scroll.html">Blog
                                                                                    Infinite Scroll</a></li>
                                                                            <li><a href="blog-load-more.html">Blog
                                                                                    load-more</a></li>
                                                                            <li><a href="blog-single.html">Blog Details</a>
                                                                            </li>
                                                                            <li><a href="brand-list.html">Brand List</a>
                                                                            </li>
                                                                            <li><a href="#!">Blog Timeline
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                                                        Coming
                                                                                    </div>
                                                                                </a></li>
                                                                            <li><a href="#!">Blog Gallery
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                                                        Coming
                                                                                    </div>
                                                                                </a></li>

                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">Shop User Pages</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="my-order-history.html">Order
                                                                                    History</a></li>
                                                                            <li><a href="my-wishlist.html">Wishlist</a>
                                                                            </li>
                                                                            <li><a href="my-payment-methods.html">Payment
                                                                                    Methods</a></li>
                                                                            <li><a href="account-info.html">Personal
                                                                                    info</a></li>
                                                                            <li><a
                                                                                    href="account-notifications.html">Notifications</a>
                                                                            </li>
                                                                            <li><a href="help-center.html">User Help
                                                                                    Center</a></li>
                                                                            <li><a href="terms-policy.html">Terms and
                                                                                    conditions</a></li>
                                                                            <li><a href="signin.html">Sign In</a></li>
                                                                            <li><a href="signup.html">Sign Up</a></li>
                                                                            <li><a href="#!">Membership Details
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-success border-rounded">
                                                                                        Coming
                                                                                    </div>
                                                                                </a>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-lg-1-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">E-commerce</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="cart.html">Cart Page</a></li>
                                                                            <li><a href="return-policy.html">
                                                                                    Return Policy
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                                                        New
                                                                                    </div>
                                                                                </a></li>
                                                                            <li><a href="wishlist.html">Wishlist Page</a>
                                                                            </li>
                                                                            <li><a href="checkout-delivery-step-one.html">Checkout
                                                                                    Page</a></li>
                                                                            <li><a href="checkout-delivery-step-two.html">Checkout
                                                                                    Delivary Info</a></li>
                                                                            <li><a href="checkout-payment.html">Checkout
                                                                                    Payment</a></li>
                                                                            <li><a href="checkout-shipping.html">Checkout
                                                                                    Shipping</a></li>
                                                                            <li><a href="checkout-thankyou.html">Thank
                                                                                    You</a></li>
                                                                            <li><a href="categories-list.html">Categories
                                                                                    List</a></li>
                                                                            <li><a href="offer-list-page.html">Offer
                                                                                    List</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <hr
                                                                            class="rbt-separator rbt-separator-gray200 mb--16 mt--16 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <ul
                                                                            class="rbt-nav-brand-list liststyle d-flex justify-content-xl-between">
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-01.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-02.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-03.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-04.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-05.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-06.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-07.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-01.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-02.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
                                                                            <li><a href="shop-by-brands.html"><img
                                                                                        src="{{ asset('assets/images/brands/brand-a-03.webp') }}"
                                                                                        alt="Ecommerce Brand Image"></a>
                                                                            </li>
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
                                        <a href="#!">Hair Care <i class="fa-regular fa-chevron-down"></i></a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu container pl_sm--0 pl_md--0 pl_lg--0">
                                            <div class="rbt-megamenu-wrapper">
                                                <div class="row row--12 d-flex justify-content-between">
                                                    <div class="col-xl-9">
                                                        <div class="h-100 d-flex flex-column justify-content-between">
                                                            <div class="row row--12">
                                                                <div
                                                                    class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                                    <p class="rbt-short-title h5">Base Elements</p>
                                                                    <ul class="mega-menu-item">
                                                                        <li><a href="element-titles.html">Title Styles</a>
                                                                        </li>
                                                                        <li><a href="element-carousels.html">Carosels
                                                                                Styles</a></li>
                                                                        <li><a href="element-sliders.html">Sliders
                                                                                Styles</a></li>
                                                                        <li><a href="element-product-banner.html">Banner
                                                                                Styles</a></li>
                                                                        <li><a href="element-button.html">Button Styles</a>
                                                                        </li>
                                                                        <li><a href="element-brands.html">Brands Styles</a>
                                                                        </li>
                                                                        <li><a href="element-list-styles.html">List
                                                                                Styles</a></li>
                                                                        <li><a href="#!">Icon Box Styles
                                                                                <div
                                                                                    class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                                                    Coming
                                                                                </div>
                                                                            </a></li>
                                                                    </ul>
                                                                </div>
                                                                <div
                                                                    class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                                    <p class="rbt-short-title h5">Template Elements</p>
                                                                    <ul class="mega-menu-item">
                                                                        <li><a href="element-hotspot-styles.html">Hotspot
                                                                                Styles</a></li>
                                                                        <li><a href="element-countdown-styles.html">Countdown
                                                                                Styles</a></li>
                                                                        <li><a href="element-insta-post.html">Instagram
                                                                                Posts</a></li>
                                                                        <li><a href="element-products.html">Product Card
                                                                                Styles</a></li>
                                                                        <li><a href="element-catagories-style.html">Catagories
                                                                                Card Styles</a></li>
                                                                        <li><a href="element-video-styles.html">Video
                                                                                Styles</a></li>
                                                                        <li><a href="element-header-styles.html">Header
                                                                                Styles</a></li>
                                                                        <li><a href="element-footer-styles.html">Footer
                                                                                Styles</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div
                                                                    class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                                    <p class="rbt-short-title h5">Template Elements</p>
                                                                    <ul class="mega-menu-item">
                                                                        <li><a href="element-table-styles.html">Table
                                                                                Styles</a></li>
                                                                        <li><a href="element-social-buttons.html">Social
                                                                                Buttons</a></li>
                                                                        <li><a href="element-image-gallary.html">Image
                                                                                Gallary</a></li>
                                                                        <li><a href="element-team-styles.html">Team Card
                                                                                Styles</a></li>
                                                                        <li><a href="element-accordion-styles.html">Accordion
                                                                                Styles</a></li>
                                                                        <li><a href="element-portfolio-styles.html">PortFolio
                                                                                Card Styles</a></li>
                                                                        <li><a href="element-blog-styles.html">Blog Card
                                                                                Styles</a></li>
                                                                        <li><a href="element-review-card.html">Review
                                                                                Cards</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div
                                                                    class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                                    <p class="rbt-short-title h5">E-Commerce</p>
                                                                    <ul class="mega-menu-item">
                                                                        <li><a href="element-recent-products.html">Recent
                                                                                Products</a></li>
                                                                        <li><a href="element-featured-products.html">Featured
                                                                                Products</a></li>
                                                                        <li><a href="element-best-selling-products.html">Best
                                                                                Selling Products</a></li>
                                                                        <li><a href="element-single-product.html">Single
                                                                                Product</a></li>
                                                                        <li><a href="element-sale-products.html">Sale
                                                                                Products</a></li>
                                                                        <li><a href="element-pricing.html">Pricing
                                                                                Styles</a></li>
                                                                        <li><a href="element-cart.html">Cart Styles</a>
                                                                        </li>
                                                                        <li><a href="#">Order Tracking
                                                                                <div
                                                                                    class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                                                    Coming
                                                                                </div>
                                                                            </a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row row--12 d-none d-xl-flex">
                                                                <div class="col-12">
                                                                    <hr
                                                                        class="rbt-separator rbt-separator-gray200 mb--16 mt--16 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <ul
                                                                        class="rbt-nav-brand-list liststyle d-flex justify-content-xl-between">
                                                                        <li><a href="shop-by-brands.html"><img
                                                                                    src="{{ asset('assets/images/brands/brand-a-01.webp') }}"
                                                                                    alt="Ecommerce Brand Image"></a></li>
                                                                        <li><a href="shop-by-brands.html"><img
                                                                                    src="{{ asset('assets/images/brands/brand-a-02.webp') }}"
                                                                                    alt="Ecommerce Brand Image"></a></li>
                                                                        <li><a href="shop-by-brands.html"><img
                                                                                    src="{{ asset('assets/images/brands/brand-a-03.webp') }}"
                                                                                    alt="Ecommerce Brand Image"></a></li>
                                                                        <li><a href="shop-by-brands.html"><img
                                                                                    src="{{ asset('assets/images/brands/brand-a-04.webp') }}"
                                                                                    alt="Ecommerce Brand Image"></a></li>
                                                                        <li><a href="shop-by-brands.html"><img
                                                                                    src="{{ asset('assets/images/brands/brand-a-05.webp') }}"
                                                                                    alt="Ecommerce Brand Image"></a></li>
                                                                        <li><a href="shop-by-brands.html"><img
                                                                                    src="{{ asset('assets/images/brands/brand-a-06.webp') }}"
                                                                                    alt="Ecommerce Brand Image"></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                        <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-two">
                                                            <div class="mega-top-banner">
                                                                <div
                                                                    class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                                                                    <div class="rbt-banner-content">
                                                                        <h2 class="title rbt-text-color-white">New Aurora
                                                                            Watch</h2>
                                                                        <p class="b3 desc rbt-text-color-gray-200">Send
                                                                            your idea, appear Unimart.</p>
                                                                    </div>
                                                                    <a class="rbt-btn rbt-btn-sm" href="#">View
                                                                        Details</a>
                                                                    <a href="#"
                                                                        class="product-img position-bottom mt--24"><img
                                                                            src="{{ asset('assets/images/splash/menu-banner/menu-prd-03-lg.webp') }}"
                                                                            alt="Eccommerce Product"></a>
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
                                        <a href="#!">BABY CARE <i class="fa-regular fa-chevron-down"></i></a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu p-0 container">
                                            <!-- Start Mega Menu  -->
                                            <div class="rbt-megamenu-wrapper p--0">
                                                <div class="wrapper">
                                                    <div class="row row--0 mt_dec--32">
                                                        <div
                                                            class="col-xl-8 mt--24 rbt-scroll-trigger zoom_in animation-order-2">
                                                            <div
                                                                class="rbt-inner-menu-wrapper p--24 p_sm--0 p_md--0 p_lg--0">
                                                                <div class="row row-12 mt_dec--16">
                                                                    <div
                                                                        class="col-12 col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">Ultimate User
                                                                            Experience</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="customize-options.html">Easy to
                                                                                    Customize Codes</a></li>
                                                                            <li><a href="page-customizability.html">Highly
                                                                                    Customizable Elements</a></li>
                                                                            <li><a href="performance.html">Fast Performance
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-red border-rounded">
                                                                                        Hot
                                                                                    </div>
                                                                                </a></li>
                                                                            <li><a href="header-builder.html">Ultimate
                                                                                    Header Layouts</a></li>
                                                                            <li><a href="footer-builder.html">Excessive
                                                                                    Footer Variation</a></li>
                                                                            <li><a href="advanced-megamenu.html">Advanced
                                                                                    Mega Menu</a></li>
                                                                            <li><a href="popup-builder.html">Popup &
                                                                                    Sidebar Search</a></li>
                                                                            <li><a href="boost-features.html">All Boost
                                                                                    Sales Features
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                                                        New
                                                                                    </div>
                                                                                </a></li>
                                                                            <li><a href="mobile-first.html">Mobile-first
                                                                                    Experience</a></li>
                                                                            <li><a href="#!">User Feedback
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                                                        Coming
                                                                                    </div>
                                                                                </a></li>
                                                                            <li><a href="#!">Seamless Integration
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                                                        Coming
                                                                                    </div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">Flexible Shopping</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="product-filtering.html">Smart
                                                                                    Product Filtering</a></li>
                                                                            <li><a href="variant-switcher.html">Variant
                                                                                    Swatches
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-secondary border-rounded">
                                                                                        Fully Ready
                                                                                    </div>
                                                                                </a></li>
                                                                            <li><a href="compare-table-builder.html">Product
                                                                                    Compare</a></li>
                                                                            <li><a href="wishlist-builder.html">WishLists
                                                                                    Builder</a></li>
                                                                            <li><a href="quick-view.html">Quick View</a>
                                                                            </li>
                                                                            <li><a href="flash-sell-management.html">Flash
                                                                                    Sales Management</a></li>
                                                                            <li><a href="cart-builder.html">Cart Upsell
                                                                                    <div
                                                                                        class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                                                        New
                                                                                    </div>
                                                                                </a></li>
                                                                            <li><a href="size-chart-builder.html">Size
                                                                                    Chart Variation</a></li>
                                                                            <li><a href="sticky-cart-builder.html">Sticky
                                                                                    Add To Cart</a></li>
                                                                            <li><a href="product-display.html">Product
                                                                                    Video & 3D View</a></li>
                                                                            <li><a href="multi-step-checkout.html">Multi-Step
                                                                                    Checkout</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1 mt--16">
                                                                        <p class="rbt-short-title h5">Boost Sales</p>
                                                                        <ul class="mega-menu-item">
                                                                            <li><a href="notifications.html">Back To Stock
                                                                                    Notification</a></li>
                                                                            <li><a href="sales-popup.html">Sales Popup</a>
                                                                            </li>
                                                                            <li><a href="pre-order.html">Pre Order</a></li>
                                                                            <li><a href="backorder.html">Backorder</a></li>
                                                                            <li><a href="partial-payment.html">Partial
                                                                                    Payment</a></li>
                                                                            <li><a href="shareable-cart.html">Shareable
                                                                                    Cart</a></li>
                                                                            <li><a href="bulk-amount-purchase.html">Bulk
                                                                                    Amount Purchase</a></li>
                                                                            <li><a href="stock-progressbar.html">Stock
                                                                                    Progress Bar</a></li>
                                                                            <li><a href="sale-push-notification.html">Sales
                                                                                    Push Notification</a></li>
                                                                            <li><a href="offer-management.html">Special
                                                                                    Offers Management</a></li>
                                                                            <li><a href="free-shipping.html">Free Shipping
                                                                                    Threshold</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-xl-4 mt--24 single-mega-item rbt-scroll-trigger zoom_in animation-order-2">
                                                            <img class="h-100"
                                                                src="{{ asset('assets/images/header-bg/megamenu-banner-hr-01.webp') }}"
                                                                alt="Eccommerce Banner">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Mega Menu  -->
                                        </div>
                                        <!-- End Mega Menu  -->
                                    </li>

                                    <li class="has-dropdown position-relative">
                                        <a href="#!">Fragrance <i class="fa-regular fa-chevron-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="docs/index.htm">Documentation</a></li>
                                            <li><a href="https://www.youtube.com/@rainbow-themes/videos">Video
                                                    Tutorials</a></li>
                                            <li>
                                                <a href="https://support.rainbowit.net/support/login">
                                                    Support Center
                                                    <div
                                                        class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
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
                        <div class="tab-pane fade" id="rbt-tab-pane-mobilemenu-2" role="tabpanel"
                            aria-labelledby="rbt-tab-mobilemenu-2" tabindex="0">
                            <nav class="rbt-mainmenu-nav">
                                <ul class="mainmenu">
                                    <li class="with-rbt-megamenu has-menu-child-item position-static">
                                        <a href="shop-by-categories.html">
                                            <span><i
                                                    class="rbt-catagories-icon mr--8 fa-regular fa-house-chimney"></i></span>Home
                                            & Garden
                                            <span class="rbt-chevron-right"><i
                                                    class="fa-regular fa-chevron-right"></i></span>
                                        </a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu grid-item-5 pl_sm--0 pl_md--0 pl_lg--0">
                                            <div class="container p_sm--0 p_md--0 p_lg--0">
                                                <div class="rbt-megamenu-wrapper">
                                                    <!-- Start Card Area -->
                                                    <div class="row row--12">
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <p class="rbt-short-title h5">Home & Garden</p>
                                                            <ul class="mega-menu-item">
                                                                <li><a href="shop-by-category.html">Furniture</a></li>
                                                                <li><a href="shop-by-category.html">Living Room Sets</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Sofas & Couches</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Coffee Tables</a></li>
                                                                <li><a href="shop-by-category.html">Bedroom Furniture</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Mattresses &
                                                                        Bedding</a></li>
                                                                <li><a href="shop-by-category.html">Wardrobes & Storage</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <p class="rbt-short-title h5">More Home & Garden</p>
                                                            <ul class="mega-menu-item">
                                                                <li><a href="shop-by-category.html">Home Decor</a></li>
                                                                <li><a href="shop-by-category.html">Clocks & Mirrors</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Curtains & Blinds</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Rugs & Carpets</a></li>
                                                                <li><a href="shop-by-category.html">Lighting & Lamps</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Outdoor Furniture</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">BBQ & Grills</a></li>
                                                            </ul>
                                                        </div>
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div class="rbt-menu-offer-card">
                                                                <div class="mega-top-banner rbt-bg-color-extra-six">
                                                                    <div
                                                                        class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                                                                        <div class="rbt-banner-content">
                                                                            <h2 class="title">All For Garden</h2>
                                                                            <p class="b3 desc">Send your idea, appear
                                                                                Unimart.</p>
                                                                        </div>
                                                                        <a class="rbt-btn rbt-btn-sm rbt-btn-black"
                                                                            href="product-single-default.html">View
                                                                            Details</a>
                                                                        <a href="#"
                                                                            class="product-img position-bottom mt--24"><img
                                                                                src="{{ asset('assets/images/splash/menu-banner/menu-prd-garden.webp') }}"
                                                                                alt="Eccommerce Product"></a>
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
                                            <span><i
                                                    class="rbt-catagories-icon mr--8 fa-regular fa-mobile-notch"></i></span>Smart
                                            Phones
                                            <span class="rbt-chevron-right"><i
                                                    class="fa-regular fa-chevron-right"></i></span>
                                        </a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu grid-item-5 pl_sm--0 pl_md--0 pl_lg--0">
                                            <div class="container p_sm--0 p_md--0 p_lg--0">
                                                <div class="rbt-megamenu-wrapper">
                                                    <!-- Start Card Area -->
                                                    <div class="row row--12">
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <p class="rbt-short-title h5">Tablets & Accessories</p>
                                                            <ul class="mega-menu-item">
                                                                <li><a href="shop-by-category.html">Latest Tablets</a></li>
                                                                <li><a href="shop-by-category.html">Android Tablets</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">iPads</a></li>
                                                                <li><a href="shop-by-category.html">Tablet Keyboards</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Stylus Pens</a></li>
                                                                <li><a href="shop-by-category.html">Screen Protectors</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Tablet Cases</a></li>
                                                            </ul>
                                                        </div>
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-two">
                                                                <div class="mega-top-banner">
                                                                    <div
                                                                        class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                                                                        <div class="rbt-banner-content">
                                                                            <h2 class="title rbt-text-color-white">Apple 16
                                                                                Pro</h2>
                                                                            <p class="b3 desc rbt-text-color-gray-200">Send
                                                                                your idea,
                                                                                appear Unimart.</p>
                                                                        </div>
                                                                        <a class="rbt-btn rbt-btn-sm" href="#">View
                                                                            Details</a>
                                                                        <a href="#"
                                                                            class="product-img position-bottom mt--24"><img
                                                                                src="{{ asset('assets/images/splash/menu-banner/menu-prd-apple.webp') }}"
                                                                                alt="Eccommerce Product"></a>
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
                                            <span><i
                                                    class="rbt-catagories-icon mr--8 fa-regular fa-desktop"></i></span>Electronics
                                            Gadgets
                                            <span class="rbt-chevron-right"><i
                                                    class="fa-regular fa-chevron-right"></i></span>
                                        </a>
                                        <!-- Start Mega Menu  -->
                                        <div class="rbt-megamenu grid-item-5 pl_sm--0 pl_md--0 pl_lg--0">
                                            <div class="container p_sm--0 p_md--0 p_lg--0">
                                                <div class="rbt-megamenu-wrapper">
                                                    <!-- Start Card Area -->
                                                    <div class="row row--12">
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <p class="rbt-short-title h5">Wearable Tech</p>
                                                            <ul class="mega-menu-item">
                                                                <li><a href="shop-by-category.html">Smartwatches</a></li>
                                                                <li><a href="shop-by-category.html">Fitness Trackers</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">VR & AR Headsets</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Smart Glasses</a></li>
                                                                <li><a href="shop-by-category.html">Sleep Trackers</a></li>
                                                                <li><a href="shop-by-category.html">Wearable Cameras</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Wireless Earbuds</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <p class="rbt-short-title h5">Smart Home & Office</p>
                                                            <ul class="mega-menu-item">
                                                                <li><a href="shop-by-category.html">Smart Speakers</a></li>
                                                                <li><a href="shop-by-category.html">Smart Plugs &
                                                                        Lights</a></li>
                                                                <li><a href="shop-by-category.html">Home Security
                                                                        Systems</a></li>
                                                                <li><a href="shop-by-category.html">Streaming Devices</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">External Monitors</a>
                                                                </li>
                                                                <li><a href="shop-by-category.html">Portable Projectors</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div
                                                            class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
                                                            <div
                                                                class="rbt-menu-offer-card rbt-bg-color-brand-50 rbt-rounded--12">
                                                                <div class="mega-top-banner">
                                                                    <div
                                                                        class="rbt-banner-inner flex-column justify-content-center rbt-gap--8 align-items-center text-center">
                                                                        <div class="rbt-banner-content">
                                                                            <h2 class="title">Straps of Colors</h2>
                                                                            <p class="b3 desc">Send your idea, appear
                                                                                Unimart.</p>
                                                                        </div>
                                                                        <a class="rbt-btn rbt-btn-sm rbt-btn-black"
                                                                            href="product-single-default.html">View
                                                                            Details</a>
                                                                        <a href="#"
                                                                            class="product-img position-bottom mt--24"><img
                                                                                src="{{ asset('assets/images/splash/menu-banner/menu-prd-02-lg.webp') }}"
                                                                                alt="Eccommerce Product"></a>
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
                                            <span><i
                                                    class="rbt-catagories-icon mr--8 fa-regular fa-shirt"></i></span>Fashion
                                            Wear
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-by-categories.html">
                                            <span><i
                                                    class="rbt-catagories-icon mr--8 fa-regular fa-camera"></i></span>Cameras
                                            &amp; Photo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-by-categories.html">
                                            <span><i
                                                    class="rbt-catagories-icon mr--8 fa-regular fa-cauldron"></i></span>Cooking
                                            Items
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-by-categories.html">
                                            <span><i
                                                    class="rbt-catagories-icon mr--8 fa-regular fa-heart-pulse"></i></span>Health
                                            &amp; Beauty
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
    <div class="rbt-cart-side-menu rbt-sidebar-cart">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="rbt-cart-header">
                    <div class="title-section">
                        <h2 class="title mb--0 h6"><i class="fa-sharp fa-regular fa-cart-shopping mr--12"></i> Your cart
                        </h2>
                    </div>
                    <div class="rbt-quick-info-tag d-flex mt--16 rbt-flash-animation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z"
                                fill="url(#paint0_linear_47_2365484)"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z"
                                fill="#FC9502"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z"
                                fill="#FCE202"></path>
                            <defs>
                                <lineargradient id="paint0_linear_47_2365484" x1="11.9995" y1="22.0148"
                                    x2="11.9995" y2="2.01511" gradientunits="userSpaceOnUse">
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
                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-10-a-1-hover.webp') }}"
                                        alt="Product Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title h6"><a href="product-single-default.html">JBL PartyBox 100W Speaker</a>
                                </h3>
                                <span class="quantity">1x <span class="price">Rs. 359.00</span></span>
                                <div class="bottom-part">
                                    <div class="rbt-qty-area">
                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="items-qty-input" value="01" min="1">
                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <button class="edit-btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
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
                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1-hover.webp') }}"
                                        alt="Product Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title h6"><a href="product-single-default.html">Apple Watch Ultra 2</a></h3>
                                <span class="quantity">1x <span class="price">Rs. 359.00</span></span>
                                <div class="bottom-part">
                                    <div class="rbt-qty-area">
                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="items-qty-input" value="01" min="1">
                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <button class="edit-btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
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
                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1-hover.webp') }}"
                                        alt="Product Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title h6"><a href="product-single-default.html">PlayStation Wireless
                                        Headphone</a>
                                </h3>
                                <span class="quantity">1x <span class="price">Rs. 759.00</span></span>
                                <div class="bottom-part">
                                    <div class="rbt-qty-area">
                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="items-qty-input" value="01" min="1">
                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <button class="edit-btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
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
                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-02-a-1-hover.webp') }}"
                                        alt="Product Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title h6"><a href="product-single-default.html">Awei CL-115M USB 2.4A Cable
                                    </a>
                                </h3>
                                <span class="quantity">1x <span class="price">Rs. 459.00</span></span>
                                <div class="bottom-part">
                                    <div class="rbt-qty-area">
                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="items-qty-input" value="01" min="1">
                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <button class="edit-btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
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
                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-03-a-1-hover.webp') }}"
                                        alt="Product Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title h6"><a href="product-single-default.html">MaxGreen 45W Power Adapter</a>
                                </h3>
                                <span class="quantity">1x <span class="price">Rs. 999.00</span></span>
                                <div class="bottom-part">
                                    <div class="rbt-qty-area">
                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="items-qty-input" value="01" min="1">
                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <button class="edit-btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
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
                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-05-a-1-hover.webp') }}"
                                        alt="Product Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title h6"><a href="product-single-default.html">Havit PB90 Power Bank </a></h3>
                                <span class="quantity">1x <span class="price">Rs. 288.00</span></span>
                                <div class="bottom-part">
                                    <div class="rbt-qty-area">
                                        <button class="qty-item-btn qty-item-btn-decr"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="items-qty-input" value="01" min="1">
                                        <button class="qty-item-btn qty-item-btn-incr"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <button class="edit-btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#quickviewEditCartModal"><i class="fa-regular fa-pen"></i>
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
                            <div
                                class="swiper rbt-dot-top-right inc-item-swiper-activation rbt-minicart-wrapper overflow-hidden">
                                <div class="swiper-wrapper">
                                    <!-- single slide -->
                                    <div class="swiper-slide">
                                        <div class="minicart-item">
                                            <div class="thumbnail">
                                                <a href="product-single-default.html">
                                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1-hover.webp') }}"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title h6"><a href="product-single-default.html">Keurig K-Duo 4K
                                                        Waterproof Action
                                                        Video Camera </a></h3>
                                                <span class="quantity"><span class="price">Rs. 345.00</span></span>
                                            </div>
                                            <a href="#!" class="add-itembtn tooltips" data-bs-toggle="modal"
                                                data-bs-target="#addedcartModal" data-tooltip="Add to Cart"><i
                                                    class="fa-regular fa-cart-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- single slide -->
                                    <div class="swiper-slide">
                                        <div class="minicart-item">
                                            <div class="thumbnail">
                                                <a href="product-single-default.html">
                                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-06-a-1-hover.webp') }}"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title h6"><a href="product-single-default.html">Full Amoled HD
                                                        Streaming Webcam</a>
                                                </h3>
                                                <span class="quantity"><span class="price">Rs. 189.00</span></span>
                                            </div>
                                            <a href="#!" class="add-itembtn tooltips" data-bs-toggle="modal"
                                                data-bs-target="#addedcartModal" data-tooltip="Add to Cart"><i
                                                    class="fa-regular fa-cart-plus"></i></a>
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
                    <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
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
                        <button data-bs-toggle="modal" data-bs-target="#socialShareModal" type="button"
                            class="share-btn"><i class="fa-sharp fa-solid fa-link mr--4"></i> Share Cart</button>
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
                    <form>
                        <div class="rbt-input-field-grp mb--12">
                            <textarea class="rbt-text-field" name="message"
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                        <div class="rbt-btn-group mt--16">
                            <button class="rbt-btn rbt-btn-md rbt-btn-primary d-block w-100">Apply</button>
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
                            <div class="rbt-dropdown-select filter-select rbt-modern-select search-by-category">
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
                            <button class="rbt-btn rbt-btn-md rbt-btn-primary d-block w-100">Calculate shipping
                                rates</button>
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
                                    <p class="rbt-coupon-info-sub-title b3 mt--4">For orders over Rs. 9.90</p>
                                    <ul class="rbt-coupon-info-list mt--12">
                                        <li><span>12/18/2023 14:00 ~ 12/25/2023 14:00</span></li>
                                        <li><span>The minimum spend for this coupon <strong>Rs. 200.00</strong></span></li>
                                    </ul>
                                </div>
                                <button class="copy-icon rbt-round-btn rbt-bg-primary rbt-copy-btn" data-tooltip="Copy">
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
                                    <p class="rbt-coupon-info-sub-title b3 mt--4">For orders over Rs. 9.90</p>
                                    <ul class="rbt-coupon-info-list mt--12">
                                        <li><span>12/18/2023 14:00 ~ 12/25/2023 14:00</span></li>
                                        <li><span>The minimum spend for this coupon <strong>Rs. 200.00</strong></span></li>
                                    </ul>
                                </div>
                                <button class="copy-icon rbt-round-btn rbt-bg-primary rbt-copy-btn" data-tooltip="Copy">
                                    <i class="fa-sharp fa-regular fa-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="rbt-input-field-grp mt--24">
                            <p class="b1 mb--12 rbt-text-color-gray-600">If you have coupon code, please apply it below.
                            </p>
                            <input type="text" placeholder="Coupon code">
                        </div>
                        <div class="rbt-btn-group mt--16">
                            <button class="rbt-btn rbt-btn-md rbt-btn-primary d-block w-100">Apply</button>
                            <button
                                class="rbt-btn rbt-btn-md rbt-btn-naked d-block w-100 mt--8 mb--8 rbt-popup-close-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Side Nav -->
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

                        <div class="rbt-sidebar-tabs-wrapper">
                            <div class="rbt-sidebar-tabs-inner">
                                <!-- Start tabs -->
                                <ul class="rbt-sidebar-sub-categories nav flex-column nav-pills" id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    <li>
                                        <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-1"
                                            data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-1" type="button"
                                            role="tab" aria-controls="rbt-nav-pill-1" aria-selected="true">
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
                                        <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-2"
                                            data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-2" type="button"
                                            role="tab" aria-controls="rbt-nav-pill-2" aria-selected="false">
                                            <span class="rbt-round-btn">
                                                <i class="fa-regular fa-watch-apple"></i>
                                            </span>
                                            <span class="rbt-content">
                                                <span class="rbt-sub-category-title">
                                                    <span>All Watches</span>
                                                    <span
                                                        class="rbt-product-badge rbt-product-badge-bg-primary">EXCLUSIVE</span>
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
                                        <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-3"
                                            data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-3" type="button"
                                            role="tab" aria-controls="rbt-nav-pill-3" aria-selected="false">
                                            <span class="rbt-round-btn">
                                                <i class="fa-sharp fa-regular fa-camcorder"></i>
                                            </span>
                                            <span class="rbt-content">
                                                <span class="rbt-sub-category-title">
                                                    <span>TVs, Audio-Video</span>
                                                </span>
                                                <span class="description">Top TVs, Audio-Videothe most famous
                                                    brands</span>
                                            </span>
                                            <span class="icon">
                                                <i class="fa-regular fa-chevron-right"></i>
                                            </span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-4"
                                            data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-4" type="button"
                                            role="tab" aria-controls="rbt-nav-pill-4" aria-selected="false">
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
                                        <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-5"
                                            data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-5" type="button"
                                            role="tab" aria-controls="rbt-nav-pill-5" aria-selected="false">
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
                                        <button class="rbt-nav-link nav-link" id="rbt-tab-cat-sidebar-6"
                                            data-bs-toggle="pill" data-bs-target="#rbt-nav-pill-6" type="button"
                                            role="tab" aria-controls="rbt-nav-pill-6" aria-selected="false">
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
                                                <a data-bs-toggle="collapse" href="#collapseExample" role="button"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Quick Links
                                                    <span class="icon"><i
                                                            class="fa-regular fa-chevron-down"></i></span>
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
                                                <a data-bs-toggle="collapse" href="#collapseExample2" role="button"
                                                    aria-expanded="false" aria-controls="collapseExample2">
                                                    More Links
                                                    <span class="icon"><i
                                                            class="fa-regular fa-chevron-down"></i></span>
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
                                    <a class="rbt-contact-links"
                                        href="/cdn-cgi/l/email-protection#84e0e1e9ebc4e1fce5e9f4e8e1aae7ebe9"><span
                                            class="__cf_email__"
                                            data-cfemail="8befeee6e4cbeef3eae6fbe7eea5e8e4e6">[email&#160;protected]</span></a>
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
                            <div class="rbt-tab-content tab-pane fade show active" id="rbt-nav-pill-1" role="tabpanel"
                                aria-labelledby="rbt-tab-cat-sidebar-1" tabindex="0">
                                <div class="rbt-sub-category-products">
                                    <div class="rbt-category-products-inner">

                                        <!-- Start product singel -->
                                        <div class="rbt-sub-category-product">
                                            <a href="#" class="rbt-sidebar-category-img">
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-7.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Action Camera</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-8.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Camera lenses</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-9.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Digital Camera</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-10.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">DSLR</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-11.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Handycam</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-12.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Mirrorless Camera</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-13.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Dash Cam</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-14.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Video Camera</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-15.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Instant Camera</a></h2>
                                            <ul class="rbt-product-features has-link-underline-effect">
                                                <li><a href="shop-by-category.html">Compact Camcorders</a></li>
                                                <li><a href="shop-by-category.html">High Definition (HD) Camcorders</a>
                                                </li>
                                                <li><a href="shop-by-category.html">Panoramic</a></li>
                                            </ul>
                                        </div>
                                        <!-- End product singel -->
                                        <!-- Start product singel -->
                                        <div class="rbt-sub-category-product">
                                            <a href="#" class="rbt-sidebar-category-img">
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-16.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Camera Accessories</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-17.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Camera Tripod</a></h2>
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
                                            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}"
                                                alt="Banner Image">
                                        </div>
                                        <div class="rbt-sidebar-banner-content">
                                            <p class="rbt-sidebar-banner-text">Camera Accessories
                                                <span class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                                                    December</span>
                                            </p>
                                            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span
                                                    class="rbt-text-regular">On All Brands</span>
                                            </h2>
                                            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
                                        </div>
                                    </div>
                                    <!-- End banner -->

                                </div>
                            </div>
                            <!-- End single Category Tab content -->

                            <!-- Start single Category Tab content -->
                            <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-2" role="tabpanel"
                                aria-labelledby="rbt-tab-cat-sidebar-2" tabindex="0">
                                <div class="rbt-sub-category-products">
                                    <div class="rbt-category-products-inner">

                                        <!-- Start product singel -->
                                        <div class="rbt-sub-category-product">
                                            <a href="#" class="rbt-sidebar-category-img">
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-1.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Fitness Tracker</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-2.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Bluetooth</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-3.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Hybrid</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-4.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Regular</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-5.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Touchscreen</a></h2>
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
                                            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}"
                                                alt="Banner Image">
                                        </div>
                                        <div class="rbt-sidebar-banner-content">
                                            <p class="rbt-sidebar-banner-text">Starting From <span
                                                    class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                                                    December</span></p>
                                            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span
                                                    class="rbt-text-regular">On All Brands</span>
                                            </h2>
                                            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
                                        </div>
                                    </div>
                                    <!-- End banner -->

                                </div>
                            </div>
                            <!-- End single Category Tab content -->

                            <!-- Start single Category Tab content -->
                            <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-3" role="tabpanel"
                                aria-labelledby="rbt-tab-cat-sidebar-3" tabindex="0">
                                <div class="rbt-sub-category-products">
                                    <div class="rbt-category-products-inner">

                                        <!-- Start product singel -->
                                        <div class="rbt-sub-category-product">
                                            <a href="#" class="rbt-sidebar-category-img">
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-18.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">QLED TV</a></h2>
                                            <ul class="rbt-product-features has-link-underline-effect">
                                                <li>
                                                    <a href="shop-by-categories.html"
                                                        class="rbt-underline-btn btn-white">
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-19.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Smart TV</a></h2>
                                            <ul class="rbt-product-features has-link-underline-effect">
                                                <li>
                                                    <a href="shop-by-categories.html"
                                                        class="rbt-underline-btn btn-white">
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-20.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">UHD TV</a></h2>
                                            <ul class="rbt-product-features has-link-underline-effect">
                                                <li>
                                                    <a href="shop-by-categories.html"
                                                        class="rbt-underline-btn btn-white">
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-21.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">HD TV</a></h2>
                                            <ul class="rbt-product-features has-link-underline-effect">
                                                <li>
                                                    <a href="shop-by-categories.html"
                                                        class="rbt-underline-btn btn-white">
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-22.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">LED TV</a></h2>
                                            <ul class="rbt-product-features has-link-underline-effect">
                                                <li>
                                                    <a href="shop-by-categories.html"
                                                        class="rbt-underline-btn btn-white">
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-23.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">4K TV</a></h2>
                                            <ul class="rbt-product-features has-link-underline-effect">
                                                <li>
                                                    <a href="shop-by-categories.html"
                                                        class="rbt-underline-btn btn-white">
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
                                            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}"
                                                alt="Banner Image">
                                        </div>
                                        <div class="rbt-sidebar-banner-content">
                                            <p class="rbt-sidebar-banner-text">Starting From <span
                                                    class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                                                    December</span></p>
                                            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span
                                                    class="rbt-text-regular">On All Brands</span>
                                            </h2>
                                            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
                                        </div>
                                    </div>
                                    <!-- End banner -->

                                </div>
                            </div>
                            <!-- End single Category Tab content -->

                            <!-- Start single Category Tab content -->
                            <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-4" role="tabpanel"
                                aria-labelledby="rbt-tab-cat-sidebar-4" tabindex="0">
                                <div class="rbt-sub-category-products">
                                    <div class="rbt-category-products-inner">

                                        <!-- Start product singel -->
                                        <div class="rbt-sub-category-product">
                                            <a href="#" class="rbt-sidebar-category-img">
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-24.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Gaming Keyboard</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-25.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Gaming Headset</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-26.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Gaming Chair</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-27.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Mouse Pads</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-28.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Joystick</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-29.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">VR headset</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-30.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">PlayStation Acce...</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-31.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Gaming Desk</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-32.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Gaming Sofa</a></h2>
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
                                            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}"
                                                alt="Banner Image">
                                        </div>
                                        <div class="rbt-sidebar-banner-content">
                                            <p class="rbt-sidebar-banner-text">Starting From <span
                                                    class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                                                    December</span></p>
                                            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span
                                                    class="rbt-text-regular">On All Brands</span>
                                            </h2>
                                            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
                                        </div>
                                    </div>
                                    <!-- End banner -->

                                </div>
                            </div>
                            <!-- End single Category Tab content -->

                            <!-- Start single Category Tab content -->
                            <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-5" role="tabpanel"
                                aria-labelledby="rbt-tab-cat-sidebar-5" tabindex="0">
                                <div class="rbt-sub-category-products">

                                    <div class="rbt-category-products-inner">
                                        <!-- Start product singel -->
                                        <div class="rbt-sub-category-product">
                                            <a href="#" class="rbt-sidebar-category-img">
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-33.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Bluetooth Headphone</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-34.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Headphone Stand</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-35.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Home Theater</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-36.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Bluetooth Speaker</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-37.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Soundbar</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-38.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Microphone</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-39.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Voice Recorder</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-40.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Sound Card</a></h2>
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
                                            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}"
                                                alt="Banner Image">
                                        </div>
                                        <div class="rbt-sidebar-banner-content">
                                            <p class="rbt-sidebar-banner-text">Starting From <span
                                                    class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                                                    December</span></p>
                                            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span
                                                    class="rbt-text-regular">On All Brands</span>
                                            </h2>
                                            <a href="#" class="rbt-btn rbt-btn-sm">Know More</a>
                                        </div>
                                    </div>
                                    <!-- End banner -->
                                </div>
                            </div>
                            <!-- End single Category Tab content -->

                            <!-- Start single Category Tab content -->
                            <div class="rbt-tab-content tab-pane fade" id="rbt-nav-pill-6" role="tabpanel"
                                aria-labelledby="rbt-tab-cat-sidebar-6" tabindex="0">
                                <div class="rbt-sub-category-products">
                                    <div class="rbt-category-products-inner">
                                        <!-- Start product singel -->
                                        <div class="rbt-sub-category-product">
                                            <a href="#" class="rbt-sidebar-category-img">
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-41.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Air Conditioner</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-42.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Geyser</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-43.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Oven</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-44.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Air Fryer</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-45.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Washing Machine</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-46.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Sewing Machine</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-47.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Air Purifier</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-48.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Vacuum Cleaner</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-49.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Blender</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-50.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Cooker</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-51.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Iron</a></h2>
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
                                                <img src="{{ asset('assets/images/product-img/sidebar-category/category-product-52.webp') }}"
                                                    alt="Product Image">
                                            </a>
                                            <h2 class="rbt-category-offcanvas-header h5"><a
                                                    href="shop-by-categories.html">Mini Heater</a></h2>
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
                                            <img src="{{ asset('assets/images/product-img/sidebar-category/product-banner.webp') }}"
                                                alt="Banner Image">
                                        </div>
                                        <div class="rbt-sidebar-banner-content">
                                            <p class="rbt-sidebar-banner-text">Starting From <span
                                                    class="rbt-text-color-primary rbt-text-semi-bold ml--4">11th
                                                    December</span></p>
                                            <h2 class="rbt-sidebar-banner-titile h4">Up to 40% Off <span
                                                    class="rbt-text-regular">On All Brands</span>
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



    <div class="nbc-home-sections">
        <!-- Start Component Area -->
        <div class="rbt-component-area rbt-products-banner-area rbt-bg-color-white nbc-home-hero">
            <div class="wrapper nbc-hero-wrapper">
                @php
                    $heroBanners = [
                        asset('assets/images/nbc/banner1.jpg'),
                        asset('assets/images/nbc/banner2.jpg'),
                        asset('assets/images/nbc/banner3.jpg'),
                        asset('assets/images/nbc/banner4.jpg'),
                        asset('assets/images/nbc/banner5.jpg'),
                    ];
                @endphp

                <div id="nbcHeroBanner"
                    class="rbt-product-banner rbt-product-banner-style-four rbt-product-banner-style-four-hv-one rbt-hero-banner rbt-banner-four-var-two rbt-banner-four-var-two-medium rbt-bg-color-brand-100 rbt-scroll-trigger fade_in animation-order-3 nbc-hero-banner"
                    style="background-image: url('{{ asset('assets/images/nbc/banner1.jpg') }}')">
                    <div class="nbc-hero-slides" aria-hidden="true">
                        @foreach ($heroBanners as $index => $banner)
                            <img class="nbc-hero-slide{{ $index === 0 ? ' is-active' : '' }}"
                                src="{{ $banner }}" alt=""
                                @if ($index > 0) loading="lazy" @endif>
                        @endforeach
                    </div>
                    <div class="rbt-banner-inner">
                        <div
                            class="rbt-product-banner-content text-center p--72 p_sm--32 d-flex justify-content-center align-items-center">
                        </div>
                        <div class="rbt-product-img rbt-scroll-trigger zoom_in animation-order-3" aria-hidden="true">
                            <img src="{{ asset('assets/images/nbc/banner1.jpg') }}" alt="">
                        </div>
                    </div>
                    <button class="nbc-hero-arrow nbc-hero-arrow--previous" type="button"
                        aria-label="Previous banner">
                        <i class="fa-regular fa-chevron-left"></i>
                    </button>
                    <button class="nbc-hero-arrow nbc-hero-arrow--next" type="button" aria-label="Next banner">
                        <i class="fa-regular fa-chevron-right"></i>
                    </button>
                    <div class="nbc-hero-pagination" aria-label="Choose banner">
                        @foreach ($heroBanners as $index => $banner)
                            <button class="{{ $index === 0 ? 'is-active' : '' }}" type="button"
                                aria-label="Show banner {{ $index + 1 }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"></button>
                        @endforeach
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

                    <div class="col-lg-1-5 col-md-4 col-6 mt--24">
                        <div class="rbt-cat-box rbt-cat-box-5 variation-one rbt-scroll-trigger fade_in animation-order-1">
                            <div class="inner">
                                <div class="rbt-image-portion position-relative overflow-hidden">
                                    <a href="#">
                                        <img class="rbt-scroll-trigger zoom_in animation-order-1"
                                            src="{{ asset("assets/images/nbc/Nature's Secret/Lotus-Face-Wash.png") }}"
                                            alt="Skin care products">
                                    </a>
                                    <div class="rbt-right-corner-portion bottom--position">
                                        <div class="rbt-corner-portion-wrapper">
                                            <a href="#" class="rbt-card-link-btn"><i
                                                    class="fa-solid fa-arrow-up-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <p class="title">
                                        <a href="#">Skin Care</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1-5 col-md-4 col-6 mt--24">
                        <div class="rbt-cat-box rbt-cat-box-5 variation-one rbt-scroll-trigger fade_in animation-order-2">
                            <div class="inner">
                                <div class="rbt-image-portion position-relative overflow-hidden">
                                    <a href="#">
                                        <img class="rbt-scroll-trigger zoom_in animation-order-2"
                                            src="{{ asset('assets/images/nbc/Misumi/Romansu Soap.png') }}"
                                            alt="Body care products">
                                    </a>
                                    <div class="rbt-right-corner-portion bottom--position">
                                        <div class="rbt-corner-portion-wrapper">
                                            <a href="#" class="rbt-card-link-btn"><i
                                                    class="fa-solid fa-arrow-up-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <p class="title">
                                        <a href="#">Bath & Body</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-6 mt--24">
                        <div class="rbt-cat-box rbt-cat-box-5 variation-one rbt-scroll-trigger fade_in animation-order-2">
                            <div class="inner">
                                <div class="rbt-image-portion position-relative overflow-hidden">
                                    <a href="#">
                                        <img class="rbt-scroll-trigger zoom_in animation-order-2"
                                            src="{{ asset("assets/images/nbc/Nature's Secret/Anti Dandruff.png") }}"
                                            alt="Body care products">
                                    </a>
                                    <div class="rbt-right-corner-portion bottom--position">
                                        <div class="rbt-corner-portion-wrapper">
                                            <a href="#" class="rbt-card-link-btn"><i
                                                    class="fa-solid fa-arrow-up-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <p class="title">
                                        <a href="#">Hair Care</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1-5 col-md-4 col-6 mt--24">
                        <div class="rbt-cat-box rbt-cat-box-5 variation-one rbt-scroll-trigger fade_in animation-order-3">
                            <div class="inner">
                                <div class="rbt-image-portion position-relative overflow-hidden">
                                    <a href="#">
                                        <img class="rbt-scroll-trigger zoom_in animation-order-3"
                                            src="{{ asset('assets/images/nbc/Panda Baby/panda shampoo.png') }}"
                                            alt="Hair care products">
                                    </a>
                                    <div class="rbt-right-corner-portion bottom--position">
                                        <div class="rbt-corner-portion-wrapper">
                                            <a href="#" class="rbt-card-link-btn"><i
                                                    class="fa-solid fa-arrow-up-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <p class="title">
                                        <a href="#">Baby Care</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1-5 col-md-4 col-6 mt--24">
                        <div class="rbt-cat-box rbt-cat-box-5 variation-one rbt-scroll-trigger fade_in animation-order-4">
                            <div class="inner">
                                <div class="rbt-image-portion position-relative overflow-hidden">
                                    <a href="#">
                                        <img class="rbt-scroll-trigger zoom_in animation-order-4"
                                            src="{{ asset('assets/images/nbc/SUCSES/emerald perfume.png') }}"
                                            alt="Fragrances">
                                    </a>
                                    <div class="rbt-right-corner-portion bottom--position">
                                        <div class="rbt-corner-portion-wrapper">
                                            <a href="#" class="rbt-card-link-btn"><i
                                                    class="fa-solid fa-arrow-up-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <p class="title">
                                        <a href="#">Fragrances</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1-5 col-md-4 col-6 mt--24">
                        <div class="rbt-cat-box rbt-cat-box-5 variation-one rbt-scroll-trigger fade_in animation-order-5">
                            <div class="inner">
                                <div class="rbt-image-portion position-relative overflow-hidden">
                                    <a href="#">
                                        <img class="rbt-scroll-trigger zoom_in animation-order-1"
                                            src="{{ asset('assets/images/nbc/bundles1.png') }}"
                                            alt="Baby care products">
                                    </a>
                                    <div class="rbt-right-corner-portion bottom--position">
                                        <div class="rbt-corner-portion-wrapper">
                                            <a href="#" class="rbt-card-link-btn"><i
                                                    class="fa-solid fa-arrow-up-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <p class="title">
                                        <a href="#">Bundles</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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

        <!-- Start Component Area -->
        <div class="rbt-component-area rbt-products-area nbc-product-section">
            <div class="rbt-fullwidth-wrapper">
                <div class="rbt-gray-contain-box rbt-gray-contain-box-style-one rbt-bg-color-gray-light pt--80 pb--80">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12">
                                <div
                                    class="rbt-component-section-title rbt-gap--4 text-center border-0 p-0 align-items-center">
                                    <span
                                        class="rbt-card-subtitle b1 rbt-text-color-heading mt--0 rbt-scroll-trigger fade_in animation-order-1">Customer
                                        favourites</span>
                                    <h2 class="rbt-title rbt-scroll-trigger fade_in animation-order-2"><span
                                            class="rbt-bold--text">Shop our </span>best sellers</h2>

                                    <div class="mobile-horizontal-scroll-section">
                                        <div
                                            class="rbt-product-nav-section rbt-nav-effect-activation mt--12 rbt-scroll-trigger fade_in animation-order-2 justify-content-center">
                                            <ul class="rbt-product-nav-grp">
                                                <li><a href="#" class="rbt-product-nav active">Best Sellers</a>
                                                </li>
                                                <li><a href="#" class="rbt-product-nav">New Arrivals</a></li>
                                            </ul>
                                            <ul class="rbt-product-nav-grp">
                                                <li><a href="{{ route('shop') }}" class="rbt-product-nav">View All</a>
                                                </li>
                                            </ul>
                                            <span class="rbt-bg-highlight"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Start Card Area -->
                        <div class="row row--12 mt_dec--24">

                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset('assets/images/nbc/Niacinamide.png') }}"
                                                alt="Niacinamide Face Serum"></a>
                                        <div class="rbt-badge-wrapper rbt-content-top-left">
                                            <div class="rbt-product-badge rbt-product-badge-bg-secondary">SALE</div>
                                        </div>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+7 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Nature's
                                                Secret</a>
                                            <h2 class="rbt-card-title"><a
                                                    href="{{ route('product.details') }}">Niacinamide Face Serum</a>
                                            </h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 2,750.00</del>
                                                <span class="price-text">Rs. 2,450.00</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->

                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset("assets/images/nbc/Nature's Secret/Avocado-Body-Lotion.png") }}"
                                                alt="Avocado Body Lotion"></a>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+12 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Nature's
                                                Secret</a>
                                            <h2 class="rbt-card-title"><a
                                                    href="{{ route('product.details') }}">Avocado
                                                    Body Lotion</a></h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 295.00</del>
                                                <span class="price-text">Rs. 179.98</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->


                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset("assets/images/nbc/Nature's Secret/Carrot-Face-Wash.png") }}"
                                                alt="Carrot Face Wash"></a>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-c-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-c-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-c-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-c-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-c-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-c-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+9 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Nature's
                                                Secret</a>
                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Carrot
                                                    Face Wash</a></h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 295.00</del>
                                                <span class="price-text">Rs. 179.98</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->

                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset('assets/images/nbc/Misumi/Momo Perfume.png') }}"
                                                alt="Misumi Momo Perfume"></a>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-d-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-d-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-d-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-d-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-d-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-d-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+12 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Misumi</a>
                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Momo
                                                    Perfume</a></h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 295.00</del>
                                                <span class="price-text">Rs. 179.98</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->

                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset('assets/images/nbc/Selfie/Sweet Blossoms.png') }}"
                                                alt="Selfie Sweet Blossoms"></a>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-e-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-e-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-e-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-e-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-e-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-e-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+4 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Selfie</a>
                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Sweet
                                                    Blossoms</a></h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 295.00</del>
                                                <span class="price-text">Rs. 179.98</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->

                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset('assets/images/nbc/Misumi/Sakura Body Wash.png') }}"
                                                alt="Misumi Sakura Body Wash"></a>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-f-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-f-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-f-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-f-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-f-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-f-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+6 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Misumi</a>
                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Sakura
                                                    Body Wash</a></h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 295.00</del>
                                                <span class="price-text">Rs. 179.98</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->

                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset("assets/images/nbc/Nature's Secret/Perfume-Shampoo.png") }}"
                                                alt="Perfume Shampoo"></a>
                                        <div class="rbt-badge-wrapper rbt-content-top-left">
                                            <div class="rbt-product-badge rbt-product-badge-bg-secondary">SALE</div>
                                        </div>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-a-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+4 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Nature's
                                                Secret</a>
                                            <h2 class="rbt-card-title"><a
                                                    href="{{ route('product.details') }}">Perfume
                                                    Shampoo</a></h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 295.00</del>
                                                <span class="price-text">Rs. 179.98</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->

                            <!-- Start Single Card  -->
                            <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                                <div
                                    class="rbt-card rbt-product-card rbt-product-card-style-2 rounded--12 rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img top-rounded-md">
                                        <a href="{{ route('product.details') }}"><img
                                                class="rbt-scroll-trigger fade_in animation-order-1 rbt-prd-img"
                                                src="{{ asset('assets/images/nbc/Champion/Herbal Fresh Soap.png') }}"
                                                alt="Champion Herbal Fresh Soap"></a>
                                        <div class="rbt-badge-wrapper rbt-content-top-left">
                                            <div class="rbt-product-badge rbt-product-badge-bg-secondary">SALE</div>
                                        </div>
                                        <button
                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                            type="button" data-tooltip="Add to wishlist"
                                            data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <div class="rbt-card-body rbt-bg-color-white">
                                        <div class="rbt-card-top-content">
                                            <div class="rbt-product-switch-area">
                                                <ul class="rbt-switcher-product-list product-switcher-activation">
                                                    <li class="active"><a
                                                            class="rbt-switcher--prd rbt-switcher--prd-one"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-01.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-01.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-two"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-02.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-02.webp') }}"
                                                                alt="Product Image"></a></li>
                                                    <li><a class="rbt-switcher--prd rbt-switcher--prd-three"
                                                            data-src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-03.webp') }}"
                                                            href="#"><img
                                                                src="{{ asset('assets/images/product-img/beauty-product/beauty-product-new-hfour-b-03.webp') }}"
                                                                alt="Product Image"></a></li>
                                                </ul>
                                                <a class="prd-link-text" href="product-single-default.html">+2 More</a>
                                            </div>
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text mt--12">Champion</a>
                                            <h2 class="rbt-card-title"><a href="{{ route('product.details') }}">Herbal
                                                    Fresh Soap</a></h2>
                                            <div class="rbt-card-rating">
                                                <ul class="rbt-rating-icon-list">
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                    <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                </ul>
                                                <p class="rating-digit">(25)</p>
                                            </div>
                                            <div class="pricing-part">
                                                <del class="price-text">Rs. 295.00</del>
                                                <span class="price-text">Rs. 179.98</span>
                                                <span class="rbt-offer-badge">-30%</span>
                                            </div>
                                        </div>
                                        <div class="rbt-card-footer d-flex footer-content-btn">
                                            <a class="rbt-btn rbt-btn-sm has-left-icon rbt-cart-sidenav-activation"
                                                href="#"><i class="fa-regular fa-cart-shopping"></i> Add To
                                                Cart</a>
                                            <div class="rbt-quick-btn-grp has-mixup-midlayer">
                                                <button class="rbt-compare-btn rbt-quick-btn tooltips"
                                                    data-tooltip="Add to Compare" data-tooltip-position="top"
                                                    type="button"><i class="fa-regular fa-scale-balanced"></i></button>
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
                            <!-- End Single Card  -->

                        </div>
                        <!-- End Card Area -->

                    </div>
                </div>
            </div>
        </div>
        <!-- End Component Area -->

        <!-- Start Component Area -->
        <div class="rbt-component-area rbt-counterdown-area rbt-bg-color-white rbt-section-gapTop nbc-promotion-section">
            <div class="rbt-fullwidth-wrapper">

                <div
                    class="rbt-counterdown-section rbt-counterdown-section-style-two rbt-scroll-trigger zoom_in animation-order-1 rbt-bg-color-gray-100">
                    <div class="row row--0 justify-content-end">
                        <div class="col-xl-6 col-md-12 col-12">
                            <div>
                                <img src="{{ asset('assets/images/nbc/mb_banner1.jpg') }}"
                                    alt="Ecommerce Product Banner Image">
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12 col-12">
                            <div class="rbt-counterdown-content rbt-counterdown-content-right-position">
                                <p class="rbt-subtitle mb--0 rbt-scroll-trigger fade_in animation-order-1">Our Special
                                    Discount <span class="rbt-color-primary">11th December</span></p>
                                <h2 class="rbt-title rbt-scroll-trigger fade_in animation-order-2 rbt-text-regular"><span
                                        class="rbt-bold--text">Up to 20% Off</span> for Serum Range </h2>
                                <a class="rbt-btn rbt-scroll-trigger fade_in animation-order-3" href="#">Know
                                    More</a>
                                <div class="rbt-countdown-section d-flex mt--32">
                                    <div class="rbt-countdown-one cd-border-style rbt-countdown-lg bg-variation-black">
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
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Component Area -->

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
                                    <a class="rbt-btn-link rbt-text-color-primary d-flex rbt-text-medium rbt-gap--8 mt--8 justify-content-center rbt-scroll-trigger zoom_in animation-order-3"
                                        href="#">
                                        <span class="btn-text">View All Brands</span>
                                        <span class="btn-icon"><i
                                                class="fa-sharp fa-solid fa-arrow-up-right-from-square"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Start Brands Area -->
                        <div class="row row--12 mt_dec--60 nbc-brand-grid">
                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-1">
                                            <img src="{{ asset("assets/images/nbc/Nature's Secret/nature-secrets-logo.png") }}"
                                                alt="Nature's Secret">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm" href="shop-by-brands.html">
                                            <span class="btn-text">See 16 Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-2">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-2">
                                            <img src="{{ asset('assets/images/nbc/Misumi/misumi-logo.png') }}"
                                                alt="Misumi">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm" href="shop-by-brands.html">
                                            <span class="btn-text">See 32 Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-3">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-3">
                                            <img src="{{ asset('assets/images/nbc/Selfie/selfie-logo.png') }}"
                                                alt="Selfie">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm" href="shop-by-brands.html">
                                            <span class="btn-text">See 28 Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-4">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-4">
                                            <img src="{{ asset('assets/images/nbc/Panda Baby/panda-baby-logo.png') }}"
                                                alt="Panda Baby">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm" href="shop-by-brands.html">
                                            <span class="btn-text">See 64 Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-5">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-1">
                                            <img src="{{ asset('assets/images/nbc/Champion/champion-logo.png') }}"
                                                alt="Champion">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm" href="shop-by-brands.html">
                                            <span class="btn-text">See 48 Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-6">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-2">
                                            <img src="{{ asset('assets/images/nbc/Chandi Panda/chandi-panda-logo.png') }}"
                                                alt="Chandi Panda">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm"
                                            href="{{ route('shop', ['brand' => 'chandi-panda']) }}">
                                            <span class="btn-text">See Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-7">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-3">
                                            <img src="{{ asset('assets/images/nbc/Elithe/elithe-logo.png') }}"
                                                alt="Elithé">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm"
                                            href="{{ route('shop', ['brand' => 'elithe']) }}">
                                            <span class="btn-text">See Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="nbc-brand-item mt--60">
                                <div
                                    class="rbt-brand text-center style-three rbt-scroll-trigger fade_in animation-order-8">
                                    <div class="inner">
                                        <div class="brand-image rbt-scroll-trigger zoom_in animation-order-4">
                                            <img src="{{ asset('assets/images/nbc/Mydoc/mydoc-logo.png') }}"
                                                alt="Mydoc">
                                        </div>
                                        <a class="rbt-btn rbt-btn-secondary rbt-btn-sm"
                                            href="{{ route('shop', ['brand' => 'mydoc']) }}">
                                            <span class="btn-text">See Products</span>
                                            <span class="btn-icon"><i
                                                    class="fa-solid fa-arrow-up-right ml--4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

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




        @php
            $saleProducts = [
                [
                    'name' => 'Niacinamide Face Serum',
                    'brand' => "Nature's Secret",
                    'brand_slug' => 'natures-secret',
                    'image' => 'assets/images/nbc/Niacinamide.png',
                    'original_price' => 'Rs. 2,750.00',
                    'sale_price' => 'Rs. 2,450.00',
                    'discount' => 11,
                    'reviews' => 25,
                ],
                [
                    'name' => 'Sakura Body Wash',
                    'brand' => 'Misumi',
                    'brand_slug' => 'misumi',
                    'image' => 'assets/images/nbc/Misumi/Sakura Body Wash.png',
                    'original_price' => 'Rs. 1,290.00',
                    'sale_price' => 'Rs. 990.00',
                    'discount' => 23,
                    'reviews' => 18,
                ],
                [
                    'name' => 'Perfume Shampoo',
                    'brand' => "Nature's Secret",
                    'brand_slug' => 'natures-secret',
                    'image' => "assets/images/nbc/Nature's Secret/Perfume-Shampoo.png",
                    'original_price' => 'Rs. 1,450.00',
                    'sale_price' => 'Rs. 1,190.00',
                    'discount' => 18,
                    'reviews' => 21,
                ],
                [
                    'name' => 'Champion Herbal Fresh Soap',
                    'brand' => 'Champion',
                    'brand_slug' => 'champion',
                    'image' => 'assets/images/nbc/Champion/Herbal Fresh Soap.png',
                    'original_price' => 'Rs. 320.00',
                    'sale_price' => 'Rs. 275.00',
                    'discount' => 14,
                    'reviews' => 32,
                ],
            ];
        @endphp

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
                                            class="rbt-product-nav-section rbt-nav-effect-activation mt--12 rbt-scroll-trigger fade_in animation-order-2 justify-content-center">
                                            <ul class="rbt-product-nav-grp">
                                                <li><a href="#on-sale-products" class="rbt-product-nav active">On
                                                        Sale</a></li>
                                            </ul>
                                            <ul class="rbt-product-nav-grp">
                                                <li>
                                                    <a href="{{ route('shop', ['filter' => 'on-sale']) }}"
                                                        class="rbt-product-nav"
                                                        aria-label="View all products currently on sale">
                                                        View All
                                                    </a>
                                                </li>
                                            </ul>
                                            <span class="rbt-bg-highlight"></span>
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

        <!-- Start NBC Factory Story Area -->
        <section class="rbt-component-area nbc-story-section" aria-labelledby="nbc-story-title">
            <div class="rbt-fullwidth-wrapper">
                <div class="nbc-story-card">
                    <div class="nbc-story-copy rbt-scroll-trigger fade_in animation-order-1">
                        <span class="nbc-story-eyebrow">Nature's Beauty Creations Limited</span>
                        <h2 id="nbc-story-title">
                            An Award-Winning, World-Class,
                            <em>Eco-friendly Factory</em>
                        </h2>
                        <p class="nbc-story-lead">
                            We are honoured to be Sri Lanka’s most awarded, certified and environment-friendly cosmetics
                            manufacturer
                        </p>

                        <a class="nbc-story-link" href="https://palegoldenrod-squirrel-304943.hostingersite.com/"
                            target="_blank" rel="noopener">
                            Read More Of Our Story
                            <span class="nbc-story-link-icon" aria-hidden="true">
                                <i class="fa-solid fa-arrow-up-right"></i>
                            </span>
                        </a>
                    </div>

                    <div class="nbc-story-media rbt-scroll-trigger fade_in animation-order-2">
                        <div class="nbc-story-video" data-nbc-story-video>
                            <img src="https://img.youtube.com/vi/TpYrcp4VdDs/maxresdefault.jpg"
                                alt="A glimpse inside Nature's Beauty Creations" loading="lazy">
                            <button class="nbc-story-video-play" type="button"
                                aria-label="Play the Nature's Beauty Creations story video">
                                <i class="fa-solid fa-play" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const storyVideo = document.querySelector('[data-nbc-story-video]');
                const playButton = storyVideo?.querySelector('.nbc-story-video-play');

                playButton?.addEventListener('click', function() {
                    const iframe = document.createElement('iframe');
                    iframe.src =
                        'https://www.youtube.com/embed/TpYrcp4VdDs?autoplay=1&controls=0&rel=0&modestbranding=1';
                    iframe.title = "Sri Lanka's Greenest Cosmetics Manufacturer - Nature's Beauty Creations";
                    iframe.allow =
                        'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
                    iframe.referrerPolicy = 'strict-origin-when-cross-origin';
                    iframe.allowFullscreen = true;
                    storyVideo.replaceChildren(iframe);
                });
            });
        </script>
        <!-- End NBC Factory Story Area -->
    </div>



    <div class="rbt-comparison-message-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-2 col-xl-2">
                    <div class="rbt-compare-title">
                        <h2 class="h6">Compare Product</h2>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                viewbox="0 0 56 56" fill="none">
                                <path
                                    d="M28 7.5C25.0767 7.5 22.6975 9.88262 22.6975 12.8112C22.6936 13.7244 22.9272 14.6229 23.3755 15.4184C23.8237 16.214 24.4712 16.8793 25.2543 17.349C26.0823 17.8506 27.0319 18.1157 28 18.1157C28.9681 18.1157 29.9177 17.8506 30.7458 17.349C31.5289 16.8794 32.1764 16.2141 32.6247 15.4185C33.073 14.6229 33.3066 13.7244 33.3025 12.8112C33.3025 9.88262 30.9234 7.5 28 7.5ZM35.1392 42.6269H31.1667L31.1675 42.6225V19.1112C30.1963 19.61 29.1025 19.8638 28 19.8638C26.8975 19.8638 25.8038 19.61 24.8325 19.1112V42.6225L24.8334 42.6269H20.8609C19.8457 42.628 18.8723 43.0318 18.1544 43.7496C17.4364 44.4674 17.0324 45.4406 17.031 46.4559V47.6258C17.031 47.8578 17.1232 48.0804 17.2873 48.2445C17.4514 48.4086 17.674 48.5008 17.906 48.5008H38.094C38.3261 48.5008 38.5487 48.4086 38.7127 48.2445C38.8768 48.0804 38.969 47.8578 38.969 47.6258V46.4559C38.9676 45.4406 38.5637 44.4674 37.8457 43.7496C37.1277 43.0318 36.1544 42.628 35.1392 42.6269ZM12.2439 33.8524C15.9495 33.8524 18.9657 30.8371 18.9657 27.1306C18.9657 26.8629 18.9989 25.8575 18.8922 25.6134L18.8904 25.6055L13.5914 13.6871H21C20.9292 13.1059 20.9292 12.5183 21 11.9371H12.2395C12.0724 11.9416 11.9097 11.9922 11.7695 12.0833C11.6293 12.1744 11.517 12.3025 11.445 12.4534L5.60003 25.6037L5.59915 25.6064C5.4889 25.854 5.52128 26.8506 5.52128 27.1297C5.52215 30.8363 8.5374 33.8524 12.2439 33.8524ZM12.243 14.9611L16.744 25.0849H7.73853L12.243 14.9611ZM50.477 25.9529C50.4762 25.9161 50.4604 25.8803 50.4552 25.8435C50.4438 25.7612 50.4333 25.6799 50.4009 25.6064L50.4 25.6037L44.555 12.4525C44.4837 12.3013 44.3716 12.1729 44.2315 12.0818C44.0913 11.9906 43.9286 11.9402 43.7614 11.9362H35C35.0709 12.5174 35.0709 13.1051 35 13.6862H42.4086L37.1097 25.6046L37.1079 25.6125C37.086 25.6633 37.0834 25.7219 37.0712 25.777C37.0589 25.8356 37.0362 25.8934 37.0362 25.952L37.0344 25.959V27.1289C37.0344 30.8354 40.0497 33.8506 43.757 33.8506C47.4627 33.8506 50.4788 30.8354 50.4788 27.1289V25.959L50.477 25.9529ZM39.256 25.0849L43.757 14.9611L48.2615 25.0849H39.256Z"
                                    fill="#E6E6E6"></path>
                            </svg>
                        </span>
                        <p class="rbt-compare-table-text">
                            Find and select products to see the differences and similarities between them
                        </p>
                    </div>
                </div>

                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="row rbt-compare-products">
                        <div class="col-10 col-md-3 col-lg-3">
                            <div class="rbt-card rbt-comparison-prd-box">
                                <button type="button" class="close-btn rbt-round-btn">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <div class="rbt-comparison-prd-img">
                                    <a href="product-single-default.html">
                                        <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-05-a-1.webp') }}"
                                            alt="Product Image">
                                    </a>
                                </div>
                                <h2 class="rbt-product-title h6">
                                    <a href="product-single-default.html">Logitech G Pro X Superlight Wireless Mouse</a>
                                </h2>
                            </div>
                        </div>
                        <div class="col-10 col-md-3 col-lg-3">
                            <div class="rbt-card rbt-comparison-prd-box">
                                <button type="button" class="close-btn rbt-round-btn">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <div class="rbt-comparison-prd-img">
                                    <a href="product-single-default.html">
                                        <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-06-a-1.webp') }}"
                                            alt="Product Image">
                                    </a>
                                </div>
                                <h2 class="rbt-product-title h6">
                                    <a href="product-single-default.html">Sony Alpha A7 IV Full-Frame Camera</a>
                                </h2>
                            </div>
                        </div>
                        <div class="col-10 col-md-3 col-lg-3">
                            <div class="rbt-card rbt-comparison-prd-box">
                                <button type="button" class="close-btn rbt-round-btn">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <div class="rbt-comparison-prd-img">
                                    <a href="product-single-default.html">
                                        <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1.webp') }}"
                                            alt="Product Image">
                                    </a>
                                </div>
                                <h2 class="rbt-product-title h6">
                                    <a href="product-single-default.html">Samsung Galaxy Tab S9 Ultra 14.6"</a>
                                </h2>
                            </div>
                        </div>
                        <div class="col-10 col-md-3 col-lg-3">
                            <div class="rbt-card rbt-comparison-prd-box">
                                <button type="button" class="close-btn rbt-round-btn">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <div class="rbt-comparison-prd-img">
                                    <a href="product-single-default.html">
                                        <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1.webp') }}"
                                            alt="Product Image">
                                    </a>
                                </div>
                                <h2 class="rbt-product-title h6">
                                    <a href="product-single-default.html">Sony Alpha A7 IV Full-Frame Camera</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-xl-2">
                    <div class="rbt-popup-action-area justify-content-center">
                        <a class="rbt-btn rbt-btn-sm rbt-square-btn has-left-icon mb--12" href="#"><i
                                class="fa-regular fa-scale-balanced"></i> Compare Now</a>
                        <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn has-left-icon mb--12"
                            href="{{ route('shop') }}"><i class="fa-regular fa-browser"></i> Browse Products</a>
                        <a href="#!" class="text-decoration-underline text-center">Clear All</a>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="close-canvas-btn rbt-round-btn">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <!-- Start Quick View Modal Area  -->
    <div class="rbt-default-modal rbt-added-comparison-modal modal fade has-rbt-top-folder-shape"
        id="addedcomparisonModal" tabindex="-1" role="dialog" aria-modal="true"
        aria-labelledby="addedcomparisonModalLabel" aria-hidden="true">
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
                    <!-- Start Component Area -->
                    <div class="rbt-comparison-popup-area rbt-bg-color-white rbt-content-trs-portion">
                        <div class="inner">
                            <div class="rbt-comparison-prd-box">
                                <div class="rbt-comparison-prd-img">
                                    <img src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01.webp') }}"
                                        alt="Product Image">
                                </div>
                                <h2 class="rbt-product-title h6" id="addedcomparisonModalLabel">G244F 23.8 inch FHD 4k
                                    Rapid
                                    IPS 70Hz Super Vertical </h2>
                            </div>
                            <div class="rbt-popup-action-area text-center">
                                <span class="icon"><i class="fa-sharp fa-solid fa-circle-check"></i></span>
                                <p class="mb--16 rbt-text-color-heading">
                                    Successfully You have added <br>
                                    your product comparison!
                                </p>
                                <a class="rbt-btn rbt-btn-sm rbt-square-btn d-block has-left-icon mb--12"
                                    href="#"><i class="fa-regular fa-scale-balanced"></i> Compare Now</a>
                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon"
                                    href="#"><i class="fa-regular fa-browser"></i> Browse Products</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Component Area -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick View Modal Area  -->
    <!-- Start Modal Area  -->
    <div class="rbt-default-modal modal fade rbt-insta-single-modal has-rbt-top-folder-shape" id="instaModal"
        tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="instaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-0">

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
                    <div class="modal-body p-0 rbt-bg-color-white rbt-content-trs-portion">
                        <div class="inner rbt-insta-single-modal">
                            <div class="row row--16">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="rbt-single-insta-img">
                                        <img src="{{ asset('assets/images/insta-posts/insta-post-single-01.webp') }}"
                                            alt="Unimart instagram Single Post Image">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="rbt-component-section-title text-center">
                                                <h2 class="rbt-title h4" id="instaModalLabel">Products In <span
                                                        class="rbt-bold--text">Image</span></h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rbt-right-modal-content">
                                        <!-- Start Card Area -->
                                        <div class="row row--12 mb--24 mt_dec--24">

                                            <!-- Start Single Card  -->
                                            <div class="col-lg-6 col-xl-6 col-6 mt--24">
                                                <div class="rbt-card rbt-product-card">
                                                    <div class="rbt-card-img top-rounded-md rbt-bg-color-gray-light">
                                                        <a href="product-single-default.html"><img
                                                                src="{{ asset('assets/images/product-img/fashion/single-insta-post-01.webp') }}"
                                                                alt="Card Image"></a>
                                                        <div
                                                            class="rbt-product-badge rbt-product-badge-bg-primary rbt-badge-top-left--position">
                                                            SALE</div>
                                                        <button
                                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                                            type="button" data-tooltip="Add to wishlist"
                                                            data-tooltip-position="left"><i
                                                                class="fa-regular fa-heart"></i></button>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <a href="#"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Ladies
                                                            Baf</a>
                                                        <h3 class="rbt-card-title h6"><a
                                                                href="product-single-default.html">Bella HAY Side Table
                                                                Oxd
                                                                Awesome LadiS Bag</a></h3>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(25)</p>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 295.00</del>
                                                            <span class="price-text">Rs. 179.98</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Card  -->

                                            <!-- Start Single Card  -->
                                            <div class="col-lg-6 col-xl-6 col-6 mt--24">
                                                <div class="rbt-card rbt-product-card">
                                                    <div class="rbt-card-img top-rounded-md rbt-bg-color-gray-light">
                                                        <a href="product-single-default.html"><img
                                                                src="{{ asset('assets/images/product-img/fashion/single-insta-post-02.webp') }}"
                                                                alt="Card Image"></a>
                                                        <button
                                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                                            type="button" data-tooltip="Add to wishlist"
                                                            data-tooltip-position="left"><i
                                                                class="fa-regular fa-heart"></i></button>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <a href="#"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Fashion</a>
                                                        <h3 class="rbt-card-title h6"><a
                                                                href="product-single-default.html">Cnvrs All Star Disrupt
                                                                Cx
                                                                Hi and most beautifull Field Tops</a></h3>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(25)</p>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 295.00</del>
                                                            <span class="price-text">Rs. 179.98</span>
                                                            <span class="rbt-offer-badge">-30%</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Card  -->

                                            <!-- Start Single Card  -->
                                            <div class="col-lg-6 col-xl-6 col-6 mt--24">
                                                <div class="rbt-card rbt-product-card">
                                                    <div class="rbt-card-img top-rounded-md rbt-bg-color-gray-light">
                                                        <a href="product-single-default.html"><img
                                                                src="{{ asset('assets/images/product-img/fashion/sunglass-03.webp') }}"
                                                                alt="Card Image"></a>
                                                        <div
                                                            class="rbt-product-badge rbt-product-badge-bg-primary rbt-badge-top-left--position">
                                                            SALE</div>
                                                        <button
                                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                                            type="button" data-tooltip="Add to wishlist"
                                                            data-tooltip-position="left"><i
                                                                class="fa-regular fa-heart"></i></button>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <a href="#"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Sunglass</a>
                                                        <h3 class="rbt-card-title h6"><a
                                                                href="product-single-default.html">HK
                                                                Cordless 7 Speed With protect UV ray Hand Mixer (Blue)</a>
                                                        </h3>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(25)</p>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 295.00</del>
                                                            <span class="price-text">Rs. 179.98</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Card  -->

                                            <!-- Start Single Card  -->
                                            <div class="col-lg-6 col-xl-6 col-6 mt--24">
                                                <div class="rbt-card rbt-product-card">
                                                    <div class="rbt-card-img top-rounded-md rbt-bg-color-gray-light">
                                                        <a href="product-single-default.html"><img
                                                                src="{{ asset('assets/images/product-img/fashion/sunglass-04.webp') }}"
                                                                alt="Card Image"></a>
                                                        <button
                                                            class="rbt-wishlisted-btn rbt-round-btn bg-light-one rbt-top-right--position tooltips"
                                                            type="button" data-tooltip="Add to wishlist"
                                                            data-tooltip-position="left"><i
                                                                class="fa-regular fa-heart"></i></button>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <a href="#"
                                                            class="rbt-card-subtitle rbt-card-catagories-text">Sunglass</a>
                                                        <h3 class="rbt-card-title h6"><a
                                                                href="product-single-default.html">Eyesafe Smart Best
                                                                designed Looking protect UV ray Sunglass</a></h3>
                                                        <div class="rbt-card-rating">
                                                            <ul class="rbt-rating-icon-list">
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                            </ul>
                                                            <p class="rating-digit">(25)</p>
                                                        </div>
                                                        <div class="pricing-part">
                                                            <del class="price-text">Rs. 295.00</del>
                                                            <span class="price-text">Rs. 179.98</span>
                                                            <span class="rbt-offer-badge">-30%</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Card  -->

                                        </div>
                                        <!-- End Card Area -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal Area  -->
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
                                                        href="product-single-default.html">Beats
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
                                                        href="product-single-default.html">Beats
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
                                    <div class="rbt-quick-info-tag d-flex mt--16 rbt-flash-animation">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewbox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z"
                                                fill="url(#paint0_linear_47_23655)"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z"
                                                fill="#FC9502"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z"
                                                fill="#FCE202"></path>
                                            <defs>
                                                <lineargradient id="paint0_linear_47_23655" x1="11.9995"
                                                    y1="22.0148" x2="11.9995" y2="2.01511"
                                                    gradientunits="userSpaceOnUse">
                                                    <stop offset="1" stop-color="#FF4C0D"></stop>
                                                    <stop offset="1" stop-color="#FC9502"></stop>
                                                </lineargradient>
                                            </defs>
                                        </svg>
                                        <p>Limited Item, <strong>checkout within <span class="rbt-countdown-cart">10m
                                                    00s</span></strong></p>
                                    </div>
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
                                <div class="offer-progress-area">
                                    <p class="offer-text">Add <strong>Rs. 248.00</strong> More To Get <strong>Free
                                            Shipping</strong></p>
                                    <div class="progress" role="progressbar" aria-label="Shipping-progress"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar w-75"></div>
                                    </div>
                                </div>
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
                                                        <li><span>The minimum spend for this coupon
                                                                <strong>Rs. 200.00</strong></span></li>
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
                                                        <li><span>The minimum spend for this coupon
                                                                <strong>Rs. 200.00</strong></span></li>
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
    <div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="quickviewSizeGuideModal" tabindex="-1"
        role="dialog" aria-modal="true" aria-labelledby="quickviewSizeGuideModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rbt-size-guide-area">
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

                        <div class="container">
                            <div class=" flex-column align-items-start">
                                <h3 class="rbt-title rbt-modal-title h5" id="quickviewSizeGuideModalLabel">Size Guide
                                </h3>
                                <p class="rbt-modal-description">Masculine Tailored Pants</p>
                                <div class="w-100 d-flex align-items-center justify-content-between">
                                    <p class="rbt-modal-subtitle">Find Your Size</p>
                                    <div class="rbt-tab rbt-round-shape-tab">
                                        <!-- Start tabs -->
                                        <ul class="nav nav-tabs rbt-tabs-primary mb--0" id="rbt-sizeTab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link nav-link-btn-sm active" id="rbt-tab-id-1"
                                                    data-bs-toggle="tab" data-bs-target="#rbt-tab-pane-1"
                                                    type="button" role="tab" aria-controls="rbt-tab-pane-1"
                                                    aria-selected="true">
                                                    IN
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link nav-link-btn-sm" id="rbt-tab-id-2"
                                                    data-bs-toggle="tab" data-bs-target="#rbt-tab-pane-2"
                                                    type="button" role="tab" aria-controls="rbt-tab-pane-2"
                                                    aria-selected="false">
                                                    CM
                                                </button>
                                            </li>
                                        </ul>
                                        <!-- End tabs -->
                                    </div>

                                </div>
                            </div>
                            <div class="row pt--16">
                                <div class="col-12 rbt-scrollable-content pb--8">

                                    <!-- Start tabs content -->
                                    <div class="tab-content" id="rbt-sizeTabContent">
                                        <div class="tab-pane fade show active" id="rbt-tab-pane-1" role="tabpanel"
                                            aria-labelledby="rbt-tab-id-1" tabindex="0">
                                            <div class="rbt-responsive-table">
                                                <table class="rbt-sizeguide-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Size</td>
                                                            <td>US Size</td>
                                                            <td>Chest</td>
                                                            <td>Waist</td>
                                                            <td>Low Hip</td>
                                                            <td>Inseam</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="rbt-tab-pane-2" role="tabpanel"
                                            aria-labelledby="rbt-tab-id-2" tabindex="0">
                                            <div class="rbt-responsive-table">
                                                <table class="rbt-sizeguide-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Size</td>
                                                            <td>US Size</td>
                                                            <td>Chest</td>
                                                            <td>Waist</td>
                                                            <td>Low Hip</td>
                                                            <td>Inseam</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>0-2</td>
                                                            <td>0-2</td>
                                                            <td>24-26</td>
                                                            <td>34-36</td>
                                                            <td>30</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End tabs content -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Component Area -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick View Modal Area  -->
    <!-- Start Quick View Modal Area  -->
    <div class="rbt-product-restock-modal-area rbt-default-modal modal fade" id="quickViewRestockModal" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-0">

                <div class="modal-header">
                    <div class="rbt-welcome-text-area">
                        <h3 class="rbt-title rbt-welcome-title-header h5">🎉 Welcome back Andrew Saimond!!</h3>
                        <p class="rbt-description">Just in time for summer! The awesome new Super vertical is now in our
                            stock!</p>
                    </div>
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <!-- Start Component Area -->
                <div class="rbt-single-product-area rbt-bg-color-white p--32 rbt-rounded--12 p_sm--16">
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
                                    <div class="rbt-swiper-arrow rbt-arrow-left">
                                        <div class="custom-overflow">
                                            <i class="rbt-icon fa-regular fa-arrow-left"></i>
                                            <i class="rbt-icon-top fa-regular fa-arrow-left"></i>
                                        </div>
                                    </div>

                                    <div class="rbt-swiper-arrow rbt-arrow-right">
                                        <div class="custom-overflow">
                                            <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                            <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                        </div>
                                    </div>

                                </div>
                                <div class="swiper rbt-product-thumb-slider-activation mt--24">
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
                        <div class="col-lg-6 col-12 content">
                            <a href="shop-by-category.html"
                                class="rbt-card-subtitle rbt-card-catagories-text mt--0">Headphones</a>
                            <div class="rbt-card-title h4"><a href="product-single-default.html">G244F 23.8 inch FHD
                                    4k Rapid IPS 170Hz Super
                                    Vertical</a></div>
                            <div class="rbt-scroll-vertical-wrapper rbt-vertical-height-sm">
                                <div class="rbt-scroll-vertical content">
                                    <p class="description-text b2">
                                        At vero eos et accusamus et iusto dignissimos ducimus blanditiis praesentium
                                        voluptatu atque...
                                    </p>
                                    <div class="rbt-info-wrapper d-flex justify-content-between mt--16">
                                        <div class="pricing-part mt--0">
                                            <del class="price-text">Rs. 295.00</del>
                                            <span class="price-text">Rs. 179.98</span>
                                            <span class="rbt-offer-badge">-30%</span>
                                        </div>
                                        <div class="prd-info-section">
                                            <div class="prd-id-text">
                                                <p class="text-bold">SKU:</p>
                                                <p> HN-508801</p>
                                            </div>
                                            <div
                                                class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                9 in Stock</div>
                                        </div>
                                    </div>
                                    <div class="rbt-info-wrapper d-flex mt--24">
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
                                    <div class="rbt-info-wrapper d-flex mt--24">
                                        <div class="prd-info-section">
                                            <div class="prd-id-text">
                                                <p class="text-bold">Brand:</p>
                                                <a href="shop-by-brands.html" class="rbt-brand-img tooltips"
                                                    data-tooltip="Product Brand" data-tooltip-position="top"><img
                                                        src="{{ asset('assets/images/icons/small-brand/sm-brand-b-01.webp') }}"
                                                        alt="Small icon Brand"></a>
                                            </div>
                                        </div>
                                        <div class="prd-info-section has-left-separator">
                                            <div class="prd-id-text">
                                                <p class="text-bold">All Europe</p>
                                                <a href="shop-by-brands.html" class="rbt-brand-img tooltips"
                                                    data-tooltip="All Europe Delivary" data-tooltip-position="top"><img
                                                        src="{{ asset('assets/images/icons/small-brand/sm-brand-b-02.webp') }}"
                                                        alt="Small icon Brand"></a>
                                            </div>
                                        </div>
                                        <div class="prd-info-section has-left-separator">
                                            <div class="prd-id-text">
                                                <p class="text-bold">Verified:</p>
                                                <span class="rbt-brand-img tooltips" data-tooltip="Verified Product"
                                                    data-tooltip-position="top"><img
                                                        src="{{ asset('assets/images/icons/small-brand/sm-brand-b-03.webp') }}"
                                                        alt="Small icon Brand"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rbt-info-wrapper d-flex mt--24 rbt-gap--12 flex-wrap">
                                        <div class="prd-info-section">
                                            <a class="rbt-quick-info-tag d-flex align-items-center rbt-gap--8 rbt-shiny"
                                                href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10"
                                                    viewbox="0 0 14 10" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.98586 5.18652C1.93484 5.12038 1.88687 5.05807 1.84423 5.00038C2.25958 4.44469 2.71871 3.92381 3.21712 3.44281C4.28087 2.42212 5.61949 1.53911 7 1.53911C8.38051 1.53911 9.71837 2.42212 10.7829 3.44281C11.2813 3.92383 11.7404 4.44471 12.1558 5.00038C11.7402 5.55588 11.2811 6.07675 10.7829 6.55796C9.71837 7.57865 8.38051 8.46166 7 8.46166C5.61949 8.46166 4.28163 7.57865 3.21712 6.55796C2.77476 6.13114 2.36329 5.67282 1.98586 5.18652ZM13.7297 4.58042L13.0916 5.00038L13.7297 5.42035L13.7282 5.42266L13.7259 5.42574L13.7183 5.43804L13.6901 5.47958C13.5374 5.70347 13.378 5.92253 13.2119 6.13645C12.789 6.68142 12.3279 7.19501 11.8322 7.67326C10.6915 8.76779 8.98433 10 7 10C5.01566 10 3.3085 8.76779 2.16785 7.67326C1.47767 7.00644 0.855254 6.27156 0.30991 5.47958C0.300444 5.46579 0.291053 5.45194 0.281736 5.43804L0.274122 5.42574L0.271837 5.42266L0.271076 5.42112C0.271076 5.42035 0.270314 5.42035 0.908409 5.00038L0.270314 4.58042L0.271837 4.57811L0.274122 4.57503L0.281736 4.56273C0.323524 4.49897 0.366683 4.43614 0.411182 4.37428C0.932338 3.63825 1.52073 2.95324 2.16861 2.32828C3.30773 1.23144 5.01566 0 7 0C8.98433 0 10.6915 1.23221 11.8322 2.32674C12.5223 2.99355 13.1448 3.72843 13.6901 4.52042L13.7183 4.56196L13.7259 4.57426L13.7282 4.57734L13.7289 4.57888L13.7297 4.58042ZM13.0916 5.00038L13.7297 4.58042L14 5.00038L13.7297 5.42035L13.0916 5.00038ZM0.270314 4.58042L0.908409 5.00038L0.270314 5.42035L0 5.00038L0.270314 4.58042ZM6.23855 5.00038C6.23855 4.79639 6.31877 4.60075 6.46157 4.4565C6.60437 4.31225 6.79805 4.23121 7 4.23121C7.20195 4.23121 7.39563 4.31225 7.53842 4.4565C7.68122 4.60075 7.76145 4.79639 7.76145 5.00038C7.76145 5.20438 7.68122 5.40002 7.53842 5.54427C7.39563 5.68852 7.20195 5.76956 7 5.76956C6.79805 5.76956 6.60437 5.68852 6.46157 5.54427C6.31877 5.40002 6.23855 5.20438 6.23855 5.00038ZM7 2.69287C6.39415 2.69287 5.81312 2.93598 5.38472 3.36873C4.95632 3.80147 4.71565 4.38839 4.71565 5.00038C4.71565 5.61238 4.95632 6.1993 5.38472 6.63204C5.81312 7.06479 6.39415 7.3079 7 7.3079C7.60585 7.3079 8.18688 7.06479 8.61528 6.63204C9.04367 6.1993 9.28435 5.61238 9.28435 5.00038C9.28435 4.38839 9.04367 3.80147 8.61528 3.36873C8.18688 2.93598 7.60585 2.69287 7 2.69287Z"
                                                        fill="#24BD25"></path>
                                                </svg>
                                                <p><strong>20 people are viewing this</strong></p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="rbt-info-wrapper d-flex mt--24">
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
                                                                data-tooltip="Gray" data-tooltip-position="top"
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
                                                    href="#">Headphones +
                                                    Charging
                                                    Stand</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rbt-info-wrapper d-flex mt--20">
                                        <div class="product-styles-grp d-flex mt--0">
                                            <p class="text-bold title">Items :</p>
                                            <div class="content d-flex flex-wrap">
                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn"
                                                    href="#">Charger</a>
                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn"
                                                    href="#">Audio
                                                    Port</a>
                                                <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn"
                                                    href="#">Type C
                                                    Jack</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator-top has-sm-spacer"></div>
                                    <div class="product-btn-grp">
                                        <div class="rbt-qty-area">
                                            <button class="qty-item-btn qty-item-btn-decr"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <input type="number" class="items-qty-input" value="05"
                                                min="01">
                                            <button class="qty-item-btn qty-item-btn-incr"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                        <a class="rbt-btn rbt-btn-border has-left-icon d-block text-center"
                                            href="#" data-bs-toggle="modal" data-bs-target="#popup-cartModal"><i
                                                class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                    </div>
                                    <div class="prd-btn-grp">
                                        <a class="rbt-btn d-block text-center" href="#">Buy Now</a>
                                    </div>
                                    <div class="rbt-quick-link-grp mt--12">
                                        <button class="rbt-quick-link" data-bs-toggle="modal"
                                            data-bs-target="#compareviewModal" type="button"><i
                                                class="fa-sharp fa-regular fa-copy"></i>Compare Product</button>
                                        <button class="rbt-quick-link" data-bs-toggle="modal"
                                            data-bs-target="#wishlistModal" type="button"><i
                                                class="fa-sharp fa-regular fa-heart"></i>Add To Wishlist</button>
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
    <!-- End Quick View Modal Area  -->
    <!-- Start Wishlist Modal Area  -->
    <div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="wishlistModal" tabindex="-1"
        role="dialog" aria-modal="true" aria-labelledby="wishlistModalLabel" aria-hidden="true">
        <div class="modal-dialog sm-size modal-dialog-centered">
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
                                                    <img src="{{ asset('assets/images/wishlist/wishlist-prd-1.webp') }}"
                                                        alt="Product image">
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
                                                <span class="rbt-product-id"><span
                                                        class="rbt-text-semi-bold">SKU:</span>
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
                                                    <img src="{{ asset('assets/images/wishlist/wishlist-prd-2.webp') }}"
                                                        alt="Product image">
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
                                                <span class="rbt-product-id"><span
                                                        class="rbt-text-semi-bold">SKU:</span>
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
                            <div
                                class="rbt-wishlist-modal-footer d-flex flex-wrap rbt-gap--16 justify-content-between align-items-center">
                                <a href="wishlist.html" class="rbt-link"><span class="icon mr--4"><i
                                            class="fa-sharp fa-regular fa-heart"></i></span>Open wishlist page</a>
                                <a href="{{ route('shop') }}" class="rbt-link">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist Modal Area  -->
    <!-- Start Added Wishlist Modal Area  -->
    <div class="rbt-default-modal modal fade" id="addedcartModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered xs-size">
            <div class="modal-content p--24">
                <div class="modal-header">
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="rbt-wishlist-added-wrapper">
                    <div class="rbt-quick-info-tag d-inline-flex w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewbox="0 0 16 13"
                            fill="none">
                            <path
                                d="M3.98047 1.58203C4.36328 0.96224 4.91016 0.643229 5.62109 0.625H10.3516C11.0807 0.643229 11.6458 0.96224 12.0469 1.58203L14.5625 5.73828C14.9453 6.41276 14.9453 7.08724 14.5625 7.76172L12.0469 11.918C11.6458 12.5378 11.0807 12.8568 10.3516 12.875H5.62109C4.91016 12.8568 4.36328 12.5378 3.98047 11.918L1.4375 7.76172C1.05469 7.08724 1.05469 6.41276 1.4375 5.73828L3.98047 1.58203ZM11.1719 5.54688C11.3177 5.38281 11.3906 5.20052 11.3906 5C11.3906 4.79948 11.3177 4.61719 11.1719 4.45312C11.0078 4.30729 10.8255 4.23438 10.625 4.23438C10.4245 4.23438 10.2422 4.30729 10.0781 4.45312L7.125 7.40625L5.92188 6.20312C5.75781 6.05729 5.57552 5.98438 5.375 5.98438C5.17448 5.98438 4.99219 6.05729 4.82812 6.20312C4.68229 6.36719 4.60938 6.54948 4.60938 6.75C4.60938 6.95052 4.68229 7.13281 4.82812 7.29688L6.57812 9.04688C6.74219 9.19271 6.92448 9.26562 7.125 9.26562C7.32552 9.26562 7.50781 9.19271 7.67188 9.04688L11.1719 5.54688Z"
                                fill="#24BD25"></path>
                        </svg>
                        <p><strong>Product has been sucessfully added</strong></p>
                    </div>
                    <div class="row row--16">
                        <div class="col-md-6 col-12 mt--16">
                            <div class="rbt-card rbt-product-card">
                                <div class="rbt-card-img rbt-rounded--8">
                                    <a href="product-single-default.html">
                                        <img src="{{ asset('assets/images/product-img/cart-product/cart-product-01-lg.webp') }}"
                                            alt="eCommerce Product Image">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <p class="rbt-title mb--0 b1"><a href="product-single-default.html">Harman Kardon
                                            Aura
                                            Studio 3 Bluetooth Speaker</a>
                                    </p>
                                </div>
                                <div class="pricing-part mt--0">
                                    <span class="price-text">Rs. 179.98</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt--16">
                            <div class="rbt-cart-info text-center">
                                <p class="cart-quantity-text b1 rbt-text-color-heading mb--0">There are <span
                                        class="number">2</span> items in your cart</p>
                                <div class="pricing-part justify-content-center align-items-center">
                                    <p class="b3 rbt-text-color-heading rbt-text-medium mb--0">Total: </p>
                                    <span class="price-text rbt-text-color-primary h4 mb--0">Rs. 179.98</span>
                                </div>
                                <a class="rbt-btn rbt-btn-sm d-block mt--16" href="#">Checkout</a>
                                <a class="rbt-btn rbt-btn-sm d-block rbt-btn-naked b3 text-decoration-underline mt--8 rbt-text-semi-bold"
                                    href="cart.html">View My Cart</a>
                                <a class="rbt-btn rbt-btn-sm d-block rbt-btn-naked b3 text-decoration-underline mt--8 rbt-text-semi-bold"
                                    href="{{ route('shop') }}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="rbt-separator rbt-separator-gray200 mt--16 mb--16">
                <div class="rbt-rec-prd-section">
                    <div class="rbt-title h6">Recommended Products</div>
                    <div class="swiper rbt-rec-prd-swiper rbt-swiper-scrollbar-bottom">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                    <div class="inner">
                                        <div class="rbt-card-img rbt-bg-color-default">
                                            <a href="product-single-default.html"><img
                                                    src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01.webp') }}"
                                                    alt="Card Image"></a>
                                        </div>
                                        <div class="rbt-card-body p-0">
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text">Headphones</a>
                                            <p class="rbt-card-title mt--0 b4"><a
                                                    href="product-single-default.html">Samsung
                                                    Galaxy Buds 2 Pro Earbuds</a>
                                            </p>
                                            <div class="pricing-part mt--0">
                                                <span class="price-text">Rs. 428.75</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                    <div class="inner">
                                        <div class="rbt-card-img rbt-bg-color-default">
                                            <a href="product-single-default.html"><img
                                                    src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-02.webp') }}"
                                                    alt="Card Image"></a>
                                        </div>
                                        <div class="rbt-card-body p-0">
                                            <a href="#" class="rbt-card-subtitle rbt-card-catagories-text">Coffee
                                                Machine</a>
                                            <p class="rbt-card-title mt--0 b4"><a
                                                    href="product-single-default.html">Nespresso Vertuo Plus Coffee
                                                    Machine</a></p>
                                            <div class="pricing-part mt--0">
                                                <span class="price-text">Rs. 228.98</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rbt-card rbt-product-card rbt-list-view-variation list-view-md">
                                    <div class="inner">
                                        <div class="rbt-card-img rbt-bg-color-default">
                                            <a href="product-single-default.html"><img
                                                    src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-03.webp') }}"
                                                    alt="Card Image"></a>
                                        </div>
                                        <div class="rbt-card-body p-0">
                                            <a href="#"
                                                class="rbt-card-subtitle rbt-card-catagories-text">Smartwatch</a>
                                            <p class="rbt-card-title mt--0 b4"><a
                                                    href="product-single-default.html">Fitbit
                                                    Sense 2 Advanced Smartwatch</a></p>
                                            <div class="pricing-part mt--0">
                                                <span class="price-text">Rs. 128.90</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rbt-swiper-scrollbar swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Added Wishlist Modal Area  -->
    <!-- Start Compare View Modal Area  -->
    <div class="rbt-default-modal modal fade  has-rbt-top-folder-shape" id="compareviewModal" tabindex="-1"
        role="dialog" aria-modal="true" aria-labelledby="compareviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered xl-size">
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
                    <!-- Start Componente Area -->
                    <div class="rbt-component-area rbt-compare-table-area rbt-content-trs-portion">
                        <div class="row">
                            <div class="col-12">
                                <div class="rbt-component-section-title rbt-gap--4 mb--24 p-0 border-0 text-left">
                                    <div id="compareviewModalLabel" class="rbt-title mb--0"><span
                                            class="rbt-text-bold h4">Compare Product</span></div>
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
                                                    <input class="rbt-input-field" type="text"
                                                        placeholder="Search and Select Product">
                                                    <button class="rbt-search-btn"><i
                                                            class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="rbt-input-field-grp">
                                                    <input class="rbt-input-field" type="text"
                                                        placeholder="Search and Select Product">
                                                    <button class="rbt-search-btn"><i
                                                            class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="rbt-input-field-grp">
                                                    <input class="rbt-input-field" type="text"
                                                        placeholder="Search and Select Product">
                                                    <button class="rbt-search-btn"><i
                                                            class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="rbt-input-field-grp">
                                                    <input class="rbt-input-field" type="text"
                                                        placeholder="Search and Select Product">
                                                    <button class="rbt-search-btn"><i
                                                            class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="rbt-compare-prd-table-head">
                                            <td class="rbt-compare-table-title">
                                                <div class="rbt-compare-values">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="56"
                                                            height="56" viewbox="0 0 56 56" fill="none">
                                                            <path
                                                                d="M28 7.5C25.0767 7.5 22.6975 9.88262 22.6975 12.8112C22.6936 13.7244 22.9272 14.6229 23.3755 15.4184C23.8237 16.214 24.4712 16.8793 25.2543 17.349C26.0823 17.8506 27.0319 18.1157 28 18.1157C28.9681 18.1157 29.9177 17.8506 30.7458 17.349C31.5289 16.8794 32.1764 16.2141 32.6247 15.4185C33.073 14.6229 33.3066 13.7244 33.3025 12.8112C33.3025 9.88262 30.9234 7.5 28 7.5ZM35.1392 42.6269H31.1667L31.1675 42.6225V19.1112C30.1963 19.61 29.1025 19.8638 28 19.8638C26.8975 19.8638 25.8038 19.61 24.8325 19.1112V42.6225L24.8334 42.6269H20.8609C19.8457 42.628 18.8723 43.0318 18.1544 43.7496C17.4364 44.4674 17.0324 45.4406 17.031 46.4559V47.6258C17.031 47.8578 17.1232 48.0804 17.2873 48.2445C17.4514 48.4086 17.674 48.5008 17.906 48.5008H38.094C38.3261 48.5008 38.5487 48.4086 38.7127 48.2445C38.8768 48.0804 38.969 47.8578 38.969 47.6258V46.4559C38.9676 45.4406 38.5637 44.4674 37.8457 43.7496C37.1277 43.0318 36.1544 42.628 35.1392 42.6269ZM12.2439 33.8524C15.9495 33.8524 18.9657 30.8371 18.9657 27.1306C18.9657 26.8629 18.9989 25.8575 18.8922 25.6134L18.8904 25.6055L13.5914 13.6871H21C20.9292 13.1059 20.9292 12.5183 21 11.9371H12.2395C12.0724 11.9416 11.9097 11.9922 11.7695 12.0833C11.6293 12.1744 11.517 12.3025 11.445 12.4534L5.60003 25.6037L5.59915 25.6064C5.4889 25.854 5.52128 26.8506 5.52128 27.1297C5.52215 30.8363 8.5374 33.8524 12.2439 33.8524ZM12.243 14.9611L16.744 25.0849H7.73853L12.243 14.9611ZM50.477 25.9529C50.4762 25.9161 50.4604 25.8803 50.4552 25.8435C50.4438 25.7612 50.4333 25.6799 50.4009 25.6064L50.4 25.6037L44.555 12.4525C44.4837 12.3013 44.3716 12.1729 44.2315 12.0818C44.0913 11.9906 43.9286 11.9402 43.7614 11.9362H35C35.0709 12.5174 35.0709 13.1051 35 13.6862H42.4086L37.1097 25.6046L37.1079 25.6125C37.086 25.6633 37.0834 25.7219 37.0712 25.777C37.0589 25.8356 37.0362 25.8934 37.0362 25.952L37.0344 25.959V27.1289C37.0344 30.8354 40.0497 33.8506 43.757 33.8506C47.4627 33.8506 50.4788 30.8354 50.4788 27.1289V25.959L50.477 25.9529ZM39.256 25.0849L43.757 14.9611L48.2615 25.0849H39.256Z"
                                                                fill="#E6E6E6"></path>
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
                                                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-1.webp') }}"
                                                            alt="Product Image">
                                                    </a>
                                                    <div class="rbt-compare-values">
                                                        <a href="#" class="rbt-product-item-category">
                                                            T-shirts
                                                        </a>
                                                        <p class="rbt-product-item-title h6">
                                                            <a href="product-single-default.html">Signature Hooded Wrap
                                                                Coat</a>
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
                                                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-2.webp') }}"
                                                            alt="Product Image">
                                                    </a>
                                                    <div class="rbt-compare-values">
                                                        <a href="#" class="rbt-product-item-category">
                                                            Tiered
                                                        </a>
                                                        <p class="rbt-product-item-title h6">
                                                            <a href="product-single-default.html">Long Belted Wrap Full
                                                                Coat</a>
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
                                                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-3.webp') }}"
                                                            alt="Product Image">
                                                    </a>
                                                    <div class="rbt-compare-values">
                                                        <a href="#" class="rbt-product-item-category">
                                                            Sleeveless
                                                        </a>
                                                        <p class="rbt-product-item-title h6">
                                                            <a href="product-single-default.html">Zipper Neckline Bateau
                                                                T-Shirt</a>
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
                                                        <img src="{{ asset('assets/images/compare-products/compare-prd-img-4.webp') }}"
                                                            alt="Product Image">
                                                    </a>
                                                    <div class="rbt-compare-values">
                                                        <a href="#" class="rbt-product-item-category">
                                                            T-shirts
                                                        </a>
                                                        <p class="rbt-product-item-title h6">
                                                            <a href="product-single-default.html">Masculine Tailored
                                                                Pants</a>
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
                                                    wireless, voice assistant, Bluetooth, noise cancellation, adaptive,
                                                    wireless
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
                                                    wireless, voice assistant, Bluetooth, noise cancellation, adaptive,
                                                    wireless
                                                    charging
                                                </div>
                                            </td>
                                            <td>
                                                <div class="rbt-compare-values">
                                                    wireless, voice assistant, Bluetooth, noise cancellation, adaptive,
                                                    wireless
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
    <!-- Start Wishlist Modal Area  -->
    <div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="socialShareModal" tabindex="-1"
        role="dialog" aria-modal="true" aria-labelledby="socialShareModalLabel" aria-hidden="true">
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

                <div class="rbt-top-folder-shape-wrapper">
                    <div class="rbt-bg-color-white rbt-content-trs-portion">
                        <div class="rbt-title mb--8 rbt-text-bold" id="socialShareModalLabel">Share Options</div>
                        <div class="rbt-social-share-wrapper">

                            <ul
                                class="social-icon rbt-social-default mt--16 mt_sm--0 rbt-social-default-v1 lg-size justify-content-start">
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
                                    <a class="email-btn"
                                        href="/cdn-cgi/l/email-protection#4a3925272f25242f0a2f322b273a262f64292527">
                                        <i class="fa-regular fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>

                            <div class="rbt-copy-link-part rbt-text-copy-activation mt--24 mt_sm--8 w-100">
                                <input class="rbt-copy-value-field w-100" type="text"
                                    value="https://unimart.template/wishlist" readonly="">
                                <button class="rbt-btn rbt-btn-xs has-left-icon rbt-copy-btn"
                                    data-tooltip="Copy to clipboard">
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
