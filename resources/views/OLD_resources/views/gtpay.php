@extends('layouts.patient-dashboard.main')
@section('content')
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
@include('widgets.patientSideBar')
<?php
$code = 12345;
$transaction_id = $data->id;
$transaction = $transaction_id . $code;
/*dd($transaction);*/
//customer code///
$data_pat_id= $data->patient_id;
$patient_code = DMS000;
$gtpay_cust_id = $patient_code . $data_pat_id;
//price////
$doc_price = $doc_data->price;
$charges = $doc_price * 100; 
 $the_key = trim('14471'.$transaction.$charges.'844'.$gtpay_cust_id.'./'.'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F');
//dd($the_key);
$key = hash('sha512',$the_key,false);
//dd($key);
?>


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
<form name="submit2gtpay_form" action="https://ibank.gtbank.com/GTPay/Tranx.aspx" target="_self" method="post">


                      <!--  <input type="hidden" name="hashkey" value="">-->
<input type="hidden" name="gtpay_mert_id" value="14471" />
<input type="hidden" name="gtpay_tranx_id" value="{{$transaction}}" />
<input type="hidden" name="gtpay_tranx_amt" value="{{$charges}}" />
<input type="hidden" name="gtpay_tranx_curr" value="844" />
<input type="hidden" name="gtpay_cust_id" value="{{$gtpay_cust_id}}" />
<input type="hidden" name="gtpay_cust_name" value="{{$data->name}}" />
<input type="hidden" name="gtpay_tranx_memo" value="Mobow" />
<input type="hidden" name="gtpay_no_show_gtbank" value="YES" />
<input type="hidden" name="gtpay_echo_data" value="TEST" />
<input type="hidden" name="gtpay_gway_name" value="" />
<input type="hidden" name="gtpay_hash" value="<?php echo trim($key); ?>" />
<input type="hidden" name="gtpay_tranx_noti_url"   value="./" />
<input type="hidden" name="gtpay_echo_data" value="">

            <input type="hidden" name="doctor_id" id="doctor_id" > 

               <input type="hidden" name="patient_id" id="patient_id" value="{{Auth::user()->id}}"> 
                      <div class="row">
                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_pic" >
                               <figure>
                                  <img src="{{asset($doc_data->pic)}}" class="img-responsive" alt="" style="width: 50%">
                               </figure>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                {{$doc_data->name}}
                                 
                               </h4>

                               <h4>
                                  {{$doc_data->email}}
                               </h4>

                               <h4>
                                  {{$doc_data->phone}}
                               </h4>
                            </div>
                         </div>

                         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Gender:{{$doc_data->gender}}
                               </h4>

                               <h4>
                                  Language: {{$doc_data->language}}
                               </h4>

                               <h4>
                                  MDCN: {{$doc_data->MDCN}}
                               </h4>
                            </div>
                         </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="client_main_info">
                               <h4>
                                  Charges: ${{$doc_data->price}}
                               </h4>

                          
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
