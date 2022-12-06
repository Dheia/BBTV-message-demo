@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- PAGE-HEADER -->

<div>

    <h1 class="page-title">{{$title}}</h1>

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="#">Models</a></li>

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

                <a href="{{ route('dashboard.models.create') }}" class="btn btn-info-light ">

                    {{$buton_name}}

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

                                <option value="50" {{ isset($_GET['paginate']) && ($_GET['paginate']==40) ? 'selected'
                                    :''}}>40</option>
                                @if(isset($_GET['page']))<inp ut type="hidden" name="page" value="{{$_GET['page']}}">
                                    @endif

                                    <input type="submit" name="" style="display:none;">

                        </form>
                        {{--<a href="{{route('dashboard.export-users')}}" class="form-control src-btn"><i
                                class="fa fa-download" aria-hidden="true"></i></a>--}}

                        <div class="left-items d-flex">
                            <form id="rati" method="get" action="{{ route('dashboard.models-sorting') }}">
                                <div class="sorting d-flex pr-2">

                                    <select name="sorting" id="sorting" class="form-control" required>
                                        <option value="">Sort By</option>
                                        <option value="Female" {{ isset($_GET['sorting']) && ($_GET['sorting']=='Female') ? 'selected'
                                    :''}}>Female</option>
                                        <option value="Male" {{ isset($_GET['sorting']) && ($_GET['sorting']=='Male') ? 'selected'
                                    :''}}>Male</option>
                                        <option value="Verified" {{ isset($_GET['sorting']) && ($_GET['sorting']=='Verified') ? 'selected'
                                    :''}}>Verified</option>
                                        <option value="Unverified" {{ isset($_GET['sorting']) && ($_GET['sorting']=='Unverified') ? 'selected'
                                    :''}}>Unverified</option>
                                        <option value="Blocked" {{ isset($_GET['sorting']) && ($_GET['sorting']=='Blocked') ? 'selected'
                                    :''}}>Blocked</option>
                                        <option value="Pending" {{ isset($_GET['sorting']) && ($_GET['sorting']=='Pending') ? 'selected'
                                    :''}}>Pending</option>

                                    </select>
                                </div>
                            </form>
                            <form>

                                <div class="search_bar d-flex">

                                    <input type="" class="form-control" id="search" name="search"
                                        value="{{ (request()->get('search') != null) ? request()->get('search') : ''}}"
                                        placeholder="Search"></input>

                                    <button type="submit" class="form-control src-btn"><i
                                            class="angle fe fe-search"></i></button>

                                    <a class="form-control src-btn" href="{{ route('dashboard.models.index') }}"><i
                                            class="angle fe fe-rotate-ccw"></i></a>

                                </div>

                            </form>
                        </div>

                    </div>

                    <table id="" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>S NO.</th>
                                <th class="wd-15p">Display Name</th>
                                <th class="wd-15p">Email</th>
                                <th class="wd-15p">gender</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!empty($model))
                            @php
                            $k=1;
                            @endphp
                            @foreach($model as $item)
                            
                            <tr>

                                <td>{{ $k++}}</td>

                                <td>{{ $item->first_name ?? '' }} {{ $item->last_name ?? '' }}</td>

                                <td>{{ $item->email ?? '' }}</td>

                                <td>{{ $item->gender ?? '' }}</td>


                                <td> <span class="badge badge-info">{{ $item->status }}</span></td>


                                <td>

                                    {{--<a class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a>--}}

                                    @can('permission_edit')

                                    <a class="btn btn-sm btn-secondary"
                                        href="{{ route('dashboard.models.edit', $item->users_auto_id) }}"><i
                                            class="fa fa-edit"></i> </a>
                                                           <a class="btn btn-sm btn-warning"
                                        href="{{ route('dashboard.bank-details', $item->users_auto_id) }}"><i class="fa fa-bank"></i></a>

                                    @endcan
                                    @can('permission_delete')

                                    <form action="{{ route('dashboard.models.destroy', $item->users_auto_id) }}"
                                        method="POST" onsubmit="return confirm('Are you sure');"
                                        style="display: inline-block;">

                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" class="btn btn-sm btn-danger" value=""><i
                                                class="fa fa-trash"></i></button>

                                    </form>
                                    @if($item->status=='Active')
                                    <div class="btn btn-sm btn-primary mymodal" data-toggle="modal"
                                        data-id="{{$item->user_id}}" id="mymodal" data-target="#logview"><i
                                            class="fa fa-lock"></i></div>
                                    @elseif($item->status=='Blocked')
                                    <form action="{{ route('dashboard.user-unblock', $item->users_auto_id) }}"
                                        method="POST" onsubmit="return confirm('Are You Sure To Unblock This User');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-primary" value=""><i class=" fa fa-unlock-alt"></i></button>
                                    </form>


                                    @endif
                                    @if($item->status=='Pending')
                                    <form action="{{ route('dashboard.user-verify', $item->users_auto_id) }}"
                                        method="POST" onsubmit="return confirm('Are You Sure To Verify This User');"
                                        style="display: inline-block;">

                                        <input type="hidden" name="_method" value="PUT">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" class="btn btn-sm btn-success" value=""><i
                                                class=" fa fa-check-square-o"></i></button>

                                    </form>
                                    @endif
                                    @endcan

                                </td>

                            </tr>

                            @endforeach

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
                                                <textarea name="reason" id="" cols="66" rows="4"
                                                    placeholder="Enter reason..." required></textarea>

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

                <div id="pagination">{{{ $model->links() }}}</div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

      $('#pagination').on('change', function() {

        var $form = $(this).closest('form');

    //$form.submit();

    $form.find('input[type=submit]').click();

    console.log( $form);

});

  });
    $('.sorting').on('change', function(e) {
        $('#rati').submit()
    });



    $(document).ready(function(){
   $(".mymodal").click(function(){      

        $('#block-user-id').val($(this).data("id"));
     });
});
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal({
             title: `Are you sure you want to delete this record?`,
             text: "If you delete this, it will be gone forever.",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             form.submit();
           }
         });
     });
 
</script>

@endsection