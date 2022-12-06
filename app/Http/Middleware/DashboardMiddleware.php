<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Ipaddress;
use Auth;
class DashboardMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
   
    public function handle($request, Closure $next)
{
    if (Auth::user()) {
        if (Auth::user()->roles->first()->title == 'Model' || Auth::user()->roles->first()->title == 'Model') {
            return redirect('model/dashboard');
        }else{
           if (Auth::user()->roles->first()->title == 'Fan' || Auth::user()->roles->first()->title == 'Fan') {
            return redirect('fan/dashboard');
           }
        }
    }

    return $next($request);
}
           
        

}