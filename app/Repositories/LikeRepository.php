<?php

namespace App\Repositories;

use App\Models\User;
use \Illuminate\Database\Eloquent\Builder;

class LikeRepository
{
    public static function getUserLikeQuery(User $user): Builder
    {
        return $user->likes()->getQuery();
    }
}
