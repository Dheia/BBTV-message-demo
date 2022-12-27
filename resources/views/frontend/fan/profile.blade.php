@extends('frontend.fan.main') 
@section('content')
<div class="col-sm-12 col-md-8 col-lg-9    col-xl-9">
   @php use App\Http\Controllers\Controller; @endphp
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- Optional theme -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="http://adultx.eoxyslive.com/js/slidediv.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
   <script>
      $(document).ready(function() {
         //Copy post popup 
         // new Splide(".first-slider",{
         //    start:5
         // }).mount();
        
         $(document).on('click','.copy_pop_close_btn1', function() {
            $('#copy_post_model_fan').modal('hide');
         });
      });
      
      $(window).on('load', function() {
         $('#copy_post_model_fan').modal('show');
      }); 

      
      var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 3; //globaly define number of elements per page
        var syncedSecondary = true;
        sync1
            .owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
            })
            .on("changed.owl.carousel", syncPosition);
        sync2
            .on("initialized.owl.carousel", function() {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                // items: slidesPerPage,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa-solid fa-arrow-left"></i>',
                    '<i class="fa-solid fa-arrow-right-long"></i>',
                ],
                smartSpeed: 200,
                slideSpeed: 500,
                // slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100,
                responsiveClass: true,
                responsive: {
                    320: {
                        items: 2,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false
                  }
               }
            })
            .on("changed.owl.carousel", syncPosition2);

   </script>
   <style>
      button.model-contect-btn.send-msg.send-message-to-feed {
         height: 40px !important;
      }
         i.bi.bi-heart.fa-2x.model_in_icon {
      FONT-SIZE: 16PX;
      }
      .footer_row.foot_line {
         font-size: 13px;
      }
      i.fa.fa-times.copy_pop_close_btn1 {
      float: right;
      }
      .copy_pop_close{
      color: white !important;
      font-size: 26px !important;
      margin-top: 10px;
      /* left: 17px; */
      padding-left: !important;
      padding-right: 10px !important;
      }
      .login-btn {
      background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
      padding: 16px 15px !important; }
      .modellink-wrrap {
      display: unset; */
      align-items: unset;
      margin-right: 0px !important;
      }
      .media img {
      width: 100% !important;
      height: 180px !important;
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
      /*      .tipoption {
            cursor: pointer;
            border: 1px solid;
            height: 50PX;
            width: 55PX;
            text-align: center;
            border-radius: 21px;*/
            /* padding: 9px 4px; */
            /*padding-top: 9px;
            margin-top: 6px;
            margin-right: 16px;
            }*/
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
      @media (max-width: 1213px) {
      .modellink-wrrap a {
      font-weight: 400;
      font-size: 14px !important;
      line-height: 30px;
      text-decoration-line: underline;
      color: #ffffff;
      }
      }
      @media (max-width: 577px) {
      .viewmore-ovrelays {width: 94% !important;}
      }
      img.overlay_img {
      height: 7.3rem;
      }
      .col-sm-3 a:hover {
      border: unset;
      border-radius: unset;
      background: unset;
      }
      .online-imgs-wrapper img:hover {
      transform: unset;
      }
      .col-sm-3 a {
      border: unset;
      border-radius:unset;
      transition: unset;
      }
      button.add-contact:hover {
      border: 1px solid #a42997 !important;
      color: #c7009c !important;
      background: 0 !important;
      }
      .col-sm-12.col-md-9.col-xl-9 {
      padding: 0px !important;
      }
      .model-contect-btnwrapper {
      display: unset !important;
      justify-content: space-between;
      margin: 20px 0px;
      }
      .add-contact {
      background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
      width: 100% ;
      height: 55px;
      border-radius: 6px;
      font-family: "Montserrat";
      font-weight: 700;
      font-size: 12px;
      line-height: 17px;
      text-transform: uppercase;
      color: #fff !important;
      border: none;
      outline: none;
      padding: 20px;
      }
      .model-spoil-btn {
      border: 1px solid #c73ca9;
      border-radius: 6px;
      color: #c73ca9;
      font-family: "Montserrat";
      font-style: normal;
      font-weight: 700;
      font-size: 14px;
      padding: 8px;
      line-height: 17px;
      width: 100% !important;
      height: 54px;
      background-color: #081420;
      outline: none;
      margin-right: 10px;
      }
      .checkinput-wraper p {
      line-height: 28px;
      margin: 0px 10px !important
      }
      .checkinput-wraper p {
      line-height: 28px;
      margin: 0px 4px !important;
      }
      .detailspaeg-bg {
      background-color: transparent !important;
      padding: 40px 0px;
      }
      .login_btn {
      background: transparent;
      border: 0px;
      display: flex;
      }
      button.model-contect-btn.send-msg {
      width: 15% !important;
      height: 54px;
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
      .small, small {
      font-size: 80%;
      font-weight: 400;
      font-family: 'Montserrat';
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 17px;
      color: rgba(255, 255, 255, 0.7);
      }
      /*new-added*/
      .modal.show .modal-dialog {
         transform: none;
         width: 405px;
      }
      img.expolor-img {
         height: 322px !important;
         width: 383px !important;
         object-fit: contain;
      }
    a.badge.badge-primary{
      width: 25%;
         height: 30px;
         font-size: 12px;
         padding-top: 9px;
         align-items: center;
         text-align: center;
         background: #0f1e2e;
      }
      a.badge.badge-primary:hover {
            background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
         color: #fff;
      }
      .model_pop_input {
         text-align: center;
         justify-content: center;
         align-items: center;
      }
      .vtext{
         color: red;
         font-size: 13px;
         font-weight: 700;
      }
      @media (max-width: 768px) {
            .profile_image_box {    height: 440px;}}

      @media (max-width: 992px){
         .profile_image_box {
         height: 440px;
         }
      }
      .emoji-picker-input {
         font-size: 14px;
      }
      span.send_msgbox {
         background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%) !important;
         padding: 7px 21px;
         /*margin-left: 14px;*/
         border-radius: 3px;
         }
         .profile_msg{
            font-size: 14px;
         }
         @media only screen and (max-width: 448px) {
      span.send_msgbox {
         padding: 7px 13px !important;
      }
      }
      .tipoption {
         cursor: pointer;
         border: 1px solid;
         height: 35px !important;
         width: 35px !important;
         text-align: center;
         border-radius: 50% !important;
         padding-top: 5px !important;
         margin-top: 6px !important;
         margin-right: 1.15rem !important;
      }
      .tipoption small{
         color: #ffff !important;
      }
      .modal-header {
         overflow: hidden !important;}
      .tip_btn{
            background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
      }
      .tip_btn:hover{
            color: #bf00b0 !important;
            background: 0;
            border: 1px solid #bf00b0;
      }
      span.doller_sin {
         display: none;
         color: #fff;
         padding: 10px;
         position: absolute;
         top: 12px;
         left: 8.5px;
      }
      span.doller_sin.doll_sin {
         display: none;
         color: #fff;
         padding: 10px;
         position: absolute;
         top: 6.5px;
         left: 8.5px;
         font-size: 14px;
      }
      input#tips_fild {
         padding-left: 19px;
      }
      li.nav-item.filter-nav.active {
         border-left: 0px !important;
      }

      .unlock-btn-wrapepr-slider {
         height: 322px !important;
      }
      .item.active:hover {
         background: none;
      }

      .unclock-overlay {
         width: calc(100% - 5px) !important;
         height: calc(100% - 4px) !important;
         top: 2px !important;
      }
   </style>
