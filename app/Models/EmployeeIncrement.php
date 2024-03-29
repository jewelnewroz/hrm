<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeIncrement extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'type', 'increment_base'];
}
