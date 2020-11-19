<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
            $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->type;
                switch ($role) {
                    case '1':
                        //dd($role);
                        return redirect('/employer');
                        break;
                    
                    case '2':
                        return redirect('/care-giver');
                        break;

                    case '3':
                        return redirect('/admin');
                        break;
                        
                    default:
                        return redirect('/logout');
                        break;
                }
            }
        }

        return $next($request);
    }
}
