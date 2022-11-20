<?php

namespace App\Http\Middleware;

use Closure;

class localization
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
        // Check header request and determine localizaton
        if(\Session::has('locale'))
        {
            \App::setlocale(\Session::get('locale'));
        }
        // continue request
        return $next($request);
    }
}
