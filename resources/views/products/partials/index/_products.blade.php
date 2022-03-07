<div class="row">

    @foreach($products as $product)
        @include('products.partials.index._single-product')
    @endforeach

</div>
