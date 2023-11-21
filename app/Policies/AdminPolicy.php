<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class AdminPolicy
{
    public function index(User $user) {
        $roles = $user->roles()->get();
        return $roles->filter(function (Role $role) {
            return $role->can_manage_admins;
        })->count() > 0;
    }
}
