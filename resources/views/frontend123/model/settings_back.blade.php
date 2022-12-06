@extends('frontend.model.main')
@section('content')

<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
                                <div class="row mb-4">
                                  <div class="card col-12">
                                    <div class="card-body text-white">
                                     <h6><b>Unverified Account</b></h6>
                                     <small class="smalltext">Verify your number so you can contact models directly from your mobile phone number.</small><br>
                                     <button class="btn feel-btn ver_btn text-white mt-2"><small>Verify Phone</small></button>
                                  </div>
                                </div>
                               
                              </div>
                              <div class="row 4">
                                <div class="card col-lg-12 col-md-12 ">
                                  <div class="">
                                    <div class="card-body text-white">
                                    <h6><b>Personal Information</b></h6>
                                      <div class="input_fild ">
                                       <form class="mt-2" action="{{route('model.modeldetailssave')}}" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
                                        @csrf
                                       <div class="row">
                                        <div class="col-6 ">
                                          <div class="form-group ">
                                            <label><small>Username</small></label>
                                            <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}"placeholder="Enter your name">
                                          </div>
                                        </div>
                                         <div class="col-6 ">
                                          <div class="form-group ">
                                            <label><small>Email Address</small></label>
                                            <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter your email">
                                          </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-6 ">
                                          <div class="form-group ">
                                            <label><small>Phone Number</small></label>
                                            <input type="number" name="number" class="form-control" value="{{$user->phone}}" placeholder="Enter your number">
                                          </div>
                                        </div>
                                        <div class="col-6 ">
                                          <div class="form-group ">
                                            <label><small>Birthday (optional)</small></label>
                                    <input type="date" class="form-control" value="{{$user->dob}}" name="dob" id="datepicker" />
                                          </div>
                                        </div>
                                        </div>
                                        <button type="submit" class="btn  hover-btn ml-0 mt-3 "><small>Update Details</small></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="col-lg-12 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                    <h6><b>Change your Password</b></h6>
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
                                       <form class="mt-2" role="form" action="{{route('model.passwordupdate')}}" id="reg-form" method="POST" class="form-horizontal" >
                                        @csrf

                                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">Current Password</label>
                
                                            <div class="col-md-12">
                                                <input id="current-password" type="password" class="form-control" name="current-password" required>
                
                                                @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('current-password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">New Password</label>
                
                                            <div class="col-md-12">
                                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                
                                                @if ($errors->has('new-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('new-password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                
                                            <div class="col-md-12">
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                            </div>
                              
                                     
                    
                                     
                    
                                           
                                        </div> 
                                        <button type="submit" class="btn  hover-btn ml-0 mt-3 "><small>Change Password</small></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-lg-6 col-md-6 ">
                                  <div class="card">
                                    <div class="card-body text-white first_section">
                                    <div class=" row">
                                        <div class="col-6"><small class="head"><b>Notifications</b></small></div>
                                        <div class="col-3"><small class="head"><b>SMS</b></small></div>
                                        <div class="col-3"> <small class="head"><b>Email</b></small></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type"> <small class="type-label">Text Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-15" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-16" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-16"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label">Picture Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-15" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-16" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-16"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type"> <small class="type-label">Video Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-15" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-16" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-16"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label">Audio Messages</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-15" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-16" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-16"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                                    <div class="row">
                                      <div class="col-6 input_type">  <small class="type-label"> Feed</small></div>
                                        <div class="col-3">  <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-15" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-15"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                        <div class="col-3"> <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-16" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-16"></label>
                                                <p class="text-white mt-3"></p>
                                      </div></div>
                                     
                                    </div>
                             
                                  </div>
                                </div>

                                </div>
                                <div class="col-lg-6 col-md-6 ">

                                  <div class="card">
                                    <div class="card-body text-white first_section">
                                    <h6><b>Edit Avatar</b></h6>
                                    <form class="mt-2" action="{{route('model.profileupdate')}}" role="form" id="reg-form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                    <div class="form-group mt-2">
                                    <div class="upload_div img_tag"> <label class="upload_label" for="upload-img"> <div class="">
                                                                <img src="/images/camera.png">
                                                                </div></div>
                                    <input type="file" class="form-control" name="profile_image" 
                                        id="upload-img" style="display:none;">
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
                              <div class="col-lg-6 col-md-6 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <h6><b>Unverified Account</b></h6>
                              <button class="btn hover-btn mb-2"><small>CREAT 2FA QR CODE</small></button>
                                  </div>
                                </div>
                                </div>
                             
                                <div class="col-lg-6 col-md-6 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <h6><b>Gender Preference</b></h6>
                            <div class="d-flex">
                                      <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-2-11" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-2-11"></label>
                                                <p class="text-white mt-3">Male</p>
                                      </div>
                                      <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-3-12" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-3-12"></label>
                                                <p class="text-white mt-3">Female</p>
                                      </div>
                                      <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-4-13" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-4-13"></label>
                                                <p class="text-white mt-3">Trans</p>
                                      </div>
                            </div>
                                        <button class="btn hover-btn mb-2 mt-3"><small>UPDATE</small></button>
                                    
                                  </div>
                                </div>
                                </div>
                              </div>

                              <div class="row mb-4">
                                <div class="col-lg-12 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <div class="d-flex set_con justify-content-between">
                                        <div>
                                        <h6><b>Dismiss All Notifications</b></h6>
                                        <small>This will mark all your conversations as read.</small>
                                        </div>
                                        <div>
                                          <button class="btn feel-btn  text-white"><small>DISMISS NOTIFICATIONS</small></button>
                                        </div>
                                      </div>
                                      <div class="d-flex set_con justify-content-between">
                                        <div>
                                        <h6><b>Credit Balance</b></h6>
                                        <small>This will mark all your conversations as read.</small>
                                        </div>
                                        <div>
                                          <div class="form-check form-switch d-flex"><small style="margin:10px;">HIDE</small>
                                          <div class="switch">
                                          <input type="checkbox" id="c1" checked>
                                          <label for="c1"><span></span></label>
                                          </div>
                                          <small style="margin:10px;">SHOW</small>
                                          <!-- <small class="mr-5">HIDE</small><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"><small>SHOW</small> -->
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex set_con justify-content-between">
                                        <div>
                                        <h6><b>Deactivate Account</b></h6>
                                        <small>Deactivating your account will disable all messaging to and from the models.
                                        You can reactivate your account at any time by logging back in.</small>
                                        </div>
                                        <div>
                                          <button class="btn feel-btn feel-btn ver_btn text-white"><small>DEACTIVATE</small></button>
                                        </div>
                                      </div>
                                      <div class="d-flex set_con justify-content-between">
                                        <div>
                                        <h6><b>Delete Account</b></h6>
                                        <small>Deleting your account is permanent and all chat history, content, and credits will be lost.</small>
                                        </div>
                                        <div>
                                          <button class="btn feel-btn ver_btn text-white"><small>DELETE</small> </button>
                                        </div>
                                      </div>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </div>



<style>
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
   .head {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
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
	background-color: #ddd;
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
</style>
@endsection
@section('scripts')
    @parent
@endsection
