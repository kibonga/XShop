@extends('dashboard')
@section('title', Config::get('consts.pages.customers.show.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.customers.show.main-heading'))
        @slot('subtitle', Config::get('consts.pages.customers.show.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container mb-5">

        <h3>
            {{$customer->name}} {{$customer->last_name}}
        </h3>
        <p>Email: {{$customer->email}}</p>
        <p>Phone: {{$customer->phone}}</p>
        <p>Address: {{$customer->address}}</p>
        <p>Registered: {{$customer->created_at->diffForHumans()}}</p>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Order id</th>
                <th scope="col">Date</th>
                <th scope="col">Number of items</th>
                <th scope="col">Details</th>
            </tr>
            </thead>
            <tbody>

            @php $j = 0 @endphp
            @foreach($orders as $order)
                @if($order->orderLines->count())
                    @php $j += 1 @endphp
                    <tr>
                        <th scope="row">{{$j}}</th>
                        <td>{{$order->id}}</td>
                        <td>{{$order->created_at->diffForHumans()}}</td>
                        <td>{{$order->order_lines_count}}</td>
                        <td><a href="{{route('admin.orders.show', ['order' => $order->id ])}}"><i
                                    class="fa fa-chart-area"></i></a></td>
                    </tr>
                @endif
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
