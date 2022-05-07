<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\RedirectResponse;

class TagPolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): bool|RedirectResponse
    {
        if (is_null($user)) {
            return redirect()->guest(route('login'));
        }

        if ($user->isAdmin() || $user->isAuthor()) {
            return true;
        }

        return false;
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Tag $tag): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Tag $tag): bool
    {
        return false;
    }

    public function delete(User $user, Tag $tag): bool
    {
        return false;
    }
}
