
@extends('layouts.physician-dashboard.main')
@section('content')
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
  @include('widgets.patientSideBar')
    </nav>
     <div class="prescriptionbox">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">

                <div class="col-sm-12 col-md-12" id="content">
                    <div class="infobox">
                        <div class="row">
                            <div class="col-md-11 col-sm-11 col-xs-12">
                       <div class="billingsec">


                       <!--  <button type="button" class="btn btn-lg btn-primary">Show Modal</button>
                        <a href="">EDit</a> -->



                        <div class="modal fade ecc_card_modal" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         
                      <div class="row">
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_pic">
							  <figure>
							  
							    @if($popupdata->pic != NULL)
                                      <img src="{{asset($popupdata->pic)}}" class="img-responsive" alt="">
								   @else
								   <img src="{{asset('images/no_image.jpg')}}" class="img-responsive" alt="">
							   @endif
                               </figure>
                              
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">

                               <h4>
                                 {{$userdata->name}} {{$userdata->lname}}
                                 
                               </h4>
                              
                                <?php
                                 $date = date('j F, Y', strtotime($popupdata->DOB));
                                           // dd($date);
                                ?>
                               <h4>
                               {{$date}}
                               </h4>

                               <h4>
                                {{$popupdata->Gender}}
                               </h4>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Height: {{$popupdata->height}}cm
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
								@if($popupdata->job_title == '')
                               <h4>
								Job Title: None
                               
                               </h4>
							   @else
							       <h4>
                                    Job Title: {{$popupdata->job_title}}
                               </h4>
							   @endif
                            </div>
                         </div>
                      </div>

                      <div class="row mt-15">
                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <h2 class="head_blue red_head">Allergies</h2>
                            <?php
                              $allergies = json_decode($popupdata->allergies);
							   $allergies = ((array)$allergies);
                            // /  dd($allergies);
                              ?>
                                     
                           

                               @if($popupdata->Is_allergies == "yes")      
                          
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
              
                        $past_medical_history = json_decode($popupdata->past_medical_history);
					    $past_medical_history = ((array)$past_medical_history);
								
                        ?>          
                                        @php
                                        $i = 0;
                                        @endphp
										@if(array_filter($past_medical_history))
											
                                    @foreach($past_medical_history as $key => $value)
								
                                     @php
                                    $i++;
                                    @endphp
								<p class="normal_txt">{{$value}}</p>
								
                              @endforeach
							  
							  @else
								   	<p class="txt_red normal_txt">None</p>  
							  @endif
                            
                            <h2 class="head_alernate">Past Surgical History</h2>
                            <?php
						$surgical_history = json_decode($popupdata->Surgeries1);
                      // dd($surgical_history);
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
                            <p class="normal_txt">Smoker: {{$popupdata->do_you_smoke}}</p>
                            <p class="normal_txt">Alcohol  : {{$popupdata->do_u_Alcohol}} </p>
                         </div>
                   
                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <h2 class="head_orange green_head">Current Medications</h2>
                       <?php
              
                        $currentmedication = json_decode($popupdata->Current_medication1);
                      // dd($currentmedication);
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
              
                        $family = json_decode($popupdata->family_medical_condition);
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
                             <!--  <h3 class="text-center">Presenting Complain:</h3> -->
                             
                           
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
         <a class="head_blue" style="margin-left: 2px; border-color:#F48148;  margin-top: 0px;" href="steps/{{$popupdata->user_id}}">EDIT</a>
        <!--   <a class="head_blue" style="margin-left: 50%; border-color:#F48148;  margin-top: 13%;" href="https://dripsmedical.com/portal/patient-dashboard/steps/{{$popupdata->user_id}}">EDIT</a>  -->
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



                     <!--        <h3>My Pending Consultations</h3>
                           <div class="table-responsive">
                                <table class="table" id="mytable">
                                    <thead>
                                        <th>Doctor ID</th>
                                        <th>Patient name</th>
                                        <th>Consultation Type</th>
                                        <th>Consultation Select Time</th>
                                        <th>Consultation select date Time</th>
                                        <th>Consultation Problem</th>
                                        <th></th>
                                    </thead>
                                    <tbody> -->
                                        
                                       @php
                                        $i = 0;
                                        
                                        @endphp
                                         @foreach($Complaint  as $value)
                                               @php
                                        $i++;
                                        
                                        @endphp
                                    <!--     <tr>
                                            <td><span>{{$i}}</span></td>
                                             <td><span>{{Auth::user()->name}}</span></td>
                                            <td class="online"><p>{{$value->booking_type}}</p></td>
                                            <td>{{$value->timing}}</td>
                                            <td >{{$value->date}}</td>
                                            <td >{{$value->problem}}</td>
                                            
                                           <td class="downloadsec">
                                              <button data-consultation_id="{{$value->id}}" class="viewbtn show_ecc_popup">VIEW</button>  -->
                                              <!--   <a href="{{route('profileconsultation', ['id' => $value->patient_id])}}" class="viewbtn">VIEW</a> -->


                                  <!--       </tr> -->
                               
                                        @endforeach
                                        
                         <!--            </tbody>
                                </table>
                            </div>
                        </div>  -->

                        <!-- <div class="billingsec">
                            <h3>Pending Payment</h3>
                           <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Doctor ID</th>
                                        <th>Doctor Name</th>
                                        <th>Consultation Type</th>
                                        <th>Consultation Select Time</th>
                                        <th>Consultation start Time</th>
                                        <th>Consultation End Time</th>
                                        <th>Complain Card</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>65481</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                            <td><a  class="Complainlist" data-toggle="modal" data-target="#myModal1">View</a></td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">View</a><a href="#">Cancel</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65482</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                             <td><a  class="Complainlist" data-toggle="modal" data-target="#myModal1">View</a></td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">View</a><a href="#">Cancel</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65483</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td><a  class="Complainlist" data-toggle="modal" data-target="#myModal1">View</a></td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">View</a><a href="#">Cancel</a></td>
                                        </tr>
                                       <tr>
                                            <td><span>65484</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td><a  class="Complainlist" data-toggle="modal" data-target="#myModal1">View</a></td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">View</a><a href="#">Cancel</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65485</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td><a  class="Complainlist" data-toggle="modal" data-target="#myModal1">View</a></td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">View</a><a href="#">Cancel</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->

        
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
</div><!-- /#wrapper -->

