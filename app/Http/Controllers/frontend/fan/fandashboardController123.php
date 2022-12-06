<?php

namespace App\Http\Controllers\frontend\fan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models;
use Exception;
use Twilio\Rest\Client;
use App\Models\ModelOrientation;
use App\Models\ModelCategory;
use App\Models\ModelEthnicity;
use App\Models\ModelLanguage;
use App\Models\ModelHair;
use App\Models\Notification;
use App\Models\NotifyUsers;
use App\Models\Prefrence;
use App\Models\ModelFetishes;
use App\Models\ModelFeed;
use App\Models\Model_location;
use App\Models\Contacts;
use App\Models\User;
use App\Models\Collection;
use App\Models\Feed_unlock;
use App\Models\Setting;
use App\Models\Feed_media;
use App\Models\Page;
use App\Models\Model_feed_likes;
use DB; 
use Carbon\Carbon;
use Auth;
use App\Models\Feed_report;
use App\Models\User_logs;
class fandashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $current_time = Carbon::now();
        //$d['online']=Models::join('users','users.id','=','models.user_id')->select('models.cost_msg','users.*')->where('users.is_online','=',1)->where('users.gender','=','female')->get();
        $d['count_video_call_model']=Models::leftJoin('users','users.id','=','models.user_id')->where('users.is_online','=',1)->where('models.video','=',1)->get();
        $d['count_phone_call_model']=Models::leftJoin('users','users.id','=','models.user_id')->where('users.is_online','=',1)->where('models.phone','=',1)->get();

        $d['online_chat']=Models::leftJoin('users','users.id','=','models.user_id')->where('users.is_online','=',1)->get();
        $d['online']=Models::leftJoin('users','users.id','=','models.user_id')->select('models.*','users.first_name','users.last_name','users.slug','users.email','users.dob','users.gender','users.is_online', 'users.status','users.wallet','users.user_status','users.profile_image','users.country','users.city','users.state','users.location','users.discription','users.profile_status', 'models.id as m_id')->where('users.status','=','Active')->where('users.is_online','=',1)->where('users.gender','=','female')->get();
        $current_time = Carbon::now();
        $pagination=1000;

        $q=ModelFeed::leftjoin('users', 'users.id', '=', 'model_feeds.model_id')
        ->leftjoin('models', 'models.user_id', '=', 'model_feeds.model_id')
        ->leftjoin('feed_media', 'feed_media.feed_id', '=', 'model_feeds.id')
        ->leftjoin('contacts', 'contacts.model_id', '=', 'model_feeds.model_id')
        ->where('model_feeds.status', '1')
        ->where('model_feeds.explore', '1')
        ->where('contacts.fan_id', Auth::user()->id)
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
       
        $d['explorecount']=$q->count(); 
        $d['explore']=$q->paginate(5);
        $data = '';
        if ($request->ajax()) {
            
            foreach ( $d['explore'] as $post) {
                $data.='<li>'.$post->id.' <strong>'.$post->title.'</strong> : '.$post->description.'</li>';
            }
            return $data;
        }
     

        $d['likes'] = DB::table('model_feed_like')
                 ->select('feed_id', DB::raw('count(*) as number'))
                 ->orderBy('number','desc')
                 ->groupBy('feed_id')
                 ->get();
       $d['auth_id']=Auth::user()->id;

       

     
        return view('frontend.fan.index',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notification(Request $request)
    {

        $user_id= Auth::user()->id;
        $del=Notification::where('user_id',$user_id)->delete();
        $notification["textmessagesms"] = $request->textmessagesms ?? '0';
        $notification["textmessagemail"] = $request->textmessagemail ?? '0';
        $notification["picturemessagesms"] = $request->picturemessagesms ?? '0';
        $notification["picturemessagemail"] = $request->picturemessagemail ?? '0';
        $notification["videomessagesms"] = $request->videomessagesms ?? '0';
        $notification["videomessagemail"] = $request->videomessagemail ?? '0';
        $notification["audiomessagessms"] = $request->audiomessagessms ?? '0';
        $notification["audiomessagemail"] = $request->audiomessagemail ?? '0';
        $notification["Feedmail"] = $request->Feedmail ?? '0';
        $notification["Feedsms"] = $request->Feedsms ?? '0';

        foreach ($notification as $key => $value) {
            if ($value) {
                    Notification::updateOrCreate(
                    ["user_id" => $user_id,
                    "notification_type" => $key],
                  
                    ["value" => $value,]
                );
            }
        }
        return back(); 
    }
    public function prefrence(Request $request)
    {

        $user_id= Auth::user()->id;
        $del=Prefrence::where('user_id',$user_id)->delete();
        $prefrence["male"] = $request->male ?? '0';
        $prefrence["female"] = $request->female ?? '0';
        $prefrence["trans"] = $request->trans ?? '0';
    
        foreach ($prefrence as $key => $value) {
            if ($value) {
                Prefrence::updateOrCreate(
                    ["user_id" => $user_id,
                    "gender" => $key],
                  
                    ["value" => $value,]
                );
            }
        }
        return back(); 
    }

    public function sendsms(Request $request)
    {

        $receiverNumber =  '+91'.$request->number;
        $message = "123456";
  
        try {
            $account_sid = getenv("ACCOUNT_SID");
            $auth_token = getenv("AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_PHONE_NUMBER");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => '+1 949 806 5635', 
                'body' => $message]);
  
            dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
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
            if($request->sort == 'low-to-high'){
                $randstatus=false;
                $q->orderBY('models.cost_msg','asc');  
            }
          
            if($request->sort == 'high-to-low'){
                $randstatus=false;
                $q->orderBY('models.cost_msg','desc');  
            }
        
        if($request->model == 'videoCall'){
            $randstatus=false;
            $q->Where('models.video','1'); 
        }
        if($request->model == 'onlinenow'){
            $randstatus=false;
            $q->Where('users.is_online','1'); 
        }
        if($request->model == 'audiocall'){
            $randstatus=false;
            $q->Where('models.phone','1'); 
        }
     
        if($request->model == 'allmodels'){
            $randstatus=false;
            $q->orderBY('users.is_online','asc');  
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
    public function models(Request $request)
    {
       
        $q=Models::leftJoin('users','users.id','=','models.user_id');
        $q->select('models.*','users.first_name','users.last_name','users.slug','users.email','users.dob','users.gender','users.is_online', 'users.status','users.wallet','users.user_status','users.profile_image','users.country','users.city','users.state','users.location','users.discription','users.profile_status', 'models.id as m_id');
        $q->where('users.status','=','Active');
       
        $d=$this->filtersection();
        $q=$this->commonsort($q, $request);
        $d['onlinecount']=$q->count();
        $d['online']=$q->paginate(24)->withQueryString();

        return view('frontend.fan.models',$d);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contacts()
    {
        $contacts=Contacts::where('fan_id',Auth::user()->id)->where('status','1')->get();
       return view('frontend.fan.contacts',compact('contacts'));
    }
    public function addmodel( Request $request)
    {
        $user_id= Auth::user()->id;
        $contact=Contacts::where('model_id',$request->m_id)->where('fan_id',$user_id)->first();
        $model = User::where('id', $request->m_id)->first();
        if(!empty($contact)){
            $contact->fan_id=$user_id;
            $contact->model_id=$request->m_id;
            $contact->name=$model->first_name.' '.($model->last_name)??'';
            $contact->save();
        }else{  
            $contact= new Contacts;
            $contact->fan_id=$user_id;
            $contact->model_id=$request->m_id;
            $contact->name=$model->first_name.' '.($model->last_name)??'';
            $contact->save();
        }

        return back();
    }
    public function add_contact($id){

        $user_id= Auth::user()->id;
        $contact=Contacts::where('model_id',$id)->where('fan_id',$user_id)->first();
        if(!empty($contact)){
            $contact->fan_id=$user_id;
            $contact->model_id=$id;
            $contact->save();
        }else{  
            $contact1= new Contacts;
            $contact1->fan_id=$user_id;
            $contact1->model_id=$id;
            $contact1->save();
        }
        return back();
    }

        public function deluser(Request $request,$id)
    {
     
          $user = User::where('id',$id)->first();

        $user_role = DB::table('role_user')->where('user_id',$id)->delete();
        $user->delete();

      return  redirect('/');
    }
    public function dactive(Request $request,$id)
    {
    
          $user = User::where('id',$id)->first();
          $user->status=$request->status;
          $user->save();
      return  back();
    }
    public function waalet_status(Request $request)
    {
          $user = User::where('id',Auth::user()->id)->first();
          if($user->wallet_visible=='1'){
            $user->wallet_visible='0';
            $user->save();
            return response()->json(['status' => 'Invisible']);
          }else{
            $user->wallet_visible='1';
            $user->save();
            return response()->json(['status' => 'visible']);
          }
        
          
      return  back();
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
    public function settings(Request $request)
    {
        $user_id= Auth::user()->id;
        $d['user']=User::where('id',$user_id)->first();
        $d['userdata']=$this->getUserMeta($user_id);
        $d['loactions']=Model_location::where('user_id',$user_id)->get();
        $d['notification']=Notification::where('user_id',$user_id)->get();
        $d['prefrence']=Prefrence::where('user_id',$user_id)->get();
        foreach($d['prefrence'] as $item){
            if($item->gender=='male' && $item->value=='1'){
                $d['male']='1';
               }
               if($item->gender=='female' && $item->value=='1'){
                $d['female']='1';
               }
               if($item->gender=='trans' && $item->value=='1'){
                $d['trans']='1';
               }
        }
        
    foreach($d['notification'] as $item){
       if($item->notification_type=='textmessagesms' && $item->value=='1'){
        $d['textmessagesms']='1';
       }
       if($item->notification_type=='textmessagemail' && $item->value=='1'){
        $d['textmessagemail']='1';
       }
       if($item->notification_type=='picturemessagemail' && $item->value=='1'){
        $d['picturemessagemail']='1';
       }
       if($item->notification_type=='picturemessagesms' && $item->value=='1'){
        $d['picturemessagesms']='1';
       }

       if($item->notification_type=='videomessagesms' && $item->value=='1'){
        $d['videomessagesms']='1';
       }if($item->notification_type=='videomessagemail' && $item->value=='1'){
        $d['videomessagemail']='1';
       }
       if($item->notification_type=='Feedmail' && $item->value=='1'){
        $d['Feedmail']='1';
       }
       if($item->notification_type=='Feedssms' && $item->value=='1'){
        $d['Feedssms']='1';
       }
       if($item->notification_type=='audiomessagemail' && $item->value=='1'){
        $d['audiomessagemail']='1';
       }
       if($item->notification_type=='audiomessagessms' && $item->value=='1'){
        $d['audiomessagessms']='1';
       }

    }
   
        return view('frontend.fan.settings',$d);
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
    public function add_credit(Request $request)
    {
        $validator =  $request->validate([
           'email' => 'required|email|unique:users',
           
        ]);
    }
    public function add_collection(Request $request){
   
        $Collection=Collection::where('fan_id',Auth::user()->id)->where('feed_id',$request->id)->get();
        if(!empty($Collection)){
            if(count($Collection)<=0){
                $Coll= new Collection;
                $Coll->fan_id=Auth::user()->id;
                $Coll->feed_id=$request->id;
                $Coll->save();
                return response()->json(['status' => 'Added to callection']);
                            }
        }
       
    }
    public function feed_lock(Request $request){

         $Get_feed = ModelFeed::where('id',$request->media_id)->first();
      
        //   $Get_feed=ModelFeed::where('id',$media->feed_id)->first();
       
        if (Auth::user()->wallet>=$Get_feed->price) {
            $commission = Setting::pluck("value", "name");

            $admin_comi=($Get_feed->price*$commission['commission'])/100;
            $model_comi=$Get_feed->price-$admin_comi;

            $fan_charge=User::where('id',Auth::user()->id)->first();

            $fan_charge->wallet=$fan_charge->wallet-$Get_feed->price;
            $fan_charge->save();

            $model_earning=User::where('id',$request->Model_id)->first();
            $model_earning->wallet=$model_earning->wallet + $model_comi;
            $model_earning->save();
            $User_logs= new User_logs;
            $User_logs->method='Post unlock';
            $User_logs->from=Auth::user()->id;
            $User_logs->to=$request->Model_id;
            $User_logs->price=$Get_feed->price;
            $User_logs->model_earning=$model_comi;
            $User_logs->earnings	=$admin_comi;
            $User_logs->save();
              
            $Feed_unlock= new Feed_unlock;
            $Feed_unlock->fan_id=Auth::user()->id;
            $Feed_unlock->model_id=$request->Model_id;
            $Feed_unlock->feed_id=$Get_feed->id;
            $Feed_unlock->amount=$Get_feed->price;
            $Feed_unlock->save();
            $Coll= new Collection;
            $Coll->fan_id=Auth::user()->id;
            $Coll->feed_id=$Get_feed->id;
            $Coll->save();
             return redirect()->back();
        }else{
            return redirect()->back()->with('error', 'Insufficient Credit');
        }
     
    }
    public function model_tip(Request $request){
      
        if (Auth::user()->wallet>=$request->tip_amount) {
            $commission = Setting::pluck("value", "name");

            $admin_comi=($request->tip_amount*$commission['commission'])/100;
            $model_comi=$request->tip_amount-$admin_comi;

            $fan_charge=User::where('id',Auth::user()->id)->first();

            $fan_charge->wallet=$fan_charge->wallet-$request->tip_amount;
            $fan_charge->save();

            $model_earning=User::where('id',$request->model_id)->first();
            $model_earning->wallet=$model_earning->wallet + $model_comi;
            $model_earning->save();

            $User_logs= new User_logs;
            $User_logs->method='Tip';
            $User_logs->tips_type='feed';
            $User_logs->message=$request->tip_mess;
            $User_logs->from=Auth::user()->id;
            $User_logs->to=$request->model_id;
            $User_logs->price=$request->tip_amount;
            $User_logs->model_earning=$model_comi;
            $User_logs->earnings	=$admin_comi;
            $User_logs->save();
              
           
             return redirect()->back();
        }else{
          
            return redirect()->back()->with('error','Insufficient Credit');
        }

    }
    public function report_post(Request $request){
        $Feed_report =new Feed_report;
        $Feed_report->user_id=Auth::user()->id;
        $Feed_report->feed_id=$request->feed_id;
        $Feed_report->reason=$request->post_report_reason;
        $Feed_report->save();
        return redirect()->back();
    }

    public function add_like(Request $request){
        $Auth_like=Model_feed_likes::where('user_id',Auth::user()->id)->where('feed_id',$request->feed_id)->count();
 
        if ($Auth_like<=0) {
            $new_like=new Model_feed_likes;
            $new_like->user_id=Auth::user()->id;
            $new_like->feed_id=$request->feed_id;
            $new_like->save();
            $output1=Model_feed_likes::where('feed_id',$request->feed_id)->count();
                  $output=$this->likesCounter($output1);
            return response()->json(['status' => 'liked', 'Total_like' => $output]);
        }else{
            $remove_like=Model_feed_likes::where('user_id',Auth::user()->id)->where('feed_id',$request->feed_id)->first();
           $remove_like->delete();
           $output1=Model_feed_likes::where('feed_id',$request->feed_id)->count();
           $output=$this->likesCounter($output1);
           return response()->json(['status' => 'unliked', 'Total_like' => $output]);
        }
    }    

 function likesCounter($n,$precision=1) {
     // the length of the n
     $len = strlen($n);
     // getting the rest of the numbers
     $rest = (int)substr($n,$precision+1,$len);
     // checking if the numbers is integer yes add + if not nothing
     $checkPlus = (is_int($rest) and !empty($rest))?"+":"";
     if ($n >= 0 && $n < 1000) {
       // 1 - 999
       $n_format = number_format($n);
       $suffix = '';
     } else if ($n >= 1000 && $n < 1000000) {
       // 1k-999k
       $n_format = number_format($n / 1000,$precision);
       $suffix = 'K'.$checkPlus;
     } else if ($n >= 1000000 && $n < 1000000000) {
       // 1m-999m
       $n_format = number_format($n / 1000000,$precision);
       $suffix = 'M'.$checkPlus;
     } else if ($n >= 1000000000 && $n < 1000000000000) {
       // 1b-999b
       $n_format = number_format($n / 1000000000);
       $suffix = 'B'.$checkPlus;
     } else if ($n >= 1000000000000) {
       // 1t+
       $n_format = number_format($n / 1000000000000);
       $suffix = 'T'.$checkPlus;
     }
     return !empty($n_format . $suffix) ? $this->mny2($n_format) . $suffix: 0;
   }
   function mny2($value){ 
    $value = sprintf("%0.1f", $value);
    $vl = explode(".", $value);
    $value = number_format($vl[0]);
    if($vl[1]!="0")$value.=".".$vl[1];
    return $value;
}



   
    
    public function online(Request $request)
    {
        $q=Models::leftJoin('users','users.id','=','models.user_id');
        $q->select('models.*','users.first_name','users.last_name','users.slug','users.email','users.dob','users.gender','users.is_online', 'users.status','users.wallet','users.user_status','users.profile_image','users.country','users.city','users.state','users.location','users.discription','users.profile_status', 'models.id as m_id');
        $q->where('users.status','=','Active');
        $q->where('users.is_online','=',1);
        $d=$this->filtersection();
        $q=$this->commonsort($q, $request);
        $d['onlinecount']=$q->count();
        $d['online']=$q->paginate(25)->withQueryString();
        return view('frontend.fan.online',$d);
    }
    public function phonesex(Request $request)
    {
        $q=Models::leftJoin('users','users.id','=','models.user_id');
        $q->select('models.*','users.first_name','users.last_name','users.slug','users.email','users.dob','users.gender','users.is_online', 'users.status','users.wallet','users.user_status','users.profile_image','users.country','users.city','users.state','users.location','users.discription','users.profile_status', 'models.id as m_id')
        ->where('users.status','=','Active')
        ->where('models.phone','=',1)
        ->orderBY('users.is_online','desc');
   
        $d=$this->filtersection();
        $q=$this->commonsort($q, $request);
        $d['phonecount']=$q->count();
        $d['phonesex']=$q->paginate(24)->withQueryString();
        // dd( $d['phonesex']);
        return view('frontend.fan.phonesex',$d);
    }
    public function videocalls(Request $request)
    {
      
        $q=Models::leftJoin('users','users.id','=','models.user_id');
        $q->select('models.*','users.first_name','users.last_name','users.slug','users.email','users.dob','users.gender','users.is_online', 'users.status','users.wallet','users.user_status','users.profile_image','users.country','users.city','users.state','users.location','users.discription','users.profile_status', 'models.id as m_id')
        ->where('users.status','=','Active')
        ->where('models.video','=',1)
        ->orderBY('users.is_online','desc');
        $d=$this->filtersection();
        $q=$this->commonsort($q, $request);
        $d['videocount']=$q->count();
        $d['videosex']=$q->paginate(25)->withQueryString();
       
        
        return view('frontend.fan.video',$d);
    }
    public function topmodel(Request $request)
    {
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
        $d['topmodel']=User_logs::join('users','users.id','=','user_logs.to')
        ->groupBy('to')
        ->selectRaw('user_logs.*, sum(model_earning) as sum')
        ->select('users.*','user_logs.to')
        ->orderby('model_earning','desc')
        ->orderBy('users.created_at','asc')
        ->where('users.gender','=','female')
        ->where('users.status','=','Active')
        ->whereBetween('user_logs.created_at', [$startDate, $endDate])
        ->take(50)
        ->get();
        return view('frontend.fan.topmodel',$d);
    }

    public function newmodel(Request $request)
    {
        $date = Carbon::today()->subDays(30);
        $q=Models::leftJoin('users','users.id','=','models.user_id');
        $q->select('models.*','users.first_name','users.last_name','users.slug','users.email','users.dob','users.gender','users.is_online', 'users.status','users.wallet','users.user_status','users.profile_image','users.country','users.city','users.state','users.location','users.discription','users.profile_status', 'models.id as m_id')
        ->where('users.created_at','>',$date)
        ->where('users.status','=','Active')
        ->orderBY('users.is_online','desc');
        $d=$this->filtersection();
        $q=$this->commonsort($q, $request);
        $d['newmodelcount']=$q->count();
        $d['newmodel']=$q->orderBy('users.created_at','desc')->paginate(25)->withQueryString();
       
        return view('frontend.fan.newmodel',$d);
    }

    public function explore(Request $request)
    {
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
//  return$d['explore'];

        $d['likes'] = DB::table('model_feed_like')
                 ->select('feed_id', DB::raw('count(*) as number'))
                 ->orderBy('number','desc')
                 ->groupBy('feed_id')
                 ->get();
               
        return view('frontend.explore',$d);
    }
    public function faq(Request $request)
    {
       
    $title='Model Faq';
        $data=Page::where('slug','faq')->first();
        return view('frontend.fan.show',compact('data','title'));
       
    }
    public function legal(Request $request)
    {
        $title='Bad Bunnies Independent Contractor Agreement';
        $data=Page::where('slug','legal')->first();
        return view('frontend.fan.show',compact('data','title'));
    }
    public function contact(Request $request)
    {
       
        return view('frontend.fan.contact');
    }
    public function conduct(Request $request)
    {
        $title='Bad Bunnies Models Code Of Conduct';
        $data=Page::where('slug','conduct')->first();
        return view('frontend.fan.show',compact('data','title'));
    }
    public function protection(Request $request)
    {
        $title='Bad Bunnies Chargeback Protection';
        $data=Page::where('slug','protection')->first();
        return view('frontend.fan.show',compact('data','title'));
    }
    public function model_online_notify(Request $request)
    {
       $notiyUser=NotifyUsers::where('user_id',Auth::user()->id)->where('model_id',$request->model_id)->first();
       if(isset($notiyUser)){

        $notiyUser->notify_method= ($notiyUser->notify_method=='email') ? $request->notify_type : 'email';
        $notiyUser->save();

    }else{

        $newNotify=new NotifyUsers;
        $newNotify->user_id=Auth::user()->id;
        $newNotify->model_id=$request->model_id;
        $newNotify->notify_method=$request->notify_type;
        $newNotify->save();
    }
    return redirect()->back();
}
}