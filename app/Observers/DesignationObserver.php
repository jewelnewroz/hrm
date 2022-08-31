<?php

namespace Larabill\Observers;

use Larabill\Models\Designation;

class DesignationObserver
{
    /**
     * Handle the designation "created" event.
     *
     * @param  Designation  $designation
     * @return void
     */
    public function created(Designation $designation)
    {
        //
    }

    /**
     * Handle the designation "updated" event.
     *
     * @param  Designation  $designation
     * @return void
     */
    public function updated(Designation $designation)
    {
        //
    }

    /**
     * Handle the designation "deleted" event.
     *
     * @param  Designation  $designation
     * @return void
     */
    public function deleted(Designation $designation)
    {
        //
    }

    /**
     * Handle the designation "restored" event.
     *
     * @param  Designation  $designation
     * @return void
     */
    public function restored(Designation $designation)
    {
        //
    }

    /**
     * Handle the designation "force deleted" event.
     *
     * @param  Designation  $designation
     * @return void
     */
    public function forceDeleted(Designation $designation)
    {
        //
    }
}
