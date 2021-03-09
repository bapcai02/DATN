<?php

namespace App\Http\Middleware;
use Auth;
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
        if (!Auth::check()) {
            return redirect(route("logout"));
        }

        if(Auth::user()->role_id == 2)
        {
            return redirect(route('admin.home'));
        }
        if(Auth::user()->role_id == 1){
            return redirect(route('customer.home'));
        }

        return $next($request);
    }
}
