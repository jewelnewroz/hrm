<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class LocalizationMiddleware
{
    private Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->header('Content-Language') ?? 'en';

        if (!in_array($locale, $this->app->config->get('lang.supported'))) {
            return abort(403, 'Language not supported.');
        }

        $this->app->setLocale($locale);
        $response = $next($request);
        $response->headers->set('Content-Language', $locale);
        return $response;
    }
}
