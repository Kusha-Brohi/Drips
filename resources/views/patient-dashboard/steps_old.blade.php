
@extends('layouts.patient-dashboard.main')
@section('content')

<!-- logon sec start -->
<section class="loginsec">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="mainlogo">
                    <img src="{{asset($logo->img_path)}}" class="img-responsive" alt="img">
                </div>

                <div class="loginbody">
                    <h4>REGISTRATION</h4>
                    <p>ras nec velit sed dui laoreet luctus. Cras dictum odio ac </p>
                     <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>
  @if(!Auth::user())
  <form role="form" method="POST" action="{{route('register')}}" enctype="multipart/form-data" >
    @csrf

    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="customer_status" value="4">
      <input type="hidden" value="patient"  name="role" id="role" readonly>
    <div class="row setup-content" id="step-1">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="usericon">
                <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                <h4>Upload Profile Photo</h4>
                <input type="file" name="pic">
            </div>
       
                 
                  
        </div>
        <div class="col-md-9 col-xs-12 col-sm-9">
                <div class="row">
                  @if(!Auth::user())
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>First Name*</label>
                       <input type="text" name="name" placeholder="John" required="">
                   </div>
               </div>
              
               @endif
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Last Name*</label>
                       <input type="text" name="lname" placeholder="Doe" value="{{Auth::user()->Patient->lname}}" required="">
                   </div>
               </div>
                
           </div>
           <div class="row">
               <div class="col-md-8 col-sm-8 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Date Of Birth</label>
                       <input type="Date" name="DOB" placeholder="DD" value="{{Auth::user()->Patient->DOB}}" required="">
                   </div>
               </div>
               <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="rigistertionlist">
                        <label>&nbsp;</label>
                       <input type="text" name="MM" placeholder="MM" value="{{Auth::user()->Patient->MM}}">
                   </div>
               </div> -->
               <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="rigistertionlist">
                       <label>&nbsp;</label>
                       <input type="text" name="YYY" placeholder="YYY" value="{{Auth::user()->Patient->YYY}}">
                   </div>
               </div> -->
           </div>
           <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="genderlist">
                   <label>Gender</label>
                   <ul>
                       <li><label><input type="radio" value="{{Auth::user()->Patient->Gender}}" name="Gender" >Male</label></li>
                        <li><label><input type="radio" value="{{Auth::user()->Patient->Gender}}" name="Gender">Female</label></li>
                   </ul>
               </div>
           </div>
           <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="genderlist">
                   <label>Material Status</label>
                   <ul>
                       <li><label><input type="radio" name="material_status" value="{{Auth::user()->Patient->material_status}}">Single</label></li>
                        <li><label><input type="radio" name="material_status" value="{{Auth::user()->Patient->material_status}}">Married</label></li>
                   </ul>
               </div>
           </div>
       </div>
       <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Phone*</label>
                       <input type="text" name="phone" placeholder="1 408 638 0968" value="{{Auth::user()->Patient->phone}}">
                   </div>
               </div>
                @if(Auth::guest())
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Email Address</label>
                       <input type="email" name="email" placeholder="johndoe@gmail.com" value="{{Auth::user()->email}}">
                   </div>
               </div>
               <!-- <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <label for="">Password</label>
        <input type="password" name="password" id="signup-password1"  placeholder="Password" required value="{{Auth::user()->password}}">
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <label for="">Confirm Password</label>
        <input type="password" name="password_confirmation" id=" signup-password" placeholder="Retype Password" required>
      </div>
    </div> -->
            
           </div>
           <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Password*</label>
                       <input type="password" name="password" placeholder="Password" value="{{Auth::user()->password}}">
                   </div>
               </div>
            
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Confirm Password</label>
                       <input type="password" name="password_confirmation" placeholder="Retype Password" >
                   </div>
               </div>
               <!-- <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <label for="">Password</label>
        <input type="password" name="password" id="signup-password1"  placeholder="Password" required value="{{Auth::user()->password}}">
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <label for="">Confirm Password</label>
        <input type="password" name="password_confirmation" id=" signup-password" placeholder="Retype Password" required>
      </div>
    </div> -->
               @endif
           </div>
           <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Weight (in Kg)</label>
                       <input type="hidden" value="kilograms" id="weightunits">
                       <input type="text" name="Weight" id="weight" placeholder="Weight in Kg" value="{{Auth::user()->Patient->Weight}}">

                   </div>
               </div>
          <div class="col-md-5 col-sm-5 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Height (in meter)</label>
                       <input type="hidden" value="meters" id="heightunits">
                       <input type="text"  name="height" id="height" placeholder="Height in Cm" value="{{Auth::user()->Patient->height}}">
                   </div>
               </div>
           </div>
              <div class="row">
               
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <div class="rigistertionlist">
                        <label>&nbsp;</label>
                       <button type="button" value="computeBMI" onclick="computeBMI();">CALCULATE</button>
                   </div>
               </div>
               <div class="col-md-8 col-sm-8 col-xs-12">
                   <div class="rigistertionlist">
                       <label>BMI</label>
                       <input type="text" name="Bmi"  placeholder="BMI" value="{{Auth::user()->Patient->Bmi}}" id="output" readonly="">
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="rigistertionlist">
                       <label>Address</label>
                       <input type="text" name="Address" placeholder="1011 US Hwy 72 East,Athens AL 35611" value="{{Auth::user()->Patient->Address}}">
                   </div> 
               </div>
           </div>
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="rigistertionlist">
                       <label>Employment Status, Nature Of Job</label>
                       <input type="text" name="employment_status" placeholder="Fusce rutrum vehicula Jetus eu dictum suspendisse Potentin" value="{{Auth::user()->Patient->employment_status}}">
                   </div> 
               </div>
           </div>
           <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="rigistertionlist1">
          <button class="btn btn-primary nextBtn btn-lg" type="button" >CONTINUE</button>
      </div>
      </div> 
      </div>
        </div>
    </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="col-md-12">
          
          <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Name Of Family Doctor*</label>
                       <input type="text" name="family_doc" placeholder="Mark Manson" required="">
                   </div>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="rigistertionlist">
                       <label>Allergies</label>
                       <input type="text" name="allergies" placeholder="Flu" required="">
                   </div>
               </div>
           </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="rigistertionlist">
                       <label>Medical Conditions</label>
                       <input type="text" name="medical_condition" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
                   </div>
                   <div class="rigistertionlist addbtn">
                       <input type="text" name="medical_condition2" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
                      <!--  <button>ADD MORE</button> -->
                   </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="rigistertionlist">
                       <label>Past Surgical History</label>
                       <input type="text" name="Surgeries1" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
                   </div>
                   <div class="rigistertionlist addbtn">
                       <input type="text" name="Surgeries2" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
               <!--         <button>ADD MORE</button> -->
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="rigistertionlist">
                       <label>Current Medications</label>
                       <input type="text" name="Current_medication1" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
                   </div>
                   <div class="rigistertionlist addbtn">
                       <input type="text" name="Current_medication2" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
                 <!--       <button>ADD MORE</button> -->
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="rigistertionlist">
                       <label>Social History</label>
                       <input type="text" name="social_history" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
                   </div>
                   
                </div>
            </div><div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="rigistertionlist">
                       <label>Past Medical History</label>
                     <input type="text" name="past_medical_history" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">

                   </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                     
                   <div class="rigistertionlist addbtn">
                    <label>Family History </label>
                       <input type="text" name="family_medical_condition" placeholder="Nunc nec tortor id tellus ultricies placerat praesent vel nulla lorem" required="">
                   <!--     <button>ADD MORE</button> -->
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                     <div class="genderlist smoke">
                   <label>Do You Smoke Tobacco?</label>
                   <ul>
                       <li><label><input type="radio" name="do_you_smoke">Yes</label></li>
                        <li><label><input type="radio" name="do_you_smoke">No</label></li>
                   </ul>
               </div>
                </div>
                <!-- <div class="col-md-3 col-sm-3 col-xs-12">
                     <div class="rigistertionlist">
                       <input type="text" name="Quantity" placeholder="Quantity">
                      
                   </div>
                </div> -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                     <div class="genderlist smoke">
                   <label>Do You drink Alcohol?</label>
                   <ul>
                       <li><label><input type="radio" name="do_u_Alcohol" required="">Yes</label></li>
                        <li><label><input type="radio" name="do_u_Alcohol" required="">No</label></li>
                   </ul>
               </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
               
                  <!--    <div class="rigistertionlist">
                       <input type="text" name="Quantity" placeholder="Quantity" required="">
                      
                   </div> -->
             
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="genderlist smoke">
                   <label>Do You Use Any Recreational Drugs Like Marijuana?</label>
                   <ul>
                       <li><label><input type="radio" value="yes" name="do_u_marijuana" required="">Yes</label></li>
                        <li><label><input type="radio" value="no" name="do_u_marijuana" required="">No</label></li>
                   </ul>
               </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                     <div class="rigistertionlist1">
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
      </div>
        </div>
      </div>
    </div>
