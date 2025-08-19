<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Review $review): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user !== null; // Only Logged-in users can create a review
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Review $review): Response
    {
        //Only  the owner of the review can update it
        return $user->id === $review->user_id
        ? Response::allow()
        : Response::deny('You can only edit your own reviews.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Review $review): Response
    {
        // Owner or admin can delete the review
        return $user->id === $review->user_id || $user->is_admin
        ? Response::allow()
        : Response::deny('Deleting is restricted to reviews authored by you.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Review $review): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Review $review): bool
    {
        return false;
    }
}
