@extends('frontend.fan.main')
@section('content')
<style>
.form-group  label small {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 20px;
    color: #FFFFFF;
}
.genderbtn-warpp {
    display: flex;
    justify-content: unset !important;
    width: 85%;
}
input.form-control {
    background: #112435 !important;
    color: #fff!important;
    font-size: 14px;
    height: 45px;
}
button.btn.feel-btn.text-white {
    float: right;
}
@media only screen and (max-width :376px) {
/* .card-body.text-white.notify_section {
    height: 430px !important;
}} */}
@media only screen and (max-width :400px) {
  button.btn.feel-btn.text-white {
    float: left;
}
.card-body.text-white h6 b {
    font-size: 17px;
}
.head {
    font-size: 12px;
}
.ckeckfilter {
    margin: 5px !important;
}}
.feed_dele_model {
    background-color: #050b13;
    width: 350px;
    padding: 41px 5px 25px 6px;
}
.modal-footer {
    border-top: 1px solid #0f1e2e  !important;
}
</style>
  @php 
   $datauser=App\Models\User::where('id',Auth::user()->id)->first();
  @endphp
  <div class="modal fade" id="dismiss-all-notifications" tabindex="-1" role="dialog" aria-labelledby="draft_ModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content feed_dele_model text-white text-center">
                                Are you sure to dismiss all notifications
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                   <a href="{{url('fan/dismiss-notifications')}}"> <button type="submit"  class="btn feel-btn">Dismiss</button></a>
                                </div>
                              </div>
                          </div>
                      </div>
