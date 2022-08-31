<?php

namespace Larabill\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'symbol'];
}
