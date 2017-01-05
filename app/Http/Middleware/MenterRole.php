<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;

class MenterRole
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
        if(Auth::user()->role != 'menter'){
          return redirect('alchemist');
        }

        return $next($request);

    }
}
