<?php


namespace App\Services;


use App\Repositories\Interfaces\BranchRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BranchService
{
    private BranchRepositoryInterface $branchRepository;
    public function __construct( BranchRepositoryInterface $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function all(): Collection
    {
        return Cache::rememberForever('branches', function () {
            return $this->branchRepository->all();
        });
    }
}
