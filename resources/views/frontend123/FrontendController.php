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
use App\Models\Tags;
use DateTime;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $current_time = Carbon::now()->toDateTimeString();
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $d['online']=Models::join('users','users.id','=','models.user_id')->select('models.cost_msg','users.*')->where('users.status','=','Active')->where('users.is_online','=',1)->take(4)->where('users.gender','=','female')->get();
        $d['new']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->take(4)->where('users.gender','=','female')->get();        
        $d['phone']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->where('models.phone','=',1)->where('users.gender','=','female')->take(10)->get();
        $d['video']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->where('models.video','=',1)->take(4)->where('users.gender','=','female')->get();
        $d['featured']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->where('models.featured','=',1)->where('users.gender','=','female')->get();
        $d['trending']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->where('models.trending','=',1)->take(4)->where('users.gender','=','female')->get();
        // $d['explore']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->inRandomOrder()->where('models.explore','=',1)->take(12)->where('users.gender','=','female')->get();
        $d['homepage']=PageMeta::where('page_id','=' , 1)->pluck('value','key');
        $d['join_form_video']=PageMeta::where('page_id','=' , 1)->where('key', 'join_adultx_banner')->first();
        $d['explore']=ModelFeed::where('explore','1')->where('status','1')->where('schedule_date', '<=', $current_time)->inRandomOrder()->take(12)->get();
      
        return view('frontend.home',$d);
    }
    public function online(Request $request)
    {
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $pagination=15;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
        $q=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('users.is_online','=',1)->where('users.gender','=','female');
       
        $d['online']=$q->paginate($pagination)->withQueryString();
        $d['onlinecount']=$q->count();
        $d['Orientation']=ModelOrientation::all();
        $d['ModelCategory']=ModelCategory::all();
        $d['ModelEthnicity']=ModelEthnicity::all();
        $d['ModelLanguage']=ModelLanguage::all();
        $d['ModelHair']=ModelHair::all();
        $d['ModelFetishes']=ModelFetishes::all();
        return view('frontend.online',$d);
    }
    public function phonesex(Request $request)
    {
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $pagination=5;
        if(isset($_GET['paginate'])){ $pagination=$_GET['paginate']; }
        $q=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.is_online','desc')->where('models.phone','=',1)->where('users.gender','=','female');
        $q= $this->commonsort($q,$request);
        $d['phonesex']=$q->paginate($pagination)->withQueryString();
        $d['phonecount']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('models.phone','=',1)->where('users.gender','=','female')->count();
        $d['Orientation']=ModelOrientation::all();
        $d['ModelCategory']=ModelCategory::all(); 
        $d['ModelEthnicity']=ModelEthnicity::all();
        $d['ModelLanguage']=ModelLanguage::all();
        $d['ModelHair']=ModelHair::all();
        $d['ModelFetishes']=ModelFetishes::all();
        return view('frontend.phonesex',$d);
    }
    public function commonsort($q,$request)
    {
        dd($request);
        if($request->sort == 'online'){
            $q->where('users.is_online','=',1);  
        }
        if($request->sort == 'joining'){
            $q->orderBY('users.created_at','desc');  
        }
        if($request->type == 'phone'){
            if($request->sort == 'low-to-high'){
                $q->orderBY('models.cost_audiocall','asc');  
            }
            if($request->sort == 'high-to-low'){
                $q->orderBY('models.cost_audiocall','desc');  
            }
        }
        if($request->type == 'video'){
            
            if($request->sort == 'low-to-high'){
                $q->orderBY('models.cost_videocall','asc');  
            }
            if($request->sort == 'high-to-low'){
                $q->orderBY('models.cost_videocall','desc');  
            }
        }
        if($request->type == 'online'||'newmodel'){
            if($request->sort == 'low-to-high'){
                $q->orderBY('models.cost_msg','asc');  
            }
            if($request->sort == 'high-to-low'){
                $q->orderBY('models.cost_msg','desc');  
            }
        }
        if($request->gender){
            $q->whereIn('users.gender',$request->gender);
        }
        if($request->orient){
            $q->where('Orientation',$request->orient);
        }
        if($request->ethnicity){
            $q->where('Ethnicity',$request->ethnicity);
        }
        if($request->language){
            $q->where('Language',$request->language);
        }
        if($request->category){
            $q->where('Model_Category',$request->category);
        }
        if($request->fetish){
            $q->where('Fetishes',$request->fetish);
        }
        if($request->hair){
            $q->where('Hair',$request->hair);
        }
        return $q;
    }
    public function videocalls(Request $request)
    {
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $pagination=15;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
        $q=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.is_online','desc')->where('models.video','=',1)->where('users.gender','=','female');
        $q= $this->commonsort($q,$request);
        $d['videosex']=$q->paginate($pagination)->withQueryString();
        $d['videocount']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('models.video','=',1)->count();
        $d['Orientation']=ModelOrientation::all();
        $d['ModelCategory']=ModelCategory::all();
        $d['ModelEthnicity']=ModelEthnicity::all();
        $d['ModelLanguage']=ModelLanguage::all();
        $d['ModelHair']=ModelHair::all();
        $d['ModelFetishes']=ModelFetishes::all();
        return view('frontend.videosex',$d);
    }
    public function topmodel(Request $request)
    {
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $pagination=15;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
        $q=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->orderBy('users.created_at','asc')->where('users.status','=','Active')->where('models.phone','=',1)->where('users.gender','=','female');
        if($request->search){
            $q->where('users.title', 'like', "%$request->search%");  
        }
        $d['topmodel']=$q->paginate($pagination)->withQueryString();
        $d['topmodelcount']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->where('models.phone','=',1)->count();
        $d['Orientation']=ModelOrientation::all();
        $d['ModelCategory']=ModelCategory::all();
        $d['ModelEthnicity']=ModelEthnicity::all();
        $d['ModelLanguage']=ModelLanguage::all();
        $d['ModelHair']=ModelHair::all();
        $d['ModelFetishes']=ModelFetishes::all();
        return view('frontend.topmodel',$d);
    }
    public function trending(Request $request)
    { 
        $pagination=15;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
        $q=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->orderBy('users.created_at','asc')->where('models.trending','=',1)->where('users.gender','=','female');
        if($request->search){
            $q->where('users.title', 'like', "%$request->search%");  
        }
        $d['trendingmodel']=$q->paginate($pagination)->withQueryString();
        $d['trendingcount']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->orderBy('users.created_at','asc')->where('models.trending','=',1)->count();
        return view('frontend.trendingmodel',$d);
    }
    public function newmodel(Request $request)
    {
        $pagination=15;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
        $q=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('users.gender','=','female');
        if($request->sort == 'online'){
            $q->where('users.is_online','=',1);  
        }
        if($request->sort == 'joining'){
            $q->orderBY('users.created_at','desc');  
        }
        if($request->sort == 'low-to-high'){
            $q->orderBY('models.cost_msg','asc');  
        }
        if($request->sort == 'high-to-low'){
            $q->orderBY('models.cost_msg','desc');  
        }
        $d['newmodel']=$q->orderBy('users.created_at','desc')->paginate($pagination)->withQueryString();
        $d['newmodelcount']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->where('users.gender','=','female')->orderBy('users.created_at','asc')->count();
        $d['Orientation']=ModelOrientation::all();
        $d['ModelCategory']=ModelCategory::all();
        $d['ModelEthnicity']=ModelEthnicity::all();
        $d['ModelLanguage']=ModelLanguage::all();
        $d['ModelHair']=ModelHair::all();
        $d['ModelFetishes']=ModelFetishes::all();
        return view('frontend.newmodel',$d);
    }

    public function explore(Request $request)
    {
        $current_time = Carbon::now();
        $pagination=15;
        $explore=ModelFeed::where('explore','1')->where('status','1')->where('schedule_date', '<=', $current_time)->orderBy('schedule_date','DESC')->get();
        return view('frontend.explore',compact('explore'));
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
        return view('frontend.footer-pages',compact('data'));
    }

    public function adultwork(Request $request)
    {
        return view('frontend.howwork');
    }
    public function savemodel(Request $request)
    {
        return view('frontend.howwork');
    }
    public function getmodelsort(Request $request)
    {
        dd($request);
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $pagination=5;
        $q=Models::join('users','users.id','=','models.user_id')->where('users.status','=','Active')->select('models.*','users.*')->where('users.gender','=','female');
        if($request->page == 'online'){
            $q->where('users.is_online','=',1);
            if($request->sort == 'online'){
                $q->where('users.is_online','=',1);  
            }
            if($request->sort == 'joining'){
                $q->orderBy('users.created_at','desc');  
            }
            if($request->sort == 'low-to-high'){
                $q->orderBy('models.cost_msg','asc');  
            }
            if($request->sort == 'high-to-low'){
                $q->orderBY('models.cost_msg','DESC');  
            }
            $d['online']=$q->paginate($pagination)->withQueryString();
           
            $online = '';
            $status = false;
            if (count(  $d['online']) > 0) {
                $status = true;
                $online = ' ';
                $url = url('profile-image');
                foreach (  $d['online'] as $v) {
                    $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
                    if($data > $d['getdate']){
                        $compare=' <label class="new-label">New</label>';
                    }else{
                        $compare= '';
                    }
                    $online .= '<div class="onlinenow-model-wrapper">
                    <span class="online-dot"></span>
                    <div class="first-col-wrapper">
                      <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
                      <div class="col-img-overlay"></div>
                      <div class="col-overlay"></div>
                     
                    <div>'.$compare.'</div>
                      <div class="colname-wrapper">
                        <label class="colname">' . $v->first_name .'</label>
                        <span class="colcost">$' . $v->cost_msg . ' per message</span>
                      </div>
                    </div>
                  </div>';
                  $online .= '';
                }
                $online .= '';
                $page="online";
            }
        }
        if($request->page =='phone'){
            $q->where('models.phone','=',1);
            if($request->sort == 'online'){
                $q->where('users.is_online','=',1);  
            }
            if($request->sort == 'joining'){
                $q->orderBy('users.created_at','desc');  
            }
            if($request->sort == 'low-to-high'){
                $q->orderBy('models.cost_audiocall','asc');  
            }
            if($request->sort == 'high-to-low'){
                $q->orderBY('models.cost_audiocall','DESC');  
            }
            $d['online']=$q->paginate($pagination)->withQueryString();
         
            $online = '';
            $status = false;
            if (count(  $d['online']) > 0) {
                $status = true;
                $online = ' <div class="onlinenow-firstRow">';
                $url = url('profile-image');
                foreach (  $d['online'] as $v) {
                    $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
                    if($data > $d['getdate']){
                        $compare=' <label class="new-label">New</label>';
                    }else{
                        $compare= '';
                    }
                    $online .= '<div class="onlinenow-model-wrapper">
                    <div class="first-col-wrapper">
                    <img class="model-img" src="' . $url . '/' . $v->profile_image . '"
                                        alt="Model-Image">
                                        <div class="col-img-overlay"></div>
                      <div class="col-overlay"></div>
                      <div>'.$compare.'</div>
                      <span class="callsing-onpage">
                        <i class="fa fa-phone" aria-hidden="true"></i
                      ></span>
                      <div class="colname-wrapper">
                    
                      <label class="colname">' . $v->first_name .'</label>
                      <span class="colcost">$ ' . $v->cost_audiocall . ' per minute</span>
                     
                      </div>
                    </div>
                  </div>';
                
                  $online .= '';
                }
                $online .= '</div>';
                $page="phone";
            }
        }

        if($request->page =='video'){
            $q->where('models.video','=',1);
            if($request->sort == 'online'){
                $q->where('users.is_online','=',1);  
            }
            if($request->sort == 'joining'){
                $q->orderBy('users.created_at','desc');  
            }
            if($request->sort == 'low-to-high'){
                $q->orderBy('models.cost_videocall','asc');  
            }
            if($request->sort == 'high-to-low'){
                $q->orderBY('models.cost_videocall','DESC');  
            }
            $d['online']=$q->paginate($pagination)->withQueryString();
         
            $online = '';
            $status = false;
            if (count(  $d['online']) > 0) {
                $status = true;
                $online = ' ';
                $url = url('profile-image');
                foreach (  $d['online'] as $v) {
                    $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
                    if($data > $d['getdate']){
                        $compare=' <label class="new-label">New</label>';
                    }else{
                        $compare= '';
                    }
                    $online.=' <div class="onlinenow-model-wrapper">
                    <div class="first-col-wrapper">
                    <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
                      <div class="col-overlay"></div>
                      <div>'.$compare.'</div>
                        <img src="./image/videobtn.png" alt="#" class="videobtnicon"/>
                      <div class="colname-wrapper">
                    
                      <div class="col-overlay">
                        <div class="colname-wrapper">
                        <label class="colname">' . $v->first_name .'</label>
                        <span class="colcost">$' . $v->cost_videocall . '  per minute</span>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>';
                   
               
                
                  $online .= '';
                }
                $online .= '';
                $page="video";
            }
        }
        if($request->page == 'newmodel'){
            $q->where('users.','=',1);
            if($request->sort == 'online'){
                $q->where('users.is_online','=',1);  
            }
            if($request->sort == 'joining'){
                $q->orderBy('users.created_at','desc');  
            }
            if($request->sort == 'low-to-high'){
                $q->orderBy('models.cost_msg','asc');  
            }
            if($request->sort == 'high-to-low'){
                $q->orderBY('models.cost_msg','DESC');  
            }
            $d['online']=$q->paginate($pagination)->withQueryString();
         
            $online = '';
            $status = false;
            if (count(  $d['online']) > 0) {
                $status = true;
                $online = ' ';
                $url = url('profile-image');
                foreach (  $d['online'] as $v) {
                    $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
                    if($data > $d['getdate']){
                        $compare=' <label class="new-label">New</label>';
                    }else{
                        $compare= '';
                    }
                    $online .= '<div class="onlinenow-model-wrapper">
                    <span class="online-dot"></span>
                    <div class="first-col-wrapper">
                      <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
                      <div class="col-img-overlay"></div>
                      <div class="col-overlay"></div>
                     
                    <div>'.$compare.'</div>
                      <div class="colname-wrapper">
                        <label class="colname">' . $v->first_name .'</label>
                        <span class="colcost">$' . $v->cost_msg . ' per message</span>
                      </div>
                    </div>
                  </div>';
                  $online .= '';
                }
                $online .= '';
                $page="online";
            }
        }
        if($request->page =='top'){
            $q->orderBy('users.created_at','asc');
        }
        if($request->page =='new'){
            $q->orderBy('users.created_at','asc');
        }
      
        $d['onlinecount']=$q->count();
        $count = '';
        $status = false;
        $status = true;
        $count = '';
        $count = '<h1>Online <b>Now</b> <span>( ' .  $d['onlinecount'] . ' Available ) </span></h1><h5 class="welcome-three-heading">';
        return response()->json(['status' => 'success', 'online' => $online,'onlinecount'=> $count,'page'=>$page]);
    }
    public function paginategetmodel($query)
    {
        $d['phonesex']=$query;
        $view=view('paginate.paginate',$d);
        return $view->render();

    }
    public function getmodel(Request $request)
    {
        $date =Carbon::now();
        $date = strtotime($date);
        $date= strtotime("-7 day", $date);
        $d['getdate']=date('M d, Y', $date);
        $pagination=5;
        $q=Models::join('users','users.id','=','models.user_id')->where('users.status','=','Active')->select('models.*','users.*');
        $q->whereIn('users.gender',$request->gender);
        if($request->page == 'online'){
            $q->where('users.is_online','=',1);
        }
        if($request->page =='phone'){
            $q->where('models.phone','=',1);
        }
        if($request->page =='video'){
            $q->where('models.video','=',1);
        }
        if($request->page =='top'){
            $q->orderBy('users.created_at','asc');
        }
        if($request->page =='new'){
            $q->orderBy('users.created_at','asc');
        }

        if($request->orient){
            $q->where('Orientation',$request->orient);
        }
        if($request->ethnicity){
            $q->where('Ethnicity',$request->ethnicity);
        }
        if($request->language){
            $q->where('Language',$request->language);
        }
        if($request->category){
            $q->where('Model_Category',$request->category);
        }
        if($request->fetish){
            $q->where('Fetishes',$request->fetish);
        }
        if($request->hair){
            $q->where('Hair',$request->hair);
        }
        $d['online']=$q->paginate($pagination)->withQueryString();
        $paginghtml=$this->paginategetmodel( $d['online']);
       
        $d['onlinecount']=$q->count();
        if($request->page =='phone'){
            $online = '';
            $status = false;
            if (count(  $d['online']) > 0) {
                $status = true;
                $online = ' <div class="onlinenow-firstRow">';
                $url = url('profile-image');
                foreach (  $d['online'] as $v) {
                    $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
                    if($data > $d['getdate']){
                        $compare=' <label class="new-label">New</label>';
                    }else{
                        $compare= '';
                    }
                    $online .= '<div class="onlinenow-model-wrapper">
                    <div class="first-col-wrapper">
                    <img class="model-img" src="' . $url . '/' . $v->profile_image . '"
                                        alt="Model-Image">
                                        <div class="col-img-overlay"></div>
                      <div class="col-overlay"></div>
                      <div>'.$compare.'</div>
                      <span class="callsing-onpage">
                        <i class="fa fa-phone" aria-hidden="true"></i
                      ></span>
                      <div class="colname-wrapper">
                    
                      <label class="colname">' . $v->first_name .'</label>
                      <span class="colcost">$ ' . $v->cost_audiocall . ' per minute</span>
                     
                      </div>
                    </div>
                  </div>   ';
                
                  $online .= '';
                }
                $online .= '</div>';
                $page="phone";
            }
        }
        if($request->page =='video'){
            $online = '';
            $status = false;
            if (count(  $d['online']) > 0) {
                $status = true;
                $online = ' <div class="onlinenow-firstRow">';
                $url = url('profile-image');
                foreach (  $d['online'] as $v) {
                    $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
                    if($data > $d['getdate']){
                        $compare=' <label class="new-label">New</label>';
                    }else{
                        $compare= '';
                    }
                    $online .= '<div class="onlinenow-model-wrapper">
                    <div class="first-col-wrapper">
                    <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
                      <div class="col-overlay"></div>
                      <div>'.$compare.'</div>
                        <img src="./image/videobtn.png" alt="#" class="videobtnicon"/>
                      <div class="colname-wrapper">
                    
                      <div class="col-overlay">
                        <div class="colname-wrapper">
                        <label class="colname">' . $v->first_name .'</label>
                        <span class="colcost">$' . $v->cost_videocall . '  per minute</span>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>';
                
                  $online .= '';
                }
                $online .= '</div>';
                $page="video";
            }
        }
        if($request->page =='online'){
        $online = '';
        $status = false;
        if (count(  $d['online']) > 0) {
            $status = true;
            $online = ' ';
            $url = url('profile-image');
            foreach (  $d['online'] as $v) {
                $data=\Carbon\Carbon::parse($v->created_at)->format('M d, Y');
                if($data > $d['getdate']){
                    $compare=' <label class="new-label">New</label>';
                }else{
                    $compare= '';
                }
                $online .= '<div class="onlinenow-model-wrapper">
                <span class="online-dot"></span>
                <div class="first-col-wrapper">
                  <img class="model-img" src="' . $url . '/' . $v->profile_image . '" alt="Model-Image">
                  <div class="col-img-overlay"></div>
                  <div class="col-overlay"></div>
                 
                <div>'.$compare.'</div>
                  <div class="colname-wrapper">
                    <label class="colname">' . $v->first_name .'</label>
                    <span class="colcost">$' . $v->cost_msg . ' per message</span>
                  </div>
                </div>
              </div>';
              $online .= '';
            }
            $online .= '';
            $page="online";
        }
    }
        $count = '';
        $status = false;
        $status = true;
        $count = '';
        $count = '<h1>Online <b>Now</b> <span>( ' .  $d['onlinecount'] . ' Available ) </span></h1><h5 class="welcome-three-heading">';
        return response()->json(['status' => 'success', 'online' => $online,'onlinecount'=> $count,'page'=>$page,'paginghtml'=>$paginghtml]);
    }
    public function search_model(Request $request)
    {
        if($request->ajax())
        { 
           $url = url('profile-image');
           $url1 = url('/');
        $output="";
      
        $model=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('models.model_name','LIKE','%'.$request->search."%")->where('users.gender','=','female')->get(); 
        $gettag=Tags::where('title','LIKE','%'.$request->search."%")->first();
      if(count($model) >= 1 )  {
        foreach ($model as $key => $item) {
     $user=Models::where('user_id',$item->id)->first();
     if(count($user->tags) > 1){
            foreach($user->tags as $value){
                $tag="#$value->title";
            }
        }else{
            $tag="";
        }
        $current_time = Carbon::now();
        $LogActivity=LogActivity::where('type','User login')->where('user_id',$item->id)->orderby('id','desc')->first();
        $logoutmodel=LogActivity::where('type','User Logout')->where('user_id',$item->id)->orderby('id','desc')->first();
            if (!empty($LogActivity)) {
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
                }else{
                    $lastseen="Active Same Days Ago";
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
                                <span class="ml-5 tag" style="font-size: 13px;">'.$tag.'</span>

                            <br><span style="font-size: 13px;color:green;">Active Now</span></div>
                            </div>

                            </div></a>
                            ';
            }
            else{
            $output.=
            ' <a href="'.$url1.'/'.$item->slug.'"><div class="d-flex text-white mb-1 mt-1">
            <div class="profile-image"><img class="search-im" width="45px" height="45px" src="' . $url . '/' . $item->profile_image . '" ></div>
                            <div class="username ml-3"><span>'.$item->model_name.'</span> 
                                <span class="ml-5 tag" style="font-size: 13px;">'.$tag.'</span>

                            <br><span style="font-size: 13px;">'.$lastseen.'</span></div>
                            </div>

                            </div></a>
                            ';
            }    
        }
        return response()->json(['status' => 'success', 'output' => $output]);
        }else{
            if(isset( $gettag)){
                $tagmodels=[];
            if (count($gettag->models) > 1) {
                    foreach($gettag->models as $item){
                    $datauser=User::where('id',$item->user_id)->first();

                  
                    $current_time = Carbon::now();
                    $LogActivity=LogActivity::where('type','User login')->where('user_id',$datauser->id)->orderby('id','desc')->first();
                    $logoutmodel=LogActivity::where('type','User Logout')->where('user_id',$datauser->id)->orderby('id','desc')->first();
                  if (!empty($LogActivity)) {
                  
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
                       }else{
                          $lastseen="Active Same Days Ago";
                       }
                        
            
                }else{
                        $lastseen="";
                       
                    }
                    if( $datauser->is_online == 1){
                        $tagmodels[]='<a href="'.$url1.'/'.$datauser->slug.'"><div class="d-flex text-white mb-1 mt-1">
                        <div class="profile-image"><img class="search-im" width="45px" height="45px" src="' . $url . '/' . $datauser->profile_image . '" ></div>
                                            <div class="username ml-3"><span>'.$item->model_name.'</span> 
                                            <br><span style="font-size: 13px;color:green;">Active Now</span></div>
                                        </div>
    
                                        </div></a>';
                      
                    }else{
                        $tagmodels[]='<a href="'.$url1.'/'.$datauser->slug.'"><div class="d-flex text-white mb-1 mt-1">
                        <div class="profile-image"><img class="search-im" width="45px" height="45px" src="' . $url . '/' . $datauser->profile_image . '" ></div>
                                            <div class="username ml-3"><span>'.$item->model_name.'</span> 
                                            <br><span style="font-size: 13px;color:green;">'.$lastseen.'</span></div>
                                        </div>
    
                                        </div></a>';
                    }
                  
                    }
            }else{
                $tagmodels[]='';
            } 
            return response()->json(['status' => 'success', 'output' => $tagmodels]);
            }
        
        }
        
        
}
       
    }
}
