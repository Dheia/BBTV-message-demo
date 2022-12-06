@extends('frontend.main')
@section('content')
    <!-- online wrapper start -->
    <div class="onlinewrapp-bg">
      <div class="container">
        <div class="onlinepage-hading-wrapp">
        <h1>Trending <b>Models</b> <span>( {{$trendingcount}} Available ) </span></h1>
          <div>
            <select class="recentoption">
              <option>Recently Active</option>
              <option>Active</option>
            </select>

            <button class="filterbtn">
              <i class="fa-solid fa-sliders"></i>
            </button>
          </div>
        </div>
        <div>
          <div class="OnlineNow-wrappers">
            <div class="Online-now-wrapp">
                @foreach($trendingmodel as $item)
              <div class="onlinenow-model-wrapper">
                <div class="first-col-wrapper">
                <img class="model-img" src="{{ url('profile-image') . '/' . $item->profile_image }}"
                                    alt="Model-Image">
                  <div class="col-overlay"></div>
                  <label class="online-dot"></label>
                  <label class="new-label">New</label>
                  <div class="colname-wrapper">
                  <label class="colname">{{$item->first_name}}</label>
                        <span class="colcost">${{$item->cost_msg}} per message</span>
                  </div>
                </div>
              </div>
              @endforeach
             
              
            </div>
          </div>
        </div>
        <div id="pagination">{{{ $trendingmodel->links() }}}</div>
        <!-- pagenation start -->
        <div class="pagination">
          <div class="pagination-wrapp">
            <button class="btn"><i class="fa fa-chevron-left"></i></button>
            <div class="pages">
              <a class="page">1</a>
              <a class="page">2</a>
              <a class="page active">3</a>
              <a class="page">4</a>
              <a class="page">5</a>
              <a class="page">6</a>
              <a class="page">...</a>
              <a class="page">23</a>
            </div>
            <button class="btn">
              <i class="fa fa-chevron-right"></i>
            </button>
          </div>
        </div>
        <!-- pagenation end -->
      </div>
    </div>

    <!-- online wrapper end -->
@endsection
@section('scripts')
    @parent
@endsection
