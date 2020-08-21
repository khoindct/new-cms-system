<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
        ]);

        if (request('avatar')) {
            $inputs['avatar'] = \request('avatar')->store('images');
        }
        $user->update($inputs);

        return back();
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.profile', compact('user', 'roles'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('message', 'User is deleted.');
        return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));
        return back();
    }
}
