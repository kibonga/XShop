<div class="row">

    @foreach($products as $product)
        @include('products.partials.index._single-product')
    @endforeach

</div>

{{--Display pagination--}}
@include('products.partials.index._pagination')
{{--Display pagination--}}
