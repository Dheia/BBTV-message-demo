<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
     
        if (Auth::user()->roles->first()->title == 'admin' || Auth::user()->roles->first()->title == 'Admin') {
           
            return redirect('/dashboard');
        }
        if (Auth::user()->roles->first()->title == 'fan' || Auth::user()->roles->first()->title == 'Fan') {
           if (Auth::user()->status=='Active') {
                    return redirect('fan/dashboard');
               }
          
          if (Auth::user()->status=='Pending') {
            Auth::logout();
            return redirect()->back()->with('error', 'Your account is not activated');
          }
          if (Auth::user()->status=='Blocked') {
          
            Auth::logout();
            return redirect()->back()->with('error', 'Your account is blocked');
        }
        if (Auth::user()->status=='Inreview') {
            Auth::logout();
            return redirect()->back()->with('error', 'Your account is In Review');
        }else{
            return redirect()->back()->with('error', 'Something went wrong !');
        }
        }
        if (Auth::user()->roles->first()->title == 'model' || Auth::user()->roles->first()->title == 'Model') {

      
            if (Auth::user()->profile_status=='1') {
              
                if (Auth::user()->status=='Active') {
                  
                    return redirect('model/dashboard');

              }
              if (Auth::user()->status=='Pending') {
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is not activated');
              }
              if (Auth::user()->status=='Blocked') {
              
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is blocked');
            }
            if (Auth::user()->status=='Inreview') {
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is In Review');
            }else{
                return redirect()->back()->with('error', 'Something went wrong !');
            }
              
            }else{
           
                return redirect('/step-form');
            }
          
        }
    
    
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $type='User Logout';
        \Helper::addToLog('User Logout', $type);
        
        $this->middleware('guest')->except('logout');
    }


    public function logout(Request $request){
        
      
        $logout=User::where('id',Auth::user()->id)->first();
        $logout->is_online='0';
        $logout->save();
        $type='User Logout';
        \Helper::addToLog('User Logout', $type);

        Auth::logout();

        return redirect('/');
    }
}
