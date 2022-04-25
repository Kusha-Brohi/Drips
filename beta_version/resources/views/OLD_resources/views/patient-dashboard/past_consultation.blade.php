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
                        <div class="row">
                            <div class="col-md-11 col-sm-11 col-xs-12">
                        <div class="billingsec">
                            <h3>Scheduled Consultation</h3>
                           <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Doctor ID</th>
                                        <th>Doctor Name</th>
                                        <th>Consultation Type</th>
                                        <th>Consultation Time</th>
                                        <th>Consultation Date</th>
                                       
                                        <th></th>
                                    </thead>
                                    <tbody>
                                            @foreach($consultation as $value)
                                            <?php
                                            $doc_name =DB::table('users')->where('id',$value->doctor_id)->first();
                                            $doctor_name=$doc_name->name;
                                            ?>
                                        <tr>
                                            <td><span>{{$value->doctor_id}}</span></td>
                                            <td>{{$doctor_name}}</td>
                                            <td class="online"><p>{{$value->booking_type}}</p></td>
                                            <td>{{$value->timing}}</td>
                                            <td class="date">{{$value->date}}</td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">View</a><a href="{{route('SheduledConsultation', ['id' => $value->id])}}">Cancel</a></td>
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


@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection



