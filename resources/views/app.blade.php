<!DOCTYPE html>
<html lang="en">
{{--Head--}}
@include('shared.fixed.head')
<body>
{{--Header--}}
@include('shared.fixed.header')
{{--Modal--}}
@include('shared.utils.modal')
{{--Content--}}
@yield('content')
{{--Footer--}}
@include('shared.fixed.footer')
</body>
</html>
