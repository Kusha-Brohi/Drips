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
                      @if(!Auth::check())
                    <h4>Login</h4>
                  
                    <form method="POST" action="{{ route('login') }}">
                      {{ csrf_field() }}
                    
                             <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>Email</label>
                                    <input type="text" name="email" 
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                    <strong class="validate_css" style="color: red">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" >
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong class="validate_css" style="color: red">{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginforgetlist">
                                    <label class="pull-left"><input type="checkbox" name="">Remember Me</label>
                                     <a href="{{ url('password/reset') }}" class="pull-right">Forget Password</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                           <div class="loginbtn">
                                    
                                 <input type="submit" class="stepslogin" value="Login" >
                                    <a href="{{url('patient-dashboard/register')}}">New User</a>
                                </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
								<?php
								
								$user_id = auth()->user()->id;
								
								?>
							@if(auth()->user()->customer_status == '4' && auth()->user()->status_Incomplete == 'Yes')
									   <div class="loginbtn">
                                    
                                 <!--    <a href="steps.html" class="stepslogin">Login</a> -->
                                 <a class="stepslogin" href="{{url('signout')}}">Logout</a>
                                    <a href="{{url('/patient-dashboard/steps/'.$user_id)}}">Fill the registration process </a>
                                </div>
								@elseif(auth()->user()->customer_status == '4' && auth()->user()->status_Incomplete == 'No')
									   <div class="loginbtn">
                                    
                                 <!--    <a href="steps.html" class="stepslogin">Login</a> -->
                                 <a class="stepslogin" href="{{url('signout')}}">Logout</a>
                                <a href="{{url('/patient-dashboard/consultation')}}">Return to Dashboard</a>
                                </div>
								
									
								
								@endif
								
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

/*section.loginsec {*/
/*    padding: 0;*/
/*}*/

.loginsec img {
    padding: 0 50px 20px 50px;
}
</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection



