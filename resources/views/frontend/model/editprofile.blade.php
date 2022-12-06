@extends('frontend.model.main')
@section('content')
<style>
img.myp-picture-img {
    width: 100%;
    height: 100%;
    max-height: 215px;
    max-width: 215px;
    object-fit: cover;
}
button.chnge {
    background: linear-gradient(to left, #4C2ACD 0%, #AF2990 100%);
    /* border: 1px solid #8429aa !important; */
    color: #fff;
    border: 0px !important;
    padding: 5px;
}
.card-body.text-white.first_section {
    height: auto !important;
}
.map_icon_img{
    height: 20px !important; 
    width: 17px !important;
}
.namingtag{
    font-size:16px;
    font-weight: 600;
}
.ckeckfilter {
    margin: 3px -15px !important;
}
/* input.form-control {
    margin: 0px 10px;
} */
.ml-input {
    display: flex;
    margin: 12px 6px;
}
select[disabled].availabile-until {
    background-color: #112435;
}
label.form-label {
    margin: 6px 0px;
}
[type="radio"]:checked+label, [type="radio"]:not(:checked)+label {
    font-size: 14px;
    font-weight: 400;   
}
.switch {
    
    margin: 0px !important;
}
.parc {
    margin-right: 5px;
    margin-bottom: 5px;
}
span.pip img {
    object-fit: cover;
}
.parc .pip {
    position: relative;
}
.model-profile-img{
  object-fit: cover;
    height: 219px !important;
}
.parc .pip .btn {
    position: relative;
    right: 0px;
    top: 26px;
    margin-top: 3px;
    background-image: linear-gradient(90deg, #282728 0, #544747);
    height: 15px;
    font-size: smaller;
    min-width: 5px !important;
    line-height: 18px;
    color: #fff;
    padding: 0 !important;
    float: left;
    width: 14px;
}
/* . {
    border: 3px dotted #4a4a4a;
    text-align: center;
    margin: 15px 0px !important;
} */
.edit {
  position: absolute;
    right: 13px;
    margin-top: 3px;
    
    height: 20px;
    font-size: smaller;
    min-width: 5px !important;
    line-height: 18px;
    color: #fff;
    padding: 0 !important;
    float: left;
    width: 20px;
}
i.bi-pencil-square {
    font-size: 20px;
}
.media_remove_btn{
  position: relative;
}
</style>

  <div class="col-sm-12 text-white col-md-6 col-lg-7 mt-5 mb-5">
  <form method="post" action="{{ route('model.updateprofile') }}" enctype="multipart/form-data">
    @csrf

        <input type="hidden" name="id" value="{{$model->id}}">
<div class="row">
                                <div class="col-lg-12 col-md-12 ">
                                  <div class="card">
                                    <div class="card-body text-white first_section">
                                    <div class=" row">
                                        <div class="col-4" style="text-align:center;">
                                      
                                        <div class="myp-picture">
                                        <!-- <small class="head">{{Auth::user()->first_name}}</small> -->
                                        <div class=" "> 
                                          <label class="upload_label" for="profile-upload-img"> 
                                            <div class="">
                                              <a  class="edit"><i for="profile-upload-img" class="bi-pencil-square"></i></a>  
                                                  <div class="pro-img">
                                                    <img  class="myp-picture-img"  src="{{ url('profile-image') . '/' . $model->profile_image ?? '' }}" alt="" >
                                                  </div>
                                                             
                                                </div>
                                              </div>
                              
                                        <input type="file" class="form-control" name="profile_image" id="profile-upload-img"
                            value="{{ old('profile_image', isset($model->profile_image) ? $model->profile_image : '') }}" style="display:none;">
                                                </div>
                                                <!-- <button class="chnge">Change Profile Photo</button>  -->
                                            
                            
                                        </div>
                                        <div class="col-8">
                                        <div class="row">
                                            <div class="col-12">  
                                              <label for="" class="form-label">Location </label>
                                            <div class="myp-bio">
                                                <input type="text" name="city" class="form-control" value="{{ isset($model->city) ? $model->city : '' }}"></div>
                                            </div>
                                        
                                        <div class="col-12">
                                        <label for="" class="form-label">Discription </label>
                                        <div class="myp-bio">    
                                            <textarea name="description" class="form-control" id="" cols="20" rows="4">{{ isset($model->discription) ? $model->discription : '' }}</textarea>
                                        </div>
                                        </div>
                                        </div>
                                      
                                        </div>
                                        
                                    </div>
                                 
                                  
                                
                             
                                  </div>
                                </div>

                                </div>
                               </div>
                               <div class="row">
                               <div class="col-lg-12 col-md-12 ">
                                <div class="card">
                                  <div class="card-body text-white first_section">
                               
                               
                                          <div class="d-flex justify-content-between row">
                                         <div class="col-xl-6 col-md-12 col-sm-12 col-12 mt-3">
                                         <h6 class="m-0">Weekly Availability</h6>
                                         <small class="smalltext ">What's your general availability?</small>
                                         </div>
                                        
                                          <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex mt-3">
                                      <input type="radio" id="Check" name="availability" value="0" {{ isset($model->availability) && $model->availability ==
                                        0 ? 'checked' : '' }}>
                                      <label for="Check" class="mr-3">Open</label><br>
                                      <input type="radio" id="depositdirect" name="availability" value="1" {{ isset($model->availability) && $model->availability ==
                                        1 ? 'checked' : '' }} >
                                      <label for="depositdirect">Custom</label><br>
                                      </div>
                                      
                                        
                                              </div>
                                        
                                         <div class="custom-availability @if($model->availability=='1') @else d-none @endif mt-5">
                                         <div class="availability-1 mt-3">
                                          <label for=""><b>Monday</b></label>
                                          <div class="row">
                                           <div class="col-6">
                                           <label for="exampleFormControlSelect1">Availabile from</label>
                                            <select class="form-control availabile-from mon_from" id="exampleFormControlSelect1">
                                              <option class="earning-filter-option" {{ isset($AvailMon) &&  $AvailMon->availability_type ==
                                                'open'  ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time== '00:00:00' && $AvailMon->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->from_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option>
                                              
                                            </select>
                                           </div>
                                            <div class="col-6">
                                           <label for="exampleFormControlSelect1">Until</label>
                                            <select class="form-control availabile-until mon_until" name="" id="exampleFormControlSelect1" disabled>
                                            <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time== '00:00:00' && $AvailMon->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailMon) && $AvailMon->until_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option>
                                            </select>
                                           </div>
                                          </div>
                                         </div>
                                         <div class="availability-1 mt-3">
                                          <label for=""><b>Tuesday</b></label>
                                          <div class="row ">
                                           <div class="col-6">
                                           <label for="exampleFormControlSelect1">Availabile from</label>
                                            <select class="form-control availabile-from tue_from" id="exampleFormControlSelect1">
                                            <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time== '00:00:00' && $AvailTue->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->from_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option>  
                                            </select>
                                           </div>
                                            <div class="col-6">
                                           <label for="exampleFormControlSelect1">Until</label>
                                            <select class="form-control availabile-until tue_until" id="exampleFormControlSelect1" disabled>
                                            <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time== '00:00:00' && $AvailTue->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailTue) && $AvailTue->until_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                            </select>
                                           </div>
                                          </div>
                                         </div>
                                         <div class="availability-1 mt-3">
                                          <label for=""><b>Wednesday</b></label>
                                          <div class="row">
                                           <div class="col-6">
                                           <label for="exampleFormControlSelect1">Availabile from</label>
                                            <select class="form-control availabile-from wed_from" id="exampleFormControlSelect1">
                                            <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time== '00:00:00' && $AvailWed->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->from_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                              
                                            </select>
                                           </div>



                                            <div class="col-6">
                                           <label for="exampleFormControlSelect1">Until</label>
                                            <select class="form-control availabile-until wed_until" id="exampleFormControlSelect1" disabled>
                                           <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time== '00:00:00' && $AvailWed->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailWed) && $AvailWed->until_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                            </select>
                                           </div>
                                          </div>
                                         </div>
                                         <div class="availability-1 mt-3">
                                          <label for=""><b>Thursday</b></label>
                                          <div class="row">
                                           <div class="col-6">
                                           <label for="exampleFormControlSelect1">Availabile from</label>
                                            <select class="form-control availabile-from thu_from" id="exampleFormControlSelect1">
                                            <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time== '00:00:00' && $AvailThu->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->from_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                              
                                            </select>
                                           </div>
                                            <div class="col-6">
                                           <label for="exampleFormControlSelect1">Until</label>
                                            <select class="form-control availabile-until thu_until" id="exampleFormControlSelect1" disabled>
                                               <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time== '00:00:00' && $AvailThu->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailThu) && $AvailThu->until_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                            </select>
                                           </div>
                                          </div>
                                         </div>
                                         <div class="availability-1 mt-3">
                                          <label for=""><b>Friday</b></label>
                                          <div class="row">
                                           <div class="col-6">
                                           <label for="exampleFormControlSelect1">Availabile from</label>
                                            <select class="form-control availabile-from fri_from" id="exampleFormControlSelect1">
                                            <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time== '00:00:00' && $AvailFri->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->from_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                              
                                            </select>
                                           </div>
                                            <div class="col-6">
                                           <label for="exampleFormControlSelect1">Until</label>
                                            <select class="form-control availabile-until fri_until" id="exampleFormControlSelect1" disabled>
                                            <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time== '00:00:00' && $AvailFri->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailFri) && $AvailFri->until_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                            </select>
                                           </div>
                                          </div>
                                         </div>
                                         <div class="availability-1 mt-3">
                                          <label for=""><b>Saturday</b></label>
                                          <div class="row">
                                           <div class="col-6">
                                           <label for="exampleFormControlSelect1">Availabile from</label>
                                            <select class="form-control availabile-from sat_from" id="exampleFormControlSelect1">
                                            <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time== '00:00:00' && $AvailSat->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->from_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                              
                                            </select>
                                           </div>
                                            <div class="col-6">
                                           <label for="exampleFormControlSelect1">Until</label>
                                            <select class="form-control availabile-until sat_until" id="exampleFormControlSelect1" disabled>
                                            <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time== '00:00:00' && $AvailSat->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSat) && $AvailSat->until_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                            </select>
                                           </div>
                                          </div>
                                         </div>
                                         <div class="availability-1 mt-3">
                                          <label for=""><b>Sunday</b></label>
                                          <div class="row">
                                           <div class="col-6">
                                           <label for="exampleFormControlSelect1">Availabile from</label>
                                            <select class="form-control availabile-from sun_from" id="exampleFormControlSelect1">
                                            <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time== '00:00:00' && $AvailSun->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->from_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                              
                                            </select>
                                           </div>
                                            <div class="col-6">
                                           <label for="exampleFormControlSelect1">Until</label>
                                            <select class="form-control availabile-until sun_until" id="exampleFormControlSelect1" disabled>
                                            <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->availability_type ==
                                                'open' ? 'selected' : '' }}  value="open">Open</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->availability_type ==
                                                'limited' ? 'selected' : '' }} value="limited">Limited</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->availability_type ==
                                                'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time ==
                                                '01:00:00' ? 'selected' : '' }} value="1:00">1:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '02:00:00' ? 'selected' : '' }} value="2:00">2:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '03:00:00' ? 'selected' : '' }} value="3:00">3:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '04:00:00' ? 'selected' : '' }} value="4:00">4:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '05:00:00' ? 'selected' : '' }} value="5:00">5:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '06:00:00' ? 'selected' : '' }} value="6:00">6:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '07:00:00' ? 'selected' : '' }} value="7:00">7:00 AM</option>

                                              <option class="earning-filter-option"{{ isset($AvailSun) && $AvailSun->until_time  ==
                                              '08:00:00' ? 'selected' : '' }} value="8:00">8:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '09:00:00'? 'selected' : '' }} value="9:00">9:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                               '10:00:00' ? 'selected' : '' }} value="10:00">10:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '11:00:00' ? 'selected' : '' }} value="11:00">11:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time== '00:00:00' && $AvailSun->availability_type  =='custom'
                                                 ? 'selected' : '' }} value="00:00">12:00 AM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '13:00:00' ? 'selected' : '' }} value="13:00">1:00 PM</option>

                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '14:00' ? 'selected' : '' }} value="14:00">2:00 PM</option>
                                                
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                               '15:00:00' ? 'selected' : '' }} value="15:00">3:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '16:00:00' ? 'selected' : '' }} value="16:00">4:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '17:00:00' ? 'selected' : '' }} value="17:00">5:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '18:00:00' ? 'selected' : '' }} value="18:00">6:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                               '19:00:00' ? 'selected' : '' }} value="19:00">7:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '20:00:00' ? 'selected' : '' }} value="20:00">8:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '21:00:00' ? 'selected' : '' }} value="21:00">9:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '22:00:00' ? 'selected' : '' }}  value="22:00">10:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '23:00:00' ? 'selected' : '' }} value="23:00">11:00 PM</option>
                                              <option class="earning-filter-option" {{ isset($AvailSun) && $AvailSun->until_time  ==
                                                '12:00:00' ? 'selected' : '' }} value="12:00">12:00 PM</option> 
                                            </select>
                                           </div>
                                          </div>
                                         </div>
                                     
                                         <button class="btn  availabile-model-data feel-btn text-white mt-3" type="button">Save</button>
                                         
                                         </div>
                               
                                   
                                  </div>
                           
                                </div>
                              </div>
                            </div>

                                <div class="row  mb-4">
                                  <div class="card col-12">
                                    <div class="card-body text-white">
                                      <div class=" justify-content-between">
                                     <h6>My Links:</h6>
                                     @php
                                     $social_link = json_decode($model->socail_links);
                                     @endphp
                                     <div class="row">
                                    <div class="col-12">   <div class="ml-input"><label for="" class="form-label"><i class="bi-twitter"></i></label>
                                    <input type="text" class="form-control" name="link1" maxlength="100"  value="{{ isset($social_link->twitter) ? $social_link->twitter : '' }}"></div></div>
                                    <div class="col-12">   <div class="ml-input"><label for="" class="form-label"><i class="bi-instagram"></i></label>
                                    <input type="text" class="form-control" name="link2" maxlength="100"   value="{{ isset($social_link->instagram) ? $social_link->instagram : '' }}"></div></div>
                                    <div class="col-12">   <div class="ml-input"><label for="" class="form-label"><i class="bi-link-45deg"></i></label>
                                    <input type="text" class="form-control" name="link3" maxlength="100"  value="{{ isset($social_link->snapchat) ? $social_link->snapchat : '' }}"></div></div>
                                    <div class="col-12">   <div class="ml-input"><label for="" class="form-label"><i class="bi-cursor"></i></label>
                                    <input type="text" class="form-control" name="link4" maxlength="100"  value="{{ isset($social_link->spankpay) ? $social_link->spankpay : '' }}"></div></div>
                                    <div class="col-12">   <div class="ml-input"><label for="" class="form-label"><i class="bi-person-badge-fill"></i></label>
                                        <input type="text" class="form-control" name="link5" maxlength="100"  value="{{ isset($social_link->website) ? $social_link->website : '' }}"></div></div>
                                        <div class="col-12">   <div class="ml-input"><label for="" class="form-label"><i class="bi-globe"></i></label>
                                        <input type="text" class="form-control" name="link6" maxlength="100"  value="{{ isset($social_link->camsite) ? $social_link->camsite : '' }}"></div></div>

                                     
                                     </div>

                                    
                                          </div>
                                    
                                     
                                  </div>
                                </div>
                               
                              </div>
                              <div class="row mb-4">
                                  <div class="card col-12">
                                    <div class="card-body text-white">
                                      <div class="justify-content-between">
                                     <h6>Gallery image</h6>
                                     <input type="file" class="form-control mb-4" name="gallery_image[]" value="" multiple>
                                  @if (!empty($model->gallery_image))
                                    @php
                                    $value = json_decode($model->gallery_image);
                                    @endphp
                                      @if (!empty($value))
                                       <div class="even" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                                      @foreach ($value as $multidata)
                                        <div class="parc">
                                          <span class="pip" data-title="{{ $multidata }}">
                                            <a class="btn media_remove_btn" ><i class="fa fa-times remove"    onclick="removeImage('{{ $multidata }}')"></i></a>
                                            <img class="mod_media" src="{{ url('gallery images') . '/' . $multidata ?? '' }}" alt="" width="100"  height="100">
                                            
                                          </span>
                                        </div>
                                      @endforeach
                                      </div>
                                      @endif
                                    <input type="hidden" name="gallery_images_old" id="gallery_img" value="{{ $model->gallery_image }}">
                                  @endif
                                  </div>
                                  </div>
                                </div>
                               
                              </div>
                 
                             </div>
                            
                           <div class="col-sm-12 text-white col-md-3 col-lg-2 mt-5 mb-5">
