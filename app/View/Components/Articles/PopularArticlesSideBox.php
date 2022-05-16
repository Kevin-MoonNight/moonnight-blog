<?php

namespace App\View\Components\Articles;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PopularArticlesSideBox extends Component
{
    public Collection $articles;

    public function __construct()
    {
        $this->articles = Article::published()->Popular()->take(10)->get();
    }

    public function render(): View
    {
        return view('components.articles.popular-articles-side-box');
    }
}
