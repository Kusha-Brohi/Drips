@extends('layouts.patient-dashboard.main')
@section('content')
<?php
$speciality = DB::table('specialities')->get();
    //dd($speciality);
use Carbon\Carbon; // Include Class in COntroller
//dd(Auth::user()->id);
$getdata = DB::table('patients')->where('user_id',Auth::user()->id)->first();
//dd($getdata);
$request->date_of_birth = $getdata->DOB;
$age = Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;
//dd($age. " Years"); 
$myage = $age. " Years";
//dd($myage);
?>

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
@include('widgets.patientSideBar')
     <div class="prescriptionbox">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
                <div class="col-sm-12 col-md-12" id="content">
                    <div class="infobox">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                   

                        <div class="billingsec">
                            <h3>Request a Consultation</h3>
                            <form action="{{route('ConsultationRequest')}}" method="Post"  enctype="multipart/form-data">
                                    @csrf
                      <input type="hidden" name="patient_id" value="{{Auth::user()->id}}">
                      <input type="hidden" name="doctor_id" value="{{$doctor_id}}"> 
                      <input type="hidden" name="name"  value="{{Auth::user()->name}} {{Auth::user()->lname}}" >
                      
                       <input type="hidden" name="age" placeholder="" value="{{$myage}}" >
                      
                       <input type="hidden" name="DOB"  value="{{$getdata->DOB}}">
                    <input type="hidden" value="{{$getdata->Gender}}" name="gender" ></label>
                       <input type="hidden" value="kilograms" id="weightunits">
                       <input type="hidden" id="weight" name="weight" value="{{$getdata->Weight}}" placeholder="Weight in Kg">
                       <input type="hidden" value="meters" id="heightunits">
                       <input type="hidden" id="height" name="height" value="{{$getdata->height}}" placeholder="Height in Cm">
                        <label>&nbsp;</label>
             <!--           <button type="button" value="computeBMI" onclick="computeBMI();">CALCULATE</button> -->
                       <input type="hidden" name="bmi" value="{{$getdata->Bmi}}" placeholder="BMI" id="output" readonly="">
               
 
                    
                             <div class="symtomslist">
                                
                                           <div class="symtomslist">
                                
                                 <h5>symptoms</h5>
                                 <ul class="custom-check">
                                    <li><div class="blk"><input id="fever" type="checkbox" value="Fever" name="problem[]"  ><label for="fever">Fever</label></div></li>
                                    <li><div class="blk"><input id="headache" type="checkbox" name="problem[]" value="Headache" ><label for="headache">Headache</label></div></li>
                                    <li><div class="blk"><input id="nasal" type="checkbox" name="problem[]" value="Nasal Congestion" ><label for="nasal">Nasal Congestion</label></div></li>
                                    <li><div class="blk"><input id="breath"  type="checkbox" name="problem[]" value="Shortness of Breath"><label for="breath">Shortness of Breath</label></div></li>
                                    <li><div class="blk"><input id="urination"  type="checkbox" name="problem[]" value="Frequent urination"><label for="urination">Frequent urination</label></div></li>
                                    <li><div class="blk"><input id="painful"  type="checkbox" name="problem[]" value="Painful Urination"><label for="painful">Painful Urination</label></div></li>
                                    <li><div class="blk"><input id="vagina" type="checkbox" name="problem[]" value="Bleeding from Vagina"><label for="vagina">Bleeding from Vagina</label></div></li>
                                    <li><div class="blk"><input id="chills" type="checkbox" name="problem[]" value="Chills"><label for="chills">Chills</label></div></li>
                                    <li><div class="blk"><input id="tinnitus" type="checkbox" name="problem[]" value="Tinnitus"><label for="tinnitus">Tinnitus</label></div></li>
                                    <li><div class="blk"><input id="discharge" type="checkbox" name="problem[]" value="Vagina discharge"><label for="discharge">Vagina discharge</label></div></li>
                                    <li><div class="blk"><input id="constipation" type="checkbox" name="problem[]" value="Constipation"><label for="constipation">Constipation</label></div></li>
                                    <li><div class="blk"><input id="blurry-vision" type="checkbox" name="problem[]" value="Blurry Vision"><label for="blurry-vision">Blurry Vision</label></div></li>
                                    <li><div class="blk"><input id="period" type="checkbox" name="problem[]" value="Missed Period"><label for="period">Missed Period</label></div></li>
                                    <li><div class="blk"><input id="depression" type="checkbox" name="problem[]" value="Depression"><label for="depression">Depression</label></div></li>
                                    <li><div class="blk"><input id="heart" type="checkbox" name="problem[]" value="Heart Burn"><label for="heart">Heart Burn</label></div></li>
                                    <li><div class="blk"><input id="rash" type="checkbox" name="problem[]" value="Rash"><label for="rash">Rash</label></div></li>
                                    <li><div class="blk"><input id="ear-ache" type="checkbox" name="problem[]" value="Ear ache"><label for="ear-ache">Ear ache</label></div></li>
                                    <li><div class="blk"><input id="chest-pain" type="checkbox" name="problem[]" value="Chest pain"><label for="chest-pain">Chest pain</label></div></li>
                                    <li><div class="blk"><input id="seizures" type="checkbox" name="problem[]" value="Seizures"><label for="seizures">Seizures</label></div></li>
                                    <li><div class="blk"><input id="vomiting" type="checkbox" name="problem[]" value="Vomiting"><label for="vomiting">Vomiting</label></div></li>
                                    <li><div class="blk"><input id="diarrhea" type="checkbox" name="problem[]" value="Diarrhea"><label for="diarrhea">Diarrhea</label></div></li>
                                    <li><div class="blk"><input id="nausea" type="checkbox" name="problem[]" value="Nausea"><label for="nausea">Nausea</label></div></li>
                                    <li><div class="blk"><input id="pain" type="checkbox" name="problem[]" value="Pain"><label for="pain">Pain</label></div></li>
                                    <li><div class="blk"><input id="pain2" type="checkbox" name="problem[]" value="Pain"><label for="pain2">Pain</label></div></li>
                                    <li><div class="blk"><input id="cough" type="checkbox" name="problem[]" value="Cough"><label for="cough">Cough</label></div></li>
                                    <li><div class="blk"><input id="boll" type="checkbox" name="problem[]" value="Boll"><label for="boll">Boll</label></div></li>
									 <li>


                                 <div class="blk"><input id="other" class="coupon_question" type="checkbox" name="problem[]"><label for="other">Other</label></div></li>
                                   <!-- <li><div class="blk"><input id="button" type="button" name="problem[]"><label for="other">Other</label></div></li>-->
                                    <!--<li><input type="text" name="problem[]" placeholder="Text here"></li>-->
                                 <div class="blk"><input id="other" class="coupon_question" type="checkbox" name="problem[]"><label for="other">Other</label></div>
								 </ul>
                                 <div class="answer" style="width: 33%;" id="otherbox"><input   type="text" name="problem[]"><label for="other" ></label></div>
                             </div><br>
        
                             
  <div class="col-md-12">

 <p class="text-danger">Upload only PNG JPG file:(Presenting Complain)</p>
    <div class="col-md-12">

    @if(isset($product_images) && count($product_images) > 0)
      <div class="max-text">
        @foreach($product_images as $pimage)
        <div class="gallery_css">
            <a href="{{ route('image.delete', $pimage->id) }}" class="delete_css">X</a>
                <img style="width: 100%;padding: 10px;" alt="" class="img-responsive" id="banner1" 
                src="{{ asset($pimage->image) }}" > 
        </div>  
        @endforeach        
        
      </div>
    @else            
    @endif  
        
    </div>
    
        <div class="col-md-12" >
        <br/>
              <div id="demo"></div>
        <br/>
        </div>
