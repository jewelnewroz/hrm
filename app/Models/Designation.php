<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $fillable = ['name', 'short_form', 'department_id'];

    public function employees(): HasMany
    {
    	return $this->hasMany(Employee::class, 'designation_id', 'id');
    }

    public function department(): BelongsTo
    {
    	return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
