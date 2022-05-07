<?php

namespace App\Repositories;

use App\Models\Like;
use App\Models\User;
use \Illuminate\Database\Eloquent\Builder;

class LikeRepository
{
    private static Builder $like;

    public function __construct()
    {
        static::$like = Like::query();
    }

    public static function getUserLikeQuery(User $user): Builder
    {
        return $user->likes()->getQuery();
    }
}
