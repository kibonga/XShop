<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <title>@yield('title')</title>

    {{--Favicons--}}
    <link rel="apple-touch-icon" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">

    {{--Scripts--}}
    <script defer src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
            integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
            crossorigin="anonymous"></script>
{{--    <script defer src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"--}}
{{--            integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="{{asset('assets/js/dashboard.js')}}" defer></script>--}}
    {{--Scripts--}}
    @yield('scripts')
</head>
