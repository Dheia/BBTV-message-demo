@extends('frontend.main')
@section('content')
@php
use App\Http\Controllers\Controller;
@endphp
<style>
  .card_img_1 {
    height:auto!important;
}
    .onlinewrapp-bg {
    padding-bottom: 40px !important;
}
  img.model-img {
    object-fit: cover;
    height: 302px !important;
    width: 273px !important;}
  .bg-white {
    background-color: transparent !important;
    padding: 10px !important;
    align-items: center !important;
    justify-content: center !important;
    color: #fff !important;
    padding: 13px !important;
  }

  span.relative.z-0.inline-flex.shadow-sm.rounded-md {
    border-radius: 10px !important;
    background: #173453 !important;
    padding: 25px;
  }

  svg.w-5.h-5 {
    color: #fff !important;
    height: 25px !important;
    width: 25px !important;
    background-color: transparent !important;
  }

  .border {
    border: none !important;
  }


  span.relative.z-0.inline-flex.shadow-sm.rounded-md {}

  span.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5 {
    height: 30px !important;
    /* display: inline-block; */
    width: 30px !important;
    background: #c73ca9 !important;
    transform: rotate(45deg) !important;
    -ms-transform: rotate(45deg) !important;
    -webkit-transform: rotate(45deg) !important;
    border-radius: 7px !important;
  }

  #pagination a svg:hover {
    /* display: inline-block; */
    height: 25px !important;
    width: 25px !important;
    background-color: #c73ca9 !important;
    /* transform: rotate(45deg)!important;
    -ms-transform: rotate(45deg)!important;
    -webkit-transform: rotate(45deg)!important; */
    border-radius: 7px !important;
  }

  a.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.hover\:text-gray-500.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
    padding: 13px 20px !important;
  }
  .card_img_1_latest{
width: 545px !important;
}
</style>
<!-- online wrapper start -->
<div class="onlinewrapp-bg">
  <div class="container">
    <div class="onlinepage-hading-wrapp">
      <h1>Top <b>Models</b> </h1>
      <div>
        @php   
          $monthcurrent =Carbon\Carbon::now()->monthName; 
          $yearcurrent =Carbon\Carbon::now()->format('Y');
        @endphp
        <b class="top-modelpage-hading">{{$monthcurrent}} {{$yearcurrent}}</b>
      </div>
    </div>
    <div>
      <div class="topmodelpage-wrap">

        @foreach($topmodel as $key => $item)
        @if($key < 4) <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-4">
          <div class="topmodelpage-wrapper">
            <a href="{{$item->slug}}">
            
              <div class="topmodelfirst-col-wrapper">
              @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x350'))?Controller::modelImage($item->profile_image,'_300x350') : $item->profile_image;
            @endphp
                <img class="model-img top_mod_img img-fluid"
                  src="{{ url('profile-image') . '/' . $image}}" alt="Model-Image">
                <label class="new-label">Hot</label>
                <span class="smallimg-modelnumber">{{$key+1}}</span>
                <div class="colname-wrapper viedo_wrapp">
                  <label class="colname">{{$item->first_name}}</label>
                </div>
              </div>
            </a>
          </div>
      </div>
      @endif
      @endforeach
      <div class="row">
        @foreach($topmodel as $key => $item)
        @if($key>4 && $key<11) <div class="col-lg-2 col-md-2 col-sm-4 mb-4 col-6">
          <div class="card" style="background-color: #162637 !important;  border-radius: 10px;">
            <div class="card-body p-0">
              <div class="topmodelimg-wrapepr">
                <a href="{{$item->slug}}">
                @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_175x175'))?Controller::modelImage($item->profile_image,'_175x175') : $item->profile_image;
            @endphp
                <img class="img-fluid top_mod_img card_img_1 card_img_1_latest"
                  src="{{ url('profile-image') . '/' . $image }}" alt="Model-Image">
                <label class="new-label">Hot</label>
                <span class="smallimg-modelitemnumber">{{$key+1}}</span></a>
              </div>
              <p class="topmodel-itemname">{{$item->first_name ??''}}</p>
            </div>
          </div>
      </div>
      @endif
      @endforeach
    </div>
    @if(count($topmodel)>11)
    <div class="topmodel-smalll-items-wrapper">
      <h2 class="top-modelpage-hading">11th to 20th</h2>

      <div class="row">
        @foreach($topmodel as $key => $item)
        @if($key>10 && $key<22) <div class="col-lg-4 col-md-4 col-sm-4 mb-4 col-6">
          <div class="card" style="background-color: #162637 !important;  border-radius: 10px;">
            <div class="card-body p-0">
              <div class="topmodelimg-wrapepr">
                <a href="{{$item->slug}}">
                @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_175x175'))?Controller::modelImage($item->profile_image,'_175x175') : $item->profile_image;
            @endphp
                <img class="img-fluid top_mod_img card_img_1"
                  src="{{ url('profile-image') . '/' . $image }}" alt="Model-Image">
                <label class="new-label">Hot</label>
                <span class="smallimg-modelitemnumber">{{$key+1}}</span></a>
              </div>
              <p class="topmodel-itemname">{{$item->first_name}}</p>
            </div>
          </div>
      </div>
      @endif
      @endforeach
    </div>
    @endif
    @if(count($topmodel)>21)

    <div class="topmodel-smalll-items-wrapper">
      <h2 class="top-modelpage-hading">21th to 30th</h2>

      <div class="row">
        @foreach($topmodel as $key => $item)
        @if($key>20 && $key<32) <div class="col-lg-4 col-md-4 col-sm-4 mb-4 col-6">
          <div class="card" style="background-color: #162637 !important;  border-radius: 10px;">
            <div class="card-body p-0">
              <div class="topmodelimg-wrapepr">
              @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_175x175'))?Controller::modelImage($item->profile_image,'_175x175') : $item->profile_image;
            @endphp
                <img class="img-fluid top_mod_img card_img_1"
                  src="{{ url('profile-image') . '/' . $image }}" alt="Model-Image">
                <label class="new-label">Hot</label>
                <span class="smallimg-modelitemnumber">{{$key+1}}</span>
              </div>
              <p class="topmodel-itemname">{{$item->first_name}}</p>
            </div>
          </div>
      </div>
      @endif
      @endforeach
    </div>

    @endif
    @if(count($topmodel)>31)

    <div class="topmodel-smalll-items-wrapper">
      <h2 class="top-modelpage-hading">31th to 40th</h2>

      <div class="row">
        @foreach($topmodel as $key => $item)
        @if($key>30 && $key<42) <div class="col-lg-4 col-md-4 col-sm-4 mb-4 col-6">
          <div class="card" style="background-color: #162637 !important;  border-radius: 10px;">
            <div class="card-body p-0">
              <div class="topmodelimg-wrapepr">
              @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_175x175'))?Controller::modelImage($item->profile_image,'_175x175') : $item->profile_image;
            @endphp
                <img class="img-fluid top_mod_img card_img_1"
                  src="{{ url('profile-image') . '/' . $image }}" alt="Model-Image">
                <label class="new-label">Hot</label>
                <span class="smallimg-modelitemnumber">{{$key+1}}</span>
              </div>
              <p class="topmodel-itemname">{{$item->first_name}}</p>
            </div>
          </div>
      </div>
      @endif
      @endforeach
    </div>

    @endif
    @if(count($topmodel)>41)

    <div class="topmodel-smalll-items-wrapper">
      <h2 class="top-modelpage-hading">41th to 50th</h2>

      <div class="row">
        @foreach($topmodel as $key => $item)
        @if($key>40 && $key<52) <div class="col-lg-4 col-md-4 col-sm-4 mb-4 col-6">
          <div class="card" style="background-color: #162637 !important;  border-radius: 10px;">
            <div class="card-body p-0">
              <div class="topmodelimg-wrapepr">
              @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_175x175'))?Controller::modelImage($item->profile_image,'_175x175') : $item->profile_image;
            @endphp
                <img class="img-fluid top_mod_img card_img_1"
                  src="{{ url('profile-image') . '/' . $image }}" alt="Model-Image">
                <label class="new-label">Hot</label>
                <span class="smallimg-modelitemnumber">{{$key+1}}</span>
              </div>
              <p class="topmodel-itemname">{{$item->first_name}}</p>
            </div>
          </div>
      </div>
      @endif
      @endforeach
    </div>

    @endif
  </div>
</div>
</div>

</div>
</div>

<!-- online wrapper end -->
@endsection
@section('scripts')
@parent
@endsection