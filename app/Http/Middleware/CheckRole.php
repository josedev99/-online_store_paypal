<?php

namespace App\Http\Middleware;

use App\User;

use Closure;

class CheckRole
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
        $roles = array_slice(func_get_args(), 2);


        if(auth()->user()->hasRoles($roles)){
            return $next($request);
        }
        return redirect()->route('home');
    }
}