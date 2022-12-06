
@extends('frontend.fan.main')
      @section('content')
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      @php
      use App\Http\Controllers\Controller;
      @endphp
      

    <style>
      .owl-carousel .owl-stage-outer {
    height: auto;
}
.filter-wrapepr {
    margin-top: 10px;
}
      .col-sm-12.col-md-9.col-xl-9 {
    padding: 55px 20px;
}
      .feed_liked {
    color: red;
}
      .addLike {
    cursor: pointer;
}
      button.owl-prev {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%) !important;
    border-radius: 25% !important;
    width: 45px !important;
    height: 45px !important;
    font-size: 18px !important;
    padding: 10px !important;
    color: #fff !important;
    outline: none !important;
}
      button.owl-prev.disabled {
    background-color: #091625 !important;
    color: #9c299b !important;
}
button.owl-next.disabled {
    background: #091625 !important;
    border: 2px solid #ff00e0 !important;
    border-radius: 7px !important;
    color: white !important;
}
button.owl-next {
    border-radius: 10px !important;
}

button.owl-prev.disabled {
    background: #091625 !important;
    border: 2px solid #ff00e0 !important;
    border-radius: 7px !important;
    color: white !important;
}
           .availablephoneslide-wrapper .owl-nav .disabled {
         background: transparent !important;
         border-radius: 50% !important;
         width: 45px !important;
         height: 45px !important;
         font-size: 18px !important;
         padding: 10px !important;
         opacity: 0.7 !important;
         border: 1px solid #ffffff !important;
         color: #fff !important;
     }
      .availablephoneslide-wrapper .owl-prev, .owl-next {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%) !important;
    border-radius: 50% !important;
    width: 45px !important;
    height: 45px !important;
    font-size: 18px !important;
    padding: 10px !important;
    color: #fff !important;
    outline: none !important;
}
      button.credit-add:hover {
    background: 0;
    color: #c7009c !important;
    border: 0.5px solid;
}
.btn.cre_btn{
  background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    border-radius: 6px;
    font-family: "Montserrat";
    font-size: 13px;
    color: #fff;
    border: none;
    outline: none;
}
.btn.cre_btn:hover {
    background: 0;
    color: #c7009c !important;
    border: 0.5px solid;
}
      .Featuredmodelnav.owl-next, .owl-prev {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%) !important;
    border-radius: 0% !important;
    width: 45px !important;
    height: 45px !important;
    font-size: 18px !important;
    padding: 10px !important;
    
}
ul.mydropdown-menu {
    display: none ;
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

.availablephoneslide-wrapper .owl-prev, .owl-next {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%) !important;
    border-radius: 0% !important;
    width: 45px !important;
    height: 45px !important;
    font-size: 18px !important;
    padding: 10px !important;
    color: #fff !important;
    outline: none !important;
}
      .calls.d-flex {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important;
    align-items: center;
}
        ol.carousel-indicators {
    display: none;
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
.fa-arrow-left:before {
    content: "\f053" !important;
}
.fa-arrow-right-long:before, .fa-long-arrow-right:before {
    content: "\f054" !important;
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
img.mgs-image {
    border-radius: 50%;
    height: 50px !important;
    width: 50px !important;
    object-fit: cover !important; 
}
        .list-group-item {
          border:0px !important;
        }
        .Explore-bg {
    background-color: unset;
    
      }
        img.model-img {
        height: 150px;
        width: 190px !important;
        }
        ol.carousel-indicators {
    display: none;
}
        .owl-dots {
        display: none;
        }
        .staff-itemwrapper {
    background: #162637;
    text-align: center;
    display: flex;
    align-items: center;
    padding: 10px;
    height: 100%;
    flex-direction: column;
    border-radius: 10px;
}
.item:hover {
    background: none !important;
}
        .owl-nav {
            position: absolute;
            text-align: 0;
            top: -70px;
            right: 0px;
        }
        /* .owl-next {
          border-radius: 50% !important;
        } */
      
        .medias {
    display: flex;
    flex-wrap: wrap;
}
.m-screen-filter{
  display: none;
}
.filter-wrapepr-1 {
    width: 100% !important;
    padding: 20px;
    background: #0C1D2D;
}
 @media only screen and (max-width:992px) {
.filter-wrapepr {
    display: block;
}}

@media only screen and (max-width:767px) {
.filter-wrapepr {
    display: none !important;
}
.m-screen-filter{
  display: block !important;
}
} 
@media only screen and (max-width: 450px) {
img.model-img {
    height: 205px;
    width: 175px !important;
}
}
@media only screen and (max-width: 350px){
  img.model-img {
    height: 254px;
    width: 254px !important;
}
}

.Explore-bg {
    padding: 38px 0px !important;
}
.model_car_img{
  border-radius: 12px;
}

/*new added*/
.owl-carousel .owl-item img {
    display: block;
    width: 100% !important;
}
.time_text{
      font-size: 12px;
}
      </style>

      <div class="col-sm-12 col-md-9 col-xl-9 ">
        <div class="sidebar-wrapper1" >
      
          <div class="row" style="font-size:14px">
            <div class="col-sm-12 col-md-12 col-lg-6 ">
              
              <div class="card">
                <div class="card-body" style="background-color: #0c1d2d; height: 220px;border-radius: 8px;padding: 25px 20px;">
                  <div class="d-flex pt-2 pb-4">
                    <div class="onile-icon mt-1 ml-1"></div>
                    <div class="online-models text-white pl-3">
                      Online Models
                    </div>
                  </div>
                  <div class="d-flex pt-4 justify-content-between">
                    <div class="pl-2">
                      <div class="details ml-4" style="background-color:#182837;">
                        <p class="text m-0 text-center" style="color:#50c3cf;">{{count($count_video_call_model)}}</p>
                      </div>
                    </div>
                    <div class="">
                      <div class="details " style="background-color:#182837;">
                        <p class="text m-0 text-center" style="color:#ed4b4b;">{{count($count_phone_call_model)}}</p>
                      </div>
                    </div>
                    <div class="">
                      <div class="details mr-4" style="background-color:#182837;">
                        <p class="text m-0 text-center" style="color:#dcb223;">{{count($online_chat)}}</p>
                      </div>
                    </div>
                  </div>
                  <div class=" mt-4  d-flex justify-content-between medias ">
                    <div class="mb-2 mt-3">
                      <div class="calls d-flex ">
                        <div class="call-icon pl-2 pr-1">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                            d="M17 9.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4.2zM5 8v2h2V8H5z"
                            fill="rgba(88,217,228,1)" />
                          </svg>
                        </div>
                        <div class="title-calls text-white" >
                          <p class="m-0"> Video&nbsp;Call</p>
                        </div>
                      </div>
                    </div>

                    <div class="mb-2 mt-3">
                      <div class="calls d-flex">
                        <div class="call-icon  pr-1">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                            d="M21 16.42v3.536a1 1 0 0 1-.93.998c-.437.03-.794.046-1.07.046-8.837 0-16-7.163-16-16 0-.276.015-.633.046-1.07A1 1 0 0 1 4.044 3H7.58a.5.5 0 0 1 .498.45c.023.23.044.413.064.552A13.901 13.901 0 0 0 9.35 8.003c.095.2.033.439-.147.567l-2.158 1.542a13.047 13.047 0 0 0 6.844 6.844l1.54-2.154a.462.462 0 0 1 .573-.149 13.901 13.901 0 0 0 4 1.205c.139.02.322.042.55.064a.5.5 0 0 1 .449.498z"
                            fill="rgba(252,58,58,1)" />
                          </svg>
                        </div>
                        <div class="title-calls text-white" >
                          <p class="m-0"> Voice&nbsp;Call</p>
                        </div>
                      </div>
                    </div>

                    <div class="mb-2 mt-3">
                      <div class="calls d-flex">
                        <div class="call-icon pr-1">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                            d="M7.291 20.824L2 22l1.176-5.291A9.956 9.956 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.956 9.956 0 0 1-4.709-1.176z"
                            fill="rgba(250,197,47,1)" />
                          </svg>
                        </div>
                        <div class="title-calls text-white" >
                          <p class="m-0"> Online&nbsp;Chat</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 ">
<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="card-body text-white ">
      <div class="card-body" style="background-color: #0c1d2d;     ">
        <div class="d-flex justify-content-between account_cards">
          <div class="">
            <div class="bank-icon" style="background-color:#182837;">
              <div class="bank-icon2  text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                  d="M2 20h20v2H2v-2zm2-8h2v7H4v-7zm5 0h2v7H9v-7zm4 0h2v7h-2v-7zm5 0h2v7h-2v-7zM2 7l10-5 10 5v4H2V7zm2 1.236V9h16v-.764l-8-4-8 4zM12 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                  fill="rgba(199,60,169,1)" />
                </svg>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-between pl-2">
            <div class="bank-balance pr-4" style="color:#A9AEB4;">
              <p class="m-0">Account&nbsp;Balance</p>
              <p class="m-0">{{Auth::user()->wallet}} Cr</p>
            </div>
            <button class="btn cre_btn "  ><a href="{{('payment')}}">
           <i class="bi mr-1 bi-plus-circle-fill"></i>Add Credits
            </a></button>
          </div>
          <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="add-credit-form">
                <div class="modal-header">
                  <h5 class="modal-title text-black" id="exampleModalLongTitle">Add Credit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{url('/add-credit')}}">
                    @csrf
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleFormControlSelect1">SELECT PACKAGE</label>
                        <select class="form-control" id="PACKAGE" name="PACKAGE">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                      <div class="col-6">
                        <label for="exampleFormControlSelect1">TYPE</label>
                        <div class="packag-details">
                          <input type="text" class="form-control" value="" disabled>
                        </div>
                      </div>
                      <div class="col-6 mt-1">
                        <label for="exampleFormControlSelect1">AMOUNT</label>
                        <div class="packag-details">
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-6 mt-1">
                        <label for="exampleFormControlSelect1">CREDITt</label>
                        <div class="packag-details">
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Credit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="card mt-1">
      <div class="card-body text-white" style="background-color: #0c1d2d; ">
        <div class="mgs-content ">
          <div class=" text-white">
            <div class="d-flex justify-content-between">
              <div class="">
                <p class="m-0">Messages</p>
              </div>
              <div class="">
                <div class="mgs-left-icon pl-3 pr-1">
                  <i class="bi bi-chat-text-fill"></i>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <div class="row ">
                <div class=" col-3 user-image ">
                  <img src="../image/2.png" class="mgs-image img-fluid">
                </div>
                <div class=" col-7 real-mgs pl-3 pr-2">
                  <small>TheTeenageWitch</small>
                  <small class="text-muted">You added Lynette Monroe as a contact!
                  </small>
                </div>
             
              <div class=" col-2 text-center" style="padding:0px">
                <small class="mr-2 text-center time_text">8:30AM</small>
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
      <div class="Online-now-models mt-3">
  <div class="row mt-4 mb-4">
    <div class="col-6 text-white">
      <h5>Online&nbsp;<b>Now</b></h5>
    </div>
    <div class="col-6">

    </div>

  </div>


  <div class="row">


      <div class="col-md-12">
          <div class="owl-carousel owl-theme" id="staff">
              
              @foreach ($online as $item)
              <div class="item">
                  <a href="{{url('/',[$item->slug])}}">
                      <div class="box-b staff-itemwrapper">
                         <!--  <div class="box-img"> -->
                            @php
                                  $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_250x300'))?Controller::modelImage($item->profile_image,'_250x300') : $item->profile_image;

                                  @endphp 
                              <img class="model-img model_car_img"
                                  src="{{ url('profile-image') . '/' . $image }}"
                                  alt="Model-Image">
                             
                          <!-- </div> -->
                          <h3 class="mt-2">{{ $item->first_name }}</h3>
                        
                      </div>
                  </a>
              </div>
              @endforeach
             
          </div>
      </div>


  </div>

</div>
<div class="Feeds">
  <div class="Explore-bg">
    <div class="">
      <div class="explore-heading-wrappe">
       
      <div class="col-6 text-white">
      <h5>&nbsp;<b>Feeds</b></h5>
    </div>
        <!-- <img src="../image/exlpore-img.png" alt="" class="filter-openimg" />
        <img
          src="../image/exlpore-img.png"
          alt=""
          onclick="openfilter()"
          class="filterbtnimg"
        /> -->
      </div>
      <div class="">
      <div class="row">
      <div class="col-lg-4 col-md-4  mt-5  m-screen-filter">
             <div class="filter-wrapepr-1" style="width:100% !important;">
             <form id="serch" method="get" action="http://adultx.eoxyslive.com/fan/dashboard">
              <div class="d-flex">
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
                       </div>
        </form></div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12" id="results">
          <div class="explore-post-wraper" style="width:100% !important;">
          <div>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab"
                style="color: #fff">
                <div class="explorepost-inner-wrapper">

                  <div class="row">
                    @if (count($explore) < 1)
                  
                        <div class="empty_state">
                            <img src="{{url('image/sad_icon.png')}}" alt="">
                            <h3 class="text-light">No Feeds </h3>
                            <p class="text-light">There have been no Feeds in this section
                               </p>

                        </div>
                     
                    @else
                   
                    <div class="column  col-lg-12 col-md-12 col-sm-12 " id="results">  
                      @if(count($explore)>0)
                    @foreach ($explore as $number =>  $value)
                
                        @if($number%2 != 0)  
                       
                        @include('frontend.fan.explore_feeds')
                        
                        @endif
                    @endforeach
                    @endif
                    </div>
                     <div class="ajax-loading"><img src="{{ asset('images/loading.gif') }}" /></div>
                    <div class="column col-lg-12 col-md-12 col-sm-12"> 
                    @if(count($explore)>0)
                    @foreach ($explore as $number =>  $value)
                        @if($number%2 == 0)  
                             
                            @include('frontend.fan.explore_feeds')
                            
                        @endif
                    @endforeach
                    @endif
                    </div>
                    @endif
                </div>

                </div>
              </div>
            
            </div>
          </div>
        </div>
        </div>
        <div class="col-lg-4 col-md-4  mt-5 ">
             <div class="filter-wrapepr" style="width:100% !important;">
             <form id="serch" method="get" action="{{ url('fan/dashboard') }}">
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
        </div>
        </div>
</form>
      </div>
      </div>

      <div id="Filter-wrapp" class="filtersidenav">
        <div class="filterside-wrapepr">
          <a href="javascript:void(0)" class="closebtn" onclick="closefilter()">&times;</a>
          <div class="gender-filter-wrapper">
            <span> Gender </span>
            <label> <input type="checkbox" class="mr-1" /> Female </label>
            <label> <input type="checkbox" class="mr-1" /> Male </label>
            <label><input type="checkbox" class="mr-1" /> Transgender </label>
          </div>
          <div class="gender-filter-wrapper">
            <span> Post Type </span>
            <label> <input type="radio" class="mr-1" /> All Types </label>
            <label> <input type="radio" class="mr-1" /> Pictures Only </label>
            <label><input type="radio" class="mr-1" /> Videos Only </label>
            <label><input type="radio" class="mr-1" /> Audio Only </label>
          </div>
          <div class="gender-filter-wrapper">
            <span> Pricing </span>
            <label> <input type="radio" class="mr-1" /> All Prices </label>
            <label> <input type="radio" class="mr-1" /> Free </label>
            <label><input type="radio" class="mr-1" /> Premium </label>
          </div>
          <div class="gender-filter-wrapper">
            <span> Ethnicity </span>
            <label> <input type="checkbox" class="mr-1" /> Asian </label>
            <label> <input type="checkbox" class="mr-1" /> Indian </label>
            <label><input type="checkbox" class="mr-1" /> Middle Eastern
            </label>
            <label><input type="checkbox" class="mr-1" /> Native Americans
            </label>
            <label><input type="checkbox" class="mr-1" /> Other </label>
          </div>

          <div class="language-filter-wrapper">
            <span> Language </span>
            <div class="language-filter-wrapp">
              <div class="gender-filter-wrapper">
                <label>
                  <input type="checkbox" class="mr-1" /> English
                </label>
                <label> <input type="checkbox" class="mr-1" /> French </label>
                <label><input type="checkbox" class="mr-1" /> Italian </label>
              </div>

              <div class="gender-filter-wrapper">
                <label>
                  <input type="checkbox" class="mr-1" /> Spanish
                </label>
                <label> <input type="checkbox" class="mr-1" /> German </label>
                <label><input type="checkbox" class="mr-1" /> Russian </label>
              </div>
            </div>
          </div>
          <div class="language-filter-wrapper">
            <span> Hair </span>
            <div class="language-filter-wrapp">
              <div class="gender-filter-wrapper">
                <label> <input type="checkbox" class="mr-1" /> Black </label>
                <label>
                  <input type="checkbox" class="mr-1" /> Brunette
                </label>
                <label><input type="checkbox" class="mr-1" /> Other</label>
              </div>

              <div class="gender-filter-wrapper">
                <label> <input type="checkbox" class="mr-1" /> Blonde </label>
                <label>
                  <input type="checkbox" class="mr-1" /> Redhead
                </label>
                <!-- <label><input type="checkbox" class="mr-1" /> Russian </label> -->
              </div>
            </div>
          </div>
          <div class="language-filter-wrapper">
            <span> Fetishes </span>
            <div class="language-filter-wrapp">
              <div class="gender-filter-wrapper" style="border: none">
                <label>
                  <input type="checkbox" class="mr-1" /> Amateur
                </label>
                <label>
                  <input type="checkbox" class="mr-1" /> Cuckold
                </label>
                <label><input type="checkbox" class="mr-1" /> Other </label>
              </div>

              <div class="gender-filter-wrapper" style="border: none">
                <label> <input type="checkbox" class="mr-1" /> BBC </label>
                <label> <input type="checkbox" class="mr-1" /> Hairy </label>
                <!-- <label><input type="checkbox" class="mr-1" /> Russian </label> -->
              </div>
            </div>
          </div>
          <div class="aplly-btn-wraper">
            <button class="filter-applybtn">Apply</button>
            <a href="#">Clear</a>
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
<style type="text/css">
  .d-flex.justify-content-between.account_cards {
    display: flex;
    flex-wrap: wrap;
  }

  button#navbtns {
    color: #fff;
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    border: 0;
  }

  .mt-2.d-flex.justify-content-between {
    display: flex;
    align-content: flex-start;
    flex-wrap: wrap;
  }

  .card img {
    margin: 0;
  }
  .col-6.text-white h5{
    font-size:24px;
  }
  img.mgs-image {
    border-radius: 50%;
    height: 47.5px !important;
    width: 50px !important;
    object-fit: contain;
}

  i.bi.bi-chat-text-fill {
    color: #008dc3;
  }

  .details {
    padding: 14px;
  }

  img.model_img {
    min-height: 204px;
  }

  @media only screen and (max-width: 991px) {
    img.model_img {
      min-height: 204px;
    }

    @media only screen and (min-width: 767px) {
      img.model_img {
        min-height: auto;
        height: auto;

      }
    }

    .mgs-left-icon.pl-3.pr-1 {
      color: #329eeb;
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
      justify-content: space-between;
      padding: 1rem;
      border-bottom: 1px solid #e9ecef;
      border-top-left-radius: 0.3rem;
      border-top-right-radius: 0.3rem;
      color: #000;
    }
  }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
      $(document).ready(function(){
    $('.filter').on('click', function() {
        $( "#serch" ).submit();
    });



   var SITEURL = "{{ url('/dashboard') }}";
   var page = 1; //track user scroll as page number, right now page number is 1
   load_more(page); //initial content load
   $(window).scroll(function() { //detect page scroll
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
         //if user scrolled from top to bottom of the page
      
      page++; //page number increment
      load_more(page); //load content   
      }
    });     
    function load_more(page){
        $.ajax({
           url: SITEURL + "posts?page=" + page,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
              $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
            console.log(data.length);
            //notify user if nothing to load
            $('.ajax-loading').html("No more records!");
            return;
          }
          $('.ajax-loading').hide(); //hide loading animation once data is received
          // $("#results").append(data); //append data into #results element    
          // location.reload();       
           console.log('data.length');
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    }
  });
</script>

  @endsection
  @section('scripts')
  @parent
  @endsection