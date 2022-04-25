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
            <a class="navbar-brand" href="#">
                <img src="images/logo.jpg" alt="img" class="img-responsive">
            </a>
           
        </div>
        <!-- Top Menu Items -->
         <ul class="inputform">
            <li><i class="fa fa-align-justify" aria-hidden="true"></i></li>
             <li><input type="text" name="" placeholder="search"> <i class="fa fa-search" aria-hidden="true"></i></li>
         </ul>
        <ul class="nav navbar-right top-nav">
            <li class="bellicon"><a href="#"><i class="fa fa-bell" aria-hidden="true"></i>
                </a>
                <span class="seven">7</span>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/small_img.png" class="img-responsive small" alt="img">Hello, Mark Manson <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL('signout') }}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="Requestboxlist">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="request-consultation.html"> Request a Consultation</a>
                   
                </li>
                <li>
                    <a href="sheduled-consultation.html"> Scheduled Consultation </a>
                   
                </li>
                <li>
                    <a href="#">  past Consultation</a>
                </li>
                <li>
                    <a href="my-prescription.html"> My Prescriptions</a>
                </li>
                <li>
                    <a href="my-order.html"> My Orders</a>
                </li>
                <li><a href="parent-directory.html">Account Settings</a></li>
                <li>
                    <a href="billing-information.html"> Billing Information</a>
                </li>
                 
            </ul>
        </div>
        </div>
        <!-- /.navbar-collapse -->
    </nav>