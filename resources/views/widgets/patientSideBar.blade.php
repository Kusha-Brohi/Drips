<?php
  $count = DB::table('consultation')->where('patient_id',Auth::user()->id)->where('Is_accept','=','1')->count();


$loginAsAdmin = Session::get('admin');
/*dd($loginAsAdmin);*/


?>    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0);">
                <img src="{{asset($portal_logo->img_path)}}" alt="img" class="img-responsive" style="width:147px;">
            </a>
           
        </div>
        <!-- Top Menu Items -->
       <!--   <ul class="inputform">
            <li><i class="fa fa-align-justify" aria-hidden="true"></i></li>
             <li><input type="text" name="" placeholder="search"> <i class="fa fa-search" aria-hidden="true"></i></li>
         </ul> -->
        <ul class="nav navbar-right top-nav">
            <li class="bellicon"><a href="{{url('patient-dashboard/sheduled-consultation')}}"><i class="fa fa-bell" aria-hidden="true"></i>
                </a>
                <span class="seven">{{$count}}</span>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <!-- <img src="{{asset(Auth::user()->patient->pic)}}" style="width: 39px;"class="img-responsive small" alt="img">-->
                    Hello, {{Auth::user()->name}} <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/patient-dashboard/parent-directory')}}"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="{{url('/patient-dashboard/change_password')}}"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
           
                    <li class="divider"></li>
					
                    <li><a href="{{ URL('signout') }}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>

                      @if($loginAsAdmin)
                    <li><a href="{{url('patientAdmin')}}"><i class="fa fa-arrow-left"></i> Back To Admin </a></li>
                    @endif
						
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="Requestboxlist">
            <ul class="nav navbar-nav side-nav">
                <li class="{{request()->routeIs('patient_medical_history') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/patient_medical_history')}}">My Medical History</a>
                   
                </li>
                <li class="{{request()->routeIs('RequestConsultation') || request()->routeIs('selectDoctor')  || request()->routeIs('ConsultationRequest') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/consultation')}}"> Request a Consultation</a>
                   
                </li>
                <!--  <li class="{{request()->routeIs('RequestConsultation') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/selectDoctor')}}"> Request a Consultation</a>
                    -->
               <!--  </li><li class="{{request()->routeIs('ConsultationRequest') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/consultation-Request')}}"> Request a Consultation</a>
                   
                </li> -->
                <li class="{{request()->routeIs('SheduledConsultation') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/sheduled-consultation')}}"> My Consultation </a>
                   
                </li>
             <!--    <li class="{{request()->routeIs('pastconsultation') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/past_consultation')}}"> Past Consultation</a>
                </li> -->
                <li class="{{request()->routeIs('MyPrescription') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/myprescription')}}"> My Prescriptions</a>
                </li>
                <li class="{{request()->routeIs('MyOrder') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/my-order')}}"> My Orders</a>
                </li>
                <li class="">
                    <a href="{{url('/patient-dashboard/my-test')}}"> My Test Result</a>
                </li>
                <li class="{{request()->routeIs('ParentDirectory') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/parent-directory')}}">Account Settings</a>
                </li>
              <!--  <li class="{{request()->routeIs('billing') ? 'active' : '' }}">
                    <a href="{{url('/patient-dashboard/billing-information')}}"> Payment method</a>
                </li>-->
              <li class="{{request()->routeIs('complaint') ? 'active' : '' }}"><a href="{{url('/patient-dashboard/complaint')}}">Electronic Complaint Card</a></li>

                 
            </ul>
        </div>
        </div>
        <!-- /.navbar-collapse -->
    </nav>