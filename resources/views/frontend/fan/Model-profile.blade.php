@extends('frontend.main') @section('content')
@php
use App\Http\Controllers\Controller;
@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<style>
   .profile-add{
   background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
   width: 50%;
   /* height: 48px; */
   padding: 13px 0px;
   border-radius: 6px;
   font-family: "Montserrat";
   font-weight: 700;
   font-size: 10px;
   line-height: 17px;
   text-transform: uppercase;
   color: #fff;
   border: none;
   outline: none;
   }
   .profile-add:hover {
   background: none;
   border: 1px solid #c73ca9;
   color: #c73ca9;
   }
   .media img {
   height: 100% !important;
   }
   .loginfrom-wrapper {
   width: 100% !important;
   height: 100%;
   }
   div#loadbtn {
   text-align: center;
   }
   .add-contact {
   background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
   /* width: 98%; */
   height: 56px !important;
   border-radius: 6px;
   font-family: "Montserrat";
   font-weight: 700;
   font-size: 12px;
   line-height: 17px;
   text-transform: uppercase;
   color: #fff !important;
   border: none;
   outline: none;
   padding: 14px;
   }
   .login-wrapper {
   background-color: #0c1d2d;
   border-radius: 0px !important;}
   .checkinput-wraper p {
   line-height: 28px;
   margin: 0px 10px !important
   }
   .checkinput-wraper p {
   line-height: 28px;
   margin: 0px 4px !important;
   }
   .checkinput-wraper p {
   font-family: "Montserrat";
   font-style: normal;
   font-weight: 400;
   font-size: 14px;
   line-height: 15px;
   color: #b2b3b4;
   }
   .checkinput-wraper p {
   line-height: 17px !important;
   }
   .login_btn {
   background: transparent;
   border: 0px;
   display: flex;
   }
   .login-form-wraper {
   padding: 15px 30px 0px 30px !important;
   /* text-align: center; */
   }
   .login-bg {
   background-color: #081420;
   height: 100%;
   padding: 0px !important;
   }
   @media only screen and (max-width: 768px) {
  .col_mode_img_wrapepr{
   height: 400px !important;
  }
}
.login-pagebtn-wrapp {
    display: flex;
    justify-content: space-between;
    margin: 10px 0px;
}
</style>
<div class="detailspaeg-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-12  col-md-6 col-lg-6 col_mode_img_wrapepr ">
            <div class="model-img-wrapepr">
               @php
               $image=(Controller::modelImage('profile-image/'.$slugdata->user->profile_image,'_600x550'))?Controller::modelImage($slugdata->user->profile_image,'_600x550') : $slugdata->user->profile_image;
               @endphp  
               <img width="100%"
           
                  src="{{ url('profile-image') . '/' . $image }}" alt=""
                  class="img-fluid mod-profile" />
            </div>
            <!-- <div class="inactive-model-banner">Unavailable</div> -->
         </div>
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="model-details-wrapper">
               <div class="model-name-wrapepr d-flex justify-content-between">
                  <div class="modelname-wrappp">
                     @switch($slugdata->user->country)
                     @case($slugdata->user->country=="USA")
                     <img style="border-radius: 47px; object-fit: cover;" width="100% "
                        src="{{ url('assets/images/flags/usa.png')}}" alt="" />
                     @break
                     @case($slugdata->user->country=="CANADA")
                     <img style="border-radius: 47px;object-fit: cover;" width="100% "
                        src="{{ url('assets/images/flags/canada.jpg')}}" alt="" />
                     @break
                     @default
                     <img style="border-radius: 47px" width="100% "
                        src="{{ url('assets/images/flags/global-flag.png')}}" alt="" />
                     @endswitch
                     <span style="font-size:16px" class="mr-0 pr-1"> {!!$slugdata->user->first_name!!} </span>
                     <span style="font-size:16px"> {!!$slugdata->user->last_name!!} </span>
                     @if($slugdata->user->user_status=='verified')
                     <i class="fa fa-check-circle"></i>@endif
                  </div>
                  <div class="active-status-wrapper">
                     @if($slugdata->user->is_away=='1') 
                     <i class="fa-solid fa-circle" style="color:red;"></i> Inactive Now
                     @else 
                     
                     @if($slugdata->user->availability=='1') 
                     @if($ModelAvail==true)
                     <i class="fa-solid fa-circle" style="color:red;"></i>Limited
                     @else
                     <i class="fa-solid fa-circle" style="color:red;"></i> Unavailable
                     @endif
                    
                     @else
                     @if(!empty($diffInMinutes))
                        @if($diffInMinutes>0)
                        @if($diffInYears<1) @if($diffInMonths<1) @if($diffInDays<1) @if($diffInHours<1) <i
                           class="fa-solid fa-circle">
                        </i> Active {{$diffInMinutes}} min ago
                        @else
                        <i class="fa-solid fa-circle"></i> Active {{$diffInHours}} hr {{$diffInMinutes}}
                        min ago
                        @endif
                        @else
                        Active {{$diffInDays}} Days Ago
                        @endif
                        @else
                        Active {{$diffInMonths}} Months Ago
                        @endif
                        @else
                        Active {{$diffInYears}} Years Ago
                        @endif
                        @else
                        <i class="fa-solid fa-circle"></i> Active Now
                        @endif
                        @endif
                     @endif
   
                     @endif
                  </div>
               </div>
               <div>
                  <p class="model-aboutpara">
                     {{$slugdata->user->discription ??''}}
                  </p>
                  @if($slugdata->user->is_away)<button class="notify_me-btn btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter1">Notify Me</button> @endif
               </div>
               <div class="model-ranks">
                  <div class="modelmassage-rank-wrapp line_col">
                     <b>@if($slugdata->user->is_away)- @else @if(!empty($slugdata->cost_msg)) ${{$slugdata->cost_msg}} @endif @endif </b>
                     <span>Per Message</span>
                  </div>
                  <div class="modelmassage-rank-wrapp line_col">
                     <b>@if($slugdata->user->is_away) - <br> @else #18 <br>  @endif</b>
                     <span>@if(!empty($slugdata->modelcategory->title)){{$slugdata->modelcategory->title}} @else Category @endif</span>
                  </div>
                  <div class="modelmassage-rank-wrapp">
                     @if($slugdata->user->is_away)
                                 
                        <b>-</b>
                     <span>Overall Rank</span>
                   
                     @else
                     @if($rank > 0)
                     <b>#{{$rank}}</b>
                     <span>Overall Rank</span>
                     @else
                     <b>-</b>
                     <span>Overall Rank</span>
                     @endif
                     @endif
                  </div>
               </div>
               <div class="model-contect-btnwrapper">
                  <button type="button"  data-toggle="modal" data-target="#exampleModalCenter1" class="add-contact model-spoil-btn profile-add"  >Add contact for free</button>
                  <button type="button"  data-toggle="modal" data-target="#exampleModalCenter1" class="model-spoil-btn joinfree-btn" >
                  Send me a tip to spoil me!
                  </button>
               </div>
               <p class="gurnted-responsi-line">
                  Guaranteed response and my replies are <b>FREE</b>
               </p>
               <div class="input-group d-flex">
                  <input type="text" placeholder="Send a message for @if(!empty($slugdata->cost_msg))${{$slugdata->cost_msg}}@endif"
                     class="model-detilsinput" />
                  <button type="button"  data-toggle="modal" data-target="#exampleModalCenter1" class="model-contect-btn send-msg"  type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
               </div>
            </div>
         </div>
      </div>
      <div class="lets-chat-wrapper">
         <h2 class="letschat-heading">Lets Chat</h2>
         <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <div class="letschat-tab">
                  <button class="login_btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter1">
                     <img src="./image/chat.png" alt="" />
                     <div class="lets-chatpataline">
                        <p>
                           <b>@if(!empty($slugdata->cost_msg))${{$slugdata->cost_msg}}@endif</b> per text message you send
                           <strong> text replies are free </strong>
                        </p>
                     </div>
               </div>
               <p class="mt-2 gurnted-rsponse-line">
               <img src="./image/worning.png" alt="#" class="mr-2" />Guaranteed response
               </p>
               </button>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <button class="login_btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter1">
                  <div class="letschat-tab">
                     <img src="./image/img.png" alt="" />
                     <div class="lets-chatpataline">
                        <p>
                           <b>@if(!empty($slugdata->cost_pic))${{$slugdata->cost_pic}}@endif </b> per picture message you send
                           <strong> Trade naughty pics </strong>
                        </p>
                     </div>
                  </div>
               </button>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <button class="login_btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter1">
                  <div class="letschat-tab">
                     <img src="./image/play.png" alt="" />
                     <div class="lets-chatpataline">
                        <p>
                           <b>@if(!empty($slugdata->cost_videomsg))${{$slugdata->cost_videomsg}}@endif</b> per video message you send
                           <strong> Exchange personal video </strong>
                        </p>
                     </div>
                  </div>
               </button>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <button class="login_btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter1">
                  <div class="letschat-tab">
                     <img src="./image/mic.png" alt="" />
                     <div class="lets-chatpataline">
                        <p>
                           <b>@if(!empty($slugdata->cost_audiomsg))${{$slugdata->cost_audiomsg}}@endif </b>per audio message you send
                           <strong> Personal voice messages </strong>
                        </p>
                     </div>
                  </div>
               </button>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <div class="letschat-tab">
                  <button class="login_btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter1">
                     <img src="./image/phone.png" alt="" />
                     <div class="lets-chatpataline">
                        <p>
                           <b> @if(!empty($slugdata->cost_audiocall))${{$slugdata->cost_audiocall}}@endif </b> per minute to
                           <strong> call me directly </strong>
                        </p>
                     </div>
               </div>
               <p class="mt-2 gurnted-rsponse-line">
               <img src="./image/worning.png" alt="#" class="mr-2" />Guaranteed response
               </p>
               </button>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <div class="letschat-tab">
                  <button class="login_btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter1">
                     <img src="./image/video.png" alt="" />
                     <div class="lets-chatpataline">
                        <p>
                           <b>@if(!empty($slugdata->cost_videocall))${{$slugdata->cost_videocall}}@endif </b> per minute for
                           <strong> 1-on-1 video chat</strong>
                        </p>
                     </div>
               </div>
               <p class="mt-2 gurnted-rsponse-line">
               <img src="./image/worning.png" alt="#" class="mr-2" />Guaranteed response
               </p>
               </button>
            </div>
         </div>
      </div>
      @php 
      $current_time = Carbon\Carbon::now();
      @endphp
       <!-- popup slider end  -->
            <!-- copylink post -->
            @if(isset($copy_post))
            <div class="modal fade " id="copy_post_model" tabindex="-1" role="dialog" aria-labelledby="basicModal"
               aria-hidden="true">
               <div class="modal-dialog modal-lg copy_post_popup">
                  <div class="modal-content copy_post_model_content">
                     <button type="button" class="close copy_pop_close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times copy_pop_close_btn" aria-hidden="true"></i></span>
                     </button>
                     <div class="modal-body">
                        <!-- carousel -->
                        <div id='carouselExampleIndicators' class='carousel slide ' data-ride='carousel'>
                           <!-- carousel-indicators-->
                           <ol class="carousel-indicators">
                           </ol>
                           <div class='carousel-inner'>
                              @php
                              $copy_post_media=App\Models\Feed_media::where('feed_id',$copy_post->id)->get();
                              $dt = new DateTime(); $laraveltime = $dt->format('Y-m-d H:i:s'); $date1
                              = new DateTime($copy_post->created_at); $date2 = new DateTime($laraveltime);
                              $difference = $date1->diff($date2);
                              $diffInSeconds = $difference->s;
                              //45
                              $diffInMinutes = $difference->i; //23
                              $diffInHours =
                              $difference->h; //8
                              $diffInDays = $difference->d; //21
                              $diffInMonths =
                              $difference->m;
                              //4
                              $diffInYears = $difference->y;
                              @endphp
                              <div class="carousel_header">
                                 <div class="d-flex text-white justify-content-between pt-2">
                                    <div class="d-flex ">
                                       <img class="img-fluid header_img"
                                          src="{{ url('profile-image') . '/' . $slugdata->user->profile_image ?? '' }}"
                                          alt="" />
                                       <p class="ml-2 mt-3">
                                          {!!$slugdata->user->first_name!!}{!!$slugdata->user->last_name!!}
                                       </p>
                                       @if($slugdata->user->user_status=='verified')
                                       <i class="bi bi-patch-check-fill mt-2 ml-1">@endif
                                       </i>
                                       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button> -->
                                    </div>
                                    <div>
                                       <small class="text-muted">
                                       @if(!empty($diffInMinutes))
                                       @if($diffInMinutes>0)
                                       @if($diffInYears<1) @if($diffInMonths<1) @if($diffInDays<1) @if($diffInHours<1) <i
                                          class="fa-solid fa-circle">
                                       </i>  {{$diffInMinutes}} min ago
                                       @else
                                       <i class="fa-solid fa-circle"></i>  {{$diffInHours}} hr {{$diffInMinutes}}
                                       min ago
                                       @endif
                                       @else
                                       {{$diffInDays}} Days Ago
                                       @endif
                                       @else
                                       {{$diffInMonths}} Months Ago
                                       @endif
                                       @else
                                       {{$diffInYears}} Years Ago
                                       @endif
                                       @else
                                       <i class="fa-solid fa-circle"></i>  Now
                                       @endif
                                       @endif
                                       </small>
                                    </div>
                                 </div>
                              </div>
                              <div class="image_contant">
                                 <div>
                                    @if($copy_post->price>0)
                                    <div class="unclock-overlay1">
                                       <div class="unlock-btn-wrapepr">
                                          <i class="fa-solid fa-lock"></i>
                                          <button class="unlock-btn">
                                          Unlock for ${{$copy_post->price}}
                                          </button>
                                       </div>
                                    </div>
                                    @endif
                                 </div>
                                 <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                       @foreach( $copy_post_media as $valu )
                                       <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                       @endforeach
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                       @foreach($copy_post_media as $item)
                                       <div class="item {{$loop->first?'active':''}}">
                                          @if ($item->media_type == 'jpg' or
                                          $item->media_type == 'png' or
                                          $item->media_type == 'jpeg' or
                                          $item->media_type == 'gif')
                                          <img class="expolor-img" style="
                                             width: 100%;
                                             height: 100%;
                                             object-fit: cover;
                                          "
                                             src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                             alt="" />
                                          @endif
                                          @if ($item->media_type == 'mp4')
                                          <video width="320" height="240" controls>
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
                                       </div>
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                              <div class=" pl-1 pr-1 text-white ">
                                 <div class=" footer_row foot_line text-white  ">
                                    {!!$copy_post->description!!}
                                 </div>
                                 <div class=" row footer_row foot_line  mt-1">
                                    <form class="" role="form" id="reg-form" method="POST"
                                       class="form-horizontal" action="">
                                       <div class=" ">
                                          <div class="form-group d-flex ">
                                             <i class="bi bi-heart"></i> <input type="" name="" class="form-control msg_input"
                                                placeholder="Send a message for $1.00...">
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div  class=" row ml-0 mr-2 footer_row  mt-1 justify-content-between">
                                    <div class="col-6">
                                       <i class="bi bi-plus-lg text-white mr-1 footer_icon"></i><a
                                          href=""><small><b>Add</b></small></a>
                                    </div>
                                    <div class="col-6">
                                       <i class="bi bi-currency-dollar mr-2  footer_icon"></i><a
                                          href=""><small><b>Tip</b></small></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button'
                              data-slide='prev'>
                           <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                           <span class='sr-only'>Previous</span>
                           </a>
                           <a class='carousel-control-next' href='#carouselExampleIndicators' role='button'
                              data-slide='next'>
                           <span class='carousel-control-next-icon' aria-hidden='true'></span>
                           <span class='sr-only'>Next</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            <!-- copylink end -->
            <div class="modal fade " id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
               aria-hidden="true">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-body">
                        <!-- carousel -->
                        <div id='carouselExampleIndicators' class='carousel slide ' data-ride='carousel'>
                           <!-- carousel-indicators-->
                           <ol class="carousel-indicators">
                              @foreach( $model_feeds as $value )
                              <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                 class="{{ $loop->first ? 'active' : '' }}"></li>
                              @endforeach
                           </ol>
                           <div class='carousel-inner'>
                              @foreach($model_feeds as $value) @php
                              $feed_media=App\Models\Feed_media::where('feed_id',$value->id)->get();
                              $dt = new DateTime(); $laraveltime = $dt->format('Y-m-d H:i:s'); $date1
                              = new DateTime($value->created_at); $date2 = new DateTime($laraveltime);
                              $difference = $date1->diff($date2);
                              $diffInSeconds = $difference->s;
                              //45
                              $diffInMinutes = $difference->i; //23
                              $diffInHours =
                              $difference->h; //8
                              $diffInDays = $difference->d; //21
                              $diffInMonths =
                              $difference->m;
                              //4
                              $diffInYears = $difference->y;
                              @endphp
                              <div class="carousel-item {{$loop->first?'active':''}}">
                                 <div class="carousel_header">
                                    <div class="d-flex text-white justify-content-between">
                                       <div class="d-flex ">
                                          <img class="img-fluid header_img"
                                             src="{{ url('profile-image') . '/' . $slugdata->user->profile_image ?? '' }}"
                                             alt="" />
                                          <p class="ml-2 mt-2">
                                             {!!$slugdata->user->first_name!!}{!!$slugdata->user->last_name!!}
                                          </p>
                                          @if($slugdata->user->user_status=='verified')
                                          <i class="bi bi-patch-check-fill mt-2 ml-1">@endif
                                          </i>
                                       </div>
                                       <div>
                                          <small class="text-muted">
                                          @if(!empty($diffInMinutes))
                                          @if($diffInMinutes>0)
                                          @if($diffInYears<1) @if($diffInMonths<1) @if($diffInDays<1) @if($diffInHours<1) <i
                                             class="fa-solid fa-circle">
                                          </i> Active {{$diffInMinutes}} min ago
                                          @else
                                          <i class="fa-solid fa-circle"></i> Active {{$diffInHours}} hr {{$diffInMinutes}}
                                          min ago
                                          @endif
                                          @else
                                          Active {{$diffInDays}} Days Ago
                                          @endif
                                          @else
                                          Active {{$diffInMonths}} Months Ago
                                          @endif
                                          @else
                                          Active {{$diffInYears}} Years Ago
                                          @endif
                                          @else
                                          <i class="fa-solid fa-circle"></i> Active Now
                                          @endif
                                          @endif
                                          </small>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="image_contant">
                                    <div>
                                       @if($value->price>0)
                                       <div class="unclock-overlay1">
                                          <div class="unlock-btn-wrapepr">
                                             <i class="fa-solid fa-lock"></i>
                                             <button class="unlock-btn">
                                             Unlock for ${{$value->price}}
                                             </button>
                                          </div>
                                       </div>
                                       @endif
                                    </div>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                       <!-- Indicators -->
                                       <ol class="carousel-indicators">
                                          @foreach( $model_feeds as $valu )
                                          <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                          @endforeach
                                       </ol>
                                       <!-- Wrapper for slides -->
                                       <div class="carousel-inner">
                                          @foreach($model_feeds as $item)
                                          <div class="item {{$loop->first?'active':''}}">
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
                                          </div>
                                          @endforeach
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" pl-1 pr-1 text-white ">
                                    <div class=" footer_row foot_line text-white  ">
                                       {!!$value->description!!}
                                    </div>
                                    <div class=" row footer_row foot_line  mt-1">
                                       <form class="" role="form" id="reg-form" method="POST"
                                          class="form-horizontal" action="">
                                          <div class=" ">
                                             <div class="form-group d-flex ">
                                                <i class="bi bi-heart"></i> <input type="" name="" class="form-control msg_input"
                                                   placeholder="Send a message for $1.00...">
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                    <div  class=" row ml-0 mr-2 footer_row  mt-1 justify-content-between">
                                       <div class="col-6">
                                          <i class="bi bi-plus-lg text-white mr-1 footer_icon"></i><a
                                             href=""><small><b>Add</b></small></a>
                                       </div>
                                       <div class="col-6">
                                          <i class="bi bi-currency-dollar mr-2  footer_icon"></i><a
                                             href=""><small><b>Tip</b></small></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                           <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button'
                              data-slide='prev'>
                           <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                           <span class='sr-only'>Previous</span>
                           </a>
                           <a class='carousel-control-next' href='#carouselExampleIndicators' role='button'
                              data-slide='next'>
                           <span class='carousel-control-next-icon' aria-hidden='true'></span>
                           <span class='sr-only'>Next</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
           
            </div>
      @if(count($model_feeds)>=1) 
      <div class="detail_page-wrapper">
         <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
            @if($model_feeds_count>0)
            <li class="nav-item">
               <a class="nav-link nav_tab active" id="pills-view-tab" data-toggle="pill" href="#pills-view"
                  role="tab" aria-controls="pills-view" aria-selected="true"> Posts ({{$model_feeds_count}})<small></small></a>
            </li>
             @endif
             @if($model_feeds_pic_count>0)
            <li class="nav-item">
               <a class="nav-link nav_tab" id="pills-pic-tab" data-toggle="pill" href="#pills-pic" role="tab"
                  aria-controls="pills-pic" aria-selected="true"> Pic ({{$model_feeds_pic_count}})<small></small></a>
            </li>
            @endif
            @if($model_feeds_video_count>0)
            <li class="nav-item">
               <a class="nav-link nav_tab" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                  aria-controls="pills-video" aria-selected="true"> Videos ({{$model_feeds_video_count}})<small></small></a>
            </li>
            @endif
            @if($model_feeds_premium_count>0)
            <li class="nav-item">
               <a class="nav-link nav_tab" id="pills-free-tab" data-toggle="pill" href="#pills-Premium" role="tab"
                  aria-controls="pills-free" aria-selected="true"> Premium ({{$model_feeds_premium_count}})<small></small></a>
            </li>
            @endif
            @if($model_feeds_free_count>0)
            <li class="nav-item">
               <a class="nav-link nav_tab" id="pills-Premium-tab" data-toggle="pill" href="#pills-free"
                  role="tab" aria-controls="pills-Premium" aria-selected="true"> Free ({{$model_feeds_free_count}})<small></small></a>
            </li>
            @endif
         </ul>
      </div>
      @endif
      <div class="details-tab-wrapper">
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab"
               style="color: #fff">
               <div class="pictab-wrapper">
                  <div class="row" id="feed_data">
                     @if(!empty($model_feeds)) 
                     @foreach($model_feeds as $key=> $val)
                     @if($key<=5)
                     <div class="col-lg-3 col-md-6 p-0" data-toggle="modal" data-target="#exampleModalCenter1">
                        <div class="media p-1">
                           @if($val->price>0)
                           <div class="unclock-overlay">
                              <div class="unlock-btn-wrapepr">
                                 <span > <i class="fa-solid fa-lock"></i></span>
                              </div>
                           </div>
                           @endif 
                           @if($val->media_type=='png' OR $val->media_type=='jpg'OR
                           $val->media_type=='jpeg'OR $val->media_type=='gif')
                           <img src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                              style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                           @endif
                           @if($val->media_type=='mp4')
                           <video controls class="feed_video" style="height:180px;">
                              <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                                 type="video/mp4" height="180px">
                              <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                                 type="video/ogg">
                              Your browser does not support the video tag.
                           </video>
                           @endif
                        </div>
                     </div>
                     @endif
                     @endforeach  
                     @endif
                  </div>
                  
               </div>
               @if(($model_feeds_count)>=5) 
                  <div class="" id="loadbtn">
                     <button type="button" class="login-btn"  data-toggle="modal" data-target="#exampleModalCenter1" >     View More </button>
                  </div>
                  @endif
            </div>
           
            <div class="tab-pane fade  " id="pills-pic" role="tabpanel" aria-labelledby="pills-pic-tab"
               style="color: #fff">
               <div class="pictab-wrapper">
                  <div class="row">
                     @if(!empty($model_feeds))
                     @foreach($model_feeds as $key=> $value) 
                     @if($key<=5)
                     @if($value->media_type=='png' OR $value->media_type=='jpg'OR
                     $value->media_type=='jpeg'OR $value->media_type=='gif')
                     <div class="col-lg-3 col-md-6 p-0" data-toggle="modal" data-target="#exampleModalCenter1">
                        <div class="media p-1">
                           @if($value->price>0)
                           <div class="unclock-overlay">
                              <div class="unlock-btn-wrapepr">
                                 <i class="fa-solid fa-lock"></i>
                              </div>
                           </div>
                           @endif 
                           <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                              style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                        </div>
                     </div>
                     @endif @endif @endforeach @endif
                  </div>
               </div>
               @if(($model_feeds_pic_count)>=5) 
               <div class="" id="loadbtn">
                  <button type="button" class="login-btn"  data-toggle="modal" data-target="#exampleModalCenter1" >     View More </button>
               </div>
               @endif
            </div>
            <div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
              
               <div class="videotab-wrapper">
                  <div class="row">
                     @foreach($model_feeds as $key=> $value) 
                    
                     @if($value->media_type=='mp4')
                     <div class="col-lg-3 col-md-6 p-0" data-toggle="modal" data-target="#exampleModalCenter1">
                        <div class="media p-1">
                           @if($value->price>0)
                           <div class="unclock-overlay">
                              <div class="unlock-btn-wrapepr">
                                 <i class="fa-solid fa-lock"></i>
                              </div>
                           </div>
                           @endif 
                           <video controls class="feed_video" style="height:180px;">
                              <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                                 type="video/mp4" height="180px">
                              <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                                 type="video/ogg">
                              Your browser does not support the video tag.
                           </video>
                        </div>
                     </div>
                    
                     @endif
                     @endforeach 
                  </div>
               </div>
               @if(($model_feeds_video_count)>=5) 
               <div class="" id="loadbtn">
                  <button type="button" class="login-btn"  data-toggle="modal" data-target="#exampleModalCenter1" >     View More </button>
               </div>
               @endif
            </div>
            <div class="tab-pane fade" id="pills-Premium" role="tabpanel" aria-labelledby="pills-Premium-tab">
               <div class="pictab-wrapper">
                  <div class="row" id="feed_data">
                     @if(!empty($model_feeds)) 
                     @foreach($model_feeds as $key=> $val)
                    @if($val->price>0)
                    @if($key<=5)
                    <div class="col-lg-3 col-md-6 p-0" data-toggle="modal" data-target="#exampleModalCenter1">
                       <div class="media p-1">
                          @if($val->price>0)
                          <div class="unclock-overlay">
                             <div class="unlock-btn-wrapepr">
                                <span > <i class="fa-solid fa-lock"></i></span>
                             </div>
                          </div>
                          @endif 
                          @if($val->media_type=='png' OR $val->media_type=='jpg'OR
                          $val->media_type=='jpeg'OR $val->media_type=='gif')
                          <img src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                             style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                          @endif
                          @if($val->media_type=='mp4')
                          <video controls class="feed_video" style="height:180px;">
                             <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                                type="video/mp4" height="180px">
                             <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                                type="video/ogg">
                             Your browser does not support the video tag.
                          </video>
                          @endif
                       </div>
                    </div>
                    @endif
                    @endif
                     @endforeach  
                     @endif
                  </div>
                  </div>
                  @if(($model_feeds_premium_count)>=5) 
               <div class="" id="loadbtn">
                  <button type="button" class="login-btn"  data-toggle="modal" data-target="#exampleModalCenter1" >     View More </button>
               </div>
               @endif
               </div>
                 
                  
              
               <div class="tab-pane fade" id="pills-free" role="tabpanel" aria-labelledby="pills-free-tab">
                  
                  <div class="pictab-wrapper">
                     <div class="row" id="feed_data">
                        @if(!empty($model_feeds)) 
                        @foreach($model_feeds as $key=> $val)
                       @if($val->price<=0.00)
                       @if($key<=5)
                       <div class="col-lg-3 col-md-6 p-0" data-toggle="modal" data-target="#exampleModalCenter1">
                          <div class="media p-1">
                             @if($val->price>0)
                             <div class="unclock-overlay">
                                <div class="unlock-btn-wrapepr">
                                   <span > <i class="fa-solid fa-lock"></i></span>
                                </div>
                             </div>
                             @endif 
                             @if($val->media_type=='png' OR $val->media_type=='jpg'OR
                             $val->media_type=='jpeg'OR $val->media_type=='gif')
                             <img src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                                style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                             @endif
                             @if($val->media_type=='mp4')
                             <video controls class="feed_video" style="height:180px;">
                                <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                                   type="video/mp4" height="180px">
                                <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                                   type="video/ogg">
                                Your browser does not support the video tag.
                             </video>
                             @endif
                          </div>
                       </div>
                       @endif
                       @endif
                        @endforeach  
                        @endif
                        @if(($model_feeds_free_count)>=5) 
                        <div class="q" id="loadbtn">
                           <button type="button" class="login-btn"  data-toggle="modal" data-target="#exampleModalCenter1" >     View More </button>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
  
            <form>
               <input type="hidden" id="modelid" name="modelvalue" value="{{$slugdata->user_id}}">
            </form>
           
            <!-- <div class="viewmore-btn-wraper" id="loadbtn">
               <button class="viewmore" value="{{$take}}">     View More </button>
                </div> -->
            @php $json_data = json_decode($slugdata->socail_links,true); @endphp
            @if(( $json_data['twitter']??'') || ($json_data['facebook']??'') || ($json_data['website']??'') || ($json_data['camsite']??'') || ($json_data['spankpay']??'') || ($json_data['instagram']??''))
            <div class="mylinks-wrapper ">
               <h3 class="my-links">My Links</h3>
               <div class="mylink-wrapper d-flex justify-content-between">
                  @if(!empty($json_data['twitter']))
                  <div class="modellink-wrrap  mt-4 ">
                     <img src="./image/ball2.png" alt="" />
                     <a href="">{{$json_data['twitter']}}</a>
                  </div>
                  @endif
                  @if(!empty($json_data['facebook']))
                  <div class="modellink-wrrap  mt-4 ">
                     <img src="./image/ball1.png" alt="" />
                     <a href="">{{$json_data['facebook']}}</a>
                  </div>
                  @endif
                  @if(!empty($json_data['snapchat']))
                  <div class="modellink-wrrap mt-4 ">
                     <img src="./image/ball3.png" alt="" />
                     <a href="">{{$json_data['snapchat']}}</a>
                  </div>
                  @endif
                  @if(!empty($json_data['website']))
                  <div class="modellink-wrrap mt-4 ">
                     <img src="./image/ball3.png" alt="" />
                     <a href="">{{$json_data['website']}}</a>
                  </div>
                  @endif
                  @if(!empty($json_data['camsite']))
                  <div class="modellink-wrrap mt-4 ">
                     <img src="./image/ball3.png" alt="" />
                     <a href="">{{$json_data['camsite']}}</a>
                  </div>
                  @endif
                  @if(!empty($json_data['spankpay']))
                  <div class="modellink-wrrap mt-4 c">
                     <img src="./image/ball3.png" alt="" />
                     <a href="">{{$json_data['spankpay']}}</a>
                  </div>
                  @endif
                  @if(!empty($json_data['instagram']))
                  <div class="modellink-wrrap mt-4 ">
                     <img src="./image/ball3.png" alt="" />
                     <a href="">{{$json_data['instagram']}}</a>
                  </div>
                  @endif
               </div>
            </div>
            @endif
            <div class="Online-wrapper">
               <h2>Online Now</h2>
               <div class="online-imgs-wrapper">
                  <div class="row  ">
                     @foreach($online as $key => $value)
                     @php
                     $image=(Controller::modelImage('profile-image/'.$value->profile_image,'_250x300'))?Controller::modelImage($value->profile_image,'_250x300') : $value->profile_image;
                     @endphp 
                     <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3  col-xs-12 mb-3 mr-3">
                        <div class="online_model">
                           <a href="{{url('/'.$value->slug)}}">
                           <img 
                              src="{{ url('profile-image') . '/' . $image ?? '' }}" /></a>
                        </div>
                     </div>
                     @endforeach 
                     <div class=" col-md-2 col-xl-2 col-lg-2 col-sm-3  col-xs-12 mb-3 mr-3">
                        <a class="" href="{{ route('online-now') }}">
                           <div class="viewmore-ovrelays"><span> View More</span></div>
                           <div class="online_model">
                              <img class="overlay_img" src="{{ url('profile-image') . '/' . $value->profile_image ?? '' }}" />
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            @if(count($slugdata->tags)>0)
            <div class="modeltags-wrapper">
               <h2>Tags</h2>
               <div class="modeltagss-wrapper">
                  @foreach($slugdata->tags as $value)
                  <a href=" {{ route('tags', $value->slug) }} ">
                  <span> #{{$value->title}} </span></a>
                  @endforeach
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <!-- <div class="models__img pt-0 mx-auto" style="background-color: rgb(216, 216, 216);
         background-image: url(&quot;/images/loader_img_2.png&quot;); width: 100px; height: 100px; border: 3px solid rgb(0, 0, 0);">
         <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; 
         border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img alt="Image" 
         src="{{ url('profile-image') . '/' . $slugdata->user->profile_image ?? '' }}" decoding="async" data-nimg="fill" class="rounded-circle" 
         style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; 
         min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: 50% 50%;"></span></div> -->
      <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true" style="
            color: #ffff;
            opacity: 111111111;
            ">&times;</span>
         </button>
         <div class="modal-body">
            <!DOCTYPE html>
            <html lang="en">
               <head>
                  <!-- Required meta tags -->
                  <meta charset="utf-8" />
                  <meta name="viewport" content="width=device-width, initial-scale=1" />
                  <!-- Bootstrap CSS -->
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
                  <link rel="stylesheet" href="./css/style.css" />
                  <link rel="preconnect" href="https://fonts.googleapis.com" />
                  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                  <title>Adult X</title>
               </head>
               <body>
                  <div class="login-bg">
                     <div class="container">
                        <div class="login-wrapper">
                           <!-- <div class="login-bannerwrapper">
                              <img src="./image/loginbanner.png" alt="" class="login-bannerimg" />
                              <div class="login-bannerhading-wrapp">
                                  <a href="{{'/'}}"> <img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo"
                                          class="nav-logo" /></a> 
                              </div>
                              </div> -->
                           <div class="loginfrom-wrapper">
                              <div class="login-form-wraper">
                                 <div class="upper_section">
                                    <a href="{{'/'}}"><img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo"
                                       class="nav-logo" /></a>
                                    <p class="sinup-linewrapp mt-3">
                                       Sign  up to view more posts Or log in if you already have an
                                       account
                                    </p>
                                 </div>
                                 <div class="logintab-wrapp mb-0">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                       <li class="nav-item" role="presentation">
                                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                             data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                             aria-selected="true">
                                          Log In
                                          </button>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                             data-bs-target="#pills-profile" type="button" role="tab"
                                             aria-controls="pills-profile" aria-selected="false">
                                          Sign Up
                                          </button>
                                       </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                       <div class="tab-pane fade show active loginform-wrapper" id="pills-home" role="tabpanel"
                                          aria-labelledby="pills-home-tab">
                                          @if (Session::has('error'))
                                          <div class="alert alert-danger" id="alert">
                                             <span>{{ Session::get('error') }}</span>
                                          </div>
                                          @endif
                                          @if(session()->has('message'))
                                          <div class="alert alert-success" id="alert">
                                             {{ session()->get('message') }}
                                          </div>
                                          @endif
                                          <form method="POST" action="{{ route('mainlogin') }}">
                                             @csrf
                                             <!-- @if($errors->any())
                                                <small class=" error">{{$errors->first()}}</small>
                                                @endif -->
                                             <div class="singpform-wraper">
                                            <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                <label class="input-label">Email Address</label>
                                                <input type="email" placeholder="email"  class="email-adrrs" name="log_email" required/>
                                                
                                            </div>
                                            <small class="text-danger">
                                                    @error('log_email')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                               
                                            <div class="inputfild-wrapp">
                                                <label class="input-label">Password</label>
                                                <div class="d-flex" style="width: 100%;">
                                                    <input  type="password" id="log_password"class="lockpassword" required placeholder="password"
                                                        name="log_password" required="true" aria-label="password" aria-describedby="basic-addon1">

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" onclick="password_show_hide_mod_log();">
                                                            <i class="bi bi-eye fa-2x" id="show_eye_log"></i>
                                                          <i class="bi bi-eye-slash d-none fa-2x" id="hide_eye_log"></i>
                                                        </span>
                                                      </div>
                                              
                                            </div>
                                            <small class="text-danger">
                                            <!-- @if(Session::has('error'))
                                                <p class="alert alert-info">{{ Session::get('error') }}</p>
                                                @endif -->
                                                </small>
                                            </div>
                                        </div>
                                             <div class="checkinput-wraperonlogin">
                                                <!-- <div class="ckeckfilter">
                                                   <input type="checkbox" id="checkbox-2-11" name="" value=""
                                                       class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                   <label for="checkbox-2-11"></label>
                                                   <p class="text-white mt-3">Remember Me</p>
                                                   </div> -->
                                                <!--  <div class="checkinput-wraper">
                                                   <input type="checkbox" class="ckeckoutinpt" />
                                                   <p>Remember Me</p>
                                                   </div> -->
                                                <a href="#"> Forgot Password? </a>
                                             </div>
                                             <div class="login-pagebtn-wrapp">
                                                <button class="singupbtn">Login</button>
                                             </div>
                                             <p class="byloginline mb-0">
                                                By logging in you are agreeing to our
                                                <b class="text-white"><a class="terms_link" href="{{ url('/terms-conditions') }}">Terms of Service</a></b> and
                                                <b><a class="terms_link" href="{{ url('/terms-conditions') }}">Privacy Policy.</a> </b>
                                             </p>
                                          </form>
                                       </div>
                                       <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                          aria-labelledby="pills-profile-tab">
                                          <div class="tab-pane fade show active loginform-wrapper" id="pills-home"
                                             role="tabpanel" aria-labelledby="pills-home-tab">
                                             <form method="POST" action="{{ route('storeuser') }}">
                                                @csrf
                                                <div class="singpform-wraper">
                                                <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                    <label class="input-label">Display Name</label>
                                                    <input type="text" placeholder="name"  value="{{ old('first_name') }}" required name="first_name"
                                                        class="Displayname-input" style="" />
                                                    <small class="text-danger">
                                                    
                                                        @error('first_name')
                                                        {{ $message }}
                                                        @enderror
                                                    </small>
                                                </div>
                                                <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                    <label class="input-label">Email Address</label>
                                                    <input type="email" placeholder=" email"  value="{{ old('email') }}" required class="email-adrrs" name="email" />
                                                    <small class="text-danger">
                                                        @error('email')
                                                        {{ $message }}
                                                        @enderror
                                                    </small>
                                                </div>
                                                <div class="inputfild-wrapp">
                                                         <label class="input-label">Password</label>
                                                         <div class="d-flex" style="width: 100%;">
                                                    <input type="password" id="password"class="lockpassword" required placeholder="password"
                                                        name="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                                                        <div class="input-group-append">
                                                        <span class="input-group-text" onclick="password_show_hide();">
                                                            <i class="bi bi-eye fa-2x" id="show_eye"></i>
                                                          <i class="bi bi-eye-slash d-none fa-2x" id="hide_eye"></i>
                                                        </span>
                                                      </div>
                                                 
                                                    </div>
                                                    <small class="text-danger">
                                                        @error('password')
                                                        {{ $message }}
                                                        @enderror
                                                    </small>
                                                   
                                                </div>
                                            </div>
                                                <div class="ckeckfilter checkinput-wraper">
                                                   <div class="form-check d-flex p-0">
                                                      <input type="checkbox" id="checkbox-2-12" name="readbox" value="1"
                                                         class="filter-checkbox filterbig-checkbox filter ckeckoutinpt">
                                                      <label for="checkbox-2-12"></label>
                                                      <p class=" mt-3 Service_text"> I have read and agreed to Bad Bunnies Tv.com’s
                                                         &nbsp;&nbsp;<a class="terms_link" href="{{ url('/terms-conditions') }}"><b>Terms of Service</b></a>
                                                      </p>
                                                   </div>
                                                </div>
                                                <small class="text-danger" style="margin: 0px 30px;">
                                                @error('readbox')
                                                {{ $message }}
                                                @enderror
                                                </small>
                                                <!-- <div class="login-pagebtn-wrapp">
                                                   <input type="submit" value="Sign up " class="singupbtn" name="fan">
                                                   <input class="role" name="role" type="hidden" value="">
                                                   </div>
                                                   </form>
                                                   <button class="hover-btn btn btn-lg  applyas_model-btn">
                                                   <a class="Applybtn_text" href="{{url('/storeuser')}}">
                                                   <small class=""> Apply as a modal
                                                   </small>
                                                   </a>
                                                   </button> -->
                                                <div class="login-pagebtn-wrapp">
                                                   <input type="submit" value="Sign up " class="singupbtn" name="fan">
                                             </form>
                                             <a class="Applybtn_text" href="{{url('/storeuser')}}"> 
                                    <button value="" type="button" class="applyasmodel-btn">
                                     Apply as a model </button></a>
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
         </div>
      </div>
   </div>
