
@extends('layouts.physician-dashboard.main')
@section('content')
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">

  @if(Auth::user()->customer_status == '3')
  @include('widgets.physicianSideBar')
  @else
  @include('widgets.patientSideBar')
  @endif
<?php

use Carbon\Carbon; // Include Class in COntroller
//dd(Auth::user()->id);
$getdata = DB::table('patients')->where('user_id',$patient_history->user_id)->first();
//dd($getdata);
$request->date_of_birth = $getdata->DOB;
$age = Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;
//dd($age. " Years"); 
$myage = $age. " Years";

?>

      <div class="prescriptionbox">
    
        <div id="page-wrapper">

          <div class="container-fluid">
            <!-- Page Heading -->



            <div class="row" id="main">
              <div class="col-sm-12 col-md-12" id="content">
                <div class="infobox">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="billingsec1 mt-50">
                        <div class="row">
                          <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="row">
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="Accountimg">
                                    
                                  <!-- <img src="{{asset(Auth::user()->profile->pic)}}" style="width: 100%;" class="img-responsive" alt="img"> -->
                               
                                  @if($patient_history->pic != '')
                                  <img src="{{asset($patient_history->pic)}}" style="width: 100%;" class="img-responsive" alt="img">
                                  @else
                                  <img src="{{asset('images/user_image.png')}}" style="width: 100%;" class="img-responsive" alt="img">
                                  @endif
                                  
                                </div>
                              </div>
                              <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="Accountlisting1">
                                  <ul>
                                    <li>Name*</li>
                                    <li>Age</li>
                                    <li>Gender</li>
                              
                                    <li>Weight</li>
                                    <li>Height </li>
                                    <li>BMI </li>
                                  <li>Symptoms</li>
                                    <!-- <li>Report</li> -->
                                  </ul>
                                  <ul>
                                    @if($patient_data->name == '')
                                    <li><strong>Not Available</strong></li>
                                     @else
                                    <li><strong>{{$patient_data->name}}</strong></li>
                                    @endif
                                    @if($patient_data->age == '')
                                    <li><strong>Not Available</strong></li>
                                     @else
                                    <li><strong>{{$myage}}</strong></li>
                                    @endif
                                       @if($patient_data->gender == '')
                                    <li><strong>Not Available</strong></li>
                                     @else
                                    <li><strong>{{$patient_data->gender}}</strong></li>
                                      @endif
                                      @if($patient_data->weight == '')
                                    <li><strong>Not Available</strong></li>
                                     @else
                                    <li><strong>{{$patient_data->weight}} kg</strong></li>
                                    @endif
                                     @if($patient_data->height == '')
                                    <li><strong>Not Available</strong></li>
                                     @else
                                    <li><strong>{{$patient_data->height}} cm</strong></li>
                                    @endif
                                  @if($patient_data->bmi == '')
                                  <li><strong>Not Available</strong></li>
                                     @else
                                    <li><strong>{{$patient_data->bmi}}</strong></li>
                                    @endif
                                    @if($patient_data->problem == '')
                                  <li><strong>Not Available</strong></li>
                                     @else
                                  <li><strong>{{$patient_data->problem}}</strong></li>
                                  @endif
                               
                                 </ul>
                                </div>
                              </div>
                            </div>
                          
                                
                            <div class="prescriptionbox1" id="content">
                                  @if(Auth::user()->customer_status == '3')
                                <h4 id="edit_pres"  >Add Prescription</h4>
                                <form method="Post" action="{{route('Prescription')}}" enctype="multipart/form-data" >
                @csrf
                  <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

                                  <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">
					<input type="hidden" name="prescription_by" value="doctor">
                                  <input type="hidden" name="prescription_id" id="prescription_id">
                
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    <label>Medication Name</label>
                                    <input type="text" name="medication_name" id="medication_name_input" placeholder="Medication Name" required="">
                                </div> 
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    <label>Medication Dose</label>
                                    <input type="text" name="medication_name2" id="medication_name2_input" placeholder="Medication Dose" required="">
                                </div> 
                                        </div>
                                    </div>
                                     <!-- <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    <label>symptoms</label>
                                    <input type="text" name="frequency" id="frequency_input" placeholder="symtoms" required="">
                                </div> 
                                        </div>
                                    </div> -->
                                     <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    <label>Duration</label>
                                    <input type="text" name="duration" id="duration_input" placeholder="Duration" required="">
                                </div> 
                                        </div>
                                    </div><!-- <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    <label>Diagnosis</label>
                                    <input type="text" name="Diagnosis" id="Diagnosis_input" placeholder="Diagnosis" required="">
                                </div> 
                                        </div>
                                    </div> --><!-- <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="choose_file_container">
                                        <button type="submit">Attachment</button>
                                        <input class="file_choose" type="file" name="file" required="">
                                    </div> 
                                        </div>
                                    </div> -->
                                    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
                                    <!-- <a href="#">ADD MORE</a> -->
                                 <!--   <a href="steps.html" class="stepslogin">ADD PRESCRITOPN</a>-->
                                    <button class="stepslogin" id="add_prescription" <?php if($_GET['status'] == 'end'){?> disabled <?php } ?> >ADD PRESCRIPTION</button>
                                    <button class="stepslogin" id="update_prescription" style="display: none;">UPDATE PRESCRIPTION</button>
                                    
                                </div>
                            </div>
                        </div>
                                </form>
                                @endif
                                
                                
                                
                                @if(Auth::user()->customer_status == '4')
								    <div class="add_pres" style="border:none; display:none">
								        <h4>Add prescription</h4>
                                        <form method="Post" action="{{route('patientprescription')}}" enctype="multipart/form-data" >
                                            @csrf
									        <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">
									        <input type="hidden" name="patient_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="doctor_id" value="{{$patient_data->patient_id}}">
                                            <input type="hidden" name="prescription_by" value="patient">
									   
    									   <div class="row">
    									       <div class="col-sm-6">
    									           <div class="choose_file2">
    									                <input class="file_choose" type="file" name="file" required="">
    									                <span>Choose File</span>
    								                </div>
    										   </div> 
    									      <div class="col-sm-6 text-right">
    									           <button type="submit">Add prescription</button>
    									       </div>
    									   </div>
                                	    </form>
								    </div>
						        @endif


                                <div class="row mt-3">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
								 <h4>Prescription by doctor</h4> 
                                  @if(count($prescription) != '')
                                  <table class="table">
                                    <thead>
                                        <th>Medication Name</th>
                                        <th>Medication Dose</th>
                                        <!-- <th>Symtoms</th> -->
                                        <th>Duration</th>
										 @if(Auth::user()->customer_status == '4')
				<!-- 						<th>Download now</th> -->
									@endif
                                        @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                                        <th>Action</th>
                                        @endif
                                      
                                        <th></th>
                                    </thead>
                                    <tbody>

                                    @foreach($prescription as $value)
                             
                                        <tr>
                                            <input type="hidden" id="delete-prescription-id">
                                            <td><span id="medication_name">{{$value->medication_name}}</span></td>
                                             <td><span id="medication_name2">{{$value->medication_name2}}</span></td>
                                          <!--    <td><span id="frequency">{{$value->frequency}}</span></td> -->
                                             <td><span id="duration">{{$value->duration}}</span></td>
												 @if(Auth::user()->customer_status == '4' )
											<!-- <td><span>   <a href="{{route('pdfview', 
                                     ['id' => $consult->id,'download'=>'pdf','patient_id' => $consult->patient_id ,'doctor_id' => $consult->doctor_id]
                                     )}}" style="float: right;" class="btn btn-danger">DOWNLOAD </a></span></td> -->
									   @endif
                                             @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                                             <td><span>
                                                <a data-id="{{$value->id}}" class="edit-prescription" href="javascript:void(0)"><i class="fa fa-edit" id="fa-edit"></i></a>

                                                <a data-id="{{$value->id}}" class="delete-prescription" href="{{route('delete_prescription', $value->id)}}"><i class="fa fa-trash" id="fa-trash"></i></a>
                                            </span></td>
                                            @endif
                                    
                                     
                                        @endforeach
    
                                    </tbody>
                                </table>
                                @else
                 <h4 id="not_available">No Prescriptions Available</h4> 
                                @endif
                                    
                                </div>
                            </div>
                        </div>
								@if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
											<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
								 <h4>Prescription by Patient</h4> 
						
									 
								 @foreach($patient_prescription as $value)
										
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                 <a href="{{asset($value->file)}}" download  class="download_btn">Download Now</a>
												
                                                   <!-- <img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">-->
                                                   
                                                   <!-- <p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>-->
                                               <!--     <a  href="{{asset($value->file)}}" download  class="newntn">DOWNLOAD PDF</a>-->
                                               <!-- </a>-->
                                            </div>
                                        </div>
										@endforeach
									
                                </div>
                            </div>
                        </div>
						
						@elseif(Auth::user()->customer_status == '4' )
						<div class="row" style='display:none'>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
								 <h4>Prescription by Patient</h4> 
								
								 @foreach($patient_prescription as $value)
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                <a href="{{asset($value->file)}}" download  class="download_btn">Download Now</a>
                                                 <a data-id="{{$value->id}}" class="delete-prescription remove_presp" href="{{route('delete_prescription', $value->id)}}"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
												<!--<a href="" class="pdf">-->
                                                <!--    <img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">-->
                                                   
                                                <!--    <p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>-->
                                                <!--    <a  href="{{asset($value->file)}}" download  class="newntn">DOWNLOAD PDF</a>-->
                                                <!--</a>-->
                                            </div>
                                        </div>
										@endforeach
										
                                </div>
                            </div>
                        </div>
					  @else
					<!--	<h4 id="not_available">No Prescriptions Available</h4> -->
							@endif	
								

                            </div>
                            

                              @if(Auth::user()->customer_status == '3')
                               <div class="prescriptionbox1">
                                <h4>Add Order</h4>
                                <form method="POST" action="{{route('Order')}}" enctype="multipart/form-data">
                                    @csrf
                                      <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
                                     <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
                                     <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">
									     <input type="hidden" name=" testresult_by" value="doctor">
									


                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    
                                    <input type="text" name="text" required="">
                                    <div class="choose_file_container">
                                        <button type="submit">Browse</button>
                                        <input class="file_choose" type="file" name="file" required="">
                                    </div>
                                </div> 
                                        </div>
                                    </div>
                                     
                                   
                                  
                                    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
                                   <!--  <a href="#">ADD MORE</a> -->
                                    <!-- <a href="steps.html" class="stepslogin">ADD PRESCRITOPN</a> -->
                                    <button class="stepslogin" <?php if($_GET['status'] == 'end'){?> disabled <?php } ?> >ADD ORDER</button>
                                </div>
                            </div>
                        </div>
                                </form>
                            </div>

                            @else
								
							     @if(Auth::user()->customer_status == '4')
									<div class="add_pres" style="border:none">
									<h4>Add Test Result</h4>
                                      <form method="Post" action="{{route('testResult')}}" enctype="multipart/form-data" >
                                       @csrf
									   <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">
									     <input type="hidden" name="testresult_by" value="patient">
									   <div class="row nav-flex">
									       <div class="col-sm-6">
									           <div class="choose_file2">
    									            <input class="file_choose" type="file" name="testResult" required="">
    									            <span>Choose File</span>
									            </div>
										   </div>
									       <div class="col-sm-6 text-right">
									           <button type="submit">Add Test Result</button>
									       </div>
									   </div>
                                        
										  
										  </form>
									
                                    </div>
								 
                                @endif
                        <!--     <h4 id="all_orders">All Orders</h4> -->
                                  <div class="row paddingtop">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
								        <h4>Order by doctor</h4> 
								        </div>
                                    @if(count($myorder) != '')
                                    @foreach($myorder as $value)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                <a href="{{asset($value->file)}}" download class="download_btn">Download Now</a>
                                                <!--<img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">-->
                                                <!--<h5>{{$value->text}}</h5>-->
                                                <!--<p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>-->
                                                <!--<a href="{{asset($value->file)}}" download>DOWNLOAD PDF</a>-->
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="col-md-12 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                <h4 id="not_available">No Orders Available</h4> 
                                            </div>
                                        </div>
                                        @endif
                                    </div>
								
							
					
                            @endif
								
								@if(Auth::user()->customer_status == '4' )
									<div class="row paddingtop">
									    <div class="col-md-12 col-sm-12 col-xs-12">
								            <h4>Test Result by patient</h4> 
                                        </div>
                                    @foreach($patient_test_result as $value)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                <a href="{{asset($value->testResult)}}" download  class="download_btn">Download Now</a>
												  <a data-id="{{$value->id}}" class="delete-prescription remove_presp" href="{{route('delete_testresult', $value->id)}}"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                                <!--<img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">-->
                                                <!--<h5>{{$value->text}}</h5>-->
                                                <!--<p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>-->
                                                <!--<a href="{{asset($value->testResult)}}" download>DOWNLOAD PDF</a>-->
                                            </div>
                                        </div>
                                        @endforeach
                                   
                          
                                      
                                    </div>
								@elseif(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
								
								       <div class="row paddingtop">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
								        <h4>Order by doctor</h4> 
								        </div>
                                    @if(count($myorder) != '')
                                    @foreach($myorder as $value)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                <a href="{{asset($value->file)}}" download class="download_btn">Download Now</a>
                                                <!--<img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">-->
                                                <!--<h5>{{$value->text}}</h5>-->
                                                <!--<p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>-->
                                                <!--<a href="{{asset($value->file)}}" download>DOWNLOAD PDF</a>-->
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                <h4 id="not_available">No Orders Available</h4> 
                                        @endif
                                    </div>
								
									<div class="row paddingtop">
								  <h4>Test Result by patient</h4> 
                              
                                    @foreach($patient_test_result as $value)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                <a href="{{asset($value->file)}}" download  class="download_btn">Download Now</a>
                                                <!--<img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">-->
                                                <!--<h5>{{$value->testResult}}</h5>-->
                                                <!--<p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>-->
                                                <!--<a href="{{asset($value->testResult)}}" download>DOWNLOAD PDF</a>-->
                                            </div>
                                        </div>
                                        @endforeach
                                   
                          
                                      
                                    </div>
									@else
										
									@endif
                     
							
							
							
                          </div>
<!---patient dashboard--->


   @if(Auth::user()->customer_status == '4')
   <div class="col-md-7 col-sm-7 col-xs-12 ">
  <div class="timmer_main_patient">
   
   <h1> {{$patient_data->hour}} hour</h1>
   <h1>  {{$patient_data->minute}} minute </h1>
    <h1> {{$patient_data->seconds}} seconds</h1>
  

</div>
</div>
@endif

  @if($_GET['status'] == 'end')
   <div class="col-md-7 col-sm-7 col-xs-12 ">
  <div class="timmer_main_patient">
  <h1> {{$patient_data->hour}} hour</h1>
   <h1>  {{$patient_data->minute}} minute </h1>
    <h1> {{$patient_data->seconds}} seconds</h1>
</div>
</div>
  @endif

  @if($patient_data->status == 0)
   <div class="col-md-7 col-sm-7 col-xs-12 ">
  <div class="timmer_main_patient">
  <h1> {{$patient_data->hour}} hour</h1>
   <h1>  {{$patient_data->minute}} minute </h1>
    <h1> {{$patient_data->seconds}} seconds</h1>
</div>
</div>
  @endif

  <!---end--->
<!---physician dashboard--->
@if(Auth::user()->customer_status == '3')
@if($_GET['status'] != 'end')
 @if($patient_data->status == 1)
<div class="col-md-7 col-sm-7 col-xs-12 ">
  <div class="timmer_main_wrap">
    <!---timer start--->

      <h1 id="timetaken">

      </h1>

      <h2 id=try>
        <span id="hour"> </span>
        <span id="minute"> </span>
        <span id="seconds"> </span>
      </h2>
    
      <!---timer end--->
    </div>

  </div>
    @endif
  @endif
  @endif
  <!---end --->
    <div class="col-md-7 col-sm-7 col-xs-12">
 <div class="medicallist">
  <div class="row">
  <div class="col-md-7">
  <ul class="meeting_menu_list">
  <li class="active"><a data-toggle="tab" href="#home1">Consultation Notes</a></li>
  <li><a data-toggle="tab" href="#menu2">Medical History</a></li>
  <li><a data-toggle="tab" href="#menu3">Attachments</a></li> 
</ul>
</div>

 <div class="col-md-5 pad-l">
  <ul class="meeting_btns_list">
@if(Auth::user()->customer_status == '3')
  <li><a href="javascript:void(0)" id="zoommeeting" class="startsettingbtn" <?php if($_GET['status'] == 'end'){ ?> style="display: none;" <?php } else{ ?> data-toggle="modal" data-target="#zoomModal" <?php } ?> >ZOOM MEETING</a></li>
   <li>
 <a class="startsettingbtn" <?php if($_GET['status'] == 'end'){ ?> style="display: none;" <?php } else{ ?> href="{{ App\Http\Traits\HelperTrait::returnFlag(1966)}}"<?php } ?>  id="start_consult" onclick="MyFunction();" target="_blank" >START MEETING</a>
     @if($_GET['status'] != 'end')

<form method="post" id="zoomsubmit" action="{{route('end_consultation')}}">
  @csrf
  <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">
  <input type="hidden" name="hour" class="hour">
  <input type="hidden" name="minute" class="minute">
  <input type="hidden" name="seconds" class="seconds">
  
  <button data-consult_id="{{$_GET['id']}}" style="font-size: 15px; margin-top: -4%; line-height: 15px;" class="startsettingbtn" id="end_consult" >END MEETING</button>
   
</form>
@endif
<!--  <button class="pull-right startsettingbtn" id="end_consult" >End Meeting</button>  -->
@endif

</li>
 </ul>

</div>
</div>

<div class="clearfix"></div>
<div class="tab-content">
  <div id="home1" class="tab-pane fade in active">
      
              <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <!-- <h3 class="pull-left">Past Medical History</h3> -->
            <h3 class="pull-left">SUBJECTIVE</h3>
            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right complain_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
           
            <ul>
                <form method="post" action="{{route('subjectives_save')}}">
                @csrf

                <input type="hidden" name="field_type" value="complain_history">

                <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
                <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

                <input type="hidden" name="complain_history" id="complain_history">

                <input type="hidden" name="subjectives_id" id="subjectives_id" value="{{$subjectives->id}}">

                       @if(Auth::user()->customer_status == '3')
                       <li id="complain_history_li"> <h4>HISTORY OF PRESENTING COMPLAIN:</h4>
                  
                        <p id="complain_history_pTag">{{$subjectives->complain_history}}</p>
                    
                       <!--   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull. amco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia </p>  -->
                        
                    </li> 
                        @else
                    <li id="complain_history_li"> <h4>HISTORY OF PRESENTING COMPLAIN:</h4>
                      @if($subjectives->complain_history != '')
                        <p id="complain_history_pTag">{{$subjectives->complain_history}}</p>
                      @else
                   <h4 id="not_available">Not Available!</h4> 
                      @endif
                       <!--   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull. amco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia </p>  -->
                       <!--  <button class="savebtn" id="complain_history_save">SAVE</button> -->
                    </li> 
                     @endif
                     <button class="savebtn" id="complain_history_save">SAVE</button>
                </form>
                   
            </ul>
        </div>
    </div>

      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">OBJECTIVE</h3>
            <a href="#" class="pull-right">
                <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
            </a>
            <div class="clearfix"></div>
        </div>
  
    
  
        <div class="medicalhistorybox1body">
          @if(Auth::user()->customer_status == '3')     

          <div class="row physical_row-form"  id="physical_row">
            <div class="col-md-12 col-sm-12 col-xs-12" id="edit">
              <form method="POST" action="{{route('Note')}}" >
              @csrf
              <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
              <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
              <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">
              <!-- update -->
              <input type="hidden" name="note_id" id="note_id" value="{{$Note->id}}">
              <input type="hidden" id="columname" name="columname">
            
              <h4>Physical Examination</h4>
              <input disabled="" class='form-control' name="Appearance" id="General"  value="" />  
              <h4>Detail</h4>
              <textarea required="" id="objective" name="objective" rows="4" cols="50" class='form-control'  ></textarea>
              <div class="clearfix"></div>
              <h4></h4>
              <!-- <button class="savebtn" id="save_btn"> SAVE</button> -->
              <button class="save" id="update_btn">UPDATE</button>
              </form>
            </div>
          </div>
          @endif

        
                <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">GENERAL APPEARANCE:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">

                            <p  class="objectText"> <?=html_entity_decode($Note->GENERAL_APPEARANCE)?></p>
                            <br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="GENERAL_APPEARANCE" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                       <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">HEAD AND NECK:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->HEAD_AND_NECK)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button   data-col-name="HEAD_AND_NECK" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>              <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">RESPIRATORY/CHEST:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->RESPIRATORY_CHEST)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="RESPIRATORY_CHEST" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>              <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">CARDIOVASCULAR:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->CARDIOVASCULAR)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="CARDIOVASCULAR"  class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>              <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">ABDOMEN:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->ABDOMEN)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="ABDOMEN" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>              <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">GENITOURINARY:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->GENITOURINARY)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="GENITOURINARY" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>              <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">MUSCULOSKELETAL:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->MUSCULOSKELETAL)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="MUSCULOSKELETAL" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>              <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">NEURO:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->NEURO)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="NEURO" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>              <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">HEME/LYMPH:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->HEME_LYMPH)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="HEME_LYMPH"  class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                  <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">SKIN/INTEGUMENARY:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->SKIN_INTEGUMENARY)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="SKIN_INTEGUMENARY" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                  <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5  class="appearance" style="font-weight: bolder; color: #005990;">PSYCH:</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p  class="objectText"> <?=html_entity_decode($Note->PSYCH)?></p><br>
                            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
                             <button  data-col-name="PSYCH" class="save edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                

        </div>
  


    <div class="medicalhistorybox1">
        <form method="post" action="{{route('subjectives_save')}}">
        @csrf

        <input type="hidden" name="field_type" value="diagnosis">

        <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
        <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

        <input type="hidden" name="diagnosis" id="diagnosis">

        <input type="hidden" name="subjectives_id" id="subjectives_id" value="{{$subjectives->id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Diagnosis </h3>
            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right diagnosis_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
         @if(Auth::user()->customer_status == '3')
        <div class="medicalhistorybox1body">
                <ul>
                    <li id="diagnosis_edit_li">
                      <p id="diagnosis_pTag">{{$subjectives->diagnosis}}</p>
                    </li> 
                </ul>
        </div>
        @else
        <div class="medicalhistorybox1body">
                   <ul>
                    <li id="diagnosis_edit_li">
                      @if($subjectives->diagnosis != '')
                      <p id="diagnosis_pTag">{{$subjectives->diagnosis}}</p>
                      @else
                      <h4 id="not_available">Not Available!</h4>
                      @endif
                    </li> 
               
                </ul>
        </div>
        @endif
        <button class="savebtn update_btn diagnosis_save" id="update_btn1">UPDATE</button>

        </form>
    </div>

    <div class="medicalhistorybox1">
        <form method="post" action="{{route('subjectives_save')}}">
        @csrf

        <input type="hidden" name="field_type" value="plan">

        <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
        <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

        <input type="hidden" name="plan" id="plan">

        <input type="hidden" name="subjectives_id" id="subjectives_id" value="{{$subjectives->id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Plan </h3>
            @if(Auth::user()->customer_status == '3' && $_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right plan_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
           @if(Auth::user()->customer_status == '3')
        <div class="medicalhistorybox1body">
                <ul>
                    <li id="plan_edit_li">
                
                      <p id="plan_pTag">{{$subjectives->plan}}</p>
              
                    
                    </li> 
               
                </ul>
        </div>

        @else
        <div class="medicalhistorybox1body">
                <ul>
                    <li id="plan_edit_li">
                      @if($subjectives->plan != '')
                      <p id="plan_pTag">{{$subjectives->plan}}</p>
                      @else
                      <h4 id="not_available">Not Available!</h4>
                      @endif
                    </li> 
               
                </ul>
        </div>
         @endif
        <button class="savebtn update_btn plan_save" id="update_btn1">UPDATE</button>

    </form>
    </div>
    </div>



  
  </div>
  <div id="menu2" class="tab-pane fade">

   
   <div class="medicalhistorybox1">
    <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="past_medical_history">
          <input type="hidden" name="history_description" class="history_description">
          <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Medical History</h3>
            @if($_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
            <?php
              
            $past_medical_history = json_decode($patient_history->past_medical_history);
                      // dd($past_medical_history);
                    ?>

                    
                
          @foreach($past_medical_history as  $value)    
          <ul>
          <li style="background-color: #edf3f6;">
          <input  class="edit_pTag edit_pTag_mh" type="text" name="history_description[]" value="{{$value}}" >
         <!--  <a href="javascript:void()"  class="pull-right remove_this_mh"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
            </li> 
          </ul>
          @endforeach
                 
               <!--  <ul>

                    <li id="medical_cond_li"><p id="edit_pTag">{{$patient_history->past_medical_history}}</p></li> 
                </ul> -->
        </div>
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
    </form>
    </div>

      <div class="medicalhistorybox1">
        <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="Surgeries1">
          <input type="hidden" name="history_description" class="history_description">
          <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Surigical History</h3>
            @if($_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">  

                     <?php
              
                        $surgical_history = json_decode($patient_history->Surgeries1);
                      // dd($surgical_history);
                        ?>
                <ul>
          
           <li>
       @foreach($surgical_history as $value)  
       <ul>
                    <li style="background-color: #edf3f6;">
          <input  class="edit_pTag edit_pTag_sur" type="text" name="history_description[]" value="{{$value}}" >
          <!-- <a href="javascript:void()"  class="pull-right remove_this_sur"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
            </li> 
          </ul>
       @endforeach
            <!--     <ul>
           <li id="medical_cond_li"><p id="edit_pTag">{{$patient_history->Surgeries1}}</p></li> 
                </ul> -->
        </div>
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
    </form>
    </div>

      <div class="medicalhistorybox1">
        <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="employment_status">
          <input type="hidden" name="history_description" class="history_description">
          <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

        <!-- <div class="medicalhistorybox1header">
            <h3 class="pull-left">Social History</h3>
            @if($_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div> -->
        <!-- <div class="medicalhistorybox1body">
                <ul>
                    <li id="medical_cond_li">
                        <p id="edit_pTag">{{$patient_history->employment_status}}</p>
                    </li>
                </ul>
        </div> -->
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
    </form>
    </div>

      <div class="medicalhistorybox1">
        <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="family_medical_condition">
          <input type="hidden" name="history_description" class="history_description">
          <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Family History</h3>
            @if($_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
             <?php
        $fam_cond = json_decode($patient_history->family_medical_condition);
   //dd($fam_cond);
        ?>
         @foreach($fam_cond as $value)
          <ul>
                 <li> 
               <input  class="edit_pTag edit_pTag_fam" type="text" name="history_description[]" value="{{$value}}" >
             <!--   <a href="javascript:void()"  class="pull-right remove_this_fam"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                 </li> 
                </ul>
                  @endforeach
              <!--   <ul>
                    <li id="medical_cond_li"><p id="edit_pTag">  @foreach($fam_cond as $value)
                  {{$value}}</p>
                  @endforeach</p></li> 
                </ul> -->
        </div>
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
    </form>
    </div>

      <div class="medicalhistorybox1">
         <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="allergies">
          <input type="hidden" name="history_description" class="history_description">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Allergies</h3>
            <a href="javascript:void()" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
            <?php
        $allergies = json_decode($patient_history->allergies);
       //dd($allergies);
        ?>
	
        <div class="medicalhistorybox1body">
          @if($patient_history->Is_allergies == "yes")
             @foreach($allergies as $value)
				 @if($value == null)
                <ul>
        
                     <li><!-- <b>Are you allergic to any medication or do you have any type of allergies?</b> -->
                      <input  class="edit_pTag edit_pTag_allergy" type="text" name="history_description[]" value="{{$value}}" >
					<!--   <a href="javascript:void()"  class="pull-right remove_this_allergy"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
                    </li>
                
                </ul>
            
                @else
                <ul>
        
                     <li><!-- <b>Are you allergic to any medication or do you have any type of allergies?</b> -->
                      <input  class="edit_pTag edit_pTag_allergy" type="text" name="history_description[]" value="{{$value}}" >
                     <!--<a href="javascript:void()"  class="pull-right remove_this_allergy"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
                     <!--  <p class="edit_pTag">{{$patient_history->allergies}}</p> -->
                    </li>
                
                </ul>
				   @endif
				  @endforeach
                @endif
               
                
        </div>
        <button class="savebtn" id="update_btn">UPDATE</button>
      </form>
    </div>

      <div class="medicalhistorybox1">
        <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="Current_medication1">
          <input type="hidden" name="history_description" class="history_description">
          <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Current Medications</h3>
            @if($_GET['status'] != 'end')
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
          <?php
        $data = json_decode($patient_history->Current_medication1);
     //dd($data);
        ?>
        <div class="medicalhistorybox1body">
                <ul>
        
                 <li>
          @foreach($data as $value)
           <ul>
                    <li style="background-color: #edf3f6;">
          <input  class="edit_pTag edit_pTag_medication" type="text" name="history_description[]" value="{{$value}}" >
         <!--  <a href="javascript:void()"  class="pull-right remove_this_medication"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
            </li> 
          </ul>
                   @endforeach</li>
         
               
                </ul>
        </div>
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
    </form>
    </div>
     
  </div>
  <div id="menu3" class="tab-pane fade">

      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">file</h3>
            <a href="#" class="pull-right"></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                         @foreach($images as $value)
                                  
                                  <a href="{{asset($value->image)}}" download>
                                <img src="{{asset($value->image)}}" class="img-responsive" alt="img" style="width: 25%; padding-bottom: 25px; padding-top: 25px;" >
                             
                              </a>
                              <a href="{{asset($value->image)}}" download>Download </a>

                               @endforeach
        </div>
    </div>
      <!-- <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Report</h3>
            <a href="#" class="pull-right"></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
          <a href="{{asset($patient_data->Report)}}" download  >
                               <img src="{{asset('images/pdf.jpg')}}" style=" padding-bottom: 25px; padding-top: 25px;" class="img-responsive pdf" alt="img">
                              </a>
        </div>
    </div> -->
      <!-- <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Allergies</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div> -->
      <!-- <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Current Medications</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div> -->
  </div>
</div>

  
  
   @if(Auth::user()->customer_status == '3')
 <a class="pull-right startsettingbtn" href="{{url('physician-dashboard/requested')}}" >End Consultation</a> 
 @endif


                           </div>
                            
                          </div>
                        </div>
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
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


    <!-- zoom Modal -->
    <div class="Complainsec">
        <div id="zoomModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Zoom Meeting</h4>
              </div>
              <div class="modal-body">
                @if(Auth::user()->customer_status == '3')
                <form method="post" action="{{route('zoomSubmit')}}">
                  @csrf

                  <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

                 <div class="row">

                  <div class="col-md-2 col-sm-2 col-xs-12"></div>

                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="loginlist">
                        <label>Email ID:</label>
                        <input type="text" class="form-control" placeholder="" name="zoom_id_link" required>
                        <label>Zoom Meeting Link:</label>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-2 col-xs-12"></div>
                 </div>

                 <div class="row">
                  <div class="col-md-2 col-sm-2 col-xs-12"></div>

                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="submit" class="stepslogin" name="" value="SEND">
                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-12"></div>
                 </div>
                 </form>
                 @else
                 <div class="row">

                  <div class="col-md-2 col-sm-2 col-xs-12"></div>

                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="loginlist">
                        <label>Email ID</label>
                        <input type="text" class="form-control" placeholder="" name="zoom_id_link" value="{{$zoom_meeting->zoom_id_link}}" readonly="">
                        <label>Zoom Meeting Link:</label>
                        <textarea class="form-control" name="description" rows="4" readonly="">{{$zoom_meeting->description}}</textarea>
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-2 col-xs-12"></div>
                 </div>

                 <div class="row">
                  <div class="col-md-2 col-sm-2 col-xs-12"></div>

                  <div class="col-md-8 col-sm-8 col-xs-12">
                    
                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-12"></div>
                 </div>
                 @endif
              </div>
             
            </div>

          </div>
        </div>
</div>
@endsection
@section('css')
<style>

input.edit_pTag {
    border: none;
  background-color: #edf3f6;
}
.medicalhistorybox1body {
    background-color: #edf3f6;
    padding: 6px 13px;
    margin: 0 0 7px;
}

  #wrapper {
    padding-left: 225px;
    background: #e5e5e5;
}

.savebtn {
    color: #004e7e !important;
    border: 1px solid #004e7e;
    padding: 4px 20px;
    border-radius: 5px;
    font-size: 18px;
    line-height: 20px;
    font-weight: 600;
    display: none;
}.save {
    color: #004e7e !important;
    border: 1px solid #004e7e;
    padding: 4px 20px;
    border-radius: 5px;
    font-size: 18px;
    line-height: 20px;
    font-weight: 600;
    
}

.savebtn:hover {
    background-color: #004e7e;
    color: rgb(239, 239, 239)!important;
}
@media only screen and (max-width: 600px) {
     #wrapper {
    padding-left:0px;
    background: #e5e5e5;
}
#page-wrapper {
    width: 100%;
    padding: 0;
    background-color: #fff;
    margin: 200px 0px;
}
.inputform li input{
    width:100%;
}
}


#zoommeeting{
line-height: 26px;
}
button.savebtn {
    color: #004e7e !important;
    border: 1px solid #004e7e;
    padding: 4px 20px;
    border-radius: 5px;
    font-size: 14px;
    line-height: 20px;
    font-weight: 600;
    float: right;
}button.save {
    color: #004e7e !important;
    border: 1px solid #004e7e;
    padding: 4px 20px;
    border-radius: 5px;
    font-size: 14px;
    line-height: 20px;
    font-weight: 600;
    float: right;
}
.meeting_btns_list li a{
  color: #fff !important;
  font-size: 14px !important;
  padding: 7px;
  font-weight: 500 !important;
}
.meeting_btns_list{
  text-align: right;
}
.pad-l{
  padding-left: 0 !important;
}
/*#update_btn{
    display: none;
}*/
.physical_row-form{display: none}

/*medical history edit*/
.update_btn {
    color: #004e7e !important;
    border: 1px solid #004e7e;
    padding: 4px 20px;
    border-radius: 5px;
    font-size: 18px;
    line-height: 20px;
    font-weight: 600;
    display: none;
    float: none!important;
}

.update_btn:hover {
    background-color: #004e7e;
    color: rgb(239, 239, 239)!important;
}

#complain_history_li{
    width: -webkit-fill-available;
}

