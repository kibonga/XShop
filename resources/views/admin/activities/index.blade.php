@extends('dashboard')
@section('title', Config::get('consts.pages.activities.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.activities.index.main-heading'))
        @slot('subtitle', Config::get('consts.pages.activities.index.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container mb-5">

        <div class="col-12 col-md-4 my-5">
            <form action="{{route('admin.activities.index')}}" method="POST">
                @csrf
                <input class="form-control" type="date" name="start">
                <input class="form-control"  type="date" name="end">
                <button type="submit" class="btn btn-primary mt-3">Search</button>
            </form>
            <form action="{{route('admin.activities.index')}}" method="GET">
                <button type="submit" class="btn btn-primary mt-3">Reset</button>
            </form>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">User</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($activities as $activity)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$activity->name}}</td>
                    <td>{{$activity->description}}</td>
                    <td>
                        <a href="{{route('admin.customers.show', ['customer' => $activity->user_id ])}}">
                            <i class="fa fa-user"></i>
                        </a>
                    </td>
                    <td>
                        {{$activity->created_at->diffForHumans()}}
                    </td>
                </tr>
            @endforeach
            </tbody>
            {{--Display pagination--}}
            <div class="d-flex justify-content-center">
                {!! $activities->links() !!}
            </div>
            {{--Display pagination--}}
        </table>

    </div>
@endsection
