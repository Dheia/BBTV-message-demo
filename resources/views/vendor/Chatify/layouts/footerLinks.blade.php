<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<!-- <script src="{{ asset('js/chatify/pusher.js') }}"></script> -->
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher("{{ config('chatify.pusher.key') }}", {
    encrypted: true,
    cluster: "{{ config('chatify.pusher.options.cluster') }}",
    authEndpoint: '{{route("pusher.auth")}}',
    auth: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
  });

    // Bellow are all the methods/variables that using php to assign globally.
    const allowedImages = {!! json_encode(config('chatify.attachments.allowed_images')) !!} || [];
    const allowedFiles = {!! json_encode(config('chatify.attachments.allowed_files')) !!} || [];
    const getAllowedExtensions = [...allowedImages, ...allowedFiles];
    const getMaxUploadSize = {{ Chatify::getMaxUploadSize() }};
</script>
<script src="{{ asset('js/chatify/code.js') }}"></script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    
</script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript">
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
    // @if (Session::has('error'))
    //     toastr.options = {
    //         "closeButton": true,
    //         "progressBar": true,
    //         "iconClass": "toast-custom"
    //     }
    //     toastr.error("{{ session('error') }}", {
    //         iconClass: "toast-custom"
    //     });
    // @endif
    @if (Session::has('notcredit'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "iconClass": "toast-custom"
        }
        toastr.error("{{ session('notcredit') }}", {
            iconClass: "toast-custom"
        });
    @endif
    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      
              
        $(document).on('click', '.unlock_feed', function(e) {

            //$(this).parent(".unclock-overlay").find(".locked-text").addClass("d-none");
            $(this).closest(".unclock-overlay").find(".locked-text").hide();
            $(this).closest(".unclock-overlay").find(".unlock-text").show();

        });

        $(document).on('click', '.minus1', function() {
            
            var $input = $('#premium_cost');
            var $input1 = $('#premium_cost1');
            var count = parseFloat($input.val()) - parseFloat(0.50);
            var count = parseFloat($input1.val()) - parseFloat(0.50);
            count = count < 0 ? 0 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $(document).on('click', '.plus1', function() {
           
            var $input = $('#premium_cost');
            var $input1 = $('#premium_cost1');
            var premium_cost = $('#premium_cost').val();

            if (premium_cost < 10) {
                $input.val(parseFloat($input.val()) + parseFloat(0.50));
                $input1.val(parseFloat($input1.val()) + parseFloat(0.50));
                $input.change();
                return false;
            }
        });
    });

</script>







