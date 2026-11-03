@extends('layouts.app')

@section('title', 'Customer Sign In - Unimart')

@section('content')


    <!-- Start Preloader Area  -->
    <div class="rbt-preloader">
        <div class="rbt-preloader-inner">
            <svg class="rbt-preloader-cart" role="img" aria-label="Shopping cart line animation" viewbox="0 0 128 128"
                width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                    <g class="rbt-preloader-cart-track" stroke="hsla(0,10%,10%,0.1)">
                        <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"></polyline>
                        <circle cx="43" cy="111" r="13"></circle>
                        <circle cx="102" cy="111" r="13"></circle>
                    </g>
                    <g class="rbt-preloader-cart-lines" stroke="currentColor">
                        <polyline class="rbt-preloader-cart-top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"
                            stroke-dasharray="338 338" stroke-dashoffset="-338"></polyline>
                        <g class="rbt-preloader-cart-wheel1" transform="rotate(-90,43,111)">
                            <circle class="rbt-preloader-cart-wheel-stroke" cx="43" cy="111" r="13"
                                stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68"></circle>
                        </g>
                        <g class="rbt-preloader-cart-wheel2" transform="rotate(90,102,111)">
                            <circle class="rbt-preloader-cart-wheel-stroke" cx="102" cy="111" r="13"
                                stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68"></circle>
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
                                    </li>

                                    <li class="with-rbt-megamenu has-menu-child-item">
                                        <a href="#!">Skin Care <i class="fa-regular fa-chevron-down"></i></a>
                                    </li>
                                    <li class="with-rbt-megamenu has-menu-child-item position-static">
                                        <a href="#!">Bath & Body <i class="fa-regular fa-chevron-down"></i></a>
                                    </li>
                                    <li class="with-rbt-megamenu has-menu-child-item position-static">
                                        <a href="#!">Hair Care <i class="fa-regular fa-chevron-down"></i></a>
                                    </li>

                                    <li class="with-rbt-megamenu has-menu-child-item position-static">
                                        <a href="#!">Baby Care <i class="fa-regular fa-chevron-down"></i></a>
                                    </li>

                                    <li class="has-dropdown position-relative">
                                        <a href="#!">Fragrance <i class="fa-regular fa-chevron-down"></i></a>
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
    <!-- Start Side Nav -->
    <div class="rbt-cart-side-menu rbt-sidebar-cart">
        <a href="#!" class="rbt-close-inner-popup rbt-popup-close-btn"></a>
        <div class="rbt-offcanvas-inner-popup">
            <div class="rbt-offcanvas-inner-popup-card note-popup">
                <div class="rbt-offcanvas-card-inner">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger mb--20 p-3 rounded" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="tab-content" id="signinTabContent">
                            <div class="tab-pane fade show active" id="rbt-tab-pane-1" role="tabpanel"
                                aria-labelledby="rbt-tab-id-1" tabindex="0">
                                <div class="rbt-input-field-grp">
                                    <label class="rbt-field-label" for="signin_email">Your Email Address<span
                                            class="rbt-text-color-danger">*</span></label>
                                    <input class="rbt-input-field" id="signin_email" name="email" type="email"
                                        value="{{ old('email') }}" placeholder="Enter Email Address" required
                                        autofocus>
                                </div>
                                <div class="rbt-input-field-grp mt--20">
                                    <label class="rbt-field-label" for="signin_password">Password<span
                                            class="rbt-text-color-danger">*</span></label>
                                    <input class="rbt-input-field" id="signin_password" name="password"
                                        type="password" placeholder="Enter Password" required>
                                </div>
                                <div
                                    class="rbt-inner-content mt--20 flex-wrap gap-2 d-flex justify-content-between align-items-center">
                                    <div class="rbt-check-box">
                                        <input class="rbt-check-box-input" type="checkbox" name="remember"
                                            id="signin_remember">
                                        <label class="rbt-check-box-label" for="signin_remember">Remember me</label>
                                    </div>
                                </div>
                                <div class="mt--30">
                                    <button type="submit"
                                        class="rbt-btn rbt-switch-btn rbt-switch-y w-100 btn-gradient">
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
                <button type="submit"
                    class="rbt-btn rbt-btn-border rbt-social-login-btn d-block w-100 mb--16 rbt-social-login-btn">
                    <img class="icon" src="{{ asset('assets/images/icons/fb-icon.webp') }}" alt="Icon">
                    Continue with Facebook
                </button>
                <button type="submit"
                    class="rbt-btn rbt-btn-border rbt-social-login-btn d-block w-100 rbt-social-login-btn">
                    <img class="icon" src="{{ asset('assets/images/icons/google-icon.webp') }}" alt="Icon">
                    Continue with Google
                </button>
                <!-- End social login button -->

                <div class="rbt-login-system-switch rbt-link-hover">
                    Don't have an account?
                    <a class="rbt-switch-btn" href="signup.html"><span>Create an account</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Component Area -->
@endsection
