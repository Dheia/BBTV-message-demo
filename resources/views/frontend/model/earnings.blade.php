@extends('frontend.model.main') @section('content')

<style>
  canvas {
    height: 400px !important;
  }

  h1 {
    font-family: Roboto;
    color: #fff;
    margin-top: 50px;
    font-weight: 200;
    text-align: center;
    display: block;
    text-decoration: none;
  }

  /*new added*/

  select#topspent {
    /* background-image: url(https://toppng.com/uploads/preview/white-drop-down-arrow-11562884289ujhzrp5rwy.png) !important; */
    background-image: url(http://adultx.eoxyslive.com/images/down_arrow.png);
    background-repeat: no-repeat !important;
    background-position: right 0.5rem center !important;
    background-size: 16px 12px !important;
}
.earn_select {
    width: 135px !important;
}
</style>

<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body text-white">
          <div class="d-flex justify-content-between ">
            <div class="name">
              <h6><b class="earning_summary">Earnings Summary</b></h6>
            </div>
          </div>
          <div class="row">
            @if(!empty($thisyear1))
            <div class="col-sm-6 col-lg-3 earn_col col-md-3 col-6 mt-3">
              <small class="">Today</small>
              @if(isset($today->summ))
              <h5>
                <b>${{$today->summ ?? ''}}</b>
              </h5>
              <div class="up_text">
                <i class="bi m-0 bi-arrow-up-short"></i
                ><small class="text-success"
                  >${{ $calcutoday ?? "" }}{{$today->summ ?? '' }}</small
                >
              </div>
              @else
              <h5><b>$0</b></h5>
              <div class="down_text">
                <i class="bi m-0 bi-arrow-down-short"></i
                ><small class="text-danger">$(-100%)</small>
              </div>
              @endif
            </div>
            <div class="col-sm-6 earn_col1 col-lg-3 col-md-3 col-6 mt-3">
              <small class="">Last 7 Days</small>
              @if(isset($last7->summ))
              <h5>
                <b>${{$last7->summ ?? ''}}</b>
              </h5>

              @if($last7->summ < $back7)
              <div class="down_text">
                <i class="bi m-0 bi-arrow-down-short"></i
                ><small class="text-danger"
                  >${{ $calcuseven ?? "" }}(
                  {{ number_format($perseven ?? "", 2, ".", ",") }}% )</small
                >
              </div>
              @else
              <div class="up_text">
                <i class="bi m-0 bi-arrow-up-short"></i
                ><small class="text-success"
                  >${{ $calcuseven ?? "" }}(
                  {{ number_format($perseven ?? "", 2, ".", ",") }}% )</small
                >
              </div>

              @endif @endif
            </div>
            <div class="col-sm-6 earn_col2 col-lg-3 col-md-3 col-6 mt-3">
              <small class="">Last 30 Days</small>
              @if(isset($thirtyday->summ))
              <h5>
                <b>${{$thirtyday->summ ?? ''}}</b>
              </h5>
              @if($thirtyday->summ < $backmonth)
              <div class="down_text">
                <i class="bi m-0 bi-arrow-down-short"></i
                ><small class="text-danger"
                  >${{ $calcuthirty ?? "" }}(
                  {{ number_format($perthirty ?? "", 2, ".", ",") }}% )</small
                >
              </div>
              @else
              <div class="up_text">
                <i class="bi m-0 bi-arrow-up-short"></i>
                <small class="text-success">${{ $calcuthirty ?? "" }}(
                  {{ number_format($perthirty ?? "", 2, ".", ",") }}% )</small>
              </div>

              @endif
            </div>
            <div class="col-sm-6 col-lg-3 col-md-3 col-6 mt-3">
              <small class="">Year to Date</small>
              <h5>
                <b>${{$thisyear1->summ ?? ''}}</b>
              </h5>
              @if($thisyear1->summ < $backyear)
              <div class="down_text">
                <i class="bi m-0 bi-arrow-down-short"></i
                ><small class="text-danger"
                  >${{ $calcuyear ?? "" }}(
                  {{ number_format($peryear ?? "", 2, ".", ",") }}% )</small
                >
              </div>
              @else
              <div class="up_text">
                <i class="bi m-0 bi-arrow-up-short"></i
                ><small class="text-success"
                  >${{ $calcuyear ?? "" }}(
                  {{ number_format($peryear ?? "", 2, ".", ",") }}% )</small
                >
              </div>

              @endif @endif
            </div>
          </div>
        </div>
        <div></div>
      </div>
    </div>
    @endif
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body text-white">
          <h5 class="card-title text-white mb-3">Earnings Summary</h5>
          <!-- <div class="d-flex justify-content-between mb-3 row">
            <div class="summary_tag col-lg-2 col-md-2 col-sm-4">
               <small><span class="tag_feed dot mr-1"></span>Bonus / Adjustments</small>
                            </div>
            <div class="summary_tag col-lg-2 col-md-2 col-sm-4">
              <small><span class="tag_feed_normal dot mr-1"></span>Feed</small>
            </div>
            <div class="summary_tag col-lg-2 col-md-2 col-sm-4">
              <small><span class="tag_feed_color dot mr-1"></span>Tips</small>
            </div>
            <div class="summary_tag col-lg-2 col-md-2 col-sm-4">
              <small
                ><span class="tag_feed_light dot mr-1"></span>Video Calls</small
              >
            </div>
            <div class="summary_tag col-lg-2 col-md-2 col-sm-4">
              <small
                ><span class="tag_feed_light dot mr-1"></span>Phone Calls</small
              >
            </div>
            <div class="summary_tag col-lg-2 col-md-2 col-sm-4">
              <small
                ><span class="tag_feed_pink dot mr-1"></span>MMS Pictures</small
              >
            </div>
            <div class="summary_tag col-lg-2 col-md-2 col-sm-4">
              <small
                ><span class="tag_feed_red dot mr-1"></span>SMS Messages</small
              >
            </div>
          </div> -->
          <canvas id="myChart4"></canvas>
        </div>
        <div></div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12">
      <div class="row justify-content-between">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <h5><b>Earnings Details</b></h5>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <form action="" method="get">
            <div class="d-flex justify-content-between">
              <select class="ml-auto form-select earn_select Earn-form" name="timing" id="topspent">
                <option class="earning-filter-option" value="today" @if(request()->get('timing') == 'today') selected @endif>Today</option>
                <option class="earning-filter-option" value="monthly" @if(request()->get('timing') == 'monthly') selected @endif>Monthly</option>
                <option class="earning-filter-option" value="yearly" @if(request()->get('timing') == 'yearly') selected @endif>Yearly</option>
              </select>
              <div class="mt-1 ml-0 mr-1">
                {{-- <h6>{{ $datecurrent ?? "" }}</h6> --}}
                @if(request()->get('timing') == 'monthly')
                @php
                $month = \Str::lower((request()->get('month'))?request()->get('month'): (\Carbon\Carbon::now()->format('M')));
                @endphp
                <select class="ml-auto form-select earn_select Earn-form" name="month" id="selectMonth">
                  <option class="earning-filter-option" value="jan" @if($month == 'jan') selected @endif>January</option>
                  <option class="earning-filter-option" value="feb" @if($month == 'feb') selected @endif>February</option>
                  <option class="earning-filter-option" value="mar" @if($month == 'mar') selected @endif>March</option>
                  <option class="earning-filter-option" value="apr" @if($month == 'apr') selected @endif>April</option>
                  <option class="earning-filter-option" value="may" @if($month == 'may') selected @endif>May</option>
                  <option class="earning-filter-option" value="jun" @if($month == 'jun') selected @endif>June</option>
                  <option class="earning-filter-option" value="jul" @if($month == 'jul') selected @endif>July</option>
                  <option class="earning-filter-option" value="aug" @if($month == 'aug') selected @endif>Auguest</option>
                  <option class="earning-filter-option" value="sep" @if($month == 'sep') selected @endif>September</option>
                  <option class="earning-filter-option" value="oct" @if($month == 'oct') selected @endif>October</option>
                  <option class="earning-filter-option" value="nov" @if($month == 'nov') selected @endif>November</option>
                  <option class="earning-filter-option" value="dec" @if($month == 'dec') selected @endif>December</option>
                </select>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-white desktop_table-not" > 
          <table class="text-white p-5 ">
            <tr class="t_head">
              {{-- 'message','picture','video','audio','audio-call','video-call','tips','feeds'  --}}
              <th>Date:</th>
              <th>Message</th>
              <th>Pictures</th>
              <th>Videos</th>
              <th>Audio</th>
              <th>Audio Calls</th>
              <th>Video Calls</th>
              <th>Tips</th>
              <th>Feeds</th>
              <th>Total</th>
            </tr>
            @foreach($earnings as $earning) 
              @php

              @endphp
            {{-- 'message','picture','video','audio','audio-call','video-call','tips','feeds'  --}}
            <tr class="Details_row">
              <td>{{ $earning['date'] }}</td>
              <td class="text-center">{{ ($earning['message'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['picture'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['video'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['audio'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['audio-call'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['video-call'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['tips'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['feeds'])??'00.00' }}$</td>
              <td class="text-center">{{ ($earning['total'])??'00.00' }}$</td>
            </tr>
            @endforeach
          </table>
        </div>
        <div></div>
        <div class="mobile_table">

          {{-- @foreach($spenders as $item) @php
            $audio=App\Models\User_logs::where('to',Auth::user()->id)
            ->where('from',$item->from) ->where('method','Audio message')
            ->selectRaw('user_logs.*, sum(model_earning) as total') ->first();
            $video=App\Models\User_logs::where('to',Auth::user()->id)
            ->where('from',$item->from) ->where('method','Video message')
            ->selectRaw('user_logs.*, sum(model_earning) as total') ->first();
            $tips=App\Models\User_logs::where('to',Auth::user()->id)
            ->where('from',$item->from) ->where('method','Tip')
            ->selectRaw('user_logs.*, sum(model_earning) as tip') ->first();
            $videocall=App\Models\User_logs::where('to',Auth::user()->id)
            ->where('from',$item->from) ->where('method','video_call')
            ->selectRaw('user_logs.*, sum(model_earning) as total') ->first();
            $phonecall=App\Models\User_logs::where('to',Auth::user()->id)
            ->where('from',$item->from) ->where('method','audio_call')
            ->selectRaw('user_logs.*, sum(model_earning) as total') ->first();
            $message=App\Models\User_logs::where('to',Auth::user()->id)
            ->where('from',$item->from) ->where('method','Post unlock')
            ->selectRaw('user_logs.*, sum(model_earning) as total') ->first();
            $text=App\Models\User_logs::where('to',Auth::user()->id)
            ->where('from',$item->from) ->where('method','Message')
            ->selectRaw('user_logs.*, sum(model_earning) as total') ->first();
            @endphp --}}
          {{-- <div class="mobile_table_card mt-2">
            <table>
              <tbody>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Date: Time:</th>
                  <td style="border-bottom: none !important">

                  </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Texts:</th>
                  <td style="border-bottom: none !important"> @if(!empty($text->total) ){{$text->total}}$ @else 00.00$ @endif</td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Pictures:</th>
                  <td style="border-bottom: none !important">   
                    @if(!empty($message->total) ){{$message->total}}$ @else 00.00$ @endif 
                  </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Videos:</th>
                
                  <td style="border-bottom: none !important">@if(!empty($video->total) ){{$video->total}}$ @else 00.00$ @endif </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Videos:</th>
                  <td style="border-bottom: none !important">  @if(!empty($audio->total) ){{$audio->total}}$ @else 00.00$ @endif </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Audio:</th>
                  <td style="border-bottom: none !important">@if(!empty($phonecall->total) ){{$phonecall->total}}$ @else 00.00$
                          @endif </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Phone Calls:</th>
                  <td style="border-bottom: none !important"> @if(!empty($videocall->total) ){{$videocall->total}}$ @else 00.00$
                          @endif </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Video Calls:</th>
                  <td style="border-bottom: none !important">@if(!empty($tips->tip) ){{$tips->tip}}$ @else 00.00$ @endif </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Tips:</th>
                  <td style="border-bottom: none !important"> 00.00$ </td>
                </tr>
                <tr>
                  <th scope="row" style="border-bottom: none !important">Total:</th>

                </tr>
              </tbody>
            </table>
          </div> --}}
          {{-- @endforeach --}}

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
  var ctx = document.getElementById("myChart4").getContext('2d');
  var myChart = new Chart(ctx, {
  	type: 'bar',
  	data: {
  		labels: ["jan 1-15","jan 16-31","Feb 1-15","Feb 16-28","Mar 1-15","Mar 16-31","Apr 1-15","Apr 16-30","may 1-15","may 16-31","June 1-15","June 16-30","July 1-15","July 16-31","Aug 1-15","Aug 16-31","Sep 1-15","Sep 16-30","Oct 1-15","Oct 16-31","Nov 1-15","Nov 16-30","Dec 1-15","Dec 16-31"],
  		datasets: [{
  			label: 'Messages',
  			backgroundColor: "#fb002c",
        data: [<?php echo $message; ?>],
  		}, 
      {
  			label: 'MMS Pictures',
  			backgroundColor: "#f30070",
        data: [<?php echo $mmspic; ?>],
  		},
      {
  			label: 'MMS Audio',
  			backgroundColor: "#f30071",
        data: [<?php echo $mmsvideo; ?>],
  		}, 
      {
  			label: 'MMS Video',
  			backgroundColor: "#f30071",
        data: [<?php echo $mmsvideo; ?>],
  		}, 
      {
  			label: 'Audio Calls',
  			backgroundColor: "#eb687f",
        data: [<?php echo $audiocall; ?>],
  		}, 
      {
  			label: 'Video Calls',
  			backgroundColor: "#eb687f",
        data: [<?php echo $videocall; ?>],
  		},
      {
  			label: 'Tips',
  			backgroundColor: "#efabb7",
        data: [<?php echo $tips; ?>],
  		}, 
      {
  			label: 'Feeds',
  			backgroundColor: "#efc9cf",
        data: [<?php echo $feeds; ?>],
  		}],
  	},
    options: {
      tooltips: {
        displayColors: true,
        callbacks:{
          mode: 'x',
        },
      },
      scales: {
        xAxes: [{
          stacked: true,
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          stacked: true,
          ticks: {
            beginAtZero: true,
          },
          type: 'linear',
        }]
      },
  		responsive: true,
  		maintainAspectRatio: false,
  		legend: { position: 'bottom' },
  	}
  });
</script>
<script>
  $(".year").on("change", function () {
    $("#yearfilter").submit();
  });

  $("#selectMonth").on('change', function() {
    var parentForm = $(this).closest("form");
    if (parentForm && parentForm.length > 0)
    parentForm.submit();
});
</script>
<style>
  .desktop_table-not {
    overflow-x: scroll;
  }
  </style>
@endsection @section('scripts') @parent @endsection
