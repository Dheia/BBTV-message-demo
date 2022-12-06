<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Ipaddress;
use Auth;
class Model_steps
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
        return redirect('/model/dashboard');
    }

    return $next($request);
}
           
        

}