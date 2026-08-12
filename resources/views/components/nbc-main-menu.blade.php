@php
    $mainMenuData = once(function () {
        $brands = \App\Models\Brand::query()
            ->where('status', true)
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        $categories = \App\Models\Category::query()
            ->where('status', true)
            ->with([
                'subCategories' => fn ($query) => $query
                    ->where('status', true)
                    ->orderBy('name')
                    ->select(['id', 'category_id', 'name', 'slug']),
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'name', 'slug']);

        return compact('brands', 'categories');
    });

    $menuBrands = $mainMenuData['brands'];
    $menuCategories = $mainMenuData['categories'];
@endphp

<ul class="mainmenu has-nav-bg-shape-hover nbc-mainmenu">
    @if ($menuBrands->isNotEmpty())
        <li class="has-dropdown has-menu-child-item">
            <a href="{{ route('shop') }}">
                <span class="nbc-main-menu__label">Brand</span><i class="fa-regular fa-chevron-down"
                    aria-hidden="true"></i>
            </a>
            <ul class="submenu">
                @foreach ($menuBrands as $brand)
                    <li><a href="{{ route('shop', ['brand' => $brand->slug]) }}">{{ $brand->name }}</a></li>
                @endforeach
            </ul>
        </li>
    @endif

    @foreach ($menuCategories as $category)
        @if ($category->subCategories->isNotEmpty())
            <li class="has-dropdown has-menu-child-item">
                <a href="{{ route('shop', ['category' => $category->slug]) }}">
                    <span class="nbc-main-menu__label">{{ $category->name }}</span><i
                        class="fa-regular fa-chevron-down" aria-hidden="true"></i>
                </a>
                <ul class="submenu">
                    @foreach ($category->subCategories as $subCategory)
                        <li>
                            <a href="{{ route('shop', ['sub_category' => $subCategory->slug]) }}">
                                {{ $subCategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <a href="{{ route('shop', ['category' => $category->slug]) }}">{{ $category->name }}</a>
            </li>
        @endif
    @endforeach
    <li>
        <a href="{{ route('shop', ['sort' => 'newest']) }}">New Arrivals</a>
    </li>
</ul>
