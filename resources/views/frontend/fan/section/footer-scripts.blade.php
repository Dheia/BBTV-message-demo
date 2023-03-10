<script src="{{url('js/vanillaEmojiPicker.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


<script src="{{ url('./js/slidediv.js') }}"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $(".backdrop").fadeOut();

        $(".loadMoreBtn").on("click",function() {
            
            var footerHeight = $('.footer-bg-wrapper').height();
            var positionFooter = $(".footer-bg-wrapper").position();
            $(this).hide();
            loadMore();
        });
    });
    
    // $(window).scroll(function() {
        
        
    
    //     // if((($(window).scrollTop() + 5) >= $(document).height() - $(window).height())) {
            
            
    //         // if(activeFeed == 'feeds') {
    //         //     console.log(activeFeed);
    //         // } 
    //         // // if(activeFeed == 'popular-feeds')
    //             // console.log(loadMore);
            
            
    //     // }
                
    // });

    function loadMore( parent ) {
        
        $('.load-more-loader').show();
        var take=$('.render-data-takes').val();
        var takeFeedPage=$('.render-data-takes-page').val();
        var takeFeedPagePopular=$('.render-data-takes-page-popular').val();
        var activeFeed = $('.active-feeds.active').data('active');
        
        var loadMore = $('.loadMore').data('status');
        if(loadMore)
        {
            $(".loadMore").data('status', 'false');
            var feed = $('.active-feed.active').data('feed');
            $.ajax({
                type: 'get',
                url: "{{ url('fan/feeds-render') }}",
                data: {
                    take:take,
                    takeFeedPage:takeFeedPage,
                    takeFeedPagePopular:takeFeedPagePopular,
                },
                success: function(response) {

                    if(feed == 'home-feed') {
                        $(".render-append").append(response.dataRender);
                        $('.render-data-takes').val(response.newTake);

                        if(response.dataRender=='' || response.newTake=='') {
                            $(".loadMore").data('status', 'false');
                            $(".home-feed .no-post").show();    
                        } else {
                            $(".loadMoreBtn").show();
                            $(".loadMore").data('status', 'true');
                        }

                        $('.slide-show').slick('slickAdd',response.dataRender);
                    }
                    $('.load-more-loader').hide();
                    // if ($(".feeds-all-section").hasClass("active")) {
                    if(feed == 'feed') {
                        $('.render-data-takes-page').val(response.newTakePage);
                        $('.first-render-data').append(response.feedData);
                        $('.slide-show').slick('slickAdd',response.feedData);
                        $('.second-render-data').append(response.feedDataSecond);
                        $('.slide-show').slick('slickAdd',response.feedDataSecond);
                        if(response.dataRender=='' || response.newTakePage=='' || response.feedDataSecond=='' || response.puplarDataSecond =='' || response.puplarData =='') {
                            $(".loadMore").data('status', 'false');
                            if(feed == 'feed')
                                $(".normal .no-post").show();
                            if(feed == 'popular')
                                $(".popular .no-post").show();
                                
                        } else {
                            $(".loadMoreBtn").show();
                            $(".loadMore").data('status', 'true');
                        }
                    }
                    
                    // if ($(".feeds-pupular-section").hasClass("active")) 
                    if(feed == 'popular'){
                        $('.render-data-takes-page-popular').val(response.takePopular);
                        $('.render-popular-first-section').append(response.puplarData);
                        $('.slide-show').slick('slickAdd',response.puplarData);
                        $('.render-popular-second-section').append(response.puplarDataSecond);
                        $('.slide-show').slick('slickAdd',response.puplarDataSecond);
                        if(response.puplarDataSecond =='' || response.puplarData =='') {
                            $(".loadMore").data('status', 'false');
                            if(feed == 'feed')
                                $(".normal .no-post").show();
                            if(feed == 'popular')
                                $(".popular .no-post").show();
                                
                        } else {
                            $(".loadMoreBtn").show();
                            $(".loadMore").data('status', 'true');
                        }
                    }

                    
                    
                    
                }
            });
        }
    }



    $(function() {
        $('.slide-show').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true, 
            dots: false,
            fade: true,
            autoplay: false,
        });
    });
    // var button = document.querySelector('.emoji-btn');
