@extends('dashboard')
@section('title', Config::get('consts.pages.customers.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.customers.index.main-heading'))
        @slot('subtitle', Config::get('consts.pages.customers.index.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container mb-5">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$customer->name}} {{$customer->last_name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('admin.customers.show', ['customer' => $customer->id ])}}"><i class="fa fa-chart-area"></i></a></td>
                </tr>
            @endforeach
            </tbody>
            {{--Display pagination--}}
            <div class="d-flex justify-content-center">
                {!! $customers->links() !!}
            </div>
            {{--Display pagination--}}
        </table>

    </div>
@endsection
