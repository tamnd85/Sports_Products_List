<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReplyPolicy
{
    /**
     * Determine whether the user can view any replies.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the reply.
     */
    public function view(User $user, Reply $reply): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create replies.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the reply.
     */
    public function update(User $user, Reply $reply): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the reply.
     */
    public function delete(User $user, Reply $reply): bool
    {
        // Only admin can delete replies
        return $user->is_admin
            ? Response::allow()
            : Response::deny('only admin can delete Replies.');
        }

    /**
     * Determine whether the user can restore the reply.
     */
    public function restore(User $user, Reply $reply): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the reply.
     */
    public function forceDelete(User $user, Reply $reply): bool
    {
        return false;
    }
}
