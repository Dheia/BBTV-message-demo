@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
<!-- PAGE-HEADER -->
<div>
    <h1 class="page-title">{{ $title }}</h1>
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
                <a href="{{ route('dashboard.fans.create') }}" class="btn btn-info-light ">
                    {{ $buton_name }}
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div class="paging-section">
                        <form method="get" class="page-number">
                            <h6 class="page-num">Show</h6>
                            <select id="pagination" name="paginate" class="form-control select2">

                                <option value="10" {{ isset($_GET['paginate']) && ($_GET['paginate']==10) ? 'selected'
                                    :''}}>10</option>

                                <option value="20" {{ isset($_GET['paginate']) && ($_GET['paginate']==20) ? 'selected'
                                    :''}}>20</option>

                                <option value="30" {{ isset($_GET['paginate']) && ($_GET['paginate']==30) ? 'selected'
                                    :''}}>30</option>

                                <option value="40" {{ isset($_GET['paginate']) && ($_GET['paginate']==40) ? 'selected'
                                    :''}}>40</option>
                                @if(isset($_GET['page']))<input type="hidden" name="page"
                                    value="{{$_GET['page']}}">@endif

                                <input type="submit" name="" style="display:none;">

                        </form>
                        {{--<a href="{{route('dashboard.export-users')}}" class="form-control src-btn"><i
                                class="fa fa-download" aria-hidden="true"></i></a>--}}

                        <form>

                            <div class="search_bar d-flex">

                                <input type="" class="form-control" id="search" name="search"
                                    value="{{ (request()->get('search') != null) ? request()->get('search') : ''}}"
                                    placeholder="Search"></input>

                                <button type="submit" class="form-control src-btn"><i
                                        class="angle fe fe-search"></i></button>

                                <a class="form-control src-btn" href="{{ route('dashboard.fans.index') }}"><i
                                        class="angle fe fe-rotate-ccw"></i></a>

                            </div>

                        </form>

                    </div>
                    <table id="" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Email</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @if(count($users) > 0)
                        @php $k=1; @endphp
                        @foreach($users as $item)
                            <tr>
                                <td>{{ $k++
                                    }}</td>
                                <td>{{ $item->first_name ?? '' }}</td>
                                <td>{{ $item->email ?? '' }}</td>
                                <td> <span class="badge badge-info">{{ $item->status }}</span></td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a> --}}
                                    <a class="btn btn-sm btn-secondary"
                                        href="{{ route('dashboard.fans.edit', $item->id) }}"><i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('dashboard.fans.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-danger" value=""><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                    @if($item->status=='Active')
                                    <div class="btn btn-sm btn-primary mymodal" data-toggle="modal"
                                        data-id="{{$item->id}}" id="mymodal" data-target="#logview"><i
                                            class="fa fa-lock"></i></div>
                                    @else

                                    <form action="{{ route('dashboard.user-unblock', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are You Sure To Unblock This User');"
                                        style="display: inline-block;">

                                        <input type="hidden" name="_method" value="PUT">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" class="btn btn-sm btn-primary" value=""><i
                                                class=" fa fa-unlock-alt"></i></button>

                                    </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach()
                        @endif
                        </tbody>
                    </table>
                    <div class="modal fade" id="logview" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-0">
                                    <form method="post" action="{{url('dashboard/user-block')}}">
                                        @csrf
                                        <div class="mb-5 ml-2">
                                            <h5 class="mr-2 mt-3">Input Reason</h5>
                                            <div class="form-group mr-2">
                                                <input type="hidden" id="block-user-id" value="" name="id">
                                                <textarea name="reason" id="" cols="60" rows="4"
                                                    placeholder="Enter reason......." required></textarea>

                                            </div>
                                            <button class="btn btn-success-light" type="submit">Block
                                                User</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="pagination">{{{ $users->links() }}}</div>
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
<script type="text/javascript">
    $(document).ready(function() {
                    $('#pagination').on('change', function() {
                        var $form = $(this).closest('form');
                        //$form.submit();
                        $form.find('input[type=submit]').click();
                        console.log($form);
                    });
                });

                $(document).ready(function(){
   $(".mymodal").click(function(){      

        $('#block-user-id').val($(this).data("id"));
     });
});
</script>
@endsection