<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
                                <div class="row mb-4">
                                  <div class="card col-12 mt-4">
                                    <div class="card-body text-white">
                                     <h6><b>Unverified Account</b></h6>
                                     <small class="smalltext">Verify your number so you can contact models directly from your mobile phone number.</small><br>
                                     <button class="btn feel-btn ver_btn text-white mt-2" href="#verify"  data-toggle="modal" >Verify Phone</button>
                                     
                                  </div>
                                </div>
                               
                              </div>
                              <div class="row 4">
                                <div class="card col-lg-12 col-md-12 mb-4">
                                  <div class="">
                                    <div class="card-body text-white">
                                    <h6 class="mb-4"><b>Personal Information</b></h6>
                                      <div class="input_fild ">
                                       <form class="mt-2" action="{{route('fan.modeldetailssave')}}" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
                                        @csrf
                                       <div class="row">
                                        <div class="col-sm-12 col-md-12 col-xl-6 ">
                                          <div class="form-group ">
                                            <label><small>Username</small></label>
                                            <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}"placeholder="Enter your name">
                                          </div>
                                        </div>
                                         <div class="col-sm-12 col-md-12 col-xl-6 ">
                                          <div class="form-group ">
                                            <label><small>Email Address</small></label>
                                            <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter your email">
                                          </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-sm-12 col-md-12 col-xl-6 ">
                                          <div class="form-group ">
                                            <label><small>Phone Number</small></label>
                                            <input type="number" name="number" class="form-control" value="{{$user->phone}}" placeholder="Enter your number" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"/>
                                          </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-xl-6 ">
                                          <div class="form-group ">
                                            <label><small>Birthday (optional)</small></label>
                                    <input type="date" class="form-control" value="{{$user->dob}}" name="dob" id="datepicker" />
                                          </div>
                                        </div>
                                        </div>
                                        <button type="submit" class="btn  hover-btn ml-0 mt-3 ">Update Details</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="col-lg-12 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                    <h6 class="mb-4"><b>Change your Password</b></h6>
                                      <div class="input_fild ">
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
                                       <form class="mt-2" role="form" action="{{route('fan.passwordupdate')}}" id="reg-form" method="POST" class="form-horizontal" >
                                        @csrf

                                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                           
                
                                            <div class="col-md-12">
                                            <label for="new-password" class=" control-label">Current Password</label>
                                                <input id="current-password" placeholder="Current Password" type="password" class="form-control" name="current-password" required>
                
                                                @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('current-password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-12 col-md-12 col-xl-6 col-md-12">  <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            
                
                                            <div class="col-md-12">
                                            <label for="new-password" class=" control-label">New Password</label>
                                                <input id="new-password" placeholder="New Password" type="password" class="form-control" name="new-password" required>
                
                                                @if ($errors->has('new-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('new-password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div></div>
                                          <div class="col-sm-12 col-md-12 col-xl-6 col-md-12"> <div class="form-group">
                                          
                
                                            <div class="col-md-12">
                                            <label for="new-password-confirm" class=" control-label">Confirm New Password</label>
                                                <input id="new-password-confirm" placeholder="Confirm New Password" type="password" class="form-control" name="new-password_confirmation" required>
                                            </div>
                              
                                     
                    
                                     
                    
                                           
                                        </div> </div>
                                        </div>
                                        <div class="col-12"> <button type="submit" class="btn  hover-btn ml-0 mt-3 ">Change Password</button></div>
                                       
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                              </div>
                           
                             
                              <div class="row mb-4">
                                <div class="col-lg-6 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white first_section notify_section">
                                    <div class=" row">
                                        <div class="col-6"><small class="head">Notifications</small></div>
                                        <div class="col-3"><small class="head">SMS</small></div>
                                        <div class="col-3"> <small class="head">Email</small></div>
                                    </div>
                                    <form action="{{url('fan/notification')}}" method="post">
                                      @csrf
                                  
                                    <div class="row">
                                    
                                      <div class="col-6 input_type"> <small class="type-label">Text Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-15" name="textmessagesms" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($textmessagesms) && $textmessagesms=="1")  checked @endif/>
                                                <label for="checkbox-4-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-16" name="textmessagemail" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($textmessagemail) && $textmessagemail=="1")  checked @endif/>
                                                <label for="checkbox-4-16"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label">Picture Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-3" name="picturemessagesms" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($picturemessagesms) && $picturemessagesms=="1")  checked @endif/>
                                                <label for="checkbox-3"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-22" name="picturemessagemail" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($picturemessagemail) && $picturemessagemail=="1")  checked @endif/>
                                                <label for="checkbox-4-22"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type"> <small class="type-label">Video Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-5" name="videomessagesms" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($videomessagesms) && $videomessagesms=="1")  checked @endif/>
                                                <label for="checkbox-5"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-12" name="videomessagemail" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($videomessagemail) && $videomessagemail=="1")  checked @endif/>
                                                <label for="checkbox-12"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label">Audio Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-7" name="audiomessagessms" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($audiomessagessms) && $audiomessagessms=="1")  checked @endif />
                                                <label for="checkbox-7"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-77" name="audiomessagemail" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt"  @if(isset($audiomessagemail) && $audiomessagemail=="1")  checked @endif/>
                                                <label for="checkbox-77"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label"> Feed</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                            
                                                <input type="checkbox" id="checkbox6" name="Feedsms" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($Feedsms) && $Feedsms=="1") checked @endif />
                                                <label for="checkbox6"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3 mb-4"> 
                                          <div class="ckeckfilter ">
                                                <input type="checkbox" id="checkbox-8" name="Feedmail" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($Feedmail) && $Feedmail=="1")  checked @endif />
                                                <label for="checkbox-8"></label>
                                                <p class="text-white mt-3"></p>
                                               
                                      </div>
                                     
                                      </div>
                                
                                      <div class="text-center mt-3 fan_noti_update">
                                        <button class="btn feel-btn " type="submit">Update</button>
                                      </div>
                                      
                                     
                                        </form>
                                    </div>
                                    
                                  </div>
                                </div>

                                </div>
                                <div class="col-lg-6 col-md-12 ">

                                  <div class="card">
                                    <div class="card-body text-white first_section">
                                    <h6><b>Edit Avatar</b></h6>
                                    <form class="mt-2" action="{{route('fan.profileupdate')}}" role="form" id="reg-form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                    <div class="form-group mt-2">
                                    <div class="upload_div img_tag"> 
                                      <label class="upload_label" for="profile-upload-img"> 
                                        <div class="profile-img-appent">
                                          <img src="/images/camera.png">
                                          </div>
                                         </div>
                                    <input type="file" class="form-control" name="profile_image" 
                                        id="profile-upload-img" accept="image/*" style="display:none;">
                                    </div>
                                    <span class="images text-danger"></span>
                                   
                                    </div>


                                    <div class="over">
                                     <button class=" btn feel-btn ">Add Avatar</button>
                                    </div>
                                </form>
                                  </div>
                                </div>

                                </div>
                                
                              <div class="row mb-4">
                              <!-- <div class="col-lg-6 col-md-6 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <h6><b>Unverified Account</b></h6>
                              <button class="btn hover-btn mb-2"><small>CREAT 2FA QR CODE</small></button>
                                  </div>
                                </div>
                                </div> -->
                             
                                <div class="col-lg-12 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <h6><b>Gender Preference</b></h6>
                                      <form action="{{url('fan/prefrence')}}" method="post">
                                      @csrf
                                      <div class="genderbtn-warpp">
                                        <div class="gender-radio-wrapp">
                                          <label class="ckeckfilter">
                                            <input type="radio" name="gender" id="s-option1" class="filter orientation" value="female"
                                            @if(($prefrence) && $prefrence->gender=="female")  checked @endif >
                                            <label for="s-option1">Female</label>
                                            <div class="check">
                                              <div class="inside"></div>
                                            </div>
                                          </label>
                                        </div>
                                        <div class="gender-radio-wrapp ml-2">
                                          <label class="ckeckfilter">
                                            <input type="radio" name="gender" id="s-option2" class="filter orientation" value="male" @if(($prefrence) && $prefrence->gender=="male")  checked @endif>
                                            <label for="s-option2">Male</label>
                                            <div class="check">
                                              <div class="inside"></div>
                                            </div>
                                          </label>
                                        </div>
                                        <div class="gender-radio-wrapp ml-2">
                                          <label class="ckeckfilter">
                                            <input type="radio" name="gender" id="s-option3" class="filter orientation" value="transgender" @if(($prefrence) && $prefrence->gender=="transgender")  checked @endif />
                                            <label for="s-option3">Tran</label>
                                            <div class="check">
                                              <div class="inside"></div>
                                            </div>
                                          </label>
                                        </div>
                                      </div>
                                      <!-- <div class="d-flex">
                                      <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-2-11" name="male" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt"  @if(isset($male) && $male=="1")  checked @endif />
                                                <label for="checkbox-2-11"></label>
                                                <p class="text-white mt-2">Male</p>
                                      </div>
                                      <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-3-12" name="female" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($female) && $female=="1")  checked @endif />
                                                <label for="checkbox-3-12"></label>
                                                <p class="text-white mt-2">Female</p>
                                      </div>
                                      <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-13" name="trans" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" @if(isset($trans) && $trans=="1")  checked @endif />
                                                <label for="checkbox-4-13"></label>
                                                <p class="text-white mt-2">Trans</p>
                                      </div>
                            </div> -->
                                        <button class="btn hover-btn mb-2 mt-3">UPDATE</button>
