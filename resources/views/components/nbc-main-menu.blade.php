@php
    // Only brands / categories / sub-categories with products are shown.
    ['brands' => $menuBrands, 'categories' => $menuCategories] = \App\Support\Catalog::menu();
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
                    <li><a href="{{ $brand->url() }}">{{ $brand->name }}</a></li>
                @endforeach
            </ul>
        </li>
    @endif

    @foreach ($menuCategories as $category)
        @if ($category->subCategories->isNotEmpty())
            <li class="has-dropdown has-menu-child-item">
                <a href="{{ $category->url() }}">
                    <span class="nbc-main-menu__label">{{ $category->name }}</span><i
                        class="fa-regular fa-chevron-down" aria-hidden="true"></i>
                </a>
                <ul class="submenu">
                    @foreach ($category->subCategories as $subCategory)
                        <li>
                            <a href="{{ $subCategory->url() }}">
                                {{ $subCategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <a href="{{ $category->url() }}">{{ $category->name }}</a>
            </li>
        @endif
    @endforeach
    <li>
        <a href="{{ route('shop', ['sort' => 'newest']) }}">New Arrivals</a>
    </li>
</ul>
