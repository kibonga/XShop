@extends('dashboard')
@section('title', Config::get('consts.pages.orders.show.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.orders.show.main-heading'))
        @slot('subtitle', Config::get('consts.pages.orders.show.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container">

        <!-- Open Content -->
        <section class="">
            <div class="container pb-5">
                <div class="row">

                    <div class="col">

{{--                        {{dd($order)}}--}}
                        @php $total = 0; @endphp
                        @foreach($order->orderLines as $line)
                            {{--        {{(int)$line->quantity}}--}}
                            @php
                                $total += $line->quantity * $line->price;
                            @endphp
                        @endforeach

                        <div>
                            <p>Order No. {{$order->id}}</p>
                            <h3>{{$order->user->name}} {{$order->user->last_name}}</h3>
                            <div class="alert alert-success" role="alert">
                                Total: ${{$total}}
                            </div>
                        </div>

                       <div class="mx-auto">
                           <table class="table">
                               <thead>
                               <tr>
                                   <th scope="col">No.</th>
                                   <th scope="col">Product</th>
                                   <th scope="col">Stats</th>
                                   <th scope="col">Price at purchase</th>
                                   <th scope="col">Quantity</th>
                                   <th scope="col">Total</th>
                                   <th scope="col">Date</th>
                               </tr>
                               </thead>
                               <tbody>
                               {{--                            {{dd($order)}}--}}
                               @foreach($lines as $line)
                                   @include('orders.partials._order-line', ['index' => $loop->index + 1])
                               @endforeach
                               </tbody>
                               {{--                            Display pagination--}}
                               {{--                            {{dd($lines)}}--}}
                               <div class="d-flex justify-content-center">
                                   {!! $lines->links() !!}
                               </div>
                               {{--                            Display pagination--}}
                           </table>
                       </div>
                        {{--Single prouct main image--}}
{{--                        <div class="card mb-3">--}}
{{--                            <img class="card-img img-fluid" id="main-image"--}}
{{--                                 src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}" alt="Card image cap"--}}
{{--                                 id="product-detail">--}}
{{--                        </div>--}}
                        {{--Single prouct main image--}}

                        {{--Single product slider--}}
{{--                        <div class="row">--}}
{{--                            @include('products.partials.show._single-product-slider', [--}}
{{--                            'images' => $product->images,--}}
{{--                            'name' => $product->name--}}
{{--                        ])--}}
{{--                        </div>--}}
                        {{--Single product slider--}}
                    </div>


                    {{--Product info--}}
{{--                    @include('products.partials.show._product-info')--}}
                    {{--Product info--}}

                </div>
            </div>
        </section>
        <!-- Close Content -->

    </div>
@endsection
