<?php

$loginAsAdmin = Session::get('admin');
//dd($loginAsAdmin);

?>
    <!-- Navigation -->
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
      <!--    <ul class="inputform">
            <li><i class="fa fa-align-justify" aria-hidden="true"></i></li>
             <li><input type="text" name="" placeholder="search"> <i class="fa fa-search" aria-hidden="true"></i></li>
         </ul> -->
        <ul class="nav navbar-right top-nav">
            <li class="bellicon"><a href="{{url('physician-dashboard/pendingConsultations')}}"><i class="fa fa-bell" aria-hidden="true"></i>
                </a>
                @if($count)
                <span  class="seven">{{$count}}</span>
              @endif
              
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--  <img src="{{asset(Auth::user()->profile->pic)}}"  class="img-responsive small" alt="img">-->
                    Hello, {{Auth::user()->name}} <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/physician-dashboard/account')}}"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>

                    <li><a href="{{url('/physician-dashboard/changepassword')}}"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('signout')}}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>

                    @if($loginAsAdmin)
                    <li><a href="{{url('loginasadmin')}}"> <i class="fa fa-arrow-left"></i> Back To Admin </a></li>
                    @endif
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="Requestboxlist">
          <ul class="nav navbar-nav side-nav">
                <!-- <li>
                    <a href="{{url('/physician-dashboard/scheduled')}}"> Schedule</a>
                   
                </li> -->
                <li class="{{request()->routeIs('Physician') ? 'active' : '' }}">
                    <a href="{{url('/physician-dashboard/Physician')}}"> Scheduled Consultations</a>
                   
                </li>
                <li class="{{request()->routeIs('requested') ? 'active' : '' }}">
                    <a href="{{url('/physician-dashboard/requested')}}"> Past Consultations</a>
                </li>
                <!-- <li>
                    <a href="#"> Scheduled</a>
                </li> -->
                <li class="{{request()->routeIs('pendingConsultations') ? 'active' : '' }}">
                    <a href="{{url('/physician-dashboard/pendingConsultations')}}"> All Consultations</a>
                </li>
                <li class="{{request()->routeIs('account') ? 'active' : '' }}"><a href="{{url('/physician-dashboard/account')}}">Account Settings</a></li>
                                
                  
            </ul>
        </div>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

