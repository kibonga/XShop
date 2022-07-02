{{--Table--}}
<div id="cart-alert"></div>
<div class="col-9">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Remove</th>
        </tr>
        </thead>
        <tbody id="cart-table">
        @if(!empty($products))
            @foreach($products as $product)
                <tr id="product-row-{{$product->id}}">
                    <td scope="row">
                        <img style="width: 100px" src="{{$product->images[0]->url()}}" alt="{{$product->name}}">
                    </td>
                    <td>{{$product->name}}</td>
                    <td class="cart-quantity">
                        <a href="#" data-id="{{$product->id}}" data-action="subtract" class="quantity-control"><i
                                class="fa fa-minus-circle quantity-control" aria-hidden="true"></i></a>
                        <span id="product-quantity-{{$product->id}}">{{$product->quantity}}</span>
                        <a href="#" data-id="{{$product->id}}" data-action="add" class="quantity-control"><i
                                class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    </td>
                    <td>{{$product->price->price}}</td>
                    <td>
                        <a href="#" id="remove-product-{{$product->id}}" class="btn btn-danger remove-product"
                           data-id="{{$product->id}}">X</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
{{--Table--}}


<div class="col-3">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Your cart</span>
        @if(!empty($products))
        <span id="product-count" class="badge bg-primary rounded-pill">{{$products->count()}}</span>
        @else
            <span id="product-count" class="badge bg-primary rounded-pill">0</span>
        @endif
    </h4>
    <ul class="list-group mb-3">
        @php $total = 0 @endphp
        <div id="cart-order-lines">
            @if(!empty($products))
                @foreach($products as $product)
                    <li id="product-row-line-{{$product->id}}"
                        class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Total</h6>
                            <small class="text-muted">{{$product->name}}</small>
                        </div>
                        @php $total += $product->quantity * $product->price->price @endphp
                        <span class="text-muted" id="product-total-{{$product->id}}"
                              data-price="{{$product->price->price}}">${{$product->quantity * $product->price->price}}</span>
                    </li>
                @endforeach
            @endif
        </div>
        <li class="list-group-item d-flex justify-content-between bg-light">
            <span>Total</span>
            <strong id="cart-total">${{$total}}</strong>
        </li>
    </ul>

    <div class="card p-2">
        <a id="cart-checkout" href="{{route('cart.store')}}" class="btn btn-secondary">Checkout</a>
    </div>
</div>