#complain_history_save{
    display: none;
}

#medical_cond_li, #diagnosis_edit_li, #plan_edit_li{
    width: -webkit-fill-available;
}

.fa{
    padding-right: 7px;
}

.edit-prescription, .delete-prescription{
    border: none!important; 
    color: #035a90; 
    font-size: 15px; 
    line-height: 0px!important; 
    font-weight: 600; 
    text-align: center; 
    margin: 0!important; 
    display: contents; 
}

/*zoom send button*/
.stepslogin{
    width: 100%;
    border-radius: 5px;
}


#all_orders{
  color: #4e4e4e;
    font-size: 20px;
    line-height: 25px;
    font-weight: 600;
}

#not_available{
    color: #8c0001;
}

#physical_row {
    background-color: #edf3f6;
    height: auto;
    margin-right: 0;
    margin-left: 0;
    margin-bottom: 2%;
}


/*end consultation*/
/*#end_consult{
  width: 50%;
  margin-right: 0px;
  margin-left: auto;
  margin-top: 50px;
}
*/
button[disabled], a[disabled] {
    cursor: not-allowed;
}

.timmer_main_wrap .stepslogin {
    display: block;
    width: 25% !important;
    margin: -2px 31px 0px 0px !important;
    padding: 12px 16px;
    text-transform: uppercase;
    font-size: 15px;
    line-height: 20px;
    font-weight: 600;
    border-radius: 0;
    border: 1px solid #000;
}

