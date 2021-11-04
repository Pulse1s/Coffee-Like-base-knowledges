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

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center container col-12 col-lg-7">

            <h1 class="display-1 mt-3 mb-4">База данных</h1>
            <p class="lead">С помощью этого примера Bootstrap быстро создайте эффективную таблицу цен для ваших
                потенциальных
                клиентов. Он построен с использованием компонентов и утилит Bootstrap по умолчанию с небольшой
                настройкой.</p>

            <livewire:search/>
        </div>

        @can('admin')
            <div class="bg-secondary bg-opacity-25">
                <div class="container d-flex justify-content-center py-5 col-11 col-lg-7">
                    <form class="input-group flex-nowrap" method="POST" action="{{ route('themes.store') }}">
                        @csrf
                        <div class="form-floating flex-grow-1">
                            <input type="text" name="name" autocomplete="off"
                                   class="form-control rounded-0 shadow rounded-start @error('name') is-invalid @enderror"
                                   id="floatingInput" placeholder="name@example.com0
                               value="{{ old('name') }}">
                            <label for="floatingInput" class="text-muted text-truncate">Название нового раздела</label>
                            @error('name')
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-success col-4 col-md-3 shadow" type="submit" style="height: 3.625rem;">Добваить</button>
                    </form>
                </div>
            </div>
        @endcan

        @foreach($themes as $theme)

            <div style="@if($loop->odd) background-color: #f5f5f5; @endif">
                <div class="pricing-header p-3 pt-md-1 pb-md-4 mx-auto text-center container">
                    <h1 class="mb-5 mt-4 d-flex justify-content-center align-items-end">
                        <span class="me-1 display-4">{{ $theme->name }}</span>

                        @can('admin')
                            {{--Кнопка редактирования--}}
                            <form action="{{ route('themes.update', ['theme' => $theme->id]) }}" method="POST"
                                  class="d-flex align-items-center">

                                @csrf
                                @method('put')

                                <button class="text-black btn d-flex align-items-center shadow-none px-1 mb-md-2" type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate{{ $theme->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="1.5rem" height="1.5rem" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </button>

                                {{--Модльное окно--}}
                                <div class="modal fade" id="modalUpdate{{ $theme->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                     tabindex="-1"
                                     aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Редактирование раздела</h5>
                                            </div>
                                            <div class="fs-6 p-3 border-bottom underline text-start">
                                                <div class="fs-5 mb-2">Внимание!</div>
                                                <div>Название раздела должно быть уникальным, и содержать не более 70 символов!
                                                </div>
                                            </div>
                                            <div class="p-3">
                                                <textarea name="rename"
                                                          class="form-control" placeholder="Введите новое название рздела"></textarea>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                                                <button type="submit" class="btn btn-success">Изменить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Конец модльного окна--}}

                            </form>
                            {{--Конец кнопки редактирования--}}

                            {{--Кнопка удаления--}}
                            <form action="{{ route('themes.destroy', ['theme' => $theme->id]) }}" method="POST" class="d-flex align-items-center">

                                @csrf
                                @method('delete')

                                <button class="text-black btn d-flex align-items-center shadow-none px-1 mb-md-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $theme->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" fill="none" width="1.5rem" height="1.5rem"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>

                                {{--Модльное окно--}}
                                <div class="modal fade" id="modalDelete{{ $theme->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                     tabindex="-1"
                                     aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Удаление раздела</h5>
                                            </div>
                                            <div class="fs-6 p-3 text-start">
                                                <div class="fs-4 mb-2">Внимание!</div>
                                                <div>После удаления, восстановление данных невозможно!
                                                    Вместе
                                                    с разделом <u
                                                        class="text-danger">удаляются
                                                        все
                                                        подразделы!</u></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                                                <button type="submit" class="btn btn-success">Удалить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Конец модльного окна--}}

                            </form>
                            {{--Конец кнопки удаления--}}
                        @endcan

                    </h1>

                    <div class="d-flex flex-wrap gap-4 justify-content-center">

                        @foreach($articles as $article)
                            @if($article->theme_id === $theme->id)
                                <div class="card shadow-sm" style="width: 18rem;">
                                    <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="text-decoration-none text-black">

                                        <img src="
                                        @if(file_exists('storage/articles/' . $article->id . '/' . $article->photo))
                                        {{ asset('storage/articles/' . $article->id . '/' . $article->photo) }}
                                        @else
                                        {{ asset('files/img/placeholder1.jpg') }}
                                        @endif
                                            "
                                             class="card-img-top" height="161" width="286" alt="{{ $article->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title m-0">{{ $article->title }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach

                        @can('admin')
                            <div class="card shadow-sm" style="width: 18rem;">
                                <a href="{{ route('articles.create', ['themeId' => $theme->id]) }}"
                                   class="text-decoration-none rounded text-black d-flex justify-content-center align-items-center h-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary text-opacity-50" width="13rem" height="13rem"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </a>
                            </div>
                        @endcan

                    </div>
                </div>
            </div>

        @endforeach

    @else


        <div class="alert container text-center alert-warning alert-dismissible fade show mt-3" role="alert">
            Ваш аккаунт не активирован! Пожалуйста обратитесь к руководителю!
        </div>


    @endcan
@endsection

@push('scripts-footer')
    @livewireScripts
@endpush
