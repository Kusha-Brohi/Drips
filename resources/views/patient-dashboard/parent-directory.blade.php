@extends('layouts.patient-dashboard.main')
@section('content')


<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
@include('widgets.patientSideBar')
     <div class="prescriptionbox">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
                <div class="col-sm-12 col-md-12" id="content">
                    <div class="infobox">
                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="billingsec">
                            <h3>Profile Setting</h3>
                            <div class="profilebox1" >
                                 <form action="{{route('PatientDirectory')}}" method="Post" enctype="multipart/form-data" >
                                @csrf

                                @if(Auth::user()->patient->pic== null)
                                   
                                <img src="{{asset('images/no_image.jpg')}}" class="img-responsive profilepic" alt="img" style="width: 18%;">
                            <br>
                            <br>
                         
                            @else
                      
                            <img src="{{asset(Auth::user()->patient->pic)}}" class="img-responsive profilepic" alt="img" style="width: 18%;">
                            <br>
                            <br>
                            @endif
                                <h4></h4>
                         <input type="file" onchange="readURL(this);" name="pic" >
                            </div>
                            <div class="clearfix"></div>
                           
                          
                                <div class="row" >
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                            <label>Name</label>
                                            <input type="text" name="fname" value="{{Auth::user()->patient->fname}}">
                                        </div>
                                    </div>
									  <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                            <label>Last Name</label>
                                            <input type="text" name="lname"  value="{{Auth::user()->patient->lname}}">
                                        </div>
                                    </div>
									
                                 
                                </div>
                                <div class="row" >
                                    <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                            <label>Medical History</label>
                                            <input type="text" name="allergies" placeholder="Astama, Depression, Diabetes" value="{{Auth::user()->patient->allergies}}">
                                        </div>
                                    </div> -->
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                     <div class="billinglist profilelist1">
                                            <label>Email Address</label>
                                               <input type="email" name="email" value="{{Auth::user()->email}}" >
                                           </div>    
                                    </div>
									
									   <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist profilelist1">
                                            <label>Date of Birth</label>
                                            <input type="Date" name="DOB" placeholder=""  value="{{Auth::user()->patient->DOB}}" max="{{date("Y-m-d")}}">
                                        </div>
                                    </div>
                                     
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                       
                                       <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billinglist profilelist1">
                                                 <label>Password</label>
                                               <input type="password" name="password" value="{{Auth::user()->password}}">
                                            </div>
                                       </div> -->
                                       <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billinglist profilelist1">
                                                 <label>Confirm Password</label>
                                                 <input type="password" name="password_confirmation" value="{{Auth::user()->password_confirmation}}" > 
                                            </div>
                                       </div> -->
                                       <div class="col-md-6 col-sm-6 col-xs-12" >
                                           <div class="billinglist profilelist1">
                                            <label>Phone</label>
                                               <input type="number" name="phone"  value="{{Auth::user()->patient->phone}}">
                                           </div>
                                       </div>
                                       <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12" >
                                        <div class="genderlist profilelist2">
                   <label>Gender</label>
                   <ul> 

                        @if(Auth::user()->patient->Gender == Male)
                       <li><label><input type="radio" value="Male" name="Gender" checked="">Male</label></li>
                        <li><label><input type="radio" value="Female" name="Gender" >Female</label></li>
                        @elseif(Auth::user()->patient->Gender == Female)
                        <li><label><input type="radio" value="Male" name="Gender" >Male</label></li>
                        <li><label><input type="radio" value="Female" name="Gender" checked >Female</label></li>

                        @else
                         <li><label><input type="radio" value="Male" name="Gender" >Male</label></li>
                              <li><label><input type="radio" value="Female" name="Gender" >Female</label></li>
                        @endif
                         
                   </ul>
               </div>
                                    </div>	
                                    
                                </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12" >
                                        <div class="billinglist profilelist1">
                                                 <label>Address</label>
                                               <input type="text" name="Address" value="{{Auth::user()->patient->Address}}">
                                            </div>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                          <div class="rigistertionlist1">
                                              <button>UPDATE PROFILE</button>
                                          </div>
                                    </div>
                                </div>
                            </form>
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
</div><!-- /#wrapper -->


@endsection
@section('css')
<style type="text/css"></style>

@endsection

@section('js')
<script type="text/javascript">

  
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profilePic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }



</script>

@endsection
