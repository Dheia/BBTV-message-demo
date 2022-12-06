<?php
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\PageMeta;
use App\Models\Page;
use App\Models\ModelOrientation;
use App\Models\ModelCategory;
use App\Models\ModelEthnicity;
use App\Models\ModelLanguage;
use App\Models\ModelHair;
use App\Models\ModelFetishes;
use App\Models\ModelFeed;
use App\Models\LogActivity;
use App\Models\User;
use App\Models\User_logs;
use App\Models\Tags;
use App\Models\Model_feed_likes;
use App\Models\Feed_media;
use DateTime;
use DB; 
use Hash;
use Mail;
use Carbon\Carbon;
class FrontendController extends Controller
{
    
    public function index()
    {
      
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
        $current_time = Carbon::now()->toDateTimeString();
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $date = Carbon::today()->subDays(30);
       
        $d['new']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.created_at','>',$date)->where('users.status','=','Active')->where('users.gender','=','female')->orderBY('users.is_online','desc')->inRandomOrder()->take(4)->get();
        $d['online']=Models::join('users','users.id','=','models.user_id')->select('models.cost_msg','users.*')->where('users.status','=','Active')->where('users.is_online','=',1)->take(4)->where('users.gender','=','female')->inRandomOrder()->get();
        $d['phone']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->where('models.phone','=',1)->where('users.gender','=','female')->take(10)->get();
        $d['video']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('models.video','=',1)->take(4)->where('users.gender','=','female')->inRandomOrder()->get();
        $d['featured']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('models.featured',"1")->where('users.gender','=','female')->inRandomOrder()->get();
  
        $d['trending']=User_logs::join('users','users.id','=','user_logs.to')
        ->groupBy('to')
        ->selectRaw('user_logs.*, sum(model_earning) as sum')
        ->select('users.*','user_logs.to')
        ->orderby('model_earning','desc')
        ->orderBy('users.created_at','asc')
        ->where('users.gender','=','female')
        ->where('users.status','=','Active')
        ->whereBetween('user_logs.created_at', [$startDate, $endDate])
        ->take(4)
        ->get();
        // $d['explore']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->inRandomOrder()->where('models.explore','=',1)->take(12)->where('users.gender','=','female')->get();
        $d['homepage']=PageMeta::where('page_id','=' , 1)->pluck('value','key');
        
        $d['join_form_video']=PageMeta::where('page_id','=' , 1)->where('key', 'join_adultx_banner')->first();
        
        $d['explore']= Feed_media::join('model_feeds','model_feeds.id','feed_media.feed_id')->where('model_feeds.status','1')->where('model_feeds.schedule_date', '<=', $current_time)->where('model_feeds.price', '<=', "0.00")->orderBy('feed_media.created_at','DESC')->take('8')->get();
   
        return view('frontend.home',$d);
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
        return view('frontend.online',$d);
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
        return view('frontend.phonesex',$d);
    }
     public function terms_conditions()
    {
        return view('frontend.terms_conditions');
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
       
        
        return view('frontend.videosex',$d);
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
        return view('frontend.topmodel',$d);
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
       
        return view('frontend.newmodel',$d);
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
    public function billing(Request $request)
    {
        $data=Page::where('slug','billing')->first();
        return view('frontend.footer-pages',compact('data'));
    }
    public function faq(Request $request)
    {
        $data=Page::where('slug','faq')->first();
        return view('frontend.footer-pages',compact('data'));
    }
    public function contact(Request $request)
    {
        $data=Page::where('slug','contact')->first();
        return view('frontend.contact',compact('data'));
    }
    public function tags(Request $request,$id)
    {
       
        $data=Page::where('slug','contact')->first();
        return view('frontend.tags',compact('data'));
    }

    public function adultwork(Request $request)
    {
        return view('frontend.howwork',$d);
    }
    public function savemodel(Request $request)
    {
        return view('frontend.howwork',$d);
    }
    public function search_model(Request $request)
    {
        if($request->ajax())
        { 
        $url = url('profile-image');
        $url1 = url('/');
        $output="";
        $model=Models::join('users','users.id','=','models.user_id')
        ->join('model_ethnicity','model_ethnicity.id','=','models.Ethnicity')
        ->join('model_fetishes','model_fetishes.id','=','models.Fetishes')
        ->join('model_hair','model_hair.id','=','models.Hair')
        ->join('model_category','model_category.id','=','models.Model_Category')
        ->join('model_language','model_language.id','=','models.Language')
        ->join('model_orientation','model_orientation.id','=','models.Orientation')
        ->select('models.*','users.*','model_ethnicity.title','model_hair.title','model_fetishes.title','model_category.title','model_language.title','model_orientation.title',)
        ->where('models.model_name','LIKE','%'.$request->search."%")
        ->orWhere('model_ethnicity.title','LIKE','%'.$request->search."%")
        ->orWhere('model_fetishes.title','LIKE','%'.$request->search."%")
        ->orWhere('model_hair.title','LIKE','%'.$request->search."%")
        ->orWhere('model_category.title','LIKE','%'.$request->search."%")
        ->orWhere('model_language.title','LIKE','%'.$request->search."%")
        ->orWhere('model_orientation.title','LIKE','%'.$request->search."%")
        ->where('users.gender','=','female')
         ->orderby('users.is_online','desc')
        ->get(); 
        
        if(count($model) >= 1 )  {
        foreach ($model as $key => $item) {
     
            $current_time = Carbon::now();
            $LogActivity=LogActivity::where('type','User login')->where('user_id',$item->id)->orderby('id','desc')->first();
            $logoutmodel=LogActivity::where('type','User Logout')->where('user_id',$item->id)->orderby('id','desc')->first();

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
                    if($item->is_away==true){
                        $lastseen="In Active";
                    }else{
                    if ($diffInDays<1) {
                        if ($diffInMinutes>0) {
                        if ($diffInHours>=1) {
                            $lastseen="Active $diffInHours Hr and $diffInMinutes Min ago";
                        }else{
                            $lastseen="Active $diffInMinutes Min Ago";
                        }
                    }else{
                        $lastseen="Active Now";
                        }
                    }elseif($diffInDays<29 && $diffInMonths<=1){
                        $lastseen="Active $diffInDays Days Ago";
                    }else{
                        $lastseen="Active Months Days Ago";
                    }
                    }
                    }else{
                    $lastseen="";
                   }
                $useronline=Models::join('users','users.id','=','models.user_id')->select('models.cost_msg','users.*')->where('user_id',$item->id)->first();


                if($useronline->is_online){
                $output.=
                ' <a href="'.$url1.'/'.$item->slug.'"><div class="d-flex text-white mb-1 mt-1">
                <div class="profile-image"><img class="search-im" width="45px" height="45px" src="' . $url . '/' . $item->profile_image . '" ></div>
                                <div class="username ml-3"><span>'.$item->model_name.'</span> 
                                <br><span style="font-size: 13px;color:green;">Active Now</span><br>
                                <span class="tag" style="font-size: 13px;">#'.$item->ModelEthnicity->title.' #'.$item->ModelHair->title.' #'.$item->ModelFetishes->title.' #'.$item->UserCategory->title.' #'.$item->UserLanguage->title.' #'.$item->UserOrientation->title.'</span></div>
                                </div>
                                </div></a>';
                }
                else{
                $output.=
                ' <a href="'.$url1.'/'.$item->slug.'"><div class="d-flex text-white mb-1 mt-1">
                <div class="profile-image"><img class="search-im" width="45px" height="45px" src="' . $url . '/' . $item->profile_image . '" ></div>
                                <div class="username ml-3"><span>'.$item->model_name.'</span> 
                                <br><span style="font-size: 13px;">'.$lastseen.'</span><br>
                                <span class="tag" style="font-size: 13px;">#'.$item->ModelEthnicity->title.' #'.$item->ModelHair->title.' #'.$item->ModelFetishes->title.' #'.$item->UserCategory->title.' #'.$item->UserLanguage->title.' #'.$item->UserOrientation->title.'</span>
                                </div>
                                </div>
                                </div></a>';
                }    
            }
            return response()->json(['status' => 'success', 'output' => $output]);
            } 
        }
       
    }

