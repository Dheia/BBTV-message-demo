<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Ipaddress;
use Auth;
class ModelMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
   
    public function handle($request, Closure $next)
{
    if (Auth::user()->roles->first()->title == 'Model' || Auth::user()->roles->first()->title == 'Model') {
        if (Auth::user()->profile_status=="0") {
            return redirect('/step-form');
        }
    }else{
        return redirect('/');
    }

    return $next($request);
}
           
        

}