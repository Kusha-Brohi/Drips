@extends('layouts.physician-dashboard.main')
@section('content')

<body class="loginbackground">

<!-- logon sec start -->
<section class="loginsec">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="mainlogo">
                    <img src="{{asset($logo->img_path)}}" class="img-responsive" alt="img">
                </div>

                <div class="loginbody">
                    <h4>SignUp</h4>
                 
                    <form method="POST" action="{{ route('register') }}">
              @csrf
              <input type="hidden" name="customer_status" value="3">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>User Name</label>
                                    <input type="text"  placeholder="Jhon"type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Full name" value="{{Auth::user()->Profile->name}}" required>
                  
                   @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                   @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>Email</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{Auth::user()->Profile->email}}" required>
                       @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                       @endif
                                </div>
                            </div>
                        </div>
                                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>license number</label>
                                    <input type="text" class="form-control {{ $errors->has('license_number') ? ' is-invalid' : '' }}" name="license_number" placeholder="license number" value="{{Auth::user()->Profile->license_number}}" required>
                       @if ($errors->has('license_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('license_number') }}</strong>
                            </span>
                       @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>Password</label>
                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                          @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                           @endif
                                </div>
                            </div>
                        </div><div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginlist">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginforgetlist">
                                    <label class="pull-left"><input type="checkbox" name="">Do You have an Account</label>
                                     <a href="{{url('/physician-dashboard/PhysicianLogin')}}" class="pull-right">login</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="loginbtn">
                             
                                   <input type="submit" class="stepslogin" name="" value="SignUp">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
<script type="text/javascript"></script>
@endsection