    // public function getmodelsort(Request $request)
    // {
      
    //     $date =Carbon::now();
    //     $date = strtotime($date);
    //     $date= strtotime("-7 day", $date);
    //     $d['getdate']=date('M d, Y', $date);
    //     $pagination=15;
    //     $q=Models::join('users','users.id','=','models.user_id')->where('users.status','=','Active')->select('models.*','users.*')->where('users.gender','=','female');
    //     if($request->page == 'online'){
    //         $q->where('users.is_online','=',1);
    //         if($request->sort == 'online'){
    //             $q->where('users.is_online','=',1);  
    //         }
    //         if($request->sort == 'joining'){
    //             $q->orderBy('users.created_at','desc');  
    //         }
    //         if($request->sort == 'low-to-high'){
    //             $q->orderBy('models.cost_msg','asc');  
    //         }
    //         if($request->sort == 'high-to-low'){
    //             $q->orderBY('models.cost_msg','DESC');  
    //         }
    //         $d['online']=$q->paginate($pagination)->withQueryString();
           
    //         $online = '';
    //         $status = false;
    //         if (count(  $d['online']) > 0) {
    //             $status = true;
    //             $online = ' ';
    //             $url = url('profile-image');
    //             foreach (  $d['online'] as $v) {
    //                 $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //                 if($data < $d['getdate']){
    //                     $compare=' <label class="new-label">New</label>';
    //                 }else{
    //                     $compare= '';
    //                 }
    //                 $online .= '<div class="onlinenow-model-wrapper">
    //                 <span class="online-dot"></span>
    //                 <div class="first-col-wrapper">
    //                   <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
    //                   <div class="col-img-overlay"></div>
    //                   <div class="col-overlay"></div>
                     
