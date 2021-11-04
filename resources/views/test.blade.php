@extends('layouts.index')

@push('scripts-head')
    @livewireStyles
@endpush

@section('body')

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show container mt-2" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @error('rename')
    <div class="alert alert-danger alert-dismissible fade show container mt-2" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror


    @can('user')

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center container col-7">

            <h1 class="display-2 mt-4 mb-5">База данных</h1>
            <p class="lead">С помощью этого примера Bootstrap быстро создайте эффективную таблицу цен для ваших
                потенциальных
                клиентов. Он построен с использованием компонентов и утилит Bootstrap по умолчанию с небольшой
                настройкой.</p>

            <livewire:search/>
        </div>

        @foreach($themes as $theme)

            <div style="@if($loop->odd) background-color: #f5f5f5; @endif">
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center container">
                    <h1 class="display-5 mb-5">{{ $theme->name }}</h1>
                    <div class="d-flex flex-wrap gap-4 justify-content-center">

                        @foreach($articles as $article)
                            @if($article->theme_id === $theme->id)
                                <div class="card border-0 rounded-0" style="width: 18rem;">
                                    <img src="{{ asset('files/img/placeholder.jpg') }}" class="card-img-top  rounded-0" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

        @endforeach


        {{--        <div class="accordion mb-5" id="accordionExample">--}}
        {{--            @can('admin')--}}
        {{--                <form class="form-control mb-3" method="POST" action="{{ route('themes.store') }}">--}}
        {{--                    @csrf--}}
        {{--                    <label for="add-theme" class="fs-5 mt-2 ms-1 fw-bold">Добавление нового раздела</label>--}}
        {{--                    <hr>--}}
        {{--                    <ul>--}}
        {{--                        <li>Название должно быть уникальным!--}}
        {{--                        </li>--}}
        {{--                        <li>Название не должно быть пустым!--}}
        {{--                        </li>--}}
        {{--                        <li>Название не должно содержать больше 70 символов!--}}
        {{--                        </li>--}}
        {{--                    </ul>--}}
        {{--                    <hr>--}}
        {{--                    <ul>--}}
        {{--                        <li>Название темы с саглавной буквы генерируется автоматически</li>--}}
        {{--                        <li>Номер темы проставляется автоматически</li>--}}
        {{--                    </ul>--}}
        {{--                    <hr>--}}
        {{--                    <div class="mt-1 d-flex input-group mb-1">--}}
        {{--                        <input id="add-theme" class="form-control @error('name') is-invalid @enderror" type="text" name="name"--}}
        {{--                               value="{{ old('name') }}"--}}
        {{--                               placeholder="Название раздела" autocomplete="off">--}}
        {{--                        <button class="btn btn-success col-lg-2 col-md-2 col-4">Добавить</button>--}}
        {{--                        @error('name')--}}
        {{--                        <div id="validationServerUsernameFeedback" class="invalid-feedback">--}}
        {{--                            {{ $message }}--}}
        {{--                        </div>--}}
        {{--                        @enderror--}}
        {{--                    </div>--}}
        {{--                </form>--}}
        {{--            @endcan--}}

        {{--            @foreach($themes as $theme)--}}

        {{--                <div class="accordion-item">--}}
        {{--                    <h2 class="accordion-header d-flex align-items-center" id="heading{{$theme->id}}">--}}
        {{--                        <button class="accordion-button collapsed text-break pe-0 shadow-none" type="button" data-bs-toggle="collapse"--}}
        {{--                                data-bs-target="#collapse{{$theme->id}}"--}}
        {{--                                aria-expanded="true"--}}
        {{--                                aria-controls="collapse{{$theme->id}}">--}}
        {{--                            {{ 'ТЕМА № ' . ($loop->index + 1) . ': ' . Str::upper($theme->name) }}--}}
        {{--                        </button>--}}
        {{--                        @can('admin')--}}
        {{--                            --}}{{--Кнопка редактирования--}}
        {{--                            <form action="{{ route('themes.update', ['theme' => $theme->id]) }}" method="POST"--}}
        {{--                                  class=" d-flex align-items-center">--}}

        {{--                                @csrf--}}
        {{--                                @method('put')--}}

        {{--                                <button class="text-black btn d-flex align-items-center shadow-none ms-0 ps-2 pe-1" type="button"--}}
        {{--                                        data-bs-toggle="modal"--}}
        {{--                                        data-bs-target="#modalUpdate{{ $theme->id }}">--}}
        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke="currentColor" width="20"--}}
        {{--                                         height="20">--}}
        {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
        {{--                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>--}}
        {{--                                    </svg>--}}
        {{--                                </button>--}}

        {{--                                --}}{{--Модльное окно--}}

        {{--                                <div class="modal fade" id="modalUpdate{{ $theme->id }}" data-bs-backdrop="static" data-bs-keyboard="false"--}}
        {{--                                     tabindex="-1"--}}
        {{--                                     aria-labelledby="staticBackdropLabel"--}}
        {{--                                     aria-hidden="true">--}}
        {{--                                    <div class="modal-dialog">--}}
        {{--                                        <div class="modal-content">--}}
        {{--                                            <div class="modal-header">--}}
        {{--                                                <h5 class="modal-title" id="staticBackdropLabel">Редактирование раздела</h5>--}}
        {{--                                            </div>--}}
        {{--                                            <div class="fs-6 p-3 border-bottom underline">--}}
        {{--                                                <div class="fs-5 mb-2">Внимание!</div>--}}
        {{--                                                <div>Название раздела должно быть уникальным, и содержать не более 70 символов!</div>--}}
        {{--                                            </div>--}}
        {{--                                            <div class="p-3">--}}
        {{--                                    <textarea name="rename"--}}
        {{--                                              class="form-control" placeholder="Введите новое название рздела"></textarea>--}}
        {{--                                            </div>--}}

        {{--                                            <div class="modal-footer">--}}
        {{--                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>--}}
        {{--                                                <button type="submit" class="btn btn-success">Изменить</button>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                --}}{{--Конец модльного окна--}}


        {{--                            </form>--}}
        {{--                            --}}{{--Конец кнопки редактирования--}}

        {{--                            --}}{{--Кнопка удаления--}}
        {{--                            <form action="{{ route('themes.destroy', ['theme' => $theme->id]) }}" method="POST" class="d-flex align-items-center">--}}

        {{--                                @csrf--}}
        {{--                                @method('delete')--}}

        {{--                                <button class="text-black btn d-flex align-items-center shadow-none p-2 ps-1" type="button" data-bs-toggle="modal"--}}
        {{--                                        data-bs-target="#modalDelete{{ $theme->id }}">--}}
        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke="currentColor" width="20"--}}
        {{--                                         height="20">--}}
        {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
        {{--                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>--}}
        {{--                                    </svg>--}}
        {{--                                </button>--}}

        {{--                                --}}{{--Модльное окно--}}

        {{--                                <div class="modal fade" id="modalDelete{{ $theme->id }}" data-bs-backdrop="static" data-bs-keyboard="false"--}}
        {{--                                     tabindex="-1"--}}
        {{--                                     aria-labelledby="staticBackdropLabel"--}}
        {{--                                     aria-hidden="true">--}}
        {{--                                    <div class="modal-dialog">--}}
        {{--                                        <div class="modal-content">--}}
        {{--                                            <div class="modal-header">--}}
        {{--                                                <h5 class="modal-title" id="staticBackdropLabel">Удаление раздела</h5>--}}
        {{--                                            </div>--}}
        {{--                                            <div class="fs-6 p-3">--}}
        {{--                                                <div class="fs-5 mb-2">Внимание!</div>--}}
        {{--                                                <div>После удаления, восстановление данных невозможно! Вместе с разделом <u class="text-danger">удаляются--}}
        {{--                                                        все--}}
        {{--                                                        подразделы!</u></div>--}}
        {{--                                            </div>--}}
        {{--                                            <div class="modal-footer">--}}
        {{--                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>--}}
        {{--                                                <button type="submit" class="btn btn-success">Удалить</button>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                --}}{{--Конец модльного окна--}}


        {{--                            </form>--}}
        {{--                            --}}{{--Конец кнопки удаления--}}
        {{--                        @endcan--}}
        {{--                    </h2>--}}

        {{--                    <div id="collapse{{$theme->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$theme->id}}"--}}
        {{--                         data-bs-parent="#accordionExample">--}}
        {{--                        <div class="accordion-body pb-0">--}}
        {{--                            <ul class="list-unstyled">--}}
        {{--                                @foreach($articles as $article)--}}
        {{--                                    @if($article->theme_id === $theme->id)--}}
        {{--                                        <li>--}}
        {{--                                            <a class="nav-link px-0 text-black" href="{{ route('articles.show', ['article' => $article->id]) }}"><span--}}
        {{--                                                    class="text-success">#</span>{{ $article->title }}</a>--}}
        {{--                                        </li>--}}
        {{--                                    @endif--}}
        {{--                                @endforeach--}}
        {{--                            </ul>--}}
        {{--                            @can('admin')--}}
        {{--                                <hr>--}}
        {{--                                <a href="{{ route('articles.create', ['themeId' => $theme->id]) }}" class="nav-link text-muted p-0 mb-3">Добавить--}}
        {{--                                    новую--}}
        {{--                                    статью--}}
        {{--                                    сюда</a>--}}
        {{--                            @endcan--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            @endforeach--}}

        {{--            </div>--}}
        {{--            </div>--}}

    @else


        <div class="alert container text-center alert-warning alert-dismissible fade show mt-3" role="alert">
            Ваш аккаунт не активирован! Пожалуйста обратитесь к руководителю!
        </div>


    @endcan

@endsection

@push('scripts-footer')
    @livewireScripts
@endpush
