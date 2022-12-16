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
use App\Models\UserCalls;

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


  public function clearCallRecords(Request $request)
  {
    # code...
    $fan_id = $request->user_id;
    DB::table('current_call')->where(['fan_id' => $fan_id, 'status' => 'OnCall'])->delete();
    return response()->json([
      'status' => true
    ]);
  }

  public function endCall(Request $request)
  {
    $fan_id = $request->fan_id;
    // $model_call_id = $request->model_id;
    $model = User::where('call_id', $request->model_id)->first();
    DB::table('current_call')->where(['model_id' => $model->id, 'status' => 'OnCall'])->delete();
    
    $earnings = User_logs::where('call_id', $request->call_id)->get( array(
      DB::raw('SUM(model_earning) as models_earning'),
      DB::raw('SUM(earnings) as admin_earning'),
    ));

    $lastBalance = User_logs::where('call_id', $request->call_id)->orderBy('id', 'DESC')->first();

    UserCalls::where('call_id', $request->call_id)->update([
      'end_time' => Carbon::now()->format('Y-m-d H:i:s'),
      'total_earning' => $earnings[0]['models_earning'],
      'admin_earning' => $earnings[0]['admin_earning'],
      'user_earning' => $lastBalance->fan_balance,
    ]);
    // $modelUser = Models::join('users', 'users.id', 'models.user_id')
    //     ->where('users.call_id', $model_call_id)
    //     ->select('users.id', 'users.wallet', 'models.cost_videocall', 'models.cost_audiocall')
    //     ->first();
    
    // $currentCall = DB::table('current_call')->where(['fan_id' => $fan_id, 'model_id' => $modelUser->id, 'status' => 'OnCall'])->first();

    // $fanUser = User::where('id', $fan_id)->first();

    // if($request->callType == 'video_call'){
    //   $call_cost = $modelUser->cost_videocall;
    // } else {
    //   $call_cost = $modelUser->cost_audiocall;
    // }

    // $to = Carbon::createFromFormat('Y-m-d H:i:s', $currentCall->start_time);
    // $from = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());
    
    // $totalTime = 0;
    // $diffInSeconds = $to->diffInSeconds($from);
    // if($diffInSeconds > 60){
    //   $totalTime = floor(($diffInSeconds / 60) % 60) + ((($diffInSeconds % 60)> 0)?1:0);
    // } else {
    //   $totalTime = 1; 
    // }
    // $totalCost = $call_cost * $totalTime; 
    // $fanUser->wallet = (($fanUser->wallet - $totalCost) <= 0) ? 0 : $fanUser->wallet - $totalCost;
    // $fanUser->save();

    // $commission = Setting::pluck("value", "name");
    // $admin_earning = ($totalCost * $commission['commission'])/100;
    // $model_earning = $totalCost - $admin_earning;
    
    // $modelUser = User::where('id', $modelUser->id)->first();
    // $modelUser->wallet = $modelUser->wallet + $model_earning;
    // $modelUser->save();
    
    // DB::table('current_call')->where(['fan_id' => $fan_id, 'model_id' => $modelUser->id, 'status' => 'OnCall'])->delete();
    
    // $User_logs                  = new User_logs;
    // $User_logs->method          = $request->callType;
    // $User_logs->from            = $fanUser->id;
    // $User_logs->to              = $modelUser->id;
    // $User_logs->fan_balance     = $fanUser->wallet;
    // $User_logs->price           = $totalCost;
    // $User_logs->model_earning   = $model_earning;
    // $User_logs->earnings        = $admin_earning;
    // $User_logs->save();
    
    return response()->json([
      'status' => true, 
    ]);
    
  }

  public function checkCallBallance(Request $request)
  {
    # code...
    $nextChargeTime = $request->next_time;
    $call_id = $request->call_id;
    $currentTime = Carbon::now()->format('Y-m-d H:i:s');
    $currentTime = Carbon::parse($currentTime)->timestamp;
    
    $fanUser = User::where('id', $request->user_id)->first();
    // return $currentTime ; 
    if($nextChargeTime >= $currentTime) {
      return response()->json(['update' => false]);
    } 
    else if($fanUser && ($nextChargeTime <= $currentTime) && $fanUser->wallet > 0) {  // If Fan User has money and endTime is less than CurrentTime

      $currentCall = DB::table('current_call')->where('fan_id', $fanUser->id)->first();
      $minCall = 1; // Minimum Call time
      
      $modelUser = Models::join('users', 'users.id', 'models.user_id')
      ->where('users.id', $currentCall->model_id)
      ->select('users.id', 'users.id as model_id', 'users.wallet', 'models.cost_videocall', 'models.min_call_time', 'models.min_videocall_time', 'models.cost_audiocall')
      ->first();

      // return response()->json(['update' => false, 'status' => false]);
      if(empty($modelUser)){
        return response()->json(['update' => true, 'status' => false]);
      }
      // if Call is video 
      if($request->callType == 'video_call') {  
        $call_cost = $modelUser->cost_videocall;    // Call Cost based on Video Call
      } else {
        $call_cost = $modelUser->cost_audiocall;    // Call Cost based on Audio Call
      }

      $totalTime = (int)($fanUser->wallet / $call_cost);    // Available total time based on Fan wallet amount 
      if($totalTime <= 0) {
        $minCall = 0;
      }
      $time = Carbon::now()->addMinutes($totalTime)->format('Y-m-d H:i:s');
      $NextTime = Carbon::now()->addMinutes($minCall)->format('Y-m-d H:i:s');   // Next payment charge time
      
      // Data to save in DB
      DB::table('current_call')->where('fan_id', $fanUser->id)->update([
        'end_time' => $NextTime,
      ]);

      // Minimum Call Cost
      $fanUser->wallet = (($fanUser->wallet - $call_cost) <= 0) ? 0 : $fanUser->wallet - $call_cost;
      $fanUser->save();

      // Admin Commission 
      $commission = Setting::pluck("value", "name");
      $admin_earning = ($call_cost * $commission['commission'])/100;
      $model_earning = $call_cost - $admin_earning;
      
      // Update model wallet
      User::where('id', $modelUser->model_id)->update(['wallet' => $modelUser->wallet + $model_earning]);
    
      // Save record in user log
      $User_logs                  = new User_logs;
      $User_logs->method          = $request->callType;
      $User_logs->from            = $fanUser->id;
      $User_logs->to              = $modelUser->model_id;
      $User_logs->fan_balance     = $fanUser->wallet;
      $User_logs->price           = $call_cost;
      $User_logs->call_id         = $call_id;
      $User_logs->model_earning   = $model_earning;
      $User_logs->earnings        = $admin_earning;
      $User_logs->save();


      return response()->json([
        'update' => true,
        'status' => ($fanUser->wallet > $call_cost)?true:false,
        'endTime' => Carbon::parse($time)->timestamp,   // Final Call End Time
        'NextChargeTime' => Carbon::parse($NextTime)->timestamp,    // Call Next Charge Time
        'totalMins' => $totalTime,    // Total Mins
        'canCallContinue' => ($fanUser->wallet > $call_cost)?true:false,     // Can Call Continue
        'callType' => $request->callType,
        'call_id'   => $call_id,
      ]);
    } else return response()->json(['status' => false]);

  }

  public function creditCall(Request $request) {
    // Fan & Model ID
    $fan_id = $request->user_id;
    $modelId = $request->model_id;
    $call_id = $request->call_id;
    // Model Account
    $modelUser = Models::join('users', 'users.id', 'models.user_id')
      ->where('users.call_id', $modelId)
      ->select('users.id', 'users.wallet', 'models.cost_videocall', 'models.min_call_time', 'models.min_videocall_time', 'models.cost_audiocall')
      ->first();

    // Fan Account
    $fanUser = User::where('id', $fan_id)->first();

    $minCall = 1; // Minimum Call time
    // if Call is video 
    if($request->callType == 'video_call') {  
      $call_cost = $modelUser->cost_videocall;    // Call Cost based on Video Call
      $minCall = (int)$modelUser->min_videocall_time;   // Minimum Call Time based on video call
    } else {
      $call_cost = $modelUser->cost_audiocall;    // Call Cost based on Audio Call
      $minCall = (int)$modelUser->min_call_time;    // Minimum Call Time based on audio call
    }

    $totalTime = (int)($fanUser->wallet / $call_cost);    // Available total time based on Fan wallet amount 
    $time = Carbon::now()->addMinutes($totalTime)->format('Y-m-d H:i:s');
    $NextTime = Carbon::now()->addMinutes($minCall)->format('Y-m-d H:i:s');   // Next payment charge time

    // Data to save in DB
    DB::table('current_call')->insert([
      'call_id' => $call_id,
      'fan_id' => $fanUser->id,
      'model_id' => $modelUser->id,
      'start_time' => Carbon::now()->format('Y-m-d H:i:s'),
      'estimated_end_time' => Carbon::now()->addMinutes($totalTime)->format('Y-m-d H:i:s'),
      'end_time' => $NextTime,
      'estimated_total_time' => $totalTime,
      'status' => 'OnCall',
      'call_log_id' => $call_id,
    ]);

    // =============================== Do First Payment On Call Init ============================== //
    $firstCharge = $call_cost*$minCall; // Minimum Call Cost
    $fanUser->wallet = (($fanUser->wallet - $firstCharge) <= 0) ? 0 : $fanUser->wallet - $firstCharge;
    $fanUser->save();

    // Admin Commission 
    $commission = Setting::pluck("value", "name");
    $admin_earning = ($firstCharge * $commission['commission'])/100;
    $model_earning = $firstCharge - $admin_earning;
    
    // Update model wallet
    User::where('id', $modelUser->id)->update(['wallet' => $modelUser->wallet + $model_earning]);

    $userCalls = new UserCalls;
    $userCalls->call_from     = $fanUser->id;
    $userCalls->call_to       = $modelUser->id;
    $userCalls->start_time    = Carbon::now()->format('Y-m-d H:i:s');
    $userCalls->call_type     = $request->callType;
    $userCalls->call_id        = $call_id;
    $userCalls->cost_per_min  = $modelUser->cost_videocall;
    $userCalls->amin_commission = $commission['commission'];
    $userCalls->save();
    
    // Save record in user log
    $User_logs                  = new User_logs;
    $User_logs->method          = $request->callType;
    $User_logs->from            = $fanUser->id;
    $User_logs->to              = $modelUser->id;
    $User_logs->fan_balance     = $fanUser->wallet;
    $User_logs->price           = $firstCharge;
    $User_logs->model_earning   = $model_earning;
    $User_logs->earnings        = $admin_earning;
    $User_logs->call_id          = $call_id;
    $User_logs->save();

    // ============================================================= //

    // Return Response 
    return response()->json([
      'status' => true,
      'endTime' => Carbon::parse($time)->timestamp,   // Final Call End Time
      'NextChargeTime' => Carbon::parse($NextTime)->timestamp,    // Call Next Charge Time
      'totalMins' => $totalTime,    // Total Mins
      'canCallContinue' => ($fanUser->wallet > $call_cost)?true:false,     // Can Call Continue
      'callType' => $request->callType,
      'call_id' => $call_id,
    ]);
  }
}
