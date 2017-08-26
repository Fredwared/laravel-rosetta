<?php
namespace Fredwared\Translatable\Middleware;
use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
class Language {

    public function handle($request, Closure $next)
    {
        $activeLanguage = Session::get('applocale'); // Get current Language based on your structure and idea
        if ($activeLanguage && in_array($activeLanguage, Config::get('app.locales'))) {
            \App::setLocale($activeLanguage);
        }
        return $next($request);
    }
}