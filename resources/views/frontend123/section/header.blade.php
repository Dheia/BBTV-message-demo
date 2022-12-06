  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <nav class="navbar-bg sticky-top">
      <div class="container">
          <div class="navbar-wrapper">
              <a href="{{ url('/') }}">
                  <img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo" class="nav-logo" /></a>

              <div class="serch-wrapper">
                  <input type="text" placeholder="Search for Models and tags" class="serch-input" id="search"
                      autocomplete="off" />
                  <i class="fa fa-search serch-icon" aria-hidden="true"></i>
                  <div class="search-res wrap" id="wrap">
                      <div id="search-box " class="search-box ">
                          <div class="row">

                          </div>

                      </div>
                  </div>

              </div>

              <div class="nav-btnwrapper home_header_join_btn">
                  <a href="{{ route('user-signup') }}">
                      <button class="joinfree-btn" id="navbtns"> Join for free </button></a>
                  @if (isset(Auth::user()->id))
                      <a href="{{ url('/') }}"
                          onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                          <button class="login-btn" id="navbtns">Logout</button>
                          <form id="logout-form" action="{{ route('logout-user') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </a>

                      <i class="fa-solid fa-bars sidebar" onclick="openNav()"></i>
                  @else
                      <a href="{{ route('user-login') }}">
                          <button class="login-btn" id="navbtns">Login</button>
                      </a>

                     
                  @endif

              </div>
              <i class="fa-solid fa-bars sidebar" onclick="openNav()"></i>
          </div>

          <div class="sidelinks-wrapper" id="mySidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

              <div class="wrap-menu">
                  @foreach ($navmenu as $item)
                      <a href="{{ $item->slug }}">
                          <img src="{{ url('home-menu') . '/' . $item->image }}" alt="#" class="mr-1" />
                          {{ $item->title }}</a>
                  @endforeach
                  
                  <li class="sidebar_video_link">
                 <a data-toggle="modal" data-target="#exampleModalCenter2" class="link trigger works">
                      <img src="./image/navicon/How.png" alt="#" class="mr-1" /> 
                      How To Bad Bunnies Tv Works </a> 
                  </li>





              </div>
              <div class="join-btn-wrapepr">
                  <a href="{{ route('user-signup') }}">
                      <button class="joinfree-btn">Join for free</button></a>
                  @if (isset(Auth::user()->id))
                      <a href="{{ url('/') }}"
                          onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                          <button class="login-btn">Logout</button></a>
                      <form id="logout-form" action="{{ route('logout-user') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  @else
                      <a href="{{ route('user-login') }}">
                          <button class="login-btn">Login</button></a>
                  @endif
              </div>
          </div>
          <div class="nav-links-wrapper">
              <ul>
                  @foreach ($navmenu as $item)
                      <a href="{{ $item->slug }}">
                          <li class="{{ url($item->slug) == url(request()->path()) ? 'active' : '' }}">
                              <img src="{{ url('home-menu') . '/' . $item->image }}" alt="#" class="mr-1" />
                              {{ $item->title }}
                          </li>
                      </a>
                  @endforeach

                  <li>
                      <img src="./image/navicon/How.png" alt="#" class="mr-1" />
                    <a  data-toggle="modal" data-target="#exampleModalCenter2"  class="link trigger">How To Bad Bunnies Tv Works</a>
                  </li>


              </ul>
          </div>
      </div>
  </nav>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="
    color: #ffff;
    opacity: 111111111;
">&times;</span>
        </button>
      <div class="modal-body">
                <video width="100%" height="200%" controls="controls" type="video/mp4" preload="none">
            <source src="{{ url('images/logo') . '/' . $logo['Bunnies_tv_work'] }}" autostart="false">
            Your browser does not support the video tag.
            </video>
      <!-- <iframe class="m-0" width="100%" height="200px"
                                  >
                              </iframe> -->
    
    </div>
      </div>
    
    </div>
  </div>






  <style>
      li.sidebar_video_link {
          list-style-type: none;
          text-decoration: none !important;
      }

      a {
          color: #fff;
      }

      a:hover {
          color: #fff;
          text-decoration: none;
      }

      html {
          scroll-behavior: smooth;
      }



      .search-res {
          display: none;
          width: 100%;
          max-height: 270px;
          border-radius: 8px;
          position: absolute;
          background-color: #142639;
          padding: 13px 4px 3px 5px;
          overflow: auto;

      }

      img.search-im {
          border-radius: 22px;
          object-fit: cover;
      }

      .tag {
          color: #c73ca9;
      }






      /* Modals
----------------------------------------------*/
      a.link {
          /* cursor: help; */
          text-decoration: none;
      }

      a.link.btn {
          border-color #d900ae;
      }

     
</style>
