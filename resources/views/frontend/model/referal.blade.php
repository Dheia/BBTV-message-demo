@extends('frontend.model.main')
@section('content')
<style>
    button.btn.feel-btn.text-white.btn_cre.fill-btn {
    margin: 0px 6px;
}

</style>
<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
                    <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="d-flex justify-content-between">
                      <div><h5><b>Referral Bonus</b></h5></div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-9 col-md-12">
                      <div class="card ">
                        <div class="card-body text-white">
                        	<h6>$100 Referral Bonus</h6>
                              <small class="text-muted">
                              	Copy the referral link and send it via email, text or social media to models who you think would be interested in having model account. For each referred model that earns over $100 on SextPanther, we'll send you a $100 bonus!
                              </small>
                             
                        <div class="col-12 p-0">
                        @php
                        $id=Auth::user()->id;
                        @endphp
                          <div class="form-group "> 
                          <div class="copy-text d-flex">
                        <input type="text" class="form-control msg_input text" value="{{url('refferal-apply/?id=')}}{{$id}}" />
                        <button class="btn feel-btn text-white  btn_cre fill-btn"><small>Copy Link</small></button>
                      
                    </div>
                         
                         </div>
                       </div>
                   
                          </div>
                      </div>
                      </div>
                      <div class="col-lg-3 col-md-12">
                      <div class="card ">
                        <div class="card-body text-white">
                        	<div class="text-center">
                        		<div class="wallet mt-3 mb-3">
                        		<i class="bi bi-wallet-fill  m-0"></i>
                        		</div>
                        		<h5 class="mb-4"><b>${{$totalpay}}</b></h5>
                        		<small>Total Current Referral Bonus </small>
                        	</div>
                          </div>
                      </div>
                      </div>
                    </div>
                    </div>
                  </div>
                <div class=" ">
                  <div class="row align-items-center  justify-content-between">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <h5><b>Rankings (Overall)</b></h5>
</div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                      <ul class="nav nav-pills mb-3 d-flex " id="pills-tab" role="tablist">
                        <form action="" name="filter" method="get">
                                            <li class="nav-item chat_nav">
                                        <a class="nav-link nav_tab active" id="pills-Calls-tab" data-toggle="pill" href="#pills-Calls" role="tab" aria-controls="pills-Calls" aria-selected="true" > <small><form class="">
                                        <select class=" ml-auto form-select Category-form " name="year" aria-label="Default select example">
                                            @for($i=0; $i<=6; $i++){
                                              @php $newDateTime = \Carbon\Carbon::now()->subYears($i); @endphp
                                              <option class="earning-filter-option text-center" value="{{$newDateTime->format('Y')}}" @if(request()->get('year')==$newDateTime->format('Y')) selected @endif>{{$newDateTime->format('Y')}} </option>
                                             }
                                             @endfor
                                        </select> </small></a>
                                            </li>
                                            </form>
                                      </ul>
                     </div>
                  </div>
                  <!-- <div class="d-flex justify-content-between">
                    <ul class="nav nav-pills mb-3 d-flex " id="pills-tab" role="tablist">
                                        <li class="nav-item chat_nav">
                                          <a class="nav-link nav_tab active" id="pills-Calls-tab" data-toggle="pill" href="#pills-Calls" role="tab" aria-controls="pills-Calls" aria-selected="true" > <small><form class="">
                                    <select class=" ml-auto form-select Category-form " aria-label="Default select example">
                                      <option class="earnings_by text-center" selected>Years</option>
                                      <option value="1">Daily Earnings </option>
                                    </select>
                                  </form></small></a
                                          >
                                        </li>
                                  </ul>
                                </div> -->
                                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                      <div class="card ">
                        <div class="card-body text-white">
                         <table class="text-white p-5">
                          <tr class="t_head">
                            <th>Attachment</th>
                            <th>Name  </th>
                            <th>Rank</th>
                          </tr>
                          @php
$i=1;
                          @endphp
                          @foreach($user as $item)
                          <tr class="Details_row">
                            <td><img  class="list_img img-fluid" style="height: 42px; width: 48px;"  src="{{ url('profile-image') . '/' . $item->profile_image }}"></td>
                            <td>{{$item->first_name}}</td>
                            <td>#{{$i++}}</td>
                          </tr>
                          @endforeach
                     

                        </table>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
        </div>
      </div>
      <script>
            let copyText = document.querySelector(".copy-text");
copyText.querySelector("button").addEventListener("click", function () {
	let input = copyText.querySelector("input.text");
	input.select();
	document.execCommand("copy");
	copyText.classList.add("active");
	window.getSelection().removeAllRanges();
	setTimeout(function () {
		copyText.classList.remove("active");
	}, 2500);
});

        </script>
@endsection
@section('scripts')
@parent
@endsection