<div class="row">
    <div class="col-12"><div class="row mb-4">
        <div class="card col-12">
          <div class="card-body text-white">
            <div class=" justify-content-between">
           <p class="namingtag">Orientation</p>
           <div class="col-12"> 
            
            @foreach($Orientation as $key => $value)
            <label class="ckeckfilter">
               
              <input type="radio"  {{ isset($model->Orientation) && $model->Orientation ==
                $value->id ? 'checked' : '' }} name="orientation" id="s-option1.{{$key}}." class="filter orientation"
              value="{{$value->id}}" />
              <label for="s-option1.{{$key}}."> {{$value->title}}</label>
              <div class="check">
                <div class="inside"></div>
              </div>
            </label>
            @endforeach

           



            </div>

          
                </div>
          
           
        </div>
      </div>
     
    </div>
    <div class="row mb-4">
        <div class="card col-12">
          <div class="card-body text-white">
            <div class=" justify-content-between">
           <p class="namingtag">Hair Color</p>
           <div class="col-12"> 
            @foreach($ModelHair as $key => $value)
            <label class="ckeckfilter">
              <input type="radio" {{ isset($model->Hair) && $model->Hair == $value->id ?
                                'checked' : '' }} name="hair"
               id="s-option2.{{$key}}." class="filter hair"
              value="{{$value->id}}" />
              <label for="s-option2.{{$key}}."> {{$value->title}}</label>
              <div class="check">
                <div class="inside"></div>
              </div>
            </label>
            @endforeach 
           </div>

          
                </div>
          
           
        </div>
      </div>
     
    </div>

    <div class="row mb-4">
        <div class="card col-12">
          <div class="card-body text-white">
            <div class=" justify-content-between">
           <p class="namingtag">Ethnicity</p>
           <div class="col-12">
            @foreach($ModelEthnicity as $key => $value)
            <label class="ckeckfilter">
              <input type="radio"  name="ethincity"
               id="s-option20.{{$key}}." class="filter ethincity" {{ isset($model->Ethnicity) && $model->Ethnicity ==
                                $value->id ? 'checked' : '' }}
              value="{{$value->id}}" />
              <label for="s-option20.{{$key}}."> {{$value->title}}</label>
              <div class="check">
                <div class="inside"></div>
              </div>
            </label>
            @endforeach </div>

          
                </div>
          
           
        </div>
      </div>
     
    </div>
    <div class="row mb-4">
        <div class="card col-12">
          <div class="card-body text-white">
            <div class=" justify-content-between">
           <p class="namingtag">Language</p>
           <div class="col-12">    @foreach($ModelLanguage as $key => $value)
            <label class="ckeckfilter">
              <input type="radio" name="language" {{ isset($model->Language) && $model->Language == $value->id
                                ? 'checked' : '' }}
               id="s-option22.{{$key}}." class="filter language"
              value="{{$value->id}}" />
              <label for="s-option22.{{$key}}."> {{$value->title}}</label>
              <div class="check">
                <div class="inside"></div>
              </div>
            </label>
            @endforeach</div>

          
                </div>
          
           
        </div>
      </div>
     
    </div>
    <div class="row mb-4">
        <div class="card col-12">
          <div class="card-body text-white">
            <div class=" justify-content-between">
           <p class="namingtag">Fetish</p>
           <div class="col-12">  @foreach($ModelFetishes as $key => $value)
            <label class="ckeckfilter">
              <input type="radio" {{ isset($model->Fetishes) && $model->Fetishes == $value->id ?
                                'checked' : '' }} name="fetish" id="s-option23.{{$key}}." class="filter fetish"
              value="{{$value->id}}" />
              <label for="s-option23.{{$key}}."> {{$value->title}}</label>
              <div class="check">
                <div class="inside"></div>
              </div>
            </label>
            @endforeach</div>

          
                </div>
          
           
        </div>
      </div>
     
    </div>