</div>
<!-- modal -->
@endsection @section('scripts') @parent @endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
     $(document).on('click','.copy_pop_close_btn', function() {
       
        $('#copy_post_model').modal('hide');
     });
   
   });
   $(window).on('load', function() {
    $('#copy_post_model').modal('show');
   });
</script>
<script>
   $(document).ready(function() {
       $(".singupbtn").click(function() {
           var name = $(this).attr('name');
           $(".role").val(name)
       })
       $(".applyasmodel-btn").click(function() {
           var name = $(this).attr('name');
           $(".role").val(name)
       })
   });
</script>
 <script type="text/javascript">
        function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
    </script>
  <script type="text/javascript">
        function password_show_hide_mod_log(){

  var x = document.getElementById("log_password");
  var show_eye_log = document.getElementById("show_eye_log");
  var hide_eye_log = document.getElementById("hide_eye_log");
  hide_eye_log.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye_log.style.display = "none";
    hide_eye_log.style.display = "block";
  } else {
    x.type = "password";
    show_eye_log.style.display = "block";
    hide_eye_log.style.display = "none";
  }
}
    </script>
<style type="text/css">
/* .copy_post_model_content{
background-color: #829bb300 !important;
color: #fff !important;
background: none !important;
} */
.footer_row.foot_line.text-white {
text-align: start;
margin: 15px 0px;
}
.copy_pop_close{
color: white !important;
font-size: 26px !important;
margin-top: 10px;
/* left: 17px; */
padding-left: !important;
padding-right: 10px !important;
}
small {
font-size: 15px !important;
font-weight: 600 !important;  
}
i#show_eye_signup {
color: #8c9297;
}
i.bi.bi-heart {
color: #ff2562;
margin: 11px 15px 0px 0px;
}
.terms_link{
color: #ffff !important;
}
ul#pills-tab {
display: flex !important;
flex-wrap: nowrap !important;
}
.login_btn{
background: transparent;
border: 0px;
display: flex;
}
@media only screen and (min-width: 576px) {}
img.overlay_img {
height: 7.3rem;
}
.modellink-wrrap a {
font-size: 14.9px !important;}
</style>
<style>
.modal-content {
background-color: #0c1d2d !important;
color: #fff !important;
}
.login-form-wraper1{
padding: 0px 30px 0px 30px;
text-align: center;
}
.modal-body {
text-align: center;}
button.close {
text-align: end;
font-size: 30px;
}
.models__img.pt-0.mx-auto {
transition: all .2s;
width: 100%;
padding-top: 100%;
background-position: 50%;
background-repeat: no-repeat;
background-size: cover;
border-radius: 50%;
overflow: hidden;
position: relative;
top:-75px;
}
.loginfrom-wrapper1 {
width: 100% !important;
height: 100%;
}
video.feed_video {
border-radius: 14px;
width: 100%;
height: 100%;
}
.content{
padding:5%;
}
</style>
<style>
ol.carousel-indicators {
display: none;
}
.login-form-wraper1{
padding: 0px 30px 0px 30px;
text-align: center;
}
.modal-body {
text-align: center;}
button.close {
text-align: end;
font-size: 30px;
}
.models__img.pt-0.mx-auto {
transition: all .2s;
width: 100%;
padding-top: 100%;
background-position: 50%;
background-repeat: no-repeat;
background-size: cover;
border-radius: 50%;
overflow: hidden;
position: relative;
top:-75px;
}
.loginfrom-wrapper1 {
width: 100% !important;
height: 100%;
}
video.feed_video {
border-radius: 14px;
width: 100%;
height: 100%;
}
button.send-msg {
background: #102437;
height: 54px !important;
margin-top: 15px;
width: 46px;
color: #fff;
border-radius: 0px;
}
/*new added*/

