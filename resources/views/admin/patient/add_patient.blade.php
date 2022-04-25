@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Create New Patient</h3>
                    
                        <a class="btn btn-success pull-right" href="{{url('/admin/patient')}}">
                            <i class="icon-arrow-left-circle"></i> View Patient</a>
                    
                    <div class="clearfix"></div>
                    <hr>
             
                    <div class="loginbody">
                    <h4>Registration</h4>
             
                    <form method="POST" action="{{ route('registerPatient') }}">
                      {{ csrf_field() }}
                        <input type="hidden" name="customer_status" value="4">
                        <input type="hidden" name="status_Incomplete" value="Yes">
      <input type="hidden" value="patient"  name="role" id="role" readonly>
                             <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>First Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Patient Name" name="name" id="name" value="{{old(name)}}" >
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div><div class="loginlist">



                                    <label>Last Name</label>
                <input type="text" class="form-control {{ $errors->has('lname') ? 'has-error' : '' }}" placeholder="Patient last name" name="lname" id="lname" value="{{old(lname)}}" >
                  {!! $errors->first('lname', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                     <label>Email </label>
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"   class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" placeholder="Email" name="email" id="signup-email" value="{{old(name)}}" >
           {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div><div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
            <label>Password </label>
                  <input type="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}"  name="password" id="pass" onkeyup="CheckPasswordStrength(this.value)"    placeholder="Password"  placeholder="Password" name="password" id="signup-password" >
                 {!! $errors->first('password', '<p class="help-block">:message</p>') !!}      </div>
                            </div>
                        </div>

                        
                                 <!-- <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                <div><p style="margin-bottom: 8px;"><b>Password must be atleast 8 characters in length, with at least 1 number and at least 1 symbol</b></p></div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
           <div id="password_strength"></div>
                                </div>
                            </div>
                        </div> -->
                        
                        

            <!-- <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                        <label style="padding-top: 0%;">Confirm Password </label>
            <input type="password" class="form-control" name="password_confirmation" id="pass2"    placeholder="Confirm password" >

                 <div id="error-nwl"></div>
                  @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                    <strong class="validate_css" style="color: red;">{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                   @endif
                                </div>
                            </div>
                        </div> -->
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

                </div>
            </div>
        </div>
        </div>
        @include('layouts.admin.footer')
    </div>
@endsection


<style type="text/css">
    p.help-block {
    color: red;
}

</style>