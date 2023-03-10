@extends('layouts.vertical-menu.master') @section('css')

<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"> @endsection @section('page-header')

<!-- PAGE-HEADER -->

<div>

    <h1 class="page-title">{{$title}}</h1>

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="#">user</a></li>

        <li class="breadcrumb-item active" aria-current="page">List</li>

    </ol>

</div>



<!-- PAGE-HEADER END -->

@endsection @section('content')

<!-- ROW-1 OPEN-->

<!-- ROW-1 OPEN -->

<div class="row">

    <div class="col-md-12 col-lg-12">

        <div class="card">

            <div class="addnew-ele">

                <a href="{{ route('dashboard.users.create') }}" class="btn btn-info-light ">

                                    {{$buton_name}}

                                </a>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <div class="paging-section">

                        <form method="get" class="page-number">

                            <h6 class="page-num">show</h6>

                            <select id="pagination" name="paginate" class="form-control select2">

                                                        <option value="10" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 10) ? 'selected':''}}>10</option>

                                                        <option value="20" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 20) ? 'selected':''}}>20</option>

                                                        <option value="30" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 30) ? 'selected':''}}>30</option>

                                                        <option value="50" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 40) ? 'selected':''}}>40</option>

                                                   @if(isset($_GET['page']))<input type="hidden" name="page" value="{{$_GET['page']}}">@endif

                                                   <input type="submit" name="" style="display:none;">

                                               </form>
                                              <a href="{{route('dashboard.export-users')}}"  class="form-control src-btn"><i class="fa fa-download" aria-hidden="true"></i></a>
                                              <div class="left-items d-flex">
                                                <form id="rati" method="get" action="{{ route('dashboard.user-sorting') }}">
                                                   
                                                    <div class="sorting d-flex pr-2" >  
  
                                                      <select name="sorting" id="sorting" class="form-control"  required>
                                                          <option value="">Sort By</option>
                                                          <option value="Admin">Admin</option>
                                                          <option value="Model">Model</option>
                                                          <option value="Staff">Staff</option>
                                                          <option value="Fan">Fan</option>
                                                         
                                                          
                                                      </select>

                    </div>

                    </form>
                    <form>

                        <div class="search_bar d-flex">

                            <input type="" class="form-control" id="search" name="search" value="{{ (request()->get('search') != null) ? request()->get('search') : ''}}" placeholder="Search"></input>

                            <button type="submit" class="form-control src-btn"><i class="angle fe fe-search"></i></button>

                            <a class="form-control src-btn" href="{{ route('dashboard.users.index') }}"><i class="angle fe fe-rotate-ccw"></i></a>

                        </div>

                    </form>
                </div>
            </div>

            <table id="" class="table table-striped table-bordered text-nowrap w-100">

                <thead>

                    <tr>

                        <th>#</th>

                        <th class="wd-15p">Title</th>

                        <th class="wd-15p">Email</th>

                        <th class="wd-15p">Wallet</th>
                        <th class="wd-15p">Status</th>

                        <th class="wd-15p">Roles</th>

                        <th class="wd-15p">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @if(count($users)>0) @foreach($users as $key => $item)

                    <tr>

                        <td>{{ $item->id ?? '' }}</td>

                        <td>{{ $item->first_name ?? '' }}</td>

                        <td>{{ $item->email ?? '' }}</td>

                        <td> ${{ $item->wallet ?? '0' }}</td>
                        <td > <span class="badge badge-info">{{ $item->status }}</span></td>

                        <td>

                            @foreach($item->roles as $key => $item1)

                            <span class="badge badge-info">{{ $item1->title }}</span> @endforeach

                        </td>


                        <td>

                            {{--<a class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a>--}} @can('permission_edit')

                            <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.users.edit', $item->id) }}"><i class="fa fa-edit"></i> </a> @endcan

                            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.users.edit', $item->id) }}"><i class="fa fa-eye"></i></a> @can('permission_delete')

                            <form action="{{ route('dashboard.users.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure');" style="display: inline-block;">

                                <input type="hidden" name="_method" value="DELETE">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <button type="submit" class="btn btn-sm btn-danger" value=""><i class="fa fa-trash"></i></button>

                            </form>

                            @endcan

                        </td>

                    </tr>

                    @endforeach @endif

                </tbody>

            </table>

        </div>

        <div id="pagination">{{{ $users->links() }}}</div>

    </div>

    <!-- TABLE WRAPPER -->

</div>

<!-- SECTION WRAPPER -->

</div>

</div>

<!-- ROW-1 CLOSED -->

@endsection @section('js')

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
        $('.sorting').on('change', function(e) {
            $('#rati').submit()
        });
    });
</script>

@endsection