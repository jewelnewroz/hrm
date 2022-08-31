<?php


namespace App\Services;


use App\Repositories\Interfaces\BranchRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class DepartmentService
{
    private BranchRepositoryInterface $branchRepository;

    public function __construct(BranchRepositoryInterface $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function all()
    {
        return Cache::rememberForever('branches', function () {
            return $this->branchRepository->all();
        });
    }
}
