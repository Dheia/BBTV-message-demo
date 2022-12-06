@extends('frontend.fan.main')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   .post-img-wrapper {
   padding: 5px;
   width: 100%;
   border-radius: 12px;
   position: relative;
   min-height: 100%;
   }
   ul.mydropdown-menu {
   display: none;
   z-index: 5;
   right: 37px;
   list-style-type: none;
   background: #232528 !important;
   box-shadow: 0 3px 5px 0 rgb(0 0 0 / 24%);
   visibility: visible;
   opacity: 1;
   pointer-events: auto;
   position: absolute;
   padding: 10px 30px 10px 9px;
   }
</style>
<style>
   ol.carousel-indicators {
   display: none;
   }
   .explore-post-wraper {
   width: 100% !important;
   }
   li.nav-item.active {
   border: 0px !important;
   }
   li.list-group-item {
   border: 0px !important;
   }
   .Explore-bg {
   background-color: unset;
   }
   a.addwish {
   flex-direction: column;
   }
   i.fa.fa-heart.add-to-wishlist {
   margin: -1px -3px;
   }
   .modal-content {
   position: relative;
   display: -webkit-box;
   display: -ms-flexbox;
   display: flex;
   -webkit-box-orient: vertical;
   -webkit-box-direction: normal;
   -ms-flex-direction: column;
   flex-direction: column;
   width: 100%;
   pointer-events: auto;
   /* background-color: #fff; */
   background-clip: padding-box;
   border: 1pxsolidrgba(0, 0, 0, .2);
   border-radius: 0.3rem;
   outline: 0;
   background: linear-gradient(to left, #0f1e2e 0%, #0f1e2e 100%) !important;
   border: none;
   }
   .tipoption {
   cursor: pointer;
   border: 1px solid;
   height: 40PX;
   width: 40PX;
   text-align: center;
   border-radius: 21px;
   /* padding: 9px 4px; */
   padding-top: 9px;
   margin-top: 6px;
   margin-right: 16px;
   }
   .credit-error {
   left: 135px;
   }
   .modal-header {
   display: -webkit-box;
   display: -ms-flexbox;
   display: flex;
   -webkit-box-align: start;
   -ms-flex-align: start;
   align-items: flex-start;
   -webkit-box-pack: justify;
   -ms-flex-pack: justify;
   color: white !important;
   justify-content: space-between;
   padding: 1rem;
   border-bottom: 1px solid #e9ecef;
   border-top-left-radius: 0.3rem;
   border-top-right-radius: 0.3rem;
   color: #000;
   }

   /*new add*/
   .modal-header {
    overflow: hidden;
}
input.form-control.tip_amount {
    position: relative;
}
span.doller_sin {
    color: #fff;
    padding: 10px;
    position: absolute;
    top: 12px;
    left: 9px;
}
</style>
<script>
   jQuery(document).ready(function() {
       $('#like').click(function() {
           console.log('liked');
           alert('dfd');
       });
   });
</script>
<div class="col-sm-12 col-md-9 col-xl-9 pt-0">
   <div id="copied-success" class="copied">
      <span>Copied!</span>
   </div>
   <div class="modal fade" id="PostReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content ">
            <div class="modal-header ">
               <h4 class="modal-title color-white" id="exampleModalLongTitle">Why are you reporting this post?
               </h4>
               <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
               <span class="modal_close text-white" aria-hidden="true">x</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="{{ url('fan/report-post') }}" method="post">
                  @csrf
                  <textarea name="post_report_reason" class="form-control" id="" cols="5" rows="10"
                     placeholder="Reason" required></textarea>
                  <input type="hidden" name="feed_id" value="" class="report_feed_id">
            </div>
            <div class="modal-footer">
            <button type="submit" class="send-tip-btn">Submit</button> </form>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="TipPoPup" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content ">
            <div class="modal-header ">
               <h5 class="modal-title color-white" id="exampleModalLongTitle">
                  Send a tip to Christine Lewis
                  <br>
                  <div class="tip_option d-flex">
                     <div class="tipoption "value="1">$1</div>
                     <div class="tipoption " value="5">$5</div>
                     <div class="tipoption" value="10">$10</div>
                     <div class="tipoption" value="20">$20</div>
                     <div class="tipoption" value="50">$50</div>
                     <div class="tipoption" value="100">$100</div>
                  </div>
               </h5>
               <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="text-white">x</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="{{ url('fan/model-tip') }}" method="post">
                  @csrf
                  <!-- <label for="">Tip Amount</label> -->
                  <input type="number" name="tip_amount" class="form-control tip_amount mb-3" value=""
                     placeholder=" Enter Tip amount $1-999" required min="1" max="999">
                     <span class="doller_sin">$</span>
                  <!-- <label for="" class="mt-2">What is this for?</label> -->
                  <input type="text" class="form-control" name="tip_mess"
                     placeholder="What is this for?" required>
                  <input type="hidden" class="tip_model_id" name="model_id" value="" required>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Send Tip</button> </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="Explore-bg">
         <div class="">
            <div class="explore-heading-wrapper">
               <h1 class="explore-heading">Feed</h1>
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="pills-view-tab" data-toggle="pill" href="#pills-view"
                        role="tab" aria-controls="pills-view" aria-selected="true">View Feed
                     <small>(+{{ count($explore) }}&nbsp;Posts)</small></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="pills-Popular-tab" data-toggle="pill" href="#pills-Popular"
                        role="tab" aria-controls="pills-Popular" aria-selected="false">
                     View Popular</a>
                  </li>
                  <img src="{{ url('/image/exlpore-img.png') }}" alt="" onclick="openfilter()"
                     class="filter-modile-viewbtnimg" />
               </ul>
               <img src="{{ url('/image/exlpore-img.png') }}" alt="" class="filterbtn filter_hiden"
                  onclick="openfilter()" />
            </div>
            <div class="explorecontent-wrapper">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div class="explore-post-wraper">
                        <div class="tab-content" id="pills-tabContent">
                           <div class="tab-pane fade show active" id="pills-view" role="tabpanel"
                              aria-labelledby="pills-view-tab" style="color: #fff">
                              <div class="explorepost-inner-wrapper">
                                 <div class="row">
                                    @if (count($explore) < 1)
                                    <div class="empty_state">
                                       <img src="{{ url('image/sad_icon.png') }}" alt="">
                                       <h3 class="text-light">No Feeds </h3>
                                       <p class="text-light">There have been no Feeds in this section
                                          according the filter
                                       </p>
                                    </div>
                                    @else
                                    <div class="column  col-lg-6 col-md-6 col-sm-12 ">
                                       @foreach ($explore as $number => $value)
                                       @if ($number % 2 != 0)
                                       @include('frontend.fan.explore_feeds')
                                       @endif
                                       @endforeach
                                    </div>
                                    <div class="column col-lg-6 col-md-6 col-sm-12">
                                       @foreach ($explore as $number => $value)
                                       @if ($number % 2 == 0)
                                       @include('frontend.fan.explore_feeds')
                                       @endif
                                       @endforeach
                                    </div>
                                    @endif
                                 </div>
                              </div>
                           </div>
                           <div style="color: #fff" class="tab-pane fade" id="pills-Popular" role="tabpanel"
                              aria-labelledby="pills-Popular-tab">
                              <div class="explorepost-inner-wrapper">
                                 <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                       @foreach ($likes as $number => $value)
                                       @if($number%2 != 0)
                                       @php
                                       $pupular = App\Models\ModelFeed::where('id', $value->feed_id)->first();
                                       $model_contact = App\Models\Contacts::where('fan_id', $auth_id)
                                       ->where('model_id', $pupular->model_id)
                                       ->count();
                                       $feedCollection = App\Models\Collection::where('fan_id', $auth_id)
                                       ->where('feed_id', $value->feed_id)
                                       ->count();
                                       $Auth_feed = App\Models\Model_feed_likes::where('user_id', $auth_id)
                                       ->where('feed_id', $value->feed_id)
                                       ->count();
                                       $dt = new DateTime();
                                       $laraveltime = $dt->format('Y-m-d H:i:s');
                                       $date1 = new DateTime($pupular->schedule_date);
                                       $date2 = new DateTime($laraveltime);
                                       $difference = $date1->diff($date2);
                                       $diffInSeconds = $difference->s; //45
                                       $diffInMinutes = $difference->i; //23
                                       $diffInHours = $difference->h; //8
                                       $diffInDays = $difference->d; //21
                                       $diffInMonths = $difference->m; //4
                                       $diffInYears = $difference->y;
                                       @endphp
                                       <div class="explore-posts-wraper mb-5">
                                          <div class="expolor-post-wraper">
                                             <div class="postprofile-wrapper">
                                                <div class="profile-img-wrapp mr-1">
                                                   <img src="{{ url('profile-image') . '/' . $pupular->user->profile_image ?? '' }}"
                                                      alt="" class="postprofile-img" />
                                                </div>
                                                <div class="postname-wrapper ml-3">
                                                   <span>{{ $pupular->user->first_name }}
                                                   {{ $pupular->user->last_name }}
                                                   @if ($pupular->user->user_status == 'verified')
                                                   <i class="fa fa-check-circle"></i>
                                                   @endif
                                                   </span>
                                                   <small>
                                                   @if ($diffInYears < 1)
                                                   @if ($diffInMonths < 1)
                                                   @if ($diffInDays < 1)
                                                   @if ($diffInHours < 1)
                                                   {{ $diffInMinutes }} min ago
                                                   @else
                                                   {{ $diffInHours }} hr
                                                   {{ $diffInMinutes }} min ago
                                                   @endif
                                                   @else
                                                   {{ $diffInDays }} Days Ago
                                                   @endif
                                                   @else
                                                   {{ $diffInMonths }} Months Ago
                                                   @endif
                                                   @else
                                                   {{ $diffInYears }} Years Ago
                                                   @endif
                                                   </small>
                                                </div>
                                                <div class="post-icon-wrapepr">
                                                   <a class="addwish "><i
                                                      data-id="{{ $value->id ?? '' }}"
                                                      class=" add-to-wishlist addLike mr-1 @if ($Auth_feed > 0) feed_liked fa fa-heart @else fa fa-heart-o @endif"
                                                      feed_id="{{ $value->feed_id }}">
                                                   </i><span
                                                      class="LikesOnFeed">@if($value->number>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($value->number)}} @else 
                                                   {{$value->number}}
                                                   @endif </span></a>
                                                   <div class="added">
                                                      <i
                                                         class="fa-solid fa-ellipsis-vertical dots"></i>
                                                      <ul class="mydropdown-menu">
                                                         @if ($pupular->price <= 0)
                                                         <li class="feed-menu"> <div
                                                            class="add-collection-ajax" value="{{$pupular->id}}">@if($feedCollection<'1') Add To
                                                            Collection @else Added To Collection @endif</div>
                                                         </li>
                                                         @endif
                                                         <li class="feed-menu"><a class="editPostClass CopyLink" data="{{ url('/', [$pupular->user->slug]) }}"
                                                            style=" cursor: pointer; " onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$pupular->id}}')">Copy Link To Post</a>
                                                         </li>
                                                         <li class="feed-menu"><a class="editPostClass report_post"
                                                            data="{{ $pupular->id }}"
                                                            data-toggle="modal"
                                                            data-target="#PostReport"
                                                            style=" cursor: pointer; ">Report
                                                            Post</a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="postimgs-wraper">
                                                <p>{!! $pupular->description !!}</p>
                                                <div class="post-img-wrapper">
                                                   @if(count($pupular->feedmedia)<=1)
                                                   @foreach ($pupular->feedmedia as $item)
                                                   @if ($item->media_type == 'png' or
                                                   $item->media_type == 'jpg' or
                                                   $item->media_type == 'jpeg' or
                                                   $item->media_type == 'jpeg' or
                                                   $item->media_type == 'webp')
                                                   <img src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                      alt="" />
                                                   @endif
                                                   @if ($item->media_type == 'mp4')
                                                   <video width="320" height="240"
                                                      controls>
                                                      <source
                                                         src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                         type="video/mp4">
                                                      <source
                                                         src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                         type="video/ogg">
                                                      Your browser does not support the video
                                                      tag.
                                                   </video>
                                                   @endif
                                                   @endforeach
                                                   @else
                                                   <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                                                      <!-- Indicators -->
                                                      <ol class="carousel-indicators">
                                                         @foreach ($pupular->feedmedia as $valu)
                                                         <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                                            class="{{ $loop->first ? 'active' : '' }}"></li>
                                                         @endforeach
                                                      </ol>
                                                      <!-- Wrapper for slides -->
                                                      <div class="carousel-inner">
                                                         @foreach ($pupular->feedmedia as $item)
                                                         <div class="item {{ $loop->first ? 'active' : '' }}">
                                                            @if ($item->media_type == 'jpg' or
                                                            $item->media_type == 'png' or
                                                            $item->media_type == 'jpeg' or
                                                            $item->media_type == 'gif')
                                                            <img class="expolor-img"
                                                               src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                               alt="" />
                                                            @endif
                                                            @if ($item->media_type == 'mp4')
                                                            <video width="320" height="240" controls>
                                                               <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                                  type="video/mp4">
                                                               <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                                  type="video/ogg">
                                                               Your browser does not support the video
                                                               tag.
                                                            </video>
                                                            @endif
                                                         </div>
                                                         @endforeach
                                                      </div>
                                                      <!-- Left and right controls -->
                                                      <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                                      <span class="sr-only">Previous</span>
                                                      </a>
                                                      <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                                      <span class="sr-only">Next</span>
                                                      </a>
                                                   </div>
                                                   @endif
                                                </div>
                                                <div class="send-mess d-flex">
                                                   <div  class="emoji-btn"><i class="fa fa-smile-o emoji-button"  aria-hidden="true"></i></div>
                                                       <input type="text " id="emoji-picker" value="" placeholder="Send a message for "
                                                           class="postinput emoji-picker-input" />
                                                       <button type="button" 
                                                           class="model-contect-btn send-msg send-message-to-feed" value="{{$pupular->user->id}}"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                   </div>
                                             </div>
                                             <div class="tips-add-icon-wrapper">
                                                @if ($model_contact <= 0)
                                                <a
                                                   href="{{ url('fan/add-contact', [$pupular->model_id]) }}">
                                                <span data-toggle="modal"
                                                   data-target="#exampleModalCenter3"> <i
                                                   class="fa fa-plus"></i>Add</span></a>
                                                @endif
                                                <span data-toggle="modal"
                                                   data-target="#exampleModalCenter3"><i
                                                   class="fa fa-phone"></i>Call</span>
                                                <span data-toggle="modal"
                                                   data-target="#exampleModalCenter3"><i
                                                   class="fa fa-video-camera"></i>Video
                                                </span>
                                                <span class="Tip_model_id" data-toggle="modal"
                                                   data-target="#TipPoPup"
                                                   data="{{ $pupular->user->id }}"> <i
                                                   class="fa fa-dollar"></i> Tip</span>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                       @foreach ($likes as $number => $value)
                                       @if($number%2 == 0)
                                       @php
                                       $pupular = App\Models\ModelFeed::where('id', $value->feed_id)->first();
                                       $model_contact = App\Models\Contacts::where('fan_id', $auth_id)
                                       ->where('model_id', $pupular->model_id)
                                       ->count();
                                       $feedCollection = App\Models\Collection::where('fan_id', $auth_id)
                                       ->where('feed_id', $value->feed_id)
                                       ->count();
                                       $Auth_feed = App\Models\Model_feed_likes::where('user_id', $auth_id)
                                       ->where('feed_id', $value->feed_id)
                                       ->count();
                                       $dt = new DateTime();
                                       $laraveltime = $dt->format('Y-m-d H:i:s');
                                       $date1 = new DateTime($pupular->schedule_date);
                                       $date2 = new DateTime($laraveltime);
                                       $difference = $date1->diff($date2);
                                       $diffInSeconds = $difference->s; //45
                                       $diffInMinutes = $difference->i; //23
                                       $diffInHours = $difference->h; //8
                                       $diffInDays = $difference->d; //21
                                       $diffInMonths = $difference->m; //4
                                       $diffInYears = $difference->y;
                                       @endphp
                                       <div class="explore-posts-wraper mb-5">
                                          <div class="expolor-post-wraper">
                                             <div class="postprofile-wrapper">
                                                <div class="profile-img-wrapp mr-1">
                                                   <img src="{{ url('profile-image') . '/' . $pupular->user->profile_image ?? '' }}"
                                                      alt="" class="postprofile-img" />
                                                </div>
                                                <div class="postname-wrapper ml-3">
                                                   <span>{{ $pupular->user->first_name }}
                                                   {{ $pupular->user->last_name }}
                                                   @if ($pupular->user->user_status == 'verified')
                                                   <i class="fa fa-check-circle"></i>
                                                   @endif
                                                   </span>
                                                   <small>
                                                   @if ($diffInYears < 1)
                                                   @if ($diffInMonths < 1)
                                                   @if ($diffInDays < 1)
                                                   @if ($diffInHours < 1)
                                                   {{ $diffInMinutes }} min ago
                                                   @else
                                                   {{ $diffInHours }} hr
                                                   {{ $diffInMinutes }} min ago
                                                   @endif
                                                   @else
                                                   {{ $diffInDays }} Days Ago
                                                   @endif
                                                   @else
                                                   {{ $diffInMonths }} Months Ago
                                                   @endif
                                                   @else
                                                   {{ $diffInYears }} Years Ago
                                                   @endif
                                                   </small>
                                                </div>
                                                <div class="post-icon-wrapepr">
                                                   <a class="addwish "><i
                                                      data-id="{{ $value->id ?? '' }}"
                                                      class=" add-to-wishlist addLike mr-1 @if ($Auth_feed > 0) feed_liked fa fa-heart @else fa fa-heart-o @endif"
                                                      feed_id="{{ $value->feed_id }}">
                                                   </i><span
                                                      class="LikesOnFeed">@if($value->number>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($value->number)}} @else 
                                                   {{$value->number}}
                                                   @endif</span></a>
                                                   <div class="added">
                                                      <i
                                                         class="fa-solid fa-ellipsis-vertical dots"></i>
                                                      <ul class="mydropdown-menu">
                                                         @if ($pupular->price <= 0)
                                                         <li class="feed-menu"> <div 
                                                            class="add-collection-ajax" value="{{$pupular->id}}">@if($feedCollection<'1') Add To
                                                            Collection @else Added To Collection @endif</div>
                                                         </li>
                                                         @endif
                                                         <li class="feed-menu"><a class="editPostClass CopyLink" data="{{ url('/', [$pupular->user->slug]) }}"
                                                            style=" cursor: pointer; " onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$pupular->id}}')">Copy Link To Post</a>
                                                         </li>
                                                         <div id="copied-success" class="copied">
                                                            <span>Copied!</span>
                                                         </div>
                                                         <li class="feed-menu"><a class="editPostClass report_post"
                                                            data="{{ $pupular->id }}"
                                                            data-toggle="modal"
                                                            data-target="#PostReport"
                                                            style=" cursor: pointer; ">Report
                                                            Post</a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="postimgs-wraper">
                                                <p>{!! $pupular->description !!}</p>
                                                <div class="post-img-wrapper">
                                                   @if(count($pupular->feedmedia)<=1)
                                                   @foreach ($pupular->feedmedia as $item)
                                                   @if ($item->media_type == 'png' or
                                                   $item->media_type == 'jpg' or
                                                   $item->media_type == 'jpeg' or
                                                   $item->media_type == 'jpeg' or
                                                   $item->media_type == 'webp')
                                                   <img src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                      alt="" />
                                                   @endif
                                                   @if ($item->media_type == 'mp4')
                                                   <video width="320" height="240"
                                                      controls>
                                                      <source
                                                         src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                         type="video/mp4">
                                                      <source
                                                         src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                         type="video/ogg">
                                                      Your browser does not support the video
                                                      tag.
                                                   </video>
                                                   @endif
                                                   @endforeach
                                                   @else
                                                   <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                                                      <!-- Indicators -->
                                                      <ol class="carousel-indicators">
                                                         @foreach ($pupular->feedmedia as $valu)
                                                         <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                                            class="{{ $loop->first ? 'active' : '' }}"></li>
                                                         @endforeach
                                                      </ol>
                                                      <!-- Wrapper for slides -->
                                                      <div class="carousel-inner">
                                                         @foreach ($pupular->feedmedia as $item)
                                                         <div class="item {{ $loop->first ? 'active' : '' }}">
                                                            @if ($item->media_type == 'jpg' or
                                                            $item->media_type == 'png' or
                                                            $item->media_type == 'jpeg' or
                                                            $item->media_type == 'gif')
                                                            <img class="expolor-img"
                                                               src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                               alt="" />
                                                            @endif
                                                            @if ($item->media_type == 'mp4')
                                                            <video width="320" height="240" controls>
                                                               <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                                  type="video/mp4">
                                                               <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                                  type="video/ogg">
                                                               Your browser does not support the video
                                                               tag.
                                                            </video>
                                                            @endif
                                                         </div>
                                                         @endforeach
                                                      </div>
                                                      <!-- Left and right controls -->
                                                      <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                                      <span class="sr-only">Previous</span>
                                                      </a>
                                                      <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                                      <span class="sr-only">Next</span>
                                                      </a>
                                                   </div>
                                                   @endif
                                                </div>
                                                <div class="send-mess d-flex">
                                                   <div  class="emoji-btn"><i class="fa fa-smile-o emoji-button"  aria-hidden="true"></i></div>
                                                       <input type="text " id="emoji-picker" value="" placeholder="Send a message for "
                                                           class="postinput emoji-picker-input" />
                                                       <button type="button" 
                                                           class="model-contect-btn send-msg send-message-to-feed" value="{{$pupular->user->id}}"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                   </div>
                                             </div>
                                             <div class="tips-add-icon-wrapper">
                                                @if ($model_contact <= 0)
                                                <a
                                                   href="{{ url('fan/add-contact', [$pupular->model_id]) }}">
                                                <span data-toggle="modal"
                                                   data-target="#exampleModalCenter3"> <i
                                                   class="fa fa-plus"></i>Add</span></a>
                                                @endif
                                                <span data-toggle="modal"
                                                   data-target="#exampleModalCenter3"><i
                                                   class="fa fa-phone"></i>Call</span>
                                                <span data-toggle="modal"
                                                   data-target="#exampleModalCenter3"><i
                                                   class="fa fa-video-camera"></i>Video
                                                </span>
                                                <span class="Tip_model_id" data-toggle="modal"
                                                   data-target="#TipPoPup"
                                                   data="{{ $pupular->user->id }}"> <i
                                                   class="fa fa-dollar"></i> Tip</span>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                    </div>
                                    @if (count($explore) < 1)
                                    <div class="empty_state">
                                       <img src="image/sad_icon.png" alt="">
                                       <h3 class="text-light">No Feeds </h3>
                                       <p class="text-light">There have been no Feeds in this section
                                          according the filter
                                       </p>
                                    </div>
                                    @else
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <form id="serch" method="get" action="">
         <input type="hidden" name="sort" value="{{ request()->input('sort') }}" id="recentoption">
         <input type="hidden" value="feed" name="type">
         <div id="Filter-wrapp" class="filtersidenav">
            <div class="filterside-wrapepr">
               <a href="javascript:void(0)" class="closebtn" onclick="closefilter()">&times;</a>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Gender </span>
                  @php
                  $gender = [];
                  $ethnicity = [];
                  $language = [];
                  $fetish = [];
                  $hair = [];
                  if (request()->input('gender')) {
                  $gender = request()->input('gender');
                  }
                  if (request()->input('ethnicity')) {
                  $ethnicity = request()->input('ethnicity');
                  }
                  if (request()->input('language')) {
                  $language = request()->input('language');
                  }
                  if (request()->input('fetish')) {
                  $fetish = request()->input('fetish');
                  }
                  if (request()->input('hair')) {
                  $hair = request()->input('hair');
                  }
                  @endphp
                  <div class="ckeckfilter">
                     <input type="checkbox" id="checkbox-2-11" name="gender[]" value="female"
                     class="filter-checkbox filterbig-checkbox filter female"
                     {{ in_array('female', $gender) ? 'checked' : '' }} />
                     <label for="checkbox-2-11"></label>
                     Female
                  </div>
                  <div class="ckeckfilter">
                     <input type="checkbox" id="checkbox-2-12" name="gender[]" value="male"
                     class="filter-checkbox filterbig-checkbox filter male"
                     {{ in_array('male', $gender) ? 'checked' : '' }} />
                     <label for="checkbox-2-12"></label>
                     Male
                  </div>
                  <div class="ckeckfilter">
                     <input type="checkbox" id="checkbox-2-13" name="gender[]" value="transgender"
                     class="filter-checkbox filterbig-checkbox filter transgender"
                     {{ in_array('transgender', $gender) ? 'checked' : '' }} />
                     <label for="checkbox-2-13"></label>
                     Transgender
                  </div>
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Post Type </span>
                  <label class="ckeckfilter">
                  <input type="radio"
                  id="s-option7"{{ request()->input('post_type') == 'all' ? 'checked' : '' }}
                  name="post_type" {{ request()->input('post_type') }} class="filter post_type"
                  value="all" />
                  <label for="s-option7"> All</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
                  <label class="ckeckfilter">
                  <input type="radio" id="s-option6"
                  {{ request()->input('post_type') == 'picture' ? 'checked' : '' }} name="post_type"
                  {{ request()->input('post_type') }} class="filter post_type" value="picture" />
                  <label for="s-option6"> Pictures Only</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
                  <label class="ckeckfilter">
                  <input type="radio" id="s-option5"
                  {{ request()->input('post_type') == 'video' ? 'checked' : '' }} name="post_type"
                  {{ request()->input('post_type') }} class="filter post_type" value="video" />
                  <label for="s-option5"> Videos Only</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
                  <label class="ckeckfilter">
                  <input type="radio" id="s-option4"
                  {{ request()->input('post_type') == 'audio' ? 'checked' : '' }} name="post_type"
                  {{ request()->input('post_type') }} class="filter post_type" value="audio" />
                  <label for="s-option4"> Audio Only</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Price </span>
                  <label class="ckeckfilter">
                  <input type="radio" id="s-option1"
                  {{ request()->input('price') == 'all' ? 'checked' : '' }} name="price"
                  {{ request()->input('price') }} class="filter price" value="all" />
                  <label for="s-option1"> All</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
                  <label class="ckeckfilter">
                  <input type="radio"
                  id="s-option2"{{ request()->input('price') == 'free' ? 'checked' : '' }}
                  name="price" {{ request()->input('price') }} class="filter price"
                  value="free" />
                  <label for="s-option2"> Free</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
                  <label class="ckeckfilter">
                  <input type="radio" id="s-option3"
                  {{ request()->input('price') == 'premium' ? 'checked' : '' }} name="price"
                  {{ request()->input('price') }} class="filter price" value="premium" />
                  <label for="s-option3"> Premium</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Orientation </span>
                  @foreach ($Orientation as $key => $value)
                  <label class="ckeckfilter">
                  <input type="radio"
                  {{ request()->input('orientation') == $value->id ? 'checked' : '' }}
                  name="orientation" {{ request()->input('orientation') }}
                  id="s-option1.{{ $key }}." class="filter orientation"
                  value="{{ $value->id }}" />
                  <label for="s-option1.{{ $key }}."> {{ $value->title }}</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
                  @endforeach
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Ethnicity </span>
                  <div class="language-filter-wrapp">
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelEthnicity as $key => $value)
                        @if ($key < 6)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-2.{{ $key }}."
                              {{ in_array($value->id, $ethnicity) ? 'checked' : '' }}
                              name="ethnicity[]"
                              class="filter-checkbox filterbig-checkbox filter ethnicity"
                              value="{{ $value->id }}" />
                        <label for="checkbox-2.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelEthnicity as $key => $value)
                        @if ($key >= 6)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-2.{{ $key }}."
                              {{ in_array($value->id, $ethnicity) ? 'checked' : '' }}
                              name="ethnicity[]"
                              class="filter-checkbox filterbig-checkbox filter ethnicity"
                              value="{{ $value->id }}" />
                        <label for="checkbox-2.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Language </span>
                  <div class="language-filter-wrapp">
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelLanguage as $key => $value)
                        @if ($key < 5)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-3.{{ $key }}."
                              {{ in_array($value->id, $language) ? 'checked' : '' }}
                              name="language[]"
                              class="filter-checkbox filterbig-checkbox filter language"
                              value=" {{ $value->id }}" />
                        <label for="checkbox-3.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelLanguage as $key => $value)
                        @if ($key >= 5)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-3.{{ $key }}."
                              {{ in_array($value->id, $language) ? 'checked' : '' }}
                              name="language[]"
                              class="filter-checkbox filterbig-checkbox filter language"
                              value=" {{ $value->id }}" />
                        <label for="checkbox-3.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Model Category </span>
                  @foreach ($ModelCategory as $key => $value)
                  <label>
                  <input type="radio" name="category" id="s-option2.{{ $key }}."
                  class="filter-checkbox filterbig-checkbox filter category"
                  value="{{ $value->id }}"
                  {{ request()->input('category') == $value->id ? 'checked' : '' }} name="category"
                  {{ request()->input('category') }} />
                  <label for="s-option2.{{ $key }}."> {{ $value->title }}</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
                  </label>
                  @endforeach
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Fetishes </span>
                  <div class="language-filter-wrapp">
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelFetishes as $key => $value)
                        @if ($key < 4)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-4.{{ $key }}."
                              {{ in_array($value->id, $fetish) ? 'checked' : '' }}
                              name="fetish[]"
                              class="filter-checkbox filterbig-checkbox filter fetish"
                              value="{{ $value->id }}" />
                        <label for="checkbox-4.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelFetishes as $key => $value)
                        @if ($key >= 4)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-4.{{ $key }}."
                              {{ in_array($value->id, $fetish) ? 'checked' : '' }}
                              name="fetish[]"
                              class="filter-checkbox filterbig-checkbox filter fetish"
                              value="{{ $value->id }}" />
                        <label for="checkbox-4.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="gender-filter-wrapper filt_wrap">
                  <span> Hair </span>
                  <div class="language-filter-wrapp">
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelHair as $key => $value)
                        @if ($key < 4)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-5.{{ $key }}."
                              {{ in_array($value->id, $hair) ? 'checked' : '' }} name="hair[]"
                              class="filter-checkbox filterbig-checkbox filter hair"
                              value="{{ $value->id }}" />
                        <label for="checkbox-5.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                     <div class="gender-filter-wrapper">
                        @foreach ($ModelHair as $key => $value)
                        @if ($key >= 4)
                        <label>
                           <div class="ckeckfilter">
                              <input type="checkbox" id="checkbox-5.{{ $key }}."
                              {{ in_array($value->id, $hair) ? 'checked' : '' }} name="hair[]"
                              class="filter-checkbox filterbig-checkbox filter hair"
                              value="{{ $value->id }}" />
                        <label for="checkbox-5.{{ $key }}."></label>
                        {{ $value->title }}
                        </div>
                        </label>
                        @endif
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="sideaplly-btn-wraper">
                  <!-- <button class="filter-applybtn">Apply</button> -->
                  <a href="/explore">Clear</a>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<form id="serch" method="get" action="{{ route('explore') }}">
   <input type="hidden" name="sort" value="{{ request()->input('sort') }}" id="recentoption">
   <input type="hidden" value="feed" name="type">
   <div id="Filter-wrapp" class="filtersidenav">
      <div class="filterside-wrapepr">
         <a href="javascript:void(0)" class="closebtn" onclick="closefilter()">&times;</a>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Gender </span>
            @php
            $gender = [];
            $ethnicity = [];
            $language = [];
            $fetish = [];
            $hair = [];
            if (request()->input('gender')) {
            $gender = request()->input('gender');
            }
            if (request()->input('ethnicity')) {
            $ethnicity = request()->input('ethnicity');
            }
            if (request()->input('language')) {
            $language = request()->input('language');
            }
            if (request()->input('fetish')) {
            $fetish = request()->input('fetish');
            }
            if (request()->input('hair')) {
            $hair = request()->input('hair');
            }
            @endphp
            <div class="ckeckfilter">
               <input type="checkbox" id="checkbox-2-11" name="gender[]" value="female"
               class="filter-checkbox filterbig-checkbox filter female"
               {{ in_array('female', $gender) ? 'checked' : '' }} />
               <label for="checkbox-2-11"></label>
               Female
            </div>
            <div class="ckeckfilter">
               <input type="checkbox" id="checkbox-2-12" name="gender[]" value="male"
               class="filter-checkbox filterbig-checkbox filter male"
               {{ in_array('male', $gender) ? 'checked' : '' }} />
               <label for="checkbox-2-12"></label>
               Male
            </div>
            <div class="ckeckfilter">
               <input type="checkbox" id="checkbox-2-13" name="gender[]" value="transgender"
               class="filter-checkbox filterbig-checkbox filter transgender"
               {{ in_array('transgender', $gender) ? 'checked' : '' }} />
               <label for="checkbox-2-13"></label>
               Transgender
            </div>
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Post Type </span>
            <label class="ckeckfilter">
            <input type="radio"
            id="s-option7"{{ request()->input('post_type') == 'all' ? 'checked' : '' }} name="post_type"
            {{ request()->input('post_type') }} class="filter post_type" value="all" />
            <label for="s-option7"> All</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
            <label class="ckeckfilter">
            <input type="radio" id="s-option6"
            {{ request()->input('post_type') == 'picture' ? 'checked' : '' }} name="post_type"
            {{ request()->input('post_type') }} class="filter post_type" value="picture" />
            <label for="s-option6"> Pictures Only</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
            <label class="ckeckfilter">
            <input type="radio" id="s-option5"
            {{ request()->input('post_type') == 'video' ? 'checked' : '' }} name="post_type"
            {{ request()->input('post_type') }} class="filter post_type" value="video" />
            <label for="s-option5"> Videos Only</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
            <label class="ckeckfilter">
            <input type="radio" id="s-option4"
            {{ request()->input('post_type') == 'audio' ? 'checked' : '' }} name="post_type"
            {{ request()->input('post_type') }} class="filter post_type" value="audio" />
            <label for="s-option4"> Audio Only</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Price </span>
            <label class="ckeckfilter">
            <input type="radio" id="s-option1" {{ request()->input('price') == 'all' ? 'checked' : '' }}
            name="price" {{ request()->input('price') }} class="filter price" value="all" />
            <label for="s-option1"> All</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
            <label class="ckeckfilter">
            <input type="radio" id="s-option2"{{ request()->input('price') == 'free' ? 'checked' : '' }}
            name="price" {{ request()->input('price') }} class="filter price" value="free" />
            <label for="s-option2"> Free</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
            <label class="ckeckfilter">
            <input type="radio" id="s-option3"
            {{ request()->input('price') == 'premium' ? 'checked' : '' }} name="price"
            {{ request()->input('price') }} class="filter price" value="premium" />
            <label for="s-option3"> Premium</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Orientation </span>
            @foreach ($Orientation as $key => $value)
            <label class="ckeckfilter">
            <input type="radio" {{ request()->input('orientation') == $value->id ? 'checked' : '' }}
            name="orientation" {{ request()->input('orientation') }}
            id="s-option1.{{ $key }}." class="filter orientation"
            value="{{ $value->id }}" />
            <label for="s-option1.{{ $key }}."> {{ $value->title }}</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
            @endforeach
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Ethnicity </span>
            <div class="language-filter-wrapp">
               <div class="gender-filter-wrapper">
                  @foreach ($ModelEthnicity as $key => $value)
                  @if ($key < 6)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-2.{{ $key }}."
                        {{ in_array($value->id, $ethnicity) ? 'checked' : '' }}
                        name="ethnicity[]"
                        class="filter-checkbox filterbig-checkbox filter ethnicity"
                        value="{{ $value->id }}" />
                  <label for="checkbox-2.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
               <div class="gender-filter-wrapper">
                  @foreach ($ModelEthnicity as $key => $value)
                  @if ($key >= 6)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-2.{{ $key }}."
                        {{ in_array($value->id, $ethnicity) ? 'checked' : '' }}
                        name="ethnicity[]"
                        class="filter-checkbox filterbig-checkbox filter ethnicity"
                        value="{{ $value->id }}" />
                  <label for="checkbox-2.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
            </div>
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Language </span>
            <div class="language-filter-wrapp">
               <div class="gender-filter-wrapper">
                  @foreach ($ModelLanguage as $key => $value)
                  @if ($key < 5)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-3.{{ $key }}."
                        {{ in_array($value->id, $language) ? 'checked' : '' }} name="language[]"
                        class="filter-checkbox filterbig-checkbox filter language"
                        value=" {{ $value->id }}" />
                  <label for="checkbox-3.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
               <div class="gender-filter-wrapper">
                  @foreach ($ModelLanguage as $key => $value)
                  @if ($key >= 5)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-3.{{ $key }}."
                        {{ in_array($value->id, $language) ? 'checked' : '' }} name="language[]"
                        class="filter-checkbox filterbig-checkbox filter language"
                        value=" {{ $value->id }}" />
                  <label for="checkbox-3.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
            </div>
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Model Category </span>
            @foreach ($ModelCategory as $key => $value)
            <label>
            <input type="radio" name="category" id="s-option2.{{ $key }}."
            class="filter-checkbox filterbig-checkbox filter category" value="{{ $value->id }}"
            {{ request()->input('category') == $value->id ? 'checked' : '' }} name="category"
            {{ request()->input('category') }} />
            <label for="s-option2.{{ $key }}."> {{ $value->title }}</label>
            <div class="check">
               <div class="inside"></div>
            </div>
            </label>
            @endforeach
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Fetishes </span>
            <div class="language-filter-wrapp">
               <div class="gender-filter-wrapper">
                  @foreach ($ModelFetishes as $key => $value)
                  @if ($key < 4)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-4.{{ $key }}."
                        {{ in_array($value->id, $fetish) ? 'checked' : '' }} name="fetish[]"
                        class="filter-checkbox filterbig-checkbox filter fetish"
                        value="{{ $value->id }}" />
                  <label for="checkbox-4.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
               <div class="gender-filter-wrapper">
                  @foreach ($ModelFetishes as $key => $value)
                  @if ($key >= 4)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-4.{{ $key }}."
                        {{ in_array($value->id, $fetish) ? 'checked' : '' }} name="fetish[]"
                        class="filter-checkbox filterbig-checkbox filter fetish"
                        value="{{ $value->id }}" />
                  <label for="checkbox-4.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
            </div>
         </div>
         <div class="gender-filter-wrapper filt_wrap">
            <span> Hair </span>
            <div class="language-filter-wrapp">
               <div class="gender-filter-wrapper">
                  @foreach ($ModelHair as $key => $value)
                  @if ($key < 4)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-5.{{ $key }}."
                        {{ in_array($value->id, $hair) ? 'checked' : '' }} name="hair[]"
                        class="filter-checkbox filterbig-checkbox filter hair"
                        value="{{ $value->id }}" />
                  <label for="checkbox-5.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
               <div class="gender-filter-wrapper">
                  @foreach ($ModelHair as $key => $value)
                  @if ($key >= 4)
                  <label>
                     <div class="ckeckfilter">
                        <input type="checkbox" id="checkbox-5.{{ $key }}."
                        {{ in_array($value->id, $hair) ? 'checked' : '' }} name="hair[]"
                        class="filter-checkbox filterbig-checkbox filter hair"
                        value="{{ $value->id }}" />
                  <label for="checkbox-5.{{ $key }}."></label>
                  {{ $value->title }}
                  </div>
                  </label>
                  @endif
                  @endforeach
               </div>
            </div>
         </div>
         <div class="sideaplly-btn-wraper">
            <button class="filter-applybtn">Apply</button>
            <a href="/explore">Clear</a>
         </div>
      </div>
   </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function() {
       $('.recentoption').on('change', function(e) {
   
           $('#rati').submit()
       });
   
   });
   
   function openfilter() {
       document.getElementById("Filter-wrapp").style.width = "360px";
   }
   
   function closefilter() {
       document.getElementById("Filter-wrapp").style.width = "0";
   }
</script>
<script>
   $('.add-to-wishlist').on("click", function(e) {
   
   
   
       e.preventDefault();
   
       var $this = $(this);
   
   
       var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
       if (loggedIn) {
           var listing_id = $(this).data("id");
   
           $.ajax({
   
   
   
               type: 'POST',
   
   
   
               dataType: 'json',
   
   
   
               url: "{{ url('addlike') }}",
   
   
   
               data: {
   
   
   
                   listing_id: listing_id,
   
                   _token: '{{ csrf_token() }}'
   
   
   
               },
   
   
   
           });
       } else {
           window.location.replace("{{ url('/user-login') }}");
       }
   
   
   });
</script>
<script>
   jQuery(document).ready(function($){
       
       document.addEventListener('scroll', function (event) {      
       var offset = jQuery('footer.footer-bg-wrapper').offset();
       var current_pagination_page = jQuery('#current_pagination_page').val();
       var w = jQuery(window);
       var bottom = offset.top-w.scrollTop();
           if(bottom < 800){
                 console.log(bottom);
           }    
       },true);
       
   });
</script>
@endsection
@section('scripts')
@parent
@endsection