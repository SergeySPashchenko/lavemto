<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompanySetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanySettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the companySetting can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the companySetting can view the model.
     */
    public function view(User $user, CompanySetting $model): bool
    {
        return true;
    }

    /**
     * Determine whether the companySetting can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the companySetting can update the model.
     */
    public function update(User $user, CompanySetting $model): bool
    {
        return true;
    }

    /**
     * Determine whether the companySetting can delete the model.
     */
    public function delete(User $user, CompanySetting $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the companySetting can restore the model.
     */
    public function restore(User $user, CompanySetting $model): bool
    {
        return false;
    }

    /**
     * Determine whether the companySetting can permanently delete the model.
     */
    public function forceDelete(User $user, CompanySetting $model): bool
    {
        return false;
    }
}
