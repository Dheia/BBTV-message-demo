<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <nav class="navbar-bg sticky-top" http://adultx.eoxyslive.com/>
        <div class="container">
        <div id="away-mode-on" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Away Mode On</span>
                                        </div>
                                        <div id="away-mode-off" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Away Mode Off</span>
                                        </div>

                                        <div id="email-varify" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Email varify successfully</span>
                                        </div>


                                        <div id="Weekly-Availability-on" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Weekly Availability On</span>
                                        </div>
                                        <div id="Weekly-Availability-off" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Weekly Availability Off</span>
                                        </div>


                                        <div id="sleep-mode-on" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Sleep Mode On</span>
                                        </div>
                                        <div id="Sleep-mode-off" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Sleep Mode Off</span>
                                        </div>

                                        <div id="feed-updated" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Feed updated successfully</span>
                                        </div>
                                        <div id="feed-deleted-success" class="copied text-center text-white" style="background-color: #50a750 ; width: 250px !important;    z-index: 99999;">
                                        <span>Feed deleted successfully</span>
                                        </div>
                                        <div id="copied-success" class="copied">
                                        <span>Copied!</span>
                                        </div>


                                        
                                        
            <div class="navbar-wrapper">
                <i class="fa-solid fa-bars sidebar" role="button" id="sidebar" onclick="openNav()"></i>
                <a href="javascript:void(0)" role="button" class="closebtn  d-none" id="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i>
              </a>
                <a href="{{url('/')}}">
                    <img src="{{ url('images/logo') . '/' . $logo['logo'] }}" alt="Logo" class="nav-logo" /></a>

              <div class="model_dashboard_wallet">
                <div class="nav-btnwrapper  d-flex ">
                  
                               <div class="joinfree1 d-flex " id="navbtns">
                              
                                <div class="profile-image  mt-1 ml-4">
                                    <a href="{{route('model.profile-edit', Auth::user()->id) }}"><img src="{{ url('profile-image') . '/' . Auth::user()->profile_image }}" width="40" height="40" style="    border-radius: 100%;"></a> 
                                 </div>
                                
                                 <div class="name-and-wallat ">
                                     <div class="auth-name pl-3 pt-1">
                                        <a href="{{route('model.profile-edit', Auth::user()->id) }}">
                                         <p class="mb-0"> {{Auth::user()->first_name}}</p>
                                         <p class="pt-1">{{Auth::user()->wallet}} Cr</p></a>
                                     </div>
                                 </div>
                             
                            </div>

                           
                        </div>
                    </div>


                    @php $tip_amount=App\Models\User_logs::where('to',Auth::user()->id)->where('method','Tip')->where('status','0')->count(); @endphp

                        <div class="sidelinks-wrapper " id="mySidenav" >
                            <div class="sidebar-wrapper">
                    <div class="fan-menu">
                      <ul class="list-group">
                       <a href="{{url('/model/dashboard')}}"> <li class="list-group-item li_type {{ url('/model/dashboard') == url(request()->path()) ? 'active' : '' }}"><span class="item "><i class="bi bi-house-fill"></i>Home</span></li></a>
                       @php
                    $notification=App\Models\ChMessage::where('to_id',Auth::user()->id)->where('seen','0')->count();
                    @endphp
                        <a href="{{url('/chatify')}}"><li class="list-group-item li_type "><span class="item "><i class="bi bi-chat-dots-fill"></i>Messages @if(isset($notification)) @if($notification>'0')  <p class="tipending">{{$notification}} </p> @endif @endif</span></li></a>
                        <a href="{{route('model.calls')}}"><li class="list-group-item li_type {{ url('/model/calls') == url(request()->path()) ? 'active' : '' }} "><span class="item"><i class="bi bi-telephone"></i>Calls</span></li></a>
                        <a href="{{route('model.feeds.index')}}"><li class="list-group-item li_type {{ url('/model/feeds') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-browser-safari"></i>Feed</span></li></a>
                        <a href="{{route('model.tips')}}"><li class="list-group-item li_type {{ url('/model/tips') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-heart-fill"></i>Tips @if(isset($tip_amount)) @if($tip_amount>'0')  <p class="tipending">{{$tip_amount}} </p> @endif @endif </span></li></a>
                        <a href="{{url('/model/pricing')}}"><li class="list-group-item li_type {{ url('/model/pricing') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-tag-fill "></i>Pricing</span></li></a>
                        <a href="{{url('/model/earnings')}}"><li class="list-group-item li_type {{ url('/model/earnings') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-coin"></i>Earnings</span></li></a>
                        <li class="list-group-item li_type  ">
                        <a class="nav-link   dropdown-btn   " type="button" ><span class="item "><i class="bi bi-cash"></i>Payout Information  <i class="fa fa-caret-down"></i></span></a>
                          <div class="dropdown-container" style="{{ url('/model/paymentInfo') == url(request()->path()) ? 'display:block;' : '' }} {{ url('/model/payout-history') == url(request()->path()) ? 'display:block;' : '' }}">
                          <a class="list-group-item dropdown-item  {{ url('/model/paymentInfo') == url(request()->path()) ? 'active' : '' }} " href="{{url('/model/paymentInfo')}}">Overview</a>
                          <a class="list-group-item dropdown-item  {{ url('/model/payout-history') == url(request()->path()) ? 'active' : '' }} " href="{{url('/model/payout-history')}}"> Payout History </a> 
                          </div>
                        </li>
                       
                        <li class="list-group-item li_type  ">
                        <a class="nav-link   dropdown-btn   {{ url('/model/top-spenders') == url(request()->path()) ? 'active' : '' }} " type="button" >
                         <span class="item "><i class="bi bi-graph-up-arrow"></i>Reports<i class="fa fa-caret-down"></i></span></a>
                          <div class="dropdown-container" style="{{ url('/model/top-spenders') == url(request()->path()) ? 'display:block;' : '' }}">
                          <a class="list-group-item dropdown-item   {{ url('/model/top-spenders') == url(request()->path()) ? 'active' : '' }}" href="{{url('/model/top-spenders')}}">Top Spenders</a>
                          <a class="list-group-item dropdown-item   " href="#"> Mass Message Status</a> 
                          </div>
                        </li>
                        
                         <a href="{{url('/model/leaderboard')}}"> <li class="list-group-item li_type {{ url('/model/leaderboard') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-trophy-fill"></i>Leaderboard</span></li></a>
                         <a href="{{url('/model/referral-bonus')}}"> <li class="list-group-item li_type {{ url('/model/referral-bonus') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-share-fill"></i>Referrals</span></li></a>
                         <li class="list-group-item li_type  ">
                        <a class="nav-link   dropdown-btn    " type="button" >
                         <span class="item "><i class="bi bi-question-circle-fill"></i>Help<i class="fa fa-caret-down"></i></span></a>
                          <div class="dropdown-container" style="{{ url('/model/legal') == url(request()->path()) ? 'display:block;' : '' }}
                          {{ url('/model/faq') == url(request()->path()) ? 'display:block;' : '' }}
                          {{ url('/model/contact') == url(request()->path()) ? 'display:block;' : '' }}
                          {{ url('/model/code-of-conduct') == url(request()->path()) ? 'display:block;' : '' }}
                          {{ url('/model/chargeback-protection') == url(request()->path()) ? 'display:block;' : '' }} ">
                          <a class="list-group-item dropdown-item {{ url('/model/legal') == url(request()->path()) ? 'active' : '' }}  " href="legal">Legal</a>
                          <a class="list-group-item dropdown-item {{ url('/model/faq') == url(request()->path()) ? 'active' : '' }}  " href="faq">FAQ</a> 
                          <a class="list-group-item dropdown-item {{ url('/model/contact') == url(request()->path()) ? 'active' : '' }}  " href="contact">Contact</a>
                          <a class="list-group-item dropdown-item {{ url('/model/code-of-conduct') == url(request()->path()) ? 'active' : '' }}  " href="code-of-conduct">Code of Conduct</a> 
                          <a class="list-group-item dropdown-item {{ url('/model/chargeback-protection') == url(request()->path()) ? 'active' : '' }}  " href="chargeback-protection">Chargeback Protection</a>
                          </div>
                        </li>
                            
                        <a href="{{url('/model/settings')}}"><li class="list-group-item li_type {{ url('/model/settings') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-gear-fill"></i>Settings</span></li></a>
                        <a href="{{url('/model/profile-edit',[Auth::user()->id])}}"><li class="list-group-item li_type {{ url('/model/profile-edit',[Auth::user()->id]) == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-sliders"></i>Profile Settings</span></li></a>
                       <a href="{{url('/')}}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"> <li class="list-group-item li_type"><span class="item"><i class="bi bi-box-arrow-right"></i>Log Out</span></li></a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                      </ul>
      
      
      
      
                    </div>
                  </div>
              
          </div>
            </div>
            </div>
        </div>
    </nav>




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
      a.list-group-item.dropdown-item {
    padding: 5px 20px !important;
}
  .sidelinks-wrapper a {
         padding: 0px 8px 8px 0px !important  ;
         text-decoration: none;
         font-size: 20px;
         color: #818181;
         display: block;
         transition: 0.3s;
     }

        .sidenav {
          height: 100%;
          width: 200px;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          padding-top: 20px;
        }
        
        
        .sidenav a, .dropdown-btn {
          padding: 6px 8px 6px 16px;
          text-decoration: none;
          font-size: 20px;
          color: #818181;
          display: block;
          border: none;
          background: none;
          width: 100%;
          text-align: left;
          cursor: pointer;
          outline: none;
        }
        
        
        .sidenav a:hover, .dropdown-btn:hover {
          color: #f1f1f1;
        }
        
        
        
        
        
        /* .active {
          background-color: green;
          color: white;
        } */
        .list-group-item.dropdown-item.active{
          border:0px;
          background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
        }
        
        .dropdown-container {
          display: none;
          background-color: #0c1d2d;
          padding-left: 8px;
        }
        
        
        .fa-caret-down {
          float: right;
          padding-right: 8px;
        }
        
          ul.dropdown-menu.show {
            left: 15px !important;
        }
          .li_type{
        text-decoration: none !important;
        list-style-type: none !important;
        padding: 0rem !important;
        }
        .before::after {
          margin: -2px;
            position: absolute;
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
            right: 5px;
            top: 28px;
        }
        .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: unset !important ;
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
        
        
        .nav-link.dropdown-btn.active .dropdown-container{
          display: block !important;
        }
        @media (max-width: 768px){
        .sidelinks-wrapper {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1111;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.2s;
    padding-top: 0px;
    margin-top: 87px;
   
}
p.tipending {
    position: absolute;
    text-align: 0;
    right: 18px;
    height: 21px;
    width: 19px;
    text-align: center;
    top: 9px !important;
    background: #ffffff;
    color: #ac2991;
    padding: 3px;
    font-weight: 600;
    border-radius: 19px;
}
span.item {
    border-radius: 7px;
    height: 52px;
    background-color: #0C1D2D;
    position: relative;
    display: block;
    padding: 9px 13px 8px 25px !important;
    margin-bottom: -1px;
    border: 1pxsolidrgba(0, 0, 0, .125);
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #d0d4d9;
    margin: 0px 6px;
}
.sidebar-wrapper {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    margin-bottom: 89px !important;
    /* padding-bottom: 17px !important; */
}
::-webkit-scrollbar {
  width: 0px !important;
}
a#closebtn {
    font-size: 32px;
    font-weight: 600;
}
.model_dashboard_wallet{
    display: none;
}
.sticky-top {
    position: -webkit-sticky;
    position: sticky;
    padding: 0px 0px 1px;
    top: 0;
    z-index: 1020;
}
}
        
        
        </style>
        