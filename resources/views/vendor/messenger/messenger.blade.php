@extends('messenger::app')

@section('title'){{ messenger()->getProvider()->getProviderName() }} - {{ config('messenger-ui.site_name') }}
@endsection
@section('content')
<style>
    .qtySelector{
	border: 1px solid #ddd;
	width: 107px;
	height: 35px;
	margin: 10px auto 0;
}
.qtySelector .fa{
	padding: 10px 5px;
	width: 35px;
	height: 100%;
	float: left;
	cursor: pointer;
}
.qtySelector .fa.clicked{
	font-size: 12px;
	padding: 12px 5px;
}
.qtySelector .fa-minus{
	border-right: 1px solid #ddd;
}
.qtySelector .fa-plus{
	border-left: 1px solid #ddd;
}
.qtySelector .qtyValue{
	border: none;
	padding: 5px;
	width: 35px;
	height: 100%;
	float: left;
	text-align: center
}
/* .btn_upload {
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  position: relative;
  color: #fff;
  background-color: #2a72d4;
  border: 1px solid #166b8a;
  padding: 5px 10px;
}

.btn_upload:hover,
.btn_upload:focus {
  background-color: #7ca9e6;
}

.yes {
  display: flex;
  align-items: flex-start;
  margin-top: 10px !important;
}

.btn_upload input {
  cursor: pointer;
  height: 100%;
  position: absolute;
  filter: alpha(opacity=1);
  -moz-opacity: 0;
  opacity: 0;
}

.it {
  height: 100px;
  margin-left: 10px;
}

.btn-rmv1,
 {
  display: none;
}

.rmv {
  cursor: pointer;
  color: #fff;
  border-radius: 30px;
  border: 1px solid #fff;
  display: inline-block;
  background: rgba(255, 0, 0, 1);
  margin: -5px -10px;
}

.rmv:hover {
  background: rgba(255, 0, 0, 0.5);
} */

/* ///old */
.content {
    margin: 130px 0px 0px 0px;
}
    #message_content_container {
    width: 100%;
}
button#sercbtn {
    color: #a92994;
    background-color: #112435;
}
.card-body.text-white.wrap {
    padding: 10px !important;
}
.avatar-is-offline {
    border: 1px solid #fff;
    box-shadow:0px;
}
.card.bg-light.mb-0.border-0 {
    position: absolute;
}
.chat_head.card-header {
    display: none;
}
.card-body.text-white.wrap_second.p-0 {
    overflow: hidden;
}
img.ml-1.rounded-circle.medium-image.main-bobble-offline.pointer_area{
    height: 45px;
    width: 45px;
}
/* .message-text img{
    width: auto !important;
    height: 100% !important;
} */
input.form-control {
    background: #0c1d2d !important;
    color: #fff!important;
    font-size: 14px;
}
img.rounded-circle {
    height: auto;
    width: 40px !important;
}
.alert-primary {
    background: #112435 !important;
}
</style>
 <!-- <div class="container-fluid mt-n3">
        <div id="messenger_container" class="row inbox main-inbox d-flex">
            <div id="message_sidebar_container" class="w-25 px-0 h-100">
                <div class="card bg-transparent h-100">
                    <div class="card-header bg-light px-1 d-flex justify-content-between">
                        <div id="my_avatar_status">
                            <img data-toggle="tooltip" data-placement="right"
                                title="You are {{ \Illuminate\Support\Str::lower(\RTippin\Messenger\Contracts\MessengerProvider::ONLINE_STATUS[messenger()->getProvider()->getProviderOnlineStatus()]) }}"
                                class="my-global-avatar ml-1 rounded-circle medium-image avatar-is-{{ \Illuminate\Support\Str::lower(\RTippin\Messenger\Contracts\MessengerProvider::ONLINE_STATUS[messenger()->getProvider()->getProviderOnlineStatus()]) }}"
                                src="{{ messenger()->getProvider()->getProviderAvatarRoute() }}" />
                        </div>
                        <span class="d-none d-md-inline h4 font-weight-bold">Messenger</span>
                        <div class="dropdown">
                            <button data-tooltip="tooltip" title="Messenger Options" data-placement="right"
                                class="btn btn-lg text-secondary btn-light pt-1 pb-0 px-2 dropdown-toggle"
                                data-toggle="dropdown"><i class="fas fa-cogs fa-2x"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" onclick="ThreadManager.load().search(); return false;"
                                    href="#"><i class="fas fa-search"></i> Search Profiles</a>
                                <a class="dropdown-item" onclick="ThreadManager.load().createGroup(); return false;"
                                    href="#"><i class="fas fa-edit"></i> Create Group</a>
                                <a class="dropdown-item" onclick="ThreadManager.load().contacts(); return false;"
                                    href="#"><i class="fas fa-user-friends"></i> Friends</a>
                                <a class="dropdown-item" onclick="MessengerSettings.show(); return false;" href="#"><i
                                        class="fas fa-cog"></i> Settings</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar id="message_sidebar_content" class="card-body bg-transparent px-0 py-0">
                        <div class="col-12 px-2 mx-0 py-0">
                            <div id="socket_error"></div>
                            <div id="threads_search_bar" class="NS my-2">
                                <div class="form-row">
                                    <div class="input-group input-group-sm col-12 mb-0">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                                        </div>
                                        <input autocomplete="off" type="search" class="form-control shadow-sm"
                                            id="thread_search_input" placeholder="Search conversations by name" />
                                    </div>
                                </div>
                            </div>
                            <div id="allThread">
                                <ul id="messages_ul" class="messages-list">
                                    <div class="col-12 mt-5 text-center">
                                        <div class="spinner-grow spinner-grow-sm text-primary" role="status"></div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="message_content_container" class="flex-fill h-100">
                <div id="message_content_card" class="card h-100">
                    <div id="drag_drop_overlay" class="drag_drop_overlay rounded text-center NS">
                        <div class="h-100 d-flex justify-content-center">
                            <div class="align-self-center h1">
                                <span class="badge badge-pill badge-primary"><i class="fas fa-cloud-upload-alt"></i> Drop
                                    files to upload</span>
                            </div>
                        </div>
                    </div>
                    <div id="message_container" class="card-body px-0 pb-0 pt-3 bg-light">
                        <div class="col-12 mt-5 text-center">
                            <div class="spinner-grow spinner-grow-sm text-primary" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


