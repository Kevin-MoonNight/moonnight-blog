<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before(?User $user, $ability): ?bool
    {
        if (optional($user)->isAdmin() || optional($user)->isCustomerService()) {
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

    public function create(?User $user): bool
    {
        return true;
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
