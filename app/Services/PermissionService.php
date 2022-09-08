<?php

namespace App\Services;

use App\Models\Permission;
use Illuminate\Support\Facades\Cache;

class PermissionService
{
    public function all()
    {
        return Cache::rememberForever('permissions', function () {
            return Permission::all();
        });
    }

    public function grouped(): array
    {
        $permissions = [];
        foreach($this->all() as $item ) {
            $param = explode('-', $item->name );
            $permissions[$param[0]][] = $item;
        }

        return $permissions;
    }
}
