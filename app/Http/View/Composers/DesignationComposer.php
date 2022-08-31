<?php


namespace App\Http\View\Composers;


use App\Services\DesignationService;
use Illuminate\View\View;

class DesignationComposer
{
    private DesignationService $designationService;

    public function __construct(DesignationService $designationService)
    {
        $this->designationService = $designationService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('designations', $this->designationService->all());
    }
}
