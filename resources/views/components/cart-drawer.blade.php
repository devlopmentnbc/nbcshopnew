<!-- Common Global Cart Side Menu Drawer -->
<div class="rbt-cart-side-menu rbt-sidebar-cart">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="rbt-cart-header">
                <div class="title-section">
                    <h2 class="title mb--0 h6">
                        <i class="fa-sharp fa-regular fa-cart-shopping mr--12"></i> Your Cart
                    </h2>
                </div>
                <div class="rbt-btn-close" id="btn_sideNavClose">
                    <button class="minicart-close-button rbt-round-btn" aria-label="Close cart drawer">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <nav class="side-nav w-100">
                <ul class="rbt-minicart-wrapper">
                    <!-- Dynamic cart items will be rendered here by nbc-cart.js -->
                </ul>
            </nav>
        </div>

        <div class="rbt-minicart-footer">
            <hr class="mb--0 mt--16">
            <div class="rbt-cart-subttotal d-flex justify-content-between py-2">
                <p class="mb-0">Subtotal </p>
                <p class="price cart-subtotal-price mb-0">LKR 0.00</p>
            </div>
            <div class="rbt-cart-subttotal d-flex justify-content-between py-2">
                <p class="mb-0 text-muted">Shipping</p>
                <p class="price cart-shipping-price mb-0 text-muted">Calculated at checkout</p>
            </div>
            <hr class="my-2">
            <div class="rbt-cart-subttotal d-flex justify-content-between py-2">
                <p class="subtotal mb-0"><strong>Total</strong></p>
                <p class="price cart-final-total mb-0" style="font-weight: 700; color: #111;">LKR 0.00</p>
            </div>
            <div class="rbt-minicart-bottom mt--24">
                <div class="checkout-btn mt--20">
                    <a class="rbt-btn w-100 text-center" href="{{ route('checkout') }}">
                        <span class="btn-text">Checkout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
