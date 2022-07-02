@extends('dashboard')
@section('title', Config::get('consts.pages.dashboard.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.dashboard.index.main-heading'))
        @slot('subtitle', Config::get('consts.pages.dashboard.index.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container mb-5">

        <div>
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h3>Most active customers</h3>
                    <p>
                        These are our top 5 most active customers for last month
                    </p>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Number of orders</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mostActive as $user)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$user->name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('admin.customers.show', ['customer' => $user->id ])}}">
                                <i class="fa fa-user"></i>
                            </a>
                        </td>
                        <td>
                            {{$user->orders_count}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


        <div class="my-5">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h3>Most popular products</h3>
                    <p>
                        These are our top 5 most popular products for last month
                    </p>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Stats</th>
                    <th scope="col">Number of orders</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mostPopular as $product)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>
                            <a href="{{route('products.show', ['product' => $product->id])}}">
                                <img style="width: 100px" src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}" class="card-img-top img-fluid" alt="...">
                            </a>
                        </td>
                        <td>{{$product->name}}</td>
                        <td>
                            <a href="{{route('admin.products.stats', ['product' => $product->id])}}"
                               class="btn btn-primary"
                            ><i class="fas fa-chart-area"></i></a>
                        </td>
                        <td>
                            {{$product->orders_count}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


        {{--        <!-- Start Categories of The Month -->--}}
        {{--        <section class="container py-5">--}}
        {{--            <div class="row text-center pt-3">--}}
        {{--                <div class="col-lg-6 m-auto">--}}
        {{--                    <h3 >Most active customers</h3>--}}
        {{--                    <p>--}}
        {{--                        These are our most loyal customers--}}
        {{--                    </p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="row">--}}
        {{--                @foreach($blacks as $product)--}}
        {{--                    <div class="col-12 col-md-4 p-5 mt-3">--}}
        {{--                        <a href="{{route('products.show', ['product' => $product->id])}}"><img src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}" class="rounded-circle img-fluid border"></a>--}}
        {{--                        <h5 class="text-center mt-3 mb-3">{{$product->name}}</h5>--}}
        {{--                    </div>--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        </section>--}}
        {{--        <!-- End Categories of The Month -->--}}

        {{--        <div class="col-12 col-md-4 my-5">--}}
        {{--            <form action="{{route('admin.activities.index')}}" method="POST">--}}
        {{--                @csrf--}}
        {{--                <input class="form-control" type="date" name="start">--}}
        {{--                <input class="form-control"  type="date" name="end">--}}
        {{--                <button type="submit" class="btn btn-primary mt-3">Search</button>--}}
        {{--            </form>--}}
        {{--            <form action="{{route('admin.activities.index')}}" method="GET">--}}
        {{--                <button type="submit" class="btn btn-primary mt-3">Reset</button>--}}
        {{--            </form>--}}
        {{--        </div>--}}



        {{--        <table class="table">--}}
        {{--            <thead>--}}
        {{--            <tr>--}}
        {{--                <th scope="col">No.</th>--}}
        {{--                <th scope="col">Type</th>--}}
        {{--                <th scope="col">Description</th>--}}
        {{--                <th scope="col">User</th>--}}
        {{--                <th scope="col">Date</th>--}}
        {{--            </tr>--}}
        {{--            </thead>--}}
        {{--            <tbody>--}}
        {{--            @foreach($activities as $activity)--}}
        {{--                <tr>--}}
        {{--                    <th scope="row">{{$loop->index + 1}}</th>--}}
        {{--                    <td>{{$activity->name}}</td>--}}
        {{--                    <td>{{$activity->description}}</td>--}}
        {{--                    <td>--}}
        {{--                        <a href="{{route('admin.customers.show', ['customer' => $activity->user_id ])}}">--}}
        {{--                            <i class="fa fa-user"></i>--}}
        {{--                        </a>--}}
        {{--                    </td>--}}
        {{--                    <td>--}}
        {{--                        {{$activity->created_at->diffForHumans()}}--}}
        {{--                    </td>--}}
        {{--                </tr>--}}
        {{--            @endforeach--}}
        {{--            </tbody>--}}
        {{--            --}}{{--Display pagination--}}
        {{--            <div class="d-flex justify-content-center">--}}
        {{--                {!! $activities->links() !!}--}}
        {{--            </div>--}}
        {{--            --}}{{--Display pagination--}}
        {{--        </table>--}}

    </div>
@endsection
