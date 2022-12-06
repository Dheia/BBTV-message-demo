@php
$feedcount = App\Models\Feed_media::where('feed_id', $value->feed_id)->get();
$unlock_feed_check = App\Models\Feed_unlock::where('fan_id', $auth_id)
    ->where('model_id', $value->model_id)
    ->where('feed_id', $value->feed_id)
    ->count();
$model_contact = App\Models\Contacts::where('fan_id', $auth_id)
    ->where('model_id', $value->model_id)
    ->count();
$feedmedialikes = App\Models\Model_feed_likes::where('feed_id', $value->feed_id)->count();
$Auth_feed = App\Models\Model_feed_likes::where('user_id', $auth_id)
    ->where('feed_id', $value->feed_id)
    ->count();
@endphp

@if (count($feedcount) > 1)
    @php
        $total = count($explore);
        $pupular = App\Models\ModelFeed::where('id', $value->feed_id)->first();
        $dt = new DateTime();
        
        $laraveltime = $dt->format('Y-m-d H:i:s');
        $date1 = new DateTime($value->schedule_date);
        $date2 = new DateTime($laraveltime);
        $difference = $date1->diff($date2);
        $diffInSeconds = $difference->s; //45
        $diffInMinutes = $difference->i; //23
        $diffInHours = $difference->h; //8
        $diffInDays = $difference->d; //21
        $diffInMonths = $difference->m; //4
        $diffInYears = $difference->y;
    @endphp
    <style>
        ul.mydropdown-menu {
            display: none;
            z-index: 5;
            right: 37px;
            list-style-type: none;
            background: #232528 !important;
            box-shadow: 0 3px 5px 0 rgb(0 0 0 / 24%);
            visibility: visible;
            opacity: 1;
            pointer-events: auto;
            position: absolute;
            padding: 10px 30px 10px 9px;
        }

        .feed_liked {
            color: red !important;
        }

        .addLike {
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            /* background-color: #fff; */
            background-clip: padding-box;
            border: 1pxsolidrgba(0, 0, 0, .2);
            border-radius: 0.3rem;
            outline: 0;
            background: linear-gradient(to left, #0f1e2e 0%, #0f1e2e 100%) !important;
            border: none;
        }

        .tipoption {
            cursor: pointer;
            border: 1px solid;
            height: 40PX;
            width: 40PX;
            text-align: center;
            border-radius: 21px;
            /* padding: 9px 4px; */
            padding-top: 9px;
            margin-top: 6px;
            margin-right: 16px;

        }

        .modal-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            color: white !important;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
            color: #000;
        }
    </style>
    <!-- <div class="col-lg-6 col-md-6 col-sm-12"> -->
    <div class="explore-posts-wraper mt-5">
        <p class="d-none copyTo"></p>
        <div class="expolor-post-wraper ">
            <div class="postprofile-wrapper">
                <div class="profile-img-wrapp mr-1">
                    <a href="{{ url('/', [$pupular->user->slug]) }}">
                        <img src="{{ url('profile-image') . '/' . $value->user->profile_image ?? '' }}" alt=""
                            class="postprofile-img" /></a>
                </div>
                <div class="postname-wrapper">
                    <a href="{{ url('/', [$pupular->user->slug]) }}">
                        <span>{{ $value->user->first_name ?? '' }}
                            {{ $value->user->last_name ?? '' }}
                            @if ($value->user->user_status == 'verified')
                                <i class="fa fa-check-circle"></i>
                            @endif
                        </span>
                    </a>
                    <small>
                        @if ($diffInYears < 1)
                            @if ($diffInMonths < 1)
                                @if ($diffInDays < 1)
                                    @if ($diffInHours < 1)
                                        {{ $diffInMinutes }} min ago
                                    @else
                                        {{ $diffInHours }} hr
                                        {{ $diffInMinutes }} min ago
                                    @endif
                                @else
                                    {{ $diffInDays }} Days Ago
                                @endif
                            @else
                                {{ $diffInMonths }} Months Ago
                            @endif
                        @else
                            {{ $diffInYears }} Years Ago
                        @endif
                    </small>
                </div>

                <div class="post-icon-wrapepr added">
                    {{-- <a class="addwish "><i data-id="{{ $value->id ?? '' }}" class="fa fa-heart-o add-to-wishlist">
                        </i>{{ count($value->feedmedialikes) }}</a> --}}
                    <a class="addwish ">
                        <i data-id="{{ $value->id ?? '' }}"
                            class="fa add-to-wishlist addLike mr-3 @if ($Auth_feed > 0)fa-heart feed_liked @else fa-heart-o @endif"
                            feed_id="{{ $value->feed_id }}">
                        </i>
                        
                        <span class="LikesOnFeed">  @if($feedmedialikes>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($feedmedialikes)}} @else 
                 {{$feedmedialikes}}
                 @endif</span></a>

                    <div class="added">

                        <i class="fa-solid fa-ellipsis-vertical dots"></i>
                        <ul class="mydropdown-menu">
                            <!-- @if ($value->price <= 0)
                                <li> <a href="{{ url('fan/add-collection', [$value->feed_id]) }}"
                                        value="{{ $value->id }}" class="editPostClass">Add To Collection</a></li>
                            @endif -->
                            <li><a class="editPostClass CopyLink" data="{{ url('/', [$pupular->user->slug]) }}"
                                    style=" cursor: pointer; " onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$value->feed_id}}')">Copy Link To Post</a></li>
                            <li><a class="editPostClass report_post" data="{{ $value->feed_id }}" data-toggle="modal"
                                    data-target="#PostReport" style=" cursor: pointer; ">Report Post</a></li>
                        </ul>
                        <div id="copied-success" class="copied">
                                <span>Copied!</span>
                                </div>
                    </div>
                </div>
            </div>
            <div class="postimgs-wraper">
                <p>{!! $value->description !!}</p>
                <div class="post-img-wrapper">
                    @if ($unlock_feed_check <= 0)
                        @if ($value->price > 0)
                            <div class="unclock-overlay">
                                <div class="unlock-btn-wrapepr unlock-text text-center " style="display:none;">
                                    <h5>
                                        Confirm Unlock for ${{ $value->price }}
                                        <span>Once you have unlocked this media,<br>it is available in your
                                            Collection.</span>
                                        <h5>
                                            <form action="{{ url('fan/feed-unlock') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="media_id" value="{{ $value->feed_id }}">
                                                <input type="hidden" name="Model_id" value="{{ $value->model_id }}">
                                                <input type="submit" class="unlock-btn"
                                                    data-target="#exampleModalCenter3" value="Unlock">
                                            </form>
                                </div>
                                <div class="unlock-btn-wrapepr locked-text">
                                    <i class="fa-solid fa-lock"></i>
                                    <button class="unlock-btn unlock_feed" data="{{ $value->price }}"
                                        data-target="#exampleModalCenter3" value="{{ $value->id }}">
                                        Unlock for ${{ $value->price }}
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach ($feedcount as $valu)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach ($feedcount as $item)
                                <div class="item {{ $loop->first ? 'active' : '' }}">
                                    @if ($item->media_type == 'jpg' or
                                        $item->media_type == 'png' or
                                        $item->media_type == 'jpeg' or
                                        $item->media_type == 'gif')
                                        <img class="expolor-img"
                                            src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                            alt="" />
                                    @endif
                                    @if ($item->media_type == 'mp4')
                                        <video width="320" height="240" controls>
                                            <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                type="video/mp4">
                                            <source src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                                                type="video/ogg">
                                            Your browser does not support the video
                                            tag.
                                        </video>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="input-group d-flex">
                    <input type="text" placeholder="Send a message for ${{ $value->model->cost_msg }}"
                        class="postinput" />
                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter3"
                        class="model-contect-btn send-msg"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="tips-add-icon-wrapper">
                @if ($model_contact <= 0)
                    <a href="{{ url('fan/add-contact', [$value->model_id]) }}"> <span data-toggle="modal"
                            data-target="#exampleModalCenter3"> <i class="fa fa-plus"></i>Add</span></a>
                @endif

                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-phone"></i>Call</span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-video-camera"></i>Video
                </span>
                <span class="Tip_model_id" data-toggle="modal" data-target="#TipPoPup"
                    data="{{ $value->model_id }}"> <i class="fa fa-dollar"></i> Tip</span>
            </div>
        </div>
    </div>
    <!-- </div> -->
