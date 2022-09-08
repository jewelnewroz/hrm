<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->assignRole(request()->input('role'));
    }

    public function updated(User $user)
    {

    }
}
