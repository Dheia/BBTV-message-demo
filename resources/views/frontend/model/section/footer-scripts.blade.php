<script src="{{asset('js/jquery.js')}}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
   integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
   integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
   integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
   integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script src="{{ asset('js/slidediv.js') }}"></script> 






<!-- <script src="{{url('/js/chart.js/chart.min.js')}}"></script>
   <script>
   const ctx = document.getElementById('myChart');
   const myChart = new Chart(ctx, {
       type: 'bar',
       data: {
           labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
           datasets: [{
               label: '# of price',
               data: [12, 19, 3, 5, 2, 3],
               backgroundColor: [
                   'rgba(255, 99, 132, 0.2)',
                   'rgba(54, 162, 235, 0.2)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(75, 192, 192, 0.2)',
                   'rgba(153, 102, 255, 0.2)',
                   'rgba(255, 159, 64, 0.2)'
               ],
               borderColor: [
                   'rgba(255, 99, 132, 1)',
                   'rgba(54, 162, 235, 1)',
                   'rgba(255, 206, 86, 1)',
                   'rgba(75, 192, 192, 1)',
                   'rgba(153, 102, 255, 1)',
                   'rgba(255, 159, 64, 1)'
               ],
               borderWidth: 1
           }]
       },
       options: {
           scales: {
               y: {
                   beginAtZero: true
               }
           }
       }
   });
   </script> -->
<!-- End Line CHart -->    
<script type="text/javascript">

var profileImg = document.getElementById('profile-upload-img'),
    
    imgItems, previewTitle, previewTitleText, img;

 profileImg.addEventListener('change', ProfilePreview, true);
 
 function ProfilePreview(event) {
     console.log('gfd');
     imgItems = profileImg.files.length;
   
   
     for (var i = 0; i < imgItems; i++) {
         
         console.log(event.target.files[i].name);
         var file_name_string = event.target.files[i].name;
             var file_name_array = file_name_string.split(".");
             var file_extension = file_name_array[file_name_array.length - 1];
                 wrapper = document.createElement('div');
                 img = document.createElement('img');
                 img.src = URL.createObjectURL(event.target.files[i]);
                 img.classList.add('model-profile-img');
                $('.pro-img').html(img);
                 // wrapper.appendChild(img);
                }
         }


   function copyToClip_Referral (text) {
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
   function copy(text) {
   
            var append_input = $('<input>');
            $('body').append(append_input);
            $(append_input).val(text); 
            append_input.select();
            document.execCommand("copy");
            $(append_input).remove();
            $('#copied-success').fadeIn(800);
            $('#copied-success').fadeOut(800);
    }
   
     /*
     model  audio call avail...ajax
     */
   $(document).ready(function(){

        $(document).on('click','.model-phone-call',function(){
           var phoneCallTimer= $('.phour').val();

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{route('model.audiocalling')}}",
                data: {
                    phoneCallTimer: phoneCallTimer,
                    calling:'1',
                },
                success: function(response) 
                {
                    if(response.status=='success')
                    {
                        $('.success-mgs').html('Status updated');
                       $('#success-mgs').fadeIn(800).fadeOut(800);
                        
                       $('.posttime1').val(response.endTime);
                        $("#phone").removeClass("d-none");
                        $("#pprice").addClass("d-none"); 
                            setInterval(function() {
                                makeTimer2();
                            }, 1000);
                       
                    }
                }
                   });

            });
    
            $("#phone-call-ajax").click(function(e) {
            
            if (!$("#phone-call-ajax").prop("checked")) {
            
            $(".calling").val(0);

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{route('model.audiocalling')}}",
                data: {
                    phoneCallTimer: '1',
                    calling:'0',
                },
                success: function(response) {
                    if(response.status=='success'){
                        $('.success-mgs').html('Status updated');
                       $('#success-mgs').fadeIn(800).fadeOut(800);
                       $('.posttime1').val("0000-00-00 00:00:00");
                       $("#hours1").html('');
                        $("#minutes1").html("");
                        $("#seconds1").html("");
                   
                    }
                }
                });
            
            } else {
                $("#phone").addClass("d-none");
                $("#pprice").removeClass("d-none");
            }
    
    });
    /*
     model  video call avail...ajax--end
     */

 /*
     model  audio call avail...ajax
     */
    $(document).on('click','.model-video-call',function(){

           var phoneCallTimer= $('.vhour').val();

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{url('model/videocalling')}}",
                data: {
                    phoneCallTimer: phoneCallTimer,
                    calling:'1',
                },
                success: function(response) 
                {
                    if(response.status=='success')
                    {
                        $('.success-mgs').html('Status updated');
                       $('#success-mgs').fadeIn(800).fadeOut(800);
                        
                       $('.posttime11').val(response.endTime);

                        $("#video").removeClass("d-none");
                        $("#vprice").addClass("d-none"); 
                            setInterval(function() {
                                makeTimer1();
                            }, 1000);
                       
                    }
                }
                   });

            });


   $("#video-call-ajax").click(function(e) {
   
   if (!$("#video-call-ajax").prop("checked"))
        {
        $(".calling").val(0);
        $.ajax({

                    type: 'GET',
                    dataType: 'json',
                    url: "{{url('model/videocalling')}}",
                    data: {
                        phoneCallTimer: '1',
                        calling:'0',
                    },
                    success: function(response) {
                        if(response.status=='success'){
                            $('.success-mgs').html('Status updated');
                        $('#success-mgs').fadeIn(800).fadeOut(800);
                        $('.posttime11').val("0000-00-00 00:00:00");
                        $("#hours2").html('');
                        $("#minutes2").html("");
                        $("#seconds2").html("");
                        }
                    }
                    });

            } else {
                $("#video").addClass("d-none");
                $("#vprice").removeClass("d-none");
            }
   
   });
    /*
     model  audio call avail...ajax--end
     */


    $(".Category-form").on('change', function() {
        var parentForm = $(this).closest("form");
     if (parentForm && parentForm.length > 0)
       parentForm.submit();
        });
   
        $("#topspent").on('change', function() {
        var parentForm = $(this).closest("form");
     if (parentForm && parentForm.length > 0)
       parentForm.submit();
        });
    $('input[type="checkbox"]').change(function() {
        if ($(this).is(":checked")) {
            var data=$(this).val();
            var id=$(this).val();
            var value=1;
        }else{
            var id=$(this).val();
            var data=$(this).val();
            var value=0;
        }   
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ route('model.notification') }}",
            data: {
                value: value,
                key: data,
                id:id,
                _token: '{{ csrf_token() }}'
            },
        
        }); 
    });
    $( ".del_location" ).on( "click", function() {
   
    var id= $(this).attr('value');
    $this=$(this);
   
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{ route('model.deletelocation') }}",
        data: {
            id:id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
                $this.parents(".parc").remove();  
                }
        }); 
    });
    $(document).on('click','.dots',function(){
    
        $(this).parent(".added").find(".mydropdown-menu").toggle();
    });


    //model away mode

    
    $(document).on('change','.model-away-model',function(){
        if (this.checked) {
       var awayModeStatus='1';
       $('#away-mode-on').fadeIn(800);
   $('#away-mode-on').fadeOut(800);
    }else{
        var awayModeStatus='0';
        $('#away-mode-off').fadeIn(800);
   $('#away-mode-off').fadeOut(800);
    }
    $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/away-mode') }}",
                data: {
                    awayModeStatus: awayModeStatus,
                },
              
               
            });
});

