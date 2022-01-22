<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before(?User $user, $ability): ?bool
    {
        if (optional($user)->isAdmin()) {
            return true;
        }

        return null;
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function dashboard(User $user): bool
    {
        return $user->isAuthor();
    }

    public function view(?User $user, Article $article): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAuthor();
    }

    public function update(User $user, Article $article): bool
    {
        return $user->isAuthor() && $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->isAuthor() && $user->id === $article->user_id;
    }

    public function draft(User $user)
    {
        return $user->isAuthor();
    }

    public function trashed(User $user)
    {
        return $user->isAuthor();
    }

    public function restore(User $user, Article $article)
    {
        return $user->isAuthor() && $user->id === $article->user_id;
    }

    public function forceDelete(User $user, Article $article)
    {
        return $user->isAuthor() && $user->id === $article->user_id;
    }
}
