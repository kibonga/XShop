<!DOCTYPE html>
<html lang="en">
{{--Head--}}
@include('shared.fixed.head')
<body>
{{--Header--}}
@include('shared.fixed.header')
{{--Status message--}}
<div class="container">
    @if(session()->has('status'))
        <div class="alert alert-success">{{session()->get('status')}}</div>
    @endif
</div>
{{--Modal--}}
@include('shared.utils.modal')
{{--Content--}}
@yield('content')
{{--Footer--}}
@include('shared.fixed.footer')
</body>
</html>
