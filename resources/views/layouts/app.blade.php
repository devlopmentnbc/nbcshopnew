<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', "Nature's Beauty Creations")</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Shop authentic herbal beauty and personal care products from Nature's Beauty Creations.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="preload" href="css2?family=Cabin:wght@400;500;600;700&family=Caveat:wght@400;500;600;700&family=Bebas+Neue&family=Caprasimo&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="css2?family=Cabin:wght@400;500;600;700&family=Caveat:wght@400;500;600;700&family=Bebas+Neue&family=Caprasimo&display=swap">
    </noscript>
    <link rel="preload" href="{{ asset('assets/fonts/fa-brands-400.woff2') }}" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="{{ asset('assets/fonts/fa-regular-400.woff2') }}" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="{{ asset('assets/fonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin="">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="preload" href="{{ asset('assets/css/plugins/fontawesome-all.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
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
    <link rel="stylesheet" href="{{ asset('assets/css/nbc.css') }}?v={{ filemtime(public_path('assets/css/nbc.css')) }}">
    @stack('page-styles')
</head>


<body class="rbt-header-sticky">
    <header class="rbt-header rbt-header-9">

    <div class="rbt-header-wrapper rbt-header-sticky-activation rbt-header-wrapper-three rbt-header-wrapper-one header-space-between rbt-bg-color-white header-not-transparent header-sticky plr--0">
    <div class="rbt-header-campaign rbt-header-campaign-1 rbt-header-top-news rbt-topbar-bg-img rbt-topbar-bg-one">
        <div class="rbt-corner-portion-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="inner justify-content-center">
                            <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                <div class="swiper-wrapper w-100">
                                    <div class="swiper-slide">
                                        <div class="rbt-fancy-item fancy-menu-text fancy-menu-start">
                                            <p class="rbt-fancy-text rbt-text-color-white">Authentic NBC products delivered islandwide.
                                                <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop Now</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rbt-fancy-item fancy-menu-text fancy-menu-start">
                                            <p class="rbt-fancy-text rbt-text-color-white">Herbal beauty inspired by nature since 1984.
                                                <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop Now</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rbt-fancy-item fancy-menu-text fancy-menu-start">
                                            <p class="rbt-fancy-text rbt-text-color-white">Discover special online offers from NBC.
                                                <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop Now</a>
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
                                    <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}" alt="NBC Logo Images">
                                </a>
                            </div>
                        </div>
                        <div class="header-info p-0 d-none d-xl-flex rbt-category-update rbt-category-update-var-modern">
                            <a class="rbt-btn-transparent has-bg-shape-hover" href="shop-by-categories.html">
                                <i class="fa-solid fa-bars"></i>
                                <span>Shop by Categories</span>
                            </a>

                            <!-- Start Update Cart Dropdown  -->
<div class="rbt-update-category-dropdown">
    <div class="inner">
        <ul class="rbt-dropdown-parent-wrapper">
            <li class="dropdown-parent-list">
                <a href="shop-by-categories.html">
                    <span><i class="fa-regular fa-house-chimney"></i></span>Home & Garden
                    <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                </a>
                <div class="rbt-dropdown-child-wrapper rbt-dropdown-child-wrapper-lg ">
                    <div class="rbt-child-inner">
                        <!-- Start Catagory Mega Menu-->
                        <div class="rbt-megamenu grid-item-2">
                            <div class="rbt-megamenu-wrapper">
                                <div class="row row--16">
                                    <div class="col-lg-6 col-xl-7 col-xxl-7">
                                        <div class="row row--16">
                                            <div class="col-lg-6 col-xl-6 col-xxl-6 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                                            <div class="col-lg-6 col-xl-6 col-xxl-6 single-mega-item rbt-scroll-trigger fade_in animation-order-2">
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
                                            <div class="col-lg-12">
                                                <div class="rbt-quick-info-tag d-flex mt--16">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z" fill="url(#paint0_linear_47_23647)"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z" fill="#FC9502"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z" fill="#FCE202"></path>
                                                        <defs>
                                                            <lineargradient id="paint0_linear_47_23647" x1="11.9995" y1="22.0148" x2="11.9995" y2="2.01511" gradientunits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#FF4C0D"></stop>
                                                                <stop offset="1" stop-color="#FC9502"></stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                    <p><strong>Free Express Shipping</strong> on orders Rs. 200!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-5 col-xxl-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                            </div>
                        </div>
                        <!-- End Catagory Mega Menu-->
                    </div>
                </div>
            </li>
            <li class="dropdown-parent-list">
                <a href="shop-by-categories.html"><span><i class="fa-regular fa-mobile-notch"></i></span>Smart Phones
                    <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                </a>
                <div class="rbt-dropdown-child-wrapper rbt-dropdown-child-wrapper-lg ">
                    <div class="rbt-child-inner">
                        <!-- Start Catagory Mega Menu-->
                        <div class="rbt-megamenu grid-item-2">
                            <div class="rbt-megamenu-wrapper">
                                <div class="row row--16">
                                    <div class="col-lg-6 col-xl-7 col-xxl-7">
                                        <div class="row row--16">
                                            <div class="col-lg-6 col-xl-6 col-xxl-6 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                                            <div class="col-lg-6 col-xl-6 col-xxl-6 single-mega-item rbt-scroll-trigger fade_in animation-order-2">
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
                                            <div class="col-lg-12">
                                                <div class="rbt-quick-info-tag d-flex mt--16">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z" fill="url(#paint0_linear_47_23648)"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z" fill="#FC9502"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z" fill="#FCE202"></path>
                                                        <defs>
                                                            <lineargradient id="paint0_linear_47_23648" x1="11.9995" y1="22.0148" x2="11.9995" y2="2.01511" gradientunits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#FF4C0D"></stop>
                                                                <stop offset="1" stop-color="#FC9502"></stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                    <p><strong>Free Express Shipping</strong> on orders Rs. 200!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-5 col-xxl-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                            </div>
                        </div>
                        <!-- End Catagory Mega Menu-->
                    </div>
                </div>
            </li>
            <li class="dropdown-parent-list">
                <a href="shop-by-categories.html">
                    <span><i class="fa-regular fa-desktop"></i></span>Electronics Gadgets
                    <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                </a>
                <div class="rbt-dropdown-child-wrapper rbt-dropdown-child-wrapper-lg ">
                    <div class="rbt-child-inner">
                        <!-- Start Catagory Mega Menu-->
                        <div class="rbt-megamenu grid-item-2">
                            <div class="rbt-megamenu-wrapper">
                                <div class="row row--16">
                                    <div class="col-lg-6 col-xl-7 col-xxl-7">
                                        <div class="row row--16">
                                            <div class="col-lg-6 col-xl-6 col-xxl-6 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                                            <div class="col-lg-6 col-xl-6 col-xxl-6 single-mega-item rbt-scroll-trigger fade_in animation-order-2">
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
                                            <div class="col-lg-12">
                                                <div class="rbt-quick-info-tag d-flex mt--16">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9706 14.9359C18.8148 18.8649 15.7493 22 11.9891 22C8.12909 22 5 18.5858 5 14.6221C5 14.0924 4.99101 13.0336 5.74352 11.2472C6.19387 10.1781 6.47633 9.50646 6.63574 8.89253C6.72333 8.55511 6.89367 8.01904 7.37926 8.89253C7.66559 9.40757 7.67666 10.1483 7.67666 10.1483C7.67666 10.1483 8.74197 9.28536 9.4611 7.63673C10.5153 5.21985 9.67419 3.77512 9.38675 2.77048C9.28727 2.42294 9.22481 1.79833 9.90721 2.06409C10.6025 2.33495 12.4408 3.69334 13.4017 5.12512C14.7732 7.16855 15.2605 9.128 15.2605 9.128C15.2605 9.128 15.6997 8.55268 15.8553 7.95068C16.0312 7.27089 16.0338 6.59763 16.5988 7.32285C17.1361 8.01253 17.9341 9.3086 18.3833 10.5408C19.1989 12.7784 18.9706 14.9359 18.9706 14.9359Z" fill="url(#paint0_linear_47_23649)"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 22C9.23852 22 7 19.7944 7 17.0735C7 15.4318 7.67145 14.435 9.0689 13.0833C9.96366 12.2179 10.8011 11.1549 11.157 10.4311C11.2271 10.2886 11.3866 9.54605 12.0014 10.4155C12.3239 10.8714 12.8296 11.6823 13.1538 12.3744C13.7127 13.5676 13.8461 14.7239 13.8461 14.7239C13.8461 14.7239 14.3938 14.4059 14.7692 13.5871C14.8902 13.3232 15.1348 12.3241 15.8186 13.323C16.3204 14.0561 17.0097 15.3741 16.9999 17.0735C16.9999 19.7944 14.7613 22 11.9999 22Z" fill="#FC9502"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1019 16C12.8497 16 12.8497 17.4475 13.7996 19.3803C14.4321 20.6672 13.486 22 12.1019 22C10.7178 22 10 20.8271 10 19.3803C10 17.9335 11.3541 16 12.1019 16Z" fill="#FCE202"></path>
                                                        <defs>
                                                            <lineargradient id="paint0_linear_47_23649" x1="11.9995" y1="22.0148" x2="11.9995" y2="2.01511" gradientunits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#FF4C0D"></stop>
                                                                <stop offset="1" stop-color="#FC9502"></stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                    <p><strong>Free Express Shipping</strong> on orders Rs. 200!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-5 col-xxl-5 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                            </div>
                        </div>
                        <!-- End Catagory Mega Menu-->
                    </div>
                </div>
            </li>
            <li class="dropdown-parent-list">
                <a href="shop-by-categories.html">
                    <span><i class="fa-regular fa-shirt"></i></span>Fashion Wear
                </a>
            </li>
            <li class="dropdown-parent-list">
                <a href="shop-by-categories.html">
                    <span><i class="fa-regular fa-camera"></i></span>Cameras & Photo
                </a>
            </li>
            <li class="dropdown-parent-list">
                <a href="shop-by-categories.html">
                    <span><i class="fa-regular fa-cauldron"></i></span>Cooking Items
                </a>
            </li>
            <li class="dropdown-parent-list">
                <a href="shop-by-categories.html">
                    <span><i class="fa-regular fa-heart-pulse"></i></span>Health & Beauty
                </a>
            </li>
            <li class="dropdown-parent-list">
                <a href="categories-list.html">
                    View All Categories <i class="fa-regular fa-chevron-right ml--8"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End Update Cart Dropdown  -->
                        </div>
                    </div>
                </div>

                <div class="rbt-header-content">
                    <div class="header-info d-none d-xl-block ">
                        <nav class="rbt-mainmenu-nav">
    <ul class="mainmenu has-nav-bg-shape-hover">
        <li class="with-rbt-megamenu has-menu-child-item position-static rbt-initial-odo-count">
            <a href="#!">Demos <i class="fa-regular fa-chevron-down"></i></a>
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

        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="#!">Shop <i class="fa-regular fa-chevron-down"></i></a>
            <!-- Start Mega Menu  -->
<div class="rbt-megamenu rbt-megamenu-4">
    <div class="rbt-megamenu-wrapper p--0">
        <div class="row row--0">
            <div class="col-3 ">
                <div class="rbt-menu-tab-wrapper">
                    <nav id="rbt-megamenuTab" class="nav nav-pills flex-column rbt-megamenu-tab rbt-megamenu-tab-cs-activation">
                        <a href="#rbt-megamenu_tab1" data-bs-toggle="pill" class="active nav-link">
                            <span><i class="fa-regular fa-store"></i></span>
                            Shop Pages
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="#rbt-megamenu_tab3" data-bs-toggle="pill" class="nav-link">
                            <span><i class="fa-regular fa-shirt"></i></span>
                            Single Product
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="#rbt-megamenu_tab2" data-bs-toggle="pill" class="nav-link">
                            <span><i class="fa-regular fa-swatchbook"></i></span>
                            Products Variation
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="#rbt-megamenu_tab4" data-bs-toggle="pill" class="nav-link">
                            <span><i class="fa-regular fa-screwdriver-wrench"></i></span>
                            Advance Features
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="admin/index.htm" target="_blank" class="nav-link">
                            <span><i class="fa-regular fa-chart-pie"></i></span>
                            Admin Dashboard
                        </a>
                        <a href="#" class="nav-link disabled">
                            <span><i class="fa-regular fa-shopping-bag"></i></span>
                            Multivendor Shop
                            <span class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                Coming
                            </span>
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                    </nav>
                    <div class="rbt-tab-banner-img">
                        <img src="{{ asset('assets/images/splash/menu-banner/menu-tab-banner-01.webp') }}" alt="Ecommerce Mennu Bnner">
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="rbt-menu-tab-content-wrapper">
                    <div class="tab-content rbt-megamenu-tab-content" id="megamenu-tab-content">
                        <div class="tab-pane show active" id="rbt-megamenu_tab1">
                            <div class="row row--24">
                                <div class="col-xl-8">
                                    <div class="row row--8">
                                        <div class="col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                                                <li><a href="shop-filter-list-left-sidebar.html">Shop List Left
                                                        Sidebar</a></li>
                                                <li><a href="shop-filter-list-right-sidebar.html">Shop List Right
                                                        Sidebar</a></li>
                                                <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                <li><a href="shop-sticky-sidebar.html">Sticky Sidebar Shop
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            NEW
                                                        </div>
                                                    </a></li>
                                                <li><a href="shop-collapsible-sidebar.html">Collapse Sidebar Shop</a>
                                                </li>
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
                                        <div class="col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-2">
                                            <p class="rbt-short-title h5">Custom Pages</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="shop-filter-grid-two.html">Two Columns</a></li>
                                                <li><a href="shop-filter-grid-three.html">Three Columns</a></li>
                                                <li><a href="shop-filter-grid-four.html">Four Columns
                                                        <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded ml--8">
                                                            HOT
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
                                                <li><a href="shop-collapse-filter-top.html">Hidden Side Bar Shop</a>
                                                </li>
                                                <li><a href="products-show-countdown-shop-style-two.html">Products Show
                                                        Countdown Two</a>
                                                </li>
                                                <li><a href="products-even-list-shop.html">Even List Products</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-3">
                                            <p class="rbt-short-title h5">Custom Pages</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="shop-no-page-heading.html">Shop No Page Heading</a></li>
                                                <li><a href="shop-only-category.html">Shop Only Category</a></li>
                                                <li><a href="shop-offcanvas-sidebar-left.html">Shop offcanvas Left</a>
                                                </li>
                                                <li><a href="shop-offcanvas-sidebar-right.html">Shop offcanvas Right</a>
                                                </li>
                                                <li><a href="shop-offcanvas-sidebar-top.html">Shop offcanvas top</a>
                                                </li>
                                                <li><a href="shop-offcanvas-sidebar-bottom.html">Shop offcanvas
                                                        Bottom</a></li>
                                                <li><a href="shop-collapse-filter-bottom.html">Shop Filter Collapse
                                                        Bottom</a></li>
                                                <li><a href="shop-collapse-filter-left.html">Shop Filter Collapse
                                                        Left</a></li>
                                                <li><a href="shop-collapse-filter-right.html">Shop Filter Collapse
                                                        Right</a></li>
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
                                <div class="col-xl-4 rbt-scroll-trigger fade_in animation-order-4">
                                    <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-three h-100 min-h-500">
                                        <div class="mega-top-banner h-100 align-items-start justify-content-center">
                                            <div class="rbt-banner-inner rbt-banner-inner-black flex-column rbt-gap--16 align-items-center text-center">
                                                <div class="rbt-banner-content">
                                                    <p class="b4 subtitle mb--0">Embrace comfy wear</p>
                                                    <h2 class="h5 mb--4">Ready to fall in love
                                                        with Autumn collection!</h2>
                                                </div>
                                                <a class="rbt-btn rbt-bg-color-secondary rbt-btn-sm" href="{{ route('shop') }}">Shop Collection</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rbt-megamenu_tab3">
                            <div class="d-flex flex-column justify-content-between">
                                <div class="row row--24">
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Page Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-default.html">Product Single Default</a></li>
                                            <li><a href="product-single-fashion.html">Product Single Fashion<div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded ml--8">
                                                        TOP
                                                    </div></a></li>
                                            <li><a href="product-single-furniture.html">Product Single Furniture</a>
                                            </li>
                                            <li><a href="product-single-cosmetic-beauty.html">Product Single Beauty
                                                    Product</a></li>
                                            <li><a href="product-single-phone-case.html">Product Single Phone Case</a>
                                            </li>
                                            <li><a href="product-single-accessories.html">Product Single Accessories</a>
                                            </li>
                                            <li><a href="product-single-tech-accessories.html">Product Single Tech
                                                    Accessories</a></li>
                                            <li><a href="product-single-animal-accessories.html">Product Single Animal
                                                    Accessories</a></li>
                                            <li><a href="product-single-ladies-bag.html">Product Ladies Bag</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Page Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-laggage-bag.html">Product Single Laggage Bag</a>
                                            </li>
                                            <li><a href="product-single-printing-service.html">Product Single Print
                                                    Product</a></li>
                                            <li><a href="product-single-sports-shoe.html">Product Keds
                                                    <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded ml--8">
                                                        POPULAR
                                                    </div>
                                                </a></li>
                                            <li><a href="product-single-accessories-two.html">Product Single Accessories
                                                    Two</a></li>
                                            <li><a href="product-single-gallary-two-v360.html">Product Single 360 Angle
                                                    View
                                                </a></li>
                                            <li><a href="product-single-gallary.html">Product Grid Gallary
                                                </a></li>
                                            <li><a href="product-single-gallary-two.html">Product Grid Gallary
                                                    Two</a></li>
                                            <li><a href="#!">Product Classic
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                            <li><a href="#!">Product Accessories Three
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Custom Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-sticky-info.html">Product Single Sticky Info</a>
                                            </li>
                                            <li><a href="product-single-sticky-info-both.html">Product Single Sticky
                                                    Info Both</a></li>
                                            <li><a href="product-single-sticky-thumb.html">Product Single Thumb
                                                    sticky</a></li>
                                            <li><a href="product-single-gallary-side-view.html">Product Single Side
                                                    View</a></li>
                                            <li><a href="product-single-stock-out.html">Product Single Out of Stock</a>
                                            </li>
                                            <li><a href="product-single-with-buy-more-option.html">Product Single with
                                                    Buy More Option</a></li>
                                            <li><a href="product-single-with-buy-more-option2.html">Product Single with
                                                    Buy More Option Style 2</a></li>
                                            <li><a href="#!">Product Cross-Sell
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                            <li><a href="#!">Product Feature
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Custom Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-grid.html">Product Grid
                                                    <div class="rbt-product-badge rbt-product-badge-bg-red border-rounded ml--8">
                                                        Trending
                                                    </div>
                                                </a></li>
                                            <li><a href="product-single-grid-sidebar.html">Product Grid With Sidebar</a>
                                            </li>
                                            <li><a href="product-single-masonary.html">Product Single Masonary</a>
                                            </li>
                                            <li><a href="product-single-gallary-side-view-two.html">Product Single Side
                                                    View Two</a>
                                            </li>
                                            <li><a href="product-single-gallary-side-view-three.html">Product Single
                                                    Side View Three</a></li>
                                            <li><a href="product-single-gallary-side-view-four.html">Product Single Side
                                                    View Four</a></li>
                                            <li><a href="product-single-gallary-two-zoom-v1.html">Product Single
                                                    Zoom01</a></li>
                                            <li><a href="product-single-gallary-two-zoom-v2.html">Product Single
                                                    Zoom02</a></li>
                                            <li><a href="product-single-gallary-two-zoom-v3.html">Product Single
                                                    Zoom03</a></li>
                                            <li><a href="#!">Product AR Preview
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row row--24">
                                    <hr class="rbt-separator rbt-separator-gray200 mb--16 mt--16 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                                    <div class="col-lg-12">
                                        <div class="swiper rbt-sm-review-card-swiper-activation-1 rbt-arrow-between has-right-bg-shape has-right-bg-shape-sm-width rbt-arrow-show-dfl">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="rbt-sm-review-card">
                                                        <div class="rbt-sm-review-card">
                                                            <div class="rbt-avatar-img-wrapper">
                                                                <div class="rbt-avatar-img"><img src="{{ asset('assets/images/reviewer-img/avater-sm-01.webp') }}" alt="Eccommerce Client Image"></div>
                                                                <span class="rbt-avarter-authintication-icon"><i class="fa-solid fa-shield-check"></i></span>
                                                            </div>
                                                            <div class="rbt-avater-content-wrapper">
                                                                <span class="title">Went above & beyond</span>
                                                                <div class="desc-wrapper">
                                                                    <p class="desc">Ralph Edwards</p>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="rbt-sm-review-card">
                                                        <div class="rbt-sm-review-card">
                                                            <div class="rbt-avatar-img-wrapper">
                                                                <div class="rbt-avatar-img"><img src="{{ asset('assets/images/reviewer-img/avater-sm-02.webp') }}" alt="Eccommerce Client Image"></div>
                                                                <span class="rbt-avarter-authintication-icon"><i class="fa-solid fa-shield-check"></i></span>
                                                            </div>
                                                            <div class="rbt-avater-content-wrapper">
                                                                <span class="title">Went above & beyond</span>
                                                                <div class="desc-wrapper">
                                                                    <p class="desc">Ralph Edwards</p>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="rbt-sm-review-card">
                                                        <div class="rbt-sm-review-card">
                                                            <div class="rbt-avatar-img-wrapper">
                                                                <div class="rbt-avatar-img"><img src="{{ asset('assets/images/reviewer-img/avater-sm-03.webp') }}" alt="Eccommerce Client Image"></div>
                                                                <span class="rbt-avarter-authintication-icon"><i class="fa-solid fa-shield-check"></i></span>
                                                            </div>
                                                            <div class="rbt-avater-content-wrapper">
                                                                <span class="title">Went above & beyond</span>
                                                                <div class="desc-wrapper">
                                                                    <p class="desc">Ralph Edwards</p>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbt-swiper-arrow rbt-arrow-right rbt-arrow-gray">
                                                <div class="custom-overflow">
                                                    <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                                    <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rbt-megamenu_tab2">
                            <div class="row row--24">
                                <div class="col-xl-8">
                                    <div class="row row--8">
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Hover Styles</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="products-all-info-shop.html">All Info Products</a></li>
                                                <li><a href="products-scale-hover-shop.html">Transform Style One</a>
                                                </li>
                                                <li>
                                                    <a href="products-hover-add-tocart-shop.html">
                                                        Hover Add to Cart
                                                        <div class="rbt-product-badge rbt-product-badge-bg-red border-rounded">
                                                            Top
                                                        </div>
                                                    </a>
                                                </li>
                                                <li><a href="products-standard-shop.html">Standard Products Shop</a>
                                                </li>
                                                <li><a href="products-icons-hover-shop.html">Transform Style Two</a>
                                                </li>
                                                <li><a href="products-button-onimage-shop.html">Transform Style
                                                        Three</a></li>
                                                <li><a href="products-additional-info-shop.html">Hover Additional
                                                        Info</a></li>
                                                <li><a href="products-button-visible-hover-shop.html">Transform Style
                                                        Four</a></li>
                                                <li><a href="products-shadow-hover-shop.html">Shadow Products Shop
                                                        <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
                                                            POPULAR
                                                        </div>
                                                    </a></li>
                                                <li><a href="products-small-variation-shop.html">Products Small Size</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Product Styles</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="products-shadow-hover-shop.html">Shadow Products Shop
                                                        <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
                                                            POPULAR
                                                        </div>
                                                    </a></li>
                                                <li><a href="products-even-grid.html">Even Grid Products</a></li>
                                                <li><a href="products-border-column-shop.html">Bordered Products
                                                        Shop</a></li>
                                                <li><a href="products-inside-border-column-shop.html">Bordered inside
                                                        Products Shop</a></li>
                                                <li><a href="products-even-list-shop.html">Even List Products</a></li>
                                                <li><a href="products-show-rating-shop.html">
                                                        Products Show Rating
                                                        <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded">
                                                            HOT
                                                        </div>
                                                    </a></li>
                                                <li><a href="products-show-progressbar-shop.html">Products Show
                                                        Progress-bar</a></li>
                                                <li><a href="products-show-countdown-shop.html">Products Show
                                                        Countdown</a></li>
                                                <li><a href="products-show-countdown-shop-style-two.html">Products Show
                                                        Countdown Two</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Catagories Design</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="categories-style-circle.html">Catagories Style Circle</a>
                                                </li>
                                                <li><a href="categories-style-round-box.html">Catagories Style Round
                                                        Box</a></li>
                                                <li><a href="categories-style-button-circle.html">Catagories Style
                                                        Button Circle</a></li>
                                                <li><a href="categories-style-simple-box.html">Catagories Style Simple
                                                        Box</a></li>
                                                <li><a href="categories-style-bento-box.html">Catagories Style Bento
                                                        Box</a></li>
                                                <li><a href="categories-style-linked-box.html">Catagories Style Linked
                                                        Box</a></li>
                                                <li><a href="categories-style-linked-box-swiper.html">Catagories
                                                        Linked Swiper</a>
                                                </li>
                                                <li><a href="categories-style-button-boxed.html">Catagories Button
                                                        Boxed</a></li>
                                                <li><a href="categories-style-classic-bento.html">Catagories
                                                        Classic Bento </a>
                                                </li>
                                                <li><a href="categories-style-mini-bento.html">Catagories Mini
                                                        Bento </a></li>
                                            </ul>
                                        </div>
                                        <hr class="rbt-separator rbt-separator-gray200 mb--16 mt--24 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                                        <div class="col-lg-12">
                                            <ul class="rbt-nav-brand-list liststyle d-flex justify-content-between">
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
                                <div class="col-xl-4">
                                    <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-four h-100">
                                        <div class="mega-top-banner h-100 align-items-end justify-content-start">
                                            <div class="rbt-banner-inner rbt-banner-inner-black flex-column rbt-gap--16 align-items-start text-left">
                                                <div class="rbt-banner-content">
                                                    <p class="b4 subtitle rbt-text-color-white mb--0">Embrace comfy wear
                                                    </p>
                                                    <h2 class="h5 mt--4 mb--0 rbt-text-color-white">Ready to fall in
                                                        love
                                                        with Autumn collection!</h2>
                                                </div>
                                                <a class="rbt-btn rbt-bg-color-secondary rbt-btn-sm" href="#">Shop
                                                    Collection</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rbt-megamenu_tab4">
                            <div class="row row--24">
                                <div class="col-xl-8">
                                    <div class="row row--8">
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Configuring Settings</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="feature-sticky-nav.html">Sticky navigation</a></li>
                                                <li><a href="feature-frequently-baught-together.html">Frequently bought
                                                        together</a></li>
                                                <li><a href="feature-catalog-mode.html">Catalog mode Shop</a></li>
                                                <li><a href="feature-mobile-bottom-nav.html">Mobile Bottom Navbar</a>
                                                </li>
                                                <li><a href="feature-sign-in-btn.html">Sign In to Prices</a></li>
                                                <li><a href="shop-collapsible-sidebar.html">Shop Sidebar widgets
                                                        Collapse</a></li>
                                                <li><a href="feature-image-slider.html">Image Slider</a></li>
                                                <li><a href="feature-sticky-nav.html">Sticky navigation</a></li>
                                                <li><a href="#!">Product Modern
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Product Customization
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Advanced Search Filters
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Product Features</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="feature-all-image-shop.html">All Images on Shop</a></li>
                                                <li><a href="feature-size-guide.html">Size Guides PopUp</a></li>
                                                <li><a href="feature-product-single-gallary-v360.html">Product 360
                                                        view</a></li>
                                                <li><a href="feature-product-vedio.html">Product Video
                                                        <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded">
                                                            HOT
                                                        </div>
                                                    </a></li>
                                                <li><a href="feature-special-offer-banner.html">Product Special
                                                        Video</a></li>
                                                <li><a href="feature-product-stock-progressbar.html">Product Stock
                                                        ProgressBar</a></li>
                                                <li><a href="feature-product-custom-design-uploder.html">Product Custom
                                                        Design Uploader</a></li>
                                                <li><a href="feature-product-single-full-width.html">FullWidth Product
                                                        Single</a></li>
                                                <li><a href="feature-mobile-bottom-nav.html">Mobile Bottom Navbar</a>
                                                </li>
                                                <li><a href="#!">Quick View Feature
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Product Compare
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Product Wishlist Sync
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Extra Features</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout-delivery-step-one.html">Checkout Page</a></li>
                                                <li><a href="checkout-delivery-step-two.html">Checkout Delivery Info</a>
                                                </li>
                                                <li><a href="checkout-payment.html">Checkout Payment</a></li>
                                                <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                                <li><a href="checkout-thankyou.html">Thank You</a></li>
                                                <li><a href="my-order-history.html">Order History</a></li>
                                                <li><a href="my-reviews.html">My Reviews</a></li>
                                                <li><a href="#!">Order Tracking
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Loyalty Points Program
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Gift Card Feature
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Subscription Service
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="rbt-swiper-container">
                                        <div class="swiper rbt-megamenu-prd-card-activation-1 pb--24">
                                            <div class="swiper-wrapper">
                                                <!-- Start single card -->
                                                <div class="swiper-slide">
                                                    <div class="rbt-card rbt-product-card">
                                                        <div class="rbt-card-img rbt-bg-color-default">
                                                            <a href="product-single-default.html">
                                                                <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" alt="Card Image">
                                                            </a>
                                                            <div class="rbt-badge-wrapper rbt-content-top-left">
                                                                <div class="rbt-product-badge rbt-product-badge-bg-secondary">
                                                                    SALE</div>
                                                            </div>
                                                            <div class="rbt-quick-btn-grp has-mixup-midlayer rbt-top-right--position hover-variation-one">
                                                                <button class="rbt-wishlisted-btn bg-light-one rbt-quick-btn tooltips" type="button" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                                                <button class="rbt-watch-btn bg-light-one rbt-quick-btn tooltips" data-tooltip="Quick View" data-tooltip-position="left" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></button>
                                                            </div>
                                                            <a class="rbt-btn hover-appear-element bottom-position text-center rbt-btn-sm rbt-square-btn d-block has-left-icon" href="#!" data-bs-toggle="modal" data-bs-target="#quickviewModal">Select Option</a>
                                                        </div>
                                                        <div class="rbt-card-body rbt-card-body-center-align">
                                                            <div class="rbt-color-select-area justify-content-center">
                                                                <ul class="rbt-switcher-color-list product-switcher-activation">
                                                                    <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#C64B3E" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" data-tooltip="Orange" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips " data-switcher-color="#DBC1A8" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" data-tooltip="Golden" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips" data-switcher-color="#E8E0BE" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" data-tooltip="Royel Green" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <p class="rbt-card-title"><a href="product-single-default.html">Adidas Ultraboost
                                                                    Cream Color Shoe</a></p>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 298.00</del>
                                                                <span class="price-text">Rs. 189.98</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End single card -->

                                                <!-- Start single card -->
                                                <div class="swiper-slide">
                                                    <div class="rbt-card rbt-product-card">
                                                        <div class="rbt-card-img rbt-bg-color-default">
                                                            <a href="product-single-default.html">
                                                                <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" alt="Card Image">
                                                            </a>
                                                            <div class="rbt-badge-wrapper rbt-content-top-left">
                                                                <div class="rbt-product-badge rbt-product-badge-bg-secondary">
                                                                    SALE</div>
                                                            </div>
                                                            <div class="rbt-quick-btn-grp has-mixup-midlayer rbt-top-right--position hover-variation-one">
                                                                <button class="rbt-wishlisted-btn bg-light-one rbt-quick-btn tooltips" type="button" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                                                <button class="rbt-watch-btn bg-light-one rbt-quick-btn tooltips" data-tooltip="Quick View" data-tooltip-position="left" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></button>
                                                            </div>
                                                            <a class="rbt-btn hover-appear-element bottom-position text-center rbt-btn-sm rbt-square-btn d-block has-left-icon" href="#!" data-bs-toggle="modal" data-bs-target="#quickviewModal">Select Option</a>
                                                        </div>
                                                        <div class="rbt-card-body rbt-card-body-center-align">
                                                            <div class="rbt-color-select-area justify-content-center">
                                                                <ul class="rbt-switcher-color-list product-switcher-activation">
                                                                    <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#C64B3E" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" data-tooltip="Orange" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips " data-switcher-color="#DBC1A8" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" data-tooltip="Golden" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips" data-switcher-color="#E8E0BE" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" data-tooltip="Royel Green" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <p class="rbt-card-title"><a href="product-single-default.html">Adidas Ultraboost
                                                                    light Pink Shoe</a></p>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 292.00</del>
                                                                <span class="price-text">Rs. 177.90</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End single card -->

                                                <!-- Start single card -->
                                                <div class="swiper-slide">
                                                    <div class="rbt-card rbt-product-card">
                                                        <div class="rbt-card-img rbt-bg-color-default">
                                                            <a href="product-single-default.html">
                                                                <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" alt="Card Image">
                                                            </a>
                                                            <div class="rbt-badge-wrapper rbt-content-top-left">
                                                                <div class="rbt-product-badge rbt-product-badge-bg-secondary">
                                                                    SALE</div>
                                                            </div>
                                                            <div class="rbt-quick-btn-grp has-mixup-midlayer rbt-top-right--position hover-variation-one">
                                                                <button class="rbt-wishlisted-btn bg-light-one rbt-quick-btn tooltips" type="button" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                                                <button class="rbt-watch-btn bg-light-one rbt-quick-btn tooltips" data-tooltip="Quick View" data-tooltip-position="left" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></button>
                                                            </div>
                                                            <a class="rbt-btn hover-appear-element bottom-position text-center rbt-btn-sm rbt-square-btn d-block has-left-icon" href="#!" data-bs-toggle="modal" data-bs-target="#quickviewModal">Select Option</a>
                                                        </div>
                                                        <div class="rbt-card-body rbt-card-body-center-align">
                                                            <div class="rbt-color-select-area justify-content-center">
                                                                <ul class="rbt-switcher-color-list product-switcher-activation">
                                                                    <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#C64B3E" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" data-tooltip="Orange" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips " data-switcher-color="#DBC1A8" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" data-tooltip="Golden" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips" data-switcher-color="#E8E0BE" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" data-tooltip="Royel Green" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <p class="rbt-card-title"><a href="product-single-default.html">Adidas Ultraboost
                                                                    Light Green Shoe</a></p>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 298.00</del>
                                                                <span class="price-text">Rs. 189.98</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End single card -->

                                            </div>
                                            <!-- pagination -->
                                            <div class="rbt-swiper-pagination-center">
                                                <div class="rbt-swiper-pagination rbt-swiper-pagination-var-one rbt-swiper-pagination-cente">
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
                                    <li><a href="{{ route('login') }}">Sign In</a></li>
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
                </div>

                <div class="header-right rbt-gap--32">


                    <!-- Navbar Icons -->
                    <ul class="rbt-quick-access">
                        <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 tooltips tooltip-distance-lg" data-tooltip="Search" data-tooltip-position="bottom">
                            <a class="search-trigger-active rbt-round-btn has-rbt-md-fsize rbt-modern-close-btn" href="#">
                                <i class="fa-regular fa-search search-icon"></i>
                                <div class="modern-close-wrapper"></div>
                            </a>
                        </li>



                        <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 d-none d-lg-flex tooltips tooltip-distance-lg" data-tooltip="Sign In" data-tooltip-position="bottom">
                            <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal" data-bs-target="#signinModal">
                                <i class="fa-regular fa-user"></i>
                            </a>
                        </li>

                        <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-4 rbt-wishlist d-none d-lg-flex tooltips tooltip-distance-lg" data-tooltip="Wishlist" data-tooltip-position="bottom">
                            <a class="rbt-round-btn has-rbt-md-fsize" href="wishlist.html">
                                <i class="fa-regular fa-heart"></i>
                                <div class="access-box-count">7</div>
                            </a>
                        </li>



                        <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-5 rbt-mini-cart tooltips tooltip-distance-lg" data-tooltip="Cart" data-tooltip-position="bottom">
                            <a class="rbt-cart-sidenav-activation rbt-round-btn has-rbt-md-fsize" href="#">
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
                <form class="rbt-search-form">
                    <div class="input-sectition position-relative w-100 mr--12 mr_sm--4">
                        <input class="search-input" type="text" placeholder="What Are You Looking For?">
                        <i class="fa-sharp fa-regular inner-search-icon fa-magnifying-glass"></i>
                        <button class="media-search-btn media-search-popupactivation">
                            <i class="fa-sharp fa-regular fa-camera"></i>
                        </button>
                    </div>
                    <div class="submit-btn">
                        <a class="rbt-btn btn-md" href="#">Search</a>
                    </div>
                    <div class="rbt-media-search-section">
                        <div class="rbt-media-wrapper">
                            <div class="section-title"><span class="title b1">Find product inspiration with Image
                                    Search</span></div>
                            <div class="rbt-file-upload-container">
                                <input type="file" class="fileInput" multiple="" hidden="">
                                <div class="file-upload-area fileUploadArea">
                                    <div class="file-upload-content">
                                        <span class="rbt-icon"><i class="fa-solid fa-cloud-arrow-up"></i></span>
                                        <p class="rbt-title">Drag & Drop Files Here <span class="rbt-text-color-gray-400">Or</span></p>
                                        <button class="browseFilesButton rbt-btn rbt-btn-sm">Browse Files</button>
                                    </div>
                                    <div class="fileList file-list"></div>
                                </div>
                                <p class="fileCount">0 of 10</p>
                            </div>
                            <div class="rbt-copy-link-part rbt-text-copy-activation">
                                <input class="rbt-copy-value-field" type="text" value="https://unimart.template/wishlist" readonly="">
                                <button class="rbt-btn rbt-btn-xs has-left-icon rbt-copy-btn" data-tooltip="Copy">
                                    <i class="fa-regular fa-copy"></i>
                                    <span class="rbt-btn-text">Copy</span>
                                </button>
                            </div>
                            <button type="button" class="rbt-round-btn rbt-ms-dismiss-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="rbt-ms-dismiss-outsider"></a>
                </form>
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
                        <a href="#">Fashion</a>
                        <a href="#">Interior</a>
                        <a href="#">Nature</a>
                        <a href="#">Jewellery</a>
                        <a href="#">Art</a>
                        <a href="#">Aliexpress</a>
                        <a href="#">Technology</a>
                        <a href="#">Texture</a>
                        <a href="#">Architecture</a>
                        <a href="#">Business</a>
                        <a href="#">Jewellery</a>
                        <a href="#">Aliexpress</a>
                    </div>
                </div>

                <div class="rbt-separator-mid ptb_sm--12 ptb--24">
                    <hr class="rbt-separator m-0">
                </div>

                <!-- Start Card Area -->
                <div class="row row--0">
                    <div class="col-lg-12">
                        <div class="border-0 p-0 text-left title-sm-fsize">
                            <h2 class="title"><span class="rbt-bold--text">Trending Products</span></h2>
                        </div>
                    </div>
                </div>

                <div class="row row--12 m--0 mt_dec--24">

                    <!-- Start Single Card  -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                        <div class="rbt-card rbt-product-card">
                            <div class="inner rbt-scroll-trigger fade_in animation-order-1">
                                <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                    <a href="product-single-default.html">
                                        <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Card Image">
                                        <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1-hover.webp') }}" alt="Card Image">
                                    </a>
                                    <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded rbt-content-top-left">
                                        Hot
                                    </div>
                                    <div class="rbt-product-badge rbt-product-badge-bg-secondary-gradient border-rounded rbt-content-top-left">
                                        Best Seller</div>
                                    <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                        <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                        <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-color-select-area">
                                        <ul class="rbt-switcher-color-list product-switcher-activation">
                                            <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#2B2B2B" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips " data-switcher-color="#a09fa4" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" data-tooltip="Red" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips" data-switcher-color="#cc999d" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" data-tooltip="Pink" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                        </ul>
                                        <a class="prd-link-text" href="product-single-default.html">+12 More Items</a>
                                    </div>
                                    <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Headphones &
                                        Music</a>
                                    <h3 class="rbt-card-title h6"><a href="product-single-default.html">Samsung Quiet
                                            Comfort Noise
                                            Cancelling
                                            Earbuds - Black</a></h3>
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
                                    <div class="pricing-part">
                                        <del class="price-text">Rs. 295.00</del>
                                        <span class="price-text">Rs. 179.98</span>
                                        <span class="rbt-offer-badge">-30%</span>
                                        <div class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                            12
                                            in
                                            Stock</div>
                                    </div>
                                    <div class="rbt-prd-qty-area">
                                        <p class="prd-qty-txt">Only <strong>97</strong> pc left</p>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-50"></div>
                                        </div>
                                    </div>
                                    <div class="prd-btn-grp">
                                        <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation" href="#"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation rbt-compare-bottom-sidenav-activation" href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                        <div class="rbt-card rbt-product-card">
                            <div class="inner rbt-scroll-trigger fade_in animation-order-2">
                                <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                    <a href="product-single-default.html">
                                        <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1.webp') }}" alt="Card Image">
                                        <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1-hover.webp') }}" alt="Card Image">
                                    </a>
                                    <div class="rbt-product-badge rbt-product-badge-bg-secondary-gradient border-rounded rbt-content-top-left">
                                        Best Seller</div>
                                    <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                        <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                        <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-color-select-area">
                                        <ul class="rbt-switcher-color-list product-switcher-activation">
                                            <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#bdb6d6" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1.webp') }}" data-tooltip="Purple" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips " data-switcher-color="#486788" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-2.webp') }}" data-tooltip="Blue" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips" data-switcher-color="#1a1a1a" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-3.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                        </ul>
                                        <a class="prd-link-text" href="product-single-default.html">+12 More Items</a>
                                    </div>
                                    <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Headphones &
                                        Music</a>
                                    <h3 class="rbt-card-title h6"><a href="product-single-default.html">Keurig K-Duo
                                            Bose
                                            Noise Cancelling
                                            Headphones 700 </a></h3>
                                    <div class="rbt-card-rating">
                                        <ul class="rbt-rating-icon-list">
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                        </ul>
                                        <p class="rating-digit">(10)</p>
                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-bag-shopping"></i></span>
                                            90+ Sold Recently
                                        </div>
                                    </div>
                                    <div class="pricing-part">
                                        <del class="price-text">Rs. 295.00</del>
                                        <span class="price-text">Rs. 179.98</span>
                                    </div>
                                    <div class="rbt-prd-qty-area">
                                        <p class="prd-qty-txt">Only <strong>97</strong> pc left</p>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-50"></div>
                                        </div>
                                    </div>
                                    <div class="prd-btn-grp">
                                        <button class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</button>
                                        <button class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation" type="button" data-bs-toggle="modal" data-bs-target="#addedcomparisonModal"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                        <div class="rbt-card rbt-product-card">
                            <div class="inner rbt-scroll-trigger fade_in animation-order-4">
                                <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                    <a href="product-single-default.html">
                                        <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1.webp') }}" alt="Card Image">
                                        <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1-hover.webp') }}" alt="Card Image">
                                    </a>
                                    <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded rbt-content-top-left">
                                        New
                                    </div>
                                    <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                        <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                        <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-color-select-area">
                                        <ul class="rbt-switcher-color-list product-switcher-activation">
                                            <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#202020" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips " data-switcher-color="#9e9e9e" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-2.webp') }}" data-tooltip="Gray" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips" data-switcher-color="#171717" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-3.webp') }}" data-tooltip="Light Black" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                        </ul>
                                        <a class="prd-link-text" href="product-single-default.html">+12 More Items</a>
                                    </div>
                                    <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Electronics &
                                        Camera</a>
                                    <h3 class="rbt-card-title h6"><a href="product-single-default.html">GoPro HERO 11 4K
                                            Action Camera with
                                            SD
                                            Card</a></h3>
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
                                    <div class="pricing-part">
                                        <del class="price-text">Rs. 295.00</del>
                                        <span class="price-text">Rs. 179.98</span>
                                        <span class="rbt-offer-badge">-30%</span>
                                        <div class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                            12
                                            in
                                            Stock</div>
                                    </div>
                                    <div class="rbt-prd-qty-area">
                                        <p class="prd-qty-txt">Only <strong>97</strong> pc left</p>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-50"></div>
                                        </div>
                                    </div>
                                    <div class="prd-btn-grp">
                                        <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation" href="#"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation" href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                        <div class="rbt-card rbt-product-card">
                            <div class="inner rbt-scroll-trigger fade_in animation-order-4">
                                <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                    <a href="product-single-default.html">
                                        <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1.webp') }}" alt="Card Image">
                                        <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1-hover.webp') }}" alt="Card Image">
                                    </a>
                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded rbt-content-top-left">
                                        Trending
                                    </div>
                                    <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                        <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                        <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-color-select-area">
                                        <ul class="rbt-switcher-color-list product-switcher-activation">
                                            <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#afb1b3" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1.webp') }}" data-tooltip="Gray" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips " data-switcher-color="#7796b9" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-2.webp') }}" data-tooltip="Sky Blue" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                            <li><a class="rbt-switcher--color tooltips" data-switcher-color="#b84a5f" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-3.webp') }}" data-tooltip="Pink Red" data-tooltip-position="top" href="#">
                                                    <div class="rbt-color-circle"></div>
                                                </a></li>
                                        </ul>
                                        <a class="prd-link-text" href="product-single-default.html">+12 More Items</a>
                                    </div>
                                    <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Tablets &
                                        Accessories</a>
                                    <h3 class="rbt-card-title h6"><a href="product-single-default.html">Samsung Galaxy
                                            N-569 Tab S7 with
                                            Stylish – 8GB/128GB</a></h3>
                                    <div class="rbt-card-rating">
                                        <ul class="rbt-rating-icon-list">
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                        </ul>
                                        <p class="rating-digit">(25)</p>
                                        <div class="rbt-text-group"> <span class="icon mr--4"><i class="fa-solid fa-bag-shopping"></i></span>
                                            90+ Sold Recently
                                        </div>
                                    </div>
                                    <div class="pricing-part">
                                        <del class="price-text">Rs. 295.00</del>
                                        <span class="price-text">Rs. 179.98</span>
                                    </div>
                                    <div class="rbt-prd-qty-area">
                                        <p class="prd-qty-txt">Only <strong>97</strong> pc left</p>
                                        <div class="progress" role="progressbar" aria-label="Shipping-progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar w-50"></div>
                                        </div>
                                    </div>
                                    <div class="prd-btn-grp">
                                        <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation" href="#"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation" href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</a>
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
    <a href="javascript:void(0);" class="media-upload-close-area"></a>
</div>
<!-- End Search Dropdown  -->
<a href="javascript:void(0);" class="close_search_dropdown"></a>
    <div class="rbt-header-common-sticky-activation rbt-header-wrapper-common justify-content-between rbt-bg-color-white">
    <div class="rbt-header-campaign rbt-header-campaign-1 rbt-header-top-news rbt-topbar-bg-img rbt-topbar-bg-one w-100">
        <div class="rbt-corner-portion-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="inner justify-content-center">
                            <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="rbt-fancy-item fancy-menu-text fancy-menu-center">
                                            <p class="rbt-fancy-text rbt-text-color-white">Top products. Better prices
                                                -under Rs. 100.
                                                <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop Now</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rbt-fancy-item fancy-menu-text fancy-menu-center">
                                            <p class="rbt-fancy-text rbt-text-color-white">Top products. Better prices
                                                -under Rs. 100.
                                                <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop Now</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rbt-fancy-item fancy-menu-text fancy-menu-center">
                                            <p class="rbt-fancy-text rbt-text-color-white">Top products. Better prices
                                                -under Rs. 100.
                                                <a class="rbt-text-color-white" href="{{ route('shop') }}">Shop Now</a>
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
                    <div class="header-info p-0 d-none d-xxl-flex mr--24">
                        <a class="rbt-offcanvas-trigger-btn rbt-cat-offcanvas-activation rbt-burger-menu-bar" href="#!">
                            <div class="rbt-burger-menu-bar-wrapper">
                                <i class="rbt-line-btn">
                                    <span class="rbt-lines"></span>
                                </i>
                                <i class="rbt-line-btn rbt-hover-effect">
                                    <span class="rbt-lines"></span>
                                </i>
                            </div>
                        </a>
                    </div>
                    <div class="header-info d-xl-block d-none">
                        <div class="logo rbt-logo-height-sm">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}" alt="NBC Logo Images">
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
    <ul class="mainmenu mainmenu has-nav-bg-shape-hover">
        <li class="with-rbt-megamenu has-menu-child-item position-static rbt-initial-odo-count">
            <a href="#!">Demos <i class="fa-regular fa-chevron-down"></i></a>
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

        <li class="with-rbt-megamenu has-menu-child-item position-static">
            <a href="#!">Shop <i class="fa-regular fa-chevron-down"></i></a>
            <!-- Start Mega Menu  -->
<div class="rbt-megamenu rbt-megamenu-4">
    <div class="rbt-megamenu-wrapper p--0">
        <div class="row row--0">
            <div class="col-3 ">
                <div class="rbt-menu-tab-wrapper">
                    <nav id="rbt-megamenuTab-cs" class="nav nav-pills flex-column rbt-megamenu-tab rbt-megamenu-tab-cs-activation">
                        <a href="#rbt-megamenu_tab1-cs" data-bs-toggle="pill" class="active nav-link">
                            <span><i class="fa-regular fa-store"></i></span>
                            Shop Pages
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="#rbt-megamenu_tab3-cs" data-bs-toggle="pill" class="nav-link">
                            <span><i class="fa-regular fa-shirt"></i></span>
                            Single Product
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="#rbt-megamenu_tab2-cs" data-bs-toggle="pill" class="nav-link">
                            <span><i class="fa-regular fa-swatchbook"></i></span>
                            Products Variation
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="#rbt-megamenu_tab4-cs" data-bs-toggle="pill" class="nav-link">
                            <span><i class="fa-regular fa-screwdriver-wrench"></i></span>
                            Advance Features
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                        <a href="admin/index.htm" target="_blank" class="nav-link">
                            <span><i class="fa-regular fa-chart-pie"></i></span>
                            Admin Dashboard
                        </a>
                        <a href="#" class="nav-link disabled">
                            <span><i class="fa-regular fa-shopping-bag"></i></span>
                            Multivendor Shop
                            <span class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                Coming
                            </span>
                            <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                        </a>
                    </nav>
                    <div class="rbt-tab-banner-img">
                        <img src="{{ asset('assets/images/splash/menu-banner/menu-tab-banner-01.webp') }}" alt="Ecommerce Mennu Bnner">
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="rbt-menu-tab-content-wrapper">
                    <div class="tab-content rbt-megamenu-tab-content" id="megamenu-tab1-content">
                        <div class="tab-pane show active" id="rbt-megamenu_tab1-cs">
                            <div class="row row--24">
                                <div class="col-xl-8">
                                    <div class="row row--8">
                                        <div class="col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-1">
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
                                                <li><a href="shop-filter-list-left-sidebar.html">Shop List Left
                                                        Sidebar</a></li>
                                                <li><a href="shop-filter-list-right-sidebar.html">Shop List Right
                                                        Sidebar</a></li>
                                                <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                <li><a href="shop-sticky-sidebar.html">Sticky Sidebar Shop
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            NEW
                                                        </div>
                                                    </a></li>
                                                <li><a href="shop-collapsible-sidebar.html">Collapse Sidebar Shop</a>
                                                </li>
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
                                        <div class="col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-2">
                                            <p class="rbt-short-title h5">Custom Pages</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="shop-filter-grid-two.html">Two Columns</a></li>
                                                <li><a href="shop-filter-grid-three.html">Three Columns</a></li>
                                                <li><a href="shop-filter-grid-four.html">Four Columns
                                                        <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded ml--8">
                                                            HOT
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
                                                <li><a href="shop-collapse-filter-top.html">Hidden Side Bar Shop</a>
                                                </li>
                                                <li><a href="products-show-countdown-shop-style-two.html">Products Show
                                                        Countdown Two</a>
                                                </li>
                                                <li><a href="products-even-list-shop.html">Even List Products</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 single-mega-item rbt-scroll-trigger fade_in animation-order-3">
                                            <p class="rbt-short-title h5">Custom Pages</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="shop-no-page-heading.html">Shop No Page Heading</a></li>
                                                <li><a href="shop-only-category.html">Shop Only Category</a></li>
                                                <li><a href="shop-offcanvas-sidebar-left.html">Shop offcanvas Left</a>
                                                </li>
                                                <li><a href="shop-offcanvas-sidebar-right.html">Shop offcanvas Right</a>
                                                </li>
                                                <li><a href="shop-offcanvas-sidebar-top.html">Shop offcanvas top</a>
                                                </li>
                                                <li><a href="shop-offcanvas-sidebar-bottom.html">Shop offcanvas
                                                        Bottom</a></li>
                                                <li><a href="shop-collapse-filter-bottom.html">Shop Filter Collapse
                                                        Bottom</a></li>
                                                <li><a href="shop-collapse-filter-left.html">Shop Filter Collapse
                                                        Left</a></li>
                                                <li><a href="shop-collapse-filter-right.html">Shop Filter Collapse
                                                        Right</a></li>
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
                                <div class="col-xl-4 rbt-scroll-trigger fade_in animation-order-4">
                                    <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-three h-100 min-h-500">
                                        <div class="mega-top-banner h-100 align-items-start justify-content-center">
                                            <div class="rbt-banner-inner rbt-banner-inner-black flex-column rbt-gap--16 align-items-center text-center">
                                                <div class="rbt-banner-content">
                                                    <p class="b4 subtitle mb--0">Embrace comfy wear</p>
                                                    <p class="h5 mb--4">Ready to fall in love
                                                        with Autumn collection!</p>
                                                </div>
                                                <a class="rbt-btn rbt-bg-color-secondary rbt-btn-sm" href="{{ route('shop') }}">Shop
                                                    Collection</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rbt-megamenu_tab3-cs">
                            <div class="d-flex flex-column justify-content-between">
                                <div class="row row--24">
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Page Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-default.html">Product Single Default</a></li>
                                            <li><a href="product-single-fashion.html">Product Single Fashion<div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded ml--8">
                                                        TOP
                                                    </div></a></li>
                                            <li><a href="product-single-furniture.html">Product Single Furniture</a>
                                            </li>
                                            <li><a href="product-single-cosmetic-beauty.html">Product Single Beauty
                                                    Product</a></li>
                                            <li><a href="product-single-phone-case.html">Product Single Phone Case</a>
                                            </li>
                                            <li><a href="product-single-accessories.html">Product Single Accessories</a>
                                            </li>
                                            <li><a href="product-single-tech-accessories.html">Product Single Tech
                                                    Accessories</a></li>
                                            <li><a href="product-single-animal-accessories.html">Product Single Animal
                                                    Accessories</a></li>
                                            <li><a href="product-single-ladies-bag.html">Product Ladies Bag</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Page Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-laggage-bag.html">Product Single Laggage Bag</a>
                                            </li>
                                            <li><a href="product-single-printing-service.html">Product Single Print
                                                    Product</a></li>
                                            <li><a href="product-single-sports-shoe.html">Product Keds
                                                    <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded ml--8">
                                                        POPULAR
                                                    </div>
                                                </a></li>
                                            <li><a href="product-single-accessories-two.html">Product Single Accessories
                                                    Two</a></li>
                                            <li><a href="product-single-gallary-two-v360.html">Product Single 360 Angle
                                                    View
                                                </a></li>
                                            <li><a href="product-single-gallary.html">Product Grid Gallary
                                                </a></li>
                                            <li><a href="product-single-gallary-two.html">Product Grid Gallary
                                                    Two</a></li>
                                            <li><a href="#!">Product Classic
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                            <li><a href="#!">Product Accessories Three
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Custom Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-sticky-info.html">Product Single Sticky Info</a>
                                            </li>
                                            <li><a href="product-single-sticky-info-both.html">Product Single Sticky
                                                    Info Both</a></li>
                                            <li><a href="product-single-sticky-thumb.html">Product Single Thumb
                                                    sticky</a></li>
                                            <li><a href="product-single-gallary-side-view.html">Product Single Side
                                                    View</a></li>
                                            <li><a href="product-single-stock-out.html">Product Single Out of Stock</a>
                                            </li>
                                            <li><a href="product-single-with-buy-more-option.html">Product Single with
                                                    Buy More Option</a></li>
                                            <li><a href="product-single-with-buy-more-option2.html">Product Single with
                                                    Buy More Option Style 2</a></li>
                                            <li><a href="#!">Product Cross-Sell
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                            <li><a href="#!">Product Feature
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-3 single-mega-item">
                                        <p class="rbt-short-title h5">Custom Design</p>
                                        <ul class="mega-menu-item">
                                            <li><a href="product-single-grid.html">Product Grid
                                                    <div class="rbt-product-badge rbt-product-badge-bg-red border-rounded ml--8">
                                                        Trending
                                                    </div>
                                                </a></li>
                                            <li><a href="product-single-grid-sidebar.html">Product Grid With Sidebar</a>
                                            </li>
                                            <li><a href="product-single-masonary.html">Product Single Masonary</a>
                                            </li>
                                            <li><a href="product-single-gallary-side-view-two.html">Product Single Side
                                                    View Two</a>
                                            </li>
                                            <li><a href="product-single-gallary-side-view-three.html">Product Single
                                                    Side View Three</a></li>
                                            <li><a href="product-single-gallary-side-view-four.html">Product Single Side
                                                    View Four</a></li>
                                            <li><a href="product-single-gallary-two-zoom-v1.html">Product Single
                                                    Zoom01</a></li>
                                            <li><a href="product-single-gallary-two-zoom-v2.html">Product Single
                                                    Zoom02</a></li>
                                            <li><a href="product-single-gallary-two-zoom-v3.html">Product Single
                                                    Zoom03</a></li>
                                            <li><a href="#!">Product AR Preview
                                                    <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded">
                                                        Coming
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row row--24">
                                    <hr class="rbt-separator rbt-separator-gray200 mb--16 mt--16 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                                    <div class="col-lg-12">
                                        <div class="swiper rbt-sm-review-card-swiper-activation-1 rbt-arrow-between has-right-bg-shape has-right-bg-shape-sm-width rbt-arrow-show-dfl">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="rbt-sm-review-card">
                                                        <div class="rbt-sm-review-card">
                                                            <div class="rbt-avatar-img-wrapper">
                                                                <div class="rbt-avatar-img"><img src="{{ asset('assets/images/reviewer-img/avater-sm-01.webp') }}" alt="Eccommerce Client Image"></div>
                                                                <span class="rbt-avarter-authintication-icon"><i class="fa-solid fa-shield-check"></i></span>
                                                            </div>
                                                            <div class="rbt-avater-content-wrapper">
                                                                <span class="title">Went above & beyond</span>
                                                                <div class="desc-wrapper">
                                                                    <p class="desc">Ralph Edwards</p>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="rbt-sm-review-card">
                                                        <div class="rbt-sm-review-card">
                                                            <div class="rbt-avatar-img-wrapper">
                                                                <div class="rbt-avatar-img"><img src="{{ asset('assets/images/reviewer-img/avater-sm-02.webp') }}" alt="Eccommerce Client Image"></div>
                                                                <span class="rbt-avarter-authintication-icon"><i class="fa-solid fa-shield-check"></i></span>
                                                            </div>
                                                            <div class="rbt-avater-content-wrapper">
                                                                <span class="title">Went above & beyond</span>
                                                                <div class="desc-wrapper">
                                                                    <p class="desc">Ralph Edwards</p>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="rbt-sm-review-card">
                                                        <div class="rbt-sm-review-card">
                                                            <div class="rbt-avatar-img-wrapper">
                                                                <div class="rbt-avatar-img"><img src="{{ asset('assets/images/reviewer-img/avater-sm-03.webp') }}" alt="Eccommerce Client Image"></div>
                                                                <span class="rbt-avarter-authintication-icon"><i class="fa-solid fa-shield-check"></i></span>
                                                            </div>
                                                            <div class="rbt-avater-content-wrapper">
                                                                <span class="title">Went above & beyond</span>
                                                                <div class="desc-wrapper">
                                                                    <p class="desc">Ralph Edwards</p>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbt-swiper-arrow rbt-arrow-right rbt-arrow-gray">
                                                <div class="custom-overflow">
                                                    <i class="rbt-icon fa-regular fa-arrow-right"></i>
                                                    <i class="rbt-icon-top fa-regular fa-arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rbt-megamenu_tab2-cs">
                            <div class="row row--24">
                                <div class="col-xl-8">
                                    <div class="row row--8">
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Hover Styles</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="products-all-info-shop.html">All Info Products</a></li>
                                                <li><a href="products-scale-hover-shop.html">Transform Style One</a>
                                                </li>
                                                <li>
                                                    <a href="products-hover-add-tocart-shop.html">
                                                        Hover Add to Cart
                                                        <div class="rbt-product-badge rbt-product-badge-bg-red border-rounded">
                                                            Top
                                                        </div>
                                                    </a>
                                                </li>
                                                <li><a href="products-standard-shop.html">Standard Products Shop</a>
                                                </li>
                                                <li><a href="products-icons-hover-shop.html">Transform Style Two</a>
                                                </li>
                                                <li><a href="products-button-onimage-shop.html">Transform Style
                                                        Three</a></li>
                                                <li><a href="products-additional-info-shop.html">Hover Additional
                                                        Info</a></li>
                                                <li><a href="products-button-visible-hover-shop.html">Transform Style
                                                        Four</a></li>
                                                <li><a href="products-shadow-hover-shop.html">Shadow Products Shop
                                                        <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
                                                            POPULAR
                                                        </div>
                                                    </a></li>
                                                <li><a href="products-small-variation-shop.html">Products Small Size</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Product Styles</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="products-shadow-hover-shop.html">Shadow Products Shop
                                                        <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded">
                                                            POPULAR
                                                        </div>
                                                    </a></li>
                                                <li><a href="products-even-grid.html">Even Grid Products</a></li>
                                                <li><a href="products-border-column-shop.html">Bordered Products
                                                        Shop</a></li>
                                                <li><a href="products-inside-border-column-shop.html">Bordered inside
                                                        Products Shop</a></li>
                                                <li><a href="products-even-list-shop.html">Even List Products</a></li>
                                                <li><a href="products-show-rating-shop.html">
                                                        Products Show Rating
                                                        <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded">
                                                            HOT
                                                        </div>
                                                    </a></li>
                                                <li><a href="products-show-progressbar-shop.html">Products Show
                                                        Progress-bar</a></li>
                                                <li><a href="products-show-countdown-shop.html">Products Show
                                                        Countdown</a></li>
                                                <li><a href="products-show-countdown-shop-style-two.html">Products Show
                                                        Countdown Two</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Catagories Design</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="categories-style-circle.html">Catagories Style Circle</a>
                                                </li>
                                                <li><a href="categories-style-round-box.html">Catagories Style Round
                                                        Box</a></li>
                                                <li><a href="categories-style-button-circle.html">Catagories Style
                                                        Button Circle</a></li>
                                                <li><a href="categories-style-simple-box.html">Catagories Style Simple
                                                        Box</a></li>
                                                <li><a href="categories-style-bento-box.html">Catagories Style Bento
                                                        Box</a></li>
                                                <li><a href="categories-style-linked-box.html">Catagories Style Linked
                                                        Box</a></li>
                                                <li><a href="categories-style-linked-box-swiper.html">Catagories
                                                        Linked Swiper</a>
                                                </li>
                                                <li><a href="categories-style-button-boxed.html">Catagories Button
                                                        Boxed</a></li>
                                                <li><a href="categories-style-classic-bento.html">Catagories
                                                        Classic Bento </a>
                                                </li>
                                                <li><a href="categories-style-mini-bento.html">Catagories Mini
                                                        Bento </a></li>
                                            </ul>
                                        </div>
                                        <hr class="rbt-separator rbt-separator-gray200 mb--16 mt--24 mt_sm--12 mb_sm--12 rbt-bg-color-gray-100">
                                        <div class="col-lg-12">
                                            <ul class="rbt-nav-brand-list liststyle d-flex justify-content-between">
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
                                <div class="col-xl-4">
                                    <div class="rbt-menu-offer-card rbt-bg-style-box rbt-bg-four h-100">
                                        <div class="mega-top-banner h-100 align-items-end justify-content-start">
                                            <div class="rbt-banner-inner rbt-banner-inner-black flex-column rbt-gap--16 align-items-start text-left">
                                                <div class="rbt-banner-content">
                                                    <p class="b4 subtitle rbt-text-color-white mb--0">Embrace comfy wear
                                                    </p>
                                                    <h2 class="h5 mt--4 mb--0 rbt-text-color-white">Ready to fall in
                                                        love
                                                        with Autumn collection!</h2>
                                                </div>
                                                <a class="rbt-btn rbt-bg-color-secondary rbt-btn-sm" href="#">Shop
                                                    Collection</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rbt-megamenu_tab4-cs">
                            <div class="row row--24">
                                <div class="col-xl-8">
                                    <div class="row row--8">
                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Configuring Settings</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="feature-sticky-nav.html">Sticky navigation</a></li>
                                                <li><a href="feature-frequently-baught-together.html">Frequently bought
                                                        together</a>
                                                </li>
                                                <li><a href="feature-catalog-mode.html">Catalog mode Shop</a></li>
                                                <li><a href="feature-mobile-bottom-nav.html">Mobile Bottom Navbar</a>
                                                </li>
                                                <li><a href="feature-sign-in-btn.html">Sign In to Prices</a></li>
                                                <li><a href="shop-collapsible-sidebar.html">Shop Sidebar widgets
                                                        Collapse</a></li>
                                                <li><a href="feature-image-slider.html">Image Slider</a></li>
                                                <li><a href="feature-sticky-nav.html">Sticky navigation</a></li>
                                                <li><a href="#!">Product Modern
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Product Customization
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Advanced Search Filters
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Product Features</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="feature-all-image-shop.html">All Images on Shop</a></li>
                                                <li><a href="feature-size-guide.html">Size Guides PopUp</a></li>
                                                <li><a href="feature-product-single-gallary-v360.html">Product 360
                                                        view</a></li>
                                                <li><a href="feature-product-vedio.html">Product Video
                                                        <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded">
                                                            HOT
                                                        </div>
                                                    </a></li>
                                                <li><a href="feature-special-offer-banner.html">Product Special
                                                        Video</a></li>
                                                <li><a href="feature-product-stock-progressbar.html">Product Stock
                                                        ProgressBar</a></li>
                                                <li><a href="feature-product-custom-design-uploder.html">Product Custom
                                                        Design
                                                        Uploader</a></li>
                                                <li><a href="feature-product-single-full-width.html">FullWidth Product
                                                        Single</a></li>
                                                <li><a href="feature-mobile-bottom-nav.html">Mobile Bottom Navbar</a>
                                                </li>
                                                <li><a href="#!">Quick View Feature
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Product Compare
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Product Wishlist Sync
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xl-4 single-mega-item">
                                            <p class="rbt-short-title h5">Extra Features</p>
                                            <ul class="mega-menu-item">
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout-delivery-step-one.html">Checkout Page</a></li>
                                                <li><a href="checkout-delivery-step-two.html">Checkout Delivery Info</a>
                                                </li>
                                                <li><a href="checkout-payment.html">Checkout Payment</a></li>
                                                <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                                <li><a href="checkout-thankyou.html">Thank You</a></li>
                                                <li><a href="my-order-history.html">Order History</a></li>
                                                <li><a href="my-reviews.html">My Reviews</a></li>
                                                <li><a href="#!">Order Tracking
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Loyalty Points Program
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Gift Card Feature
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                                <li><a href="#!">Subscription Service
                                                        <div class="rbt-product-badge rbt-product-badge-bg-primary border-rounded">
                                                            Coming
                                                        </div>
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="rbt-swiper-container">
                                        <div class="swiper rbt-megamenu-prd-card-activation-1 pb--24">
                                            <div class="swiper-wrapper">
                                                <!-- Start single card -->
                                                <div class="swiper-slide">
                                                    <div class="rbt-card rbt-product-card">
                                                        <div class="rbt-card-img rbt-bg-color-default">
                                                            <a href="product-single-default.html">
                                                                <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" alt="Card Image">
                                                            </a>
                                                            <div class="rbt-badge-wrapper rbt-content-top-left">
                                                                <div class="rbt-product-badge rbt-product-badge-bg-secondary">
                                                                    SALE</div>
                                                            </div>
                                                            <div class="rbt-quick-btn-grp has-mixup-midlayer rbt-top-right--position hover-variation-one">
                                                                <button class="rbt-wishlisted-btn bg-light-one rbt-quick-btn tooltips" type="button" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                                                <button class="rbt-watch-btn bg-light-one rbt-quick-btn tooltips" data-tooltip="Quick View" data-tooltip-position="left" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></button>
                                                            </div>
                                                            <a class="rbt-btn hover-appear-element bottom-position text-center rbt-btn-sm rbt-square-btn d-block has-left-icon" href="#!" data-bs-toggle="modal" data-bs-target="#quickviewModal">Select
                                                                Option</a>
                                                        </div>
                                                        <div class="rbt-card-body rbt-card-body-center-align">
                                                            <div class="rbt-color-select-area justify-content-center">
                                                                <ul class="rbt-switcher-color-list product-switcher-activation">
                                                                    <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#C64B3E" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" data-tooltip="Orange" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips " data-switcher-color="#DBC1A8" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" data-tooltip="Golden" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips" data-switcher-color="#E8E0BE" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" data-tooltip="Royel Green" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <p class="rbt-card-title"><a href="product-single-default.html">Adidas
                                                                    Ultraboost
                                                                    Cream Color Shoe</a></p>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 298.00</del>
                                                                <span class="price-text">Rs. 189.98</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End single card -->

                                                <!-- Start single card -->
                                                <div class="swiper-slide">
                                                    <div class="rbt-card rbt-product-card">
                                                        <div class="rbt-card-img rbt-bg-color-default">
                                                            <a href="product-single-default.html">
                                                                <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" alt="Card Image">
                                                            </a>
                                                            <div class="rbt-badge-wrapper rbt-content-top-left">
                                                                <div class="rbt-product-badge rbt-product-badge-bg-secondary">
                                                                    SALE</div>
                                                            </div>
                                                            <div class="rbt-quick-btn-grp has-mixup-midlayer rbt-top-right--position hover-variation-one">
                                                                <button class="rbt-wishlisted-btn bg-light-one rbt-quick-btn tooltips" type="button" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                                                <button class="rbt-watch-btn bg-light-one rbt-quick-btn tooltips" data-tooltip="Quick View" data-tooltip-position="left" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></button>
                                                            </div>
                                                            <a class="rbt-btn hover-appear-element bottom-position text-center rbt-btn-sm rbt-square-btn d-block has-left-icon" href="#!" data-bs-toggle="modal" data-bs-target="#quickviewModal">Select
                                                                Option</a>
                                                        </div>
                                                        <div class="rbt-card-body rbt-card-body-center-align">
                                                            <div class="rbt-color-select-area justify-content-center">
                                                                <ul class="rbt-switcher-color-list product-switcher-activation">
                                                                    <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#C64B3E" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" data-tooltip="Orange" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips " data-switcher-color="#DBC1A8" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" data-tooltip="Golden" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips" data-switcher-color="#E8E0BE" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" data-tooltip="Royel Green" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <p class="rbt-card-title"><a href="product-single-default.html">Adidas
                                                                    Ultraboost
                                                                    light Pink Shoe</a></p>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 292.00</del>
                                                                <span class="price-text">Rs. 177.90</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End single card -->

                                                <!-- Start single card -->
                                                <div class="swiper-slide">
                                                    <div class="rbt-card rbt-product-card">
                                                        <div class="rbt-card-img rbt-bg-color-default">
                                                            <a href="product-single-default.html">
                                                                <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" alt="Card Image">
                                                            </a>
                                                            <div class="rbt-badge-wrapper rbt-content-top-left">
                                                                <div class="rbt-product-badge rbt-product-badge-bg-secondary">
                                                                    SALE</div>
                                                            </div>
                                                            <div class="rbt-quick-btn-grp has-mixup-midlayer rbt-top-right--position hover-variation-one">
                                                                <button class="rbt-wishlisted-btn bg-light-one rbt-quick-btn tooltips" type="button" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                                                <button class="rbt-watch-btn bg-light-one rbt-quick-btn tooltips" data-tooltip="Quick View" data-tooltip-position="left" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></button>
                                                            </div>
                                                            <a class="rbt-btn hover-appear-element bottom-position text-center rbt-btn-sm rbt-square-btn d-block has-left-icon" href="#!" data-bs-toggle="modal" data-bs-target="#quickviewModal">Select
                                                                Option</a>
                                                        </div>
                                                        <div class="rbt-card-body rbt-card-body-center-align">
                                                            <div class="rbt-color-select-area justify-content-center">
                                                                <ul class="rbt-switcher-color-list product-switcher-activation">
                                                                    <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#C64B3E" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-1.webp') }}" data-tooltip="Orange" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips " data-switcher-color="#DBC1A8" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-2.webp') }}" data-tooltip="Golden" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                    <li><a class="rbt-switcher--color tooltips" data-switcher-color="#E8E0BE" data-src="{{ asset('assets/images/product-img/fashion/product-new-shoe-01-a-3.webp') }}" data-tooltip="Royel Green" data-tooltip-position="top" href="#">
                                                                            <div class="rbt-color-circle"></div>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <p class="rbt-card-title"><a href="product-single-default.html">Adidas
                                                                    Ultraboost
                                                                    Light Green Shoe</a></p>
                                                            <div class="pricing-part">
                                                                <del class="price-text">Rs. 298.00</del>
                                                                <span class="price-text">Rs. 189.98</span>
                                                                <span class="rbt-offer-badge">-30%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End single card -->

                                            </div>
                                            <!-- pagination -->
                                            <div class="rbt-swiper-pagination-center">
                                                <div class="rbt-swiper-pagination rbt-swiper-pagination-var-one rbt-swiper-pagination-cente">
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
                                    <li><a href="{{ route('login') }}">Sign In</a></li>
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
            </div>

            <div class="header-right">
                <!-- Navbar Icons -->
                <ul class="rbt-quick-access rbt-gap--12">

                    <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 tooltips tooltip-distance-lg" data-tooltip="Search" data-tooltip-position="bottom">
                        <a class="rbt-round-btn has-rbt-md-fsize rbt-common-search-trigger-active rbt-modern-close-btn" href="#">
                            <i class="fa-regular fa-search search-icon"></i>
                            <div class="modern-close-wrapper"></div>
                        </a>
                    </li>

                    <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-3 d-none d-lg-flex tooltips tooltip-distance-lg" data-tooltip="Sign In" data-tooltip-position="bottom">
                        <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal" data-bs-target="#signinModal">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    </li>

                    <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-5 rbt-wishlist d-none d-lg-flex tooltips tooltip-distance-lg" data-tooltip="Wishlist" data-tooltip-position="bottom">
                        <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal" data-bs-target="#wishlistModal">
                            <i class="fa-regular fa-heart"></i>
                            <div class="access-box-count">7</div>
                        </a>
                    </li>


                    <li class="rbt-access-box rbt-scroll-trigger fade_in animation-order-5 rbt-access-box-has-bg-hover rbt-mini-cart tooltips tooltip-distance-lg" data-tooltip="Cart" data-tooltip-position="bottom">
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
                        <h2 class="rbt-title text-start text-md-center"><span class="rbt-bold--text">Search For
                                Products</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="rbt-search-form">
                        <div class="input-sectition position-relative w-100 mr--12 mr_sm--4">
                            <input class="search-input" type="text" placeholder="What Are You Looking For?">
                            <i class="fa-sharp fa-regular inner-search-icon fa-magnifying-glass"></i>
                            <button class="media-search-btn media-search-popupactivation">
                                <i class="fa-sharp fa-regular fa-camera"></i>
                            </button>
                        </div>
                        <div class="submit-btn">
                            <a class="rbt-btn btn-md" href="#">Search</a>
                        </div>
                        <div class="rbt-media-search-section">
                            <div class="rbt-media-wrapper">
                                <div class="section-title"><span class="title b1">Find product inspiration with Image
                                        Search</span></div>
                                <div class="rbt-file-upload-container">
                                    <input type="file" class="fileInput" multiple="" hidden="">
                                    <div class="file-upload-area fileUploadArea">
                                        <div class="file-upload-content">
                                            <span class="rbt-icon"><i class="fa-solid fa-cloud-arrow-up"></i></span>
                                            <p class="rbt-title">Drag & Drop Files Here <span class="rbt-text-color-gray-400">Or</span></p>
                                            <button class="browseFilesButton rbt-btn rbt-btn-sm">Browse Files</button>
                                        </div>
                                        <div class="fileList file-list"></div>
                                    </div>
                                    <p class="fileCount">0 of 10</p>
                                </div>
                                <div class="rbt-copy-link-part rbt-text-copy-activation">
                                    <input class="rbt-copy-value-field" type="text" value="https://unimart.template/wishlist" readonly="">
                                    <button class="rbt-btn rbt-btn-xs has-left-icon rbt-copy-btn" data-tooltip="Copy">
                                        <i class="fa-regular fa-copy"></i>
                                        <span class="rbt-btn-text">Copy</span>
                                    </button>
                                </div>
                                <button type="button" class="rbt-round-btn rbt-ms-dismiss-btn">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="rbt-ms-dismiss-outsider"></a>
                    </form>
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
                            <a href="#">Fashion</a>
                            <a href="#">Interior</a>
                            <a href="#">Nature</a>
                            <a href="#">Jewellery</a>
                            <a href="#">Art</a>
                            <a href="#">Aliexpress</a>
                            <a href="#">Technology</a>
                            <a href="#">Texture</a>
                            <a href="#">Architecture</a>
                            <a href="#">Business</a>
                            <a href="#">Jewellery</a>
                            <a href="#">Aliexpress</a>
                        </div>
                    </div>

                    <div class="rbt-separator-mid ptb--24">
                        <hr class="rbt-separator m-0">
                    </div>

                    <!-- Start Card Area -->
                    <div class="row row--0">
                        <div class="col-lg-12">
                            <div class="border-0 p-0 text-left title-sm-fsize">
                                <h2 class="title"><span class="rbt-bold--text">Trending Products</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="row row--12 m--0 mt_dec--24">

                        <!-- Start Single Card  -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                            <div class="rbt-card rbt-product-card">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-1">
                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                        <a href="product-single-default.html">
                                            <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" alt="Card Image">
                                            <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1-hover.webp') }}" alt="Card Image">
                                        </a>
                                        <div class="rbt-product-badge rbt-product-badge-bg-danger border-rounded rbt-content-top-left">
                                            Hot</div>
                                        <div class="rbt-product-badge rbt-product-badge-bg-secondary-gradient border-rounded rbt-content-top-left">
                                            Best Seller</div>
                                        <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                            <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-color-select-area">
                                            <ul class="rbt-switcher-color-list product-switcher-activation">
                                                <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#2B2B2B" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-1.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips " data-switcher-color="#a09fa4" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-2.webp') }}" data-tooltip="Red" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips" data-switcher-color="#cc999d" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-01-a-3.webp') }}" data-tooltip="Pink" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                            </ul>
                                            <a class="prd-link-text" href="product-single-default.html">+12 More
                                                Items</a>
                                        </div>
                                        <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Headphones &
                                            Music</a>
                                        <h2 class="rbt-card-title h6"><a href="product-single-default.html">Samsung
                                                Quiet
                                                Comfort Noise Cancelling
                                                Earbuds - Black</a></h2>
                                        <div class="rbt-card-rating">
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
                                        <div class="pricing-part">
                                            <del class="price-text">Rs. 295.00</del>
                                            <span class="price-text">Rs. 179.98</span>
                                            <span class="rbt-offer-badge">-30%</span>
                                        </div>
                                        <div class="prd-btn-grp">
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation" href="#"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation rbt-compare-bottom-sidenav-activation" href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                            <div class="rbt-card rbt-product-card">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-2">
                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                        <a href="product-single-default.html">
                                            <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1.webp') }}" alt="Card Image">
                                            <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1-hover.webp') }}" alt="Card Image">
                                        </a>
                                        <div class="rbt-product-badge rbt-product-badge-bg-secondary-gradient border-rounded rbt-content-top-left">
                                            Best Seller</div>
                                        <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                            <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-color-select-area">
                                            <ul class="rbt-switcher-color-list product-switcher-activation">
                                                <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#bdb6d6" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-1.webp') }}" data-tooltip="Purple" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips " data-switcher-color="#486788" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-2.webp') }}" data-tooltip="Blue" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips" data-switcher-color="#1a1a1a" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-04-a-3.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                            </ul>
                                            <a class="prd-link-text" href="product-single-default.html">+12 More
                                                Items</a>
                                        </div>
                                        <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Headphones &
                                            Music</a>
                                        <h2 class="rbt-card-title h6"><a href="product-single-default.html">Keurig K-Duo
                                                Bose Noise Cancelling
                                                Headphones 700 </a></h2>
                                        <div class="rbt-card-rating">
                                            <ul class="rbt-rating-icon-list">
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                            </ul>
                                            <p class="rating-digit">(10)</p>
                                        </div>
                                        <div class="pricing-part">
                                            <del class="price-text">Rs. 295.00</del>
                                            <span class="price-text">Rs. 179.98</span>
                                        </div>
                                        <div class="prd-btn-grp">
                                            <button class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</button>
                                            <button class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation" type="button" data-bs-toggle="modal" data-bs-target="#addedcomparisonModal"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                            <div class="rbt-card rbt-product-card">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-4">
                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                        <a href="product-single-default.html">
                                            <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1.webp') }}" alt="Card Image">
                                            <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1-hover.webp') }}" alt="Card Image">
                                        </a>
                                        <div class="rbt-product-badge rbt-product-badge-bg-green border-rounded rbt-content-top-left">
                                            New</div>
                                        <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                            <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-color-select-area">
                                            <ul class="rbt-switcher-color-list product-switcher-activation">
                                                <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#202020" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-1.webp') }}" data-tooltip="Black" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips " data-switcher-color="#9e9e9e" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-2.webp') }}" data-tooltip="Gray" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips" data-switcher-color="#171717" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-08-a-3.webp') }}" data-tooltip="Light Black" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                            </ul>
                                            <a class="prd-link-text" href="product-single-default.html">+12 More
                                                Items</a>
                                        </div>
                                        <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Electronics &
                                            Camera</a>
                                        <h2 class="rbt-card-title h6"><a href="product-single-default.html">GoPro HERO
                                                11
                                                4K Action Camera with SD
                                                Card</a></h2>
                                        <div class="rbt-card-rating">
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
                                        <div class="pricing-part">
                                            <del class="price-text">Rs. 295.00</del>
                                            <span class="price-text">Rs. 179.98</span>
                                            <div class="rbt-badge rbt-badge-bg-green rbt-badge-border rbt-badge-small rbt-badge-rounded">
                                                12 in
                                                Stock</div>
                                        </div>
                                        <div class="prd-btn-grp">
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation" href="#"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation" href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mt--24 mt_sm--16">
                            <div class="rbt-card rbt-product-card">
                                <div class="inner rbt-scroll-trigger fade_in animation-order-4">
                                    <div class="rbt-card-img rbt-has-hover-img rbt-bg-color-default">
                                        <a href="product-single-default.html">
                                            <img class="rbt-prd-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1.webp') }}" alt="Card Image">
                                            <img class="rbt-hover-img" src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1-hover.webp') }}" alt="Card Image">
                                        </a>
                                        <div class="rbt-product-badge rbt-product-badge-bg-yellow border-rounded rbt-content-top-left">
                                            Trending
                                        </div>
                                        <div class="rbt-quick-btn-grp has-mixup-midlayer bottom-right--position">
                                            <button class="rbt-search-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#quickviewModal" data-tooltip="Quick View" data-tooltip-position="left"><i class="fa-regular fa-magnifying-glass-plus"></i></button>
                                            <button class="rbt-wishlisted-btn rbt-quick-btn tooltips" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" data-tooltip="Add to wishlist" data-tooltip-position="left"><i class="fa-regular fa-heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-color-select-area">
                                            <ul class="rbt-switcher-color-list product-switcher-activation">
                                                <li class="active"><a class="rbt-switcher--color tooltips" data-switcher-color="#afb1b3" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-1.webp') }}" data-tooltip="Gray" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips " data-switcher-color="#7796b9" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-2.webp') }}" data-tooltip="Sky Blue" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                                <li><a class="rbt-switcher--color tooltips" data-switcher-color="#b84a5f" data-src="{{ asset('assets/images/product-img/electronics/electronics-bg-trans-07-a-3.webp') }}" data-tooltip="Pink Red" data-tooltip-position="top" href="#">
                                                        <div class="rbt-color-circle"></div>
                                                    </a></li>
                                            </ul>
                                            <a class="prd-link-text" href="product-single-default.html">+12 More
                                                Items</a>
                                        </div>
                                        <a href="shop-by-categories.html" class="rbt-card-subtitle rbt-card-catagories-text">Tablets &
                                            Accessories</a>
                                        <h2 class="rbt-card-title h6"><a href="product-single-default.html">Samsung
                                                Galaxy
                                                N-569 Tab S7 with
                                                Stylish – 8GB/128GB</a></h2>
                                        <div class="rbt-card-rating">
                                            <ul class="rbt-rating-icon-list">
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star rbt-rated-icon"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                            </ul>
                                            <p class="rating-digit">(25)</p>
                                        </div>
                                        <div class="pricing-part">
                                            <del class="price-text">Rs. 295.00</del>
                                            <span class="price-text">Rs. 179.98</span>
                                        </div>
                                        <div class="prd-btn-grp">
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block has-left-icon rbt-cart-sidenav-activation" href="#"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                            <a class="rbt-btn rbt-btn-border rbt-btn-sm rbt-square-btn d-block rbt-btn-transparent has-left-icon rbt-compare-btn-activation" href="#"><i class="fa-regular fa-file-plus-minus"></i>Add To Compare</a>
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
    <!-- End Search Dropdown  -->
</div>
</header>


<div class="rbt-preloader nbc-preloader" role="status" aria-label="Loading Nature's Beauty Creations">
    <div class="nbc-loading-container">
        <div class="nbc-loading-ring"></div>
        <div class="nbc-loading-icon">
            <img src="{{ asset('assets/images/nbc/loader1.svg') }}" alt="">
        </div>
    </div>
</div>

@yield('content')

<x-nbc-footer />

<footer class="rbt-footer rbt-footer-style-seven rbt-bg-color-white position-relative overflow-hidden pb--112 pb_sm--44">
    <div class="rbt-footer-top pt--48">
        <div class="container">
            <div class="row justify-content-between row--12 mt_dec--24">
                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--24">
                    <div class="footer-widget rbt-link-hover">
                        <h3 class="ft-title">Let Us Help You</h3>
                        <ul class="ft-link">
                            <li>
                                <a href="account-info.html">Account Info</a>
                            </li>
                            <li>
                                <a href="my-order-history.html">Your Orders</a>
                            </li>
                            <li>
                                <a href="return-policy.html">Returns Policies</a>
                            </li>
                            <li>
                                <a href="my-order-history.html">Shipping Rates</a>
                            </li>
                            <li>
                                <a href="return-policy.html">Refund and Returns</a>
                            </li>
                            <li>
                                <a href="privacy-policy.html">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="terms-policy.html">Terms and Conditions</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--24">
                    <div class="footer-widget rbt-link-hover">
                        <h3 class="ft-title">Make Money with Us</h3>
                        <ul class="ft-link">
                            <li>
                                <a href="{{ route('shop') }}">Sell on Unimart</a>
                            </li>
                            <li>
                                <a href="{{ route('shop') }}">Sell Your Services</a>
                            </li>
                            <li>
                                <a href="{{ route('shop') }}">Sell on Business</a>
                            </li>
                            <li>
                                <a href="{{ route('shop') }}">Sell Your Apps</a>
                            </li>
                            <li>
                                <a href="{{ route('shop') }}">Become an Affilate</a>
                            </li>
                            <li>
                                <a href="{{ route('shop') }}">Sell-Publish with Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--24">
                    <div class="footer-widget rbt-link-hover">
                        <h3 class="ft-title">Get to Know Us</h3>
                        <ul class="ft-link">
                            <li>
                                <a href="about.html">Careers for Unimart</a>
                            </li>
                            <li>
                                <a href="about.html">About Unimart</a>
                            </li>
                            <li>
                                <a href="about.html">Inverstor Relations</a>
                            </li>
                            <li>
                                <a href="about.html">Unimart Devices</a>
                            </li>
                            <li>
                                <a href="about.html">Customer reviews</a>
                            </li>
                            <li>
                                <a href="about.html">Social Responsibility</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--24">
                    <div class="footer-widget rbt-link-hover">
                        <h3 class="ft-title">Our Stores</h3>
                        <ul class="ft-link">
                            <li>
                                <a href="find-store.html">New York</a>
                            </li>
                            <li>
                                <a href="find-store.html">London SF</a>
                            </li>
                            <li>
                                <a href="find-store.html">Cockfosters BP</a>
                            </li>
                            <li>
                                <a href="find-store.html">Los Angeles</a>
                            </li>
                            <li>
                                <a href="find-store.html">Chicago</a>
                            </li>
                            <li>
                                <a href="find-store.html">Las Vegas</a>
                            </li>
                            <li>
                                <a href="find-store.html">Our Sitemap</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mt--24">
                    <div class="footer-widget">
                        <h3 class="ft-title">Download App on Mobile:</h3>
                        <ul class="ft-link">
                            <li>
                                <p>15% discount on your first purchase</p>
                            </li>
                        </ul>
                        <div class="rbt-app-store-area mt--24">
                            <ul class="rbt-app-store-list has-larger-img">
                                <li><a href="#"><img src="{{ asset('assets/images/footer/play-store-logo.webp') }}" alt="App Store"></a></li>
                                <li><a href="#"><img src="{{ asset('assets/images/footer/apple-store-logo.webp') }}" alt="App Store"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-widget mt--24">
                        <h3 class="ft-title">Subscribe our newsletter</h3>
                        <ul class="ft-link">
                            <li>
                                <p>Subscribe and get discount 20% Off</p>
                            </li>
                        </ul>
                        <form action="#" class="rbt-newsletter-form-one rbt-newsletter-form-one-v1 mt--24">
                            <input type="email" placeholder="Enter email">
                            <button type="submit" class="rbt-btn rbt-btn-md radius-round-6">
                                Subscribe
                            </button>
                            <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-separator-mid rbt-section-gap3Top">
        <div class="container">
            <hr class="rbt-separator separator-height-1 m-0 rbt-separator-gray100">
        </div>
    </div>

    <!-- Start Quick Link Area  -->
    <div class="rbt-footer-quick-link ptb--24">
        <div class="container">
            <div class="row row--12 mt_dec--24 align-items-center justify-content-between">
                <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mt--24">
                    <div class="footer-widget d-flex flex-column align-items-start rbt-gap--8 justify-content-lg-end">
                        <h3 class="ft-title mb--0">Our Social Links:</h3>
                        <ul class="social-icon social-icon-sm rbt-social-default with-bg-primary justify-content-start justify-content-lg-end">
                            <li><a href="https://www.tiktok.com/">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.pinterest.com/">
                                    <i class="fa-brands fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.x.com/">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
<!-- Shipping System
                <div class="col-xxl-4 col-lg-4 col-md-6 col-12 mt--24">
                    <div class="footer-widget d-flex flex-column align-items-start rbt-gap--8 justify-content-lg-end">
                        <h3 class="ft-title mb--0">Shipping System:</h3>
                        <ul class="payment-img-link justify-content-start">
                            <li><a href="#"><img src="{{ asset('assets/images/payment-brand/shipping-image-01.webp') }}" alt="Payment Brand Image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/payment-brand/shipping-image-02.webp') }}" alt="Payment Brand Image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/payment-brand/shipping-image-03.webp') }}" alt="Payment Brand Image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/payment-brand/shipping-image-04.webp') }}" alt="Payment Brand Image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/payment-brand/shipping-image-05.webp') }}" alt="Payment Brand Image"></a></li>
                        </ul>
                    </div>
                </div>
            -->
                <div class="col-xxl-4 col-lg-4 col-md-6 col-12 mt--24">
                    <div class="footer-widget d-flex flex-column align-items-start rbt-gap--8 justify-content-lg-end">
                        <h3 class="ft-title mb--0">Payment System:</h3>
                        <ul class="payment-img-link justify-content-start">
                            <li>
                                <a href="#!"><img src="{{ asset('assets/images/payment-brand/image-01.webp') }}" alt="eCommerce Brand Image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick Link Area  -->
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator separator-height-1 m-0 rbt-separator-gray100">
        </div>
    </div>

    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 pb--0">
        <div class="container">
            <div class="row row--12 align-items-center justify-content-between mt_dec--24">
                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-12 col-12 mt--24">
                    <div class="logo mx-auto mx-xl-0">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}" alt="NBC Logo">
                        </a>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-12 mt--24">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright <span class="copyright-year">2025</span> &copy; <a class="rbt-text-semi-bold" href="https://rainbowthemes.net/">Unimart</a> HTML Template.</p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12 col-12 mt--24">
                    <ul class="copyright-link rbt-link-hover justify-content-center justify-content-xl-end mt_sm--12 mt_md--12">
                        <li><a href="return-policy.html">Refund policy</a></li>
                        <li><a href="privacy-policy.html">Privacy policy</a></li>
                        <li><a href="terms-policy.html">Term & conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->

