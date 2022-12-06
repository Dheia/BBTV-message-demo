@extends('frontend.model.main') @section('content')
<style>
  ckeckfilter .filterbig-checkbox:checked + label:after {
    font-size: 14px;
    left: 0;
    color: #c73ca9;
    border: 1px solid;
    padding: 0px 4px;
    border-radius: 2px;
  }
  .ckeckfilter .filter-checkbox:checked + label {
    background: #0c1d2d;
    border: 1px solid #0c1d2d;
    border-radius: 4px;
  }
  .ckeckfilter .filterbig-checkbox + label {
    padding: 11px;
    margin-right: 5px;
    height: 11px !important;
    /* margin-top: 10px !important; */
  }
  .ckeckfilter .filter-checkbox + label {
    background: #0c1d2d;
    border: 1px solid #c73ca9ff;
    box-shadow: 0 1px 2px rgb(0 0 0 / 5%),
      inset 0px -15px 10px -12px rgb(0 0 0 / 5%);
    padding: 9px;
    border-radius: 3px;
    display: inline-block;
    position: relative;
    cursor: pointer;
  }
  td,
  th {
    border-bottom: 1px solid #202c3e;
    text-align: left;
    padding: 12px;
    font-size: 16px;
  }
</style>

<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
  <form action="{{url('model/tip-update')}}" method="POST" id="tip_update">
    @csrf
