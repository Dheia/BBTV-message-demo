@extends('frontend.main')
@section('content')
<style>
  .Stagename-wraper {
    display: flex;
    flex-direction: column;
    margin-bottom: 30px;
    margin-top: 14px !important;
  }

  #Error {
    color: red;
  }
</style>
<div class="joinpage-wrapper">
  <div class="container">
    <div class="becomemodel-wrapepr">
      <div class="adultmodel-wraper">
        <h1 class="become-hading">Become a AdultX Model</h1>
        <p class="becomewrapp-para">
          Monetize communication with fans all around the world via calls,
          text, pictures and videos right from your mobile phone.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-4 mb-3">
          <div class="workany-wraper">
            <img src="./image/join1.png" alt="#" />
            <span>Work Anywhere</span>
          </div>
        </div>
        <div class="col-sm-4 mb-3">
          <div class="workany-wraper">
            <img src="./image/join2.png" alt="#" />
            <span>Set Your Own Rates</span>
          </div>
        </div>
        <div class="col-sm-4 mb-3">
          <div class="workany-wraper">
            <img src="./image/join3.png" alt="#" />
            <span>Make Up to $5,000 per week!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Requirements start -->
  <div class="requirement-bg">
    <div class="container">
      <div class="requirment-wrapper">
        <h2 class="requirement-heading">Requirements</h2>
        <div class="requirements-point-wrapper">
          <ul class="requirement-pointwrapp">
            <li>
              <div class="requirements-number">1</div>
              <div class="requirementscontent-wrap">
                <p>You must be a citizen of the United States or Canada.</p>
              </div>
            </li>
            <li>
              <div class="requirements-number">2</div>
              <div class="requirementscontent-wrap">
                <p>
                  An established following on social media sites such as
                  Twitter
                </p>
                <b> or </b>
                <p>
                  Instagram OR Have an established following on another
                  adult platform such as MyFreeCams, Chaturbate, ManyVids,
                  or OnlyFans
                </p>
                <b></b>
              </div>
            </li>
            <li>
              <div class="requirements-number">3</div>
              <div class="requirementscontent-wrap">
                <p>
                  A willingness to promote and engage with your fan base -
                  You will create several connections but it is up to you to
                  actually engage in real conversations with them!
                </p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Requirements end -->
  <div class="container">
    <div id="Div1" id="ConnectionWiseForm">
      <div class="joinform-wrapper">
        <form method="post" class="model_store_form" action="{{ route('save-model') }}" enctype="multipart/form-data">
          @csrf
         
        <input type="hidden" name="refer_id" value=" @if(app('request')->input('id')) {{ app('request')->input('id') }} @endif ">
          <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12 col-12" id="joinformfirst">
              <div class="gender-select-wraper">
                <label>Gender select</label>
                <div class="genderbtn-warpp">
                  <div class="gender-radio-wrapp">
                    <label class="ckeckfilter">
                      <input type="radio" name="gender" id="s-option1" class="filter orientation" value="female"
                        checked >
                      <label for="s-option1">Female</label>
                      <div class="check">
                        <div class="inside"></div>
                      </div>
                    </label>
                  </div>
                  <div class="gender-radio-wrapp ml-2">
                    <label class="ckeckfilter">
                      <input type="radio" name="gender" id="s-option2" class="filter orientation" value="male" />
                      <label for="s-option2">Male</label>
                      <div class="check">
                        <div class="inside"></div>
                      </div>
                    </label>
                  </div>
                  <div class="gender-radio-wrapp ml-2">
                    <label class="ckeckfilter">
                      <input type="radio" name="gender" id="s-option3" class="filter orientation" value="transgender" />
                      <label for="s-option3">Tran</label>
                      <div class="check">
                        <div class="inside"></div>
                      </div>
                    </label>
                  </div>
                </div>
                @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="Stagename-wraper mt-5">
                <label>Stage Name <span style="color:red;">*</span></label>
                <input type="text" class="stage_name" value="{{old('stage_name') ?? ''}}" name="stage_name" placeholder="Choose a Username" Required>
                <span class=" stage_name_error" id="Error"></span>
              </div>


              <div class="Stagename-wraper">
                <label>First Name <span style="color:red;">*</span></label>
                <input type="text" class="first_name" name="first_name" value="{{old('first_name') ?? ''}}" placeholder="Enter first name" Required>
                @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <span class="first_name_error" id="Error"></span>
              </div>
              <div class="Stagename-wraper">
                <label>Last Name <span style="color:red;">*</span></label>
                <input type="text" class="last_name" name="last_name"  value="{{old('last_name') ?? ''}}" placeholder="Enter last name" Required>
                @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <span class="last_name_error" id="Error"></span>
              </div>
              <div class="Stagename-wraper">
                <label>Email Address <span style="color:red;">*</span></label>
                <input type="text" class="email" name="email"  value="{{old('email') ?? ''}}" placeholder="Enter your Email" Required>
                <span class="email_error" id="Error"></span>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <p>
                  <img src="./image/worning.png" alt="#" /> This email address
                  is kept private! Your email address is used for internal
                  business purposes only.
                </p>
              </div>
              <div class="Stagename-wraper">
                <label>Phone Number <span style="color:red;">*</span></label>
                <input type="number" class="phone_number"  value="{{old('phone_number') ?? ''}}" name="phone_number" placeholder="Enter your Number" Required onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                <span class="phone_number_error" id="Error"></span>
                <p>
                  <img src="./image/worning.png" alt="#" />
                  This phone number is kept private! Your real phone number
                  will never be displayed to users.
                </p>
              </div>


            </div>
            <div class="col-xl-6 col-md-6 col-sm-12 col-12" id="joinformsecond">
              <div class="Stagename-wraper">
                <p class="stagenamepara">
                  Please provide at least one link to your social media or
                  adult website with the largest following.
                </p>
                <div class="Stagename-wraper">
                  <label>URL #1</label>
                  <input type="text" name="url1" value="{{old('url1') ?? ''}}" class="url1" placeholder="Enter your first URL" >
                  <span class="url_error_url1" id="Error"></span>
                </div>
                <div class="Stagename-wraper">
                  <label>URL #2</label>
                  <input type="text" name="url2" value="{{old('url2') ?? ''}}" class="url2"  placeholder="Enter your second URL" />
                  <span class="url_error_url2" id="Error"></span>
                </div>
                <div class="Stagename-wraper">
                  <label>URL #3 <span style="color:red;">*</span></label>
                  <input type="text" name="url3" value="{{old('url3') ?? ''}}" class="url3" placeholder="Enter your third URL" />
                  <span class="url_error" id="Error"></span>
                  <span class="url_error_url3" id="Error"></span>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>

    <div id="Div2" style="display: none;">
      <div class="joinform-wrapper">
        <div class="d-flex text-white">
          <h1 class="text-uppercase mb-3">id submission </h1>
        </div>


        <div class="row">

          <div class="col-sm-6" id="joinformfirst">
            <div>
              <div class="sub_text text-white">
                <h5 class="mb-2">Goverment issued ID: <span style="color:red;">*</span></h5>
                <p class="">the should be clear,legible image of your goverment issued ID(e.g drivers license
                  passport).</p>
              </div>
              <div class="Stagename-wraper mt-5">
                <input class="file_input" type="file" id="Govt_id" name="govt_id" accept="">
                <span class="Govt_id_error" id="Error"></span>
              </div>
            </div>
            <div>
              <div class="sub_text text-white">
                <h5 class="mb-2">Your holding ID:<span style="color:red;">*</span></h5>
                <p class="">the should be clear,legible image of you holding your ID(e.g drivers license passport).
                </p>
              </div>
              <div class="Stagename-wraper mt-5">
                <input class="file_input" type="file" id="Hold_id" name="holding_id" accept="">
                <span class="Hold_id_error" id="Error"></span>
              </div>

            </div>
          </div>
          <div class="col-sm-3"></div>
          <div class="col-sm-3"></div>
        </div>

      </div>
    </div>
    <input class="login-btn next " id="next" type="button" value="Next" />
    <input style="display: none;" class="joinfree-btn " id="Previous" type="button" value="Previous" />
    <input style="display: none;" class=" login-btn submit" type="button" id=""  value="Submit" />
    </form>
  </div>
</div>
<script type="text/javascript">
  @endsection
@section('scripts')
@parent

@endsection