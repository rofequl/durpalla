<?php

namespace App\Http\Middleware;

use App\request_ride;
use Closure;
use Session;

class Notification
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

        return $next($request);
    }
}
