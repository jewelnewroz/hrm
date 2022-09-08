<?php

namespace App\Services;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getDatatable($request): JsonResponse
    {
        return DataTables()->eloquent($this->userRepository->with('roles'))
            ->addColumn('role', function (User $user) {
                return $user->roles->first()->name ?? '';
            })
            ->addColumn('created_at', function (User $user) {
                return $user->created_at->format('d/m/Y h:i a');
            })
            ->addColumn('status', function (User $user) {
                return $user->nice_status;
            })
            ->removeColumn('roles')
            ->toJson();;
    }

    public function emailExist($userId, $email): bool
    {
        return $this->userRepository->getModel()->where('email', '=', $email)->where('id', '!=', $userId)->count() > 0;
    }

    public function create(UserCreateRequest $request): bool
    {
        return $this->userRepository->create($request->validated());

    }

    public function update(UserUpdateRequest $request, $id)
    {
        return $this->userRepository->update($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
