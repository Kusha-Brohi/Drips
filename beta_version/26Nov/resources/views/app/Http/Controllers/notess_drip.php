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
      <div class="prescriptionbox">
		
        <div id="page-wrapper">

          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
              <div class="col-sm-12 col-md-12" id="content">
                <div class="infobox">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="billingsec1">
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
                                    <li>DOB</li>
                                    <li>Gender</li>
                          
                                    <li>Weight</li>
                                    <li>Height </li>
                                    <li>BMI </li>
									             <li>Allergies</li>
                                    <!-- <li>Report</li> -->
                                  </ul>
                                  <ul>
                                    <li><strong>{{$patient_data->name}}</strong></li>
                                    <li><strong>{{$patient_data->age}}</strong></li>
                                    <li><strong>{{$patient_data->gender}}</strong></li>
                      
                               
                                    <li><strong>{{$patient_data->weight}}</strong></li>
                                    <li><strong>{{$patient_data->height}}</strong></li>
                                    <li><strong>{{$patient_data->bmi}}</strong></li>
							                   	<li><strong>{{$patient_data->problem}}</strong></li>
                                 
                         @foreach($images as $value)
                               <li><strong>
                                  <a href="{{asset($value->image)}}" download>
                                <img src="{{asset($value->image)}}" class="img-responsive" alt="img">
                              </a>
                              </strong></li> 
                               @endforeach
                               
                               
								 </ul>
                                </div>
                              </div>
                            </div>
                          
                         
                            <div class="prescriptionbox1">
                              @if(Auth::user()->customer_status == '3')
                                <h4 id="edit_pres">Add Prescription</h4>
                                <form method="Post" action="{{route('Prescription')}}" enctype="multipart/form-data">
								@csrf
								  <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
								  <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

                                  <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

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
                                    <input type="text" name="medication_name2" id="medication_name2_input" placeholder="Medication Name" required="">
                                </div> 
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    <label>Frequency</label>
                                    <input type="text" name="frequency" id="frequency_input" placeholder="Frequency" required="">
                                </div> 
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="loginlist">
                                    <label>Duration</label>
                                    <input type="text" name="duration" id="duration_input" placeholder="Duration" required="">
                                </div> 
                                        </div>
                                    </div><div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="choose_file_container">
                                        <button type="submit">Attachment</button>
                                        <input class="file_choose" type="file" name="file" required="">
                                    </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
                                    <!-- <a href="#">ADD MORE</a> -->
                                 <!--   <a href="steps.html" class="stepslogin">ADD PRESCRITOPN</a>-->
                                    <button class="stepslogin" id="add_prescription">ADD PRESCRIPTION</button>
                                    <button class="stepslogin" id="update_prescription" style="display: none;">UPDATE PRESCRIPTION</button>
                                    
                                </div>
                            </div>
                        </div>
                                </form>
                                @endif

                                @if(Auth::user()->customer_status == '4')
                                <h4>All Prescriptions</h4>
                                @endif


                                <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
                                  @if(count($prescription) != '')
                                  <table class="table">
                                    <thead>
                                        <th>Medication Name</th>
                                        <th>Medication Dose</th>
                                        <th>Frequency</th>
                                        <th>Duration</th>
                                        @if(Auth::user()->customer_status == '3')
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
                                             <td><span id="frequency">{{$value->frequency}}</span></td>
                                             <td><span id="duration">{{$value->duration}}</span></td>
                                             @if(Auth::user()->customer_status == '3')
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


                            </div>
                            

                              @if(Auth::user()->customer_status == '3')
                               <div class="prescriptionbox1">
                                <h4>Add Order</h4>
                                <form method="POST" action="{{route('Order')}}" enctype="multipart/form-data">
                                    @csrf
                                      <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
                                     <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
                                     <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">


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
                                    <button class="stepslogin">ADD ORDER</button>
                                </div>
                            </div>
                        </div>
                                </form>
                            </div>
                            @else
                            <h4 id="all_orders">All Orders</h4>
                                  <div class="row paddingtop">
                                    @if(count($myorder) != '')
                                    @foreach($myorder as $value)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                
                                                <img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">
                                                <h5>{{$value->text}}</h5>
                                                <p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>
                                                <a href="{{asset($value->file)}}" download>DOWNLOAD PDF</a>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <h4 id="not_available">No Orders Available</h4>
                                        @endif
                                    </div>
                            @endif
                          </div>
                          <div class="col-md-7 col-sm-7 col-xs-12 ">
                           <div class="medicallist">
                               <ul class="pull-left">
  <li class="active"><a data-toggle="tab" href="#menu2 ">Medical History</a></li>
  <li><a data-toggle="tab" href="#home1">Consultation Notes</a></li>
 <!--  <li><a data-toggle="tab" href="#menu3">Attachments</a></li> -->
