@extends('layouts.patient-dashboard.main')
@section('content')

<Style>
    .card{
        width:900px;
        min-width:100%;
    }
    @media only screen and (max-width: 1024px) {
         .card{
        width:100%;
        min-width:100%;
    }   
    .row.paddingtop {
    display: inherit;
}
    }
</Style>

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
@include('widgets.patientSideBar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
                <div class="col-sm-12 col-md-12" id="content">
                    <div class="infobox">
                        <div class="row">
                            <div class="col-md-11 col-sm-11 col-xs-11">
                        <div class="billingsec">
                            <h3>My Orders</h3>
                        </div>

                    <div class="row paddingtop">
                        <div id="accordion">
                            @foreach($myConsultations as $key=>$consult)

                            <?php $myorder = DB::table('patient_orderlist')->where('testresult_by', '=', 'doctor')->where('consultation_id', $consult->id)->get(); ?>

                            <div class="card">
                              <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne{{$key}}">
                                  Consultation#{{$consult->id}}<br>
                                  Problem: {{$consult->problem}}<br>
                                  Date: {{$consult->date}}
                                </a>
                              </div>
                              <div id="collapseOne{{$key}}" class="collapse @if($key == 0) show @endif" data-parent="#accordion">
                                <div class="card-body">
                                    @if(count($myorder) != '')
                                    @foreach($myorder->chunk(4) as $order)
                                     <div class="row paddingtop">
                                    @foreach($order as $value)
                                     <?php
                                     $doctor= DB::table('profiles')->where('user_id',$value->doctor_id)->first();
                                    $doctor_name=$doctor->name;
                                     ?>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="orderbox">
                                                
                                                <img src="{{asset('images/pdf.jpg')}}" class="img-responsive pdf" alt="img">
                                                <h5>{{$value->text}}</h5>
                                                <p>{{date_format(date_create($value->updated_at),"F d, Y")}}</p>
                                                <a href="{{asset($value->file)}}" download>DOWNLOAD PDF</a>
											
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="row paddingtop">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                               <h4 id="not_available">No Orders Available</h4>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                              </div>
                            </div>
                            @endforeach
                            <!-- <div class="card">
                              <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                Collapsible Group Item #2
                              </a>
                              </div>
                              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                              </div>
                            </div> -->
                            <!-- <div class="card">
                              <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                  Collapsible Group Item #3
                                </a>
                              </div>
                              <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                              </div>
                            </div> -->
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
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->



@endsection
@section('css')
<style>
/* accordion */
.card-header{
          display: block;
    width: 100%;
    font-size: 15px;
    font-weight: 500;
    color: #000;
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 5px 20px;
    background: #cbc9ca;
}

.card-header:hover{
    background: #005990;
    color: #fff;
}

.card-link{
    color: #000;
}
.card-link:hover{
    color: #fff;
}

.collapse{
    background-color: #fff;
}

#h5_style{
    font-size: 16px; 
    text-align: unset;
    margin-left: 15px;
}
 
.main_list li {
        list-style-type: square;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
}
.main_list{
    margin-top: 12px!important;
      margin-left: 36px;
      line-height: 29px;
}

.card{
margin-bottom: 4px;
}
/* accordion */

#not_available{
    color: #8c0001;
}


/*header*/
.navbar {
    position: fixed!important;
}


@media only screen and (max-width: 600px) {
.nav {
    display: inherit !important;
}
}
</style>
@endsection

@section('js')
<!-- /* accordion */ -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- /* accordion */ -->

<script type="text/javascript"></script>
@endsection
