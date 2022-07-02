@extends('app')
@section('title', Config::get('consts.pages.products.show.title'))
@section('scripts')
    <!-- Start Slider Script -->
    <script src="{{asset('assets/js/slick.min.js')}}" defer></script>
    <script src="{{asset('assets/js/slider-single-product.js')}}" defer ></script>
    <script src="{{asset('assets/js/products-show.js')}}" defer></script>
    <!-- End Slider Script -->
@endsection
@section('content')

    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.products.show.main-heading'))
        @slot('subtitle', Config::get('consts.pages.products.show.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">

                <div class="col-lg-5 mt-5">

                    {{--Single prouct main image--}}
                    <div class="card mb-3">
                        <img class="card-img img-fluid" id="main-image"
                             src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}" alt="Card image cap"
                             id="product-detail">
                    </div>
                    {{--Single prouct main image--}}

                    {{--Single product slider--}}
                    <div class="row">
                        @include('products.partials.show._single-product-slider', [
                        'images' => $product->images,
                        'name' => $product->name
                    ])
                    </div>
                    {{--Single product slider--}}
                </div>


                {{--Product info--}}
                @include('products.partials.show._product-info')
                {{--Product info--}}

            </div>
        </div>
    </section>
    <!-- Close Content -->

    {{--    Related products--}}
    @include('products.partials.show._related-products')
    {{--    Related products--}}

@endsection
