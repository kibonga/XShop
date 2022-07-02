@extends('app')
@section('title', Config::get('consts.pages.cart.title'))
@section('scripts')
    <!-- Start Slider Script -->
    <script src="{{asset('assets/js/ajax.cart.js')}}" defer></script>
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.cart.main-heading'))
        @slot('subtitle', Config::get('consts.pages.cart.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    <!-- Start Content -->
    <div class="row py-5 container mx-auto" id="cart-content">

    </div>
    <!-- End Content -->

@endsection
