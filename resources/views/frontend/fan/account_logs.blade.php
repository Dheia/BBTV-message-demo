@extends('frontend.fan.main')
@section('content')
<div class="col-sm-12 col-md-8 col-xl-9 mt-5">
    <h3 class="text-white mt-4">Account Logs</h3>
  <table class="text-white p-5 desktop_account_logs">
<tr class="t_head">
<th>Description</th>
<th>Date</th>
<th>Change</th>
<th>Balence</th>
</tr>
@foreach($User_logs as $item)
<tr>
<td>@if($item->method=='Post unlock')
Opened picture from {{$item->model->first_name ?? ''}} @endif
@if($item->method=='Tip')
Send Tip Amount To {{$item->model->first_name ?? ''}} @endif
@if($item->method=='message')
Send Message  To {{$item->model->first_name ?? ''}} @endif
@if($item->method=='image')
Send Image To {{$item->model->first_name ?? ''}} @endif </td>
<td>{{$item->created_at}}</td>
<td>${{$item->price}}</td>
<td>@if($item->fan_balance) ${{$item->fan_balance}} @else - @endif</td>
</tr>
@endforeach
</table>
<div class="mobile_account_logs">
    @foreach($User_logs as $item)
<div class="mobile_card card text-white">
    <h6 class="mt-2 mb-2">@if($item->method=='Post unlock')
        Opened picture from {{$item->model->first_name ?? ''}} @endif
        @if($item->method=='Tip')
        Send Tip Amaount To {{$item->model->first_name ?? ''}} @endif
        @if($item->method=='message')
Send Message  To {{$item->model->first_name ?? ''}} @endif </h6>
    <div class="row pb-2 account_log_border">
        <div class="col-lg-4 col-md-4 col-sm-4 col-4 ">{{date('d.m.Y H:i:s', strtotime($item->created_at)) }}</div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-4 " >{{$item->price}}$</div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-4 ">@if($item->fan_balance) ${{$item->fan_balance}} @else - @endif</div>
    </div>
</div>
@endforeach
</div>
<div id="pagination">
        {{ $User_logs->withQueryString()->links('paginate.paginate') }}
      </div>
</div>
</div>
</div>
</div>
@endsection
@section('scripts')
    @parent
@endsection

<script>
    $(document).ready(function() {
        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 3; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1
            .owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
           
            })
            .on("changed.owl.carousel", syncPosition);

        sync2
            .on("initialized.owl.carousel", function() {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                // items: slidesPerPage,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa-solid fa-arrow-left"></i>',
                    '<i class="fa-solid fa-arrow-right-long"></i>',
                ],
                smartSpeed: 200,
                slideSpeed: 500,
                // slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100,
                responsiveClass:true,
    responsive:{
        320:{
            items:2,
            nav:true
        },
        600:{
            items:2,
            nav:true
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }

    }

                
            })
            .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find(".owl-item.active").length - 1;
            var start = sync2.find(".owl-item.active").first().index();
            var end = sync2.find(".owl-item.active").last().index();

            if (current > end) {
                sync2.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                sync2.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data("owl.carousel").to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data("owl.carousel").to(number, 300, true);
        });
    });
</script>
<!-- owl cursol end -->
<!-- owl cursol slide start -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        var owl = $("#staff");
        owl.owlCarousel({
            margin: 20,
            dots: true,
            nav: true,
            navText: [
                '<i class="fa-solid fa-arrow-left"></i>',
                '<i class="fa-solid fa-arrow-right-long"></i>',
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
             
                600: {
                    items: 3,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
    });
</script>
<!-- owl cursol slide end -->

<!-- top-btn start -->
<script>
    var btn = $("#button");

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass("show");
        } else {
            btn.removeClass("show");
        }
    });

    btn.on("click", function(e) {
        e.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, "300");
    });
</script>
<!-- top-btn  end-->

<!-- Sidebar start -->
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function(){
  $('.recentoption').on('change', function(e) {

    $('#rati').submit()
  });
  $('.gender').on('click', function() {
    
      var bla = $(this).val();
     
      if($('.female').is(":checked")){
            var female = 'female';
      }else{
        var female = '';
      }
      if($('.male').is(":checked")){
            var male = 'male';
      }else{
        var male = '';
      }
      if($('.transgender').is(":checked")){
            var transgender = 'transgender';
      }else{
        var transgender = '';
      }


      
     
      $.ajax({
      type: 'POST',
      dataType: 'json',
      url: "http://adultx.eoxyslive.com/model-filter",
      data: {
        female: female,
        male: male,
        transgender: transgender,
        _token: 'NOf3ZGg27pjBDn3L0HhQaXfOAs6RcnzeIZjnJCYJ'
      },
      success: function(response) {
        // 
        if (response.status) {
          setTimeout(function() {
            $(".div_loader").hide();
          }, 1500);
          jQuery('#postdata').html(response.data);
        } else {
          jQuery('#postdata').html('')
         
        }
      }
    });
      });
  });
  function openfilter() {
    document.getElementById("Filter-wrapp").style.width = "360px";
  }

  function closefilter() {
    document.getElementById("Filter-wrapp").style.width = "0";
  }
