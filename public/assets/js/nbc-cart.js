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
        const currency = cartData.currency || 'LKR';
        const formattedSubtotal = cartData.formatted_subtotal || cartData.formatted_subtotal_lkr || 'LKR 0.00';
        const formattedShipping = cartData.formatted_shipping || (currency === 'USD' ? '$0.00' : 'LKR 450.00');
        const formattedFinalTotal = cartData.formatted_final_total || formattedSubtotal;

        // 1. Update all cart count badges in header
        document.querySelectorAll('.rbt-mini-cart .access-box-count, .access-box-count.rbt-shiny, .cart-count-badge').forEach(function (badge) {
            badge.textContent = totalItems;
        });

        // 2. Render items in minicart list (.rbt-minicart-wrapper)
        const cartLists = document.querySelectorAll('.rbt-cart-side-menu nav.side-nav > ul.rbt-minicart-wrapper, .rbt-cart-side-menu .side-nav > ul.rbt-minicart-wrapper');
        
        let html = '';
        if (cart.length > 0) {
            cart.forEach(function (item) {
                const itemPriceFormatted = currency === 'USD' 
                    ? ('$' + Number(item.price_usd || 0).toFixed(2))
                    : ('LKR ' + Number(item.price_lkr || 0).toLocaleString('en-LK', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

                html += `
                <li class="minicart-item" data-cart-key="${item.key}">
                    <div class="thumbnail">
                        <a href="${item.url || '#'}">
                            <img src="${item.image}" alt="${item.name}">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title h6"><a href="${item.url || '#'}">${item.name}</a></h3>
                        <span class="quantity">${item.quantity}x <span class="price">${itemPriceFormatted}</span></span>
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

        // 3. Update subtotals and totals in minicart side menu specifically
        document.querySelectorAll('.rbt-cart-side-menu').forEach(function (drawer) {
            const countEl = drawer.querySelector('.cart-total-count');
            if (countEl) countEl.textContent = totalItems;

            const subtotalEl = drawer.querySelector('.cart-subtotal-price');
            if (subtotalEl) subtotalEl.textContent = formattedSubtotal;

            const shippingEl = drawer.querySelector('.cart-shipping-price');
            if (shippingEl) shippingEl.textContent = formattedShipping;

            const finalTotalEl = drawer.querySelector('.cart-final-total');
            if (finalTotalEl) finalTotalEl.textContent = formattedFinalTotal;
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
    function addToCart(productId, quantity = 1, attributes = {}, openDrawer = true, attributeValueId = null) {
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
                attributes: attributes,
                attribute_value_id: attributeValueId
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

    // ---- Add to Cart picker modal (listing pages: home/shop cards) ----
    const atcModalEl = document.getElementById('nbcAddToCartModal');
    let atcModalInstance = null;
    let atcCurrentProductId = null;
    let atcSelectedAttributeValueId = null;

    function getAtcModalInstance() {
        if (!atcModalEl || typeof window.bootstrap === 'undefined') return null;
        if (!atcModalInstance) {
            atcModalInstance = new window.bootstrap.Modal(atcModalEl);
        }
        return atcModalInstance;
    }

    function applyAtcPricing(pricing) {
        const regularEl = document.getElementById('nbcAtcRegular');
        const saleEl = document.getElementById('nbcAtcSale');
        const badgeEl = document.getElementById('nbcAtcBadge');
        if (!regularEl || !saleEl || !badgeEl) return;

        if (pricing && pricing.has_sale) {
            regularEl.textContent = pricing.regular_formatted || '';
            regularEl.style.display = '';
            badgeEl.textContent = '-' + pricing.discount_percent + '%';
            badgeEl.style.display = '';
        } else {
            regularEl.style.display = 'none';
            badgeEl.style.display = 'none';
        }
        saleEl.textContent = (pricing && pricing.price_formatted) || '';
    }

    function selectAtcVariant(variant) {
        atcSelectedAttributeValueId = variant.id;

        atcModalEl.querySelectorAll('.nbc-atc-variant-pill').forEach(function (pill) {
            pill.classList.toggle('is-active', String(pill.dataset.attributeValueId) === String(variant.id));
        });

        applyAtcPricing({
            has_sale: variant.has_sale,
            regular_formatted: variant.regular_formatted,
            discount_percent: variant.discount_percent,
            price_formatted: variant.price_formatted,
        });

        const stockNote = document.getElementById('nbcAtcStockNote');
        const confirmBtn = document.getElementById('nbcAtcConfirm');
        if (stockNote && confirmBtn) {
            if (variant.stock <= 0) {
                stockNote.textContent = 'This variant is currently out of stock.';
                stockNote.style.display = '';
                confirmBtn.disabled = true;
            } else {
                stockNote.style.display = 'none';
                confirmBtn.disabled = false;
            }
        }
    }

    function renderAtcVariants(data) {
        const container = document.getElementById('nbcAtcVariants');
        if (!container) return;
        container.innerHTML = '';

        if (!data.variants || data.variants.length === 0) return;

        const groups = {};
        const groupOrder = [];
        data.variants.forEach(function (variant) {
            if (!groups[variant.attribute_name]) {
                groups[variant.attribute_name] = [];
                groupOrder.push(variant.attribute_name);
            }
            groups[variant.attribute_name].push(variant);
        });

        groupOrder.forEach(function (attrName) {
            const groupWrap = document.createElement('div');
            groupWrap.style.marginBottom = '16px';

            const label = document.createElement('label');
            label.style.cssText = 'display:block;font-weight:600;color:#222;margin-bottom:8px;font-size:14px;';
            label.textContent = attrName + ':';
            groupWrap.appendChild(label);

            const pillRow = document.createElement('div');
            pillRow.style.cssText = 'display:flex;flex-wrap:wrap;gap:8px;';

            groups[attrName].forEach(function (variant) {
                const pill = document.createElement('button');
                pill.type = 'button';
                pill.className = 'nbc-atc-variant-pill px-3 py-2 border rounded d-inline-flex align-items-center';
                pill.dataset.attributeValueId = variant.id;
                pill.disabled = variant.stock <= 0;
                pill.innerHTML = '<span>' + variant.value_name + '</span>' +
                    (variant.metric ? '<span class="ms-1 text-muted" style="font-size:12px;opacity:0.8;margin-left:4px;">(' + variant.metric + ')</span>' : '');
                pill.addEventListener('click', function () {
                    selectAtcVariant(variant);
                });
                pillRow.appendChild(pill);
            });

            groupWrap.appendChild(pillRow);
            container.appendChild(groupWrap);
        });
    }

    function populateAtcModal(data) {
        atcCurrentProductId = data.id;
        atcSelectedAttributeValueId = data.default_attribute_value_id || null;

        const imageEl = document.getElementById('nbcAtcImage');
        const nameEl = document.getElementById('nbcAtcName');
        const qtyInput = document.getElementById('nbcAtcQty');
        if (imageEl) { imageEl.src = data.image; imageEl.alt = data.name; }
        if (nameEl) nameEl.textContent = data.name;
        if (qtyInput) qtyInput.value = 1;

        applyAtcPricing(data.pricing);
        renderAtcVariants(data);

        const defaultVariant = (data.variants || []).find(function (v) {
            return String(v.id) === String(atcSelectedAttributeValueId);
        });
        if (defaultVariant) {
            selectAtcVariant(defaultVariant);
        }
    }

    function openAddToCartModal(productId) {
        fetch('/cart/product/' + productId, {
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(function (response) { return response.json(); })
        .then(function (data) {
            populateAtcModal(data);
            const modal = getAtcModalInstance();
            if (modal) modal.show();
        })
        .catch(function (err) { console.error('Add to cart modal load error:', err); });
    }

    // Quantity +/- is already wired globally for any .rbt-qty-area by
    // main.min.js's cartQtyinfo() handler — no extra listener needed here.
    const atcQtyInput = document.getElementById('nbcAtcQty');

    const atcConfirmBtn = document.getElementById('nbcAtcConfirm');
    if (atcConfirmBtn) {
        atcConfirmBtn.addEventListener('click', function () {
            if (!atcCurrentProductId) return;
            const qty = parseInt((atcQtyInput && atcQtyInput.value) || '1', 10) || 1;
            addToCart(atcCurrentProductId, qty, {}, true, atcSelectedAttributeValueId);
            const modal = getAtcModalInstance();
            if (modal) modal.hide();
        });
    }

    // Global Event Listener
    document.addEventListener('click', function (e) {
        // Add to cart button trigger
        const addBtn = e.target.closest('.nbc-add-to-cart, .btn-add-to-cart, [data-product-id]');
        if (addBtn && (addBtn.classList.contains('btn-add-to-cart') || addBtn.classList.contains('nbc-add-to-cart') || addBtn.closest('.product-btn-grp') || addBtn.closest('.minicart-btn-grp') || addBtn.hasAttribute('data-product-id'))) {
            e.preventDefault();
            const productId = addBtn.dataset.productId || addBtn.getAttribute('data-product-id');
            if (!productId) return;

            // Product-details page already has its own inline variant picker
            // and price display, so its Add to Cart buttons add instantly.
            // Everywhere else (listing cards), open the picker modal.
            if (addBtn.classList.contains('js-nbc-add-to-cart')) {
                let qty = 1;
                const qtyScope = addBtn.closest('.product-btn-grp');
                const qtyInput = qtyScope ? qtyScope.querySelector('.items-qty-input') : null;
                if (qtyInput && qtyInput.value) {
                    qty = parseInt(qtyInput.value, 10) || 1;
                }
                const attributeValueId = addBtn.dataset.attributeValueId || addBtn.getAttribute('data-attribute-value-id') || null;
                addToCart(productId, qty, {}, true, attributeValueId);
                return;
            }

            if (atcModalEl) {
                openAddToCartModal(productId);
                return;
            }

            // Fallback if the modal markup isn't present on this page.
            addToCart(productId, 1, {}, true, addBtn.dataset.attributeValueId || null);
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
