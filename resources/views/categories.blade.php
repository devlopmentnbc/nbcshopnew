@extends('layouts.app')

@section('title', 'All Categories - Nature\'s Beauty Creations')

@section('content')
    <div class="rbt-breadcrumb-default ptb--30 bg-color-white border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-breadcrumb-inner text-center">
                        <h2 class="title mb--6 h3">All Categories</h2>
                        <ul class="rbt-breadcrumb-page-list justify-content-center mt--0">
                            <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-component-area rbt-catagories-area rbt-bg-color-white nbc-category-section"
        style="padding-top: 60px; padding-bottom: 80px;">
        <div class="container">
            <div class="row row--12 mt_dec--24">
                @forelse ($categories as $index => $category)
                    @php
                        $categoryUrl = route('shop', ['category' => $category->slug ?: $category->id]);
                    @endphp
                    <div class="col-lg-3 col-md-4 col-6 mt--24">
                        <div class="rbt-cat-box rbt-cat-box-5 variation-one">
                            <div class="inner">
                                <div class="rbt-image-portion position-relative overflow-hidden">
                                    <a href="{{ $categoryUrl }}">
                                        <img src="{{ $category->image ? asset($category->image) : asset('assets/images/nbc/Nature\'s Secret/herbel-hair-oil1.png') }}"
                                            alt="{{ $category->name }}" loading="lazy">
                                    </a>
                                    <div class="rbt-right-corner-portion bottom--position">
                                        <div class="rbt-corner-portion-wrapper">
                                            <a href="{{ $categoryUrl }}" class="rbt-card-link-btn"
                                                aria-label="Shop {{ $category->name }}"><i
                                                    class="fa-solid fa-arrow-up-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <p class="title mb-1">
                                        <a href="{{ $categoryUrl }}">{{ $category->name }}</a>
                                    </p>
                                    <span class="small text-muted">
                                        {{ $category->products_count }} {{ \Illuminate\Support\Str::plural('product', $category->products_count) }}
                                    </span>
                                    @if ($category->subCategories->isNotEmpty())
                                        <div class="d-flex flex-wrap justify-content-center gap-1 mt-2">
                                            @foreach ($category->subCategories as $subCategory)
                                                <a href="{{ route('shop', ['category' => $category->slug ?: $category->id, 'sub_category' => $subCategory->slug ?: $subCategory->id]) }}"
                                                    class="badge rounded-pill bg-light text-dark text-decoration-none fw-normal">{{ $subCategory->name }}</a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted mb-3">No categories available yet.</p>
                        <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-secondary rbt-btn-sm-2">
                            <span class="btn-text">Browse All Products</span>
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
