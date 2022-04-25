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
                        <div class="billingsec">
                            <h3>Scheduled</h3>
                           <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Doctor ID</th>
                                        <th>Doctor Name</th>
                                        <th>Consultation Type</th>
                                        <th>Consultation Select Time</th>
                                        <th>Consultation start Time</th>
                                        <th>Consultation End Time</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>65481</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65482</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                             <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65483</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                       <tr>
                                            <td><span>65484</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                             <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65485</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                             <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65486</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                            <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65487</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65488</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65489</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                       <tr>
                                            <td><span>65481</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65481</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                           <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65481</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                           <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65481</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                             <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>65481</span></td>
                                            <td>Leo Gill</td>
                                            <td class="online"><p>Online</p></td>
                                            <td>Oct 19, 2020</td>
                                            <td >04:00 PM (GMT-5)</td>
                                            <td class="date">04:45 PM (GMT-5)</td>
                                              <td class="downloadsec"><a href="#" class="viewbtn">VIEW</a><a href="#" class="startbtn">START MEETING</a><a href="#">CANCEL</a></td>
                                        </tr>
                                    </tbody>
                                </table>
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
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
