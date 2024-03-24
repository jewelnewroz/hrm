<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function update(array $data, $id): bool
    {
        $role = parent::find($id);
        $role->update($data);
        $role->syncPermissions(request()->input('permission'));
        return true;
    }
}
