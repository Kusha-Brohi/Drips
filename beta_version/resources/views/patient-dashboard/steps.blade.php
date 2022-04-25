@extends('layouts.patient-dashboard.main')
@section('content')
@include('layouts/front.header')

<style>
.top-row.top-pad {
    padding: 10px;
}
body{
    width:100%;
}
    /* sidenav-css start */
.sidenav {
  height: 100%;
  position: fixed;
  z-index: 999;
  top: 0;
  left: -500px;
  background: #0668a4;
  background-repeat: no-repeat;
  background-size: cover;
  overflow-x: hidden;
  padding-top: 60px;
  transition: 0.2s;
  -webkit-transition: 0.2s;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
  width: 250px;
}
/* The navigation menu links */

/* When you mouse over the navigation links, change their color */
.sidenav a:hover, .sidenav a:focus {
  color: #000;
  text-decoration: none;
  padding-left: 40px;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 12px;
  color: #fff;
  display: block;
  transition: 0.3s;
  text-transform: uppercase;
}
.mobilecontainer span {
  color: #0668a4;
  margin-right: 10px;
  margin: 0px 9px;
  padding: 10px 0;
  position: relative;
  z-index: 1;
}
.mobilecontainer img {
  width: 63px;
  margin: -19px 0;
  position: relative;
  z-index: 1;
}
.mobilecontainer {
  background-color: #fff;
  padding-left: 20px;
}
/* sidenav-css end */
.product-content-steps{
    margin-top:150px;
}

@media only screen and (max-width: 1024px) {
    section.see-drip .row {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
}
@media only screen and (max-width: 768px) {
    .top-row li {
    padding: 0px 16px;
}
header{
    height: 68px;
        background: transparent;
}
.carosal-cap h4 {
       font-size: 16px;
    color: #000000;
    margin-top: -130px;
    margin-left: -120px;
    width: 250px;
}
footer img {
    text-align: center;
    width: 50%;
    margin: 0% auto;
    display: block;
}
.commonly-list ul {
    padding: 0;
    padding-left: 30px;
}
footer h4 {
    font-size: 30px;
    text-align: center;
}
.bottom-row img {
    width: 25%;
    margin-top: -10px;
}
}
@media only screen and (max-width: 600px) {
    .top-row.top-pad {
    padding: 0px;
}
    
    .copyright .row{
        display:block;
        text-align:center;
    }
    .txt-mov a {
    margin-right: 50px;
}

    section.drip-sec .row{
        display:block;
    }
    .drip-txt{
        margin-left:60px;
    }
    .drip-sign{
            padding-top: 10px;
    }
    .drip-sign h3{
        text-align:center;
    }
    .drip-sign h4{
         text-align: center;
    }
    .drip-sign p{
        text-align:center;
    }
    section.electronic{
        padding: 10px 0px;
    }
    section.drip-sec{
        padding: 10px 0px;
    }
    .see-drip-txt h4{
        font-size:50px;
        text-align:center;
    }
    .see-drip-txt h3{
         font-size:35px;
        text-align:center;
    }
    .see-drip-txt p {
    color: #fff;
    font-size: 15px;
    text-align: center;
    }
    section.see-drip .row{
    display:block;
    }
    .see-drip-txt a {
        margin: 0% auto;
        width: 120px;
        display: flex;
    }
    section.changing {
    padding: 30px 0px;
    }
    section.changing .row{
        display:block;
        text-align: center;
    }
    .commonly-list ul{
        padding-left:25px;
    }
    footer img {
    width: 100%;
}
    .main-slider {
        margin-top: 150px;
    }
    .top-row {
    margin-top: -50px;
    background: #0668a4;
    }
    .list-inline{
    display: inline-block;
    }
    .list-inline > li{
     display: contents;
    }
    .top-row ul li a {
   color: #fff;
    padding: 15px 16px;
    display: inline-block;
    font-size: 11px;
    margin-left: -15px;
}
    a#ph-login{
       color: #fff;
    border: 1px solid #fff;
    padding: 7px 18px;
    display: inline-block;
    border-radius: 4px;
    font-size: 15px;
    }
    a#p-login{
        margin-right: 130px;
    }
    .bottom-row img {
    width: 160px;
    height: 80px;
    margin-top: -10px;
    margin-left: -15px;
}
footer h4 {
    text-align: center;
}

.inputform li input{
    width:100% ;
}
.product-content-steps{
        margin-top: 50px;
}
body.responsive {
    margin-top: 50px;
}

.col-md-4.col-xs-12.text-right.txt-mov {
    text-align: center;
    padding-left: 55px;
}
    
    
    .rigistertionlist button{
     width: 150px;
    margin: 0% auto;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    }
    a.nextBtn.btn.btn-default.btn-circle {
    width: 150px;
    margin: 0% auto;
    text-align: center;
    justify-content: center;
    left: -174px;
    position: absolute;
}
button.nextBtn.btn.btn-default.btn-circle:last-child {
    /* position: absolute; */
    /* left: -100px; */
    margin-left: -190px;
}
    
}



@media only screen and (max-width: 320px) {
        .top-row ul li a {
    color: #fff;
    padding: 15px 16px;
    display: inline-block;
    font-size: 9px;
}
a#p-login {
    margin-right: 80px;
}


}

