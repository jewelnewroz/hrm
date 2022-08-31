<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Branch extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'name',
        'address_line_1',
        'address_line_2',
        'mobile',
        'email',
        'city',
        'country',
        'deletable'
    ];

    public function routers()
    {
        if( Auth::check() && Auth::user()->hasRole('reseller') ) {
            return $this->hasMany(Router::class)->where('id', Auth::user()->reseller->router_id);
        } else {
            return $this->hasMany(Router::class)->where('status', 1);
        }
    }

    public function router()
    {
    	return $this->hasOne(Router::class)->where('status', 1)->latest();
    }
}
