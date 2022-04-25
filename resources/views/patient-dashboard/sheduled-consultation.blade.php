@extends('layouts.patient-dashboard.main')
@section('content')
<?php
$loginAsAdmin = Session::get('admin');
/*dd($loginAsAdmin);*/
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
                            <div class="col-md-11 col-sm-11 col-xs-12">
                        <div class="billingsec">
                            <h3>Scheduled Consultation</h3>
                           <div class="table-responsive">
                                <table class="table" id="mytable">
                                    <thead>
                                        <th>S.No</th>
                                        <th>Doctor Name</th>
                                        <th>Consultation Type</th>
                                        <th>Consultation Time</th>
                                        <th>Consultation Date</th>
                                        <th>Paid/Unpaid Appointments</th>
                                       
                                        <th></th>
                                    </thead>

                                    <tbody>
                                         @php
                                        $i = 0;
                                        
                                        @endphp
                                            @foreach($consultation as $value)
                                        
                                            <?php
                                            $doc_name =DB::table('users')->where('id',$value->doctor_id)->first();
                                            $doctor_name=$doc_name->name;
                                            ?>
                                              @php
                                        $i++;
                                        
                                        @endphp
                                        <tr>
                                            <td><span>{{$i}}</span></td>
                                            <td>{{$doctor_name}}</td>
                                                <td class="online"><p>{{$value->booking_type}}</p></td>
                                                @if($value->booking_type == Scheduled)
                                        
                                            <?php
                                            $newDateTime = date('h:i A', strtotime($value->timing));
                                           // dd($newDateTime);
                                            ?>
                                            <td>{{$newDateTime}}</td>
                                            <?php
                                            $date = date('j F, Y', strtotime($value->date));
                                           // dd($date);
                                            ?>
                                            <td class="date">{{$date}}</td>
                                            @else
                                             <td>-</td>
                                                <td class="date">-</td>
                                            @endif

                                            @if($value->payment_status == success)
                                            <td>Paid</td>
                                            @else
                                             <td>Unpaid</td>

                                            @endif
                                            <td class="downloadsec">
                                                 @if($value->payment_status != success)
                                                <a href="{{route('Unpaid', ['id' => $value->id])}}" class="viewbtn">Pay Now</a>
                                                @else
                                                <a href="javascript:void(0)" class="alredybtn"> Already Paid</a>
                                                @endif
                                                <button  id="btn" data-consultation_id="{{$value->id}}" class="viewbtn show_ecc_popup">View</button> 
                                      
                                               <a href="{{route('patient_profile_consultation', ['id' => $value->id])}}" class="viewbtn">Consultation</a>
                                            
                                         
                                                @if($value->payment_status != success)
                                                <a href="{{route('SheduledConsultation', ['id' => $value->id])}}">Cancel</a>
                                                @else
                                                 <a href="javascript:void(0)">Cancel</a>
                                                @endif
                                                    @if($loginAsAdmin == 1)
                                                <a href="{{route('DeleteConsultation', ['id' => $value->id])}}"  class="viewbtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                @endif

                                            </td>
                                        </tr>
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
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="est_modal modal-body"></div>
          </div>
        </div>
      </div>
@endsection
@section('css')
<style>
.viewbtn{
    border: 0px;
    margin: 0px 8px;
    background-color: #00599054 !important;
    color: #005990 !important;
}
.alredybtn{
    border: 0px;
    margin: 0px 8px;
    background-color: #fff !important;
    color: #4cae4c !important;
}

<style>
.ecc_card_wrap .logo img {
    padding: 0px 50px;
    margin: auto;
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
    font-size: 20px;
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
</style>
</style>
@endsection
@section('js')
<script type="text/javascript"></script>
@endsection
