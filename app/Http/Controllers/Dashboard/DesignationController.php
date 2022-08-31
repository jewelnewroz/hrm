<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        return view('admin.designation.index')->with(['title' => 'Designations']);
    }

    public function create()
    {
        return view('admin.designation.create')->with(['title' => 'Add new designation']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Designation $designation)
    {
        return view('admin.designation.show', compact('designation'))->with(['title' => 'View designation']);
    }

    public function edit(Designation $designation)
    {
        return view('admin.designation.edit', compact('designation'))->with(['title' => 'Update designation']);
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