//Model Availability

$(document).on('click','.availabile-model-data',function(){
      
    var mon_from= $('.mon_from').val();
    var mon_until= $('.mon_until').val();

    var tue_from= $('.tue_from').val();
    var tue_until= $('.tue_until').val();

    var wed_from= $('.wed_from').val();
    var wed_until= $('.wed_until').val();

    var thu_from= $('.thu_from').val();
    var thu_until= $('.thu_until').val();

    var fri_from= $('.fri_from').val();
    var fri_until= $('.fri_until').val();

    var sat_from= $('.sat_from').val();
    var sat_until= $('.sat_until').val();

    var sun_from= $('.sun_from').val();
    var sun_until= $('.sun_until').val();



    $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/model-availability') }}",
                data: {
                    mon_from: mon_from,
                    mon_until: mon_until,

                    tue_from: tue_from,
                    tue_until: tue_until,

                    wed_from: wed_from,
                    wed_until: wed_until,

                    thu_from: thu_from,
                    thu_until: thu_until,

                    fri_from: fri_from,
                    fri_until: fri_until,

                    sat_from: sat_from,
                    sat_until: sat_until,

                    sun_from: sun_from,
                    sun_until: sun_until,

                },
                success: function(response) {
   
                    if (response.status) {
                        setTimeout(function() {
                            $(".div_loader").hide();
                        }, 1500);
                        $('#Weekly-Availability-on').fadeIn(800);
                        $('#Weekly-Availability-on').fadeOut(800);
                    } 
                    }
               
            });
});





