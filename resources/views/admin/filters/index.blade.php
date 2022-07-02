@extends('dashboard')
@section('title', Config::get('consts.pages.filters.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.filters.index.main-heading'))
        @slot('subtitle', Config::get('consts.pages.filters.index.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <div class="container mb-5">

        <div class="my-5">
            <h5><a href="{{route('admin.filters.create')}}">Add new filter</a></h5>
        </div>

{{--        <form id="admin-category-filter-form" style="display: none" action="{{route('admin.filters.destroy', ['id' => $category->id])}}" method="POST">--}}
{{--            @csrf--}}
{{--            @method("DELETE")--}}
{{--            <input type="hidden" name="id" value="{{$category->id}}">--}}
{{--        </form>--}}
{{--        <span class="float-end">--}}
{{--                                    <a href="#" class=""--}}
{{--                                       onclick="event.preventDefault();document.querySelector('#admin-category-filter-form').submit()"--}}
{{--                                    >--}}
{{--                                    <i class="fa fa-trash text-danger"></i>--}}
{{--                                </a>--}}
{{--                                </span>--}}

        <div class="row">

            <div class="col-4 pb-4">
                <h4>Categories: </h4>
                <form action="{{route('admin.filters.update')}}" method="POST">
                    <button class="btn btn-primary my-3" type="submit" value="submit">Update</button>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="categories">
                    <div class="form-group" id="remove-images-checkboxes-placholder">
                        @foreach($categories as $category)
                            <div class="form-control">
                                <input
                                    {{!$category->deleted_at ? 'checked': ''}}
                                    type="checkbox" name="ids[]" value="{{$category->id}}">
                                <span>{{$category->name}}</span>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>

            <div class="col-4 pb-4">
                <h4>Models: </h4>
                <form action="{{route('admin.filters.update')}}" method="POST">
                    <button class="btn btn-primary my-3" type="submit" value="submit">Update</button>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="models">
                    <div class="form-group">
                        @foreach($models as $model)
                            <div class="form-control">
                                <input
                                    {{!$model->deleted_at ? 'checked': ''}}
                                    type="checkbox" name="ids[]" value="{{$model->id}}">
                                <span>{{$model->name}}</span>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>

            <div class="col-4 pb-4">
                <h4>Colors: </h4>
                <form action="{{route('admin.filters.update')}}" method="POST">
                    <button class="btn btn-primary my-3" type="submit" value="submit">Update</button>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="colors">
                    <div class="form-group" id="remove-images-checkboxes-placholder">
                        @foreach($colors as $color)
                            <div class="form-control">
                                <input
                                    {{!$color->deleted_at ? 'checked': ''}}
                                    type="checkbox" name="ids[]" value="{{$color->id}}">
                                <span>{{$color->name}}</span>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>

        </div>

        {{--        @foreach($categories as $category)--}}
        {{--            <p>{{$category->name}}</p>--}}
        {{--        @endforeach--}}
        {{--        @foreach($models as $model)--}}
        {{--            <p>{{$model->name}}</p>--}}
        {{--        @endforeach--}}
        {{--        @foreach($colors as $color)--}}
        {{--            <p>{{$color->name}}</p>--}}
        {{--        @endforeach--}}

    </div>
@endsection
