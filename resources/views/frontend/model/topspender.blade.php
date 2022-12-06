  @extends('frontend.model.main')
@section('content')

<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
                        <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="row justify-content-between">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <h5><b>Top Spenders</b></h5></div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="d-flex justify-content-end">

                            <form  action=""  method="get">
                            
                                <select class=" ml-auto form-select Earn-form " name="timing" id="topspent" >
                              
                                    <option value="all" class="earning-filter-option" @if(request()->get('timing')=='all') selected @endif     >All Time </option>
                                    <option value="currentyear" class="earning-filter-option" @if(request()->get('timing')=='currentyear') selected @endif >This Year</option>
                                    <option value="lastmonth" class="earning-filter-option" @if(request()->get('timing')=='lastmonth') selected @endif >This month</option>
                                    <option value="today" class="earning-filter-option" @if(request()->get('timing')=='today') selected @endif >Today</option>
                        
                                </select>
                            </form>
                        </div>
                        </div>
                    </div>
                      <div class="card ">
                        <div class="card-body text-white desktop_table">
                         <table class="text-white p-5">
                          <tr class="t_head">
                            <th>Username</th>
                            <th>Texts</th>
                            <th>Pictures</th>
                            <th>Videos</th>
                            <th>Audio</th>
                            <th>Phone Calls</th>
                            <th>Video Calls</th>
                            <th>Tips</th>
                            <th>Total</th>
                          </tr>
                          @foreach($spenders as $item)
                          @php
                          $username=App\Models\User::where('id',$item->from)->first();
                          $audio=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Audio message')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $video=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Video message')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $tips=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Tip')
                          ->selectRaw('user_logs.*, sum(model_earning) as tip')
                          ->first();
                          $videocall=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Video call')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $phonecall=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Phone call')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $message=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Post unlock')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $text=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Message')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                         
                          @endphp
                          
                         
                          <tr class="Details_row">
                            <td>@if(!empty($username->first_name) )  {{$username->first_name}} @else  @endif</td>
                            <td> @if(!empty($text->total) ) $ {{$text->total}} @else $ 00.00 @endif</td>
                            <td> @if(!empty($message->total) ) $ {{$message->total}} @else $  00.00 @endif</td>
                            <td> @if(!empty($video->total) ) $ {{$video->total}} @else $  00.00 @endif</td>
                            <td> @if(!empty($audio->total) ) $ {{$audio->total}} @else $  00.00 @endif</td>
                            <td>@if(!empty($phonecall->total) ) $ {{$phonecall->total}} @else $  00.00 @endif</td>
                            <td>@if(!empty($videocall->total) ) $ {{$videocall->total}} @else $  00.00 @endif</td>
                            <td> @if(!empty($tips->tip) ){{$tips->tip}} @else $  00.00 @endif</td>
                            <td>$ {{$item->sum}}</td>
                          </tr>
                          @endforeach
                         

                        </table>
                      </div>
                      <div class="mobile_table">
                      @foreach($spenders as $item)
                          @php
                          $username=App\Models\User::where('id',$item->from)->first();
                          $audio=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Audio message')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $video=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Video message')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $tips=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Tip')
                          ->selectRaw('user_logs.*, sum(model_earning) as tip')
                          ->first();
                          $videocall=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Video call')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $phonecall=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Phone call')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $message=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Post unlock')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                          $text=App\Models\User_logs::where('to',Auth::user()->id)
                          ->where('from',$item->from)
                          ->where('method','Message')
                          ->selectRaw('user_logs.*, sum(model_earning) as total')
                          ->first();
                         
                          @endphp
                          <div class="mobile_table_card">
                            <table>
                              <tbody>
                                <tr>
                                  <th scope="row" style="border-bottom: none !important">Username:</th>
                                  <td style="border-bottom: none !important">
                                  @if(!empty($username->first_name) ){{$username->first_name}} @else  @endif
                                  </td>
                                </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Texts:</th>
                                      <td style="border-bottom: none !important">@if(!empty($text->total) ){{$text->total}} @else 00.00 @endif</td>
                                      </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Pictures:</th>
                                      <td style="border-bottom: none !important">@if(!empty($message->total) ){{$message->total}} @else 00.00 @endif</td>
                                      </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Videos:</th>
                                      <td style="border-bottom: none !important">@if(!empty($video->total) ){{$video->total}} @else 00.00 @endif </td>
                                      </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Audio:</th>
                                      <td style="border-bottom: none !important"> @if(!empty($audio->total) ){{$audio->total}} @else 00.00 @endif</td>
                                      </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Phone Calls:</th>
                                      <td style="border-bottom: none !important"> @if(!empty($phonecall->total) ){{$phonecall->total}} @else 00.00 @endif</td>
                                      </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Video Calls:</th>
                                      <td style="border-bottom: none !important">@if(!empty($videocall->total) ){{$videocall->total}} @else 00.00 @endif</td>
                                      </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Tips:</th>
                                      <td style="border-bottom: none !important">@if(!empty($tips->tip) ){{$tips->tip}} @else 00.00 @endif</td>
                                      </tr>
                                      <tr>
                                      <th scope="row" style="border-bottom: none !important">Total:</th>
                                      <td style="border-bottom: none !important"> {{$item->sum}}</td>
                                      </tr>
                              </tbody>
                            </table>
                          </div>
                          @endforeach

                          </div>

                      <div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <style>
                select#topspent {
    /* background-image: url(https://toppng.com/uploads/preview/white-drop-down-arrow-11562884289ujhzrp5rwy.png) !important; */
    background-image: url('{{ url('/images/down_arrow.png')  }}');
    background-repeat: no-repeat !important;
    background-position: right 0.50rem center !important;
    background-size: 16px 12px !important;
}
              </style>
     
@endsection
@section('scripts')
@parent
@endsection