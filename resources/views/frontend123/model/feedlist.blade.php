@extends('frontend.model.main')
@section('content')
<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
<div class="row mb-4">
   <div class="card col-12">
      <div class="card-body text-white">
         <div class="d-flex justify-content-between">
            <div class="name">
               <h6><b>Post to Profile</b></h6>
            </div>
            <div class=" ">
               <small><a class="view" href="">View Profile  |  View Explore</a></small>
            </div>
         </div>
         <div class="post_img"><img class="img-fluid user_pro_img m-0 " src="{{ url('profile-image') . '/' . Auth::user()->profile_image }}" alt="" /><small class="ml-3">{{Auth::user()->first_name}}</small></div>
         <div class="textarea">
            <!-- <form class="mt-2" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
               <div class="col-12 p-0">
                 <div class="form-group ">
                   <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                 </div>
               </div>
               </form> -->
            <form method="post" action="{{route('model.feeds.store')}}" enctype="multipart/form-data" id="form_submit">
               @csrf 
               <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="description...."></textarea>
               </div>
               <div class="form-group">
                  <div class="file-upload">
                     <!-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> -->
                     <div class="row">
                        <div class="col">
                           <div class="form-group mt-2">
                              <input type="file" class="form-control" name="images[]" multiple id="upload-img" />
                           </div>
                           <span class="images text-danger"></span>
                           <div class="img-thumbs img-thumbs-hidden" id="img-preview">
                              <div class="price">
                                 <div class="number  mt-3 d-flex">
                                    <span class="minus">-</span>
                                    <input name="price" class="input-price" type="text" value="0.00" />
                                    <span class="plus ml-1">+</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @php
                     $data = App\Models\ModelFeed::where('model_id',Auth::user()->id)->where('explore','1')->where('status','1')->Orderby('id','desc')->first();
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
                     <div class="post_btn d-flex mr-3">
                        @if($diffInHours >= 1 && $diffInDays == 0 && $diffInMinutes>=59 && $diffInSeconds>=58) 
                        <div class="sec_1 explore_checkbox">
                           <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="explore">
                           <label class="form-check-label" for="flexCheckChecked"> Explore </label>            
                        </div>
                        @else
                        <div class="sec_1 d-flex Available">
                           <p class="mr-2">Available in</p>
                           <p id="hours"> </p>
                           <p id="minutes"> </p>
                           <p id="seconds"> </p>
                        </div>
                        @endif
                        <input class="posttime" type="hidden" value="{{$data->created_at}}">
                        <input class="laraveltime" type="hidden" value="{{$laraveltime}}">
                        <input type="hidden" id="count" value="1" name="save_as_draft">
                        <div class="time_wrapper">
                           <label for="">Schedule Time</label>
                           <div class="schedule_timing d-flex">
                              <input type="date" name="schedule_date" class="form-control schedule_date" >
                              <input type="time" name="schedule_time" class=" form-control schedule_time ml-2">
                           </div>
                        </div>
                        <div class="saveasdraft" style="display: none;">
                           <input type="hidden" name="status" value="1">
                        </div>
                        <div class="sec_1">
                           <button type="submit" class="btn btn-primary post_now sub_btn">Post Now</button>
                           <button type="submit" class="btn btn-primary post_draft sub_btn ">Save Draft</button>
                           <button type="submit" class="btn btn-primary post_schedule sub_btn">Schedule Post</button>
                           <div class="select">
                              <select class="save_val" id="purpose">
                                 <option value="2" class="post_now_btn">Post Now</option>
                                 <option value="0" class="draft_post">Save as Draft</option>
                                 <option value="1" class="schedule_post">Schedule Post</option>
                              </select>
                           </div>
                        </div>
                     </div>
            </form>
            </div>
            <!-- <div class="add_img">
               <input type="file" class="form-control" name="" placeholder="Add Photo, Audio or Video">
               </div>
               <div class="d-flex justify-content-between mt-3">
               <div class="form-check">
                 <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                 <label class="form-check-label" for="flexCheckDefault">
                   Post to Explore
                 </label>
               </div>
               <div class="">
                <button class="btn disabled text-white"><small>Post Now</small></button>
               </div> -->
            </div>
         </div>
      </div>
      <div>
      </div>
   </div>
   <div class="col-12  mt-4">
      <div class=" ">
         <div class="card-body text-white">
            <div class="d-flex justify-content-between">
               <div class="">
                  <h6><b>Calls</b></h6>
                  <small class="text-muted">Incoming calls will come from +1 (980) 409-2807</small>
               </div>
               <div class=" d-flex">
                  <div class="form-check form-switch">
                     <small class="mr-5">Phone Calls</small><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                     <br><small class="text-muted">03:05:25</small>
                  </div>
                  <div class="form-check form-switch">
                     <small class="mr-5">Phone Calls</small><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                     <br><small class="text-muted">03:05:25</small>
                  </div>
               </div>
            </div>
            <div>
               <button class="btn feel-btn text-white mt-3">View call log</button>
            </div>
         </div>
      </div>
      <div>
      </div>
   </div>
   <div class="col-12 mt-4">
      <div class="">
         <div class="card-body text-white">
            <div class="d-flex justify-content-between">
               <div class="name">
                  <h6><b>Earnings Summary</b></h6>
               </div>
               <div class=" ">
                  <small><a class="view" href="">Go to Earnings Overview</a></small>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6 col-lg-3 earn_col col-md-3">
                  <small class="text-muted">Today</small>
                  <h6><b>$1.20</b></h6>
                  <div class="down">
                     <i class="bi m-0 bi-arrow-down-short"></i><small >-$521.87(-99.77%)</small>
                  </div>
                  <small class="text-muted">Yesterday</small>
               </div>
               <div class="col-sm-6 earn_col col-lg-3 col-md-3">
                  <small class="text-muted">Today</small>
                  <h6><b>$1.20</b></h6>
                  <div class="up_text">
                     <i class="bi m-0 bi-arrow-down-short"></i><small >-$521.87(-99.77%)</small>
                  </div>
                  <small class="text-muted">previous 7 days</small>
               </div>
               <div class="col-sm-6 earn_col col-lg-3 col-md-3">
                  <small class="text-muted">Today</small>
                  <h6><b>$1.20</b></h6>
                  <div class="up_text">
                     <i class="bi m-0 bi-arrow-down-short"></i><small>-$521.87(-99.77%)</small>
                  </div>
                  <small class="text-muted">previous 30 days</small>
               </div>
               <div class="col-sm-6  col-lg-3 col-md-3">
                  <small class="text-muted">Today</small>
                  <h6><b>$1.20</b></h6>
                  <div class="up_text"><i class="bi m-0 bi-arrow-up-short"></i>
                     <small class="">-$521.87(-99.77%)</small>
                  </div>
                  <small class="text-muted">previous year to date</small>
               </div>
            </div>
         </div>
         <div>
         </div>
      </div>
   </div>
   <div class="col-12 mt-4">
      <div class="row">
         <div class="col-lg-6 col-md-6 ">
            <div class="card">
               <div class="card-body text-white">
                  <h6><b>Your Unread Messages</b></h6>
                  <div class="earning_msg_box d-flex">
                     <span class="msg_icon"><i class="bi m-0 bi-chat-square-quote-fill"></i></span>
                     <div class="ml-3">
                        <small class="text-muted">Unread Messages</small>
                        <br><small class="text-muted">0</small>
                     </div>
                  </div>
                  <a href="#" class="view "><small >Click to view all messages</small></a>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 ">
            <div class="card">
               <div class="card-body text-white">
                  <h6><b>Pay Period Earnings</b></h6>
                  <div class="earning_msg_box d-flex justify-content-between">
                     <div class="">
                        <small class="text-muted">Jul 16 - 31</small>
                        <br><small class=""><b>$1,513.86</b></small>
                     </div>
                     <div class="">
                        <small class="text-muted">Last period</small>
                        <br><small class=""><b>$0.00</b></small>
                     </div>
                  </div>
                  <a href="#" class="view "><small >Click to view breakdown</small></a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-12 mt-4">
      <div class="">
         <div class="card-body text-white">
            <h6><b>Promote Your Profile</b></h6>
            <p>Promoting your profile links on social media is a sure fire way to increase your visibility and earnings.</p>
            <a href="#" class="view "><small >www.adultx.com/CadenceClyne</small></a>
            <div class="link_buttons d-flex">
               <button class="btn feel-btn text-white mt-3"><small>Copy Link</small></button>
               <button class="btn tweet_btn text-white mt-3 ml-3"><small><i class="bi bi-twitter"></i>Tweet</small></button>
            </div>
         </div>
      </div>
   </div>
   <div class="col-12 mt-4">
      <div class="">
         <div class="card-body text-white">
            <h6><b>Promote Your Profile</b></h6>
            <small class="text-muted">Copy the referral link and send it via email, text or social media to models who you think would be interested in having model account. For each referred model that earns over $100 on SextPanther, we'll send you a $100 bonus!</small>
            <div class="type_input mt-4">
               <form class="mt-2" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
                  <div class="col-12 p-0">
                     <div class="form-group d-flex">
                        <input type="" name="" class="form-control msg_input" placeholder="https://www.sextpanther.com/apply?id=120369">
                        <button class="btn feel-btn link_btn text-white"><small>Copy Link</small></button>
                     </div>
                  </div>
               </form>
            </div>
            <small class="text-muted">To view you a breakdown of all your current and pending referrals click here.</small><br>
            <button class="btn feel-btn mt-2 text-white "><small>Referral Breakdown</small></button>
         </div>
      </div>
   </div>
   <div class="col-12 mt-4">
      <div class=" ">
         <div class="card-body text-white">
            <div class="d-flex justify-content-between">
               <div class="">
                  <h6><b>Away Mode</b></h6>
                  <small class="text-muted">This will set your profile to be "Unavailable". If a contact messages you,an automated response will be sent and they will not be charged.</small>
               </div>
               <div class=" d-flex">
                  <div class="row"><small class="">Away mode is not active</small></div>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div>
      </div>
   </div>
</div>
@endsection
@section('scripts')
@parent
@endsection