</div>
    
            
                                 <div class="row">
                                     <div class="col-md-3 colsm-3 col-xs-12">
                                   <div class="bookingtypelist Demand ">
                                             <label>Booking Type</label>
                                             <?php
                                             $consultation = Session::get('consultation');
                                             ?>
                                              @if($consultation['booking_type'] == "Scheduled")
                                             <ul>
                                                 <li><label><input id="on_demand" type="radio" value="On Demand" name="booking_type" >On Demand</label></li>
                                                 <li><label><input id="scheduled" type="radio" value="Scheduled" name="booking_type" checked="">Scheduled</label></li>
                                             </ul>
                                             @elseif($consultation['booking_type'] == "On Demand")
                                              <ul>
                                                 <li><label><input id="on_demand" type="radio" value="On Demand" name="booking_type" checked="">On Demand</label></li>
                                                 <li><label><input id="scheduled" type="radio" value="Scheduled" name="booking_type" >Scheduled</label></li>
                                             </ul>
                                             @else
                                               <ul>
                                                 <li><label><input id="on_demand" type="radio" value="On Demand" name="booking_type" >On Demand</label></li>
                                                 <li><label><input id="scheduled" type="radio" value="Scheduled" name="booking_type" checked="">Scheduled</label></li>
                                             </ul>
                                             @endif

                                         </div>
                                     </div>
                                     <div class="col-md-3 colsm-3 col-xs-12">
                                          <div class="billinglist">
                                            <label id="labledate" >Select Date</label>
                                           <input  class="mydate" type="date" min="{{date("Y-m-d")}}" name="date" placeholder="Date" id="date" required>
                                        </div>
                                     </div>
                                     <div class="col-md-3 colsm-3 col-xs-12">
                                            <div class="billinglist">
                                            <label id=labletime>Select Time</label>
                                             <input type="time" name="timing" id=time required>
                                        </div>
                                       </div> 
                                         <div class="col-md-3 colsm-3 col-xs-12">
                                             <div class="billinglist">

                                          <button id="txt">Submit</button>  
                               <!--           <a href="#" data-toggle="modal" data-target="#myModal1">Submit</a>   -->
                                            </div>
                                         </div>
                                 </div>
                           </form>
                        </div>

                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

<hr>
    <!-- /#page-wrapper -->
   <!-- box 2 start -->
    <div class="prescriptionbox" >
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">
                <div class="col-sm-12 col-md-12" id="content">
                    <div class="infobox">
                        <div class="row">
                            <div class="col-md-11 col-sm-11 col-xs-12">
                        <div class="billingsec">
                                          <?php
    $consultation = Session::get('consultation');
	
    $date = date('j F, Y', strtotime($consultation['date']));
   // dd($date);
?>
                                @if($consultation != null)
                                @if($consultation['booking_type'] != "On Demand")
                            <h4 class="text-success">You Have Selected Your Appointment Date:{{$date}} and Time:{{$consultation['timing']}}. Now Select Your Doctor</h4>
                            @else
                            <h4 class="text-success">You Have Selected Your Appointment On Demand, Now Select Your Doctor</h4>
                            @endif
                            @endif
                            <h3>Select a Doctor</h3>
                            <form action="{{route('selectDoctor')}}" method="Post">
                              @csrf
                                
                                <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                                    <div class="billinglist docterlist">
                                            <label>Speciality</label>
                                                <?php
                        $expertise = Auth::user()->profile->Speciality;
                        //dd($expertise);

                      ?>  
                                            <select name="expertise">
                                            <option  disabled selected>Select Your Speciality </option>
                                          
                                            
                                              @foreach($speciality as $value)
                                             <?php 
                                            if($expertise == $value->id){

                                              $selected = "selected";
                                          
                                            }
                                            else{
                                              $selected = '';
                                              
                                          }
                                          ?>

                                              <option value="{{$value->id}}" {{$selected}}> {{$value->name}}</option>


                                              @endforeach
                                            </select>
                                             <!-- <input type="text" name="speciality" placeholder="Speciality"> -->
                                        </div>
                                </div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                                    <div class="billinglist docterlist">
                                            <label>Gender</label>
                                            <select name="gender">
                                                <option  disabled selected>Select Gender </option>
                                             
                                              <option value="male">Male</option>
                                              <option value="female">Female</option>
                                            </select>
                                            <!--  <input type="text" name="gender" placeholder="Gender"> -->
                                        </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                                    <div class="billinglist">
                                            <label>Language</label>

                                            <select name="language">
                                            <option  disabled selected>Select language </option>
                                    
                                              <option value="english">English</option>
                                              <option value="spainish">spanish</option>
                                              <option value="chinese">Chinese</option>
                                              <option value="french ">French </option>
                                              <option value="urdu">Urdu</option>
                                              <option value="korean ">Korean </option>
                                            </select>
                                           <!--   <input type="text" name="language" placeholder="Language"> -->
                                        </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 no-margin">
                                    <div class="billinglist docterlist">
                                             <button>Search</button>
                                        </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="scrolll-mob">
                        <div class="table-responsive1 patient_table" >
                                 <table class="table">
                                     <thead>
                                         <th></th>
                                        <th>Doctor Name</th>
                                        <th>Speciality</th>
                                        <th>Medical School</th>
                                        <th>Residency</th>
                                        <th>Price</th>
                                  
                                        <th></th>
                                   
                                    </thead>
                                    <tbody> 
                                                                
                                                            
                                        <tr>
                                           @if($Result != '')
                                          @foreach($Result as $data)

                                          <?php
                                          $speciality_list = DB::table('specialities')->where('id',$data->Speciality)->first();
                                         // dd($speciality_list->name);
                                          ?>


                                            @if($data->pic == null)
                                           <td><img src="{{asset('images/no_image.jpg')}}" style="width: 36px;" class="img-responsive" alt="img"></td> 
                                           @else
                                            <td><img src="{{asset($data->pic)}}" style="width: 36px;" class="img-responsive" alt="img"></td> 
                                           
                                           @endif
                                   
                                            <td>{{$data->name}}</td>
                                            <td>{{$speciality_list->name}}</td>
                                            <td>{{$data->medical_school}}</td>
                                            <td>{{$data->residency}}</td>
                                            <td>
                                                <!--${{$data->price}}-->
                                                ₦{{$data->price}}
                                            </td>
                                           
                                           <td class="downloadsec"><a href="" data-toggle="modal" data-target="#ecc_modal" data-doctor_id="{{$data->user_id}}" class="bookbtn">BOOK NOW</a>
                    
                                          @if($data->Is_online == 1)
                                        <a href="javascript:void(0)" class="prifilepic"><i class="fa fa-check-circle-o" aria-hidden="true" style="color: green"></i></a>
                                          @else
                                         <a href="javascript:void(0)" class="prifilepic"><i class="fa fa-times" aria-hidden="true" style="color: red"></i></a>
                                            @endif


                                          </td>
                                        <!--     <td class="date">140 (Reviews)</td> -->
                                           <!--  <td class="downloadsec"><a href="{{route('ConsultationRequest', ['id' => $data->user_id])}}" class="bookbtn">BOOK NOW</a><a href="#" class="prifilepic">VIEW PROFIL</a></td> -->
                                         
                                        </tr>
                                          @endforeach
                            
                                           @endif

                                    </tbody>
                                 </table>

                             </div>
                    </div>
    </div>
        </div>
    </div>
