<?php

namespace App\Services;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\JsonResponse;
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

    public function getDatatable($request): JsonResponse
    {
        return DataTables()->eloquent($this->roleRepository->with('permissions'))
            ->toJson();;
    }

    public function create(RoleCreateRequest $request)
    {
        return $this->roleRepository->create($request->validated());
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        return $this->roleRepository->update($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->roleRepository->delete($id);
    }
}
