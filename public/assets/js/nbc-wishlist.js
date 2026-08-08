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
            var tbody = $('.nbc-wishlist-table-body, .rbt-wishlist-table tbody');
            if (!tbody.length) return;

            if (!details || details.length === 0) {
                tbody.html(`
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <p class="mb-0 rbt-text-bold">Your wishlist is empty</p>
                        </td>
                    </tr>
                `);
                return;
            }

            var html = '';
            $.each(details, function(idx, item) {
                html += `
                    <tr>
                        <td class="rbt-product-remove-btn-wrapper">
                            <button class="rbt-product-remove-btn rbt-round-btn nbc-wishlist-remove" data-wishlist-key="${item.key}" type="button">
                                <span><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </td>
                        <td class="product-thumbnail">
                            <a href="${item.url}">
                                <img src="${item.image}" alt="${item.name}">
                            </a>
                        </td>
                        <td class="rbt-wish-product-info">
                            <div class="rbt-wish-product-name h6">
                                <a href="${item.url}">
                                    ${item.name}
                                </a>
                            </div>
                            <div class="rbt-product-price-text rbt-text-color-primary">
                                <span>${item.price}</span>
                            </div>
                            <span class="rbt-product-id"><span class="rbt-text-semi-bold">SKU:</span> ${item.sku}</span>
                        </td>
                        <td>
                            <div class="rbt-button-group">
                                <a class="rbt-btn rbt-btn-sm has-left-icon nbc-add-to-cart" href="${item.url}"
                                    data-product-id="${item.key}"
                                    data-product-name="${item.name}"
                                    data-product-price="${item.price}"
                                    data-product-image="${item.image}"
                                    data-product-url="${item.url}">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                    Add To Cart
                                </a>
                            </div>
                        </td>
                    </tr>
                `;
            });

            tbody.html(html);
        }
    };

    $(document).ready(function() {
        window.NBC_WISHLIST.init();
    });

})(jQuery);
