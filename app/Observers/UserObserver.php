<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
        $user->password = Hash::make(request()->input('password'));
        $user->reseller_id = null;
        if (request()->filled('reseller_id')) {
            $user->reseller_id = request()->input('reseller_id');
        }
        if (Auth::user()->hasRole('reseller')) {
            $user->reseller_id = Auth::user()->id;
        }
    }

    public function created(User $user)
    {
        if(!$user->hasRole('customer')) {
            Cache::forget('billmans');
        }
    }

    public function updating(User $user)
    {
        if(request()->filled('password')) {
            $user->password = Hash::make(request()->input('password'));
        }
        $user->reseller_id = null;
        if (request()->filled('reseller_id')) {
            $user->reseller_id = request()->input('reseller_id');
        }
        if (Auth::user()->hasRole('reseller')) {
            $user->reseller_id = Auth::user()->id;
        }
    }

    public function updated(User $user)
    {
        if(!$user->hasRole('customer')) {
            Cache::forget('billmans');
        }
    }

    public function deleted(User $user)
    {
        if(!$user->hasRole('customer')) {
            Cache::forget('billmans');
        }
    }

    public function restored(User $user)
    {
        if(!$user->hasRole('customer')) {
            Cache::forget('billmans');
        }
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
