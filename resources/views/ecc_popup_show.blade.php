<section class="ecc_sec">
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
                               <h2 class="head_blue">Electronic Complaint Card</h2>
                            </div>
                         </div>
                      </div>

                      <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="client_pic">
                               <figure>
							  
							    @if($patient_history->pic != NULL)
                                  <img src="{{asset($patient_history->pic)}}" class="img-responsive" alt="">
								   @else
								   <img src="{{asset('images/no_image.jpg')}}" class="img-responsive" alt="">
							   @endif
                               </figure>
                            </div>
                         </div>

                         <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  {{ucfirst($patient_data->name)}}
                               </h4>
                          
                                 <?php

                                 $date = date('j F, Y', strtotime($patient_data->DOB));
                                 // dd($date);
                                ?>
                               <h4>
                                  {{$date}}
                               </h4>

                               <h4>
                                {{ucfirst($patient_data->gender)}}
                               </h4>
                            </div>
                         </div>

                         <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Height: {{$patient_data->height}}cm
                               </h4>

                               <h4>
                                  Weight: {{$patient_data->weight}}kg
                               </h4>

                               <h4>
                                  BMI: {{$patient_data->bmi}}
                               </h4>
                            </div>
                         </div>
                         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Blood Group: {{($patient_history->blood_type)}}
                               </h4>
									@if($patient_history->job_title ==  '')
                               <h4>
                                  Job Title: none
                               </h4>
							   @else
									  <h4>
                                  Job Title: {{ucfirst($patient_history->job_title)}}
                               </h4>
							   
							   @endif
                            </div>
                         </div>
                      </div>

                      <div class="row mt-5">
                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <h2 class="head_blue red_head">Allergies</h2>
								<?php
                              $allergies = json_decode($patient_history->allergies);
                             $allergies = ((array)$allergies);
                              ?>
                                     
                               @if($patient_history->Is_allergies == "yes")      
                          @if(array_filter($allergies))
                              @foreach($allergies as $key => $value)
                              
                                 
                                 
                               <p class="txt_red normal_txt">{{$value}}</p>
								  
                       
                         
                               @endforeach
							     @else
								   	<p class="normal_txt">None</p>
							    @endif
							   
								@else

								<p class="normal_txt">None</p>
                            
                                 @endif




  
                             <h2 class="head_blue">Past Medical History</h2>
                                  <?php
              
                      $past_medical_history = json_decode($patient_history->past_medical_history);
                       // dd($currentmedication);
					   
                        ?> 

							 <?php
              
                        $past_medical_history = json_decode($patient_history->past_medical_history);
                         $past_medical_history = ((array)$past_medical_history);
                        ?>          
                                        @php
                                        $i = 0;
                                        @endphp
								@if(array_filter($past_medical_history))
                                    @foreach($past_medical_history as $value)
                                     @php
                                    $i++;
                                    @endphp
                         
                           
                            <p class="normal_txt">{{$value}}</p>
                         
                              @endforeach
							 	  @else
								   	<p class="txt_red normal_txt">None</p>  
							  @endif
								  
							  
                          <!--   <p class="normal_txt">{{($patient_history->past_condition2)}}</p>
                            <p class="normal_txt">{{($patient_history->past_condition3)}}</p>
                            <p class="normal_txt">{{($patient_history->past_condition4)}}</p> -->

                            <h2 class="head_alernate">Past Surgical History</h2>
                                <?php
              
                        $surgical_history = json_decode($patient_history->Surgeries1);
                      $surgical_history = ((array)$surgical_history);
                        ?>  
				                      	@php
                                        $i = 0;
                                        
                                        @endphp
										@if(array_filter($surgical_history))
                                    @foreach($surgical_history as $value)
                             
                                           @php
                                        $i++;
                                        
                                        @endphp
                                    
                            <p class="normal_txt">{{$value}}</p>
                     
                            @endforeach
							  @else
								   	<p class="txt_red normal_txt">None</p>  
							  @endif
							
							
                            <h2 class="head_blue">Social History</h2>
							@if($patient_history->do_you_smoke == '' )
								 <p class="normal_txt">Smoker: None</p>   
                              @else
                            <p class="normal_txt">Smoker: {{($patient_history->do_you_smoke)}}</p>
						@endif
								@if($patient_history->do_u_Alcohol == '' )
								 <p class="normal_txt">Alcohol: None</p>   
                              @else
                            <p class="normal_txt">Alcohol:  {{($patient_history->do_u_Alcohol)}} </p>
						@endif
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <h2 class="head_orange green_head">Current Medications</h2>
                            <?php
              
                        $currentmedication = json_decode($patient_history->Current_medication1);
                      $currentmedication = ((array)$currentmedication);
                        ?>
						   @php
                                  $i = 0;
                                        
                                      @endphp
										@if(array_filter($currentmedication))
                                    @foreach($currentmedication as $value)
                             
                                           @php
                                        $i++;
                                        
                                        @endphp
                           
                            <p class="txt_green normal_txt">{{$value}}</p>
                           
                            @endforeach
								  @else
								   	<p class="txt_red normal_txt">None</p>  
							  @endif

              <h2 class="head_alernate">Family History</h2>
                       <?php
              
                        $family = json_decode($patient_history->family_medical_condition);
                      // dd($currentmedication);
					  $family = ((array)$family);
                        ?>         
                               @php
                                        $i = 0;
                                        
                                        @endphp
									@if(array_filter($family))
                                    @foreach($family as $value)
                             
                                           @php
                                        $i++;
                                        
                                        @endphp
                        
                            <p class="txt_green normal_txt">{{$value}}</p>
                          
                            @endforeach

								  @else
								   	<p class="txt_red normal_txt">None</p>  
							  @endif
                            <div class="pres_complain">
                              <h3 class="text-left">Present Complaint:</h3>
                                <?php
                                $symtoms = explode(",",$patient_data->problem);
                               // dd($test);
                                ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                    @foreach($symtoms as $value)
                                      <p>
                                        <input type="checkbox" id="test1" checked>
                                        <label for="test1">{{$value}}</label>
                                      </p>
                                      @endforeach
                                      </div>
                                      
                                      <div class="col-sm-6">
                                          <div class="qr_code">
                                              <ul>

                                             

                            <li>
                              <?php
                              $url = urlencode(url('/ECC_card/'.$patient_data->id."?type=appointment"));
                              
                              ?>
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{$url}}&choe=UTF-8" title="Link to Google.com" />

