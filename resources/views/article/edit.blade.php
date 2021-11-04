@extends('.layouts.index')

@section('title', $article->name)

@push('scripts-head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .note-editor .dropdown-toggle::after {
            all: unset;
        }

        .note-editor .note-dropdown-menu {
            box-sizing: content-box;
        }

        .note-editor .note-modal-footer {
            box-sizing: content-box;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-ru-RU.min.js"></script>
@endpush

@section('body')


    <div class="display-3 container my-4 d-flex justify-content-center">
        Редактирование статьи
    </div>

    <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="POST" class="container form-control border-0">

        @csrf
        @method('put')


        <div class="mb-2">
            <label for="title" class="form-label">Название статьи</label>
            <input type="text" name="name" class="form-control shadow" id="title" placeholder="Введите название статьи" autocomplete="off"
                   value="{{ $article->title }}">
        </div>

        <div class="mb-2">
            <label for="theme" class="form-label">Выберите тему, к которой будет привязана статья</label>
            <select name="theme" class="form-select shadow" id="theme">
                @foreach($themes as $theme)
                    @if($theme->id == $article->theme_id)
                        <option value="{{ $theme->id }}" selected>{{ $theme->name }}</option>
                    @else
                        <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label for="photo" class="form-label">Фотка к статье</label>
            <input type="file" name="photo" class="form-control shadow @error('photo') is-invalid @enderror" id="photo" value="{{ old('photo') }}"
                   placeholder="Фото к статье" accept="image/svg+xml,image/png,image/jpeg">
            @error('photo')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="body" class="form-label">Статья</label>
            <div class="shadow">
                <textarea id="summernote" class="visually-hidden" name="body">{{ $article->body }}</textarea>
                <div id="summernote"></div>
            </div>

        </div>

        </div>
        <div class="mt-3 p-0 d-flex justify-content-end container">
            <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-secondary me-1">Отмена</a>
            <button type="submit" class="btn btn-success mt">Сохранить</button>
        </div>
    </form>



@endsection

@push('scripts-footer')
    <script>
        $('#summernote').summernote({
            placeholder: 'Начни писать статью здесь',
            lang: 'ru-RU',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['italic', 'bold', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname', 'fontsize', 'height', 'color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['hr', 'link', 'picture', 'video', 'table']],
                ['edit', ['undo', 'redo']],
                ['view', ['help']],

            ]
        });
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
@endpush