.timmer_main_wrap h1, .timmer_main_wrap h2 {
    display: inline-block;
    margin: 0;
}

.timmer_main_wrap {
    position: absolute;
    top: -100px;
    width: 100%;
}

.timmer_main_wrap #try span {
    background-color: #004e7e;
    color: #fff;
    padding: 11px 24px;
    margin-right: 15px;
    font-size: 20px;
}

.mt-50 {
  margin-top: 50px;
}


.timmer_main_patient h1 {
    background-color: #004e7e;
    color: #fff;
    padding: 11px 24px;
    margin-right: 15px;
    font-size: 20px;
    display: inline-block;
}

.timmer_main_patient {
    position: absolute;
    top: -100px;
    width: 100%;
}

/*.timmer_main_wrap #try span:after {
    position: absolute;
    content: ':';
    right: 0;
    top: -2px;
    font-size: 45px;
    line-height: 45px;
}*/

.startsettingbtn {
    font-size: 14px;
    line-height: 20px;
}

.meeting_btns_list li button {
    color: #fff !important;
    font-size: 14px !important;
    padding: 7px;
    font-weight: 500 !important;
}
.pat_prescription {
    float: right;
    padding-bottom: 22px;
}

.row.paddingtop h4 {
    color: #4e4e4e;
    font-size: 20px;
    line-height: 25px;
    font-weight: 600;
}
a.newntn{
    color: #ff2318;
    font-size: 12px;
    line-height: 20px;
    font-weight: 600;
    background-color: #ffe7e6;
    padding: 2px 7px;
	border: none;
}
</style>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

