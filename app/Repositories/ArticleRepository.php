<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ArticleRepository
{
    private Model $article;

    public function __construct()
    {
        $this->article = app(Article::class);
    }

    public function getUserPublishedArticles(User $user, array $filters)
    {
        if ($user->isAdmin()) {
            return $this->getPublishedArticles($filters);
        }

        return $user->articles()->published()->filter($filters)->latest()->paginate(10)->withQueryString();
    }

    public function getUserDraftArticles(User $user, array $filters)
    {
        if ($user->isAdmin()) {
            return $this->getDraftArticles($filters);
        }

        return $user->articles()->draft()->filter($filters)->latest()->paginate(10)->withQueryString();
    }

    public function getUserTrashedArticles(User $user, array $filters)
    {
        if ($user->isAdmin()) {
            return $this->getTrashedArticles($filters);
        }

        return $user->articles()->onlyTrashed()->filter($filters)->latest()->paginate(10)->withQueryString();
    }

    public function getPublishedArticles(array $filters)
    {
        return $this->article->published()->filter($filters)->latest()->paginate(10)->withQueryString();
    }

    public function getDraftArticles(array $filters)
    {
        return $this->article->draft()->filter($filters)->latest()->paginate(10)->withQueryString();
    }

    public function getTrashedArticles(array $filters)
    {
        return $this->article->onlyTrashed()->filter($filters)->latest()->paginate(10)->withQueryString();
    }

    public function findTrashed($slug)
    {
        return $this->article->onlyTrashed()->where('slug', $slug)->firstOrFail();
    }

    public function getPopularArticles()
    {
        return $this->article->Popular()->take(10)->get();
    }
}
