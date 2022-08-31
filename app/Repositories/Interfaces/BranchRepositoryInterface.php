<?php


namespace Larabill\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface BranchRepositoryInterface
{
    public function all() : Collection;

    public function create(array $data);

    public function update(array $data, int $id);
}
