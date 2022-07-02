<div
    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
    <ul class="list-unstyled">
        {{--        <li><a class="btn btn-success text-white" href="shop-single.html"><i--}}
        {{--                    class="far fa-heart"></i></a></li>--}}
        <li><a class="btn btn-success text-white mt-2" href="{{ route('products.show', ['product' => $product->id]) }}"><i
                    class="far fa-eye"></i></a></li>
        @auth
            <li><a class="btn btn-success text-white mt-2 add-to-cart" data-cart="{{$product->id}}" href="#"><i
                        class="fas fa-cart-plus"></i></a></li>
            <li><a class="btn btn-success text-white mt-2 add-to-cart" data-cart="{{$product->id}}"
                   href="{{route('cart.index')}}"><i
                        class="fa fa-cash-register"></i></a></li>
            {{--            @if(Auth)--}}
            @if(Auth::user()->isAdmin())
                <li><a class="btn btn-success text-white mt-2" data-cart="{{$product->id}}"
                       href="{{route('products.edit', ['product' => $product->id])}}"><i class="fa fa-pen"></i></a></li>
            @endif
        @endauth
    </ul>
</div>
