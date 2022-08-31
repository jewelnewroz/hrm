<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Employee extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'department_id',
        'designation_id',
        'joining_date'
    ];

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
    	return $this->belongsTo(Department::class);
    }

    public function designation(): BelongsTo
    {
    	return $this->belongsTo(Designation::class);
    }
}
