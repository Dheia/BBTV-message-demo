<?php

namespace App\Http\Controllers\frontend\model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\ModelFeed;
use App\Models\FeedImpressions;
use App\Models\Feed_media;
use App\Models\Model_feed_likes;
use App\Models\Collection;
use DateTime;
use Auth;
Use Image;
use Carbon\Carbon;
class FeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request  )
    {
        //
       
    
        $dt = new DateTime();
        $laraveltime = $dt->format('Y-m-d H:i:s');
        $d['title'] = "Feeds";
        $d['buton_name'] = "ADD NEW";
        $pagination=10;
      
        $d['feeds_explore']= ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','<=', $laraveltime)->Orderby('pin','desc')->select('model_feeds.*')->paginate($pagination)->withQueryString();
        $d['feeds_draft']=   ModelFeed::where('model_id',Auth::user()->id)->where('status','0')->Orderby('id','desc')->select('model_feeds.*')->paginate($pagination)->withQueryString();
        $d['feeds_schedule']=ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','>=', $laraveltime)->Orderby('pin','desc')->select('model_feeds.*')->paginate($pagination)->withQueryString();
     

        $d['feeds_explore1']=ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','<=', $laraveltime)->Orderby('id','desc')->select('model_feeds.*')->count();
        $d['feeds_draft1']=ModelFeed::where('model_id',Auth::user()->id)->where('status','0')->Orderby('id','desc')->select('model_feeds.*')->count();
        $d['feeds_schedule1']=ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','>=', $laraveltime)->Orderby('id','desc')->select('model_feeds.*')->count();
       
       
        return view('/frontend/model/feed.index',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   function likesCounter($n,$precision=1) {
    
     $len = strlen($n);
        $rest = (int)substr($n,$precision+1,$len);
       $checkPlus = (is_int($rest) and !empty($rest))?"+":"";
     if ($n >= 0 && $n < 1000) {
       $n_format = number_format($n);
       $suffix = '';
     } else if ($n >= 1000 && $n < 1000000) {
       $n_format = number_format($n / 1000,$precision);
       $suffix = 'K'.$checkPlus;
     } else if ($n >= 1000000 && $n < 1000000000) {
        $n_format = number_format($n / 1000000,$precision);
       $suffix = 'M'.$checkPlus;
     } else if ($n >= 1000000000 && $n < 1000000000000) {
       $n_format = number_format($n / 1000000000);
       $suffix = 'B'.$checkPlus;
     } else if ($n >= 1000000000000) {
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

    // public function store(Request $request)
    // {
    //     if($request->pin ==1){
    //         $pin='0';
    //     }else{
    //         $pin='1';
    //     }
    //     if(empty($request->explore)){
    //         $request->explore='0';
    //     }
    //     $dt = new DateTime();
    //     $this_time= $dt->format('Y-m-d H:i:s');
    //     if (empty($request->schedule_date)) {
    //     $schedule_time=$this_time;
    //     }else{
    //         $schedule_time=$request->schedule_date.' '.$request->schedule_time;
        
    //     }

    //     $feeds = ModelFeed::updateOrCreate(
    //         [
    //             'id' => $request->id
    //         ],
    //         [
    //         'model_id'=>Auth::user()->id,
    //         'description'=>$request->description,
    //         'schedule_date'=>$schedule_time,
    //         'price'=>$request->price,
    //         'explore'=>$request->explore,
    //         'status'=>$request->save_as_draft,
    //         'pin'=>$pin,
            
    //         ]);
    //         $feed_media =isset($request->images) ? $request->images : "" ;

    //         if(!empty($feed_media)){
    //             foreach ($feed_media as $key => $cabinet) {
            
    //             if(!empty($feed_media[$key])){
    //                 $imagePath = $feed_media[$key];
    //             $imageName = uniqid().$imagePath->getClientOriginalName();
    //             $extension = $imagePath->getClientOriginalExtension();
                
    //                 $feed_media[$key]->move('images/Feed_media', $imageName);
    //                 $image=new Feed_media;
    //                 $image->feed_id=$feed->id;
    //                 $image->medai=$imageName;
    //                 $image->media_type=$extension;
    //                 $image->model_id=Auth::user()->id;
    //                 $image->save();
    //         }
            
    //     $feeds->update();
    //     $type='New Feed Uploaded';
    //         \Helper::addToLog('New feed uploaded by model', $type);
    //         return back();

    //         }
    // }}







    public function store(Request $request)
    {
      
      if(empty($request->explore)){
            $request->explore='0';
        }
        $dt = new DateTime();
        $this_time= $dt->format('Y-m-d H:i:s');
        if (empty($request->schedule_date)) {
            $schedule_time=$this_time;
        }else{
            $schedule_time=$request->schedule_date.' '.$request->schedule_time;
          
        }
        $feed=new ModelFeed;
        $feed->model_id=Auth::user()->id;
        $feed->description=$request->description;   
        $feed->schedule_date=$schedule_time;
        $feed->price=$request->price;
        $feed->explore=$request->explore;
        $feed->status=$request->save_as_draft;
        $feed->save();
        $feed_media =isset($request->images) ? $request->images : [] ;

        if(!empty($feed_media)){
            foreach ($feed_media as $key => $img) {
             if(!empty($feed_media[$key])){

                $folderPath = "images/Feed_media/";
                $base64Image = explode(";base64,", $img);

                $fileType = explode("data:", $base64Image[0]);
                if($fileType[1]=='video/mp4'){
                  $explodeImage = explode("video/", $base64Image[0]);
                  $imageType = $explodeImage[1];
                 
                  $image_base64 = base64_decode($base64Image[1]);
                  $fileName = uniqid() . '.'.$imageType;
                  $file = $folderPath . $fileName;
                  
                  file_put_contents($file, $image_base64);
                }else{
                  $explodeImage = explode("image/", $base64Image[0]);
                  $imageType = $explodeImage[1];
                  
                  $image_base64 = base64_decode($base64Image[1]);
                  $fileName = uniqid() . '.'.$imageType;
                  $file = $folderPath . $fileName;
                  
                  file_put_contents($file, $image_base64);

                  $ogImage = Image::make($image_base64);
                  $ogImage->blur();
                  $ogImage->save($file);
                  
                }
                

                //  $imagePath = $feed_media[$key];
                //  $imageName = uniqid().$imagePath->getClientOriginalName();
                //  $extension = $imagePath->getClientOriginalExtension();
                //  $feed_media[$key]->move('images/Feed_media', $imageName);
                 $image=new Feed_media;
                 $image->feed_id=$feed->id;
                 $image->medai=$fileName;
                 $image->media_type=$imageType;
                 $image->model_id=Auth::user()->id;
                 $image->save();
           }
           }
        }
        $type='New Feed Uploaded';
        \Helper::addToLog('New feed uploaded by model', $type);
        return back();
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

    public function update_title(Request $request)
    {
     
        $m_id=Auth::user()->id;
        $data=ModelFeed::where('model_id',$m_id)->where('id',$request->id)->first();
        $data->description=$request->title;
        $data->save();
        return response()->json(['status' => 'success']);
     
    }
    public function feed_delete(Request $request)
    {
      
        $m_id=Auth::user()->id;
        $data=ModelFeed::where('model_id',$m_id)->where('id',$request->feed_id)->first();
        $data->delete();
        $feedLikes=Model_feed_likes::where('feed_id',$request->feed_id)->get();
        $feedCollection=Collection::where('feed_id',$request->feed_id)->get();
        $feedMedia=Feed_media::where('feed_id',$request->feed_id)->get();


      if(!empty($feedLikes)){
        foreach($feedLikes as $item){
            $feedLikesDelete=Model_feed_likes::where('id',$item->id)->first();
            $feedLikesDelete->delete();
        }
      }
      if(!empty($feedCollection)){
        foreach($feedCollection as $item){
            $feedCollectionDelete=Collection::where('id',$item->id)->first();
            $feedCollectionDelete->delete();
        }
      }

      if(!empty($feedMedia)){
        foreach($feedMedia as $item){
            $feedMediaDelete=Feed_media::where('id',$item->id)->first();
            $feedMediaDelete->delete();
        }
      }

        return response()->json(['status' => 'success']);
     
    }
    public function pin(Request $request)
    {
    $m_id=Auth::user()->id;
    $data=ModelFeed::where('model_id',$m_id)->where('id',$request->id)->first();
    
    if($data->pin==1){
            $data=ModelFeed::where('model_id',$m_id)->where('id',$request->id)->first();
            $data->pin='0';
            $data->save();
        }
    else{
        $pindata=ModelFeed::where('model_id',$m_id)->where('pin','1')->first();
        if(!empty($pindata)){
            $pindata->pin='0';
            $pindata->save();
            $data=ModelFeed::where('model_id',$m_id)->where('id',$request->id)->first();
            $data->pin='1';
            $data->save();
        }else{
            $data=ModelFeed::where('model_id',$m_id)->where('id',$request->id)->first();
            $data->pin='1';
            $data->save();
        }
    }
    $dt = new DateTime();
    $laraveltime = $dt->format('Y-m-d H:i:s');
      
 $pinData=ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','<=', $laraveltime)
 ->Orderby('pin','desc')->select('model_feeds.*')->get();

    $feedData = '';
          $status = false;
         
             
              foreach ($pinData as $item) {
                
                  $feed_media=Feed_media::where('feed_id',$item->id)->first();
                  $baseURL="'".url('').'/'.Auth::user()->slug.'?feed_id='.$feed_media->id."'";

                  $url=url('images/Feed_media');
                    
                    if ($item->pin==1) {
                       $pinFeed='<a class="pin-icon"><img src="/images/pin-icon.svg" alt="pin"></a>';
                    }else{
                    $pinFeed='';
                    }

                  if ($feed_media->media_type=='png' || $feed_media->media_type=='jpg'||
                  $feed_media->media_type=='jpeg'|| $feed_media->media_type=='gif') {
                  
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
              if(!empty($item->description)){
                $des=$item->description;
              }else{
                $des='';
              }

              if ($item->price <= 0){
                $feedPrice='FREE';
              }else{
              $feedPrice=$item->price;
              }
          
              $feedLikeCount=count($item->feedmedialikes);

              $feedDate=Carbon::parse($item->created_at)->format('d/m/Y h:i A');
                
              if ($item->pin == 1){
                $pinUnpinData="<li><a class='pinPostClass' value='".$item->id."'> Remove Pin Post</a></li>";
              }else{
                $pinUnpinData="<li><a class='pinPostClass' value='".$item->id."'>Pin Post</a></li>";
              }
              
           $feedData .= '
                  <div class="card mt-4 deleted_feed">
                  <div class="card-body text-white ">
                  '.$pinFeed.'
                      <div class="row">
                          <div class="col-lg-2 col-md-12 mt-2">
                          '.$pngimage.''.$mp4.'
                          </div>
                          <div class="col-lg-10 col-md-12 mt-2 feed_details">
                              <div class="showdata">
                                  <p class="text-muted after_update">
                                     '.$des.'
                                  </p>
                                  <div class="d-flex">
                                      <small><a class="post_link" href="">Posted to Feed</a></small>
                                  </div>
                              </div>
                         
                              <div class="d-flex added">
                                 
                                  <div class="updatedata ">
                                      <div class="d-flex">
                                       
                                              <input type="hidden" name="id" class="update_feed_id"
                                                  value="'.$item->id.'">
                                                  <input type="hidden" name="text_area_val" class="text_area_val"
                                                  value="">
                                              <input type="text" name="title" class="form-control update_feed_textarea" value="'.strip_tags($item->description).'" >
                                              <button class="btn btn-success  ml-2 update_feed " type="submit"
                                                  style="height:35px;">Update</button>
                                          
                                      </div>

                                  </div>
                                  <i class="fa-solid fa-ellipsis-vertical dots"></i>
                                  <ul class="mydropdown-menu">
                                      <input type="hidden" class="pin_num" value="'. $item->pin .'">
                                      <input type="hidden" class="feed_id" value="'.$item->id.'">
                                      <!-- <li><a class="pinPostClass" value="1">Pin Post</a></li> -->
                                     
                                      '.$pinUnpinData.'
                                      <li><a class="editPostClass">Edit Post</a></li>

                                      <li>
                                    
                                              <button type="submit" class="delete_feed dele " value="'.$item->id.'">Delete
                                                  Post</button>
                                          
                                      </li>

                                  </ul>
                              </div>
                             
                              <div class="row Feed_row mt-3">
                                  <div class="col-lg-9 col-md-9">
                                      <div class="d-flex justify-content-between">
                                          <p><small>Impressions :</small><b>136</b></p>
                                          <p><small>Price :</small><b>
                                                  '.$feedPrice.'
                                              </b></p>
                                          <p><small>Likes :</small><b>
                                                  '.$feedLikeCount.'
                                              </b></p>
                                      </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3"></div>
                               
                              </div>

                              <div class="d-flex justify-content-between mt-2">
                                  <small class="text-muted">Posted:
                                      '.$feedDate.'</small>
                                  <small>
                                     
                                  <a class="copy_link" id="myInput" onclick="copy('.$baseURL.')">Copy Link </a>
                                    
                                  </small>
                                  <div id="copied-success" class="copied">
                              <span>Copied!</span>
                              </div>
                              <div id="feed-updated" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                              <span>Feed updated successfully</span>
                              </div>
                              <div id="feed-deleted-success" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                              <span>Feed deleted successfully</span>
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
                 
                 
            '
                   ;
                  $feedData .= '';


                }
                $feedData .= '';
               
          
             
          return response()->json(['status' => 'success', 'feedData' => $feedData]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dt = new DateTime();
        $laraveltime = $dt->format('Y-m-d H:i:s');
        $d['title'] = "Feeds";
        $d['buton_name'] = "ADD NEW";
        $pagination=10;
      
        $d['feeds_explore']= ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','<=', $laraveltime)->Orderby('id','desc')->select('model_feeds.*')->paginate($pagination)->withQueryString();
        $d['feeds_draft']=   ModelFeed::where('model_id',Auth::user()->id)->where('status','0')->Orderby('id','desc')->select('model_feeds.*')->paginate($pagination)->withQueryString();
        $d['feeds_schedule']=ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','>=', $laraveltime)->Orderby('id','desc')->select('model_feeds.*')->paginate($pagination)->withQueryString();
      

        $d['feeds_explore1']=ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','<=', $laraveltime)->Orderby('id','desc')->select('model_feeds.*')->count();
        $d['feeds_draft1']=ModelFeed::where('model_id',Auth::user()->id)->where('status','0')->Orderby('id','desc')->select('model_feeds.*')->count();
        $d['feeds_schedule1']=ModelFeed::where('model_id',Auth::user()->id)->where('status','1')->where('schedule_date','>=', $laraveltime)->Orderby('id','desc')->select('model_feeds.*')->count();
     
        return view('/frontend/model/feed.index',$d);
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
        $Feed = ModelFeed::findOrFail($id);
        
       $media=Feed_media::where('feed_id',$id)->get();
       if(!empty($media)){
        foreach ($media as $key => $value) {
            $media = Feed_media::findOrFail($value->id);
            $media->delete();
           }
       }
       $Feed->delete();
        $Model_feed_likes=Model_feed_likes::where('feed_id',$id)->get();
        if(!empty($Model_feed_likes)){
            foreach ($Model_feed_likes as $key => $value) {
                $like = Model_feed_likes::findOrFail($value->id);
                $like->delete();
               }
           }
          
          $Collection=Collection::where('feed_id',$id)->get();
          if(!empty($Collection)){
            foreach ($Collection as $key => $value) {
                $Colle = Collection::findOrFail($value->id);
                $Colle->delete();
               }
           }

        return back();
    }
    public function draft_feed_post_now(Request $request){
      $feedMedia=ModelFeed::where('id',$request->feed_id)->first();
      if(!empty($feedMedia)){
        $feedMedia->status='1';
        $feedMedia->schedule_date=Carbon::now();
        $feedMedia->created_at=Carbon::now();
        $feedMedia->explore=($request->explore)??'0';
         $feedMedia->save();
         return  redirect()->back();
 
      }
    }
    public function feed_impressions(Request $request){
     
      $feedImpressions=FeedImpressions::where('user_id',Auth::user()->id)->where('feed_id',$request->feedID)->count();
   
        if($feedImpressions<=0){
          $newImpression= new FeedImpressions;
          $newImpression->user_id=Auth::user()->id;
          $newImpression->feed_id=$request->feedID;
          $newImpression->save();
          return 'Impressions added';
      }
      return 'Impressions already added';
    }
}
