<?php

namespace App\Http\Middleware;

use Closure;
use Zizaco\Entrust\Middleware\EntrustRole;

class Entrust extends EntrustRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if($this->auth->guest() || !$request->user()->hasRole(explode('|', $roles))){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
