<?php

namespace App\Http\View\Composers;

use App\Services\PermissionService;
use Illuminate\View\View;

class PermissionComposer
{
    private PermissionService $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function compose(View $view)
    {
        $view->with('permissions', $this->permissionService->grouped());
    }
}
