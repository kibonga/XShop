<div
    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
    <ul class="list-unstyled">
        <li><a class="btn btn-success text-white" href="shop-single.html"><i
                    class="far fa-heart"></i></a></li>
{{--        @php dd($product->id) @endphp--}}
        <li><a class="btn btn-success text-white mt-2" href="{{ route('products.show', ['product' => $product->id]) }}"><i
                    class="far fa-eye"></i></a></li>
        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i
                    class="fas fa-cart-plus"></i></a></li>
    </ul>
</div>
