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
    /*new asdded*/
    .joinpage-wrapper.text-center.text-white h2 {
    font-family: Montserrat !important;
  font-Weight: 700;
  font-Size: 30px;
line-height: 30px;
}
.joinpage-wrapper.text-center.text-white h5{
  font-family: Montserrat !important;
  font-Weight: 400;
  font-Size: 16px;
  line-height: 30px;
  align-content: center;
  text-align: center;
  align-items: center;
}
</style>
<div class="joinpage-wrapper text-center text-white">
    <img src="./image/thanks.png">
    <h2 class="mt-4">Thanks you!</h2>
    <h5 class="mt-3">Thanks you for applying to become a Bad bunniesTv Model! You will be notified <br> by email if your
        account has been approved. Account approvals generally <br> take 1-2 business days but in some cases can
        take up
        to <br> one week.</h5>
</div>

@endsection