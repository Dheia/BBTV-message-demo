@extends('frontend.model.main')
@section('content')

    <style>
        .minus, .plus {
    width: 20px;
    height: 20px;
    background: #747474;
    border-radius: 4px;
    margin: 4px 3px 6px -1px;
    /* padding: 8px 5px 8px 6px; */
    border: 1px solid #c1a9a9;
    display: inline-block;
    vertical-align: middle;
    text-align: center;
    height: 34px;
    width: 50px;
}
.input-price {
    height: 42px;
    width: 100px;
    text-align: center;
    font-size: 26px;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: inline-block;
    vertical-align: middle;
}
        @media only screen and (max-width : 991px) {
        .card img {
    width: 100px;
    height: 100%;
    margin: 10px 0px;
}}
        .tox:not(.tox-tinymce-inline) .tox-editor-header {
            background-color: #112435 !important;
        }
        .img-fluid.user_pro_img.m-0 {
            width: 40px !important;
        }

        .tox .tox-toolbar,
        .tox .tox-toolbar__overflow,
        .tox .tox-toolbar__primary {
            background-color: #112435 !important;
        }

        .tox .tox-tbtn svg {
            display: block;
            fill: #ffffff !important;
        }

        #v_profile {
            color: #a82a95 !important;
        }

        .nav-link.nav_tab:hover small {
            color: rgba(175, 41, 144, 0.8);
        }

        .fa-ellipsis-v:before,
        .fa-ellipsis-vertical:before {
            content: "\f142";
            color: rgba(175, 41, 144, 0.8);
        }
        .feed_mod_header {
     overflow: hidden; 
}
.modal-content.feed_dele_model {
    background: #000810;
}
button.feed_close {
    color: white;
}

input#premium_cost {
    background: #112435;
    /* overflow: hidden !important; */
    color: white;
}
span.minus {
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    color: #fff;
    text-decoration: none;
    padding-top: 2px !important;
    margin-right: -14px;
    z-index: 999;
    height: 29px;
    width: 31px;
}
span.plus {
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    color: #fff;
    text-decoration: none;
    padding-top: 2px !important;
    margin-left: -14px;
    z-index: 999;
    height: 29px;
    width: 31px;
}
.earncount_input_ {
    height: 43px !important;}
    .sub_btn_pop{
         background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    color: #fff !important;
    }
    .col input#upload-img1 {
    display: none !important;
    height: 8px !important;
    overflow: hidden !important;
    width: 27px !important;
}
.my-body-noscroll-class {
    overflow: hidden;
}
#Dreft-feed-edit {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgb(5 13 24 / 60%);
    z-index: 1001;
}
img.feed_media_draft {
    height: 181px;
}
video.feed_video.draft_video {
    height: 175px;
}

/*i.fa-solid.fa-ellipsis-vertical.dots.drafted {
    margin-top: 10px;
}*/
i.fa-solid.fa-ellipsis-vertical.dots {
    position: absolute;
    padding: 4px 11px !important;
    border-radius: 50% !important;
    cursor: pointer;
}
i.fa-solid.fa-ellipsis-vertical.dots:hover{

    background: #1a2b3a !important;
}
label.check_lab {
    margin-top: 3px !important;
}
    </style>

<!-- post delete -->
 <div class="modal fade" id="draft_Modal" tabindex="-1" role="dialog" aria-labelledby="draft_ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content feed_dele_model">
            <div class="modal-header feed_mod_header">
                <button type="button" class="close feed_close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
        <h5 class="text-center text-white">Are you sure you want to delete ?</h5>
            </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit"  class="btn btn-danger delete_feed" value="" data-dismiss="modal"> Delete</button>
    </div>
        </div>
    </div>
