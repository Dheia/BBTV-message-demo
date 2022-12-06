@extends('frontend.model.main')
@section('content')
<style>
   .switch {
   position: relative;
   display: inline-block;
   width: 60px;
   height: 34px;
   }
   .switch input { 
   opacity: 0;
   width: 0;
   height: 0;
   }
   .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
   }
   .slider:before {
   position: absolute;
   content: "";
   height: 26px;
   width: 26px;
   left: 4px;
   bottom: 4px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
   }
   input:checked + .slider {
   background-color: #2196F3;
   }
   input:focus + .slider {
   box-shadow: 0 0 1px #2196F3;
   }
   input:checked + .slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(26px);
   }
   /* Rounded sliders */
   .slider.round {
   b
   border-radius: 34px;
   }
   .slider.round:before {
   border-radius: 50%;
   }
   .input-price {
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
   .img-fluid.user_pro_img.m-0 {
   width: 40px !important;
   }
   .minus, .plus {
   width: 20px;
   height: 20px;
   background: #747474;
   border-radius: 4px;
   margin: 4px 3px 6px -1px;
   /* padding: 8px 5px 8px 6px; */
   border: 1px solid #c1a9a9;
   display: inline-block;
   vertical-align: middle;
   text-align: center;
   height: 40px;
   width: 50px;
   }
   #tinymce {
   color: #fff !important;
   }
   small.text-muted1.home-page-call-timer {
   margin: 0px 0px 0px 85px;
   }
   .cp_text {
   background: transparent;
   /* color: #b85bcb; */
   border: 0px;
   color: #C73CA9;
   width: 100%;
   cursor: pointer;
   text-decoration: underline;
   }
   #exampleInputEmail1_ifr html {
   color: #fff !important;
   }
   .tox .tox-toolbar,
   .tox .tox-toolbar__overflow,
   .tox .tox-toolbar__primary {
   background-color: #112435;
   }
   .tox:not(.tox-tinymce-inline) .tox-editor-header {
   background-color: #112435;
   }
   .tox .tox-tbtn svg {
   display: block;
   fill: #ffffff !important;
   }
   html {
   color: #fff !important;
   }
   .switch {
   position: relative;
   width: 60px;
   height: 34px;
   margin: -6px 9px;
   }
   .text-muted1 {
   color: #c1c1c1 !important;
   }
   #v_profile {
   color: #a82a95 !important;
   }
   small.text-muted1.timing {
   margin: 0px 0px 0px 85px;
   }
   .pricing{
   text-align: center;
   }
   .pricing p{
   font-size: 12px;
   font-weight: bold
   }
   .custom .btn2.add2 {
   background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
   color:#fff;
   }
   .custom .btn1 {
   background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
   color:#fff;
   } .custom .btn1.remove {
   background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
   color:#fff;
   }
   .custom .btn2.remove {
   background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
   color:#fff;
   }
   .custom {
   margin-bottom: 20px;
   }
   .custom button{
   padding: .8em;
   }
   .buy-btn{
   padding: .5em 1em;
   background: orange;
   border: none
   }
   button{
   cursor: pointer;
   }
   .custom  a.btn2 {
   border: 1px solid;
   height: 40px;
   width: 40px;
   color: #fff;
   padding:7px 12px;
   border-radius: 0%;
   cursor: pointer;
   display: unset;
   align-items: center;
   justify-content: center;
   outline: none;
   border: none;
   }
   .custom  a.btn1 {
   padding: 6px 11px;
   border: 1px solid;
   height: 40px;
   width: 40px;
   color: #fff;
   border-radius: 0%;
   cursor: pointer;
   display: unset;
   align-items: center;
   justify-content: center;
   outline: none;
   border: none;
   }
   .custom a.btn:hover {
   background: #0e1e2e;
   height: 40px;
   width: 40px;
   transform: rotate(0deg);
   -ms-transform: rotate(0deg);
   -webkit-transform: rotate(0deg);
   border-radius: 7px;
   color: #fff;
   border: 1px solid #fff;
   color: #9b299c !important;
   }
   .custom a.btn1:hover {
   background: #0e1e2e;
   height: 40px;
   width: 40px;
   transform: rotate(0deg);
   -ms-transform: rotate(0deg);
   -webkit-transform: rotate(0deg);
   border-radius: 7px;
   color: #fff;
   border: 1px solid #fff;
   color: #9b299c !important;
   }
   button.feel-btn.text-white.mt-1 {
   padding: 3px 20px;
   }
   @media(max-width: 400px) {
   .container{
   flex-direction: column
   }
   }
   .switch2 label, .switch label span {
   position: absolute;
   left: 2px;
   right: 0;
   top: 0;
   bottom: 0;
   transition-duration: .2s;
   }
   .switch2 {
   position: relative;
   width: 60px;
   height: 34px;
   margin: -5px 7px;
   }
   /*new added*/
    @media only screen and (max-width: 350px) {
  .post_btn.d-flex.row {
    margin-right: 44px;
}
}
    @media only screen and (min-width: 1200px) {
 .col-lg-3.col-md-5.col-sm-6.col-12.d-flex.mt-4.mode_btn {
    padding-left: 48px !important;
    padding-right: 0px !important;
}
}
.mode_dwitch{
    font-size: 11.3px;
}
.phon_switch {
    position: relative;
    width: 61px;
    height: 26px;
    margin: -6px 9px -6px 10px;
}

/*.switch_span  {
    width: 21px !important;
    height: 21px !important;
}
label.lab_switch {
    height: 27px;
    width: 57px;
    margin-left: 2px;
}*/
a.feel-btn {
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    color: #fff;
    border: 1px solid #8429aa !important;
}
a.feel-btn:hover {
    border: 1px solid #a42997 !important;
    color: #c7009c !important;
    background: 0 !important;
}
.mce-content-body[data-mce-placeholder]:not(.mce-visualblocks)::before {
    color: rgb(139 144 151 / 70%) !important;
    content: attr(data-mce-placeholder);
    position: absolute;
}
.mce-content-body:not([dir=rtl])[data-mce-placeholder]:not(.mce-visualblocks)::before {
    left: 1px;
    color: rgb(139 144 151 / 70%) !important;
}
body#tinymce::before {
    color: #f45515 !important;
}
.tox-dialog {
    background: #091625 !important;
}
div.tox-tab {
    color: #fff !important;
}
.tox-dialog__header {
    background-color: #091625 !important;
    color: #fff !important;
}
.tox-dialog__footer {
    background: #091625 !important;
}
input#form-field_1507934642131669359514419 {
    background: #112435 !important;
}
input#form-field_3934584092131669359991215 {
    background-color: #112435 !important;
}
body#tinymce::before {
    color: #fff;
}
.text.cp_text.copy-input:focus-visible{
   outline: none;

}
span.minus.price_minus {
      margin: 8px -17px 0px 4px;
    /* position: absolute; */
    z-index: 999;
    height: 28px;
    width: 35px;
    padding: 2px;
    border: none;
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
}

