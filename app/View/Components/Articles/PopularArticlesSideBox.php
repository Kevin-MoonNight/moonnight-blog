<?php

namespace App\View\Components\Articles;

use App\Repositories\ArticleRepository;
use Illuminate\View\Component;

class PopularArticlesSideBox extends Component
{
    private ArticleRepository $articleRepository;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $articles = $this->articleRepository->getPopularArticles();

        return view('components.articles.popular-articles-side-box', ['articles' => $articles]);
    }
}