</div> 

</div><!-- /#wrapper -->

  <!---------------------------------ELECTRONIC COMPLAINt CARD------------------------------------->

<div class="modal fade ecc_card_modal" id="ecc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                               <h2 class="head_blue">Electronic Complaint Card</h2>
                            </div>
                         </div>
                      </div>
               <form action="{{route('Submitcard')}}" method="Post">
              @csrf
              <?php
    $consultation = Session::get('consultation');
    //dd($consultation);
    $pat_data = $consultation;
    //dd($pat_data);

     

?>  
            <input type="hidden" name="doctor_id" id="doctor_id" > 

               <input type="hidden" name="patient_id" id="patient_id" value="{{Auth::user()->id}}"> 
                      <div class="row">
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_pic">
                               <figure>
							      @if(Auth::user()->patient->pic== null)
                                  <img src="{{asset('images/patientProfile.png')}}" class="img-responsive" alt="">
								@else
									 <img src="{{asset(Auth::user()->patient->pic)}}" class="img-responsive" alt="">
								
								@endif
                               </figure>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">

                               <h4>
                                 {{$pat_data['name']}}
                                 
                               </h4>
                                 <?php
                                            $date = date('j F, Y', strtotime($pat_data['DOB']));
                                           // dd($date);
                                            ?>
                               <h4>
                                  {{$date}} 
                               </h4>

                               <h4>
                                  {{$pat_data['gender']}}
                               </h4>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Height: {{$pat_data['height']}} cm
                               </h4>

                               <h4>
                                  Weight: {{$pat_data['weight']}}kg
                               </h4>

                               <h4>
                                  BMI: {{$pat_data['bmi']}}
                               </h4>
                            </div>
                         </div>
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Blood Group: {{$getdata->blood_type}}
                               </h4>

                               <h4>
                                  Job Title: {{$getdata->job_title}}
                               </h4>
                            </div>
                         </div>
                      </div>
                        <?php
                     $allergies =  json_decode($getdata->allergies);
                       /* dd($allergies);*/
                        ?>
                      <div class="row mt-5">
                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <h2 class="head_blue red_head">Allergies</h2>
							 @if($getdata->Is_allergies == "yes")
						    
                              @foreach($allergies as $key => $value)
                            
                            
                               <p class="txt_red normal_txt">{{$value}}</p>
                             
                               @endforeach
                            @else
                                   	<p class="txt_red normal_txt">Not Available</p>  
                               @endif 
						
                             <h2 class="head_blue">Past Medical History</h2>
                                <?php
              
                        $past_medical_history = json_decode($getdata->past_medical_history);
                      // dd($past_medical_history);
                        ?>
						
						@if($getdata->past_medical_history == '')
							
						<p class="txt_red normal_txt">Not Available</p>   
						@else
                        @foreach($past_medical_history as $value)
						
                       <p class="normal_txt">{{$value}}</p>
					
                        @endforeach
						@endif
                          <!--  <p class="normal_txt">{{$getdata->past_condition2}}</p>
                            <p class="normal_txt">{{$getdata->past_condition3}}</p>
                            <p class="normal_txt">{{$getdata->past_condition4}}</p>-->
                            
                            <h2 class="head_alernate">Past Surgical History</h2>
							  <?php
              
                        $surgical_history = json_decode($getdata->Surgeries1);
                     // dd($surgical_history);
                        ?>          
                            
                            @if($getdata->Surgeries1 == '')
					     	<p class="normal_txt">Not Available</p>
							@else
							@foreach($surgical_history as $value)
                                   
                            <p class="normal_txt">{{$value}}</p>
							@endforeach
							@endif
								
                            <!--<p class="normal_txt">{{$getdata->Surgeries2}}</p>
                            <p class="normal_txt">{{$getdata->Surgeries3}}</p>
                            <p class="normal_txt">{{$getdata->Surgeries4}}</p>-->
                         

                            <h2 class="head_blue">Social History</h2>
							@if($getdata->do_you_smoke == '')
                            <p class="normal_txt">Smoker: Not Available</p>
						@else
							<p class="normal_txt">Smoker: {{$getdata->do_you_smoke}}</p>
						@endif
							
						@if($getdata->do_u_Alcohol == '')
						<p class="normal_txt">Alcohol : Not Available</p>
						@else
                            <p class="normal_txt">Alcohol : {{$getdata->do_u_Alcohol}} </p>
						@endif
                         </div>
                        <?php
              
                        $currentmedication = json_decode($getdata->Current_medication1);
                       //dd($currentmedication);
                        ?>
                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <h2 class="head_orange green_head">Current Medications</h2>
							@if($getdata->Current_medication1 == '')
							<p class="txt_green normal_txt">Not Available</p>
							@else
                              @foreach($currentmedication as $value)
                            <p class="txt_green normal_txt">{{$value}}</p>
                            @endforeach
							
							@endif

                             <h2 class="head_alernate">Family History</h2>
                       <?php
              
                        $family = json_decode($getdata->family_medical_condition);
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

                         <!--    <p class="txt_green normal_txt">Lisinopril</p>
                            <p class="txt_green normal_txt">Hydrochlorothiazide</p> -->
                            <div class="pres_complain">
                              <h3 class="text-center my_h3">Present Complaint:</h3>
                                 <?php
                                $problem = $pat_data['problem'];
                                $symtoms = explode(",",$problem);
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
                           
                                  </div>
                                    
                     
                                    
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
          @if(isset($pat_data['images']))
          <?php $counter=0; ?>
      @foreach($pat_data['images'] as $value)
      <div class="item {{$counter == 0 ? 'active' :''}}">
        <img src="{{asset($value)}}">
      </div>
      <?php $counter++?>
        @endforeach
       @endif
       @if($counter > 1)
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    @endif
  </div>
