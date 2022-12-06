<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Ipaddress;
use Auth;
class StepCheck
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
   
    public function handle($request, Closure $next)
{
    if (Auth::user()->profile_status=='1') {
       
    }else{
        return redirect('/steo-form');
    }

    return $next($request);
}
           
        

}