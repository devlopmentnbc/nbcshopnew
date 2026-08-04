<div class="popup-mobile-menu nbc-shared-mobile-menu">
    <div class="inner-wrapper">
        <div class="mobile-menu-top">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/logo-nbc2.webp') }}"
                                alt="Nature's Beauty Creations">
                        </a>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn" type="button" aria-label="Close menu">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="rbt-tab rbt-round-shape-tab">
                <div class="tab-content">
                    <div class="tab-pane fade show active" role="tabpanel">
                        <nav class="rbt-mainmenu-nav" aria-label="Mobile shop navigation">
                            <x-nbc-main-menu />
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
