@extends('layouts.physician-dashboard.main')
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="billingsec1">
                        <div class="row">
                          
                          <div class="col-md-7 col-sm-7 col-xs-12 ">
                           <div class="medicallist">
                               <ul class="pull-left">
  
  <li class="active"><a data-toggle="tab" href="#menu2">My Medical History</a></li>
</ul>

 <div class="clearfix"></div>
<div class="tab-content">
  
  <div id="menu2" class="tab-pane fade in active">
   <div class="medicalhistorybox1">
     <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="past_medical_history">
          <!--<input type="hidden" name="history_description[]" class="history_description">-->

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Medical History</h3>

         
           
              <a href="javascript:void()" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>

        </div>
        <div class="medicalhistorybox1body">
					<?php
              
            $past_medical_history = json_decode($patient_history->past_medical_history);
                      // dd($past_medical_history);
                    ?>

             			  
                 
					@foreach($past_medical_history as  $value)	
            @if($value == null)
            <ul>
          <li style="background-color: #edf3f6; display: none;" >
          <input  class="edit_pTag edit_pTag_mh" type="text" name="history_description[]" value="{{$value}}" >
          <a href="javascript:void()"  class="pull-right remove_this_mh"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </li> 
          </ul>
            @else

					<ul>
          <li style="background-color: #edf3f6;">
					<input  class="edit_pTag edit_pTag_mh" type="text" name="history_description[]" value="{{$value}}" >
          <a href="javascript:void()"  class="pull-right remove_this_mh"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</li> 
					</ul>
          @endif
					<!--<p class="edit_pTag">{{$value}}</p>-->
					 @endforeach
				
					
        </div>
    <button class="savebtn" id="update_btn">UPDATE</button>
      </form>
    </div>
      <div class="medicalhistorybox1">
         <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="Surgeries1">
         <!-- <input type="hidden" name="history_description[]" class="history_description">-->

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Past Surigical History</h3>
            <a href="javascript:void()" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
			  <?php
              
                        $surgical_history = json_decode($patient_history->Surgeries1);
                      // dd($surgical_history);
                        ?>
                <ul>
					
           <li>
		   @foreach($surgical_history as $value)	
       @if($value == null)
       <ul>
          <li style="background-color: #edf3f6; display: none">
          <input  class="edit_pTag edit_pTag_sur" type="text" name="history_description[]" value="{{$value}}" >
          <a href="javascript:void()"  class="pull-right remove_this_sur"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </li> 
          </ul>
       @else
		   <ul>
          <li style="background-color: #edf3f6;">
					<input  class="edit_pTag edit_pTag_sur" type="text" name="history_description[]" value="{{$value}}" >
          <a href="javascript:void()"  class="pull-right remove_this_sur"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</li> 
					</ul>
          @endif
		   @endforeach
		   </li> 
		   
      </ul>
        </div>
        <button class="savebtn" id="update_btn">UPDATE</button>
      </form>
    </div>
      <!-- <div class="medicalhistorybox1">
         <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="job_title">
  <input type="hidden" name="history_description" class="history_description">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Social History</h3>
            <a href="javascript:void()" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
        <div class="medicalhistorybox1body">
                <ul>
                  <li>
                    <p class="edit_pTag">{{$patient_history->job_title}}</p>
                  </li>
                </ul>
        </div>
        <button class="savebtn" id="update_btn">UPDATE</button>
      </form>
    </div> -->
      <div class="medicalhistorybox1">
         <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

         <!-- <input type="hidden" name="history_title" value="family_medical_condition">-->
          <input type="hidden" name="history_title" value="family_medical_condition">
		     <!--  <input type="hidden" name="history_title" value="mother_medical_condition">-->
         <!--  <input type="hidden" name="history_description[]" class="history_description"> -->

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Family History</h3>
            <a href="javascript:void()" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
             <?php
        $fam_cond = json_decode($patient_history->family_medical_condition);
   //dd($fam_cond);
        ?>
        <div class="medicalhistorybox1body">
               
				 @foreach($fam_cond as $value)
          <ul>
                 <li> 
               <input  class="edit_pTag edit_pTag_fam" type="text" name="history_description[]" value="{{$value}}" >
               <a href="javascript:void()"  class="pull-right remove_this_fam"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                 </li> 
                </ul>
                  @endforeach
				

        </div><!-- <div class="medicalhistorybox1body">
                <ul>
                 <li><p id="edit_pTag">{{$patient_history->mother_medical_condition}}</p></li> 
                </ul>

        </div> -->
        <button class="savebtn" id="update_btn">UPDATE</button>
      </form>
    </div>
      <div class="medicalhistorybox1">
         <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="allergies">
          <input type="hidden" name="history_description" class="history_description">

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Allergies</h3>
            <a href="javascript:void()" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
            <?php
        $allergies = json_decode($patient_history->allergies);
   //dd($fam_cond);
        ?>
        @if($allergies[0] == yes)
        <div class="medicalhistorybox1body">
             @foreach($allergies as $value)
             @if($value == yes)

                <ul style=" display: none">
        
                     <li><!-- <b>Are you allergic to any medication or do you have any type of allergies?</b> -->
                      <input  class="edit_pTag edit_pTag_allergy" type="text" name="history_description[]" value="{{$value}}" >
                      <a href="javascript:void()"  class="pull-right remove_this_allergy"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                     <!--  <p class="edit_pTag">{{$patient_history->allergies}}</p> -->
                    </li>
                
                </ul>
                @elseif($value == null)


                <ul style=" display: none">
				
                     <li><!-- <b>Are you allergic to any medication or do you have any type of allergies?</b> -->
                      <input  class="edit_pTag edit_pTag_allergy" type="text" name="history_description[]" value="{{$value}}" >
                      <a href="javascript:void()"  class="pull-right remove_this_allergy"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                     <!--  <p class="edit_pTag">{{$patient_history->allergies}}</p> -->
                    </li>
                
                </ul>
                @else
                <ul>
        
                     <li><!-- <b>Are you allergic to any medication or do you have any type of allergies?</b> -->
                      <input  class="edit_pTag edit_pTag_allergy" type="text" name="history_description[]" value="{{$value}}" >
                      <a href="javascript:void()"  class="pull-right remove_this_allergy"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                     <!--  <p class="edit_pTag">{{$patient_history->allergies}}</p> -->
                    </li>
                
                </ul>
                @endif
                 @endforeach
                  @endif
        </div>
        <button class="savebtn" id="update_btn">UPDATE</button>
      </form>
    </div>
      <div class="medicalhistorybox1">
        <form method="post" action="{{route('patient_medical_history_edit')}}">
          @csrf

          <input type="hidden" name="history_title" value="Current_medication1">
        <!--  <input type="hidden" name="history_description[]" class="history_description">-->

        <div class="medicalhistorybox1header">
            <h3 class="pull-left">Current Medications</h3>
            <a href="javascript:void()" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <div class="clearfix"></div>
        </div>
          <?php
        $data = json_decode($patient_history->Current_medication1);
     //dd($data);
        ?>
        <div class="medicalhistorybox1body">
                <ul>
				
                 <li>
				  @foreach($data as $value)
          @if($value == null)
          <ul>
          <li style="background-color: #edf3f6; display: none">
          <input  class="edit_pTag edit_pTag_medication" type="text" name="history_description[]" value="{{$value}}" >
          <a href="javascript:void()"  class="pull-right remove_this_medication"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </li> 
          </ul>
          @else
				   <ul>
          <li style="background-color: #edf3f6;">
					<input  class="edit_pTag edit_pTag_medication" type="text" name="history_description[]" value="{{$value}}" >
          <a href="javascript:void()"  class="pull-right remove_this_medication"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</li> 
					</ul>
          @endif
                   @endforeach</li>
				 
               
                </ul>
        </div>
        <button class="savebtn" id="update_btn">UPDATE</button>
        </form>
    </div>
  </div>
  
