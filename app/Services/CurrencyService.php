<?php


namespace App\Services;


use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyService
{
    /**
     * @var CurrencyRepositoryInterface
     */
    private $currency;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currency = $currencyRepository;
    }

    public function symbolic()
    {
        return $this->currency->all()->pluck('name', 'symbol');
    }
}
