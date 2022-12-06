@extends('frontend.fan.main')
@section('content')
<div class="col-sm-12 col-md-3 col-gl-3 ">
    <div class="sidebar-wrapper">
      <div class="fan-menu">
        <ul class="list-group">
          <li class="list-group-item "><a class="item"><i class="bi bi-house-fill"></i>Home</a></li>
          <li class="list-group-item "><a class="item"><i class="bi bi-chat-dots-fill"></i>Messages</a></li>
          <li class="list-group-item "><a class="item"><i class="bi bi-compass-fill"></i>Feed</a></li>
          <li class="list-group-item "><a class="item"><i class="bi bi-people-fill"></i>Models</a></li>
          <li class="list-group-item"><a class="item"><i class="bi bi-person-lines-fill"></i>Contacts</a></li>
          <li class="list-group-item"><a class="item"><i class="bi bi-folder-fill"></i>Collection</a></li>
          <li class="list-group-item"><a class="item"><i class="bi bi-stopwatch-fill"></i>Account Logs</a></li>
          <li class="list-group-item dropdown ">
            <a class="nav-link dropdown-toggle item" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Help
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li class="list-group-item"><a class="dropdown-item " href="#"><small>Billing</small></a></li>
              <li class="list-group-item"><a class="dropdown-item " href="#"><small>FAQ</small></a></li>
              <li class="list-group-item"><a class="dropdown-item " href="#"><small>Contact</small></a></li>
              <li class="list-group-item"><a class="dropdown-item " href="#"><small>Code of Conduct</small></a></li>
            </ul>
          </li>
          <li class="list-group-item"><a class="item"><i class="bi bi-question-circle-fill"></i>Help</a></li>
          <li class="list-group-item"><a class="item"><i class="bi bi-gear-fill"></i>Settings</a></li>
          <li class="list-group-item"><a class="item"><i class="bi bi-box-arrow-right"></i>Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
     <div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
  <div class="row mb-4">
    <div class="card ">
      <div class="card-body text-white">
       <h6><b>Unverified Account</b></h6>
       <small>Verify your number so you can contact models directly from your mobile phone number.</small><br>
       <button class="btn ver_btn text-white mt-2"><small>Verify Phone</small></button>
    </div>
  </div>
  <div>
  </div>
</div>
<div class="row 4">
  <div class="col-lg-6 col-md-6 ">
    <div class="card">
      <div class="card-body text-white">
      <h6><b>Personal Information</b></h6>
        <div class="input_fild ">
         <form class="mt-2" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
          <div class="col-12 p-0">
            <div class="form-group ">
              <label><small>Username</small></label>
              <input type="" name="" class="form-control" placeholder="Enter your name">
            </div>
          </div>
           <div class="col-12 p-0">
            <div class="form-group ">
              <label><small>Email Address</small></label>
              <input type="" name="" class="form-control" placeholder="Enter your email">
            </div>
          </div>
          <div class="col-12 p-0">
            <div class="form-group ">
              <label><small>Phone Number</small></label>
              <input type="" name="" class="form-control" placeholder="Enter your number">
            </div>
          </div>
          <div class="col-12 p-0">
            <div class="form-group ">
              <label><small>Birthday (optional)</small></label>
      <input type="text" class="form-control" name="datepicker" id="datepicker" />
            </div>
          </div>
          <button type="submit" class="btn submit_btn ml-0 mt-3 "><small>Update Details</small></button>
        </form>
      </div>
    </div>
  </div>
  </div>
  <div class="col-lg-6 col-md-6 ">
    <div class="card">
      <div class="card-body text-white">
      <h6><b>Change your Password</b></h6>
        <div class="input_fild ">
         <form class="mt-2" role="form" id="reg-form" method="POST" class="form-horizontal" action="">
          <div class="col-12 p-0">
            <div class="form-group ">
              <label><small>Change your Password</small></label>
              <input type="" name="" class="form-control" placeholder="Enter your password">
            </div>
            <small class="mt-3">* New Password must be 8 characters and include at least one number, one upper case letter, one lower case letter, one special character (!@#$%^&*()_=,.?).</small>
          </div>
           <div class="col-12 p-0">
            <div class="form-group ">
              <label><small>Enter New Password</small></label>
              <input type="" name="" class="form-control" placeholder="Enter your new password">
            </div>
          </div>
          <div class="col-12 p-0">
            <div class="form-group mt-4 ">
              <label><small>Confirm New Password</small></label>
              <input type="" name="" class="form-control" placeholder="Enter your confirm password">
            </div>
          </div>
          <button type="submit" class="btn submit_btn ml-0 mt-3 "><small>Change Password</small></button>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-6 col-md-6 ">
    <div class="card">
      <div class="card-body text-white">
      <div class="d-flex justify-content-between">
        <small><b>Notifications</b></small>
        <small><b>SMS</b></small>
        <small><b>Email</b></small>
      </div>
      <div class="d-flex justify-content-between">
        <small>Video Messages</small>
        <div class="">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <small>Audio Messages </small>
        <div class="">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        </div><div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        </div>
      </div>
    </div>
  </div>

  </div>
  <div class="col-lg-6 col-md-6 ">
    <div class="card">
      <div class="card-body text-white">
        <h6><b>Unverified Account</b></h6>
<button class="btn face-btn mb-2">CREAT 2FA QR CODE</button>
    </div>
  </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-6 col-md-6 ">
    <div class="card">
      <div class="card-body text-white">
      <h6><b>Edit Avatar</b></h6>
      <canvas class="canvas">
      <img src="">
      </canvas>
      <div class="over">
        <button class=" btn avatar_btn">Add Avatar</button>
      </div>
    </div>
  </div>

  </div>
  <div class="col-lg-6 col-md-6 ">
    <div class="card">
      <div class="card-body text-white">
        <h6><b>Gender Preference</b></h6>
        <div class="d-flex justify-content-between">
        <input class="form-check-input ml-1" type="checkbox" value="" id="flexCheckDefault">
        <small class="ml-5">Video Messages</small>
      </div>
          <button class="btn face-btn mb-2 mt-3">UPDATE</button>
      
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
            <button class="btn ver_btn text-white">DISMISS NOTIFICATIONS</button>
          </div>
        </div>
        <div class="d-flex set_con justify-content-between">
          <div>
          <h6><b>Credit Balance</b></h6>
          <small>This will mark all your conversations as read.</small>
          </div>
          <div>
            <div class="form-check form-switch">
            <small class="mr-5">HIDE</small><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"><small>SHOW</small>
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
            <button class="btn ver_btn text-white">DEACTIVATE</button>
          </div>
        </div>
        <div class="d-flex set_con justify-content-between">
          <div>
          <h6><b>Delete Account</b></h6>
          <small>Deleting your account is permanent and all chat history, content, and credits will be lost.</small>
          </div>
          <div>
            <button class="btn ver_btn text-white">DELETE </button>
          </div>
        </div>
       </div>
     </div>
   </div>
</div>
</div>
@endsection
@section('scripts')
    @parent
@endsection