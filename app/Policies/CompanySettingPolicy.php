<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\CompanySetting;
use App\Models\User;

class CompanySettingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any CompanySetting');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CompanySetting $companysetting): bool
    {
        return $user->can('view CompanySetting');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create CompanySetting');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CompanySetting $companysetting): bool
    {
        return $user->can('update CompanySetting');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CompanySetting $companysetting): bool
    {
        return $user->can('delete CompanySetting');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CompanySetting $companysetting): bool
    {
        return $user->can('restore CompanySetting');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CompanySetting $companysetting): bool
    {
        return $user->can('force-delete CompanySetting');
    }
}
