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

            // When wishlist modal opens
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
                                btn.closest('.rbt-card').find('.rbt-card-title a').text().trim() ||
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

                        // Refresh modal and badge counts
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
                        // Unhighlight product card buttons matching this key
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

                        // Reload wishlist details
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
                        $('.rbt-wishlist .access-box-count').text(res.count);
                        $('.nbc-wishlist-modal-count').text(res.count);

                        // Highlight active cards
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
                        $('.rbt-wishlist .access-box-count').text('0');
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
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <div class="py-3">
                                <i class="fa-regular fa-heart display-6 text-muted mb-3 d-block"></i>
                                <h6 class="text-dark font-weight-bold mb-1">Your Wishlist is Empty</h6>
                                <p class="text-muted small mb-0">Explore products and click the heart icon to save your favourites here!</p>
                            </div>
                        </td>
                    </tr>
                `);
                return;
            }

            var html = '';
            $.each(details, function(idx, item) {
                html += `
                    <tr data-wishlist-key="${item.key}">
                        <td class="rbt-product-remove-btn-wrapper">
                            <button class="rbt-product-remove-btn rbt-round-btn nbc-wishlist-remove" data-wishlist-key="${item.key}" title="Remove from wishlist">
                                <span><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </td>
                        <td class="product-thumbnail">
                            <a href="${item.url}">
                                <img src="${item.image}" alt="${item.name}" style="width: 54px; height: 54px; object-fit: contain; border-radius: 8px;">
                            </a>
                        </td>
                        <td class="rbt-wish-product-info">
                            <div class="rbt-wish-product-name h6 mb-1">
                                <a href="${item.url}" class="text-dark font-weight-bold">${item.name}</a>
                            </div>
                            <div class="rbt-product-price-text rbt-text-color-primary font-weight-bold">
                                <span>${item.price}</span>
                            </div>
                        </td>
                        <td>
                            <div class="rbt-button-group">
                                <a class="rbt-btn rbt-btn-sm has-left-icon nbc-add-to-cart" href="#" 
                                   data-product-id="${item.key}" 
                                   data-product-name="${item.name}"
                                   data-product-price="${item.price}"
                                   data-product-image="${item.image}"
                                   data-product-url="${item.url}">
                                    <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                                </a>
                            </div>
                        </td>
                    </tr>
                `;
            });

            container.html(html);
        }
    };

    $(document).ready(function() {
        window.NBC_WISHLIST.init();
    });

})(jQuery);
