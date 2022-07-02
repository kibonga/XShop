@extends('app')
@section('title', Config::get('consts.pages.register.title'))
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" defer></script>
    <script src="{{asset('assets/js/ajax.register.js')}}" defer></script>
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.register.main-heading'))
        @slot('subtitle', Config::get('consts.pages.register.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    {{--Register form--}}
    <div>
        <form action="{{route('register')}}" method="POST" id="register-form" class="col-4 mx-auto my-4">
            @csrf
            {{--Name--}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                @if($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>
                @endif
            </div>
            {{--Name--}}

            {{--Last Name--}}
            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}">
                @if($errors->has('last_name'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('last_name')}}</strong>
                    </span>
                @endif
            </div>
            {{--Last Name--}}

            {{--Email--}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
                @if($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                @endif
            </div>
            {{--Email--}}

            {{--Address--}}
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}">
                @if($errors->has('address'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('address')}}</strong>
                    </span>
                @endif
            </div>
            {{--Address--}}

            {{--Phone--}}
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}">
                @if($errors->has('phone'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('phone')}}</strong>
                    </span>
                @endif
            </div>
            {{--Phone--}}

            {{--Password--}}
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}">
                @if($errors->first('password'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                @endif
            </div>
            {{--Password--}}

            {{--Retyped Password--}}
            <div class="form-group">
                <label for="password_confirmation">Retyped Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            </div>
            {{--Retyped Password--}}

            {{--Register Submit--}}
            <button type="submit" class="btn btn-primary">Register</button>
            {{--Register Submit--}}

        </form>
    </div>
    {{--Register form--}}

@endsection
{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <!-- Name -->--}}
{{--            <div>--}}
{{--                <x-label for="name" :value="__('Name')" />--}}

{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Email Address -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