</div>
</div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-12 col-sm-12 col-xs-12">
        <div class="col-md-12">
          <h3> Billing Information</h3>
                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="rigistertionlist">
                                            <label>Card*</label>
                                            <input type="text" name="card" placeholder="VISA WBE" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="rigistertionlist">
                                            <label>Card Number*</label>
                                            <input type="password" name="card_num" placeholder="VISA WBE" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="rigistertionlist">
                                            <label>Card Holder*</label>
                                            <input type="text" name="card_holder" placeholder="Mark Manson" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="rigistertionlist">
                                            <label>Valid To*</label>
                                            <select><option>July</option></select>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="rigistertionlist">
                                            <label>Valid To*</label>
                                            <select><option>2025</option></select>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                       <div class="col-md-8 col-sm-8 col-xs-12">
                                           <div class="rigistertionlist">
                                            <label>Security Code*</label>
                                               <input type="password" name="Security_code" required="">
                                           </div>
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="rigistertionlist1 submitbtn">
                                                <!--   <a href="request-consultation.html" type="submit">Submit</a> -->
                                         
                                                <button>submit</button>
                                            </div>
                                       </div>
                                </div>
         
        </div>
      </div>
    </div>
  </form>
         @endif       </div>
            </div>
        </div>
    </div>
</section>
<!-- logon sec end -->
@endsection
@section('css')
<style>

