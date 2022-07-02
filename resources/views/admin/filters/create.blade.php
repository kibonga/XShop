@extends('dashboard')
@section('title', Config::get('consts.pages.create.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.filters.create.main-heading'))
        @slot('subtitle', Config::get('consts.pages.filters.create.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container mb-5">

        <div class="my-5 col-6">
            <h3>Add new</h3>
            <form action="{{route('admin.filters.store')}}"  method="POST" >
                @csrf
                <select class="form-control" name="type" id="type">
                    <option value="category">Category</option>
                    <option value="model">Model</option>
                    <option value="color">Color</option>
                </select><br>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" name="name"  id="name" type="text" >
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>



    </div>
@endsection
