<?php

namespace App\Policies;

use App\Models\CongeRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CongeRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->employee !== null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CongeRequest $congeRequest): bool
    {
        return $user->employee && ($user->employee->id === $congeRequest->employee_id || $user->role === 'admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employee !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CongeRequest $congeRequest): bool
    {
        return $user->role === 'rh';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CongeRequest $congeRequest): bool
    {
        return $user->employee && $user->employee->id === $congeRequest->employee_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CongeRequest $congeRequest): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CongeRequest $congeRequest): bool
    {
        return false;
    }

    /**
     * Determine whether the user can approve the model.
     */
    public function approve(User $user, CongeRequest $congeRequest): bool
    {
        return $user->role === 'rh';
    }
}
