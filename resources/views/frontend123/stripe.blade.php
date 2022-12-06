@extends('frontend.fan')
@section('content')
<script type="text/javascript">
       $(document).ready(function() {
     $('.packselect').click(function(){
          alert('dfs');
            var fieldID = $(this).val();
           
            $('.amount').val(fieldID);
        });
      });
</script>
<style type="text/css">
.panel-title {
display: inline;
font-weight: bold;
}
.display-table {
display: table;
}
.display-tr {
display: table-row;
}
.display-td {
display: table-cell;
vertical-align: middle;
width: 61%;
}
.onlinebg-wrapper{
    color: #fff;
}
#wrap{
    margin: 0 auto;
}
.wrap-pack {
    background: #40505e;
    padding: 10px;
}
button#navbtns {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    color: #fff;
    padding: 9px 31px;
    border-radius: 8px;
    border: 0px;
}
.name_wrap {
    background: gainsboro;
    padding: 5px 10px;
}
.credit_amnt{
    margin: 0px;
}
.pay_amnt{
    margin: 0px;
}
.packtitle {
    color: #302f2f;
    text-align: center;
    margin: 0 auto;
    font-size: 20px;
    font-weight: 600;
}
div#pay_wrap {
    background: #112435;
    padding: 20px;
}
</style>

<div class="onlinebg-wrapper">
<div class="container">

<div class="row" id="pay_wrap">
    <div class="col-6">
        <h2> Select package</h2>
         @foreach($packages as $key => $package)
        <div class="wrap-pack mt-2">
            <div class="row">
                <div class="col-4"><div class="name_wrap">
                    <p class="packtitle">{{$package->name}}</p>
                </div></div>
                <div class="col-5"><p class="credit_amnt">{{$package->amount}} Credits</p><p class="pay_amnt">${{$package->amount}} USD</p></div>
                <div class="col-3"><button  class="packselect"id="navbtns" value="{{$package->amount}}">Select</button></div>
            </div>
        </div>
        @endforeach
    </div>
<div class="col-md-6 col-md-offset-3" id="wrap">
<div class="panel panel-default credit-card-box">

<div class="panel-body">
     <h2>Payment</h2>
@if (Session::has('success'))
<div class="alert alert-success text-center">
<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
<p>{{ Session::get('success') }}</p>
</div>
@endif
<form
role="form"
action="{{ route('fan.payment.post') }}"
method="post"
class="require-validation"
data-cc-on-file="false"
data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
id="payment-form">
@csrf
<div class='form-row row'>
<div class='col-xs-12 form-group required'>
<label class='control-label'>Name on Card</label> <input
class='form-control' size='4' type='text'>
</div>
</div>
<div class='form-row row'>
<div class='col-xs-12 form-group card required'>
<label class='control-label'>Card Number</label> <input
autocomplete='off' class='form-control card-number' size='20'
type='text'>
</div>
</div>
<div class='form-row row'>

<div class='col-xs-12 col-md-6 form-group expiration required'>
<label class='control-label'>Expiration Month</label> <input
class='form-control card-expiry-month' placeholder='MM' size='2'
type='text'>
</div>
<div class='col-xs-12 col-md-6 form-group expiration required'>
<label class='control-label'>Expiration Year</label> <input
class='form-control card-expiry-year' placeholder='YYYY' size='4'
type='text'>
</div>

<div class='col-xs-12 col-md-6 form-group cvc required'>
<label class='control-label'>CVC</label> <input autocomplete='off'
class='form-control card-cvc' placeholder='ex. 311' size='4'
type='text'>
</div>
<div class='col-xs-12 col-md-6 form-group '>
<label class='control-label'>Amount</label> <input
class='form-control amount' name="amount" placeholder='$' 
type='number'>
</div>
</div>
<!-- <div class='form-row row'>
<div class='col-md-12 error form-group hide'>
<div class='alert-danger alert'>Please correct the errors and try
again.</div>
</div>
</div> -->

<div class="row">
<div class="col-xs-12">
<button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now </button>
</div>
</div>
</form>
</div>
</div>        
</div>
</div>
</div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
var $form         = $(".require-validation");
$('form.require-validation').bind('submit', function(e) {
var $form         = $(".require-validation"),
inputSelector = ['input[type=email]', 'input[type=password]',
'input[type=text]', 'input[type=file]',
'textarea'].join(', '),
$inputs       = $form.find('.required').find(inputSelector),
$errorMessage = $form.find('div.error'),
valid         = true;
$errorMessage.addClass('hide');
$('.has-error').removeClass('has-error');
$inputs.each(function(i, el) {
var $input = $(el);
if ($input.val() === '') {
$input.parent().addClass('has-error');
$errorMessage.removeClass('hide');
e.preventDefault();
}
});
if (!$form.data('cc-on-file')) {
e.preventDefault();
Stripe.setPublishableKey($form.data('stripe-publishable-key'));
Stripe.createToken({
number: $('.card-number').val(),
cvc: $('.card-cvc').val(),
exp_month: $('.card-expiry-month').val(),
exp_year: $('.card-expiry-year').val()
}, stripeResponseHandler);
}
});
function stripeResponseHandler(status, response) {
if (response.error) {
$('.error')
.removeClass('hide')
.find('.alert')
.text(response.error.message);
} else {
/* token contains id, last4, and card type */
var token = response['id'];
$form.find('input[type=text]').empty();
$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
$form.get(0).submit();
}
}
});
</script>

@endsection
@section('scripts')
    @parent
@endsection