</style>
@endsection

@section('js')


<script type="text/javascript">
  

          
            function computeBMI() {
                // user inputs
             var height = Number(document.getElementById("height").value);
                var heightunits = document.getElementById("heightunits").value;
                var weight = Number(document.getElementById("weight").value);
                var weightunits = document.getElementById("weightunits").value;
        
        
                //Convert all units to metric
                if (heightunits == "inches") height /= 39.3700787;
                if (weightunits == "lb") weight /= 2.20462;
        
                //Perform calculation
        
                //        var BMI = weight /Math.pow(height, 2)*10000;
                var BMI = Math.round(weight / Math.pow(height, 2) * 10000);
        
                //Display result of calculation
                //document.getElementById("output").innerText = Math.round(BMI * 100) / 100;
                
                var output = Math.round(BMI * 100) / 100
                document.getElementById("output").value = output;
             
        /*        if (output < 18.5)
                    document.getElementById("comment").innerText = "Underweight";
                else if (output >= 18.5 && output <= 25)
                    document.getElementById("comment").innerText = "Normal";
                else if (output >= 25 && output <= 30)
                    document.getElementById("comment").innerText = "Obese";
                else if (output > 30)
                    document.getElementById("comment").innerText = "Overweight";*/
                // document.getElementById("answer").value = output; 
            }

</script>
@endsection
