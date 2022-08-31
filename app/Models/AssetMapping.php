<?php

namespace Larabill\Models;

use Illuminate\Database\Eloquent\Model;

class AssetMapping extends Model
{
    protected $fillable = [
        'asset_id',
        'assigned_to',
        'assigned_by',
        'status'
    ];
}
