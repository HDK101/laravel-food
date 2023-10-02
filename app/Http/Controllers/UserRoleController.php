<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function edit() {
        return view('users.roles.edit');
    }

    public function store(string $userId, string $roleId) {
        $user = User::findOrFail($userId);
        $role = Role::findOrFail($roleId);
        $user->roles()->save($role);
        $user->save();
    }

    public function destroy(string $userId, $roleId) {
        $user = User::findOrFail($userId);
        $role = Role::findOrFail($roleId);
        $user->roles()->dissociate($role);
        $user->save();
    }
}
