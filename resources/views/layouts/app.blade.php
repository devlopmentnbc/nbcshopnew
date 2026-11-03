<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', "Nature's Beauty Creations")</title>
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="Shop authentic herbal beauty and personal care products from Nature's Beauty Creations.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap">
    </noscript>
    <link rel="preload" href="{{ asset('assets/fonts/fa-brands-400.woff2') }}" as="font" type="font/woff2"
        crossorigin="">
    <link rel="preload" href="{{ asset('assets/fonts/fa-regular-400.woff2') }}" as="font" type="font/woff2"
        crossorigin="">
    <link rel="preload" href="{{ asset('assets/fonts/fa-solid-900.woff2') }}" as="font" type="font/woff2"
        crossorigin="">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/nbc/logo-nbc2.png') }}">

    <!-- CSS
 ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="preload" href="{{ asset('assets/css/plugins/fontawesome-all.min.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome-all.min.css') }}">
    </noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/mavo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/css/nbc.css') }}?v={{ filemtime(public_path('assets/css/nbc.css')) }}">
    <style>
        .rbt-cart-side-menu .checkout-btn .rbt-btn,
        .rbt-modal-cart .checkout-btn .rbt-btn {
            background-color: #113a32 !important;
            border-color: #113a32 !important;
            color: #ffffff !important;
        }

        .rbt-cart-side-menu .checkout-btn .rbt-btn:hover,
        .rbt-modal-cart .checkout-btn .rbt-btn:hover {
            background-color: #113a32 !important;
            border-color: #113a32 !important;
        }

        .rbt-cart-side-menu .price,
        .rbt-modal-cart .price,
        .rbt-cart-side-menu .share-btn,
        .rbt-modal-cart .share-btn {
            color: #113a32 !important;
        }
    </style>
    @stack('page-styles')
</head>


