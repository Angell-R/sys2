<?php

namespace App\Policies;

use App\Models\Ordenes;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrdenesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['Admin','Empleado']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ordenes $ordenes)
    {
        return $user->hasRole(['Admin','Empleado']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ordenes $ordenes)
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ordenes $ordenes)
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ordenes $ordenes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ordenes $ordenes)
    {
        //
    }
}
