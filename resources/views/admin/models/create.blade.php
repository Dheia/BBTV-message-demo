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
            @if (isset($model->id))
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
        <form method="post" action="{{ route('dashboard.models.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <input type="hidden" name="id" value="{{ old('id', isset($model->id) ? $model->id : '') }}">
                <input type="hidden" name="userid"
                    value="{{ old('userid', isset($model->users_auto_id) ? $model->users_auto_id : '') }}">
                <h3 class="heading_detail">User Info</h3>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                value="{{ old('first_name', isset($model->first_name) ? $model->first_name : '') }}">
                            <input type="hidden" name="role" value="6">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                value="{{ old('last_name', isset($model->last_name) ? $model->last_name : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" placeholder="DOB"
                                value="{{ old('dob', isset($model->dob) ? $model->dob : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                value="{{ old('email', isset($model->email) ? $model->email : '') }}">
                            @foreach ($errors->all() as $error)
                                <li classs="mt-2" style="color:red;">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Create Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Enter minimum 8 digit password" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone_number" placeholder="Phone number"
                                value="{{ old('phone', isset($model->phoneno) ? $model->phoneno : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Login Phone No.</label>
                            <input type="number" class="form-control" name="loginphone" placeholder="Login Phone number"
                                value="{{ old('phone', isset($model->loginphone) ? $model->loginphone : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Bad Bunnies Phone No.</label>
                            <input type="number" class="form-control" name="bbphone" placeholder="Bad Bunnies Phone number"
                                value="{{ old('phone', isset($model->bbphone) ? $model->bbphone : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select</option>
                              
                                    <option value="USA"
                                        {{ isset($model->country) && $model->country == "USA" ? 'selected' : '' }}>
                                        USA</option>

                                        <option value="CANADA"
                                        {{ isset($model->country) && $model->country == "CANADA" ? 'selected' : '' }}>
                                        CANADA</option>
                                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" placeholder="City"
                                value="{{ old('city', isset($model->city) ? $model->city : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" name="state" placeholder="State"
                                value="{{ old('state', isset($model->state) ? $model->state : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male"
                                    {{ isset($model->gender) && $model->gender == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female"
                                    {{ isset($model->gender) && $model->gender == 'female' ? 'selected' : '' }}>
                                    Female
                                </option>
                                <option value="transgender"
                                    {{ isset($model->gender) && $model->gender == 'transgender' ? 'selected' : '' }}>
                                    Transgender</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Account Status</label>
                           
                            <select name="status" id="role" class="form-control select2">
                                <option value="Active"
                                 @if(isset($model->status) && $model->status == "Active")  selected @endif >Active</option>
                                 <option value="Blocked"
                                 @if(isset($model->status) && $model->status == "Blocked")  selected @endif >Blocked</option>
                                 <option value="Inreview"
                                 @if(isset($model->status) && $model->status == "Inreview")  selected @endif >Inreview</option>
                                
                            </select>
                           
                        @if(session()->has('error'))
                            <p class="text-danger mt-2"> {{ session()->get('error') }} </p>
                        @endif

                           
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Profile Image</label>
                            <input type="file" class="form-control " name="profile_image" id="before_crop_image"
                                value="{{ old('profile_image', isset($model->profile_image) ? $model->profile_image : '') }}">
                               
                        </div>
                        @if (!empty($model->profile_image))
                        <input type="hidden" class="profile_image_remove" name="oldprofile" value="{{$model->profile_image}}" id="">
                            <div class="even" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">

                                <div class="parc">
                                    
                                    <span class="pip" data-title="{{ $model->profile_image }}">
                                        <img src="{{ url('profile-image') . '/' . $model->profile_image ?? '' }}"
                                            alt="" width="100" height="100">
                                       
                                    </span>
                                </div>

                            </div>

                            
                        @endif
                    </div>

                    <!-- Gallery images -->
                    <div class="col-md-12 mt-2">


                        <label class="form-label mt-0">Add Gallery Images</label>
                        <input type="file" class="form-control mb-4" name="gallery_image[]" value="" multiple>
                        @if (!empty($model->gallery_image))
                            @php
                                $value = json_decode($model->gallery_image);
                            @endphp
                            @if (!empty($value))
                                <div class="even" >
                                   <div class="gallary" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                                   @foreach ($value as $multidata)
                                        <div class="parc">
                                            <input type="hidden" name="gallery_images_old[]"  class="gall"
                                            value="{{ $multidata }}">
                                            <span class="pip" data-title="{{ $multidata }}">
                                                <img src="{{ url('gallery images') . '/' . $multidata ?? '' }}"
                                                    alt="" width="100" height="100">
                                                <a class="btn"><i class="fa fa-times remove remove_gallery"
                                                       ></i></a>
                                                      
                                            </span>
                                        </div>
                                        
                                    @endforeach

                                   </div>
                                </div>
                            @endif
                            
                        @endif
                    </div>
                    <!-- Gallery images -->

                </div>
                <hr>
                <h3 class="heading_detail">Basic Info</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group d-flex mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="featured" id="flexCheckDefault1"
                                    value="1" {{ isset($model->id) && $model->featured == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault1">
                                    <h6>Featured</h6>
                                </label>
                            </div>
                            <div class="form-check ml-5">
                                <input class="form-check-input" type="checkbox" value="1"
                                    {{ isset($model->id) && $model->trending == 1 ? 'checked' : '' }} name="trending"
                                    id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">
                                    <h6>Trending</h6>
                                </label>
                            </div>
                            <div class="form-check ml-5">
                                <input class="form-check-input" type="checkbox" value="1"
                                    {{ isset($model->id) && $model->explore == 1 ? 'checked' : '' }} name="explore"
                                    id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">
                                    <h6>Explore</h6>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Allow Phone Call</label>
                            <select name="phone" class="form-control">
                                <option value="">Select</option>
                                <option value="1" {{ isset($model->phone) && $model->phone == 1 ? 'selected' : '' }}>
                                    yes
                                </option>
                                <option value="0" {{ isset($model->phone) && $model->phone == 0 ? 'selected' : '' }}>
                                    No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Allow Video Call</label>
                            <select name="video" class="form-control">
                                <option value="">Select</option>
                                <option value="1" {{ isset($model->video) && $model->video == 1 ? 'selected' : '' }}>
                                    yes
                                </option>
                                <option value="0" {{ isset($model->video) && $model->video == 0 ? 'selected' : '' }}>
                                    No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Stage Name</label>
                            <input type="text" class="form-control" name="stage_name" placeholder="Stage Name"
                                value="{{ old('stage_name', isset($model->stage_name) ? $model->stage_name : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Orientation</label>
                            <select name="orientation" class="form-control">
                                <option value="">Select</option>
                                @if (count($model_orient) > 0)
                                    @foreach ($model_orient as $value)
                                        <option value="{{ $value->id }}"
                                            {{ isset($model->Orientation) && $model->Orientation == $value->id ? 'selected' : '' }}>
                                            {{ $value->title }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Model Category</label>
                            <select name="modelcategory" class="form-control">
                                <option value="">Select</option>
                                @if (count($model_cate) > 0)
                                    @foreach ($model_cate as $cate)
                                        <option value="{{ $cate->id }}"
                                            {{ isset($model->Model_Category) && $model->Model_Category == $cate->id ? 'selected' : '' }}>
                                            {{ $cate->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Ethnicity</label>
                            <select name="ethnicity" class="form-control">
                                <option value="">Select</option>
                                @if (count($model_ethnic) > 0)
                                    @foreach ($model_ethnic as $ethnic)
                                        <option value="{{ $ethnic->id }}"
                                            {{ isset($model->Ethnicity) && $model->Ethnicity == $ethnic->id ? 'selected' : '' }}>
                                            {{ $ethnic->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Language</label>
                            <select name="language" class="form-control">
                                <option value="">Select</option>
                                @if (count($model_lang) > 0)
                                    @foreach ($model_lang as $lang)
                                        <option value="{{ $lang->id }}"
                                            {{ isset($model->Language) && $model->Language == $lang->id ? 'selected' : '' }}>
                                            {{ $lang->title }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Hair</label>
                            <select name="hair" class="form-control">
                                <option value="">Select</option>
                                @if (count($model_hair) > 0)
                                    @foreach ($model_hair as $hair)
                                        <option value="{{ $hair->id }}"
                                            {{ isset($model->Hair) && $model->Hair == $hair->id ? 'selected' : '' }}>
                                            {{ $hair->title }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Fetishes</label>
                            <select name="fetishes" class="form-control">
                                <option value="">Select</option>
                                @if (count($model_fet) > 0)
                                    @foreach ($model_fet as $fet)
                                        <option value="{{ $fet->id }}"
                                            {{ isset($model->Fetishes) && $model->Fetishes == $fet->id ? 'selected' : '' }}>
                                            {{ $fet->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Profile Status</label>
                            <select name="user_status" class="form-control">
                                <option value="">Select</option>
                                <option value="verified"
                                    {{ isset($model->user_status) && $model->user_status == 'verified' ? 'selected' : '' }}>
                                    Verified</option>
                                <option value="unverified"
                                    {{ isset($model->user_status) && $model->user_status == 'unverified' ? 'selected' : '' }}>
                                    Unverified</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Discription</label>
                            <textarea rows="5" class="form-control" name="description">{{ isset($model->discription) ? $model->discription : '' }}</textarea>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">

                        <div class="form-group">

                            <label class="form-label">Tags</label>

                            <select name="tags[]" id="permissions" class="form-control select2" multiple="multiple">

                                @foreach ($tags as $id => $tag)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('tags', [])) || (isset($model_tags) && $model_tags->tags->contains($id)) ? 'selected' : '' }}>
                                        {{ $tag }}</option>
                                @endforeach

                            </select>

                        </div>



                    </div> -->
                </div>
                <hr>
                <h3 class="heading_detail">Url Info</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Url #1</label>
                            <input type="text" class="form-control" name="url1" placeholder="Enter Your First Url"
                                value="{{ old('url1', isset($model->url1) ? $model->url1 : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Url #2</label>
                            <input type="text" class="form-control" name="url2"
                                placeholder="Enter Your Second Url"
                                value="{{ old('url2', isset($model->url2) ? $model->url2 : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Url #3</label>
                            <input type="text" class="form-control" name="url3" placeholder="Enter Your Third Url"
                                value="{{ old('url3', isset($model->url3) ? $model->url3 : '') }}">
                        </div>
                    </div>

                </div>
                <hr>
                <h3 class="heading_detail">Social Links Info</h3>
                <div class="row">
                    @if (isset($model->id))
                        @php
                            $social_link = json_decode($model->socail_links);
                        @endphp
                    @endif
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="link1" placeholder="Enter Twitter Url"
                                value="{{ isset($social_link->twitter) ? $social_link->twitter : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="link2" placeholder="Enter Instagram Url"
                                value="{{ isset($social_link->instagram) ? $social_link->instagram : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Snapchat</label>
                            <input type="text" class="form-control" name="link3" placeholder="Enter Snapchat Url"
                                value="{{ isset($social_link->snapchat) ? $social_link->snapchat : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">SpankPay</label>
                            <input type="text" class="form-control" name="link4" placeholder="Enter SpankPay Url"
                                value="{{ isset($social_link->spankpay) ? $social_link->spankpay : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Website</label>
                            <input type="text" class="form-control" name="link5" placeholder="Enter Website Url"
                                value="{{ isset($social_link->website) ? $social_link->website : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">CamSite</label>
                            <input type="text" class="form-control" name="link6" placeholder="Enter CamSite Url"
                                value="{{ isset($social_link->camsite) ? $social_link->camsite : '' }}">
                        </div>
                    </div>

                </div>
                <hr>
                <h3 class="heading_detail">Cost Info</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Cost per Message</label>
                            <input type="number" class="form-control" name="costmsg" placeholder="Enter Your Cost"
                                value="{{ old('costmsg', isset($model->cost_msg) ? $model->cost_msg : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Cost per Picture</label>
                            <input type="number" class="form-control" name="costpicture" placeholder="Enter Your Cost"
                                value="{{ old('costpicture', isset($model->cost_pic) ? $model->cost_pic : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Cost per Video message</label>
                            <input type="number" class="form-control" name="costvideo_msg"
                                placeholder="Enter Your Cost"
                                value="{{ old('costvideo_msg', isset($model->cost_videomsg) ? $model->cost_videomsg : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Cost per Audio message</label>
                            <input type="number" class="form-control" name="costaudio_msg"
                                placeholder="Enter Your Cost"
                                value="{{ old('costaudio_msg', isset($model->cost_audiomsg) ? $model->cost_audiomsg : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Cost per Audio call</label>
                            <input type="number" class="form-control" name="costaudio_call"
                                placeholder="Enter Your Cost"
                                value="{{ old('costaudio_call', isset($model->cost_audiocall) ? $model->cost_audiocall : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Cost per Video call</label>
                            <input type="number" class="form-control" name="cost_videocall"
                                placeholder="Enter Your Cost"
                                value="{{ old('cost_videocall', isset($model->cost_videocall) ? $model->cost_videocall : '') }}">
                        </div>
                    </div>
                </div>
                <hr>
                <h3 class="heading_detail mt-4">Verification Documents</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Goverment issued ID:</label>
                            <input type="file" class="form-control" name="govt_id" placeholder="Enter Your Cost"
                                value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Your holding ID:</label>
                            <input type="file" class="form-control" name="holding_id" placeholder="Enter Your Cost">
                        </div>
                    </div>





                </div>
                <hr>
                @if (isset($model->id))

                    <h3 class="heading_detail mt-3">Uploaded Documents</h3>
                    <div class="row">
                        <div class="col-md-12">
                            @if (count($model_tags->documents) > 0)
                                <div class="even1" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                                    @foreach ($model_tags->documents as $multidata)
                                        <div class="col-3">

                                            <span class="pip" data-title="{{ $multidata }}">
                                                <span class="remove-btn">


                                                    <a href="{{ route('dashboard.document-delete', $multidata->id) }}"><input
                                                            type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <i class="fa fa-times" aria-hidden="true" type="submit"></i></a>

                                                </span>
                                                <a
                                                    href="{{ url('assets/images/User document') . '/' . $multidata->document }}">
                                                    <img src="{{ url('assets/images/User document') . '/' . $multidata->document }}"
                                                        alt="" width="200" height="140"> </a>

                                            </span>
                                            <!-- <h6 class="mt-2"> {{ $multidata->document_type }}</h6> -->
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h6>No documents uploaded</h6>
                            @endif
                        </div>




                    </div>
                @endif
                @if (isset($model->id))
                    <button class="btn btn-success-light mt-3 " type="submit">Update</button>
                @else
                    <button class="btn btn-success-light mt-3 " type="submit">Save</button>
                @endif
            </div>
        </form>

        @if (isset($model->id))
            @if ($model->status == 'Pending')
                <div class="virify-btn d-flex m-5 mt-3">
                    <form action="{{ route('dashboard.user-verify', $model->users_auto_id) }}" method="POST"
                        onsubmit="return confirm('Are You Sure To Verify This User');" style="display: inline-block;">

                        <input type="hidden" name="_method" value="PUT">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-success-light " type="submit">Verify</button>

                    </form>


                    <button class="btn btn-danger-light ml-3" data-toggle="modal" data-target="#logview"
                        type="submit">Decline</button>


                </div>
            @endif
        @endif

    </div>
    @if (isset($model->id))
        <div class="modal fade" id="logview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <form method="post" action="{{ url('dashboard/model-decline/' . $model->users_auto_id) }}">
                            @csrf

                            <input type="hidden" name="_method" value="PUT">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="mb-5 ml-2">
                                <h5 class="mr-2 mt-3">Enter decline reason</h5>
                                <div class="form-group mr-2">
                                    <input type="hidden" id="block-user-id" value="" name="id">
                                    <textarea name="reason" id="" cols="66" rows="4" placeholder="Enter reason..."></textarea>

                                </div>
                                <button class="btn btn-success-light" type="submit">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endif
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
        
        $('.remove_gallery').on('click', function(e) {

           $(this).closest('.parc').find(".gall").attr("name", "");
   
            $(this).closest('.parc').addClass('d-none');
           

});
$('.remove_profile').on('click', function(e) {

$(".profile_image_remove").attr("value", "");

 $(this).closest('.parc').addClass('d-none');


});
    </script>
@endsection
