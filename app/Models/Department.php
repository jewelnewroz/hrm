<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $fillable = ['name', 'code'];

    public function employees(): HasMany
    {
    	return $this->hasMany(DepartmentEmployee::class);
    }

    public function head(): HasMany
    {
    	return $this->employees()->where('is_head', 1)->limit(1);
    }
}
