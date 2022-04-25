@extends('layouts.physician-dashboard.main')
@section('content')
<?php

$user_data = DB::table('users')->where('id',Auth::user()->id)->first();
$password_secure = $user_data->password_Is_secure;

?>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    @include('widgets.physicianSideBar')

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
                            <h3>Past Consultations</h3>
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
                                        @foreach($request as $value)
                                         @php
                                        $i++;
                                        
                                        @endphp
                                        <?php
                                        $patient_name = DB::table('patients')->where('user_id',$value->patient_id)->first();
                                        $pat_name=$patient_name->lname;
                                        ?>
                                        @if($value->Is_accept == 'pending')
                                        <tr>
                                            <td><span>{{$i}}</span></td>
                                            <td><span>DMS000{{$value->patient_id}}</span></td>
                                            <td><span>{{$pat_name}}</span></td>
										
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
                                          
                                            <td class="downloadsec">
                                                <a href="{{route('profileconsultation', ['id' => $value->id, 'status' => 'end'])}}" class="viewbtn">VIEW</a>
                                                <!-- <a href="javascript:void()" class="startbtn">ACCEPT</a> -->

                                            <!-- <a  href="javascript:void()"  onclick="window.location.href='{{ route('request.Status',[($value->id),'0']) }}'">REJECT</a> -->
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
    padding: 8px 10px;
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
}
.upld_img.text-center {
    width:60%;
    margin:30px auto 0;
}

.modal-dialog {
    width: 44%;

}

#border{
    border: none !important;
}

</style>

@endsection

@section('js')

    <script type="text/javascript">
  $( document ).ready(function() {
   var password_secure = $("#password_secure").val();
 // console.log(password_secure);
  if(password_secure == 'Yes'){
     $("#myModal1").modal('hide');
  }else{
    $("#myModal1").modal('show');
  }
 
});


    
</script>



@endsection
