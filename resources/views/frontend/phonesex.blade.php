@extends('frontend.main')
@section('content')
@php
use App\Http\Controllers\Controller;
@endphp
<style>
  .bg-white {
    background-color:transparent !important;
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
    border: none!important;
}
span.relative.z-0.inline-flex.shadow-sm.rounded-md {
}
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
  height: 25px!important;
    width: 25px!important;
    background-color: #c73ca9 !important;
    /* transform: rotate(45deg)!important;
    -ms-transform: rotate(45deg)!important;
    -webkit-transform: rotate(45deg)!important; */
    border-radius: 7px!important;
}
a.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.hover\:text-gray-500.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
    padding: 13px 20px !important;}
</style>
<!-- <div class="loader">
<img src="{{ URL::asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
</div> -->
<div class="onlinewrapp-bg">
      <div class="container">
        <div class="onlinepage-hading-wrapp">
          <h1>Phone <b>Sex</b> <span>( {{$phonecount}} Available ) </span></h1>
          <div class="filter-section">
          <select name="sort" class="recentoption">
            <option disabled>--Select--</option>
            <option value="online" {{request()->input('sort') == 'online' ? 'selected' : ''}}>Recently Active</option>
            <option value="joining" {{request()->input('sort') == 'joining' ? 'selected' : ''}}>Join Date</option>
            <option value="rank" {{request()->input('sort') == 'rank' ? 'selected' : ''}}>Rank</option>
            <option value="low-to-high" {{request()->input('sort') == 'low-to-high' ? 'selected' : ''}}>Price: Low to
              High</option>
            <option value="high-to-low" {{request()->input('sort') == 'high-to-low' ? 'selected' : ''}}>Price: High to
              Low </option>
          </select>
          <button class="filterbtn"  onclick="openfilter()">
              <i class="fa-solid fa-sliders"></i>
            </button>
          </div>
        </div>


          <div class="OnlineNow-wrappers">
          <div class="onlinenow-firstRow row">
            @foreach($phonesex as $key=>$item)
            @if($key < 4)
          

              <div class="onlinenow-firstRow-wrapp  col-sm-6 col-xs-6 col-md-3 col-xl-3 col-lg-3">

              <a href="{{$item->slug}}">
              @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_300x300'))?Controller::modelImage($item->profile_image,'_300x300') : $item->profile_image;
            @endphp
                <img src="{{ url('profile-image') . '/' . $image }}" alt="" class="model-img" style="border-radius:10px;"/>
               
                @php
                
                $data=\Carbon\Carbon::parse($item->created_at)->format('M d, Y');
                @endphp
<!--  <div class="col-overlay"></div> -->
               <!--  <div class="col-img-overlay"></div> -->
                  @if($data > $getdate)
                  <label class="new-label_up">New</label>
                  @else
                  @endif
                <span class="callsing-onpage_up">
                  <i class="fa fa-phone" aria-hidden="true"></i
                ></span>
                <div class="colname-wrapper wrapper_first ">
                @if($item->is_online == 1)
                <p style="margin:0px;"> <label class="onlinedot_name_left"></label><label class="colname ">{{$item->first_name}}</label></p>
                @else
                <label class="colname">{{$item->first_name}}</label>
                @endif
                  <span class="colcost">${{$item->cost_audiocall}} per minute</span>
                </div>
                </a>
              </div>
              @else
              <div class="onlinenow-model-wrapper">
                <div class="first-col-wrapper">
                <a href="{{$item->slug}}">
                @php
            $image=(Controller::modelImage('profile-image/'.$item->profile_image,'_250x300'))?Controller::modelImage($item->profile_image,'_250x300') : $item->profile_image;
            @endphp
                <img class="model-img" src="{{ url('profile-image') . '/' . $image }}"
                                    alt="Model-Image">
                                    <div class="col-img-overlay"></div>
                  <div class="col-overlay"></div>
                  

                  @php
                  $data=\Carbon\Carbon::parse($item->created_at)->format('M d, Y');
                  
                  @endphp

                  @if($data > $getdate)
                  <label class="new-label">New</label>
                  @else
                  @endif
             
                  <span class="callsing-onpage">
                    <i class="fa fa-phone" aria-hidden="true"></i
                  ></span>
                  <div class="colname-wrapper">
                  @if($item->is_online == 1)
                <p style="margin:0px;"> <label class="onlinedot_name_left"></label><label class="colname ">{{$item->first_name}}</label></p>
                @else
                <label class="colname">{{$item->first_name}}</label>
                @endif
                  <span class="colcost">${{$item->cost_audiocall}} per minute</span>
                 
                  </div>
