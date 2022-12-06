<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Exceptions\RestException;
use Twilio\Rest\Client;
use Auth;
// equire_once '/path/to/vendor/autoload.php';
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

//  $sid = getenv("ACCOUNT_SID");
// $token = getenv("AUTH_TOKEN");
// $twilio = new Client($sid, $token);


// // $recording_settings = $twilio->video->v1->recordingSettings()->fetch();

// // print($recording_settings->friendlyName);

// $call = $twilio->calls
//                ->create($request->phone_number, // to
//                       '+91'.Auth::user()->phone, // from
//                         ["url" => "http://www.bbtv.com"]
//                );
//                return back();
//   }
return view('vendor/chatify/pages/calling');

}


  public function creditcall(Request $request) {
    print_r($request->userid);
    dd('ffsd');
  }
}