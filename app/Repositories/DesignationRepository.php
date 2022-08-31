<?php


namespace Larabill\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Larabill\Models\Designation;
use Larabill\Repositories\Interfaces\DesignationRepositoryInterface;

class DesignationRepository extends BaseRepository implements DesignationRepositoryInterface
{
    public function __construct(Designation $model)
    {
        parent::__construct($model);
    }

    public function all() : Collection
    {
        return Cache::rememberForever('designations', function() {
            parent::all();
        });
    }

}
