<?php

namespace App\Services;

use App\Http\Requests\CustomerCreateRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function emailExist($userId, $email): bool
    {
        return $this->userRepository->getModel()->where('email', '=', $email)->where('id', '!=', $userId)->count() > 0;
    }

    public function create(CustomerCreateRequest $request)
    {
        return $this->userRepository->create(
            [
                'reseller_id' => auth()->user()->hasRole('reseller') ? auth()->user()->id : $request->input('reseller_id'),
                'branch_id' => auth()->user()->hasRole('reseller') ? auth()->user()->branch_id : $request->input('branch_id')
            ] + $request->validated()
        );
    }
}
