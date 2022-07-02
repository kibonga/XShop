@extends('dashboard')
@section('title', Config::get('consts.pages.products.show.title'))
@section('scripts')
    {{--Add scripts here--}}
    <script src="{{asset('assets/js/products-edit.js')}}" defer></script>
@endsection
@section('content')

    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.products.edit.main-heading'))
        @slot('subtitle', Config::get('consts.pages.products.edit.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <form class="col-6 mx-auto mt-5" action="{{route('products.update', ['product' => $product->id])}}" method="POST"
          enctype="multipart/form-data">
        @method('PUT')
        @include('products.partials.shared._form')
        <div class="mb-3">
            <input type="submit" value="Update" class="form-control btn btn-primary">
        </div>
    </form>
@endsection