@else
    @php
        $pupular = App\Models\ModelFeed::where('id', $value->feed_id)->first();
        $unlock_feed_check = App\Models\Feed_unlock::where('fan_id', $auth_id)
            ->where('model_id', $value->model_id)
            ->where('feed_id', $pupular->id)
            ->count();
        $model_contact = App\Models\Contacts::where('fan_id', $auth_id)
            ->where('model_id', $value->model_id)
            ->count();
        $feedmedialikes = App\Models\Model_feed_likes::where('feed_id', $value->feed_id)->count();
        $Auth_feed = App\Models\Model_feed_likes::where('user_id', $auth_id)
            ->where('feed_id', $value->feed_id)
            ->count();
        $total = count($explore);
        $dt = new DateTime();
        $laraveltime = $dt->format('Y-m-d H:i:s');
        $date1 = new DateTime($value->schedule_date);
        $date2 = new DateTime($laraveltime);
        $difference = $date1->diff($date2);
        $diffInSeconds = $difference->s; //45
        $diffInMinutes = $difference->i; //23
        $diffInHours = $difference->h; //8
        $diffInDays = $difference->d; //21
        $diffInMonths = $difference->m; //4
        $diffInYears = $difference->y;
    @endphp
    <!-- <div class="col-lg-6 col-md-6 col-sm-12"> -->
    <div class="explore-posts-wraper mt-5">

        <div class="expolor-post-wraper ">
            <div class="postprofile-wrapper">
                <div class="profile-img-wrapp mr-1">
                    <a href="{{ url('/', [$pupular->user->slug]) }}">
                        <img src="{{ url('profile-image') . '/' . $value->user->profile_image ?? '' }}"
                            alt="" class="postprofile-img" /></a>
                </div>
                <div class="postname-wrapper">
                    <a href="{{ url('/', [$pupular->user->slug]) }}">

                        <span>{{ $value->user->first_name ?? '' }}
                            {{ $value->user->last_name ?? '' }}
                            @if ($value->user->user_status == 'verified')
                                <i class="fa fa-check-circle"></i>
                            @endif
                        </span>
                    </a>
                    <small>
                        @if ($diffInYears < 1)
                            @if ($diffInMonths < 1)
                                @if ($diffInDays < 1)
                                    @if ($diffInHours < 1)
                                        {{ $diffInMinutes }} min ago
                                    @else
                                        {{ $diffInHours }} hr
                                        {{ $diffInMinutes }} min ago
                                    @endif
                                @else
                                    {{ $diffInDays }} Days Ago
                                @endif
                            @else
                                {{ $diffInMonths }} Months Ago
                            @endif
                        @else
                            {{ $diffInYears }} Years Ago
                        @endif
                    </small>
                </div>
                <div class="post-icon-wrapepr">
                    {{-- <a class="addwish"><i data-id="{{ $value->id ?? '' }}"
                            class="fa fa-heart-o add-to-wishlist"></i>{{ count($value->feedmedialikes) }}</a> --}}
                    <a class="addwish ">
                    <i
