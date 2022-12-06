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

    <link rel="stylesheet" href="{{url('/css/style.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <title>Bad Bunniest Tv</title>
    <style>
     input:-webkit-autofill,
     input:-webkit-autofill:hover,
     input:-webkit-autofill:focus,
     textarea:-webkit-autofill,
     textarea:-webkit-autofill:hover,
     textarea:-webkit-autofill:focus,
     select:-webkit-autofill,
     select:-webkit-autofill:hover,
     select:-webkit-autofill:focus input:-internal-autofill-selected,
     input:-internal-autofill-previewed {
         transition: background-color 5000s ease-in-out 0s!important;
         background-color: transparent !important;
         -webkit-box-shadow: 0 0 0 30px transparent inset !important;
         -webkit-text-fill-color: #fff !important;
     }
        .singupbtn {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    border-radius: 6px;
    height: 100%;
    width: 265px;
    padding: 12px 10px;
    font-size: 16px;
    line-height: unset;
    text-transform: uppercase;
    color: #ffffff;
    border: none;
    margin: 0px;
}
.singupbtn:hover{
    
    background: none;
    border: 1px solid #c73ca9;
    color: #c73ca9;
}
    </style>
</head>

<body>
   
    <div class="login-bg">
      
        <div class="container">
            <div class="login-wrapper">
                <div class="login-bannerwrapper">
                    <img src="{{ url('/image/loginbanner.png')}}" alt="" class="login-bannerimg" />
                    <div class="login-bannerhading-wrapp">
                        <a href="{{'/'}}"> <img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo"
                                class="nav-logo" /></a> 
                    </div>
                </div>
                <div class="loginfrom-wrapper">
                    <div class="login-form-wraper">
                    <div class="upper_section">
                        <a href="{{'/'}}"><img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo"
                                class="nav-logo" /></a></a>
                        <p class="sinup-linewrapp mt-3">
                           Reset Your Password
                        </p>
                       
</div>
                        <div class="logintab-wrapp">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                        <div class="inputfild-wrapp" style="border-bottom: 1px solid #193147">
                                        <label class="input-label">Email Address</label>
                                        <!-- <input type="email" class="email-adrrs" name="log_email" required=""> -->
                                        <input id="email" placeholder="email" type="email" class="email-adrrs  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                  
                            
                          
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="singupbtn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
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
    </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  

 
</body>

</html>








































{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}