    //                 <div>'.$compare.'</div>
    //                   <div class="colname-wrapper">
    //                     <label class="colname">' . $v->first_name .'</label>
    //                     <span class="colcost">$' . $v->cost_msg . ' per message</span>
    //                   </div>
    //                 </div>
    //               </div>';
    //               $online .= '';
    //             }
    //             $online .= '';
    //             $page="online";
    //         }
    //     }
    //     if($request->page =='phone'){
    //         $q->where('models.phone','=',1);
    //         if($request->sort == 'online'){
    //             $q->where('users.is_online','=',1);  
    //         }
    //         if($request->sort == 'joining'){
    //             $q->orderBy('users.created_at','desc');  
    //         }
    //         if($request->sort == 'low-to-high'){
    //             $q->orderBy('models.cost_audiocall','asc');  
    //         }
    //         if($request->sort == 'high-to-low'){
    //             $q->orderBY('models.cost_audiocall','DESC');  
    //         }
    //         $d['online']=$q->paginate($pagination)->withQueryString();
         
    //         $online = '';
    //         $status = false;
    //         if (count(  $d['online']) > 0) {
    //             $status = true;
    //             $online = ' <div class="onlinenow-firstRow">';
    //             $url = url('profile-image');
    //             foreach (  $d['online'] as $v) {
    //                 $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //                 if($data < $d['getdate']){
    //                     $compare=' <label class="new-label">New</label>';
    //                 }else{
    //                     $compare= '';
    //                 }
    //                 $online .= '<div class="onlinenow-model-wrapper">
    //                 <div class="first-col-wrapper">
    //                 <img class="model-img" src="' . $url . '/' . $v->profile_image . '"
    //                                     alt="Model-Image">
    //                                     <div class="col-img-overlay"></div>
    //                   <div class="col-overlay"></div>
    //                   <div>'.$compare.'</div>
    //                   <span class="callsing-onpage">
    //                     <i class="fa fa-phone" aria-hidden="true"></i
    //                   ></span>
    //                   <div class="colname-wrapper">
                    
