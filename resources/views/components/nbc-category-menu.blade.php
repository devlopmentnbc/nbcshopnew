@php
    $categoryGroups = [
        'Brand' => [
            'champion' => 'Champion',
            'chandi-panda' => 'Chandi Panda',
            'misumi' => 'Misumi',
            'mydoc' => 'MyDoc',
            'nature-s-secrets' => "Nature's Secrets",
            'panda-baby' => 'Panda Baby',
            'sucses' => 'SUCSES',
            'selfie' => 'Selfie',
            'elithe' => 'elithé',
        ],
        'Skin Care' => [
            'all-skin' => 'All Skin',
            'anti-acne-anti-blemish' => 'Anti - Acne/Anti - Blemish',
            'eye-care' => 'Eye Care',
            'facial-cleansers-toners' => 'Facial Cleansers & Toners',
            'facial-creams-gels' => 'Facial Creams & Gels',
            'facials-scrubs' => 'Facial Scrubs',
            'normal-dry-skin' => 'Normal & Dry Skin',
            'oily-combination-skin' => 'Oily & Combination Skin',
            'serum' => 'Serum',
            'shaving' => 'Shaving',
            'skin-brightening-lightening' => 'Skin Brightening',
            'skin-soothing-aloe-vera-gel' => 'Skin Soothing Aloe Vera Gel',
            'sulfate-free-facial-wash' => 'Sulfate-free Facial Wash',
        ],
        'Bath & Body' => [
            'body-butter' => 'Body Butters',
            'body-cleansers' => 'Body Cleansers',
            'body-lotions-creams' => 'Body Lotions & Creams',
            'body-oils' => 'Body Oils',
            'body-scrub' => 'Body Scrub',
            'essential-oil' => 'Essential Oil',
            'hand-foot-care' => 'Hand & Foot Care',
            'soap' => 'Soap',
            'sun-protection-1' => 'Sun Protection',
        ],
        'Hair Care' => [
            'conditioner' => 'Conditioner',
            'hair-gels' => 'Hair Gels',
            'hair-oils-tonics' => 'Hair oils & tonics',
            'shampoo' => 'Shampoo',
        ],
        'Baby Care' => [
            'gift' => 'Baby Gifts',
            'baby-oil' => 'Baby Oil',
            'colognes' => 'Colognes',
            'cotton-buds' => 'Cotton Buds',
            'creams-talc' => 'Creams & Lotions',
            'nappy-wash' => 'Nappy Wash',
            'cleansers' => 'Soaps & Cleansers',
            'talc' => 'Talc',
        ],
        'Fragrance' => [
            'for-her' => 'For Her',
            'for-him' => 'For Him',
        ],
        'Bundles' => [
            'care-bundles' => 'Care Bundles',
            'gifts' => 'Gifts',
            'sanitizers' => 'Sanitizers',
        ],
    ];
@endphp

<div class="inner nbc-category-menu__inner">
    <ul class="rbt-dropdown-parent-wrapper">
        @foreach ($categoryGroups as $groupName => $items)
            @php($firstSlug = array_key_first($items))
            <li class="dropdown-parent-list">
                <a href="https://www.nbc.lk/shop/category/{{ $firstSlug }}">
                    <span><i class="fa-regular fa-leaf"></i></span>{{ $groupName }}
                    <span class="rbt-chevron-right"><i class="fa-regular fa-chevron-right"></i></span>
                </a>
                <div class="rbt-dropdown-child-wrapper nbc-category-menu__panel">
                    <div class="rbt-child-inner">
                        <div class="rbt-megamenu">
                            <div class="rbt-megamenu-wrapper">
                                <p class="rbt-short-title h5">{{ $groupName }}</p>
                                <ul class="mega-menu-item nbc-category-menu__links">
                                    @foreach ($items as $slug => $label)
                                        <li>
                                            <a href="https://www.nbc.lk/shop/category/{{ $slug }}">{{ $label }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach

        <li class="dropdown-parent-list">
            <a href="https://www.nbc.lk/shop?sort=newest">
                <span><i class="fa-regular fa-sparkles"></i></span>New Arrivals
            </a>
        </li>
    </ul>
</div>
