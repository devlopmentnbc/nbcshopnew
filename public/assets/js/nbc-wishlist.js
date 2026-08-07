(function($) {
    'use strict';

    window.NBC_WISHLIST = {
        init: function() {
            this.bindEvents();
            if (window.IS_AUTHENTICATED) {
                this.loadUserWishlist();
            }
        },

        bindEvents: function() {
            var self = this;

            // When wishlist modal opens — reload items each time
            $(document).on('show.bs.modal', '#wishlistModal', function() {
                if (!window.IS_AUTHENTICATED) {
                    var signinModal = document.getElementById('signinModal');
                    if (signinModal && window.bootstrap) {
                        bootstrap.Modal.getOrCreateInstance(signinModal).show();
                    }
                    return false;
                }
                self.loadUserWishlist();
            });

            // Toggle wishlist button click (product card heart buttons)
            $(document).on('click', '.rbt-wishlisted-btn, .nbc-wishlist-toggle', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var btn = $(this);

                if (!window.IS_AUTHENTICATED) {
                    var signinModal = document.getElementById('signinModal');
                    if (signinModal && window.bootstrap) {
                        bootstrap.Modal.getOrCreateInstance(signinModal).show();
                    }
                    return;
                }

                var productId = btn.attr('data-product-id') ||
                    btn.closest('.rbt-card').find('.nbc-add-to-cart').attr('data-product-id') ||
                    btn.closest('.rbt-card').find('.rbt-cart-sidenav-activation').attr('data-product-id') ||
                    btn.attr('data-product-name');

                if (!productId) return;

                $.ajax({
                    url: '/wishlist/toggle',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product_key: productId
                    },
                    success: function(res) {
                        if (res.added) {
                            btn.addClass('added-wishlist active');
                            btn.find('i').removeClass('fa-regular').addClass('fa-solid text-danger');
                        } else {
                            btn.removeClass('added-wishlist active');
                            btn.find('i').removeClass('fa-solid text-danger').addClass('fa-regular');
                        }
                        // Update badge counts without reloading the full modal
                        $('.rbt-wishlist .access-box-count, .nbc-wishlist-count').text(res.count);
                        self.loadUserWishlist();
                    },
                    error: function(xhr) {
                        if (xhr.status === 401) {
                            var signinModal = document.getElementById('signinModal');
                            if (signinModal && window.bootstrap) {
                                bootstrap.Modal.getOrCreateInstance(signinModal).show();
                            }
                        }
                    }
                });
            });

            // Remove item directly inside Wishlist Modal
            $(document).on('click', '.nbc-wishlist-remove', function(e) {
                e.preventDefault();
                var key = $(this).attr('data-wishlist-key');
                if (!key) return;

                $.ajax({
                    url: '/wishlist/toggle',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product_key: key
                    },
                    success: function(res) {
                        // Unhighlight matching product card heart buttons
                        $('.rbt-card').each(function() {
                            var card = $(this);
                            var btn = card.find('.rbt-wishlisted-btn, .nbc-wishlist-toggle');
                            var pId = btn.attr('data-product-id') ||
                                card.find('.nbc-add-to-cart').attr('data-product-id') ||
                                card.find('.rbt-cart-sidenav-activation').attr('data-product-id') ||
                                card.find('.rbt-card-title a').text().trim();

                            if (pId && pId.toString() === key.toString()) {
                                btn.removeClass('added-wishlist active');
                                btn.find('i').removeClass('fa-solid text-danger').addClass('fa-regular');
                            }
                        });

                        self.loadUserWishlist();
                    }
                });
            });
        },

        loadUserWishlist: function() {
            var self = this;
            $.ajax({
                url: '/wishlist/items',
                method: 'GET',
                success: function(res) {
                    if (res.authenticated) {
                        // Update all wishlist count badges
                        $('.rbt-wishlist .access-box-count, .nbc-wishlist-count').text(res.count);
                        $('.nbc-wishlist-modal-count').text(res.count);

                        // Highlight active product card heart buttons
                        if (res.items && res.items.length > 0) {
                            $('.rbt-card').each(function() {
                                var card = $(this);
                                var btn = card.find('.rbt-wishlisted-btn, .nbc-wishlist-toggle');
                                var pId = btn.attr('data-product-id') ||
                                    card.find('.nbc-add-to-cart').attr('data-product-id') ||
                                    card.find('.rbt-cart-sidenav-activation').attr('data-product-id') ||
                                    card.find('.rbt-card-title a').text().trim();

                                if (pId && res.items.indexOf(pId.toString()) !== -1) {
                                    btn.addClass('added-wishlist active');
                                    btn.find('i').removeClass('fa-regular').addClass('fa-solid text-danger');
                                }
                            });
                        }

                        self.renderModalItems(res.details || []);
                    } else {
                        $('.rbt-wishlist .access-box-count, .nbc-wishlist-count').text('0');
                        $('.nbc-wishlist-modal-count').text('0');
                        self.renderModalItems([]);
                    }
                }
            });
        },

        renderModalItems: function(details) {
            var container = $('.nbc-wishlist-modal-items');
            if (!container.length) return;

            if (!details || details.length === 0) {
                container.html(`
                    <div class="text-center py-5">
                        <div style="width:72px;height:72px;background:#fef2f2;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <i class="fa-regular fa-heart" style="font-size:28px;color:#e53935;"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Your Wishlist is Empty</h6>
                        <p class="text-muted small mb-0">Browse products and click the <i class="fa-regular fa-heart text-danger"></i> icon to save your favourites here!</p>
                    </div>
                `);
                return;
            }

            var html = '';
            $.each(details, function(idx, item) {
                html += `
                    <div class="nbc-wishlist-item d-flex align-items-center gap-3 py-3 ${idx > 0 ? 'border-top' : ''}"
                         data-wishlist-key="${item.key}">

                        <!-- Product Image -->
                        <a href="${item.url}" style="flex-shrink:0;">
                            <img src="${item.image}" alt="${item.name}"
                                 style="width:64px;height:64px;object-fit:contain;border-radius:12px;border:1px solid #e5e7eb;background:#f9f9f9;padding:4px;">
                        </a>

                        <!-- Product Info -->
                        <div class="flex-grow-1 min-width-0">
                            <a href="${item.url}" class="text-dark fw-semibold text-decoration-none d-block"
                               style="font-size:14px;line-height:1.3;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:280px;"
                               title="${item.name}">${item.name}</a>
                            <div class="fw-bold mt-1" style="color:#2e7d32;font-size:15px;">${item.price}</div>
                            <div class="text-muted" style="font-size:11px;">${item.sku}</div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex flex-column gap-2" style="flex-shrink:0;">
                            <a href="${item.url}"
                               class="btn btn-sm btn-success rounded-pill nbc-add-to-cart"
                               data-product-id="${item.key}"
                               data-product-name="${item.name}"
                               data-product-price="${item.price}"
                               data-product-image="${item.image}"
                               data-product-url="${item.url}"
                               style="font-size:12px;font-weight:600;white-space:nowrap;background:linear-gradient(135deg,#2e7d32,#66bb6a);border:none;padding:5px 14px;">
                                <i class="fa-regular fa-cart-shopping me-1"></i>Add to Cart
                            </a>
                            <button class="btn btn-sm btn-outline-danger rounded-pill nbc-wishlist-remove"
                                    data-wishlist-key="${item.key}"
                                    style="font-size:12px;font-weight:600;padding:4px 14px;">
                                <i class="fa-solid fa-xmark me-1"></i>Remove
                            </button>
                        </div>
                    </div>
                `;
            });

            container.html(html);
        }
    };

    $(document).ready(function() {
        window.NBC_WISHLIST.init();
    });

})(jQuery);