//     button.addEventListener('click', () => {
//     picker.togglePicker(button);
  
//     });

//     picker.on('emoji', emoji => {
//     alert(emoji);
//     document.querySelector("input").closest(".emoji-picker").value += emoji;
// });

   

        // new Splide(".second-slider").mount();

 

new EmojiPicker({
        trigger: [
            {
                selector: '.bank-icon',
                insertInto: '.serch-input-tag'
            },
        
        ],
        closeButton: true,
        //specialButtons: green
    });
function copy(text) {
        var copyText = text;
        var append_input = $('<input>');
        $('body').append(append_input);
        $(append_input).val(copyText); 
        append_input.select();
        document.execCommand("copy");
        $(append_input).remove();
        $('#copied-success').fadeIn(800);
        $('#copied-success').fadeOut(800);
}
    
$('#error').click(function(event) {
    toastr.error('Insufficient Credits.')
});

</script>
<style>
     /* this will set the toastr icon */
#toast-container > .toast-error {
content: "\f00C";
}

/* this will set the toastr style */
#toast-container > .toast-error {
margin-top:135px !important; 
background-color: red !important;
font-size:14px !important;
}

</style>
<script type="text/javascript">
$('#search').on('keyup', function() {

    $value = $(this).val();
    if ($(this).val().length > 2) {
        $.ajax({
            type: 'get',
            url: "{{ route('search-model') }}",
            data: {
                'search': $value
            },
            success: function(response) {

                if (response.status) {
                    setTimeout(function() {
                        $(".div_loader").hide();
                    }, 1500);
                    jQuery(".search-res").show();
                    jQuery('.search-box').html(response.output);

                } else {

                    jQuery(".search-res").hide();
                }
            }
        });
    } else {
        jQuery(".search-res").hide();
    }
})
</script>
<script type="text/javascript">
$('#search1').on('keyup', function() {

    $value = $(this).val();
    if ($(this).val().length > 2) {
        $.ajax({
            type: 'get',
            url: "{{ route('search-model') }}",
            data: {
                'search': $value
            },
            success: function(response) {

                if (response.status) {
                    setTimeout(function() {
                        $(".div_loader").hide();
                    }, 1500);
                    jQuery(".search-res1").show();
                    jQuery('.search-box1').html(response.output);

                } else {

                    jQuery(".search-res1").hide();
                }
            }
        });
    } else {
        jQuery(".search-res1").hide();
    }
})
</script>
<script>

    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true,
            "iconClass":"toast-custom"
        }
        toastr.error("{{ session('error') }}", {iconClass:"toast-custom"});
    @endif

    @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.warning("Warning");
    @endif


    $(function() {
        $('.toast').toast({})
        $('.status_wallet').on('change', function() {

            $('.wallet').submit();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click','.send-tip-ajax',function(e){
            var tipAmount= $(this).closest("#TipPoPup").find(".tip_amount").val();
            var modelID= $(this).closest("#TipPoPup").find(".tip_model_id").val();
            var tipMessage= $(this).closest("#TipPoPup").find(".tip_mess").val();

            $this=$(this);
            if(tipAmount>=1 && tipAmount<=999){

                $('.amount-error').html('');
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: "{{ url('fan/model-tip') }}",
                    data: {
                        tipAmount:tipAmount,
                        modelID:modelID,
                        tipMessage:tipMessage,
                    },
                    success: function(response) {
                        if (response.status=='insufficientCredit') {
                        toastr.error('Insufficient Credits.');
                        }
                        if (response.status=='success') {
                            $('.balence-visible').html('Tip send successfully');
                            $('#balence-visible').fadeIn(800).fadeOut(800);
                            $('.wallet-credit').html(response.wallet+' Cr');
                            $this.closest("#TipPoPup").find(".tip_amount").val('');
                            $this.closest("#TipPoPup").find(".tip_mess").val('');
                        }
                    }
                });
            }else{
                $('.amount-error').html('Amount must be $1 to $999');
            }
        });

        $(document).on("click", ".unlock-btn",function() {
            var _self = $(this);
            var id = $(this).data('id');
            var media_id = $(this).data('mediaid');
            var formData = {
                id: id,
                media_id:media_id
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{url('fan/feed-unlock-ajax')}}',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if(response.status) {
                        _self.closest('.unlock-btn-wrapepr-slider').remove();
                        $('.unlock-image-overly-'+media_id).remove();
                        
                        $('.expolor-img-'+media_id).attr('src', response.image);
                        $('.unlock-imag-'+media_id).attr('src', response.image);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }); 


        $(document).on('click','.feed_impressions',function(e){

            // var feedID= $(this).attr('value');
            var feedID= $(this).attr('data');
            var idIndex = $('.slick-track .slider-item.IndexID'+feedID).data('slick-index');

            $('.slide-show').slick('slickGoTo', idIndex);
            $('.Feed-pooup-model').addClass('Z-index');

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('fan/feed_impressions') }}",
                data: {
                    feedID:feedID,
                },
            
            });
        });

        $(document).on('click','.feed_impressions_popular',function(e){

            // var feedID= $(this).attr('value');
            var feedID= $(this).attr('data');
            var idIndex = $('.slick-track .slider-item.IndexID'+feedID).data('slick-index');
            // alert(feedID);
            $('.slide-show').slick('slickGoTo', idIndex);
            $('.Feed-pooup-model-popular').addClass('Z-index');

            // $.ajax({
            //     type: 'GET',
            //     dataType: 'json',
            //     url: "{{ url('fan/feed_impressions') }}",
            //     data: {
            //         feedID:feedID,
            //     },
            // });
        });

        $(document).on('click','.add-to-contact-ajax',function(e){

            var ModelID= $(this).attr('value');
            $this =$(this);
        
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('fan/add-contact-ajax') }}",
                data: {
                    ModelID:ModelID,
                },
                success: function(response) {
                    if (response.status=='added') {
                        $('.add-to-contact-ajax').html('<i class="bi bi-plus-lg   footer_icon"></i><b>Added</b>'); 
                        
                    } 
                }
            });

        });

        $(document).on('click','.Feed-pooup-model-close',function(e){
            $('.Feed-pooup-model').removeClass('Z-index');
            $('.Feed-pooup-model-popular').removeClass('Z-index');
        });

        $("#success-alert").fadeTo(2000, 500).sliwwdeUp(500, function(){
            $("#success-alert").slidewwwUp(500);
        });

        $('.recentoption').on('change', function() {

            $("#recentoption").val(this.value);

            $("#serch").submit();
        });

        $('.fan_mod_filter').on('change', function() {

            $("#fan_mod_filter").val(this.value);

            $("#serch").submit();
        });

        $('.filter').on('click', function() {
            $("#serch").submit();
        });

        $('.av_model').on('change', function() {

            $("#ar_model").val(this.value);

            $("#serch").submit();
        });

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
            responsiveClass: true,
            responsive: {
                320: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }

            }


        })
        .on("changed.owl.carousel", syncPosition2);

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
            responsiveClass: true,
            responsive: {
                320: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }

            }


        })
        .on("changed.owl.carousel", syncPosition2);

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
            responsiveClass: true,
            responsive: {
                320: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
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

$(document).ready(function() {
    var owl = $("#online-slider");
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
            350: {
                items: 2,
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
<script>
   function openNav() {
    $("#mySidenav").animate({
    width: '+=70%'
}, 1);
    $('#sidebar').addClass('d-none');
   $('.closebtn').removeClass('d-none');
    
 ;
}

function closeNav() {
    $("#mySidenav").animate({
    width: '+=0%'
}, 1);
    $('#sidebar').removeClass('d-none');
   $('.closebtn').addClass('d-none');
 
  
  
}
 $(document).ready(function() {
//Copy post popup 


//Copy post popup code--end
$(document).on('click','.dots',function(e){
    $(this).parent(".added").find(".mydropdown-menu").toggle();
});

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


});
$(document).ready(function() {
    $('.recentoption').on('change', function(e) {
        // 
        $('#rati').submit()
    });

    $('.fan_mod_filter').on('change', function(e) {

        $('#rati').submit()
    });

    $('.gender').on('click', function() {

        var bla = $(this).val();

        if ($('.female').is(":checked")) {
            var female = 'female';
        } else {
            var female = '';
        }
        if ($('.male').is(":checked")) {
            var male = 'male';
        } else {
            var male = '';
        }
        if ($('.transgender').is(":checked")) {
            var transgender = 'transgender';
        } else {
            var transgender = '';
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ route('model-filter') }}",
            data: {
                female: female,
                male: male,
                transgender: transgender,
                _token: '{{ csrf_token() }}'
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

    $(document).on('change','.balace-visible-invisible',function(){
  
        $.ajax({

            type: 'GET',
            dataType: 'json',
            url: "{{ url('fan/waalet_status') }}",
            data: {
              
            },
            success: function(response) {
                   if (response.status=='Invisible') {
                    $('.balence-visible').html('Credit balance invisible');
                    $('#balence-visible').fadeIn(800).fadeOut(800);
                }
                if(response.status=='visible'){
                    $('.balence-visible').html('Credit balance visible');
                    $('#balence-visible').fadeIn(800).fadeOut(800);
                }
              }
        });
    });

    $(document).on('click','.send-message-to-feed',function(){
        // 
        var model_id = $(this).val();
        var message= $(this).closest(".send-mess").find(".emoji-picker-input").val();
        var $this=$(this);
        if(message!=''){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('fan/send-message-feed') }}",
                data: {
                    modelId:model_id,
                    message:message,
                    
                },
                success: function(response) {
                    if (response.status=='insufficentcredit') {

                        toastr.options.preventDuplicates = true;
                        toastr.error('Insufficient Credits.');
                    }
                    if (response.status=='succuss') {
                        
                        $('.balence-visible').html('Message send successfully');
                        $('#balence-visible').fadeIn(800).fadeOut(800);
                        $this.closest(".send-mess").find(".emoji-picker-input").val('');
                        $('.wallet-credit').html(response.wallet+' Cr');
                    }
                
                }
            });
        }
    });

    var imgUpload1 = document.getElementById('profile-upload-img'), totalFiles1, previewTitle, previewTitleText, img;

    imgUpload1.addEventListener('change', previewImgs, true);

function previewImgs(event) {
    
    totalFiles1 = imgUpload1.files.length;
    // console.log(imgUpload1.files);
  
    for (var i = 0; i < totalFiles1; i++) {
        
        // console.log(event.target.files[i].name);
        var file_name_string = event.target.files[i].name;
            var file_name_array = file_name_string.split(".");
            var file_extension = file_name_array[file_name_array.length - 1];
                wrapper = document.createElement('div');
                img = document.createElement('img');
                img.src = URL.createObjectURL(event.target.files[i]);
               $('.profile-img-appent').html(img);
                // wrapper.appendChild(img);
               }
        }
});

function openfilter() {
    document.getElementById("Filter-wrapp").style.width = "360px";
}

function closefilter() {
    document.getElementById("Filter-wrapp").style.width = "0";
}


$(document).ready(function() {

    $('.Add_contact').on('click', function() {});
});
</script>

<script>
$('.model_tab').click(function() {

    if ($(this).attr('aria-selected') == 'false') {

        $('#model-collection').submit();
    }

});
$('.time_tab').click(function() {

    if ($(this).attr('aria-selected') == 'false') {

        $('#time-collection').submit();
    }

});

$(document).ready(function() {
    $('.unlock_feed').click(function(e) {
        //$(this).parent(".unclock-overlay").find(".locked-text").addClass("d-none");
        $(this).closest(".unclock-overlay").find(".locked-text").hide();
        $(this).closest(".unclock-overlay").find(".unlock-text").show();

    });
    $(document).on('click','.Tip_model_id',function(){

        var model_id = $(this).attr("data");
        $('.tip_model_id').val(model_id);

    });
    $('.tipoption').on('click', function() {
        var value = $(this).attr("value");
        $('.tip_amount').val(value);

    });
    $('.report_post').on('click', function() {
        var feed_id = $(this).attr("data");
        $('.report_feed_id').val(feed_id);

    });
    $('.CopyLink').on('click', function() {

        var data_id = $(this).attr("data");

        $('.copyTo').html(data_id);
    });

    $(document).on('click','.addLike',function(e){
    
        var feed_id = $(this).attr("feed_id");
        $this = $(this);

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{ url('fan/add-like') }}",
            data: {
                feed_id: feed_id,
            },

            success: function(response) {
                if (response.status == 'liked') {
                    setTimeout(function() {

                        $this.closest(".addwish").find(".LikesOnFeed").html(
                            response.Total_like);
                        $this.closest(".addwish").find(".addLike").addClass(
                            "feed_liked");
                            $this.closest(".addwish").find(".addLike").removeClass(
                            "fa-heart-o");
                            $this.closest(".addwish").find(".addLike").addClass(
                            "fa-heart");

                    }, 150);

                } else {
                    if (response.status == "unliked") {

                        setTimeout(function() {
                            $this.closest(".addwish").find(".addLike").addClass(
                            "fa-heart-o");
                            $this.closest(".addwish").find(".addLike").removeClass(
                            "fa-heart");
                            $this.closest(".addwish").find(".LikesOnFeed").html(
                                response.Total_like);
                            $this.closest(".addwish").find(".addLike")
                                .removeClass("feed_liked");

                        }, 150);
                    }
                }
            }
        });
    });
});
$(document).ready(function() {
    $('.recentoption').on('change', function() {

        $("#recentoption").val(this.value);

        $("#serch").submit();
    });

    $('.fan_mod_filter').on('change', function() {

        $("#fan_mod_filter").val(this.value);

        $("#serch").submit();
    });

    $('.filter').on('click', function() {
        $("#serch").submit();
    });
    $('.av_model').on('change', function() {
        $("#rati").submit();
    });
    $('.packselect').click(function(){
       
        $('.packselect').html('Select');
        var fieldID = $(this).val();
       
        $(this).html('Seleted');
        $('.amount').val(fieldID);
    });


    // Feeds add to collection with ajax

    $(document).on("click",".add-collection-ajax",function() {

        var feed_value = $(this).attr("value");
        $this=$(this);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{ url('fan/add-collection') }}",
            data: {
                'id': feed_value,
              
            },
            success: function(response) {

                if (response.status) {
                    setTimeout(function() {
                        $(".div_loader").hide();
                    }, 1500);
                    $this.html('Added to collection')
                    $('#feed-add-collection-success').fadeIn(800);
                    $('#feed-add-collection-success').fadeOut(800);
                    
                } else {

                }
            }
        });
    }) 
});


function openfilter() {
    if ($(window).width() < 767) {
        document.getElementById("Filter-wrapp").style.width = "240px";
    } else {
        document.getElementById("Filter-wrapp").style.width = "360px";
    }
}
//   $(document).click(function(event){
//     document.getElementById("Filter-wrapp").style.width = "0";            
//   });
function closefilter() {
    document.getElementById("Filter-wrapp").style.width = "0";
}



</script>
