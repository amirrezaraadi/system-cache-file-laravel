<?php

namespace App\Policies;

use App\Models\Panel\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the serviceUser can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the serviceUser can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the serviceUser can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the serviceUser can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the serviceUser can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the serviceUser can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the serviceUser can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}
