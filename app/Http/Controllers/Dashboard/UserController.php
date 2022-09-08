<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        if($request->wantsJson()) {
            return $this->userService->getDatatable($request);
        }
        return view('admin.user.index')->with(['title' => 'Users']);
    }

    public function create()
    {
        return view('admin.user.create')->with(['title' => 'Add new user']);
    }

    public function store(UserCreateRequest $request): RedirectResponse
    {
        try {
            if($this->userService->create($request)) {
                return redirect()->route('user.index')->with(ResponseHelper::success(__('User successfully created')));
            }
        } catch (\Exception $exception) {
            Log::error('User Create ' . $exception);
        }

        return redirect()->back()->with(ResponseHelper::failed(__('User cannot be created')))->withInput($request->all());
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'))->with(['title' => 'View user']);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'))->with(['title' => 'Update user']);
    }

    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        try {
            if($this->userService->update($request, $id)) {
                return redirect()->route('user.index')->with(ResponseHelper::success(__('User successfully updated')));
            }
        } catch (\Exception $exception) {
            Log::error('User Create ' . $exception);
        }

        return redirect()->back()->with(ResponseHelper::failed(__('User cannot be updated')))->withInput($request->all());
    }

    public function destroy($id): RedirectResponse
    {
        try {
            if($this->userService->delete($id)) {
                return redirect()->back()->with(ResponseHelper::failed(__('User successfully deleted')));
            }
        } catch (\Exception $exception) {
            Log::error('User Create ' . $exception);
        }

        return redirect()->back()->with(ResponseHelper::failed(__('Cannot delete user')));
    }
}
