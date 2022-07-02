<div class="row">

    @foreach($products as $product)
        @include('products.partials.index._single-product')
    @endforeach

</div>

{{--Display pagination--}}
<div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>
{{--Display pagination--}}
