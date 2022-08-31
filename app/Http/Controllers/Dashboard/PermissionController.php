<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.index')->with(['title' => 'Permissions']);
    }

    public function create()
    {
        return view('admin.permission.create')->with(['title' => 'Add new permission']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Permission $permission)
    {
        return view('admin.permission.show', compact('permission'))->with(['title' => 'View permission']);
    }

    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'))->with(['title' => 'Update permission']);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
