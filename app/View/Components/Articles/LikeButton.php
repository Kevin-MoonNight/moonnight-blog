<?php

namespace App\View\Components\Articles;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class LikeButton extends Component
{
    public Collection $likes;
    public Article $article;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->likes = $article->likes()->get();
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.articles.like-button');
    }
}