    //                   <label class="colname">' . $v->first_name .'</label>
    //                   <span class="colcost">$ ' . $v->cost_audiocall . ' per minute</span>
                     
    //                   </div>
    //                 </div>
    //               </div>';
                
    //               $online .= '';
    //             }
    //             $online .= '</div>';
    //             $page="phone";
    //         }
    //     }

    //     if($request->page =='video'){
    //         $q->where('models.video','=',1);
    //         if($request->sort == 'online'){
    //             $q->where('users.is_online','=',1);  
    //         }
    //         if($request->sort == 'joining'){
    //             $q->orderBy('users.created_at','desc');  
    //         }
    //         if($request->sort == 'low-to-high'){
    //             $q->orderBy('models.cost_videocall','asc');  
    //         }
    //         if($request->sort == 'high-to-low'){
    //             $q->orderBY('models.cost_videocall','DESC');  
    //         }
    //         $d['online']=$q->paginate($pagination)->withQueryString();
         
    //         $online = '';
    //         $status = false;
    //         if (count(  $d['online']) > 0) {
    //             $status = true;
    //             $online = ' ';
    //             $url = url('profile-image');
    //             foreach (  $d['online'] as $v) {
    //                 $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //                 if($data < $d['getdate']){
    //                     $compare=' <label class="new-label">New</label>';
    //                 }else{
    //                     $compare= '';
    //                 }
    //                 $online.=' <div class="onlinenow-model-wrapper">
    //                 <div class="first-col-wrapper">
    //                 <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
    //                   <div class="col-overlay"></div>
    //                   <div>'.$compare.'</div>
    //                     <img src="./image/videobtn.png" alt="#" class="videobtnicon"/>
    //                   <div class="colname-wrapper">
                    
    //                   <div class="col-overlay">
    //                     <div class="colname-wrapper">
    //                     <label class="colname">' . $v->first_name .'</label>
    //                     <span class="colcost">$' . $v->cost_videocall . '  per minute</span>
    //                     </div>
    //                   </div>
    //                   </div>
    //                 </div>
    //               </div>';
                   
               
                
    //               $online .= '';
    //             }
    //             $online .= '';
    //             $page="video";
    //         }
    //     }
    //     if($request->page == 'newmodel'){
    //         $q->where('users.','=',1);
    //         if($request->sort == 'online'){
    //             $q->where('users.is_online','=',1);  
    //         }
    //         if($request->sort == 'joining'){
    //             $q->orderBy('users.created_at','desc');  
    //         }
    //         if($request->sort == 'low-to-high'){
    //             $q->orderBy('models.cost_msg','asc');  
    //         }
    //         if($request->sort == 'high-to-low'){
    //             $q->orderBY('models.cost_msg','DESC');  
    //         }
    //         $d['online']=$q->paginate($pagination)->withQueryString();
         
    //         $online = '';
    //         $status = false;
    //         if (count(  $d['online']) > 0) {
    //             $status = true;
    //             $online = ' ';
    //             $url = url('profile-image');
    //             foreach (  $d['online'] as $v) {
    //                 $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //                 if($data < $d['getdate']){
    //                     $compare=' <label class="new-label">New</label>';
    //                 }else{
    //                     $compare= '';
    //                 }
    //                 $online .= '<div class="onlinenow-model-wrapper">
    //                 <span class="online-dot"></span>
    //                 <div class="first-col-wrapper">
    //                   <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
    //                   <div class="col-img-overlay"></div>
    //                   <div class="col-overlay"></div>
                     
    //                 <div>'.$compare.'</div>
    //                   <div class="colname-wrapper">
    //                     <label class="colname">' . $v->first_name .'</label>
    //                     <span class="colcost">$' . $v->cost_msg . ' per message</span>
    //                   </div>
    //                 </div>
    //               </div>';
    //               $online .= '';
    //             }
    //             $online .= '';
    //             $page="online";
    //         }
    //     }
    //     if($request->page =='top'){
    //         $q->orderBy('users.created_at','asc');
    //     }
    //     if($request->page =='new'){
    //         $q->orderBy('users.created_at','asc');
    //     }
      
