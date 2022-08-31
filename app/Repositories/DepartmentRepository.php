<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return Cache::rememberForever('departments', function () {
            return parent::all();
        });
    }
}
