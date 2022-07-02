@extends('dashboard')
@section('title', Config::get('consts.pages.products.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
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



                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">

                            {{--Name and price--}}
                            <h1 class="h2">{{$product->name}}</h1>
                            <p class="h5 py-2">${{$product->price->price}}</p>
                            {{--Name and price--}}

                            <h4>
                                Status: @if($product->deleted_at) <span class="text-danger">Removed {{$product->deleted_at->diffForHumans()}}</span> @else <span class="text-success">Active</span> @endif
                            </h4>

                            <div class="alert alert-success" role="alert">
                                <h4>
                                    Found in {{$product->orders_count}} different orders
                                </h4>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <h4>Sold {{$product->orders_sum_quantity}} times</h4>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <h4>Total profit ${{(int)$product->orders_sum_quantity * $product->price->price}}</h4>
                            </div>


                            {{--     Rating and pagination       --}}
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            {{--     Rating and pagination       --}}


                            {{--Model for prouduct--}}
                            @include('products.partials.show._additional-info',
                                [
                                    'title' => Config::get('consts.pages.products.show.headings.model'),
                                    'value' => $product->model->name
                                ]
                            )
                            {{--Model for prouduct--}}

                            {{--Category for prouduct--}}
                            @include('products.partials.show._additional-info',
                                [
                                    'title' => Config::get('consts.pages.products.show.headings.category'),
                                    'value' => $product->category->name
                                ]
                            )
                            {{--Category for prouduct--}}

                            {{-- Description --}}
                            <h6>{{Config::get('consts.pages.products.show.headings.description')}}: </h6>
                            <p>{{$product->description}}</p>
                            {{-- Description --}}

                            {{-- Color for product--}}
                            @include('products.partials.show._additional-info',
                                [
                                    'title' => Config::get('consts.pages.products.show.headings.color'),
                                    'value' => ucfirst($product->color->name)
                                ]
                            )
                            {{-- Color for product--}}


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Close Content -->

@endsection