<script type="text/javascript">
    // GENERAL APPEARANCE EDIT 
    $(".edit_btn").click(function(){
        var pTag = $(this).siblings('.objectText').text();
        var h5Tag = $(this).closest('.no-margin').siblings('.no-margin').find('.appearance').html();
        $('#objective').val(pTag);
        $('#General').val(h5Tag);
        //$('#note_id').val($(this).data('id'));
        
        $('#columname').val($(this).data('col-name'));

        // var objtext = objtext.concat($(this).data('id'));


        // show/hide button
        // $('#save_btn').hide();
        // $('#update_btn').show();
        $(".physical_row-form").show();
        // navigate
        window.location = "#edit";
        
    });
</script>

<script type="text/javascript">
    // MEDICAL HISTORY EDIT
    $('.med_history_edit').click(function(){
        
      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('#edit_pTag').attr('contenteditable', 'true');

      $(this).closest('.medicalhistorybox1header').siblings('.update_btn').show();

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('li').css({"background-color": "white"});

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('ul').css({"border-style": "solid", "border-width": "thin", "border-color":"black"});
    });

    $('.update_btn').click(function(){
        var history_desc = $(this).siblings('.medicalhistorybox1body').find('#edit_pTag').text();


        $(this).siblings('.history_description').val(history_desc);
        });

