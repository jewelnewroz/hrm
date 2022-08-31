<?php

namespace App\Services;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class RoleService
{
    protected RoleRepositoryInterface $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function all(): Collection
    {
        return Cache::rememberForever('roles', function () {
            return $this->roleRepository->all();
        });
    }
}
