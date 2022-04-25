@extends('layouts.physician-dashboard.main')
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
                    <h4>Login</h4>
            
                    <!--<form method="POST" action="{{ route('login') }}">-->
                    <form method="POST" action="{{ url('physician-login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="loginlist">
                                    <label>MDCN</label>
                                    <input type="text" name="username" 
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                    <!--<strong class="validate_css" >{{ $errors->first('email') }}</strong>-->
                    <strong class="validate_css" >Email/MDCN And Password Are Wrong.</strong>
                    </span>
                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>Password</label>
                                    <input type="password" name="password">
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong class="validate_css">{{ $errors->first('password') }}</strong>
                    </span>
                     <?php Session::flash('flash_message', 'Password field  is required.'); 
             Session::flash('alert-class', 'alert-success'); 
              ?>
                  @endif
                                </div>
                            </div>
                        </div>
                        
                        <?php /*
                            <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>MDCN</label>
                                    <input type="MDCN" name="MDCN" class="form-control {{ $errors->has('MDCN') ? ' is-invalid' : '' }}" required >
                  @if ($errors->has('MDCN'))
                    <span class="invalid-feedback" role="alert">
                      <strong class="validate_css">{{ $errors->first('MDCN') }}</strong>
                    </span>
            
                  @endif
                                </div>
                            </div>
                        </div>
                    */
                    ?>
                    
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginforgetlist">
                                    <label class="pull-left"><input type="checkbox" name="">Remember Me</label>
                                     <a href="{{ url('password/reset') }}" class="pull-right">Forgot Password</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            @if(auth()->user()->customer_status == '3')
                                       <div class="loginbtn">
                                    
                                 <!--    <a href="steps.html" class="stepslogin">Login</a> -->
                                 <a class="stepslogin" href="{{url('signout')}}">Logout</a>
                                    <a href="{{url('/physician-dashboard/Physician')}}">Return to Dashboard</a>
                                </div>
                                @else
                                <div class="loginbtn">
                                    <!-- <a href="scheduled.html" class="stepslogin">Login</a> -->
                                  <input type="submit" class="stepslogin" name="" value="Login">
                                  <!--  <a href="{{url('/physician-dashboard/PhysicianSignup')}}">New User</a>-->
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
</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection









