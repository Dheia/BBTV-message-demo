@extends('frontend.main')
@section('content')
@php
use App\Http\Controllers\Controller;
@endphp
<style>
.checkline {
    display: flex;
    align-items: center;
    margin-bottom: 0px !important;
}
</style>
@php
$home_slider = json_decode($homepage['home_slider']);
$home_category = json_decode($homepage['home_page_category']);
@endphp

                            <div id="pageMessages">

</div>

<div id="carouselExampleIndicators" class="carousel slide vertical slide-wrapper" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($home_slider as $k => $slider)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="@if($k == 0) active @endif"> <span class="slidenumber home_page_slider_indicators" >
                @if($k < 10) 0{{$k}} @else {{$k}} @endif </span>
        </li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($home_slider as $k => $slider)
        <div class="carousel-item @if($k == 0) active @endif">
       
        <div class="first-slide-wrapper"
            style=" background-image: url('{{ url('/images/Home-page-images/'.$slider->slider_image)  }}');">
            <div class="container">
                <div class="firstslide-textwrapp" carousel-caption>
                    <h1 class="first-slideheading">
                        {{$slider->slider_title}}
                        <span> {{$slider->slider_sub_title}}</span>
                    </h1>
                    <p class="first-slidepara">
                        {!! $slider->slider_desc !!}
                    </p>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev up" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="fas fa-chevron-up fa-2x" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next down" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="fas fa-chevron-down fa-2x" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- websbar-wraepper start -->
<div class="onlinebg-wrapper">
    <div class="container">
        <div class="websbar-wraepper">
            <div class="maincat_wrap">
                @foreach($home_category as $category)
                <div class="onecat">
                    <div class="icon-wrapper">
                        <div class="cat_img"> <img
                                src="{{ url('/images/Home-page-images/') . '/' . $category->category_icon }}" alt=""
                                class="icon-wrap" /></div>

                        <span>{{$category->category_title}}</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="websbar-wraepper-m" >
            <div class="row">
                @foreach($home_category as $category)
                <div class="col-4">
                    <div class="icon-wrapper">
                        <div class="cat_img"> <img
                                src="{{ url('/images/Home-page-images/') . '/' . $category->category_icon }}" alt=""
                                class="icon-wrap" /></div>

                        <span>{{$category->category_title}}</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
       
        @if(count($online) >= 0)
        <!-- OnlineNow-wrappers start -->

        <div class="OnlineNow-wrappers">
            <div class="online-hading-wrapp">
                <h2>Online <span> Now</span></h2>
                @if(count($online) >= 4)
                <a href="{{url('/online-now')}}">View all</a>
                @endif
            </div>

            <div class="row">

                @foreach ($online as $item)
                @php
                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x300'))?Controller::modelImage($item->profile_image,'_300x300') : $item->profile_image;
           
                @endphp  
 
                <div class="col-sm-6 col-lg-3 col-md-3 col-6 mt-3">
                    <a href="{{$item->slug}}">
                        <div class="first-col-wrapper">

                            <img class="model-img" src="{{ url('profile-image') . '/' . $image }}"
                                alt="Model-Image">

                            <div class="col-img-overlay"></div>
                            <div class="col-overlay"></div>
                            @php
                            $data=\Carbon\Carbon::parse($item->created_at)->format('M d, Y');

                            @endphp

                            @if($data < $getdate)
                            @php
                            $data=\Carbon\Carbon::parse($item->created_at)->format('M d, Y');

                            @endphp

                            @if($data > $getdate)
                            <label class="new-label">New</label>
                            @else
                            @endif
                            @else
                            @endif
                            <div class="colname-wrapper">
                                <label class="colname">{{ $item->first_name }}</label>
                                <span class="colcost">${{ $item->cost_msg }} per message</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- OnlineNow-wrappers close -->

        @endif
        <!-- new model start -->
        <div class="OnlineNow-wrappers">
            <div class="online-hading-wrapp">
                <h2>New <span>Models</span></h2>
                @if(count($new) >= 4)
                <a href="{{url('/new-models')}}">View all</a>
                @endif
            </div>
            <div class="row">

                @foreach ($new as $item)
                <div class="col-sm-6 col-lg-3 col-md-3 col-6 mt-3">
                    <a href="{{$item->slug}}">
                        <div class="first-col-wrapper">
                        @php
                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x300'))?Controller::modelImage($item->profile_image,'_300x300') : $item->profile_image;
              
                @endphp 
                            <img class="model-img" src="{{ url('profile-image') . '/' . $image }}"
                                alt="Model-Image">
                            @php
                            $data=\Carbon\Carbon::parse($item->created_at)->format('M d, Y');

                            @endphp

                           
                            <label class="new-label">New</label>
                          
                            <div class="col-overlay">
                                <div class="colname-wrapper">
                                    <label class="colname">{{ $item->first_name }}</label>
                                    <span class="colcost">${{ $item->cost_msg }} per message</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>

        <!-- new model close -->
    </div>
