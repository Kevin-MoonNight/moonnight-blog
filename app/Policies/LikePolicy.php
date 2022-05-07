<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\RedirectResponse;

class LikePolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): bool|RedirectResponse
    {
        if (is_null($user)) {
            return redirect()->guest(route('login'));
        }

        if ($user->isNormalUser()) {
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
