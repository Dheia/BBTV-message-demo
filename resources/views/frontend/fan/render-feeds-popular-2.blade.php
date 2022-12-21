
@foreach ($popularSection as $number => $value)
   @if($number%2 == 0)
      @php
         $pupular = App\Models\ModelFeed::where('id', $value->feed_id)->first();
      @endphp
      @isset($pupular->model_id)
      @php
         $model_contact = App\Models\Contacts::where('fan_id', $auth_id)->where('model_id', $pupular->model_id)->count();
         $feedCollection = App\Models\Collection::where('fan_id', $auth_id)->where('feed_id', $value->feed_id)->count();
         $Auth_feed = App\Models\Model_feed_likes::where('user_id', $auth_id)->where('feed_id', $value->feed_id)->count();
         $dt = new DateTime();
         $laraveltime = $dt->format('Y-m-d H:i:s');
         $date1 = new DateTime($pupular->schedule_date);
         $date2 = new DateTime($laraveltime);
         $difference = $date1->diff($date2);
         $diffInSeconds = $difference->s; //45
         $diffInMinutes = $difference->i; //23
         $diffInHours = $difference->h; //8
         $diffInDays = $difference->d; //21
         $diffInMonths = $difference->m; //4
         $diffInYears = $difference->y;
      @endphp
      <div class="explore-posts-wraper mb-5">
         <div class="expolor-post-wraper">
            <div class="postprofile-wrapper">
               <div class="profile-img-wrapp mr-1">
                  <a href="{{ url('/', [$pupular->user->slug]) }}">
                     <img src="{{ url('profile-image') . '/' . $pupular->user->profile_image ?? '' }}" alt="" class="postprofile-img" />
                  </a>
               </div>
               <div class="postname-wrapper ml-3">
                  <a href="{{ url('/', [$pupular->user->slug]) }}">
                     {{ $pupular->user->first_name }} {{ $pupular->user->last_name }}
                     @if ($pupular->user->user_status == 'verified')
                     <i class="fa fa-check-circle"></i>
                     @endif
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
                  <a class="addwish "><i
                     data-id="{{ $value->id ?? '' }}"
                     class=" add-to-wishlist addLike mr-1 @if ($Auth_feed > 0) feed_liked fa fa-heart @else fa fa-heart-o @endif"
                     feed_id="{{ $value->feed_id }}">
                  </i><span
                     class="LikesOnFeed">@if($value->number>999) {{app(\App\Http\Controllers\frontend\model\FeedsController::class)->likesCounter($value->number)}} @else 
                  {{$value->number}}
                  @endif</span></a>
                  <div class="added">
                     <i
                        class="fa-solid fa-ellipsis-vertical dots"></i>
                     <ul class="mydropdown-menu">
                        @if ($pupular->price <= 0)
                        <li class="feed-menu"> <div 
                           class="add-collection-ajax" value="{{$pupular->id}}">@if($feedCollection<'1') Add To
                           Collection @else Added To Collection @endif</div>
                        </li>
                        @endif
                        <li class="feed-menu"><a class="editPostClass CopyLink" data="{{ url('/', [$pupular->user->slug]) }}"
                           style=" cursor: pointer; " onclick="copy('{{ url('/', [$pupular->user->slug ?? ''] ) }}?feed_id={{$pupular->id}}')">Copy Link To Post</a>
                        </li>
                        <div id="copied-success" class="copied">
                           <span>Copied!</span>
                        </div>
                        <li class="feed-menu"><a class="editPostClass report_post"
                           data="{{ $pupular->id }}"
                           data-toggle="modal"
                           data-target="#PostReport"
                           style=" cursor: pointer; ">Report
                           Post</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="postimgs-wraper">
               <p>{!! $pupular->description !!}</p>
               <div class="post-img-wrapper">
                  @if(count($pupular->feedmedia)<=1)
                  @foreach ($pupular->feedmedia as $item)
                  @if ($item->media_type == 'png' or
                  $item->media_type == 'jpg' or
                  $item->media_type == 'jpeg' or
                  $item->media_type == 'jpeg' or
                  $item->media_type == 'webp')
                  <img src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                     alt="" />
                  @endif
                  @if ($item->media_type == 'mp4')
                  <video width="320" height="240"
                     controls>
                     <source
                        src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                        type="video/mp4">
                     <source
                        src="{{ url('images/Feed_media') . '/' . $item->medai ?? '' }}"
                        type="video/ogg">
                     Your browser does not support the video
                     tag.
                  </video>
                  @endif
                  @endforeach
                  @else
                  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                     <!-- Indicators -->
                     <ol class="carousel-indicators">
                        @foreach ($pupular->feedmedia as $valu)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                           class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                     </ol>
                     <!-- Wrapper for slides -->
                     <div class="carousel-inner">
                        @foreach ($pupular->feedmedia as $item)
                        <div class="item {{ $loop->first ? 'active' : '' }}">
                           @if ($item->media_type == 'jpg' or
                           $item->media_type == 'png' or
                           $item->media_type == 'jpeg' or
                           $item->media_type == 'gif')
                           <img class="expolor-img curouel-img-item"
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
                     <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                     <span class="glyphicon glyphicon-chevron-left"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                     <span class="glyphicon glyphicon-chevron-right"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
                  @endif
               </div>
               <div class="send-mess d-flex">
                  <div  class="emoji-btn"><i class="fa fa-smile-o emoji-button"  aria-hidden="true"></i></div>
                     <input type="text " id="emoji-picker" value="" placeholder="Send a message for "
                        class="postinput emoji-picker-input" />
                     <button type="button" 
                        class="model-contect-btn send-msg send-message-to-feed" value="{{$pupular->user->id}}"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
               </div>
            </div>
            <div class="tips-add-icon-wrapper">
               @if ($model_contact <= 0)
               <a
                  href="{{ url('fan/add-contact', [$pupular->model_id]) }}">
               <span data-toggle="modal"
                  data-target="#exampleModalCenter3"> <i
                  class="fa fa-plus"></i>Add</span></a>
               @endif
               <span data-toggle="modal"
                  data-target="#exampleModalCenter3"><i
                  class="fa fa-phone"></i>Call</span>
               <span data-toggle="modal"
                  data-target="#exampleModalCenter3"><i
                  class="fa fa-video-camera"></i>Video
               </span>
               <span class="Tip_model_id" data-toggle="modal"
                  data-target="#TipPoPup"
                  data="{{ $pupular->user->id }}"> <i
                  class="fa fa-dollar"></i> Tip</span>
            </div>
         </div>
      </div>
      @endisset
   @endif
@endforeach
                                    