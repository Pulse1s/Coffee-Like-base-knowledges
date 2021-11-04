<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller {

    public function __construct() {
        $this->authorizeResource(Article::class, 'article');
    }

    public function show(Article $article) {

        return view('article.show', compact('article'));
    }

    public function create($selectTheme, Theme $theme) {

        $themes = $theme->select('id', 'name')->orderBy('id')->get();

        return view('article.create', compact('themes', 'selectTheme'));
    }

    public function store(Request $request, Article $article) {

        $request->validate([
            'name' => 'required|max:70|unique:App\Models\Article,title',
            'theme' => 'required|numeric',
            'body' => 'nullable',
        ]);

        $article = $article->create([
            'title' => $request->name,
            'theme_id' => $request->theme,
            'body' => $request->body
        ]);

        session()->flash('success', "Статья \"{$request->name}\" успешно создана!");

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    public function edit(Article $article, Theme $theme) {

        $themes = $theme->all();

        return view('article.edit', compact('article', 'themes'));
    }

    public function update(Request $request, Article $article) {

        $request->validate([
            'name' => ['required', 'max:70', Rule::unique('articles', 'title')->ignore($article->id)],
            'theme' => 'required|numeric',
            'body' => 'nullable',
        ]);

        $article->update([
            'title' => $request->name,
            'theme_id' => $request->theme,
            'body' => $request->body
        ]);

        session()->flash('success', "Статья \"{$request->name}\" успешно отредактирована!");

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    public function destroy(Article $article) {

        $article->delete();

        session()->flash('success', 'Статья "' . $article->title . '" успешно удалена!');

        return redirect()->route('themes.index');
    }

}
