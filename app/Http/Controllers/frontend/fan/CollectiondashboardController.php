<?php

namespace App\Http\Controllers\frontend\fan;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class CollectiondashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {    $fan_id=Auth::user()->id;
        $current_time = \Carbon\Carbon::now();
        $Collection=Collection::where('fan_id',$fan_id)
        ->leftjoin('model_feeds', 'model_feeds.id', '=', 'collection.feed_id')
        ->leftjoin('feed_media', 'feed_media.feed_id', '=', 'model_feeds.id')
        ->select('collection.*', 'model_feeds.description','model_feeds.model_id','model_feeds.price','feed_media.medai','feed_media.medai','feed_media.media_type')
        ->orderby('collection.created_at', 'desc')
        
  
        ->get();
    
        $data = [];
        $active_tab='0';
        if ($request->f=="1") {
            foreach($Collection as $key => $value){
                $user=User::where('id',$value->model_id)->first();
                $data[$user->first_name][] = $value;
                  $active_tab='1';
              }    
        }else{
            foreach($Collection as $key => $value){
                $monthYear = \Carbon\Carbon::parse($value->created_at)->format('M Y');
                $data[$monthYear][] = $value;
                  $active_tab='0';
              }
        }
 
        return view('frontend.fan.collection',compact('data','active_tab'));
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
