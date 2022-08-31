<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
      'asset_type_id',
      'user_id',
      'name',
      'description',
      'price_value',
      'purchase_date',
      'purchase_by',
      'condition'
    ];
}
