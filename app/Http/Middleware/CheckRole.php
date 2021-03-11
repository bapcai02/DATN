<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
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

        if(Auth::user()->role_id == 3)
        {
            return redirect('admin/home');
        }
        if(Auth::user()->role_id == 2){
            return redirect(route('customer.home'));
        }

        return $next($request);
    }
}
