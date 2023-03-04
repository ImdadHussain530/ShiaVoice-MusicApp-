<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminIfLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('adminloginid')){
            return redirect(route('adminDashboard'))->with('fail','Please!logout first...');
        }else{
            return $next($request);

        }
    }
}
