@if(Auth::user()->roles->first()->title == 'model'||Auth::user()->roles->first()->title == 'Model') 
@endif
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <style>
    .page {
    height: unset !important;
    width: unset !important;
    border-radius: unset !important;
    cursor: unset !important;
    display: unset !important;
    align-items: unset !important;
    justify-content: unset !important;
    gap: unset !important;
    color: unset !important;
}
.users__list.j-users {
    height: 100px;
    overflow: scroll;
    background: #918383;
}
button.users__user.j-user {
    background: red;
    border: 0px;
    margin: 10px;
    padding: 10px;
    width: 130px;
    color: #fff;
    height: 40px;
}
button.caller__frames_acts_btn.j-caller__ctrl{
  background: #d75dff;
    border: 0px;
    padding: 10px;
    width: 169px;
}
.modal-dialog.modal-dialog-centered {
    width: 80%;
    max-width: 80%;
}
.caller__ctrl {
    height: auto;
}
.j-callees {
  display:none;
}
  .sec_1.d-flex.Available.col-12{
    color:#fff;
  }
  .toast-error{
    display:none!important;
  }
  .modal-content {
    background: #0c1d2d !important;
  }
  .form-label{
    color:#fff;
  }

  /*new added*/
  .form-control:focus {
    color: #ffffff !important;
    background-color: #112435 !important;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
}
option {
    background: #0c1d2d !important;
    padding: 30px !important;
}
span.minus.price_minus {
      margin: 8px -17px 0px 4px;
    /* position: absolute; */
    z-index: 999;
    height: 28px;
    width: 35px;
    padding: 2px;
    border: none;
    color: #fff;
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
}

span.plus.price_pluse {
    margin: 8px 0px 0px -16px !important;
    z-index: 999;
    height: 28px;
    width: 35px;
    padding: 2px;
    border: none;
    color: #ffff;
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
}
.input-price.price_selectr {
   height: 42px;
   width: 132px;
   text-align: center;
   font-size: 26px;
   border: 1px solid #ddd;
   border-radius: 4px;
   display: inline-block;
   vertical-align: middle;
   background: #112435;
   color: #fff;
   }
   .messenger-listView-tabs{
    font-size: medium !important;
   }
 


</style>

@include('frontend.fan.section.head')    
<script> 
  var userRole = {!! json_encode(Auth::user()->roles->first()->title) !!};
  var userID = {!!  json_encode(Auth::user()->id)!!};
  var userNAME = {!!  json_encode(Auth::user()->first_name) !!};
  var callURL = "{!! route('update-call-id') !!}";
   
  localStorage.setItem('data', JSON.stringify({"username":userNAME,"login": userID, "callURL":callURL}));
 
