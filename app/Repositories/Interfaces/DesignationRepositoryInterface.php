<?php


namespace Larabill\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Collection;

interface DesignationRepositoryInterface
{
    public function all() : Collection;
}