<input type="hidden" name="tip_id" value="" id="Tip_id_value">
  </form>
  <div class="row justify-content-between">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 mt-1">
      <h5><b>Tips</b></h5>
    </div>
    <div class="class col-xl-10 col-lg-10 col-md-10 col-sm-10">
      <ul
        class="row nav nav-pills mb-3 d-flex "
        id="pills-tab"
        role="tablist"
      >
        <li class="nav-item chat_nav col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <a
            class="nav-link nav_tab active"
            id="pills-All-tab"
            data-toggle="pill"
            href="#pills-All"
            role="tab"
            aria-controls="pills-All"
            aria-selected="true"
          >
            <small
              >All ( <span class="All_tips">{{ count($count_tips) }}</span> )</small
            ></a
          >
        </li>
        <li class="nav-item chat_nav col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <a
            class="nav-link nav_tab"
            id="pills-Completed-tab"
            data-toggle="pill"
            href="#pills-Completed"
            role="tab"
            aria-controls="pills-Completed"
            aria-selected="false"
          >
            <div>
              <small
                >Completed (<span class="All_tips">{{
                  count($count_completed_tips)
                }}</span
                >)
              </small>
            </div>
          </a>
        </li>
        <li class="nav-item chat_nav col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <a
            class="nav-link nav_tab"
            id="pills-Incomplete-tab"
            data-toggle="pill"
            href="#pills-Incomplete"
            role="tab"
            aria-controls="pills-Incomplete"
            aria-selected="false"
          >
            <div>
              <small
                >Incomplete (<span class="All_tips">{{
                  count($count_incompleted_tips)
                }}</span
                >)
              </small>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="tab-content" id="ex1-content">
    <div
      class="tab-pane fade show active"
      id="pills-All"
      role="tabpanel"
      aria-labelledby="pills-All-tab"
      style="color: #fff"
    >
      <table class="desktop_table feed-table text-white p-5">
        <tr class="t_head">
          <th>Date: Time</th>
          <th>Username</th>
          <th>Message</th>
          <th>Method</th>
          <th>Tip Amount</th>
          <th colspan="3">Earnings</th>
        </tr>
        @if(count($tips)>0) @foreach($tips as $item) @php
        $user=App\Models\User::where('id',$item->from)->first(); @endphp
        <tr>
          <td>
            {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
          </td>
          <td>{{$user->first_name}}</td>
          @if($item->tips_type == 'message')
          <td class="">{{$item->message}}</td>
          @else
          <td class="">-</td>
          @endif

          <td class="">{{$item->tips_type}}</td>
          <td class="">${{$item->price}}</td>
          <td>${{$item->model_earning}}</td>
          <td><i class="bi bi-send ml-2 mr-0"></i></td>
          <td>
            <div class="ckeckfilter">
              <input
                type="checkbox"
                id="checkbox-2-11{{$item->id}}"
                name=""
                value="{{$item->id}}"
                class="filter-checkbox tips_checkbox filterbig-checkbox ckeckoutinpt"
                @if($item->status=='1') checked @endif >
              <label for="checkbox-2-11{{$item->id}}"></label>
              <!-- <p class="text-white mt-3">Remember Me</p> -->
            </div>
          </td>
        </tr>
        @endforeach   @else No Data Found @endif
      
      </table>

      <div class="mobile_table">
        @if(count($tips)>0) @foreach($tips as $item) @php
        $user=App\Models\User::where('id',$item->from)->first(); @endphp

        <div class="mobile_table_card" id="faqExample">
          <div class="row p-3">
            <div class="col-lg-4 col-sm-4 col-4 text-center">
              <div class="date_calendra">
                <div class="date_date">
                  {{date('d', strtotime($item->created_at))}}
                </div>

                <div class="date_month">
                  {{ Carbon\Carbon::parse($item->created_at)->format('M-Y' ) }}
                </div>
                <div class="date_time" style="font-size: 9px">
                  {{ Carbon\Carbon::parse($item->created_at)->format('g:i A' ) }}
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-3 d-flex tip-amount text-center">
              <div class="date_calendra">
                ${{$item->price}} <br /><span
                  class="mt-2 tiper_username"
                  >{{$user->first_name}}</span
                >
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-2 d-flex tip-amount">
              <div class="arrow-down ml-3">
                <i
                  class="fa fa-angle-down"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseOne{{$item->id}}"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                  aria-hidden="true"
                ></i>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-2" style="color: #c73ca9ff">
              <i class="bi bi-send ml-2 mr-0"></i> <br />
              <div class="mt-2 ml-1">
                <div
                  class="ckeckfilter mr-0"
                  style="margin-right: 0px !important"
                >
                  <input
                    type="checkbox"
                    id="checkbox-2-11{{$item->id}}"
                    name=""
                    value="{{$item->id}}"
                    class="filter-checkbox filterbig-checkbox tips_checkbox ckeckoutinpt" @if($item->status=='1') checked @endif>
                  <label for="checkbox-2-11{{$item->id}}"></label>
                  <!-- <p class="text-white mt-3">Remember Me</p> -->
                </div>
              </div>
            </div>
          </div>

          <div
            id="collapseOne{{$item->id}}"
            class="collapse"
            aria-labelledby="headingOne"
            data-parent="#faqExample"
          >
            <div class="card-body tip-details-dropdown">
              <table>
                <tbody>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Message:
                    </th>
                    <td style="border-bottom: none !important">
                      @if($item->tips_type == 'message')
                      {{$item->message}}
                      @else - @endif
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Method:
                    </th>
                    <td style="border-bottom: none !important">
                      {{$item->tips_type}}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Earnings:
                    </th>
                    <td style="border-bottom: none !important">
                      ${{$item->model_earning}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endforeach @else No Data Found @endif
      </div>
     
    </div>

    <div
      class="tab-pane fade"
      id="pills-Completed"
      role="tabpanel"
      aria-labelledby="pills-Completed-tab"
      style="color: #fff"
    >
      <!-- content -->
      <table class="desktop_table feed-table text-white p-5">
        <tr class="t_head">
          <th>Date: Time</th>
          <th>Username</th>
          <th>Message</th>
          <th>Method</th>
          <th>Tip Amount</th>
          <th colspan="3">Earnings</th>
        </tr>
        @if(count($completed_tips)>0) @foreach($completed_tips as $item) @php
        $user=App\Models\User::where('id',$item->from)->first(); @endphp
        <tr>
          <td>
            {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
          </td>
          <td>{{$user->first_name}}</td>
          @if($item->tips_type == 'message')
          <td class="">{{$item->message}}</td>
          @else
          <td class="">-</td>
          @endif

          <td class="">{{$item->tips_type}}</td>
          <td class="">${{$item->price}}</td>
          <td>${{$item->model_earning}}</td>
          <td><i class="bi bi-send ml-2 mr-0"></i></td>
          <td>
            <div class="ckeckfilter">
              <input
                type="checkbox"
                id="checkbox-2-11{{$item->id}}"
                name=""
                value="{{$item->id}}"
                class="filter-checkbox tips_checkbox filterbig-checkbox ckeckoutinpt" @if($item->status=='1') checked @endif>
              <label for="checkbox-2-11{{$item->id}}"></label>
              <!-- <p class="text-white mt-3">Remember Me</p> -->
            </div>
          </td>
        </tr>
        @endforeach @else No Data Found @endif
      </table>

      <div class="mobile_table">
        @if(count($completed_tips)>0) @foreach($completed_tips as $item) @php
        $user=App\Models\User::where('id',$item->from)->first(); @endphp

        <div class="mobile_table_card" id="faqExample">
          <div class="row p-3">
            <div class="col-lg-4 col-sm-4 col-4 text-center">
              <div class="date_calendra">
                <div class="date_date">
                  {{date('d', strtotime($item->created_at))}}
                </div>

                <div class="date_month">
                  {{ Carbon\Carbon::parse($item->created_at)->format('M-Y' ) }}
                </div>
                <div class="date_time" style="font-size: 9px">
                  {{ Carbon\Carbon::parse($item->created_at)->format('g:i A' ) }}
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-3 d-flex tip-amount text-center">
              <div class="date_calendra">
                ${{$item->price}} <br /><span
                  class="mt-2 tiper_username"
                  >{{$user->first_name}}</span
                >
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-2 d-flex tip-amount">
              <div class="arrow-down ml-3">
                <i
                  class="fa fa-angle-down"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseOne{{$item->id}}"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                  aria-hidden="true"
                ></i>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-2" style="color: #c73ca9ff">
              <i class="bi bi-send ml-2 mr-0"></i> <br />
              <div class="mt-2 ml-1">
                <div
                  class="ckeckfilter mr-0"
                  style="margin-right: 0px !important"
                >
                  <input
                    type="checkbox"
                    id="checkbox-2-11"
                    name=""
                    value="{{$item->id}}"
                    class="filter-checkbox tips_checkbox filterbig-checkbox ckeckoutinpt" @if($item->status=='1') checked @endif>
                  <label for="checkbox-2-11"></label>
                  <!-- <p class="text-white mt-3">Remember Me</p> -->
                </div>
              </div>
            </div>
          </div>

          <div
            id="collapseOne{{$item->id}}"
            class="collapse"
            aria-labelledby="headingOne"
            data-parent="#faqExample"
          >
            <div class="card-body tip-details-dropdown">
              <table>
                <tbody>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Message:
                    </th>
                    <td style="border-bottom: none !important">
                      @if($item->tips_type == 'message')
                      {{$item->message}}
                      @else - @endif
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Method:
                    </th>
                    <td style="border-bottom: none !important">
                      {{$item->tips_type}}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Earnings:
                    </th>
                    <td style="border-bottom: none !important">
                      ${{$item->model_earning}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endforeach @else No Data Found @endif
      </div>
     
    </div>

    <div
      class="tab-pane fade"
      id="pills-Incomplete"
      role="tabpanel"
      aria-labelledby="pills-Incomplete-tab"
      style="color: #fff"
    >
      <table class="desktop_table feed-table text-white p-5">
        <tr class="t_head">
          <th>Date: Time</th>
          <th>Username</th>
          <th>Message</th>
          <th>Method</th>
          <th>Tip Amount</th>
          <th colspan="3">Earnings</th>
        </tr>
        @if(count($incompleted_tips)>0) @foreach($incompleted_tips as $item)
        @php $user=App\Models\User::where('id',$item->from)->first(); @endphp
        <tr>
          <td>
            {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  m:s A') }}
          </td>
          <td>{{$user->first_name}}</td>
          @if($item->tips_type == 'message')
          <td class="">{{$item->message}}</td>
          @else
          <td class="">-</td>
          @endif

          <td class="">{{$item->tips_type}}</td>
          <td class="">${{$item->price}}</td>
          <td>${{$item->model_earning}}</td>
          <td><i class="bi bi-send ml-2 mr-0"></i></td>
          <td>
            <div class="ckeckfilter">
              <input
                type="checkbox"
                id="checkbox-2-11{{$item->id}}"
                name=""
                value="{{$item->id}}"
                class="filter-checkbox tips_checkbox filterbig-checkbox ckeckoutinpt" @if($item->status=='1') checked @endif>
              <label for="checkbox-2-11{{$item->id}}"></label>
              <!-- <p class="text-white mt-3">Remember Me</p> -->
            </div>
          </td>
        </tr>
        @endforeach @else No Data Found @endif
      </table>

      <div class="mobile_table">
        @if(count($incompleted_tips)>0) @foreach($incompleted_tips as $item)
        @php $user=App\Models\User::where('id',$item->from)->first(); @endphp

        <div class="mobile_table_card" id="faqExample">
          <div class="row p-3">
            <div class="col-lg-4 col-sm-4 col-4 text-center">
              <div class="date_calendra">
                <div class="date_date">
                  {{date('d', strtotime($item->created_at))}}
                </div>

                <div class="date_month">
                  {{ Carbon\Carbon::parse($item->created_at)->format('M-Y' ) }}
                </div>
                <div class="date_time" style="font-size: 9px">
                  {{ Carbon\Carbon::parse($item->created_at)->format('g:i A' ) }}
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-3 d-flex tip-amount text-center">
              <div class="date_calendra">
                ${{$item->price}} <br /><span
                  class="mt-2 tiper_username"
                  >{{$user->first_name}}</span
                >
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-2 d-flex tip-amount">
              <div class="arrow-down ml-3">
                <i
                  class="fa fa-angle-down"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseOne{{$item->id}}"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                  aria-hidden="true"
                ></i>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-2" style="color: #c73ca9ff">
              <i class="bi bi-send ml-2 mr-0"></i> <br />
              <div class="mt-2 ml-1">
                <div
                  class="ckeckfilter mr-0"
                  style="margin-right: 0px !important"
                >
                  <input
                    type="checkbox"
                    id="checkbox-2-11{{$item->id}}"
                    name=""
                    value="{{$item->id}}"
                    class="filter-checkbox tips_checkbox filterbig-checkbox ckeckoutinpt" @if($item->status=='1') checked @endif>
                  <label for="checkbox-2-11{{$item->id}}"></label>
                  <!-- <p class="text-white mt-3">Remember Me</p> -->
                </div>
              </div>
            </div>
          </div>

          <div
            id="collapseOne{{$item->id}}"
            class="collapse"
            aria-labelledby="headingOne"
            data-parent="#faqExample"
          >
            <div class="card-body tip-details-dropdown">
              <table>
                <tbody>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Message:
                    </th>
                    <td style="border-bottom: none !important">
                      @if($item->tips_type == 'message')
                      {{$item->message}}
                      @else - @endif
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Method:
                    </th>
                    <td style="border-bottom: none !important">
                      {{$item->tips_type}}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" style="border-bottom: none !important">
                      Earnings:
                    </th>
                    <td style="border-bottom: none !important">
                      ${{$item->model_earning}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endforeach @else No Data Found @endif
      </div>
     
    </div>
  </div>
  <div id="pagination">
        {{ $tips->withQueryString()->links('paginate.paginate') }}
      </div>
</div>

@endsection @section('scripts') @parent @endsection
