<!doctype html>
<html lang="en">
@include('shared.fixed.admin.head')
<body>
@include('shared.fixed.admin.header')
<div class="container-fluid">

    {{--Status message--}}
    <div class="container">

        @if(session()->has('status'))
            <div class="alert alert-success">{{session()->get('status')}}</div>
        @endif
    </div>
    <div class="row">
        @include('shared.fixed.admin.nav')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @include('shared.fixed.admin.heading')
            <x-errors></x-errors>
            {{--            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>--}}
            @yield('content')
        </main>
    </div>
</div>
@include('shared.fixed.admin.footer')
</body>
</html>
