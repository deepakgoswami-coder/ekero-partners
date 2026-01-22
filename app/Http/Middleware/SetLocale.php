<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Get lang from route: /{lang}/...
        $lang = $request->route('lang');

        // List of allowed languages
        $supportedLocales = ['en', 'ar', 'fr', 'de', 'ko', 'ja', 'it', 'es'];

        if (! in_array($lang, $supportedLocales)) {
            // Fallback if someone types invalid code
            $lang = config('app.fallback_locale', 'en');
        }

        App::setLocale($lang);

        return $next($request);
    }
}
