<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\RedirectResponse;

class MessagePolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability): bool|RedirectResponse|null
    {
        if (is_null($user)) {
            return redirect()->guest(route('login'));
        }

        if ($user->isAdmin() || $user->isCustomerService()) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Message $message): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Message $message): bool
    {
        return false;
    }

    public function delete(User $user, Message $message): bool
    {
        return false;
    }
}
