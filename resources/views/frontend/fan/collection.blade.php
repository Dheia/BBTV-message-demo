@extends('frontend.fan.main')
@section('content')
<div class="col-sm-12 col-md-8 col-xl-9 mt-5 mb-5">
   <div class="onlinepage-hading-wrapp mt-4">
      <h1><b>Collection</b></h1>
      <div class="row d-flex">
         <ul class="nav nav-pills mb-3 justify-content-between mr-2" id="pills-tab" role="tablist">
            <li class="nav-item chat_nav">
               <a
                  class="nav-link nav_tab active"
                  id="pills-all-tab"
                  data-toggle="pill"
                  href="#pills-all"
                  role="tab"
                  aria-controls="pills-all"
                  aria-selected="true"
                  > <small>All</small></a
                  >
            </li>
            <li class="nav-item chat_nav">
               <a
                  class="nav-link nav_tab"
                  id="pills-Pictures-tab"
                  data-toggle="pill"
                  href="#pills-Pictures"
                  role="tab"
                  aria-controls="pills-Pictures"
                  aria-selected="false"
                  >
                  <div>
                     <small>Pictures
                     </small>
                  </div>
               </a
                  >
            </li>
            <li class="nav-item chat_nav">
               <a
                  class="nav-link nav_tab"
                  id="pills-Videos-tab"
                  data-toggle="pill"
                  href="#pills-video"
                  role="tab"
                  aria-controls="pills-Videos"
                  aria-selected="false"
                  >
                  <div>
                     <small>Videos
                     </small>
                  </div>
               </a
                  >
            </li>
         </ul>
         <ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist">
            <li class="nav-item chat_nav">
               <a
                  class="nav-link nav_tab @if($active_tab=='0') active @endif  time_tab"
                  id="pills-Time-tab"
                  data-toggle="pill"
                  href="#pills-Time"
                  role="tab"
                  aria-controls="pills-Time"
                  @if($active_tab=='0') aria-selected="true" @else aria-selected="false" @endif
                  
                  > <small>Time</small></a
                  >
            </li>
            <li class="nav-item chat_nav ">
               <a
                  class="nav-link nav_tab @if($active_tab=='1') active @endif model_tab"
                  id="pills-Model-tab"
                  data-toggle="pill"
                  href="#pills-Model"
                  role="tab"
                  aria-controls="pills-Model"
                  @if($active_tab=='1')  aria-selected="true" @else aria-selected="false" @endif
                 
                  >
                  <div>
                     <small>Model
                     </small>
                  </div>
               </a
                  >
            </li>
         </ul>
      </div>
      <!-- <div class="filter-section">
         <form id="rati" method="get" action="http://adultx.eoxyslive.com/phone-sex">
            <select name="sort" class="recentoption">
               <option >--Select--</option>
               <option value="online" >Recently Active</option>
               <option value="joining" >Join Date</option>
               <option value="rank" >Rank</option>
               <option value="low-to-high" >Price: Low to High</option>
               <option value="high-to-low" >Price: High to Low  </option>
            </select>
         </form>
         <button class="filterbtn"  onclick="openfilter()">
         <i class="fa-solid fa-sliders"></i>
         </button>
      </div> -->
   </div>
   <form action="" id="model-collection" Method="Get">
    <input type="hidden" name="f" value="1">
   </form>
   <form action="" id="time-collection" Method="Get">
    <input type="hidden" name="f" value="0">
   </form>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active " id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" style="color: #fff"
         >
         @foreach($data as $key => $item) 
         <h5 class="mt-3 mb-0"><b class="text-white ml-2">{{$key}}</b></h5>
         <div class="row d-flex mt-3">
            @foreach($item as $value)
            @if ($value->media_type == 'jpg' or
            $value->media_type == 'png' or
            $value->media_type == 'jpeg' or
            $value->media_type == 'gif')
            <div class="col-md-6 col-lg-3 col-sm-6 mt-2">   
               <img class="model-img" style="border-radius: 11px;" src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                  alt="Model-Image">
            </div>
            @endif
            @if ($value->media_type == 'mp4')
            <div class="col-md-6 col-lg-3 col-sm-6 mt-2">
               <video width="100%" height="100%" controls>
                  <source
                     src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                     type="video/mp4">
                  <source
                     src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                     type="video/ogg">
                  Your browser does not support the video
                  tag.
               </video>
            </div>
            @endif
            @endforeach
         </div>
         @endforeach
      </div>
      <div class="tab-pane fade" id="pills-Pictures" role="tabpanel" aria-labelledby="pills-Pictures-tab" style="color: #fff"
         >
         @foreach($data as $key => $item) 
         <h5 class="mt-3 mb-0"><b class="text-white ml-2">{{$key}}</b></h5>
         <div class="row d-flex mt-3">
            @foreach($item as $value)
            @if ($value->media_type == 'jpg' or
            $value->media_type == 'png' or
            $value->media_type == 'jpeg' or
            $value->media_type == 'gif')
            <div class="col-md-6 col-lg-3 col-sm-6 mt-2">   
               <img class="model-img" style="border-radius: 11px;" src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                  alt="Model-Image">
            </div>
            @endif
            @endforeach
         </div>
         @endforeach
      </div>
      <div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-Pictures-tab" style="color: #fff"
         >
         @foreach($data as $key => $item) 
         @if(isset($item))
         <h5 class="mt-3 mb-0"><b class="text-white ml-2">{{$key}}</b></h5>
         <div class="row d-flex mt-3">
            @foreach($item as $value)
            @if ($value->media_type == 'mp4')
            <div class="col-md-6 col-lg-3 col-sm-6 mt-2">
               <video width="100%" height="100%" controls>
                  <source
                     src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                     type="video/mp4">
                  <source
                     src="{{ url('images/Feed_media') . '/' . $value->medai ?? '' }}"
                     type="video/ogg">
                  Your browser does not support the video
                  tag.
               </video>
              
            </div>
            @endif
            @endforeach
         </div>
         @endif
         @endforeach
      </div>
  
   </div>




   <div id="Filter-wrapp" class="filtersidenav">
    <div class="filterside-wrapepr">
       <a href="javascript:void(0)" class="closebtn" onclick="closefilter()">&times;</a>
       <div class="gender-filter-wrapper">
          <span> Gender </span>
          <label>
             <div class="ckeckfilter">
                <input type="checkbox" id="checkbox-2-11" class="filter-checkbox filterbig-checkbox" />
          <label
             for="checkbox-2-11"></label>
          Female
          </div>
          </label>
          <label>
             <div class="ckeckfilter">
                <input type="checkbox" id="checkbox-2-12" class="filter-checkbox filterbig-checkbox" />
          <label
             for="checkbox-2-12"></label>
          Male
          </div>
          </label>
          <label>
             <div class="ckeckfilter">
                <input type="checkbox" id="checkbox-2-13" class="filter-checkbox filterbig-checkbox" />
          <label
             for="checkbox-2-13"></label>
          Transgender
          </div>
          </label>
       </div>
       <div class="gender-filter-wrapper">
          <span> Orientation </span>
          <label>
          <input type="radio" name="Pricing" id="s-option1.0." />
          <label for="s-option1.0."> Straight</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
          <label>
          <input type="radio" name="Pricing" id="s-option1.1." />
          <label for="s-option1.1."> Bisexual</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
          <label>
          <input type="radio" name="Pricing" id="s-option1.2." />
          <label for="s-option1.2."> Lesbian</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
          <label>
          <input type="radio" name="Pricing" id="s-option1.3." />
          <label for="s-option1.3."> Gay</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
       </div>
       <div class="language-filter-wrapper">
          <span> Ethnicity </span>
          <div class="language-filter-wrapp">
             <div class="gender-filter-wrapper">
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.0." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.0."></label>
                Asian
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.1." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.1."></label>
                Black / Ebony
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.2." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.2."></label>
                Indian
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.3." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.3."></label>
                Latina / Hispanic
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.4." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.4."></label>
                Middle Eastern
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.5." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.5."></label>
                Mixed
                </div>
                </label>
             </div>
             <div class="gender-filter-wrapper">
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.6." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.6."></label>
                Native Americans
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.7." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.7."></label>
                Pacific Islander
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.8." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.8."></label>
                White / Caucasian
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.9." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.9."></label>
                Other
                </div>
                </label>
             </div>
          </div>
       </div>
       <div class="language-filter-wrapper">
          <span> Language </span>
          <div class="language-filter-wrapp">
             <div class="gender-filter-wrapper">
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.0." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.0."></label>
                English
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.1." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.1."></label>
                Spanish
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.2." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.2."></label>
                French
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.3." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.3."></label>
                German
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.4." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.4."></label>
                Italian
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.5." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.5."></label>
                Russian
                </div>
                </label>
             </div>
             <div class="gender-filter-wrapper">
             </div>
          </div>
       </div>
       <div class="gender-filter-wrapper">
          <span> Model Category </span>
          <label>
          <input type="radio" name="Pricing" id="s-option1.0." />
          <label for="s-option1.0."> Porn Stars</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
          <label>
          <input type="radio" name="Pricing" id="s-option1.1." />
          <label for="s-option1.1."> Cam Model</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
          <label>
          <input type="radio" name="Pricing" id="s-option1.2." />
          <label for="s-option1.2."> Fetish</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
          <label>
          <input type="radio" name="Pricing" id="s-option1.3." />
          <label for="s-option1.3."> Content Creator</label>
          <div class="check">
             <div class="inside"></div>
          </div>
          </label>
       </div>
       <div class="language-filter-wrapper">
          <span> Fetishes </span>
          <div class="language-filter-wrapp">
             <div class="gender-filter-wrapper">
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.0." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.0."></label>
                Amateur
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.1." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.1."></label>
                Anal
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.2." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.2."></label>
                BBC
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.3." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.3."></label>
                BBW
                </div>
                </label>
             </div>
             <div class="gender-filter-wrapper">
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.4." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.4."></label>
                BDSM
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.5." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.5."></label>
                Big Ass
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.6." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.6."></label>
                Big Tits
                </div>
                </label>
             </div>
          </div>
       </div>
       <div class="language-filter-wrapper">
          <span> Hair </span>
          <div class="language-filter-wrapp">
             <div class="gender-filter-wrapper">
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.0." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.0."></label>
                Black
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.1." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.1."></label>
                Blonde
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.2." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.2."></label>
                Brunette
                </div>
                </label>
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.3." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.3."></label>
                Redhead
                </div>
                </label>
             </div>
             <div class="gender-filter-wrapper">
                <label>
                   <div class="ckeckfilter">
                      <input type="checkbox" id="checkbox-2.4." class="filter-checkbox filterbig-checkbox" />
                <label
                   for="checkbox-2.4."></label>
                Other
                </div>
                </label>
             </div>
          </div>
       </div>
       <div class="sideaplly-btn-wraper">
          <button class="filter-applybtn">Apply</button>
          <a href="#">Clear</a>
       </div>
    </div>
 </div>

</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function(){
   $('.recentoption').on('change', function(e) {
   
   $('#rati').submit()
   });
   $('.filtersidenav').on('click', function(e) {
   alert('ds');
   $('#rati').submit()
   });
   });
   function openfilter() {
   document.getElementById("Filter-wrapp").style.width = "360px";
   }
   
   function closefilter() {
   document.getElementById("Filter-wrapp").style.width = "0";
   }
</script>
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
   /*new css*/
</style>
</html>
<script type="text/javascript">
   <script
   src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
   crossorigin="anonymous"
   >
</script>
<script
   src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
   integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
   crossorigin="anonymous"
   ></script>
<script
   src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
   integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
   crossorigin="anonymous"
   ></script>
<script
   src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
   crossorigin="anonymous"
   ></script>
<!-- Sidebar start -->
<script>
   function openNav() {
     document.getElementById("mySidenav").style.width = "100%";
   }
   
   function closeNav() {
     document.getElementById("mySidenav").style.width = "200";
   }
</script>