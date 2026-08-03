(function () {
    'use strict';

    const storageKey = 'nbc-shopping-cart-v1';
    const addButtonSelector = '.nbc-add-to-cart, .rbt-product-card .rbt-cart-sidenav-activation, .rbt-product-card [data-bs-target="#popup-cartModal"]';

    function readCart() {
        try {
            const value = JSON.parse(localStorage.getItem(storageKey));
            return Array.isArray(value) ? value : [];
        } catch (error) {
            return [];
        }
    }

    function saveCart(cart) {
        localStorage.setItem(storageKey, JSON.stringify(cart));
        renderCart(cart);
    }

    function text(element) {
        return element ? element.textContent.replace(/\s+/g, ' ').trim() : '';
    }

    function parsePrice(value) {
        const matches = String(value || '').replace(/,/g, '').match(/\d+(?:\.\d+)?/g);
        return matches ? Number(matches[matches.length - 1]) : 0;
    }

    function productFromButton(button) {
        const card = button.closest('.rbt-product-card, .rbt-card, .single-product, .product-details-content');
        const name = button.dataset.productName || text(card && card.querySelector('.rbt-card-title a, .rbt-card-title, .title a, .title')) || 'NBC Product';
        const imageElement = card && card.querySelector('.rbt-card-img img, .thumbnail img, img.rbt-prd-img, img');
        const priceElements = card ? Array.from(card.querySelectorAll('.pricing-part .price-text, .rbt-price, .price')) : [];
        const salePrice = priceElements.find(function (element) { return element.tagName !== 'DEL'; }) || priceElements[priceElements.length - 1];
        const image = button.dataset.productImage || (imageElement ? imageElement.currentSrc || imageElement.src : '');
        const id = button.dataset.productId || (name + '-' + image).toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');

        return {
            id: id || String(Date.now()),
            name: name,
            price: parsePrice(button.dataset.productPrice || text(salePrice)),
            image: image,
            url: button.dataset.productUrl || (card && card.querySelector('.rbt-card-title a') ? card.querySelector('.rbt-card-title a').href : '#'),
            quantity: 1
        };
    }

    function escapeHtml(value) {
        const node = document.createElement('div');
        node.textContent = String(value || '');
        return node.innerHTML;
    }

    function money(value) {
        return 'Rs. ' + Number(value || 0).toLocaleString('en-LK', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function cartItemMarkup(item) {
        return '<li class="minicart-item" data-cart-id="' + escapeHtml(item.id) + '">' +
            '<div class="thumbnail"><a href="' + escapeHtml(item.url || '#') + '"><img src="' + escapeHtml(item.image) + '" alt="' + escapeHtml(item.name) + '"></a></div>' +
            '<div class="product-content"><h3 class="title h6"><a href="' + escapeHtml(item.url || '#') + '">' + escapeHtml(item.name) + '</a></h3>' +
            '<span class="quantity">' + item.quantity + 'x <span class="price">' + money(item.price) + '</span></span>' +
            '<div class="bottom-part"><div class="rbt-qty-area">' +
            '<button class="qty-item-btn qty-item-btn-decr nbc-cart-decrease" type="button" aria-label="Decrease quantity"><i class="fa-solid fa-minus"></i></button>' +
            '<input type="number" class="items-qty-input nbc-cart-quantity" value="' + item.quantity + '" min="1" aria-label="Quantity for ' + escapeHtml(item.name) + '">' +
            '<button class="qty-item-btn qty-item-btn-incr nbc-cart-increase" type="button" aria-label="Increase quantity"><i class="fa-solid fa-plus"></i></button>' +
            '</div></div></div>' +
            '<div class="close-btn"><button class="rbt-round-btn nbc-cart-remove" type="button" aria-label="Remove ' + escapeHtml(item.name) + '"><i class="fa-solid fa-xmark"></i></button></div></li>';
    }

    function cartLists() {
        return document.querySelectorAll('.rbt-cart-side-menu nav.side-nav > ul.rbt-minicart-wrapper, .rbt-cart-side-menu .side-nav > ul.rbt-minicart-wrapper');
    }

    function renderCart(cart) {
        const count = cart.reduce(function (sum, item) { return sum + item.quantity; }, 0);
        const subtotal = cart.reduce(function (sum, item) { return sum + (item.price * item.quantity); }, 0);
        const markup = cart.length
            ? cart.map(cartItemMarkup).join('')
            : '<li class="nbc-cart-empty"><i class="fa-regular fa-bag-shopping"></i><p>Your cart is empty.</p></li>';

        cartLists().forEach(function (list) { list.innerHTML = markup; });

        document.querySelectorAll('.rbt-mini-cart .access-box-count').forEach(function (badge) {
            badge.textContent = count;
        });
        document.querySelectorAll('.rbt-mini-cart .title-text').forEach(function (total) {
            total.textContent = money(subtotal);
        });

        document.querySelectorAll('.rbt-cart-side-menu').forEach(function (drawer) {
            const rows = drawer.querySelectorAll('.rbt-cart-subttotal');
            rows.forEach(function (row) {
                const label = text(row.querySelector('p:first-child')).toLowerCase();
                const value = row.querySelector('.price');
                if (!value) return;
                if (label.indexOf('subtotal') !== -1) {
                    row.querySelector('p:first-child').textContent = 'Subtotal (' + count + (count === 1 ? ' item)' : ' items)');
                    value.textContent = money(subtotal);
                } else if (label.indexOf('shipping') !== -1) {
                    value.textContent = money(0);
                } else if (label.indexOf('total') !== -1) {
                    value.textContent = money(subtotal);
                }
            });
        });
    }

    function updateQuantity(id, change, absolute) {
        const cart = readCart();
        const item = cart.find(function (entry) { return entry.id === id; });
        if (!item) return;
        item.quantity = Math.max(1, absolute !== undefined ? absolute : item.quantity + change);
        saveCart(cart);
    }

    document.addEventListener('click', function (event) {
        const addButton = event.target.closest(addButtonSelector);
        if (addButton) {
            event.preventDefault();
            const product = productFromButton(addButton);
            const cart = readCart();
            const existing = cart.find(function (item) { return item.id === product.id; });
            if (existing) existing.quantity += 1;
            else cart.push(product);
            saveCart(cart);
            return;
        }

        const itemElement = event.target.closest('[data-cart-id]');
        if (!itemElement) return;
        const id = itemElement.dataset.cartId;
        if (event.target.closest('.nbc-cart-increase')) updateQuantity(id, 1);
        if (event.target.closest('.nbc-cart-decrease')) updateQuantity(id, -1);
        if (event.target.closest('.nbc-cart-remove')) saveCart(readCart().filter(function (item) { return item.id !== id; }));
    });

    document.addEventListener('change', function (event) {
        if (!event.target.matches('.nbc-cart-quantity')) return;
        const item = event.target.closest('[data-cart-id]');
        updateQuantity(item.dataset.cartId, 0, Math.max(1, parseInt(event.target.value, 10) || 1));
    });

    document.addEventListener('DOMContentLoaded', function () { renderCart(readCart()); });
}());
