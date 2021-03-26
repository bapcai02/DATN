<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckCustomer
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
        }else if($request->user()->role_id == 3){

            return redirect(route('admin.home'));
        }else if($request->user()->role_id == 2){

            return $next($request);
        }else if($request->user()->role_id == 4){

            return redirect(route('shiper.home'));
        }
    }
}
