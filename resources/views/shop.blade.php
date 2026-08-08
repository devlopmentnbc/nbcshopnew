@extends('layouts.app')

@section('title', 'Shop All Products - Nature\'s Beauty Creations')

@push('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/shop-page.css') }}">
@endpush

@section('content')
<div class="rbt-breadcrumb-default ptb--30 bg-color-white border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rbt-breadcrumb-inner text-center">
                    <h2 class="title mb--6 h3">Shop Our Products</h2>
                    <ul class="rbt-breadcrumb-page-list justify-content-center mt--0">
                        <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li>
                            <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rbt-shop-area ptb--50 bg-color-extra-two" style="background-color: #f8fafc;padding-top:80px; padding-bottom:80px;">
    <div class="container">
        <div class="row g-4">
            
            <!-- Sidebar Filters -->
            <div class="col-lg-3 col-md-4">
                <div class="card border-0 shadow-sm rounded-16 p-4 bg-white sticky-top" style="top: 100px; z-index: 7;">
                    <form method="GET" action="{{ route('shop') }}" id="shop-filter-form">
                        
                        <!-- Search Box -->
                        <div class="mb-4">
                            <label class="fw-bold text-dark mb-2 small"><i class="fa-regular fa-magnifying-glass me-1 text-success"></i> Search Products</label>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control rounded-start-12 py-2" placeholder="Search..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-success rounded-end-12 px-3">
                                    <i class="fa-regular fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Categories Filter -->
                        <div class="mb-4 border-bottom pb-3">
                            <h6 class="fw-bold text-dark mb-3">
                                <i class="fa-regular fa-layer-group me-1 text-success"></i> Categories
                            </h6>
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('shop', array_merge(request()->except(['category', 'page']))) }}" 
                                   class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ !request('category') ? 'fw-bold text-success' : 'text-dark' }}">
                                    <span>All Categories</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ $products->total() }}</span>
                                </a>
                                @foreach($categories as $cat)
                                    <a href="{{ route('shop', array_merge(request()->all(), ['category' => $cat->slug, 'page' => 1])) }}" 
                                       class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ request('category') == $cat->slug ? 'fw-bold text-success' : 'text-dark' }}">
                                        <span>{{ $cat->name }}</span>
                                        <span class="badge bg-light text-dark rounded-pill">{{ $cat->products_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Brands Filter -->
                        <div class="mb-4 border-bottom pb-3">
                            <h6 class="fw-bold text-dark mb-3">
                                <i class="fa-regular fa-tags me-1 text-success"></i> Brands
                            </h6>
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('shop', array_merge(request()->except(['brand', 'page']))) }}" 
                                   class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ !request('brand') ? 'fw-bold text-success' : 'text-dark' }}">
                                    <span>All Brands</span>
                                </a>
                                @foreach($brands as $b)
                                    <a href="{{ route('shop', array_merge(request()->all(), ['brand' => $b->slug, 'page' => 1])) }}" 
                                       class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ request('brand') == $b->slug ? 'fw-bold text-success' : 'text-dark' }}">
                                        <span>{{ $b->name }}</span>
                                        <span class="badge bg-light text-dark rounded-pill">{{ $b->products_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        @if(request('category') || request('brand') || request('search') || request('sort'))
                            <div class="pt-2">
                                <a href="{{ route('shop') }}" class="btn btn-outline-danger btn-sm w-100 rounded-12">
                                    <i class="fa-regular fa-xmark me-1"></i> Clear All Filters
                                </a>
                            </div>
                        @endif

                    </form>
                </div>
            </div>

            <!-- Main Product Grid Area -->
            <div class="col-lg-9 col-md-8">
                <!-- Sorting & Top Bar -->
                <div class="card border-0 shadow-sm rounded-16 p-3 bg-white mb-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="text-muted" style="font-size: 12px;">
                            Showing <span class="fw-bold text-dark">{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</span> of <span class="fw-bold text-dark">{{ $products->total() }}</span> products
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <label class="fw-bold text-dark mb-0 me-1" style="font-size: 12px;">Sort By:</label>
                            <form method="GET" action="{{ route('shop') }}" class="m-0" id="sort-form">
                                @foreach(request()->except(['sort', 'page']) as $k => $v)
                                    <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                                @endforeach
                                <select name="sort" class="form-select form-select-sm rounded-12 py-1 ps-3 pe-4" style="font-size: 12px; cursor: pointer;" onchange="document.getElementById('sort-form').submit()">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest Products</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A to Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z to A)</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row row--15 g-3">
                    @forelse($products as $product)
                        <x-nbc-product-card :product="$product" :animation-order="$loop->iteration" />
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="card border-0 shadow-sm rounded-16 p-5 bg-white">
                                <i class="fa-regular fa-box-open display-4 text-muted mb-3"></i>
                                <h5 class="fw-bold text-dark mb-1">No Products Found</h5>
                                <p class="text-muted small mb-3">We couldn't find any products matching your selected filters.</p>
                                <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-sm btn-gradient mx-auto" style="max-width: 200px;">
                                    View All Products
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="d-flex justify-content-center mt-5">
                        {{ $products->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection
