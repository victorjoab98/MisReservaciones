<?php

namespace App\Http\Middleware;

use Closure;

class DoctorMiddlware
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
        if(auth()->user()->role == 'doctor'){
          return $next($request);
        }

        return redirect('/');
    }
}