    //     $d['onlinecount']=$q->count();
    //     $count = '';
    //     $status = false;
    //     $status = true;
    //     $count = '';
    //     $count = '<h1>Online <b>Now</b> <span>( ' .  $d['onlinecount'] . ' Available ) </span></h1><h5 class="welcome-three-heading">';
    //     return response()->json(['status' => 'success', 'online' => $online,'onlinecount'=> $count,'page'=>$page]);
    // }
    // public function paginategetmodel($query)
    // {
    //     $d['phonesex']=$query;
    //     $view=view('paginate.paginate',$d);
    //     return $view->render();
    // }
    // public function getmodel(Request $request)
    // {
    //     $date =Carbon::now();
    //     $date = strtotime($date);
    //     $date= strtotime("-7 day", $date);
    //     $d['getdate']=date('M d, Y', $date);
    //     $pagination=10;
    //     $q=Models::join('users','users.id','=','models.user_id')->where('users.status','=','Active')->select('models.*','users.*');
    //     $q->whereIn('users.gender',$request->gender);
    //     if($request->page == 'online'){
    //         $q->where('users.is_online','=',1);
    //     }
    //     if($request->page =='phone'){
    //         $q->where('models.phone','=',1);
    //     }
    //     if($request->page =='video'){
    //         $q->where('models.video','=',1);
    //     }
    //     if($request->page =='top'){
    //         $q->orderBy('users.created_at','asc');
    //     }
    //     if($request->page =='new'){
    //         $q->orderBy('users.created_at','asc');
    //     }
    //     if($request->orient){
    //         $q->where('Orientation',$request->orient);
    //     }
    //     if($request->ethnicity){
    //         $q->where('Ethnicity',$request->ethnicity);
    //     }
    //     if($request->language){
    //         $q->where('Language',$request->language);
    //     }
    //     if($request->category){
    //         $q->where('Model_Category',$request->category);
    //     }
    //     if($request->fetish){
    //         $q->where('Fetishes',$request->fetish);
    //     }
    //     if($request->hair){
    //         $q->where('Hair',$request->hair);
    //     }
        // $d['online']=$q->paginate($pagination)->withQueryString();
        // // $page=  $request->page;
        // $d['onlinecount']=$q->count();
    //     if($request->page =='phone'){
    //         $online = '';
    //         $status = false;
    //         if (count(  $d['online']) > 0) {
    //             $status = true;
    //             $online = ' <div class="onlinenow-firstRow">';
    //             $url = url('profile-image');
    //             foreach (  $d['online'] as $v) {
    //                 $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //                 if($data < $d['getdate']){
    //                     $compare=' <label class="new-label">New</label>';
    //                 }else{
    //                     $compare= '';
    //                 }
    //                 $online .= '<div class="onlinenow-model-wrapper">
    //                 <div class="first-col-wrapper">
    //                 <img class="model-img" src="' . $url . '/' . $v->profile_image . '"
    //                                     alt="Model-Image">
    //                                     <div class="col-img-overlay"></div>
    //                   <div class="col-overlay"></div>
    //                   <div>'.$compare.'</div>
    //                   <span class="callsing-onpage">
    //                     <i class="fa fa-phone" aria-hidden="true"></i
    //                   ></span>
    //                   <div class="colname-wrapper">
                    
    //                   <label class="colname">' . $v->first_name .'</label>
    //                   <span class="colcost">$ ' . $v->cost_audiocall . ' per minute</span>
                     
    //                   </div>
    //                 </div>
    //               </div>   ';
                
    //               $online .= '';
    //             }
    //             $online .= '</div>';
    //             $page="phone";
    //         }
           
