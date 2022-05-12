<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): bool|null
    {
        if ($user->hasVerifiedEmail()) {
            return null;
        }

        return false;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Like $like): bool
    {
        return $user->id === $like->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function delete(User $user, Like $like): bool
    {
        return $user->id === $like->user_id;
    }
}
