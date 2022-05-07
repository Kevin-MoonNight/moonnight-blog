<?php

namespace App\View\Components\Articles;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticlesCard extends Component
{
    public Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function render(): View
    {
        return view('components.articles.articles-card');
    }
}
