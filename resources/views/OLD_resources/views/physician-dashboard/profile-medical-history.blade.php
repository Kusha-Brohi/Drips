@extends('layouts.physician-dashboard.main')
@section('content')
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
  @include('widgets.physicianSideBar')
      <div class="prescriptionbox">
        <div id="page-wrapper">
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
              <div class="col-sm-12 col-md-12" id="content">
                <div class="infobox">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="billingsec1">
                        <div class="row">
                          <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="row">
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="Accountimg">
                                  <img src="images/pro_1.jpg" class="img-responsive" alt="img">
                                </div>
                              </div>
                              <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="Accountlisting1">
                                  <ul>
                                    <li>Name*</li>
                                    <li>Age</li>
                                    <li>Gender</li>
                                    <li>Phone Number</li>
                                    <li>Symtoms</li>
                                  </ul>
                                  <ul>
                                    <li><strong>Alesha Smith</strong></li>
                                    <li><strong>25 Year Old</strong></li>
                                    <li><strong>Female</strong></li>
                                    <li><strong>888-888-8888</strong></li>
                                    <li><strong>Acid Reflux, Allergies Heahache, Fungal Injection, Asthma, Cold Flu</strong></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                  
                     
                          </div>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                           <div class="medicallist">
                               <ul class="pull-left">
  <li class="active"><a data-toggle="tab" href="#home1">Medical History</a></li>
  <li><a data-toggle="tab" href="#menu2">Consultaion Notes</a></li>
  <li><a data-toggle="tab" href="#menu3">Attachments</a></li>
</ul>
 <a href="#" class="pull-right startsettingbtn">START SETTING</a>
 <div class="clearfix"></div>
<div class="tab-content">
  <div id="home1" class="tab-pane fade in active">
    <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Medical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Surigical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Social History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Family History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Allergies</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Current Medications</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
   <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Medical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Surigical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Social History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Family History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Allergies</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Current Medications</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
  </div>
  <div id="menu3" class="tab-pane fade">
  <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Medical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Surigical History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Social History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Family History</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Allergies</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
      <div class="medicalhistorybox1">
        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Current Medications</h3>
            <a href="#" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li> 
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                     <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></li>
                </ul>
        </div>
    </div>
  </div>
</div>


                           </div>
                     
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
       
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>

      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
