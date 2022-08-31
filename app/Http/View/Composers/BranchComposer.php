<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Services\Branches;

class BranchComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $branch;

    /**
     * Create a new profile composer.
     *
     * @param    $branch
     * @return void
     */
    public function __construct(Branches $branch)
    {
        // Dependencies automatically resolved by service container...
        $this->branch = $branch;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('branch_dropdowns', $this->branch->getDropdown());
    }
}
