<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): ?bool
    {
        if (optional($user)->isNormalUser()) {
            return true;
        }

        return false;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function delete(User $user): bool
    {
        return true;
    }
}