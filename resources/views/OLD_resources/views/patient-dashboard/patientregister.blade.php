@extends('layouts.patient-dashboard.main')
@section('content')

<body class="loginbackground">

<!-- logon sec start -->
<section class="loginsec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="mainlogo">
                    <img src="{{asset($logo->img_path)}}" class="img-responsive" alt="img">
                </div>

                <div class="loginbody">
                    <h4>Registration</h4>
             
                    <form method="POST" action="{{ route('register') }}">
                      {{ csrf_field() }}
                        <input type="hidden" name="customer_status" value="4">
                        <input type="hidden" name="status_Incomplete" value="Yes">
      <input type="hidden" value="patient"  name="role" id="role" readonly>
                             <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>First Name</label>
                <input type="text" class="form-control {{ $errors->registerForm->has('name') ? ' is-invalid' : '' }}" placeholder="Your Name" name="name" id="name" value="{{old(name)}}" required>
                   @if ($errors->registerForm->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong class="validate_css" style="color: red;">{{ $errors->registerForm->registerForm->first('name') }}</strong>
                  </span>

                   @endif
                                </div><div class="loginlist">
                                    <label>Last Name</label>
                <input type="text" class="form-control {{ $errors->registerForm->has('name') ? ' is-invalid' : '' }}" placeholder="Your last name" name="lname" id="lname" value="{{old(lname)}}" required>
                   @if ($errors->registerForm->has('lname'))
                  <span class="invalid-feedback" role="alert">
                    <strong class="validate_css" style="color: red;">{{ $errors->registerForm->registerForm->first('lname') }}</strong>
                  </span>

                   @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                     <label>Email </label>
            <input type="email" class="form-control {{ $errors->registerForm->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" id="signup-email" value="{{old(name)}}" required>
             @if ($errors->registerForm->has('email'))
              <span class="invalid-feedback" role="alert">
              <strong class="validate_css" style="color: red;">{{ $errors->registerForm->first('email') }}</strong>
              </span>
             @endif
                                </div>
                            </div>
                        </div><div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
            <label>Password </label>
                  <input type="password" class="form-control {{ $errors->registerForm->has('password') ? ' is-invalid' : '' }}"  name="password" id="pass" onkeyup="CheckPasswordStrength(this.value)"    placeholder="Password"  placeholder="Password" name="password" id="signup-password" required>
                  @if ($errors->registerForm->has('password'))
                    <span class="invalid-feedback" role="alert">
                    <strong class="validate_css" style="color: red;">{{ $errors->registerForm->first('password') }}</strong>
                    </span>
                   @endif
                                </div>
                            </div>
                        </div>
						         <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
								<div><p style="margin-bottom: 8px;"><b>Password must be atleast 8 characters in length, with at least 1 number and at least 1 symbol</b></p></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
           <div id="password_strength"></div>
                                </div>
                            </div>
                        </div>
                        
                        

            <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                        <label style="padding-top: 0%;">Confirm Password </label>
            <input type="password" class="form-control" name="password_confirmation" id="pass2"    placeholder="Confirm password" required>

                 <div id="error-nwl"></div>
                  @if ($errors->registerForm->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                    <strong class="validate_css" style="color: red;">{{ $errors->registerForm->first('password_confirmation') }}</strong>
                    </span>
                   @endif
                                </div>
                            </div>
                        </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
							
                                <div class="loginbtn">
                                  <input type="submit" class="stepslogin" id="StrongBTN"  value="Register">  
                                 <!--    <a href="steps.html" class="stepslogin">Login</a> -->
                                 <!-- <input type="submit" class="stepslogin" value="Login" >
                                    <a href="{{url('patient-dashboard/steps')}}">New User</a> -->
                                </div>
						
								
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
</section>
<!-- logon sec end -->






@endsection
@section('css')
<style>
.stepslogin{
    width: 100%;
    border-radius: 5px;
}

section.loginsec {
    padding: 0;
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
  
  
  
  
  
<!-- <script type="text/javascript">



function checkPass()
{
    var pass = document.getElementById('pass');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    var passw=  /^[A-Z]/;
    //var regex =/^[a-zA-Z0-9+&@#/%?=~_|!:,.;]{6,}+$/;
    
    
    if(pass.value.length > 7)
    {
       // pass.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
       // pass.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 8 digit!"
        return;
    }
    
    
    
    
   /* if(pass.value == pass2.value)
    {
       // pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password Matched!"
    }
   else
    {
       // pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
    }*/
    
    


}  
</script> -->

@endsection



