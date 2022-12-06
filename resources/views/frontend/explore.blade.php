@extends('frontend.main')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script>

   $(window).scroll(function() {


      var position = $(".footer-bg-wrapper").position();
      // $( "p" ).last().text( "left: " + position.left + ", bottom: " + position.bottom );

      if($(window).scrollTop() >= position.top - 400) {
            
         $('#exampleModalCenter3').modal('show'); 

           
      }
   });

   jQuery(document).ready(function() {
       $('#like').click(function() {
           console.log('liked');
           alert('dfd');
       });
   });

   // $(window).scroll(function() {

   //    if($(window).scrollTop()+$(window).height() == $(document).height()){

   //     alert('dfghfgf');

   //      }

   //  });
</script>                                                                                                                                                                                                             
<style>
   ul.mydropdown-menu {
    display: none;
    z-index: 5;
    right: 37px;
    list-style-type: none;
    background: #232528 !important;
    box-shadow: 0 3px 5px 0 rgb(0 0 0 / 24%);
    visibility: visible;
    opacity: 1;
    font-size: 13px;
    pointer-events: auto;
    position: absolute;
    padding: 10px 10px 10px 9px;
}
   i.fa.fa-heart-o.add-to-wishlist {
   font-size: 15px;
   }
   .login-wrapper {
   background-color: #0c1d2d;
   border-radius: 0px !important;}
   div#pills-view {
   background: unset;
   }
   .loginfrom-wrapper {
   width: 100% !important;
   height: 100%;
   }
   .ckeckfilter .filterbig-checkbox:checked+label:after {
   font-size: 14px;
   left: 0;
   color: #c73ca9;
   border: 1px solid;
   padding: 0px 4px;
   border-radius: 2px;
   }
   .ckeckfilter .filterbig-checkbox:checked+label:after {
   font-size: 14px;
   left: 5px;
   color: #c73ca9;
   }
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
   /* .inputfild-wrapp {
   padding: 0px !important;
   } */
   .login-pagebtn-wrapp {
   position: relative;
   text-align: initial;
   }
   span.input-group-text {
   color: #ffff;
   border: 0;
   margin-right: 0px !important;
   height: 36px;
   background: #0f2437;
   }
   ul#pills-tab {
   display: flex !important;
   flex-wrap: nowrap !important;
   }
   a.addwish {
   display: flex;
   flex-direction: column;
   }
   .login-bg {
   background-color: #081420;
   height: 100%;
   padding: 0px !important;
   }
   .login-form-wraper {
   padding: 15px 30px 0px 30px !important;
   /* text-align: center; */
   }
   i.fa.fa-heart-o.add-to-wishlist {
   margin: -1px -3px;
   }
   ol.carousel-indicators {
   display: none;
   }
   input.postinput {
    width: 83%;
}
span.send_msgbox {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%) !important;
    padding: 7px 21px;
    /*margin-left: 14px;*/
    border-radius: 3px;
}
 .send-msg .send-message-to-feed:focus {
        outline: none;
      }
      button.model-contect-btn.send-msg {
    outline: none !important;
}

