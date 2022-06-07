<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure
     * @param  string  $role
     * @param  string  $role2
     * @param  string  $role3
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null, $role2 = null, $role3 = null){

        if ($this->hasRole($role) || $this->hasRole($role2) || $this->hasRole($role3) ){
            return $next($request);
        }
        header('refresh:2 ; url=/dashboard');
        return abort('403','Your role is not set for this action');
    }

    public function hasRole($role){

        $user = Auth::user()->role->role;
        if($user == $role){
            return true;
        }
        return false;
    }
}
