@extends('frontend.fan.main')
@section('content')
<div class="col-sm-12 col-md-9 col-xl-9 mt-5">
    <div class="col_wrapper">
      <div class="row d-flex">
        
@php
use App\Http\Controllers\Controller;
@endphp
 @if(count($contacts)>0)
 @foreach($contacts as $item) 
      <div class="col-sm-6 col-md-6 mb-4">
      <div class="con_box OnlineNow-wrappers">
 
      @php
                $image=(Controller::modelImage('profile-image/'.$item->Model->profile_image,'_250x300'))?Controller::modelImage($item->Model->profile_image,'_250x300') : $item->Model->profile_image;
              
                @endphp  <a href="{{url('/',[$item->Model->slug])}}">
                  <img  class="model-img" src="{{ url('profile-image') . '/' . $image }}" alt="Model-Image" style=" width: 100%; object-fit: cover; height: 250px;border-radius: 14px"></a>
                    <!-- <form action=" {{url('fan.delmodel', $item->Model->id)}}" method="POST" >
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit"   class="cros_onpage"  id="navbtns"> <span class="text-white">x</span></button>
                    </form> -->
           <!-- <a href="{{url('fan/delmodel',$item->Model->id)}}"class="cros_onpage"> <span class="text-white">x</span></a> -->
           <a href="#myModal{{$item->id}}"  data-toggle="modal"class="cros_onpage"> <span class="text-white">x</span></a>
                    
                       
          <!-- <span class="cros_onpage"> 
         </span>-->
        <div class="wrap_content">
          <h6>{{$item->Model->first_name ?? ''}}</h6>
          <div class="row">
            <div class="col-6"> <small class="sm_time"><i class="bi b_wrap bi-stopwatch"></i>
                            @php


                            $dt = new DateTime();
                            $laraveltime = $dt->format('Y-m-d H:i:s');
                            $date1 = new DateTime($item->created_at);
                            $date2 = new DateTime($laraveltime);
                            $difference = $date1->diff($date2);
                            $diffInSeconds = $difference->s; //45
                            $diffInMinutes = $difference->i; //23
                            $diffInHours = $difference->h; //8
                            $diffInDays = $difference->d; //21
                            $diffInMonths = $difference->m; //4
                            $diffInYears = $difference->y;
                            @endphp
                            @if ($diffInYears < 1)
                            @if ($diffInMonths < 1)
                            @if ($diffInDays < 1)
                            @if ($diffInHours < 1)
                            {{ $diffInMinutes }} min ago
                            @else
                            {{ $diffInHours }} hr
                            {{ $diffInMinutes }} min ago
                            @endif
                            @else
                            {{ $diffInDays }} Days Ago
                            @endif
                            @else
                            {{ $diffInMonths }} Months Ago
                            @endif
                            @else
                            {{ $diffInYears }} Years Ago
                            @endif</small ></div>
                            <div class="col-6"><small class="sm_time"><i class="bi b_wrap bi-calendar-check"></i>{{$item->created_at->format('d-m-Y')}}</small></div>
           
          </div>
          <div class="row d-flex mt-3 justify-content-between mr-1">
            <span class="tab  "><i class="bi m-0 bi-chat-dots-fill"></i></span>
            <span class="tab "><i class="bi m-0 bi-telephone-fill"></i></span>
            <span class="tab"><i class="bi m-0 bi-camera-video-fill"></i></span>
            <span class="Tip_model_id tab" data-toggle="modal" data-target="#TipPoPup"
                    data="{{$item->Model->id }}"><i class="bi m-0 bi-currency-dollar"></i></span>
          </div>
        </div>
      </div>
      
    </div>
    <div id="myModal{{$item->id}}" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header d-flex">
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to unfriend ? </p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<!-- <button type="button" class="btn btn-danger">Delete</button> -->
                <a href="{{url('fan/delmodel',$item->id)}}" class="del_btn">Delete</a>
			</div>
		</div>
	</div>
  </div>
 @endforeach
 @else
 <h6 class="text-white">Contact list is empty</h6>
 @endif
 <div class="modal fade" id="TipPoPup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title color-white" id="exampleModalLongTitle">Send a tip<br>
                        <div class="tip_option d-flex">
                            <div class="tipoption "value="1">$1</div>
                            <div class="tipoption " value="5">$5</div>
                            <div class="tipoption" value="10">$10</div>
                            <div class="tipoption" value="20">$20</div>
                            <div class="tipoption" value="50">$50</div>
                            <div class="tipoption" value="100">$100</div>
                        </div>
                    </h5>

                    <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('fan/model-tip') }}" method="post">
                        @csrf
                        <label for="">Tip Amount</label>
                        <input type="number" name="tip_amount" class="form-control tip_amount" value=""
                            placeholder=" Enter Tip amount $1-999" required min="1" max="999">
                        <label for="" class="mt-2">What is this for?</label>
                        <input type="text" class="form-control" name="tip_mess" placeholder="What is this for?"
                            required>
                        <input type="hidden" class="tip_model_id" name="model_id" value="" required>

                </div>
                <div class="modal-footer">

                    <button type="submit" class=" send-tip-btn ">Send Tip</button> </form>
                </div>
            </div>
        </div>
    </div>

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
 small.sm_time{
    font-size:10px;
 }
    button.close {
    color: #ffff;
}
    a.del_btn {
    background-color: red;
    padding: 6px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 3px;
    padding: 8px 19px;
}
    .modal-body p {
    color: #fff;
}
.send-tip-btn {
    background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
    color: white !important;
    /* background: none; */
    border-radius: 6px;
    padding: 5px 9px 5px 9px;
    border: 1px solid #c73ca9;
    color: #c73ca9;
}
button.send-tip-btn:hover {
    background: none;
    border: 1px solid #c73ca9;
    color: #c73ca9;
}
    .modal-content {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            /* background-color: #fff; */
            background-clip: padding-box;
            border: 1pxsolidrgba(0, 0, 0, .2);
            border-radius: 0.3rem;
            outline: 0;
            background: linear-gradient(to left, #0f1e2e 0%, #0f1e2e 100%) !important;
            border: none;
        }

        .tipoption {
            cursor: pointer;
            border: 1px solid;
            height: 40PX;
            width: 40PX;
            font-size: 14px;
            text-align: center;
            border-radius: 21px;
            /* padding: 9px 4px; */
            padding-top: 9px;
            margin-top: 6px;
            margin-right: 16px;

        }

        .modal-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            color: white !important;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
            color: #000;
        }
     
    @media (max-width: 768px)
    .container {
        max-width: 952px;
    }
    
    .cros_onpage {
        position: absolute;
        padding: 0px 6px 0px 7px;
        background: #ffffff00;
        top: -6px;
        border-radius: 50%;
        cursor: pointer;
            border-radius: 50%;
        background: rebeccapurple;
    }
      .row.d-flex.mt-3 {
        /* gap: 21px; */
        margin-left: 0px;
    }
    
        span.tab:hover {
        background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
       
    }
    i.bi.b_wrap {
        margin-right: 8px;
        color:#cc31ff;
    }
     span.tab {
        padding: 6px 24px 7px 24px;
       /* margin-right: 16px;*/
        border-radius: 5px;
        background-color: #142534;
    }
        .wrap_content {
        margin-top: 26px;
        padding-left: 5px;
        color: #d0d2df;
    }
        .con_box {
        padding: 17px;
        background-color: #0c1d2d;
        border-radius: 5px;
    }
    
    .col_wrapper{margin: 30px 30px;}
    
        .explore-post-wraper {
        width: 53%;
        color: #fff;
    }
    .explorepost-inner-wrapper {
        display: flex;
        justify-content: space-between;
        width: 100%;
        /* padding: 10px 0px; */
        flex-wrap: wrap;
    }
        .explore-posts-wraper {
        background: #0c1d2d;
        width: 100%;
        padding: 10px 15px;
        border-radius: 12px;
        margin-bottom: 15px;
    }
    .filter-wrapepr {
        width: 41%;
        background: #0c1d2d;
        border-radius: 12px;
        color: #fff;
        margin-top: 17px;
        padding: 10px;
    }
    .explore-posts-wraper {
      margin-top: 8px;
        background: #0c1d2d;
        width: 100%;
         padding: 10px 15px; 
        border-radius: 12px;
        margin-bottom: -8px;
    }
    
    
    .list-group-item {
      padding: 0px 12px;
        background-color: #0C1D2D;
        position: relative;
        display: block;
        margin-bottom: -1px;
        border: 1pxsolidrgba(0,0,0,.125);
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 17px;
        color: #d0d4d9;
    }
    
    span.item:hover{
      background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    }
    
    li.list-group-item:hover{
      border-left: 2.5px solid #C73CA9;
    }
    .list-group {
        background: #0C1D2D;
        border-radius: 6px;
    }
    .col_wrapper{
        margin:30px 30px  !important;
    }
    span.item {
        border-radius: 7px;
        height: 52px;
        background-color: #0C1D2D;
        position: relative;
        display: block;
        padding: 15px 6px 16px 1px;
        margin-bottom: -1px;
        border: 1pxsolidrgba(0,0,0,.125);
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 500;
        /* font-size: 14px; */
        line-height: 17px;
        color: #d0d4d9;
    }
    i.i_b {
        margin-right: 12px;
    }
    
    .plus-icon { /* padding: 0 0 2px 7px; */ background-color: #ffffffb8; margin-left: 5px; height: 26px; width: 26px; text-align: center; /* padding-right: 1px; */ margin-right: 0px; border-radius: 21px; } .login-btn { background: linear-gradient(90deg,
            #af2990 0%, #4c2acd 100%); width: 158px; height: 48px; border-radius: 6px; font-family: "Montserrat"; font-weight: 700; font-size: 14px; line-height: 17px; text-transform: uppercase; color: #fff; border: none; outline: none; } .joinfree1 { /*
            border: 1px solid #c73ca9; */ /* border-radius: 6px; */ /* color: #c73ca9; */ font-family: "Montserrat"; font-style: normal; font-weight: 700; font-size: 14px; line-height: 17px; width: 170px; height: 48px; background-color: #0f1e2e; outline:
            none; margin-right: 10px; } .name-and-wallat { color: #A9AEB4; font-family: 'Montserrat'; font-style: normal; font-weight: 600; font-size: 15px; line-height: 18px; }
            .onile-icon {
        height: 12px;
        width: 12px;
        background-color: #48A45C;
        border-radius: 18px;
    }.sidebar-wrapper{
        font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    }
    .online-models {
        border-radius: 4px;
    }.account {
        border-radius: 4px;
    }.details{
        font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    line-height: 29px;
        border-radius: 6px;
    }
    
      </style>