(function () {
    'use strict';

    // Get CSRF Token from meta tag
    function getCsrfToken() {
        const meta = document.querySelector('meta[name="csrf-token"]');
        return meta ? meta.getAttribute('content') : '';
    }

    // Money Formatter (LKR)
    function formatMoney(amount) {
        return 'LKR ' + Number(amount || 0).toLocaleString('en-LK', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Render Cart items in all minicart sidebars and update counters
    function updateCartUI(cartData) {
        const cart = cartData.cart || [];
        const totalItems = cartData.total_items || 0;
        const subtotalLkr = cartData.formatted_subtotal_lkr || formatMoney(cartData.subtotal_lkr_raw || 0);

        // 1. Update all cart count badges in header
        document.querySelectorAll('.rbt-mini-cart .access-box-count, .access-box-count.rbt-shiny, .cart-count-badge').forEach(function (badge) {
            badge.textContent = totalItems;
        });

        // 2. Render items in minicart list (.rbt-minicart-wrapper)
        const cartLists = document.querySelectorAll('.rbt-cart-side-menu nav.side-nav > ul.rbt-minicart-wrapper, .rbt-cart-side-menu .side-nav > ul.rbt-minicart-wrapper');
        
        let html = '';
        if (cart.length > 0) {
            cart.forEach(function (item) {
                html += `
                <li class="minicart-item" data-cart-key="${item.key}">
                    <div class="thumbnail">
                        <a href="${item.url || '#'}">
                            <img src="${item.image}" alt="${item.name}">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title h6"><a href="${item.url || '#'}">${item.name}</a></h3>
                        <span class="quantity">${item.quantity}x <span class="price">${item.formatted_price_lkr}</span></span>
                        <div class="bottom-part">
                            <div class="rbt-qty-area">
                                <button class="qty-item-btn qty-item-btn-decr nbc-cart-decrease" type="button" aria-label="Decrease quantity"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" class="items-qty-input nbc-cart-quantity" value="${item.quantity}" min="1" data-cart-key="${item.key}">
                                <button class="qty-item-btn qty-item-btn-incr nbc-cart-increase" type="button" aria-label="Increase quantity"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="close-btn">
                        <button class="rbt-round-btn nbc-cart-remove" type="button" data-cart-key="${item.key}" aria-label="Remove item"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </li>`;
            });
        } else {
            html = `
            <li class="minicart-empty text-center py-4" style="list-style: none; padding: 2rem 1rem;">
                <i class="fa-regular fa-bag-shopping" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem; display: block;"></i>
                <p style="font-size: 15px; color: #666; font-weight: 500;">Your cart is currently empty.</p>
                <a href="/shop" class="rbt-btn rbt-btn-sm mt-3" style="font-size: 13px;">Shop Now</a>
            </li>`;
        }

        cartLists.forEach(function (list) {
            list.innerHTML = html;
        });

        // 3. Update subtotals and totals in minicart side menu
        document.querySelectorAll('.rbt-cart-side-menu').forEach(function (drawer) {
            const subtotalEls = drawer.querySelectorAll('.rbt-cart-subttotal .price');
            if (subtotalEls.length > 0) {
                subtotalEls.forEach(function(el) {
                    el.textContent = subtotalLkr;
                });
            }
        });
    }

    // Fetch Cart from server session (persisted 7 days)
    function fetchCart() {
        fetch('/cart/items', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                updateCartUI(data);
            }
        })
        .catch(err => console.error('Cart load error:', err));
    }

    // Add to Cart via AJAX
    function addToCart(productId, quantity = 1, attributes = {}, openDrawer = true) {
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken(),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity,
                attributes: attributes
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                if (data.cart_data) {
                    updateCartUI(data.cart_data);
                } else {
                    fetchCart();
                }

                // Open side cart drawer if requested
                if (openDrawer) {
                    openMinicartDrawer();
                }
            } else {
                alert(data.message || 'Error adding to cart');
            }
        })
        .catch(err => console.error('Add to cart error:', err));
    }

    // Update Cart Quantity via AJAX
    function updateCartItem(cartKey, quantity) {
        fetch('/cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken(),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                cart_key: cartKey,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                if (data.cart_data) updateCartUI(data.cart_data);
                else fetchCart();
            }
        })
        .catch(err => console.error('Update cart error:', err));
    }

    // Remove Cart Item via AJAX
    function removeCartItem(cartKey) {
        fetch('/cart/remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken(),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                cart_key: cartKey
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                if (data.cart_data) updateCartUI(data.cart_data);
                else fetchCart();
            }
        })
        .catch(err => console.error('Remove cart error:', err));
    }

    // Open minicart sidebar helper
    function openMinicartDrawer() {
        const sideMenu = document.querySelector('.rbt-cart-side-menu');
        if (sideMenu) {
            sideMenu.classList.add('side-menu-active');
            document.body.classList.add('cart-sidenav-menu-active');
        }
    }

    // Global Event Listener
    document.addEventListener('click', function (e) {
        // Add to cart button trigger
        const addBtn = e.target.closest('.nbc-add-to-cart, .btn-add-to-cart, [data-product-id]');
        if (addBtn && (addBtn.classList.contains('btn-add-to-cart') || addBtn.classList.contains('nbc-add-to-cart') || addBtn.closest('.product-btn-grp') || addBtn.closest('.minicart-btn-grp') || addBtn.hasAttribute('data-product-id'))) {
            e.preventDefault();
            const productId = addBtn.dataset.productId || addBtn.getAttribute('data-product-id');
            if (!productId) return;

            // Get quantity from the qty input next to the clicked button, if any
            let qty = 1;
            const qtyScope = addBtn.closest('.product-btn-grp');
            const qtyInput = qtyScope ? qtyScope.querySelector('.items-qty-input') : null;
            if (qtyInput && qtyInput.value) {
                qty = parseInt(qtyInput.value, 10) || 1;
            }

            addToCart(productId, qty, {}, true);
            return;
        }

        // Cart item quantity increase
        const incrBtn = e.target.closest('.nbc-cart-increase');
        if (incrBtn) {
            e.preventDefault();
            const item = incrBtn.closest('[data-cart-key]');
            if (item) {
                const key = item.dataset.cartKey;
                const input = item.querySelector('.nbc-cart-quantity');
                const newQty = (parseInt(input.value, 10) || 1) + 1;
                updateCartItem(key, newQty);
            }
            return;
        }

        // Cart item quantity decrease
        const decrBtn = e.target.closest('.nbc-cart-decrease');
        if (decrBtn) {
            e.preventDefault();
            const item = decrBtn.closest('[data-cart-key]');
            if (item) {
                const key = item.dataset.cartKey;
                const input = item.querySelector('.nbc-cart-quantity');
                const current = parseInt(input.value, 10) || 1;
                if (current > 1) {
                    updateCartItem(key, current - 1);
                }
            }
            return;
        }

        // Cart item remove button
        const removeBtn = e.target.closest('.nbc-cart-remove');
        if (removeBtn) {
            e.preventDefault();
            const key = removeBtn.dataset.cartKey || (removeBtn.closest('[data-cart-key]') ? removeBtn.closest('[data-cart-key]').dataset.cartKey : null);
            if (key) {
                removeCartItem(key);
            }
            return;
        }
    });

    // Quantity change event
    document.addEventListener('change', function (e) {
        if (e.target.matches('.nbc-cart-quantity')) {
            const key = e.target.dataset.cartKey || (e.target.closest('[data-cart-key]') ? e.target.closest('[data-cart-key]').dataset.cartKey : null);
            const val = parseInt(e.target.value, 10) || 1;
            if (key && val >= 1) {
                updateCartItem(key, val);
            }
        }
    });

    // Load Cart on Page DOM ready
    document.addEventListener('DOMContentLoaded', function () {
        fetchCart();
    });
})();
