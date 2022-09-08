<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private RoleService $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    public function index(Request $request)
    {
        if($request->wantsJson()) {
            return $this->roleService->getDatatable($request);
        }
        return view('admin.role.index')->with(['title' => 'Roles']);
    }

    public function create()
    {
        return view('admin.role.create')->with(['title' => 'Add new role']);
    }

    public function store(RoleCreateRequest $request): RedirectResponse
    {
        try {
            if($this->roleService->create($request)) {
                return redirect()->route('role.index')->with(ResponseHelper::success(__('Role successfully created')));
            }
        } catch (\Exception $exception) {
            Log::error('Role Create ' . $exception);
        }

        return redirect()->back()->with(ResponseHelper::failed(__('Role cannot be created')))->withInput($request->all());
    }

    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'))->with(['title' => 'View role']);
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'))->with(['title' => 'Update role']);
    }

    public function update(RoleUpdateRequest $request, $id): RedirectResponse
    {
        try {
            if($this->roleService->update($request, $id)) {
                return redirect()->route('role.index')->with(ResponseHelper::success(__('Role successfully updated')));
            }
        } catch (\Exception $exception) {
            Log::error('Role Update ' . $exception);
        }

        return redirect()->back()->with(ResponseHelper::failed(__('Role cannot be updated')))->withInput($request->all());
    }

    public function destroy($id): RedirectResponse
    {
        try {
            if($this->roleService->delete($id)) {
                return redirect()->back()->with(ResponseHelper::failed(__('Role successfully deleted')));
            }
        } catch (\Exception $exception) {
            Log::error('Role delete ' . $exception);
        }

        return redirect()->back()->with(ResponseHelper::failed(__('Cannot delete role')));
    }
}