$(document).on('change','.availabile-from',function(){
    var thisValue=$(this).val();
    var ClosestValue= $(this).closest('.availability-1').find(".availabile-until").val();

        if(thisValue=='open'){
            $(this).closest('.availability-1').find(".availabile-until").val('open');
            $(this).closest('.availability-1').find(".availabile-until").attr('disabled',true);
        }
        if(thisValue=='limited'){
            $(this).closest('.availability-1').find(".availabile-until").val('limited');
            $(this).closest('.availability-1').find(".availabile-until").attr('disabled',true);
        }
        if(thisValue=='unavailable'){
            $(this).closest('.availability-1').find(".availabile-until").val('unavailable');
            $(this).closest('.availability-1').find(".availabile-until").attr('disabled',true);
        }
        if(thisValue!='open' && thisValue!='limited' && thisValue!='unavailable'){
            $(this).closest('.availability-1').find(".availabile-until").attr('disabled',false);
            $(this).closest('.availability-1').find(".availabile-until").val(thisValue);
        }
});
$(document).on('change','input:radio[name=availability]',function(){
    if (this.value == '0') {
       
        $('.custom-availability').addClass('d-none');
        
    $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/model-availability-off') }}",
                data: {
                 

                },
                success: function(response) {
   
                    if (response.status=='success') {
                        setTimeout(function() {
                            $(".div_loader").hide();
                        }, 1500);
                        $('#Weekly-Availability-off').fadeIn(800);
                        $('#Weekly-Availability-off').fadeOut(800);
                    } 
                    }
               
            });
    }
   if (this.value == '1') {
    
       $('.custom-availability').removeClass('d-none');
    }
    
    if (this.checked) {
        $('.sleepmode_timeing').removeClass('d-none');
        $('.sleep-mode-content').addClass('d-none');
   
   


}else{
    $('.sleepmode_timeing').addClass('d-none');
        $('.sleep-mode-content').removeClass('d-none');
     $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{ url('model/sleep-mode-off') }}",
            data: {
             
            },
          
           
        });

        $('#Sleep-mode-off').fadeIn(800);
        $('#Sleep-mode-off').fadeOut(800);
}



});


//Model feeds delete

$(document).on('click','.delete_popup_confirm',function(){
    var thisValue=$(this).val();
     $('.delete_feed').val(thisValue);
     $(this).closest('.delele-feed-parent').find(".deleted_feed").addClass('deleted_feed_id'+thisValue);

       
});

// model email verifycation
$(document).on('keyup','.change_email',function(){
    var oldEmail= $('.ori_email').val();
  var newEmail= $(this).val();
    if(oldEmail==newEmail){
        $('.verified-email').removeClass('d-none');
        $('.verify-email').addClass('d-none');
    }else{
        $('.verified-email').addClass('d-none');
        $('.verify-email').removeClass('d-none');
    }


       
});
$(document).on('click','.verify-email',function(){
    var Email =$('.change_email').val();
   

    $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/verify-email') }}",
                data: {
                    Email:Email,
                    
                },
 
                success: function(response) {
                if (response.status=='success') {
                   
                    $('#otpModal').css('display', 'block');
                   $('#otpModal').addClass('show');
                   $('.new-email-verify').val(Email);
            }else{
                if(response.status=='mailTaken'){
                   $('.email-already-taken').html('Email already taken');
                }
            }
        }


       
});
});

$(document).on('click','.match-otp-verify-email',function(){
  
    var Email =$('.new-email-verify').val();
    var Otp =$('.change_email_otp').val();
   

    $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/verify-new-email') }}",
                data: {
                    Email:Email,
                    Otp:Otp,
                    
                },
 
                success: function(response) {
                if (response.status=='success') {
                    $('#otpModal').css('display', 'none');
                    $('#otpModal').removeClass('show');
                    $('#email-varify').fadeIn(800).fadeOut(800);
                   
            }else{
                if(response.status=='false'){
                   $('.otp-do-not-match').html('Otp Do Not Match');
                }
            }
        }


       
});
});

$(document).on('click','.close-modal',function(){

    $('#otpModal').css('display', 'none');
    $('#otpModal').removeClass('show');

       
});
//Re scheduled 

