<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Services\BranchService;

class BranchComposer
{
    private BranchService $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('branch_lists', $this->branchService->all());
    }
}
