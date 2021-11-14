<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasAdmin
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

        if (!Auth::check()) return redirect('login') ;
        $check = User::find(Auth::user()->id);
        dd($check);
        // if($check -> hasRole('adminn'))  return $next($request);
        // return redirect('/home');

    }
}
