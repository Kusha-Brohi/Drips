<?php
$speciality = DB::table('specialities')->get();

$user_data = DB::table('users')->where('id',Auth::user()->id)->first();
$password_secure = $user_data->password_Is_secure;

?>

@extends('layouts.physician-dashboard.main')
@section('content')
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
                            <div class="col-md-7 col-sm-7 col-xs-12">

                        <div class="billingsec">

                            <ul class="">
  <li class="active"><a data-toggle="tab" href="#home">Profile Setting</a></li>
<!--   <li><a data-toggle="tab" href="#menu1">Billing</a></li> -->
  
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
      <div class="profilebox1">
                  <form  action="{{route('submitProfile')}}" method="post" enctype="multipart/form-data">
                  @csrf

                              @if(Auth::user()->profile->pic== null)
                                   
                            <img src="{{asset('images/no_image.jpg')}}" class="img-responsive profilepic" alt="img" style="width: 18%;">
                            <br>
                            <br>
                         
                            @else
                      
                            <img src="{{asset(Auth::user()->profile->pic)}}" class="img-responsive profilepic" alt="img" style="width: 18%;">
                            <br>
                            <br> 
                            @endif
                                 
     <h4>{{Auth::user()->profile->name}}</h4>
           <!-- <input type="file" name="pic">-->
          </div>
    <div class="clearfix"></div>
                         
      <div class="row">
       <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="billinglist profilelist1">
         <label>Name</label>
           <input type="text" name="name" placeholder="Mark Manson" value="{{Auth::user()->profile->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                            <label>Date of Birth</label>
                                            <input type="Date"  name="DOB" placeholder="" max="{{date("Y-m-d")}}" value="{{Auth::user()->profile->DOB}}">
                                        </div>
                                    </div>
                                     
                                     
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                            <label>Speciality</label>
											<?php
												$expertise = Auth::user()->profile->Speciality;
												//dd($expertise);

											?>       
                                         <select class="js-states browser-default select2" disabled="true" name="expertise" >
                                             <!--<option value="{{Auth::user()->profile->expertise}}" disabled selected>Select Your Speciality </option>-->
											
											                  @foreach($speciality as $value)
                                             <?php 
                                            if($expertise == $value->id){

                                              $selected = "selected";
                                          
                                            }
                                            else{
                                              $selected = '';
                                              
                                          }
                                          ?>
												
                                            <option value="{{$value->id}}" {{$selected}}> {{$value->name}}</option>


                                              @endforeach
											 
                                            </select>
                                     <!--  <input type="text" name="expertise" placeholder="" value="{{Auth::user()->profile->expertise}}">-->
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                     <div class="billinglist profilelist1">
                                            <label>Phone</label>
                                               <input type="number" name="phone" placeholder="888-888-8888" value="{{Auth::user()->profile->phone}}">
                                           </div>    
                                    </div>
                                </div>
                              <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12">

                                      <div class="billinglist profilelist1">
                                            <label>Email Address</label>
                                               <input type="email" name="email" value="{{Auth::user()->email}}">
                                           </div>
                                       </div> 
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                     <div class="billinglist profilelist1">
                                          <label>Language</label>
                                       <!--    <select name="language">
                                            <option  disabled selected>Select language </option>
                                            @if(Auth::user()->profile->language == "Any")
                                              <option value="Any" selected="">Any</option>
                                                @else
                                               <option value="Any" >Any</option>
                                               @endif
                                             @if(Auth::user()->profile->language == "english")
                                              <option value="english" selected="">English</option>
                                              @else
                                              <option value="english">English</option>
                                              @endif
                                                @if(Auth::user()->profile->language == "spainish")
                                              <option value="spainish" selected="">Spanish</option>
                                              @else
                                                <option value="spainish">Spanish</option>
                                                @endif
                                                @if(Auth::user()->profile->language == "chinese")
                                              <option value="chinese" selected="">Chinese</option>
                                              @else
                                              <option value="chinese">Chinese</option>
                                              @endif
                                                 @if(Auth::user()->profile->language == "French")
                                              <option value="french" selected=>French </option>
                                              @else
                                               <option value="french">French </option>
                                               @endif
                                                 @if(Auth::user()->profile->language == "urdu")
                                              <option value="urdu" selected="">Urdu</option>
                                              @else
                                                <option value="urdu">Urdu</option>
                                                @endif
                                                @if(Auth::user()->profile->language == "korean")
                                              <option value="korean" selected="">Korean </option>
                                              @else
                                                <option value="korean">Korean </option>
                                                @endif
                                            </select>-->
                                        <input type="text" name="language" placeholder="Language" value="{{Auth::user()->profile->language}}"> 
                                           </div>    
                                    </div>
                 
                                </div> 

                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                            <label>Gender</label>
                                            <select name="gender">
                                                <option  disabled selected>Select Gender </option>
                                                @if(Auth::user()->profile->gender == "Any")
                                              <option value="Any" selected="">Any</option>
                                              @else
                                              <option value="Any">Any</option>
                                              @endif
                                               @if(Auth::user()->profile->gender == "male")
                                              <option value="male" selected="">Male</option>
                                              @else
                                              <option value="male">Male</option>
                                              @endif
                                               @if(Auth::user()->profile->gender == "female")
                                              <option value="female" selected>Female</option>
                                              @else
                                              <option value="female">Female</option>
                                              @endif
                                            </select>
                                           <!--  <input type="text" name="gender" placeholder="Gender" value="{{Auth::user()->profile->gender}}"> -->
                                        </div>
                                    </div>
                                    
                                         <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                                 <label>Fee (₦ - Nigerian Naira)</label>
                                               <input type="text" name="price" placeholder="$100" value="{{Auth::user()->profile->price}}" readonly="">
                                            </div>
                                    </div>

                                </div>
                                  <div class="row">
                                 
                                    
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="billinglist profilelist1">
                                                 <label>Residency</label>
                                               <input type="text" name="residency"  value="{{Auth::user()->profile->residency}}" readonly="">
                                            </div>
                                    </div>
                                    

                                </div>
                                <div class="row">
                                 
                                    
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="billinglist profilelist1">
                                                 <label>Medical School</label>
                                               <input type="text" name="medical_school"  value="{{Auth::user()->profile->medical_school}}" readonly="">
                                            </div>
                                    </div>
                                    

                                </div>

                                <div class="row">
                                   
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="billinglist profilelist1">
                                                 <label>MDCN</label>
                                               <input type="text" name="MDCN" value="{{Auth::user()->profile->MDCN}}" readonly="">
                                            </div>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                          <div class="rigistertionlist1">
                                              <!--<button>UPDATE PROFILE</button>-->
                                          </div>
                                    </div>
                                </div>
                            </form>
  </div>
    <div id="menu1" class="tab-pane fade">
      
                            <div class="clearfix"></div>
                            <div class="billingsec">
                            <h3>Billing Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Card*</label>
                                            <input type="text" name="" placeholder="VISA WBE">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Card Number*</label>
                                            <input type="password" name="" placeholder="VISA WBE">
                                        </div>
                                    </div>
                                </div><div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Bank Name*</label>
                                            <input type="text" name="" placeholder="Bank name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Account Name</label>
                                            <input type="password" name="" placeholder="Account No.">
                                        </div>
                                    </div>
                                </div><div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>IBAN*</label>
                                            <input type="text" name="" placeholder="IBAN">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Bank Account Currency</label>
                                            <input type="password" name="" placeholder="Bank Account Currency">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Card Holder*</label>
                                            <input type="text" name="" placeholder="Mark Manson">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Valid To*</label>
                                            <select><option>July</option></select>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Valid To*</label>
                                            <select><option>2025</option></select>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                       <div class="col-md-8 col-sm-8 col-xs-12">
                                           <div class="billinglist">
                                            <label>Security Code*</label>
                                               <input type="password" name="">
                                           </div>
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="billinglist">
                                                <button>UPDATE BILLING INFORMATION</button>
                                            </div>
                                       </div>
                                </div>
                            </form>
                        </div>
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

select {
  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';
}
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

.modal-dialog {
    width: 44%;

}

#border{
    border: none !important;
}


@media only screen and (max-width: 600px) {
    .infobox{
        padding-top: 150px;
    }
    .billinglist label{
        display:block;
    }
}

</style>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
//	("#symtom").val("$value->symtom")
	
	
});


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
