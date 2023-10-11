<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FoodPolicy
{
    public function index(User $user): bool {
        return $this->hasFoodRelatedRole($user);
    }

    public function canAccessFood(User $user): bool {
        return $this->hasFoodRelatedRole($user);
    }

    private function hasFoodRelatedRole(User $user) {
        $roles = $user->roles()->get();
        return $roles->filter(function (Role $role) {
            return $role->can_manage_foods;
        })->count() > 0;
    }
}