</div>
 </div>
                            
                          </div>

                          <div class="col-md-5 col-sm-5 col-xs-12">
                            
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
input.edit_pTag {
    border: none;
	background-color: #edf3f6;
}
.medicalhistorybox1body {
    background-color: #edf3f6;
    padding: 6px 13px;
    margin: 0 0 7px;
}

  #wrapper {
    padding-left: 225px;
    background: #e5e5e5;
}

.savebtn {
    color: #004e7e !important;
    border: 1px solid #004e7e;
    padding: 4px 20px;
    border-radius: 5px;
    font-size: 18px;
    line-height: 20px;
    font-weight: 600;
    display: none;
}

.savebtn:hover {
    background-color: #004e7e;
    color: rgb(239, 239, 239)!important;
}
@media only screen and (max-width: 600px) {
     #wrapper {
    padding-left:0px;
    background: #e5e5e5;
}
#page-wrapper {
    width: 100%;
    padding: 0;
    background-color: #fff;
    margin: 200px 0px;
}
.inputform li input{
    width:100%;
}
}
</style>
@endsection

@section('js')
<script type="text/javascript">

    $('.pull-right').click(function(){
      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('.edit_pTag').attr('contenteditable', 'true');

      $(this).closest('.medicalhistorybox1header').siblings('.savebtn').show();

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('li').css({"background-color": "white"});

      $(this).closest('.medicalhistorybox1header').siblings('.medicalhistorybox1body').find('ul').css({"border-style": "solid", "border-width": "thin", "border-color":"black"});

    });

    $('.savebtn').click(function(){
        var history_desc = $(this).siblings('.medicalhistorybox1body').find('.edit_pTag').text();
		//console.log($(this).siblings('.medicalhistorybox1body').find('.edit_pTag').text());
		// e.preventDefault();
        $(this).siblings('.history_description').val(history_desc);
 
        });





    $(".remove_this_mh").click(function(){
      $(this).closest("li").remove();
      var values = $(".edit_pTag_mh");
      var marg_values  = '';
      values.each(function(k,v){
        marg_values += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_medical_history_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            value : marg_values,
        },
        success: function(dataResult){
			//console.log(dataResult.status);
           // if(dataResult.status) {
              //   $.toast({
             //   heading: 'Success!',
              //  position: 'bottom-right',
              //  text:  dataResult,
              //  loaderBg: '#ff6849',
               // icon: 'success',
               // hideAfter: 3000,
              //  stack: 6
              //});
            //}
        }
      });
    });

    //////////////////surgical history///////////////////////////

    $(".remove_this_sur").click(function(){
      $(this).closest("li").remove();
      var surg_values = $(".edit_pTag_sur");
      var marg_surg_values  = '';
      surg_values.each(function(k,v){
        marg_surg_values += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_surgical_history_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            surg_value : marg_surg_values,
        },
        success: function(dataResult){
       // if(dataResult.status) {
             //    $.toast({
              //  heading: 'Success!',
              //  position: 'bottom-right',
              //  loaderBg: '#ff6849',
               //icon: 'success',
              //  hideAfter: 3000,
              // stack: 6
            //});
           // }
        }
      });
    });


    /////////////////family history///////////////
        $(".remove_this_fam").click(function(){
      $(this).closest("li").remove();
      var fam_values = $(".edit_pTag_fam");
      var marg_fam_values  = '';
      fam_values.each(function(k,v){
        marg_fam_values += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_family_history_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            fam_values : marg_fam_values,
        },
        success: function(dataResult){
			//console.log(dataResult);
           // if(dataResult.status) {
				
             //    $.toast({
             //   heading: 'Success!',
             //   position: 'bottom-right',
            ////    text:  dataResult,
             //   loaderBg: '#ff6849',
            //    icon: 'success',
            //    hideAfter: 3000,
            //    stack: 6
            //  });
           // }
        }
      });
    });

    /////////////////allergy history///////////////
        $(".remove_this_allergy").click(function(){
      $(this).closest("li").remove();
      var allergy = $(".edit_pTag_allergy");
      var marg_allergy  = '';
      allergy.each(function(k,v){
        marg_allergy += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_allergies_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            allergy : marg_allergy,
        },
        success: function(dataResult){
          //  if(dataResult =='deleted!','status') {
             //    $.toast({
             //   heading: 'Success!',
             //   position: 'bottom-right',
             //   text:  dataResult,
             //   loaderBg: '#ff6849',
             //   icon: 'success',
             //   hideAfter: 3000,
             //   stack: 6
             // });
           // }
        }
      });
    });

  /////////////////medication history///////////////
        $(".remove_this_medication").click(function(){
      $(this).closest("li").remove();
      var medication = $(".edit_pTag_medication");
      var marg_medication  = '';
      medication.each(function(k,v){
        marg_medication += $(this).val()+"~";
      });
      $.ajax({
        url: "{{url('patient_current_medication_delete')}}",
        type: "POST",
        cache: false,
        dataType : 'json',
        data:{
            _token:'{{ csrf_token() }}',
            medication : marg_medication,
        },
        success: function(dataResult){
            //if(dataResult =='deleted!','status') {
             ///    $.toast({
              //  heading: 'Success!',
              //  position: 'bottom-right',
              ///  text:  dataResult,
              ///  loaderBg: '#ff6849',
              //  icon: 'success',
              //  hideAfter: 3000,
             //   stack: 6
             // });
//}
        }
      });
    });

//////////////////////////////////////////////////
</script>


@endsection

