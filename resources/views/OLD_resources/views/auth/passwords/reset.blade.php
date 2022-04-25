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
                 
					    <form method="POST" class="form bordered-input" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">


                                    <div class="p-30 pb-0">
                                        <h4>Reset Password</h4>

                                        <div class="form-group m-t-20 row">
                                            <div class="col-12">
                                                <label class="col-form-label font-12 text-primary p-0">Email Address</label>
                                                <input class="form-control pl-0 font-12 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" placeholder="Email" name="email" >
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-30">
                                            <div class="col-12">
                                                <label class="col-form-label font-12 text-primary p-0">Password</label>
                                                <input class="form-control  pl-0 font-12 {{ $errors->has('password') ? ' is-invalid' : '' }}"  type="password" name="password" placeholder="password" >
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <input id="password-confirm" type="password" class="form-control  pl-0 font-12" name="password_confirmation"  placeholder="Confirm password" >
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <div class="col-12">
                                                <p><button type="submit" class="btn btn-rounded btn-primary m-b-20 btn-block waves-effect waves-light d-block">Reset Password</button></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
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
<script type="text/javascript"></script>
@endsection









