<?php

namespace App\Policies;

use App\Filament\Resources\OrdenesResource\RelationManagers\RevisionesRelationManager;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RevisionesRelationManagerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin', 'Empleado']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RevisionesRelationManager $revisionesRelationManager): bool
    {
        return $user->hasRole(['Admin', 'Empleado']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['Admin', 'Empleado']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RevisionesRelationManager $revisionesRelationManager): bool
    {
        return $user->hasRole(['Admin', 'Empleado']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RevisionesRelationManager $revisionesRelationManager): bool
    {
        return $user->hasRole(['Admin', 'Empleado']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RevisionesRelationManager $revisionesRelationManager): bool
    {
        return $user->hasRole(['Admin', 'Empleado']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RevisionesRelationManager $revisionesRelationManager): bool
    {
        return $user->hasRole(['Admin', 'Empleado']);
    }
}