@media only screen and (max-width: 448px){

span.send_msgbox {
    padding: 7px 13px !important;
}
}
input.postinput {
    font-size: 14px;
}
</style>
<div class="Explore-bg">
   <div class="container">
      <div class="explore-heading-wrapper">
         <h1 class="explore-heading">Feed</h1>
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
               <a class="nav-link active" id="pills-view-tab" data-toggle="pill" href="#pills-view" role="tab"
                  aria-controls="pills-view" aria-selected="true">View Feed
               <small>(+{{ count($explore) }}&nbsp;Posts)</small></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="pills-Popular-tab" data-toggle="pill" href="#pills-Popular" role="tab"
                  aria-controls="pills-Popular" aria-selected="false">
               View Popular</a>
            </li>
            <img src="./image/exlpore-img.png" alt="" onclick="openfilter()"
               class="filter-modile-viewbtnimg" />
         </ul>
         <img src="./image/exlpore-img.png" alt="" class="filterbtn filter_hiden" onclick="openfilter()" />
      </div>
      <div class="explorecontent-wrapper">
         <div class="row">
            <div class="col-lg-12 col-md-12">
               <div class="explore-post-wraper">
                  <div>
                     <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-view" role="tabpanel"
                           aria-labelledby="pills-view-tab" style="color: #fff">
                           <div class="explorepost-inner-wrapper">
                              <div class="row">
                                 @if (count($explore) < 1)
                                 <div class="empty_state">
                                    <img src="image/sad_icon.png" alt="">
                                    <h3 class="text-light">No Feeds </h3>
                                    <p class="text-light">There have been no Feeds in this section</p>
                                 </div>
                                 @else
                                 <div class="column col-lg-6 col-md-6 col-sm-12">  
                                    @foreach ($explore as $number =>  $value)
                                    @if($number%2 != 0)
                                   
                                    @include('frontend.explore_feeds')
                                    @endif
                                    @endforeach
                                 </div>
                                 <div class="column col-lg-6 col-md-6 col-sm-12"> 
                                    @foreach ($explore as $number =>  $value)
                                    @if($number%2 == 0)  
                                    @include('frontend.explore_feeds')
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

   <div class="explore-posts-wraper">
      <div class="expolor-post-wraper">
         <div class="postprofile-wrapper">
            <div class="profile-img-wrapp mr-1">
               <a href="{{$pupular->user->slug ?? ''}}">
               <img src="{{ url('profile-image') . '/' . $pupular->user->profile_image ?? '' }}"
                  alt="" class="postprofile-img" />
               </a>
            </div>
            <div class="postname-wrapper">
               <a href="{{$pupular->user->slug ?? ''}}">
               <span>{{ $pupular->user->first_name }}
               {{ $pupular->user->last_name }}
               @if ($pupular->user->user_status == 'verified')
               <i class="fa fa-check-circle"></i>
               @endif
               </span>
               </a>
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
            </a>
            <div class="post-icon-wrapepr">
               <a class="addwish"><i
                  data-id="{{ $pupular->id ?? '' }}"
                  class="fa fa-heart-o add-to-wishlist" data-toggle="modal" data-target="#exampleModalCenter3"></i>
                 @if($value->number>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($value->number)}} @else 
                 {{$value->number}}
                 @endif</a>
               <div class="added">
                        <i class="fa-solid fa-ellipsis-vertical dots"></i>
                        <ul class="mydropdown-menu" style="display:none;">
                           
                        <li><a class="editPostClass" onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$value->feed_id}}')" style="cursor: pointer;">Copy Link To Post</a></li>
                            <li><a class="editPostClass">Report Post</a></li>
                        </ul>
                    </div>
            </div>
         </div>
         <div class="postimgs-wraper">
            <p>{!! $pupular->description !!}</p>
            <div class="post-img-wrapper">
               @if ($pupular->price > 0)
               <div class="unclock-overlay">
                  <div class="unlock-btn-wrapepr">
                     <i class="fa-solid fa-lock"></i>
                     <button class="unlock-btn" data-toggle="modal" data-target="#exampleModalCenter3">
                     Unlock for ${{ $pupular->price }}
                     </button>
                  </div>
                  </button>
               </div>
               @endif
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
              
               <div id="myCarousel1{{$value->feed_id}}" class="carousel slide" data-ride="carousel">
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
       <img class="expolor-img curouel-img-item"
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
   <a class="left carousel-control" href="#myCarousel1{{$value->feed_id}}" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left"></span>
       <span class="sr-only">Previous</span>
   </a>
   <a class="right carousel-control" href="#myCarousel1{{$value->feed_id}}" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right"></span>
       <span class="sr-only">Next</span>
   </a>
