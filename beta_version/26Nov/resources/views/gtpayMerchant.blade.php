@extends('layouts.patient-dashboard.main')
@section('content')
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
@include('widgets.patientSideBar')
<?php
//customer code///
$ecc_ammount = DB::table('eccs')->first();
$price_of_ecc = $ecc_ammount->Ecc_price;

$data_pat_id= $data->patient_id;
$Ecc_charges = $price_of_ecc * 100;
$new_appointment = 100;
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
//dd($data_pat_id);
$patient_code = DMS000."-";
$gtpay_cust_id = $patient_code . $data_pat_id;
/*dd($gtpay_cust_id);*/
   
  $return_url = url('notification.php');
// dd($return_url);
	$gtpay_mert_id = 824;
 // $gtpay_mert_id = 824;//"14471";
  $appointment_id = $data->id;
 // dd($appointment_id);
  $appoint_code = 'AppointmentId:'.rand(0,9999)."-";
  $gtpay_tranx_id = $appoint_code . $appointment_id;
  //dd($gtpay_tranx_id);
  $gtpay_tranx_amt = $charges;
  $gtpay_tranx_curr = "566";//"844";
  $gtpay_cust_id = $gtpay_cust_id;

  // Live
	//$key = 'B5FB033E46B017ECAEDDB8C89B8E7D72A92F3C53B9059D80C3FA6A8F9D1D138F1BC6110CFC2F6E5194EE02B2F7FBC14B2DF0DD5364E833AC53AC70D52ED60391';
 $key = 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F';
  // Sandbox
  //$key = 'B55D1356D04B814A5EBF39D95B6CAAD812021787ADC762C19F7FE6F247AA787DB1B108E8278500F70ADCCEEBA5B06EE55F77E173A183452B6C188679428D2053';
  

  $gtpay_hash=trim($gtpay_mert_id.$gtpay_tranx_id.$gtpay_tranx_amt.$gtpay_tranx_curr.$gtpay_cust_id.$return_url.$key);
//	$gtpay_hash=trim($gtpay_mert_id.$gtpay_tranx_id.$key);
  //$gtpay_hash = $key;
  $gtpay_hash = $hashed = hash('sha512', $gtpay_hash,false);

  //$url = 'https://ibank.gtbank.com/GTPay/Tranx.aspx'; // OLD URL
  $url = 'https://gtweb.gtbank.com//GTPay/Tranx.aspx'; // NEW
  
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
<form name="submit2gtpay_form" action="<?=$url?>" target="_self" method="POST">
  @csrf
<!--  <input type="hidden" name="hashkey" value="">-->
<input type="hidden" name="gtpay_mert_id" value="<?=$gtpay_mert_id?>" />
<input type="hidden" name="gtpay_tranx_id" value="<?=$gtpay_tranx_id?>" />
<input type="hidden" name="gtpay_tranx_amt" value="<?=$gtpay_tranx_amt?>" />
<input type="hidden" name="gtpay_tranx_curr" value="<?=$gtpay_tranx_curr?>" />
<input type="hidden" name="gtpay_cust_id" value="<?=$gtpay_cust_id?>" />
<input type="hidden" name="gtpay_cust_name" value="{{$data->name}}" />
<input type="hidden" name="gtpay_tranx_memo" value="Mobow" />
<input type="hidden" name="gtpay_no_show_gtbank" value="YES" />
<input type="hidden" name="gtpay_echo_data" value="TEST" />
<input type="hidden" name="gtpay_gway_name" value="" />
<input type="hidden" name="gtpay_hash" value="<?php echo trim($hashed); ?>" />
<input type="hidden" name="gtpay_tranx_noti_url"   value="<?=$return_url?>" />
<!-- <input type="submit" value="Pay Via GTPay" name="btnSubmit"/> -->
<input type="hidden" name="gtpay_echo_data" value="">
            <input type="hidden" name="doctor_id" id="{{$data->doctor_id}}" >
            <input type="hidden" name="id" id="{{$data->id}}" >

               <input type="hidden" name="patient_id" id="patient_id" value="{{Auth::user()->id}}"> 
                      <div class="row">
                         <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
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

                         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="client_main_info">
                               <h4>
                               Name: {{$doc_data->name}}
                                 
                               </h4>

                               <h4>
                                 Email: {{$doc_data->email}}
                               </h4>
                                @if($doc_data->phone == '')
                               <h4>
                                  Phone:N/A
                               </h4>
                               @else<h4>
                                  Phone:{{$doc_data->phone}}
                               </h4>
                               @endif
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">

                               <h4>
                                @if($doc_data->gender == '')
                                  Gender: N/A 
                                  @else
                                  Gender:{{$doc_data->gender}}
                                  @endif
                               </h4>

                               <h4>
                                @if($doc_data->language == '')
                                  Language: N/A 
                                  @else
                                  Language: {{$doc_data->language}}
                                  @endif
                               </h4>

                               <h4>
                                  MDCN: {{$doc_data->MDCN}}
                               </h4>
                            </div>
                         </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Charges: ₦{{$doc_data->price}}
                               </h4>

                               @if($patient_table->ecc_payment == 1)
                                <h4>
                                  Ecc Charges: Paid
                               </h4>
                               @else
                                <h4>
                                  Ecc Charges: ₦{{$price_of_ecc}} <!--${{$price_of_ecc}}-->
                                  
                               </h4>
                               @endif

                               @if($patient_table->first_appointment == 1)
                                <h4>
                                  First Appointment charges: Paid
                               </h4>
                               @else
                                <h4>
                                  First Appointment charges: ₦{{$new_appointment}}
                               </h4>
                               @endif

                          
                                  <input type="submit" class="head_alernate" value="Pay Now" id="btnSub" name="btnSubmit"/>
                              
                            </div>
                         </div> 
                      </div>
                      
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

margin-left: 5%;
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
	
</script>
@endsection


