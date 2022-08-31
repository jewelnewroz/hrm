<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\UserRepository;

class DepartmentComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $department;

    /**
     * Create a new profile composer.
     *
     * @param DepartmentRepositoryInterface $department
     */
    public function __construct(DepartmentRepositoryInterface $department)
    {
        $this->department = $department;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('department_dropdowns', $this->department->all());
    }
}
