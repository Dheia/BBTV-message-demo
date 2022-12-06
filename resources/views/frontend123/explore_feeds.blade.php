@php
$feedcount = App\Models\Feed_media::where('feed_id', $value->feed_id)->get();
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
    <!-- <div class="col-lg-6 col-md-6 col-sm-12"> -->
    <style>
     
    </style>
    <div class="explore-posts-wraper">
        <div class="expolor-post-wraper">
            <div class="postprofile-wrapper">
                <div class="profile-img-wrapp mr-1">
                    <a href="{{ url('/', [$pupular->user->slug ?? ''] ) }}">
                        <img src="{{ url('profile-image') . '/' . $value->user->profile_image ?? '' }}" alt=""
                            class="postprofile-img" /></a>
                </div>
                <div class="postname-wrapper">
                    <a href="{{ url('/', [$pupular->user->slug ?? ''] ) }}">
                        <span>{{ $value->user->first_name }}
                            {{ $value->user->last_name }}
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

                <div class="post-icon-wrapepr ">
                    @php $likes_count= count($value->feedmedialikes) @endphp
                    <a class="addwish"><i data-id="{{ $value->id ?? '' }}" data-toggle="modal" data-target="#exampleModalCenter3" class="fa fa-heart-o add-to-wishlist"></i>  @if($likes_count>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($likes_count)}} @else 
                 {{$likes_count}}
                 @endif</a>
                    <script src="https://kit.fontawesome.com/d97b87339f.js" crossorigin="anonymous"></script>
                    
                              
                    <div class="added">
                        <i class="fa-solid fa-ellipsis-vertical dots"></i>
                        <ul class="mydropdown-menu" style="display:none;">
                             <li><a class="editPostClass" onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$value->feed_id}}')" style="cursor: pointer;">Copy Link To Post</a></li>
                            <li><a class="editPostClass">Report Post</a></li>
                            </ui>
                    </div>
                    <div id="copied-success" class="copied">
                        <span>Copied!</span>
                        </div>
                </div>
            </div>
            <div class="postimgs-wraper">
                <p>{!! $value->description !!}
                </p>
                <div class="post-img-wrapper">
                    @if ($value->price > 0)
                        <div class="unclock-overlay">
                            <div class="unlock-btn-wrapepr">
                                <i class="fa-solid fa-lock"></i>
                                <button class="unlock-btn" data-target="#exampleModalCenter3">
                                    Unlock for ${{ $value->price }}
                                </button>
                            </div>
                        </div>
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
                <span data-toggle="modal" data-target="#exampleModalCenter3"> <i class="fa fa-plus"></i>Add</span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-phone"></i>Call</span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-video-camera"></i>Video
                </span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-dollar"></i> Tip</span>
            </div>
        </div>
    </div>
@else
    @php
        $pupular = App\Models\ModelFeed::where('id', $value->feed_id)->first();
        
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
    <div class="explore-posts-wraper mb-5">
        <div class="expolor-post-wraper ">
            <div class="postprofile-wrapper">
                <div class="profile-img-wrapp mr-1">
                    <a href="{{ url('/', [$pupular->user->slug ?? ''] ) }}">
                        <img src="{{ url('profile-image') . '/' . $value->user->profile_image ?? '' }}" alt=""
                            class="postprofile-img" /></a>
                </div>
                <div class="postname-wrapper">
                    <a href="{{ url('/', [$pupular->user->slug ?? ''] ) }}">
                        <span>{{ $value->user->first_name }}
                            {{ $value->user->last_name }}
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
                <div class="post-icon-wrapepr ">
                @php $likes_count= count($value->feedmedialikes) @endphp
                    <a class="addwish"><i data-id="{{ $value->id ?? '' }}" data-toggle="modal" data-target="#exampleModalCenter3"
                            class="fa fa-heart-o add-to-wishlist"></i>@if($likes_count>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($likes_count)}} @else 
                 {{$likes_count}}
                 @endif</a>
                    <div class="added">
                        <i class="fa-solid fa-ellipsis-vertical dots"></i>
                        <ul class="mydropdown-menu" style="display:none;">
                           
                            <li><a class="editPostClass" onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$value->feed_id}}')" style="cursor: pointer;">Copy Link To Post</a></li>
                            <li><a class="editPostClass">Report Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="postimgs-wraper">
                <p>{!! $value->description !!}</p>
                <div class="post-img-wrapper">

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
                                            <input type="hidden" name="media_id" value="{{ $value->id }}">
                                            <input type="hidden" name="Model_user_id"
                                                value="{{ $value->user->id }}">
                                            <input type="submit" class="unlock-btn"
                                                data-target="#exampleModalCenter3" value="Unlock">
                                        </form>
                            </div>
                            <div class="unlock-btn-wrapepr locked-text">
                                <i class="fa-solid fa-lock"></i>
                                <button class="unlock-btn unlock_feed" data="{{ $value->price }}"  data-toggle="modal" 
                                    data-target="#exampleModalCenter3" value="{{ $value->id }}">
                                    Unlock for ${{ $value->price }}
                                </button>
                            </div>
                        </div>
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
                <span data-toggle="modal" data-target="#exampleModalCenter3"> <i class="fa fa-plus"></i>Add</span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-phone"></i>Call</span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-video-camera"></i>Video
                </span>
                <span data-toggle="modal" data-target="#exampleModalCenter3"><i class="fa fa-dollar"></i> Tip</span>
            </div>
        </div>
    </div>
    <!-- </div> -->
@endif