<div class="col-sm-12 text-white col-md-12 col-lg-12 mt-5 mb-5">
    <div class="row">
        <div class="col-lg-4 col-md-12 chatwrap">
            <div class="card" id="">
                <div class="profile_head">

                    <div class="col-12 px-2 mx-0 py-0">
                       
                        <div id="threads_search_bar" class="NS my-2">
                            <div class="form-row">
                                <div class=" input-group-sm col-12 mb-0">
                                    <div class="input-group-prepend">
                                    <div class="input-group">
                                        <input type="search" autocomplete="off"  id="thread_search_input" class="form-control shadow-sm" placeholder="Search Models" />
                                        <button type="button" class="btn " id="sercbtn">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                      
                                </div>
                                
                                {{-- <div id="socket_error"></div> --}}
                            </div>
                        </div>
                    </div>

          
                </div>
                <div class="card-body text-white wrap">
                                     
                    <div id="allThread">
                        <ul id="messages_ul" class="messages-list">
                            <div class="col-12 mt-5 text-center">
                                <div class="spinner-grow spinner-grow-sm text-primary" role="status"></div>
                            </div>
                        </ul>
                    </div>
                           
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-8 col-md-12 chatwrap">
                                    <div class="card">
                                        <div class="chat_head card-header" >
                                            <div class="d-flex justify-content-between mt-3">
                                                <div class="user_name">
                                                    <div class="d-flex">
                                                        <h6><b>Rosalina Ryder</b></h6>
                                                        <i class="bi bi-star ml-2"></i>
                                                    </div>
                                                    <small class="text-muted">Active 2h ago</small>
                                                </div>
                                                <div class="option">
                                                    <span class="card-icon pr-2 mt-2 text-muted">
                                                        <a href=""><i class="bi bi-camera-video"></i></a>
                                                    </span>
                                                    <span class="card-icon pr-2 mt-2 text-muted">
                                                        <a href=""><i class="bi bi-telephone"></i></a>
                                                    </span>
                                                  
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                         
                                            </div>
                                        </div>
                                        <div class="card-body text-white wrap_second p-0">
                                            <div class="col-md-12">
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-Chat" role="tabpanel" aria-labelledby="pills-Chat-tab" style="color: #fff;">
                                          
                                                </div>
                                            </div>
                                        </div>
                                        <div id="message_content_container" class="flex-fill h-100">
            <div id="message_content_card" class="card h-100">
                <div id="drag_drop_overlay" class="drag_drop_overlay rounded text-center NS">
                    <div class="h-100 d-flex justify-content-center">
                        <div class="align-self-center h1">
                            <span class="badge badge-pill badge-primary"><i class="fas fa-cloud-upload-alt"></i> Drop
                                files to upload</span>
                        </div>
                    </div>
                </div>
                <div id="message_container" class="card-body px-0 pb-0 pt-3">
                    <div class="col-12 mt-5 text-center">
                        <div class="spinner-grow spinner-grow-sm text-primary" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
                                  
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            
                           
                                          
   
@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>                   
<script>
    
            var minVal = 1, maxVal = 20; // Set Max and Min values
// Increase product quantity on cart page
$(document).on('click',".increaseQty", function(){
		var $parentElm = $(this).parents(".qtySelector");
		$(this).addClass("clicked");
		setTimeout(function(){
			$(".clicked").removeClass("clicked");
		},100);
		var value = $parentElm.find(".qtyValue").val();
		if (value < maxVal) {
			value++;
		}
		$parentElm.find(".qtyValue").val(value);
});
// Decrease product quantity on cart page
$(document).on('click',".decreaseQty", function(){
		var $parentElm = $(this).parents(".qtySelector");
		$(this).addClass("clicked");
		setTimeout(function(){
			$(".clicked").removeClass("clicked");
		},100);
		var value = $parentElm.find(".qtyValue").val();
		if (value > 1) {
			value--;
		}
		$parentElm.find(".qtyValue").val(value);
	});
    function readURL(input, imgControlName) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $(imgControlName).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imag").on('change',function() {
  // add your logic to decide which image control you'll use
  var imgControlName = "#ImgPreview";
  readURL(this, imgControlName);
  $('.preview1').addClass('it');
  $('.btn-rmv1').addClass('rmv');
});

$("#removeImage1").click(function(e) {
  e.preventDefault();
  $("#imag").val("");
  $("#ImgPreview").attr("src", "");
  $('.preview1').removeClass('it');
  $('.btn-rmv1').removeClass('rmv');
});

         </script>    