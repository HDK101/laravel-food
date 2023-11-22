<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admin = Role::find(2);
        $admins = $admin->users;
        return view('admin.index', [
            'admins' => $admins,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    public function edit(int $id)
    {
        $user = User::find($id);
        return view('admin.edit', [
            'admin' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->input());
        $user->roles()->sync([2]);
        $user->save();
        return redirect()->route('admins.index');
    }

    public function update(User $user, Request $request)
    {
        $user->fill($request->input());
        $user->save();
        return redirect()->route('admins.index');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index');
    }
}
