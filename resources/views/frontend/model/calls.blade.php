@extends('frontend.model.main')
@section('content')
<style>
   .feed-table{
   overflow: scroll;
   }
   ckeckfilter .filterbig-checkbox:checked+label:after {
   font-size: 14px;
   left: 0;
   color: #c73ca9;
   border: 1px solid;
   padding: 0px 4px;
   border-radius: 2px;
   }
   .ckeckfilter .filter-checkbox:checked+label {
   background: #0c1d2d;
   border: 1px solid #0c1d2d;
   border-radius: 4px;
   }
   .ckeckfilter .filterbig-checkbox+label {
   padding: 11px;
   margin-right: 5px;
   height: 11px !important;
   /* margin-top: 10px !important; */
   }
   .ckeckfilter .filter-checkbox+label {
   background: #0c1d2d;
   border: 1px solid #2d4e6d;
   box-shadow: 0 1px 2px rgb(0 0 0 / 5%), inset 0px -15px 10px -12px rgb(0 0 0 / 5%);
   padding: 9px;
   border-radius: 3px;
   display: inline-block;
   position: relative;
   cursor: pointer;
   }
   .tab-pane.fade{
   display:none;
   }
   .tab-pane.fade.show.active{
   display:block;
   }
   td, th {
  border-bottom: none !important; 
    text-align: left;
    padding: 12px;
    font-size: 16px;
}
   .nav-link.nav_tab.active small{
   font-family: 'Montserrat';
   font-style: normal;
   font-weight: 600;
   font-size: 16px;
   line-height: 20px;
   text-align: center;
   color: #C73CA9;
   padding-bottom:10px;
   border-bottom:2px solid #C73CA9; 
   }
   li.nav-item.chat_nav {
   padding: 8px 40px 0px 0px;
   text-align: center;
   }
   .switch {
   position: relative;
   width: 60px;
   height: 34px;
   margin: -6px 9px;
   }
   .nav-link.nav_tab small:hover{
   font-family: 'Montserrat';
   font-style: normal;
   font-weight: 600;
   font-size: 16px;
   line-height: 20px;
   text-align: center;
   }
   .nav-link.nav_tab small:hover{
   font-family: 'Montserrat';
   font-style: normal;
   font-weight: 600;
   font-size: 16px;
   line-height: 20px;
   text-align: center;
   color: #C73CA9;
   padding-bottom:10px;
   border-bottom:2px solid #C73CA9; 
   }
   .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
   border:none;
   }
   select.form-select {
   width: 116px;
   background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    /* border: 1px solid #8429aa !important; */
    color: #fff;
   padding: 10px;
   }
   select.form-select:hover{
       border: 1px solid #a42997 !important;
    color: #c7009c !important;
    background: 0 !important;

   }
   td, th {
   border-bottom: 1px solid #202c3e;
   text-align: left;
   padding: 12px;
   font-size: 16px;
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
   padding: 7px 12px;
   color: #fff;
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
   .custom a.btn2:hover {
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
   /*new added*/
   tr.mobile_table_row td,th {
    font-size: 14px;
}
</style>
<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
   <div class="row mb-4">
      @php
      $dt = new DateTime();
      $laraveltime1 = $dt->format('Y-m-d H:i:s');
      $date11 = new DateTime($model->audio_call_end_time);
      $date22 = new DateTime($laraveltime1);
      $difference1 = $date22->diff($date11);
      @endphp
      <input class="posttime1" type="hidden" value="{{ $model->audio_call_end_time}}">
      <input class="laraveltime1" type="hidden" value="{{ $laraveltime1 }}">
      <div class="col-12  mt-4">
         <div class="card-body text-white">
            <div class=" justify-content-between row">
               <div class="col-12 col-sm-12  col-md-12 col-lg-6 mt-3">
                  <p class="text_headings">Calls</p>
                  <small class="text-muted1">Incoming calls will come from {{  Auth::user()->bbphone}}</small>
               </div>
               <div class="col-6 col-sm-6 col-md-6 col-lg-3 mt-3" id="phone">
                  <div class="form-check form-switch pl-0" style="float: right;">
                     <div class="d-flex">
                        <small class="mode_dwitch">Phone Calls</small>
                        <div class="switch">
                           <input type="checkbox"  id="phone-call-ajax" @if( isset($model->phone) && $model->phone =="1")  checked @endif>
                           <label for="phone-call-ajax"><span></span></label>
                        </div>
                     </div>
                     <br>
                     <small class="text-muted1 home-page-call-timer" >
                       
                        <div class="d-flex pr-2" id="timer" style="float: right;" >
                           <div id="days1">
                           </div>
                           <div id="hours1">
                           </div>
                           <div id="minutes1"></div>
                           <div id="seconds1"></div>
                        </div>
                       
                     </small>
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
               <div class="col-6 col-sm-6  col-md-6 col-lg-3 mt-3"  id="video">
                  <div class="form-check form-switch pl-0" style="float: right;">
                     <div class="d-flex">
                        <small class="mode_dwitch">Video Calls</small>
                        <div class="switch">
                           <input type="checkbox" id="video-call-ajax" @if( isset($model->video) && $model->video =="1")  checked @endif>
                           <label for="video-call-ajax"><span></span></label>
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
               <!-- <button class="btn feel-btn text-white mt-3">View call log</button> -->
            </div>
         </div>
      </div>
   </div>
   <div class="row d-flex justify-content-between">
      <div class=" col-md-12 col-sm-12 col-xl-8 col-lg-8 ">
         <ul class="nav nav-pills mb-3 d-flex justify-content-start" id="pills-tab" role="tablist">
            <li class="nav-item chat_nav">
               <a class="nav-link nav_tab active" id="pills-Calls-tab" data-toggle="pill" href="#pills-Calls" role="tab" aria-controls="pills-Calls" aria-selected="true" > <small>All Calls</small></a
                  >
            </li>
            <li class="nav-item chat_nav">
               <a class="nav-link nav_tab" id="pills-Phone-tab" data-toggle="pill" href="#pills-Phone" role="tab" aria-controls="pills-Phone" aria-selected="false">
                  <div>
                     <small>Phone</small>
                  </div>
               </a>
            </li>
            <li class="nav-item chat_nav">
               <a class="nav-link nav_tab" id="pills-Video-tab" data-toggle="pill" href="#pills-Video" role="tab" aria-controls="pills-Video" aria-selected="false">
                  <div>
                     <small>Video</small>
                  </div>
               </a>
            </li>
         </ul>
      </div>
      <div class="col-md-12 col-sm-12 col-xl-4 col-lg-4 text-right">
         <form action="" id="yearfilter"  method="get">

            <select name="year" class=" ml-auto form-select text-white year mb-3" aria-label="Default select example">
               <option value="">select</option>

               @for($i=0; $i<=6; $i++){
               @php $newDateTime = \Carbon\Carbon::now()->subYears($i); @endphp
               <option class="earning-filter-option" value="{{$newDateTime->format('Y')}}" @if(request()->get('year')==$newDateTime->format('Y')) selected @endif >{{$newDateTime->format('Y')}} </option>
               }
               @endfor
            </select>
         </form>
      </div>
   </div>
   <div class="row">
      <div
         class="tab-pane fade show active col-12 "
         id="pills-Calls"
         role="tabpanel"
         aria-labelledby="pills-Calls-tab"
         >
         <table  class="desktop_table feed-table text-white p-5" >
            <tr class="t_head mobile_table_row">
               <th>Date: Time</th>
               <th>Username</th>
               <th>Call Duration</th>
               <th>Earnings</th>
            </tr>
            
            @foreach($calls as $item)
            @php
            // $dt = new DateTime();
            // $date1 = new DateTime($item->end_time);
            // $date2 = new DateTime($item->start_time);
            // $difference = $date1->diff($date2);
            // $diffInSeconds = $difference->s;
            // $diffInMinutes = $difference->i; 
            // $diffInHours = $difference->h; 
            @endphp
            <tr class="border-bottom-1 mobile_table_row">
               <td>
                  @if($item->call_type == 'video_call') 
                  <i class="bi bi-camera-video"></i>
                  @else
                  <i class="bi bi-telephone"></i>
                  @endif
                  {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
               </td>
               <td>{{$item->user->first_name ?? ''}}</td>
               <td>{{$item->total_mint}}</td>
               <td>${{($item->total_earning)}}</td>
            </tr>
            @endforeach
         </table>
         <div class="mobile_table">

          @foreach($calls as $item)
          @php
         //  $dt = new DateTime();
         //  $date1 = new DateTime($item->end_time);
         //  $date2 = new DateTime($item->start_time);
         //  $difference = $date1->diff($date2);
         //  $diffInSeconds = $difference->s;
         //  $diffInMinutes = $difference->i; 
         //  $diffInHours = $difference->h; 
          @endphp
          <div class="mobile_table_card">
            <table>
              <tbody>
                <tr class="mobile_table_row">
                  <th scope="row">Date: Time:</th>
                  <td>
                    @if($item->call_type == 'video_call') 
                    <i class="bi bi-camera-video"></i>
                    @else
                    <i class="bi bi-telephone"></i>
                    @endif
                    {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
                  </td>
                </tr>
                <tr class="mobile_table_row">
                  <th scope="row">Username:</th>
                  <td>{{$item->user->first_name ?? ''}}</td>
                </tr>
                <tr class="mobile_table_row">
                  <th scope="row">Call Duration:</th>
                  <td>{{$item->total_mint}}</td>
                </tr>
                <tr class="mobile_table_row">
                  <th scope="row">Earnings:</th>
                  <td>${{($item->total_earning)}}</td>
                </tr>
              </tbody>
            </table>
           </div>
          @endforeach
     
         </div>
      </div>
      <div class="tab-pane fade col-12 over-flow" id="pills-Phone"  role="tabpanel" aria-labelledby="pills-Phone-tab"  style="color: #fff; " >
         <table class=" desktop_table feed-table text-white p-5">
            <tr class="t_head">
               <th>Date: Time</th>
               <th>Username</th>
               <th>Call Duration</th>
               <th>Earnings</th>
            </tr>
            
            @foreach($audiocalls as $item)
            @php
            // $dt = new DateTime();
            // $date1 = new DateTime($item->end_time);
            // $date2 = new DateTime($item->start_time);
            // $difference = $date1->diff($date2);
            // $diffInSeconds = $difference->s;
            // $diffInMinutes = $difference->i; 
            // $diffInHours = $difference->h; 
            @endphp
            <tr class="mobile_table_row">
               <td>
                  <i class="bi bi-telephone"></i>
                  {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
               </td>
               <td>{{$item->user->first_name ?? ''}}</td>
               <td>{{$item->total_mint}}</td>
               <td>${{($item->total_earning)}}</td>
            </tr>
            @endforeach
         </table>

         <div class="mobile_table">
         @foreach($audiocalls as $item)
         @php
         // $dt = new DateTime();
         // $date1 = new DateTime($item->end_time);
         // $date2 = new DateTime($item->start_time);
         // $difference = $date1->diff($date2);
         // $diffInSeconds = $difference->s;
         // $diffInMinutes = $difference->i; 
         // $diffInHours = $difference->h; 
         @endphp
         <div class="mobile_table_card">
           <table>
             <tbody>
               <tr class="mobile_table_row">
                 <th scope="row">Date: Time:</th>
                 <td>
                   @if($item->call_type == 'video_call') 
                   <i class="bi bi-camera-video"></i>
                   @else
                   <i class="bi bi-telephone"></i>
                   @endif
                   {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
                 </td>
               </tr>
               <tr class="mobile_table_row">
                 <th scope="row">Username:</th>
                 <td>{{$item->user->first_name ?? ''}}</td>
               </tr>
               <tr class="mobile_table_row">
                 <th scope="row">Call Duration:</th>
                 <td>{{$item->total_mint}} </td>
               </tr>
               <tr class="mobile_table_row">
                 <th scope="row">Earnings:</th>
                 <td>${{($item->total_earning)}}</td>
               </tr>
             </tbody>
           </table>
          </div>
         @endforeach
        </div>

      </div>
      <div class="tab-pane fade  col-12 over-flow"   id="pills-Video"    role="tabpanel"aria-labelledby="pills-Video-tab"style="color: #fff; ">
         <table class=" desktop_table feed-table text-white p-5">
            <tr class="t_head">
               <th>Date: Time</th>
               <th>Username</th>
               <th>Call Duration</th>
               <th>Earnings</th>
            </tr>
            @foreach($videocalls as $item)
            @php
            // $dt = new DateTime();
            // $date1 = new DateTime($item->end_time);
            // $date2 = new DateTime($item->start_time);
            // $difference = $date1->diff($date2);
            // $diffInSeconds = $difference->s;
            // $diffInMinutes = $difference->i; 
            // $diffInHours = $difference->h; 
            @endphp
            <tr class="mobile_table_row">
               <td>
                  <i class="bi bi-camera-video"></i>
                  {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
               </td>
               <td>{{$item->user->first_name ?? ''}}</td>
               <td>{{$item->total_mint}}</td>
               <td>${{($item->total_earning)}}</td>
            </tr>
            @endforeach
         </table>


         <div class="mobile_table">
          @foreach($videocalls as $item)
          @php
          $dt = new DateTime();
          $date1 = new DateTime($item->end_time);
          $date2 = new DateTime($item->start_time);
          $difference = $date1->diff($date2);
          $diffInSeconds = $difference->s;
          $diffInMinutes = $difference->i; 
          $diffInHours = $difference->h; 
          @endphp
          <div class="mobile_table_card">
            <table>
              <tbody>
                <tr class="mobile_table_row">
                  <th scope="row">Date: Time:</th>
                  <td>
                    @if($item->call_type == 'video_call') 
                    <i class="bi bi-camera-video"></i>
                    @else
                    <i class="bi bi-telephone"></i>
                    @endif
                    {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
                  </td>
                </tr>
                <tr class="mobile_table_row">
                  <th scope="row">Username:</th>
                  <td>{{$item->user->first_name ?? ''}}</td>
                </tr>
                <tr class="mobile_table_row">
                  <th scope="row">Call Duration:</th>
                  <td>{{$item->total_mint}} </td>
                </tr>
                <tr class="mobile_table_row">
                  <th scope="row">Earnings:</th>
                  <td>${{($item->total_earning)}}</td>
                </tr>
              </tbody>
            </table>
           </div>
          @endforeach
         </div>
      </div>
   </div>
</div>
</div>
</div>
<script type="text/javascript"src="http://code.jquery.com/jquery-latest.js" ></script>
<script>
   $('.year').on('change', function(){
       $('#yearfilter').submit();
   });
</script>
@endsection
@section('scripts')
@parent
@endsection