</script>

      @if(Auth::user()->roles->first()->title == 'model'||Auth::user()->roles->first()->title == 'Model')   
      <style>
        .messenger-search[type="text"] {
          width: calc(80% - 5px) !important;
        }
        .content {
          margin: 0px 0px 0px 0px !important;
        }
        .messenger {
          margin-top: 47px;
        }
      </style>
      @include('frontend.model.section.head')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
      </head>
    <body class="app sidebar-mini">
      <wrapper class="d-flex flex-column">
        <main id="FS_main_section" class="flex-fill">
          <div id="app">
      @include('frontend.model.section.header')
      <div class="content-wrapper">
        <div class="container">
          <div class="content">
            <div class="row">
              @include('frontend.model.section.sidebar')
              <div class="col-sm-12 text-white col-md-8 col-lg-8 col-xl-9 mb-5">
                @include('Chatify::layouts.headLinks')
                <style type="text/css">
                  .messenger-infoView.app-scroll {
                    display: none;
                  }
                </style>
                <div class="messenger">
                  {{-- ----------------------Users/Groups lists side---------------------- --}}
                  <div class="messenger-listView">
                    {{-- Header and search bar --}}
                    <div class="m-header">
                      <nav>
                        <!-- <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a> -->
                        {{-- header buttons --}}
                        <nav class="m-header-right">
                          <!--   <a href="#"><i class="fas fa-cog settings-btn"></i></a> -->
                          <a href="#" class="listView-x">
                            <i class="fas fa-times">
                            </i>
                          </a>
                        </nav>
                      </nav>
                      {{-- Search input --}}
                      <div class="flex"> 
                        <input type="text" class="messenger-search" placeholder="Search" />
                        @if(Auth::user()->roles->first()->title == 'Model'||Auth::user()->roles->first()->title == 'model') 
                        <i   data-toggle="modal" data-target="#exampleModalCenter2" class="fas fa-mail-bulk">
                        </i>
                        @endif
                      </div>
                      {{-- Tabs --}}
                      <div class="messenger-listView-tabs">
                        <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users">
                          Recent
                        </a>
                        <a href="#" @if($type == 'group') class="active-tab" @endif data-view="groups">
                          Favorites
                        </a> 
                        <a href="#" @if($type == 'active') class="active-tab" @endif data-view="actives">
                          Active
                        </a> 
                      </div>
                    </div>
                    {{-- tabs and lists --}}
                    <div class="m-body contacts-container">
                      {{-- Lists [Users/Group] --}}
                      {{-- ---------------- [ User Tab ] ---------------- --}}
                      <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">
                        {{-- Favorites --}}
                        <!-- <div class="favorites-section">
                        <p class="messenger-title">Favorites</p>
                        <div class="messenger-favorites app-scroll-thin"></div>
                        </div> -->
                        {{-- Saved Messages --}}
                        {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                        {{-- Contact --}}
                        <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;">
                        </div>
                      </div>
                      {{-- ---------------- [ Group Tab ] ---------------- --}}
                      <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
                        {{-- items --}}
                        <div class="messenger-favorites app-scroll-thin">
                        </div>
                      </div>
                      <div class="@if($type == 'active') show @endif messenger-tab actives-tab app-scroll" data-view="actives">
                        {{-- items --}}
                        <div class="messenger-active  app-scroll-thin">
                        </div>
                      </div>
                      {{-- ---------------- [ Search Tab ] ---------------- --}}
                      <div class="messenger-tab search-tab app-scroll" data-view="search">
                        {{-- items --}}
                        <p class="messenger-title">Search
                        </p>
                        <div class="search-records">
                          <p class="message-hint center-el">
                            <span>Type to search..
                            </span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- ----------------------Messaging side---------------------- --}}
                  <div class="messenger-messagingView">
                    {{-- header title [conversation name] amd buttons --}}
                    <div class="m-header m-header-messaging">
                      <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        {{-- header back button, avatar and user name --}}
                        <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                          <a href="#" class="show-listView">
                            <i class="fas fa-arrow-left">
                            </i>
                          </a>
                          <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                          </div>
                          <a href="#" class="user-name">{{ config('chatify.name') }}
                          </a>
                          <a href="#" class="add-to-favorite">
                            <i class="fas fa-star">
                            </i>
                         
                          </a>
                     <br>
                          <a href="#" class="credit-info text-muted">
                          </a>
                        </div>
                        {{-- header buttons --}}
                        <nav class="m-header-right">
                          <!-- <form action="" method="get">  
                          <button type="submit">call</button>
                          </form> -->
                          <a href="#" class="video-call modalcall" data-call="video" data-toggle="modal" data-target="callingpopup"> 
                            <i class="fas fa-video" aria-hidden="true">
                            </i>
                          </a>
                          <a href="#" class="call-chat" data-call="audio" data-toggle="modal" data-target="callingpopup"> 
                            <i class="fas fa-phone"></i>
                          </a>
                            <!-- <form method="post" action="{{ route('initiate_call') }}">
                              @csrf
                              <input type="hidden" name="phone_number" value="+91{{ config('chatify.name') }}">
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                              @endif
                              <button  type="submit" >   
                                
                              </button> 
                            </form> -->

                          <!-- <a href="#" class="piggy"> <i class="fas fa-piggy-bank" aria-hidden="true"></i></a> -->
                          <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                        </nav>
                      </nav>
                    </div>
                    {{-- Internet connection --}}
                    <div class="internet-connection">
                      <span class="ic-connected">Connected
                      </span>
                      <span class="ic-connecting">Connecting...
                      </span>
                      <span class="ic-noInternet">No internet access
                      </span>
                    </div>
                    {{-- Messaging area --}}
                    <div class="m-body messages-container app-scroll">
                      <div class="messages">
                        <p class="message-hint center-el">
                          <span>Please select a chat to start messaging
                          </span>
                        </p>
                      </div>
                      {{-- Typing indicator --}}
                      <div class="typing-indicator">
                        <div class="message-card typing">
                          <p>
                            <span class="typing-dots">
                              <span class="dot dot-1">
                              </span>
                              <span class="dot dot-2">
                              </span>
                              <span class="dot dot-3">
                              </span>
                            </span>
                          </p>
                        </div>
                      </div>
                      {{-- Send Message Form --}}
                      @include('Chatify::layouts.sendForm')
                    </div>
                  </div>
                  {{-- ---------------------- Info side ---------------------- --}}
                  <div class="messenger-infoView app-scroll">
                    {{-- nav actions --}}
                    <nav>
                      <a href="#">
                        <i class="fas fa-times">
                        </i>
                      </a>
                    </nav>
                    {!! view('Chatify::layouts.info')->render() !!}
                  </div>
                </div>
                @include('Chatify::layouts.modals')
                @include('Chatify::layouts.footerLinks')
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" outline: none;">
              <span aria-hidden="true" style="color: #fff;    float: right;opacity: 111111111;">&times;
              </span>
            </button>
            <div class="modal-body">
              <form action="{{route('mass')}}" method="post" enctype="multipart/form-data"> @csrf 
                <div class="row">
                  <div class="col-12">
                    <label class="form-label" for="">Select User
                    </label>
                    <select name="user" class="form-control chat_user" name="" id="">
                      <option class="chat_opt" value="0">--Select-- 
                      </option>
                      <option class="chat_opt" value="1">All 
                      </option>
                      <option class="chat_opt" value="2">Favoutite
                      </option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class=" form-label mt-2">Message
                    </label>
                    <!-- <textarea  class="form-control"name="" id="" cols="30" rows="10"></textarea>  -->
                    <div class="textarea">
                      <div class="form-group">
                        <textarea type="text" name="message" class="form-control mt-1" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="240">
                        </textarea>
                      </div>
                      <div class="form-group">
                        <div class="file-upload">
                          <!-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> -->
                          <div class="row">
                            <div class="col">
                              <div class="form-group mt-2">
                                <div class="upload_div">
                                  <label class="upload_label form-label" for="upload-img">
                                    <i class="fa fa-camera" aria-hidden="true">
                                    </i> Add Photo, Video, Audio 
                                  </label>
                                </div>
                                <input type="file" class="form-control" name="file" multiple id="upload-img" />
                                <!-- <input type="file" class="upload-attachment" name="file" id="upload-img" accept=".png, .jpg, .jpeg, .gif, .mp4, .mp3, .zip, .rar, .txt, .mp4, .mp3"> -->
                              </div>
                              <span class="images text-danger">
                              </span>
                              <div class="img-thumbs img-thumbs-hidden" id="img-preview">
                                <div class="price">
                                  <div class="number  mt-3 d-flex">
                                    <span class="minus price_minus">-
                                    </span>
                                    <input name="price" class="input-price price_selectr" type="text" id="premium_cost" value="0.00" />
                                    <span class="plus ml-1 price_pluse">+
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                  </div>
                </div>
                @php
                $data=App\Models\ChMessage::where('mass_status','1')->where('from_id',Auth::user()->id)->orderBy('created_at', 'desc')->first();
                @endphp
                @if (!empty($data))
                @php
                $dt = new DateTime();
                $laraveltime = $dt->format('Y-m-d H:i:s');
                $date1 = new DateTime($data->created_at);
                $date2 = new DateTime($laraveltime);
                $difference = $date1->diff($date2);
                $diffInSeconds = $difference->s; //45
                $diffInMinutes = $difference->i; //23
                $diffInHours = $difference->h; //8
                $diffInDays = $difference->d; //21
                $diffInMonths = $difference->m; //4
                $diffInYears = $difference->y;
                @endphp
                <input class="posttime" type="hidden" value="{{ $data->created_at }}">
                <input class="laraveltime" type="hidden" value="{{ $laraveltime }}">
                @else
                @php
                $diffInSeconds = '60';
                $diffInMinutes = '60';
                $diffInHours = '2';
                $diffInDays = '2';
                @endphp
                @endif
               
                @if ($diffInDays == 0 && $diffInHours 
                <= 7 && $diffInMinutes 
                   <= 59 && $diffInSeconds 
                <= 58)
                     <div class="sec_1 d-flex Available col-12">
                <p class="mr-2">Available in
                </p>
                <p id="hours"> 
                </p>
                <p id="minutes"> 
                </p>
                <p id="seconds"> 
                </p>
                </div>
              @else
              <div class="col-12">
                <button class="btn cre_btn mt-2" style="    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%); color:#fff;" type="submit">Send
                </button> 
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      </div>
    @include('frontend.model.section.footer')
    @include('frontend.model.section.footer-scripts')
    @else
    @if(Auth::user()->roles->first()->title == 'fan'||Auth::user()->roles->first()->title == 'Fan') 
    @include('frontend.fan.section.header')
    @include('frontend.fan.section.sidebar')
    <div class="col-sm-12 text-white col-md-9 col-lx-9 mt-4 mb-5">
      @include('Chatify::layouts.headLinks')
      <style type="text/css">
        .messenger-infoView.app-scroll {
          display: none;
        }
        .content {
          margin: 130px 0px 0px 0px;
        }
        .messenger {
          margin-top: 47px;
        }
      </style>
      <div class="messenger">
        {{-- ----------------------Users/Groups lists side---------------------- --}}
        <div class="messenger-listView">
          {{-- Header and search bar --}}
          <div class="m-header">
            <nav>
              <!-- <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a> -->
              {{-- header buttons --}}
              <nav class="m-header-right">
                <!--   <a href="#"><i class="fas fa-cog settings-btn"></i></a> -->
                <a href="#" class="listView-x">
                  <i class="fas fa-times">
                  </i>
                </a>
              </nav>
            </nav>
            {{-- Search input --}}
            <div class="flex"> 
              <input type="text" class="messenger-search" placeholder="Search" />
              @if(Auth::user()->roles->first()->title == 'Model'||Auth::user()->roles->first()->title == 'model') 
              <i   data-toggle="modal" data-target="#exampleModalCenter2" class="fas fa-mail-bulk">
              </i>
              @endif
            </div>
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
              <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users"> Recent
              </a>
              <a href="#" @if($type == 'group') class="active-tab" @endif data-view="groups">
                Favorites
              </a> 
              <a href="#" @if($type == 'active') class="active-tab" @endif data-view="actives">
                Active
              </a> 
            </div>
          </div>
          {{-- tabs and lists --}}
          <div class="m-body contacts-container">
            {{-- Lists [Users/Group] --}}
            {{-- ---------------- [ User Tab ] ---------------- --}}
            <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">
              {{-- Favorites --}}
              {{-- Saved Messages --}}
              {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
              {{-- Contact --}}
              <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;">
              </div>
            </div>
            {{-- ---------------- [ Group Tab ] ---------------- --}}
            <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
              {{-- items --}}
              <div class="messenger-favorites app-scroll-thin">
              </div>
            </div>
            <div class="@if($type == 'active') show @endif messenger-tab actives-tab app-scroll" data-view="actives">
              {{-- items --}}
              <div class="messenger-active app-scroll-thin">
              </div>
            </div>
            {{-- ---------------- [ Search Tab ] ---------------- --}}
            <div class="messenger-tab search-tab app-scroll" data-view="search">
              {{-- items --}}
              <p class="messenger-title">Search
              </p>
              <div class="search-records">
                <p class="message-hint center-el">
                  <span>Type to search..
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        {{-- ----------------------Messaging side---------------------- --}}
        <div class="messenger-messagingView">
          {{-- header title [conversation name] amd buttons --}}
          <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
              {{-- header back button, avatar and user name --}}
              <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                <a href="#" class="show-listView">
                  <i class="fas fa-arrow-left">
                  </i>
                </a>
                <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                </div>
                <a href="#" class="user-name">{{ config('chatify.name') }}
                </a>
                <a href="#" class="add-to-favorite">
                  <i class="fas fa-star">
                  </i>
                </a>
              </div>
              {{-- header buttons --}}
              <nav class="m-header-right">
                <a href="#" class="video-call test2" data-call="video" data-toggle="modal" data-target="callingpopup">
                  <i class="fas fa-video" aria-hidden="true">
                  </i>
                </a>
                <a href="#" class="call-chat" data-call="audio" data-toggle="modal" data-target="callingpopup"> 
                  <i class="fas fa-phone"></i>
                </a>
                <a href="#"  data="" class="piggy-bank Tip_model_id" data-toggle="modal" data-target="#TipPoPup"> 
                  <i class="fas fa-piggy-bank" aria-hidden="true">
                  </i>
                </a>
                <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
              </nav>
            </nav>
            </nav>
        </div>
        <div class="modal fade" id="TipPoPup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
              <div class="modal-header-popup ">
            
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="    color: #fff;">x
                  </span>
                </button>
              </div>
              <div class="modal-body">
              <h5 class="modal-title color-white" id="exampleModalLongTitle">Send a tip
                  <br>
                  <div class="tip_option d-flex">
                    <div class="tipoption "value="1">$1
                    </div>
                    <div class="tipoption " value="5">$5
                    </div>
                    <div class="tipoption" value="10">$10
                    </div>
                    <div class="tipoption" value="20">$20
                    </div>
                    <div class="tipoption" value="50">$50
                    </div>
                    <div class="tipoption" value="100">$100
                    </div>
                  </div>
                </h5>
                <form action="{{ url('fan/model-tip') }}" method="post">
                  @csrf
                  <label for="">Tip Amount
                  </label>
                  <input type="number" name="tip_amount" class="form-control tip_amount" value=""
                         placeholder=" Enter Tip amount $1-999" required min="1" max="999">
                  <label for="" class="mt-2">What is this for?
                  </label>
                  <input type="text" class="form-control" name="tip_mess" placeholder="What is this for?"
                         required>
                  <input type="hidden" class="tip_model_id" name="model_id" value="" required>
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="send-tip-btn">Send Tip
                  </button> 
                  </form>
              </div>
            </div>
          </div>
        </div>
        {{-- Internet connection --}}
        <div class="internet-connection">
          <span class="ic-connected">Connected
          </span>
          <span class="ic-connecting">Connecting...
          </span>
          <span class="ic-noInternet">No internet access
          </span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
          <div class="messages">
            <p class="message-hint center-el">
              <span>Please select a chat to start messaging
              </span>
            </p>
          </div>
          {{-- Typing indicator --}}
          <div class="typing-indicator">
            <div class="message-card typing">
              <p>
                <span class="typing-dots">
                  <span class="dot dot-1">
                  </span>
                  <span class="dot dot-2">
                  </span>
                  <span class="dot dot-3">
                  </span>
                </span>
              </p>
            </div>
          </div>
          {{-- Send Message Form --}}
          @include('Chatify::layouts.sendForm')
        </div>
      </div>
      {{-- ---------------------- Info side ---------------------- --}}
      <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
          <a href="#">
            <i class="fas fa-times">
            </i>
          </a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
      </div>
    </div>
    @include('Chatify::layouts.modals')
    @include('Chatify::layouts.footerLinks')
    </div>
  </div>
</div>
</div>
</div>
@include('frontend.fan.section.footer')
@include('frontend.fan.section.footer-scripts')
@endif
@endif
</div>
</div>
</main>

</wrapper>

{{-- modal for calling --}}

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary " id="openmodallll" data-toggle="modal" style="padding:50px; height:100px; width:200px;" data-target="#hellomodal">
  Launch demo
</button> -->

<!-- Modal -->
<div class="modal fade" id="hellomodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="hellomodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <span class="close_calling">X</span>
    <div class="modal-content">
      <div class="modal-body"> 
        @include('vendor.Chatify.pages.calling')
      </div> 
    </div>
  </div>
</div>




<script>
  function openssdsds(){
  $('#hellomodal').show();
  $('#hellomodal').modal("show");
}


  function makeTimer() {
    $postime = $('.posttime').val();
    //  alert($postime);
    var endTime = new Date($postime);
    endTime = (Date.parse(endTime) / 1000);
    endTime = endTime + 28800;
    var now = new Date();
    now = (Date.parse(now) / 1000);
    var timeLeft = endTime - now;
    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
    if (hours < "10") {
      hours = "0" + hours;
    }
    if (minutes < "10") {
      minutes = "0" + minutes;
    }
    if (seconds < "10") {
      seconds = "0" + seconds;
    }
    if (hours == '00' && minutes == '00' && seconds == '00') {
      location.reload();
    }
    else {
      $("#hours").html(hours);
      $("#minutes").html("<span>:</span>" + minutes);
      $("#seconds").html("<span>:</span>" + seconds);
    }
  }
  setInterval(function() {
    makeTimer();
  }, 1000);
  
</script>                         


<!-- SOUNDS -->
<audio id="endCallSignal" preload="auto">
  <source src="{{ url('videojs/audio/end_of_call.ogg')}}" type="audio/ogg"/>
  <source src="{{ url('videojs/audio/end_of_call.mp3')}}" type="audio/mp3"/>
</audio>

<audio id="callingSignal" loop preload="auto">
  <source src="{{ url('videojs/audio/calling.ogg')}}" type="audio/ogg"/>
  <source src="{{ url('videojs/audio/calling.mp3')}}" type="audio/mp3"/>
</audio>

<audio id="ringtoneSignal" loop preload="auto">
  <source src="{{ url('videojs/audio/ringtone.ogg')}}" type="audio/ogg"/>
  <source src="{{ url('videojs/audio/ringtone.mp3')}}" type="audio/mp3"/>
</audio>





<script type="text/template" id="tpl_device_not_found">
  Error: devices (camera or microphone) are not found.
  <span class="qb-text">Login in <b>as <%=name%></b></span>
  <button class='fw-link j-logout'>Logout</button>
</script>

<script type="text/template" id="tpl_call_status">
  <% if(typeof(users.accepted) !== 'undefined') { %>
  <%  _.each(users.accepted, function(el, i, list) { %>
  <% if(list.length === 1){ %>
  <b><%= el.full_name %></b> has accepted the call.
  <% } else { %>
  <% if( (i+1) === list.length) { %>
  <b><%= el.full_name %></b> have accepted the call.
  <% } else { %>
  <b><%= el.full_name %></b>,
  <% } %>
  <% } %>
  <% }); %>
  <% } %>

  <% if(typeof(users.rejected) !== 'undefined') { %>
  <%  _.each(users.rejected, function(el, i, list) { %>
  <% if(list.length === 1){ %>
  <b><%= el.full_name %></b> has rejecterd the call.
  <% } else { %>
  <% if( (i+1) === list.length) { %>
  <b><%= el.full_name %></b> have rejecterd the call.
  <% } else { %>
  <b><%= el.full_name %></b>,
  <% } %>
  <% } %>
  <% }); %>
  <% } %>
</script>



<script type="text/template" id="dashboard_tpl">
  <div class="state_board j-state_board"></div>

  <div class="dashboard__inner inner">
      <!-- <div class="users j-users_wrap"></div> -->

      <div class="board clearfix j-board"></div>
  </div>
</script>

<script type="text/template" id="frames_tpl">
  <div class="frames">
      <div class="frames__main">
          <div class="frames__main_timer invisible" id="timer">
          </div>

          <div class="qb-video">
              <video id="main_video" class="frames__main_v qb-video_source" autoplay playsinline></video>
          </div>
      </div>

      <div class="frames__callees j-callees"></div>
  </div>

  <div class="caller">
      <div class="caller__ctrl">
          <button class="caller__ctrl_btn j-actions m-video_call" data-call="video"></button>
          <button class="caller__ctrl_btn j-actions m-audio_call" data-call="audio"></button>
      </div>

      <h4 class="caller__name">
          <b>You</b>
          <span class="j-caller_name">(<%= nameUser %>)</span>
      </h4>

      <div class="caller__frames">
          <div class="qb-video">
              <video id="localVideo" class="qb-video_source" autoplay playsinline></video>
          </div>

          <div class="caller__frames_acts">
              <button class="caller__frames_acts_btn j-caller__ctrl" data-target="video">
                  <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-290.000000, -80.000000)">
                              <g transform="translate(288.000000, 78.000000)">
                                  <path d="M0 0L24 0 24 24 0 24 0 0Z"/>
                                  <path class="svg_icon"
                                        d="M21 6.5L17 10.5 17 7C17 6.45 16.55 6 16 6L9.82 6 21 17.18 21 6.5 21 6.5ZM3.27 2L2 3.27 4.73 6 4 6C3.45 6 3 6.45 3 7L3 17C3 17.55 3.45 18 4 18L16 18C16.21 18 16.39 17.92 16.54 17.82L19.73 21 21 19.73 3.27 2 3.27 2Z"/>
                              </g>
                          </g>
                      </g>
                  </svg>
              </button>

           


              <button class="caller__frames_acts_btn j-caller__ctrl" data-target="audio">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-347.000000, -80.000000)">
                              <g transform="translate(344.000000, 78.000000)">
                                  <path d="M0 0L24 0 24 24 0 24 0 0Z"/>
                                  <path class="svg_icon"
                                        d="M19 11L17.3 11C17.3 11.74 17.14 12.43 16.87 13.05L18.1 14.28C18.66 13.3 19 12.19 19 11L19 11ZM14.98 11.17C14.98 11.11 15 11.06 15 11L15 5C15 3.34 13.66 2 12 2 10.34 2 9 3.34 9 5L9 5.18 14.98 11.17 14.98 11.17ZM4.27 3L3 4.27 9.01 10.28 9.01 11C9.01 12.66 10.34 14 12 14 12.22 14 12.44 13.97 12.65 13.92L14.31 15.58C13.6 15.91 12.81 16.1 12 16.1 9.24 16.1 6.7 14 6.7 11L5 11C5 14.41 7.72 17.23 11 17.72L11 21 13 21 13 17.72C13.91 17.59 14.77 17.27 15.54 16.82L19.73 21 21 19.73 4.27 3 4.27 3Z"/>
                              </g>
                          </g>
                      </g>
                  </svg>
              </button>

            

              
          </div>

        

        

          
      </div>
  </div>
