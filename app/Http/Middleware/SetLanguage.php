<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $language = $request->session()->get('language');

        if ($language && in_array($language, ['en', 'es', 'va', 'fr', 'de'])) {
            App::setLocale($language);
        } else {
            // Si no se establece el idioma preferido o no es válido, usar el idioma predeterminado (en este caso, español)
            App::setLocale('es');
        }

        return $next($request);
    }

}
