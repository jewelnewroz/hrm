<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\BranchComposer;
use App\Http\View\Composers\DepartmentComposer;
use App\Http\View\Composers\CurrencyComposer;
use App\Http\View\Composers\DesignationComposer;

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
            '*', BranchComposer::class
        );
        View::composer(
            '*', DepartmentComposer::class
        );
        View::composer(
            '*', DesignationComposer::class
        );
        View::composer(
            '*', CurrencyComposer::class
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
