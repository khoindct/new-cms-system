<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store()
    {
        request()->validate([
           'name' => 'required'
        ]);
        Permission::create([
            'name' => Str::ucfirst(Str::lower(request('name'))),
            'slug' => Str::slug(Str::lower(\request('name')))
        ]);
        session()->flash('permission-create', 'Permission is created');
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('permission-delete', 'Permission is deleted');
        return back();
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required'
        ]);
        $permission->name = Str::ucfirst(Str::lower(request('name')));
        $permission->slug = Str::slug(Str::lower(\request('name')));

        if ($permission->isClean()) {
            session()->flash('permission-update', 'Nothing is changed');
        } else {
            session()->flash('permission-update', 'Permission is updated');
            $permission->save();
        }
        return back();
    }
}
