@extends('frontend.model.main') @section('content')

<div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
  <div class="d-flex justify-content-between">
    <div class="">
      <h5><b>Payout History</b></h5>
    </div>
  </div>

  <div
    class="tab-pane fade show active "
    id="pills-All"
    role="tabpanel"
    aria-labelledby="pills-All-tab"
    style="color: #fff;"
  >
    <table class="feed-table text-white p-5 desktop_table">
      <tr class="t_head">
        <th>Pay Period</th>
        <th>Payment Date</th>
        <th>Payment Type</th>
        <th>Status</th>
        <th>Amount</th>
      </tr>
      @foreach($gethistory as $item)
      <tr>
        <td>{{$item->period}}</td>
        <td>{{$item->created_at}}</td>
        @php if($item->status == 1){ $status='Paid'; }else{ $status='Pending'; }
        @endphp
        <td class="">{{$item->type}}</td>
        <td class="">{{ $status }}</td>
        <td class="">$ {{$item->amount}}</td>
      </tr>
      @endforeach
    </table>

    <div class="mobile_table">

@foreach($gethistory as $item)
@php if($item->status == 1){ $status='Paid'; }else{ $status='Pending'; }
        @endphp
<div class="mobile_table_card">
  <table>
    <tbody>
      <tr>
        <th scope="row" style="border-bottom: none !important">Pay Period:</th>
        <td style="border-bottom: none !important">
        {{$item->period}}
        </td>
      </tr>
      <tr>
        <th scope="row" style="border-bottom: none !important">Payment Date:</th>
        <td style="border-bottom: none !important">{{$item->created_at}}</td>
      </tr>
      <tr>
        <th scope="row" style="border-bottom: none !important">Payment Type:</th>
        <td style="border-bottom: none !important">{{$item->type}}</td>
      </tr>
      <tr>
        <th scope="row" style="border-bottom: none !important">Status:</th>
        <td style="border-bottom: none !important">{{ $status }} </td>
      </tr>
      <tr>
        <th scope="row" style="border-bottom: none !important">Amount:</th>
        <td style="border-bottom: none !important"> {{$item->amount}}</td>
      </tr>
    </tbody>
  </table>
 </div>
@endforeach

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
  </div>
  <div
    class="tab-pane fade"
    id="pills-Incomplete"
    role="tabpanel"
    aria-labelledby="pills-Incomplete-tab"
    style="color: #fff"
  >
    <!-- content -->
  </div>
</div>

@endsection @section('scripts') @parent @endsection
