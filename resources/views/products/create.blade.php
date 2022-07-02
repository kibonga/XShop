@extends('app')
@section('title', Config::get('consts.pages.products.create.title'))
@section('scripts')
    {{--Add scripts here--}}
{{--    <script src="{{asset('assets/js/products-edit.js')}}" defer></script>--}}
@endsection
@section('content')

    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.products.create.main-heading'))
        @slot('subtitle', Config::get('consts.pages.products.create.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <form class="col-6 mx-auto mt-5" action="{{route('products.store')}}" method="POST"
          enctype="multipart/form-data">
        @method('POST')
        @include('products.partials.shared._form')
        <div class="mb-3">
            <input type="submit" value="Update" class="form-control btn btn-primary">
        </div>
    </form>
@endsection
