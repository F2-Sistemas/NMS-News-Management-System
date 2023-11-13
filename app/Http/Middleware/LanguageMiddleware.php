<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = \App\Http\Controllers\Web\News\SetLanguageController::setLang($request);
        Config::set('app.locale', $lang);

        // dd($lang);
        // dd(session()->get('lang'));
        return $next($request);
    }
}