</div>

                                <!-- <div class="upld_img text-center">
                                     <div class="uplod_imag">
                                       <img src="{{asset('images/cloud-computing.png')}}" alt="Image">
                                       <input type="file" name="file_upload">
                                     </div>
                                     <h4>Media File Here</h4>
                                </div> -->

                            </div>
                                </div>

                                  
                           <div class="text-right">
                               <button id="txt" class="head_alernate pull-right"   style="margin-left: 0%; border-color:#F48148;  margin-top: 0%;">Submit</button>
                           </div>
                         </div>
             
             <!--   <a class="head_alernate" style="margin-left: 50%; border-color:#F48148;  margin-top: 13%;" href="{{url('gtpayMerchant')}}">Submit</a> -->
                      </div>
                         
                    </form>
                   <!-- </div> -->
                </section>
            </div>
<!--             <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
          </div>
        </div>
      </div>

        <!---new---->

        
      <!--ew Ecc end--->
      <!-----------------------------ELECTRONIC COMPAINT CARD END---------------------->
<!-- Modal -->
<div class="Complainsec">
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Electronic Complaint Card</h4>
      </div>
      <div class="modal-body">
         <div class="row">
             <div class="col-md-5 col-sm-5 col-xs-12">
                 <div class="Complainimg2">
                    @if(Auth::user()->patient->pic== null)
                     <img src="{{asset('images/no_image.jpg')}}" style="width: 85%;"  class="img-responsive" alt="img">
                    @else
                     <img src="{{asset(Auth::user()->patient->pic)}}" style="width: 85%;"  class="img-responsive" alt="img">
                     @endif
                 </div>
             </div>
             <form action="{{route('Submitcard')}}" method="Post">
              @csrf
              <?php
    $consultation = Session::get('consultation');
    $pat_data = $consultation;
     // dd($pat_data);
     

