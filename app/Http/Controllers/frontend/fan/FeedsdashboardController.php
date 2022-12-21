<?php

namespace App\Http\Controllers\frontend\fan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\PageMeta;
use App\Models\Page;
use App\Models\Feed_unlock;
use App\Models\ModelOrientation;
use App\Models\ModelCategory;
use App\Models\ModelEthnicity;
use App\Models\ModelLanguage;
use App\Models\ModelHair;
use App\Models\ModelFetishes;
use App\Models\ModelFeed;
use App\Models\LogActivity;
use App\Models\User;
use App\Models\Collection;
use App\Models\Tags;
use App\Models\Model_feed_likes;
use DateTime;
use DB; 
use Auth;
use App\Models\Contacts;
use Carbon\Carbon;
class FeedsdashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delmodel(Request $request,$id)
    {
   
       $conatct = Contacts::where('id',$id)->where('fan_id',Auth::user()->id)->first();
     
        if(!empty($conatct)){
            $conatct->delete();
        }
      
       return redirect()->back();
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
    public function index(Request $request)
    {
        $current_time = Carbon::now();
        $pagination=20;

        $q = ModelFeed::leftjoin('users', 'users.id', '=', 'model_feeds.model_id')
            ->leftjoin('models', 'models.user_id', '=', 'model_feeds.model_id')
            ->leftjoin('feed_media', 'feed_media.feed_id', '=', 'model_feeds.id')
            ->where('model_feeds.status', '1')
            ->where('model_feeds.explore', '1')
            ->where('model_feeds.schedule_date', '<=', $current_time)
            ->groupBy('model_feeds.id')
            ->orderBy('model_feeds.schedule_date','DESC')->take(6);
      
        if($request->post_type == 'video'){
            $q->where('feed_media.media_type', 'mp4');  
        }
        if($request->post_type == 'audio'){
            $q->where('feed_media.media_type', 'mp3');  
        }
        if($request->post_type == 'picture'){
            $q->whereIn('feed_media.media_type', ['jpg','png','jpeg','gif', 'webp']);
        }
        if($request->price == 'free'){
            $q->where('model_feeds.price', '<','0.5');  
        }
        if($request->price == 'premium'){
            $q->where('model_feeds.price', '>=','0.5');  
        }
        // if($_GET['page']){
        //     $page = $_GET['page'];
        // }else{
        //     $page = 1;
        // }
        // $q->paginate(5, ['*'], 'page', 1);
       
        $d=$this->filtersection();
        $q=$this->commonsort($q, $request);
        $auth_id = Auth::user()->id; 
        $d['explorecount']=$q->count();
        $d['explore']=$q->get();
        $d['auth_id']=Auth::user()->id;

        $popularFeeds = DB::table('model_feed_like')
                 ->select('feed_id', DB::raw('count(*) as number'))
                 ->orderBy('number','desc')
                 ->groupBy('feed_id')
                 ->take(6)
                 ->get();
        
        // foreach ($popularFeeds as $key => $feed) {
        //     # code...
        //     $popular = ModelFeed::where('id', $feed->feed_id)->first();
        //     $model_contact = Contacts::where('fan_id', $auth_id)->where('model_id', $popular->model_id)->count();
        //     $feedCollection = Collection::where('fan_id', $auth_id)->where('feed_id', $feed->feed_id)->count();
        //     $Auth_feed = Model_feed_likes::where('user_id', $auth_id)->where('feed_id', $feed->feed_id)->count();
        // }
        $d['likes'] = $popularFeeds;
        // if(Auth::check())
        //     $d['isPaid'] = Feed_unlock::where('model_id', $slug->id)->where('fan_id', Auth::user()->id)->pluck('media_id')->toArray();
        // else 
        //     $d['isPaid'] = [];
        // return $d; 
        return view('frontend.fan.feed', $d);
    }


    public function loadMoreFeeds(Request $request)
    {
        # code...
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
}
