<?php

namespace App\Providers;

use App\Http\View\Composers\PathComposer;
use App\Http\View\Composers\RoleComposer;
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
            'layouts.elements.sidebar', PathComposer::class
        );
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
        View::composer(
            'admin.user.index', RoleComposer::class
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