<!--                          <li><a style="display: none" id="url" href="{{url('/ECC_card/'.$patient_data->id)}}">link</a></li>
 -->
                                                  </li>
                                                  
                                           <!--        <li>
                                                      <input type="file" name="upload">
                                                      <img src="http://custom-webdevelopment.com/drip/public/images/cloud.png" alt="Image"/>
                                                      <p>Media File Here</p>
                                                  </li> -->
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                                  
                           <!--      <div class="upld_img text-center"> -->
                                     <div class="uplod_imag">
                                      <div class="container">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!-- <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
   
          <?php $counter=0; ?>
          @foreach($images as $value)
      <div class="item {{$counter == 0 ? 'active' :''}}">
        <img src="{{asset($value->image)}}">
      </div>
      <?php $counter++?>
        @endforeach
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
							<?php
								$emaillink = $_GET['type'];
								//dd($emaillink);
							?>			

							@if($emaillink == '1')
								<a  id="emailbtn" href="{{url('/physician-dashboard/PhysicianLogin')}}">SignIn</a>	
							
							@endif
                                <!-- <div class="upld_img text-center">
                                     <div class="uplod_imag">
                                       <img src="{{asset('images/cloud-computing.png')}}" alt="Image">
                                       <input type="file" name="file_upload">
                                     </div>
                                     <h4>Media File Here</h4>
                                </div> -->

                            </div>
                                   
                                     </div>
                               <!--       <h4>Media File Here</h4>
                                </div> -->




                            </div>
                         </div>
                      </div>
                </section>

                <style>
                
              
