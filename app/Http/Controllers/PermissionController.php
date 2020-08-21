<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {

    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }
}
