<!-- Start Wishlist Modal Area  -->
<div class="rbt-default-modal modal fade has-rbt-top-folder-shape" id="wishlistModal" tabindex="-1"
    role="dialog" aria-modal="true" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
        <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.18);">

            <!-- Header -->
            <div class="modal-header border-0 px-4 pt-4 pb-0 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <span style="width:38px;height:38px;background:linear-gradient(135deg,#e53935,#ff7043);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-heart text-white" style="font-size:16px;"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold text-dark" id="wishlistModalLabel" style="font-size:18px;">My Wishlist</h5>
                        <p class="mb-0 text-muted" style="font-size:12px;">
                            <span class="nbc-wishlist-modal-count">0</span> saved item(s)
                        </p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-0" style="max-height: 60vh; overflow-y: auto;">
                <div class="nbc-wishlist-modal-body px-4 py-3">
                    <!-- Items rendered by JS -->
                    <div class="nbc-wishlist-modal-items">
                        <div class="text-center py-5">
                            <div class="spinner-border spinner-border-sm text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="text-muted small mt-2 mb-0">Loading your wishlist…</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0 px-4 pb-4 pt-2 gap-2">
                <a href="{{ route('shop') }}" class="btn btn-outline-success rounded-pill px-4" style="font-size:13px;font-weight:600;">
                    <i class="fa-regular fa-bag-shopping me-1"></i> Continue Shopping
                </a>
                <button type="button" class="btn btn-success rounded-pill px-4" style="font-size:13px;font-weight:600;background:linear-gradient(135deg,#2e7d32,#66bb6a);border:none;" data-bs-dismiss="modal">
                    Done
                </button>
            </div>

        </div>
    </div>
</div>
<!-- End Wishlist Modal Area  -->
