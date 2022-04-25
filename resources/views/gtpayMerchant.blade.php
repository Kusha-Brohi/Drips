@extends('layouts.patient-dashboard.main')
@section('content')
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
@include('widgets.patientSideBar')
<script src="https://webpay-ui.k8.isw.la/inline-checkout.js"></script>
<?php

//$endpoint = 'https://webpay-ui.k8.isw.la/collections/w/pay'; // Sandbox
   $endpoint = 'https://newwebpay.interswitchng.com/collections/w/pay'; // live
 
//customer code///
$ecc_ammount = DB::table('eccs')->first();
$price_of_ecc = $ecc_ammount->Ecc_price;

$data_pat_id= $data->patient_id;
$Ecc_charges = $price_of_ecc * 100;
$new_appointment = 0;
$first_appointment = $new_appointment * 100;

  ///////////Ecc charges table///////////////////
  $patient_table = DB::table('patients')->where('user_id', $data_pat_id)->first();
  if(($patient_table->ecc_payment == 1) and ($patient_table->first_appointment == 0)) {
      $doc_price = $doc_data->price;
      $test = $doc_price * 100 ;
      $charges = $test + $first_appointment;
    //  dd($charges);
    }
    if(($patient_table->ecc_payment == 0) and ($patient_table->first_appointment == 0)) {
      $doc_price = $doc_data->price;
      $test = $doc_price * 100 ;
      $charges = $test + $Ecc_charges + $first_appointment;
    //  dd($charges);
    }
    if(($patient_table->ecc_payment == 1) and ($patient_table->first_appointment == 1)) {
      $doc_price = $doc_data->price;
        $charges = $doc_price * 100 ;
    // dd($charges);
    }
	//$merchant_code = 'MX15510'; //'MX21696'; //sandbox
	//$pay_item_id = 'Default_Payable_MX15510';//'Default_Payable_MX21696'; //sandbox
	$merchant_code = 'MX46954';
	$pay_item_id = 'Default_Payable_MX46954';
  $appointment_id = $data->id;
  $space = "-";
  $appoint_code = 'AppointmentId:'.rand(0,9999)."-";
  $type = "-" . 'Appointment';
  $txn_ref = $appoint_code . $appointment_id .$space .$data_pat_id .$type;

  $amount = $charges;
  $currency = "566";//"844";
  $site_redirect_url = url('notification.php');

?>
<br />
<section class="ecc_sec">
                   <!-- <div class="container"> -->
                        <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="ecc_card_wrap">
                              <div class="logo">
                                  <img src="{{asset($logo->img_path)}}" style="width:30%; margin-left: 29%;" class="img-responsive" alt="">
                              </div>
                            
                            </div>
                         </div>
                      </div>
        
                      <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="ecc_card_wrap">
                               <h2 class="head_blue">Doctor Profile</h2>
                            </div>
                         </div>
                      </div>
<form method='post' action='<?=$endpoint?>'>
  @csrf
