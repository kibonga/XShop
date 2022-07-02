@extends('app')
@section('title', Config::get('consts.pages.products.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.products.index.main-heading'))
        @slot('subtitle', Config::get('consts.pages.products.index.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            {{--Display all checkboxes --}}
            <div class="col-lg-3">
                <h3 class="h2 pb-4">{{Config::get('consts.pages.products.index.headings.filters')}}</h3>
                <ul class="list-unstyled templatemo-accordion">

                    {{--Categories checkboxes--}}
                    <x-checkbox-list>
                        @slot('title', Config::get('consts.pages.products.index.filters.categories'))
                        @slot('items', $categories)
                        @slot('name', 'categories')
                    </x-checkbox-list>
                    {{--Categories checkboxes--}}

                    {{--Models checkboxes--}}
                    <x-checkbox-list>
                        @slot('title', Config::get('consts.pages.products.index.filters.models'))
                        @slot('items', $models)
                        @slot('name', 'models')
                    </x-checkbox-list>
                    {{--Modles checkboxes--}}

                    {{--Colors checkboxes--}}
                    <x-checkbox-list>
                        @slot('title', Config::get('consts.pages.products.index.filters.colors'))
                        @slot('items', $colors)
                        @slot('name', 'colors')
                    </x-checkbox-list>
                    {{--Colors checkboxes--}}
                </ul>
            </div>
            {{--Display all checkboxes --}}


            {{--CONTAINER FOR SEARCH, SELECT AND AJAX PRODUCTS--}}
            <div class="col-lg-9">

                {{--SEARCH--}}
                <div class="">
                    <span>Search:</span>
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="text" id="search" name="search" class="form-control"/>
                        </div>
                        <button type="button" name="searchSubmit" id="searchSubmit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                {{--SEARCH--}}

                {{--SELECTS: PER-PAGE and SORTING--}}
                <div class="row">


                    {{--Sorting--}}
                    <div class="col-md-6 pb-4">
                        <span>Sort:</span>
                        <div class="d-flex">
                            <select class="form-control" name="sort" id="sort">

                                @foreach($sorts as $option)
                                    <option value="{{$option['value']}}">{{$option['name']}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    {{--Sorting--}}


                    {{--Per Page--}}
                    <div class="col-md-6 pb-4">
                        <span>Per page:</span>
                        <div class="d-flex">
                            <select class="form-control" name="perPage" id="perPage">
                                @foreach($perPages as $option)
                                    <option value="{{$option['value']}}">{{$option['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{--Per Page--}}

                </div>
                {{--SELECTS: PER-PAGE and SORTING--}}

                {{--AJAX PRODUCTS with PAGINATION--}}
                <div id="ajax-products">
                </div>
                {{--AJAX PRODUCTS with PAGINATION--}}

            </div>
            {{--CONTAINER FOR SEARCH, SELECT AND AJAX PRODUCTS--}}

        </div>
    </div>
    <!-- End Content -->

@endsection