<!----Ecc--->
<div class="modal fade ecc_card_modal" id="ecc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="est_modal modal-body"></div>
          </div>
        </div>
      </div>
      <!-----EcC end--->


<!-- Modal -->
<div class="Complainsec">
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Electronic Complaint Card</h4>
      </div>
      <div class="modal-body">
         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="Complainimg">
                     <img src="{{asset($logo->img_path)}}" class="img-responsive" alt="img" style="margin: 0 auto;     width: 43%;">
                     <img src="{{asset($electronicCard->pic)}}" class="img-responsive" alt="img" style="margin: 0 auto;width: 20%;">
                 </div>
             </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="Complainlist">
                      <ul>
                          <li>Name*</li>
                          <li>DOB</li>
                          <li>Gender</li>
                         <li>Phone Number</li>
                          <li>Weight</li>
                          <li>height</li>
                          <li>Address</li>
                          <li>Medical Condition</li>
                          <li>Current medication</li>
                      </ul>
                      <ul>
                          <li><strong>{{$electronicCard->lname}}</strong></li>
                          <li><strong>{{$electronicCard->DOB}}</strong></li>
                          <li><strong>{{$electronicCard->Gender}}</strong></li>
                            <li><strong>{{$electronicCard->phone}}</strong></li>
                          <li><strong>{{$electronicCard->Weight}}</strong></li>
                          <li><strong>{{$electronicCard->height}}</strong></li>
                          <li><strong>{{$electronicCard->Address}}</strong></li>
                          <li><strong>{{$electronicCard->medical_condition}}</strong></li>
                        <li><strong><?=html_entity_decode(substr($electronicCard->Current_medication1))?></strong></li>
                      </ul>
                  </div>
              </div>
         </div>
         <!-- <div class="row">
             <div class="col-md-12 cols-m-12 col-xs-12">
                 <div class="Complainimg">
                     <img src="{{asset('images/complaint_6.jpg')}}" class="img-responsive" alt="img" style="width: 85%;">
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





</style>
@endsection

@section('js')
<script type="text/javascript">
  
$('#myModal1').on('show.bs.modal', function(e) {
    
    var doctor_id = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[name="id"]').val(id);
    var id = $('#id').val();
    $('#id').val(id);
});

 $(window).load(function(){        
   $('#openModal').modal('show');
    }); 

</script>


<!--   <script type="text/javascript">
  $(document).ready(function(){
        $(".btn").click(function(){
            $("#openModal").modal('show');
        });
    });


  </script> -->
@endsection
