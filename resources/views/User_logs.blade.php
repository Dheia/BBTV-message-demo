@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- PAGE-HEADER -->
<div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Logs</a></li>
        <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
</div>

<!-- PAGE-HEADER END -->
@endsection
@section('content')
<!-- ROW-1 OPEN-->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="addnew-ele">

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
                                <div class="card">
                                    <div class="card-body text-center statistics-info">
                                        <div class="counter-icon bg-primary mb-0 box-primary-shadow">
                                            <i class="fe fe-dollar-sign text-white"></i>
                                        </div>
                                        <h6 class="mt-4 mb-2 number-font">Today Earning</h6>

                                        <h6 class="mb-2 number-font">${{$today_total_earning}} Total | ${{$today_total_admin}} Admin</h6>
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
                                <div class="card">
                                    <div class="card-body text-center statistics-info">
                                        <div class="counter-icon bg-secondary mb-0 box-primary-shadow">
                                            <i class="fe fe-dollar-sign text-white"></i>
                                        </div>
                                        <h6 class="mt-4 mb-2 number-font">This Month</h6>

                                        <h6 class="mb-2 number-font">${{$month_total_earning}} Total | ${{$month_total_admin}} Admin</h6>
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
                                <div class="card">
                                    <div class="card-body text-center statistics-info">
                                        <div class="counter-icon bg-success mb-0 box-primary-shadow">
                                            <i class="fe fe-dollar-sign text-white"></i>
                                        </div>
                                        <h6 class="mt-4 mb-2 number-font">This Year</h6>

                                        <h6 class="mb-2 number-font">${{$year_total_earning}} Total | ${{$year_total_admin}} Admin</h6>
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </div>

                            @if(request()->get('model_sorting') && request()->get('model_sorting') != 'all' && request()->get('date_sorting') && request()->get('date_sorting') != 'all')
                                {{-- <h5 class="mt-2"><strong>Earning:</strong> ${{$prevCycle['total']}} (Prev: {{$prevCycle['cycle']}}) and ${{$currentCycle['total']}} (Current: {{$currentCycle['cycle']}}) </h5> --}}
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-body text-center statistics-info">
                                            <div class="counter-icon bg-secondary mb-0 box-primary-shadow">
                                                <i class="fe fe-dollar-sign text-white"></i>
                                            </div>
                                            @php 
                                                $type = (request()->get('date_sorting') == 'month')?'Month':(request()->get('date_sorting') == 'today'?'Day':'Year'); 
                                            @endphp
                                            <h6 class="mt-4 mb-2 number-font">Previous {{$type}} ({{isset($prevCycle['cycle'])?$prevCycle['cycle']:''}})</h6>
                                            <h6 class="mb-2 number-font">${{isset($prevCycle['total'])?$prevCycle['total']:''}}</h6>
                                            <p class="text-muted"></p>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-body text-center statistics-info">
                                            <div class="counter-icon bg-secondary mb-0 box-primary-shadow">
                                                <i class="fe fe-dollar-sign text-white"></i>
                                            </div>
                                            @php 
                                                $type = (request()->get('date_sorting') == 'month')?'Month':(request()->get('date_sorting') == 'today'?'Day':'Year'); 
                                            @endphp
                                            <h6 class="mt-4 mb-2 number-font">Current {{$type}} ({{isset($currentCycle['cycle'])?$currentCycle['cycle']:''}})</h6>
                                            <h6 class="mb-2 number-font">${{isset($currentCycle['total'])?$currentCycle['total']:''}}</h6>
                                            <p class="text-muted"></p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- @if(request()->get('model_sorting') && request()->get('model_sorting') != 'all' && request()->get('date_sorting') == 'today')
                                <h5 class="mt-2"><strong>Earning:</strong> ${{$prevCycle['total']}} (Prev: {{$prevCycle['cycle']}}) and ${{$currentCycle['total']}} (Today: {{$currentCycle['cycle']}}) </h5>   
                            @endif

                            @if(request()->get('model_sorting') && request()->get('model_sorting') != 'all' && request()->get('date_sorting') == 'year')
                                <h5 class="mt-2"><strong>Earning:</strong> ${{$prevCycle['total']}} (Prev: {{$prevCycle['cycle']}}) and ${{$currentCycle['total']}} (Today: {{$currentCycle['cycle']}}) </h5>   
                            @endif --}}
                            
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="paging-section">
                        <div>
                           
                        </div>
                        <div class="left-items d-flex">
                            <form id="rati" method="get" action="" class="d-flex">
                                <div class="sorting d-flex pr-2">
                                    <select name="date_sorting" id="" class="form-control time-filter" required>
                                        <option value="all" @if(app('request')->input('date_sorting')=='all') selected @endif >Filter</option>
                                        <option value="today" @if(app('request')->input('date_sorting')=='today') selected @endif >Today</option>
                                        <option value="month" @if(app('request')->input('date_sorting')=='month') selected @endif >This Month</option>
                                        <option value="year" @if(app('request')->input('date_sorting')=='year') selected @endif >This Year</option>
                                    </select>
                                </div>
                                <div class="sorting d-flex pr-2">
                                    <select name="model_sorting" id="model-fliter" class="form-control" required>
                                        <option value="all">Select Model</option>
                                        @foreach($model as $value)
                                        <option value="{{$value->user_id}}" @if(app('request')->input('model_sorting')==$value->user_id) selected @endif >{{$value->model_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="sorting d-flex pr-2">
                                    <select name="fan_sorting" id="user-fliter" class="form-control" required>
                                        <option value="all">Select User</option>
                                        @foreach($user as $value)
                                        <option value="{{$value->id}}" @if(app('request')->input('fan_sorting')==$value->id) selected @endif >{{$value->first_name}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="btn p-0"><a class="form-control src-btn" href="{{ route('dashboard.user-logs') }}"><i class="angle fe fe-rotate-ccw"></i></a></div>

                            </form>
                        </div>
                    </div>

                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Model Earning</th>
                                <th>Admin Earning</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody class="filter_data">
                            @if(count($logs)>0)
                            @foreach($logs as $key => $log)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <b>{{ $log->user->first_name ?? '' }} {{ $log->user->last_name ?? '' }} {{ $log->method ?? '' }} To {{ $log->model->first_name ?? '' }}</b>
                                </td>
                                <td>${{ $log->price }}</td>
                                <td>${{ $log->model_earning }}</td>
                                <td>${{ $log->earnings }}</td>
                                <td class="">
                                    {{\Carbon\Carbon::parse($log->created_at)->format('H:i d-M-Y')}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        {{-- <div class="modal fade" id="logview" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="mb-5">
                                            <h5 class="m-2 mt-3">Kayla Penman Phone Call to Dorothy</h5>
                                            <h6 class="m-2 mt-3">Call Duration: <span class="text-muted">00:10:20</span>
                                            </h6>
                                            <h6 class="m-2 mt-3">Model Cost Per Min: <span class="text-muted">$1</span>
                                            </h6>
                                            <h6 class="m-2 mt-3">Model Earning: <span class="text-muted">$10.33</span>
                                            </h6>
                                            <h6 class="m-2 mt-3">Admin Earning: <span class="text-muted">$03.09</span>
                                            </h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                    </table>
                    
                </div>
                <div id="pagination">{{{ $logs->links() }}}</div>
            </div>
            <!-- TABLE WRAPPER -->
        </div>
        <!-- SECTION WRAPPER -->
    </div>
</div>
<!-- ROW-1 CLOSED -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

<script>
    jQuery(document).ready(function($) {
        $(".time-filter").on('change', function() {
            $('#rati').submit();
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $("#model-fliter").on('change', function() {
            $('#rati').submit();
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $("#user-fliter").on('change', function() {
            $('#rati').submit();
        });
    });
</script>
@endsection