</div>
                
               @endif
            </div>
            <div class="input-group d-flex">
               <input type="text"
                  placeholder="Send a message for ${{ $pupular->model->cost_msg }}"
                  class="postinput" />
               <button type="button" data-toggle="modal" data-target="#exampleModalCenter3" class="model-contect-btn send-msg">
                  <span class="send_msgbox"><i class="fa fa-paper-plane" aria-hidden="true"></i></span></button>
            </div>
         </div>
         <div class="tips-add-icon-wrapper">
            <span data-toggle="modal" data-target="#exampleModalCenter3"> <i class="fa fa-plus"></i>Add</span>
            <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-phone"></i>Call</span>
            <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-video-camera"></i>Video </span>
            <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-dollar"></i> Tip</span>
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
                                
                                   <div class="explore-posts-wraper">
                                      <div class="expolor-post-wraper">
                                         <div class="postprofile-wrapper">
                                            <div class="profile-img-wrapp mr-1">
                                               <a href="{{$pupular->user->slug ?? ''}}">
                                               <img src="{{ url('profile-image') . '/' . $pupular->user->profile_image ?? '' }}"
                                                  alt="" class="postprofile-img" />
                                               </a>
                                            </div>
                                            <div class="postname-wrapper">
                                               <a href="{{$pupular->user->slug ?? ''}}">
                                               <span>{{ $pupular->user->first_name }}
                                               {{ $pupular->user->last_name }}
                                               @if ($pupular->user->user_status == 'verified')
                                               <i class="fa fa-check-circle"></i>
                                               @endif
                                               </span>
                                               </a>
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
                                            </a>
                                            <div class="post-icon-wrapepr">
                                               <a class="addwish"><i
                                                  data-id="{{ $pupular->id ?? '' }}"
                                                  class="fa fa-heart-o add-to-wishlist" data-toggle="modal" data-target="#exampleModalCenter3"></i>
                                                  @if($value->number>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($value->number)}} @else {{$value->number}} @endif</a>
                                               <i class="fa-solid fa-ellipsis-vertical dots"></i>
                                            </div>
                                         </div>
                                         <div class="postimgs-wraper">
                                            <p>{!! $pupular->description !!}</p>
                                            <div class="post-img-wrapper">
                                               @if ($pupular->price > 0)
                                               <div class="unclock-overlay">
                                                  <div class="unlock-btn-wrapepr">
                                                     <i class="fa-solid fa-lock"></i>
                                                     <button class="unlock-btn" data-toggle="modal" data-target="#exampleModalCenter3">
                                                     Unlock for ${{ $pupular->price }}
                                                     </button>
                                                  </div>
                                                  </button>
                                               </div>
                                               @endif
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
                                              
                                               <div id="myCarousel1{{$value->feed_id}}" class="carousel slide" data-ride="carousel">
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
                                       <img class="expolor-img curouel-img-item"
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
                                   <a class="left carousel-control" href="#myCarousel1{{$value->feed_id}}" data-slide="prev">
                                       <span class="glyphicon glyphicon-chevron-left"></span>
                                       <span class="sr-only">Previous</span>
                                   </a>
                                   <a class="right carousel-control" href="#myCarousel1{{$value->feed_id}}" data-slide="next">
                                       <span class="glyphicon glyphicon-chevron-right"></span>
                                       <span class="sr-only">Next</span>
                                   </a>
                                </div>
                                                
                                               @endif
                                            </div>
                                            <div class="input-group d-flex">
                                               <input type="text"
                                                  placeholder="Send a message for ${{ $pupular->model->cost_msg }}"
                                                  class="postinput" />
                                               <button type="button" data-toggle="modal" data-target="#exampleModalCenter3" class="model-contect-btn send-msg"><span class="send_msgbox"><i class="fa fa-paper-plane" aria-hidden="true"></i></span></button>
                                            </div>
                                         </div>
                                         <div class="tips-add-icon-wrapper">
                                            <span data-toggle="modal" data-target="#exampleModalCenter3"> <i class="fa fa-plus"></i>Add</span>
                                            <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-phone"></i>Call</span>
                                            <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-video-camera"></i>Video </span>
                                            <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-dollar"></i> Tip</span>
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
                        <label
                           for="checkbox-2.{{ $key }}."></label>
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
                        <label
                           for="checkbox-4.{{ $key }}."></label>
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
                        <label
                           for="checkbox-4.{{ $key }}."></label>
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
                        <label
                           for="checkbox-5.{{ $key }}."></label>
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
                        <label
                           for="checkbox-5.{{ $key }}."></label>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true" style="
            color: #ffff;
            opacity: 111111111;
            ">&times;</span>
         </button>
         <div class="modal-body">
            <!-- 
               <strong>Sign up to get the conversation going</strong><p>Or log in if you already have an account</p>
               
                    <div class="login-wrapper">
                   
                        <div class="loginfrom-wrapper11">
                            <div class="login-form-wraper1">
                               
                                <div class="logintab-wrapp">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                                aria-selected="true">
                                                Sign Up
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">
                                                Log In
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active loginform-wrapper" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <form method="POST" action="{{ route('storeuser') }}">
                                                @csrf
                                                <div class="singpform-wraper1">
                                                    <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                        <label class="input-label">Display Name</label>
                                                        <input type="text" required name="first_name" class="Displayname-input"
                                                            style="" />
                                                        <small class="text-danger">
                                                            @error('first_name')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                    <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                        <label class="input-label">Email Address</label>
                                                        <input type="email" required class="email-adrrs" name="email" />
                                                        <small class="text-danger">
                                                            @error('email')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                    <div class="inputfild-wrapp">
                                                        <label class="input-label">Password</label>
                                                        <div class="d-flex" style="width: 100%;">
               
                                                        <input type="password" required name="password"
                                                        class="lockpassword" id="signup_password"  required="true" aria-label="password" aria-describedby="basic-addon1" />
                                                        <div class="input-group-append">
                                                                <span class="input-group-text" onclick="password_show_hide_signup();">
                                                                    <i class="bi bi-eye" id="show_eye_signup"></i>
                                                                  <i class="bi bi-eye-slash d-none fa-2x" id="hide_eye_signup"></i>
                                                                </span>
                                                              </div>
                                                        <small class="text-danger">
                                                            @error('password')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="checkinput-wraper">
                                                    <input type="checkbox" required class="ckeckoutinpt" name="readbox" />
                                                    <p>
                                                        I have read and agreed to Bad Bunnies Tv.com’s
                                                        <b><a class="terms_link" href="{{ url('/terms-conditions') }}">Terms of Service</a></b>
                                                    </p>
                                                </div>
               
                                                <small class="text-danger">
                                                    @error('readbox')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                                <div class="login-pagebtn-wrapp">
                                                    <input type="submit" value="Sign up " class="singupbtn" name="fan">
                                            </form>
                                            <button value="" class="applyasmodel-btn">
                                                Apply as a model</button>
                                        </div>
               
               
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="tab-pane fade show active loginform-wrapper" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <form method="POST" action="{{ route('mainlogin') }}">
                                                @csrf
                                                <div class="singpform-wraper1">
                                                    <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                        <label class="input-label">Email Address</label>
                                                        <input type="email" required class="email-adrrs" name="log_email" />
                                                        <small class="text-danger">
                                                            @error('log_email')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                    <div class="inputfild-wrapp">
                                                        <label class="input-label">Password</label>
                                                        <div class="d-flex" style="width: 100%;">
                                                        <input type="password" id="password_sign" required class="lockpassword"
                                                            name="log_password" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" onclick="password_show_hide_log();">
                                                                    <i class="bi bi-eye" id="show_eye_log"></i>
                                                                  <i class="bi bi-eye-slash d-none fa-2x" id="hide_eye_log"></i>
                                                                </span>
                                                              </div>
                                                        <small class="text-danger">
                                                            @error('log_password')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="checkinput-wraperonlogin">
                                                    <div class="checkinput-wraper">
                                                        <input type="checkbox" class="ckeckoutinpt" />
                                                        <p>Remember Me</p>
                                                    </div>
               
               
                                                    <a href="#"> Forgot Password? </a>
                                                </div>
                                                <div class="login-pagebtn-wrapp">
                                                    <button class="singupbtn">Login</button>
                                                </div>
                                                <p class="byloginline">
                                                    By logging in you are agreeing to our
                                                    <b><a class="terms_link" href="{{ url('/terms-conditions') }}">Terms of Service</a></b> and
                                                    <b> Privacy Policy. </b>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                                       class="nav-logo" /></a></a>
                                    <p class="sinup-linewrapp mt-3">
                                       Sign up to view more posts Or log in if you already have an
                                       account
                                    </p>
                                 </div>
                                 <div class="logintab-wrapp">
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
                                                   <input type="email"  class="email-adrrs" name="log_email" required/>
                                                </div>
                                                <small class="text-danger">
                                                @error('log_email')
                                                {{ $message }}
                                                @enderror
                                                </small>
                                                <div class="inputfild-wrapp">
                                                   <label class="input-label">Password</label>
                                                   <div class="d-flex" style="width: 100%;">
                                                      <input  type="password" id="log_password"class="lockpassword" required
                                                         name="log_password" required="true" aria-label="password" aria-describedby="basic-addon1">
                                                      <div class="input-group-append">
                                                         <span class="input-group-text" onclick="password_show_hide_log_explore();">
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
                                             <p class="byloginline">
                                                By logging in you are agreeing to our
                                                <b class="text-white"><a class="terms_link" href="{{ url('/terms-conditions') }}" target="_blank">Terms of Service</a></b> and
                                                <b><a class="terms_link" href="{{ url('/terms-conditions') }}" target="_blank">Privacy Policy.</a> </b>
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
                                                      <input type="text"  value="{{ old('first_name') }}" required name="first_name"
                                                         class="Displayname-input" style="" />
                                                      <small class="text-danger">
                                                      @error('first_name')
                                                      {{ $message }}
                                                      @enderror
                                                      </small>
                                                   </div>
                                                   <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                      <label class="input-label">Email Address</label>
                                                      <input type="email"  value="{{ old('email') }}" required class="email-adrrs" name="email" />
                                                      <small class="text-danger">
                                                      @error('email')
                                                      {{ $message }}
                                                      @enderror
                                                      </small>
                                                   </div>
                                                   <div class="inputfild-wrapp">
                                                      <label class="input-label">Password</label>
                                                      <div class="d-flex" style="width: 100%;">
                                                         <input type="password" id="password"class="lockpassword" required
                                                            name="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                                                         <div class="input-group-append">
                                                            <span class="input-group-text" onclick="password_show_hide_explore();">
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
                                                         class="filter-checkbox filterbig-checkbox  ckeckoutinpt">
                                                      <label for="checkbox-2-12"></label>
                                                      <p class=" mt-3 Service_text"> I have read and agreed to Bad Bunnies Tv.com’s&nbsp;<b><a class="terms_link" href="{{ url('/terms-conditions') }}" target="_blank">Terms of Service</a></b>
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
                                                <div class="login-pagebtn-wrapp pop_log_box">
                                                   <input type="submit" value="Sign up " class="singupbtn mt-2" name="fan">
                                             </form>
                                                <a class="Applybtn_text mt-1" href="{{url('/storeuser')}}"> 
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
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
<script>
   setTimeout(function() {
   $('#alert').fadeOut('fast');
   }, 3000);
</script>
<script type="text/javascript">
   function password_show_hide_explore() {
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
   function password_show_hide_log_explore() {
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
</body>
<style type="text/css">
.terms_link{
color: #ffff !important;
}
small.error {
padding: 11px 157px;
background: #f7dada;
border-radius: 12px;
color: #000;
}
</style>
</html>
</div>
</div>
</div>
</div>
<!-- <script>
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
   </script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('scripts')
@parent
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>