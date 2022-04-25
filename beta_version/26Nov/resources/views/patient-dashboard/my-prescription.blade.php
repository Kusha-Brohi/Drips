@extends('layouts.patient-dashboard.main')
@section('content')

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
                        <div class="row" >
                            <div class="col-md-11 col-sm-11 col-xs-12">
                        <div class="billingsec">
                            <h3>My Prescriptions</h3>
                            
                            <div class="row paddingtop"  style="width: 97%;">
                            <div id="accordion" style="width: 100%;">
                                @foreach($myConsultations as $key=>$consult)
                                 
                                <?php $myprescription = DB::table('prescription')->where('consultation_id', $consult->id)->get(); 
                                      
                                         ?>

                                <div class="card">
                                  <div class="card-header">
                                   
                                    <a class="card-link" data-toggle="collapse" href="#collapseOne{{$key}}">

                                      Consultation#{{$consult->id}}<br>
                                      Problem: {{$consult->problem}}<br>
                                        <?php
                                        
                                      // dd($current_date);
                                 $date = date('j F, Y', strtotime($consult->date));
                                           // dd($date);
                                ?>
                                      @if($consult->date != '')
                                      Date: {{$date}}
                                       @else
                                             <td>On Demand</td>
                                            @endif
                                      @if(count($myprescription) == '')
                                     <a style="float: right;" class="btn btn-danger">No Prescription Available </a>
                                     @else
                                      <a href="{{route('pdfview', 
                                     ['id' => $consult->id,'download'=>'pdf','patient_id' => $consult->patient_id ,'doctor_id' => $consult->doctor_id]
                                     )}}" style="float: right;" class="btn btn-danger">DOWNLOAD </a>
                                    </a>
                                    @endif
                                  </div>
                                  <div id="collapseOne{{$key}}" class="collapse @if($key == 0) show @endif" data-parent="#accordion">
                                    <div class="card-body">
                                        @if(count($myprescription) != '')
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <th>Medication Name</th>
                                                    <th>Medication Dose</th>
                                                  
                                                    <th>Duration</th>
                                                    <th>file</th>
                                                    <!-- <th>Date</th> -->
                                  
                                                </thead>
                                                <tbody>
                                                    @foreach($myprescription as $value)
													
                                                    <tr>
                                                        <td>{{$value->medication_name}}</td>
                                                        <td>{{$value->medication_name2}}</td>
                                                      
                                                        <td>{{$value->duration}}</td>
                                                       
                                                         <td><a href="{{route('pdfview', 
                                     ['id' => $consult->id,'download'=>'pdf','patient_id' => $consult->patient_id ,'doctor_id' => $consult->doctor_id]
                                     )}}" download>DOWNLOAD </a></td>
                                                         
                                                        <!-- <td><a href="{{url('pdfview?download=pdf')}}">DOWNLOAD </a></td>-->
<!-- 
                                                  <td><a href="{{route('pdfview', ['id' => $value->id,'download'=>'pdf'])}}">DOWNLOAD </a></td> -->
                                                        <!-- <td class="date">{{$value->created_at}}</td> -->
                                                    @endforeach
                                                   </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                        <div class="row paddingtop">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <h4 id="not_available">No Prescription Available</h4>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                  </div>
                                </div>
                                @endforeach
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
</div><!-- /#wrapper -->


@endsection
@section('css')
<style>
/* accordion */
.card-header{
          display: block;
    width: 100%;
    font-size: 15px;
    font-weight: 500;
    color: #000;
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 5px 20px;
    background: #cbc9ca;
}

.card-header:hover{
    background: #005990;
    color: #fff;
}

.card-link{
    color: #000;
}
.card-link:hover{
    color: #fff;
}

.collapse{
    background-color: #fff;
}

#h5_style{
    font-size: 16px; 
    text-align: unset;
    margin-left: 15px;
}
 
.main_list li {
        list-style-type: square;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
}
.main_list{
    margin-top: 12px!important;
      margin-left: 36px;
      line-height: 29px;
}

.card{
margin-bottom: 4px;
}
/* accordion */

#not_available{
    color: #8c0001;
}


/*header*/
.navbar {
    position: fixed!important;
}
@media only screen and (max-width: 600px) {
.nav {
    display: inherit !important;
}
}
</style>
@endsection

@section('js')
<!-- /* accordion */ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- /* accordion */ -->

<script type="text/javascript"></script>
@endsection
