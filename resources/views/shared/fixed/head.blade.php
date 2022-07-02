<head>
    <title>{{env('APP_NAME')}} - @yield('title')</title>
    {{--Meta--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="localStorage" content="@yield('localStorage')">

    {{--Favicons--}}
    <link rel="apple-touch-icon" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

    {{--Fonts--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">

    {{--Styles--}}
    @include('shared.assets.styles')
    {{--Scripts--}}
    @include('shared.assets.scripts')
    {{--Non default scripts--}}
    @yield('scripts')
</head>
