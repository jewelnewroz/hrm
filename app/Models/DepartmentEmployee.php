<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentEmployee extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['employee_id', 'department_id', 'designation_id'];

    public function employee(): BelongsTo
    {
    	return $this->belongsTo(Employee::class);
    }

    public function department(): BelongsTo
    {
    	return $this->belongsTo(Department::class);
    }
}
