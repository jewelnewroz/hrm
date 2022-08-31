<?php


namespace Larabill\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data);
}
