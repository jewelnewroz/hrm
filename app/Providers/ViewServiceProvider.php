<?php

namespace App\Providers;

use App\Http\View\Composers\PathComposer;
use App\Http\View\Composers\PermissionComposer;
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
            '*', PathComposer::class
        );
        View::composer(
            [
                'admin.user.index',
                'admin.user.create',
                'admin.user.edit'
            ], RoleComposer::class
        );
        View::composer(
            ['admin.role.edit', 'admin.role.create'], PermissionComposer::class
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
