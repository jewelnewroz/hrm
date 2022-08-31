<?php

namespace Larabill\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $employees = DB::table('employees')->get();
        return view('madmin.layout._layout');
    }
}
