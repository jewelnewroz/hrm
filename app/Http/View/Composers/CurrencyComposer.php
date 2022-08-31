<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Services\CurrencyService;

class CurrencyComposer
{
    private CurrencyService $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'currencies' => $this->currencyService->symbolic(),
        ]);
    }
}
