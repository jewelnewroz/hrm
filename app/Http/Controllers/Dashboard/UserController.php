<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index')->with(['title' => 'Users']);
    }

    public function create()
    {
        return view('admin.user.create')->with(['title' => 'Add new user']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'))->with(['title' => 'View user']);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'))->with(['title' => 'Update user']);
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