li {
    list-style: none;
}
.hide_yes{

  display: none;
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

.head_alernate {
    background-color: #f48147;
    color: #fff;
    font-weight: 600;
    margin: 0;
    padding: 7px;
    text-align: center;
    font-size: 16px;
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

.normal_txt {
    border: 0;
    color: #00397F;
    font-size: 16px;
    font-weight: 300;
    position: relative;
}
/*.normal_txt:before{*/
/*    content:'';*/
/*    position:absolute;*/
/*    background:#fff;*/
/*    border-radius:20px;*/
/*    height:15px;*/
/*    width:15px;*/
/*    left:-10px;*/
/*}*/
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





.uplod_imag .container {
    width: auto;
}

.uplod_imag .carousel-inner img {
    height: 180px;
    width:100%;
    object-fit: cover;
}
.logo{

    padding-bottom: 21px;
    padding-top: 10px;
    padding-left: 333px;
}



.modal-dialog {
    border: 8px solid;
    border-radius: 2px;
    border-color: #0076c0;
    }


.client_main_info input{

    font-size: 18px;
    color: #000;
    font-weight: 700;
    border: 0
  }

  .normal_txt {

       border: 0;
  }
  button.viewbtn {
    border: 0px;
    margin: 0 7px;
    background-color: #00599054 !important;
    color: #005990 !important;
}
.qr_code ul{
    padding-left:0px;
    display:flex;
    align-items:flex-end;
    justify-content:space-between;
}
.qr_code ul li{
    display:inline-block;
    width:48%;
}
.qr_code ul li:first-child img{
    width:80%;
}
.qr_code ul li:last-child{
    position:relative;
    
}
.qr_code ul li p{
    margin-bottom:0px;
    font-size:18px;
    color: #00397F;
    font-weight:600;
}
.qr_code ul li:last-child img{
    width:91%;
    margin:0 auto;
}
.qr_code ul li:last-child{
    text-align:center;
}
.qr_code ul li:last-child input {
    position: absolute;
    width: 100%;
    height: 111px;
    opacity: 0;
    cursor: pointer;
}


/* Mobile responsive css*/
@media only screen and (min-width: 300px) and (max-width: 768px){
    
    .drip-QR .logo {
    padding-bottom: 0;
    padding-top: 0;
    padding-left: 0;
}
.drip-QR .logo img{
    width:100% !important;
}
.drip-QR .client_pic img {
    width: 50%;
    margin: auto;
    margin-top: 21px;
}

.drip-QR .qr_code ul {
    display: block;
}
.drip-QR .qr_code ul li:last-child {
    width: 100%;
}
.drip-QR {
    padding-left: 15px;
    padding-right: 15px;
    overflow: hidden;
}
.drip-QR .pres_complain h3{
        font-size: 28px;
}
}

a#emailbtn {
    color: #fff;
    background-color: #0668a4;
    border: 1px solid #0668a4;
    padding: 7px 18px;
    border-radius: 6px;
    display: inline-block;
}
section.drip-QR {
    display: flex;
    align-items: center;
    height: 100vh;
    justify-content: center;
}
.drip-QR a#emailbtn {
    /* display: inline-flex; */
    /* justify-content: center; */
    /* align-items: center; */
    color: #fff;
    background-color: #0d7dc1;
    border: 1px solid #0668a4;
    padding: 8px 45px;
    border-radius: 5px;
    display: inline-block;
    height: 35%;
    font-size: 20px;
}
</style>

<script type="text/javascript">

function myFunction() {
 var url = document.getElementById("url").href;
 //console.log(url);
/*  document.getElementById("myAnchor").href = "http://www.cnn.com/";*/
}
</script>