<body class="rbt-header-sticky">
    <header class="rbt-header rbt-header-9">

        <div
            class="rbt-header-wrapper rbt-header-sticky-activation rbt-header-wrapper-three rbt-header-wrapper-one header-space-between header-not-transparent header-sticky plr--0 nbc-shop-header">
            <div
                class="rbt-header-campaign rbt-header-campaign-1 rbt-header-top-news rbt-topbar-bg-img rbt-topbar-bg-one">
                <div class="rbt-corner-portion-wrapper">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="inner justify-content-center">
                                    <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                        <div class="swiper-wrapper w-100">
                                            <div class="swiper-slide">
                                                <div class="rbt-fancy-item fancy-menu-text fancy-menu-start">
                                                    <p class="rbt-fancy-text rbt-text-color-white">Authentic NBC
                                                        products delivered islandwide.
                                                        <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop
                                                            Now</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="rbt-fancy-item fancy-menu-text fancy-menu-start">
                                                    <p class="rbt-fancy-text rbt-text-color-white">Herbal beauty
                                                        inspired by nature since 1984.
                                                        <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop
                                                            Now</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="rbt-fancy-item fancy-menu-text fancy-menu-start">
                                                    <p class="rbt-fancy-text rbt-text-color-white">Discover special
                                                        online offers from NBC.
                                                        <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop
                                                            Now</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="rbt-verticle-arrow rbt-text-color-white rbt-arrow-prev">
                                            <i class="fa-regular fa-chevron-up"></i>
                                        </div>
                                        <div class="rbt-verticle-arrow rbt-text-color-white rbt-arrow-next">
                                            <i class="fa-regular fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icon-close position-right">
                    <button class="rbt-round-btn btn-white-off bgsection-activation" aria-label="Close Button">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="rbt-wrapper-middle rbt-header-middle-one @@has-bg-transparent">
                <div class="rbt-fullwidth-wrapper">
                    <div class="mainbar-row @@navigationEnd align-items-center">
                        <div class="header-left">
                            <div class="rbt-header-content rbt-gap--32">
                                <!-- Start Mobile-Menu-Bar -->
                                <div class="mobile-menu-bar d-block d-xl-none">
                                    <div class="hamberger">
                                        <button class="hamberger-button rbt-round-btn">
                                            <i class="fa-solid fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Start Mobile-Menu-Bar -->
                                <div class="header-info">
                                    <div class="logo">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}"
                                                alt="NBC Logo Images">
                                        </a>
                                    </div>
                                </div>
                                <div class="header-info p-0 d-none rbt-category-update rbt-category-update-var-modern">
                                    <a class="rbt-btn-transparent has-bg-shape-hover" href="shop-by-categories.html">
                                        <i class="fa-solid fa-bars"></i>
                                        <span>Shop by Categories</span>
                                    </a>

                                    <!-- Start Update Cart Dropdown  -->
                                    <div class="rbt-update-category-dropdown nbc-category-menu">
                                        <x-nbc-category-menu />
                                    </div>
                                    <!-- End Update Cart Dropdown  -->
                                </div>
                            </div>
                        </div>

                        <div class="rbt-header-content">
                            <div class="header-info d-none d-xl-block ">
                                <nav class="rbt-mainmenu-nav">
                                    <x-nbc-main-menu />
                                </nav>
                            </div>
                        </div>

                        <div class="header-right rbt-gap--32">

                            <!-- Shop All Button -->
                            <!-- <div class="d-none d-xl-flex align-items-center">
                                <a href="{{ route('shop') }}"
                                   class="rbt-btn rbt-btn-sm btn-gradient nbc-shop-all-btn"
                                   style="
                                       padding: 8px 22px;
                                       font-size: 13px;
                                       font-weight: 700;
                                       letter-spacing: 0.5px;
                                       border-radius: 50px;
                                       background: linear-gradient(135deg, #2e7d32 0%, #66bb6a 100%);
                                       color: #fff;
                                       border: none;
                                       text-decoration: none;
                                       display: inline-flex;
                                       align-items: center;
                                       gap: 6px;
                                       box-shadow: 0 4px 15px rgba(46,125,50,0.35);
                                       transition: all 0.3s ease;
                                       white-space: nowrap;
                                   "
                                   onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(46,125,50,0.5)'"
                                   onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 15px rgba(46,125,50,0.35)'"
                                >
                                    <i class="fa-regular fa-bag-shopping"></i>
                                    Shop All
                                </a>
                            </div> -->

                            <!-- Navbar Icons -->
                            <ul class="rbt-quick-access">
                                <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 tooltips tooltip-distance-lg"
                                    data-tooltip="Search" data-tooltip-position="bottom">
                                    <a class="search-trigger-active rbt-round-btn has-rbt-md-fsize rbt-modern-close-btn"
                                        href="#">
                                        <i class="fa-regular fa-search search-icon"></i>
                                        <div class="modern-close-wrapper"></div>
                                    </a>
                                </li>



                                <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 d-none d-lg-flex tooltips tooltip-distance-lg"
                                    data-tooltip="Sign In" data-tooltip-position="bottom">
                                    <a class="rbt-round-btn has-rbt-md-fsize" href="#!"
                                        data-bs-toggle="modal" data-bs-target="#signinModal">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                </li>

                                <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-4 rbt-wishlist d-none d-lg-flex tooltips tooltip-distance-lg"
                                    data-tooltip="Wishlist" data-tooltip-position="bottom">
                                    <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal"
                                        data-bs-target="#wishlistModal">
                                        <i class="fa-regular fa-heart"></i>
                                        <div class="access-box-count">{{ Auth::check() ? Auth::user()->wishlists()->count() : 0 }}</div>
                                    </a>
                                </li>



                                <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-5 rbt-mini-cart tooltips tooltip-distance-lg"
                                    data-tooltip="Cart" data-tooltip-position="bottom">
                                    <a class="rbt-cart-sidenav-activation rbt-round-btn has-rbt-md-fsize"
                                        href="#">
                                        <i class="fa-regular fa-bag-shopping"></i>
                                        <span class="access-box-count rbt-shiny">3</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Search Dropdown  -->
        <div class="rbt-search-dropdown rbt-search-dropdown-activation">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="rbt-component-section-title border-0 p-0 text-center">
                            <h2 class="rbt-title h4"><span class="rbt-bold--text">Search For Products</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('shop') }}" method="GET" class="rbt-search-form nbc-header-search-form">
                            <div class="input-sectition position-relative w-100 mr--12 mr_sm--4">
                                <input class="search-input nbc-search-input" type="text" name="search"
                                    placeholder="What product are you looking for?" value="{{ request('search') }}" autocomplete="off">
                                <i class="fa-sharp fa-regular inner-search-icon fa-magnifying-glass"></i>
                            </div>
                            <div class="submit-btn">
                                <button type="submit" class="rbt-btn btn-md">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="nbc-live-search-container mt-3" style="display: none;">
                    <div class="d-flex align-items-center justify-content-between mb-2 px-1">
                        <span class="text-muted small fw-bold">SEARCH RESULTS</span>
                        <span class="badge bg-light text-dark nbc-live-search-count">0 found</span>
                    </div>
                    <div class="nbc-live-search-results list-group shadow-sm rounded-12 mb-3" style="max-height: min(60vh, 480px); overflow-y: auto; overscroll-behavior: contain;">
                    </div>
                </div>

                <div class="rbt-search-scroll-vertical-wrapper rbt-scroll-vertical">
                    <div class="inner">
                        <div class="row row--0">
                            <div class="col-lg-12">
                                <div class="border-0 p-0 text-left title-sm-fsize">
                                    <h2 class="title"><span class="rbt-bold--text">Popular searches</span></h2>
                                </div>
                            </div>

                            <div class="rbt-search-list-wrapper rbt-tag-list rbt-tag-list-rounded-lg">
                                <a href="{{ route('shop', ['search' => 'Shampoo']) }}">Shampoo</a>
                                <a href="{{ route('shop', ['search' => 'Aloe Vera']) }}">Aloe Vera</a>
                                <a href="{{ route('shop', ['search' => 'Face Wash']) }}">Face Wash</a>
                                <a href="{{ route('shop', ['search' => 'Moisturizer']) }}">Moisturizer</a>
                                <a href="{{ route('shop', ['search' => 'Herbal Oil']) }}">Herbal Oil</a>
                                <a href="{{ route('shop', ['search' => 'Baby Care']) }}">Baby Care</a>
                                <a href="{{ route('shop', ['search' => 'Body Wash']) }}">Body Wash</a>
                                <a href="{{ route('shop', ['search' => 'Conditioner']) }}">Conditioner</a>
                                <a href="{{ route('shop', ['search' => 'Cleanser']) }}">Cleanser</a>
                                <a href="{{ route('shop', ['search' => 'Face Cream']) }}">Face Cream</a>
                            </div>
                        </div>

                        <div class="rbt-separator-mid ptb_sm--12 ptb--24">
                            <hr class="rbt-separator m-0">
                        </div>
                    </div>
                </div>

            </div>
            <a href="javascript:void(0);" class="media-upload-close-area"></a>
        </div>
        <!-- End Search Dropdown  -->
        <a href="javascript:void(0);" class="close_search_dropdown"></a>
        <div
            class="rbt-header-common-sticky-activation rbt-header-wrapper-common justify-content-between nbc-shop-header">
            <div
                class="rbt-header-campaign rbt-header-campaign-1 rbt-header-top-news rbt-topbar-bg-img rbt-topbar-bg-one w-100">
                <div class="rbt-corner-portion-wrapper">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="inner justify-content-center">
                                    <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="rbt-fancy-item fancy-menu-text fancy-menu-center">
                                                    <p class="rbt-fancy-text rbt-text-color-white">Top products.
                                                        Better prices
                                                        -under Rs. 100.
                                                        <a class="rbt-text-color-white"
                                                            href="{{ route('shop') }}">Shop Now</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="rbt-fancy-item fancy-menu-text fancy-menu-center">
                                                    <p class="rbt-fancy-text rbt-text-color-white">Top products.
                                                        Better prices
                                                        -under Rs. 100.
                                                        <a class="rbt-text-color-white"
                                                            href="{{ route('shop') }}">Shop Now</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="rbt-fancy-item fancy-menu-text fancy-menu-center">
                                                    <p class="rbt-fancy-text rbt-text-color-white">Top products.
                                                        Better prices
                                                        -under Rs. 100.
                                                        <a class="rbt-text-color-white"
                                                            href="{{ route('shop') }}">Shop Now</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="rbt-verticle-arrow rbt-text-color-white rbt-arrow-prev">
                                            <i class="fa-regular fa-chevron-up"></i>
                                        </div>
                                        <div class="rbt-verticle-arrow rbt-text-color-white rbt-arrow-next">
                                            <i class="fa-regular fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icon-close position-right">
                    <button class="rbt-round-btn btn-white-off bgsection-activation" aria-label="Close Button">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="rbt-fullwidth-wrapper">
                <div class="mainbar-row rbt-mainbar-row-md-height @@navigationEnd align-items-center">
                    <div class="header-left">
                        <div class="rbt-header-content d-flex">
                            <div class="header-info d-xl-block d-none">
                                <div class="logo rbt-logo-height-sm">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}"
                                            alt="NBC Logo Images">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Start Mobile-Menu-Bar -->
                        <div class="mobile-menu-bar d-block d-xl-none">
                            <div class="hamberger">
                                <button class="hamberger-button rbt-round-btn">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Start Mobile-Menu-Bar -->
                    </div>

                    <div class="header-info d-xl-none d-block">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}" alt="NBC Logo Images">
                            </a>
                        </div>
                    </div>

                    <div class="rbt-header-content d-none d-xl-block">
                        <div class="header-info">
                            <nav class="rbt-mainmenu-nav">
                                <x-nbc-main-menu />
                            </nav>
                        </div>
                    </div>

                    <div class="header-right">

                        <!-- Shop All Button -->
                        <!-- <div class="d-none d-xl-flex align-items-center me-2">
                            <a href="{{ route('shop') }}"
                               class="rbt-btn rbt-btn-sm btn-gradient nbc-shop-all-btn"
                               style="
                                   padding: 8px 22px;
                                   font-size: 13px;
                                   font-weight: 700;
                                   letter-spacing: 0.5px;
                                   border-radius: 50px;
                                   background: linear-gradient(135deg, #2e7d32 0%, #66bb6a 100%);
                                   color: #fff;
                                   border: none;
                                   text-decoration: none;
                                   display: inline-flex;
                                   align-items: center;
                                   gap: 6px;
                                   box-shadow: 0 4px 15px rgba(46,125,50,0.35);
                                   transition: all 0.3s ease;
                                   white-space: nowrap;
                               "
                               onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(46,125,50,0.5)'"
                               onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 15px rgba(46,125,50,0.35)'"
                            >
                                <i class="fa-regular fa-bag-shopping"></i>
                                Shop All
                            </a>
                        </div> -->

                        <!-- Navbar Icons -->
                        <ul class="rbt-quick-access rbt-gap--12">

                            <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 tooltips tooltip-distance-lg"
                                data-tooltip="Search" data-tooltip-position="bottom">
                                <a class="rbt-round-btn has-rbt-md-fsize rbt-common-search-trigger-active rbt-modern-close-btn"
                                    href="#">
                                    <i class="fa-regular fa-search search-icon"></i>
                                    <div class="modern-close-wrapper"></div>
                                </a>
                            </li>

                            @auth
                                <li class="rbt-access-box d-none d-lg-flex position-relative nbc-user-access-box">
                                    <a class="rbt-round-btn has-rbt-md-fsize dropdown-toggle text-decoration-none" href="#" role="button" id="userProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                        @if(Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle" style="width: 28px; height: 28px; object-fit: cover;">
                                        @else
                                            <i class="fa-regular fa-user"></i>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end nbc-profile-dropdown-menu shadow-lg border-0" aria-labelledby="userProfileDropdown">
                                        <div class="nbc-user-header">
                                            <div class="user-name text-truncate">{{ Auth::user()->name }}</div>
                                            <div class="user-email text-truncate">{{ Auth::user()->email }}</div>
                                        </div>
                                        <div class="nbc-menu-body">
                                            <a class="nbc-dropdown-item" href="{{ route('profile') }}">
                                                <i class="fa-regular fa-user"></i>
                                                <span>Profile</span>
                                            </a>
                                            @if(Auth::user()->is_admin)
                                                <a class="nbc-dropdown-item" href="{{ route('admin.dashboard') }}">
                                                    <i class="fa-solid fa-gauge"></i>
                                                    <span>Admin Dashboard</span>
                                                </a>
                                            @endif
                                            <hr class="my-1 border-light opacity-25">
                                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                                @csrf
                                                <button type="submit" class="nbc-dropdown-item logout-item w-100 text-start border-0">
                                                    <i class="fa-regular fa-arrow-right-from-bracket"></i>
                                                    <span>Logout</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 d-none d-lg-flex tooltips tooltip-distance-lg"
                                    data-tooltip="Sign In" data-tooltip-position="bottom">
                                    <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal"
                                        data-bs-target="#signinModal">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                </li>
                            @endauth

                            <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-5 rbt-wishlist d-none d-lg-flex tooltips tooltip-distance-lg"
                                data-tooltip="Wishlist" data-tooltip-position="bottom">
                                <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal"
                                    data-bs-target="#wishlistModal">
                                    <i class="fa-regular fa-heart"></i>
                                    <div class="access-box-count">{{ Auth::check() ? Auth::user()->wishlists()->count() : 0 }}</div>
                                </a>
                            </li>


                            <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-5 rbt-access-box-has-bg-hover rbt-mini-cart tooltips tooltip-distance-lg"
                                data-tooltip="Cart" data-tooltip-position="bottom">
                                <a class="rbt-cart-sidenav-activation" href="#!">
                                    <span class="rbt-round-btn has-rbt-md-fsize">
                                        <i class="fa-regular fa-bag-shopping"></i>
                                        <span class="access-box-count rbt-shiny">3</span>
                                    </span>
                                    <div class="content ml--4">
                                        <span class="title-text">Rs. 2390</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Start Search Dropdown  -->
            <div class="rbt-search-dropdown rbt-common-search-dropdown-activation">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="rbt-component-section-title border-0 p-0 text-center">
                                <h2 class="rbt-title text-start text-md-center"><span class="rbt-bold--text">Search
                                        For
                                        Products</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('shop') }}" method="GET" class="rbt-search-form nbc-header-search-form">
                                <div class="input-sectition position-relative w-100 mr--12 mr_sm--4">
                                    <input class="search-input nbc-search-input" type="text" name="search"
                                        placeholder="What product are you looking for?" value="{{ request('search') }}" autocomplete="off">
                                    <i class="fa-sharp fa-regular inner-search-icon fa-magnifying-glass"></i>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="rbt-btn btn-md">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="nbc-live-search-container mt-3" style="display: none;">
                        <div class="d-flex align-items-center justify-content-between mb-2 px-1">
                            <span class="text-muted small fw-bold">SEARCH RESULTS</span>
                            <span class="badge bg-light text-dark nbc-live-search-count">0 found</span>
                        </div>
                        <div class="nbc-live-search-results list-group shadow-sm rounded-12 mb-3" style="max-height: min(60vh, 480px); overflow-y: auto; overscroll-behavior: contain;">
                        </div>
                    </div>

                    <div class="rbt-search-scroll-vertical-wrapper rbt-scroll-vertical">
                        <div class="inner">
                            <div class="row row--0">
                                <div class="col-lg-12">
                                    <div class="border-0 p-0 text-left title-sm-fsize">
                                        <h2 class="title"><span class="rbt-bold--text">Popular searches</span></h2>
                                    </div>
                                </div>

                                <div class="rbt-search-list-wrapper rbt-tag-list rbt-tag-list-rounded-lg">
                                    <a href="{{ route('shop', ['search' => 'Shampoo']) }}">Shampoo</a>
                                    <a href="{{ route('shop', ['search' => 'Aloe Vera']) }}">Aloe Vera</a>
                                    <a href="{{ route('shop', ['search' => 'Face Wash']) }}">Face Wash</a>
                                    <a href="{{ route('shop', ['search' => 'Moisturizer']) }}">Moisturizer</a>
                                    <a href="{{ route('shop', ['search' => 'Herbal Oil']) }}">Herbal Oil</a>
                                    <a href="{{ route('shop', ['search' => 'Baby Care']) }}">Baby Care</a>
                                    <a href="{{ route('shop', ['search' => 'Body Wash']) }}">Body Wash</a>
                                    <a href="{{ route('shop', ['search' => 'Conditioner']) }}">Conditioner</a>
                                    <a href="{{ route('shop', ['search' => 'Cleanser']) }}">Cleanser</a>
                                    <a href="{{ route('shop', ['search' => 'Face Cream']) }}">Face Cream</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- End Search Dropdown  -->
        </div>
    </header>

    <x-nbc-mobile-menu />

    <div class="rbt-preloader nbc-preloader" role="status" aria-label="Loading Nature's Beauty Creations">
        <div class="nbc-loading-container">
            <div class="nbc-loading-ring"></div>
            <div class="nbc-loading-icon">
                <img src="{{ asset('assets/images/nbc/loader1.svg') }}" alt="">
            </div>
        </div>
    </div>

    <main class="nbc-page-content">
        @yield('content')
    </main>

    <x-nbc-footer />

    <!-- Start Sign In Modal Area  -->
    <div class="rbt-default-modal modal fade has-rbt-top-folder-shape nbc-auth-popup" id="signinModal"
        tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="signinModalLabel" aria-hidden="true">
        <div class="modal-dialog rbt-register-form-modal modal-dialog-centered">
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
                    <div class="rbt-login-form rbt-bg-color-white rbt-content-trs-portion">
                        <div class="rbt-login-form-inner">
                            <div class="rbt-login-form-top nbc-auth-modal">
                                <span class="nbc-auth-modal__eyebrow">Welcome Back</span>
                                <h3 class="rbt-title rbt-text-bold" id="signinModalLabel">Login to your account</h3>

                                @if ($errors->login->any())
                                    <div class="alert alert-danger mb--20" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->login->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login.submit') }}">
                                    @csrf
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="modal_signin_email">Email Address<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <div class="nbc-modal-input-wrap">
                                            <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                            <input class="rbt-input-field" name="email"
                                                placeholder="your@email.com" type="email"
                                                id="modal_signin_email" value="{{ old('email') }}"
                                                autocomplete="email" required>
                                        </div>
                                    </div>
                                    <div class="rbt-input-field-grp mt--20">
                                        <label class="rbt-field-label" for="modal_signin_password">Password<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <div class="nbc-modal-input-wrap">
                                            <i class="fa-regular fa-lock" aria-hidden="true"></i>
                                            <input class="rbt-input-field" name="password"
                                                placeholder="Enter password" type="password"
                                                id="modal_signin_password" autocomplete="current-password" required>
                                        </div>
                                    </div>
                                    <div class="nbc-modal-login-options">
                                        <label>
                                            <input name="remember" type="checkbox" value="1">
                                            <span>Remember me</span>
                                        </label>
                                        <button class="nbc-modal-forgot-link" type="button"
                                            data-bs-toggle="modal" data-bs-target="#forgotPasswordModal"
                                            data-bs-dismiss="modal">
                                            Forgot password?
                                        </button>
                                    </div>
                                    <button type="submit" class="rbt-btn d-block w-100 mt--24">
                                        <i class="fa-regular fa-arrow-right-to-bracket" aria-hidden="true"></i>
                                        Sign In
                                    </button>
                                </form>

                                <!-- Separator -->
                                <div class="d-flex align-items-center justify-content-center mb--24 mt--24">
                                    <hr class="rbt-separator rbt-bg-color-gray-light mb--0">
                                    <span class="pl--8 pr--8 b4 rbt-text-medium">OR</span>
                                    <hr class="rbt-separator rbt-bg-color-gray-light mb--0">
                                </div>

                                <!-- Start social login button -->
                                <a href="{{ route('auth.google') }}"
                                    class="rbt-btn rbt-btn-border rbt-social-login-btn d-flex align-items-center justify-content-center text-decoration-none w-100">
                                    <img class="icon me-2" src="{{ asset('assets/images/icons/google-icon.webp') }}"
                                        alt="Google Icon" style="width: 20px; height: 20px;">
                                    Continue with Google
                                </a>
                                <!-- End social login button -->

                                <div class="rbt-login-system-switch rbt-link-hover">
                                    New to Nature's Beauty Creations?
                                    <button class="rbt-switch-btn" data-bs-toggle="modal"
                                        data-bs-target="#signupModal" data-bs-dismiss="modal"
                                        aria-label="Close"><span>Create an account</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sign In Modal Area  -->

    <!-- Forgot Password Modal -->
    <div class="rbt-default-modal has-rbt-top-folder-shape modal fade nbc-auth-popup" id="forgotPasswordModal"
        tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="forgotPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog rbt-register-form-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="rbt-folder-shape-right-portion">
                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewBox="0 0 85 90"
                        fill="none" aria-hidden="true">
                        <path
                            d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778V90H0V0Z"
                            fill="white" />
                    </svg>
                </div>
                <div class="modal-header">
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="rbt-top-folder-shape-wrapper">
                    <div class="rbt-login-form rbt-bg-color-white rbt-content-trs-portion">
                        <div class="rbt-login-form-inner">
                            <div class="rbt-login-form-top nbc-auth-modal">
                                <span class="nbc-auth-modal__eyebrow">Account Recovery</span>
                                <h3 class="rbt-title rbt-text-bold" id="forgotPasswordModalLabel">Forgot your
                                    password?</h3>
                                <p class="nbc-auth-modal__intro">Enter your account email and we’ll send you a secure
                                    reset link.</p>

                                @if (session('password_status'))
                                    <div class="alert alert-success mb--16" role="status">
                                        {{ session('password_status') }}</div>
                                @endif
                                @if ($errors->passwordEmail->any())
                                    <div class="alert alert-danger mb--16" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->passwordEmail->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="forgot_email">Email Address<span
                                                class="rbt-text-color-danger">*</span></label>
                                        <div class="nbc-modal-input-wrap">
                                            <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                            <input class="rbt-input-field" id="forgot_email" name="email"
                                                type="email" value="{{ old('email') }}"
                                                placeholder="your@email.com" autocomplete="email" required>
                                        </div>
                                    </div>
                                    <button class="rbt-btn d-block w-100 mt--24" type="submit">
                                        <i class="fa-regular fa-paper-plane" aria-hidden="true"></i>
                                        Send Reset Link
                                    </button>
                                </form>
                                <div class="rbt-login-system-switch rbt-link-hover">
                                    Remembered your password?
                                    <button class="rbt-switch-btn" data-bs-toggle="modal"
                                        data-bs-target="#signinModal" data-bs-dismiss="modal"><span>Back to
                                            login</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div class="rbt-default-modal has-rbt-top-folder-shape modal fade nbc-auth-popup" id="resetPasswordModal"
        tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="resetPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog rbt-register-form-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="rbt-folder-shape-right-portion">
                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewBox="0 0 85 90"
                        fill="none" aria-hidden="true">
                        <path
                            d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778V90H0V0Z"
                            fill="white" />
                    </svg>
                </div>
                <div class="modal-header">
                    <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="rbt-top-folder-shape-wrapper">
                    <div class="rbt-login-form rbt-bg-color-white rbt-content-trs-portion">
                        <div class="rbt-login-form-inner">
                            <div class="rbt-login-form-top nbc-auth-modal">
                                <span class="nbc-auth-modal__eyebrow">Secure Account</span>
                                <h3 class="rbt-title rbt-text-bold" id="resetPasswordModalLabel">Create a new
                                    password</h3>

                                @if ($errors->passwordReset->any())
                                    <div class="alert alert-danger mb--16" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->passwordReset->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input name="token" type="hidden" value="{{ request('reset_token') }}">
                                    <div class="rbt-input-field-grp">
                                        <label class="rbt-field-label" for="reset_email">Email Address</label>
                                        <div class="nbc-modal-input-wrap">
                                            <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                            <input class="rbt-input-field" id="reset_email" name="email"
                                                type="email" value="{{ old('email', request('email')) }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="rbt-input-field-grp mt--20">
                                        <label class="rbt-field-label" for="reset_password">New Password</label>
                                        <div class="nbc-modal-input-wrap">
                                            <i class="fa-regular fa-lock" aria-hidden="true"></i>
                                            <input class="rbt-input-field" id="reset_password" name="password"
                                                type="password" autocomplete="new-password" required>
                                        </div>
                                    </div>
                                    <div class="rbt-input-field-grp mt--20">
                                        <label class="rbt-field-label" for="reset_password_confirmation">Confirm
                                            Password</label>
                                        <div class="nbc-modal-input-wrap">
                                            <i class="fa-regular fa-shield-check" aria-hidden="true"></i>
                                            <input class="rbt-input-field" id="reset_password_confirmation"
                                                name="password_confirmation" type="password"
                                                autocomplete="new-password" required>
                                        </div>
                                    </div>
                                    <button class="rbt-btn d-block w-100 mt--24" type="submit">
                                        <i class="fa-regular fa-key" aria-hidden="true"></i>
                                        Update Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Sign In Modal Area  -->
    <div class="rbt-default-modal has-rbt-top-folder-shape modal fade nbc-auth-popup" id="signupModal"
        tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog rbt-register-form-modal modal-dialog-centered">
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
                    <div class="rbt-login-form rbt-bg-color-white rbt-content-trs-portion">
                        <div class="rbt-login-form-inner">
                            <div class="rbt-login-form-top nbc-auth-modal">
                                <span class="nbc-auth-modal__eyebrow">New Customer</span>
                                <h3 class="rbt-title rbt-text-bold" id="signupModalLabel">Register your account</h3>
                                @if ($errors->register->any())
                                    <div class="alert alert-danger mb--20" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->register->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register.submit') }}">
                                    @csrf
                                    <div class="nbc-modal-form-grid">
                                        <div class="rbt-input-field-grp">
                                            <label class="rbt-field-label" for="modal_first_name">First Name<span
                                                    class="rbt-text-color-danger">*</span></label>
                                            <div class="nbc-modal-input-wrap">
                                                <i class="fa-regular fa-user" aria-hidden="true"></i>
                                                <input class="rbt-input-field" id="modal_first_name"
                                                    name="first_name" type="text"
                                                    value="{{ old('first_name') }}" placeholder="First name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="rbt-input-field-grp">
                                            <label class="rbt-field-label" for="modal_last_name">Last Name<span
                                                    class="rbt-text-color-danger">*</span></label>
                                            <div class="nbc-modal-input-wrap">
                                                <i class="fa-regular fa-user" aria-hidden="true"></i>
                                                <input class="rbt-input-field" id="modal_last_name"
                                                    name="last_name" type="text"
                                                    value="{{ old('last_name') }}" placeholder="Last name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="rbt-input-field-grp">
                                            <label class="rbt-field-label" for="modal_register_phone">Phone
                                                Number<span class="rbt-text-color-danger">*</span></label>
                                            <div class="nbc-modal-input-wrap">
                                                <i class="fa-regular fa-phone" aria-hidden="true"></i>
                                                <input class="rbt-input-field" id="modal_register_phone"
                                                    name="phone" type="tel" value="{{ old('phone') }}"
                                                    placeholder="+94 77 123 4567" required>
                                            </div>
                                        </div>
                                        <div class="rbt-input-field-grp">
                                            <label class="rbt-field-label" for="modal_register_email">Email<span
                                                    class="rbt-text-color-danger">*</span></label>
                                            <div class="nbc-modal-input-wrap">
                                                <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                                <input class="rbt-input-field" id="modal_register_email"
                                                    name="email" type="email" value="{{ old('email') }}"
                                                    placeholder="your@email.com" required>
                                            </div>
                                        </div>
                                        <div class="rbt-input-field-grp">
                                            <label class="rbt-field-label"
                                                for="modal_register_password">Password<span
                                                    class="rbt-text-color-danger">*</span></label>
                                            <div class="nbc-modal-input-wrap">
                                                <i class="fa-regular fa-lock" aria-hidden="true"></i>
                                                <input class="rbt-input-field" id="modal_register_password"
                                                    name="password" type="password" autocomplete="new-password"
                                                    placeholder="Minimum 8 characters" required>
                                            </div>
                                        </div>
                                        <div class="rbt-input-field-grp">
                                            <label class="rbt-field-label"
                                                for="modal_password_confirmation">Re-Password<span
                                                    class="rbt-text-color-danger">*</span></label>
                                            <div class="nbc-modal-input-wrap">
                                                <i class="fa-regular fa-shield-check" aria-hidden="true"></i>
                                                <input class="rbt-input-field" id="modal_password_confirmation"
                                                    name="password_confirmation" type="password"
                                                    autocomplete="new-password" placeholder="Re-enter password"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="nbc-modal-consents">
                                        <label>
                                            <input name="accepts_privacy" type="checkbox" value="1" required>
                                            <span>I agree to the Copyright, Legal &amp; Privacy Policies</span>
                                        </label>
                                        <label>
                                            <input name="newsletter" type="checkbox" value="1">
                                            <span>Sign up for our newsletter.</span>
                                        </label>
                                        <label>
                                            <input name="special_offers" type="checkbox" value="1">
                                            <span>Receive special offers</span>
                                        </label>
                                    </div>

                                    <button type="submit" class="rbt-btn d-block w-100 mt--24">
                                        <i class="fa-regular fa-user-plus" aria-hidden="true"></i>
                                        Create Account
                                    </button>
                                </form>

                                <!-- Separator -->
                                <div class="d-flex align-items-center justify-content-center mb--24 mt--24">
                                    <hr class="rbt-separator rbt-bg-color-gray-light mb--0">
                                    <span class="pl--8 pr--8 b4 rbt-text-medium">OR</span>
                                    <hr class="rbt-separator rbt-bg-color-gray-light mb--0">
                                </div>

                                <!-- Start social login button -->
                                <a href="{{ route('auth.google') }}"
                                    class="rbt-btn rbt-btn-border rbt-social-login-btn d-flex align-items-center justify-content-center text-decoration-none w-100">
                                    <img class="icon me-2" src="{{ asset('assets/images/icons/google-icon.webp') }}"
                                        alt="Google Icon" style="width: 20px; height: 20px;">
                                    Sign Up with Google
                                </a>
                                <!-- End social login button -->

                                <div class="rbt-login-system-switch rbt-link-hover">
                                    Already registered?
                                    <button class="rbt-switch-btn" data-bs-toggle="modal"
                                        data-bs-target="#signinModal" data-bs-dismiss="modal"
                                        aria-label="Close"><span>Sign In</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sign In Modal Area  -->

    <div class="rbt-toolbar rbt-toolbar--bottom d-block d-xl-none">
        <div class="container p--0">
            <div class="row row row--0">
                <div class="col-md-12">
                    <ul class="rbt-quick-access onepagenav">
                        <li class="rbt-access-box">
                            <a href="{{ route('shop') }}" class="rbt-round-btn has-rbt-md-fsize">
                                <i class="fa-regular fa-bag-shopping"></i>
                                <span class="rbt-toolbar-label"> Shop</span>
                            </a>
                        </li>

                        <li class="rbt-access-box rbt-wishlist">
                            <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal"
                                data-bs-target="#wishlistModal">
                                <i class="fa-regular fa-heart"></i>
                                <div class="access-box-count">{{ Auth::check() ? Auth::user()->wishlists()->count() : 0 }}</div>
                                <span class="rbt-toolbar-label"> Wishist</span>
                            </a>
                        </li>

                        <li class="rbt-access-box">
                            <a class="rbt-common-search-trigger-active rbt-round-btn has-rbt-md-fsize rbt-modern-close-btn"
                                href="{{ route('home') }}">
                                <i class="fa-regular fa-house search-icon"></i>
                                <div class="modern-close-wrapper"></div>
                                <span class="rbt-toolbar-label"> Home</span>
                            </a>
                        </li>



                        <li class="rbt-access-box">
                            <a href="#!" class="rbt-round-btn has-rbt-md-fsize" data-bs-toggle="modal"
                                data-bs-target="#signinModal">
                                <i class="fa-regular fa-user"></i>
                                <span class="rbt-toolbar-label"> Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer aera -->
    <div class="rbt-toaster rbt-toaster-compare" role="alert" aria-atomic="true" aria-live="assertive"><i
            class="fa-regular fa-check mr--8"></i>Added in Compare</div>
    <div class="rbt-toaster rbt-toaster-wishlist" role="alert" aria-atomic="true" aria-live="assertive"><i
            class="fa-regular fa-check mr--8"></i>Added in Wishlist</div>
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewbox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>

    @include('components.cart-drawer')
    @include('components.wishlist-modal')
    @include('components.add-to-cart-modal')

    <a class="close_side_menu catagories-close_side_menu" href="javascript:void(0);"></a>
    <a href="javascript:void(0);" class="common-close_search_dropdown"></a>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/vendor/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-appear.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/animation.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/text-type.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/odometer.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/backtotop.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imageloaded.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/color-swatches.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap-datepicker.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/nbc-cart.js') }}?v={{ filemtime(public_path('assets/js/nbc-cart.js')) }}"></script>
    <script>
        window.IS_AUTHENTICATED = @json(Auth::check());
    </script>
    <script src="{{ asset('assets/js/nbc-wishlist.js') }}?v={{ filemtime(public_path('assets/js/nbc-wishlist.js')) }}"></script>

    @php
        $authModalId = match (true) {
            $errors->register->any() => 'signupModal',
            $errors->passwordEmail->any() || session()->has('password_status') => 'forgotPasswordModal',
            $errors->passwordReset->any() || request()->filled('reset_token') => 'resetPasswordModal',
            $errors->login->any() => 'signinModal',
            default => null,
        };
    @endphp
    @if ($authModalId)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalId = @json($authModalId);
                const modalElement = document.getElementById(modalId);

                if (modalElement && window.bootstrap) {
                    bootstrap.Modal.getOrCreateInstance(modalElement).show();
                }
            });
        </script>
    @endif

    <script>
        (function() {
            'use strict';

            var searchInputs = document.querySelectorAll('.nbc-search-input');
            var debounceTimer = null;

            searchInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    var val = this.value.trim();
                    var dropdown = this.closest('.rbt-search-dropdown');
                    if (!dropdown) return;

                    var container = dropdown.querySelector('.nbc-live-search-container');
                    var resultsDiv = dropdown.querySelector('.nbc-live-search-results');
                    var countBadge = dropdown.querySelector('.nbc-live-search-count');

                    if (!container || !resultsDiv) return;

                    if (debounceTimer) clearTimeout(debounceTimer);

                    if (val.length < 2) {
                        container.style.display = 'none';
                        resultsDiv.innerHTML = '';
                        return;
                    }

                    debounceTimer = setTimeout(function() {
                        fetch('{{ route('search.live') }}?q=' + encodeURIComponent(val), {
                            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                        })
                        .then(function(res) { return res.json(); })
                        .then(function(data) {
                            if (data.status === 'success') {
                                var products = data.products || [];
                                if (countBadge) countBadge.textContent = data.count + ' found';

                                if (products.length > 0) {
                                    var html = '';
                                    products.forEach(function(p) {
                                        html += `
                                        <a href="${p.url}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-2 border-bottom">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="${p.image}" alt="${p.name}" width="42" height="42" style="object-fit: contain; border-radius: 6px; background: #f8fafc; border: 1px solid #e2e8f0;">
                                                <div>
                                                    <div class="fw-bold text-dark small" style="line-height: 1.3;">${p.name}</div>
                                                    ${p.category ? '<small class="text-muted" style="font-size: 11px;">' + p.category + '</small>' : ''}
                                                </div>
                                            </div>
                                            <div class="text-end ms-2" style="white-space: nowrap;">
                                                <span class="fw-bold text-success small">${p.price_formatted}</span>
                                            </div>
                                        </a>`;
                                    });
                                    if (data.count > products.length && data.view_all_url) {
                                        html += `
                                        <a href="${data.view_all_url}" class="list-group-item list-group-item-action text-center fw-bold small p-2">
                                            View all ${data.count} results
                                        </a>`;
                                    }
                                    resultsDiv.innerHTML = html;
                                    resultsDiv.scrollTop = 0;
                                    container.style.display = 'block';
                                } else {
                                    resultsDiv.innerHTML = `
                                    <div class="p-3 text-center text-muted small bg-light">
                                        <i class="fa-regular fa-magnifying-glass me-1"></i> No matching products found for "${val}"
                                    </div>`;
                                    container.style.display = 'block';
                                }
                            }
                        })
                        .catch(function(err) {
                            console.error('Live search error:', err);
                        });
                    }, 250);
                });
            });
        })();
    </script>

    <script type="module" src="beacon.min.js/v4513226cdae34746b4dedf0b4dfa099e1781791509496"
        integrity="sha512-ZE9pZaUXND66v380QUtch/5sE9tPFh2zg45pR2PB0CVkCtOREv2AJKkSidISWkysEuQ0EH8faUU5du78bx87UQ=="
        data-cf-beacon='{"version":"2024.11.0","token":"4a64ee10db7a4427ba649e901229556e","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
        crossorigin="anonymous"></script>
</body>


</html>