</script>

<script type="text/javascript">
    // HISTORY OF PRESENTING COMPLAIN EDIT
    $('.complain_edit').click(function(){
        
        $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('#complain_history_pTag').attr('contenteditable', 'true');

        $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('#complain_history_pTag').css('background-color', 'white');

        $('#complain_history_save').show();
    });

    $('#complain_history_save').click(function(){
        var complain_history = $(this).siblings('#complain_history_li').find('#complain_history_pTag').text();
     

        $(this).siblings('#complain_history').val(complain_history);
    });
</script>


<script type="text/javascript">
    // DIAGNOSIS EDIT 
    $('.diagnosis_edit').click(function(){

        $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('#diagnosis_pTag').attr('contenteditable', 'true');

        $(this).closest('.medicalhistorybox1header').siblings('.update_btn').show();

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('li').css({"background-color": "white"});

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('ul').css({"border-style": "solid", "border-width": "thin", "border-color":"black"});

    });

    $('.diagnosis_save').click(function(){

        var diagnosis = $(this).siblings('.medicalhistorybox1body').find('#diagnosis_pTag').text();

        $(this).siblings('#diagnosis').val(diagnosis);
        });
</script>

<script type="text/javascript">
    // PLAN EDIT
    $('.plan_edit').click(function(){

        $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('#plan_pTag').attr('contenteditable', 'true');

        $(this).closest('.medicalhistorybox1header').siblings('.update_btn').show();

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('li').css({"background-color": "white"});

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('ul').css({"border-style": "solid", "border-width": "thin", "border-color":"black"});

    });

    $('.plan_save').click(function(){

        var plan = $(this).siblings('.medicalhistorybox1body').find('#plan_pTag').text();

        $(this).siblings('#plan').val(plan);
        });

