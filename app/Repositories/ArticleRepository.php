<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class ArticleRepository
{
    private Model $article;

    public function __construct()
    {
        $this->article = app(Article::class);
    }

    public static function getUserArticleQuery(User $user): Builder
    {
        if ($user->isAdmin()) {
            return Article::query();
        }

        return $user->articles()->getQuery();
    }

    public static function getUserTrashArticleQuery(User $user): Builder
    {
        if ($user->isAdmin()) {
            return Article::onlyTrashed();
        }

        return $user->articles()->onlyTrashed()->getQuery();
    }

    public function getPublishedArticles(array $filters)
    {
        return $this->article->published()->filter($filters)->with(['author', 'likes'])->latest()->paginate(10)->withQueryString();
    }

    public function getPopularArticles()
    {
        return $this->article->Published()->Popular()->take(10)->get();
    }
}
