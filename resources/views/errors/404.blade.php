@extends('layouts.app')

@section('title', "Page Not Found - Nature's Beauty Creations")
@section('robots', 'noindex, follow')
@section('canonical', '')

@section('content')
    <div class="rbt-breadcrumb-default ptb--30 bg-color-white border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-breadcrumb-inner text-center">
                        <h1 class="title mb--6 h3">Page Not Found</h1>
                        <ul class="rbt-breadcrumb-page-list justify-content-center mt--0">
                            <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">404</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-component-area rbt-bg-color-white" style="padding-top: 80px; padding-bottom: 100px;">
        <div class="container text-center">
            <p class="display-4 fw-bold text-success mb-2">404</p>
            <p class="text-muted mb-4">Sorry, the page you are looking for does not exist or has been moved.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-sm btn-gradient">Browse All Products</a>
                <a href="{{ route('categories') }}" class="rbt-btn rbt-btn-sm rbt-btn-secondary">Shop by Category</a>
            </div>
        </div>
    </div>
@endsection
