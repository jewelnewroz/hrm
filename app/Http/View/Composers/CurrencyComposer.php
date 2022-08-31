<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Services\Currencies;

class CurrencyComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $currencies;

    /**
     * Create a new profile composer.
     *
     * @param Currencies $currencies
     */
    public function __construct( Currencies $currencies)
    {
        $this->currencies = $currencies;
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
            'currencies' => $this->currencies->symbolic(),
        ]);
    }
}
