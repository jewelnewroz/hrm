<?php


namespace Larabill\Repositories\Interfaces;


interface CurrencyRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
}