</ul>
 <a href="javascript:void(0)" data-toggle="modal" data-target="#zoomModal" class="pull-right startsettingbtn">ZOOM MEETING</a>
 <div class="clearfix"></div>
<div class="tab-content">
  <div id="home1" class="tab-pane fade in active">

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
                    <form method="POST" action="{{route('Note')}}" id="edit">
        @csrf
          <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
           <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

           <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">


           <!-- update -->
           <input type="hidden" name="note_id" id="note_id">
          
            <h4>Physical Examination</h4>
                     <ul>
                    <li><input required="" style="width: 621px;" name="Appearance" id="General"  value="" />  </li> 
                </ul>
                 <h4>Detail</h4>
                <ul>
                <li><textarea required="" id="objective" name="objective" rows="4" cols="50" style="width: 621px;" >


            </textarea>
            <button class="savebtn" id="save_btn"> SAVE</button>
            <button class="savebtn" id="update_btn">UPDATE</button>
        </li> 
                   
                </ul>
            </form>
            @endif

            @if(count($Note) != '')
                @foreach($Note as $value)
                <div class="row" id="physical_row">
                    <div class="col-md-3 col-sm-3 col-xs-12 no-margin">
                        <div class="generallist new_height">
                            <!-- <h4 >General Appearance</h4> -->
                            <h5 id="appearance{{$value->id}}" class="appearance" style="font-weight: bolder; color: #005990;">{{$value->Appearance}}</h5>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 no-margin">
                        <div class="generalpara new_height generalpara_custom">
                            <p id="objectText{{$value->id}}" class="objectText"> <?=html_entity_decode($value->objective)?></p><br>
                            @if(Auth::user()->customer_status == '3')
                             <button data-id="{{$value->id}}" class="savebtn edit_btn" id="editbutton" >EDIT</button>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            @else
            <h4 id="not_available">Not Available!</h4>
            @endif
                

        </div>
	
		    <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <!-- <h3 class="pull-left">Past Medical History</h3> -->
            <h3 class="pull-left">SUBJECTIVE</h3>
            @if(Auth::user()->customer_status == '3')
            <a href="javascript:void(0)" class="pull-right complain_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
           
            <ul>
                <form method="post" action="{{route('subjectives_save')}}">
                @csrf

                <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
                <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

                <input type="hidden" name="complain_history" id="complain_history">

                <input type="hidden" name="subjectives_id" id="subjectives_id" value="{{$subjectives->id}}">


                    <li id="complain_history_li"> <h4>HISTORY OF PRESENTING COMPLAIN:</h4>
                      @if($subjectives->complain_history != '')
                        <p id="complain_history_pTag">{{$subjectives->complain_history}}</p>
                      @else
                      <h4 id="not_available">Not Available!</h4>
                      @endif
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull. amco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia </p> -->
                        <button class="savebtn" id="complain_history_save">SAVE</button>
                    </li> 
                </form>
                   
            </ul>
        </div>
    </div>
    </div>



  
  </div>
  <div id="menu2" class="tab-pane fade">

    @if(Auth::user()->customer_status == '3')
   <div class="medicalhistorybox1">
    <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="medical_condition">
          <input type="hidden" name="history_description" class="history_description">
          <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Medical History</h3>
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li id="medical_cond_li"><p id="edit_pTag">{{$patient_history->medical_condition}}</p></li> 
                </ul>
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
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
				   <li id="medical_cond_li"><p id="edit_pTag">{{$patient_history->Surgeries1}}</p></li> 
                </ul>
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

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Social History</h3>
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li id="medical_cond_li">
                        <p id="edit_pTag">{{$patient_history->employment_status}}</p>
                    </li>
                </ul>
        </div>
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
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li id="medical_cond_li"><p id="edit_pTag">{{$patient_history->family_medical_condition}}</p></li> 
                </ul>
        </div>
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
    </form>
    </div>

      <div class="medicalhistorybox1">
        <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="allergies">
          <input type="hidden" name="history_description" class="history_description">
          <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Allergies</h3>
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                     <li id="medical_cond_li"><p id="edit_pTag">{{$patient_history->allergies}}</p></li>
                
                </ul>
        </div>
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
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
            <a href="javascript:void(0)" class="pull-right med_history_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                 <li id="medical_cond_li"><p id="edit_pTag">{{$patient_history->Current_medication1}}</p></li>
               
                </ul>
        </div>
        <button class="savebtn update_btn" id="update_btn1">UPDATE</button>
    </form>
    </div>
    @endif

    <div class="medicalhistorybox1">
        <form method="post" action="{{route('subjectives_save')}}">
        @csrf

        <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
        <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

        <input type="hidden" name="diagnosis" id="diagnosis">

        <input type="hidden" name="subjectives_id" id="subjectives_id" value="{{$subjectives->id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Diagnosis </h3>
            @if(Auth::user()->customer_status == '3')
            <a href="javascript:void(0)" class="pull-right diagnosis_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
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
        <button class="savebtn update_btn diagnosis_save" id="update_btn1">UPDATE</button>

        </form>
    </div>


    <div class="medicalhistorybox1">
        <form method="post" action="{{route('subjectives_save')}}">
        @csrf

        <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="patient_id" value="{{$patient_data->patient_id}}">
        <input type="hidden" name="consultation_id" value="{{$_GET['id']}}">

        <input type="hidden" name="plan" id="plan">

        <input type="hidden" name="subjectives_id" id="subjectives_id" value="{{$subjectives->id}}">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Plan </h3>
            @if(Auth::user()->customer_status == '3')
            <a href="javascript:void(0)" class="pull-right plan_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            @endif
            <div class="clearfix"></div>
        </div>
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
        <button class="savebtn update_btn plan_save" id="update_btn1">UPDATE</button>
    </form>
    </div>
  </div>
  <div id="menu3" class="tab-pane fade">
  <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Medical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                  <li><p>{{$patient_history->medical_condition2}}</p></li> 
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Surigical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
				     <li><p>{{$patient_history->Surgeries2}}</p></li> 
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Social History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                  <li><p>{{$patient_history->medical_condition2}}</p></li> 
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Family History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
				<li><p>{{$patient_history->family_medical_condition}}</p></li> 
                </ul>
        </div>
    </div>
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
                        <label>Zoom ID / Zoom Meeting Link:</label>
                        <input type="text" class="form-control" placeholder="" name="zoom_id_link" required>
                        <label>Description:</label>
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
                        <label>Zoom ID / Zoom Meeting Link:</label>
                        <input type="text" class="form-control" placeholder="" name="zoom_id_link" value="{{$zoom_meeting->zoom_id_link}}" readonly="">
                        <label>Description:</label>
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
button.savebtn {
    color: #004e7e !important;
    border: 1px solid #004e7e;
    padding: 4px 20px;
    border-radius: 5px;
    font-size: 14px;
    line-height: 20px;
    font-weight: 600;
    float: right;
}

