@extends('layouts.patient-dashboard.main')
@section('content')


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
                            <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="billingsec">
                            <h3>Billing Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Card*</label>
                                            <input type="text" name="" placeholder="VISA WBE">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Card Number*</label>
                                            <input type="password" name="" placeholder="VISA WBE">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Card Holder*</label>
                                            <input type="text" name="" placeholder="Mark Manson">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Valid To*</label>
                                            <select><option>July</option></select>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="billinglist">
                                            <label>Valid To*</label>
                                            <select><option>2025</option></select>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                       <div class="col-md-8 col-sm-8 col-xs-12">
                                           <div class="billinglist">
                                            <label>Security Code*</label>
                                               <input type="password" name="">
                                           </div>
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="billinglist">
                                                <button>UPDATE BILLING INFORMATION</button>
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
