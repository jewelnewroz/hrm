<?php


namespace App\Services;


use App\Repositories\Interfaces\BranchRepositoryInterface;

class BranchService
{
    private $branches;
    public function __construct( BranchRepositoryInterface $branchRepository)
    {
        $this->branches = $branchRepository;
    }

    public function getDropdown()
    {
        return $this->branches->all()
            ->map(function($item, $key) {
                return [
                    'id' => $item->id,
                    'name' => $item->name
                ];
            });
    }

    public function getUserBranch($id)
    {
        return $this->branches->all()
            ->where('id', $id)
            ->first();
    }
}
