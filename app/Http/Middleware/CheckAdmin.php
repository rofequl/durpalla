<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CheckAdmin
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
        if(Session::get('email') != null) {
            return $next($request);  // if exist proceed to next step
        } else {
            return redirect('/admin');
        }
    }
}
