<style>
  .fandashboard_sidebar{padding-top:27px !important;}
  @media only screen and (max-width: 992px) {
  .col-sm-12.col-md-3.col-xl-3.mt-5.mb-5.fandashboard_sidebar {
      padding: 30px 10px ! important;
  }}
</style>
<div class="content-wrapper">
    <div class="container ">
      <div class="content">
        <div class="row ">
          <div class="col-sm-12 col-md-3 col-xl-3 mt-5 mb-5 fandashboard_sidebar" >
                <div class="sidebar-wrapper">
                  <div class="fan-menu">
                    <ul class="list-group">
                    <a href="{{url('/model/dashboard')}}">
                         <li class="list-group-item li_type {{ url('/fan/dashboard') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-house-fill"></i>Home</span></li></a>

                    @php
                    $notification=App\Models\ChMessage::where('to_id',Auth::user()->id)->where('seen','0')->count();
                    @endphp

                    <a href="{{url('/chatify')}}"> 
                    <li class="list-group-item li_type {{ url('/chatify') == url(request()->path()) ? 'active' : '' }}">
                    <span class="item"><i class="bi bi-chat-dots-fill"></i>Messages @if(isset($notification)) @if($notification>'0')  <p class="tipending">{{$notification}} </p> @endif @endif</span>
                    </li></a>

                    <!-- <a href="{{url('/chatify')}}">
                      <li class="list-group-item li_type {{ url('/chatify') == url(request()->path()) ? 'active' : '' }}"><span class="item "><i class="bi bi-chat-dots-fill"></i>Messages</span></li>
                      </a> -->
                     <a href="{{url('/fan/feeds')}}">
                         <li class="list-group-item li_type {{ url('/fan/feeds') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-telephone"></i>Feed</span></li></a>

                      <a href="{{url('/fan/models')}}">

                        <li class="list-group-item li_type {{ url('/fan/models') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-browser-safari"></i>Models</span></li></a>

                        
                      <a href="{{url('/fan/contacts')}}">
                        <li class="list-group-item li_type {{ url('/fan/contacts') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-person-lines-fill   "></i>Contacts</span></li></a>

                      <a href="{{url('/fan/collection')}}">
                        <li class="list-group-item li_type {{ url('/fan/collection') == url(request()->path()) ? 'active' : '' }}"><span class="item"> <i class="bi bi-folder-fill"></i>Collection</span>
                      </li>
                    </a>
                      <a href="{{url('/fan/account-logs')}}">
                      <li class="list-group-item li_type {{ url('fan/account-logs') == url(request()->path()) ? 'active' : '' }}"><span class="item"> <i class="bi bi-stopwatch-fill"></i>Account Logs</span></li>
                      </a>
                      
                      <li class="list-group-item li_type  ">
                      <a class="nav-link   dropdown-btn    " type="button" >
                       <span class="item ">
                        <i class="bi bi-question-circle-fill">

                       </i>Help<i class="fa fa-caret-down">

                       </i></span>
                    </a>
                        <div class="dropdown-container" style="{{ url('/fan/legal') == url(request()->path()) ? 'display:block;' : '' }}
                        {{ url('/fan/faq') == url(request()->path()) ? 'display:block;' : '' }}
                        {{ url('/fan/contact') == url(request()->path()) ? 'display:block;' : '' }}
                        {{ url('/fan/code-of-conduct') == url(request()->path()) ? 'display:block;' : '' }}
                        {{ url('/fan/chargeback-protection') == url(request()->path()) ? 'display:block;' : '' }} ">
                        <a class="list-group-item dropdown-item {{ url('/fan/legal') == url(request()->path()) ? 'active' : '' }}  " href="legal"><small>Legal</small>
                    </a>
                        <a class="list-group-item dropdown-item {{ url('/fan/faq') == url(request()->path()) ? 'active' : '' }}  " href="faq"><small>FAQ </small>
                    </a> 
                        <a class="list-group-item dropdown-item {{ url('/fan/contact') == url(request()->path()) ? 'active' : '' }}  " href="contact"><small>Contact</small>
                    </a>
                        <a class="list-group-item dropdown-item {{ url('/fan/code-of-conduct') == url(request()->path()) ? 'active' : '' }}  " href="code-of-conduct"><small>Code of Conduct</small>
                    </a> 
                        <a class="list-group-item dropdown-item {{ url('/fan/chargeback-protection') == url(request()->path()) ? 'active' : '' }}  " href="chargeback-protection"><small>Chargeback Protection</small></a>
                        </div>
                      </li>

                    
           

                    
              
                      <a href="{{url('/fan/settings')}}">
                        <li class="list-group-item li_type {{ url('/fan/settings') == url(request()->path()) ? 'active' : '' }}"><span class="item"><i class="bi bi-gear-fill"></i>Settings</span></li>
                    </a>
                     <a href="{{url('/')}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                      <li class="list-group-item li_type">
                        <span class="item"><i class="bi bi-box-arrow-right"></i>Log Out</span></li></a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </ul>
    
    
    
    
                  </div>
                </div>
              </div>
    
    <style>
      
    
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
      padding-left: 30px;
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
    
    </style>
    
          <script>
    
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }
          </script>