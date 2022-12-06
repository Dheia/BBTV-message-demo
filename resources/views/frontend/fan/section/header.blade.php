    <style>
p.tipending {
    position: absolute;
    text-align: 0;
    right: 18px;
    height: 21px;
    width: 19px;
    text-align: center;
    top: 17px;
    background: #ffffff;
    color: #ac2991;
    padding: 3px;
    font-weight: 600;
    border-radius: 19px;
}


    @media only screen and (max-width: 992px) {
        .credit-add {
            display: none;
        }
    }


    .Explore-bg {
        padding: 40px 30px !important;
    }
/*    button.credit-add:hover {
  
    padding-left: 10px !important;
}
*/    .sidelinks-wrapper {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1111;
        top: 90px !important;
        left: 0;
        background-color: #0c1d2d !important;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 0px !important;
    }

    nav.navbar-bg.sticky-top {
        position: fixed;
        top: 0;
        width: 100%;
    }
    .nav-btnwrapper.fandashboard_wallet {
    display: flex;
}
.joinfree1 {
    text-align: center;
    /* align-items: center; */
    justify-content: right;
}
@use postcss-cssnext;
:root {
  --min-size: 2px;
  --max-size: 20px;
}

* {
  box-sizing: border-box;
}

html, body, .backdrop {
  height: 100%;
  width: 100%;
  margin: 0;
}

.backdrop {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  width:100%;
  background-color: #091625;
  position: fixed;
  bottom: 0px;
  top:10px;
  left: 0;
  right: 0;
  margin: auto;
  color: #000;
  padding: 15px 15px;
  border-radius: 5px;
  z-index: 10000000;
}

.loader {
  display: flex;
  align-items: center;
  justify-content: center;
}