</script>
</body>
<style type="text/css">
    @media screen and (max-width: 700px) {
        .mobile_account_logs{
            display: block !important;
        }
        .desktop_account_logs{
            display: none;
        }
        .row.account_log_border {
    border-bottom: 2px solid #998b8b24;
}
}
    .mobile_account_logs{
        display: none;
    }
    h3 {
    font-family: "Montserrat", sans-serif;
}
.plus-icon { /* padding: 0 0 2px 7px; */ background-color: #ffffffb8; margin-left: 5px; height: 26px; width: 26px; text-align: center; /* padding-right: 1px; */ margin-right: 0px; border-radius: 21px; } .login-btn { background: linear-gradient(90deg,
        #af2990 0%, #4c2acd 100%); width: 158px; height: 48px; border-radius: 6px; font-family: "Montserrat"; font-weight: 700; font-size: 14px; line-height: 17px; text-transform: uppercase; color: #fff; border: none; outline: none; } .joinfree1 { /*
        border: 1px solid #c73ca9; */ /* border-radius: 6px; */ /* color: #c73ca9; */ font-family: "Montserrat"; font-style: normal; font-weight: 700; font-size: 14px; line-height: 17px; width: 170px; height: 48px; background-color: #0f1e2e; outline:
        none; margin-right: 10px; } .name-and-wallat { color: #A9AEB4; font-family: 'Montserrat'; font-style: normal; font-weight: 600; font-size: 15px; line-height: 18px; }
        .onile-icon {
    height: 12px;
    width: 12px;
    background-color: #48A45C;
    border-radius: 18px;
}.sidebar-wrapper{
    font-family: 'Montserrat';
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 17px;
}
.online-models {
    border-radius: 4px;
}.account {
    border-radius: 4px;
}.details{
    font-family: 'Montserrat';
font-style: normal;
font-weight: 700;
font-size: 24px;
line-height: 29px;
    border-radius: 6px;
}
.callsing-onpage {
    position: absolute;
    width: 30px;
    height: 30px;
    background: #ffffff00;
    color: #fff;
    top: 5px;
    right: 4px;
    border-radius: 50%;
    font-size: 11px;
    padding: 9px;
    cursor: pointer;
}
.colname-wrapper {
  bottom:84px;
    position: absolute;
    display: flex;
    flex-direction: column;
    padding: 13px;
    left: 77px;
}
.fa.fa-2x {
    color: black;
    padding: 13px 14px 13px 16px;
    border-radius: 75%;
    background-color:#f9f9f036;
}
.col-sm-12.col-md-9.col-xl-9 {
    padding: 62px;
}
.fa-2x {
     font-size: 1.2em;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color:#C73CA9;
    background-color: #081420;
}
ul#pills-tab {
    border-bottom: 1.9px solid #62004d;
}
 .explore-post-wraper {
    width: 53%;
    color: #fff;
}
.explorepost-inner-wrapper {
    display: flex;
    justify-content: space-between;
    width: 100%;
    /* padding: 10px 0px; */
    flex-wrap: wrap;
}
    .explore-posts-wraper {
    background: #0c1d2d;
    width: 100%;
    padding: 10px 15px;
    border-radius: 12px;
    margin-bottom: 15px;
}
.mobile_card.card.text-white {
    font-size: 12px;
    color: #ebe4e4ab !important;
    padding-bottom: 11px;
    /* background-color: #fff !important; */
}

.filter-wrapepr {
    width: 41%;
    background: #0c1d2d;
    border-radius: 12px;
    color: #fff;
    margin-top: 17px;
    padding: 10px;
}
.explore-posts-wraper {
  margin-top: 8px;
    background: #0c1d2d;
    width: 100%;
     padding: 10px 15px; 
    border-radius: 12px;
    margin-bottom: -8px;
}


.list-group-item {
  padding: 0px 12px;
    background-color: #0C1D2D;
    position: relative;
    display: block;
    margin-bottom: -1px;
    border: 1pxsolidrgba(0,0,0,.125);
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #d0d4d9;
}
/*li.list-group-item {
    padding-top: 17px;
}*/
span.item:hover{
  background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
}
li.list-group-item:hover{
  border-left: 2.5px solid #C73CA9;
}
.list-group {
    background: #0C1D2D;
    border-radius: 6px;
}
span.item {
      border-radius: 7px;
   height: 52px;
    background-color: #0C1D2D;
    position: relative;
    display: block;
    padding: 15px 6px 16px 1px;
    margin-bottom: -1px;
    border: 1pxsolidrgba(0,0,0,.125);
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #d0d4d9;
}
i.bi {
    margin-right: 12px;
}
tr{
    font-family: 'Montserrat'; font-style: normal;
}
table {
  font-family: 'Montserrat';
    font-style: normal;
  border-collapse: collapse;
  width: 100%;
}

td, th {
    border-bottom: 1px solid #202c3e;
  text-align: left;
  padding: 12px;
  font-size: 13px;
}
tr {
    color: #818283;
}
/*
tr:nth-child(even) {
  background-color: #dddddd;
}*/
.sidebar-wrapper {
    background: #0c1d2d;
     margin:0px; 
}
th {
    color: #bdbdbd;
}
tr.t_head {
    border: 0px;
    background-color: #0C1D2D;
}
  </style>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "200";
    }
</script>