$(document).on('click','.re-scheduled',function(){
    $('.re-scheduled-time').addClass('d-none');
    $('.updatedata-scheduled').removeClass('d-none');
    // var thisValue=$(this).val();
    //  $('.delete_feed').val(thisValue);
    //  $(this).closest('.delele-feed-parent').find(".deleted_feed").addClass('deleted_feed_id'+thisValue);

       
});
$(document).on('click','.update_feed_resechedule',function(){
                var feedId  = $(this).val();
    var reSecheduleDate =$('.resechedule-date').val();
    var reSecheduleTime =$('.resechedule-time').val();

    $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/re-schedule') }}",
                data: {
                    reSecheduleDate:reSecheduleDate,
                    reSecheduleTime:reSecheduleTime,
                    feedId:feedId,
                },
 
                success: function(response) {
                if (response.status=='success') {
                    $('#feed-updated').fadeIn(800).fadeOut(800);
                    $('.re-scheduled-time').removeClass('d-none');
                    $('.updatedata-scheduled').addClass('d-none');
                    $('.re-scheduled-time').html('Scheduled: '+reSecheduleDate+' '+reSecheduleTime);
                
            }}

       
});
});
//model sleep mdoe
$(document).on('change','.sleep-mode-btn',function(){
    
        if (this.checked) {
            $('.sleepmode_timeing').removeClass('d-none');
            $('.sleep-mode-content').addClass('d-none');
       
       
  

    }else{
        $('.sleepmode_timeing').addClass('d-none');
            $('.sleep-mode-content').removeClass('d-none');
         $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/sleep-mode-off') }}",
                data: {
                 
                },
              
               
            });

            $('#Sleep-mode-off').fadeIn(800);
            $('#Sleep-mode-off').fadeOut(800);
    }

   

});

    $(document).on('click','.sleep-mode-update',function(){
        
     var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() ;

        if( $('#one-time-check').is(':checked') ){
        var SleepModeType='onetime';
    }
    else{
        var SleepModeType='daily';
    }
     var startTimeSleep=$('#start_time_sleep').val();
     var endTimeSleep=$('#end_time_sleep').val();

     
     var validation='1';

     if(startTimeSleep==''){
        $('.start_time_sleep_error').html('Start time required');
        var validation='0';
     }else{
        $('.start_time_sleep_error').html('');
        if(startTimeSleep<time){
            // var validation='0';
            // $('.valid_time_sleep_error').html('Select a vaild time');

        }else{
            $('.valid_time_sleep_error').html('');
        }
        if(endTimeSleep==''){
            var validation='0';
            $('.end_time_sleep_error').html('End time required');
        }else{
            $('.end_time_sleep_error').html('');
        }
     }
    if(validation=='1'){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('model/sleep-mode') }}",
                data: {
                    startTimeSleep: startTimeSleep,
                    endTimeSleep:endTimeSleep,
                    SleepModeType:SleepModeType,
                },
            
            
            });
            $('#sleep-mode-on').fadeIn(800);
            $('#sleep-mode-on').fadeOut(800);
            $('.SleepCheckbox').prop('checked', false); 
            $(".SleepCheckbox").attr("disabled", true);
    }
});

//model sleep mode end


    $(document).on('click','.editPostClass',function(){
        $(this).closest('.added').find(".showdata").hide();
        $(this).closest('.added').find(".updatedata").show();
        $(this).closest('.added').find(".mydropdown-menu").hide();
        
    });
   
   
        $(document).on('click','.delete_feed',function(){
        var feed_id=$(this).val();
    
        var   $this =$(this);
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ route('model.feed-delete') }}",
            data: {
                feed_id: feed_id,
                
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status) {
            
                     $('.deleted_feed_id'+feed_id).remove();
                    $('#feed-deleted-success').fadeIn(800).fadeOut(800);
                    // $('#feed-deleted-success').fadeOut(800);
                
            }}
        }); 
        
    });
   
   
        $(document).on('click','.update_feed',function(){
       var update_feed_textarea= $(this).closest('.updatedata').find(".update_feed_textarea").val();
       var update_feed_id= $(this).closest('.updatedata').find(".update_feed_id").val();
       var $this= $(this);
       $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ route('model.update_title') }}",
            data: {
                title: update_feed_textarea,
                id: update_feed_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status) {
                    $this.closest('.feed_details').find(".after_update").html(update_feed_textarea);
                    $this.closest('.added').find(".showdata").show();
                    $this.closest('.added').find(".updatedata").hide();
                    $('#feed-updated').fadeIn(800);
                    $('#feed-updated').fadeOut(800);
                    
                }else{  
   
                }
            }
        }); 
        
    });
   });