</form>
                                    
                                  </div>
                                </div>
                                </div>
                              </div>

                              <div class="row mb-4">
                                <div class="col-lg-12 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <div class="row set_con justify-content-between mt-3">
                                        <div class="col-sm-12 col-md-6 mt-2">
                                        <h6><b>Dismiss All Notifications</b></h6>
                                        <small>This will mark all your conversations as read.</small>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mt-2">
                                          <button class="btn feel-btn  text-white" data-toggle="modal" id="" data-target="#dismiss-all-notifications">DISMISS NOTIFICATIONS</button>
                                        </div>
                                      </div>
                                      <div class="row set_con justify-content-between mt-3">
                                        <div class="col-sm-12 col-md-6 mt-1">
                                        <h6><b>Credit Balance</b></h6>
                                        <small>Would you like your credit balance to be visible to models ?</small>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mt-1">
                                       
                                          <div class="form-check form-switch d-flex"><small style="margin:10px;">HIDE</small>
                                          <div class="switch">
                             
                                          <input type="checkbox" class="balace-visible-invisible" id="c1" name="credit" @if(isset($datauser->wallet_visible) && $datauser->wallet_visible=="1")  checked @endif   >
                                          <label for="c1"><span></span></label>
                                          </div>
                                         
                                          <small style="margin:10px;">SHOW</small>
                                          <!-- <small class="mr-5">HIDE</small><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"><small>SHOW</small> -->
                                          </div>
                                        
                                        </div>
                                      </div>
                                      <div class="row set_con justify-content-between mt-3">
                                          <div class="col-sm-12 col-md-6 mt-1">
                                        <h6 class="mt-2"><b>Deactivate Account</b></h6>
                                        <small>Deactivating your account will disable all messaging to and from the models.
                                        You can reactivate your account at any time by logging back in.</small>
                                        </div>
                                          <div class="col-sm-12 col-md-6 mt-1">
                                         
                                        
                                          @if($datauser->status == 'Active')

                                        <button type="button" class="btn feel-btn feel-btn ver_btn text-white mt-2 " data-toggle="modal" data-target="#deact_popup">DEACTIVATE</button>
                                        @else
                                        <button  type="button" class="btn feel-btn feel-btn ver_btn text-white mt-2"data-toggle="modal" data-target="#deact_popup"/>ACTIVATE</button>
                                        @endif
                                       
                                          
                                        </div>
                                      </div>
                                      <div class="row set_con justify-content-between mt-3">
                                       <div class="col-sm-12 col-md-6 mt-1">
                                        <h6 class="mt-2"> <b>Delete Account</b></h6>
                                        <small>Deleting your account is permanent and all chat history, content, and credits will be lost.</small>
                                        </div>
                                       <div class="col-sm-12 col-md-6 mt-1" >
                                          <button class="btn feel-btn ver_btn text-white mt-2" href="#myModal"  data-toggle="modal">DELETE</button>
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
                            //
                            <div class="modal fade" id="deact_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header flex-column">
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                        <p class="text-white">Do you really want to deactivate Your Account?</p>
                                    </div>
                                  <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Cancel</button>
                                           @if($datauser->status == 'Active')
                                            <form action="{{url('fan/dactive',Auth::user()->id)}}" method="post">
                                          @csrf
                                          <input type="hidden" name="status" value="Pending" >

                                        <button type="submit" class="btn feel-btn feel-btn ver_btn text-white mt-2 ">DEACTIVATE</button>
                                        </form>
                                        @else
                                        <form action="{{url('fan/dactive',Auth::user()->id)}}" method="post">
                                          @csrf
                                          <input type="hidden" name="status" value="Active" >

                                        <button  type="submit" class="btn feel-btn feel-btn ver_btn text-white mt-2">ACTIVATE</button>
                                        </form>
                                        @endif
                                </div>
                                </div>
                              </div>
                            </div>
                            //
                             <div id="myModal" class="modal fade">
                                	<div class="modal-dialog modal-confirm">
                                		<div class="modal-content">
                                			<div class="modal-header flex-column">			
                                				<!-- <h4 class="modal-title w-100">Are you sure?</h4>	 -->
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">&times;</button>
                                			</div>
                                			<div class="modal-body">
                                				<p class="text-white">Do you really want to delete Your Account? This process cannot be undone.</p>
                                			</div>
                                			<div class="modal-footer justify-content-center">
                                				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>


                                				<a href="{{url('fan/deluser',Auth::user()->id)}}"><button class="btn feel-btn ">Delete</button></a>
                                			</div>
                                		</div>
                                	</div>
	</div>




  
  <div id="verify" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">			
				<!-- <h4 class="modal-title w-100">Are you sure?</h4>	 -->
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
      <form action="{{url('fan/sendSMS')}}" method="get" enctype="multipart/form-data">
        @csrf
			<div class="modal-body">
         <!-- <label for="">Number</label> -->
				<input placeholder="enter your number" type="number" name="number" class="form-control">
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="sub_btn btn feel-btn">Submit</button>
			</div>
      </form>
		</div>
	</div>
	</div>
<style>
  a.btn:hover {

    -webkit-transform: rotate(0deg) !important;

}
a.sub_btn{
  background-color: #13d12a;
    padding: 6px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 3px;
    padding: 8px 19px;
}
a.del_btn {
    background-color: red;
    padding: 6px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 3px;
    padding: 8px 19px;
}
  .img_tag {
    border: 3px dotted #4a4a4a;
    text-align: center;
    margin: 66px 20px;
}
/* .card-body.text-white.notify_section {
    height: 425px;
} */
.col-6.input_type {
    margin: 18px 0px;
}
   .head {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    font-size: 17px;
    line-height: 20px;
    color: #ffff;
}
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
	margin: 20px auto;
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
.switch label{
	border-radius: 20px;
  background-color: #162d43;
  height:35px;
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
	width: 28px;
	height: 28px;
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

/*new added*/
.modal-header.flex-column {
    overflow: hidden;
}
.fan_noti_update{
        position: absolute;
    right: 0;
    bottom: 7px;
    left: 0;
}
</style>

@endsection
@section('scripts')
    @parent
@endsection