data-id="{{ $value->id ?? '' }}"
class=" add-to-wishlist addLike mr-3 @if ($Auth_feed > 0) feed_liked fa fa-heart @else fa fa-heart-o @endif"
feed_id="{{ $value->feed_id }}">
</i><span class="LikesOnFeed"> @if($feedmedialikes>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($feedmedialikes)}} @else 
                 {{$feedmedialikes}}
                 @endif</span></a>
                    <div class="added">
                        <i class="fa-solid fa-ellipsis-vertical dots"></i>
                        <ul class="mydropdown-menu">
                            <!-- @if ($value->price <= 0)
                                <li> <a href="{{ url('fan/add-collection', [$value->feed_id]) }}"
                                        value="{{ $value->id }}" class="editPostClass">Add To Collection</a></li>
                            @endif -->
                            <!-- <li><a class="editPostClass CopyLink" data="{{ url('/', [$pupular->user->slug]) }}"
                                    style=" cursor: pointer; " onclick="copy('.copyTo')">Copy Link To Post</a></li> -->
                                    <li><a class="editPostClass" onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$value->feed_id}}')" style="cursor: pointer;">Copy Link To Post</a></li>
                            <li><a class="editPostClass report_post" data="{{ $value->feed_id }}"
                                    data-toggle="modal" data-target="#PostReport" style=" cursor: pointer; ">Report
                                    Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="postimgs-wraper">
                <p>{!! $value->description !!}</p>
                <div class="post-img-wrapper">
                    @if ($unlock_feed_check <= 0)
                        @if ($value->price > 0)
                            <div class="unclock-overlay">
                                <div class="unlock-btn-wrapepr unlock-text text-center " style="display:none;">
                                    <h5>
                                        Confirm Unlock for ${{ $value->price }}
                                        <span>Once you have unlocked this media,<br>it is available in your
                                            Collection.</span>
                                        <h5>
                                            <form action="{{ url('fan/feed-unlock') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="media_id" value="{{ $value->feed_id }}">
                                                <input type="hidden" name="Model_id"
                                                    value="{{ $value->model_id }}">
                                                <input type="submit" class="unlock-btn"
                                                    data-target="#exampleModalCenter3" value="Unlock">
                                            </form>
                                </div>
                                <div class="unlock-btn-wrapepr locked-text">
                                    <i class="fa-solid fa-lock"></i>
                                    <button class="unlock-btn unlock_feed" data="{{ $value->price }}"
                                        data-target="#exampleModalCenter3" value="{{ $value->id }}">
                                        Unlock for ${{ $value->price }}
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if ($value->media_type == 'jpg' or
                        $value->media_type == 'png' or
                        $value->media_type == 'jpeg' or
                        $value->media_type == 'gif')
                        <img class="expolor-img" src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                            alt="" />
                    @endif
                    @if ($value->media_type == 'mp4')
                        <video width="320" height="240" controls>
                            <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                                type="video/mp4">
                            <source src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                                type="video/ogg">
                            Your browser does not support the video
                            tag.
                        </video>
                    @endif
                </div>
                <div class="input-group d-flex">
                    <input type="text" placeholder="Send a message for ${{ $value->model->cost_msg }}"
                        class="postinput" />
                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter3"
                        class="model-contect-btn send-msg"><i class="fa fa-paper-plane"
                            aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="tips-add-icon-wrapper">
                @if ($model_contact <= 0)
                    <a href="{{ url('fan/add-contact', [$value->model_id]) }}"> <span data-toggle="modal"
                            data-target="#exampleModalCenter3"> <i class="fa fa-plus"></i>Add</span></a>
                @endif

                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-phone"></i>Call</span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-video-camera"></i>Video
                </span>
                <span class="Tip_model_id" data-toggle="modal" data-target="#TipPoPup"
                    data="{{ $value->model_id }}"> <i class="fa fa-dollar"></i> Tip</span>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <div class="modal fade" id="TipPoPup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title color-white" id="exampleModalLongTitle">Send a tip<br>
                        <div class="tip_option d-flex">
                            <div class="tipoption "value="1">$1</div>
                            <div class="tipoption " value="5">$5</div>
                            <div class="tipoption" value="10">$10</div>
                            <div class="tipoption" value="20">$20</div>
                            <div class="tipoption" value="50">$50</div>
                            <div class="tipoption" value="100">$100</div>
                        </div>
                    </h5>

                    <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('fan/model-tip') }}" method="post">
                        @csrf
                        <label for="">Tip Amount</label>
                        <input type="number" name="tip_amount" class="form-control tip_amount" value=""
                            placeholder=" Enter Tip amount $1-999" required min="1" max="999">
                        <label for="" class="mt-2">What is this for?</label>
                        <input type="text" class="form-control" name="tip_mess" placeholder="What is this for?"
                            required>
                        <input type="hidden" class="tip_model_id" name="model_id" value="" required>

                </div>
                <div class="modal-footer">

                    <button type="submit" class="send-tip-btn">Send Tip</button> </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="PostReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h4 class="modal-title color-white" id="exampleModalLongTitle">Why are you reporting this post?
                    </h4>

                    <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('fan/report-post') }}" method="post">
                        @csrf
                        <label for="">Reason</label>
                        <textarea name="post_report_reason" class="form-control" id="" cols="5" rows="10"
                            placeholder="Reason" required></textarea>
                        <input type="hidden" name="feed_id" value="" class="report_feed_id">
                </div>
                <div class="modal-footer">

                    <button type="submit" class="send-tip-btn">Submit</button> </form>
                </div>
            </div>
        </div>
    </div>
@endif
