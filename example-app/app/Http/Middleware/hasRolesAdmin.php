<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class hasRolesAdmin
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
        if(auth() -> check()){
            $check = User::find(auth()->user()->id);
            if($check -> hasRole('admin'))  return $next($request);
            return redirect('/admin');
        }

    }
}