<!--  <input type="hidden" name="hashkey" value="">-->
 <input type='hidden' name='merchant_code' value='<?=$merchant_code?>' />
    <input type='hidden' name='pay_item_id' value='<?=$pay_item_id?>' />
    <input type='hidden' name='site_redirect_url' value='<?=$site_redirect_url?>' /> 
    <input type='hidden' name='txn_ref' value='<?=$txn_ref?>' />
    <input type='hidden' name='amount' value='<?=$amount?>' />
    <input type='hidden' name='currency' value='<?=$currency?>' />
	
            <input type="hidden" name="doctor_id" id="{{$data->doctor_id}}" >
            <input type="hidden" name="id" id="{{$data->id}}" >

               <input type="hidden" name="patient_id" id="patient_id" value="{{Auth::user()->id}}"> 
                      <div class="row">
                         <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                             <br>
                            <div class="client_pic" >
                                @if($doc_data->pic == '')
                                 <figure>
                                  <img src="{{asset('images/no_image.jpg')}}" class="img-responsive" alt="" style="width: 50%">
                               </figure>
                                @else

                              
                               <figure>
                                  <img src="{{asset($doc_data->pic)}}" class="img-responsive" alt="" style="width: 50%">
                               </figure>
                               @endif
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                             <br>
							<?php
							$Speciality = DB::table('specialities')->where('id',$doc_data->Speciality)->first();
							
							?>
                               <h4>
                               Name: {{UCfirst($doc_data->name)}}
                                 
                               </h4>

                               <h4>
                                 Medical School: {{UCfirst($doc_data->medical_school)}}
                               </h4>
                                @if($doc_data->residency == '')
                               <h4>
                                  Residency:N/A
                               </h4>
                               @else<h4>
                                  Residency:{{$doc_data->residency}}
                               </h4>
                               @endif
							   
							   <h4>
							   Speciality:{{UCfirst($Speciality->name)}}
							   </h4>
                            </div>
                         </div>

                         <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <div class="client_main_info">
                                <br>
                               <h4>
                                @if($doc_data->gender == '')
                                  Gender: N/A 
                                  @else
                                  Gender:{{UCfirst($doc_data->gender)}}
                                  @endif
                               </h4>

                               <h4>
                                @if($doc_data->language == '')
                                  Language: N/A 
                                  @else
                                  Language: {{UCfirst($doc_data->language)}}
                                  @endif
                               </h4>

                               <h4>
                                  MDCN: {{$doc_data->MDCN}}
                               </h4>
                            </div>
                         </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="client_main_info">
                            
                                <h3>Payment Information</h3>
                               @if($patient_table->ecc_payment == 1)
                                <h4>
                                  Ecc Charges: ₦{{$price_of_ecc}} <span class="text-success">(Paid)</span>
                               </h4>
                               @else
                                <h4>
                                  Ecc Charges: ₦{{$price_of_ecc}} <span class="text-danger">(Un-Paid) </span><!--${{$price_of_ecc}}-->
                                  
                               </h4>
                               @endif
								<h4>
                                 Appointment Payment Status : <span class="text-danger">Un-Paid</span><!-- ₦{{$doc_data->price}} -->
                               </h4>
                               @if($patient_table->first_appointment == 1)
                               <!-- <h4>
                                  First Appointment charges: Paid
                               </h4>-->
                               @else
                              <!--  <h4>
                                  First Appointment charges: ₦{{$new_appointment}}
                               </h4>-->
                               @endif

                            </div>
                         </div> 
                      </div>	
					 
					  @if($patient_table->ecc_payment == 0)
                      <input type="submit" class="head_alernate" value="Pay Now (₦{{$doc_data->price +  $price_of_ecc }})" id="btnSub" name="btnSubmit"/>
						@else
							 <input type="submit" class="head_alernate" value="Pay Now (₦{{$doc_data->price}})" id="btnSub" name="btnSubmit"/>
						@endif
                    </form>
                   <!-- </div> -->
                </section>

@endsection
@section('css')
<style type="text/css">
.ecc_sec {
    padding: 104px 121px 100px 115px;
}	

#btnSub{

margin-left: 62%;
margin-top: 5%;
background-color: #f48147;
color: #fff;
 font-weight: 600;
padding: 5px;
text-align: center;
font-size: 20px;
border-color: #F48148;
}
</style>
@endsection
@section('js')

<script type="text/javascript">
	  //declare callback function
function paymentCallback(response) {
    console.log(response);
}

//sample payment request
var samplePaymentRequest = {
    merchant_code: "<?=$merchant_code?>",          
    pay_item_id: "<?=$pay_item_id?>",
    txn_ref: "<?=$txn_ref?>",
    amount: <?=$amount?>, 
    currency: <?=$currency?>, // ISO 4217 numeric code of the currency used
    onComplete: paymentCallback,
    mode: 'TEST',
    site_redirect_url:'<?=$site_redirect_url?>'
};

//call webpayCheckout to initiate the payment
//window.webpayCheckout(samplePaymentRequest);
</script>
@endsection


