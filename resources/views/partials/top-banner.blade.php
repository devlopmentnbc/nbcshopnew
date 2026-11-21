@php
    $topBanner = \App\Support\TopBanner::get();
@endphp
@if ($topBanner['enabled'])
    @php
        $topBannerUrl = \App\Support\TopBanner::linkUrl($topBanner);
        // The theme slider loops, so it needs at least 2 slides.
        $topBannerSlides = max(2, (int) $topBanner['repeat']);
    @endphp
    {{-- Vertical (top-to-bottom) text slider; started by the theme's rbtSwiperActive() in main.min.js. --}}
    <div class="rbt-header-campaign rbt-header-campaign-1 rbt-header-top-news nbc-top-banner w-100"
        style="--nbc-tb-start: {{ $topBanner['color_start'] }}; --nbc-tb-end: {{ $topBanner['color_end'] }}; --nbc-tb-text: {{ $topBanner['text_color'] }};">
        <div class="rbt-corner-portion-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="inner justify-content-center">
                            <div class="rbt-text-swiper-container rbt-arrow-vertical">
                                <div class="swiper-wrapper">
                                    @for ($i = 0; $i < $topBannerSlides; $i++)
                                        <div class="swiper-slide">
                                            <div class="rbt-fancy-item fancy-menu-text fancy-menu-center">
                                                <p class="rbt-fancy-text">
                                                    <span class="nbc-top-banner__text">{{ $topBanner['text'] }}</span>
                                                    <a href="{{ $topBannerUrl }}">{{ $topBanner['button_text'] }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                                <div class="rbt-verticle-arrow rbt-arrow-prev">
                                    <i class="fa-regular fa-chevron-up"></i>
                                </div>
                                <div class="rbt-verticle-arrow rbt-arrow-next">
                                    <i class="fa-regular fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-close position-right">
            <button class="rbt-round-btn btn-white-off bgsection-activation" aria-label="Close banner">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>
@endif
