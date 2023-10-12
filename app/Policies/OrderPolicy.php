<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    public function canManageOrders(User $user) {
        $roles = $user->roles()->get();
        return $roles->filter(function (Role $role) {
            return $role->can_manage_orders;
        }) > 0;
    }

    public function canOrder(User $user) {
        $roles = $user->roles()->get();
        return $roles->filter(function (Role $role) {
            return $role->can_order;
        })->isNotEmpty();
    }
}
