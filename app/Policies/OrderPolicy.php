<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view the index.
     */
    public function index(User $user): bool
    {
        $roles = $user->roles()->get();
        return $roles->filter(function ($role) {
            return $role->can_manage_orders;
        }) > 0;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function show(User $user): bool
    {
        $roles = $user->roles()->get();
        return $roles->filter(function ($role) {
            return $role->can_manage_orders;
        }) > 0;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        $roles = $user->roles()->get();
        return $roles->filter(function ($role) {
            return $role->can_manage_orders;
        }) > 0;
    }
}