span.plus.price_plus {
    margin: 8px 0px 0px -16px !important;
    z-index: 999;
    height: 28px;
    width: 35px;
    padding: 2px;
    border: none;
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
}
div#timer {
    font-size: 13px;
}
</style>
<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
   <div class="row mb-4">
      <div class="card col-12">
         <p>Welcome back, {{Auth::user()->first_name}}</p>
         <div class="card-body text-white">
            <div class="d-flex justify-content-between">
               <div class="name">
                  <p class="text_headings">Post to Profile</p>
               </div>
               @php
               $dataslug=  Auth::user()->slug;
               @endphp
               <div class=" ">
                  <small>
                     <a class="view" id="v_profile" href="{{url('/'.$dataslug.'')}}">View Profile |</a> <a class="view" id="v_profile" href="{{url('model/explore')}}" >View Explore</a>
                  </small>
               </div>
            </div>
            <div class="post_img"><img class="img-fluid user_pro_img m-0 "
               src="@if(!empty(Auth::user()->profile_image)) {{ url('profile-image') . '/' . (Auth::user()->profile_image) }} @else {{ url('profile-image/user.png') }} @endif " alt="" /><small
               class="ml-3">{{ Auth::user()->first_name ??'' }}</small></div>
            <div class="textarea">
               <form method="post" action="{{ route('model.feeds.store') }}" enctype="multipart/form-data"
                  id="form_submit">
                  @csrf
                  <div class="form-group">
                     <textarea type="text" name="description" class="form-control mt-4" placeholder="type a message" id="exampleInputEmail1"
                        aria-describedby="emailHelp" maxlength="240"></textarea>
                  </div>
                  <div class="form-group">
                     <div class="file-upload">
                        <!-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> -->
                        <div class="row">
                           <div class="col">
                              <div class="form-group mt-2">
                                 <div class="upload_div"> <label class="upload_label"  for="upload-img"><i
                                    class="fa fa-camera" aria-hidden="true"></i> Add Photo,
                                    Video, Audio</label>
                                 </div>
                                 <input type="file" class="form-control" accept="video/*,image/*"  multiple
                                    id="upload-img" />
                              </div>
                              <span class="images text-danger"></span>
                              <div class="img-thumbs img-thumbs-hidden" id="img-preview">
                                 <div class="price">
                                    <div class="number  mt-3 d-flex">
                                       <span class="minus price_minus">-</span>
                                       <input name="price" class="input-price" type="text"
                                          id="premium_cost" value="0.00" />
                                       <span class="plus ml-1 price_plus">+</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @php
                        $data = App\Models\ModelFeed::where('model_id', Auth::user()->id)
                        ->where('explore', '1')
                        ->where('status', '1')
                        ->Orderby('id', 'desc')
                        ->first();
                        @endphp
                        @if (!empty($data))
                        @php
                        $dt = new DateTime();
                        $laraveltime = $dt->format('Y-m-d H:i:s');
                        $date1 = new DateTime($data->schedule_date);
                        $date2 = new DateTime($laraveltime);
                        $difference = $date1->diff($date2);
                        $diffInSeconds = $difference->s; //45
                        $diffInMinutes = $difference->i; //23
                        $diffInHours = $difference->h; //8
                        $diffInDays = $difference->d; //21
                        $diffInMonths = $difference->m; //4
                        $diffInYears = $difference->y;
                        @endphp
                        <input class="posttime" type="hidden" value="{{ $data->schedule_date }}">
                        <input class="laraveltime" type="hidden" value="{{ $laraveltime }}">
                        @else
                        @php
                        $diffInSeconds = '60';
                        $diffInMinutes = '60';
                        $diffInHours = '2';
                        $diffInDays = '2';
                        @endphp
                        @endif
                        {{-- 
                        <div class="post_btn ">
                           --}}
                           <div class="post_btn d-flex  row">
                              @if ($diffInDays == 0 && $diffInHours <= 1 && $diffInMinutes <= 59 && $diffInSeconds <= 58)
                              <div class="sec_1 d-flex Available col-4">
                                 <p class="mr-2">Available in</p>
                                 <p id="hours"> </p>
                                 <p id="minutes"> </p>
                                 <p id="seconds"> </p>
                              </div>
                              @else
                              <!-- <div class="sec_1 explore_checkbox">
                                 <input class="form-check-input" type="checkbox" value="1"
                                     id="flexCheckChecked" name="explore">
                                 <label class="form-check-label" for="flexCheckChecked"> </label>
                                 </div> -->
                            
                              @if(Auth::user()->status=="Inreview") 
                                            <p class="text-grey mt-3 ml-5">Your account is In review <br> You can't able post to explore</p>
                                            @else
                                            <div class=" sec_1 explore_checkbox ckeckfilter col-4">
                                 <input type="checkbox" id="checkbox-15" name="explore" value="1"
                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                 <label for="checkbox-15"></label>
                                 <p class="text-grey mt-3">Post to Explore </p>
                              </div>
                                            @endif
                              @endif
                              <input type="hidden" id="count" value="1" name="save_as_draft">
                              <div class="time_wrapper mb-3 col-md-12 col-xl-6 col-sm-12">
                                 <label for="">Schedule Time</label>
                                 <div class="schedule_timing d-flex">
                                    <input type="date" name="schedule_date"
                                       class="form-control schedule_date">
                                    <input type="time" name="schedule_time"
                                       class=" form-control schedule_time ml-2">
                                 </div>
                              </div>
                              <div class="saveasdraft col-4" style="display: none;">
                                 <input type="hidden" name="status" value="1">
                              </div>
                              <div class="sec_1">
                                 <button type="submit" class="btn btn-primary post_now sub_btn">Post
                                 Now</button>
                                 <button type="submit" class="btn btn-primary post_draft sub_btn ">Save
                                 Draft</button>
                                 <button type="submit"
                                    class="btn btn-primary post_schedule sub_btn">Schedule Post</button>
                                 <div class="select">
                                    <select class="save_val" id="purpose">
                                       <option value="2" class="post_now_btn earning-filter-option" >Post Now</option>
                                       <option value="0" class="draft_post earning-filter-option">Save as Draft</option>
                                       <option value="1" class="schedule_post earning-filter-option">Schedule Post
                                       </option>
                                    </select>
                                 </div>
                              </div>
                           </div>
               </form>
               </div>
               </div>
               </div>
            </div>
            <div>
            </div>
         </div>
         @php
         $dt = new DateTime();
         $laraveltime1 = $dt->format('Y-m-d H:i:s');
         $date11 = new DateTime($model->audio_call_end_time);
         $date22 = new DateTime($laraveltime1);
         $difference1 = $date22->diff($date11);
         @endphp
         <input class="posttime1" type="hidden" value="{{ $model->audio_call_end_time ?? ''}}">
         <input class="laraveltime1" type="hidden" value="{{ $laraveltime1 }}">
         <div class="col-12  mt-4">
            <div class="card-body text-white">
               <div class=" justify-content-between row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                     <p class="text_headings">Calls</p>
                     <small class="text-muted1">Incoming calls will come from {{  Auth::user()->bbphone}}</small>
                  </div>
                  <div class="col-6 col-sm-6 pr-0 col-md-6 col-lg-3 mt-3" id="phone">
                     <div class="form-check form-switch pl-0" style="float: left;">
                        <div class="d-flex">
                           <small class="mode_dwitch">Phone Calls</small>
                           <div class="switch phon_switch">
                              <input type="checkbox"  id="phone-call-ajax" @if( isset($model->phone) && $model->phone =="1")  checked @endif>
                              <label class="lab_switch" for="phone-call-ajax"><span class="switch_span"></span></label>
                           </div>
                        </div>
                        <br>
                        <small class="text-muted1 home-page-call-timer audio-call-timer" >
                           <!-- @if($model->phone == '1') -->
                           <!-- @endif -->
                        </small>
                        <div class="d-flex pr-2 text-muted1" id="timer" style="float: right;" >
                           <div id="days1">
                           </div>
                           <div id="hours1">
                           </div>
                           <div id="minutes1"></div>
                           <div id="seconds1"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 col-sm-6  col-md-6 col-lg-3 mt-3 d-none" id="pprice">
                     <div class="pricing">
                        <form action="" method="post" id="callable">
                           @csrf
                           <input type="hidden" class="phour" name="hour" value="1">
                           <input type="hidden" class="calling" name="calling" value="1">
                           <div class="custom">
                              <a class="btn2 remove">&minus;</a>
                              <a class="btn2 add2">&plus;</a>
                           </div>
                           <div class="add-to-cart">
                              <p name="hour" >
                                 <span class="quantity2" >1</span>
                                 Hour
                              </p>
                              <button type="button" class="feel-btn text-white mt-1 model-phone-call">Add</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  @php
                  $dt = new DateTime();
                  $laraveltime11 = $dt->format('Y-m-d H:i:s');
                  $date111 = new DateTime($model->video_call_endtime);
                  $date222 = new DateTime($laraveltime11);
                  $difference11 = $date222->diff($date111);
                  @endphp
                  <input class="posttime11" type="hidden" value="{{ $model->video_call_endtime}}">
                  <input class="laraveltime1" type="hidden" value="{{ $laraveltime11 }}">
                  <div class="col-6 col-sm-6 pr-0  col-md-6 col-lg-3 mt-3"  id="video">
                     <div class="form-check form-switch pl-0" style="float: right;">
                        <div class="d-flex">
                           <small class="mode_dwitch">Video Calls </small>
                           <div class="switch phon_switch">
                              <input type="checkbox" id="video-call-ajax" @if( isset($model->video) && $model->video =="1")  checked @endif>
                              <label class="lab_switch" for="video-call-ajax"><span class="switch_span"></span></label>
                           </div>
                        </div>
                        <br>
                        <small class="text-muted1 home-page-call-timer">
                         
                           <div class="d-flex pr-2" id="timer1" style="float: right;" >
                              <div id="days2"></div>
                              <div id="hours2"></div>
                              <div id="minutes2"></div>
                              <div id="seconds2"></div>
                           </div>
                         
                        </small>
                     </div>
                  </div>
                  <div class="col-6 col-sm-6  col-md-6 col-lg-3 mt-3 d-none" id="vprice">
                     <div class="pricing">
                        <form action="" method="post" id="videoable">
                           @csrf
                           <input type="hidden" class="vhour" name="hour" value="1">
                           <input type="hidden" class="calling" name="calling" value="1">  
                           <div class="custom">
                              <a class="btn1 remove">&minus;</a>
                              <a class="btn1 add1">&plus;</a>
                           </div>
                           <div class="add-to-cart">
                              <p>
                                 <span class="quantity1">1</span>
                                 Hour
                              </p>
                              <button type="button" class="model-video-call feel-btn text-white mt-1">Add</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div>
                  <a href="{{url('model/calls')}}"> <button class="btn feel-btn text-white mt-3">View call log</button></a>
               </div>
            </div>
         </div>
         <div class="col-12 mt-4">
            <div class="">
               <div class="card-body text-white">
                  @if(!empty($thisyear1))
                  <div class="d-flex justify-content-between">
                     <div class="name">
                        <h6><b>Earnings Summary</b></h6>
                     </div>
                  </div>
                  @endif
                  <div class="row">
                     @if(!empty($thisyear1))
                     <div class="col-sm-6 earn_col col-lg-3 col-md-3 col-6 mt-3">
                        <small class="">Today</small>
                        @if(isset($today->summ ) )
                        @if(isset($yesterday->summ))
                        <h5 class="income-text"><b>${{$today->summ ?? ''}}</b></h5>
                        <div class="up_text">
                           <i class="bi m-0 bi-arrow-up-short"></i><small class="text-success">${{$calcutoday ?? ''}}( @if($today->summ  < $yesterday->summ) {{(number_format($pertoday ?? '', 2, '.', ',') )}}% @else  {{(number_format($pertoday ?? '' , 2, '.', ',') )}}% @endif  )</small>
                        </div>
                        @else
                        <h5 class="income-text"><b>${{$today->summ ?? ''}}</b></h5>
                        <div class="up_text">
                           <i class="bi m-0 bi-arrow-up-short"></i><small class="text-success">${{$calcutoday ?? ''}} {{$today->summ ?? '' }} </small>
                        </div>
                        @endif
                        @else
                        <h5 class="income-text"><b>$0</b></h5>
                        <div class="down_text">
                           <i class="bi m-0 bi-arrow-down-short"></i><small class="text-danger">$(-100%)</small>
                        </div>
                        @endif
                     </div>
                     <div class="col-sm-6 earn_col1 col-lg-3 col-md-3 col-6 mt-3">
                        <small class="">Last 7 Days</small>
                        @if(isset($last7->summ))
                        <h5 class="income-text"><b>${{$last7->summ ?? ''}}</b></h5>
                        @if($last7->summ < $back7)
                        <div class="down_text">
                           <i class="bi m-0 bi-arrow-down-short"></i><small class="text-danger">${{$calcuseven ??  ''}}( {{(number_format($perseven ?? '' , 2, '.', ',') )}}%   )</small>
                        </div>
                        @else
                        <div class="up_text">
                           <i class="bi m-0 bi-arrow-up-short"></i><small class="text-success">${{$calcuseven ?? ''}}(  {{(number_format($perseven ?? '' , 2, '.', ',') )}}% )</small>
                        </div>
                        @endif
                        @endif
                     </div>
                     <div class="col-sm-6 earn_col2 col-lg-3 col-md-3 col-6 mt-3">
                        <small class="">Last 30 Days</small>
                        @if(isset($thirtyday->summ))
                        <h5 class="income-text"><b>${{$thirtyday->summ ?? ''}}</b></h5>
                        @if($thirtyday->summ < $backmonth)
                        <div class="down_text">
                           <i class="bi m-0 bi-arrow-down-short"></i><small class="text-danger">${{$calcuthirty ?? ''}}( {{(number_format($perthirty ?? '' , 2, '.', ',') )}}%   )</small>
                        </div>
                        @else
                        <div class="up_text">
                           <i class="bi m-0 bi-arrow-up-short"></i><small class="text-success">${{$calcuthirty ?? ''}}(  {{(number_format($perthirty ?? '', 2, '.', ',') )}}% )</small>
                        </div>
                        @endif
                     </div>
                     <div class="col-sm-6  col-lg-3 col-md-3 col-6 mt-3">
                        <small class="">Year to Date</small>
                        <h5 class="income-text"><b>${{$thisyear1->summ ?? ''}}</b></h5>
                        @if($thisyear1->summ < $backyear)
                        <div class="down_text">
                           <i class="bi m-0 bi-arrow-down-short"></i><small class="text-danger">${{$calcuyear ?? ''}}( {{(number_format($peryear ?? '' , 2, '.', ',') )}}%   )</small>
                        </div>
                        @else
                        <div class="up_text">
                           <i class="bi m-0 bi-arrow-up-short"></i><small class="text-success">${{$calcuyear ?? ''}}(  {{(number_format($peryear ?? '' , 2, '.', ',') )}}% )</small>
                        </div>
                        @endif
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endif
         <div class="col-12 mt-4">
            <div class="row">
               <div class="col-lg-6 col-md-12 ">
                  <div class="card">
                     <div class="card-body text-white">
                        <p class="text_headings">Your Unread Messages</p>
                        <div class="earning_msg_box d-flex">
                           <span class="msg_icon"><img class="vect_img"src="/images/Vector.png"
                              alt=""></span>
                           <div class="ml-3">
                              <small class="text-muted1">Unread Messages</small>
                              @php
                    $notification=App\Models\ChMessage::where('to_id',Auth::user()->id)->where('seen','0')->count();
                    @endphp
                              <br><small class="text-muted1">@if($notification>'0') {{$notification}} @endif</small>
                           </div>
                        </div>
                        <a href="{{url('/chatify')}}" class="view "><small class="tags_data pt-3">Click to view all
                        messages</small></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12 ">
                  <div class="card">
                     <div class="card-body text-white">
                        <p class="text_headings">Pay Period Earnings</p>
                        <div class="earning_msg_box  justify-content-between row ">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                              <small class="text-muted1">Jul 16 - 31</small>
                              <br><small class=""><b>$1,513.86</b></small>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                              <small class="text-muted1">Last period</small>
                              <br><small class=""><b>$0.00</b></small>
                           </div>
                        </div>
                        <a href="{{url('model/payout-history')}}" class="view "><small class="tags_data pt-3">Click to view breakdown</small></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 mt-4">
            <div class="">
               <div class="card-body text-white">
                  <p class="text_headings">Promote Your Profile</p>
                  <p>Promoting your profile links on social media is a sure fire way to increase your visibility and
                     earnings.
                  </p>
                  @php
                  $id = Auth::user()->id;
                  @endphp
                  <div class="link_buttons">
                     <div class="copy-text clipboard" >
                        <!-- <a href="#" class="view "><small class="tags_data">{{ url('refferal-apply/?id=') }}{{ $id }}</small></a> -->
                        <!-- <input type="text" class="text cp_text"
                           value="{{ url('refferal-apply/?id=') }}{{ $id }}" disabled />
                           <div class="flex">
                           <button class="btn feel-btn text-white mt-3"><small>Copy Link</small></button>
                           <button class="btn tweet_btn text-white mt-3 ml-3"><small><i class="bi bi-twitter"></i>Tweet</small></button>
                           </div> -->
                        <script src="https://kit.fontawesome.com/d97b87339f.js" crossorigin="anonymous"></script>
                        <input onclick="copy()" class=" text cp_text copy-input" value="{{ url('refferal-apply/?id=') }}{{ $id }}" type="text" id="copyClipboard" readonly>
                        <div class="flex">
                           <button class="copy-btn btn feel-btn text-white mt-3" id="copyButton" onclick="copy()"><small>Copy Link</small></button>
                           <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ url('refferal-apply/?id=') }}{{ $id }}" data-size="large">
                           <button class="btn tweet_btn text-white mt-3 ml-3"><small><i class="bi bi-twitter"></i>Tweet</small></button></a>
                        </div>
                     </div>
                     <div id="copied-success" class="copied">
                        <span>Copied!</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 mt-4">
            <div class="">
               <div class="card-body text-white">
                  <p class="text_headings">$100 Referral Bonus</p>
                  <small class="text-muted1">Copy the referral link and send it via email, text or social media to models
                  who you think would be interested in having model account. For each referred model that earns over
                  $100 on SextPanther, we'll send you a $100 bonus!</small>
                  <div class="type_input mt-4">
                     <div class="col-12 p-0">
                        <div class="form-group d-flex">
                           <input type="" name="" disabled value="{{ url('refferal-apply/?id=') }}{{ $id }}" class="form-control msg_input"
                              placeholder="">
                           <button class="copy-btn btn feel-btn text-white" id="copyButton" onclick="copyToClip_Referral('{{ url('refferal-apply/?id=') }}{{ $id }}')"><small>Copy Link</small></button>
                        </div>
                     </div>
                  </div>
                  <small class="text-muted1">To view you a breakdown of all your current and pending referrals click
                  here.</small><br>
                   <a href="{{url('http://adultx.eoxyslive.com/model/referral-bonus')}}"><button class="btn feel-btn mt-2 text-white "><small>Referral Breakdown</small></button></a>
               </div>
            </div>
         </div>
         <div class="col-12 mt-4">
            <div class=" ">
               <div class="card-body text-white">
                  <div class="row ">
                     <div class="col-lg-9 col-md-7 col-sm-12 col-12">
                        <p class="text_headings">Away Mode</p>
                        <small class="text-muted1">This will set your profile to be "Unavailable". If a contact
                        messages
                        you,an automated response will be sent and they will not be charged.</small>
                     </div>
                     <div class=" col-lg-3 col-md-5 col-sm-6 col-12 d-flex mt-4 mode_btn">
                        <div class="form-switch away-mode-btn">
                           <div class="d-flex">
                              <small class="mode_dwitch">Away mode </small>
                              
                              <div class="switch awaymode">
                                 <input type="checkbox"  id="c21" class="model-away-model" @if(Auth::user()->is_away==true) checked @endif>
                                 <label for="c21"><span></span></label>
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
      </div>
   </div>
</div>
</div>
</div>
<script>
   function copy() {
   var copyText = document.getElementById("copyClipboard");
   copyText.select();
   copyText.setSelectionRange(0, 99999);
   document.execCommand("copy");
   
   $('#copied-success').fadeIn(800);
   $('#copied-success').fadeOut(800);
   }
   
      let copyText = document.querySelector(".copy-text");
      copyText.querySelector("button").addEventListener("click", function() {
          let input = copyText.querySelector("input.text");
          input.select();
          document.execCommand("copy");
          copyText.classList.add("active");
          window.getSelection().removeAllRanges();
          setTimeout(function() {
              copyText.classList.remove("active");
          }, 2500);
      });
      
</script>
@endsection
@section('scripts')
@parent
@endsection