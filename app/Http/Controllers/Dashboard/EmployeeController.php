<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index')->with(['title' => 'Employees']);
    }

    public function create()
    {
        return view('admin.employee.create')->with(['title' => 'Add new employee']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Employee $employee)
    {
        return view('admin.employee.show', compact('employee'))->with(['title' => 'View employee']);
    }

    public function edit(Employee $employee)
    {
        return view('admin.employee.edit', compact('employee'))->with(['title' => 'Edit employee']);
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
