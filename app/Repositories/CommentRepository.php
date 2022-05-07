<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\User;
use \Illuminate\Database\Eloquent\Builder;

class CommentRepository
{
    private Builder $comment;

    public function __construct()
    {
        $this->comment = Comment::query();
    }

    public static function getUserCommentQuery(User $user): Builder
    {
        if ($user->isAdmin()) {
            return Comment::query();
        }

        return $user->comments()->getQuery();
    }
}
