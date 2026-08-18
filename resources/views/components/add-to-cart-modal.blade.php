<!-- Add to Cart picker modal: used by listing-page (home/shop) "Add to Cart" buttons
     to let the customer choose a variant and quantity before adding to cart. -->
<style>
    #nbcAddToCartModal .nbc-atc-variant-pill {
        border: 1px solid #e2e8f0;
        background-color: #f8fafc;
        border-radius: 8px;
        font-size: 14px;
        color: #1e293b;
        font-weight: 500;
        cursor: pointer;
    }
    #nbcAddToCartModal .nbc-atc-variant-pill.is-active {
        border-color: var(--color-primary, #dc2626);
        background-color: rgba(220, 38, 38, 0.06);
        color: var(--color-primary, #dc2626);
    }
    #nbcAddToCartModal .nbc-atc-variant-pill:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }
</style>
<div class="modal fade" id="nbcAddToCartModal" tabindex="-1" aria-hidden="true" aria-labelledby="nbcAddToCartModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
            <div class="modal-header" style="border-bottom: 1px solid #eee;">
                <h5 class="modal-title" id="nbcAddToCartModalLabel">Add to Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px;">
                <div style="display: flex; gap: 16px; align-items: flex-start;">
                    <img id="nbcAtcImage" src="" alt=""
                        style="width: 96px; height: 96px; object-fit: cover; border-radius: 12px; border: 1px solid #eee; flex-shrink: 0;">
                    <div style="flex: 1; min-width: 0;">
                        <h3 id="nbcAtcName" style="font-size: 16px; font-weight: 600; margin: 0 0 8px; color: #0c302c;"></h3>
                        <div class="pricing-part" style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                            <del id="nbcAtcRegular" class="price-text" style="display: none; color: #888; font-size: 14px;"></del>
                            <span id="nbcAtcSale" class="price-text" style="font-weight: 700; color: #0c302c; font-size: 18px;"></span>
                            <span id="nbcAtcBadge" class="rbt-offer-badge" style="display: none;"></span>
                        </div>
                    </div>
                </div>

                <div id="nbcAtcVariants" class="mt--20"></div>

                <div style="margin-top: 20px; display: flex; align-items: center; justify-content: space-between; gap: 12px;">
                    <label style="font-size: 14px; font-weight: 600; color: #0c302c;">Quantity</label>
                    <div class="rbt-qty-area">
                        <button type="button" id="nbcAtcQtyDecr" class="qty-item-btn qty-item-btn-decr" aria-label="Decrease quantity"><i class="fa-solid fa-minus"></i></button>
                        <input type="number" id="nbcAtcQty" class="items-qty-input" value="1" min="1">
                        <button type="button" id="nbcAtcQtyIncr" class="qty-item-btn qty-item-btn-incr" aria-label="Increase quantity"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>

                <p id="nbcAtcStockNote" style="margin-top: 12px; font-size: 13px; color: #b45309; display: none;"></p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #eee;">
                <button type="button" class="rbt-btn w-100 text-center" id="nbcAtcConfirm">
                    <i class="fa-regular fa-cart-shopping mr--8"></i> <span id="nbcAtcConfirmLabel">Add To Cart</span>
                </button>
            </div>
        </div>
    </div>
</div>
