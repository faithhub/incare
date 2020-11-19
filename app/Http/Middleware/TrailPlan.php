<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TrailPlan
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
        if (Auth::user()->plan == 0) {
            if (Auth::user()->plan_end_date < Carbon::now() && Auth::user()->trail_count > 3) {
                # code...
            }
        }
        return $next($request);
    }
}
