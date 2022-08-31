<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Services\RoleService;

class RoleComposer
{
    protected RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('roles', $this->roleService->all());
    }
}