</script>

<script type="text/template" id="users_tpl">

  <!-- <div style="padding-bottom: 10px;">
      <input type="text" id="search_by_username" class="join__input j-join__username" style="height: 50px;"
             name="username" placeholder="Username" autofocus="" required="">
  </div> -->

  <div class="users__title" title="Choose a user to call">
      Choose a user to call
      <button class="users__refresh j-users__refresh" title="click to refresh">
          <svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg"
               xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="UI" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Main" transform="translate(-435.000000, -178.000000)">
                      <g id="ic_refresh" transform="translate(431.000000, 174.000000)">
                          <g id="Icon-24px" sketch:type="MSShapeGroup">
                              <path d="M0,0 L24,0 L24,24 L0,24 L0,0 Z" id="Shape"></path>
                              <path d="M17.65,6.35 C16.2,4.9 14.21,4 12,4 C7.58,4 4.01,7.58 4.01,12 C4.01,16.42 7.58,20 12,20 C15.73,20 18.84,17.45 19.73,14 L17.65,14 C16.83,16.33 14.61,18 12,18 C8.69,18 6,15.31 6,12 C6,8.69 8.69,6 12,6 C13.66,6 15.14,6.69 16.22,7.78 L13,11 L20,11 L20,4 L17.65,6.35 L17.65,6.35 Z"
                                    id="Shape" fill="#808080"></path>
                          </g>
                      </g>
                  </g>
              </g>
          </svg>
      </button>
  </div>

  <div class="users__list j-users">
  </div>
