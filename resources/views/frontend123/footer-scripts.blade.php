<script src="{{ URL::asset('js/jquery.js') }}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
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


<script>
    $(document).ready(function() {
        $('.recentoption').on('change', function() {

            var page = $("input[name='page']").val();
            alert(page);
            var data = $(this).val();
            $("input[name='sortfilter']").val(data);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "{{ route('model-sort') }}",
                data: {
                    sort: data,
                    page: page,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status) {
                        if (response.page == 'online') {
                            $('.Online-now-wrapp').html(response.online);
                        }
                        if (response.page == 'phone') {
                            $('.OnlineNow-wrappers').html(response.online);
                        }
                        if (response.page == 'video') {
                            $('.Online-now-wrapp').html(response.online);
                        }
                    } else {
                        jQuery('.Online-now-wrapp').html('');
                    }
                }
            });
        });

        $('.filter').on('click', function() {

            var page = $("input[name='page']").val();

            var orient = $("input[name='orientation']:checked").val();
            $("input[name='orient']").val(orient);
            var category = $("input[name='category']:checked").val();
            $("input[name='category']").val(category);

            var ethnicity = [];
            $.each($("input[name='ethnicity']:checked"), function() {
                ethnicity.push($(this).val());
            });

            $("input[name='ethnicity']").val(ethnicity);
            var favorite = [];
            $.each($("input[name='gender']:checked"), function() {
                favorite.push($(this).val());
            });
            $("input[name='gender']").val(favorite);
            var language = [];
            $.each($("input[name='language']:checked"), function() {
                language.push($(this).val());
            });
            $("input[name='language']").val(language);
            var fetish = [];
            $.each($("input[name='fetish']:checked"), function() {
                fetish.push($(this).val());
            });
            $("input[name='fetish']").val(fetish);
            var hair = [];
            $.each($("input[name='hair']:checked"), function() {
                hair.push($(this).val());
            });
            $("input[name='hair']").val(hair);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "{{ route('model-filter') }}",
                data: {
                    gender: favorite,
                    orient: orient,
                    ethnicity: ethnicity,
                    language: language,
                    category: category,
                    fetish: fetish,
                    hair: hair,
                    page: page,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // 
                    if (response.status) {

                        if (response.page == 'online') {
                            $('.Online-now-wrapp').html(response.online);

                        }
                        if (response.page == 'phone') {
                            $('.OnlineNow-wrappers').html(response.online);
                        }
                        if (response.page == 'video') {
                            $('.Online-now-wrapp').html(response.online);
                        }

                        jQuery('.spec').html(response.onlinecount);
                        $("#pagination").html(response.paginghtml);
                    } else {
                        jQuery('.Online-now-wrapp').html('');
                        jQuery('.spec').html('');

                    }
                }
            });
        });
    });


    function openfilter() {
        if ($(window).width() < 767) {
            document.getElementById("Filter-wrapp").style.width = "240px";
        } else {
            document.getElementById("Filter-wrapp").style.width = "360px";
        }

    }

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
                    jQuery('#loadbtn').html(response.take);


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
        if ($(this).val().length > 3) {
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
<script>
    $(function() {
        $(document).on("click", "#pagination a,#search_btn", function() {
            var url_string = window.location;
            var sort = $("input[name='sortfilter']").val();
            var gender = $("input[name='gender']").val();
            var orient = $("input[name='orient']").val();
            var ethnicity = $("input[name='ethnicity']").val();
            var language = $("input[name='language']").val();
            var category = $("input[name='category']").val();
            var fetish = $("input[name='fetish']").val();
            var hair = $("input[name='hair']").val();


            var page = $("input[name='page']").val();

            //get url and make final url for ajax 
            var url = $(this).attr("href");
            var append = url.indexOf("?") == -1 ? "?" : "&";
            var finalURL = url + append + 'sort=' + sort + '&type=' + page + '&gender=' + gender + $(
                "#searchform").serialize();

            //set to current url
            window.history.pushState({}, null, finalURL);
            $.get(finalURL, function(data) {
                $(".loader-img").hide();
                $(".app.sidebar-mini").html(data);
            });

            return false;
        })

    });
</script>
