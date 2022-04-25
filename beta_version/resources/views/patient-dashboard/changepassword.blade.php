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
                            <h3>Password Setting</h3>
                            <p>Please change your Password</p>
                            <form action="{{route('PatientDirectory')}}" method="Post" enctype="multipart/form-data" >
                                @csrf
                            <div class="profilebox1" >
                    		
                                <div class="row">
                                     <input type="hidden" name="fname" value="{{Auth::user()->patient->fname}}">
									   <input type="hidden" name="lname" value="{{Auth::user()->patient->lname}}">
         <input type="hidden" name="lname" value="{{Auth::user()->patient->lname}}" placeholder="Mark Manson">

          <input type="hidden" name="DOB" placeholder="" value="{{Auth::user()->patient->DOB}}">
          <input type="hidden" name="Gender" placeholder="" value="{{Auth::user()->patient->Gender}}">

           <input type="hidden" name="phone" placeholder="888-888-8888" value="{{Auth::user()->patient->phone}}">
           <input type="hidden" name="Address" value="{{Auth::user()->patient->Address}}" placeholder="25737 US Rt 11, Evans Mills NY 13637. 901 Route 110, Farmingdale NY 11735">
                                               <input type="hidden" name="email" value="{{Auth::user()->email}}" placeholder="markmenson@gmail.com">
                                    
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billinglist profilelist1">
                                                 <label>New Password</label>
                                               <input type="password" name="password" value="{{Auth::user()->password}}">
                                            </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billinglist profilelist1">
                                                 <label>Confirm Password</label>
                                                 <input type="password" name="password_confirmation" value="{{Auth::user()->password_confirmation}}" > 
                                            </div>
                                       </div>
                                       </div>

                                <div class="rigistertionlist1">
                             		<button>UPDATE Password</button>
                                </div>
                                
                                </div>
                            </form>
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
</div><!-- /#wrapper -->


@endsection
@section('css')
<style type="text/css">
	
.rigistertionlist1 button {
  float: left;
}

</style>

@endsection

@section('js')
<script type="text/javascript">


</script>

@endsection
