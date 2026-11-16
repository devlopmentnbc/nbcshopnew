@php
    // Built from the catalog (previously a hard-coded list pointing at nbc.lk and
    // at categories that do not exist here). Empty entries are hidden.
    ['brands' => $menuBrands, 'categories' => $menuCategories] = \App\Support\Catalog::menu();
@endphp

<div class="inner nbc-category-menu__inner">
    <ul class="rbt-dropdown-parent-wrapper">
        @if ($menuBrands->isNotEmpty())
            <li class="dropdown-parent-list">
                <a href="{{ route('shop') }}">
                    <span><i class="fa-regular fa-leaf"></i></span>Brand
                    <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                </a>
                <div class="rbt-dropdown-child-wrapper nbc-category-menu__panel">
                    <div class="rbt-child-inner">
                        <div class="rbt-megamenu">
                            <div class="rbt-megamenu-wrapper">
                                <p class="rbt-short-title h5">Brand</p>
                                <ul class="mega-menu-item nbc-category-menu__links">
                                    @foreach ($menuBrands as $brand)
                                        <li><a href="{{ $brand->url() }}">{{ $brand->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endif

        @foreach ($menuCategories as $category)
            <li class="dropdown-parent-list">
                <a href="{{ $category->url() }}">
                    <span><i class="fa-regular fa-leaf"></i></span>{{ $category->name }}
                    @if ($category->subCategories->isNotEmpty())
                        <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                    @endif
                </a>
                @if ($category->subCategories->isNotEmpty())
                    <div class="rbt-dropdown-child-wrapper nbc-category-menu__panel">
                        <div class="rbt-child-inner">
                            <div class="rbt-megamenu">
                                <div class="rbt-megamenu-wrapper">
                                    <p class="rbt-short-title h5">{{ $category->name }}</p>
                                    <ul class="mega-menu-item nbc-category-menu__links">
                                        @foreach ($category->subCategories as $subCategory)
                                            <li><a href="{{ $subCategory->url() }}">{{ $subCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </li>
        @endforeach

        <li class="dropdown-parent-list">
            <a href="{{ route('shop', ['sort' => 'newest']) }}">
                <span><i class="fa-regular fa-sparkles"></i></span>New Arrivals
            </a>
        </li>
    </ul>
</div>
