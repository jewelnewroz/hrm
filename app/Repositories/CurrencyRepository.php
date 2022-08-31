<?php


namespace Larabill\Repositories;


use Illuminate\Support\Facades\Cache;
use Larabill\Models\Currency;
use Larabill\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{
    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return Cache::rememberForever('currencies', function() {
            return parent::all();
        });
    }

    public function create(array $data)
    {
        return parent::create($data);
    }

    public function update(array $data, $id)
    {
        return parent::update($data, $id);
    }
}