.dot {
  background: #a925cf;
  margin: 5px;
  animation-name: loader;
  animation-duration: 1s;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

.dot:nth-child(1) {
  animation-delay: 0.2s;
}
.dot:nth-child(2) {
  animation-delay: 0.4s;
}
.dot:nth-child(3) {
  animation-delay: 0.6s;
}
.dot:nth-child(4) {
  animation-delay: 0.8s;
}
.dot:nth-child(5) {
  animation-delay: 1s;
}

@keyframes loader {
  from {
    width: var(--min-size);
    height: var(--min-size);
    border-radius: calc(var(--min-size) / 2);
  }
  to {
    width: var(--max-size);
    height: var(--max-size);
    border-radius: calc(var(--max-size) / 2);
  }
}

/*new added*/
button.credit-add:focus {
    outline: 0 !important;
}
</style>
<div class="modal fade" id="TipPoPup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content ">
         <div class="modal-header ">
               <h5 class="modal-title color-white" id="exampleModalLongTitle">
                  Send a tip 
                  <br>
                  <div class="tip_option d-flex text-white">
                     <div class="tipoption text-white"value="1"><small>$1</small></div>
                     <div class="tipoption text-white" value="5"><small>$5</small></div>
                     <div class="tipoption text-white" value="10"><small>$10</small></div>
                     <div class="tipoption text-white" value="20"><small>$20</small></div>
                     <div class="tipoption text-white" value="50"><small>$50</small></div>
                     <div class="tipoption text-white" value="100"><small>$100</small></div>
                  </div>
               </h5>
               <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="text-white">x</span>
               </button>
            </div>
         <div class="modal-body">
            <form class="tip-form">
               <label for="">Tip Amount</label>
               <span class="doller_sin doll_sin ">$</span>
               <input type="number" name="tip_amount" class="form-control tip_amount" id="tips_fild" value=""
                  placeholder=" Enter Tip amount $1-999" maxlength="3"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"required min="1" max="999">
                  <span class="text-danger amount-error"></span> <br>
               <label for="" class="mt-2">What is this for?</label>
               <input type="text" class="form-control tip_mess" name="tip_mess" placeholder="What is this for?"
                  required>
               <input type="hidden" class="tip_model_id" name="model_id" value="" required>
         </div>
         <div class="modal-footer">
         <button type="button" class="send-tip-btn send-tip-ajax">Send Tip</button> 
        </form>
         </div>
      </div>
   </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
<div class="backdrop">
  <div class="loader"> 
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
   </div>
</div>
<nav class="navbar-bg sticky-top">
    <div class="container">
    <div id="feed-add-collection-success" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Feed added to collection</span>
                                        </div>

                                        <div id="balence-visible" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999999999999999999;">
                                        <span class="balence-visible"></span>
                                        </div>
        <div class="navbar-wrapper">
            <i class="fa-solid fa-bars sidebar" role="button" id="sidebar" onclick="openNav()"></i>
            <a href="javascript:void(0)" role="button" class="closebtn d-none" id="closebtn" onclick="closeNav()"><i
                    class="fa fa-times" aria-hidden="true"></i>
            </a>
            <a href="{{ url('/') }}">
                <img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo" class="nav-logo" /></a>

            <!-- <div class="model_dashboard_wallet">
        <div class="nav-btnwrapper d-flex">
          <div class="joinfree1 d-flex" id="navbtns">
            <div class="profile-image mt-1 ml-4">
              <a href="{{ route('model.profile-edit', Auth::user()->id) }}"
                ><img
                  src="{{ url('profile-image') . '/' . Auth::user()->profile_image }}"
                  width="40"
                  height="40"
                  style="border-radius: 100%"
              /></a>
            </div>

            <div class="name-and-wallat">
              <div class="auth-name pl-3 pt-1">
                <p class="mb-0">{{ Auth::user()->first_name }}</p>
                <p class="pt-1">{{ Auth::user()->wallet }} Cr</p>
              </div>
            </div>
          </div>
        </div>
      </div> -->

            <div class="serch-wrapper">
                <input type="text" placeholder="Search for Models and tags" class="serch-input serch-input-tag" id="search"
                    autocomplete="off" />
                <i class="fa fa-search serch-icon" aria-hidden="true"></i>
                <div class="search-res wrap" id="wrap">
                    <div id="search-box " class="search-box ">
                        <div class="row">

                        </div>

                    </div>
                </div>

            </div>

            <div class="nav-btnwrapper fandashboard_wallet ">
                <a href="{{ url('fan/payment') }}">
                    <button class="credit-add">
                        <div class="d-flex align-items-center">
                            <div class="plus-icon mr-2">
                                <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(175,41,144,1)" />
                                </svg>
                            </div>
                            <h6 class="ml-1 mt-0 mb-0" style="font-size: 14px">
                                Add Credits
                            </h6>
                        </div>
                    </button>
                </a>
                <div class="joinfree1 d-flex">
                    <div class="profile-image mt-1 ml-4">
                        <img src="{{ url('profile-image') . '/' . Auth::user()->profile_image }}" width="40"
                            height="40" style="border-radius: 100%" />
                    </div>

                    <div class="name-and-wallat">
                        <div class="auth-name pl-3 pt-1">
                            <p class="mb-0">{{ Auth::user()->first_name }}</p>
                            <p class="pt-1 wallet-credit">{{ Auth::user()->wallet }} Cr</p>
                        </div>
                    </div>
                </div>

                <!-- <i class="fa-solid fa-bars sidebar" onclick="openNav()"></i> -->
            </div>
        </div>

      
        <div class="nav-links-wrapper">
            <ul>
              @foreach ($navmenu as $item)
              <a href="/fan/{{ $item->slug }}">
                <li
                  class="{{ url($item->slug) == url(request()->path()) ? 'active' : '' }}"
                >
                  <img
                    src="{{ url('home-menu') . '/' . $item->image }}"
                    alt="#"
                    class="mr-1"
                  />
                  {{ $item->title }}
                </li>
              </a>
              @endforeach
              <!-- <a href="" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                          <li>
                              <img src="../image/navicon/How.png" alt="#" class="mr-1" />How
                              Adultx Works
                          </li>
                      </a> -->
      
              <!-- Button trigger modal -->
      
              <!-- Modal -->
             
            </ul>
          </div>
    
      
</nav>
<div class="sidelinks-wrapper " id="mySidenav">
    <div class="sidebar-wrapper">
        <div class="fan-menu">
            <ul class="list-group">
                <a href="{{ url('/model/dashboard') }}">
                    <li
                        class="list-group-item li_type {{ url('/fan/dashboard') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item"><i class="bi bi-house-fill"></i>Home</span>
                    </li>
                </a>


                     @php
                    $notification=App\Models\ChMessage::where('to_id',Auth::user()->id)->where('seen','0')->count();
                    @endphp
                        <a href="{{url('/chatify')}}"><li class="list-group-item li_type "><span class="item "><i class="bi bi-chat-dots-fill"></i>Messages @if(isset($notification)) @if($notification>'0')  <p class="tipending">{{$notification}} </p> @endif @endif</span></li></a>
                        
               <!--  <a href="{{ url('/messenger') }}">
                    <li
                        class="list-group-item li_type {{ url('/messenger') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item "><i class="bi bi-chat-dots-fill"></i>Messages</span>
                    </li>
                </a> -->
                <a href="{{ url('/fan/feeds') }}">
                    <li
                        class="list-group-item li_type {{ url('/fan/feeds') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item"><i class="bi bi-telephone"></i>Feed</span>
                    </li>
                </a>

                <a href="{{ url('/fan/models') }}">

                    <li
                        class="list-group-item li_type {{ url('/fan/models') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item"><i class="bi bi-browser-safari"></i>Models</span>
                    </li>
                </a>


                <a href="{{ url('/fan/contacts') }}">
                    <li
                        class="list-group-item li_type {{ url('/fan/contacts') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item"><i class="bi bi-person-lines-fill   "></i>Contacts</span>
                    </li>
                </a>

                <a href="{{ url('/fan/collection') }}">
                    <li
                        class="list-group-item li_type {{ url('/fan/collection') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item"> <i class="bi bi-folder-fill"></i>Collection</span>
                    </li>
                </a>
                <a href="{{ url('/fan/account-logs') }}">
                    <li
                        class="list-group-item li_type {{ url('fan/account-logs') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item"> <i class="bi bi-stopwatch-fill"></i>Account Logs</span>
                    </li>
                </a>

                <li class="list-group-item li_type  ">
                    <a class="nav-link   dropdown-btn    " type="button">
                        <span class="item ">
                            <i class="bi bi-question-circle-fill">

                            </i>Help<i class="fa fa-caret-down">

                            </i></span>
                    </a>
                    <div class="dropdown-container"
                        style="{{ url('/fan/legal') == url(request()->path()) ? 'display:block;' : '' }}
                {{ url('/fan/faq') == url(request()->path()) ? 'display:block;' : '' }}
                {{ url('/fan/contact') == url(request()->path()) ? 'display:block;' : '' }}
                {{ url('/fan/code-of-conduct') == url(request()->path()) ? 'display:block;' : '' }}
                {{ url('/fan/chargeback-protection') == url(request()->path()) ? 'display:block;' : '' }} ">
                        <a class="list-group-item dropdown-item {{ url('/fan/legal') == url(request()->path()) ? 'active' : '' }}  "
                            href="legal"><small>Legal</small>
                        </a>
                        <a class="list-group-item dropdown-item {{ url('/fan/faq') == url(request()->path()) ? 'active' : '' }}  "
                            href="faq"><small>FAQ </small>
                        </a>
                        <a class="list-group-item dropdown-item {{ url('/fan/contact') == url(request()->path()) ? 'active' : '' }}  "
                            href="contact"><small>Contact</small>
                        </a>
                        <a class="list-group-item dropdown-item {{ url('/fan/code-of-conduct') == url(request()->path()) ? 'active' : '' }}  "
                            href="code-of-conduct"><small>Code of Conduct</small>
                        </a>
                        <a class="list-group-item dropdown-item {{ url('/fan/chargeback-protection') == url(request()->path()) ? 'active' : '' }}  "
                            href="chargeback-protection"><small>Chargeback Protection</small></a>
                    </div>
                </li>






                <a href="{{ url('/fan/settings') }}">
                    <li
                        class="list-group-item li_type {{ url('/fan/settings') == url(request()->path()) ? 'active' : '' }}">
                        <span class="item"><i class="bi bi-gear-fill"></i>Settings</span>
                    </li>
                </a>
                <a href="{{ url('/') }}"
                    onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                    <li class="list-group-item li_type">
                        <span class="item"><i class="bi bi-box-arrow-right"></i>Log Out</span>
                    </li>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>




        </div>
    </div>
    <div class="nav-links-wrapper">
        <ul>
         
            <!-- @foreach ($navmenu as $item)
<a href="/fan/{{ $item->slug }}">
  <li
    class="{{ url($item->slug) == url(request()->path()) ? 'active' : '' }}"
  >
    <img
      src="{{ url('home-menu') . '/' . $item->image }}"
      alt="#"
      class="mr-1"
    />
    {{ $item->title }}
  </li>
</a>
@endforeach -->
            <!-- <a href="" type="button" data-toggle="modal" data-target="#exampleModalCenter">
            <li>
                <img src="../image/navicon/How.png" alt="#" class="mr-1" />How
                Adultx Works
            </li>
        </a> -->

            <!-- Button trigger modal -->

            <!-- Modal -->
            

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <iframe width="420" height="315"
                                src="https://www.youtube.com/embed/tgbNymZ7vqY">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</div>
<style>
    @media (max-width: 767px) {
        .fandashboard_wallet {
            display: none !important;
        }
    }

    .credit-add {
        background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
        /* width: 50%; */
        height: 48px;
        padding: 6px 12px;
        border-radius: 6px;
        font-family: "Montserrat";
        font-weight: 700;
        font-size: 10px;
        line-height: 17px;
        text-transform: uppercase;
        color: #fff;
        border: 1px solid #451c4a;
        outline: none;
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
    .sidebar.d-none{
        display: none!important;
    }

    .plus-icon {
        /* padding: 0 0 2px 7px; */
        background-color: #ffffffb8;
        margin-left: 5px;
        height: 26px;
        width: 26px;
        text-align: center;
        /* padding-right: 1px; */
        margin-right: 0px;
        border-radius: 21px;
    }

    .login-btn {
        background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
        width: 158px;
        height: 48px;
        border-radius: 6px;
        font-family: "Montserrat";
        font-weight: 700;
        font-size: 14px;
        line-height: 17px;
        text-transform: uppercase;
        color: #fff;
        border: none;
        outline: none;
    }

    .joinfree1 {
        /*
            border: 1px solid #c73ca9; */
        /* border-radius: 6px; */
        /* color: #c73ca9; */
        font-family: "Montserrat";
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 17px;
        width: 170px;
        height: 48px;
        background-color: #0f1e2e;
        outline: none;
        margin-right: 10px;
    }

    .name-and-wallat {
        color: #a9aeb4;
        font-family: "Montserrat";
        font-style: normal;
        font-weight: 600;
        font-size: 15px;
        line-height: 18px;
    }

    .onile-icon {
        height: 12px;
        width: 12px;
        background-color: #48a45c;
        border-radius: 18px;
    }

    .sidebar-wrapper {
        font-family: "Montserrat";
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 17px;
    }

    .online-models {
        border-radius: 4px;
    }

    .account {
        border-radius: 4px;
    }

    .details {
        font-family: "Montserrat";
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 29px;
        border-radius: 6px;
    }

    .bank-icon {
        border-radius: 8px;
    }

    .add-credit-btn {
        background: linear-gradient(90deg, #af2990 0%, #4c2acd 100%);
        width: 109px;
        height: 43px;
        border-radius: 6px;
        font-family: "Montserrat";
        font-weight: 100;
        font-size: 10px;
        line-height: 17px;
        text-transform: uppercase;
        color: #fff;
        border: none;
        outline: none;
    }

    .plus-icon-add-credit {
        background-color: #ffffffb8;
        margin-left: 5px;
        height: 21px;
        width: 23px;
        text-align: center;
        /* padding-right: 1px; */
        margin-right: 0px;
        border-radius: 21px;
    }

    .mgs-content {
        border-radius: 6px;
    }

    img.mgs-image {
        border-radius: 25px;
    }

    .mgs-content {
        font-family: "Montserrat";
    }

    .top-model-fan-dashboard {
        background: #162637;
        border-radius: 12px;
        padding: 10px;
        margin-right: 13px;
        margin-bottom: 13px;
    }
</style>