</script>

<script type="text/javascript">
    // EDIT PRESCRIPTION
    $('.edit-prescription').click(function(){
        $('#update_prescription').show();
        $('#add_prescription').hide();

        var medication_name = $(this).closest('tr').find('#medication_name').text();
        var medication_name2 = $(this).closest('tr').find('#medication_name2').text();
        var frequency = $(this).closest('tr').find('#frequency').text();
        var duration = $(this).closest('tr').find('#duration').text();
        var file = $(this).closest('tr').find('#file').text();

        $('#medication_name_input').val(medication_name);
        $('#medication_name2_input').val(medication_name2);
        $('#frequency_input').val(frequency);
        $('#duration_input').val(duration);
        $('#Diagnosis_input').val(Diagnosis);
        $('#file').val(file);
        $('#prescription_id').val($(this).data('id'));

        window.location = "#edit_pres";
    });
</script>


<script type="text/javascript">
  window.onload = () => {
  let hour = 0;
  let minute = 0;
  let seconds = 0;
  let totalSeconds = 0;
document.getElementById("hour").innerHTML = hour + " hour:  ";
document.getElementById("minute").innerHTML = minute + " minutes: ";
document.getElementById("seconds").innerHTML = seconds + " seconds";
  }
  function MyFunction() {
  let hour = 0;
  let minute = 0;
  let seconds = 0;
  let totalSeconds = 0;

  let intervalId = null;

intervalId = setInterval(startTimer, 1000);
  function startTimer() {
    ++totalSeconds;
    hour = Math.floor(totalSeconds / 3600);
    minute = Math.floor((totalSeconds - hour * 3600) / 60);
    seconds = totalSeconds - (hour * 3600 + minute * 60);

    document.getElementById("hour").innerHTML = hour + " hour:  ";
    document.getElementById("minute").innerHTML = minute + " minutes: ";
    document.getElementById("seconds").innerHTML = seconds + " seconds";
  }
  document.getElementById('end_consult').addEventListener('click', () => {
  document.getElementById("timetaken").innerHTML = hour + " hour " + minute + " minutes " + seconds + " seconds";
    $('.hour').val(hour);
    $('.minute').val(minute);
    $('.seconds').val(seconds);
  });

}

