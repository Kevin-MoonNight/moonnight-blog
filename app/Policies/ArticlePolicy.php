<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isAuthor()) {
            return null;
        }

        return false;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }

    public function restore(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }

    public function forceDelete(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }
}