    //     }
    //     if($request->page =='video'){
    //         $online = '';
    //         $status = false;
    //         if (count(  $d['online']) > 0) {
    //             $status = true;
    //             $online = ' <div class="onlinenow-firstRow">';
    //             $url = url('profile-image');
    //             foreach (  $d['online'] as $v) {
    //                 $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //                 if($data < $d['getdate']){
    //                     $compare=' <label class="new-label">New</label>';
    //                 }else{
    //                     $compare= '';
    //                 }
    //                 $online .= '<div class="onlinenow-model-wrapper">
    //                 <div class="first-col-wrapper">
    //                 <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
    //                   <div class="col-overlay"></div>
    //                   <div>'.$compare.'</div>
    //                     <img src="./image/videobtn.png" alt="#" class="videobtnicon"/>
    //                   <div class="colname-wrapper">
                    
    //                   <div class="col-overlay">
    //                     <div class="colname-wrapper">
    //                     <label class="colname">' . $v->first_name .'</label>
    //                     <span class="colcost">$' . $v->cost_videocall . '  per minute</span>
    //                     </div>
    //                   </div>
    //                   </div>
    //                 </div>
    //               </div>';
                
    //               $online .= '';
    //             }
    //             $online .= '</div>';
    //             $page="video";
    //         }
           
    //     }
    //     if($request->page =='online'){
    //     $online = '';
    //     $status = false;
       
    //     if (count(  $d['online']) > 0) {
    //         $status = true;
    //         $online = ' ';
    //         $url = url('profile-image');
           
    //         foreach (  $d['online'] as $v) {
    //             $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //             if($data < $d['getdate']){
    //                 $compare=' <label class="new-label">New</label>';
    //             }else{
    //                 $compare= '';
    //             }
    //             $online .= '<div class="onlinenow-model-wrapper">
    //             <span class="online-dot"></span>
    //             <div class="first-col-wrapper">
    //               <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
    //               <div class="col-img-overlay"></div>
    //               <div class="col-overlay"></div>
                 
    //             <div>'.$compare.'</div>
    //               <div class="colname-wrapper">
    //                 <label class="colname">' . $v->first_name .'</label>
    //                 <span class="colcost">$' . $v->cost_msg . ' per message</span>
    //               </div>
    //             </div>
    //           </div>';
    //           $online .= '';
    //         }
    //         $online .= '';
    //         $page="online";
    //     }
       
    // }
   
    //     $count = '';
    //     $status = false;
    //     $status = true;
    //     $count = '';
    //     $count = '<h1>Online <b>Now</b> <span>( ' .  $d['onlinecount'] . ' Available ) </span></h1><h5 class="welcome-three-heading">';
    //     return response()->json(['status' => 'success', 'online' => $online,'onlinecount'=> $count,'page'=>$page]);
    // }
    
    // function fetch_data_newmodel(Request $request)
    // {
    //  if($request->ajax())
    //     $q=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('users.gender','=','female');
    //     $url = url('profile-image');
    //     $date =Carbon::now();
    //     $date = strtotime($date);
    //     $date= strtotime("-7 day", $date);
    //     $d['getdate']=date('M d, Y', $date);
    //     if($request->sort == 'online'){
    //         $q->where('users.is_online','=',1);  
    //     }
    //     if($request->sort == 'joining'){
    //         $q->orderBY('users.created_at','desc');  
    //     }
    //     if($request->sort == 'low-to-high'){
    //         $q->orderBY('models.cost_msg','asc');  
    //     }
    //     if($request->sort == 'high-to-low'){
    //         $q->orderBY('models.cost_msg','desc');   
    //     } 

