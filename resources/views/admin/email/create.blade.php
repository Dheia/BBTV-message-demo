@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<style type="text/css">
    a#money_reason {
        color: #fff !important;
        text-align: center;
        font-weight: 700;
        background-color: darkgreen;
    }

    .modal-body sup {
        color: red;
    }


    input[type="checkbox"]::before {
        /* ...existing styles */

        transform-origin: bottom left;
        clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
</style>
@endsection
@section('page-header')

@endsection
@section('content')
<!-- ROW-1 OPEN-->
@if (\Session::has('error'))
<div class="alert alert-danger">

    <span>{!! \Session::get('error') !!}</span>

</div>
@endif
@if (\Session::has('success'))
<div class="alert alert-success">

    <span>{!! \Session::get('success') !!}</span>

</div>
@endif
<div class="card">

    <div class="alert alert-success" role="alert" id="successMsg" style="display: none;margin: 20px 20px 0px 20px;">
        Money Added Successfully
    </div>
    <form method="post" action="{{route('dashboard.email-marketing.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body d-flex">
            <div class="ckeckfilter">
                <input type="checkbox" id="checkbox-2-11" name="allfan" value="1"
                    class="filter-checkbox filterbig-checkbox filter female mt-2" />
                <label for="checkbox-2-11"></label>
                All Fans
            </div>
            <div class="ckeckfilter ml-5">
                <input type="checkbox" id="checkbox-2-11" name="allmodel" value="1"
                    class="filter-checkbox filterbig-checkbox filter female mt-2" />
                <label for="checkbox-2-11"></label>
                All Model
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">

                <label class="form-label">Users</label>

                <select name="users[]" id="permissions" class="form-control select2" multiple="multiple">
                    @foreach($user as $key => $value)
                    <option value="{{$value->email}}">{{$value->email}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12 p-0">
                <h3 class="card-title">Message Content</h3>
            </div>
            <div class="card-body pr-0 pl-0">
                <div id="summernote"></div>
            </div>
        </div>


        <button class="btn btn-success-light mt-3 ml-5 mb-3 " type="submit">Send Mail</button>
    </form>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ URL::asset('assets/js/summernote.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>
<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
</script>
<script type="text/javascript">
    $('#money_ajax').on('click',function(e){
    e.preventDefault();
    let user_id = $('#user_id').val();
    let money = $('#money').val();
    let reason = $('#reason').val();
    let discription = $('#description').val();
    let type = $('#type').val();
    
    $.ajax({
      url: "{{route('dashboard.store-transection')}}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        user_id:user_id,
        money:money,
        reason:reason,
        discription:discription,
        type:type,
      },
      success:function(response){
        // location.reload();
        $('#successMsg').show();
        setTimeout(function() { 
            $("#successMsg").hide(); 
        }, 5000);
        $('#exampleModal').modal('hide');
        document.getElementById("moneyForm").reset(); 
        $('.wallet').val(response.amount);
      },
      error: function(response) {
        $('#moneyErrorMsg').text(response.responseJSON.errors.money);
        $('#reasonErrorMsg').text(response.responseJSON.errors.reason);
        $('#descErrorMsg').text(response.responseJSON.errors.discription);
      },
      });
    });
</script>


<script>
    $('document').ready(function() {
   
   
   
       $('.note-codable').attr('name', 'content');
   
   
   
       var pre_editor_val = $('input[name="content"]').val();
   
   
   
       $('textarea[name="content"]').val(pre_editor_val);
   
   
   
       $('.note-editable.card-block').html(pre_editor_val);
   
   
   
       $('button[type="submit"]').click(function(editor_val){
   
   
   
           if(!jQuery('.codeview').lenght){
   
   
   
               var editor_val = $('.note-editable.card-block').html();
   
   
   
               $('textarea[name="content"]').val(editor_val);
   
   
   
           }
   
   
   
       });
   
   
   
     });
     var maxGroup = 100;
     $(".addMore").click(function(){
       if($('body').find('.fieldGroup').length < maxGroup){
           var fieldHTML = '<div class="fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
           $('body').find('.fieldGroup:last').after(fieldHTML);
       }else{
           alert('Maximum '+maxGroup+' groups are allowed.');
       }
   });
   $("body").on("click",".remove",function(){
       $(this).parents(".fieldGroup").remove();
   });
   
   
   var maxGroup = 100;
   $(".addMore1").click(function(){
     if($('body').find('.fieldGroup1').length < maxGroup){
         var fieldHTML = '<div class="fieldGroup1">'+$(".fieldGroupCopy1").html()+'</div>';
         $('body').find('.fieldGroup1:last').after(fieldHTML);
     }else{
         alert('Maximum '+maxGroup+' groups are allowed.');
     }
   });
   $("body").on("click",".remove1",function(){
     $(this).parents(".fieldGroup1").remove();
   });
   $("body").on("click",".remove_old_category",function(){
     $(this).parents(".fieldGroup1").remove();
   });
   $("body").on("click",".remove_old_slider",function(){
     $(this).parents(".fieldGroup").remove();
   });
</script>



@endsection