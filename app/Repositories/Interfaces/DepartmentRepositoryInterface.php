<?php


namespace Larabill\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Collection;

interface DepartmentRepositoryInterface
{
    public function all() : Collection;
}
