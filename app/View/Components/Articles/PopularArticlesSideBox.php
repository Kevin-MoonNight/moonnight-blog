<?php

namespace App\View\Components\Articles;

use App\Repositories\ArticleRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PopularArticlesSideBox extends Component
{
    private ArticleRepository $articleRepository;
    public Collection $articles;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->articles = $this->articleRepository->getPopularArticles();
    }

    public function render(): View
    {
        return view('components.articles.popular-articles-side-box');
    }
}
