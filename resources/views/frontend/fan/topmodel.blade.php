@extends('frontend.fan.main') @section('content')
<style>
  .spec h1 {
    font-weight: 400;
    font-size: 30px;
    line-height: 30px;
    color: #fff;
    margin-top: 29px;
  }

</style>
<div class="col-sm-12 col-md-8 col-xl-9 mt-5">
  @php use App\Http\Controllers\Controller; @endphp
  <div class="spec">
          <h1>Top Models <b></b> <span> </span></h1>
        </div>
  <div class="topmodelpage-wrap mt-4">

@foreach($topmodel as $key => $item)
@if($key < 4) <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
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
@if($key>4 && $key<11) <div class="col-lg-4 col-md-4 col-sm-4 mb-4 col-6">
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
@endsection @section('scripts') @parent @endsection
