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
                     <div class="rgster-login-form login-form">
					<h4>Reset Password</h4> 
        
                            
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form class="form bordered-input" method="POST" action="{{ route('password.email') }}">
                                {{csrf_field()}}
                                <div class="p-30 pb-0">
                                <p>Enter your email to help us identify you.</p>
                                <div class="form-group m-t-20 row">
                                    <div class="col-12">
                                        <input class="form-control pl-0 font-12 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="text" placeholder="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group row m-b-10">
                                    <div class="col-12">
                                        <p><button type="submit" class="btn-block  btn btn-rounded btn-primary m-b-20 waves-effect waves-light d-block">Send Reset Instruction</button></p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="pl-3 pt-1 pb-3 pl-3"><a href="{{url('signin')}}">Return to login</a>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                   
  </div>
            
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
     $(document).on('click', ".btn1", function(e){
            // alert('it works');
            $('.loginForm').submit();
     });
</script>
@endsection









