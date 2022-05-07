<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(Request $request)
    {
        $articles = $this->articleRepository->getPublishedArticles($request->all());

        return view('frontend.articles', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        if ($article->getAttribute('state')) {
            //新增觀看數
            $article->views += 1;
            //更新文章
            $article->save();

            $article->load('comments.replies', 'comments.user');

            return view('articles.show', ['article' => $article]);
        }

        return abort(404);
    }
}
