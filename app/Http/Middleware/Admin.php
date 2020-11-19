<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        if(Auth::user()->type == '3')
        {
            return $next($request);
        } elseif(Auth::user()->type == '1')
        {
            return redirect('/employer');
        } elseif(Auth::user()->type == '2')
        {
            return redirect('/are-giver');
        }else{
            Session::flash('permission_warning', 'Permission not granted');
            return redirect('/');
        }
    }
}
