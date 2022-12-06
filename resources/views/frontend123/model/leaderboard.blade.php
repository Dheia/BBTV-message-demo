@extends('frontend.model.main')
@section('content')
@php
use App\Http\Controllers\Controller;
@endphp
<style>
    img.list_img.img-fluid.card-img {
    height: 100%;
    width: 100%;
}
.nav {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
    justify-content: space-between;
}
</style>
<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
                    <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="d-flex justify-content-between">
                      <div><h5><b>Top 3 Ranks</b></h5></div>
                    </div>
                      <div class="card ">
                        <div class="card-body text-white">
                          <div class="row">
                            @php
                            $i=1;
                            @endphp
                            @foreach($topmodel as $key => $item)
                             @if($key < 3)
                            <div class="col-lg-4 col-md-6">
                              <div class="card  ">
                                <div class="card-body renk_card">
                                @php
                                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x350'))?Controller::modelImage($item->profile_image,'_300x350') : $item->profile_image;
                                @endphp
                                  <a href="{{url('/',[$item->slug])}}"><img  class="list_img img-fluid card-img" src="{{ url('profile-image') . '/' . $image}}"></a>
                                  <div class=" Winner_tag">
                                    <small class="text-white"><span class="trophy_tag"><i class="bi m-0 bi-trophy-fill"></i></span> &nbsp {{$i++}} &nbsp Winner</small>
                                  </div>
                                  <div class="text-center">
                                    <a href="{{url('/',[$item->slug])}}"><p class="mb-1">{{$item->first_name}}</p></a>
                                    
                                    <small>{{$cur_mnth}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endif
                            @endforeach

                          </div>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="  justify-content-between row">
                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <h5><b>Rankings (Overall)</b></h5>
                  </div>
                  <div class="col-lg-8 col-md-12 col-sm-12">

                 
                  <div class="">
                  
                    <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                    <form action="" name="filter" method="get">
                                        <li class="nav-item chat_nav">
                                    <a class="nav-link nav_tab active" id="pills-Calls-tab" data-toggle="pill" href="#pills-Calls" role="tab" aria-controls="pills-Calls" aria-selected="true" > <small><form class="">
                                    <select class=" ml-auto form-select Category-form " name="category"  aria-label="Default select example">
                                      <option class="earnings_by text-center earning-filter-option" >All  </option>
                                      @foreach($ModelCategory as $item)
                                      <option class="earning-filter-option text-left"  @if(request()->
                  get('category') == $item->id) selected @endif value="{{$item->id}}">{{ $item->title}} </option>
                                      @endforeach
                                    </select>
                                 </small></a
                                          >
                                        </li>
                                        </form>
                                        <form action="" name="filter" method="get">
                                        <li class="nav-item chat_nav">
                                    <a class="nav-link nav_tab active" id="pills-Calls-tab" data-toggle="pill" href="#pills-Calls" role="tab" aria-controls="pills-Calls" aria-selected="true" > <small><form class="">
                                    <select class=" ml-auto form-select Category-form " name="earning"  aria-label="Default select example">
                                      <option >Earning Category  </option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Message') selected @endif value="Message">Messages</option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Post unlock') selected @endif value="Post unlock">Pictures </option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Video message') selected @endif value="Video message">Videos </option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Phone Call') selected @endif value="Phone Call">Phone Calls </option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Tip') selected @endif value="Tip">Tips</option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Post unlock') selected @endif value="Post unlock">Feed </option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Audio message') selected @endif value="Audio message">Audio </option>
                                      <option class="earning-filter-option" @if(request()->get('earning') == 'Video call') selected @endif value="Video call">Video Calls </option>

                                    </select>
                                 </small></a
                                          >
                                        </li>
                                        </form>
                               
                                      
                                          <form action="" name="filter" method="get">
                                        <li class="nav-item chat_nav">
                                    <a class="nav-link nav_tab active" id="pills-Calls-tab" data-toggle="pill" href="#pills-Calls" role="tab" aria-controls="pills-Calls" aria-selected="true" > <small><form class="">
                                    <select class=" ml-auto form-select Category-form " name="month" aria-label="Default select example">
                                        @for($i=0; $i<=12; $i++){
                                          @php $newDateTime = \Carbon\Carbon::now()->subMonths($i); @endphp
                                          <option class="earning-filter-option" value="{{$newDateTime->format('m/Y')}}" @if(request()->get('month') == $newDateTime->format('m/Y')) selected @endif>{{$newDateTime->format('M Y')}} </option>
                                         }
                                         @endfor
                                      


                                    </select>
                                </small></a
                                          >
                                        </li>
                                        </form>
                                  </ul>
                                  </form>
                                
                                </div>
                              </div>
                                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                      <div class="card">
                        <div class="card-body text-white">
                         <table class="text-white p-5">
                          <tr class="t_head">
                            <th>Attachment</th>
                            <th>Name  </th>
                            <th>Rank</th>
                          </tr>
                       
                          @foreach($topmodel as $key => $item)
                        @if($key>3 && $key<11)
                        @php
                                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x350'))?Controller::modelImage($item->profile_image,'_300x350') : $item->profile_image;
                                @endphp
                          <tr class="Details_row ">
                            <td>
                            <div class="leaderboard_img">
                            <a href="{{url('/',[$item->slug])}}"><img  class="list_img img-fluid " style="height: 107px;width: 38% ;object-fit: cover;" src="{{ url('profile-image') . '/' . $image}}"></a>
                            </div>
                               </td>
                            <td>{{$item->first_name}}</td>
                            <td>#{{$i++}}</td>
                          </tr>
                          @endif
                          @endforeach
                         

                        </table>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
        </div>
      </div>

@endsection
@section('scripts')
@parent
@endsection