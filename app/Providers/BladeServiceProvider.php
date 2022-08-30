<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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
        Blade::directive('roleorpermission', function ($arguments) {
            return "<?php if(auth()->user()->hasAnyRole({$arguments}) || auth()->user()->hasAnyPermission({$arguments})) : ?>";
        });
        Blade::directive('endroleorpermission', function ($expression) {
            return "<?php endif; ?>";
        });
    }
}
