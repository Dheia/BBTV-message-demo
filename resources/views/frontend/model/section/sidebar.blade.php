<div class="col-sm-12 col-md-3 col-xl-3 mt-5 mb-5 model_dashboard_sidebar">
  <div class="sidebar-wrapper">
    <div class="fan-menu">
      <ul class="list-group"> 
        <a href="{{ url('/model/dashboard') }}">
          <li
            class="list-group-item li_type {{ url('/model/dashboard') == url(request()->path()) ? 'active' : '' }}"
          >
            <span class="item"><i class="bi bi-house-fill"></i>Home</span>
          </li></a
        >
        <!-- <a href="{{url('/chatify')}}">
        <li class="list-group-item li_type {{ url('/chatify') == url(request()->path()) ? 'active' : '' }}">
          <span class="item"><i class="bi bi-chat-dots-fill"></i>Messages</span>
        </li></a> -->
        @php
                    $notification=App\Models\ChMessage::where('to_id',Auth::user()->id)->where('seen','0')->count();
                    @endphp
        <a href="{{url('/chatify')}}"> 
                    <li class="list-group-item li_type {{ url('/chatify') == url(request()->path()) ? 'active' : '' }}">
                    <span class="item"><i class="bi bi-chat-dots-fill"></i>Messages @if(isset($notification)) @if($notification>'0')  <p class="tipending">{{$notification}} </p> @endif @endif</span>
                    </li></a>

        <a href="{{ route('model.calls') }}"
          ><li
            class="list-group-item li_type {{ url('/model/calls') == url(request()->path()) ? 'active' : '' }} "
          >
            <span class="item"><i class="bi bi-telephone"></i>Calls</span>
          </li></a
        >
        <a href="{{ route('model.feeds.index') }}"
          ><li
            class="list-group-item li_type {{ url('/model/feeds') == url(request()->path()) ? 'active' : '' }}"
          >
            <span class="item"><i class="bi bi-browser-safari"></i>Feed</span>
          </li></a
        >
        <a href="{{ url('model/tips') }}"
          ><li
            class="list-group-item li_type {{ url('/model/tips') == url(request()->path()) ? 'active' : '' }}"
          >
          @php $tip_amount=App\Models\User_logs::where('to',Auth::user()->id)->where('method','Tip')->where('status','0')->count(); @endphp
            <span class="item"><i class="bi bi-heart-fill"></i>Tips @if(isset($tip_amount)) @if($tip_amount>'0')  <p class="tipending">{{$tip_amount}} </p> @endif @endif</span>
          </li></a
        >
        <a href="{{ url('/model/pricing') }}"
          ><li
            class="list-group-item li_type {{ url('/model/pricing') == url(request()->path()) ? 'active' : '' }}"
          >
            <span class="item"><i class="bi bi-tag-fill"></i>Pricing</span>
          </li></a
        >
        <a href="{{ url('/model/earnings') }}"
          ><li
            class="list-group-item li_type {{ url('/model/earnings') == url(request()->path()) ? 'active' : '' }}"
          >
            <span class="item"><i class="bi bi-coin"></i>Earnings</span>
          </li></a
        >
        <li class="list-group-item li_type">
          <a class="nav-link dropdown-btn" type="button"
            ><span class="item payout-info"
              ><i class="bi bi-cash"></i>Payout Information
              <i class="fa fa-caret-down"></i></span
          ></a>
          <div
            class="dropdown-container"
            style="{{ url('/model/paymentInfo') == url(request()->path()) ? 'display:block;' : '' }} {{ url('/model/payout-history') == url(request()->path()) ? 'display:block;' : '' }}"
          >
            <a
              class="list-group-item dropdown-item  {{ url('/model/paymentInfo') == url(request()->path()) ? 'active' : '' }} "
              href="{{ url('/model/paymentInfo') }}"
              ><small>Overview</small></a
            >
            <a
              class="list-group-item dropdown-item  {{ url('/model/payout-history') == url(request()->path()) ? 'active' : '' }} "
              href="{{ url('/model/payout-history') }}"
              ><small> Payout History </small></a
            >
          </div>
        </li>
        <!-- <li class="list-group-item li_type dropdown ">
                  <a class="nav-link dropdown-toggle   dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="item before"><i class="bi bi-cash"></i>Payout Information</span>
                  </a>
                    <ul class="dropdown-menu {{ url('/model/payout-history') == url(request()->path()) ? 'show' : '' }} {{ url('/model/paymentInfo') == url(request()->path()) ? 'show' : '' }}" aria-labelledby="dropdownMenuButton">
                      <li class="list-group-item dropdown-item  {{ url('/model/paymentInfo') == url(request()->path()) ? 'active' : '' }}" >
                      <a class="dropdown-item" href="{{url('/model/paymentInfo')}}"><small>Overview</small></a></li>
                      <li class="list-group-item dropdown-item {{ url('/model/payout-history') == url(request()->path()) ? 'active' : '' }}">
                      <a class="dropdown-item " href="{{url('/model/payout-history')}}"><small> Payout History </small></a></li>
                    </ul>
                  </li> -->
        <li class="list-group-item li_type">
          <a
            class="nav-link   dropdown-btn   {{ url('/model/top-spenders') == url(request()->path()) ? 'active' : '' }} "
            type="button"
          >
            <span class="item"
              ><i class="bi bi-graph-up-arrow"></i>Reports<i
                class="fa fa-caret-down"
              ></i></span
          ></a>
          <div
            class="dropdown-container"
            style="{{ url('/model/top-spenders') == url(request()->path()) ? 'display:block;' : '' }}"
          >
            <a
              class="list-group-item dropdown-item   {{ url('/model/top-spenders') == url(request()->path()) ? 'active' : '' }}"
              href="{{ url('/model/top-spenders') }}"
              ><small>Top Spenders</small></a
            >
            <a class="list-group-item dropdown-item" href="#"
              ><small> Mass Message Status</small></a
            >
          </div>
        </li>
        <!-- <li class="list-group-item li_type dropdown ">
              <a class="nav-link dropdown-toggle   dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="item before"><i class="bi bi-graph-up-arrow"></i>Reports</span>
           </a>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li class="list-group-item dropdown-item">
                <a class="dropdown-item" href="{{url('/model/top-spenders')}}"><small>Top Spenders </small></a></li>
                <li class="list-group-item dropdown-item">
                    <a class="dropdown-item " href="#"><small>Mass Message Stats</small></a></li>
                   
                        </ul>
                    </li> -->
        <a href="{{ url('/model/leaderboard') }}">
          <li
            class="list-group-item li_type {{ url('/model/leaderboard') == url(request()->path()) ? 'active' : '' }}"
          >
            <span class="item"
              ><i class="bi bi-trophy-fill"></i>Leaderboard</span
            >
          </li></a
        >
        <a href="{{ url('/model/referral-bonus') }}">
          <li
            class="list-group-item li_type {{ url('/model/referral-bonus') == url(request()->path()) ? 'active' : '' }}"
          >
            <span class="item"><i class="bi bi-share-fill"></i>Referrals</span>
          </li></a
        >
        <li class="list-group-item li_type">
          <a class="nav-link dropdown-btn" type="button">
            <span class="item"
              ><i class="bi bi-question-circle-fill"></i>Help<i
                class="fa fa-caret-down"
              ></i></span
          ></a>
          <div
            class="dropdown-container"
            style="{{ url('/model/legal') == url(request()->path()) ? 'display:block;' : '' }}
                    {{ url('/model/faq') == url(request()->path()) ? 'display:block;' : '' }}
                    {{ url('/model/contact') == url(request()->path()) ? 'display:block;' : '' }}
                    {{ url('/model/code-of-conduct') == url(request()->path()) ? 'display:block;' : '' }}
                    {{ url('/model/chargeback-protection') == url(request()->path()) ? 'display:block;' : '' }} "
          >
            <a
              class="list-group-item dropdown-item {{ url('/model/legal') == url(request()->path()) ? 'active' : '' }}  "
              href="legal"
              ><small>Legal</small></a
            >
            <a
              class="list-group-item dropdown-item {{ url('/model/faq') == url(request()->path()) ? 'active' : '' }}  "
              href="faq"
              ><small>FAQ</small></a
            >
            <a
              class="list-group-item dropdown-item {{ url('/model/contact') == url(request()->path()) ? 'active' : '' }}  "
              href="contact"
              ><small>Contact</small></a
            >
            <a
              class="list-group-item dropdown-item {{ url('/model/code-of-conduct') == url(request()->path()) ? 'active' : '' }}  "
              href="code-of-conduct"
              ><small>Code of Conduct</small></a
            >
            <a
              class="list-group-item dropdown-item {{ url('/model/chargeback-protection') == url(request()->path()) ? 'active' : '' }}  "
              href="chargeback-protection"
              ><small>Chargeback Protection</small></a
            >
          </div>
        </li>
        <!-- <li class="list-group-item li_type dropdown ">
              <a class="nav-link dropdown-toggle   dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="item before"><i class="bi bi-question-circle-fill"></i> Help</span>
           </a>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li class="list-group-item dropdown-item ">
                <a class="dropdown-item" href="legal"><small>Legal</small></a></li>
                <li class="list-group-item dropdown-item">
                    <a class="dropdown-item " href="faq"><small>FAQ</small></a></li>
                    <li class="list-group-item dropdown-item">
                        <a class="dropdown-item dropdown-item" href="contact"><small>Contact</small></a></li>
                        <li class="list-group-item dropdown-item">
                            <a class="dropdown-item " href="code-of-conduct"><small>Code of Conduct</small></a></li>
                            <li class="list-group-item dropdown-item">
                            <a class="dropdown-item " href="chargeback-protection"><small>Chargeback Protection</small></a></li>
                        </ul>
                    </li> -->
        <a href="{{ url('/model/settings') }}"
          ><li
            class="list-group-item li_type {{ url('/model/settings') == url(request()->path()) ? 'active' : '' }}"
          >
            <span class="item"><i class="bi bi-gear-fill"></i>Settings</span>
          </li></a
        >
        <a
          href="{{ url('/') }}"
          onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
        >
          <li class="list-group-item li_type">
            <span class="item"
              ><i class="bi bi-box-arrow-right"></i>Log Out</span
            >
          </li></a
        >
        <form
          id="logout-form"
          action="{{ route('logout') }}"
          method="POST"
          class="d-none"
        >
          @csrf
        </form>
      </ul>
    </div>
  </div>
</div>

<style>
  @media screen and (max-width: 992px) {
    span.item {
       font-size: 11px !important;
  }
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

  .sidenav a,
  .dropdown-btn {
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

  .sidenav a:hover,
  .dropdown-btn:hover {
    color: #f1f1f1;
  }

  /* .active {
  background-color: green;
  color: white;
} */
  .list-group-item.dropdown-item.active {
    border: 0px;
    background: linear-gradient(to left, #4c2acd 0%, #af2990 100%);
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
  .li_type {
    text-decoration: none !important;
    list-style-type: none !important;
    padding: 8px 3px 6px 1px !important;
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

  .nav-link.dropdown-btn.active .dropdown-container {
    display: block !important;
  }
</style>

<script>
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
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
