<?php


namespace App\Http\View\Composers;


use App\Services\DepartmentService;
use Illuminate\View\View;

class DepartmentComposer
{
    private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('departments', $this->departmentService->all());
    }
}