</a>
                </div>
              </div>
           
            @endif
            @endforeach 
            @if($phonecount<1)
          <div class="empty_state">
           <img src="image/sad_icon.png" alt="">
            <h3 class="text-light">No Model</h3>
            <p class="text-light">There have been no Model in this section according the filter</p>
            
          </div>
          @else
          
          @endif
            </div>
            <!-- <div class="Online-now-wrapp">
            @foreach($phonesex as $key=>$item)
            @if($key >= 4)
            
             @endif
            @endforeach
             
            
            </div> -->
          
        </div>
        <div id="pagination">
        {{ $phonesex->withQueryString()->links('paginate.paginate') }}
        </div>
        
        <form id="serch" method="get" action="{{ route('phone-sex') }}">
      <input type="hidden" name="sort" value="{{request()->input('sort')}}" id="recentoption">
      <input type="hidden" value="phone" name="type">
      <div id="Filter-wrapp" class="filtersidenav">
        <div class="filterside-wrapepr">
          <a href="javascript:void(0)" class="closebtn" onclick="closefilter()">&times;</a>
          <div class="gender-filter-wrapper filt_wrap">
            <span> Gender </span>
            
            @php
              $gender = [];
              $ethnicity = [];
              $language = [];
              $fetish = [];
              $hair = [];
              if(request()->input('gender'))
                $gender = request()->input('gender');
                if(request()->input('ethnicity'))
                $ethnicity = request()->input('ethnicity');
                if(request()->input('language'))
                $language = request()->input('language');
                if(request()->input('fetish'))
                $fetish = request()->input('fetish');
                if(request()->input('hair'))
                $hair = request()->input('hair');

            @endphp
            <div class="ckeckfilter">
              <input type="checkbox" id="checkbox-2-11" name="gender[]" value="female"
                class="filter-checkbox filterbig-checkbox filter female" {{ in_array("female", $gender) ? 'checked' : ''}} />
              <label for="checkbox-2-11"></label>
              Female
            </div>


            <div class="ckeckfilter">
              <input type="checkbox" id="checkbox-2-12" name="gender[]" value="male"
                class="filter-checkbox filterbig-checkbox filter male" {{ in_array("male", $gender) ? 'checked' : ''}} />
              <label for="checkbox-2-12"></label>
              Male
            </div>


            <div class="ckeckfilter">
              <input type="checkbox" id="checkbox-2-13" name="gender[]" value="transgender" class="filter-checkbox filterbig-checkbox filter transgender" {{ in_array("transgender", $gender) ? 'checked' : ''}} />
              <label for="checkbox-2-13"></label>
              Transgender
            </div>

          </div>

          <div class="gender-filter-wrapper filt_wrap">
            <span> Orientation </span>
            @foreach($Orientation as $key => $value)
            <label class="ckeckfilter">
              <input type="radio" {{ (request()->input('orientation') == $value->id) ? 'checked': '' }} name="orientation" {{request()->input('orientation')}} id="s-option1.{{$key}}." class="filter orientation" value="{{$value->id}}" />
              <label for="s-option1.{{$key}}."> {{$value->title}}</label>
              <div class="check">
                <div class="inside"></div>
              </div>
            </label>
            @endforeach
          </div>


          <div class="gender-filter-wrapper filt_wrap">
            <span> Ethnicity </span>
            <div class="language-filter-wrapp">
              <div class="gender-filter-wrapper">
                @foreach($ModelEthnicity as $key => $value)
                @if ($key < 6) <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-2.{{$key}}." {{ in_array($value->id, $ethnicity) ? 'checked' : ''}}  name="ethnicity[]" class="filter-checkbox filterbig-checkbox filter ethnicity" value="{{$value->id}}" />
                    <label for="checkbox-2.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                  </label>
                  @endif
                  @endforeach

              </div>

              <div class="gender-filter-wrapper">
                @foreach($ModelEthnicity as $key => $value)
                @if ($key>=6)
                <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-2.{{$key}}." {{ in_array($value->id, $ethnicity) ? 'checked' : ''}} name="ethnicity[]"
                      class="filter-checkbox filterbig-checkbox filter ethnicity" value="{{$value->id}}" /><label
                      for="checkbox-2.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                </label>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          <div class="gender-filter-wrapper filt_wrap">
            <span> Language </span>
            <div class="language-filter-wrapp">
              <div class="gender-filter-wrapper">
                @foreach($ModelLanguage as $key => $value)
                @if ($key < 5) <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-3.{{$key}}." {{ in_array($value->id, $language) ? 'checked' : ''}} name="language[]"
                      class="filter-checkbox filterbig-checkbox filter language" value=" {{$value->id}}" />
                    <label for="checkbox-3.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                  </label>
                  @endif
                  @endforeach

              </div>

              <div class="gender-filter-wrapper">
                @foreach($ModelLanguage as $key => $value)
                @if ($key >= 5)
                <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-3.{{$key}}." {{ in_array($value->id, $language) ? 'checked' : ''}} name="language[]"
                      class="filter-checkbox filterbig-checkbox filter language" value=" {{$value->id}}" />
                    <label for="checkbox-3.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                </label>
                @endif
                @endforeach
              </div>
            </div>
          </div>

          <div class="gender-filter-wrapper filt_wrap">
            <span> Model Category </span>
            @foreach($ModelCategory as $key=> $value)


            <label>
              <input type="radio" name="category" id="s-option2.{{$key}}."
                class="filter-checkbox filterbig-checkbox filter category" value="{{$value->id}}" {{ (request()->input('category') == $value->id) ? 'checked': '' }} name="category" {{request()->input('category')}} />
              <label for="s-option2.{{$key}}."> {{$value->title}}</label>
              <div class="check">
                <div class="inside"></div>
              </div>
            </label>
            @endforeach
          </div>
          <div class="gender-filter-wrapper filt_wrap">
            <span> Fetishes </span>
            <div class="language-filter-wrapp">
              <div class="gender-filter-wrapper">
                @foreach($ModelFetishes as $key => $value)
                @if ($key < 4) <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-4.{{$key}}." {{ in_array($value->id, $fetish) ? 'checked' : ''}} name="fetish[]"
                      class="filter-checkbox filterbig-checkbox filter fetish" value="{{$value->id}}" /><label
                      for="checkbox-4.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                  </label>
                  @endif
                  @endforeach

              </div>

              <div class="gender-filter-wrapper">
                @foreach($ModelFetishes as $key => $value)
                @if ($key>=4)
                <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-4.{{$key}}." {{ in_array($value->id, $fetish) ? 'checked' : ''}} name="fetish[]"
                      class="filter-checkbox filterbig-checkbox filter fetish" value="{{$value->id}}" /><label
                      for="checkbox-4.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                </label>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          <div class="gender-filter-wrapper filt_wrap">
            <span> Hair </span>
            <div class="language-filter-wrapp">
              <div class="gender-filter-wrapper">
                @foreach($ModelHair as $key => $value)
                @if ($key < 4) <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-5.{{$key}}." {{ in_array($value->id, $hair) ? 'checked' : ''}} name="hair[]"
                      class="filter-checkbox filterbig-checkbox filter hair" value="{{$value->id}}" /><label
                      for="checkbox-5.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                  </label>
                  @endif
                  @endforeach

              </div>

              <div class="gender-filter-wrapper">
                @foreach($ModelHair as $key => $value)
                @if ($key>=4)
                <label>
                  <div class="ckeckfilter">
                    <input type="checkbox" id="checkbox-5.{{$key}}." {{ in_array($value->id, $hair) ? 'checked' : ''}} name="hair[]"
                      class="filter-checkbox filterbig-checkbox filter hair" value="{{$value->id}}" /><label
                      for="checkbox-5.{{$key}}."></label>
                    {{$value->title}}
                  </div>
                </label>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          <div class="sideaplly-btn-wraper">
            <!-- <button class="filter-applybtn">Apply</button> -->
            <a href="/phone-sex">Clear</a>
          </div>
        </div>
      </div>
    </form>
      </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

$(document).ready(function(){
  $('.recentoption').on('change', function(e) {
  
    $('#rati').submit()
  });

});
function openfilter() {
        document.getElementById("Filter-wrapp").style.width = "360px";
      }

      function closefilter() {
        document.getElementById("Filter-wrapp").style.width = "0";
      }
    </script> -->
@endsection
@section('scripts')
    @parent
@endsection
