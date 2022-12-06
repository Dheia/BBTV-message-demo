<script src="{{ asset('js/jquery.js') }}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/slidediv.js') }}"></script>




<script>
    
 
 $(document).on("click","#lg_btn" function() {
        console.log('asdsdddsdasdad');
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
                // sync2.data("owl.carousel").to(current - onscreen, 100, true);
                sync2.data("owl.carousel").to(current, 100, true);
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
   
</script>
<!-- owl cursol end -->
<!-- owl cursol slide start -->

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

                800: {
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
     
     
     $(".dots").click(function() {
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
</script>
<!-- top-btn  end-->

<!-- Sidebar start -->
<script>
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
      function copyToClipboard(text) {
      
        var sampleTextarea = document.createElement("textarea");
        document.body.appendChild(sampleTextarea);
        sampleTextarea.value = text; //save main text in it
        sampleTextarea.select(); //select textarea contenrs
        document.execCommand("copy");
        document.body.removeChild(sampleTextarea);
    }

    function myFunction() {
      
        var copyText = document.getElementById("myInput");
        copyToClipboard(copyText.value);
    }
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>


<script>
    //   $(document).on("click",".singupbtn"function() {
    //     alert('sdfs');
    //              var $form = $(this),
          
    //              data = _.object( _.map( $form.serializeArray(), function(item) {
    //                 return [item.name, item.value.trim()];
    //              }));

    //         localStorage.setItem('data', JSON.stringify(data));
    //         var name = $(this).attr('name');
    //         $(".role").val(name)
    //     })
    $(document).ready(function() {
        $('.recentoption').on('change', function() {

            $("#recentoption").val(this.value);

            $("#serch").submit();
        });
        $('.filter').on('click', function() {
            $("#serch").submit();
        });
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
    $(document).on("click", ".viewmore", function() {
        var id = $("input[name='modelvalue']").val();
        var take = $(this).val();
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: "{{ route('view-more') }}",
            data: {
                id: id,
                take: take
            },
            success: function(response) {
                if (response.status) {
                    jQuery('#feed_data').html(response.online);
                    jQuery('#loadbtn').html(response.take1);
                }
            }
        });
    });

    $('.playpause').parent().click(function() {
        if ($(this).children(".feed_video").get(0).paused) {
            $(this).children(".feed_video").get(0).play();
            $(this).children(".playpause").fadeOut();
        } else {
            $(this).children(".feed_video").get(0).pause();
            $(this).children(".playpause").fadeIn();
        }
    });
</script>

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
    $("#Previous").click(function() {
        $("#next").show();
        $("#submit").hide();
        $("#Div2").hide();
        $("#Div1").show();
        $("#Previous").hide();

    });
</script>
<script>
    $(document).ready(function() {

        $(".submit").click(function(e) {
            e.preventDefault();
            checkoutvalue = 1;


            var Govt_id = $('#Govt_id').val();
            var Hold_id = $('#Hold_id').val();

            if (Govt_id == '') {
                $('.Govt_id_error').text('Goverment ID is required');
                checkoutvalue = 0;
            } else {
                $('.Govt_id_error').text('');
            }

            if (Hold_id == '') {
                $('.Hold_id_error').text('Holding ID is required');
                checkoutvalue = 0;
            } else {
                $('.Hold_id_error').text('');
            }

            if (checkoutvalue == 1) {

                $('.model_store_form').submit();

            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#next").click(function(e) {

            e.preventDefault();
            checkoutvalue = 1;

            var stage_name = $('.stage_name').val();
            var first_name = $('.first_name').val();
            var first_name = $('.first_name').val();
            var phone_number = $('.phone_number').val();

            var url1 = $('.url1').val();
            var url2 = $('.url2').val();
            var url3 = $('.url3').val();

            var last_name = $('.last_name').val();
            var email = $('.email').val();
            if (url1 == '' && url2 == '' && url3 == '') {
                   $('.url_error').text('Please enter at least one url');
                checkoutvalue = 0;
                $(window).scrollTop(1000);
                
                 }
                 else {
                    $('.url_error').text('');
                    if( url1 != '' && !~url1.indexOf(".") ) {
                    $('.url_error_url1').text('Please enter a valid url');

                     checkoutvalue = 0;

                     $(window).scrollTop(1000);

                }else{
                   
                $('.url_error_url1').text('');
                }
                if(url2 != '' && !~url2.indexOf(".") ) {
                    $('.url_error_url2').text('Please enter a valid url');
                    checkoutvalue = 0;

                    $(window).scrollTop(1000);
                }else{
                   
                $('.url_error_url2').text('');
                }
                if(url3 != '' && !~url3.indexOf(".") ) {
                    $('.url_error_url3').text('Please enter a valid url');
                    checkoutvalue = 0;

                    $(window).scrollTop(1000);
                  
                }else{
                   
                $('.url_error_url3').text('');
                }
              
            }


            if (phone_number == '') {
                $('.phone_number_error').text('Contact number is required');
                checkoutvalue = 0;
               $('html, body').animate({
                    scrollTop: $(".phone_number_error").offset().top
                    },200);
            } else {
                $('.phone_number_error').text('');
            }
              
            if (email == '') {
                $('.email_error').text('Email is required');
                checkoutvalue = 0;
               $('html, body').animate({
                    scrollTop: $(".email_error").offset().top
                    },200);
  

            } else {
                $('.email_error').text('');
            }
          

            if (last_name == '') {
                $('.last_name_error').text('Last name is required');
                checkoutvalue = 0;
                $(window).scrollTop(1000);


            } else {
                $('.last_name_error').text('');
            }

            if (first_name == '') {
                $('.first_name_error').text('First name is required');
                checkoutvalue = 0;
                $(window).scrollTop(1100);

            } else {
                $('.first_name_error').text('');
            }
         

            if (stage_name == '') {
                $('.stage_name_error').text('Stage name is required');
                checkoutvalue = 0;
                $(window).scrollTop(1000);
            } else {
                $('.stage_name_error').text('');
            }

                                    
          





            if (checkoutvalue == 1) {
                $("#next").hide();
                $(".submit").show();
                $("#Div2").show();
                $("#Div1").hide();
                $("#Previous").show();

            }
        });
    });
</script>

<script>
    $(document).ready(function() {
         $( window ).unload(function() {
            localStorage.removeItem('isAuth');
        });
        // $(".singupbtn").click(function()  {
        //     localStorage.removeItem('isAuth');
        //     localStorage.removeItem('data');
        // });
        $(".singupbtn").click(function() {
            var name = $(this).attr('name');
            $(".role").val(name)
        })
        $(".applyasmodel-btn").click(function() {
            var name = $(this).attr('name');
            $(".role").val(name)
        })
    });
</script>
<script type="text/javascript">
    function password_show_hide_signup() {
        var x = document.getElementById("signup_password");
        var show_eye_signup = document.getElementById("show_eye_signup");
        var hide_eye_signup = document.getElementById("hide_eye_signup");
        hide_eye_signup.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye_signup.style.display = "none";
            hide_eye_signup.style.display = "block";
        } else {
            x.type = "password";
            show_eye_signup.style.display = "block";
            hide_eye_signup.style.display = "none";
        }
    }
</script>

<script type="text/javascript">
    function password_show_hide_log() {
        var x = document.getElementById("password_sign");
        var show_eye_log = document.getElementById("show_eye_log");
        var hide_eye_log = document.getElementById("hide_eye_log");
        hide_eye_log.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye_log.style.display = "none";
            hide_eye_log.style.display = "block";
        } else {
            x.type = "password";
            show_eye_log.style.display = "block";
            hide_eye_log.style.display = "none";
        }
    }
</script>

<style type="text/css">
    i#show_eye_signup {
        color: #8c9297;
    }

    .terms_link {
        color: #ffff !important;
    }

    .login_btn {
        background: transparent;
        border: 0px;
        display: flex;
    }

    @media only screen and (min-width: 576px) {}

    img.overlay_img {
        height: 7.3rem;
    }

    .modellink-wrrap a {
        font-size: 16.8px !important;
    }

    .modal-content {
        background-color: #0c1d2d !important;
        color: #fff !important;
    }

    .login-form-wraper1 {
        padding: 0px 30px 0px 30px;
        text-align: center;
    }

    .modal-body {
        text-align: center;
    }

    button.close {
        text-align: end;
        font-size: 30px;
    }

    .models__img.pt-0.mx-auto {
        transition: all .2s;
        width: 100%;
        padding-top: 100%;
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        top: -75px;
    }

    .loginfrom-wrapper1 {
        width: 100% !important;
        height: 100%;
    }

    video.feed_video {
        border-radius: 14px;
        width: 100%;
        height: 100%;
    }

    .content {
        padding: 5%;
    }

    .models__img.pt-0.mx-auto {
        transition: all .2s;
        width: 100%;
        padding-top: 100%;
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        top: -75px;
    }

    .loginfrom-wrapper1 {
        width: 100% !important;
        height: 100%;
    }

    video.feed_video {
        border-radius: 14px;
        width: 100%;
        height: 100%;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {

        $(".home-page-signup").click(function(e) {
      
            e.preventDefault();

            checkoutvalue = 1;


            var first_name_signup = $('.first_name_signup').val();
            var email_signup = $('.email_signup').val();
            var password = $('.password_signup').val();


            if (password == '') {
                $('.password_signup_error').text('Password is required');
                checkoutvalue = 0;
            }else{
                if (password.length < 8) {
                    checkoutvalue = 0;
                    $('.password_signup_error').text('The password must be at least 8 characters.');
                    
                }else{
                    checkoutvalue = 1;
                    $('.password_signup_error').text('');
                }
              
            }


            if ($(".agreement").prop("checked")){
            
                checkoutvalue = 1;
                $('.check_boxr').text('');
               

            } else {
                checkoutvalue = 0;
                $('.check_boxr').text('Checkbox required');
            }




            if (first_name_signup == ''){
                checkoutvalue = 0;
                $('.first_name_signup_error').text('First name is required');
                
            }else{
                $('.first_name_signup_error').text('');
            }



            if (email_signup == '') {
                $('.email_signup_error').text('Email is required');
                checkoutvalue = 0;
            }else{
                
                $('.email_signup_error').text('');
            }



          $this=$(this);
                              
            if (checkoutvalue == 1) {
               
                $.ajax({
                type: 'get',
                url: "{{ route('home-email-check') }}",
                data: {
                    'first_name': first_name_signup,
                    'password': password,
                    'email': email_signup,
                },
                success: function(response) {

                    if (response.status=='Email_taken') {
                        if (response.data>0) {
                        setTimeout(function() {
                          
                        }, 1500);
                        jQuery('.email_signup_error').html('Email already taken');
                        
                    }
                    }else{
                        if (response.status=='success') {
                            setTimeout(function() {
                          
                        }, 1500);
                       
                       $('.alert-dismissible').show();
                        $this.closest('form').find("input[type=text], input[type=email],input[type=password]").val("");
                        setTimeout(function() {
                        $('#cong_mess').fadeOut('fast');
                    }, 9000);
                        }
                       
                    }
                }
            });
            
            }
        });
     
    });

</script>
<script>
       
</script>