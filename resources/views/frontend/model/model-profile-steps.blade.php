<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600;700;900&display=swap"
    rel="stylesheet" />
<!-- Basic stylesheet -->
<link href="{{ url('css/step.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- You can use latest version of jQuery  -->
{{-- <script src="jquery-1.9.1.min.js"></script> --}}
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css" />

<!-- owl-carousellink    -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
<!-- owl-carousellink    -->

<title>Bad Bunnies Tv</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

@php
$currant_step = Auth::user()->profile_step;
$model_id = Auth::user()->id;
@endphp
<style>
    .bio_wrapper {
    background: #0C1D2D;
    padding: 20px;
    margin-top:20px;
}
    textarea.bio{
        background-color:#112435 !important;
        border:none;
    }
    .ckeckfilter .filterbig-checkbox+label {
    padding: 11px;
    margin-right: 7px;
    height: 11px !important;
    margin-top: 10px !important;
}
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
        transition: background-color 5000s ease-in-out 0s !important;
        background-color: transparent !important;
        -webkit-box-shadow: 0 0 0 30px transparent inset !important;
        -webkit-text-fill-color: #fff !important;
    }

    .form-control {
        color: #fff;
    }

    .option {
        color: #fff !important;
    }

    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus,
        {
        transition: background-color 5000s ease-in-out 0s !important;
        background-color: transparent !important;
        -webkit-box-shadow: 0 0 0 30px transparent inset !important;
        -webkit-text-fill-color: #fff !important;
    }

    button#newpassword:hover {
        background: unset;
        color: #af2990;
        border: 1px solid #fff;
    }

    button#agreementbtn:hover {
        background: unset;
        color: #af2990;
        border: 1px solid #fff !important;
    }
    .errors {
    color: red;
    /* padding: 5px; */
    /* border: 1px solid; */
    padding: 0 0 15px 1px;
}

    .button.next-btnjoin:hover {
        background: unset;
        color: #af2990;
        border: 1px solid #fff;
    }
    
    @media screen and (max-width: 762px) {
  .container div#multi-step-form-container .step_header ul.form-stepper.form-stepper-horizontal.text-center.mx-auto {
    display: flex !important;
    flex-flow: wrap !important;
  }
  .form-stepper-horizontal li {
         flex-basis: 50%;
    }
    .form-stepper-list a.mx-2 {
        width: 100%;
    }
   .form-stepper-list {
    margin-top: 14px;
    margin-bottom: 10px;
    width: 239px;
}
}
    @media screen and (max-width: 600px) {
  .container div#multi-step-form-container .step_header ul.form-stepper.form-stepper-horizontal.text-center.mx-auto {
    display: flex !important;
    flex-flow: wrap !important;
  }
  .form-stepper-horizontal li {
         flex-basis: 50%;
    }
    .form-stepper-list a.mx-2 {
        width: 100%;
    }
   .form-stepper-list {
    margin-top: 14px;
    margin-bottom: 10px;
    width: 239px;
   
}

}
/*new added*/

@media screen and (min-width: 576px) {
.phone-call-redio-btn{
    float:right;
}
}
@media screen and (max-width: 768px){

div#img-preview {
    margin-left: 13px;
    float: left !important;
}
.plus {
    margin-right: 31px !important;
    left: 168px !important;
}
.phone-call-redio-btn{
    float: left !important;
}
}
.Stagename-wraper label{
    font-size: 15px;
}
.Stagename-wraper {
    font-size: 15px;
}
.agree_text{
    font-size: 13px !important;
}
.col input#upload-img1 {
    display: none;
    height: 8px;
    overflow: hidden;
    width: 27px;
}
/*div#img-preview {
    margin-right: 30px;
}
.plus {
    margin-right: 33px;}*/

    /*new added*/
    .error_text {
    border: 1px solid red;
    padding: 10px 65px;
    /*margin-left: 82px;*/
}
</style>

