<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        Role::create([
            'name' => Str::ucfirst(\request('name')),
            'slug' => Str::slug(Str::lower(\request('name')))
        ]);
        session()->flash('role-success', 'Role is created');
        return back();
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $role->name = Str::ucfirst(\request('name'));
        $role->slug = Str::slug(Str::lower(\request('name')));
        if ($role->isDirty('name')) {
            session()->flash('role-update', 'Role is updated: ' . $role->name);
            $role->save();
        } else {
            session()->flash('role-update', 'Nothing is changed of the role.');
        }

        return back();
    }

    public function show(Role $role)
    {

    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('role-delete', 'Role is deleted');
        return back();
    }
}
