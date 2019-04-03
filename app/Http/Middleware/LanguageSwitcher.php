<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;
use Illuminate\Support\Facades\Config;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::get('userId') == null) {
            if (isset($_COOKIE['userId']) && isset($_COOKIE['token'])){
                Session::put('token', $_COOKIE['token']);
                Session::put('userId', $_COOKIE['userId']);
            }
        }

        App::setLocale(Session::has('locale') ? Session::get('locale') : Config::get('app.locale'));
        return $next($request);
    }
}
