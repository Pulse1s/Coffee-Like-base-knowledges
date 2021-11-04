<header class="p-2 bg-success text-white shadow">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between ">

            <a href="/" class="d-flex align-items-center text-center mb-lg-0 text-white text-decoration-none">
                <img src="{{ asset('files/img/coffee_like_logo.png') }}" alt="Logo" width="100">
            </a>


            <div class="dropdown text-end">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    {{ auth()->user()->first_name }}
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li class="px-3">{{ auth()->user()->first_name }}</li>
                    <li class="px-3">{{ auth()->user()->last_name }}</li>
                    <li class="px-3">{{ auth()->user()->email }}</li>

                    @if(auth()->user()->admin === 1 )
                        <li class="px-3 text-success">Администратор</li>
                    @elseif(auth()->user()->active === 1)
                        <li class="px-3 text-success">Пользователь</li>
                    @else
                        <li class="px-3 text-success">Неактивен</li>
                    @endif

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    @can('admin')
                        <li><a class="dropdown-item" href="{{ route('users.index') }}">Пользователи</a></li>
                    @endcan

                    {{--                    <li><a class="dropdown-item" href="#">Профиль</a></li>--}}
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" href="#">Выйти</button>
                        </form>
                    </li>
                </ul>
            </div>

            {{--                <div class="text-end">--}}
            {{--                    <a type="button" href="{{ route('login') }}" class="btn btn-light text-success">Вход</a>--}}
            {{--                    <a type="button" href="{{ route('register') }}" class="btn btn-outline-light">Регистрация</a>--}}
            {{--                </div>--}}


        </div>
    </div>
</header>
