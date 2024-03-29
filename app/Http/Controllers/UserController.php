<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit', $user)->with('info', 'Se asignó los roles correctamente');;
    }


    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
