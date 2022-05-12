<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\RedirectResponse;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): bool|RedirectResponse|null
    {
        if (is_null($user)) {
            return redirect()->guest(route('login'));
        }

        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, User $model): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, User $model): bool
    {
        return false;
    }

    public function delete(User $user, User $model): bool
    {
        return false;
    }

    public function restore(User $user, User $model): bool
    {
        return false;
    }

    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