#update_btn{
    display: none;
}

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
    display: contents!important; 
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

#physical_row{
  background-color: #edf3f6;
  height: auto;
}
</style>
@endsection

@section('js')
<script type="text/javascript">
    // GENERAL APPEARANCE EDIT 
    $(".edit_btn").click(function(){
        var pTag = $(this).siblings('.objectText').text();
        var h5Tag = $(this).closest('.no-margin').siblings('.no-margin').find('.appearance').html();
        $('#objective').val(pTag);
        $('#General').val(h5Tag);
        $('#note_id').val($(this).data('id'));
        // var objtext = objtext.concat($(this).data('id'));


        // show/hide button
        $('#save_btn').hide();
        $('#update_btn').show();

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
        var complain_history = $(this).siblings('#complain_history_pTag').text();

        $(this).closest('#complain_history_li').siblings('#complain_history').val(complain_history);
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
        $('#file').val(file);
        $('#prescription_id').val($(this).data('id'));

        window.location = "#edit_pres";
    });
</script>


<script type="text/javascript">

// $("#editbutton").click(function(){

// $.ajax({
// url: '/PhysicianController/Consultation/' + id
// type: 'Get',
// success: function (response) {
// if (response.success) {

// } else {

// }
// },

// });

//   });  

</script>
@endsection
