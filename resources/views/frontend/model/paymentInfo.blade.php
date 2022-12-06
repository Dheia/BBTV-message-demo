@extends('frontend.model.main')
@section('content')
<style>
   .d-flex label {
   margin: 0px 15px;
   }
   .tabs section {
   display: none;
   padding: 20px 0 0;
   border:none
   }
   .tabs label {
   display: inline-block;
   margin: 0 10px 0 0;
   font-weight: 600;
   text-align: center;
   color: #fff;
   border: none;
   }
   .tabs label:before {
   font-family: fontawesome;
   font-weight: normal;
   margin-right: 10px;
   }
   .tabs label:hover {
   color: #888;
   cursor: pointer;
   }
   .tabs #tab1:checked ~ #content1,
   .tabs #tab2:checked ~ #content2,
   .tabs #tab3:checked ~ #content3,
   .tabs #tab4:checked ~ #content4 {
   display: block;
   }
</style>
<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
<div class="card ">
   <div class="card-body text-white">
      <h5><b>Payment Information</b></h5>
      <small class="text-muted">- Pay periods are from the 1st through the 15th and the 16th through the end of the month. <a href="{{url('/model/payout-history')}}" class="markd ">(Click to view the Payout Calendar)</span></small><br><br>
      <small class="text-muted">- The minimum payout is $50.00. Any earnings that are less than $50.00 get "rolled over" into the next pay period.</small><br><br>
      <small class="text-muted"> - Earnings over $50.00 are processed and sent 2-3 business days after the end of each pay period.</small>
      <br><br>
      <small class="text-muted">- For both direct deposits and checks, the business name is "RedEx Media LLC". Direct deposit accounts must be U.S. bank affiliated.</small><br><br>
      <small class="text-muted">- All payroll related questions and concerns should be sent to payroll@badbunniestv.com.</small>
   </div>
</div>
<div class="card ">
   <div class="card-body text-white">
      <div class="  justify-content-between">
         <form class="mt-2" role="form" id="reg-form" action="{{route('model.paymentdetails')}}" method="POST"  class="form-horizontal" >
            @csrf
            <h5><b>Payout Method</b></h5>
            <div class="tabs">
               <input type="radio" id="tab1" name="Check" value="check" @if( isset($details->pay_method) && $details->pay_method=="check")  checked @endif>
               <label for="tab1">Cheque</label>
               <input type="radio" id="tab2" name="Check" value="deposit" @if( isset($details->pay_method) && $details->pay_method=="deposit")  checked @endif>
               <label for="tab2">Direct Deposit</label><br>
               <section id="content2">
                  <div class="row">
                     <div class="col-6">
                        <div class="form-group ">
                           <label><small>Account Number</small></label>
                           <input type="text" required name="acnumber" value="{{$details->account_no ?? ''}}" class="form-control" placeholder="Krista Tolfree">
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group ">
                           <label><small>IFSC Number</small></label>
                           <input type="text" required name="ifsc" value="{{$details->ifsc_code ?? ''}}" class="form-control" placeholder="Krista Tolfree">
                        </div>
                     </div>
                  </div>
               </section>
               <section id="content1">
                  <div class="row">
                     <div class="col-sm-12 col-md-6 ">
                        <div class="form-group ">
                           <label><small>Payable To</small></label>
                           <input type="text" required name="paybleto" value="{{$details->payble ?? ''}}" class="form-control" placeholder="Krista Tolfree">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 ">
                        <div class="form-group ">
                           <label><small>Street Address</small></label>
                           <input type="text" required name="payaddress" class="form-control"  value="{{$details->street_address ?? ''}}"placeholder="10510 shaw st">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 ">
                        <div class="form-group ">
                           <label><small>Apartment or Unit (Optional)</small></label>
                           <input type="text"  name="apartment" class="form-control" value="{{$details->apartment_unit ?? ''}}"placeholder="Enter your number">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 col-md-4 ">
                        <div class="form-group ">
                           <label><small>City</small></label>
                           <input type="text" required class="form-control" placeholder="Jaipur" value="{{$details->user->city ?? ''}}"name="city" id="City" />
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-4 ">
                        <div class="form-group ">
                           <label><small>Province</small></label>
                           <input type="text" required class="form-control" name="provience"value="{{$details->province ?? ''}}" placeholder="Vijay Nagar" id="City" />
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-4  ">
                        <div class="form-group ">
                           <label><small>Zip</small></label>
                           <input type="text" required class="form-control" name="zip" id="Zip" value="{{$details->zip ?? ''}}"placeholder="302001" />
                        </div>
                     </div>
                  </div>
               </section>
            </div>
      </div>
      <button type="submit" class="btn  feel-btn ml-0 mt-3 mb-2"><small>UPDATE PAYMENT INFORMATION</small></button> <br>
      </form>
      <small>*Checks generally take 7-14 days to be delivered once they are processed.</small>
   </div>
</div>
@endsection
@section('scripts')
@parent
@endsection