</div>
<!-- websbar-wraepper end -->

<!-- Available For Phone start -->
<div class="available-bg-wrapp"
    style="background-image: url('{{ url('/images/Home-page-images/'.$homepage['phone_sex_banner'])  }}');">
    <div class="available-bgoverlay"></div>
    <div class="container">
        <div class="availebaleforphone-wrapep">
            <h2 class="availableForHading">
                Available For <span>Phone Sex</span>
            </h2>
            <section class="sec sec-2 availablephoneslide-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="staff">

                            @foreach ($phone as $item)
                            <div class="item">
                                <a href="{{$item->slug}}">
                                    <div class="box-b staff-itemwrapper">
                                        <div class="box-img">
                                        @php
                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_250x300'))?Controller::modelImage($item->profile_image,'_250x300') : $item->profile_image;
              
                @endphp 
                                            <img class="model-img"
                                                src="{{ url('profile-image') . '/' . $image }}"
                                                alt="Model-Image">
                                            <span class="callsing">
                                                <i class="fa fa-phone" aria-hidden="true"></i></span>
                                        </div>
                                        <h3>{{ $item->first_name }}</h3>
                                        <p>Call for ${{ $item->cost_audiocall }} per minute</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- Available For Phone end -->

<!-- Available for Call wrapper start -->
<div class="availebalforcall-wrapperbg">
    <div class="container">
        <!-- Availebal call wrpp  start-->
        <div class="OnlineNow-wrappers">
            <div class="online-hading-wrapp">
                <h2>Available For <span>Video Calls</span></h2>
                @if(count($video) >= 4)
                <a href="{{url('/video-calls')}}">View all</a>
                @endif

            </div>
            <div class="row">
                @foreach ($video as $item)
                <div class="col-sm-6 col-lg-3 col-md-3 col-6 mt-3">
                    <a href="{{$item->slug}}">
                        <div class="first-col-wrapper">
  @php
                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x300'))?Controller::modelImage($item->profile_image,'_300x300') : $item->profile_image;
              
                @endphp 
                            <img class="model-img" src="{{ url('profile-image') . '/' . $image }}"
                                alt="Model-Image">
                            @php
                            $data=\Carbon\Carbon::parse($item->created_at)->format('M d, Y');

                            @endphp

                            @if($data > $getdate)
                            <label class="new-label">New</label>
                            @else
                            @endif
                            <img src="./image/videobtn.png" alt="#" class="videobtnicon" />
                            <div class="col-overlay">
                                <div class="colname-wrapper">
                                    <label class="colname">{{ $item->first_name }}</label>
                                    <span class="colcost">${{ $item->cost_audiocall }} per Video Call</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Availebal call wrpp end -->

        <!-- Featured model  start-->
        <div class="feayuredmodel-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div id="sync1" class="owl-carousel owl-theme">

                        @php
                        $i = 1;
                        @endphp
                        @foreach ($featured as $item)

                        <div class="item">
                            <a href="{{$item->slug}}">
                                <div class="team-member">
                                    <div class="team-img teamimg-wrapp">
                                    @php
                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_250x300'))?Controller::modelImage($item->profile_image,'_250x300') : $item->profile_image;
              
                @endphp 
                                        <img src="{{ url('profile-image') . '/' . $image }}"
                                            alt="team member" class="img-responsive">

                                        <span class="img-number">{{ $i++ }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="team-title">
                                <h5>{{ $item->first_name }}</h5>
                                <p>
                                    {{ $item->discription }}
                                </p>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">

                    <div class="slideitem-wrapper">
                        <div>
                            <h5 class="fetuedmodal-heading">
                                Featured <span>Models</span>
                            </h5>
                        </div>
                       
                        <div id="sync2" class="owl-carousel owl-theme Featuredmodelnav  ">
                       
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($featured as $item)
                           
                            <a href="{{$item->slug}}">
                            @php
                                    $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x300'))?Controller::modelImage($item->profile_image,'_300x300') : $item->profile_image;
                                
                                    @endphp 
                                <div class="item slideimg-wrapp">
                                    <img style="object-fit: cover;" src="{{ url('profile-image') . '/' . $image }}" alt="#"
                                        class="img-responsive" />
                                    <span class="smallimg-number">{{ $i++ }}</span>
                                    <h4 class="imgmodel-name">{{ $item->first_name }}</h4>
                                </div>
                            </a>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Featured model  end-->
    </div>
</div>
<!-- Trending Models for Call wrapper  end-->

<!-- Trending Models for Call wrapper  end-->
@if(count($trending)>0)
<div class="trendingmodel-bg"
    style="background-image: url('{{ url('/images/Home-page-images/'.$homepage['trending_models_banner'])  }}');">
    <div class="container">
        <div class="tarnding-modelhading-wrapper">

            <div class="trending-modelhadin-wrapp">
                <h2>Top <span> Models </span></h2>
                @if(count($trending) >= 4)
                <a href="{{url('/top-models')}}">View all</a>
                @endif
            </div>
            <div class="trndingmodels-wrapper">
                @foreach ($trending as $item)
                @php
                $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_250x300'))?Controller::modelImage($item->profile_image,'_250x300') : $item->profile_image;
                @endphp 
                <a href="{{$item->slug}}">
                    <div class="tranding-model-wrapp">
                        <div class="Tranding-model-img-wrapper">
                            <img style="object-fit:cover;"  src="{{ url('profile-image') . '/' . $image }}" alt="#" />
                            <div class="Trandingmodelcol-overlay">
                                <div class="Trandingcolname-wrapper">
                                    <label class="colname">{{ $item->first_name }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
        <!-- Availebal call wrpp end -->
    </div>
</div>

@endif
<!-- Trending Models for Call wrapper  end-->
<!-- Explore img for  wrapper  start-->
<div class="explore-bg-wrapper">
    <div class="container">
        <div class="OnlineNow-wrappers">
            <div class="online-hading-wrapp">
                <h2><span> Explore </span></h2>
                @if(count($explore) >= 4)
                <a href="{{url('/explore')}}">View all</a>
                @endif
            </div>

            <div class="main">
                <div class="container">
                    <div class="card_wrapper">
                      
                        @foreach ($explore as $item)
                        @php
                        $pupular = App\Models\ModelFeed::where('id', $item->feed_id)->first();
                        @endphp                   
                        @if($item->media_type=='png' OR $item->media_type=='jpg'OR
                        $item->media_type=='jpeg'OR $item->media_type=='gif')
                     
                        <div class="card explore_imgs">
                        <a href="{{$pupular->user->slug ?? ''}}">
                            <img src="{{ url('images/Feed_media') . '/' . $item->medai }}" alt="" />
</a>
                        </div>
                      
                        @endif
                        @if($item->media_type=='mp4')
                        <div class="card">
                     
                           <video controls class="feed_video">
                                <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                    type="video/mp4">
                                <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                    type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                       
                         
                       
                        @endif

                 

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Availebal call wrpp end -->
</div>
<!-- Explore img for  wrapper  end-->

<!-- Adult-works start -->

<div class="Adult-works-bg" id="log_free">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="adultx-wrapper">
                    <h2 class="howAdult-wraper1">How Bad Bunnies TV Works</h2>
                <div id="atlanticlight">
                <video controls>
                <source src="{{ url('images/Home-page-images') . '/' . $join_form_video->value }}">
                <source src="{{ url('images/Home-page-images') . '/' . $join_form_video->value }}">
                </video>
                <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" id="playpause" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Play</title>
                <polygon points="12,0 25,11.5 25,39 12,50" id="leftbar" />
                <polygon points="25,11.5 39.7,24.5 41.5,26 39.7,27.4 25,39" id="rightbar" />
                <animate to="7,3 19,3 19,47 7,47" id="lefttopause" xlink:href="#leftbar" attributeName="points" dur=".3s" begin="indefinite" fill="freeze" />
                <animate to="12,0 25,11.5 25,39 12,50" id="lefttoplay" xlink:href="#leftbar" attributeName="points" dur=".3s" begin="indefinite" fill="freeze" />
                <animate to="31,3 43,3 43,26 43,47 31,47" id="righttopause" xlink:href="#rightbar" attributeName="points" dur=".3s" begin="indefinite" fill="freeze" />
                <animate to="25,11.5 39.7,24.5 41.5,26 39.7,27.4 25,39" id="righttoplay" xlink:href="#rightbar" attributeName="points" dur=".3s" begin="indefinite" fill="freeze" />
                </svg>
                </button>
                </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="adultx-wrapper">
                    <h2 class="howAdult-wraper">Join Bad Bunnies TV For FREE</h2>
                    <div class="adult-form-wrpper">
                        <div class="account-created mb-4">
                        <div class="alert alert-success alert-dismissible  fade show" role="alert" style="display:none;">
                    <strong>Congratulations!</strong>Your account has been successfully created.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        </div>
                    <div id="formSection" class="form-wrapper">
                    @error('first_name')
                            <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something miss or wrong In form
                                <button  wire:click="$set('successMessage', null)" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <script>
                                var elmnt = document.getElementById("formSection");
                                elmnt.scrollIntoView(100);
                            </script>
                        @enderror
                        </div>
                        <form  action="#">
                            @csrf
                            <div class="username-wrapper">
                                <label> Username </label>
                                <input placeholder="Choose a Username" name="first_name" class="first_name_signup" type="text" />
                                <small class="text-danger first_name_signup_error">
                                  
                                </small>
                            </div>
                            <div class="username-wrapper">
                                <label> Email </label>
                                <input placeholder="Enter your Email" name="email" class="email_signup" type="email" />
                                <small class="text-danger email_signup_error">
                                   
                                </small>
                            </div>
                            <div class="username-wrapper">
                                <label> Password </label>
                                <input placeholder="Enter your Password" name="password" class="password_signup" type="password" />
                                <small class="text-danger password_signup_error">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="checkline">
                                <!-- <input type="checkbox" class="checkbox-input" name="readbox" />
                                <div class="demo2">
                                <input type="checkbox" id="checkbox-2-12" name="readbox" value="1"
                                                    class="filter-checkbox filterbig-checkbox filter ckeckoutinpt agreement">
                                                <label for="checkbox-2-12"></label>

                                
                                </div>
                                <p> I have read and agreed to Bad Bunnies Tv.com’s <b><a href="{{url('/terms-conditions')}}"></a> Terms of Service</b></p>
                          
                            </div> -->
                            
                            <div class="ckeckfilter checkinput-wraper">
                                                <div class="form-check d-flex p-0">
                                                <input type="checkbox" id="checkbox-2-12" name="readbox" value="1"
                                                    class="filter-checkbox filterbig-checkbox filter ckeckoutinpt agreement">
                                                <label for="checkbox-2-12"></label>
                                                <p class="  Service_text mb-0"> I have read and agreed to Bad Bunnies Tv.com’s <b><a class="terms_link" href="{{ url('/terms-conditions') }}" target="_blank">Terms of Service</a></b>
                                                </p>
                                                
                                                </div>
                                                  
                                                  
                                            </div>
                                            </div>
                            <span class="check_boxr text-danger"></span>
                   <br>
                            <button class="login-btn home-page-signup">Sign up for free</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var atlanticlight = document.querySelector("#atlanticlight video"),
playpause = document.getElementById("playpause"),
lefttoplay = document.getElementById("lefttoplay"),
righttoplay = document.getElementById("righttoplay"),
lefttopause = document.getElementById("lefttopause"),
righttopause = document.getElementById("righttopause");
atlanticlight.removeAttribute("controls");
playpause.style.display = "block";
playpause.addEventListener('click',function(){
	if (atlanticlight.paused) {
		atlanticlight.play();
		playpause.classList.add("playing");
		lefttopause.beginElement();
		righttopause.beginElement();
		
	} else { 
		atlanticlight.pause();
		lefttoplay.beginElement();
		righttoplay.beginElement();
		playpause.classList.remove("playing");
	}
	
},false);
var galleryvideo = document.querySelector("#galleryvideo video"),
playpause = document.getElementById("playpause"),
lefttoplay = document.getElementById("lefttoplay"),
righttoplay = document.getElementById("righttoplay"),
lefttopause = document.getElementById("lefttopause"),
righttopause = document.getElementById("righttopause");
galleryvideo.removeAttribute("controls");
playpause.style.display = "block";
playpause.addEventListener('click',function(){
	if (galleryvideo.paused) {
		galleryvideo.play();
		playpause.classList.add("playing");
		lefttopause.beginElement();
		righttopause.beginElement();
		
	} else { 
		galleryvideo.pause();
		lefttoplay.beginElement();
		righttoplay.beginElement();
		playpause.classList.remove("playing");
	}
	
},false);
</script>
@endsection
@section('scripts')

@parent
@endsection