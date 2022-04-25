@extends('layouts.physician-dashboard.main')
@section('content')

<?php

$user_data = DB::table('users')->where('id',Auth::user()->id)->first();
$password_secure = $user_data->password_Is_secure;

?>
<style>

@media only screen and (max-width: 768px) {
   div.table-responsive>div.dataTables_wrapper>div.row {
    margin: 0;
    display: flex;
    width: 100%;
}
    
div#mytable_length {
    width: 50%;
}
div#mytable_filter {
    width: 50%;
}
}

</style>



<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
  @include('widgets.physicianSideBar')
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
                            <h3>All Consultations</h3>
                           <div class="table-responsive">
                                <table class="table" id="mytable">
                                    <thead>
                                        <th>S.No</th>
                                        <th>Patient Medical Record #</th>
                                        <th>Patient Name</th>
                                        <th>Consultation Type</th>
                                        <th>Consultation Date</th>
                                        <th>Consultation Time</th>
                                        <th>Presenting Complain</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 0;
                                        
                                        @endphp
									                      
                                         @foreach($complain  as $value)
                                         
                                                 <?php
                                        $patient_name = DB::table('patients')->where('user_id',$value->patient_id)->first();
                                    // dd($patient_name->pic);
                                        $pat_lname=$patient_name->lname;
                                  
                                        $pat_fname = $patient_name->fname;

                                        ?>
                                        @php
                                        $i++;
                                        
                                        @endphp

									             @if($value->payment_status == 'success')
                                        <tr>
                                          <td><span>{{$i}}</span></td>
                                            <td><span>DMS000{{$value->patient_id}}</span></td>
                                             <td><span>{{$value->name}}</span></td>
                                            <td class="online"><p>{{$value->booking_type}}</p></td>
                                            <?php
                                            $date = date('j F, Y', strtotime($value->date));
                                           // dd($date);
                                            ?>
                                            @if($value->date != '')
                                            <td >{{$date}}</td>
                                            @else
                                             <td>-</td>
                                            @endif
                                             <?php
                                            $newDateTime = date('h:i A', strtotime($value->timing));
                                           // dd($newDateTime);
                                            ?>
                                            @if($value->timing != '')
                                            <td>{{$newDateTime}}</td>
                                            @else
                                               <td>-</td>
                                               @endif
                                            <td >{{$value->problem}}</td>
                                    
<!-- <td class="downloadsec"><a data-consult_id="{{$value->id}}" data-patient_pic="public/{{$patient_name->pic}}" data-consult_name="{{$value->name}}" data-consult_gender="{{$value->gender}}"data-consult_date="{{$value->date}}"  data-consult_weight="Weight:{{$value->weight}}" data-consult_height="Height:{{$value->height}}"  data-consult_bmi="BMI:{{$value->bmi}}" data-consult_problem="{{$value->problem}}" data-patient_allergies="{{$patient_name->allergies}}" data-patient_blood_type="Blood Group:{{$patient_name->blood_type}}"data-patient_job_title="Job Title:{{$patient_name->job_title}}" data-patient_Surgeries1="{{$patient_name->Surgeries1}}" data-patient_Surgeries2="{{$patient_name->Surgeries2}}" data-patient_Surgeries3="{{$patient_name->Surgeries3}}" data-patient_Surgeries4="{{$patient_name->Surgeries4}}" data-past_medical_history="{{$patient_name->past_medical_history}}"data-past_condition2="{{$patient_name->past_condition2}}" data-past_condition3="{{$patient_name->past_condition3}}" data-past_condition4="{{$patient_name->past_condition4}}" data-do_you_smoke="Smoker:{{$patient_name->do_you_smoke}}" data-do_u_Alcohol="Alcohol:{{$patient_name->do_u_Alcohol}}"

  data-toggle="modal" data-target="#ecc_modal" class="viewbtn">VIEW</a> --> 
                                                 <!-- <button id="{{$value->id}}" onclick="alert(this.id)"></button> -->
                                                  <td class="downloadsec" >
                                                    <button  data-consultation_id="{{$value->id}}" class="viewbtn show_ecc_popup">VIEW</button> 
                                                <a href="{{route('profileconsultation', ['id' => $value->id])}}"   class="startbtn">START MEETING</a>
</td>
  

                                        </tr>
								                		@endif
                                        @endforeach
                                              
                                    </tbody>
                                </table>
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
</div><!-- /#wrapper -->
  

<div class="modal fade ecc_card_modal" id="ecc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" id="modal_border">
          <div class="modal-content">
            <div class="est_modal modal-body"></div>
          </div>
        </div>
      </div>

<!-- Modal -->
 <div class="Complainsec">
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="border">

    <!-- Modal content-->
 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Your Password</h4>
      </div>
      <div class="modal-body">
         
         <div class="row">
             <div class="col-md-12 cols-m-12 col-xs-12">
              <input type="hidden" name="password_secure" id="password_secure" value="{{$password_secure}}">
                 <div class="Complainimg">
                  <h3>Your password is not secure, click below to change your password.</h3>

                  <a href="{{url('physician-dashboard/changepassword')}}" class="btn btn-success">Change Password</a>
                  <button type="button" id="skip" class="btn btn-danger" data-dismiss="modal">Skip Now</button>
                 </div>
             </div>
             
            
         </div>
      </div>
     
    </div> 

  </div>
</div>
</div>  

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

button#skip {
    float: right;
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
    padding: 8px 10px !important;
    text-align: center;
    font-size: 17px !important;
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
    font-size: 20px;
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
    height: 500px;
    overflow-y: scroll;
}
.upld_img.text-center {
    width:60%;
    margin:30px auto 0;
}

/*.modal-dialog {*/
/*    width: 44%;*/
/*}*/
#border{
    border: none !important;
}

.ecc_card_modal #modal_border {
    height: auto;
}

</style>

@endsection

@section('js')
<script type="text/javascript">
  $( document ).ready(function() {
   var password_secure = $("#password_secure").val();
  //console.log(password_secure);
  if(password_secure == 'Yes'){
     $("#myModal1").modal('hide');
  }else{
    $("#myModal1").modal('show');
  }
 
});


    
</script>
@endsection