    //     if($request->sort == '/phone-sex') {
    //         // 
    //         $newmodel = $q->orderBy('users.is_online','desc')->where('models.phone','=',1)->paginate(15)->withQueryString();
    //         $html = '<div class="onlinenow-firstRow">';
    //         foreach ($newmodel as $v) 
    //         {
    //             $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
    //             if($data < $d['getdate']){
    //                 $compare=' <label class="new-label">New</label>';
    //             }else{
    //                 $compare= '';
    //             }
    //             $html .='<div class="onlinenow-model-wrapper">
    //                         <div class="first-col-wrapper">
    //                             <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
    //                             <div class="col-img-overlay"></div>
    //                             <div class="col-overlay"></div>
    //                             <div>'.$compare.'</div>
    //                             <span class="callsing-onpage">
    //                                 <i class="fa fa-phone" aria-hidden="true"></i>
    //                             </span>
    //                             <div class="colname-wrapper">
    //                                 <label class="colname">' . $v->first_name .'</label>
    //                                 <span class="colcost">$ ' . $v->cost_audiocall . ' per minute</span>
    //                             </div>
    //                         </div>
    //                     </div>';
    //         }
    //         $html .= '</div>';

    //         $page='phone';
           
    //     }
        
    //     if($request->sort == '/new-models'){
    //         $newmodel = $q->orderBy('users.created_at','desc')->paginate(15)->withQueryString();
    //         $html = '';
    //         foreach($newmodel as $k => $v) {
    //             $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
              
    //             $html .= '<div class="onlinenow-model-wrapper">
    //             <div class="first-col-wrapper">
    //             <img class="model-img" src="' . $url . '/' . $v->profile_image . '"
    //                                 alt="Model-Image">
    //                                 <div class="col-img-overlay"></div>
    //               <div class="col-overlay"></div>
                
    //               <span class="callsing-onpage">
    //                 <i class="fa fa-phone" aria-hidden="true"></i
    //               ></span>
    //               <div class="colname-wrapper">
                
    //               <label class="colname">' . $v->first_name .'</label>
    //               <span class="colcost">$ ' . $v->cost_audiocall . ' per minute</span>
                 
    //               </div>
    //             </div>
    //           </div>';
            
    //           $html .= '';
    //         }
    //         $html .= '';
    //         $page='online';
    //     }
    //     if($request->sort == '/online-now'){
    //         $newmodel = $q->where('users.is_online','=',1)->paginate(15)->withQueryString();

           
    //     }

    //     if($request->sort == '/video-calls'){
    //         $newmodel = $q->orderBy('users.is_online','desc')->where('models.video','=',1)->paginate(15)->withQueryString();
    //     }
    //     if($request->sort == '/top-models'){
    //         $newmodel = $q->orderBy('users.created_at','desc')->paginate(15)->withQueryString();
    //     }

        
        
    //     // $d['newmodelcount']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('users.gender','=','female')->orderBy('users.created_at','asc')->count();
    //     // $d['Orientation']=ModelOrientation::all();
    //     // $d['ModelCategory']=ModelCategory::all();
    //     // $d['ModelEthnicity']=ModelEthnicity::all();
    //     // $d['ModelLanguage']=ModelLanguage::all();
    //     // $d['ModelHair']=ModelHair::all();
    //     // $d['ModelFetishes']=ModelFetishes::all();

    //     // return view('frontend.newmodel',$d);
    //     return response()->json(['status' => 'success', 'data' => $html,'page'=>$page]);
    //  }
    public function home_email_check(Request $request ){
       $user_email=User::where('email',$request->email)->count();
       if($user_email>0){
        return response()->json(['status' => 'Email_taken', 'data' => $user_email]);
       }else{
        $newUser=new User;
        $newUser->first_name=$request->first_name;
        $newUser->email=$request->email;
        $newUser->status='Pending';
        $newUser->password=Hash::make($request->password);
        $newUser->save();
        $role=4;
        $newUser->roles()->sync($role);

        $details = [
            'email' => $request->email,
             'user_id'=>$newUser->id,
            ];
        Mail::send('mails.new_fan_mail', $details, function($message) use ($details){
            $message->to($details['email'])->subject('Thanks for sign up')->from(env('MAIL_FROM_ADDRESS'));
        });
        return response()->json(['status' => 'success']);

       }
       
    }
    public function fan_email_verify($id){
         $verify_user=User::where('id',$id)->first();
         $verify_user->status='Active';
         $verify_user->save();
         return redirect('/user-login');
    }
}

