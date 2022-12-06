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
                <div class="login-bannerwrapper">
                    <img src="./image/loginbanner.png" alt="" class="login-bannerimg" />
                    <div class="login-bannerhading-wrapp">
                        <a href="{{'/'}}"> <img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo"
                                class="nav-logo" /></a></a>
                    </div>
                </div>
                <div class="loginfrom-wrapper">
                    <div class="login-form-wraper">
                        <div class="upper_section">
                        <a href="{{'/'}}"> <img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo"
                                class="nav-logo" /></a></a>
                        <p class="sinup-linewrapp mt-3">
                            Sign up to view more posts Or log in if you already have an
                            account
                        </p>
                        </div>
                        @php $validation='0'; if(!empty(Session::has('error'))){ $validation='1'; } @endphp
                         <div class="logintab-wrapp">
                           
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if(!$validation) active @endif" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        @if($validation=='0') aria-selected="true" @else aria-selected="false" @endif >
                                        Sign Up
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link  @if($validation) active @endif" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile"   @if($validation) aria-selected="true" @else  aria-selected="false" @endif >
                                        Log In
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade  @if(!$validation) active show @endif loginform-wrapper" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                  
                             

                                    @if (Session::has('success'))
                                    <div class="alert alert-success" id="alert">
                                        <span>{{ Session::get('success') }}</span>
                                    </div>
                                    @endif
                                    <form method="POST" action="{{ route('storeuser') }}">
                                        @csrf
                                        <div class="singpform-wraper">
                                            <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                <label class="input-label">Display Name</label>
                                                <input type="text"placeholder="name"value="{{ old('first_name') }}"  name="first_name" class="Displayname-input"
                                                    style="" required>
                                                <small class="text-danger">
                                                    @error('first_name')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                <label class="input-label">Email Address</label>
                                                <input type="email" placeholder="email"  value="{{ old('email') }}" class="email-adrrs" name="email"  required>
                                                <small class="text-danger">
                                                    @error('email')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <div class="inputfild-wrapp">
                                                         <label class="input-label">Password</label>
                                                         <div class="d-flex" style="width: 100%;">
                                                    <input type="password" placeholder="password" id="password"class="lockpassword" required
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
                                            <p class="Service_text mb-0"> I have read and agreed to Bad Bunnies Tv.com’s <b><a class="terms_link" href="{{ url('/terms-conditions') }}" target="_blank">Terms of Service</a></b>
                                            </p>
                                            
                                            </div>
                                              
                                              
                                        </div>
                                            <small class="text-danger" style="margin: 0px 30px;">
                                                @error('readbox')
                                                {{ $message }}
                                                @enderror
                                            </small>
                                        <div class="login-pagebtn-wrapp">
                                            <input type="submit" value="Sign up " class="singupbtn" name="fan">
                                    </form>
                                    <a class="Applybtn_text" href="{{url('/storeuser')}}">
                                    <button value="" type="button" class="applyasmodel-btn">
                                     Apply as a model </button></a>
                                </div>


                            </div>
                            <div class="tab-pane fade @if($validation) show active @endif " id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                               
                              
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
                                        <div class="singpform-wraper">
                                            <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                                <label class="input-label">Email Address</label>
                                                <input type="email" placeholder="email" required class="email-adrrs" name="log_email" />
                                                <small class="text-danger">
                                                    @error('log_email')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <div class="inputfild-wrapp">
                                                <label class="input-label">Password</label>
                                                <div class="d-flex" style="width: 100%;">
                                                    <input  type="password" placeholder="password" id="log_password"class="lockpassword" required
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
                                       
                                            <div class="checkinput-wraperonlogin "> 
                                             
                                                
                                                <div class="ckeckfilter">
                                                <input type="checkbox" id="checkbox-2-11" name="" value=""
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-2-11"></label>
                                                <p class="text-white mt-3 forget_password">Remember Me</p>
                                            </div>

                                            <!--  <div class="checkinput-wraper">
                                                <input type="checkbox" class="ckeckoutinpt" />
                                                <p>Remember Me</p>
                                            </div> -->

                                          
                                            <a href="{{ route('password.request') }}" class="forget_password"> Forgot Password?  </a>
                                       
</div>
                                        <div class="login-pagebtn-wrapp">
                                            <button class="singupbtn">Login</button>
                                        </div>
                                        <p class="byloginline">
                                            By logging in you are agreeing to our
                                            <b><a class="terms_link" href="{{ url('/terms-conditions') }}" target="_blank">Terms of Service</a></b> and
                                            <b><a class="terms_link" href="{{ url('/terms-conditions') }}" target="_blank"> Privacy Policy. </a></b>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".singupbtn").click(function() {
                var name = $(this).attr('name');
                $(".role").val(name)
            })
            $(".applyasmodel-btn").click(function() {
                var name = $(this).attr('name');
                $(".role").val(name)
            })
        });
    </script>
    <script>
        setTimeout(function() {
    $('#alert').fadeOut('fast');
}, 3000);
    </script>
        <script type="text/javascript">
        function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
    </script>

    <script type="text/javascript">
        function password_show_hide_log() {
  var x = document.getElementById("log_password");
  var show_eye_log = document.getElementById("show_eye_log");
  var hide_eye_log = document.getElementById("hide_eye_log");
  hide_eye_log.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye_log.style.display = "none";
    hide_eye_log.style.display = "block";
  } else {
    x.type = "password";
    show_eye_log.style.display = "block";
    hide_eye_log.style.display = "none";
  }
}
    </script>
</body>
<style type="text/css">
    i#show_eye_signup {
    color: #8c9297;
}
.terms_link{
        color: #ffff !important;
    }

    small.error {
    padding: 11px 157px;
    background: #f7dada;
    border-radius: 12px;
    color: #000;
}
    /*new added*/

.applyasmodel-btn:hover {
    color: #fff !important;
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
}
.applyasmodel-btn:hover a.Applybtn_text {
         color: #ffffff !important;
         text-decoration: none !important;
     }
     .singupbtn:hover {
    background: none;
    border: 1px solid;
    color: #af2990;
}
</style>





</html>