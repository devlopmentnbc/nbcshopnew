@extends('layouts.app')

@section('title', $page['title'])
@section('canonical', $page['canonical'])
@section('robots', $page['robots'])
@section('meta_description', $page['description'])

@push('page-styles')
    <link rel="stylesheet"
        href="{{ asset('assets/css/shop-page.css') }}?v={{ filemtime(public_path('assets/css/shop-page.css')) }}">
@endpush

@section('content')
    <div class="rbt-breadcrumb-default ptb--30 bg-color-white border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-breadcrumb-inner text-center">
                        <h1 class="title mb--6 h3">{{ $page['heading'] }}</h1>
                        <ul class="rbt-breadcrumb-page-list justify-content-center mt--0">
                            <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            @if ($page['current'])
                                @foreach ($page['crumbs'] as $crumb)
                                    <li>
                                        <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                                @endforeach
                            @endif
                            <li>
                                <div class="icon-right"><i class="fa-solid fa-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">{{ $page['current'] ?? 'Shop' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-shop-area ptb--50 bg-color-extra-two"
        style="background-color: #f8fafc;padding-top:80px; padding-bottom:80px;">
        <div class="container">
            <div class="row g-4">

                <!-- Sidebar Filters -->
                <div class="col-lg-3 col-md-4">
                    <div class="card border-0 shadow-sm rounded-16 p-4 bg-white sticky-top" style="top: 100px; z-index: 7;">
                        {{-- Search within the current category / brand page --}}
                        <form method="GET" action="{{ url()->current() }}" id="shop-filter-form">
                            @if (!empty($filters['brand']) && ($activeCategory || $subCategory))
                                <input type="hidden" name="brand" value="{{ $filters['brand'] }}">
                            @endif

                            <!-- Search Box -->
                            <div class="mb-4">
                                <label class="fw-bold text-dark mb-2 small"><i
                                        class="fa-regular fa-magnifying-glass me-1 text-success"></i> Search
                                    Products</label>
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control rounded-start-12 py-2"
                                        placeholder="Search..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-success rounded-end-12 px-3">
                                        <i class="fa-regular fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Categories Filter -->
                            <div class="mb-4 border-bottom pb-3">
                                <button type="button"
                                    class="btn p-0 w-100 d-flex align-items-center justify-content-between text-dark text-decoration-none shadow-none border-0 bg-transparent mb-1"
                                    data-bs-toggle="collapse" data-bs-target="#categoriesFilterCollapse"
                                    aria-expanded="{{ $activeCategory ? 'true' : 'false' }}"
                                    aria-controls="categoriesFilterCollapse">
                                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                                        <i class="fa-regular fa-layer-group me-2 text-success"></i> Categories
                                    </h6>
                                    <i class="fa-solid fa-chevron-down filter-collapse-icon text-muted small"></i>
                                </button>
                                <div class="collapse {{ $activeCategory ? 'show' : '' }}" id="categoriesFilterCollapse">
                                    <div class="d-flex flex-column gap-2 pt-2">
                                        <a href="{{ \App\Support\Catalog::listingUrl(\Illuminate\Support\Arr::except($filters, ['category', 'sub_category'])) }}"
                                            class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ !$activeCategory ? 'fw-bold text-success' : 'text-dark' }}">
                                            <span>All Categories</span>
                                        </a>
                                        @foreach ($categories as $cat)
                                            <a href="{{ \App\Support\Catalog::listingUrl(array_merge(\Illuminate\Support\Arr::except($filters, ['sub_category']), ['category' => $cat->slug])) }}"
                                                class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ $activeCategory?->is($cat) ? 'fw-bold text-success' : 'text-dark' }}">
                                                <span>{{ $cat->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Brands Filter -->
                            <div class="mb-4 border-bottom pb-3">
                                <button type="button"
                                    class="btn p-0 w-100 d-flex align-items-center justify-content-between text-dark text-decoration-none shadow-none border-0 bg-transparent mb-1"
                                    data-bs-toggle="collapse" data-bs-target="#brandsFilterCollapse"
                                    aria-expanded="{{ $brand ? 'true' : 'false' }}"
                                    aria-controls="brandsFilterCollapse">
                                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                                        <i class="fa-regular fa-tags me-2 text-success"></i> Brands
                                    </h6>
                                    <i class="fa-solid fa-chevron-down filter-collapse-icon text-muted small"></i>
                                </button>
                                <div class="collapse {{ $brand ? 'show' : '' }}" id="brandsFilterCollapse">
                                    <div class="d-flex flex-column gap-2 pt-2">
                                        <a href="{{ \App\Support\Catalog::listingUrl(\Illuminate\Support\Arr::except($filters, ['brand'])) }}"
                                            class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ !$brand ? 'fw-bold text-success' : 'text-dark' }}">
                                            <span>All Brands</span>
                                        </a>
                                        @foreach ($brands as $b)
                                            <a href="{{ \App\Support\Catalog::listingUrl(array_merge($filters, ['brand' => $b->slug])) }}"
                                                class="d-flex justify-content-between align-items-center text-decoration-none py-1 small {{ $brand?->is($b) ? 'fw-bold text-success' : 'text-dark' }}">
                                                <span>{{ $b->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            @if ($filters)
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
                                Showing <span
                                    class="fw-bold text-dark">{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</span>
                                of <span class="fw-bold text-dark">{{ $products->total() }}</span> products
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <label class="fw-bold text-dark mb-0 me-1" style="font-size: 12px;">Sort By:</label>
                                <form method="GET" action="{{ url()->current() }}" class="m-0" id="sort-form">
                                    @foreach (request()->except(['sort', 'page']) as $k => $v)
                                        <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                                    @endforeach
                                    <select name="sort" class="form-select form-select-sm rounded-12 py-1 ps-3 pe-4"
                                        style="font-size: 12px; cursor: pointer;"
                                        onchange="document.getElementById('sort-form').submit()">
                                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest
                                            Products</option>
                                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name
                                            (A to Z)</option>
                                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                            Name (Z to A)</option>
                                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="row row--15 g-3 nbc-shop-product-grid">
                        @forelse($products as $product)
                            <x-nbc-product-card :product="$product" :animation-order="$loop->iteration" />
                        @empty
                            <div class="col-12 text-center py-5">
                                <div class="card border-0 shadow-sm rounded-16 p-5 bg-white">
                                    <i class="fa-regular fa-box-open display-4 text-muted mb-3"></i>
                                    <h5 class="fw-bold text-dark mb-1">No Products Found</h5>
                                    <p class="text-muted small mb-3">We couldn't find any products matching your selected
                                        filters.</p>
                                    <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-sm btn-gradient mx-auto"
                                        style="max-width: 200px;">
                                        View All Products
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if ($products->hasPages())
                        <div class="d-flex justify-content-center shop-pagination-wrapper mt-5">
                            {{ $products->onEachSide(1)->links('components.shop-pagination') }}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
