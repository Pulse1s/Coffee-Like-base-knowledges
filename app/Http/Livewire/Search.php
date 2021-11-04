<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Search extends Component {

    public $articles;
    public $word = '';


    public function render() {

        if (!$this->word == '') {
            $word = '%' . $this->word . '%';
            $this->articles = Article::where('body', 'like', $word)->orderby('theme_id')->get();
        } else {
            $this->articles = '';
        }

        return view('livewire.search');
    }

}
