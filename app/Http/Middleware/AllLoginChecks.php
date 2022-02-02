<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class AllLoginChecks
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
        // dd($request);
        if($request->session()->has("online_admin") || $request->session()->has("online_instructor") || $request->session()->has("online_user") ){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