<body style="background-color: #081420">

    <div class="container">
        <div id="multi-step-form-container">
            <!-- Form Steps / Progress Bar -->

            <div class="step_header">
                <ul class="form-stepper form-stepper-horizontal text-center mx-auto ">
                    <!-- Step 1 -->
                    <li class=" @if ($currant_step == '1') form-stepper-active  @elseif($currant_step > 1)form-stepper-completed @else form-stepper-unfinished @endif text-center form-stepper-list"
                        step="1">
                        <a class="mx-2">
                            <span class="form-stepper-circle">
                                <span>1</span>
                            </span>
                            <div class="label">Create Password</div>

                        </a>

                    </li>
                    <!-- Step 2 -->
                    <li class="@if ($currant_step == '2') form-stepper-active  @elseif($currant_step > 2)form-stepper-completed @else form-stepper-unfinished @endif  text-center form-stepper-list"
                        step="2">
                        <a class="mx-2">
                            <span class="form-stepper-circle ">
                                <span>2</span>
                            </span>
                            <div class="label ">Model Agreement</div>
                        </a>
                    </li>
                    <!-- Step 3 -->
                    <li class="@if ($currant_step == '3') form-stepper-active  @elseif($currant_step > 3)form-stepper-completed @else form-stepper-unfinished @endif  text-center form-stepper-list"
                        step="3">
                        <a class="mx-2">
                            <span class="form-stepper-circle ">
                                <span>3</span>
                            </span>
                            <div class="label ">Profile Setup</div>
                        </a>
                    </li>
                    <li class="@if ($currant_step == '4') form-stepper-active  @elseif($currant_step > 4)form-stepper-completed @else form-stepper-unfinished @endif  text-center form-stepper-list"
                        step="4">
                        <a class="mx-2">
                            <span class="form-stepper-circle ">
                                <span>4</span>
                            </span>
                            <div class="label ">Phone Number</div>
                        </a>
                    </li>
                    <li class="@if ($currant_step == '5') form-stepper-active  @elseif($currant_step > 5)form-stepper-completed @else form-stepper-unfinished @endif  text-center form-stepper-list"
                        step="5">
                        <a class="mx-2">
                            <span class="form-stepper-circle ">
                                <span>5</span>
                            </span>
                            <div class="label ">Set Fees</div>
                        </a>
                    </li>
                    <li class="@if ($currant_step == '6') form-stepper-active  @elseif($currant_step > 6)form-stepper-completed @else form-stepper-unfinished @endif  text-center form-stepper-list"
                        step="6">
                        <a class="mx-2">
                            <span class="form-stepper-circle ">
                                <span>6</span>
                            </span>
                            <div class="label ">Payments Info</div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Step Wise Form Content -->
            <form id="Password_form" action="{{ url('/model-steps') }}" name="userAccountSetupForm"
                enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" value="{{ $model_id }}" class="model_id" name="model_id">
                <input type="hidden" value="2" name="step">

                <!-- Step 1 Content -->
                <section id="step-1"
                    @if ($currant_step == '1') class="form-step" @else class="form-step d-none" @endif>

                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <div class="Stagename-wraper">
                                    <label>New Password <span style="color:red;">*</span></label>
                                    <input type="password" class="new_password" name="new_password"
                                        placeholder="Enter new password" />
                                    <span class="new_password" id="Error" style="color:red;"></span>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <div class="Stagename-wraper">
                                    <label>Confirm New Password <span style="color:red;">*</span></label>
                                    <input type="password" class="confirm_new_password" name="confirm_new_password"
                                        placeholder="Confirm password" />
                                    <span class="confirm_new_password" id="Error" style="color:red;"></span>

                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="">
                        <button class="button btn btn-navigate-form-step next-btnjoin" id="newpassword" type="submit"
                            step_number="2">Next</button>
                    </div>
                </section>
            </form>
            <form id="Pass_agreement" action="{{ url('/model-steps') }}" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" value="{{ $model_id }}" class="model_id" name="model_id">
                <input type="hidden" value="agreement" name="agreement">

                <section id="step-2"
                    @if ($currant_step == '2') class="form-step" @else class="form-step d-none" @endif>
                    <!-- <h2 class="font-normal">

                        Model Agreement</h2> -->

                    <div class="mt-3 agrrementdetail">
                        <h4>Responsibility</h4>
                        <span>Bad Bunnies Tv cannot be held responsible for the actions or comments made by users or models onthe website, forums, or other social media outlets. <br> <br>

                            We strongly advise you not to give personal or account information to anyone. This includes
                            information that can be used to identify you (i.e. your real phone number, physical address,
                            etc.) or information that may be used to compromise your account. <br> <br>

                            Users may not engage in or encourage any illegal behavior or communications concerning
                            such.</span>
                        <h4 class="mt-3">Forbidden Conduct</h4> <br>
                        <p>The following actions are forbidden, and can lead to disciplinary action in accordance with the Disciplinary Policy outlined below.</p> 
                        <ul class="condition_det">
                           <li> Harassing or bullying models via verbal or written communications.</li>
                           <li>Any language or content deemed illegal, dangerous, threatening, abusive, obscene, vulgar, 
                         defamatory, hateful, racist, sexist, ethically offensive or constituting harassment.</li> 
                           <li> Impersonation of someone or someone else’s likeness.</li> 
                           <li> Verbal or written abuse targeted toward a Bad Bunnies Tv employee.</li> 
                           <li> Circumventing the Bad Bunnies Tv billing system by sending payments through outside payment services
                            (PayPal, Venmo, Cash App, Google Pay, etc.) to models on Bad Bunnies Tv.</li> 
                            <li> Asking models to communicate via other applications (Snapchat, Twitter, Instagram, etc.) in
                            lieu
                            of the Bad Bunnies Tv platform.</li> 
                            <li> Publicly sharing and/or posting private information of models.</li> 


                        </ul>
                        <!-- <div class="form-check mt-4">
                            <input type="checkbox" class="form-check-input" id="agreement" value="0">
                            <label class="form-check-label" for="agreement">I agreeing to our Terms of Service and
                                Privacy Policy.</label><br>
                            <span class="checkbox" id="Error" style="color:red;"></span>
                        </div> -->
                        <div class="checkinput-wraperonlogin">
                                            <div class="ckeckfilter">
                                                <input type="checkbox" id="agreement"  value="0"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="agreement"></label>
                                                <p class="text-white mt-3 agree_text">I agreeing to our Terms of Service and
                                Privacy Policy</p>
                             
                                            </div><br>
                                         
                                        
                                        </div>
                                        <span class="checkbox" id="Error" style="color:red;"></span>

                    </div>
                    <div class="">

                        <button class="button  next-btnjoin" id="agreementbtn" type="button"
                            step_number="3">Next</button>

                    </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
            </form>
            <form id="profile_form" action="{{ url('/model-steps') }}" name="userAccountSetupForm"
                enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" value="{{ $model_id }}" class="model_id" name="model_id">
                <input type="hidden" value="4" name="step">
                <section id="step-3"
                    @if ($currant_step == '3') class="" @else class=" d-none" @endif>
                    <div class="mt-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 "> <span class="Profile_form_error " id="Error" style="color:red;"></span></div></div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <!-- <h4 class="mt-4"><b>Personal Details</b></h4> -->
                                <!-- <div class="Stagename-wraper">
                                    <label for="exampleInputEmail1">Profile Picture</label>
                                    <input type="file" class="form-control Stagename" name="Stagename"
                                        id="profile_path" aria-describedby="emailHelp" placeholder="Enter password">
                                    <span class="Stagename" id="Error" style="color:red;"></span>
                                </div> -->
                              
                               
                                <div class="bio_wrapper">
                                <div class="errors"> <span class="profile-setup-error  pb-3"></span></div>
                                   
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Bio <span style="color:red;">*</span></label>
                                    <input  class="form-control bio" name="bio" id="exampleInputPassword1" value="{{ $User->discription ?? '' }}" placeholder="Type Your Bio">
                                    <span class="bio_error" id="Error" style="color:red;"></span>
                                  
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Location <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control location" name="location"
                                        id="exampleInputPassword1" placeholder="Location"
                                        value="{{ $User->location ?? '' }}">
                                    <span class="location" id="Error" style="color:red;"></span>
                                </div>
                                </div>


                                <div class="bio_wrapper">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">timezone <span style="color:red;">*</span>
                                    <p>Your timezone will not dispaly on your public profile</p>
                                    </label>
                                    <select class="form-control " name="timezone" id="Timezone">
                                        <option class="Eastern UTC" value="Eastern UTC"
                                            @if ($User->timezone == 'Eastern UTC') Selected @endif>Eastern UTC - 05:00
                                        </option>
                                        <option class="Central UTC" value="Central UTC"
                                            @if ($User->timezone == 'Central UTC') Selected @endif>Central UTC - 06:00
                                        </option>
                                        <option class="Mountain UTC" value="Mountain UTC"
                                            @if ($User->timezone == 'Mountain UTC') Selected @endif>Mountain UTC - 07:00
                                        </option>
                                        <option class="Pacific UTC" value="Pacific UTC"
                                            @if ($User->timezone == 'Pacific UTC') Selected @endif>Pacific UTC - 08:00
                                        </option>
                                    </select>
                                    <span class="Timezone" id="Error" style="color:red;"></span>
                                </div>
                                    </div>
                                    <div class="bio_wrapper">
                                <h4 class="mt-2"><b>#Hashtags</b></h4>


                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Orientation <span style="color:red;">*</span>

                                    </label>
                                    <select name="orientation" class="form-control " id="orientation" required>
                                        <option value="">Select</option>
                                        @if (count($model_orient) > 0)
                                            @foreach ($model_orient as $value)
                                                <option value="{{ $value->id }}"
                                                    @if ($model->Orientation == $value->id) Selected @endif>
                                                    {{ $value->title }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    <span class="orientation" id="Error" style="color:red;"></span>
                                </div>

                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Hair <span style="color:red;">*</span>

                                    </label>
                                    <select name="hair" class="form-control " id="hair" required>
                                        <option value="">Select</option>
                                        @if (count($model_hair) > 0)
                                            @foreach ($model_hair as $hair)
                                                <option value="{{ $hair->id }}"
                                                    @if ($model->Hair == $hair->id) Selected @endif>
                                                    {{ $hair->title }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    <span class="hair" id="Error" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Ethnicity <span style="color:red;">*</span>

                                    </label>
                                    <select name="ethnicity" class="form-control " id="ethnicity" required>
                                        <option value="">Select</option>
                                        @if (count($model_ethnic) > 0)
                                            @foreach ($model_ethnic as $ethnic)
                                                <option value="{{ $ethnic->id }}"
                                                    @if ($model->Ethnicity == $ethnic->id) Selected @endif>
                                                    {{ $ethnic->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="ethnicity" id="Error" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Fetish <span style="color:red;">*</span>

                                    </label>
                                    <select name="fetishes" class="form-control " id="fetishes" required>
                                        <option value="">Select</option>
                                        @if (count($model_fet) > 0)
                                            @foreach ($model_fet as $fet)
                                                <option value="{{ $fet->id }}"
                                                    @if ($model->Fetishes == $fet->id) Selected @endif>
                                                    {{ $fet->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="fetishes" id="Error" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Language <span style="color:red;">*</span>

                                    </label>
                                    <select name="language" class="form-control " id="language" required>
                                        <option value="">Select</option>
                                        @if (count($model_lang) > 0)
                                            @foreach ($model_lang as $lang)
                                                <option value="{{ $lang->id }}"
                                                    @if ($model->Language == $lang->id) Selected @endif>
                                                    {{ $lang->title }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    <span class="language" id="Error" style="color:red;"></span>
                                    
                                   
                                </div>
                            </div>
                           
                            </div>
                            @php $links = json_decode($model->socail_links, true); @endphp
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                            <div class="bio_wrapper">
                            
                                <h4 class="mt-4"><b>My Links</b></h4>



                                <div class="Stagename-wraper">
                                    <label for="exampleInputEmail1">Twitter</label>
                                    <input type="text" class="form-control Twitter" id="exampleInputEmail1"
                                        name="Twitter" aria-describedby="emailHelp" placeholder="Twitter.com"
                                        value="{{ $links['twitter'] ?? '' }}">
                                        <span class="url_error_Twitter" style="color:red;"></span>

                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Instagram</label>
                                    <input type="text" class="form-control Instagram" id="exampleInputPassword1"
                                        placeholder="Instagram.com" value="{{ $links['instagram'] ?? '' }}"
                                        name="Instagram">
                                        <span class="url_error_Instagram" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Snapchat</label>
                                    <input type="text" class="form-control Snapchat" id="exampleInputPassword1"
                                        placeholder="Snapchat.com" value="{{ $links['snapchat'] ?? '' }}"
                                        name="Snapchat">
                                        <span class="url_error_Snapchat" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">SpankPay</label>
                                    <input type="text" class="form-control SpankPay" id="exampleInputPassword1"
                                        placeholder="SpankPay.com" value="{{ $links['spankpay'] ?? '' }}"
                                        name="SpankPay">
                                        <span class="url_error_SpankPay" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Website
                                    </label>
                                    <input type="text" class="form-control Website" id="exampleInputPassword1"
                                        placeholder="Website: https://
                        "
                                        value="{{ $links['website'] ?? '' }}" name="Website">
                                        <span class="url_error_Website" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Cam Site
                                    </label>
                                    <input type="text" class="form-control CamSite" id="exampleInputPassword1"
                                        placeholder="Cam Site: https://
                        "
                                        value="{{ $links['camsite'] ?? '' }}" name="CamSite">
                                        <span class="url_error_CamSite" style="color:red;"></span>
                                </div>
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Wishlist <span style="color:red;">*</span>

                                    </label>
                                    <input type="text" class="form-control Wishlist" id="exampleInputPassword1"
                                        placeholder="Wishlist: https://

                        "
                                        value="{{ $links['camsite'] ?? '' }}" name="CamSite">
                                        <span class="url_error_Wishlist" style="color:red;"></span>
                                    <span class="links" style="color:red;" ></span>
                                </div>

                            </div>
</div>

                        </div>
                    </div>
                    <div class="">

                    <button class="button   mb-4 next-btnjoin mt-4" id="links" type="button"
                            step_number="4">Next</button>
                    </div>
                </section>
            </form>
            <form id="phone_number" name="userAccountSetupForm" enctype="multipart/form-data" method="POST"
                action="{{ url('/model-steps') }}">
                <section id="step-4"
                    @if ($currant_step == '4') class="form-step" @else class="form-step d-none" @endif>
                    <!-- <h2 class="font-normal">Phone Number</h2> -->
                    @csrf
                    <input type="hidden" value="{{ $model_id }}" class="model_id" name="model_id">
                    <input type="hidden" value="5" name="step">
                    <!-- Step 3 input fields -->
                    <div class="mt-3">
                        @php $manage = json_decode($model->contact_numbers, true); @endphp
                        <div class="errors"><span class="phone-number-error  " style=""></span></div>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            
                                <div class="Stagename-wraper">
                                
                                    <label for="exampleInputPassword1">Private Phone Number <span style="color:red;">*</span>

                                    </label>
                                    <input type="number" value="{{ $manage['Privatenumber'] ?? '' }}"
                                        class="form-control Privatenumber" name="Privatenumber"
                                        id="exampleInputPassword1"
                                        placeholder="Private Phone Number"  onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"/>
                                    <span class="Privatenumber" id="Error" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Login Phone Number <span style="color:red;">*</span>

                                    </label>
                                    <input type="number"  value="{{ $manage['loginnumber'] ?? '' }}"
                                        class="form-control loginnumber " name="loginnumber"
                                        id="exampleInputPassword1" placeholder="Login Phone Number"  onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"/>
                                    <span class="loginnumber" id="Error" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Bad BunniesTv Phone Number <span style="color:red;">*</span>

                                    </label>
                                    <input type="number" value="{{ $manage['badbunniestv'] ?? '' }}"
                                        class="form-control badbunniestv " name="badbunniestv"
                                        id="exampleInputPassword1"
                                        placeholder="Bad BunniesTv Phone Number
    
                    "  onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" />
                                    <span class="badbunniestv" id="Error" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">

                        <button class="button  next-btnjoin" id="phonenumber" type="button"
                            step_number="5">Next</button>
                    </div>
                </section>
            </form>
            <form id="price_form" name="userAccountSetupForm" enctype="multipart/form-data" method="POST"
                action="{{ url('/model-steps') }}">
                @csrf
                <input type="hidden" value="{{ $model_id }}" class="model_id" name="model_id">
                <input type="hidden" value="6" name="step">
                <section id="step-5"
                    @if ($currant_step == '5') class="form-step" @else class="form-step d-none" @endif >
                    <h2 class="font-normal">Set Price</h2>
                    <!-- Step 3 input fields -->
                    <div class="mt-3">


                        <h4>How much do you want to charge for</h4>

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                               <p class="setprice"> texts sent to you?<br><span class="set-rate">Min $1.00/Max $5.00</span> <br></p>
                                <span class="text_price_error" id="Error" style="color:red;"></span>
                            </div>
                            <div class=" col-lg-6 col-md-6 col-sm-12">
                                <div class="img-thumbs img-thumbs-hidden" id="img-preview" style="float: right;">
                                    <div class="price">
                                        <div class="number  mt-3 d-flex">
                                            <span class="minus " id="minus-text">-</span>
                                            <input type="number" min="1" max="5" name="text_price"
                                                id="text" class="input-price text_price" type="text"
                                                value="{{ $model->cost_msg ?? '1' }}"  onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" />
                                            <span class="plus ml-1" id="plus-text">+</span>
                                        </div>



                                    </div>
                                </div>

                            </div>


                        </div>
                        <hr>
                        <div class="row mt-1">

                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <p class="setprice"> pictures you sent or receive?<br><span class="">Min $1.00/Max $10.00</span></p>
                                <br>
                                <span class="picture_price_error" id="Error" style="color:red;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="img-thumbs img-thumbs-hidden" id="img-preview" style="float: right">
                                    <div class="price">
                                        <div class="number  mt-3 d-flex">
                                            <span class="minus " id="minus-picture">-</span>
                                            <input type="number" min="1" max="10" name="picture_price"
                                                id="picture" class="input-price picture_price"
                                                type="text"value="{{ $model->cost_pic ?? '1' }}"  onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" />
                                            <span class="plus ml-1" id="plus-picture">+</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row mt-1">

                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <p class="setprice">  audio you sent or receive?<br><span class="">Min $1.00/Max $20.00</span></p>
                                <br>
                                <span class="audio_price_error" id="Error" style="color:red;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="img-thumbs img-thumbs-hidden" id="img-preview" style="float: right">
                                    <div class="price">
                                        <div class="number  mt-3 d-flex">
                                            <span class="minus " id="minus-audio">-</span>
                                            <input name="audio_price" class="input-price audio_price" type="text"
                                                id="audio" value="{{ $model->cost_audiomsg ?? '1' }}" />
                                            <span class="plus ml-1" id="plus-audio">+</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row mt-1">

                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <p class="setprice">  videos you sent or receive?<br><span class="">Min $1.00/Max $20.00</span><br></p>
                                <span class="video_price_error" id="Error" style="color:red;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="img-thumbs img-thumbs-hidden" id="img-preview" style="float: right">
                                    <div class="price">
                                        <div class="number  mt-3 d-flex">
                                            <span class="minus " id="minus-videos">-</span>
                                            <input name="video_price" class="input-price video_price" type="text"
                                                id="videos" value="{{ $model->cost_videomsg ?? '1' }}" />
                                            <span class="plus ml-1" id="plus-videos">+</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-8 col-md-8 col-sm-12 ">
                              <h4>Do you want to accept phone calls?</h4>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 p-0">
                                <span class="phone-call-redio-btn">
                                    <div class="d-flex ml-3">
                                        <div class="custom-control custom-radio custom-control-inline p-0">

                                            <input type="radio" id="customRadioInline1" name="phonecall"
                                                class="custom-control-input" value="1"
                                                @if (!empty($model->phone)) @if ($model->phone == '1') Checked @endif
                                            @else Checked @endif>
                                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline p-0">
                                            <input type="radio" id="customRadioInline5" value="0"
                                                name="phonecall"
                                                class="custom-control-input"@if ($model->phone == '0') Checked @endif>
                                            <label class="custom-control-label" for="customRadioInline5">No
                                            </label>
                                        </div>

                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-1">

                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <p class="setprice">   How much do you want to charge per minute for incoming phone calls?<br><span
                                    class="">Min $1.00/Max $10.00</span><br></p>
                                <span class="incoming_call_price_error" id="Error" style="color:red;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="img-thumbs img-thumbs-hidden" id="img-preview" style="float: right">
                                    <div class="price">
                                        <div class="number  mt-3 d-flex">
                                            <span class="minus " id="minus-phonecall">-</span>
                                            <input class="input-price incoming_call_price" type="text"
                                                name="incoming_call_price" id="phonecall"
                                                value="{{ $model->cost_audiocall ?? '1' }}" />
                                            <span class="plus ml-1" id="plus-phonecall">+</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row mt-1">

                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <p class="setprice">   What is the minimum call time?<br><span class="">Min 1 min/Max 5 min</span><br></p>
                                <span class="min_call_time_error" id="Error" style="color:red;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="img-thumbs img-thumbs-hidden" id="img-preview" style="float: right">
                                    <div class="price">
                                        <div class="number  mt-3 d-flex">
                                            <span class="minus " id="minus-calltime">-</span>
                                            <input class="input-price min_call_time" name="min_call_time"
                                                type="text" id="calltime"
                                                value="{{ $model->min_call_time ?? '1' }}" />
                                            <span class="plus ml-1" id="plus-calltime">+</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <h4>Do you want to accept video calls?</h4>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-6 col-12 p-0">
                                <span class="phone-call-redio-btn">
                                    <div class="d-flex ml-3" >
                                        <div class="custom-control custom-radio custom-control-inline p-0">
                                            <input type="radio" id="customRadioInline2" name="videocall"
                                                class="custom-control-input" value="1"
                                                @if (!empty($model->video)) @if ($model->phone == '1') Checked @endif
                                            @else Checked @endif>
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline p-0">
                                            <input type="radio" id="customRadioInline3" name="videocall"
                                                class="custom-control-input" value="0"
                                                @if ($model->video == '0') Checked @endif>
                                            <label class="custom-control-label" for="customRadioInline3">No
                                            </label>
                                        </div>

                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-1">

                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                            <p class="setprice">    How much do you want to charge per minute for incoming video calls?<br><span
                                    class="">Min $1.00/Max $30.00</span><br></p>
                                <span class="incoming_video_call_error" id="Error" style="color:red;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="img-thumbs img-thumbs-hidden" id="img-preview" style="float: right">
                                    <div class="price">
                                        <div class="number  mt-3 d-flex">
                                            <span class="minus " id="minus-videocall">-</span>
                                            <input class="input-price incoming_video_call" name="incoming_video_call"
                                                type="text" id="videocall"
                                                value="{{ $model->cost_videocall ?? '1' }}" />
                                            <span class="plus ml-1" id="plus-videocall">+</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                   
                    <div class="">

                        <button class="button mb-4 btn-navigate-form-step next-btnjoin mt-4" id="callrate"
                            style="border: none;" type="button" step_number="6">Next</button>
                    </div>
                    
                </section>
            </form>
    
            <form id="pay_form" name="userAccountSetupForm" enctype="multipart/form-data" method="POST"
                action="{{ url('/model-steps') }}">
                @csrf
                <input type="hidden" value="{{ $model_id }}" class="model_id" name="model_id">
                <input type="hidden" value="7" name="step">
                <section id="step-6"
                    @if ($currant_step == '6') class="form-step" @else class="form-step d-none" @endif>
                    <h2 class="font-normal">Payments Info</h2>
                    <!-- Step 3 input fields -->
                    <div class="mt-3">
                    <div class="errors"> <span class="payments-setup-error mt-3 mb-3 pb-3"></span></div>    
                    <div class="row">
                            <div class="col-md-6">
                            <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Payble to <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control Payble" name="Payble"
                                        value="{{ $model->payble ?? '' }}" id="exampleInputPassword1"
                                        placeholder="Payble">
                                    <span class="Payble" id="Error" style="color:red;"></span>
                                </div>
                            </div>
                           
                                    <div class="col-md-6">
                                        <div class="Stagename-wraper">
                                            <label for="exampleInputPassword1">City <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control City" name="City"
                                                id="exampleInputPassword1" placeholder="City"
                                                value="{{ $model->city ?? '' }}">
                                            <span class="City" id="Error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="Stagename-wraper">
                                            <label for="exampleInputPassword1">Province <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control Province" name="Province"
                                                id="exampleInputPassword1" placeholder="Province"
                                                value="{{ $User->city ?? '' }}">
                                            <span class="Province" id="Error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="Stagename-wraper">
                                            <label for="exampleInputPassword1">Apartment or Unit <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control Apartmentunit"
                                                name="Apartmentunit" id="exampleInputPassword1" placeholder="Unit#"
                                                value="{{ $model->apartment_unit ?? '' }}">
                                            <span class="Apartmentunit" id="Error" style="color:red;"></span>
                                        </div>
                                    </div>
                               

                            <div class="col-md-6">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Zip <span style="color:red;">*</span></label>
                                    <select name="zip" class="form-control" required id="zip">
                                        <option value="">Select</option>
                                        <option value="Alberta" @if ($model->zip == 'Alberta') Selected @endif>
                                            Alberta
                                        </option>
                                        <option value="British Columbia"
                                            @if ($model->zip == 'British Columbia') Selected @endif>British Columbia
                                        </option>
                                        <option value="Manitoba" @if ($model->zip == 'Manitoba') Selected @endif>
                                            Manitoba</option>
                                        <option value="New Brunswick"
                                            @if ($model->zip == 'New Brunswick') Selected @endif>
                                            New Brunswick</option>
                                        <option value="Newfoundland and Labrador"
                                            @if ($model->zip == 'Newfoundland and Labrador') Selected @endif>Newfoundland and
                                            Labradora
                                        </option>
                                        <option value="Nova Scotia"
                                            @if ($model->zip == 'Nova Scotia') Selected @endif>
                                            Nova Scotiaa</option>
                                        <option value="Nunavut" @if ($model->zip == 'Nunavut') Selected @endif>
                                            Nunavuta</option>
                                        <option value="Ontario" @if ($model->zip == 'Ontario') Selected @endif>
                                            Ontarioa</option>
                                        <option value="Quebec" @if ($model->zip == 'Quebec') Selected @endif>
                                            Quebeca
                                        </option>
                                        <option value="Saskatchewan"
                                            @if ($model->zip == 'Saskatchewan') Selected @endif>
                                            Saskatchewana</option>
                                        <option value="Yukon" @if ($model->zip == 'Yukon') Selected @endif>
                                            Yukona
                                        </option>
                                    </select>
                                    <span class="zip" id="Error" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Street Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control streetadd" name="streetadd"
                                        id="exampleInputPassword1" placeholder="Street address"
                                        value="{{ $model->street_address ?? '' }}">
                                    <span class="streetadd" id="Error" style="color:red;"></span>
                                </div>
                            </div>
                       
                            <div class="col-md-6">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Account No. <span style="color:red;">*</span></label>
                                    <input type="number" class="form-control accountno"   name="accountno"
                                        id="exampleInputPassword1" placeholder="Account No."
                                        value="{{ $model->account_no ?? '' }}"  onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                    <span class="accountno" id="Error" style="color:red;"></span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Ifsc Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control ifsccode" name="ifsccode"
                                        id="exampleInputPassword1" placeholder="Ifsc code"
                                        value="{{ $model->ifsc_code ?? '' }}">
                                    <span class="ifsccode" id="Error" style="color:red;"></span>
                                </div>


                            </div>
                            <div class="col-md-12">
                                <div class="Stagename-wraper">
                                    <label for="exampleInputPassword1">Country <span style="color:red;">*</span></label>
                                    <select name="Country" class="form-control" id="Country" required>
                                        <option value="">Select</option>
                                        <option value="USA" @if ($User->country == 'USA') Selected @endif>
                                            United
                                            States of America</option>
                                        <option value="CANADA" @if ($User->country == 'CANADA') Selected @endif>
                                            CANADA
                                        </option>
                                    </select><span class="Country" id="Error" style="color:red;"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="">

                        <button class="button submit-btn next-btnjoin" style="border: none;" id="sumbit"
                            type="submit">Save</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
</body>






<script src="{{ asset('js/jquery.js') }}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<!-- owl cursol start -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
    < script src = "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" >
</script>

<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>

<script src="{{ asset('js/slidediv.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#minus-text').click(function() {

            var $input = $(this).parent().find('input');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('#plus-text').click(function() {
            text = $("#text").val();

            var $input = $(this).parent().find('input');

            if (text < 5) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input.change();
            }


            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#minus-picture').click(function() {

            var $input = $(this).parent().find('input');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('#plus-picture').click(function() {
            text = $("#picture").val();

            var $input = $(this).parent().find('input');

            if (text < 10) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input.change();
            }


            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#minus-audio').click(function() {

            var $input = $(this).parent().find('input');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('#plus-audio').click(function() {
            text = $("#audio").val();

            var $input = $(this).parent().find('input');

            if (text < 20) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input.change();
            }


            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#minus-videos').click(function() {

            var $input = $(this).parent().find('input');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('#plus-videos').click(function() {
            text = $("#videos").val();

            var $input = $(this).parent().find('input');

            if (text < 20) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input.change();
            }


            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#minus-phonecall').click(function() {

            var $input = $(this).parent().find('input');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('#plus-phonecall').click(function() {
            text = $("#phonecall").val();

            var $input = $(this).parent().find('input');

            if (text < 10) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input.change();
            }


            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#minus-calltime').click(function() {

            var $input = $(this).parent().find('input');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('#plus-calltime').click(function() {
            text = $("#calltime").val();

            var $input = $(this).parent().find('input');

            if (text < 5) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input.change();
            }


            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#minus-videocall').click(function() {

            var $input = $(this).parent().find('input');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('#plus-videocall').click(function() {
            text = $("#videocall").val();

            var $input = $(this).parent().find('input');

            if (text < 30) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input.change();
            }


            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).on("click", "#newpassword", function(e) {
        e.preventDefault();

        var new_password = $('.new_password').val();
        var model_id = $('.model_id').val();
        var confirm_new_password = $('.confirm_new_password').val();
        $('.confirm_new_password').text('');
        $('.new_password').text('');



        if (new_password != '' && confirm_new_password != '') {
            if (new_password.length > 7 && confirm_new_password.length > 7) {
                $('.confirm_new_password').text('');
                if (new_password == confirm_new_password) {
                    $("#Password_form").submit();
                } else {
                    $('.new_password').text('');
                    $('.confirm_new_password').text('Password do not match');
                }
            } else {
                $('.confirm_new_password').text('The password must be at least 8 characters.');
            }
        } else {
            if (new_password == '') {
                $('.new_password').text('This field is required');
                checkoutvalue = 0;
            } else {
                $('.new_password').text('');
            }
            if (confirm_new_password == '') {
                checkoutvalue = 0;
                $('.confirm_new_password').text('This field is required');
            } else {
                $('.confirm_new_password').text('');
            }


        }




    });
</script>

<script>
    $("#agreementbtn").click(function(e) {
        e.preventDefault();
        $("#agreement").click(function(e) {

            if (!$("#agreement").prop("checked")) {
                checkoutvalue1 = 0;

                $("#agreementbtn").removeClass("btn-navigate-form-step");
            } else {
                checkoutvalue1 = 1;
                $("#agreementbtn").addClass("btn-navigate-form-step");
            }

        });



        $('.checkbox').text('');


        if (!$("#agreement").prop("checked")) {
            checkoutvalue1 = 0;
            $('.checkbox').text('Checkbox required');
            $("#agreementbtn").removeClass("btn-navigate-form-step");
        } else {
            $('#Pass_agreement').submit();

        }



    });
</script>
<script>
    $(document).ready(function() {

        $("#links").click(function(e) {

            e.preventDefault();






            var profile_bio = $('.bio').val();
            // var Stagename = $('.Stagename').val();
            var location = $('.location').val();
            var Timezone = $('#Timezone').val();
            var orientation = $('#orientation').val();
            var hair = $('#hair').val();
            var ethnicity = $('#ethnicity').val();
            var fetishes = $('#fetishes').val();
            var language = $('#language').val();
            var Twitter = $('.Twitter').val();
            var Instagram = $('.Instagram').val();
            var Snapchat = $('.Snapchat').val();
            var SpankPay = $('.SpankPay').val();
            var Website = $('.Website').val();
            var CamSite = $('.CamSite').val();
            var Wishlist = $('.Wishlist').val();
          
            // $('.Stagename').text('');
            $('.bio_error').text('');
            $('.location').text('');
            $('.Timezone').text('');
            $('.orientation').text('');
            $('.hair').text('');
            $('.ethnicity').text('');
            $('.language').text('');
            $('.links').text('');
            $('.fetishes').text('');



            checkoutvalue = 1;

            // if (Stagename == '') {
            //     $('.Stagename').text('This field is required');
            //     checkoutvalue = 0;
            // }
           
            if (profile_bio == '') {
               
                $('.bio_error').text('This field is required');
                checkoutvalue = 0;

         
            }
            if (location == '') {
                
                $('.location').text('This field is required');
                checkoutvalue = 0;
               
            }
            if (Timezone == '') {
                $('.Timezone').text('This field is required');
                checkoutvalue = 0;
               
            }
            if (orientation == '') {
                $('.orientation').text('This field is required');
                checkoutvalue = 0;
                
            }
            if (hair == '') {
                $('.hair').text('This field is required');
                checkoutvalue = 0;
               
            }
            if (ethnicity == '') {
                $('.ethnicity').text('This field is required');
                checkoutvalue = 0;
               
            }
            if (fetishes == '') {
                $('.fetishes').text('This field is required');
                checkoutvalue = 0;
               
            }
            if (language == '') {
                $('.language').text('This field is required');
                checkoutvalue = 0;
               
            }
            if (Twitter == '' && Instagram == '' && Snapchat == '' && SpankPay == '' && Website == '' &&
                CamSite == '' && Wishlist == '') {
                $('.links').text('Enter atleast one url');
                checkoutvalue = 0;
               
            }else{
                $('.links').text('');



                if( Twitter != '' && !~Twitter.indexOf(".") ) {
                    $('.url_error_Twitter').text('Please enter a valid url');
                    checkoutvalue = 0;
                   
                }else{
                   
                $('.url_error_Twitter').text('');
                }



                if(Instagram != '' && !~Instagram.indexOf(".") ) {
                    $('.url_error_Instagram').text('Please enter a valid url');
                    checkoutvalue = 0;
                  
                }else{
                   
                $('.url_error_Instagram').text('');
                }


                if(Snapchat != '' && !~Snapchat.indexOf(".") ) {
                    $('.url_error_Snapchat').text('Please enter a valid url');
                    checkoutvalue = 0;
                  
                }else{
                   
                $('.url_error_Snapchat').text('');
                }


                if(SpankPay != '' && !~SpankPay.indexOf(".") ) {
                    $('.url_error_SpankPay').text('Please enter a valid url');
                    checkoutvalue = 0;
                   
                }else{
                   
                $('.url_error_SpankPay').text('');
                }




                if(Website != '' && !~Website.indexOf(".") ) {
                    $('.url_error_Website').text('Please enter a valid url');
                    checkoutvalue = 0;
               
                }else{
                   
                $('.url_error_Website').text('');
                }


                if(CamSite != '' && !~CamSite.indexOf(".") ) {
                    $('.url_error_CamSite').text('Please enter a valid url');
                    checkoutvalue = 0;
                 
                }else{
                   
                $('.url_error_CamSite').text('');
                }

                if(Wishlist != '' && !~Wishlist.indexOf(".") ) {
                    $('.url_error_Wishlist').text('Please enter a valid url');
                    checkoutvalue = 0;
                 
                }else{
                   
                $('.url_error_Wishlist').text('');
                }










            }
        
            if (checkoutvalue == 1) {
              
                $('#profile_form').submit();
                var model_id = $('.model_id').val();

                $("#links").addClass("btn-navigate-form-step");

            }else{
                $(".profile-setup-error").html("<span class='error_text'>Please! check below errors.</span>");
                $(window).scrollTop(0);
            }
            

        });





    });
</script>
</script>
<script>
    $(document).ready(function() {

        $("#phonenumber").click(function(e) {

            e.preventDefault();





            var Privatenumber = $('.Privatenumber').val();
            var badbunniestv = $('.badbunniestv').val();
            var loginnumber = $('.loginnumber').val();


            $('.Privatenumber').text('');
            $('.badbunniestv').text('');
            $('.loginnumber').text('');




            checkoutvalue = 1;

            if (Privatenumber == '') {
                $('.Privatenumber').text('This field is required');
                checkoutvalue = 0;
            }
            if (badbunniestv == '') {
                $('.badbunniestv').text('This field is required');
                checkoutvalue = 0;
            }
            if (loginnumber == '') {
                $('.loginnumber').text('This field is required');
                checkoutvalue = 0;
            }

            $('.phone-number-error').text('');
            if (checkoutvalue == 1) {
                var model_id = $('.model_id').val();
                $('#phone_number').submit();
                $("#phonenumber").addClass("btn-navigate-form-step");


            }else{
                
                $('.phone-number-error').html("<span class='error_text'>Please! check below errors.<span>");
                $(window).scrollTop(0);
                
            }


        });





    });
</script>
</script>
<script>
    $(document).ready(function() {

        $("#sumbit").click(function(e) {

            e.preventDefault();





            var ifsccode = $('.ifsccode').val();
            var accountno = $('.accountno').val();
            var Country = $('#Country').val();
            var streetadd = $('.streetadd').val();
            var zip = $('#zip').val();
            var Apartmentunit = $('.Apartmentunit').val();
            var Province = $('.Province').val();
            var City = $('.City').val();
            var Payble = $('.Payble').val();


            $('.ifsccode').text('');
            $('.accountno').text('');
            $('.Country').text('');
            $('.streetadd').text('');
            $('.zip').text('');
            $('.Apartmentunit').text('');
            $('.Province').text('');
            $('.City').text('');
            $('.Payble').text('');




            checkoutvalue = 1;

            if (ifsccode == '') {
                $('.ifsccode').text('This field is required');
                checkoutvalue = 0;
             
            }
            if (accountno == '') {
                $('.accountno').text('This field is required');
                checkoutvalue = 0;
            
            }
            if (Country == '') {
                $('.Country').text('This field is required');
                checkoutvalue = 0;
             
            }
            if (streetadd == '') {
                $('.streetadd').text('This field is required');
                checkoutvalue = 0;
             
            }
            if (zip == '') {
                $('.zip').text('This field is required');
                checkoutvalue = 0;
             
            }
            if (Apartmentunit == '') {
                $('.Apartmentunit').text('This field is required');
                checkoutvalue = 0;
             
            }
            if (Province == '') {
                $('.Province').text('This field is required');
                checkoutvalue = 0;
             
            }
            if (City == '') {
                $('.City').text('This field is required');
                checkoutvalue = 0;
            
            }
            if (Payble == '') {
                $('.Payble').text('This field is required');
                checkoutvalue = 0;
            
            }


            if (checkoutvalue == 1) {
                $('#pay_form').submit();
            }else{
                $('.payments-setup-error').html("<span class='error_text'>Please! check below errors.<span>");
                $(window).scrollTop(0);
            }


        });





    });
</script>




<script>
    $(document).ready(function() {
        $("#callrate").click(function(e) {
            e.preventDefault();
            var text_price = $('.text_price').val();
            var picture_price = $('.picture_price').val();
            var audio_price = $('.audio_price').val();
            var video_price = $('.video_price').val();
            var incoming_call_price = $('.incoming_call_price').val();
            var incoming_call_price = $('.incoming_call_price').val();
            var min_call_time = $('.min_call_time').val();
            var incoming_video_call = $('.incoming_video_call').val();

            checkoutvalue = '1';

            if (text_price > 5 || text_price < 1) {
                $('.text_price_error').text('Price from 1$ to 5$. should be');
                checkoutvalue = 0;
            } else {
                $('.text_price_error').text('');
            }
            if (picture_price > 10 || picture_price < 1) {
                $('.picture_price_error').text('Price from 1$ to 10$. should be');
                checkoutvalue = 0;
            } else {
                $('.picture_price_error').text('');
            }
            if (audio_price > 20 || audio_price < 1) {
                $('.audio_price_error').text('Price from 1$ to 20$. should be');
                checkoutvalue = 0;
            } else {
                $('.audio_price_error').text('');
            }
            if (video_price > 20 || video_price < 1) {
                $('.video_price_error').text('Price from 1$ to 20$. should be');
                checkoutvalue = 0;
            } else {
                $('.video_price_error').text('');
            }
            if (incoming_call_price > 10 || incoming_call_price < 1) {
                $('.incoming_call_price_error').text('Price from 1$ to 10$. should be');
                checkoutvalue = 0;
            } else {
                $('.incoming_call_price_error').text('');
            }
            if (min_call_time > 5 || min_call_time < 1) {
                $('.min_call_time_error').text('Price from 1$ to 5$. should be');
                checkoutvalue = 0;
            } else {
                $('.min_call_time_error').text('');
            }
            if (incoming_video_call > 30 || incoming_video_call < 1) {
                $('.incoming_video_call_error').text('Price from 1$ to 30$. should be');
                checkoutvalue = 0;
            } else {
                $('.incoming_video_call_error').text('');
            }

            if (checkoutvalue == 1) {
                var model_id = $('.model_id').val();
                $('#price_form').submit();
            }
        });
    });
</script>

