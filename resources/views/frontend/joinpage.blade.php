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
  input.file_input:before {
    background: red;
}
.custom-file-input1 {
    opacity: 0;
}
/*new added*/
.custom-file-input:lang(en)~.custom-file-label::after {
    content: "Browse";
    background: #ff005e;
    color: #fff;
}
.custom-file-input1:lang(en)~.custom-file-label1::after {
content: "Browse";
    background: #ff005e;
    color: #fff;
}
label.custom-file-label {
        background: #142639;
    border: none;
    height: 47px;
    padding: 12px 0px 0px 12px;
    text-align: left;
    border-radius: 6px;
}
label.custom-file-label1 {
        background: #142639;
    border: none;
    height: 47px;
    padding: 12px 0px 0px 12px;
    text-align: left;
    border-radius: 6px;
}
.custom-file-label::after{
    position: absolute;
    right: 6px;
    content: "REPLACE FILE";
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    color: #fff;
}
.custom-file-label1::after{
    position: absolute;
    right: 6px;
    content: "REPLACE FILE";
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    color: #fff;
}
.custom-file-label {  
  position: relative;
    /* top: 0; */
    /* right: 0; */
    /* left: 0; */
    /* z-index: 1; */
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}
.custom-file-label1 {  
  position: relative;
    /* top: 0; */
    /* right: 0; */
    /* left: 0; */
    /* z-index: 1; */
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}
.custom-file-label.special::after {
content: "REPLACE FILE";
/* position: absolute; */
    border: none !important;
    top: 6px;
    /* right: 0; */
    /* bottom: 0; */
    /* z-index: 3; */
    /* display: block; */
    /* height: calc(calc(2.25rem + 2px) - 1px * 2); */
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #fff;
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    border-left: 1px solid #ced4da;
    border-radius: 6px;
    font-family: Montserrat !important;
    font-weight: 600;
    text-align: center !important;
    font-size: 13px;
    padding-top: 8px !important;
    height: 35.63px;
}
  .custom-file-label::after {
    /* position: absolute; */
    border: none !important;
    top: 6px;
    /* right: 0; */
    /* bottom: 0; */
    /* z-index: 3; */
    /* display: block; */
    /* height: calc(calc(2.25rem + 2px) - 1px * 2); */
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #fff;
    content: "CHOOSE FILE";
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    border-left: 1px solid #ced4da;
    border-radius: 6px;
    font-family: Montserrat !important;
    font-weight: 600;
    text-align: center !important;
    font-size: 13px;
    padding-top: 8px !important;
    height: 35.63px;
}
.custom-file-label1::after {
    /* position: absolute; */
    border: none !important;
    top: 6px;
    /* right: 0; */
    /* bottom: 0; */
    /* z-index: 3; */
    /* display: block; */
    /* height: calc(calc(2.25rem + 2px) - 1px * 2); */
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #fff;
    content: "CHOOSE FILE";
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    border-left: 1px solid #ced4da;
    border-radius: 6px;
    font-family: Montserrat !important;
    font-weight: 600;
    text-align: center !important;
    font-size: 13px;
    padding-top: 8px !important;
    height: 35.63px;

}
.custom-file-label1.special1::after {
    /* position: absolute; */
    border: none !important;
    top: 6px;
    /* right: 0; */
    /* bottom: 0; */
    /* z-index: 3; */
    /* display: block; */
    /* height: calc(calc(2.25rem + 2px) - 1px * 2); */
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #fff;
    content: "REPLACE FILE";
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    border-left: 1px solid #ced4da;
    border-radius: 6px;
    font-family: Montserrat !important;
    font-weight: 600;
    text-align: center !important;
    font-size: 13px;
    padding-top: 8px !important;
    height: 35.63px;

}
.custom-file-input, .custom-file-input1 {
    height: 16px !important;
}
.heading_sub{
  font-family: Montserrat !important;
  font-Weight: 700;
  font-Size: 30px;
  line-height:30px;
}
.subm_subheading{
  font-family: Montserrat !important;
  font-Weight: 500;
  font-Size: 18px;
 line-height: 21.94px;
}

.subm_desc{
  font-family: Montserrat !important;
  font-Weight: 400;
  font-Size: 16px;
line-height: 28px;
color: #a6a8ab;
}
</style>
  
<div class="joinpage-wrapper">
  <div class="container">
    <div class="becomemodel-wrapepr">
      <div class="adultmodel-wraper">
        <h1 class="become-hading">Become a Bad Bunnies Model</h1>
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
          <h1 class="text-uppercase mb-3 heading_sub">id submission </h1>
        </div>


        <div class="row">

          <div class="col-sm-6" id="joinformfirst">
            <div>
              <div class="sub_text text-white">
                <h5 class="mb-2 subm_subheading mt-2">Goverment issued ID: <span style="color:red;">*</span></h5>
                <p class="subm_desc">the image should be clear,legible image of your goverment issued ID(e.g drivers license
                  passport).</p>
              </div>
              <div class="Stagename-wraper mt-5">
                <label class="custom-file-label" for="Govt_id" id="subimg_id"> No file Choose </label>
                <span class="Govt_id_error" id="Error"></span>
                <input class="file_input custom-file-input" type="file" id="Govt_id" name="govt_id" accept="">
                
              </div>
            </div>
            <div>
              <div class="sub_text text-white">
                <h5 class="mb-2 subm_subheading">Your holding ID:&nbsp;<span style="color:red;"> *</span></h5>
                <p class="subm_desc">the image should be clear,legible image of you holding your ID(e.g drivers license passport).
                </p>
              </div>
              <div class="Stagename-wraper mt-5">
                <label class="custom-file-label1" for="Hold_id"> No file Choose </label>
                <span class="Hold_id_error" id="Error"></span>
                <input class="file_input custom-file-input1" type="file" id="Hold_id" name="holding_id" accept="">
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
   $( document ).ready(function() {
      $(".custom-file-input").on("change", function() {
        var govt_id = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(govt_id);
      });

      $(".custom-file-input1").on("change", function() {
        var holding_id = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label1").addClass("selected").html(holding_id);
      });
          //

             $('#Govt_id').bind("change",function() 
              { 
                  var imgVal = $('#Govt_id').val(); 
                  if(imgVal=='') 
                  { 

                  } 
                  return $('.custom-file-label').toggleClass('special');
                           

              }); 
                // second input

             $('#Hold_id').bind("change",function() 
              { 
                  var imgVal = $('#Hold_id').val(); 
                  if(imgVal=='') 
                  { 
                      
                  } 
                  return $('.custom-file-label1').toggleClass('special1');
                           

              }); 
                
      
    });
  </script>
<script type="text/javascript">
  @endsection
@section('scripts')
@parent

@endsection