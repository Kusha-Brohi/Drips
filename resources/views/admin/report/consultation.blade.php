@extends('layouts.app')



@push('before-css')


    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/ecc.css')}}" rel="stylesheet" type="text/css">


@endpush




@section('content')

    <div class="container-fluid bg-white mt-5">

        <!-- .row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box card">

                <div class="card-body">

                    <h3 class="box-title pull-left">Consultation</h3>

                    
<!-- 
                        <a class="btn btn-success pull-right" href="{{ url('/admin/doctor/create') }}"><i

                                    class="icon-plus"></i> Add Doctor</a> -->

                    

                    <div class="clearfix"></div>

                    <hr>

                   <div class="table-responsive">

                        <table class="table color-table table-bordered product-table table-hover dataTable no-footer" role="grid" aria-describedby="myTable_info" id="myTable">
                                <thead>
                                
                                 <tr class="text-center">
                                 
                                     <th>#</th>
                                     <th class="table_header">Appointment ID</th>
                                     <th>Patient ID</th>
                                     <th>Patient Name</th>
                                   <th>Patient Email</th> 
                                     <th>Patient Phone Number</th>
                                     <th>Doctor Request</th>
                                     <th>Problems</th>
                                     <th>ECC</th>
                                     <th>Date & time Requested</th>
                                    
                                     <th>Appointment Status</th>
                                     <th>Payment Status</th>
                                    
                            
                                
                                </tr>
                             
                                </thead>
                                <tbody>
                                    @php

                                    $i = 0;

                                    @endphp    
             @foreach($consultation as $value)
          <?php
            $patientdata = DB::table('patients')->where('user_id',$value->patient_id)->first();
            $doctordata = DB::table('profiles')->where('user_id',$value->doctor_id)->first();
            
            $data_pat_id = $value->patient_id;
            $appointment_id = $value->id;
            $space = "-";
            $appoint_code = 'AppointmentId:'."-";
            $type = "-" . 'Appointment';
            $appoint_id = $appoint_code . $appointment_id .$space .$data_pat_id .$type;
                  /* Appointment Status*/
             $currentDate = date('Y-m-d');
             $pastAppointment = DB::table('consultation')->where('id',$value->id)->where('date','<', $currentDate)->first();
             $UpcomingAppointment = DB::table('consultation')->where('id',$value->id)->where('date','>', $currentDate)->first();
             $InProgress = DB::table('consultation')->where('id',$value->id)->where('date','>=', $currentDate)->first();
   
            
                                        ?>
                                        @php
                                        $i++;
                                        @endphp
                                        <tr class="text-center">
                                        <td>{{$i}}</td>
                                        <td>{{$appoint_id}}</td>
                                    
                                       <td class="text-dark weight-600"> DMS-{{$value->patient_id}} <br>
                                     </td> 
                                     <td class="text-dark weight-600"> {{UCfirst($value->name)}} <br>
                                        
                                    </td> 
                                    <td class="text-dark weight-600"> 
                                    {{$patientdata->email}} 
                                    </td> 
                                    <td class="text-dark weight-600"> {{$patientdata->phone}} <br>
                                    </td>
                                     <td class="text-dark weight-600"> Dr.{{UCfirst($doctordata->name)}} <br>
                                    </td>
                                       
                                        <td class="text-dark weight-600"> {{$value->problem}} <br>
                                    </td>
                                        <td class="text-center">
                                           <button  data-consultation_id="{{$value->id}}" class="viewbtn show_ecc_popup">VIEW</button>
                                    </td> 
                                    <?php
                                    $date = date('j F, Y', strtotime($value->date));
                                    $time = date('h:i A', strtotime($value->timing));
                                           
                                    ?> 
                                   <td class="text-dark weight-600"> On {{$date}}<br>		 at {{$time}} <br>
                                    </td>     
                                    
                                   
                                  
                                       
                                    <td class="text-dark weight-600">
                                          @if($pastAppointment->status == "1")
                                          Expire<br>
                                         <button class="btn btn-danger">Past</button>  @elseif($pastAppointment->status == "0")
                                          Completed<br>
                                         <button class="btn btn-danger">Past</button> 
                                          @elseif($UpcomingAppointment->status == "1")
                                          Pending<br>
                                         <button class="btn btn-success"> Upcoming </button> 
                                          @elseif($InProgress->status == "1")
                                          In-progress<br>
                                        <button class="btn btn-info">  In Progress </button> 
                                          @else

                                          @endif
                                        <br>

                                    </td>

                                    <td class="text-dark weight-600">
                                             @if($value->payment_status == "success") 
                                            <p class="text-success">  Paid </p> 
                                            @elseif($value->payment_status == "fail") 
                                           <p class="text-danger">  fail </p> 
                                           @else
                                            <p class="text-primary"> Un-Paid </p>
                                               @endif
                                        <br>

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

    <div class="modal fade ecc_card_modal" id="ecc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" id="modal_border">
          <div class="modal-content">
            <div class="est_modal modal-body"></div>
          </div>
        </div>
      </div>

@endsection
<style type="text/css">
    .table_header{
        width: 40%;
    }
</style>
@push('js')
    

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>



    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>

  <!--   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        
    $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
      buttons: [
        { extend: 'excelHtml5'},
        { extend : 'pdfHtml5',
        title : function() { return "Drip List";},
        orientation : 'landscape',
        pageSize : 'LEGAL',
        text : 'PDF',
        titleAttr : 'PDF'
            }
            ]
            } );
            } );
         </script>

    <script type="text/javascript">
    $(".show_ecc_popup").click(function(){
        var consultation_id = $(this).attr('data-consultation_id');

        $.ajax({
            url: "{{url('admin_call_ecc_popup')}}",
            type: "POST",
            cache: false,
            dataType : 'json',
            data:{
                _token:'{{ csrf_token() }}',
                consultation_id : consultation_id,
            },
            success: function(dataResult){
                if(dataResult.status) {
                    $(".modal-body").html(dataResult.html);
                    $("#ecc_modal").modal();
                }
            }
        });
    });
</script>




@endpush