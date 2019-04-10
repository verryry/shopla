<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Users
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
      if (Auth::user() && Auth::user()->role == 'admin') {
        return $next($request);
      }
      elseif (Auth::user() && Auth::user()->role == 'user') {
        return redirect('/');
    }
  }
}
