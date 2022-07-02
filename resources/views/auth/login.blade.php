@extends('app')
@section('title', Config::get('consts.pages.title'))
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" defer></script>
    <script src="{{asset('assets/js/ajax.login.js')}}" defer></script>
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.login.main-heading'))
        @slot('subtitle', Config::get('consts.pages.login.sub-heading'))
    </x-section-heading>
    {{--Heading--}}
    {{--Login Form--}}
    <div>
        <form id="login-form" action="{{route('login')}}" method="POST" class="col-4 mx-auto my-4">
            @csrf

            {{--Email--}}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{old('email')}}"
                       class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email">
                @if($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                @endif
            </div>
            {{--Email--}}

            {{--Password--}}
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password"
                       class="form-control {{$errors->has('password') ? 'is-invalid': ''}}" id="password">
                @if($errors->first('password'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                @endif
            </div>
            {{--Password--}}

            {{--Remember me--}}
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input"
                           value="{{old('remember') ? 'checked' : ''}}">
                    <label for="remember">Remember Me</label>
                </div>
            </div>
            {{--Remember me--}}

            {{--Login Submit--}}
            <button type="submit" id="login-submit" class="btn btn-primary">Login</button>
            {{--Login Submit--}}

        </form>
    </div>
    {{--Login Form--}}
@endsection
