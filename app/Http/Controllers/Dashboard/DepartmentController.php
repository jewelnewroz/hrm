<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.department.index')->with(['title' => 'Department']);
    }

    public function create()
    {
        return view('admin.department.create')->with(['title' => 'Add new department']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Department $department)
    {
        return view('admin.department.show', compact('department'))->with(['title' => 'View department']);
    }

    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'))->with(['title' => 'Update department']);
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
