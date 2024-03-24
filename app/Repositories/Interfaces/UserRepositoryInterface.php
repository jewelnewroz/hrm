<?php


namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function update(array $data, int $id);
}
