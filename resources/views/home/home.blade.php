@extends('app')
@section('title', Config::get('consts.pages.home.title'))
@section('localStorage', isset($localStorage) ? json_encode($localStorage) : null)
@section('content')
    {{--    <h2>@yield('localStorage')</h2>--}}
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid"
                                 src="{{asset('assets/img/products/leather_iphone_pro_purple_05.jpg')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Leather</b> is now in</h1>
                                <h3 class="h2">Try are brand new leather cases</h3>
                                <p>
                                    Leather is one of the best options to cover your precious phone, and with this
                                    stylish collection, you'll catch all the looks
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid"
                                 src="{{asset('assets/img/products/anti-static_iphone_black_01.jpg')}}" alt="">
                            {{--                            <img class="img-fluid" src="{{asset('assets/img/banner_img_02.jpg')}}" alt="">--}}
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Anti Static</h1>
                                <h3 class="h2">Your phone will thank you</h3>
                                <p>
                                    This mask will stick to any surface, it won't move, and you'll be happy you didn't
                                    break your phone
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid"
                                 src="{{asset('assets/img/products/leather_iphone_normal_black_01.jpg')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">The pitch black</h1>
                                <h3 class="h2">Dark collection is now available</h3>
                                <p>
                                    Check out our latest pitch black collection
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
           role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
           role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">From our black collection</h1>
                <p>
                    Check out our black collection
                </p>
            </div>
        </div>
        <div class="row">
            @if(isset($blacks))
                @foreach($blacks as $product)
                    <div class="col-12 col-md-4 p-5 mt-3">
                        <a href="{{route('products.show', ['product' => $product->id])}}"><img
                                src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}"
                                class="rounded-circle img-fluid border"></a>
                        <h5 class="text-center mt-3 mb-3">{{$product->name}}</h5>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">
                @if(isset($latests))
                    @foreach($latests as $product)
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100">
                                <a href="{{route('products.show', ['product' => $product->id])}}">
                                    <img
                                        src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}"
                                        class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="{{route('products.show', ['product' => $product->id])}}"
                                       class="h2 text-decoration-none text-dark">{{$product->name}}</a>
                                    <p class="card-text">
                                        {{$product->description}}
                                    </p>
                                    <p class="text-muted">{{$product->model->name}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

@endsection