</div>

</div>
<button type="submit" class="btn feel-btn ">Update</button>
              </form>
                           </div>



<style>
  .mode_dwitch{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 42px;
    text-transform: uppercase;
    color: #FFFFFF;
    margin: 0px 10px;
  }
  /* . {
    border: 3px dotted #4a4a4a;
    text-align: center;
    margin: 66px 20px;
} */
.card-body.text-white.first_section {
    height: 370px;
}
.col-6.input_type {
    margin: 18px 0px;
}
   .head {
    font-family: 'Montserrat';
font-style: normal;
font-weight: 600;
font-size: 17px;
line-height: 20px;
color: #FFFFFF;
}
.ckeckfilter .filterbig-checkbox+label {
    padding: 8px;
    margin-right: 20px;
    /* height: 2px !important; */
    margin-top: 10px !important;
}
.ckeckfilter .filterbig-checkbox:checked+label:after {
    font-size: 11px;}
.d-flex.justify-content-between .small, small {
    font-size: 80%;
    font-weight: 400;
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 25px;
    color: #B1B1B1;
}
  .form-check.form-switch.d-flex {
    align-items: center;
}
.ckeckfilter {
    margin: 10px;
}
  .switch{
	position: relative;
	width: 60px;
	height: 34px;
	/* margin: 20px auto; */
}
.switch input[type=checkbox]{
	position: absolute;
	-moz-opacity: 0;
	-khtml-opacity: 0;
	-webkit-opacity: 0;
	opacity: 0;
	-ms-filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
	filter: alpha(opacity=0);
}
.switch label,
.switch label span{
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	transition-duration: .2s;
}
.switch label{
	border-radius: 20px;
	background-color: #ddd;
  height:35px;
}
.switch label:before,
.switch label:after{
	position: absolute;
	top: 0;
	width: 34px;
	line-height: 34px;
	color: #fff;
	text-align: center;
}
.switch label span {
	z-index: 1;
	width: 28px;
	height: 28px;
	margin: 3px;
	border-radius: 50%;
	background-color: #fff;
}
/* .switch label:before {
	left: 0;
	font-size: 11px;
	content: 'ON';
}
.switch label:after {
	right: 0;
	font-size: 10px;
	content: 'OFF';
} */
.switch input:checked+label {
	background: linear-gradient(90deg, #AF2990 0%, #4C2ACD 100%);
}
.switch input:checked+label span {
	transform: translateX(26px);
}
</style>
<script>
    $(document).ready(function() {
            $('#dataTable').DataTable();

        });

        function removeImage(data) {
            console.log(data);
            var inputvalue = $('#gallery_img').val();
            var ary = JSON.parse(inputvalue);
            console.log(ary);

            ary.splice($.inArray(data, ary), 1);
            var asd = JSON.stringify(ary);
            $('.pip[data-title="' + data + '"]').remove();
            $('#gallery_img').val(asd);
        }
</script>
@endsection
@section('scripts')
@parent
@endsection

