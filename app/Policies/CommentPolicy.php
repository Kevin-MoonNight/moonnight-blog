<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->hasVerifiedEmail()) {
            return null;
        }

        return false;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user->id;
    }

    public function delete(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user->id;
    }
}
