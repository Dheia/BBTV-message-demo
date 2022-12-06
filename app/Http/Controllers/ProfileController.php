<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Models;
use App\Models\ModelFeed;
use App\Models\Feed_media;
use App\Models\LogActivity;
use Carbon\Carbon;
use DateTime;
use Auth;
use App\Models\User_logs;
use App\Models\ModelAvailability;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug)
    {
        $current_time = Carbon::now()->toDateTimeString();
      $slug=User::where('slug',$slug)->where('status','Active')->first();
       if(!empty($slug)){
        $LogActivity=LogActivity::where('type','User login')->where('user_id',$slug->id)->orderby('id','desc')->first();
        $logoutmodel=LogActivity::where('type','User Logout')->where('user_id',$slug->id)->orderby('id','desc')->first();
       }
     
      if (!empty($LogActivity) && !empty($logoutmodel)) {
     
        if($logoutmodel->id>$LogActivity->id){
            $date1 = new DateTime($logoutmodel->created_at);
            $date2 = new DateTime($current_time);
            $difference = $date1->diff($date2);
            $diffInSeconds = $difference->s; //45
            $diffInMinutes = $difference->i; //23
            $diffInHours   = $difference->h; //8
            $diffInDays    = $difference->d; //21
            $diffInMonths  = $difference->m; //4
            $diffInYears   = $difference->y;
           }else{
            $diffInMinutes='-1';
            $diffInHours='-1';
            $diffInDays='-1';
            $diffInMonths='-1';
            $diffInYears='-1';
            }
            $d['diffInMinutes']=$diffInMinutes;
            $d['diffInHours']=$diffInHours;
            $d['diffInDays']=$diffInDays;
            $d['diffInMonths']=$diffInMonths;
            $d['diffInYears']=$diffInYears;
            }
      $req='1';
      $take='5';

    if(!empty($slug)){
      $slugdata=Models::where('user_id',$slug->id)->first();
    }else{
      return redirect()->back();
    }
      if (!empty($slugdata)) {

        if($request->feed_id){
         $d['copy_post']=ModelFeed::where('id',$request->feed_id)->first();
        

         }   

        $profile_user=$slugdata->user_id;
        $DayOfWeek= Carbon::now()->format("l");
        $ModelAvailability=ModelAvailability::where('model_id',$profile_user)->where('week_day',$DayOfWeek)->first();

        if(!empty($ModelAvailability)){
            if($ModelAvailability->availability_type=='limited'){
              $d['ModelAvail']='1';
            }else{
              $d['ModelAvail']='0';
            }
          
        }

        $model_feeds= Feed_media::join('model_feeds','model_feeds.id','feed_media.feed_id')->where('model_feeds.model_id', $profile_user)->where('model_feeds.status','1')->where('model_feeds.schedule_date', '<=', $current_time)->orderBy('feed_media.created_at','DESC')->get();
        $model_feeds_count= Feed_media::join('model_feeds','model_feeds.id','feed_media.feed_id')->where('model_feeds.model_id', $profile_user)->where('model_feeds.status','1')->where('model_feeds.schedule_date', '<=', $current_time)->orderBy('feed_media.created_at','DESC')->count();
        $d['model_feeds_video_count']=Feed_media::join('model_feeds','model_feeds.id','feed_media.feed_id')->whereIn('feed_media.media_type',['mp4','wmv'])->where('model_feeds.model_id', $profile_user)->where('model_feeds.status','1')->where('model_feeds.schedule_date', '<=', $current_time)->orderBy('feed_media.created_at','DESC')->count();
        $d['model_feeds_pic_count']=Feed_media::join('model_feeds','model_feeds.id','feed_media.feed_id')->whereIn('feed_media.media_type',['jpg','png','jpeg','gif'])->where('model_feeds.model_id', $profile_user)->where('model_feeds.status','1')->where('model_feeds.schedule_date', '<=', $current_time)->count();
        $d['model_feeds_free_count']=Feed_media::join('model_feeds','model_feeds.id','feed_media.feed_id')->where('model_feeds.price', '<=','0.5')->where('model_feeds.model_id', $profile_user)->where('model_feeds.status','1')->where('model_feeds.schedule_date', '<=', $current_time)->orderBy('feed_media.id','DESC')->count();
        $d['model_feeds_premium_count']=Feed_media::join('model_feeds','model_feeds.id','feed_media.feed_id')->where('model_feeds.price', '>=','0.5')->where('model_feeds.model_id', $profile_user)->where('model_feeds.status','1')->where('model_feeds.schedule_date', '<=', $current_time)->orderBy('feed_media.id','DESC')->count();
       
        $d['model_feeds_free']=ModelFeed::where('status','1')->where('price', '<','0.5')->where('model_id',$profile_user)->where('schedule_date', '<=', $current_time)->orderBy('schedule_date','DESC')->take($take)->get();
       
        $d['slugdata']=$slugdata;
        $d['model_feeds']=$model_feeds;
        $d['model_feeds_count']=$model_feeds_count;
        $d['take']=$take;
       
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
        $d['rank']=User_logs::join('users','users.id','=','user_logs.to')
        ->groupBy('to')
        ->selectRaw('user_logs.*, sum(model_earning) as sum')
        ->select('users.*','user_logs.to')
        ->orderby('model_earning','desc')
        ->orderBy('users.created_at','asc')
        ->where('users.gender','=','female')
        ->where('users.status','=','Active')
        ->whereBetween('user_logs.created_at', [$startDate, $endDate])
        ->get();
        
$rank='0';


        foreach($d['rank'] as $key=> $item){
           if($item->to==$profile_user){
                $rank=$key+1;
           }
        }
 $d['rank']=$rank;
       if($d['slugdata']>='1'){
        $d['online']=Models::join('users','users.id','=','models.user_id')->select('models.cost_msg','users.*')->select('users.profile_image','users.*')->where('users.is_online','=',1)->where('users.status','=','Active')->take(4)->inRandomOrder()->where('users.gender','=','female')->get();
        if (Auth::check()){
        if(Auth::user()->roles[0]->title =='Model'){
          
          return view('frontend/model/profile',$d);
        }else{

          return view('frontend/fan/profile',$d);
        }
        }else{
          return view('frontend/fan/Model-profile',$d);
        }

       
      }else{
        return redirect()->back();
      }
    }
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
    public function viewmore()
    { 
       
    
        if (empty($_GET['take'])) {
            $_GET['take']='0';
        }

         $take='5'+$_GET['take'];
       
          $model_feeds=ModelFeed::where('model_id',$_GET['id'])->orderby('id','DESC')->take($take)->get();
         
          $online = '';
          $status = false;
         
              
              foreach (  $model_feeds as $value) {
                
                  $feed_media=Feed_media::where('feed_id',$value->id)->first();
                  
                  $url=url('images/Feed_media');

                    if ($value->price>0) {
                       $lock='<div class="unclock-overlay">
                       <div class="unlock-btn-wrapepr">
                           <i class="fa-solid fa-lock"></i>
                       </div>
                   </div>';
                    }else{
                    $lock='';
                    }
                  if ($feed_media->media_type=='png' OR $feed_media->media_type=='jgp'OR
                  $feed_media->media_type=='jpeg'OR $feed_media->media_type=='gif') {
                  $pngimage='
                  <img src="'.$url.'/'.$feed_media->medai.'"
                  style="object-fit: cover;" height="150px" width="150px" alt="" />
                 ';
                  }else{
                    $pngimage='';
                  }
                  if ($feed_media->media_type=='mp4') {
                    $mp4=' <video controls class="feed_video">
                    <source src="'.$url.'/'.$feed_media->medai.'"
                        type="video/mp4">
                  
                    Your browser does not support the video tag.
                </video>';
                   
                  }else{
                    $mp4='';
                  }

                  $online .= '
                  <div class="col-lg-3 col-md-6 p-0" data-toggle="modal" data-target="#largeModal">
                      <div class="media p-1">
                         '.$lock.''.$pngimage.''.$mp4.'
                          
                        
                      </div>
                  </div>
                 
                 
            '
                   ;
                  $online .= '';
                }
                $online .= '';
                $take1='<button class="viewmore" value="'.$take.'">View More </button>';
             
             
          return response()->json(['status' => 'success','take1'=>$take1, 'online' => $online]);
          

    }
}
