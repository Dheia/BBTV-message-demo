@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/date-picker/spectrum.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />
<style type="text/css">
    .heading_detail {
        color: #000;
        font-weight: 700;
    }

    .parc {
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .parc .pip {
        position: relative;
    }

    span.pip img {
        object-fit: cover;
    }

    .parc .pip .btn {
        position: absolute;
        right: 2px;
        margin-top: 3px;
        background-image: linear-gradient(90deg, #282728 0, #544747);
        height: 20px;
        font-size: smaller;
        min-width: 20px !important;
        line-height: 18px;
        color: #fff;
        padding: 0 !important;
        float: left;
    }

    span.remove-btn {
        position: absolute;
        width: 13px;
        border-radius: 11px;
        height: 13px;
        top: -4px;
        right: 3px;
        z-index: 1;
        text-align: center;
        color: #000000;
        /* background: #10df00; */
    }
</style>
@endsection
@section('page-header')
<!-- PAGE-HEADER -->
<div>
    <h1 class="page-title">{{ $title }}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.models.index') }}">Models</a></li>
       
        <li class="breadcrumb-item active" aria-current="page">Bank Details</li>
     
    </ol>
</div>
<!-- PAGE-HEADER END -->
@endsection
@section('content')
<!-- ROW-1 OPEN-->
<div class="card">
   
        <div class="card-body">
        
            <h3 class="heading_detail">Model Bank Details</h3>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Payble to</label>
                        <input type="text" class="form-control" disabled value="{{$model->payble}}" >
                       
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" disabled value="{{$model->street_address}}" >
                       
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Apartment</label>
                        <input type="text" class="form-control" disabled value="{{$model->apartment_unit}}" >
                       
                    </div>
                </div>
                   <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" disabled value="{{$user->city}}" >
                       
                    </div>
                </div>
                   <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Provience</label>
                        <input type="text" class="form-control" disabled value="{{$model->province}}" >
                       
                    </div>
                </div>
                   <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Zip Code</label>
                        <input type="text" class="form-control" disabled value="{{$model->zip}}" >
                       
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Account Number</label>
                        <input type="text" class="form-control" disabled value="{{$model->account_no}}" >
                       
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Ifsc</label>
                        <input type="text" class="form-control" disabled value="{{$model->ifsc_code}}" >
                       
                    </div>
                </div>
               

           
          
               
                
              
               
           
             
               
               

                
          
          </div> 

@endsection
@section('js')

<script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/date-picker/spectrum.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/time-picker/toggles.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

<script>
    $(document).ready(function() {
            $('#dataTable').DataTable();

        });

        function removeImage(data) {
            console.log(data);
            var inputvalue = $('#gallery_img').val();
            var ary = JSON.parse(inputvalue);
            console.log(ary);

            ary.splice($.inArray(data, ary), 1);
            var asd = JSON.stringify(ary);
            $('.pip[data-title="' + data + '"]').remove();
            $('#gallery_img').val(asd);
        }
</script>
@endsection