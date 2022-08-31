<?php

namespace Larabill\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(
            '*', 'Larabill\Http\View\Composers\AreaComposer'
        );
        View::composer(
            '*', 'Larabill\Http\View\Composers\BranchComposer'
        );
        View::composer(
            'madmin.billing.payment.index', 'Larabill\Http\View\Composers\BillmanComposer'
        );
        View::composer(
            '*', 'Larabill\Http\View\Composers\DepartmentComposer'
        );
        View::composer(
            '*', 'Larabill\Http\View\Composers\DesignationComposer'
        );
        View::composer(
            '*', 'Larabill\Http\View\Composers\PackageComposer'
        );
        View::composer(
            '*', 'Larabill\Http\View\Composers\FundComposer'
        );
        View::composer(
            '*', 'Larabill\Http\View\Composers\CurrencyComposer'
        );

        View::composer(
            '*', 'Larabill\Http\View\Composers\CounterComposer'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
