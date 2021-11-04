@extends('layouts.auth')

@section('title', 'Восстановление пароля')

@section('body')

    <main class="justify-content-center d-flex text-center h-100 align-items-center border-secondary">
        <form class="col-3" method="POST" action="{{ route('password.update') }}">

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
                    <ul class="mb-0 pb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @csrf
            <h1 class="h2 mb-3 fw-normal">Установка нового пароля</h1>

            <div class="form-floating mb-1">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" autocomplete="off"
                       value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-1">
                <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password" autocomplete="off">
                <label for="floatingInput">Пароль</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password_confirmation"
                       autocomplete="off">
                <label for="floatingInput">Повторите пароль</label>
            </div>

            <button class="btn btn-lg btn-primary" type="submit">Изменить пароль</button>


        </form>
    </main>

@endsection

{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors"/>--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--        @csrf--}}

{{--        <!-- Password Reset Token -->--}}
{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')"/>--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus/>--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')"/>--}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')"/>--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                         type="password"--}}
{{--                         name="password_confirmation" required/>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}







