<?php


namespace Larabill\Repositories;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Larabill\Models\Branch;
use Larabill\Repositories\Interfaces\BranchRepositoryInterface;

class BranchRepository extends BaseRepository implements BranchRepositoryInterface
{
    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return Cache::rememberForever('branches', function() {
            return parent::with('routers')->get();
        });
    }
}