<!-- copylink end -->
<div class="detailspaeg-bg mt-5">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 profile_image_box">
            <!-- copylink post -->
            <div class="model-img-wrapepr">
               @php
               $image=(Controller::modelImage('profile-image/'.$slugdata->user->profile_image,'_600x550'))?Controller::modelImage($slugdata->user->profile_image,'_600x550') : $slugdata->user->profile_image;
               @endphp  
               <img width="100%"
                  src="{{ url('profile-image') . '/' . $image }}" alt=""
                  class="img-fluid mod-profile" />
            </div>
         </div>
         <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6">
            <div class="model-details-wrapper">
               <div class="model-name-wrapepr">
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
                  @if($slugdata->user->is_away=='1')<button class="notify_me-btn btn btn-danger" data-toggle="modal" data-target="#notifyme">Notify Me</button> @endif
               </div>
               <div class="model-ranks">
                  <div class="modelmassage-rank-wrapp line_col">
                     <b>@if($slugdata->user->is_away)- @else @if(!empty($slugdata->cost_msg)) ${{$slugdata->cost_msg}} @endif @endif </b>
                     <span>Per Message</span>
                  </div>
                  <div class="modelmassage-rank-wrapp line_col">
                     <b>@if($slugdata->user->is_away) - <br>  @else #18 <br>  @endif</b>
                     <span>@if(!empty($slugdata->modelcategory->title)){{$slugdata->modelcategory->title}} @else <span> Category</span>  @endif</span>
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
                  
                  <div class="row">
                     <div class="col-sm-12 col-md-12 col-xl-6 mt-2">
                        @if(count($Contact)>0)
                        <button type="submit"   class="add-contact "  >Added in contact </button>
                        @else
                        <form  method="post" action="{{route('fan.addmodel')}}" >
                           @csrf
                           <input type="hidden"name="m_id" value="{{$slugdata->user->id}}">
                           <button type="submit"   class="add-contact "  >Add contact for free</button>
                        </form>
                        @endif
                     </div>
                     <div class="col-sm-12 col-md-12 col-xl-6 mt-2"> 
                        <button type="button" data-toggle="modal" data-target="#TipPoPups" data="{{ $slugdata->user->id }}"  class="model-spoil-btn joinfree-btn Tip_model_id" >Send me a tip to spoil me!</button>
                          {{-- <!--  <button type="button" class="btn model-spoil-btn joinfree-btn Tip_model_id" data="{{ $slugdata->user->id }}"  data-toggle="modal" data-target="#exampleModal">
                              Send me a tip to spoil me!
                           </button> --> --}}


                        <!-- Modal -->
                        <div class="modal fade" id="TipPoPups" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title color-white" id="exampleModalLongTitle">
                                       Send a tip 
                                       <br>
                                       <div class="tip_option d-flex text-white">
                                          <div class="tipoption text-white"value="1"><small>$1</small></div>
                                          <div class="tipoption text-white" value="5"><small>$5</small></div>
                                          <div class="tipoption text-white" value="10"><small>$10</small></div>
                                          <div class="tipoption text-white" value="20"><small>$20</small></div>
                                          <div class="tipoption text-white" value="50"><small>$50</small></div>
                                          <div class="tipoption text-white" value="100"><small>$100</small></div>
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
                                          placeholder=" Enter Tip amount $1-999" maxlength="3"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="tips_fild" required min="1" max="999">
                                          <span class="doll_sin doller_sin ">$</span>
                                       <!-- <label for="" class="mt-2">What is this for?</label> -->
                                       <input type="text" class="form-control" name="tip_mess"
                                          placeholder="What is this for?" required>
                                       <input type="hidden" class="tip_model_id" name="model_id" value="" required>
                                 
                                       <div class="modal-footer">
                                       <button type="submit" class="btn btn-secondary tip_btn">Send Tip</button> 
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- model end -->
                     </div>
                  </div>
               </div>
               <p class="gurnted-responsi-line mt-5 mb-0">Guaranteed response and my replies are <b>FREE</b></p>
               <div class="send-mess input-group d-flex">
                     <input type="text " id="validform" placeholder="Send a message for @if(!empty($slugdata->cost_msg))${{$slugdata->cost_msg}}@endif"
                     class="postinput emoji-picker-input m-0" required/>
                     
                     <button onclick="btn()" type="button" 
                     class="model-contect-btn send-msg send-message-to-feed m-0" value="{{$slugdata->user_id}}">
                  <span class="send_msgbox "><i class="fa fa-paper-plane " aria-hidden="true"></i></span></button>
                  <p class="vtext" id="demo"></p>
                   
               </div>
            </div>
         </div>
      </div>
      <div class="lets-chat-wrapper">
         <h2 class="letschat-heading">Lets Chat</h2>
         <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <div class="letschat-tab">
                  <a class="login_btn"  href="{{url('/chatify')}}" >
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
               </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <button class="login_btn" href="{{url('/chatify')}}" >
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
               <button class="login_btn"href="{{url('/chatify')}}"  >
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
               <button class="login_btn" href="{{url('/chatify')}}" >
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
                  <a class="login_btn" href="{{url('/chatify')}}" >
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
               </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
               <div class="letschat-tab">
                  <a class="login_btn" href="{{url('/chatify')}}" >
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
               </a>
            </div>
         </div>
      </div>
      @php 
      $current_time = Carbon\Carbon::now();
      @endphp
      @if(count($model_feeds)>=1) 
      <div class="detail_page-wrapper">
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item filter-nav">
               <a class="nav-link nav_tab active" id="pills-view-tab" data-toggle="pill" href="#pills-view"
                  role="tab" aria-controls="pills-view" aria-selected="true"> Posts ({{$model_feeds_count}})<small></small></a>
            </li>
            <li class="nav-item filter-nav">
               <a class="nav-link nav_tab" id="pills-pic-tab" data-toggle="pill" href="#pills-pic" role="tab"
                  aria-controls="pills-pic" aria-selected="true"> Pic ({{$model_feeds_pic_count}})<small></small></a>
            </li>
            <li class="nav-item filter-nav">
               <a class="nav-link nav_tab" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                  aria-controls="pills-video" aria-selected="true"> Videos ({{$model_feeds_video_count}})<small></small></a>
            </li>
            <li class="nav-item filter-nav">
               <a class="nav-link nav_tab" id="pills-free-tab" data-toggle="pill" href="#pills-free" role="tab"
                  aria-controls="pills-free" aria-selected="true"> Premium ({{$model_feeds_premium_count}})<small></small></a>
            </li>
            <li class="nav-item filter-nav">
               <a class="nav-link nav_tab" id="pills-Premium-tab" data-toggle="pill" href="#pills-Premium"
                  role="tab" aria-controls="pills-Premium" aria-selected="true"> Free ({{$model_feeds_free_count}})<small></small></a>
            </li>
         </ul>
      </div>
      @endif
      <div class="details-tab-wrapper">
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab" style="color: #fff">
               <div class="pictab-wrapper">
                  <div class="row" id="feed_data">
                     @if(!empty($model_feeds)) 
                     @foreach($model_feeds as $key=> $val)
                     <div class="col-lg-3 col-md-6 p-0 open-active feed_impressions" data="{{$val->id}}" value="{{$val->id}}" >
                        <div class="media p-1">
                        @if($val->price > 0 && !in_array($val->id, $isPaid))
                        <div class="unclock-overlay unlock-image-overly-{{$val->id}}">
                           <div class="unlock-btn-wrapepr">
                              <i class="fa-solid fa-lock"></i>
                           </div>
                        </div>
                        @endif
                        @if($val->media_type=='png' || $val->media_type=='jpg' || $val->media_type=='jpeg' || $val->media_type=='gif' || $val->media_type=='webp')
                           @if($val->price > 0 && !in_array($val->id, $isPaid))
                           <img class="unlock-imag-{{$val->id}}" src="{{ url('images/Feed_media') . '/' . $val->blur_image ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                           @else
                           <img src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                           @endif 
                        @endif
                        @if($val->media_type=='mp4')
                           <video controls class="feed_video" style="height:180px;">
                              <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}" type="video/mp4" height="180px">
                              <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}" type="video/ogg">
                           </video>
                        @endif
                        </div>
                     </div>
                     @endforeach  
                     @endif
                  </div>
               </div>
            </div>

            <div class="tab-pane fade  " id="pills-pic" role="tabpanel" aria-labelledby="pills-pic-tab" style="color: #fff">
               <div class="pictab-wrapper">
                  <div class="row">
                     @if(!empty($model_feeds))
                        @foreach($model_feeds as $value) 
                           @if($value->media_type=='png' || $value->media_type=='jpg'|| $value->media_type=='jpeg' || $value->media_type=='gif' || $value->media_type=='webp')
                           <div class="col-lg-3 col-md-6 p-0 open-active feed_impressions" value="{{$value->id}}" data="{{$value->id}}" data-toggle="modal" data-target="#largeModal">
                              <div class="media p-1">
                                 @if($value->price > 0 && !in_array($value->id, $isPaid))
                                 <div class="unclock-overlay unlock-image-overly-{{$value->id}}">
                                    <div class="unlock-btn-wrapepr">
                                       <i class="fa-solid fa-lock"></i>
                                    </div>
                                 </div>
                                 @endif 
                                 @if($value->price > 0 && !in_array($value->id, $isPaid))
                                 <img class="unlock-imag-{{$value->id}}" src="{{ url('images/Feed_media') . '/' . $value->blur_image ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                                 @else
                                 <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                                 @endif 
                                 {{-- <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" />  --}}
                              </div>
                           </div>
                           @endif 
                        @endforeach 
                     @endif
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
               <div class="videotab-wrapper">
                  <div class="row">
                     @foreach($model_feeds as $value) 
                     @if($value->media_type=='mp4')
                     <div class="col-lg-3 col-md-6 p-0 feed_impressions" value="{{$value->id}}" data="{{$value->id}}" data-toggle="modal" data-target="#largeModal">
                        <div class="media p-1">
                           @if($value->price > 0 && !in_array($value->id, $isPaid))
                           <div class="unclock-overlay unlock-image-overly-{{$value->id}}">
                              <div class="unlock-btn-wrapepr">
                                 <i class="fa-solid fa-lock"></i>
                              </div>
                           </div>
                           @endif 
                           <video controls class="feed_video" style="height:180px;">
                              <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" type="video/mp4" height="180px">
                              <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" type="video/ogg">
                           </video>
                        </div>
                     </div>
                     @endif   
                     @endforeach 
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-free" role="tabpanel" aria-labelledby="pills-free-tab">
               <div class="freetab-wrapper">
                  <div class="row">
                     @foreach($model_feeds as $value) 
                     @if( $value->schedule_date <= $current_time && $value->price >0) 
                     <div class="col-lg-3 col-md-6 p-0 feed_impressions" value="{{$value->id}}" data="{{$value->id}}" data-toggle="modal" data-target="#largeModal">
                        <div class="media p-1">
                           @if($value->price > 0 && !in_array($value->id, $isPaid))
                           <div class="unclock-overlay unlock-image-overly-{{$value->id}}">
                              <div class="unlock-btn-wrapepr">
                                 <i class="fa-solid fa-lock"></i>
                              </div>
                           </div>
                           @endif
                           @if(!empty($value->media_type))
                              @if($value->media_type=='png' || $value->media_type=='jpg'|| $value->media_type=='jpeg' || $value->media_type=='gif' || $value->media_type=='webp')
                                 @if($value->price > 0 && !in_array($value->id, $isPaid))
                                 <img class="unlock-imag-{{$value->id}}" src="{{ url('images/Feed_media') . '/' . $value->blur_image ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                                 @else
                                 <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                                 @endif 
                                 {{-- <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" />  --}}
                              @endif
                              @if($value->media_type=='mp4')
                              <video controls class="feed_video" style="height:180px;">
                                 <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" type="video/mp4" height="180px">
                                 <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" type="video/ogg">
                              </video>
                              @endif 
                           @endif
                        </div>
                     </div>
                     @endif
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-Premium" role="tabpanel" aria-labelledby="pills-Premium-tab">
               <div class="premiumtab-wrapper">
                  <div class="row">
                     @foreach($model_feeds as $value) 
                        @if($value->status=='1' && $value->schedule_date  <=$current_time && $value->price  <=0) 
                        <div class="col-lg-3 col-md-6 p-0 feed_impressions" value="{{$value->i}}" data-toggle="modal" data-target="#largeModal">
                           <div class="media p-1">
                              @if(!empty($value->media_type))
                                 @if($value->media_type=='png' || $value->media_type=='jpg'|| $value->media_type=='jpeg' || $value->media_type=='gif' || $value->media_type=='webp')
                                    @if($val->price>0)
                                    <img src="{{ url('images/Feed_media') . '/' . $value->blur_image ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                                    @else
                                    <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> 
                                    @endif 
                                    {{-- <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" style="object-fit: cover;" height="180px" width="150px" alt="" /> --}}
                                 @endif 
                                 @if($value->media_type=='mp4')
                                    <video controls class="feed_video" style="height:180px;">
                                       <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" type="video/mp4" height="180px">
                                       <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}" type="video/ogg">
                                    </video>
                                 @endif 
                              @endif
                           </div>
                        </div>
                        @endif 
                     @endforeach
                  </div>
               </div>
            </div>

            <!-- All feed popup slider fsdfsdf -->
            <div class="Feed-pooup-model" style="opacity: 0;">
               <div class="modal-dialog modal-md mt-5 mb-0">
                  <div class="modal-content">
                     <div class="modal-body">
                        <div class="Feed-pooup-model-close">X</div>
                        <div class="main-slick">
                           <div class="slider slide-show">
                              @foreach($model_feeds as $key=> $value)
                                 @php
                                    $feed_media=App\Models\Feed_media::where('feed_id',$value->org_id)->get();
                                    $dt = new DateTime(); $laraveltime = $dt->format('Y-m-d H:i:s'); $date1
                                    = new DateTime($value->created_at); $date2 = new DateTime($laraveltime);
                                    $difference = $date1->diff($date2);
                                    $diffInSeconds = $difference->s;
                                    $diffInMinutes = $difference->i; //23
                                    $diffInHours =
                                    $difference->h; //8
                                    $diffInDays = $difference->d; //21
                                    $diffInMonths =
                                    $difference->m;
                                    $diffInYears = $difference->y;
                                 @endphp
                                 <div class="slider-item IndexID{{$value->id}}">
                                    <div class="carousel_header">
                                       <div class="d-flex text-white justify-content-between">
                                          <div class="d-flex ">
                                             <img class="img-fluid header_img" src="{{ url('profile-image') . '/' . $slugdata->user->profile_image ?? '' }}" alt="" />
                                             <p class="ml-2 mt-2">
                                                {{ $slugdata->user->first_name ??' '.$slugdata->user->last_name ??'' }}
                                             </p>
                                             @if($slugdata->user->user_status=='verified')
                                             <i class="bi bi-patch-check-fill mt-2 ml-1"></i>
                                             @endif
                                          </div>
                                       
                                          <small class="text-muted">
                                             @if(!empty($diffInMinutes))
                                                @if($diffInMinutes>0)
                                                   @if($diffInYears<1) 
                                                      @if($diffInMonths<1) 
                                                         @if($diffInDays<1) 
                                                            @if($diffInHours<1) 
                                                               <i class="fa-solid fa-circle"></i>{{$diffInMinutes}} min ago
                                                            @else
                                                               <i class="fa-solid fa-circle"></i>  {{$diffInHours}} hr {{$diffInMinutes}} min ago
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
                                    @if(count($feed_media)>1)
                                    <div id="myCarousel{{$value->feed_id}}" class="carousel slide" data-ride="carousel">
                                       <!-- Indicators -->
                                       <ol class="carousel-indicators">
                                          @foreach ($feed_media as $valu)
                                          <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                          @endforeach
                                       </ol>
                                       <!-- Wrapper for slides -->
                                    
                                       <div class="carousel-inner">
                                          @foreach ($feed_media as $item)
                                          <div class="item {{ $loop->first ? 'active' : '' }}">
                                             <div class="item {{$loop->first?'active':''}}">
                                                @if($value->price>0)
                                                <div class="unclock-overlay1">
                                                   <div class="unlock-btn-wrapepr-slider">
                                                      <i class="fa-solid fa-lock"></i>
                                                      <button class="unlock-btn ">Unlock for ${{$value->price}}</button>
                                                   </div>
                                                </div>
                                                @endif
                                                @if ($item->media_type == 'jpg' || $item->media_type == 'png' || $item->media_type == 'jpeg' || $item->media_type == 'gif' || $item->media_type=='webp')
                                                <img class="expolor-img" src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" alt="" />
                                                @endif
                                                @if ($item->media_type == 'mp4')
                                                <video height="240" controls>
                                                   <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" type="video/mp4">
                                                   <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" type="video/ogg">
                                                </video>
                                                @endif
                                             </div>
                                          </div>
                                          @endforeach
                                       </div>
                                       <!-- Left and right controls -->
                                       <a class="left carousel-control" href="#myCarousel{{$value->feed_id}}" data-slide="prev">
                                       <span class="glyphicon glyphicon-chevron-left"></span>
                                       <span class="sr-only">Previous</span>
                                       </a>
                                       <a class="right carousel-control" href="#myCarousel{{$value->feed_id}}" data-slide="next">
                                       <span class="glyphicon glyphicon-chevron-right"></span>
                                       <span class="sr-only">Next</span>
                                       </a>
                                    </div>
                                    @else
                                    @foreach ($feed_media as $item)
                                    <div class="item {{ $loop->first ? 'active' : '' }}">
                                       <div class="item {{$loop->first?'active':''}}">
                                          @if($value->price > 0 && !in_array($item->id, $isPaid))
                                          <div class="unclock-overlay1">
                                             <div class="unlock-btn-wrapepr-slider">
                                                <i class="fa-solid fa-lock"></i>
                                                <button class="unlock-btn" data-id="{{$value->org_id}}" data-media_id="{{$item->id}}">Unlock for ${{$value->price}}</button>
                                             </div>
                                          </div>
                                          @endif
                                          @if ($item->media_type == 'jpg' || $item->media_type == 'png' || $item->media_type == 'jpeg' || $item->media_type == 'gif' || $item->media_type=='webp')
                                             @if($value->price > 0 && !in_array($item->id, $isPaid))
                                             <img class="expolor-img expolor-img-{{$item->id}}" src="{{ url('images/Feed_media') . '/' . $item->blur_image ?? '' }}" alt="" /> 
                                             @else
                                             <img class="expolor-img" src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" alt="" /> 
                                             @endif 
                                          @endif
                                          @if ($item->media_type == 'mp4')
                                          <video height="240" controls style="width: 100%">
                                             <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" type="video/mp4">
                                             <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" type="video/ogg">
                                          </video>
                                          @endif
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class=" pl-1 pr-1 text-white ">
                                       <div class="pt-3 footer_row foot_line text-white  ">
                                          {!!$value->description!!}
                                       </div>
                                       <div class=" row footer_row foot_line  mt-1">

                                             <div class="send-mess input-group d-flex">
               
                                                <input type="text " id="emoji-picker" value="" placeholder="Send a message for @if(!empty($slugdata->cost_msg))${{$slugdata->cost_msg}}@endif"
                                                class="postinput emoji-picker-input" />
                                                <button 
                                                class="model-contect-btn send-msg send-message-to-feed" value="{{$slugdata->user_id}}">
                                             <span class="send_msgbox"><i class="fa fa-paper-plane " aria-hidden="true"></i></span></button>
                                             
                                          </div>
                                          
                                       </div>
                                       <div  class=" row ml-0 mr-2 footer_row d-flex mt-1 ">
                                          <div class=" d-flex justify-content-around">
                                             <a class="" href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                             <button  type="button" data-toggle="modal" data-target="#TipPoPups" data="{{ $slugdata->user->id }}"  class="badge badge-primary btn btn-secondary" ><i class="bi bi-currency-dollar footer_icon"></i><b>Tip</b></button>
                                             @if(count($Contact)>0) 
                                             <a class="badge badge-primary" ><i class="bi bi-plus-lg footer_icon"></i><b>Added</b></a>  
                                             @else
                                             <a class="badge badge-primary add-to-contact-ajax"  value="{{$slugdata->user->id}}"><i class="bi bi-plus-lg footer_icon" ></i><b>Add</b></a> 
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <!-- Left and right controls -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- feeds slider end -->
   {{-- <div class="tab-pane fade  " id="pills-pic" role="tabpanel" aria-labelledby="pills-pic-tab"
      style="color: #fff">
      <div class="pictab-wrapper">
         <div class="row">
            @if(!empty($model_feeds))
            @foreach($model_feeds as $value) 
            @if($value->media_type=='png' OR $value->media_type=='jpg'OR
            $value->media_type=='jpeg'OR $value->media_type=='gif')
            <div class="col-lg-3 col-md-6 p-0  feed_impressions" value="{{$value->id}}" data-toggle="modal" data-target="#largeModal">
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
            @endif @endforeach @endif
         </div>
      </div>
   </div>
   <div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
      <div class="videotab-wrapper">
         <div class="row">
            @foreach($model_feeds as $value) 
            @if($value->media_type=='mp4')
            <div class="col-lg-3 col-md-6 p-0 feed_impressions" value="{{$value->id}}" data-toggle="modal" data-target="#largeModal">
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
   </div>
   <div class="tab-pane fade" id="pills-free" role="tabpanel" aria-labelledby="pills-free-tab">
      <div class="freetab-wrapper">
         <div class="row">
            @foreach($model_feeds as $value) 
            @if( $value->schedule_date <=$current_time && $value->price >0) 
            <div class="col-lg-3 col-md-6 p-0 feed_impressions" value="{{$value->id}}" data-toggle="modal" data-target="#largeModal">
               <div class="media p-1">
                  @if($value->price>0)
                  <div class="unclock-overlay">
                     <div class="unlock-btn-wrapepr">
                        <i class="fa-solid fa-lock"></i>
                     </div>
                  </div>
                  @endif
                  @if(!empty($val->media_type))
                  @if($val->media_type=='png' OR $val->media_type=='jpg'OR
                  $val->media_type=='jpeg'OR $val->media_type=='gif')
                  <img src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                     style="object-fit: cover;" height="180px" width="150px" alt="" /> @endif
                  @if($val->media_type=='mp4')
                  <video controls class="feed_video" style="height:180px;">
                     <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                        type="video/mp4" height="180px">
                     <source src="{{ url('images/Feed_media') . '/' . $val->medai ?? '' }}"
                        type="video/ogg">
                     Your browser does not support the video tag.
                  </video>
                  @endif @endif
               </div>
            </div>
            @endif
            @endforeach
         </div>
      </div>
   </div>
   <div class="tab-pane fade" id="pills-Premium" role="tabpanel" aria-labelledby="pills-Premium-tab">
      <div class="premiumtab-wrapper">
         <div class="row">
            @foreach($model_feeds as $value) 
            @if($value->status=='1' && $value->schedule_date  <=$current_time && $value->price  <=0) 
            <div class="col-lg-3 col-md-6 p-0 feed_impressions" value="{{$value->i}}" data-toggle="modal" data-target="#largeModal">
               <div class="media p-1">
                  @if(!empty($value->media_type))
                  @if($value->media_type=='png' OR $value->media_type=='jpg'OR $value->media_type=='jpeg'OR $value->media_type=='gif')
                  <img src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                     style="object-fit: cover;" height="180px" width="150px" alt="" />
                  @endif 
                  @if($value->media_type=='mp4')
                  <video controls class="feed_video" style="height:180px;">
                     <source
                        src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                        type="video/mp4" height="180px">
                     <source
                        src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                        type="video/ogg">
                     Your browser does not support the video tag.
                  </video>
                  @endif 
                  @endif
               </div>
            </div>
            @endif 
            @endforeach
         </div>
      </div>
   </div> --}}
   {{-- <form>
      <input type="hidden" id="modelid" name="modelvalue" value="{{$slugdata->user_id}}">
   </form> --}}
   {{-- @if(count($model_feeds)>=5) 
   <div class="" id="loadbtn">
      <button type="button" class="login-btn">View More </button>
   </div>
   @endif --}}
   <!-- <div class="viewmore-btn-wraper" id="loadbtn">
            <button class="viewmore" value="{{$take}}">     View More </button>
   </div> -->
   @php $json_data = json_decode($slugdata->socail_links,true); @endphp
   @if(( $json_data['twitter']??'') || ($json_data['facebook']??'') || ($json_data['website']??'') || ($json_data['camsite']??'') || ($json_data['spankpay']??'') || ($json_data['instagram']??''))
   <div class="mylinks-wrapper">
      <h3 class="my-links ml-4">My Links</h3>
      {{$hu??''}}
      <div class="mylink-wrapper row">
         @if(!empty($json_data['twitter']))
         <div class="modellink-wrrap col-sm-6 col-md-6 mt-2">
            <img src="./image/ball2.png" alt="" />
            <a href="">{{$json_data['twitter']}}</a>
         </div>
         @endif
         @if(!empty($json_data['facebook']))
         <div class="modellink-wrrap col-sm-6 col-md-6  mt-2">
            <img src="./image/ball1.png" alt="" />
            <a href="">{{$json_data['facebook']}}</a>
         </div>
         @endif
         @if(!empty($json_data['snapchat']))
         <div class="modellink-wrrap col-sm-6 col-md-6  mt-2 ">
            <img src="./image/ball3.png" alt="" />
            <a href="">{{$json_data['snapchat']}}</a>
         </div>
         @endif
         @if(!empty($json_data['website']))
         <div class="modellink-wrrap col-sm-6 col-md-6  mt-2 ">
            <img src="./image/ball3.png" alt="" />
            <a href="">{{$json_data['website']}}</a>
         </div>
         @endif
         @if(!empty($json_data['camsite']))
         <div class="modellink-wrrap col-sm-6 col-md-6 mt-2 ">
            <img src="./image/ball3.png" alt="" />
            <a href="">{{$json_data['camsite']}}</a>
         </div>
         @endif
         @if(!empty($json_data['spankpay']))
         <div class="modellink-wrrap col-sm-6 col-md-6  mt-2 ">
            <img src="./image/ball3.png" alt="" />
            <a href="">{{$json_data['spankpay']}}</a>
         </div>
         @endif
         @if(!empty($json_data['instagram']))
         <div class="modellink-wrrap col-sm-6 col-md-6 mt-2 ">
            <img src="./image/ball3.png" alt="" />
            <a class="" href="">{{$json_data['instagram']}}</a>
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
            <div class="col-md-3 col-xl-2 col-lg-2 col-sm-3  col-xs-12 mt-2">
               <div class="online_model">
                  <a href="{{url('/'.$value->slug)}}">
                  <img src="{{ url('profile-image') . '/' . $image ?? '' }}" /></a>
               </div>
            </div>
            @endforeach 
            <div class=" col-md-3 col-xl-2 col-lg-2 col-sm-3  col-xs-12 mt-2">
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
<!-- User Notify Me Modal-->
<div class="modal fade" id="notifyme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content notifyme">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notify Me</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-white">
       <form action="{{url('/model-online-notify')}}" method="post">
         @csrf
       <div class="card ">
         <span class="ml-5 mt-2 mb-4">Send me a notification when {{$slugdata->user->first_name??''}} {{$slugdata->user->last_name??''}} is back online</span>
         <div class=" d-flex ">
        
         <div class="form-check">
         <input class="form-check-input" type="radio" name="notify_type" id="flexRadioDefault1" value="email" checked>
         <label class="form-check-label" for="flexRadioDefault1">
           Email
         </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="radio" name="notify_type" id="flexRadioDefault2" value="sms">
         <label class="form-check-label" for="flexRadioDefault2">
            Sms
         </label>
         <input type="hidden" value="{{$slugdata->user->id}}" name="model_id">
         </div>
         </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
      </form>
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
         <span aria-hidden="true" style=" color: #ffff; opacity: 111111111;">&times;</span>
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
                                                         <span class="input-group-text" onclick="password_show_hide_log();">
                                                         <i class="bi bi-eye" id="show_eye_log"></i>
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
                                                            <span class="input-group-text" onclick="password_show_hide();">
                                                            <i class="bi bi-eye" id="show_eye"></i>
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
                                                      <p class=" mt-3 Service_text"> I have read and agreed to Bad Bunnies Tv.com’s<b><a class="terms_link" href="{{ url('/terms-conditions') }}">Terms of Service</a></b>
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
                                             <button value="" class="applyasmodel-btn">
                                             <a class="Applybtn_text" href="{{url('/storeuser')}}">  Apply as a model </a></button>
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
   

                     <!-- <div class="modal fade" id="TipPoPup" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content "> 
                              <div class="modal-header ">
                              <h5 class="modal-title color-white" id="exampleModalLongTitle">Send a tip to Christine Lewis
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
                              <span aria-hidden="true">x</span>
                              </button>
                              </div>
                              <div class="modal-body">
                              <form action="{{ url('fan/model-tip') }}" method="post">
                              @csrf
                              <label for="">Tip Amount</label>
                              <input type="number" name="tip_amount" class="form-control tip_amount" value=""
                                 placeholder=" Enter Tip amount $1-999" required min="1" max="999">
                              <label for="" class="mt-2">What is this for?</label>
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
 -->


            @if(isset($copy_post))

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
               <div class="modal fade " id="copy_post_model_fan" tabindex="-1" role="dialog" aria-labelledby="basicModal"
                  aria-hidden="true">
                  <div class="modal-dialog modal-lg copy_post_popup">
                     <div class="modal-content copy_post_model_content">
                        <button type="button" class="close copy_pop_close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times copy_pop_close_btn1" aria-hidden="true"></i></span>
                        </button>
                        <div class="modal-body">
                           <div class="carousel_header">
                              <div class="d-flex text-white justify-content-between pt-2">
                                 <div class="d-flex ">
                                    <img class="img-fluid header_img" src="{{ url('profile-image') . '/' . $slugdata->user->profile_image ?? '' }}" alt="" />
                                    <p class="ml-2 mt-3">{!!$slugdata->user->first_name!!}{!!$slugdata->user->last_name!!}</p>
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
                                          @if($diffInYears<1) 
                                             @if($diffInMonths<1) 
                                                @if($diffInDays<1) 
                                                   @if($diffInHours<1) 
                                                      <i class="fa-solid fa-circle"></i>  {{$diffInMinutes}} min ago
                                                   @else
                                                      <i class="fa-solid fa-circle"></i>  {{$diffInHours}} hr {{$diffInMinutes}} min ago
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
                           <div id="myCarousel11" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                 @foreach ($copy_post_media as $valu)
                                 <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                 @endforeach
                              </ol>
                              <!-- Wrapper for slides -->
                              <div class="carousel-inner gfjser">
                                 @foreach ($copy_post_media as $item)
                                 <div class="item {{ $loop->first ? 'active' : '' }}">
                                    @if ($item->media_type == 'jpg' || $item->media_type == 'png' || $item->media_type == 'jpeg' || $item->media_type == 'gif')
                                    <img class="expolor-img" src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" alt="" />
                                    @endif
                                    @if ($item->media_type == 'mp4')
                                    <video width="320" height="240" controls style="width: 100%">
                                       <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" type="video/mp4">
                                       <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}" type="video/ogg">
                                    </video>
                                    @endif
                                 </div>
                                 @endforeach
                              </div>
                              <!-- Left and right controls -->
                              <a class="left carousel-control" href="#myCarousel11" data-slide="prev">
                                 <span class="glyphicon glyphicon-chevron-left"></span>
                                 <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#myCarousel11" data-slide="next">
                                 <span class="glyphicon glyphicon-chevron-right"></span>
                                 <span class="sr-only">Next</span>
                              </a>
                           </div>
                           <div class=" pl-1 pr-1 text-white ">
                              <div class="pt-3 footer_row foot_line text-white  ">
                                 {!!$copy_post->description!!}
                              </div>
                              <div class=" row footer_row foot_line  mt-1">
                                 <form class="" role="form" id="reg-form" method="POST"
                                    class="form-horizontal" action="">
                                    <div class=" ">
                                       <div class="input-group d-flex">
                                          <input type="text" placeholder="Send a message for ${{ $value->model->cost_msg }}"
                                             class="postinput" />
                                          <button type="button" data-toggle="modal" data-target="#exampleModalCenter3" class="model-contect-btn send-msg"><span class="send_msgbox"><i class="fa fa-paper-plane" aria-hidden="true"></i></span></button>
                                    </div>
                                    </div>
                                 </form>
                              </div>
                              <div  class=" row ml-0 mr-2 footer_row  mt-1 justify-content-between" style="font-size: 16px;">
                                 <div class="col-6 text-center">
                                    <i class="bi bi-plus-lg text-white footer_icon"></i><a href=""><b>Add</b></a>
                                 </div>
                                 <div class="col-6 text-center">
                                    <i class="bi bi-currency-dollar footer_icon"></i><a href=""><b>Tip</b></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endif <!-- copylink end -->
            <script>
               $(document).ready(function() {
       
                  $(document).on("change blur keyup keydown",'#tips_fild',function() 
                  { 
                     $(this).val(); 
                     if($(this).val()!='') 
                     { 
                        $('.doller_sin').addClass('d-block');
                     }
                     // return $('.PoPup_sign').removeClass('d-none'); 
                  });
                  $(document).on("click",".unlock-btn",function() {
                     alert("click bound to document listening for #test-element");
                  });

                  $(document).on("click", ".unlock-btn",function() {
                     var _self = $(this);
                     var id = $(this).data('id');
                     var media_id = $(this).data('media_id');
                     var formData = {
                        id: id,
                        media_id:media_id
                     };
                     $.ajaxSetup({
                        headers: {
                           'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                     });
                     $.ajax({
                        type: 'POST',
                        url: '{{url('fan/feed-unlock-ajax')}}',
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                           console.log(response);
                           if(response.status) {
                              _self.closest('.unlock-btn-wrapepr-slider').remove();
                              $('.unlock-image-overly-'+media_id).remove();
                              
                              $('.expolor-img-'+media_id).attr('src', response.image);
                              $('.unlock-imag-'+media_id).attr('src', response.image);
                           }
                        },
                        error: function (error) {
                           console.log(error);
                        }
                     });
                  });
               });
               function btn() {
                 let x = document.getElementById("validform").value;
                 
                 let text;
                 if (!x)
                 {
                     text = "Please input message";
                     $("#demo").show().delay(4000).queue(function(n) {
                        $(this).hide(); n();
                     });
                 }
                 else
                 {
                     text = "";
                 }
                 document.getElementById("demo").innerHTML = text;
               }
               </script>
@endsection 
@section('scripts') 
@parent 
@endsection