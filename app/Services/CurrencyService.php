<?php


namespace App\Services;


use App\Repositories\Interfaces\CurrencyRepositoryInterface;
use Illuminate\Http\Request;
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

    public function create(Request $request)
    {
        return $this->currencyRepository->create($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->currencyRepository->update($request->all(), $id);
    }
}
