$(document).ready(function () {
    // if (!cart) setCart();
    // addToCart();
    // setCartProductsNum()
    // console.log('I work')
    // $('#delete-storage').on('click', () => {
    //     console.log("I was clicked")
    //     removeCart(cart)
    // })

    console.log("Cart works")
    console.log(cart)
    if(cart) {
        getCartProducts()
    }
});

function getCartProducts(){
    // const token = _token = $("input[name=_token]").val();
    const csrf = $('meta[name="csrf-token"]').attr('content')
    console.log(cart)
    $.ajax({
        url: 'cart/fetch',
        method: "POST",
        data: {_token: csrf, data: cart},
        success: function(data) {
            $('#cart-content').html(data);
            setCheckout()
            setControls();
        },
        error: function (xhr, error) {

        }
    });
}

function setControls() {
    // Add-subtract
    $('.quantity-control').on('click', function (event) {
        event.preventDefault();
        const action = $(this).data('action');
        const id = $(this).data('id');
        if(action === 'subtract') {
            if(cart[id] > 1) {
                console.log("I can subtract")
                cart[id] -= 1;
            }
        }
        else if(action === 'add') {
            cart[id] += 1;
        }
        setCart(cart)
    });
    // Remove
    $('.remove-product').on('click', function (event) {
        event.preventDefault();
        const id = $(this).data('id')
        delete cart[id]
        $(`#product-row-${id}`).remove()
        $(`#product-row-line-${id}`).remove()
        setCart(cart)
    })
}

function setCart(cart) {
    console.log(cart)
    if(!cart) cart = {};
    console.log(cart)
    let total = 0;
    const len = Object.keys(cart).length;
    $('#product-count').html(len)
    $('#cart-quantity').html(len)
    for(let key in cart) {
        document.querySelector(`#product-quantity-${key}`).innerHTML = cart[key];
        const productTotal = document.querySelector(`#product-total-${key}`);
        const productPrice = +productTotal.dataset.price;
        const tmpTotal = (productPrice * +cart[key]);
        document.querySelector(`#product-total-${key}`).innerHTML = tmpTotal.toFixed(2);
        total += tmpTotal;
    }
    document.querySelector('#cart-total').innerHTML = total.toFixed(2);
    if(!len) {
        console.log("IF - removes len")
        console.log(len);
        $('#cart-table').html('');
        $('#cart-checkout').remove()
        $('#cart-order-lines').html('')
    }
    localStorage.setItem('cart', JSON.stringify(cart))
}

function removeProductFromCart() {

}

function setCheckout() {
    $('#cart-checkout').on('click', function (event) {
        event.preventDefault();
        // if(Object.keys(cart).length) {
            const csrf = $('meta[name="csrf-token"]').attr('content')
            const data = cart
            $.ajax({
                url: '/cart',
                method: 'POST',
                data: {_token: csrf, data: cart},
                success: function (data) {
                    localStorage.removeItem('cart')
                    setCart()
                    $('#cart-alert').html(data)
                },
                error: function (xhr, error) {

                }
            });
        // }
    })
}