</script>
<script>
   $(document).on('click','.pinPostClass',function(){
   var pin=$(this).closest('.mydropdown-menu').find('.pin_num').val();
   var id=$(this).closest('.mydropdown-menu').find('.feed_id').val();
   
   $.ajax({
       type: 'POST',
       dataType: 'json',
       url: "{{ route('model.feeds-pin') }}",
       data: {
           pin: pin,
           id: id,
           _token: '{{ csrf_token() }}'
       },
       success: function(response) {
   // 
   if (response.status) {
   
   jQuery('.modelFeedlist').html(response.feedData);
   $('#feed-pin').fadeIn(800);
               $('#feed-pin').fadeOut(800);
               
   } else {
   jQuery('.modelFeedlist').html('')
   
   }
   }
   }); 
   });
   
   
   
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
       document.getElementById("mySidenav").style.width = "70%";
      $('#sidebar').addClass('d-none');
      $('.closebtn').removeClass('d-none');
   }
   
   function closeNav() {
       document.getElementById("mySidenav").style.width = "0";
       $('#sidebar').removeClass('d-none');
      $('.closebtn').addClass('d-none');
   }
</script>
<script>
   $(document).ready(function() {
       $('.recentoption').on('change', function(e) {
   
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
   });
   
   function openfilter() {
       document.getElementById("Filter-wrapp").style.width = "360px";
   }
   
   function closefilter() {
       document.getElementById("Filter-wrapp").style.width = "0";
   }
   $(document).ready(function() {
       $('.sub_btn').click(function(e) {
   
           e.preventDefault();
           checkoutvalue = 1;
           var images = $('#upload-img').val();
   
           if (images == '') {
               $('.images').text('Media is required');
               checkoutvalue = 0;
           } else {
               $('.images').text('');
           }
           if (checkoutvalue == 1) {
               $("#form_submit").submit();
           }
       });
   });
   $(document).ready(function() {
       $('.sub_btn_pop').click(function(e) {
   
           e.preventDefault();
           checkoutvalue = 1;
           var images = $('#upload-img1').val();
           var imagesOld = $('.oldImg').val();
           

           if (!images == '' || !imagesOld=='') {
            $('.images_error_popup').text('');
               
           } else {
            $('.images_error_popup').text('Media is required');
               checkoutvalue = 0;
           }
           
           if (checkoutvalue == 1) {
               $("#form_submit2").submit();
           }
       });
   });
</script>
<script>
   $(document).ready(function() {
       $(".save_val").change(function() {
           $(this).find("option:selected").each(function() {
               var optionValue = $(this).attr("value");
               if (optionValue == '1') {
                   $(".post_schedule").show();
                   $(".post_now").hide();
                   $(".post_draft").hide();
                   $(".time_wrapper").show();
                   $('#count').val('1');
               } else {
                   if (optionValue == '0') {
                       $(".post_schedule").hide();
                       $(".post_now").hide();
                       $(".post_draft").show();
                       $(".time_wrapper").hide();
                       $('#count').val('0');
                   } else {
                       if (optionValue == '2') {
                           $(".post_schedule").hide();
                           $(".post_now").show();
                           $(".post_draft").hide();
                           $(".time_wrapper").hide();
                           $('#count').val('1');
                       }
                   }
               }
           });
       }).change();
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
    $(document).on("click",".minus",function() {

           var $input = $(this).parent().find('input');
           var count = parseFloat($input.val()) - parseFloat(0.50);
           count = count < 0 ? 0 : count;
           $input.val(count);
           $input.change();
           return false;
       });
       $(document).on("click",".plus",function() {
       
           var $input = $(this).parent().find('input');
           var premium_cost = $('#premium_cost').val();
   
           if (premium_cost < 10) {
               $input.val(parseFloat($input.val()) + parseFloat(0.50));
               $input.change();
               return false;
           }
   
       });
   });
</script>
<script>
   
   $(document).on("click",".remove-btn-popup",function(e) {
         e.preventDefault();
            $(this).parent('.wrapper-thumb-popup').remove();
            
    });
    
</script>
<script>

    
   function makeTimer() {
       var postime = $('.posttime').val();
   
       //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
       var endTime = new Date(postime);
   
       endTime = (Date.parse(endTime) / 1000);
   
       endTime = endTime + 7200;
   
       var now = new Date();
   
       now = (Date.parse(now) / 1000);
   
       var timeLeft = endTime - now;
   
       var days = Math.floor(timeLeft / 86400);
       var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
       var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
       var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
   
       if (hours < "10") {
           hours = "0" + hours;
       }
       if (minutes < "10") {
           minutes = "0" + minutes;
       }
       if (seconds < "10") {
           seconds = "0" + seconds;
       }
   
       if (hours == '00' && minutes == '00' && seconds == '00') {
           location.reload();
       } else {
           $("#hours").html(hours);
           $("#minutes").html("<span>:</span>" + minutes);
           $("#seconds").html("<span>:</span>" + seconds);
   
       }
   
   }
   
   setInterval(function() {
       makeTimer();
   }, 1000);
   
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
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
       selector: "#exampleInputEmail1",
       plugins: "emoticons autoresize",
       toolbar: "emoticons",
       toolbar_location: "bottom",
       menubar: false,
       content_style: "body { color: white; }",
       statusbar: false
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
   function _sx(element, all) { 
     if(all) {
       return document.querySelectorAll(element)
     }
     return document.querySelector(element);
   }
   
   let 
       buttons2 = _sx(".btn2", true),
       quantity2 = _sx(".quantity2"),
       pvalue2= _sx(".phour"),
       items2 = parseInt(quantity2.textContent);
   buttons2.forEach(button => {
   
     button.addEventListener("click", function(e) {
   
       if(e.target.classList.contains("add2")) {
           if(items2 < 24) items2++
       } else {
         if(items2 > 1) items2--
       }
       quantity2.textContent = items2;
       pvalue2.value = items2;
     })
   })
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
   function _a(element, all) { 
     if(all) {
       return document.querySelectorAll(element)
     }
     return document.querySelector(element);
   }
   let 
       buttons1 = _a(".btn1", true),
       quantity1 = _a(".quantity1"),
       pvalue1= _a(".vhour"),
       items1 = parseInt(quantity1.textContent);
       buttons1.forEach(button => {
     button.addEventListener("click", function(e) {
   
       if(e.target.classList.contains("add1")) {
           if(items1 < 24) items1++
       } else {
         if(items1 > 1) items1--
       }
       quantity1.textContent = items1;
       pvalue1.value = items1;
   
     })
   })
//sleep mode model




   });
   
   function makeTimer2() {
        var postime = $('.posttime1').val();
      if(postime!='0000-00-00 00:00:00'){
        var endTime = new Date(postime);
        endTime = (Date.parse(endTime) / 1000);
        
        var now = new Date();
        now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days1 = Math.floor(timeLeft / 86400);
        var hours1 = Math.floor((timeLeft - (days1 * 86400)) / 3600);
        var minutes1 = Math.floor((timeLeft - (days1 * 86400) - (hours1 * 3600)) / 60);
        var seconds1 = Math.floor((timeLeft - (days1 * 86400) - (hours1 * 3600) - (minutes1 * 60)));
        if (hours1 < "10") {
            hours1 = "0" + hours1;
        }
        if (minutes1 < "10") {
            minutes1 = "0" + minutes1;
        }
        if (seconds1 < "10") {
            seconds1 = "0" + seconds1;
        }

        if (hours1 == '00' && minutes1 == '00' && seconds1 == '00') {
           $('.posttime1').val('0000-00-00 00:00:00');
        } else {
            $("#hours1").html(hours1);
            $("#minutes1").html("<span>:</span>" + minutes1);
            $("#seconds1").html("<span>:</span>" + seconds1);
        }
      }
      
     
    }
    setInterval(function() {
        makeTimer2();
    }, 1000);

    function makeTimer1() {
        var postime = $('.posttime11').val();
      if(postime!='0000-00-00 00:00:00'){
        var endTime = new Date(postime);
        endTime = (Date.parse(endTime) / 1000);
        var now = new Date();
        now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days2 = Math.floor(timeLeft / 86400);
        var hours2 = Math.floor((timeLeft - (days2 * 86400)) / 3600);
        var minutes2 = Math.floor((timeLeft - (days2 * 86400) - (hours2 * 3600)) / 60);
        var seconds2 = Math.floor((timeLeft - (days2 * 86400) - (hours2 * 3600) - (minutes2 * 60)));
        if (hours2 < "10") {
            hours2 = "0" + hours2;
        }
        if (minutes2 < "10") {
            minutes2 = "0" + minutes2;
        }
        if (seconds2 < "10") {
            seconds2 = "0" + seconds2;
        }
        if (hours2 == '00' && minutes2 == '00' && seconds2 == '00') {
            $('.posttime11').val('0000-00-00 00:00:00');
        } else {
            $("#hours2").html(hours2);
            $("#minutes2").html("<span>:</span>" + minutes2);
            $("#seconds2").html("<span>:</span>" + seconds2);
        }
      }
    }
    setInterval(function() {
        makeTimer1();
    }, 1000);


    $(".tips_checkbox").click(function(e) {
     
        var tip_id= $(this).val();
        
        $('#Tip_id_value').val(tip_id);
        $("#tip_update").submit();
   
   });

   $(document).ready(function() {
        $( ".del_location" ).on( "click", function() {
        
            var id= $(this).attr('value');
            $this=$(this);
            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "{{ route('model.deletelocation') }}",
                data: {
                    id:id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $this.parents(".parc").remove();  
                    }
                }); 
        });

        $( ".edit-feed-ajax" ).on( "click", function() {
        
                var id= $(this).attr('value');
                $this=$(this);

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: "{{ url('model/feed-update-popup-ajax') }}",
                    data: {
                        id:id,
                    },
                    success: (response) => { 
                        $('#Dreft-feed-edit').show();
                        $('#Dreft-feed-edit').addClass('show');
                        $('#popup_post_edit_window').html(response.popupContent);
                        var imgUpload3 = document.getElementById('upload-img1'),
            imgPreview1 = document.getElementById('img-preview1'), 
            imgPreviewNew = document.getElementById('new-wrapper-img'),
            imgUploadForm = document.getElementById('form-upload'),
            totalFiles1, previewTitle, previewTitleText, img1;
            imgUpload3.addEventListener('change', popupPreviewImgs, true);
            function popupPreviewImgs(event1) {
                    console.log('data');
                    totalFiles1 = imgUpload3.files.length;
                
                    if (!!totalFiles1) {
                        imgPreview1.classList.remove('img-thumbs-hidden');
                    }
                
                    for (var i = 0; i < totalFiles1; i++) {
                        var file_name_string = event1.target.files[i].name;
                        var file_name_array = file_name_string.split(".");
                        var file_extension = file_name_array[file_name_array.length - 1];
                        
                        if(file_extension=='mp4'){
            
            var file = event.target.files[0];
            var fileReader = new FileReader();
                fileReader.onload = function() {
                var blob = new Blob([fileReader.result], {type: file.type});
                var url = URL.createObjectURL(blob);
                var video = document.createElement('video');
                var timeupdate = function() {
                    if (snapImage()) {
                    video.removeEventListener('timeupdate', timeupdate);
                    video.pause();
                    }
                };
                video.addEventListener('loadeddata', function() {
                    if (snapImage()) {
                    video.removeEventListener('timeupdate', timeupdate);
                    }
                });
                var snapImage = function() {
                    var canvas = document.createElement('canvas');
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                    var image = canvas.toDataURL();
                    var success = image.length > 100000;
                    if (success) {
                    wrapper = document.createElement('div');
                    wrapper.classList.add('wrapper-thumb-popup');
                    removeBtn = document.createElement("span");
                    nodeRemove = document.createTextNode('x');
                    removeBtn.classList.add('remove-btn-popup');
                    removeBtn.appendChild(nodeRemove);
                    img = document.createElement('img');
                    img.src = image;
                    img.classList.add('popup-img-preview-thumb');
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    imgPreview1.appendChild(wrapper);
                    $(".img-thumbs1").show();
                    }
                    return success;
                };
                    video.addEventListener('timeupdate', timeupdate);
                    video.preload = 'metadata';
                    video.src = url;
                    // Load video in Safari / IE11
                    video.muted = true;
                    video.playsInline = true;
                    video.play();
                    };
                    fileReader.readAsArrayBuffer(file);
            
        

    }else{
                    wrapper = document.createElement('div');
                    wrapper.classList.add('wrapper-thumb-popup');
                    removeBtn = document.createElement("span");
                    nodeRemove = document.createTextNode('x');
                    removeBtn.classList.add('remove-btn-popup');
                    removeBtn.appendChild(nodeRemove);
                    img = document.createElement('img');
                    img.src = URL.createObjectURL(event.target.files[i]);
                        
                    
                    img.classList.add('popup-img-preview-thumb');
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    imgPreview1.appendChild(wrapper);
                    $(".img-thumbs1").show();
    }

                    
                    }
                
                
                }

                       

                           
                    },
                }); 

            });

            $('.popup_post_edit_window_close').on('click', function() {
                $('#Dreft-feed-edit').hide();
                $('#Dreft-feed-edit').removeClass('show');
            });

        
            $('.recentoption').on('change', function() {
        
                $("#recentoption").val(this.value);
                
                $("#serch").submit();
            });
        
            $('.filter').on('click', function() {
                $("#serch").submit();
            });
            
            $('.av_model').on('change', function() {
                $("#ar_model").val(this.value);
                $("#serch").submit();
            });

    });


    
    var imgUpload1 = document.getElementById('upload-img'),
       imgPreview1 = document.getElementById('img-preview'),
       imgUploadForm = document.getElementById('form-upload'),
       totalFiles1, previewTitle, previewTitleText, img;
   
    imgUpload1.addEventListener('change', previewImgs, true);
    var getBase64 = '';
    function previewImgs(event) {
        
        totalFiles1 = imgUpload1.files.length;
        console.log(imgUpload1.files);
        if (!!totalFiles1) {
            imgPreview1.classList.remove('img-thumbs-hidden');
        }
    
        for (var i = 0; i < totalFiles1; i++) {
                   console.log(event.target.files[i].name);
                   var file_name_string = event.target.files[i].name;
                    var file_name_array = file_name_string.split(".");
                    var file_extension = file_name_array[file_name_array.length - 1];
               
            if(file_extension=='mp4'){
                            var file = event.target.files[0];
                            var fileReader = new FileReader();
                            var Input = document.createElement("input");
                                Input.setAttribute("type", "text");
                            fileReader.onload = function() {
                                Input.setAttribute("value", fileReader.result);
                                // console.log(fileReader.result);
                                
                            var blob = new Blob([fileReader.result], {type: file.type});
                            
                            var url = URL.createObjectURL(blob);

                           

                            var video = document.createElement('video');
                            var timeupdate = function() {
                                    if (snapImage()) {
                                    video.removeEventListener('timeupdate', timeupdate);
                                    video.pause();
                                    }
                                };
                            video.addEventListener('loadeddata', function() {
                                if (snapImage()) {
                                video.removeEventListener('timeupdate', timeupdate);
                                }
                            });
                            var snapImage = function() {
                                var canvas = document.createElement('canvas');
                                canvas.width = video.videoWidth;
                                canvas.height = video.videoHeight;
                                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                                var image = canvas.toDataURL();
                                var success = image.length > 100000;
                                if (success) {
                                    
                                    Input.setAttribute("class", "d-none");
                                    Input.setAttribute("name", "images[]");
                                    fileReader.readAsDataURL(file);
                                wrapper = document.createElement('div');
                                wrapper.classList.add('wrapper-thumb');
                                removeBtn = document.createElement("span");
                                nodeRemove = document.createTextNode('x');
                                removeBtn.classList.add('remove-btn');
                                removeBtn.appendChild(nodeRemove);
                                img = document.createElement('img');
                                img.src = image;
                                img.classList.add('img-preview-thumb');
                                wrapper.appendChild(Input);
                                wrapper.appendChild(img);
                                wrapper.appendChild(removeBtn);
                                
                                imgPreview1.appendChild(wrapper);
                               
                                $(".img-thumbs").show();
                                }
                                return success;
                            };
                            video.addEventListener('timeupdate', timeupdate);
                            video.preload = 'metadata';
                            video.src = url;
                            // Load video in Safari / IE11
                            video.muted = true;
                            video.playsInline = true;
                            video.play();
                            
                          
                            
                            };
                           
                            fileReader.readAsArrayBuffer(file);
                        
                    

            } else {
                var Input = document.createElement("input");
                Input.setAttribute("type", "text");
                var file = event.target.files[0];
                var fileReader = new FileReader();
                fileReader.onloadend = function() {
                    console.log(fileReader.result);
                    getBase64 = fileReader.result;
                    Input.setAttribute("value", getBase64);
                }
                Input.setAttribute("class", "d-none");
                Input.setAttribute("name", "images[]");
                fileReader.readAsDataURL(file);
                wrapper = document.createElement('div');
                wrapper.classList.add('wrapper-thumb');
                removeBtn = document.createElement("span");
                nodeRemove = document.createTextNode('x');
                removeBtn.classList.add('remove-btn');
                removeBtn.appendChild(nodeRemove);
                img = document.createElement('img');
                img.src = URL.createObjectURL(event.target.files[i]);
                img.classList.add('img-preview-thumb');
                wrapper.appendChild(Input);
                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                imgPreview1.appendChild(wrapper);
                $(".img-thumbs").show();
                       
            }
        
            $(document).on("click",".remove-btn",function(e) {
            
                e.preventDefault();
                $(this).parent('.wrapper-thumb').remove();
                
                var numItems = $('.wrapper-thumb').length;
                if(numItems=='0'){
                
                    $("#img-preview").hide();
                }
                
                
            });
    
        }
    
    
    }


 
    
    


</script>