@extends('layouts.auth')

@section('title', 'Восстановление пароля')

@section('body')

    <main class="justify-content-center d-flex text-center h-100 align-items-center border-secondary w-100">
        <form class="col-4" method="POST" action="{{ route('password.email') }}">

            @if(session('status'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class=" alert alert-danger alert-dismissible fade show text-start
    " role="alert">
                    <ul class="mb-0 pb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @csrf
            <h1 class="h2 mb-3 fw-normal">Восстановление пароля</h1>
            <p class="fw-light h5">Забыли пароль? Не беда! Введите электронныую почту указанную при регистрации и мы вышлем вам ссылку на
                восстановление!</p>

            <div class="form-floating mt-3 mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" autocomplete="off"
                       value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
            </div>

            <button class="btn btn-lg btn-primary" type="submit">Выслать ссылку</button>

            <div class="mt-2">
                <a href="{{ route('test') }}" class="text-muted">Вернуться обратно</a>
            </div>


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

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')"/>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors"/>--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')"/>--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}



