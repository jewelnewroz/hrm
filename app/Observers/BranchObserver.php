<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use App\Models\Branch;

class BranchObserver
{
    /**
     * Handle the branch "created" event.
     *
     * @param  Branch  $branch
     * @return void
     */
    public function created(Branch $branch)
    {
        Cache::forget('branches');
    }

    /**
     * Handle the branch "updated" event.
     *
     * @param  Branch  $branch
     * @return void
     */
    public function updated(Branch $branch)
    {
        Cache::forget('branches');
    }

    /**
     * Handle the branch "deleted" event.
     *
     * @param  Branch  $branch
     * @return void
     */
    public function deleted(Branch $branch)
    {
        Cache::forget('branches');
    }

    /**
     * Handle the branch "restored" event.
     *
     * @param  Branch  $branch
     * @return void
     */
    public function restored(Branch $branch)
    {
        Cache::forget('branches');
    }

    /**
     * Handle the branch "force deleted" event.
     *
     * @param  Branch  $branch
     * @return void
     */
    public function forceDeleted(Branch $branch)
    {
        Cache::forget('branches');
    }
}