</footer>



<!-- Start Sign In Modal Area  -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="signinModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="signinModalLabel" aria-hidden="true">
    <div class="modal-dialog rbt-register-form-modal modal-dialog-centered">
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
                <div class="rbt-login-form rbt-bg-color-white rbt-content-trs-portion">
                    <div class="rbt-login-form-inner">
                        <div class="rbt-login-form-top">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}" alt="NBC Logo Images">
                                </a>
                            </div>
                            <h3 class="rbt-title rbt-text-bold mb--16 h6" id="signinModalLabel">Sign In To Proceed</h3>
                            <div class="rbt-tab rbt-round-shape-tab">

                                <!-- Start tabs -->
                                <ul class="nav nav-tabs" id="registerFormTab1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="rbt-form-tab-id-1" data-bs-toggle="tab" data-bs-target="#rbt-form-tab-pane-1" type="button" role="tab" aria-controls="rbt-form-tab-pane-1" aria-selected="true">
                                            <i class="fa-sharp fa-regular fa-phone"></i>
                                            Phone Number
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="rbt-form-tab-id-2" data-bs-toggle="tab" data-bs-target="#rbt-form-tab-pane-2" type="button" role="tab" aria-controls="rbt-form-tab-pane-2" aria-selected="false">
                                            <i class="fa-sharp fa-regular fa-envelope"></i>
                                            Email
                                        </button>
                                    </li>
                                </ul>
                                <!-- End tabs -->

                                <form>
                                    <!-- Start tabs content -->
                                    <div class="tab-content" id="registerFormTab1Content">
                                        <div class="tab-pane fade show active" id="rbt-form-tab-pane-1" role="tabpanel" aria-labelledby="rbt-form-tab-id-1" tabindex="0">
                                            <div class="rbt-input-field-grp">
                                                <label class="rbt-field-label" for="modal_signin_number">Your
                                                    Number<span class="rbt-text-color-danger">*</span></label>
                                                <input class="rbt-input-field" placeholder="Number" type="text" id="modal_signin_number">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="rbt-form-tab-pane-2" role="tabpanel" aria-labelledby="rbt-form-tab-id-2" tabindex="0">
                                            <div class="rbt-input-field-grp">
                                                <label class="rbt-field-label" for="modal_signin_email">Your Email<span class="rbt-text-color-danger">*</span></label>
                                                <input class="rbt-input-field" placeholder="Email" type="email" id="modal_signin_email">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End tabs content -->
                                    <button type="submit" class="rbt-btn d-block w-100 mt--24 mb--16">
                                        Continue
                                    </button>
                                    <div class="rbt-check-group">
                                        <input id="modal_login_checked1" type="checkbox" name="login">
                                        <label for="modal_login_checked1">Stay Logged In</label>
                                    </div>
                                </form>
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
                                <button class="rbt-switch-btn" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal" aria-label="Close"><span>Create an account</span></button>
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
<!-- End Sign In Modal Area  -->
<!-- Start Sign In Modal Area  -->
<div class="rbt-default-modal has-rbt-top-folder-shape modal fade" id="signupModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog rbt-register-form-modal modal-dialog-centered">
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
                <div class="rbt-login-form rbt-bg-color-white rbt-content-trs-portion">
                    <div class="rbt-login-form-inner">
                        <div class="rbt-login-form-top">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}" alt="NBC Logo Images">
                                </a>
                            </div>
                            <h3 class="rbt-title rbt-text-bold mb--16 h6" id="signupModalLabel">Create an Account</h3>
                            <p class="description">I want grocery delivery for my:</p>
                            <ul class="rbt-signup-radio-list">
                                <li class="rbt-check-grp ml--0">
                                    <input id="modal-rbt-signup-radio-1" type="radio" name="modal-rbt-signup-radio">
                                    <label for="modal-rbt-signup-radio-1">
                                        <span class="rbt-lable-text">Home</span>
                                    </label>
                                </li>
                                <li class="rbt-check-grp ml--0">
                                    <input id="modal-rbt-signup-radio-2" type="radio" name="modal-rbt-signup-radio">
                                    <label for="modal-rbt-signup-radio-2">
                                        <span class="rbt-lable-text">Office</span>
                                    </label>
                                </li>
                                <li class="rbt-check-grp ml--0">
                                    <input id="modal-rbt-signup-radio-3" type="radio" name="modal-rbt-signup-radio">
                                    <label for="modal-rbt-signup-radio-3">
                                        <span class="rbt-lable-text">Business</span>
                                    </label>
                                </li>
                                <li class="rbt-check-grp ml--0">
                                    <input id="modal-rbt-signup-radio-4" type="radio" name="modal-rbt-signup-radio">
                                    <label for="modal-rbt-signup-radio-4">
                                        <span class="rbt-lable-text">Others</span>
                                    </label>
                                </li>
                            </ul>
                            <div class="rbt-tab rbt-round-shape-tab">

                                <!-- Start tabs -->
                                <ul class="nav nav-tabs" id="modal_signinTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="rbt-form-tab-id-3" data-bs-toggle="tab" data-bs-target="#rbt-form-tab-pane-3" type="button" role="tab" aria-controls="rbt-form-tab-pane-3" aria-selected="true">
                                            <i class="fa-sharp fa-regular fa-phone"></i>
                                            Phone Number
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="rbt-form-tab-id-4" data-bs-toggle="tab" data-bs-target="#rbt-form-tab-pane-4" type="button" role="tab" aria-controls="rbt-form-tab-pane-4" aria-selected="false">
                                            <i class="fa-sharp fa-regular fa-envelope"></i>
                                            Email
                                        </button>
                                    </li>
                                </ul>
                                <!-- End tabs -->

                                <!-- Start tabs content -->
                                <form>
                                    <div class="tab-content" id="modal_signinTabContent">
                                        <div class="tab-pane fade show active" id="rbt-form-tab-pane-3" role="tabpanel" aria-labelledby="rbt-form-tab-id-3" tabindex="0">
                                            <div class="rbt-input-field-grp">
                                                <label class="rbt-field-label" for="modal_register_number">Your
                                                    Number<span class="rbt-text-color-danger">*</span></label>
                                                <input class="rbt-input-field" placeholder="Number" type="text" id="modal_register_number">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="rbt-form-tab-pane-4" role="tabpanel" aria-labelledby="rbt-form-tab-id-4" tabindex="0">
                                            <div class="rbt-input-field-grp">
                                                <label class="rbt-field-label" for="modal_register_email">Your
                                                    Email<span class="rbt-text-color-danger">*</span></label>
                                                <input class="rbt-input-field" placeholder="Email" type="email" id="modal_register_email">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="rbt-btn d-block w-100 mt--24 mb--16">
                                        Continue
                                    </button>
                                    <div class="rbt-check-group">
                                        <input id="modal_signup_login_checked2" type="checkbox" name="login">
                                        <label for="modal_signup_login_checked2">Stay Logged In</label>
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
                                Already a customer?
                                <button class="rbt-switch-btn" data-bs-toggle="modal" data-bs-target="#signinModal" data-bs-dismiss="modal" aria-label="Close"><span>Sign In</span></button>
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
<!-- End Sign In Modal Area  -->
<!-- Start Demos Modal Area -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="demos-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-fullwidth">
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
                    <div class="container">
                        <div class="row overflow-hidden">
                            <div class="col-12 col-lg-10 col-xl-9 mx-auto">
                                <div class="rbt-exclusive-section-title text-center position-relative pt--48 mb--20">
                                    <span class="rbt-overlay-counter counter-sm top-0">
                                        <span class="odometer" data-count="100">00</span>
                                        <span class="counter-suffix">+</span>
                                    </span>
                                    <h2 class="rbt-title mb--48 sm_mb--32 md_mb--40">
                                        <span class="rbt-bold--text">Best-In-Class Designs<br></span>
                                        <span class="rbt-title-sm-text">To Discover Awesome Creative Designs</span>
                                    </h2>
                                    <div class="section-indicator d-xl-none d-xxl-block">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="26" viewbox="0 0 54 26" fill="none">
                                                <path d="M32.0552 6.59302C25.1245 1.4584 15.1617 3.14549 5.41547 10.9941C7.5813 11.5076 9.81933 9.23368 11.6964 11.2142C11.6242 11.5809 11.6964 11.9477 11.6242 12.0211C8.51983 13.4881 5.41547 15.0285 2.23892 16.3488C1.15601 16.7889 0.000891783 16.2021 0.000891667 14.8818C0.00089143 12.1678 -0.071302 9.38039 1.08381 6.22627C2.02233 7.47325 2.67208 8.35347 3.10524 8.94028C6.1374 6.88643 8.953 4.61252 12.0574 2.99878C19.4212 -0.962218 26.9294 -1.18227 34.1488 3.43889C35.3039 4.17241 36.1703 4.02571 37.3254 3.65895C42.2346 1.97186 46.9272 2.63202 51.1867 5.63945C52.7028 6.73972 54.3632 8.06006 53.9301 10.9941C51.8364 7.98671 49.3096 6.44631 46.2775 5.71279C43.3175 5.05262 40.3575 4.97927 37.6142 6.44631C38.1195 9.23368 38.9136 11.8743 38.9136 14.515C38.9858 17.1557 38.5527 19.943 37.7585 22.437C36.9644 25.0043 34.582 26.2513 32.344 25.9579C30.1059 25.7378 28.3733 23.9774 27.8679 21.2634C27.0738 16.9356 28.0845 12.8279 30.3225 9.08698C30.9001 8.28011 31.4776 7.39989 32.0552 6.59302ZM34.221 8.72022C31.261 12.2411 30.3225 15.9087 30.6835 19.943C30.8279 21.2634 31.1889 22.5837 32.7771 22.6571C34.1488 22.7304 34.7986 21.6301 35.0874 20.4565C36.1703 16.7156 35.9537 12.9746 34.221 8.72022Z" fill="#215ADA"></path>
                                            </svg>
                                        </span>
                                        <span class="indicator-text text-start">Craft exceptional visitor
                                            <br>experience.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-isotop-scroll rbt-scroll-trigger fade_in animation-order-3">
                                    <div class="rbt-isotop-tabs rbt-nav-effect-activation">
                                        <div class="rbt-product-nav-grp rbt-tab-btn-list">
                                            <button data-filter="*" class="active"><span class="filter-text">All
                                                    Together</span></button>
                                            <button data-filter=".fashion"><span class="filter-text">Fashion</span></button>
                                            <button data-filter=".accessories"><span class="filter-text">Accessories</span></button>
                                            <button data-filter=".furniture"><span class="filter-text">Furniture</span></button>
                                            <button data-filter=".electronics"><span class="filter-text">Electronics</span></button>
                                            <button data-filter=".cosmetics"><span class="filter-text">Cosmetics</span></button>
                                            <button data-filter=".interior"><span class="filter-text">Decor/Interior</span></button>
                                            <button data-filter=".printing"><span class="filter-text">Printing</span></button>
                                            <button data-filter=".sports"><span class="filter-text">Sports</span></button>
                                        </div>
                                        <div class="rbt-product-nav-grp rbt-tab-btn-list">
                                            <button data-filter=".coming-soon"><span class="filter-text">️‍🔥 Coming
                                                    Soon</span></button>
                                        </div>
                                        <span class="rbt-bg-highlight isotop-tab-bg-highlight"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rbt-demo-prev-wrapper rbt-demos-presentation-modals pl--8 pr--12 mt--24">
                            <!-- Start Demos Area -->
                            <div class="rbt-isotop-demos-area isotop-demo-mesonry-activation">
                                <div class="row mt_dec--24">
                                    <div class="col-12">
                                        <div class="grid-5-meso">
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-1">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-electronics.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-1.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-electronics.html">Electronics - 1</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-2">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-fashion.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-5.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-fashion.html">Fashion -
                                                                    1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition furniture">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-3">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-furniture.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-8.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-furniture.html">Furniture - 1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-4">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-printing-service.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-6.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-printing-service.html">Print Service -
                                                                    1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition cosmetics fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-5">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-cosmetic-beauty.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-2.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-cosmetic-beauty.html">Cosmetic Beauty -
                                                                    1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition interior">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-6">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-sports.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-9.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-sports.html">Sports -
                                                                    1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-7">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-glass.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-3.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-glass.html">Glass -
                                                                    1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-8">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-phone-case.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-4.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-phone-case.html">Phone -
                                                                    1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition glass">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-9">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-accessories.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-10.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-accessories.html">Accessories - 1</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-jewellery.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-jewellery.html">Jewellery - 1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-furniture-two.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-furniture-02.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-furniture-two.html">Furniture - 2</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-fashion-two.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-fashion-02.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-fashion-two.html">Fashion - 2</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-ladies-bag.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-leather-goods-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-ladies-bag.html">Luxury
                                                                    leather goods</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-perfume.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-fragrance-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-perfume.html">Fragrance</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-jewellery-two.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-jewellery-02.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-jewellery-two.html">Jewellery - 2</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-cosmetic-beauty-two.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-cosmetics-02.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-cosmetic-beauty-two.html">Cosmetics
                                                                    Beauty 2</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-cosmetic-beauty-three.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-cosmetics-03.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-cosmetic-beauty-three.html">Cosmetics
                                                                    Beauty 3</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="{{ route('home') }}"><img src="{{ asset('assets/images/splash/demo-pages/demo-cosmetics-04.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="{{ route('home') }}">Cosmetics
                                                                    Beauty 4</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-laggage-bag.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-laggage-bag.html">Luggage Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-watch.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-watch-02.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-watch.html">Watch
                                                                    Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-straller.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-straller.html">Stroller
                                                                    (Baby Walker)</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-paddle-boards.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-paddle-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-paddle-boards.html">Paddle Boards</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-shocks-store.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-socks-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-shocks-store.html">Socks
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-headphones-store.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-headphone-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-headphones-store.html">Headphones
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-dog-accessories.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-dog-accessories-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-dog-accessories.html">Dog Accessories</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-cat-accessories-01.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-cat-accessories-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-cat-accessories-01.html">Cat
                                                                    Accessories</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-kids-cloth.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-kids-cloth-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-kids-cloth.html">Kids
                                                                    Cloth</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-gym-supliments-one.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-gym-suppliment-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-gym-supliments-one.html">Gym
                                                                    Supplement</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-plant-one.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-plant-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-plant-one.html">Plants
                                                                    Store </a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-kitchen-accessories.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-kitchenware-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-kitchen-accessories.html">Kitchen
                                                                    Accessories</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-electric-cycle.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-cycle-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-electric-cycle.html">Electric Cycle</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-fashion-three.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-fashion-03.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-fashion-three.html">Fashion - 3</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-ceramics.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-ceramic-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-ceramics.html">Ceramics
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-drinkware.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-drinkware-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-drinkware.html">Drinkware Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-camping-gear.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-camping-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-camping-gear.html">Camping Gear</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-flower-plants.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-flowers-shop-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-flower-plants.html">Flowers Plants</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-tennis-accessories.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-tennis-accessories-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-tennis-accessories.html">Tennis
                                                                    Accessories</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-coffee-store.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-coffee-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-coffee-store.html">Coffee Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-bakery-shop.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-bakery-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-bakery-shop.html">Bakery
                                                                    Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-packaging-shop.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-packaging-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-packaging-shop.html">Packaging Shop</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-hoodie-stores-one.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-hoodie-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-hoodie-stores-one.html">Hoodie Store -
                                                                    1</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-hoodie-stores-two.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-hoodie-02.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-hoodie-stores-two.html">Hoodie Store -
                                                                    2</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-borkha-shop.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-borkha-shop.html">Borka
                                                                    Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-hijab-shop.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-hijab-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-hijab-shop.html">Hijab
                                                                    Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-hats-store.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-hat-store-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-hats-store.html">Hats
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-sneakers.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-sneakers-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-sneakers.html">Sneakers</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-yoga-store.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-yoga-store.html">Yoga
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-furniture-three.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-furniture-three.html">Furniture - 3</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-shoes.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-shoes-women-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-shoes.html">Shoes</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-organic-food.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-organic-food-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-organic-food.html">Organic Food Shop</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-black-friday-sale.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-black-friday-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-black-friday-sale.html">Black Friday
                                                                    Sale</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-tea-stores.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-tea-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-tea-stores.html">Tea
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-book-store.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-book-shop-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-book-store.html">Book
                                                                    Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-furniture-four.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-furniture-four.html">Furniture - 4</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-watch-two.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-watch-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-watch-two.html">Smart
                                                                    watch</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-games-store.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-game-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-games-store.html">Games
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-car-automobile-accessories.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-car-%26-automobile-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-car-automobile-accessories.html">Car &
                                                                    Automobile Accessories</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-electronics-two.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-electronics-02.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-electronics-two.html">Electronics - 2</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-electronics-three.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-electronics-03.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-electronics-three.html">Electronics -
                                                                    3</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-electronics-four.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-electronics-04.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-electronics-four.html">Electronics -
                                                                    4</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition fashion">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-beard-oil.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-beard-oil-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-beard-oil.html">Beard
                                                                    Oil Shop</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-cyber-monday.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-11.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-cyber-monday.html">Cyber
                                                                    Monday Sale</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-laptop.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-laptop-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-laptop.html">Laptop
                                                                    Store</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Demo -->
                                            <div class="rbt-meso-item transition phone electronics">
                                                <div class="demo-single rbt-scroll-trigger zoom_in animation-order-10">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="home-mobile-phone.html"><img src="{{ asset('assets/images/splash/demo-pages/demo-mobile-01.webp') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="rbt-title"><a href="home-mobile-phone.html">Mobile Phone Store</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Demos Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Demos Modal Area  -->
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
                        <a class="rbt-round-btn has-rbt-md-fsize" href="#!" data-bs-toggle="modal" data-bs-target="#wishlistModal">
                            <i class="fa-regular fa-heart"></i>
                            <div class="access-box-count">3</div>
                            <span class="rbt-toolbar-label"> Wishist</span>
                        </a>
                    </li>

                    <li class="rbt-access-box">
                        <a class="rbt-common-search-trigger-active rbt-round-btn has-rbt-md-fsize rbt-modern-close-btn" href="{{ route('home') }}">
                            <i class="fa-regular fa-house search-icon"></i>
                            <div class="modern-close-wrapper"></div>
                            <span class="rbt-toolbar-label"> Home</span>
                        </a>
                    </li>



                    <li class="rbt-access-box">
                        <a href="#!" class="rbt-round-btn has-rbt-md-fsize" data-bs-toggle="modal" data-bs-target="#signinModal">
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
    <div class="rbt-toaster rbt-toaster-compare" role="alert" aria-atomic="true" aria-live="assertive"><i class="fa-regular fa-check mr--8"></i>Added in Compare</div>
<div class="rbt-toaster rbt-toaster-wishlist" role="alert" aria-atomic="true" aria-live="assertive"><i class="fa-regular fa-check mr--8"></i>Added in Wishlist</div>
<div class="rbt-progress-parent">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>

<a class="close_side_menu catagories-close_side_menu" href="javascript:void(0);"></a>
<a href="javascript:void(0);" class="common-close_search_dropdown"></a>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('assets/js/vendor/modernizr.min.js') }}"></script>
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

<script type="module" src="beacon.min.js/v4513226cdae34746b4dedf0b4dfa099e1781791509496" integrity="sha512-ZE9pZaUXND66v380QUtch/5sE9tPFh2zg45pR2PB0CVkCtOREv2AJKkSidISWkysEuQ0EH8faUU5du78bx87UQ==" data-cf-beacon='{"version":"2024.11.0","token":"4a64ee10db7a4427ba649e901229556e","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>


</html>
