
<input type="hidden" name="user_id" value="{{$patient->user_id}}">
<input type="hidden" name="id" value="{{$patient->id}}">



   <h2>Personal Information</h2>                                 
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('fname') ? 'has-error' : ''}}">
    {!! Form::label('fname', 'Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="text" id="fname" class="form-control" placeholder="Patient Name" name="fname" value="{{$patient->fname}}">
        {!! $errors->first('fname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('lname') ? 'has-error' : ''}}">
    {!! Form::label('lname', 'Last Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="text" class="form-control" placeholder="Patient Last Name" name="lname" value="{{$patient->lname}}">
        {!! $errors->first('lname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('DOB') ? 'has-error' : ''}}">
    {!! Form::label('DOB', 'DOB', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="date" class="form-control" placeholder="DOB" name="DOB" value="{{$patient->DOB}}" max="{{date("Y-m-d")}}">
        {!! $errors->first('DOB', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Gender') ? 'has-error' : ''}}">
    {!! Form::label('Gender', 'Gender', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
       <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Gender</label>
                    
                                       <ul>
                    @if($patient->Gender == male)
                       <li class="dis_in_block"><label><input type="radio" 

                        name="Gender"  value="male" checked >Male</label></li>
                          <li class="dis_in_block"><label><input type="radio"                                    
                        name="Gender" value="female">Female</label></li>
                      @elseif($patient->Gender == female)
                       <li class="dis_in_block"><label><input type="radio" 

                                          name="Gender"  value="male">Male</label></li>
                                          <li class="dis_in_block" ><label><input type="radio"                                    
                                            name="Gender" value="female" checked>Female</label></li>
                      @else
                     <li class="dis_in_block"><label>
                      <input type="radio" name="Gender" class="rdSelect" value="male" checked="">Male</label></li>
                       <li class="dis_in_block"><label><input type="radio"                                    
                        name="Gender" class="rdSelect"  value="female" >Female</label></li>
                        @endif
                        
                                       </ul>
                                    </div>
                                 </div>
        {!! $errors->first('Gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('material_status') ? 'has-error' : ''}}">
    {!! Form::label('material_status', 'Marital Status', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
      <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="radio_btns">
                                   
 @if($patient->material_status == Single)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Single" checked >Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Married">Married</label></li>
                                       </ul>
 @elseif($patient->material_status == Married)
    <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Single" >Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="marital_status_id" value="Married" checked>Married</label></li>
                                       </ul>
  @else
     <ul>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="Ismarital" value="Single" checked>Single</label></li>
                                          <li class="dis_in_block"><label><input type="radio" name="material_status" class="Ismarital" value="Married" >Married</label></li>
                                       </ul>
   @endif
                                    </div>
        
                                 </div>
        {!! $errors->first('material_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Weight') ? 'has-error' : ''}}">
    {!! Form::label('Weight', 'Weight', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="number" class="form-control" placeholder="Weight" name="email" value="{{$patient->Weight}}" readonly="">
        {!! $errors->first('Weight', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('height') ? 'has-error' : ''}}">
    {!! Form::label('height', 'Height', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="number" class="form-control" placeholder="height" name="email" value="{{$patient->height}}" readonly="">
        {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Bmi') ? 'has-error' : ''}}">
    {!! Form::label('Bmi', 'Bmi', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="number" class="form-control" placeholder="Bmi" name="Bmi" value="{{$patient->Bmi}}" readonly="">
        {!! $errors->first('Bmi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

 <h2>Contact Information</h2>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="number" class="form-control" placeholder="Phone" name="phone" value="{{$patient->phone}}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" name="email" value="{{$patient->email}}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Address') ? 'has-error' : ''}}">
    {!! Form::label('Address', 'Address', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input type="text" class="form-control" placeholder="Address" name="Address" value="{{$patient->Address}}">
        {!! $errors->first('Address', '<p class="help-block">:message</p>') !!}
    </div>
</div>
    <h2>Allergies</h2>
        

                                <?php
                              $allergies = json_decode($patient->allergies);
                              //dd($allergies);
                              ?>
 <div class="col-md-12">
         <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you allergic to any medication or do you have any type of allergies?</label>
                    @if($patient->Is_allergies == "yes")
              
                     <ul>
                                          <li class="dis_in_block"><label><input  id="if" type="radio" value="yes" name="Is_allergies" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input  id="if" type="radio" value="no" name="Is_allergies" >No</label></li>
                                       </ul>
                     @elseif($patient->Is_allergies == "no")
                   
                     <ul>
                                          <li class="dis_in_block"><label><input id="elseif" type="radio" value="yes" name="Is_allergies" >Yes</label></li>
                                          <li class="dis_in_block"><label><input  id="elseif" type="radio" value="no" name="Is_allergies" checked>No</label></li>
                                       </ul>
                     @else
                 
                                      <ul>
                         <!--  <input type="hidden" id="check_allergy" value="" name="Is_allergies"> -->
                                          <li class="dis_in_block"><label><input type="radio" id="yes" value="yes" name="Is_allergies">Yes</label></li>
                                          <li class="dis_in_block"><label><input  type="radio" id="no" value="no" name="Is_allergies" checked>No</label></li>
                                       </ul> 
                     
                     @endif
                                    </div>
                                 </div>  
                
                                  <!---extra answer----->
                                
                        @if($patient->Is_allergies == "yes")

                
                       <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="allergies_records">
                      @foreach($allergies as $value)
                  
                          <input type="text" id="Yes_Answer" name="allergies[0]" class="form-control" value="{{$value}}" class="YesaddHide" >
                        
                        
                       @endforeach
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div> 
              @endif
                               <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="allergies_records">
                                             <input type="text" id="Answer" class="form-control" name="allergies[0]" style=""  class="addHide" placeholder="Allergies"> 
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                </div>
                                    </div>
                                 </div>
                              </div>
                                 <div class="allergies_records_dynamic"></div>
                              
                                 <div class="col-md-6">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-allergies" href="javascript:void(0);" data-index="1" id="hide_btn1" class="addHide">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              
                                  <!-----end--->
                              </div>
        {!! $errors->first('allergies', '<p class="help-block">:message</p>') !!}


         <h2>Past Medical History</h2>
  <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('past_medical_history') ? 'has-error' : ''}}">
       <!--  {!! Form::label('past_medical_history', 'Past Medical History', ['class' => 'col-md-12 control-label']) !!} -->
           <div class="col-md-12">
                 <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all the medical conditions you have been previously diagnosed with:</label>
                                    </div>
                                 </div>
                                    <?php
              
                        $past_medical_history = json_decode($patient->past_medical_history);
                       //dd($past_medical_history);
                        ?> 
                    @if($patient->past_medical_history != '')
                    @foreach($past_medical_history as $key => $value)
                      <!--  <input type="hidden" id="key" name="key" value="{{$key}}" > -->
                       <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="Pastmedical_records">
                      
                                             <input type="text" data-key="{{$key}}" class="form-control" name="past_medical_history[{{$key}}]" style="" value="{{$value}}" >
                        
                       <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach

                               <div class="Pastmedical_records_dynamic"></div>
                              
                                 <div class="col-md-6">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-Pastmedical" href="javascript:void(0);" data-index="1" id="hide_btn1" class="addmore">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                    @endif

                    @if($patient->past_medical_history == '')
                 <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="Pastmedical_records">
                  
                  <input type="text" name="past_medical_history[0]" class="form-control" placeholder="Past Medical history" required="">
                      
                     </div>
                                    </div>
                                 </div>
                              </div>
                      
                             

                                 <div class="Pastmedical_records_dynamic"></div>
                              
                                 <div class="col-md-6">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-Pastmedical" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                                    @endif
           
                 
                              </div>
            {!! $errors->first('past_medical_history', '<p class="help-block">:message</p>') !!}

        </div>
    </div>

      <h2>Past surgical History</h2>

    <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Surgeries1') ? 'has-error' : ''}}">

        <div class="col-md-12">
            <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all surgical operations you have had:</label>
                                    </div>
                                 </div>
                
                            <?php
                 $surgical_history = json_decode($patient->Surgeries1);
                      // dd($surgical_history);
               
                        ?> 
            @if($patient->Surgeries1 != '')
              @foreach($surgical_history as $value)
                  <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="surgical_records">
                      
                                             <input type="text" class="form-control" name="Surgeries1[0]" value="{{$value}}" >
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>    
              @endforeach
              
              
              @else
                
                         <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="surgical_records"> 
                  
                    
                      <input type="text" name="Surgeries1[0]" class="form-control" placeholder="Past Surgical history"  required="">
                     
                                        </div>
                                    </div>
                                 </div>
                              </div>
               
                            @endif
            
                                 <div class="surgical_records_dynamic"></div>
                              
                                 <div class="col-md-6">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-surgical" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                                
                              </div>
            {!! $errors->first('Surgeries1', '<p class="help-block">:message</p>') !!}
            <div class="form-group row justify-content-center">
    
</div>
        </div>
    </div>



<h2>Family History</h2>


<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('family_medical_condition') ? 'has-error' : ''}}">

        <div class="col-md-12">
            <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all the medical conditions in your family (Parents and Siblings).</label>
                                    </div>
                                 </div>
                      <?php
              
                        $family = json_decode($patient->family_medical_condition);
                      // dd($currentmedication);
                        ?>  
                @if($patient->family_medical_condition != '')
                @foreach($family as $value)
                 
                                 <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <input type="text"  class="form-control" name="family_medical_condition[0]" value="{{$value}}" >
                                    </div>
                                 </div> 
                              </div>
                @endforeach
                
                @else
                  
                        <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                  
                    
                       <input type="text" class="form-control" name="family_medical_condition[0]" placeholder="family Medical Conditions" required="">
                      
                  </div>
                                 </div> 
                              </div>
               
                
                            @endif
                 
                        
                                   <div class="family_records_dynamic"></div>
                              
                                 <div class="col-md-6">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-family" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                
                              </div>
            {!! $errors->first('family_medical_condition', '<p class="help-block">:message</p>') !!}
                
        </div>
    </div>




<h2>Social History</h2>
<div class="step_content_wrap">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do You Smoke Tobacco?</label>
                     @if($patient->do_you_smoke == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_you_smoke" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_you_smoke">No</label></li>
                                       </ul>
                     @elseif($patient->do_you_smoke == no)
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_you_smoke">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_you_smoke" checked>No</label></li>
                                       </ul>
                  @else
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" class="do_you_smoke" value="yes" name="do_you_smoke" required="">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" class="do_you_smoke" value="no" name="do_you_smoke" required="">No</label></li>
                                       </ul>
                  @endif
                     
                     
                     
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do You drink Alcohol?</label>
                     @if($patient->do_u_Alcohol == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_Alcohol" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_Alcohol">No</label></li>
                                       </ul>
                     @elseif($patient->do_u_Alcohol == no)
                     <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_Alcohol">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_Alcohol" checked>No</label></li>
                                       </ul>
                     @else
                       <ul>
                        <li class="dis_in_block"><label><input type="radio" class="do_u_Alcohol" value="yes" name="do_u_Alcohol">Yes</label></li>
              <li class="dis_in_block"><label><input type="radio" class="do_u_Alcohol" value="no" name="do_u_Alcohol">No</label></li>
                                       </ul>
                     @endif
                                    </div>
                                 </div>   

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do You Use Any Recreational Drugs Like Marijuana?</label>
                     @if($patient->do_u_marijuana == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_marijuana" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_marijuana">No</label></li>
                                       </ul>
                     @elseif($patient->do_u_marijuana == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="do_u_marijuana">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="do_u_marijuana" checked>No</label></li>
                                       </ul>
                     @else
                    <ul>
                      <li class="dis_in_block"><label><input type="radio" class="do_u_marijuana" value="yes" name="do_u_marijuana">Yes</label></li>
                     <li class="dis_in_block"><label><input type="radio" class="do_u_marijuana" value="no" name="do_u_marijuana">No</label></li>
                                       </ul>
                     @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you employed?</label>
                      @if($patient->are_you_employed == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input class="are_you_employed" type="radio" value="no" name="are_you_employed">No</label></li>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="yes" name="are_you_employed" checked>Yes</label></li>
                                       </ul>
                     @elseif($patient->are_you_employed == no )
                        <ul>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="yes" name="are_you_employed">Yes</label></li>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="no" name="are_you_employed" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="yes" name="are_you_employed">Yes</label></li>
                                          <li class="dis_in_block"><label><input class="are_you_employed"  type="radio" value="no" name="are_you_employed">No</label></li>
                                       </ul>
                       @endif
                                    </div>
                                 </div>
                                 @if($patient->are_you_employed == yes)
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_hide">Job Title</label>
                                       <input type="text"id="job"  name="job_title" placeholder="job title" class="form-control" value="{{$patient->job_title}}" >
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_employer">Employer name</label>
                                       <input type="text" id="emp_name" name="employee_name" class="form-control" placeholder="employee name"  value="{{$patient->employee_name}}">
                                    </div>
                                 </div>
                                 @else
                                         <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_hide">Job Title</label>
                                       <input type="text" id="job" name="job_title" class="form-control" placeholder="job title" value="{{$patient->job_title}}" >
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label id="label_employer">Employer name</label>
                                       <input type="text" id="emp_name" class="form-control" name="employee_name" placeholder="employee name"  value="{{$patient->employee_name}}">
                                    </div>
                                 </div>
                                 @endif
                                
                              </div>



                              <h2>Current medication</h2>


                              <div class="col-md-12">
            
            <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>List all active medications you take</label>
                                    </div>
                                 </div>
                <?php
              
                        $currentmedication = json_decode($patient->Current_medication1);
                      // dd($currentmedication);
                        ?>   
                @if($patient->Current_medication1 != '')
                @foreach($currentmedication as $value)
               <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="customer_records">
                                             <input type="text" class="form-control" name="Current_medication1[0]" value="{{$value}}" >
                                             <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>
                
                @endforeach
                
                @else
                  
                <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                        <div class="customer_records">
                  
                       <input type="text" name="Current_medication1[0]" class="form-control" placeholder="Current Medication" >
                      
                      <!-- <textarea rows="10" name="Current_medication1"></textarea> -->
                                        </div>
                                    </div>
                                 </div>
                              </div>
                @endif
              
                                 <div class="customer_records_dynamic"></div>
                              
                                 <div class="col-md-6">
                                    <div class="rigistertionlist">
                                          <a id="extra-fields-customer" href="javascript:void(0);" data-index="1" id="hide_btn1">Add More</a>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>


                                 </div>

            {!! $errors->first('Current_medication1', '<p class="help-block">:message</p>') !!}
        </div>

        <br>
<h2>Blood Type:</h2>
      <div class="col-md-12">
        <div class="step_content_wrap">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>Please check your blood group (leave blank if you don't know)</label>
                                    </div>
                                 </div>
                              
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                      
                                       <select name="blood_type" class="form-control">
                                          <option value="" disabled>
                                             Select Your Blood Group
                                          </option>
                                          @if($patient->blood_type == "A+")
                                          <option value="A+" selected="">
                                             A+
                                          </option>
                                          @else
                                             <option value="A+">
                                             A+
                                          </option>
                                          @endif
                                          @if($patient->blood_type == "A-")
                                          <option value="A-" selected="">
                                             A-
                                          </option>
                                          @else
                                             <option value="A-">
                                             A-
                                          </option>
                                          @endif
                                          @if($patient->blood_type == "B+")
                                          <option value="B+" selected="">
                                             B+
                                          </option>
                                          @else
                                             <option value="B+">
                                             B+
                                          </option>
                                          @endif
                                          @if($patient->blood_type == "B-")
                                          <option value="B-" selected="">
                                             B-
                                          </option>
                                          @else
                                          <option value="B-">
                                             B-
                                          </option>
                                          @endif

                                           @if($patient->blood_type == "AB+")
                                          <option value="AB+" selected="">
                                             AB+
                                          </option> 
                                          @else
                                           <option value="AB+">
                                             AB+
                                          </option>
                                          @endif

                                            @if($patient->blood_type == "AB-")
                                          <option value="AB-" selected="">
                                             AB-
                                          </option>
                                          @else
                                          <option value="AB-">
                                             AB-
                                          </option>
                                          @endif
                                           @if($patient->blood_type == "O+")  
                                          <option value="O+" selected="">
                                             O+
                                          </option>
                                          @else
                                              <option value="O+">
                                             O+
                                          </option>
                                          @endif
                                          @if($patient->blood_type == "O-")
                                          <option value="O-" selected="">
                                             O-
                                          </option>
                                          @else
                                           <option value="O-">
                                             O-
                                          </option>
                                          @endif
                                       </select>
                                    </div>
                                 </div>
                                    
            
                              </div>

    </div>


<br>
<h2>Self Assessment</h2>
      <div class="col-md-12">
        <div class="step_content_wrap">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any type of daily pain?</label>
                     @if($patient->daily_pain == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="daily_pain" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="daily_pain">No</label></li>
                                       </ul>
                     @elseif($patient->daily_pain == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="daily_pain">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="daily_pain" checked>No</label></li>
                                       </ul>
                     @else
                     <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="daily_pain">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="daily_pain">No</label></li>
                                       </ul>  
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have hearing or speaking impairment?</label>
                     @if($patient->impairment == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="impairment" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="impairment">No</label></li>
                                       </ul>
                     @elseif($patient->impairment == no)
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="impairment">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="impairment" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="impairment">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="impairment">No</label></li>
                                       </ul>
                     @endif
                     
                                    </div>
                                 </div>   

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have visual impairment?</label>
                     @if($patient->visual == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="visual" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="visual">No</label></li>
                                       </ul>
                     @elseif($patient->visual == no)
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="visual">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="visual" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="visual">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="visual">No</label></li>
                                       </ul> 
                     @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you on Dialysis</label>
                     @if($patient->dialysis == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="dialysis" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="dialysis">No</label></li>
                                       </ul>
                     @elseif($patient->dialysis == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="dialysis">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="dialysis" checked>No</label></li>
                                       </ul>
                    @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="dialysis">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="dialysis">No</label></li>
                                       </ul>
                     @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have cancer or have you ever had cancer?</label>
                     @if($patient->cancer == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="cancer" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="cancer">No</label></li>
                                       </ul>
                     @elseif($patient->cancer == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="cancer">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="cancer" checked>No</label></li>
                                       </ul>
                     @else
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="cancer">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="cancer">No</label></li>
                                       </ul> 
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any organ transplant?</label>
                     @if($patient->transplant == yes )
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="transplant" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="transplant">No</label></li>
                                       </ul>
                     @elseif($patient->transplant == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="transplant">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="transplant" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="transplant">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="transplant">No</label></li>
                                       </ul>
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any amputation?</label>
                     @if($patient->amputation == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="amputation" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="amputation">No</label></li>
                                       </ul>
                     @elseif($patient->amputation == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="amputation">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="amputation" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="amputation">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="amputation">No</label></li>
                                       </ul>
                    @endif
                      
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have any psychiatric illness?</label>
                     @if($patient->psychiatric == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="psychiatric" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="psychiatric">No</label></li>
                                       </ul>
                     @elseif($patient->psychiatric == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="psychiatric">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="psychiatric" checked>No</label></li>
                                       </ul>
                     @else
                        <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="psychiatric">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="psychiatric">No</label></li>
                                       </ul>
                  @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Do you have a heart device?</label>
                     @if($patient->heart == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="heart" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="heart">No</label></li>
                                       </ul>
                     @elseif($patient->heart == no)
                         <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="heart">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="heart" checked>No</label></li>
                                       </ul>
                     @else
                    <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="heart">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="heart">No</label></li>
                                       </ul>
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio_btns">
                                       <label>Are you on Insulin, chemotherapy or any immune suppressing medication?</label>
                     @if($patient->insulin == yes)
                                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="insulin" checked>Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="insulin">No</label></li>
                                       </ul>
                     @elseif($patient->insulin == no)
                      <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="insulin">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="insulin" checked>No</label></li>
                                       </ul>
                     @else
                       <ul>
                                          <li class="dis_in_block"><label><input type="radio" value="yes" name="insulin">Yes</label></li>
                                          <li class="dis_in_block"><label><input type="radio" value="no" name="insulin">No</label></li>
                                       </ul>
                    @endif
                                    </div>
                                 </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="rigistertionlist">
                                       <label>Note: A score of 3 or more should be reported as complex <!-- on the self assessment, 3 or less should be not complex --></label>
                                    </div>
                                 </div>
                                    
        
                                 
                
                              </div>
</div>
<br>
<h2>Upload Profile Picture</h2>
<div class="form-group row justify-content-center  {{ $errors->has('pic') ? 'has-error' : ''}}">
    {!! Form::label('pic', 'Image', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">

      <div class="max-text">
        <img alt="" class="img-responsive" id="banner1" 
        src="{{ isset($patient)?asset($patient->pic):asset('images/upload.jpg') }}" style=" width: 30%; "> 
        <br/>
      </div>
        <br/>
        {!! Form::file('pic', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pic', '<p class="help-block">:message</p>') !!}
        <div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

    </div>
</div>



<!-- <div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
 -->


<style type="text/css">
	
li{
	text-decoration: none;
}

input[type=number] {
  -moz-appearance: textfield;
}
.rigistertionlist a {
    color: #fff;
    background-color: #056bad;
    padding: 20px 30px;
    display: inline-block;
    margin-top: 20px;
    font-size: 18px !important;
    font-family: 'Calibri';
    line-height: 0px;
}

ul {
    list-style: none;
}

.rigistertionlist {
    margin-top: 4px;
}


#paid{
margin-left: 24%;
  
}
li {
    list-style: none;
}
.red {
    color:red;
}


.pres_complain .container {
    width: auto;
}


.uplod_imag .container {
    width: auto !important;
}

.uplod_imag .carousel-inner img {
    height: 180px;
    object-fit: cover;
}

a.delete_css {
    position: absolute;
    background: red;
    padding: 5px 10px;
    color: #fff;
    font-weight: 800;
}

.gallery_css {
    width: 24%;
    float: left;
    margin: 0px 4px;
}
/*.ecc_card_wrap .logo img {*/
/*    padding: 0px 50px;*/
/*    margin: auto;*/
/*}*/

.ecc_card_wrap .logo {
    padding: 0;
}




.modal-dialog {
    border: 8px solid #0076c0 !important;
    border-radius: 2px;
    border-color: #0076c0;
    }


.client_main_info input{

    font-size: 18px;
    color: #000;
    font-weight: 700;
    border: 0
  }


  button.viewbtn {
    border: 0px;
    margin: 0 7px;
    background-color: #00599054 !important;
    color: #005990 !important;
}
#step-13 .modal-content{
    background-image: url(http://custom-webdevelopment.com/drip/public/images/water-mark.png);
    background-size:auto;
    background-position:center;
    background-color:#fff;
    background-repeat:no-repeat;
}
.upld_img.text-center {
    width:60%;
    margin:30px auto 0;
}
.upld_img {
    border: 1px solid #9b9b9b;
    border-radius: 8px;
    padding: 30px 0px;
    font-family: 'Poppins';
    margin-bottom: 30px;
 
   
}
.qr_code ul li:last-child img {
    width: 68%;
    margin: 0 auto;
}
.upld_img.text-center {
    margin: auto;
    width: 32%;
    border: 2solid #9b9b9b;
    padding: 17px;
}


img{
  max-width:180px;
  /*height: 140px;*/
}
input[type=file]{
padding:10px;
}

button.btn.btn-default.prevBtn.btn-lg.pull-left {
    color: #fff;
    background-color: #056bad;
    padding: 20px 30px;
    display: inline-block;
    margin-top: 20px;
    font-size: 18px !important;
    font-family: 'Calibri';
    line-height: 0px;
    margin-left: 15px;
}
#bckbtn{
margin-right: 35%;  
  
}
#errmsg
{
color: red;
}
#BMI_msg
{
color: red;
}

.hide_yes{

  display: none;
}
</style>



@push('js')





<script type="text/javascript">
  
  $(document).ready(function () {
   $("#Answer").hide();
   $(".addHide").hide();

$("input[name='Is_allergies']").change(function(){

   if($(this).val()=="yes")
   {
      $("#Answer").show();
      $("#Answer").attr('required', '');
      $(".addHide").show();
      $("YesaddHide").show();
      $("#Yes_Answer").show();
   }
   else if($(this).val()=="no")
   {

       $("#Yes_Answer").hide();
       $("#Answer").hide();
       $("#Answer").removeAttr('required', '');
       $(".addHide").hide();
       $(".YesaddHide").hide();

        
   }

});

});
</script>

<script type="text/javascript">
  
  $(document).ready(function () {
  $("#job").hide();
  $("#emp_name").hide();
  $("#label_hide").hide();
  $("#label_employer").hide();

$(".are_you_employed").change(function(){

   if($(this).val()=="yes")
   {
      $("#job").show();
      $("#label_hide").show();
     $("#label_employer").show();
      $("#emp_name").attr('required', '');
      $("#job").attr('required', '');
      $("#emp_name").show();
   }
   else if($(this).val()=="no")
   {        
        alert('test');
        $("#label_hide").hide();
        $("#label_employer").hide();
       $("#job").hide();
       $("#emp_name").hide();
    
       $("#emp_name").removeAttr('required', '');
       $("#job").removeAttr('required', '');
       $(".addHide").hide();

        
   }

});

});
</script>
<script type="text/javascript">
	

////////////Allergies/////////////////////////
$("#extra-fields-allergies").click(function(){
   var index = $("#extra-fields-allergies").attr('data-index');

   var html = '<div class="row"><div class="col-md-6 col-sm-6 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="allergies_records">';
   html += '<input type="text" name="allergies['+index+']" class="form-control" placeholder="Allergies" required>';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-allergies">Remove</a></div></div>';
   index++;
   $(".allergies_records_dynamic").append(html);
   $("#extra-fields-allergies").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});


///////CURRENT MEDICATION //////////////////////


$("#extra-fields-customer").click(function(){
   var index = $("#extra-fields-customer").attr('data-index');
   var html = '<div class="row"><div class="col-md-6 col-sm-6 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="customer_records">';
   html += '<input type="text" name="Current_medication1['+index+']" class="form-control" style="" placeholder="Current Medication">';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".customer_records_dynamic").append(html);
   $("#extra-fields-customer").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});

 $("#extra-fields-family").click(function(){
   var index = $("#extra-fields-family").attr('data-index');

   var html = '<div class="row"><div class="col-md-6 col-sm-6 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="family_records">';
   html += '<input type="text" name="family_medical_condition['+index+']" class="form-control" style="" placeholder="Family Medical Condition">';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".family_records_dynamic").append(html);
   $("#extra-fields-family").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});

 $("#extra-fields-Pastmedical").click(function(){
   var index = $("#extra-fields-Pastmedical").attr('data-index');
  // console.log(index);
  //var updated_index = $('#key').val();
     //console.log(updated_index);
   var html = '<div class="row"><div class="col-md-6 col-sm-6 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="Pastmedical_records">';
  
   html += '<input type="text"  class="form-control"  name="past_medical_history['+index+']" style="" placeholder="">';

   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".Pastmedical_records_dynamic").append(html);
   $("#extra-fields-Pastmedical").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});


 //surgical operations  history//
      $("#extra-fields-surgical").click(function(){
   var index = $("#extra-fields-surgical").attr('data-index');
   var html = '<div class="row"><div class="col-md-6 col-sm-6 col-xs-12">';
   html += '<div class="rigistertionlist">';
   html += '<div class="surgical_records">';
   html += '<input type="text" name="Surgeries1['+index+']" class="form-control" style="" >';
   html += '</div></div></div>';
   html += '<div class="col-md-2"><a href="javascript:void(0)"  class="remove_this_field btn btn-danger btn-remove-customer">Remove</a></div></div>';
   index++;
   $(".surgical_records_dynamic").append(html);
   $("#extra-fields-surgical").attr('data-index',index);
});


$(document).on('click', '.remove_this_field', function(e) {
  $(this).closest('div.row').remove();
});

</script>






@endpush