</div>
 <div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
        <div class="row mb-4">
            <div class="card col-12">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between">
                        <div class="name">
                            <p class="text_headings">Post to Profile</p>
                        </div>
               
                    </div>
                    <div class="post_img"><img class="img-fluid user_pro_img m-0 "
                            src="@if(!empty(Auth::user()->profile_image)) {{ url('profile-image') . '/' . (Auth::user()->profile_image) }} @else {{ url('profile-image/user.png') }} @endif" alt="" /><small
                            class="ml-3">{{ Auth::user()->first_name }}</small></div>
                    <div class="textarea">

                        <form method="post" action="{{ route('model.feeds.store') }}" enctype="multipart/form-data"
                            id="form_submit">
                            @csrf
                            <div class="form-group">

                                <textarea type="text" name="description" class="form-control mt-4" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="file-upload">
                                    <!-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> -->


                                    <div class="row">
                                        <div class="col">

                                            <div class="form-group mt-2">

                                                <div class="upload_div"> <label class="upload_label" for="upload-img"><i
                                                            class="fa fa-camera" aria-hidden="true"></i> Add Photo, Video,
                                                        Audio</label></div>
                                                <input type="file" class="form-control" accept="video/*,image/*" multiple
                                                    id="upload-img" />
                                            </div>
                                            <span class="images text-danger"></span>
                                            <div class="img-thumbs img-thumbs-hidden" id="img-preview">
                                                <div class="price">
                                                    <div class="number  mt-3 d-flex">
                                                        <span class="minus mb-2">-</span>
                                                        <input name="price" class="input-price" type="text"
                                                            id="premium_cost" value="0.00" />
                                                        <span class="plus ml-1 mb-2">+</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @php
                                        $data = App\Models\ModelFeed::where('model_id', Auth::user()->id)
                                            ->where('explore', '1')
                                            ->where('status', '1')
                                            ->Orderby('id', 'desc')
                                            ->first();
                                    @endphp

                                    @if (!empty($data))
                                        @php
                                            $dt = new DateTime();
                                            $laraveltime = $dt->format('Y-m-d H:i:s');
                                            $date1 = new DateTime($data->schedule_date);
                                            $date2 = new DateTime($laraveltime);
                                            $difference = $date1->diff($date2);
                                            $diffInSeconds = $difference->s; //45
                                            $diffInMinutes = $difference->i; //23
                                            $diffInHours = $difference->h; //8
                                            $diffInDays = $difference->d; //21
                                            $diffInMonths = $difference->m; //4
                                            $diffInYears = $difference->y;
                                            
                                        @endphp
                                        <input class="posttime" type="hidden" value="{{ $data->schedule_date }}">
                                        <input class="laraveltime" type="hidden" value="{{ $laraveltime }}">
                                    @else
                                        @php
                                            $diffInSeconds = '60';
                                            $diffInMinutes = '60';
                                            $diffInHours = '2';
                                            $diffInDays = '2';
                                        @endphp
                                    @endif
                                
                                          
                                    <div class="post_btn  d-flex mr-3 " >
                                        @if ($diffInDays == 0 && $diffInHours <= 1 && $diffInMinutes <= 59 && $diffInSeconds <= 58)
                                            <div class="sec_1 d-flex Available">
                                                <p class="mr-2">Available in</p>
                                                <p id="hours"> </p>
                                                <p id="minutes"> </p>
                                                <p id="seconds"> </p>
                                            </div>
                                        @else
                                            @if(Auth::user()->status=="Inreview") 
                                            <p class="text-grey mt-2">Your account is In review <br> You can't able post to explore</p>
                                            @else
                                            <div class=" sec_1 explore_checkbox ckeckfilter ">
                                                <input type="checkbox" id="checkbox-15" name="explore" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-15"></label>
                                            <p class="text-grey mt-2">Post to Explore </p>
                                            </div>
                                            @endif
                                            
                                        @endif

                                 

                                        <input type="hidden" id="count" value="1" name="save_as_draft">
                                        <div class="time_wrapper">
                                            <label for="">Schedule Time</label>
                                            <div class="schedule_timing d-flex">
                                                <input type="date" name="schedule_date"
                                                    class="form-control schedule_date">
                                                <input type="time" name="schedule_time"
                                                    class=" form-control schedule_time ml-2">
                                            </div>
                                        </div>
                                        <div class="saveasdraft" style="display: none;">
                                            <input type="hidden" name="status" value="1">
                                        </div>
                                        <div class="sec_1">
                                            <button type="submit" class="btn btn-primary post_now sub_btn">Post
                                                Now</button>
                                            <button type="submit" class="btn btn-primary post_draft sub_btn ">Save
                                                Draft</button>
                                            <button type="submit" class="btn btn-primary post_schedule sub_btn">Schedule
                                                Post</button>
                                            <div class="select">
                                                <select class="save_val" id="purpose">
                                                    <option value="2" class="post_now_btn earning-filter-option">Post Now</option>
                                                    <option value="0" class="draft_post earning-filter-option">Save as Draft</option>
                                                    <option value="1" class="schedule_post earning-filter-option">Schedule Post</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
    <div class="col-12  mt-4">
        <div class="">
            <div class="card-body text-white">
                <p class="text_headings">Post to Twitter</p>

                <div class=" d-flex justify-content-between">
                    <p class="text-muted">Connect Your Twitter account to automatically Tweet your Bad Bunnies TV Posts!
                    </p>
                    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=MyPost" data-size="large">  <button class="btn tweet_btn text-white mb-2 "><small><i
                                class="bi bi-twitter"></i>Connect</small></button><a></a>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-6 col-md-12">
                <ul class="nav nav-pills mb-3 justify-content-around" id="pills-tab" role="tablist">
                    <li class="nav-item chat_nav">

                        <a class="nav-link nav_tab active" id="pills-Posted-tab" data-toggle="pill" href="#pills-Posted1"
                            role="tab" aria-controls="pills-Posted" aria-selected="true"> <small>Posted
                                ({{ $feeds_explore1 }})</small></a>
                    </li>
                    <li class="nav-item chat_nav">
                        <a class="nav-link nav_tab" id="pills-Scheduled-tab" data-toggle="pill" href="#pills-Scheduled"
                            role="tab" aria-controls="pills-Scheduled" aria-selected="false">
                            <small>Scheduled ({{ $feeds_schedule1 }})
                            </small></a>
                    </li>
                    <li class="nav-item chat_nav">
                        <a class="nav-link nav_tab" id="pills-Drafts-tab" data-toggle="pill" href="#pills-Drafts"
                            role="tab" aria-controls="pills-Drafts" aria-selected="false">
                            <small>Drafts ({{ $feeds_draft1 }})</small>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- <div class="col-lg-6 col-md-6"></div> --}}
        </div>
        <div class="tab-content" id="pills-tabContent ">
            <div class="tab-pane fade show active modelFeedlist" id="pills-Posted1" role="tabpanel" aria-labelledby="pills-Posted-tab"
                style="color: #fff">

                @if (count($feeds_explore) > 0)
                    @foreach ($feeds_explore as $item)
                    <div class="delele-feed-parent">

                    
                        <div class="card mt-4 deleted_feed">
                            <div class="card-body text-white ">
                                @if (isset($item->pin))
                                    @if ($item->pin == 1)
                                        <a class="pin-icon"><img src="/images/pin-icon.svg" alt="pin"></a>
                                    @endif
                                @endif
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mt-2">
                                        @foreach ($item->feedmedia as $key => $feed_media)
                                            @if ($key == 0)
                                                @if ($feed_media->media_type == 'jpg' or
                                                    $feed_media->media_type == 'png' or
                                                    $feed_media->media_type == 'jpeg' or
                                                    $feed_media->media_type == 'webp' or
                                                    $feed_media->media_type == 'gif')
                                                    <img src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                        style="object-fit: cover;" height="150px" width="150px"
                                                        alt="" />
                                                @endif
                                                @if ($feed_media->media_type == 'mp4')
                                                    <video controls class="feed_video" width="200px" height="160px">
                                                        <source
                                                            src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                            type="video/mp4">
                                                        <source
                                                            src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                            type="video/ogg">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-9 col-md-12 mt-2 feed_details">
                                        <div class="showdata">
                                            <p class="text-muted after_update">
                                                {!! \Illuminate\Support\Str::limit($item->description, 30) !!}
                                            </p>
                                            <div class="d-flex">
                                                <small><a class="post_link" href="">Posted to Feed</a></small>
                                            </div>
                                        </div>
                                   
                                        <div class="d-flex added">
                                           
                                            <div class="updatedata ">
                                                <div class="d-flex">
                                                 
                                                        <input type="hidden" name="id" class="update_feed_id"
                                                            value="{{ $item->id }}">
                                                            <input type="hidden" name="text_area_val" class="text_area_val"
                                                            value="">
                                                        <input type="text" name="title" class="form-control update_feed_textarea" value="{{ strip_tags($item->description) }}" >
                                                        <button class="btn btn-success  ml-2 update_feed " type="submit"
                                                            style="height:35px;">Update</button>
                                                    
                                                </div>

                                            </div>
                                            <i class="fa-solid fa-ellipsis-vertical dots"></i>
                                            <ul class="mydropdown-menu">
                                                <input type="hidden" class="pin_num" value="{{ $item->pin }}">
                                                <input type="hidden" class="feed_id" value="{{ $item->id }}">
                                                <!-- <li><a class="pinPostClass" value="1">Pin Post</a></li> -->
                                                @if ($item->pin == 1)
                                                    <li><a class="pinPostClass" value="{{$item->id}}"> Remove Pin Post</a></li>
                                                @else
                                                    <li><a class="pinPostClass" value="{{$item->id}}">Pin Post</a></li>
                                                @endif
                                                <li><a class="editPostClass">Edit Post</a></li>

                                                <li>
                                                    <button type="submit" class=" dele delete_popup delete_popup_confirm" data-toggle="modal" id="draftButton" data-target="#draft_Modal" value="{{$item->id}}">Delete
                                                        Post</button>
                                                    
                                                </li>

                                            </ul>
                                            
                                        </div>
                                       
                                        <div class="row Feed_row mt-3">
                                            <div class="col-lg-9 col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <p><small>Impressions : </small><b>{{count($item->feedImpressions)}}</b></p>
                                                    <p><small>Price :</small><b>
                                                            @if ($item->price <= 0)
                                                                FREE
                                                            @else
                                                                ${{ $item->price }}
                                                            @endif
                                                        </b></p>
                                                    <p><small>Likes :</small><b>
                                                            {{ count($item->feedmedialikes) }}
                                                        </b></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3"></div>
                                         
                                        </div>

                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-muted">Posted:
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y h:i A') }}</small>
                                            <small>
                                               
                                            <a class="copy_link" id="myInput" onclick="copy('{{ url('/', [Auth::user()->slug ?? ''] ) }}?feed_id={{$item->id}}')">Copy Link </a>
                                                <!-- <input type="hidden" value="{{ url('/' . $item->user->slug) }}"
                                                    id="myInput">
                                                <a class="copy_link" onclick="myFunction()"></a> -->
                                            </small>
                                          
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

                <div id="feed-pin" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Feed pined </span>
                                        </div>
            </div>

            <div class="tab-pane fade  " id="pills-Scheduled" role="tabpanel" aria-labelledby="pills-Scheduled-tab"
                style="color: #fff">
                @if (count($feeds_schedule) > 0)
                    @foreach ($feeds_schedule as $item)
                    <div class="delele-feed-parent">
                        <div class="card mt-4 deleted_feed">
                            <div class="card-body text-white">
                                <div class="row">
                                    <div class="col-lg-3 col-md-2 col-sm-2 gsr d-flex">
                                        @foreach ($item->feedmedia as $feed_media)
                                            @if ($feed_media->media_type == 'jpg' or
                                                $feed_media->media_type == 'png' or
                                                $feed_media->media_type == 'jpeg' or
                                                $feed_media->media_type == 'webp' or
                                                $feed_media->media_type == 'gif')
                                                <img src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                    style="object-fit: cover;" height="150px" width="150px"
                                                    alt="" />
                                            @endif
                                            @if ($feed_media->media_type == 'mp4')
                                                <video controls class="feed_video" width="200px" height="160px">
                                                    <source
                                                        src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                        type="video/mp4">
                                                    <source
                                                        src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                        type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-10">
                                        <div class="d-flex">
                                        <p class="text-muted"> {!! \Illuminate\Support\Str::limit($item->description, 30) !!}</p>
                                           
                                        </div>
                                        <div class="d-flex">
                                            <small><a class="post_link" href="">Posted to Feed</a></small>
                                        </div>
                                        <div class="row Feed_row mt-3">
                                            <div class="col-lg-9 col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <p><small>Impressions :</small><b>136</b></p>
                                                    <p><small>Price :</small><b>
                                                            @if ($item->price <= 0)
                                                                FREE
                                                            @else
                                                                ${{ $item->price }}
                                                            @endif
                                                        </b></p>
                                                    <p><small>Likes :</small><b>
                                                            {{ count($item->feedmedialikes) }}
                                                        </b></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-muted re-scheduled-time">Scheduled:
                                                {{ Carbon\Carbon::parse($item->schedule_date)->format('d/m/Y  h:i A') }}</small>
                                            
                                            <div class="updatedata-scheduled d-none">
                                                <div class="d-flex">
                                                 
                                                    <div class=" d-flex">
                                                    <input type="date" name="schedule_date"
                                                        class="form-control resechedule-date ">
                                                    <input type="time" name="schedule_time"
                                                        class=" form-control ml-2 resechedule-time">
                                                </div>
                                                       
                                                        <button class="btn btn-success  ml-2 update_feed_resechedule " type="submit"
                                                            style="height:35px;" value="{{$item->id}}">Update</button>
                                                    
                                                </div>

                                            </div>
                                            <a class="copy_link" id="myInput" onclick="copy('{{ url('/', [Auth::user()->slug ?? ''] ) }}?feed_id={{$item->id}}')">Copy Link </a>
                                           
                                        </div>
                                    </div>
                                    <div class="d-flex added ">
                                           
                                        
                                        <i class="fa-solid fa-ellipsis-vertical dots drafted mt-2 mr-1"></i>
                                        <ul class="mydropdown-menu">
                                            <input type="hidden" class="feed_id" value="{{ $item->id }}">
                                            <!-- <li><a class="pinPostClass" value="1">Pin Post</a></li> -->
                                              
                                                        <button type="submit" class=" dele delete_popup delete_popup_confirm" data-toggle="modal" id="draftButton" data-target="#draft_Modal" value="{{$item->id}}">Delete
                                                        Post</button>
                                                        <li><a class="re-scheduled">Re Schedule</a></li>
                                                
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    No Scheduled Feed
                @endif
            </div>

            <div class="tab-pane fade  " id="pills-Drafts" role="tabpanel" aria-labelledby="pills-Drafts-tab"
                style="color: #fff">

                @if (count($feeds_draft) > 0)
                    @foreach ($feeds_draft as $item)
                    <div class="delele-feed-parent">
                        <div class="card mt-4 deleted_feed">
                            <div class="card-body text-white">
                                <div class="row">
                                    <div class="col-lg-3 col-md-2">
                                        @foreach ($item->feedmedia as $key => $feed_media)
                                          @if($key==0)
                                          @if ($feed_media->media_type == 'jpg' or
                                                $feed_media->media_type == 'png' or
                                                $feed_media->media_type == 'jpeg' or
                                                $feed_media->media_type == 'webp' or
                                                $feed_media->media_type == 'gif')
                                                <img class="feed_media_draft" src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                    style="object-fit: cover;" height="150px" width="150px"
                                                    alt="" />
                                            @endif
                                            @if ($feed_media->media_type == 'mp4')
                                                <video controls class="feed_video draft_video" width="200px" height="160px">
                                                    <source
                                                        src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                        type="video/mp4">
                                                    <source
                                                        src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}"
                                                        type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                           @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-9 col-md-10">
                                        <div class="d-flex">
                                            <p class="text-muted mt-3"> {!! \Illuminate\Support\Str::limit($item->description, 30) !!}</p>
                                        </div>
                                        <!-- <div class="d-flex">
                                            <small><a class="post_link" href="">Posted to Feed</a></small>
                                        </div> -->
                                        <div class="row  mt-3">
                                            <div class="col-lg-9 col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <!-- <p><small>Impressions :</small><b>136</b></p> -->
                                                    <p><small>Price :</small><b>
                                                            @if ($item->price <= 0)
                                                                FREE
                                                            @else
                                                                ${{ $item->price }}
                                                            @endif
                                                        </b></p>
                                                    <p><small>Likes :</small><b>
                                                            {{ count($item->feedmedialikes) }}
                                                        </b></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3"></div>
                                        </div>
                                        <div class="row Feed_row mt-3">
                                            <div class="col-lg-9 col-md-9">
                                                <div class="d-flex justify-content-between sec_1 explore_checkbox ckeckfilter">
                                              <div class="d-flex"> 
                                                <form action="{{url('model/draft-feed-post-now')}}" method="POST" class="d-flex justify-content-between"> 
                                                    @csrf
                                                    <input type="hidden" value="{{$item->id}}" name="feed_id">
                                                
                                                 <input type="checkbox" id="checkbox-15{{$item->id}}" name="explore" value="1"
                                                    class="filter-checkbox filterbig-checkbox ckeckoutinpt" />
                                                <label for="checkbox-15{{$item->id}} " class="check_lab"></label>
                                                <p class="text-grey ">Post to Explore </p>
                                                <button class="draft-post-now" type="submit">Post Now</button></form>
                                            </div>
                                                

                                                </div>
                                               
                                            </div>
                                            <div class="col-lg-3 col-md-3"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-muted">Posted:
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y  h:i A') }}</small>
                                            <small>
                                            <a class="copy_link" id="myInput" onclick="copy('{{ url('/', [Auth::user()->slug ?? ''] ) }}?feed_id={{$item->id}}')">Copy Link </a>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex added ">
                                           
                                        
                                        <i class="fa-solid fa-ellipsis-vertical dots drafted mt-2 mr-1 "></i>
                                        <ul class="mydropdown-menu">
                                            <input type="hidden" class="pin_num" value="{{ $item->pin }}">
                                            <input type="hidden" class="feed_id" value="{{ $item->id }}">
                                            <!-- <li><a class="pinPostClass" value="1">Pin Post</a></li> -->
                                            
                                            <li><a class="editPostClass edit_draft edit-feed-ajax" onclick="myfunction()" value="{{$item->id}}">Edit Post</a></li>

                                            <li>
                                          
                                                    <button type="submit" class=" dele delete_popup delete_popup_confirm" data-toggle="modal" id="draftButton" data-target="#draft_Modal" value="{{$item->id}}">Delete
                                                        Post</button>
                                                
                                            </li>

                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    No Draft Feed
                @endif
            </div>

        </div>
    </div>

    <div class="modal fade" id="Dreft-feed-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content draft-post-modal-conetent">
     
      <div class="modal-body">
      <div class="textarea " id="popup_post_edit_window">
 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary popup_post_edit_window_close" onclick="closemode()" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary  p-2 sub_btn_pop">Update</button>
      </div>
    </div>
  </div>
