@extends('layouts.main')
@section('content')
      
      <!-- ECC HTML STRT -->
      
      <!-- ECC HTML END -->

            <!-- Modal -->
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
                            		  <img src="{{asset('images/logo.png')}}" class="img-responsive" alt="">
                            	</div>
                            
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="ecc_card_wrap">
                               <h2 class="head_blue">Electronic Complain Card</h2>
                            </div>
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
                      <div class="row">
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_pic">
                               <figure>
                                  <img src="{{asset('images/patientProfile.png')}}" class="img-responsive" alt="">
                               </figure>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                 {{$pat_data['name']}}
                                 
                               </h4>

                               <h4>
                                  {{$pat_data['date']}}
                               </h4>

                               <h4>
                                  Male
                               </h4>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Height:{{$pat_data['height']}}
                               </h4>

                               <h4>
                                  Weight: {{$pat_data['weight']}}kg
                               </h4>

                               <h4>
                                  BMI: 28
                               </h4>
                            </div>
                         </div>
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Blood Group: A+
                               </h4>

                               <h4>
                                  Job Title: Banker
                               </h4>
                            </div>
                         </div>
                      </div>

                      <div class="row mt-5">
                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <h2 class="head_blue">Allergies</h2>
                            <p class="txt_red normal_txt">Ciprofloxacin</p>

                             <h2 class="head_blue">Past Medical History</h2>
                            <p class="normal_txt">Hypertention</p>
                            <p class="normal_txt">Asthma</p>

                            <h2 class="head_alernate">Past Surgical History</h2>
                            <p class="normal_txt">Appendectomy</p>
                            <p class="normal_txt">Carpal Tunnel Surgery</p>

                            <h2 class="head_blue">Social History</h2>
                            <p class="normal_txt">Non- Smoker</p>
                            <p class="normal_txt">Alcohol +: 1 Beer weekly </p>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <h2 class="head_orange">Current Medications</h2>
                            <p class="txt_green normal_txt">Lisinopril</p>
                            <p class="txt_green normal_txt">Hydrochlorothiazide</p>
                            <div class="pres_complain">
                              <h3 class="text-center">Presenting Complain:</h3>
                              <form action="#">
                                  <p>
                                    <input type="checkbox" id="test1" checked>
                                    <label for="test1">Fever</label>
                                  </p>
                                  <p>
                                    <input type="checkbox" id="test2">
                                    <label for="test2">Headache</label>
                                  </p>
                                  <p>
                                    <input type="checkbox" id="test3">
                                    <label for="test3">Vomiting</label>
                                  </p>
                                </form>
                                <div class="upld_img text-center">
                                     <div class="uplod_imag">
                                       <img src="{{asset('images/cloud-computing.png')}}" alt="Image">
                                       <input type="file" name="file_upload">
                                     </div>
                                     <h4>Media File Here</h4>
                                </div>
                            </div>
                         </div>
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
      @endsection
@section('css')
<style>
.logo{

    padding-bottom: 21px;
    padding-top: 10px;
    padding-left: 333px;
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
    border: 8px solid;
    border-radius: 2px;
    border-color: #0076c0;
    }
</style>
@endsection

@section('js')
   <!-- Modal -->
        <script type="text/javascript">
          $(window).on('load', function() {
              $('#ecc_modal').modal('show');
          });
        </script>


      <script>
         $(document).ready(function () {
         
                             
                
                
                
            })
         
      </script>        

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
         if($('#mytable').length > 0)
             $('#mytable').DataTable();
         } );
      </script>
   



@endsection
  