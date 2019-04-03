<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckUserLogin
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

        if(Session::get('userId') != null) {
            return $next($request);
        } else {
            if (isset($_COOKIE['userId']) && isset($_COOKIE['token'])){
                Session::put('token', $_COOKIE['token']);
                Session::put('userId', $_COOKIE['userId']);
                return $next($request);
            }else{
                return redirect('/login');
            }
        }
    }
}
