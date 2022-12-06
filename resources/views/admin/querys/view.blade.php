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

        <li class="breadcrumb-item active" aria-current="page">view</li>

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
                <div class="table-responsive view_tab">
                    <div class="row view_row  ">
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <div><b class="wd-15p ml-4">Id </b></div>
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9">
                           <div><b class="wd-15p ">{{$query->id}}</b></div>
                            </div>
                    </div>
                    <div class="row view_row ">
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <div><b class="wd-15p ml-4">Email </b></div>
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9">
                           <div><b class="wd-15p ">{{$query->email}}</b></div>
                            </div>
                    </div>
                    <div class="row view_row ">
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <div><b class="wd-15p ml-4">Phone </b></div>
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9">
                           <div><b class="wd-15p ">{{$query->phone}}</b></div>
                            </div>
                    </div>

                    <div class="row view_row ">
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <div><b class="wd-15p ml-4 mr-2">Message </b></div>
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9">
                           <div class="mr-2"><b class="wd-15p ">{{$query->message}}</b></div>
                            </div>
                    </div>
                    <div class="row view_row ">
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <div><b class="wd-15p ml-4">Date </b></div>
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9">
                           <div><b class="wd-15p ">{{$query->created_at->format('d/m/Y')}}</b></div>
                            </div>
                    </div>
                        
                    </div>
                    <div class="mt-4">
                        <a  href="{{ route('dashboard.querys.index') }}">
                    <button  class="btn btn-primary">Go back</button>
                    </a>
                    </div>
                    
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
            <style type="text/css">
  .view_tab {
    display: block;
    width: 100%;
    overflow-x: hidden;}
.col-md-9.col-lg-9.col-sm-9 {
    border: 1px solid #d5d9dd;
    padding: 10px;
}
.col-md-3.col-lg-3.col-sm-3 {
    border: 1px solid #d5d9dd;
    padding: 10px 12px 10px 10px;
}    
.table-responsive.view_tab {
    border: 1px solid #d5d9dd;
}        </style>
            @endsection