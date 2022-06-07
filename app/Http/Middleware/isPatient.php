<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isPatient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role->role == 'Patient'){
            return $next($request);
        }
        header('refresh:3 ; url=/dashboard');
        return abort('403','Your role is not set for this action');
    }
}
