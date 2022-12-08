<?php

namespace App\Http\Controllers;

use App\Models\Models;
use Illuminate\Http\Request;
use Twilio\Exceptions\RestException;
use Twilio\Rest\Client;
use Auth;
use DB;
use App\Models\Setting;
use App\Models\User_logs;
use App\Models\User;
use Carbon\Carbon;

class VoiceController extends Controller
{
  public function __construct() {
    // Twilio credentials
    $this->account_sid = env('ACCOUNT_SID');
    $this->auth_token = env('AUTH_TOKEN');
    //the twilio number you purchased
    $this->from = env('TWILIO_PHONE_NUMBER');

    // Initialize the Programmable Voice API
    $this->client = new Client($this->account_sid, $this->auth_token);
  }

  /**
   * Making an outgoing call
   */
  public function initiateCall(Request $request) {

 $sid = getenv("ACCOUNT_SID");
$token = getenv("AUTH_TOKEN");
$twilio = new Client($sid, $token);


// $recording_settings = $twilio->video->v1->recordingSettings()->fetch();

// print($recording_settings->friendlyName);

$call = $twilio->calls
               ->create($request->phone_number, // to
                      '+91'.Auth::user()->phone, // from
                        ["url" => "http://www.bbtv.com"]
               );
               return back();
  }


  public function endCall(Request $request)
  {
    $fan_id = $request->fan_id;
    $model_call_id = $request->model_id;

    $modelUser = Models::join('users', 'users.id', 'models.user_id')
        ->where('users.call_id', $model_call_id)
        ->select('users.id', 'users.wallet', 'models.cost_videocall', 'models.cost_audiocall')
        ->first();
    
    $currentCall = DB::table('current_call')->where(['fan_id' => $fan_id, 'model_id' => $modelUser->id, 'status' => 'OnCall'])->first();

    $fanUser = User::where('id', $fan_id)->first();
    $commission = Setting::pluck("value", "name");

    if($request->callType == 'video_call'){
      $call_cost = $modelUser->cost_videocall;
    } else {
      $call_cost = $modelUser->cost_audiocall;
    }

    $to = Carbon::createFromFormat('Y-m-d H:i:s', $currentCall->start_time);
    $from = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());
    
    $totalTime = 0;
    $diffInSeconds = $to->diffInSeconds($from);
    if($diffInSeconds > 60){
      $totalTime = floor(($diffInSeconds / 60) % 60) + ((($diffInSeconds % 60)> 0)?1:0);
    } else {
      $totalTime = 1; 
    }
    $totalCost = $call_cost * $totalTime; 
    $fanUser->wallet = (($fanUser->wallet - $totalCost) <= 0) ? 0 : $fanUser->wallet - $totalCost;
    $fanUser->save();

    $admin_earning = ($totalCost * $commission['commission'])/100;
    $model_earning = $totalCost - $admin_earning;
    
    $modelUser = User::where('id', $modelUser->id)->first();
    $modelUser->wallet = $modelUser->wallet + $model_earning;
    $modelUser->save();
    
    DB::table('current_call')->where(['fan_id' => $fan_id, 'model_id' => $modelUser->id, 'status' => 'OnCall'])->delete();
    
    $User_logs                  = new User_logs;
    $User_logs->method          = $request->callType;
    $User_logs->from            = $fanUser->id;
    $User_logs->to              = $modelUser->id;
    $User_logs->fan_balance     = $fanUser->wallet;
    $User_logs->price           = $totalCost;
    $User_logs->model_earning   = $model_earning;
    $User_logs->earnings        = $admin_earning;
    $User_logs->save();
    
    return response()->json([
      'status' => true, 
    ]);
    
  }

  public function checkCallBallance(Request $request)
  {
    # code...
    $endTime = $request->time;
    $currentTime = Carbon::now()->format('Y-m-d H:i:s');
    $currentTime = Carbon::parse($currentTime)->timestamp;
    
    $fanUser = User::where('id', $request->user_id)->first();
    if($fanUser && ($endTime > $currentTime) && $fanUser->wallet > 0) {
      return response()->json(['status' => true, 'endTime' => $endTime, 'currentTime' => $currentTime]);
    }
    return response()->json(['status' => false, 'endTime' => $endTime, 'currentTime' => $currentTime]);

  }

  public function creditCall(Request $request) {
    $fan_id = $request->user_id;
    $modelId = $request->model_id;
    // $mode = User::where('id', $modelId)->first();

    $modelUser = Models::join('users', 'users.id', 'models.user_id')
        ->where('users.call_id', $modelId)
        ->select('users.id', 'users.wallet', 'models.cost_videocall', 'models.cost_audiocall')
        ->first();

    $fanUser = User::where('id', $fan_id)->first();
    // $commission = Setting::pluck("value", "name");

    if($request->callType == 'video_call'){
      $call_cost = $modelUser->cost_videocall;
    } else {
      $call_cost = $modelUser->cost_audiocall;
    }

    // $fanUser->wallet = $fanUser->wallet - $call_cost;
    // $fanUser->save();

    // $admin_earning = ($call_cost * $commission['commission'])/100;
    // $model_earning = $call_cost - $admin_earning;
    
    $modelUser = User::where('id', $modelUser->id)->first();
    // $modelUser->wallet = $modelUser->wallet + $model_earning;
    // $modelUser->save();

    // $User_logs                  = new User_logs;
    // $User_logs->method          = $request->callType;
    // $User_logs->from            = $fanUser->id;
    // $User_logs->to              = $modelUser->id;
    // $User_logs->fan_balance     = $fanUser->wallet;
    // $User_logs->price           = $call_cost;
    // $User_logs->model_earning   = $model_earning;
    // $User_logs->earnings        = $admin_earning;
    // $User_logs->save();

    $totalTime = (int)($fanUser->wallet / $call_cost);
    $time = Carbon::now()->addMinutes($totalTime)->format('Y-m-d H:i:s');
    $data = [
      'fan_id' => $fanUser->id,
      'model_id' => $modelUser->id,
      'start_time' => Carbon::now()->format('Y-m-d H:i:s'),
      'estimated_end_time' => Carbon::now()->addMinutes($totalTime)->format('Y-m-d H:i:s'),
      'end_time' => '',
      'estimated_total_time' => $totalTime,
      'status' => 'OnCall'
    ];

    DB::table('current_call')->insert($data);

    return response()->json([
      'status' => true, 
      'time' => Carbon::parse($time)->timestamp, 
      'totalMins' => $totalTime, 
      'canCallContinue' => ($totalTime > 0)?'yes':'no'
    ]);
  }
}
