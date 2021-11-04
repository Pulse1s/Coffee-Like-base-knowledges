<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemeController extends Controller {

    public function __construct() {
        $this->authorizeResource(Theme::class, 'theme');
    }

    public function index(Article $article, Theme $theme) {

        $themes = $theme->all();
        $articles = $article->all();

        return view('test', compact('themes', 'articles'));
    }

    public function store(Request $request, Theme $theme) {

        $request->validate([
            'name' => 'required|max:70|unique:App\Models\Theme,name'
        ]);

        $theme->create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Тема "' . Str::upper($request->name) . '" успешно создана!');

        return back();
    }

    public function update(Request $request, Theme $theme) {

        $request->validate([
            'rename' => 'required|max:70|unique:App\Models\Theme,name'
        ]);

        $oldName = $theme->name;

        $theme->update([
            'name' => $request->rename
        ]);

        session()->flash('success', 'Тема "' . Str::upper($oldName) . '" успешно переименованна в "' . Str::upper($request->rename) . '"!');

        return back();
    }

    public function destroy(Theme $theme) {

        $theme->delete();

        session()->flash('success', 'Тема "' . Str::upper($theme->name) . '" успешно удалена!');

        return back();
    }

}