?>
               <input type="hidden" name="doctor_id" id="doctor_id" > 
               <input type="hidden" name="patient_id" id="patient_id" value="{{Auth::user()->id}}"> 
            
              <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="Complainlist">
                      <ul>
                          <li>Name*</li>
                          <li>Age</li>
                          <li>Gender</li>
                       
                          <li>Symtoms</li>
                         <li>Report</li> 
                      </ul>
                      <ul>
                          <li><strong></strong>{{$pat_data['name']}}</li>
                          <li><strong>{{$pat_data['age']}} Year old</strong></li>
                          <li><strong>{{$pat_data['gender']}}</strong></li>
                          <li><strong>{{$pat_data['problem']}}</strong></li>
                          <li><strong>

                          @if(isset($pat_data['images']))
                              @foreach($pat_data['images'] as $value)
                         <!--   <a href="{{asset($value)}}" download> -->
                          <img src="{{asset($value)}}" width="35%;" style="float: left;">
                        </a></strong></li> 
                            @endforeach
                            @endif


                                 <div class="billinglist">

                                          <button id="txt" >Submit</button>  
                                     <!--  <a href="#" data-toggle="modal" data-target="#myModal1">Submit</a>  -->
                                            </div>
                      </ul>
                  </div>
              </div>
              </form>
         </div>
         <!-- <div class="row">
             <div class="col-md-12 cols-m-12 col-xs-12">
                 <div class="Complainimg2">
                     <img src="{{asset('patient-dashboard/images/complaint_60.jpg')}}" class="img-responsive" alt="img">
                 </div>
             </div>
         </div> -->
      </div>
     
    </div>

  </div>