</div>

<script>
//     $(function() {
//     $('.edit_draft').click(function() {
//         console.log('shefareshf');
//         $(this).addClass("my-body-noscroll-class");
//     });
// });
function myfunction() {
    console.log('rgspor');
    $('.app').addClass("my-body-noscroll-class");
    
}
function closemode() {
    console.log('oioiuo');
    $('.app').removeClass("my-body-noscroll-class");
    
}
</script>

    </div></div>
    <style>
        .pin-icon img {

            height: 35px;
            width: 33px;
            padding: 5px;
            margin: 0px !important;
        }

        button.dele {
            color: #fff;
            background: transparent;
            border: 0px;
        }

        .card img {
            margin: 0px !important;
        }

        .pin-icon {

            position: absolute;
            z-index: 1;
        }

        .updatedata {
            display: none;
        }

        i.fa-solid.fa-ellipsis-vertical.dots {
    position: absolute;
    right: 7px;
    top: 2px;
    cursor: pointer;
}

        ul.mydropdown-menu {
            display: none;
            z-index: 5;
            right: 11px;
            list-style-type: none;
            background: #232528 !important;
            box-shadow: 0 3px 5px 0 rgb(0 0 0 / 24%);
            top: 15%;
            visibility: visible;
            opacity: 1;
            pointer-events: auto;
            position: absolute;
            padding: 10px 30px 10px 9px;
        }

        ul.mydropdown-menu li {
            cursor: pointer;

        }

        ul.mydropdown-menu li {
            cursor: pointer;
            margin: 9px 0px;
        }

        .card-body.text-white .pin-icon:before {
            width: 0;
            height: 0;
            border-color: #423737e3 transparent transparent #423737e3;
            border-style: solid;
            border-width: 35px;
            position: absolute;
            top: 0;
            left: 0;
            content: "";
            z-index: -1;
        }
    </style>

@endsection
@section('scripts')
    @parent
@endsection
