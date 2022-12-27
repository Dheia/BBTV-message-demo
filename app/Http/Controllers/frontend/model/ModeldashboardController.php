<?php
namespace App\Http\Controllers\frontend\model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Models;
use Carbon\Carbon;
use App\Models\refferal_users;
use App\Models\Page;
use App\Models\Contacts;
use App\Models\PayHistory;
use App\Models\UserMeta;
use App\Models\Model_location;
use App\Models\UserPaymentDetail;
use App\Models\ModelOrientation;
use App\Models\ModelCategory;
use App\Models\ModelEthnicity;
use App\Models\ModelLanguage;
use App\Models\ModelHair;
use App\Models\ModelFetishes;
use App\Models\Tags;
use App\Models\ChMessage;
use App\Models\UserCalls;
use App\Models\User_logs;
use App\Models\ModelFeed;
use App\Models\NotifyUsers;
use App\Models\Feed_media;
use App\Models\SleepMode;
use App\Models\ModelAvailability;
use Hash;
use Auth;
use Mail;
use Twilio\Rest\Client;
use DB;
Use Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Arr;
use Exception; 
use DateTime;
use RTippin\Messenger\Models\Call;

class ModeldashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public function profileshow( Request $request)
    // {}
    public function index( Request $request)
    {

        $user_id= Auth::user()->id;
        $data['model']=Models::where('user_id',$user_id)->first();
        $data['d']= $this->earningsshow($request);
        return view('frontend.model.index',$data);
    }
    public function audiocalling( Request $request)
    {
      
        $current=Carbon::now()->toDateTimeString();
        $added= Carbon::now()->addHour($request->phoneCallTimer);
      
        $user_id= Auth::user()->id;
        $d['model']=Models::where('user_id',$user_id)->first();

        if($request->calling == 0)
        {
            $d['model']->audio_call_start_time='';
            $d['model']->audio_call_end_time='';
            $d['model']->phone=$request->calling;
        }else{
            $d['model']->audio_call_start_time=$current;
            $d['model']->audio_call_end_time=$added;
            $d['model']->phone=$request->calling;
        }
       
        $d['model']->save();
        return response()->json(['status' => 'success','endTime' =>$d['model']->audio_call_end_time ]);
    }
    public function videocalling( Request $request)
    {
       
        $current=Carbon::now()->toDateTimeString();
        $added= Carbon::now()->addHour($request->phoneCallTimer);
 
        $user_id= Auth::user()->id;
        $d['model']=Models::where('user_id',$user_id)->first();

        if($request->calling == 0)
        {
            $d['model']->video_call_starttime='';
            $d['model']->video_call_endtime='';
            $d['model']->video=$request->calling;
        }else{
            $d['model']->video_call_starttime=$current;
            $d['model']->video_call_endtime=$added;
            $d['model']->video=$request->calling;
        }
      
        $d['model']->save();
        return response()->json(['status' => 'success','endTime' =>$d['model']->video_call_endtime ]);


    }
    
    public function profile(Request $request,$id)
    {
    
        $d['Orientation']=ModelOrientation::all();
        $d['ModelCategory']=ModelCategory::all();
        $d['ModelEthnicity']=ModelEthnicity::all();
        $d['ModelLanguage']=ModelLanguage::all();
        $d['ModelHair']=ModelHair::all();
        $d['ModelFetishes']=ModelFetishes::all();
        $d['model_cate'] = ModelCategory::where('status','active')->get();
        $d['model_ethnic'] = ModelEthnicity::where('status','active')->get();
        $d['model_fet'] = ModelFetishes::where('status','active')->get();
        $d['model_hair'] = ModelHair::where('status','active')->get();
        $d['model_lang'] = ModelLanguage::where('status','active')->get();
        $d['model_orient'] = ModelOrientation::where('status','active')->get();
        
        $model = User::leftjoin('models', 'models.user_id', '=', 'users.id')
                    ->select('users.*','models.*','users.id as users_auto_id')
                    ->where('models.user_id', '=', $id)
                    ->where('users.id', '=', $id)
                    ->first();
                    
        if($model->profile_image==null){
            $model->profile_image='user.png';
        }
        // return $model;
       $model_tags=Models::where('user_id',$id)->first();
       
       
        $model_tags->load('tags');
        
        $tags = Tags::all()->pluck('title', 'id');
         $d['model']=$model;
         $d['tags']=$tags;
         $d['model_tags']=$model_tags;
  
        $country_list = DB::Table('country_list')->get();
                    $d['country_list']=$country_list;
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        $d['userdata']=$this->getUserMeta($user_id);
        $d['loactions']=Model_location::where('user_id',$user_id)->get();
        $d['AvailMon']=ModelAvailability::where('model_id',Auth::user()->id)->where('week_day','Monday')->first();
        $d['AvailTue']=ModelAvailability::where('model_id',Auth::user()->id)->where('week_day','Tuesday')->first();
        $d['AvailWed']=ModelAvailability::where('model_id',Auth::user()->id)->where('week_day','Wednesday')->first();
        $d['AvailThu']=ModelAvailability::where('model_id',Auth::user()->id)->where('week_day',' Thursday')->first();
        $d['AvailFri']=ModelAvailability::where('model_id',Auth::user()->id)->where('week_day','Friday')->first();
        $d['AvailSun']=ModelAvailability::where('model_id',Auth::user()->id)->where('week_day','Sunday')->first();
        $d['AvailSat']=ModelAvailability::where('model_id',Auth::user()->id)->where('week_day','Saturday')->first();
    
        return view('frontend.model.editprofile',$d);
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
    public function leaderboard(Request $request)
    {
        
      
       
        // dd($request);
        $user_id= Auth::user()->id;
        $datecurrent =Carbon::now()->format('d');
        $monthcurrent =Carbon::now()->format('m');
        $yearcurrent =Carbon::now()->format('Y');
        
        if($datecurrent <= 15){
            $startDate = Carbon::createFromFormat('d/m/Y', '01/'.$monthcurrent.'/'.$yearcurrent.'');
            $endDate = Carbon::createFromFormat('d/m/Y', '15/'.$monthcurrent.'/'.$yearcurrent.'');
            $getdata1=User_logs::whereBetween('created_at', [$startDate, $endDate])->get();  
        }else{
            $startDate = Carbon::createFromFormat('d/m/Y', '16/'.$monthcurrent.'/'.$yearcurrent.'');
            $endDate = Carbon::createFromFormat('d/m/Y', '30/'.$monthcurrent.'/'.$yearcurrent.'');
        }
        $d['ModelCategory']=ModelCategory::all();
        $d['cur_mnth']=Carbon::now()->format('M Y');
        $q=User_logs::join('users','users.id','=','user_logs.to')
        ->join('models','models.user_id','=','user_logs.to')
        ->groupBy('to')
        ->selectRaw('user_logs.*, sum(model_earning) as sum')
        ->select('users.*','user_logs.to')
        ->orderby('model_earning','desc')
        ->orderBy('users.created_at','asc')
        ->where('users.gender','=','female')
        ->where('users.status','=','Active');
    

        if(isset($request->category)){
            $q->where('models.Model_Category',$request->category);
        }
        if(isset($request->earning)){
            $q->where('user_logs.method',$request->earning);
        }

        

        if(isset($request->month)){
            $month_year = explode('/', $request->month);
            $month = $month_year[0];
            $year   = $month_year[1];
            $q->whereMonth('user_logs.created_at',$month)->whereYear('user_logs.created_at',$year);
        }
      
        $d['topmodel']=$q->paginate(10)->withQueryString();

        
        return view('frontend.model.leaderboard',$d);
    }

    public function payouthistory(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['gethistory']=PayHistory::where('user_id',$user_id)->get();
        return view('frontend.model.payhistory',$d);
    }

    public function earningsshow( $request){
        try {
    
            $user_id= Auth::user()->id;
            $d['datecurrent'] =Carbon::now()->format('M y');
            $sevenday = Carbon::today()->subDays(7);
            $fourteenday = Carbon::today()->subDays(14);
            $thirtyday = Carbon::today()->subMonths(1);
            $thirtyday1 = Carbon::today()->subMonths(2);
            $thisyear = Carbon::today()->subYears(1);
            $lastyear = Carbon::today()->subYears(2)->format('y m d');
            $yesterday1 =Carbon::today()->subDays(1);
            $d['today']=User_logs::where('to',$user_id)->whereDate('created_at',Carbon::today())->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
            $d['last7']=User_logs::where('to',$user_id)->whereDate('created_at','>=',$sevenday)->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
            $d['last77']=User_logs::where('to',$user_id)->whereDate('created_at','>=',$fourteenday)->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
            $d['thirtyday']=User_logs::where('to',$user_id)->whereDate('created_at','>=',$thirtyday)->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
            $d['thirtyday2']=User_logs::where('to',$user_id)->whereDate('created_at','>=',$thirtyday1)->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
            $d['yesterday']=User_logs::where('to',$user_id)->whereDate('created_at',$yesterday1)->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
            $d['thisyear1']=User_logs::where('to',$user_id)->whereDate('created_at','>=',$thisyear)->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
            $d['lastyear1']=User_logs::where('to',$user_id)->whereDate('created_at',$lastyear)->groupBy('to')->selectRaw( 'sum(model_earning) as summ')->first();
    
            if(!empty($d['today']  &&  $d['yesterday']) ){
            $d['calcutoday']=  $d['today']->summ - $d['yesterday']->summ;
            $d['pertoday']=   100-(  $d['yesterday']->summ  *100  / $d['today']->summ) ;
            }


            if(empty($d['thisyear1'])){
                
                $d['backyear']= (float)'0';
                $d['calcuyear']= (float)'0';
                $d['peryear']=    (float)'0'   ;
            }else{
            if(!empty($d['thisyear1'] &&  $d['lastyear1']) ){
                $d['backyear']=$d['lastyear1']->summ - $d['thisyear1']->summ;
                $d['calcuyear']=    $d['thisyear1']->summ - $d['backyear'];
                $d['peryear']=     100-( $d['backyear']  / $d['thisyear1']->summ *100)   ;
            }else{
                $d['backyear']= (float)'0';
                $d['calcuyear']= $d['thisyear1']->summ - $d['backyear'];
                $d['peryear']=    100-( $d['backyear']  / $d['thisyear1']->summ *100)   ;
            }
        }
    
            if(!empty($d['last77']) ){
                $d['back7']=$d['last77']->summ - $d['last7']->summ;
                $d['calcuseven']=    $d['last7']->summ - $d['back7'];
                $d['perseven']=     100-( $d['back7']  *100/ $d['last7']->summ)   ;
            }else{
                $d['back7']=(float)'0';
                $d['calcuseven']=   (float)'0';
                $d['perseven']=   (float)'0';
            }
            if(!empty($d['thirtyday'] &&  $d['thirtyday2']) ){
                $d['backmonth']=$d['thirtyday2']->summ - $d['thirtyday']->summ;
                $d['calcuthirty']=    $d['thirtyday']->summ - $d['backmonth'];
                $d['perthirty']=     100-( $d['backmonth']  *100/ $d['thirtyday']->summ)   ;
            }else{
                $d['backmonth']=(float)'0';
                $d['calcuthirty']=    (float)'0';
                $d['perthirty']=    (float)'0';
            }
            return($d);
          } catch (Exception $e) {
            $d='';
            return($d);
          }
      
    }
    public function earnings(Request $request)
    {
        $user_id= Auth::user()->id;
        $yearcurrent =Carbon::now()->format('Y');
        $d = $this->earningsshow($request);
        
        $totaldata= [];
        $message = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method', 'message')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $message[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method', 'message')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $message[] = $totaldata[$i]['16-31'];
                }
            }
            
        }

        $totaldata= [];
        $feeds = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method','feeds')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $feeds[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method','feeds')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $feeds[] = $totaldata[$i]['16-31'];
                }
            }
            
        }

        $totaldata= [];
        $tip = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method','tips')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $tip[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method','tips')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $tip[] = $totaldata[$i]['16-31'];
                }
            }
            
        }

        $totaldata= [];
        $audiocall = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method','picture-call')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $audiocall[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method','picture-call')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $audiocall[] = $totaldata[$i]['16-31'];
                }
            }
            
        }
        
        $totaldata= [];
        $videocall = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method','video-call')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $videocall[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method','video-call')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $videocall[] = $totaldata[$i]['16-31'];
                }
            }
            
        }

        $totaldata= [];
        $mmspic = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method','picture')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $mmspic[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method','picture')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $mmspic[] = $totaldata[$i]['16-31'];
                }
            }
            
        }

        $totaldata= [];
        $mmsaudio = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method','audio')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $mmsaudio[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method','audio')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $mmsaudio[] = $totaldata[$i]['16-31'];
                }
            }
            
        }

        $totaldata= [];
        $mmsvideo = [];
        for ($i=1; $i<=12; $i++){
            $monthcurrent =$i;
            for($j=1; $j<=2; $j++) {
                if($j =='1'){
                    // 
                    $startDate =Carbon::parse('1-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('15-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');

                    $totaldata[$i]['01-15'] = User_logs::where('to',$user_id)
                        ->where('method','video')    
                        ->whereMonth('created_at', $i)
                        ->whereBetween('created_at',[$startDate, $endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $mmsvideo[] = $totaldata[$i]['01-15'];

                } else {
                    // 
                    $startDate =Carbon::parse('16-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $endDate =Carbon::parse('31-'.$i.'-'.$yearcurrent,)->format('Y-m-d H:i:s');
                    $totaldata[$i]['16-31'] = User_logs::where('to',$user_id)
                        ->whereMonth('created_at', $i)
                        ->where('method','video')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('to')
                        ->sum('model_earning');
                    $mmsvideo[] = $totaldata[$i]['16-31'];
                }
            }
        }

            
        // $datecurrent1 =Carbon::now()->format('d');
        // $monthcurrent =Carbon::now()->format('m');
        // $yearcurrent =Carbon::now()->format('Y');
        // $q = User_logs::where('to', $user_id)->groupBy('from');
        $earningData = [];
        // if($request->timing == 'currentyear'){
        //     $q->whereYear('created_at',$yearcurrent);
        // }

        if($request->timing == 'yearly') {
            for($month=1; $month <= 12; $month++) {
                $start = Carbon::create()->month($month)->year(2022)->startOfMonth()->format('Y-m-d 00:00:00');
                $end = Carbon::create()->month($month)->year(2022)->endOfMonth()->format('Y-m-d 23:59:59');
                $monthName = Carbon::create()->month($month)->year(2022)->startOfMonth()->format('M, Y');

                $userLogs = User_logs::where('to', $user_id)->whereBetween('created_at', [$start, $end])->get();
                $totalPerRow = 0;
                if(count($userLogs)> 0)
                    foreach ($userLogs as $key => $userLog) {
                        # code...
                        if(isset($earningData[$monthName][$userLog->method])){
                            $earningData[$monthName][$userLog->method] = (float)$earningData[$monthName][$userLog->method] + (float)$userLog->model_earning;
                        } else {
                            $earningData[$monthName][$userLog->method] = (float)$userLog->model_earning;
                        }
                        $totalPerRow = $totalPerRow + (float)$userLog->model_earning;
                    }
                else {
                    $earningData[$monthName] = [];
                }
                $earningData[$monthName]['date'] = $monthName;
                $earningData[$monthName]['total'] = $totalPerRow;
            }
        }

        if($request->timing == 'monthly') {
            $month = \Str::lower(isset($request->month)?$request->month: (Carbon::now()->format('M')));

            $months = [ 'jan' => 1, 'feb' => 2, 'mar' => 3, 'apr' => 4, 'may' => 5, 'jun' => 6, 'jul' => 7, 'aug' => 8, 'sep' => 9, 'oct' => 10, 'nov' => 11, 'dec' => 12];
            
            $start = Carbon::create()->month($months[$month])->year(2022)->startOfMonth()->format('Y-m-d 00:00:00');
            $end = Carbon::create()->month($months[$month])->year(2022)->endOfMonth()->format('Y-m-d 23:59:59');
            $days = Carbon::create()->month($months[$month])->year(2022)->endOfMonth()->format('d'); 

            $userLogs = User_logs::where('to', $user_id)->whereBetween('created_at', [$start, $end])->get();

            for($day=1; $day <= (int)$days; $day++) {
                // 
                $monthDay = Carbon::create()->month($months[$month])->day($day)->year(2022)->format('d M, Y');

                $totalPerRow = 0;
                if(count($userLogs)> 0) {
                    // 
                    foreach ($userLogs as $key => $userLog) {
                        # code...
                        $logDate = Carbon::parse($userLog->created_at)->format('d M, Y');
                        if($logDate == $monthDay) {
                            if(isset($earningData[$monthDay][$userLog->method])) {
                                $earningData[$monthDay][$userLog->method] = (float)$earningData[$monthDay][$userLog->method] + (float)$userLog->model_earning;
                            } else {
                                $earningData[$monthDay][$userLog->method] = (float)$userLog->model_earning;
                            }
                            $totalPerRow = $totalPerRow + (float)$userLog->model_earning;
                        }   
                    }
                } else {
                    $earningData[$monthDay] = [];
                }
                $earningData[$monthDay]['date'] = $monthDay;
                $earningData[$monthDay]['total'] = (float)$totalPerRow;
            }
        }
        
        if($request->timing == 'today') {
            // 
            $date = Carbon::now();
            $start = $date->startOfDay()->format('Y-m-d H:i:s');
            $end = $date->endOfDay()->format('Y-m-d H:i:s');
            $earningData = [];
            $userLogs = User_logs::where('to', $user_id)->whereBetween('created_at', [$start, $end])->orderBy('id', 'DESC')->get();
            $totalPerRow = 0;

            if(count($userLogs)> 0)
                foreach ($userLogs as $key => $userLog) {
                    # code...
                    $earningData[$key][$userLog->method] = (float)$userLog->model_earning;
                    $earningData[$key]['total'] = (float)$userLog->model_earning;
                    $earningData[$key]['date'] = Carbon::now()->format('h:i A');
                }
        }

        // $d['spenders']=$q->paginate(10)->withQueryString();
        $d['message']=implode(',', $message);
        $d['feeds']=implode(',', $feeds);
        $d['tips']=implode(',', $tip);
        $d['audiocall']=implode(',', $audiocall);
        $d['videocall']=implode(',', $videocall);
        $d['mmspic']=implode(',', $mmspic);
        $d['mmsvideo']=implode(',', $mmsvideo);
        $d['mmsaudio']=implode(',', $mmsaudio);
        $d['earnings'] = $earningData; 
        return view('frontend.model.earnings', $d);

    }
    public function tips(Request $request)
    {
    
        $user_id= Auth::user()->id;
        $count_tips=User_logs::where('to',$user_id)->where('method','tips')->orderBy('created_at','Desc');

        $count_completed_tips =User_logs::where('to',$user_id)->where('method','tips')->where('status','1')->orderBy('created_at','Desc');
       
        $count_incompleted_tips=User_logs::where('to',$user_id)->where('method','tips')->where('status','0')->orderBy('created_at','Desc');
        $d['count_tips']=$count_tips->get();
        $d['tips']=$count_tips->paginate(10)->withQueryString();
       
        $d['count_completed_tips']=$count_completed_tips->get();
        $d['completed_tips']=$count_completed_tips->paginate(10)->withQueryString();
        
        $d['count_incompleted_tips']=$count_incompleted_tips->get();
        $d['incompleted_tips']=$count_incompleted_tips->paginate(10)->withQueryString();
      
        return view('frontend.model.tips',$d);
    }
    public function calls(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['model']=Models::where('user_id',$user_id)->first();
        if($request->year){
            $d['calls']=UserCalls::where('call_to',$user_id)->orderBy('created_at','Desc')->whereYear('created_at',$request->year)
            ->paginate(10)->withQueryString();
            $d['audiocalls']=UserCalls::where('call_to',$user_id)->where('call_type','audio-call')->orderBy('created_at','Desc')->whereYear('created_at',$request->year)
            ->paginate(10)->withQueryString();
            $d['videocalls']=UserCalls::where('call_to',$user_id)->where('call_type','video-call')->orderBy('created_at','Desc')->whereYear('created_at',$request->year)
            ->paginate(10)->withQueryString();
        }else{
            $d['calls']=UserCalls::where('call_to',$user_id)->orderBy('created_at','Desc')
            ->paginate(10)->withQueryString();
            $d['audiocalls']=UserCalls::where('call_to',$user_id)->where('call_type','audio-call')->orderBy('created_at','Desc')
            ->paginate(10)->withQueryString();
            $d['videocalls']=UserCalls::where('call_to',$user_id)->where('call_type','video-call')->orderBy('created_at','Desc')
            ->paginate(10)->withQueryString();
        }
       
        return view('frontend.model.calls',$d);
    }
    public function topspenders(Request $request)
    {
        $datecurrent =Carbon::now()->format('d');
        $monthcurrent =Carbon::now()->format('m');
        $yearcurrent =Carbon::now()->format('Y');
        $user_id= Auth::user()->id;
        $q=User_logs::where('to',$user_id)->groupBy('from')->selectRaw('user_logs.*, sum(model_earning) as sum')->orderBy('sum','Desc');
        if($request->timing == 'currentyear'){
            $q->whereYear('created_at',$yearcurrent);
        }
        if($request->timing == 'lastmonth'){
            $q->whereMonth('created_at',$monthcurrent);
        }
        if($request->timing == 'all'){
           
        }
        if($request->timing == 'today'){
            $q->whereDay('created_at',$datecurrent);
        }
       
      
        $d['spenders']=$q->paginate(10)->withQueryString();
        return view('frontend.model.topspender',$d);
    }
    public function thumbnail($originalPath, $file, $user, $width, $height){        
        $ogImage = Image::make($file);
        $ogImage->fit($width, $height);
        $img = explode('.', $file->getClientOriginalName());
        $thImage = $ogImage->save($originalPath.$img[0].'_'.$width.'x'.$height.'.'.$img[1],70);
        return  $thImage;
    }
    public function updateprofile(Request $request)
    {
    //   if(!empty($request->availability)){
    //     $available='1';
    //   }else{
    //     $available='0';
    //   }
     
        $user_id= Auth::user()->id;
      $social_links = [];
      $social_links = [
          'twitter'       => "$request->link1",
          'instagram'     => "$request->link2",
          'snapchat'      => "$request->link3",
          'spankpay'      => "$request->link4",
          'website'       => "$request->link5",
          'camsite'       => "$request->link6",
      ];
      $models = Models::updateOrCreate(['id'=>$request->id],[
        'Orientation'       => $request->orientation,
        'Model_Category'    => $request->modelcategory,
        'Ethnicity'         => $request->ethincity,
        'Language'          => $request->language,
        'Hair'              => $request->hair,
        'Fetishes'          => $request->fetish,
        'socail_links'      => json_encode($social_links, true),
    ]);
        $d['model'] = DB::table('users')
                    ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                    ->leftjoin('models', 'models.user_id', '=', 'users.id')
                    ->select('users.*','models.*')
                    ->where('role_user.role_id', '=', 6)
                    ->get();
        // $password = Hash::make($request->password);
        $user = User::updateOrCreate(['id'=>$user_id],[
            'discription'   => $request->description,
            'city'   => $request->city,
            'availability' =>$request->availability,
        ]);
        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $ogImage = Image::make($file);
            $file->getClientOriginalName();
            
            $originalPath = time().'_user_'.$user->id;
            $ogImage =  $ogImage->save('profile-image/'.$originalPath.$file->getClientOriginalName(),70);
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '600','550');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '250','300');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '300','300');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '300','350');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '175','175');
            
            User::where('id',$user->id)->update([
            'profile_image' => $originalPath.$file->getClientOriginalName()
            ]);
        }
        $user->update();
        if(isset($request->id)){
            $user_id=$request->user_id;
        }else{
            $user_id =  $user->id;
        }
        $last_id=User::orderBy('id', 'DESC')->first();

            if(empty($request->userid)){
                $user_id1= $last_id->id;
            }else{
                $user_id1=$request->userid;
            }
       $model_name=$request->first_name.' '.$request->last_name;
        $models->tags()->sync($request->input('tags', []));
        if($request->hasfile('gallery_image'))
        {
            $file1 = $request->file('gallery_image');
            foreach($file1 as $image)
            {
              $name =$image->getClientOriginalName();
              $destinationPath = 'gallery images';
              $image->move($destinationPath, $name);
              $gallery_image_name[] =  $name;

            }
        }
        $result = [];
        $varimg = json_decode($request->gallery_images_old);
        if(!empty($gallery_image_name) && !empty($varimg)){
            $result = array_merge($gallery_image_name, $varimg);
        }
        else if(!empty($gallery_image_name)) {
            $result = $gallery_image_name;
        } else {
            $result = $varimg;
        }
        Models::where('id','=',$models->id)->update([
            'gallery_image' => json_encode($result,true)
        ]);
        $models->update();
        return back();
    }
   
    public function settings()
    {
        $dt = new DateTime();
        $laravelCronTime= $dt->format('H:i:s');
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        $d['userdata']=$this->getUserMeta($user_id);
        $d['loactions']=Model_location::where('user_id',$user_id)->get();
        $sleepModeNew=SleepMode::where('model_id',Auth::user()->id)->where('is_active',true)->first();
        
         if(!empty($sleepModeNew)){
            $d['sleepMode']=$sleepModeNew;
         }

             
        
        return view('frontend.model.settings',$d);
    }
    public function phonesave(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        $d['user']->loginphone=$request->loginphone;
        $d['user']->bbphone=$request->bbphone;
        $d['user']->phone=$request->phone;
        $d['user']->save();
       

        return back();
    }
    public function paymentdetails(Request $request){
// dd($request);
        $user_id= Auth::user()->id;
        $paydetails=Models::where('user_id',$user_id)->first();
        if(!empty($paydetails)){
            $paydetails->pay_method=$request->Check;
            $paydetails->payble=$request->paybleto;
            $paydetails->street_address=$request->payaddress;
            $paydetails->apartment_unit=$request->apartment;
            $paydetails->province=$request->provience;
            $paydetails->zip=$request->zip;
            $paydetails->account_no=$request->acnumber;
            $paydetails->ifsc_code=$request->ifsc;
              $paydetails->save();
             $user_details=User::where('id',$user_id)->first();
             $user_details->city=$request->city;
             $user_details->save();
        }
       

        return back();
    }
    public function priceset(Request $request){
        $user_id= Auth::user()->id;
        $d['user']=Models::where('user_id',$user_id)->first();
        $d['user']->cost_msg= $request->textprice;
        $d['user']->cost_pic= $request->pictureprice;
        $d['user']->cost_audiomsg= $request->audioprice;
        $d['user']->cost_videomsg= $request->videoprice;
        $d['user']->phone= $request->phonecall; 
        $d['user']->cost_audiocall= $request->phonecallprice;
        $d['user']->min_call_time= $request->phonecalltime;
        $d['user']->video= $request->videocall;
        $d['user']->cost_videocall= $request->videocallprice; 
        $d['user']->min_videocall_time= $request->videocalltime;
        $d['user']->save();
       

        return back();
    }
    public function emailsave(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        $d['user']->nofify_email=$request->nofify_email;
        $d['user']->save();
       

        return back();
    }
    public function timezone(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        $d['user']->timezone=$request->time_zone;
        $d['user']->save();
        return back();
    }  
    public function deletelocation(Request $request)
    {
       
        $user_id= Auth::user()->id;
        $location =Model_location::where('id',$request->id)->first();
        $loactions =Model_location::where('user_id',$user_id)->get();
        if ($location != null) {
           $location->delete();
        }
      

        return true;
       
    }  
    public function pricing(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['price']= Models::where('user_id', $user_id)->first();
        return view('frontend.model.price',$d);
    }
    public function referralbonus(Request $request)
    {    $user_id= Auth::user()->id;
        $q= refferal_users::join('users','users.id','refferal_users.refer_to')->where('refer_from', $user_id)->orderBy('amount','desc');
        if($request->year){
          $q->whereYear('refferal_users.created_at',$request->year)->get();
        }
        $d['user']=$q;
        $d['totalpay']= refferal_users::where('refer_from', $user_id)->sum('amount');
        // $d['price']= Models::where('user_id', $user_id)->first();
        return view('frontend.model.referal',$d);
    }
    public function paymentInfo(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['details']= Models::where('user_id', $user_id)->first();
      
        return view('frontend.model.paymentInfo',$d);
    }
    public function locationsave(Request $request)
    {
        $user_id= Auth::user()->id;
      $userblocklocation=new Model_location;
        $userblocklocation->user_id=$user_id;
        $userblocklocation->location=$request->location;
        $userblocklocation->save();
       

        return back();
    }
    public function notification(Request $request)
    {
        $user_id= Auth::user()->id;
        $usermeta=UserMeta::where('user_id',$user_id)->where('key',$request->key)->first();
        if(!empty($usermeta)){
            $usermeta->value=$request->value;
            $usermeta->save();
        }else{  $usermeta1= new UserMeta;
            $usermeta1->user_id=$user_id;
            $usermeta1->key=$request->key;
            $usermeta1->value=$request->value;
            $usermeta1->save();
        }
        


        return back();
    }
    public function modeldetailssave(Request $request)
    {
        //
    
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        $d['user']->first_name=$request->first_name;
        $d['user']->email=$request->email;
        $d['user']->phone=$request->number;
        $d['user']->dob=$request->dob;
        $d['user']->save();
       

        return back();
    }
    public function profileupdate(Request $request)
    {
   
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        
        if($request->profile_image)
        {
    
            $file = $request->file('profile_image');
            
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('profile-image/', $filename);
           
            $d['user']->profile_image=$filename;
        }
        $d['user']->save();
       

        return back();
    }
    public function passwordupdate(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password  same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
            'new-password-confirm' => 'same:new-password|min:8'
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
    public function faq(Request $request)
    {
       
    $title='Model Faq';
        $data=Page::where('slug','faq')->first();
        return view('frontend.model.show',compact('data','title'));
       
    }
    public function legal(Request $request)
    {
        $title='Bad Bunnies Independent Contractor Agreement';
        $data=Page::where('slug','legal')->first();
        return view('frontend.model.show',compact('data','title'));
    }
    public function contact(Request $request)
    {
        return view('frontend.model.contact');
    }
    public function conduct(Request $request)
    {
        $title='Bad Bunnies Models Code Of Conduct';
        $data=Page::where('slug','conduct')->first();
        return view('frontend.model.show',compact('data','title'));
    }
    public function protection(Request $request)
    {
        $title='Bad Bunnies Chargeback Protection';
        $data=Page::where('slug','protection')->first();
        return view('frontend.model.show',compact('data','title'));
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
    public function tip_update(Request $request)
    {
        $user_log=User_logs::where('id',$request->tip_id)->first();
        if($user_log->status=='1'){
            
            $user_log->status='0';
            $user_log->save();
           
        }else{
            if($user_log->status=='0'){
             
                $user_log->status='1';
                $user_log->save();
            }
        }
        
        return redirect()->back();
    }
    public function model_steps(Request $request)
    {  
       


        if(!empty($request)){
         
            if($request->step=='2'){
                
                $getmodel=User::where('id',$request->model_id)->first();
               
                $getmodel->password= Hash::make($request->new_password);
                $getmodel->profile_step='2';
              
                $getmodel->save();
                return redirect()->back();
                
            }
            if($request->agreement=='agreement'){
              
                $getmodel=User::where('id',$request->model_id)->first();
                $getmodel->profile_step='3';
                $getmodel->save();
                return redirect()->back();
                
            }
            if($request->step=='3'){
                $getmodel=User::where('id',$request->model_id)->first();
                $getmodel->profile_step='3';
                $getmodel->save();
            }
            if($request->step=='4'){
               $getmodel=User::where('id',$request->model_id)->first();
                $getmodel->profile_step='4';
                $getmodel->location=$request->location;
                $getmodel->timezone=$request->Timezone;
                $getmodel->discription=$request->bio;


                
        
                
             $getmodel->save();

                $social_links = [];
              $social_links = [
            'twitter'       => "$request->Twitter",
            'instagram'     => "$request->Instagram",
            'snapchat'      => "$request->Snapchat",
            'spankpay'      => "$request->SpankPay",
            'website'       => "$request->Website",
            'camsite'       => "$request->CamSite",
            'Wishlist'       => "$request->Wishlist",
        ];
       
         $model=Models::where('user_id',$request->model_id)->first();
          $model->Orientation=$request->orientation;
          $model->Hair=$request->hair;
          $model->Fetishes=$request->fetishes;
          $model->Ethnicity=$request->ethnicity;
          $model->Language=$request->language;
          $model->socail_links=json_encode($social_links, true);
          $model->save();
          return redirect()->back();
            }

            if($request->step=='5'){
              $getmodel=User::where('id',$request->model_id)->first();
              $getmodel->phone=$request->Privatenumber;
              $getmodel->bbphone=$request->badbunniestv;
              $getmodel->loginphone=$request->loginnumber;
                $getmodel->profile_step='5';
                $getmodel->save();
             
        
          return redirect()->back();

            }
            if($request->step=='6'){
            // $validated = $request->validate([

            // 'text_price' => 'max:255|min:2',

            // 'picture_price' => 'max:255|min:2',

            // 'audio_price' => 'max:255|min:2',

            // 'video_price' => 'max:255|min:2',

            // 'incoming_call_price' => 'max:255|min:2',

            // 'min_call_time' => 'max:255|min:2',

            // 'incoming_video_call' => 'max:255|min:2',

            // ]);
              $getmodel=User::where('id',$request->model_id)->first();
              $getmodel->profile_step='6';
              $getmodel->save();
               
         $model=Models::where('user_id',$request->model_id)->first();
         
          $model->cost_msg=$request->text_price;
          $model->cost_pic=$request->picture_price;
          $model->cost_audiomsg=$request->audio_price;
          $model->cost_videomsg=$request->video_price;
          $model->cost_audiocall=$request->incoming_call_price;
          $model->cost_videocall=$request->incoming_video_call;
          $model->min_call_time=$request->min_call_time;
          $model->phone=$request->phonecall;
          $model->video=$request->videocall;
         
       
          $model->save();
          return redirect()->back();
            }
            if($request->step=='7'){
              $getmodel=User::where('id',$request->model_id)->first();
                $getmodel->profile_step='7';
                $getmodel->profile_status='1';
                $getmodel->city=$request->City;
                $getmodel->country=$request->Country;
                $getmodel->save();
               
         $model=Models::where('user_id',$request->model_id)->first();
         
          $model->ifsc_code=$request->ifsccode;
          $model->account_no=$request->accountno;
          $model->street_address=$request->streetadd;
          $model->zip=$request->zip;
          $model->province=$request->Province;
          $model->payble=$request->Payble;
          $model->apartment_unit=$request->Apartmentunit;
          $model->save();
          return redirect('/');
            }
        }
       
    }
    public function filtersection(){
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $d['Orientation']=ModelOrientation::all();
        $d['ModelCategory']=ModelCategory::all();
        $d['ModelEthnicity']=ModelEthnicity::all();
        $d['ModelLanguage']=ModelLanguage::all();
        $d['ModelHair']=ModelHair::all();
        $d['ModelFetishes']=ModelFetishes::all();
        return $d;
    }
    public function commonsort($q, $request)
    {
        $randstatus=true;
        if($request->type == 'online' || $request->type == 'newmodel') {
            
            if($request->sort == 'low-to-high'){
                $randstatus=false;
                $q->orderBY('models.cost_msg','asc');  
            }
            if($request->sort == 'high-to-low'){
                $randstatus=false;
                $q->orderBY('models.cost_msg','desc');  
            }
        }
        if($request->type == 'phone') {
            if($request->sort == 'low-to-high'){
                $randstatus=false;
                $q->orderBY('models.cost_audiocall','asc');  
            }
            if($request->sort == 'high-to-low'){
                $randstatus=false;
                $q->orderBY('models.cost_audiocall','desc');  
            }
        }
        if($request->type == 'video') {
            if($request->sort == 'low-to-high'){
                $randstatus=false;
                $q->orderBY('models.cost_videocall','asc');  
            }
            if($request->sort == 'high-to-low'){
                $randstatus=false;
                $q->orderBY('models.cost_videocall','desc');  
            }
        }
        
        if(isset($request->gender)){
            $randstatus=false;
            $q->whereIn('users.gender',$request->gender);
        } else {
           
            $q->where('users.gender','=','female');
        }
       
        if(isset($request->orientation)) {
            $randstatus=false;
            $q->where('Orientation',$request->orientation);
        }
        if(isset($request->ethnicity)){
            $randstatus=false;
            $q->whereIn('Ethnicity',$request->ethnicity);
        }
        if(isset($request->language)){
            $randstatus=false;
            $q->whereIn('Language',$request->language);
        }
        if(isset($request->category)){
            $randstatus=false;
            $q->where('Model_Category',$request->category);
        }

        if(isset($request->fetish)){
            $randstatus=false;
            $q->whereIn('Fetishes',$request->fetish);
        }

        if(isset($request->hair)){
            $randstatus=false;
            $q->whereIn('Hair',$request->hair);
        }


        if($request->sort == 'online'){
            $randstatus=false;
            $q->where('users.is_online','=',1);  
        }
        if($request->sort == 'joining'){
            $randstatus=false;
            $q->orderBY('users.created_at','desc');  
        }



       

        
        if($request->sort == 'rank'){
            $randstatus=false;
            $datecurrent =Carbon::now()->format('d');
            $monthcurrent =Carbon::now()->format('m');
            $yearcurrent =Carbon::now()->format('Y');
            if($datecurrent <= 15){
                $startDate = Carbon::createFromFormat('d/m/Y', '01/'.$monthcurrent.'/'.$yearcurrent.'');
                $endDate = Carbon::createFromFormat('d/m/Y', '15/'.$monthcurrent.'/'.$yearcurrent.'');
            }else{
                $startDate = Carbon::createFromFormat('d/m/Y', '16/'.$monthcurrent.'/'.$yearcurrent.'');
                $endDate = Carbon::createFromFormat('d/m/Y', '30/'.$monthcurrent.'/'.$yearcurrent.'');
            }

            $q->join('user_logs', 'user_logs.to', '=', 'models.id');
            $q->selectRaw( \DB::raw('SUM(user_logs.model_earning) as model_earning'));
            $q->groupBy('models.id');
            $q->orderBy('model_earning', 'desc');
            $q->whereBetween('user_logs.created_at', [$startDate, $endDate]);

        
        }
        if($randstatus){
            $q->inRandomOrder();
        }
        return $q;
    }
    public function explore(Request $request){
        
        $current_time = Carbon::now();
        $pagination=1000;
        $q=ModelFeed::leftjoin('users', 'users.id', '=', 'model_feeds.model_id')
        ->leftjoin('models', 'models.user_id', '=', 'model_feeds.model_id')
        ->leftjoin('feed_media', 'feed_media.feed_id', '=', 'model_feeds.id')
        ->where('model_feeds.status', '1')
        ->where('model_feeds.explore', '1')
        ->where('model_feeds.schedule_date', '<=', $current_time)
        ->groupBy('model_feeds.id')
        ->orderBy('model_feeds.schedule_date','DESC');
      
        if($request->post_type == 'video'){
            $q->where('feed_media.media_type', 'mp4');  
        }
        if($request->post_type == 'audio'){
            $q->where('feed_media.media_type', 'mp3');  
        }
        if($request->post_type == 'picture'){
            $q->whereIn('feed_media.media_type', ['jpg','png','jpeg','gif']);
        }
        if($request->price == 'free'){
           
            $q->where('model_feeds.price', '<','0.5');  
        }
        if($request->price == 'premium'){
            $q->where('model_feeds.price', '>=','0.5');  
        }
        $d=$this->filtersection();
        $q=$this->commonsort($q, $request);
        $d['explorecount']=$q->count();
        $d['explore']=$q->get();
         $d['auth_id']=Auth::user()->id;


        $d['likes'] = DB::table('model_feed_like')
                 ->select('feed_id', DB::raw('count(*) as number'))
                 ->orderBy('number','desc')
                 ->groupBy('feed_id')
                 ->get();
        return view('frontend/model/explore',$d);
    }
    public function away_mode(Request $request){
      $checkMode=User::where('id',Auth::user()->id)->first();
    
     if($checkMode->is_away=='0'){
        $checkMode->is_away='1';
        $checkMode->save();
     }elseif($checkMode->is_away=='1'){
        $checkMode->is_away='0';
        $checkMode->save();

        $userNotify=NotifyUsers::where('model_id',Auth::user()->id)->get();
       if(!empty($userNotify)){

        foreach($userNotify as $item){
            $first_name = ($item->model->first_name) ? $item->model->first_name." " : "";
            $last_name = ($item->model->last_name) ? $item->model->last_name : "";
            $details = [
           'email' => $item->user->email,
           'modelProfile'=>$item->model->profile_image,
           'modelName'=>$first_name ."" .$last_name,
           'modelSlug'=>$item->model->slug,
           ];
            if($item->notify_method=='email'){
                                           
         Mail::send('mails.notifyuser', $details, function($message) use ($details){
            $message->to($details['email'])->subject($details['modelName'].' is available to chat on Bad bunniesTV')->from(env('MAIL_FROM_ADDRESS'));
        });
            }elseif($item->notify_method=='sms'){

                $token = getenv("TWILIO_TOKEN");
                $twilio_sid = getenv("TWILIO_SID");
                $getphone = getenv("TWILIO_FROM");
                $client = new Client($twilio_sid, $token);
                $baseURL=url();
                $message = $client->messages
                                  ->create("+917340252552", // to
                                           ["body" => "".$details['modelName']." is available to chat now! ", "from" => $getphone]
                                  );
 
     
            }
            $item->delete();
        }
        
       }
     }

      
      
     
    }
        public function feed_update_popup(Request $request){

            try {
              
                $modelFeed=ModelFeed::where('id',$request->feed_id)->first();
                $modelFeed->description=$request->description;
                $modelFeed->price=$request->price;
                $modelFeed->save();
            
                $FeedMediaFeed=Feed_media::where('feed_id',$request->feed_id)->get();
                if(!empty($FeedMediaFeed)){ 
                
                    foreach($FeedMediaFeed as $item){ 
                        $item->delete();
                    }

                }
                
                if($request->oldImg){

                    foreach($request->oldImg as $val){

                        $extension= pathinfo($val, PATHINFO_EXTENSION);
                        
                        $FeedMedia=new Feed_media;
                        $FeedMedia->model_id=Auth::user()->id;
                        $FeedMedia->feed_id=$request->feed_id;
                        $FeedMedia->medai=$val;
                        $FeedMedia->media_type=$extension;
                        $FeedMedia->save();
                        // return $FeedMedia;
                    }
        
                }
                
                $feed_media =isset($request->images) ? $request->images : "" ;

                if(!empty($feed_media)){
                    foreach ($feed_media as $key => $cabinet) {
                
                        if(!empty($feed_media[$key])){
                            $imagePath = $feed_media[$key];
                            $imageName = uniqid().$imagePath->getClientOriginalName();
                            $extension = $imagePath->getClientOriginalExtension();
                        
                            $feed_media[$key]->move('images/Feed_media', $imageName);
                            $image=new Feed_media;
                            $image->feed_id=$request->feed_id;
                            $image->medai=$imageName;
                            $image->media_type=$extension;
                            $image->model_id=Auth::user()->id;
                            $image->save();
                        }
                
                    }
                }

                return redirect()->back();


              } catch (Exception $e) {
                      echo '<pre>';
                      print_r($e);
                      exit;
              }

           
        }



        public function feed_update_popup_ajax(Request $request) {
       
            $modelFeed=ModelFeed::where('id',$request->id)->first();

            // return $modelFeed;
            $FeedMediaFeed=Feed_media::where('feed_id',$modelFeed->id)->get();

            if(!empty($modelFeed->price)){
                $feedPrice=$modelFeed->price;
            }else{
                $feedPrice="0.00";
            }

            $url=url('images/Feed_media');
            $feed_data='';

            if(!empty($FeedMediaFeed)){
                foreach($FeedMediaFeed as $item){
                    if($item->media_type=='mp4'){
                        $feed_data.='<div class="wrapper-thumb-popup">
                        <video width="90" height="80" controls>
                        <source src="'.$item->medai.'" type="video/mp4">
                       
                      </video>
                        <span class="remove-btn-popup">x</span>
                        
                        <input type="hidden" class="oldImg" value="'.$item->medai.'" name="oldImg[]">
                        
                    </div>
                    ';
                    }else{
                        $feed_data.='<div class="wrapper-thumb-popup">
                        <img src="'.url("images/Feed_media").'/'.$item->medai.'" class="popup-img-preview-thumb ">
                        <span class="remove-btn-popup">x</span>
                        
                        <input type="hidden" class="oldImg" value="'.$item->medai.'" name="oldImg[]">
                        
                    </div>
                    ';
                    }
                   
                }
            }

            $popupContent= '';
      
            $popupContent.= '
            <form method="post" action="'.url("model/feed-update-popup").'" enctype="multipart/form-data" id="form_submit2">
                '.csrf_field().'
            <div class="form-group">
                <input type="hidden"  value="'.$modelFeed->id.'" name="feed_id">
                <textarea type="text" name="description" class="form-control mt-4" id="exampleInputEmail1"
                    aria-describedby="emailHelp">'.strip_tags($modelFeed->description).'</textarea>
            </div>
            <div class="form-group">
                <div class="file-upload">
                   
                    <div class="row">
                        <div class="col">

                            <div class="form-group mt-2">
                                    <div class="upload_div"> <label class="upload_label" for="upload-img1"><i
                                                            class="fa fa-camera" aria-hidden="true"></i> Add Photo, Video,
                                                        Audio</label></div>
                                                <input type="file" class="form-control" name="images[]" multiple
                                                    id="upload-img1" />
                            </div>
                            <span class="images_error_popup text-danger"></span>
                                    
                            <div class="img-thumbs1 img-thumbs-hidden" id="img-preview1" style="display: block !important;">

                                    <div class="price d-flex justify-content-between">
                                    <div class=" ml-3 pop_img_slide">
                                      <div id="new-wrapper-img " class="d-flex">
                                        '.$feed_data.'
                                    </div>
                                    </div>
                                    <div class="mr-3">
                                    <div class="number  mt-4 d-flex">
                                        <span class="minus mt-2">-</span>
                                            <input type="number" min="1" max="5" name="price"
                                               class="input-price  text_price earncount_input_" type="text"
                                                id="premium_cost" value="'.$feedPrice.'" />
                                            <span class="plus mt-2" >+</span>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <span class="oldImg" value=""></span>
                       
                    </div>
                </form>';
                $popupContent .= '';
             
                return response()->json(['status' => 'success', 'popupContent' => $popupContent]);
        }


        public function sleep_mode(Request $request){
            $dt = new DateTime();
            $laravelCronTime= $dt->format('H:i:s');

            $sleepMode=SleepMode::where('model_id',Auth::user()->id)->first();
           
            if(!isset($sleepMode)){
                
               $newSleepMode=new SleepMode;
               $newSleepMode->model_id=Auth::user()->id;
               $newSleepMode->start_time=$request->startTimeSleep;
               $newSleepMode->end_time=$request->endTimeSleep;
               $newSleepMode->mode_type=$request->SleepModeType;
               $newSleepMode->save();
            }else{
               $sleepMode->model_id=Auth::user()->id;
               $sleepMode->start_time=$request->startTimeSleep;
               $sleepMode->end_time=$request->endTimeSleep;
               $sleepMode->mode_type=$request->SleepModeType;
               $sleepMode->save();
            }
            if($sleepMode->start_time<$laravelCronTime){
                $user=User::where('id',Auth::user()->id)->first();
                $user->is_sleep_mode='1';
                $user->save();

            }
               
                return 'succus';
        }
        public function sleep_mode_off(Request $request){

            $sleepMode=SleepMode::where('model_id',Auth::user()->id)->get();
             foreach($sleepMode as $item){
                $item->delete();
             }
           
                $user=User::where('id',Auth::user()->id)->first();
                $user->is_sleep_mode='0';
                $user->save();
                return 'succus';
        }
        
        public function model_availability(Request $request){

        
          $ModelAvailability=ModelAvailability::where('model_id',Auth::user()->id)->get();
          if(count($ModelAvailability)>0){
           foreach($ModelAvailability as $item){
             $item->delete();
           }
            
          }

          $weekDayArray=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
            
          foreach($weekDayArray as $item){

              switch ($item) {
                  case "Monday":
                      $form= $request->mon_from;
                      $until= $request->mon_until;
                      if($request->mon_from=='open' || $request->mon_from=='limited' || $request->mon_from=='unavailable'){
                        $type=$request->mon_from;
                      }else{
                          $type='custom';
                      }
                     break;

                  case "Tuesday":
                      $form= $request->tue_from;
                      $until= $request->tue_until;
                      if($request->tue_from=='open' || $request->tue_from=='limited' || $request->tue_from=='unavailable'){
                          $type=$request->tue_from;
                        }else{
                            $type='custom';
                        }

                   break;

                  case "Wednesday":
                      $form= $request->wed_from;
                      $until= $request->wed_until;
                      if($request->wed_from=='open' || $request->wed_from=='limited' || $request->wed_from=='unavailable'){
                          $type=$request->wed_from;
                        }else{
                            $type='custom';
                        }

                   break;

                  case "Thursday":
                      $form= $request->thu_from;
                      $until= $request->thu_until;

                      if($request->thu_from=='open' || $request->thu_from=='limited' || $request->thu_from=='unavailable'){
                          $type=$request->thu_from;
                        }else{
                            $type='custom';
                        }

                      break;

                  case "Friday":
                      $form= $request->fri_from;
                      $until= $request->fri_until;

                      if($request->fri_from=='open' || $request->fri_from=='limited' || $request->fri_from=='unavailable'){
                          $type=$request->fri_from;
                        }else{
                            $type='custom';
                        }

                          break;
                          
                  case "Saturday":
                      $form= $request->sat_from;
                      $until= $request->sat_until;
                      if($request->sat_from=='open' || $request->sat_from=='limited' || $request->sat_from=='unavailable'){
                          $type=$request->sat_from;
                        }else{
                            $type='custom';
                        }

                      break;

                  case "Sunday":
                      $form= $request->sun_from;
                      $until= $request->sun_until;
                      if($request->sun_from=='open' || $request->sun_from=='limited' || $request->sun_from=='unavailable'){
                          $type=$request->sun_from;
                        }else{
                            $type='custom';
                        }
                          break;
                }

                  $NewAvailability=new ModelAvailability;
                  $NewAvailability->model_id=Auth::user()->id;
                  $NewAvailability->week_day=$item;
                  $NewAvailability->from_time=$form;
                  $NewAvailability->until_time=$until;
                  $NewAvailability->availability_type=$type;
                  $NewAvailability->save();

                

          } 
                $UserAvaibale=User::where('id',Auth::user()->id)->first();
                $UserAvaibale->availability='1';
                $UserAvaibale->save();

                return response()->json(['status' => 'success']);

                
        }
        public function model_availability_off(){
            $ModelAvailability=ModelAvailability::where('model_id',Auth::user()->id)->get();
          if(count($ModelAvailability)>0){
           foreach($ModelAvailability as $item){
             $item->delete();
           }
           $UserAvaibale=User::where('id',Auth::user()->id)->first();
           $UserAvaibale->availability='0';
           $UserAvaibale->save();
           return response()->json(['status' => 'success']);

          }
           
        }

        public function re_schedule_feed(Request $request){
            $feedData=ModelFeed::where('id',$request->feedId)->first();
            if(!empty($feedData)){
                $scheduleTime=$request->reSecheduleDate.' '.$request->reSecheduleTime;
                $feedData->schedule_date=$scheduleTime;
                $feedData->save();
                return response()->json(['status' => 'success']);
            }
            
        
           
        }
public function verify_email(Request $request){

    $userDetails=User::where('id',Auth::user()->id)->first();
    $passOtp= rand(100000, 999999);
    
    if(!empty($userDetails)){
        $checkMail=user::where('email',$request->Email)->get();
        if(count($checkMail)>0){
            return response()->json(['status' => 'mailTaken']);
        }else{
            $details = [
                'email' => $request->Email,
                'otp'=>$passOtp,
                ];
    
            Mail::send('mails.model_email_verify', $details, function($message) use ($details){
                $message->to( $details['email'])->subject('Email Verification Code')->from(env('MAIL_FROM_ADDRESS'));
            });
    
            $userDetails->verify_otp=$passOtp;
            $userDetails->save();
            return response()->json(['status' => 'success']);
        }
    }
}
public function verify_new_email(Request $request){

    $userDetails=User::where('id',Auth::user()->id)->first();
   
    
    if(!empty($userDetails)){
      if($userDetails->verify_otp==$request->Otp){

        $userDetails->email=$request->Email;
        $userDetails->save();
        return response()->json(['status' => 'success']);
      }else{
        return response()->json(['status' => 'false']);
      }
        
    }
}
public function dismiss_notifications(Request $request){

    $userDetails=User::where('id',Auth::user()->id)->first();
    $userUnreadTips=User_logs::where('status','0')->where('method','tips')->where('to',Auth::user()->id)->get();
    $notification=ChMessage::where('to_id',Auth::user()->id)->where('seen','0')->get();

    if(!empty($userDetails)){
        if(!empty($userUnreadTips)){
            foreach($userUnreadTips as $item){
                $item->status='1';
                $item->save();
            }

        }
     if(!empty($notification)){
        foreach($notification as $item){
            $item->seen='1';
            $item->save();
        }
     }
        
    }
    return redirect()->back();
}
    public function add_contact_ajax(Request $request){
        $Contact=Contacts::where('fan_id',Auth::user()->id)->where('model_id',$request->ModelID)->count();
        if($Contact<=0){
            $newContact=new Contacts;
            $newContact->fan_id=Auth::user()->id;
            $newContact->model_id=$request->ModelID;
            $newContact->save();
            return response()->json(['status' => 'added']);
        }

    }
    public function feeds_render(Request $request){

        $auth_id=Auth::user()->id;
        $current_time = Carbon::now();

        $explore=ModelFeed::leftjoin('users', 'users.id', '=', 'model_feeds.model_id')
            ->leftjoin('models', 'models.user_id', '=', 'model_feeds.model_id')
            ->leftjoin('feed_media', 'feed_media.feed_id', '=', 'model_feeds.id')
            ->leftjoin('contacts', 'contacts.model_id', '=', 'model_feeds.model_id')
            ->where('model_feeds.status', '1')
            ->where('model_feeds.explore', '1')
            ->where('contacts.fan_id', Auth::user()->id)
            ->where('model_feeds.schedule_date', '<=', $current_time)
            ->groupBy('model_feeds.id')
            ->orderBy('model_feeds.schedule_date','DESC')->skip($request->take)->take(5)->get();
    
    
        $options = view("frontend.fan.render-feeds",compact('explore','auth_id'))->render();

        $feed=ModelFeed::leftjoin('users', 'users.id', '=', 'model_feeds.model_id')
            ->leftjoin('models', 'models.user_id', '=', 'model_feeds.model_id')
            ->leftjoin('feed_media', 'feed_media.feed_id', '=', 'model_feeds.id')
            ->where('model_feeds.status', '1')
            ->where('model_feeds.explore', '1')
            ->where('model_feeds.schedule_date', '<=', $current_time)
            ->groupBy('model_feeds.id')
            ->orderBy('model_feeds.schedule_date','DESC')->skip($request->takeFeedPage)->take(6)->get();

            
        
        $feedData = view("frontend.fan.render-feeds-page",compact('feed','auth_id'))->render();
        $feedDataSecond = view("frontend.fan.render-feeds-page-2",compact('feed','auth_id'))->render();
            

        $popularSection = DB::table('model_feed_like')
            ->select('feed_id', DB::raw('count(*) as number'))
            ->orderBy('number','desc')
            ->groupBy('feed_id')
            ->skip($request->takeFeedPagePopular)
            ->take(6)
            ->get();  

        // return $popularSection; 
        $puplarData = view("frontend.fan.render-feeds-popular",compact('popularSection','auth_id'))->render();
        $puplarDataSecond = view("frontend.fan.render-feeds-popular-2",compact('popularSection','auth_id'))->render();

        $newTake=$request->take+'5';
        $newTakePage=$request->takeFeedPage+'6';
        $takePopular=$request->takeFeedPagePopular+'6';
        return response()->json(['status' => 'added','dataRender'=>$options,'newTake'=>$newTake,'feedData'=>$feedData,'feedDataSecond'=>$feedDataSecond,'newTakePage'=>$newTakePage,'takePopular'=>$takePopular,'puplarData'=>$puplarData,'puplarDataSecond'=>$puplarDataSecond]);
    }
}