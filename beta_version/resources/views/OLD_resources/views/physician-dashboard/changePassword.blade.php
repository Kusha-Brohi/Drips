@extends('layouts.patient-dashboard.main')
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
                              <div class="col-md-4 col-sm-4 col-xs-12">
                              </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                       <div class="billingsec">
                            <h3>Password Setting</h3>
                            <p>Please change your Password</p>
                            <form action="{{route('submitProfile')}}" method="Post" enctype="multipart/form-data" >
                                @csrf
                            <div class="profilebox1" >
                    		
                                <div class="row">
                    <!-----hidden fields of physicain account ----->                       
                                           
  <input type="hidden" name="email" value="{{Auth::user()->email}}">
  <input type="hidden" name="password_Is_secure" value="{{Auth::user()->password_Is_secure}}">
    <input type="hidden" name="MDCN" value="{{Auth::user()->MDCN}}">
 <input type="hidden" name="name" placeholder="Mark Manson" value="{{Auth::user()->profile->name}}">
 
  <input type="hidden" name="DOB" placeholder="" value="{{Auth::user()->profile->DOB}}">
<input type="hidden"name="Speciality" value="{{Auth::user()->profile->Speciality}}">
<input type="hidden" name="phone" placeholder="888-888-8888" value="{{Auth::user()->profile->phone}}">
 <input type="hidden" name="language" placeholder="Language" value="{{Auth::user()->profile->language}}">
 <input type="hidden" name="gender" placeholder="Gender" value="{{Auth::user()->profile->gender}}">
 <input type="hidden" name="price" placeholder="$100" value="{{Auth::user()->profile->price}}">
 <input type="hidden" name="residency"  value="{{Auth::user()->profile->residency}}">
<?php

   $test=Auth::user()->profile->expertise;
    $expertise1= str_replace("[","",$test);
$expertise= str_replace("]","",$expertise1);
                            
?>
  <input type="hidden" name="expertise" placeholder="" value="{{$expertise}}">  
  <!-----hidden end fields ----->                                  
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billinglist profilelist1">
                                                 <label>New Password</label>
                                               <input type="password" name="password" id="pass" onkeyup="CheckPasswordStrength(this.value)"    placeholder="Password"  placeholder="Password" name="password" id="signup-password" required>

                                            </div>

                                       </div> 
                                       <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                <div><p class="msg"><b>Password must be atleast 8 characters in length, <br>with at least 1 number and at least 1 symbol</b></p></div>
                                </div>
                            </div>
                        </div>

                               <!--error message--->
                                       <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                      <div id="password_strength"></div>
                                </div>
                            </div>
                        </div>
                           <!--error message--->
                                   </div>
                                   <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billinglist profilelist1">
                                                 <label>Confirm Password</label>
                                                 <input type="password" class="form-control" name="password_confirmation" id="pass2"    placeholder="Confirm password" required> 
                                                 <div id="error-nwl"></div>
                                            </div>
                                       </div>
                                       </div>

                                <div class="rigistertionlist1">
                             		<button>UPDATE Password</button>
                                </div>
                                
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
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
<style type="text/css">
	
.rigistertionlist1 button {
  float: left;
}
.loginlist {
    /* overflow: hidden; */
    margin-bottom: 5px;
}
#password_strength {
    position: absolute;
    top: -4px;
    left: 30px;
}
.billinglist.profilelist1 {
    margin-top: 4px;
}

.billinglist input{

  width: 111%;
}

.msg{
  margin-left: 3%
}
button{
      width: 53%;
}
</style>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
    document.getElementById('pass2').disabled = true;
});

  function CheckPasswordStrength(password) {
    var pass = document.getElementById('pass');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    var passw=  /^[A-Z]/;

var password_strength = document.getElementById("password_strength");
    
        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }

        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.

        var passed = 0;

        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }

        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
            case 2:
                strength = "Please enter Strong Password";
                color = "red";
                break;
            case 3:
                 strength = " You have entered Medium password";
                 color = "orange";
                document.getElementById('pass2').disabled = false;
                break;
            case 4:
                 strength = "You have entered Strong password";
                color = "green";
               document.getElementById('pass2').disabled = false;
                break;
               
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;

        
        if(passed <= 2){
       // console.log('test');
       document.getElementById('pass2').disabled = true;
     $("#pass2").keyup(function(){
    if(pass.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        pass.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password Matched!"
        document.getElementById('StrongBTN').disabled = false;
    }
   else
    {
         pass2.style.backgroundColor = badColor;
         pass.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
        document.getElementById('StrongBTN').disabled = true;
    }
});

         document.getElementById('StrongBTN').disabled = true;
        }else{

            document.getElementById('StrongBTN').disabled = false;
        }   
        


        //var password_strength = document.getElementById("password_strength").value=strength;
        
    }
  
  
   </script>

@endsection
