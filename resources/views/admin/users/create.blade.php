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
<style type="text/css">
    a#money_reason {
    color: #fff !important;
    text-align: center;
    font-weight: 700;
    background-color: darkgreen;
}
.modal-body sup{
    color: red;
}
</style>
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
        <div>
            <h1 class="page-title">{{$title}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.product.index') }}">user</a></li>
                 @if(isset($user->id))
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                @endif
            </ol>
        </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN-->
        <div class="card">
            <div class="alert alert-success" role="alert" id="successMsg" style="display: none;margin: 20px 20px 0px 20px;" >
              Money Added Successfully
            </div>
            <form  method="post" action="{{route('dashboard.users.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ old('id', isset($user) ? $user->id : '') }}">
                    <div class="row">
                        <input type="hidden" name="profile_image_old" value="{{ isset($user) ? $user->profile_image : ''}}">
                        <div class="col-2 text-center">
                        @if(!empty($user))
                        @if(!empty($user->profile_image))
                        <img src="{{ url('profile-image') . '/' . $user->profile_image ?? '' }}" alt="user-img"
                       class="avatar-xl rounded-circle mt-3">
                       @else
                       <img src="{{ URL::asset('assets/images/users/Untitled-7.png') }}" alt="user-img"
                       class="avatar-xl rounded-circle mt-3">
                       @endif
                        @else
                        <img src="{{ URL::asset('assets/images/users/Untitled-7.png') }}" alt="user-img"
                       class="avatar-xl rounded-circle mt-3">
                        @endif
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <label class="form-label">Profile image</label>
                                <input type="file" class="form-control" name="profile_image" placeholder="First Name" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required>
                                <small class="text-danger">@error('first_name'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" required>
                                <small class="text-danger">@error('last_name'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                                <small class="text-danger">@error('email'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <input type="hidden" name="password" value="{{ isset($user) ? $user->password : '' }}">
                        @if(empty($user))
                       <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" value="{{ isset($user) ? $user->password : '' }}" >
                                <small class="text-danger">@error('password'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob"  value="{{ old('dob', isset($user) ? $user->dob : '') }}" required>
                                <small class="text-danger">@error('dob'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="">Select gender</option>
                                    <option value="male" {{isset($user) && ($user->gender == "male") ? "selected" : ''}}>Male</option>
                                    <option value="female"{{isset($user) && ($user->gender == "female") ? "selected" : ''}}>Female</option>
                                </select>
                                <small class="text-danger">@error('gender'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone"  value="{{ old('phone', isset($user) ? $user->phone : '') }}" required>
                                <small class="text-danger">@error('phone'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">User Status</label>
                                <select name="user_status" class="form-control" required>
                                    <option value="">Select </option>
                                    <option value="verified" {{isset($user) && ($user->user_status == "verified") ? "selected" : ''}}>Verified</option>
                                    <option value="unverified"{{isset($user) && ($user->user_status == "unverified") ? "selected" : ''}}>Unverified</option>
                                </select>
                                <small class="text-danger">@error('user_status'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Role</label>
                                <select name="role" id="role" class="form-control select2">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">@error('role'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" id="role" class="form-control select2">
                                  
                                        <option value="Active" {{ isset($user) && $user->status=='Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Blocked" {{ isset($user) && $user->status=='Blocked' ? 'selected' : '' }}>Blocked</option>
                                  
                                </select>
                                <small class="text-danger">@error('role'){{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Wallet</label>
                                <input type="text" class="form-control wallet" name="wallet" value="{{( isset($user) ? $user->wallet : '0') }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Add Money</label>
                                <a href="#" id="money_reason" class="form-control" data-toggle="modal" data-target="#exampleModal"> ADD</a>
                            </div>
                        </div>
                    </div>
                    
                    @if(isset($user->id))
                        <button class="btn btn-success-light mt-3 " type="submit">Update</button>
                    @else
                        <button class="btn btn-success-light mt-3 " type="submit">Save</button>
                    @endif
                </div>
            </form>
            
        </div> 
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form name="moneyForm" id="moneyForm" action="" >
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Money In user wallet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-label">Add Money <sup>*</sup></label>
                                    <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
                                    <input type="number" class="form-control" id="money" name="money"  value="" >
                                    <input type="hidden" class="form-control" id="type" name="type" value="credit">
                                    <span class="text-danger" id="moneyErrorMsg"></span>
                                    <input type="hidden" name="user_id" id="user_id" value="{{isset($user->id) ? $user->id : ''}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Reason <sup>*</sup></label>
                                    <input type="text" class="form-control" id="reason" name="reason" value="">
                                    <span class="text-danger" id="reasonErrorMsg"></span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea name="desc_Wallet" rows="5" id="description" class="form-control"></textarea>
                                    <span class="text-danger" id="descErrorMsg"></span> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" id="money_ajax">Add Money</button>
                            </div>
                        </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

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
 
@endsection