</div>
</div>

@endsection
@section('css')
<style>
.hide_yes{

  display: none;
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


.ecc_card_wrap .logo {
    padding: 0;
}

.head_alernate {
    background-color: #f48147;
    color: #fff;
    font-weight: 600;
    margin: 0;
    padding: 10px;
    text-align: center;
    font-size: 17px;
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
#ecc_modal .modal-content{
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
    width:60%;
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
</style>
@endsection

@section('js')

<script type="text/javascript">
  
  $('#contactsubmit').on('submit',function(e){
   let form_id = $('#contactsubmit');
    e.preventDefault();
     // console.log(form_id);
    $.ajax({
      url:'{{route('contactUsSubmit')}}',
      type:"POST",
      data: $('form').serialize(),
      dataType: 'json',
      success:function(response){
       console.log(response.message);
       if(response.status == true){
              $.toast({
                heading: 'Success!',
                position: 'bottom-right',
                text:  response.message,
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
              });

              form_id[0].reset();

            }
            else{
            // Handle error
          //  console.log(_response.message);
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  response.message,
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 3000,
              stack: 6
            });

            } 
      },
        error: function(response){
            // Handle error
          //  console.log(_response.message);
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  response.message,
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 3000,
              stack: 6
            });
            
        }
    });

  });
  
</script>


<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#banner1').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function() {
  readURL(this);
});
</script>

<script>
$("#demo").spartanMultiImagePicker({
  fieldName:  'images[]'
});

</script>

<script type="text/javascript">
          
            function computeBMI() {
                // user inputs
             var height = Number(document.getElementById("height").value);
                var heightunits = document.getElementById("heightunits").value;
                var weight = Number(document.getElementById("weight").value);
                var weightunits = document.getElementById("weightunits").value;
        
        
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

</script>

<script type="text/javascript">
  
$('#ecc_modal').on('show.bs.modal', function(e) {
    
    var doctor_id = $(e.relatedTarget).data('doctor_id');
    $(e.currentTarget).find('input[name="doctor_id"]').val(doctor_id);
    var doctor_id = $('#doctor_id').val();
    $('#doctor_id').val(doctor_id);
});

$(".answer").hide();
$(".coupon_question").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
    } else {
        $(".answer").hide();
    }
});
</script>

<script type="text/javascript">
  
  $(document).ready(function () {
 

$("input[type='radio']").change(function(){

   if($(this).val()=="On Demand")
   {    
      $("#date").hide();
      $("#date").removeAttr('required', '');
      $("#time").hide();
      $("#time").removeAttr('required', '');
      $("#labledate").hide();
     $("#labletime").hide();
   }
   else if($(this).val()=="Scheduled")
   {
       $("#date").show();
       $("#date").attr('required', '');
     $("#time").show();
     $("#labledate").show();
     $("#labletime").show();
     $("#time").attr('required', '');


        
   }

});

});
</script>

@endsection
