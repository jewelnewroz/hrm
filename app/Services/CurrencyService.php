<?php


namespace App\Services;


use App\Repositories\Interfaces\CurrencyRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class CurrencyService
{
    private CurrencyRepositoryInterface $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function symbolic()
    {
        return $this->currencyRepository->all()->pluck('name', 'symbol');
    }

    public function all()
    {
        return Cache::rememberForever('currencies', function () {
            return $this->currencyRepository->all();
        });
    }
}