$("#end_consult").click(function(){
  $("#try").hide();
});

$(document).ready(function(){
   $("#end_consult").hide();
   $("#start_consult").click(function(){
    $("#end_consult").show();
    $("#start_consult").hide();
  });

    $("#end_consult").click(function(){
    $("#start_consult").show();
    $("#end_consult").hide();
  });
});
</script>

<script type="text/javascript">
    $("#end_consult").click(function(){
        var consult_id = $(this).attr('data-consult_id');

        $.ajax({
            url: "{{url('/physician-dashboard/end_consultation')}}",
            type: "POST",
            cache: false,
            dataType : 'json',
            data:{
                _token:'{{ csrf_token() }}',
                consult_id : consult_id,
            },
            success: function(dataResult){
                if(dataResult.status) {
                    $("#zoomsubmit").html(dataResult.html);
                   // $("#ecc_modal").modal();
                }
            }
        });
    });
</script>


<script type="text/javascript">

    $('.pull-right').click(function(){
      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('.edit_pTag').attr('contenteditable', 'true');

      $(this).closest('.medicalhistorybox1header').siblings('.savebtn').show();

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('li').css({"background-color": "white"});

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('ul').css({"border-style": "solid", "border-width": "thin", "border-color":"black"});

    });

    $('.savebtn').click(function(){
        var history_desc = $(this).siblings('.medicalhistorybox1body').find('.edit_pTag').text();
    //console.log($(this).siblings('.medicalhistorybox1body').find('.edit_pTag').text());
    // e.preventDefault();
        $(this).siblings('.history_description').val(history_desc);
 
        });





    $(".remove_this_mh").click(function(){
      $(this).closest("li").remove();
      var values = $(".edit_pTag_mh");
      var marg_values  = '';
      values.each(function(k,v){
        marg_values += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_medical_history_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            value : marg_values,
        },
        success: function(dataResult){
      //console.log(dataResult.status);
           // if(dataResult.status) {
              //   $.toast({
             //   heading: 'Success!',
              //  position: 'bottom-right',
              //  text:  dataResult,
              //  loaderBg: '#ff6849',
               // icon: 'success',
               // hideAfter: 3000,
              //  stack: 6
              //});
            //}
        }
      });
    });

    //////////////////surgical history///////////////////////////

    $(".remove_this_sur").click(function(){
      $(this).closest("li").remove();
      var surg_values = $(".edit_pTag_sur");
      var marg_surg_values  = '';
      surg_values.each(function(k,v){
        marg_surg_values += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_surgical_history_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            surg_value : marg_surg_values,
        },
        success: function(dataResult){
       // if(dataResult.status) {
             //    $.toast({
              //  heading: 'Success!',
              //  position: 'bottom-right',
              //  loaderBg: '#ff6849',
               //icon: 'success',
              //  hideAfter: 3000,
              // stack: 6
            //});
           // }
        }
      });
    });


    /////////////////family history///////////////
        $(".remove_this_fam").click(function(){
      $(this).closest("li").remove();
      var fam_values = $(".edit_pTag_fam");
      var marg_fam_values  = '';
      fam_values.each(function(k,v){
        marg_fam_values += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_family_history_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            fam_values : marg_fam_values,
        },
        success: function(dataResult){
      //console.log(dataResult);
           // if(dataResult.status) {
        
             //    $.toast({
             //   heading: 'Success!',
             //   position: 'bottom-right',
            ////    text:  dataResult,
             //   loaderBg: '#ff6849',
            //    icon: 'success',
            //    hideAfter: 3000,
            //    stack: 6
            //  });
           // }
        }
      });
    });

    /////////////////allergy history///////////////
        $(".remove_this_allergy").click(function(){
      $(this).closest("li").remove();
      var allergy = $(".edit_pTag_allergy");
      var marg_allergy  = '';
      allergy.each(function(k,v){
        marg_allergy += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_allergies_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            allergy : marg_allergy,
        },
        success: function(dataResult){
          //  if(dataResult =='deleted!','status') {
             //    $.toast({
             //   heading: 'Success!',
             //   position: 'bottom-right',
             //   text:  dataResult,
             //   loaderBg: '#ff6849',
             //   icon: 'success',
             //   hideAfter: 3000,
             //   stack: 6
             // });
           // }
        }
      });
    });

  /////////////////medication history///////////////
        $(".remove_this_medication").click(function(){
      $(this).closest("li").remove();
      var medication = $(".edit_pTag_medication");
      var marg_medication  = '';
      medication.each(function(k,v){
        marg_medication += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_current_medication_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            medication : marg_medication,
        },
        success: function(dataResult){
            //if(dataResult =='deleted!','status') {
             ///    $.toast({
              //  heading: 'Success!',
              //  position: 'bottom-right',
              ///  text:  dataResult,
              ///  loaderBg: '#ff6849',
              //  icon: 'success',
              //  hideAfter: 3000,
             //   stack: 6
             // });
//}
        }
      });
    });

//////////////////////////////////////////////////
</script>




@endsection
