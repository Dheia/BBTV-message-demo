<?php

namespace App\Http\Controllers\frontend\fan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_logs;
use App\Models\UserCalls;   
use Auth;
use Illuminate\Support\Facades\DB;

class AccountLogdashboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User_logs=User_logs::where('from',Auth::user()->id)->orderby('id','desc')->paginate(20);
        
        return view('frontend.fan.account_logs',compact('User_logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CallLogs(Request $request)
    {
        # code...
        $data['title'] = 'Call Logs';
        $data['callLogs'] = UserCalls::where('call_from', Auth::user()->id)->orderby('id','desc')->paginate(20);  
        
        return view('frontend.fan.call_logs', $data);
    }
}
