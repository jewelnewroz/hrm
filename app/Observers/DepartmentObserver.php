<?php

namespace Larabill\Observers;

use Larabill\Models\Department;

class DepartmentObserver
{
    /**
     * Handle the department "created" event.
     *
     * @param  Department  $department
     * @return void
     */
    public function created(Department $department)
    {
        //
    }

    /**
     * Handle the department "updated" event.
     *
     * @param  Department  $department
     * @return void
     */
    public function updated(Department $department)
    {
        //
    }

    /**
     * Handle the department "deleted" event.
     *
     * @param  Department  $department
     * @return void
     */
    public function deleted(Department $department)
    {
        //
    }

    /**
     * Handle the department "restored" event.
     *
     * @param  Department  $department
     * @return void
     */
    public function restored(Department $department)
    {
        //
    }

    /**
     * Handle the department "force deleted" event.
     *
     * @param  Department  $department
     * @return void
     */
    public function forceDeleted(Department $department)
    {
        //
    }
}
