@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- PAGE-HEADER -->

<div>

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="#">Querys</a></li>

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
            <div class="card-body">
                <div class="table-responsive">
                    <div class="paging-section">
                        <form method="get" class="page-number"  >
                            <h6 class="page-num">Show</h6>
                            <select id="pagination" name="paginate"class="form-control select2">
                                <option value="10" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 10) ? 'selected':''}}>10</option>
                                <option value="20" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 20) ? 'selected':''}}>20</option>
                                <option value="30" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 30) ? 'selected':''}}>30</option>
                                <option value="50" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 40) ? 'selected':''}}>30</option>
                                @if(isset($_GET['page']))<input type="hidden" name="page" value="{{$_GET['page']}}">@endif
                                <input type="submit" name="" style="display:none;">
                            </form>
                            <form>
                                <div class="search_bar d-flex">  
                                    <input type="" class="form-control" id="search" name="search" value="{{ (request()->get('search') != null) ? request()->get('search') : ''}}" placeholder="Search">
                                    <button type="submit" class="form-control src-btn" ><i class="angle fe fe-search"></i></button>
                                    <a class="form-control src-btn" href="{{ route('dashboard.querys.index') }}"><i class="angle fe fe-rotate-ccw"></i></a>
                                </div>
                            </form> 
                        </div>
                        <table id="" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">S no.</th>
                                    <th class="wd-15p">Email</th>
                                    <th class="wd-15p">Message</th>
                                    <th class="wd-15p">Date</th>
                                    <th class="wd-15p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php $k=1; @endphp
                                @foreach($query as $key => $querys)
                                <tr>
                                    <td>{{$k++ }}</td>
                                    <td>{{$querys->email}}</td>
                                    <td class="message" style="display: flex; flex-wrap:wrap ;">{{Str::limit($querys->message, 30)}}</td>
                                    <td class="">{{$querys->created_at->format('d/m/Y')}}</td>
                                    <td><a class="btn btn-sm btn-secondary" href="{{ route('dashboard.querys.show', $querys->id) }}"><i class="fa fa-eye"></i> </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     <div id="pagination">{{{ $query->links() }}}</div>
                  </div>
                </div>
              </div>
            </div>
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
                    <style type="text/css">
                        .query_box {
                            padding: 10px;
                            background-color: #c7bfbf;
                            border-radius: 13px;
                        }
                        .data {
                            font-family: sans-serif;
                            font-size: smaller;
                        }
                    </style>
                    @endsection