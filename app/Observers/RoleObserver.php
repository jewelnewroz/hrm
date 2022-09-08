<?php

namespace App\Observers;

use App\Models\Role;
use Illuminate\Support\Facades\Cache;

class RoleObserver
{
    public function __construct()
    {
        Cache::forget('roles');
    }
    public function created(Role $role)
    {
        $role->syncPermissions(request()->input('permission'));
    }

    public function updated(Role $role)
    {
        $role->syncPermissions(request()->input('permission'));
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  \App\Models\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }
}
