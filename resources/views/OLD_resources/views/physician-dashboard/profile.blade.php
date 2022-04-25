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
                    <div class="col-md-11 col-sm-11 col-xs-12">
                      <div class="billingsec1">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
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
                            <div class="medicalhistorysec">
                              <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-12 no-margin">
                                  <div class="historybox">
                                    <div class="historyhead">
                                      <h3>Medical History</h3>
                                    </div>
                                    <ul>
                                      <li><a href="#">Astama</a></li>
                                      <li><a href="#">Sugar</a></li>
                                      <li><a href="#">Cancer</a></li>
                                      <li><a href="#">Blood Pressure</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12 no-margin">
                                  <div class="historybox">
                                    <div class="historyhead">
                                      <h3>Discription</h3>
                                    </div>
                                    <ul>
                                      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</a></li>
                                      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</a></li>
                                      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</a></li>
                                      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="previoussec">
                              <h4>Previous Consultation Notes</h4>
                              <div class="previousconsultationnotebox">
                                <h5 class="pull-left">Alesha Smith</h5>
                                <span class="pull-right">08 Dec 2020 02:12 AM</span>
                                <div class="clearfix"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed .
                                  do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate 
                                </p>
                              </div>
                              <div class="previousconsultationnotebox">
                                <h5 class="pull-left">Alesha Smith</h5>
                                <span class="pull-right">08 Dec 2020 02:12 AM</span>
                                <div class="clearfix"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed .
                                  do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate 
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="imageslisting">
                              <h5 class="pull-left">Images</h5>
                              <ul class="pull-right">
                                <li class="active"><a href="#">Images</a></li>
                                <li><a href="#"> PDF</a></li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="imageslisting1">
                              <img src="images/imageslisting.jpg" class="img-responsive" alt="img">
                              <a href="#">START MEETING</a>
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
