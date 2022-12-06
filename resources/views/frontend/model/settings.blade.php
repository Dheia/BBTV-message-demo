                      @extends('frontend.model.main')
                      @section('content')
                      <div class="modal fade" id="dismiss-all-notifications" tabindex="-1" role="dialog" aria-labelledby="draft_ModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content feed_dele_model text-white text-center">
                                Are you sure to dismiss all notifications
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                   <a href="{{url('model/dismiss-notifications')}}"> <button type="submit"  class="btn btn-danger">Dismiss</button></a>
                                </div>
                              </div>
                          </div>
                      </div>
                  <div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
                  <div class="row mb-4">
                                <div class="col-lg-6 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white first_section">
                                    <div class=" row">
                                        <div class="col-6"><small class="head">Notifications</small></div>
                                        <div class="col-3"><small class="head">SMS</small></div>
                                        <div class="col-3"> <small class="head">Email</small></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type"> <small class="type-label">Text Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                      
                                                <input type="checkbox" id="checkbox-1" name="" value="text-message-sms"
                                                    class="filter-checkbox notify SleepCheckbox filterbig-checkbox ckeckoutinpt"  @if(isset($userdata['text-message-sms']) && $userdata['text-message-sms']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif  />
                                                <label class="notify" for="checkbox-1"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-15" name="" value="text-message-email"
                                                    class="filter-checkbox notify  SleepCheckbox filterbig-checkbox ckeckoutinpt"  @if(isset($userdata['text-message-email']) && $userdata['text-message-email']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label">Picture Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-2" name="" value="pic-message-sms"
                                                    class="filter-checkbox notify SleepCheckbox  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['pic-message-sms']) && $userdata['pic-message-sms']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-2"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-14" name="" value="pic-message-email"
                                                    class="filter-checkbox notify SleepCheckbox  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['pic-message-email']) && $userdata['pic-message-email']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-14"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type"> <small class="type-label">Video Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-3" name="" value="video-message-sms"
                                                    class="filter-checkbox notify SleepCheckbox filterbig-checkbox ckeckoutinpt" @if( isset($userdata['video-message-sms']) && $userdata['video-message-sms']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-3"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4" name="" value="video-message-email"
                                                    class="filter-checkbox notify SleepCheckbox filterbig-checkbox ckeckoutinpt" @if( isset($userdata['video-message-email']) && $userdata['video-message-email']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-4"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label">Audio Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-5" name="" value="audio-message-sms"
                                                    class="filter-checkbox notify SleepCheckbox filterbig-checkbox ckeckoutinpt" @if( isset($userdata['audio-message-sms']) && $userdata['audio-message-sms']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-5"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-6" name="" value="audio-message-email"
                                                    class="filter-checkbox notify SleepCheckbox filterbig-checkbox ckeckoutinpt" @if( isset($userdata['audio-message-email']) && $userdata['audio-message-email']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-6"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label"> Feed</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-15" name="" value="feed-message-sms"
                                                    class="filter-checkbox notify SleepCheckbox filterbig-checkbox ckeckoutinpt" @if( isset($userdata['feed-message-sms']) && $userdata['feed-message-sms']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-4-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-13" name="" value="feed-message-email"
                                                    class="filter-checkbox notify SleepCheckbox filterbig-checkbox ckeckoutinpt" @if( isset($userdata['feed-message-email']) && $userdata['feed-message-email']=="1" && Auth::user()->is_sleep_mode==false)  checked @endif />
                                                <label class="notify" for="checkbox-13"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                             
                                  </div>
                                </div>

                                </div>
                                <div class="col-lg-6 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white first_section">
                                    <div class=" row">
                                        <div class="col-6"><small class="head">Payout Notifications</small></div>
                                        <div class="col-3"><small class="head">SMS</small></div>
                                        <div class="col-3"> <small class="head">Email</small></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type"> <small class="type-label">12 Hour Alert</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-7" name="" value="12hour-sms"
                                                    class="filter-checkbox notify  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['12hour-sms']) && $userdata['12hour-sms']=="1")  checked @endif />
                                                <label class="notify" for="checkbox-7"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-12" name="" value="12hour-email"
                                                    class="filter-checkbox notify  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['12hour-email']) && $userdata['12hour-email']=="1")  checked @endif />
                                                <label class="notify" for="checkbox-12"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label">End of Pay Period</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-8" name="" value="endofpp-sms"
                                                    class="filter-checkbox notify  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['endofpp-sms']) && $userdata['endofpp-sms']=="1")  checked @endif />
                                                <label class="notify" for="checkbox-8"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-11" name="" value="endofpp-email"
                                                    class="filter-checkbox notify  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['endofpp-email']) && $userdata['endofpp-email']=="1")  checked @endif />
                                                <label class="notify" for="checkbox-11"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type"> <small class="type-label">Payout Processed</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-9" name="" value="pay-procedd-sms"
                                                    class="filter-checkbox notify  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['pay-procedd-sms']) && $userdata['pay-procedd-sms']=="1")  checked @endif />
                                                <label class="notify" for="checkbox-9"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-10" name="" value="pay-procedd-email"
                                                    class="filter-checkbox notify  filterbig-checkbox ckeckoutinpt" @if( isset($userdata['pay-procedd-email']) && $userdata['pay-procedd-email']=="1")  checked @endif />
                                                <label class="notify" for="checkbox-10"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                   
                                     
                                    </div>
                             
                                  </div>
                                </div></div>

                                <div class="row mb-4">
                                  <div class="card col-12"> 
                                    <div class="card-body text-white">
                                      <div class="d-flex justify-content-between">
                                     <h6 class="modelcheck_text">Sleep Mode</h6>
                                     <div class="d-flex"> <small class="mode_dwitch"> OFF</small>
                                     <div class="switch">
                                          <input type="checkbox" id="c2" value="sleepmode"  class="sleep-mode-btn" @if(Auth::user()->is_sleep_mode==true) checked @endif >
                                          <label for="c2"><span></span></label>
                                          </div><small class="mode_dwitch"> ON</small>
                                        </div>
                                    
                                          </div>
                                          <div class="row sleepmode_timeing @if(Auth::user()->is_sleep_mode==false) d-none checked @endif  mt-3">
                                            
                                              <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                
                                            <div class="custom-control custom-radio custom-control-inline p-0">
                                                <input type="radio" id="one-time-check" name="time"
                                                    class="custom-control-input" value="1"
                                                     @if(isset($sleepMode)) @if($sleepMode->mode_type=='onetime')  checked @endif  @else checked @endif  >
                                                <label class="custom-control-label" for="one-time-check">One Time</label>
                                            </div>  <br>
                                            <div class="custom-control custom-radio custom-control-inline p-0 mt-3">
                                                <input type="radio" id="customRadioInline3" name="time"
                                                    class="custom-control-input" value="0"
                                                    @if(isset($sleepMode)) @if($sleepMode->mode_type=='daily')  checked @endif @endif >
                                                <label class="custom-control-label" for="customRadioInline3">Daily
                                                </label>
                                            </div>

                                      
                                              </div>
                                              <div class="col-xl-4 col-md-4 col-sm-6 col-6 ">
                                                      <label for="start_time_sleep">Form</label>
                                                      <input type="time" name="start_time" id="start_time_sleep" value="{{($sleepMode->start_time)??''}}"><br>
                                                      <span class="start_time_sleep_error text-danger" style="font-size: 13px;"></span> <br>
                                                      <label for="start_time_sleep" class="mr-1">Until</label>
                                                      <input type="time" name="end_time" id="end_time_sleep" value="{{($sleepMode->end_time)??''}}"> <br>
                                                      <span class="end_time_sleep_error text-danger" style="font-size: 13px;"></span>
                                                      <span class="valid_time_sleep_error text-danger" style="font-size: 13px;"></span>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                     <button class="feel-btn p-2 rounded sleep-mode-update" style="float:right;"> Update </button>
                                                </div>
                                           
                                          </div>
                                     <small class="smalltext @if(Auth::user()->is_sleep_mode==true) d-none checked @endif sleep-mode-content">Turn on Sleep Mode to mute notifications during the selected time frames. Notifications will be sent to you once Sleep Mode expires. Your clients will be charged for messages sent while Sleep Mode is on.</small><br>
                                     
                                  </div>
                                </div>
                               
                              </div>
                              <div class="row mb-4">
                                  <div class="card col-12">
                                    <div class="card-body text-white">
                                      <div class="d-flex justify-content-between">
                                     <h6 class="modelcheck_text">Away mode</h6>
                                     <div class="d-flex"> <small class="mode_dwitch"> OFF</small>
                                      <div class="switch awaymode">
                                        <input type="checkbox"  id="c21" class="model-away-model" @if(Auth::user()->is_away==true) checked @endif>
                                        <label for="c21"><span></span></label>
                                     </div><small class="mode_dwitch"> ON</small>
                                        </div>
                                    
                                          </div>
                                     <small class="smalltext">This will set your profile to be "Unavailable". If a contact messages you,
an automated response will be sent and they will not be charged.</small><br>
                                     
                                  </div>
                                </div>
                               
                              </div>
                              <div class="row 4">
                                <div class="card col-lg-12 col-md-12 ">
                                  <div class="">
                                    <div class="card-body text-white">
                                    <h6>Update Phone Number</h6>
                                      <div class="input_fild ">
                                       <form class="mt-2" action="{{route('model.phonesave')}}" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
                                        @csrf
                                       <div class="row">
                                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                                          <div class="form-group ">
                                            <label><small>Private Phone Number:</small></label>
                                            <input type="number" name="phone" class="form-control" value="{{$user->phone}}"placeholder="+1 - 012-123-1256">
                                          </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                                          <div class="form-group ">
                                            <label><small>Login Phone Number:</small></label>
                                            <input type="number" name="loginphone" class="form-control" value="{{$user->loginphone}}"placeholder="16049979312">
                                          </div>
                                        </div>
                                         <div class="col-12 ">
                                          <div class="form-group ">
                                            <label><small>Bad Bunnies Phone Number:</small></label>
                                            <input type="number" name="bbphone" class="form-control" value="{{$user->bbphone}}" placeholder="Bad Bunnies Phone Number:">
                                          </div>
                                        </div>
                                        </div>
                                 
                                        </div>
                                        <button type="submit" class="btn  hover-btn ml-0 mt-3 "><small>Update Details</small></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row 4">
                                <div class="card col-lg-12 col-md-12 ">
                                  <div class="">
                                    <div class="card-body text-white">
                                    <h6>Change your Password</h6>
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if($errors)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                      <div class="input_fild ">
                                      <form class="mt-2" role="form" action="{{route('model.passwordupdate')}}" id="reg-form" method="POST" class="form-horizontal" >
                                        @csrf
                                       <div class="row">
                                        <div class="col-12 ">
                                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="control-label">Current Password</label>
                                                <input id="current-password" type="password" class="form-control" name="current-password" required>
                                                <small class="smalltext">* New Password must be 8 characters and include at least one number, one upper case letter, one lower case letter, one special character (!@#$%^&*()_=,.?).</small><br>
                                                
                                                @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('current-password') }}</strong>
                                                    </span>
                                                @endif
                                           
                                        </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-xl-6">
                                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="control-label">New Password</label>
                                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                                @if ($errors->has('new-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('new-password') }}</strong>
                                                    </span>
                                                @endif
                                           
                                        </div>
                                        </div>
                                         <div class="col-sm-12 col-md-6 col-xl-6">
                                         <div class="form-group">
                                            <label for="new-password-confirm" class="control-label">Confirm New Password</label>
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div> 
                                        </div>
                                        </div>
                                 
                                        </div>
                                        <button type="submit" class="btn  hover-btn ml-0 mt-3 "><small>Change Password</small></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row 4">
                                <div class="card col-lg-12 col-md-12 ">
                                  <div class="">
                                    <div class="card-body text-white">
                                    <h6>E-mail</h6>
                                      <div class="input_fild ">
                                       <form class="mt-2" action="{{route('model.emailsave')}}" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
                                        @csrf
                                       <div class="row">
                                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                                          <div class="form-group ">
                                            <label><small>Contact E-mail:</small></label>
                                            <input type="email" name="nofify_email" class="form-control" value=" {{$user->nofify_email}}"placeholder="kristamarie999@hotmail.com">
                                          </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                                        <label><small>Notification Email:</small></label>
                                          <div class="form-group d-flex">
                                             <input type="hidden" class="ori_email" value="{{$user->email}}">
                                            <input type="email"  class="form-control change_email" value="{{$user->email}}"placeholder="Enter Notification Email"> <br>
                                            
                                            <button class=" btn feel-btn verified-email" type="button"><small >Verified</small></button>
                                             <button class=" btn feel-btn d-none verify-email" type="button"><small>Verify</small></button>
                                          </div>
                                          <span class="email-already-taken text-danger"></span>
                                        </div>
                                        
                                        </div>
                                 
                                        </div>
                                        <button type="submit" class=" btn feel-btn  "><small>Update details</small></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row 4">
                                <div class="card col-lg-12 col-md-12 ">
                                  <div class="">
                                    <div class="card-body text-white">
                                    <h6>Timezone</h6>
                                      <div class="input_fild ">
                                       <form class="mt-2" action="{{route('model.timezone')}}" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
                                        @csrf
                                       <div class="row">
                                        <div class="col-12 ">
                                          <div class="form-group ">
                                            <label><small>Your timezone will not display on your public profile</small></label>
                                            <select name="time_zone" class="form-control selectbox">
                                              <option value="Eastern"  @if( isset($user->timezone) && $user->timezone=="Eastern")  selected @endif>Eastern UTC - 05:00</option>
                                              <option value="Central"  @if( isset($user->timezone) && $user->timezone=="Central")  selected @endif>Central UTC - 06:00</option>
                                              <option value="Mountain" @if( isset($user->timezone) && $user->timezone=="Mountain")  selected @endif>Mountain UTC - 07:00</option>
                                              <option value="Pacific"  @if( isset($user->timezone) && $user->timezone=="Pacific")  selected @endif>Pacific UTC - 08:00</option></select>
                                          </div>
                                        </div>
                                       
                                        </div>
                                 
                                        </div>
                                        <button type="submit" class="btn  hover-btn ml-0 mt-3"><small>Update Details</small></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                              
                                <div class="row 4">
                                <div class="card col-lg-12 col-md-12 ">
                                  <div class="">
                                    <div class="card-body text-white">
                                    <h6>Blocked Locations  </h6>
                                    
                                      <span style="color:pink;">Add Blocked Location</span> <br>
                                    <small  class="type-label">You can block countries, states or cities from accessing your profile.</small>
                                      <div class="input_fild ">
                                       <form class="mt-2" action="{{route('model.locatiosave')}}" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
                                        @csrf
                                       <div class="row">
                                        <div class="col-12 ">
                                          <div class="form-group ">
                                            <div class="listings">
                                            @foreach ($loactions as $item)
                                              <button type="button" class="btn text-white badge_btn p-2 mb-2 parc">
                                            {{$item->location}} <span class="badge badge-dark m-1 del_location" value="{{$item->id}}">X</span>
                                          </button>
                                            @endforeach
                                            </div>

                                           <input type="text" name="location" class="form-control" placeholder="Enter a country, state, city" Required>
                                            
                                          </div>
                                        </div>
                                       
                                        </div>
                                 
                                        </div>
                                        <button type="submit" class="btn  hover-btn ml-0 mt-3"><small>Update Details</small></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row mb-4">
                                <div class="col-lg-12 col-md-12">
                                  <div class="card ">
                                    <div class="card-body text-white">
                                      <div class="row set_con justify-content-between">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                        <h6>Dismiss All Notifications</h6>
                                        <small>This will mark all your conversations as read.</small>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                          <button class="btn feel-btn   text-white"  data-toggle="modal" id="" data-target="#dismiss-all-notifications"><small>DISMISS NOTIFICATIONS</small></button>
                                        </div>
                                      </div>
                                      
                                        
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </div>
                            
                               

                              <div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content mt-3" style="
                                    background-color: #091625 !important; color:white;
                                ">
                                     
                                      <div class="modal-body">
                                      <label for="">Enter Otp</label>
                                        <input type="hidden" class="new-email-verify" value=""> 
                                      <input type="number"  class="form-control change_email_otp" value=""placeholder="Enter one time password">
                                      <span class="otp-do-not-match text-danger"></span>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                                        <button class=" btn feel-btn  match-otp-verify-email" type="button">Submit</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

<style>
    .modelcheck_text{
        font-size: 21px !important;
    }
  .btn.hover-btn small{
    color: #ad2991 !important;
  }
  .btn.hover-btn:hover small{
    color: #fff !important;
  }
  .btn.feel-btn small{
    color: #fff !important;
  }
  .mode_dwitch{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 42px;
    text-transform: uppercase;
    color: #FFFFFF;
    margin: 0px 10px;
  }
  .img_tag {
    border: 3px dotted #4a4a4a;
    text-align: center;
    margin: 66px 20px;
}
.card-body.text-white.first_section {
    height: 370px;
}
.col-6.input_type {
    margin: 18px 0px;
}
.feed_dele_model {
    background-color: #050b13;
    width: 350px;
    padding: 41px 5px 25px 6px;
}
.modal-footer {
    border-top: 1px solid #080f17 !important;
}
   .head {
    font-family: 'Montserrat';
font-style: normal;
font-weight: 600;
font-size: 17px;
line-height: 20px;
color: #FFFFFF;
}
.ckeckfilter .filterbig-checkbox+label {
    padding: 8px;
    margin-right: 20px;
    /* height: 2px !important; */
    margin-top: 10px !important;
}
.ckeckfilter .filterbig-checkbox:checked+label:after {
    font-size: 11px;}
.d-flex.justify-content-between .small, small {
    font-size: 80%;
    font-weight: 400;
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 25px;
    color: #B1B1B1;
}
  .form-check.form-switch.d-flex {
    align-items: center;
}
.ckeckfilter {
    margin: 10px;
}
  .switch{
	position: relative;
	width: 60px;
	height: 34px;
	/* margin: 20px auto; */
}
.switch input[type=checkbox]{
	position: absolute;
	-moz-opacity: 0;
	-khtml-opacity: 0;
	-webkit-opacity: 0;
	opacity: 0;
	-ms-filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
	filter: alpha(opacity=0);
}
.switch label,
.switch label span{
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	transition-duration: .2s;
}
.d-flex {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important;
    align-items: center;
}
.switch label {
            border-radius: 20px;
            background-color: #162d43;
            height: 29px;
        }
.switch label:before,
.switch label:after{
	position: absolute;
	top: 0;
	width: 34px;
	line-height: 34px;
	color: #fff;
	text-align: center;
}
.switch label span {
    z-index: 1;
    width: 26px;
    height: 24px;
    margin: 3px;
    border-radius: 50%;
    background-color: #fff;
}
/* .switch label:before {
	left: 0;
	font-size: 11px;
	content: 'ON';
}
.switch label:after {
	right: 0;
	font-size: 10px;
	content: 'OFF';
} */
.switch input:checked+label {
	background: linear-gradient(90deg, #AF2990 0%, #4C2ACD 100%);
}
.switch input:checked+label span {
	transform: translateX(26px);
}
</style>

@endsection
@section('scripts')
@parent
@endsection

