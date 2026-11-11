<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    private const SUPPORTED_LOCALES = ['fr', 'ar'];

    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale')
            ?? $request->cookie('locale')
            ?? config('app.locale', 'fr');

        if (! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = 'fr';
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return $next($request);
    }
}
