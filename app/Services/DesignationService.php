<?php


namespace App\Services;


use App\Repositories\Interfaces\DesignationRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class DesignationService
{
    private DesignationRepositoryInterface $designationRepository;

    public function __construct(DesignationRepositoryInterface $designationRepository)
    {
        $this->designationRepository = $designationRepository;
    }

    public function all()
    {
        return Cache::rememberForever('designations', function () {
            return $this->designationRepository->all();
        });
    }
}
