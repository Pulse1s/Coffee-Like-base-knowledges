<div class="py-5 my-3 text-center">
    <div class="container position-relative">

        <div class="form-floating mb-3">
            <input class="form-control" type="text" wire:model="word" placeholder="Поиск по базе знаний">
            <label for="floatingInput" class="text-muted">Поиск по базе знаний</label>
        </div>

        @if($articles)
            <div class="list-group text-start position-absolute" style="z-index: 1000">
                @foreach($articles as $article)
                    @if(!$loop->first && $articles[$loop->index]->theme_id != $articles[($loop->index)-1]->theme_id)
                        <div class="list-group-item border-bottom-0 p-0">
                            <div class="px-3 pt-2 pb-1 border-top text-decoration-underline fs-5">{{ $article->theme->name }}</div>
                            <a class="nav-link text-black" href="{{ route('articles.show', ['article' => $article->id]) }}"><span
                                    class="text-success">#</span>{{ $article->title }}</a>
                        </div>
                    @elseif($loop->first)
                        <div class="list-group-item border-bottom-0 p-0">
                            <div class="px-3 pt-2 pb-1 border-top text-decoration-underline fs-5">{{ $article->theme->name }}</div>
                            <a class="nav-link text-black" href="{{ route('articles.show', ['article' => $article->id]) }}"><span
                                    class="text-success">#</span>{{ $article->title }}</a>
                        </div>
                    @else
                        <div class="list-group-item border-bottom-0 p-0">
                            <a class="nav-link text-black" href="{{ route('articles.show', ['article' => $article->id]) }}"><span
                                    class="text-success">#</span>{{ $article->title }}</a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>


</div>
