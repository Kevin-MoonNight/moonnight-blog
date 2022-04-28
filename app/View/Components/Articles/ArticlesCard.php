<?php

namespace App\View\Components\Articles;

use App\Models\Article;
use Illuminate\View\Component;

class ArticlesCard extends Component
{
    public Article $article;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.articles.articles-card');
    }
}