.applyasmodel-btn:hover {
    color: #fff !important;
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
}
.applyasmodel-btn:hover a.Applybtn_text {
         color: #ffffff !important;
         text-decoration: none !important;
     }
     .singupbtn:hover {
    background: none;
    border: 1px solid;
    color: #af2990;
}
.mylink-wrapper.d-flex.justify-content-between {
    display: flex;
    flex-wrap: wrap;
}

</style>
<!-- <style type="text/css">
   /* .page-wrapper{
   width:100%;
   height:100%;
   background:url(https://i.imgur.com/2ZgHKbQ.jpg) center no-repeat;
   background-size:cover;
   } */
   /* .singpform-wraper1{
   background: #0f2437;
   border-radius: 12px;
   width: 100%;
   margin: 40px 0px 20px 0px;
   } */
   
   /* .blur{
   -webkit-filter: blur(5px);
   -moz-filter: blur(5px);
   -o-filter: blur(5px);
   -ms-filter: blur(5px);
   filter: blur(5px);
   } */
   
   /*a.btn{
   width:150px;
   display:block;
   margin:-25px 0 0 -75px;
   padding:1em 0;
   position:absolute;
   top:50%; left:50%;
   font:1.125em 'Arial', sans-serif;
   font-weight:700;
   text-align:center;
   text-decoration:none;
   color:#fff;
   border-radius:5px;
   background:rgba(217,67,86,1);
   }*/
   
   /* .modal-wrapper{
   width:100%;
   height:100%;
   position:fixed;
   top:0; left:0;
   
   background: rgb(2 2 2 / 35%);
   visibility:hidden;
   opacity:0;
   -webkit-transition: all 0.25s ease-in-out;
   -moz-transition: all 0.25s ease-in-out;
   -o-transition: all 0.25s ease-in-out;
   transition: all 0.25s ease-in-out;
   } */
   
   /* .modal-wrapper.open{
   overflow: scroll;
   z-index: 1;
   opacity:1;
   visibility:visible;
   }
   
   .modal{
   width:600px;
   height:400px;
   display:block;
   margin:50% 0 0 -300px;
   position:relative;
   top:50%; left:50%;
   background:#fff;
   opacity:0;
   -webkit-transition: all 0.5s ease-in-out;
   -moz-transition: all 0.5s ease-in-out;
   -o-transition: all 0.5s ease-in-out;
   transition: all 0.5s ease-in-out;
   }
   
   .modal-wrapper.open .modal{
   margin-top:-200px;
   opacity:1;
   }
   
   .head{
   width:100%;
   height:32px;
   padding:1.5em 5%;
   overflow:hidden;
   background:#01bce5;
   }
   
   .btn-close{
   width:32px;
   height:32px;
   display:block;
   float:right;
   margin: -20px;
   }
   
   .btn-close::before, .btn-close::after{
   content:'';
   width:32px;
   height:6px;
   display:block;
   background:#fff;
   }
   
   .btn-close::before{
   margin-top:12px;
   -webkit-transform:rotate(45deg);
   -moz-transform:rotate(45deg);
   -o-transform:rotate(45deg);
   transform:rotate(45deg);
   }
   
   .btn-close::after{
   margin-top:-6px;
   -webkit-transform:rotate(-45deg);
   -moz-transform:rotate(-45deg);
   -o-transform:rotate(-45deg);
   transform:rotate(-45deg);
   } */
   a {
   color: white;
   }
   
   .row.footer_row.text-white.d-flex {
   padding: 10px 0px;
   }
   
   .row.footer_row {
   padding: 10px 10px;
   }
   
   .foot_line {
   border-bottom: 0.1px solid #343232;
   }
   
   .footer_icon {
   color: #ff2562;
   }
   
   i.bi.bi-heart {
   color: #ff2562;
   }
   
   form#reg-form {
   width: 94%;
   }
   
   .modal-footer.text-white {
   flex-wrap: wrap;
   }
   
   .row.footer_row.d-flex {
   width: 100%;
   }
   
   .modal-footer {
   background: #000;
   }
   
   input.form-control.msg_input {
   background: black;
   border-radius: 13px;
   }
   
   i.bi.bi-patch-check-fill {
   color: #1a8dd1;
   padding-top: 3px;
   }
   
   .carousel_header {
   background: black;
   padding: 11px;
   }
   
   img.img-fluid.header_img {
   border-radius: 50%;
   height: 45px;
   width: 46px;
   border: 1px solid #fff;
   }
   
   .img-size {
   height: 100%;
   width: 100%;
   background-size: cover;
   overflow: hidden;
   }
   
   .modal-content {
   width: 500px;
   border: none;
   }
   
   .modal-body {
   padding: 0 !important;
   }
   
   .carousel-control-prev-icon {
   background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
   width: 30px;
   height: 48px;
   }
   
   .carousel-control-next-icon {
   background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
   width: 30px;
   height: 48px;
   }
   
   .unclock-overlay1 {
   position: absolute;
   width: 100%;
   height: 300px !important;
   background: rgba(0, 0, 0, 0.2);
   backdrop-filter: blur(22px);
   border-radius: 12px;
   z-index: 11;
   display: flex;
   justify-content: center;
   align-items: center;
   }
   
   /* .modal-body {
   height: 550px !important;
   } */
   
   .image_contant {
   height: 300px !important;
   }
   </style> -->
<style type="text/css">
a{
color: white;
}
.row.footer_row.text-white.d-flex {
padding: 10px 0px;
}
.row.footer_row{
padding: 10px 10px;
}
.foot_line{border-bottom: 0.1px solid #343232;}
.footer_icon{
color: #ff2562;
}
i.bi.bi-heart {
color: #ff2562;
}
form#reg-form {
width: 94%;
}
.modal-footer.text-white {
flex-wrap: wrap;
}
.row.footer_row.d-flex {
width: 100%;
}
.modal-footer {
background: #000;
}
input.form-control.msg_input {
background: black;
border-radius: 13px;
}
i.bi.bi-patch-check-fill {
color: #1a8dd1;
}
.carousel_header {
background: #000;
padding: 11px;
font-size: 15px;
}
img.img-fluid.header_img {
border-radius: 50%;
height: 45px;
width: 46px;
border: 1px solid #fff;
}
.img-size{
height: 450px;
width: 700px;
background-size: cover;
overflow: hidden;
}
.modal-content {
width: 700px;
border:none;
}
.modal-body {
padding: 0;
}
.carousel-control-prev-icon {
background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
width: 30px;
height: 48px;
}
.carousel-control-next-icon {
background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
width: 30px;
height: 48px;
}
</style>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->