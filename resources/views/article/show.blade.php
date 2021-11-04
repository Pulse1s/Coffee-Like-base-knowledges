@extends('.layouts.index')

@section('title', $article->title)

@section('body')

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show container mt-2" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <h2 class="display-5 my-3">{{ $article->title }}</h2>
        <hr>
        @if($article->body == '')
            Подраздел пуст
        @else
            <div>{!! $article->body !!}</div>
        @endif
        <hr>
        <div class="mb-3 d-flex justify-content-between">

            <div class="d-flex flex-column text-muted small">
                @unless($article->updated_at == $article->created_at)
                    <span>Дата обновления:</span>
                    <span>{{ \Carbon\Carbon::parse($article->updated_at)->locale('ru_RU')->isoFormat('Do MMMM  YYYY, H:mm')  }}</span>
                @endunless
            </div>

            <div class="d-flex flex-column text-muted align-items-end small">
                <span>Дата создания:</span>
                <span>{{ \Carbon\Carbon::parse($article->created_at)->locale('ru_RU')->isoFormat('Do MMMM  YYYY, H:mm')  }}</span>
            </div>

        </div>

        @can('admin')
            <div class="mt-2 p-0 d-flex justify-content-end container">
                <form action="{{ route('articles.edit', ['article' => $article->id]) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success me-1">Изменить</button>
                </form>
                <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    {{--                <button type="submit" class="btn btn-danger">Удалить</button>--}}
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#modalDelete">Удалить
                    </button>

                    <div class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1"
                         aria-labelledby="staticBackdropLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Удаление статьи</h5>
                                </div>
                                <div class="fs-6 p-3">
                                    <div class="fs-5 mb-2">Внимание!</div>
                                    <div>После удаления, восстановление данных невозможно!</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        @endcan
    </div>

@endsection
