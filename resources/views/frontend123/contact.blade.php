@extends('frontend.main')
@section('content')
  <div class="container">
    
    <div class="row">
  
<div class="col-sm-12 col-md-12 col-lg-12 mt-5 mb-5">
                            <div class="heading ">
                                    <h4 class="text-white"><b>Contact User Support</b></h4></div>
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <div class="input_fild ">
@if(session()->has('message'))
    <div id="successMessage" class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                                       <form class="mt-2" method="POST" action="/user_support">

                                        <div class="col-12 p-0">
                                          <div class="form-group ">
                                            <label>Username</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                             @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                                          </div>
                                        </div>
                                         <div class="col-12 p-0">
                                          <div class="form-group ">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter your email" >
                                             @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                                          </div>
                                        </div>
                                        <div class="col-12 p-0">
                                          <div class="form-group ">
                                            <label>Phone Number </label>
                                            <input type="number" name="phone" class="form-control" placeholder="Enter your number"  
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10">
                                            @error('phone')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                                          </div>
                                        </div>
                                        <div class="col-12 p-0">
                                          <div class="form-group ">
                                            <label>Message</label>
                                    <textarea name="message" class="form-control" placeholder="Enter your message"></textarea>
                                     @error('message')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                                          </div>
                                        </div>

                                        <button type="submit" class="btn feel-btn ml-0 mt-3 text-white"><small>Submit</small></button>
                                      </form>
                                    </div>
                                      <div class="supp mt-4">
                                        <small><b>Support Hours</b></small><br>
                                        <small>Mon - Fri: 10 AM - 6 PM (PST)<br>
                                        Weekends: Limited</small>
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

<style type="text/css">
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
  body{
    background-color: #0a1824 !important;
  }
 .card-body.text-white {
              background: #0c1d2d !important;
            }
            .card-body.text-white {
    background: #0C1D2D !important;
    
  }
input.form-control {
    background: #112435 !important;
    color: #fff!important;
    font-size: 14px;
    border: 0;
    padding: 13px;
}
button.feel-btn {
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    /*border: 1px solid #8429aa !important;*/
    color: #fff;
    border: 0;
}
button.feel-btn:hover {
    border: 1px solid #a42997 !important;
    color: #c7009c !important;
    background: 0 !important;
}
textarea.form-control {
    background: #112435 !important;
    border: 0 !important;
    color: #fff !important;
    padding: 13px;
}
   .card {
    border: 0;
}       
</style>
<script type="text/javascript">
  setTimeout(function() {
    $('#successMessage').fadeOut('fast');
}, 4000);
</script>

