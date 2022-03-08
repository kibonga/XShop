@extends('app')
@section('title', Config::get('consts.pages.products.show.title'))
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
                    @include('products.partials.show._main-image')
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

    {{--    Slider scripts--}}
    @include('products.partials.show._single-product-slider-script')
    {{--    Slider scripts--}}
@endsection
