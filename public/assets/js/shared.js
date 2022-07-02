let cart = getCart() ?? {};
$(document).ready(function () {
    if (!cart) setCart();
    addToCart();
    setCartProductsNum()
    $('#delete-storage').on('click', () => {
        removeCart(cart)
    })
    setLocalStorageAfterLogin();
    setLogout();
});

function setCart(cart = {}) {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function getCart() {
    return JSON.parse(localStorage.getItem('cart'))
}

function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
    setCartProductsNum()
}

function removeCart(cart) {
    cart = {}
    localStorage.removeItem('cart');
    setCartProductsNum()
}

function addToCart() {
    $(document).on('click', '.add-to-cart', function (event) {
        event.preventDefault();
        const productId = this.dataset.cart;
        if (!cart[productId]) cart[productId] = 1
        else cart[productId] += 1
        saveCart(cart);
        const url = $(this).attr('href');
        if (url !== '#') {
            window.location.replace(url);
        }
    });
}

function redirectToCart() {
    const url = $(this).attr('href');
    if (url !== '#') {
        window.location.replace(url);
    }
}

function setCartProductsNum() {
    const len = Object.keys(getCart() ?? {}).length ?? 0;
    if(document.querySelector('#cart-quantity')) {
        $('#cart-quantity')[0].innerHTML = len;
    }
}

function setLocalStorageAfterLogin() {
    const path = location.pathname;
    if(path === '/login' && $('meta[name="localStorage"]').attr('content')) {
        window.location.replace('/');
        let cart = JSON.parse($('meta[name="localStorage"]').attr('content')) ?? {};
        if(Array.isArray(cart)) cart = {};
        setCart(cart)

    }
}

function setLogout() {
    const logout = document.querySelector('#prevent-logout');
    if(logout) {
        logout.addEventListener('click', e=> {
            e.preventDefault();
            if(!jQuery.isEmptyObject(cart)) {
                const hidden = document.querySelector('#hidden');
                hidden.value = JSON.stringify(cart);
            }
            document.querySelector("#logout-form").submit();
            removeCart()
        })
    }
}
