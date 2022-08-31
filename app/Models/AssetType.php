<?php

namespace Larabill\Models;

use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    protected $fillable = ['user_id', 'name', 'description'];
}
