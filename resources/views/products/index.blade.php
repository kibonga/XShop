@extends('app')
@section('title', Config::get('consts.pages.products.index.title'))
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
            @include('products.partials.index._all-checkboxes')
            {{--Display all checkboxes --}}

            <div class="col-lg-9">

                {{--Display select for all products--}}
                @include('products.partials.index._select')
                {{--Display select for all products--}}

                {{--Display All proudcts--}}
                @include('products.partials.index._products')
                {{--Display All proudcts--}}

                {{--Display pagination--}}
                @include('products.partials.index._pagination')
                {{--Display pagination--}}

            </div>

        </div>
    </div>
    <!-- End Content -->

@endsection
