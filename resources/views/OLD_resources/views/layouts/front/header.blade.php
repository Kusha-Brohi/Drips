<header>

<?php
$id = auth()->user()->id;


?>
      <!-- Begin: Top Row -->
      <div class="top-row top-pad">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="list-inline text-right">
                <li><a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(59) }}">Call Now: {{ App\Http\Traits\HelperTrait::returnFlag(59) }} </a></li>
                <li><a href="mailto:{{ App\Http\Traits\HelperTrait::returnFlag(218) }}">E-mail: {{ App\Http\Traits\HelperTrait::returnFlag(218) }}</a></li>

                @if(auth()->user()->customer_status == '4')
					@if(auth()->user()->status_Incomplete == 'Yes')
						<li><a href="https://dripsmedical.com/portal/patient-dashboard/steps/{{$id}}" id="p-login">{{auth()->user()->name}}</a></li>
							<?php
							Session::flash('flash_message', 'Please fill the registration process'); 
							Session::flash('alert-class', 'alert-success'); 
							
							?>
						@else
                <li><a href="{{url('patient-dashboard/consultation')}}" id="p-login">{{auth()->user()->name}}</a></li>
				@endif
                @else
                <li><a href="{{url('patient-dashboard/patientLogin')}}" id="p-login">Patient log in</a></li>
                @endif
                 @if(auth()->user()->customer_status == '3')
                <li><a href="{{url('physician-dashboard/Physician')}}" id="ph-login"> {{auth()->user()->name}}</a></li>
                @else
                <li><a href="{{url('physician-dashboard/PhysicianLogin')}}" id="ph-login"> Physician log in</a></li>
               @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- END: Top Row -->

      <!-- Begin: Bottom Row -->
      <!-- <div class="bottom-row">
        <div class="container">
          <nav class="navbar navbar-default">
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div> -->
      <!-- END: Bottom Row -->
    <div class="container ">
			<div class="main-navigate">
					<div class="row nav-flex">
						
						<div class="sidenav" id="mySidenav">
							<a class="closebtn" href="javascript:void(0)" onclick="closeNav()">×</a>
						</div>
						
						<div class="mobilecontainer hidden-lg hidden-md">
							<span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">☰</span>
						</div>
                                  <div class="bottom-row">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-5">
                                          <a href="{{url('/')}}"><img src="{{asset($logo->img_path)}}" class="img-responsive" alt="img"> </a>
                                        </div>
                                        <div class="col-md-7">
                                            
								
                                          <div class="bottom-list">
                                              <div class="navigation">
                                            <ul class="list-inline navbar-set hidden-xs hidden-sm">
                                              <li><a href="">HOME</a> </li>
                                              <li><a href="">ABOUT</a> </li>
                                              <li><a href="">SERVICES</a> </li>
                                              <li><a href="">NEWS</a> </li>
                                              <li><a href="">CAREERS</a> </li>
                                              <li><a href="">CONTACT US</a> </li>
                                              <li><a href="">FAQS</a> </li>
                                            </ul>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
    </div>
</div>
    </header>