.disabled-link {
  pointer-events: none;
}



}
</style>
<section class="steps_sec">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="product-content-steps">
                     <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                           <div class="stepwizard-step">
                              <a href="#step-1"  id='tab-step-1'type="button" class="disabled-link btn btn-circle btn-default btn-primary">Personal Detail</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-2"  id='tab-step-2'type="button" class="disabled-link btn btn-default btn-circle">Contact Info</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-3"  id='tab-step-3'type="button" class="disabled-link btn btn-default btn-circle">Allergies</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-4"  id='tab-step-4'type="button" class="disabled-link btn btn-default btn-circle">Past Medical History</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-5"  id='tab-step-5'type="button" class="disabled-link btn btn-default btn-circle">Past Surgical History</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-6"  id='tab-step-6'type="button" class="disabled-link btn btn-default btn-circle">Family History</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-7"  id='tab-step-7'type="button" class="disabled-link btn btn-default btn-circle">Social History</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-8"  id='tab-step-8'type="button" class="disabled-link btn btn-default btn-circle">Current Medications</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-9"  id='tab-step-9'type="button" class="disabled-link btn btn-default btn-circle">Blood Type:</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-10" id='tab-step-10' type="button" class="disabled-link btn btn-default btn-circle">Self Assessment</a>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-11" id='tab-step-11' type="button" class="disabled-link btn btn-default btn-circle">Upload profile</a>
                           </div>
                          <!--  <div class="stepwizard-step">
                              <button type="button"  class="btn btn-default btn-circle" data-toggle="modal" data-target="#ecc_modal">ECC </button>
                              
                           </div> -->

                           <div class="stepwizard-step">
                              <button href="#step-13" id='tab-step-131' type="button" class="btn btn-default btn-circle">ECC</button>
                           </div>
                           <div class="stepwizard-step">
                              <a href="#step-12" id='tab-step-130' type="button" class="btn btn-default btn-circle">Payment</a>
                           </div>
                        </div>
                     </div>

                    
                     <form role="form" method="POST" name="form1" id="myForm" action="{{route('submitPatientProfile')}}" enctype="multipart/form-data" style="width: 100%;">
                          @csrf

    <input type="hidden" name="user_id" value="{{$userdata->id}}">
     <input type="hidden" name="customer_status" value="4">
     <input type="hidden" name="fname" value="{{$userdata->name}}">
      <input type="hidden" value="patient"  name="role" id="role" readonly>
                        <div class="row setup-content" id="step-1" style="display: none;">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Personal Information</h3>
                                 </div>
                              </div>


                              <div class="step_content_wrap">
                                 
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>Name</label>
                                       <input type="text"  id="Name" name="name" placeholder="First Name" required="" value="{{$userdata->name}}">
                                   
                                    </div>
                                 </div>
                 
                                 
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>Last name</label>
                                       <input type="text" id="Lname" name="lname" placeholder="Last Name" value="{{$popupdata->lname}}" required="">
                                    </div>
                                 </div>
                               <!--    <div class="col-md-3 col-sm-3 col-xs-12"> -->
                                    <!-- <div class="rigistertionlist">
                                       <input type="password"  name="password" id="pass" onkeyup="CheckPasswordStrength(this.value)"    placeholder="Password" value="{{Auth::user()->password}}" required="">
                    
                  </div> -->
                      
                  
                    <!--<input type="text" name="password_strength" id="password_strength">-->
                    <!-- <div id="password_strength"></div>
                     
                                 </div>-->
                  
                                 <!-- <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="password"  name="password_confirmation" id="pass2" onkeyup="checkPass(); return false;"   placeholder="Confirm password" value="" required="">
                                    </div>
                    
                     <div id="error-nwl"></div>
                                 </div> -->
                                
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>Date Of Birth</label>
                                       <input type="date" id="Birth" name="DOB" required="" placeholder="Date of birth" value="{{$popupdata->DOB}}" max="{{date("Y-m-d")}}">
                                    </div>
                                 </div>
                          
                        <div class="col-md-2 col-sm-2 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Weight (in Kg)</label>
                       <input type="hidden" value="kilograms" id="weightunits">
                       <input type="number" id="weight" value="{{$popupdata->Weight}}"  name="Weight" placeholder="Weight in Kg" >
                   </div>
               </div>
               <div class="col-md-2 col-sm-2 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Height (in Cm)</label>
                            <input type="hidden" value="meters" id="heightunits">
                       <input type="text" id="height" value="{{$popupdata->height}}"  name="height" placeholder="Height in Cm">
                   </div>
               </div>
               
               <div class="col-md-2 col-sm-2 col-xs-12">
                   <div class="rigistertionlist">
                        <label>&nbsp;</label>
                       <button type="button" value="computeBMI" onclick="computeBMI();">CALCULATE</button>
                   </div>
               </div>
               <div class="col-md-2 col-sm-2 col-xs-12">
                   <div class="rigistertionlist">
                       <label>BMI</label>
                       <input type="text" name="Bmi" value="{{$popupdata->Bmi}}" placeholder="BMI" id="output" readonly="">
                   </div>
               </div>
             <div class="col-md-12 col-sm-12 col-xs-12">
                <span id="BMI_msg">
              </span>
               </div> 
                                       
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Gender</label>
                    
                                       <ul>
                    @if($popupdata->Gender == male)
                       <li class="dis_in_block"><label><input type="radio" 

                        name="Gender"  value="male" checked >Male</label></li>
                          <li class="dis_in_block"><label><input type="radio"                                    
                        name="Gender" value="female">Female</label></li>
                      @elseif($popupdata->Gender == female)
                       <li class="dis_in_block"><label><input type="radio" 

                                          name="Gender"  value="male">Male</label></li>
                                          <li class="dis_in_block" ><label><input type="radio"                                    
                                            name="Gender" value="female" checked>Female</label></li>
                      @else
                     <li class="dis_in_block"><label>
                      <input type="radio" name="Gender" class="rdSelect" value="male" checked="">Male</label></li>
                       <li class="dis_in_block"><label><input type="radio"                                    
                        name="Gender" class="rdSelect"  value="female" >Female</label></li>
                        @endif
                        
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="radio_btns">
                                       <label>Marital Status</label>
 @if($popupdata->material_status == Single)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Single" checked >Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Married">Married</label></li>
                                       </ul>
 @elseif($popupdata->material_status == Married)
    <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Single" >Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Married" checked>Married</label></li>
                                       </ul>
  @else
     <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="Ismarital" value="Single" checked>Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="Ismarital" value="Married" >Married</label></li>
                                       </ul>
   @endif
                                    </div>
                                    <!-- <div class="radio_btns">
                                       <label>Marital Status</label>
                     @if($popupdata->material_status == Single)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" value="Single" checked >Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" value="Married">Married</label></li>
                                       </ul>
                     @elseif($popupdata->material_status == Married)
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" value="Single" >Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" value="Married" checked>Married</label></li>
                                       </ul>
                     @else
                         <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" value="Single" >Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" value="Married">Married</label></li>
                                       </ul>
                     @endif
                                    </div> -->
                                 </div>

                              

                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-2" href="javascript:void(0)" id="StrongBTN"  type="button" class=" nextBtn btn-step btn btn-default btn-circle">Next</a>
                  
                  </div>
                  
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row setup-content" id="step-2" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Contact Information</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" name="Address" id="Address" value="{{$popupdata->Address}}"   placeholder="Address" required="">
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" id="phone" maxlength="10" name="phone" placeholder="Phone Number" value="{{$popupdata->phone}}"  required="">
                     <span id="errmsg"></span>
                     <label for="input"></label>
                                    </div>
                                 </div>
                           
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="email" id="email" value="{{$userdata->email}}" name="email"  placeholder="Email Address" required="" readonly="">
                                    </div>
                                 </div>
                               
                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-3" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                          
                                    </div>
                                 </div>
                 <button id="bckbtn" class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                
                 
                 
                              </div>
                           </div>
                        </div>

                   

                        <div class="row setup-content" id="step-3" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Allergies</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                              <?php
                              $allergies = json_decode($popupdata->allergies);
                              //dd($allergies);
                              ?>
              
               <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you allergic to any medication or do you have any type of allergies?</label>
                    @if($popupdata->Is_allergies == "yes")
              
                     <ul>
                                          <li class="dis_in_block"><label><input  id="if" type="radio" value="yes" name="Is_allergies" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input  id="if" type="radio" value="no" name="Is_allergies" >No</label></li>
                                       </ul>
                     @elseif($popupdata->Is_allergies == "no")
                   
                     <ul>
                                          <li class="dis_in_block"><label><input id="elseif" type="radio" value="yes" name="Is_allergies" >Yes</label></li>
                                          <li class="dis_in_block"><label><input  id="elseif" type="radio" value="no" name="Is_allergies" checked>No</label></li>
                                       </ul>
                     @else
                 
                                      <ul>
                         <!--  <input type="hidden" id="check_allergy" value="" name="Is_allergies"> -->
                                          <li class="dis_in_block"><label><input type="radio" id="yes" value="yes" name="Is_allergies">Yes</label></li>
                                          <li class="dis_in_block"><label><input  type="radio" id="no" value="no" name="Is_allergies" checked>No</label></li>
                                       </ul> 
                     
                     @endif
                                    </div>
                                 </div>  
                
              
                  
                  
                                  <!---extra answer----->
			                    
                        @if($popupdata->Is_allergies == "yes")

                
                       <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="allergies_records">
                      @foreach($allergies as $value)
                  
                          <input type="text" id="Yes_Answer" name="allergies[0]" value="{{$value}}" class="YesaddHide" >
                        
                        
                       @endforeach
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div> 
							      <div class="allergies_records_dynamic"></div>
                              
                                 <div class="col-md-2">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-allergies" href="javascript:void(0);" data-index="1" id="hide_btn1" class="addHide">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
              @else
              
                               <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="allergies_records">
                                             <input type="text" id="Answer" name="allergies[0]" style=""  class="addHide" placeholder="Allergies"> 
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                </div>
                                    </div>
                                 </div>
                              </div>
							  
							      <div class="allergies_records_dynamic"></div>
                              
                                 <div class="col-md-2">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-allergies" href="javascript:void(0);" data-index="1" id="hide_btn1" class="addHide">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                @endif

                             
                              
                                  <!-----end--->

                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-4" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>

                                    </div>
                                 </div>
                 
                  <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                              </div>
                           </div>
                        </div>
                    
                        <div class="row setup-content" id="step-4" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Past Medical History</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all the medical conditions you have been previously diagnosed with:</label>
                                    </div>
                                 </div>
                                    <?php
              
                        $past_medical_history = json_decode($popupdata->past_medical_history);
                       //dd($past_medical_history);
                        ?> 
                    @if($popupdata->past_medical_history != '')
                    @foreach($past_medical_history as $key => $value)
                      <!--  <input type="hidden" id="key" name="key" value="{{$key}}" > -->
                       <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="Pastmedical_records">
                      
                                             <input type="text" data-key="{{$key}}"  name="past_medical_history[{{$key}}]" style="" value="{{$value}}" >
                        
                       <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach

                               <div class="Pastmedical_records_dynamic"></div>
                              
                                 <div class="col-md-2">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-Pastmedical" href="javascript:void(0);" data-index="1" id="hide_btn1" class="addmore">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                    @endif

                    @if($popupdata->past_medical_history == '')
                 <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="Pastmedical_records">
                  
                  <input type="text" name="past_medical_history[0]" placeholder="Past Medical history" required="">
                      
                     </div>
                                    </div>
                                 </div>
                              </div>
                      
                             

                                 <div class="Pastmedical_records_dynamic"></div>
                              
                                 <div class="col-md-2">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-Pastmedical" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                                    @endif
                               <!--  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" id="past_medical_history" name="past_medical_history"   placeholder="medical conditions" required="">
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" name="past_condition2"  placeholder="Condition 2" >
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" name="past_condition3"   placeholder="Condition 3" >
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" name="past_condition4"  placeholder="Condition 4" >
                                    </div>
                                 </div>-->
                                 
                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-5" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                              
                                    </div>
                                 </div>
                 <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                 
                              </div>
                           </div>
                        </div>
                     
                        <div class="row setup-content" id="step-5" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Past Surgical History</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all surgical operations you have had:</label>
                                    </div>
                                 </div>
                
                            <?php
                 $surgical_history = json_decode($popupdata->Surgeries1);
                      // dd($surgical_history);
               
                        ?> 
            @if($popupdata->Surgeries1 != '')
              @foreach($surgical_history as $value)
                  <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="surgical_records">
                      
                                             <input type="text" name="Surgeries1[0]" value="{{$value}}" >
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>    
              @endforeach
              
              
              @else
                
                         <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="surgical_records"> 
                  
                    
                      <input type="text" name="Surgeries1[0]" placeholder="Past Surgical history"  required="">
                      
                      <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>
              
              
              
            @endif
            

                                 <div class="surgical_records_dynamic"></div>
                              
                                 <div class="col-md-2">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-surgical" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                                 <!--<div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" name="Surgeries1"  placeholder="surgical operations" required="">
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text"  name="Surgeries2"  placeholder="Operation 2" >
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text"  name="Surgeries3" placeholder="Operation 3" >
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text" name="Surgeries4"  placeholder="Operation 4" >
                                    </div>
                                 </div>-->
                                 
                                 

                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-6" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                        
                                    </div>
                                 </div>
                 
                 <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                              </div>
                           </div>
                        </div>
                      
                        <div class="row setup-content" id="step-6" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Family History</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all the medical conditions in your family (Parents and Siblings).</label>
                                    </div>
                                 </div>
                      <?php
              
                        $family = json_decode($popupdata->family_medical_condition);
                      // dd($currentmedication);
                        ?>  
                @if($popupdata->family_medical_condition != '')
                @foreach($family as $value)
                 
                                 <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text"  name="family_medical_condition[0]" value="{{$value}}" >
                                    </div>
                                 </div> 
                              </div>
                @endforeach
                
                @else
                  
                        <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                  
                    
                       <input type="text"  name="family_medical_condition[0]" placeholder="family Medical Conditions" required="">
                      
                  </div>
                                 </div> 
                              </div>
                
                
                
                @endif
                 
                        
                                   <div class="family_records_dynamic"></div>
                              
                                 <div class="col-md-2">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-family" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                           
                                
                              
                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-7" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                     
                                    </div>
                                 </div>
                 <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                              </div>
                           </div>
                        </div>
                     
                        <div class="row setup-content" id="step-7" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Social History</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do You Smoke Tobacco?</label>
                     @if($popupdata->do_you_smoke == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_you_smoke" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_you_smoke">No</label></li>
                                       </ul>
                     @elseif($popupdata->do_you_smoke == no)
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_you_smoke">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_you_smoke" checked>No</label></li>
                                       </ul>
                  @else
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" class="do_you_smoke" value="yes" name="do_you_smoke" required="">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" class="do_you_smoke" value="no" name="do_you_smoke" required="">No</label></li>
                                       </ul>
                  @endif
                     
                     
                     
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do You drink Alcohol?</label>
                     @if($popupdata->do_u_Alcohol == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_Alcohol" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_Alcohol">No</label></li>
                                       </ul>
                     @elseif($popupdata->do_u_Alcohol == no)
                     <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_Alcohol">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_Alcohol" checked>No</label></li>
                                       </ul>
                     @else
                       <ul>
                        <li class="dis_in_block"><label><input type="radio" class="do_u_Alcohol" value="yes" name="do_u_Alcohol">Yes</label></li>
              <li class="dis_in_block"><label><input type="radio" class="do_u_Alcohol" value="no" name="do_u_Alcohol">No</label></li>
                                       </ul>
                     @endif
                                    </div>
                                 </div>   

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do You Use Any Recreational Drugs Like Marijuana?</label>
                     @if($popupdata->do_u_marijuana == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_marijuana" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_marijuana">No</label></li>
                                       </ul>
                     @elseif($popupdata->do_u_marijuana == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_marijuana">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_marijuana" checked>No</label></li>
                                       </ul>
                     @else
                    <ul>
                      <li class="dis_in_block"><label><input type="radio" class="do_u_marijuana" value="yes" name="do_u_marijuana">Yes</label></li>
                     <li class="dis_in_block"><label><input type="radio" class="do_u_marijuana" value="no" name="do_u_marijuana">No</label></li>
                                       </ul>
                     @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you employed?</label>
                      @if($popupdata->are_you_employed == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input class="are_you_employed" type="radio" value="no" name="are_you_employed">No</label></li>
										  <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="yes" name="are_you_employed" checked>Yes</label></li>
                                       </ul>
                     @elseif($popupdata->are_you_employed == no )
                        <ul>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="yes" name="are_you_employed">Yes</label></li>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="no" name="are_you_employed" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="yes" name="are_you_employed">Yes</label></li>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="no" name="are_you_employed">No</label></li>
                                       </ul>
                       @endif
                                    </div>
                                 </div>
								 @if($popupdata->are_you_employed == yes)
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_hide">Job Title</label>
                                       <input type="text" id="job"  name="job_title" placeholder="job title" value="{{$popupdata->job_title}}" >
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_employer">Employer name</label>
                                       <input type="text" id="emp_name"  name="employee_name" placeholder="employee name"  value="{{$popupdata->employee_name}}">
                                    </div>
                                 </div>
                                 @else
									     <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_hide">Job Title</label>
                                       <input type="text" id="job" name="job_title" placeholder="job title" value="{{$popupdata->job_title}}" >
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_employer">Employer name</label>
                                       <input type="text" id="emp_name" name="employee_name" placeholder="employee name"  value="{{$popupdata->employee_name}}">
                                    </div>
                                 </div>
								 @endif
								 
		
                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-8" href="javascript:void(0)" type="button"  class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                        
                                    </div>
                                 </div>
                 
                 <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                              </div>
                           </div>
                        </div>
                      
                        <div class="row setup-content" id="step-8" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Current Medications:</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all active medications you take</label>
                                    </div>
                                 </div>
                <?php
              
                        $currentmedication = json_decode($popupdata->Current_medication1);
                      // dd($currentmedication);
                        ?>   
                @if($popupdata->Current_medication1 != '')
                @foreach($currentmedication as $value)
               <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="customer_records">
                                             <input type="text" name="Current_medication1[0]" value="{{$value}}" >
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>
                
                @endforeach
                
                @else
                  
                <div class="row">
                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="customer_records">
                  
                       <input type="text" name="Current_medication1[0]" style="" placeholder="Current Medication" >
                      
                      <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>
                @endif
              
                                 <div class="customer_records_dynamic"></div>
                              
                                 <div class="col-md-2">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-customer" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>


                                 </div>
                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-9" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                   
                                    </div>
                                 </div>
                 <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                              </div>
                           </div>
                   
                        
                        <div class="row setup-content" id="step-9" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Blood Type:</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>Please check your blood group (leave blank if you don't know)</label>
                                    </div>
                                 </div>
                              
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                      
                                       <select name="blood_type">
                                          <option value="" disabled>
                                             Select Your Blood Group
                                          </option>
                                          @if($popupdata->blood_type == "A+")
                                          <option value="A+" selected="">
                                             A+
                                          </option>
                                          @else
                                             <option value="A+">
                                             A+
                                          </option>
                                          @endif
                                          @if($popupdata->blood_type == "A-")
                                          <option value="A-" selected="">
                                             A-
                                          </option>
                                          @else
                                             <option value="A-">
                                             A-
                                          </option>
                                          @endif
                                          @if($popupdata->blood_type == "B+")
                                          <option value="B+" selected="">
                                             B+
                                          </option>
                                          @else
                                             <option value="B+">
                                             B+
                                          </option>
                                          @endif
                                          @if($popupdata->blood_type == "B-")
                                          <option value="B-" selected="">
                                             B-
                                          </option>
                                          @else
                                          <option value="B-">
                                             B-
                                          </option>
                                          @endif

                                           @if($popupdata->blood_type == "AB+")
                                          <option value="AB+" selected="">
                                             AB+
                                          </option> 
                                          @else
                                           <option value="AB+">
                                             AB+
                                          </option>
                                          @endif

                                            @if($popupdata->blood_type == "AB-")
                                          <option value="AB-" selected="">
                                             AB-
                                          </option>
                                          @else
                                          <option value="AB-">
                                             AB-
                                          </option>
                                          @endif
                                           @if($popupdata->blood_type == "O+")  
                                          <option value="O+" selected="">
                                             O+
                                          </option>
                                          @else
                                              <option value="O+">
                                             O+
                                          </option>
                                          @endif
                                          @if($popupdata->blood_type == "O-")
                                          <option value="O-" selected="">
                                             O-
                                          </option>
                                          @else
                                           <option value="O-">
                                             O-
                                          </option>
                                          @endif
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-10" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                            
                                    </div>
                                 </div>
            
                              </div>
                    
                           </div>
                <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                        </div>
                        
                        <div class="row setup-content" id="step-10" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Self Assessment</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any type of daily pain?</label>
                     @if($popupdata->daily_pain == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="daily_pain" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="daily_pain">No</label></li>
                                       </ul>
                     @elseif($popupdata->daily_pain == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="daily_pain">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="daily_pain" checked>No</label></li>
                                       </ul>
                     @else
                     <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="daily_pain">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="daily_pain">No</label></li>
                                       </ul>  
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have hearing or speaking impairment?</label>
                     @if($popupdata->impairment == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="impairment" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="impairment">No</label></li>
                                       </ul>
                     @elseif($popupdata->impairment == no)
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="impairment">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="impairment" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="impairment">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="impairment">No</label></li>
                                       </ul>
                     @endif
                     
                                    </div>
                                 </div>   

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have visual impairment?</label>
                     @if($popupdata->visual == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="visual" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="visual">No</label></li>
                                       </ul>
                     @elseif($popupdata->visual == no)
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="visual">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="visual" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="visual">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="visual">No</label></li>
                                       </ul> 
                     @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you on Dialysis</label>
                     @if($popupdata->dialysis == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="dialysis" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="dialysis">No</label></li>
                                       </ul>
                     @elseif($popupdata->dialysis == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="dialysis">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="dialysis" checked>No</label></li>
                                       </ul>
                    @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="dialysis">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="dialysis">No</label></li>
                                       </ul>
                     @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have cancer or have you ever had cancer?</label>
                     @if($popupdata->cancer == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="cancer" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="cancer">No</label></li>
                                       </ul>
                     @elseif($popupdata->cancer == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="cancer">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="cancer" checked>No</label></li>
                                       </ul>
                     @else
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="cancer">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="cancer">No</label></li>
                                       </ul> 
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any organ transplant?</label>
                     @if($popupdata->transplant == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="transplant" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="transplant">No</label></li>
                                       </ul>
                     @elseif($popupdata->transplant == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="transplant">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="transplant" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="transplant">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="transplant">No</label></li>
                                       </ul>
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any amputation?</label>
                     @if($popupdata->amputation == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="amputation" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="amputation">No</label></li>
                                       </ul>
                     @elseif($popupdata->amputation == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="amputation">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="amputation" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="amputation">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="amputation">No</label></li>
                                       </ul>
                    @endif
                      
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any psychiatric illness?</label>
                     @if($popupdata->psychiatric == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="psychiatric" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="psychiatric">No</label></li>
                                       </ul>
                     @elseif($popupdata->psychiatric == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="psychiatric">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="psychiatric" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="psychiatric">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="psychiatric">No</label></li>
                                       </ul>
                  @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have a heart device?</label>
                     @if($popupdata->heart == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="heart" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="heart">No</label></li>
                                       </ul>
                     @elseif($popupdata->heart == no)
                         <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="heart">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="heart" checked>No</label></li>
                                       </ul>
                     @else
                    <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="heart">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="heart">No</label></li>
                                       </ul>
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you on Insulin, chemotherapy or any immune suppressing medication?</label>
                     @if($popupdata->insulin == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="insulin" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="insulin">No</label></li>
                                       </ul>
                     @elseif($popupdata->insulin == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="insulin">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="insulin" checked>No</label></li>
                                       </ul>
                     @else
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="insulin">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="insulin">No</label></li>
                                       </ul>
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>Note: A score of 3 or more should be reported as complex <!-- on the self assessment, 3 or less should be not complex --></label>
                                    </div>
                                 </div>
                   
        
                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                       <a data-href="step-11" href="javascript:void(0)" type="button" class="nextBtn btn-step btn btn-default btn-circle">Next</a>
                                  
                                    </div>
                                 </div>
                
                              </div>
               
                           </div>
               <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                        </div>

                    
                        <div class="row setup-content" id="step-11" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Upload Profile Picture</h3>
                                 </div>
                              </div>
                              <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="upld_img text-center">
                                     <div class="uplod_imag">

                                    
                                        @if($popupdata->pic != NULL)

                                          <img id="profilePic" src="{{asset($popupdata->pic)}}" alt="Image">
                                          @else
                                          <img id="profilePic" src="{{asset('images/cloud-computing.png')}}" alt="Image">
                                        @endif
                                       



                                       <input type="file"  onchange="readURL(this);" name="pic" >
                                       

                                     </div>
                                     <h4>Browse Files</h4>
                                     <p>Drag And Drop Files Here</p>
                                    </div>
                                 </div>


                                 <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                    <div class="rigistertionlist">
                                      <!--  <a href="#step-9" type="button" class="nextBtn btn btn-default btn-circle">Next</a> -->
                 <!-- <a data-href="step-13" href="javascript:void(0)" type="submit" class="nextBtn btn-step btn btn-default btn-circle">SUBMIT</a> -->
                               <button id="Btn_show_ecc" class=" btn btn-default btn-circle">SUBMIT</button>
                                    </div>
                                 </div>
                 
                 <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Back</button>
                              </div>
                           </div>
                        </div>
                        </form>
                  <div class="row setup-content" id="step-12" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Debit Card/ATM Information:</h3>
                                 </div>
                              </div>
 <script src="https://webpay-ui.k8.isw.la/inline-checkout.js"></script>
  <?php

$endpoint = 'https://webpay-ui.k8.isw.la/collections/w/pay'; // Sandbox
//$endpoint = 'https://newwebpay.interswitchng.com/collections/w/pay'; // live
//customer code///
$ecc_ammount = DB::table('eccs')->first();
$ecc_charges = $ecc_ammount->Ecc_price;
$data_pat_id= $popupdata->user_id;
//price////
$charges = $ecc_charges * 100;
//$return_url = url('notification.php');
$merchant_code = 'MX15510';//'MX21696';
$pay_item_id = 'Default_Payable_MX15510';//'Default_Payable_MX21696';
$type = "-" . 'ecc_charge';
//$merchant_code = 'MX46954';
//$pay_item_id = 'Default_Payable_MX46954';
$appointment_id = $popupdata->user_id;
$appoint_code = 'transaction_Id:'.rand(0,9999)."-";
$txn_ref = $appoint_code . $appointment_id .$type;
$amount = $charges; 
//dd($amount);
$currency = "566";//"844";
$site_redirect_url = url('notification.php');
?>
</div>
<form method='post' action='<?=$endpoint?>'>
  @csrf
<!--  <input type="hidden" name="hashkey" value="">-->
 <input type='hidden' name='merchant_code' value='<?=$merchant_code?>' />
    <input type='hidden' name='pay_item_id' value='<?=$pay_item_id?>' />
    <input type='hidden' name='site_redirect_url' value='<?=$site_redirect_url?>' /> 
    <input type='hidden' name='txn_ref' value='<?=$txn_ref?>' />
    <input type='hidden' name='amount' value='<?=$amount?>' />
    <input type='hidden' name='currency' value='<?=$currency?>' />

  @if($popupdata->ecc_payment == 1 && $popupdata->first_appointment == 1  )
<div class="step_content_wrap">
<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="rigistertionlist" >
  <h3 id="paid" >Already paid!</h3>
  <a  id="paid" href="{{url('/patient-dashboard/consultation')}}" class="btn btn-secondary" >Dashboard</a>
  
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="rigistertionlist" >


</div>
</div>
</div>
@else
  <div class="step_content_wrap">
<div class="col-md-6 col-sm-6 col-xs-12">
 <div class="rigistertionlist" style="padding-top: 15%;">
 <button class="nextBtn btn btn-default btn-circle">Pay Now</button>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="rigistertionlist" >
  <a href="{{url('/patient-dashboard/consultation')}}" class="btn btn-secondary" >Pay later</a>

</div>
</div>
</div>
@endif

</form>
</div>
 </div>
 </div>
       
                       <!-- <div class="row setup-content" id="step-10" style="">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="step_title">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h2>Success!</h2>
                                    <h5>Our Team will get in touch with you soon.</h5>
                                 </div>
                              </div>
                              <div class="col-md-2 col-sm-2 col-xs-2 pull-right">
                                 <div class="rigistertionlist">
                                    <a href="#step-9" type="button" class="btn btn-default btn-circle">Finish</a>
                                 </div>
                              </div>
                              
                           </div>
                        </div> --> 
                  
               </div>
            </div>
         </div>
         </div>

      </section>
 @include('layouts/front.footer')

@if($userdata->customer_status == '4')
<div class="modal fade ecc_card_modal" id="step-13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="est_modal modal-body">
              <section class="ecc_sec">
                   <!-- <div class="container"> -->
                        <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="ecc_card_wrap">
                              <div class="logo">
                                  <img src="{{asset($logo->img_path)}}" style="width: 30%;" class="img-responsive" alt="">
                              </div>
                            
                            </div>
                         </div>
                      </div>
        
            <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="ecc_card_wrap">
                               <h2 class="head_blue">Electronic Complain Card</h2>
                            </div>
                         </div>
                      </div>
         
                      <div class="row">
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_pic">
                               <figure>
                                  <img src="{{asset($popupdata->pic)}}" class="img-responsive" alt="">
                               </figure>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                 Name:{{$userdata->name}} 
                                 
                               </h4>

                               <h4>
                                 DOB:{{$popupdata->DOB}}
                               </h4>

                               <h4>
                               Gender:{{$popupdata->Gender}}
                               </h4>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Height:{{$popupdata->height}}cm
                               </h4>

                               <h4>
                                  Weight: {{$popupdata->Weight}}kg
                               </h4>

                               <h4>
                                  BMI: {{$popupdata->Bmi}}
                               </h4>
                            </div>
                         </div>
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Blood Group: {{$popupdata->blood_type}}
                               </h4>

                               <h4>
                                  Job Title: {{$popupdata->job_title}}
                               </h4>
                            </div>
                         </div>
                      </div>

                      <div class="row mt-5">
                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <h2 class="head_blue red_head">Allergies</h2>
                            <?php
                              $allergies = json_decode($popupdata->allergies);
                             // dd($allergies);
                              ?>
                                  
                             
                               @if($popupdata->Is_allergies == "yes")        
                              @foreach($allergies as $key => $value)
                              
                                 
                                 
                               <p class="txt_red normal_txt">{{$value}}</p>
                             
                               @endforeach
                            @else

                            <p class="normal_txt">not available</p>
                            
                                 @endif
                             <h2 class="head_blue">Past Medical History</h2>
                           <?php
              
                        $past_medical_history = json_decode($popupdata->past_medical_history);
                       //dd($past_medical_history);
                        ?>          
                                        @php
                                        $i = 0;
                                        @endphp
                                    @foreach($past_medical_history as $value)
                                     @php
                                    $i++;
                                    @endphp
                         
                               @if($value == '')
                                <p class="normal_txt">not available</p>
                                @else
                            <p class="normal_txt">{{$value}}</p>
                            @endif 
                              @endforeach
                            
                            <h2 class="head_alernate">Past Surgical History</h2>
                            <?php
                 $surgical_history = json_decode($popupdata->Surgeries1);
                      // dd($surgical_history);
               
                        ?>          
                                 @php
                                        $i = 0;
                                        
                                        @endphp
                                    @foreach($surgical_history as $value)
                             
                                           @php
                                        $i++;
                                        
                                        @endphp
                                        @if($value == '')
                                        <p class="normal_txt">Not Available</p>
                                      @else
                            <p class="normal_txt">{{$value}}</p>
                          @endif
                            @endforeach

                            <h2 class="head_blue">Social History</h2>
                            <p class="normal_txt">Smoker:{{$popupdata->do_you_smoke}}</p>
                            <p class="normal_txt">Alcohol +:{{$popupdata->do_u_Alcohol}} </p>
                         </div>
                   
                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <h2 class="head_orange green_head">Current Medications</h2>
                       <?php
              
                        $currentmedication = json_decode($popupdata->Current_medication1);
                      // dd($currentmedication);
                        ?>         
                                 @php
                                        $i = 0;
                                        
                                        @endphp
                                    @foreach($currentmedication as $value)
                             
                                           @php
                                        $i++;
                                        
                                        @endphp
                            @if($value == '')
                           <p class="txt_green normal_txt">Not Available</p>
                              @else
                            <p class="txt_green normal_txt">{{$value}}</p>
                            @endif
                            @endforeach

                            <h2 class="head_alernate">Family History</h2>
                       <?php
              
                        $family = json_decode($popupdata->family_medical_condition);
                      // dd($currentmedication);
                        ?>         
                                 @php
                                        $i = 0;
                                        
                                        @endphp
                                    @foreach($family as $value)
                             
                                           @php
                                        $i++;
                                        
                                        @endphp
                            @if($value == '')
                           <p class="txt_green normal_txt">Not Available</p>
                              @else
                            <p class="txt_green normal_txt">{{$value}}</p>
                            @endif
                            @endforeach


                            <div class="col-sm-6">
                                          <div class="qr_code">
                                              <ul>

                                             

                            <li>
                              <?php
                              $url = urlencode(url('/patient-dashboard/steps/'.$userdata->id."?tabs=tab-step-131"));
                              
                              ?>
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{$url}}&choe=UTF-8" title="Link to Google.com" />


                                                  </li>
                                                  </ul>
                                          </div>
                                      </div>
                    
                       
                        <div class="pres_complain">
                              <h3 class="text-center">Presenting Complain:</h3>
                             
                           
                                <!--   <p>
                                    <input type="checkbox" id="test1" checked>
                                    <label for="test1"></label>
                                  </p> -->
                               
                                <div> 
                           <div class="container">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
 <!-- <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->

    <!-- Wrapper for slides -->


    <!-- Left and right controls -->

                           <!--  <div class="upld_img text-center">
                                     <div class="uplod_imag">
                                       <img src="{{asset('images/cloud-computing.png')}}" alt="Image">
                                       <input type="file" name="file_upload">
                                     </div>
                                     <h4>Media File Here</h4>
                                </div> -->

                            </div>
                                </div>

                                  
                           
                         </div>
          <!-- <button id="txt" class="head_alernate"   style="margin-left: 50%; border-color:#F48148;  margin-top: 13%;">Submit</button>  -->

           <a class="head_blue" style="margin-left: 0%; border-color:#F48148;  margin-top: 0%;" href="{{url('patient-dashboard/consultation')}}">Book Appointment</a>
                      </div>
            
              
                   <!-- </div> -->
                </section>
            </div>
<!--             <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
          </div>
        </div>
      </div>
      @endif

@endsection
@section('css')
<style>


#paid{
margin-left: 24%;
  
}
li {
    list-style: none;
}
.red {
    color:red;
}


.pres_complain .container {
    width: auto;
}


.uplod_imag .container {
    width: auto !important;
}

.uplod_imag .carousel-inner img {
    height: 180px;
    object-fit: cover;
}

a.delete_css {
    position: absolute;
    background: red;
    padding: 5px 10px;
    color: #fff;
    font-weight: 800;
}

.gallery_css {
    width: 24%;
    float: left;
    margin: 0px 4px;
}
/*.ecc_card_wrap .logo img {*/
/*    padding: 0px 50px;*/
/*    margin: auto;*/
/*}*/

.ecc_card_wrap .logo {
    padding: 0;
}




.modal-dialog {
    border: 8px solid #0076c0 !important;
    border-radius: 2px;
    border-color: #0076c0;
    }


.client_main_info input{

    font-size: 18px;
    color: #000;
    font-weight: 700;
    border: 0
  }


  button.viewbtn {
    border: 0px;
    margin: 0 7px;
    background-color: #00599054 !important;
    color: #005990 !important;
}
#step-13 .modal-content{
    background-image: url(http://custom-webdevelopment.com/drip/public/images/water-mark.png);
    background-size:auto;
    background-position:center;
    background-color:#fff;
    background-repeat:no-repeat;
}
.upld_img.text-center {
    width:60%;
    margin:30px auto 0;
}
.upld_img {
    border: 1px solid #9b9b9b;
    border-radius: 8px;
    padding: 30px 0px;
    font-family: 'Poppins';
    margin-bottom: 30px;
 
   
}
.qr_code ul li:last-child img {
    width: 68%;
    margin: 0 auto;
}
.upld_img.text-center {
    margin: auto;
    width: 32%;
    border: 2solid #9b9b9b;
    padding: 17px;
}


img{
  max-width:180px;
  /*height: 140px;*/
}
input[type=file]{
padding:10px;
background:#2d2d2d;}

button.btn.btn-default.prevBtn.btn-lg.pull-left {
    color: #fff;
    background-color: #056bad;
    padding: 20px 30px;
    display: inline-block;
    margin-top: 20px;
    font-size: 18px !important;
    font-family: 'Calibri';
    line-height: 0px;
    margin-left: 15px;
}
#bckbtn{
margin-right: 35%;  
  
}
#errmsg
{
color: red;
}
#BMI_msg
{
color: red;
}

.hide_yes{

  display: none;
}


/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endsection

@section('js')

<?php if(isset($_GET['tabs']) AND (!empty($_GET['tabs']))):?>
<script type="text/javascript">
  $(document).ready(function () {
    $("#<?=$_GET['tabs']?>").trigger('click');
  });  
</script>
<?php endif;?>



<?php if(($_GET['tabs'] == 'tab-step-131') AND (!empty($_GET['tabs']))):?>
<script type="text/javascript">
  $(document).ready(function () {
 $("#step-13").modal('show');
  });  
</script>
<?php endif;?>


<script>

  $("#tab-step-131").click(function(){
    $("#step-13").modal('show');

  });
</script>

<script type="text/javascript">

$('input[name="allergies[0]"]').on('change',function () {
   // alert($(this).filter(':checked').val());
   var Is_allergies = $(this).filter(':checked').val();
   document.getElementById("check_allergy").value = Is_allergies;
   // console.log(Is_allergies);

});


/* $("input[name='allergies[0]']").on("click", function() {
            var car = $("input[name='allergies[0]']:checked").val();
          alert(car)*/

</script>
<!---show allergy div---->

<script type="text/javascript">
  
  $(document).ready(function () {
   $("#Answer").hide();
   $(".addHide").hide();

$("input[name='Is_allergies']").change(function(){

   if($(this).val()=="yes")
   {
      $("#Answer").show();
      $("#Answer").attr('required', '');
      $(".addHide").show();
      $(".YesaddHide").show();
   }
   else if($(this).val()=="no")
   {
       $("#Yes_Answer").hide();
	   $("#Answer").hide();
       $("#Answer").removeAttr('required', '');
	   $(".addHide").hide();
       $(".YesaddHide").hide();

        
   }

});

});
</script>



<!--<script type="text/javascript">
  
  $(document).ready(function () {
   $("#Answer").hide();
   $(".addHide").hide();

$("input[name='Is_allergies']").change(function(){

   if($(this).val()=="yes")
   {
      $("#Answer").show();
      $("#Answer").attr('required', '');
      $(".addHide").show();
   }
   else if($(this).val()=="no")
   {
       $("#Answer").hide();
       $("#Answer").removeAttr('required', '');
       $(".addHide").hide();

        
   }

});

});
</script>-->
<script type="text/javascript">
  
  $(document).ready(function () {
  $("#job").hide();
  $("#emp_name").hide();
  $("#label_hide").hide();
  $("#label_employer").hide();

$(".are_you_employed").change(function(){

   if($(this).val()=="yes")
   {
      $("#job").show();
      $("#label_hide").show();
     $("#label_employer").show();
      $("#emp_name").attr('required', '');
      $("#job").attr('required', '');
      $("#emp_name").show();
   }
   else if($(this).val()=="no")
   {
        $("#label_hide").hide();
  $("#label_employer").hide();
       $("#job").hide();
       $("#emp_name").hide();
    
       $("#emp_name").removeAttr('required', '');
       $("#job").removeAttr('required', '');
       $(".addHide").hide();

        
   }

});

});
</script>
<!---end allergy----->

  <script>new WOW().init();</script>

<script type="text/javascript">
          
            function computeBMI() {
                // user inputs
                var height = Number(document.getElementById("height").value);
                var heightunits = document.getElementById("heightunits").value;
                var weight = Number(document.getElementById("weight").value);
                var weightunits = document.getElementById("weightunits").value;
              

               
                if(height == '' || weight == ' '){
                 var BMI_msg = document.getElementById("BMI_msg").innerText = 'Please Enter weight in Kg and height in Cm';
                 console.log(BMI_msg);
                }else{
        
                //Convert all units to metric
                if (heightunits == "inches") height /= 39.3700787;
                if (weightunits == "lb") weight /= 2.20462;


        
                //Perform calculation
        
                //        var BMI = weight /Math.pow(height, 2)*10000;
                var BMI = Math.round(weight / Math.pow(height, 2) * 10000);
        
                //Display result of calculation
                //document.getElementById("output").innerText = Math.round(BMI * 100) / 100;
                
                var output = Math.round(BMI * 100) / 100
                document.getElementById("output").value = output;
             
        /*        if (output < 18.5)
                    document.getElementById("comment").innerText = "Underweight";
                else if (output >= 18.5 && output <= 25)
                    document.getElementById("comment").innerText = "Normal";
                else if (output >= 25 && output <= 30)
                    document.getElementById("comment").innerText = "Obese";
                else if (output > 30)
                    document.getElementById("comment").innerText = "Overweight";*/
                // document.getElementById("answer").value = output; 
            }
          }

</script>



      <!-- STEPS JS -->
      <script>
         $(document).ready(function () {
         
         var navListItems = $('div.setup-panel div a'),
           allWells = $('.setup-content'),
           allNextBtn = $('.nextBtn');
           allPrevBtn = $('.prevBtn');
         
         allWells.hide();
         
         navListItems.click(function (e) {
         e.preventDefault();
         var $target = $($(this).attr('href')),
               $item = $(this);
         
         if (!$item.hasClass('disabled')) {
           navListItems.removeClass('btn-primary').addClass('btn-default');
           $item.addClass('btn-primary');
           allWells.hide();
           $target.show();
           $target.find('input:eq(0)').focus();
         }
         });
         
         allNextBtn.click(function(){
         var curStep = $(this).closest(".setup-content"),
           curStepBtn = curStep.attr("id"),
           nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
           curInputs = curStep.find("input[type='text'],input[type='url']"),
           isValid = true;
         
         $(".form-group").removeClass("has-error");
         for(var i=0; i<curInputs.length; i++){
           if (!curInputs[i].validity.valid){
               isValid = false;
               $(curInputs[i]).closest(".form-group").addClass("has-error");
           }
         }
         
         if (isValid)
           nextStepWizard.removeAttr('disabled').trigger('click');
         });
         
         allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        $(".form-group").removeClass("has-error");
        prevStepWizard.removeAttr('disabled').trigger('click');
    });
     
     
         $('div.setup-panel div a.btn-primary').trigger('click');
         });
         
      </script>


      <script type="text/javascript">

$("#extra-fields-customer").click(function(){
   var index = $("#extra-fields-customer").attr('data-index');
   var html = '<div class="row"><div class="col-md-4 col-sm-4 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="customer_records">';
   html += '<input type="text" name="Current_medication1['+index+']" style="" placeholder="Current Medication">';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".customer_records_dynamic").append(html);
   $("#extra-fields-customer").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});




////////////Allergies/////////////////////////
$("#extra-fields-allergies").click(function(){
   var index = $("#extra-fields-allergies").attr('data-index');

   var html = '<div class="row"><div class="col-md-4 col-sm-4 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="allergies_records">';
   html += '<input type="text" name="allergies['+index+']" placeholder="Allergies" required>';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-allergies">Remove</a></div></div>';
   index++;
   $(".allergies_records_dynamic").append(html);
   $("#extra-fields-allergies").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});

////////////////////////////end////////////////////////////

      </script>

      <!---family history --->
      <script type="text/javascript">
         
         $("#extra-fields-family").click(function(){
   var index = $("#extra-fields-family").attr('data-index');

   var html = '<div class="row"><div class="col-md-4 col-sm-4 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="family_records">';
   html += '<input type="text" name="family_medical_condition['+index+']" style="" placeholder="Family Medical Condition">';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".family_records_dynamic").append(html);
   $("#extra-fields-family").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});


      </script>
           <!---Past medical history--->
      <script type="text/javascript">
 
      $("#extra-fields-Pastmedical").click(function(){
   var index = $("#extra-fields-Pastmedical").attr('data-index');
  // console.log(index);
  //var updated_index = $('#key').val();
     //console.log(updated_index);
   var html = '<div class="row"><div class="col-md-4 col-sm-4 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="Pastmedical_records">';
  
   html += '<input type="text" name="past_medical_history['+index+']" style="" placeholder="">';

   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".Pastmedical_records_dynamic").append(html);
   $("#extra-fields-Pastmedical").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});
  </script>
  


  
  
        <script type="text/javascript">
      //surgical operations  history//
      $("#extra-fields-surgical").click(function(){
   var index = $("#extra-fields-surgical").attr('data-index');
   var html = '<div class="row"><div class="col-md-4 col-sm-4 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="surgical_records">';
   html += '<input type="text" name="Surgeries1['+index+']" style="" >';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".surgical_records_dynamic").append(html);
   $("#extra-fields-surgical").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});
  </script>
  
  <script type="text/javascript">
  function CheckPasswordStrength(password) {
var password_strength = document.getElementById("password_strength");
  
        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }

        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.

        var passed = 0;

        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }

        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
            case 2:
                strength = "Please Enter Strong Password";
                color = "red";
                break;
            case 3:
                 strength = "You have entered Medium password You can proceed";
                color = "orange";
                break;
            case 4:
                 strength = "You have entered Strong password";
                color = "green";
                break;
               
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;
    
    if(passed <= 2){
         document.getElementById('StrongBTN').disabled = true;
        }else{
            document.getElementById('StrongBTN').disabled = false;
        } 
    
    //var password_strength = document.getElementById("password_strength").value=strength;
    
    }
  
  
   </script>
  
  
  
  
  
<script type="text/javascript">



function checkPass()
{
    var pass = document.getElementById('pass');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
  var passw=  /^[A-Z]/;
  //var regex =/^[a-zA-Z0-9+&@#/%?=~_|!:,.;]{6,}+$/;
  
  
    if(pass.value.length > 7)
    {
       // pass.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
      //  pass.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 8 digit!"
        return;
    }
  
  
  
  
    if(pass.value == pass2.value)
    {
       // pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password Matached!"
    }
   else
    {
       // pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
    }
  
  


}  
</script>



<script type="text/javascript">
  $(".btn-step").click(function(){
    
    var obj = $(this);
    var next_tab = obj.attr("data-href");
    var container = obj.closest("div.setup-content");

      //console.log(container.find("input[type=radio]"));

    var fields = container.find("input[type=text],input[type=email],input[type=Password],input[type=date],textarea,select");
    var error = [];
    fields.each(function( index , value ) {
      if($(this).attr('required')){
        var email = $(this).val();
       // console.log(email)
        if(email.length <= 0) {
          error[index] = $(this).attr("placeholder") + " Fields Required";
        }    
      }

 });
   
    if(parseInt(error.length) > 0) {
        var msg = error.join("<br />");
        $.toast(
          {
            heading:'error!',
            position:'bottom-right',
            text:msg,
            loaderBg:'#ff6849',
            icon:'error',
            hideAfter:3000,
            stack:6
          });
        return false;
      }
      else{
        $("#tab-"+next_tab).trigger("click");
      }
/*
    var isChecked = $('.rdSelect:checked').val()?true:false;
    var ismarital = $('.Ismarital:checked').val()?true:false;*/
/*    var Issmoke = $('.do_you_smoke:checked').val()?true:false;
    var IsAlcholic = $('.do_u_Alcohol:checked').val()?true:false;
    var Ismarijuna = $('.do_u_marijuana:checked').val()?true:false;
    var Isemployed = $('.are_you_employed:checked').val()?true:false;*/
  // alert(isChecked);
  /*
   if(isChecked && ismarital){
      // alert('checked!');
     if(parseInt(error.length) > 0) {
     var msg = error.join("<br />");
    $.toast(
       {
        heading:'Success!',
         position:'bottom-right',
         text:msg,
         loaderBg:'#ff6849',
         icon:'error',
        hideAfter:3000,
          stack:6
       });
      return false;
    }
  else{
     $("#tab-"+next_tab).trigger("click");
    }
  }
  else{
   //alert('not checked!');
   $.toast(
        {
          heading:'Success!',
          position:'bottom-right',
          text:'Please fill all the missing fields!',
          loaderBg:'#ff6849',
       icon:'error',
          hideAfter:3000,
          stack:6
       });
    var next_tab = 'step-1';
     $("#tab-"+next_tab).tabs("disable", 1);
 }*/

    
  });

       



</script>

<!-- <script type="text/javascript">
  $(".btn-step").click(function(){
    
    var obj = $(this);
    var next_tab = obj.attr("data-href");
    var container = obj.closest("div.setup-content");

      //console.log(container.find("input[type=radio]"));

    var fields = container.find("input[type=text],input[type=email],input[type=Password],input[type=date],textarea,select,input[type=radio]:checked");
    var error = [];
    fields.each(function( index , value ) {
      if($(this).attr('required')){
        var email = $(this).val();
        if(email.length <= 0) {
          error[index] = $(this).attr("placeholder") + " Fields Required";
        }    
      }
 });
   
   
    //console.log(parseInt(error.length));
    if(parseInt(error.length) > 0) {
      var msg = error.join("<br />");
      $.toast(
        {
          heading:'Success!',
          position:'bottom-right',
          text:msg,
          loaderBg:'#ff6849',
          icon:'error',
          hideAfter:3000,
          stack:6
        });
      return false;
    }
    else{
      $("#tab-"+next_tab).trigger("click");
    }
  });

</script> -->

<script>
    $(function() {
    $(".navbar-set li > a").each(function() {
        var href = $(this).attr('href');
        var heading = $(this).text();
        $('.sidenav').append('<a href="' + href + '">' + heading + '<\/a>');
    });
});



function openNav() {
    document.getElementById("mySidenav").style.left = "0px";
}

function closeNav() {
    document.getElementById("mySidenav").style.left = "-250px";
}

</script>

<script type="text/javascript">
  
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profilePic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$("#phone").on("keyup", function(e) {
  e.target.value = e.target.value.replace(/[^\d]/, "");
  if (e.target.value.length === 10) {
    // do stuff
    var ph = e.target.value.split("");
    ph.splice(3, 0, "-"); ph.splice(7, 0, "-");
  $("#errmsg").html(ph.join("")).show().fadeOut("slow");
               return false;
  //  $("label").html(ph.join(""))
  }
})

</script>



@endsection
