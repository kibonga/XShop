@extends('app')
@section('title', Config::get('consts.page-titles.about'))
@section('content')

    {{--  About page banner  --}}
    <x-banner>
        @slot('title', Config::get('consts.pages.about.main-heading'))
        @slot('subtitle', Config::get('consts.pages.about.sub-heading'))
    </x-banner>
    {{--  About page banner  --}}

    <!-- Start Services Section -->
    <section class="container py-5">

        {{-- Heading - Services --}}
        <x-section-heading>
            @slot('title', Config::get('consts.pages.about.headings.services.title'))
            @slot('subtitle', Config::get('consts.pages.about.headings.services.subtitle'))
        </x-section-heading>
        {{-- Heading - Services --}}

        {{--  Services --}}
        <div class="row">
            @foreach($serviceItems as $item)
                @include('home.partials._about-card')
            @endforeach
        </div>
        {{--  Services --}}

    </section>
    <!-- End Services Section -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">

            {{-- Heading - Brands --}}
            <x-section-heading>
                @slot('title', Config::get('consts.pages.about.headings.brands.title'))
                @slot('subtitle', Config::get('consts.pages.about.headings.brands.subtitle'))
            </x-section-heading>
            {{-- Heading - Brands --}}

            {{-- Carousel --}}
            <x-carousel>
                @slot('items', $carouselItems)
                @slot('type', 'brand')
            </x-carousel>
            {{-- Carousel --}}

        </div>
    </section>
    <!--End Brands-->

@endsection