</script>

<script type="text/template" id="user_tpl">
  <div class="users__item">
      <button class="users__user j-user" data-id="<%= id %>" data-login="<%= login %>" data-name="<%= full_name %>">
          <i class="user__icon"></i>
          <span class="user__name"><%= full_name %></span>
          <i class="users__btn_remove j-user-remove"></i>
      </button>
  </div>
</script>

<script type="text/template" id="callee_video">
  <div class="frames_callee callees__callee j-callee">
      <div class="frames_callee__inner">
          <p class="frames_callee__status j-callee_status_<%=userID%>">
              <%=state%>
          </p>

          <div class="qb-video">
              <video class="j-callees__callee__video qb-video_source"
                     id="remote_video_<%=userID%>"
                     data-user="<%=userID%>" autoplay playsinline>
              </video>
          </div>
      </div>

      <p class="frames_callee__name"><%=name%></p>

      <div class="frames_callee__bitrate">
          <span id="bitrate_<%=userID%>">0</span> kbps
      </div>
  </div>
</script>

<!-- SCRIPT -->
<!-- dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Check our qbMediaRecorder https://github.com/QuickBlox/javascript-media-recorder -->
<script src="https://unpkg.com/media-recorder-js@2.0.0/qbMediaRecorder.js"></script>

<!-- QB -->
<script src="{{ url('videojs/quickblox.js') }}"></script>
<!-- app -->
<script src="{{ url('videojs/config.js') }}"></script>
<script src="{{ url('videojs/js/helpers.js') }}"></script>
<script src="{{ url('videojs/js/stateBoard.js') }}"></script>
<script src="{{ url('videojs/js/app.js') }}"></script>

<!-- hack for github Pages -->
<script>
  var host = "quickblox.github.io";
  if ((host == window.location.host) && (window.location.protocol != "https:"))
      window.location.protocol = "https";
</script>
</body>

</html>