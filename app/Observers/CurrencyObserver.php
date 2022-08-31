<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use App\Models\Currency;

class CurrencyObserver
{
    public function __construct()
    {
        Cache::forget('currencies');
    }
    /**
     * Handle the currency "created" event.
     *
     * @param  \Larabill\Currency  $currency
     * @return void
     */
    public function created(Currency $currency)
    {
        //
    }

    /**
     * Handle the currency "updated" event.
     *
     * @param  \Larabill\Currency  $currency
     * @return void
     */
    public function updated(Currency $currency)
    {
        //
    }

    /**
     * Handle the currency "deleted" event.
     *
     * @param  \Larabill\Currency  $currency
     * @return void
     */
    public function deleted(Currency $currency)
    {
        //
    }

    /**
     * Handle the currency "restored" event.
     *
     * @param  \Larabill\Currency  $currency
     * @return void
     */
    public function restored(Currency $currency)
    {
        //
    }

    /**
     * Handle the currency "force deleted" event.
     *
     * @param  \Larabill\Currency  $currency
     * @return void
     */
    public function forceDeleted(Currency $currency)
    {
        //
    }
}
