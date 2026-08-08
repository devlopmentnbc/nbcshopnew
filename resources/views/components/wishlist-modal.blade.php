<!-- Start Wishlist Modal Area  -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="wishlistModal" tabindex="-1"
    role="dialog" aria-modal="true" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog sm-size modal-dialog-centered">
        <div class="modal-content">
            <div class="rbt-folder-shape-right-portion">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="90" viewbox="0 0 85 90"
                    fill="none">
                    <path
                        d="M0 0H11.1844C14.5695 0 17.7971 1.42971 20.0716 3.93671L82.1927 72.4059C83.9992 74.397 84.9999 76.9893 84.9999 79.6778C84.9999 85.6547 85.0001 90 85.0001 90H0V0Z"
                        fill="white"></path>
                </svg>
            </div>
            <div class="modal-header">
                <button type="button" class="rbt-round-btn rbt-modal-dis-btn" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="rbt-top-folder-shape-wrapper">
                <div class="rbt-bg-color-white rbt-content-trs-portion">
                    <div class="rbt-wishlist-modal-content">
                        <div class="rbt-title rbt-text-bold h5" id="wishlistModalLabel">Product Wishlist</div>
                        <div class="rbt-transparent-table-one-wrapper rbt-has-bg-gray pt--0 pb--0 mb--16">
                            <table class="rbt-transparent-table-one mb--0 rbt-wishlist-table">
                                <tbody class="nbc-wishlist-table-body">
                                    <!-- Single wishlist product rows rendered by JS -->
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="rbt-wishlist-modal-footer d-flex flex-wrap rbt-gap--16 justify-content-between align-items-center">
                            <a href="{{ route('shop') }}" class="rbt-link"><span class="icon mr--4"><i
                                        class="fa-sharp fa-regular fa-heart"></i></span>Explore Products</a>
                            <a href="{{ route('shop') }}" class="rbt-link">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wishlist Modal Area  -->
