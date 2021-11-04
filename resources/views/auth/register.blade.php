@extends('layouts.auth')

@section('title', 'Регистрация')

@section('body')
    <main class="justify-content-center d-flex text-center h-100 align-items-center border-secondary">
        <form class="col-lg-4 col-md-6 col-10" method="POST" action="{{ route('register') }}">

            {{--            @if($errors->any())--}}
            {{--                <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">--}}
            {{--                    <ul class="mb-0 pb-0">--}}
            {{--                        @foreach ($errors->all() as $error)--}}
            {{--                            <li>{{ $error }}</li>--}}
            {{--                        @endforeach--}}
            {{--                    </ul>--}}
            {{--                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
            {{--                </div>--}}
            {{--            @endif--}}


            @csrf
            <h1 class="h1 mb-4 fw-normal">Регистрация</h1>

            <div class="form-floating mb-1">
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com"
                       name="first_name"
                       autocomplete="off"
                       value="{{ old('first_name') }}">
                <label for="floatingInput">Имя</label>
                <div class="invalid-feedback">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com"
                       name="last_name" autocomplete="off"
                       value="{{ old('last_name') }}">
                <label for="floatingInput">Фамилия</label>
                <div class="invalid-feedback">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-floating mb-1">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com"
                       name="email" autocomplete="off"
                       value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
                <div class="invalid-feedback">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="input-group mb-1 flex-nowrap">
                <div class="input-group-text px-2 rounded-0 rounded-start" style="height: 3.625rem;">+7</div>
                <div class="form-floating flex-grow-1">
                    <input aria-describedby="validatePhone" type="number"
                           class="form-control rounded-0 rounded-end @error('phone') is-invalid @enderror" id="floatingInput"
                           placeholder="phone" name="phone"
                           autocomplete="off"
                           value="{{ old('phone') }}">
                    <label for="floatingInput ml-3 pl-3">Номер телефона</label>
                    <div id="validatePhone" class="invalid-feedback">
                        @error('phone')
                        {{ $message }}
                        @enderror
                    </div>
                </div>


            </div>


            <div class="form-floating mb-1">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder="name@example.com"
                       name="password" autocomplete="off">
                <label for="floatingInput">Пароль</label>
                <div class="invalid-feedback">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword"
                       placeholder="Password" name="password_confirmation"
                       autocomplete="off">
                <label for="floatingPassword">Подтверждение пароля</label>
                <div class="invalid-feedback">
                    @error('password_confirmation')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="checkbox mb-3 mt-3">
                <label>
                    <input type="checkbox" id="check-agree" name="agree" value="agree" novalidate> Согласие на <a href="/" class="fw-bold link-dark">обработку
                        персональных
                        данных</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary disabled" id="submit-form" type="submit">Зарегестрироваться</button>
            <div class="mt-2">
                <a href="{{ route('login') }}" class="text-muted">Уже зарегестрированны?</a>
            </div>
        </form>
    </main>

    <script>
        const subm = document.querySelector('#submit-form')
        document.querySelector('#check-agree').addEventListener('change', function () {
            if (this.checked) subm.classList.remove('disabled')
            else subm.classList.add('disabled')
        })
    </script>
@endsection

{{--<form method="POST" action="{{ route('register') }}">--}}
{{--@csrf--}}

{{--<!-- Name -->--}}
{{--    <div>--}}
{{--        <label for="name">Логин</label>--}}
{{--        <input type="text" name="name" id="name">--}}
{{--    </div>--}}

{{--    <!-- Email Address -->--}}
{{--    <div>--}}
{{--        <label for="email">Почта</label>--}}
{{--        <input type="text" id="email" type="email" name="email">--}}
{{--    </div>--}}

{{--    <!-- Password -->--}}
{{--    <div>--}}
{{--        <label for="password">Пароль</label>--}}
{{--        <input type="password" id="password" name="password">--}}
{{--    </div>--}}

{{--    <!-- Confirm Password -->--}}
{{--    <div>--}}
{{--        <label for="password_confirmation">Подтверждение пароля</label>--}}
{{--        <input type="password" id="password_confirmation" name="password_confirmation">--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <a href="{{ route('login') }}">--}}
{{--            Уже зарегестрированы?--}}
{{--        </a>--}}

{{--        <button type="submit">Регистрация</button>--}}
{{--    </div>--}}
{{--</form>--}}






