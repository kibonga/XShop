@extends('dashboard')
@section('title', Config::get('consts.pages.orders.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.orders.index.main-heading'))
        @slot('subtitle', Config::get('consts.pages.orders.index.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container mb-5">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Profit</th>
                <th scope="col">Date</th>
                <th scope="col">Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                @include('orders.partials._order', [$index = $loop->index + 1])
            @endforeach
            </tbody>
            {{--Display pagination--}}
            <div class="d-flex justify-content-center">
                {!! $orders->links() !!}
            </div>
            {{--Display pagination--}}
        </table>

    </div>
@endsection
