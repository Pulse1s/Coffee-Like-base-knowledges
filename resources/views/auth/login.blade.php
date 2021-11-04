@extends('layouts.auth')

@section('title', 'Вход')

@section('body')
    <main class="justify-content-center d-flex text-center h-100 align-items-center border-secondary">
        <form class="col-3" method="POST" action="{{ route('login') }}">

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
            <h1 class="h1 mb-4 fw-normal">Вход</h1>

            <div class="form-floating mb-1">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" autocomplete="off"
                       value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-1">
                <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password" autocomplete="off">
                <label for="floatingInput">Пароль</label>
            </div>


            <div class="checkbox mb-3 mt-3">
                <label>
                    <input type="checkbox" name="remember"> Запомнить меня
                </label>
            </div>
            <button class="btn btn-lg btn-primary" type="submit">Вход</button>
            <div class="mt-3"><a href="{{ route('password.request') }}" class="text-muted">Забыли пароль?</a></div>

        </form>
    </main>
@endsection

{{--<form method="POST" action="{{ route('login') }}">--}}
{{--@csrf--}}

{{--<!-- Email Address -->--}}
{{--    <div>--}}
{{--        <x-label for="email" :value="__('Email')"/>--}}

{{--        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>--}}
{{--    </div>--}}

{{--    <!-- Password -->--}}
{{--    <div class="mt-4">--}}
{{--        <x-label for="password" :value="__('Password')"/>--}}

{{--        <x-input id="password" class="block mt-1 w-full"--}}
{{--                 type="password"--}}
{{--                 name="password"--}}
{{--                 required autocomplete="current-password"/>--}}
{{--    </div>--}}

{{--    <!-- Remember Me -->--}}
{{--    <div class="block mt-4">--}}
{{--        <label for="remember_me" class="inline-flex items-center">--}}
{{--            <input id="remember_me" type="checkbox"--}}
{{--                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"--}}
{{--                   name="remember">--}}
{{--            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--        </label>--}}
{{--    </div>--}}

{{--    <div class="flex items-center justify-end mt-4">--}}
{{--        @if (Route::has('password.request'))--}}
{{--            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                {{ __('Forgot your password?') }}--}}
{{--            </a>--}}
{{--        @endif--}}

{{--        <x-button class="ml-3">--}}
{{--            {{ __('Log in') }}--}}
{{--        </x-button>--}}
{{--    </div>--}}
{{--</form>--}}



