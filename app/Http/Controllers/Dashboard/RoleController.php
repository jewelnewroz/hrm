<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index')->with(['title' => 'Roles']);
    }

    public function create()
    {
        return view('admin.role.create')->with(['title' => 'Add new role']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'))->with(['title' => 'View role']);
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'))->with(['title' => 'Update role']);
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
