<?php
$speciality = DB::table('specialities')->get();
$language = DB::table('languages')->get();
?>

<input type="hidden" name="customer_status" value="3">
<input type="hidden" name="Is_approved" value="Approved">
<input type="hidden" name="user_id" value="{{$doctor->id}}">
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-12 control-label">Name<span id="required_star">*</span>	</label>
    <div class="col-md-12">
        <input class="form-control" type="text" name="name" value="{{$doctor->name}}" required="">
		
	 <!--   {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->

        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
   <label for="email" class="col-md-12 control-label">Email<span id="required_star">*</span></label>
    <div class="col-md-12">
        <input class="form-control" type="text" name="email" value="{{$doctor->email}}" required="">
      <!--   {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-12 control-label">Password<span id="required_star">*</span></label>
    <div class="col-md-12">
 
		<input type="password" name="password" class="form-control"  value="{{$doctor->password}}">
      
    </div>
</div>
    
                <h2> Physician Profile</h2>
              <!--DOB--->
    <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('DOB') ? 'has-error' : ''}}">
   <label for="DOB" class="col-md-12 control-label">Date of Birth<span id="required_star">*</span></label>
    <div class="col-md-12">
         <input class="form-control" type="date" name="DOB" value="{{$profile->DOB}}" max="{{date("Y-m-d")}}" required="">
        {!! $errors->first('DOB', '<p class="help-block">:message</p>') !!}
    </div>
</div>
 <!--GENDER--->
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('gender') ? 'has-error' : ''}}">
   <label for="gender" class="col-md-12 control-label">Gender<span id="required_star">*</span></label>
    <div class="col-md-12">
        <select name="gender" class="form-control" id="selectgender">
                                                <option  disabled selected>Select Gender </option>
                                                @if($profile->gender == "Any")
                                              <option value="Any" selected="">Any</option>
                                              @else
                                              <option value="Any">Any</option>
                                              @endif
                                               @if($profile->gender == "male")
                                              <option value="male" selected="">Male</option>
                                              @else
                                              <option value="male">Male</option>
                                              @endif
                                               @if($profile->gender == "female")
                                              <option value="female" selected>Female</option>
                                              @else
                                              <option value="female">Female</option>
                                              @endif
                                            </select>
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>
  <!--Language--->
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('language') ? 'has-error' : ''}}">
   
	 <label for="language" class="col-md-12 control-label">Language<span id="required_star">*</span></label>
    <div class="col-md-12">
     <select name="language" class="form-control" id="language">
                                            <option  disabled selected>Select language </option>
                                            @if($profile->language == "Any")
                                              <option value="Any" selected="">Any</option>
                                              @else
                                              <option value="Any">Any</option>
                                              @endif
                                            @foreach($language as $value)
                                            @if($profile->language == "$value->name")
                                              <option value="{{$value->name}}" selected="">{{$value->name}}</option>
                                                @else
                                               <option value="{{$value->name}}" >{{$value->name}}</option>
                                               @endif
                                               @endforeach
                                           <!--   @if($profile->language == "english")
                                              <option value="english" selected="">English</option>
                                              @else
                                              <option value="english">English</option>
                                              @endif
                                                @if($profile->language == "spainish")
                                              <option value="spainish" selected="">Spanish</option>
                                              @else
                                                <option value="spainish">Spanish</option>
                                                @endif
                                                @if($profile->language == "chinese")
                                              <option value="chinese" selected="">Chinese</option>
                                              @else
                                              <option value="chinese">Chinese</option>
                                              @endif
                                                 @if($profile->language == "chinese")
                                              <option value="french" selected=>French </option>
                                              @else
                                               <option value="french">French </option>
                                               @endif
                                                 @if($profile->language == "urdu")
                                              <option value="urdu" selected="">Urdu</option>
                                              @else
                                                <option value="urdu">Urdu</option>
                                                @endif
                                                @if($profile->language == "korean")
                                              <option value="korean" selected="">Korean </option>
                                              @else
                                                <option value="korean">Korean </option>
                                                @endif -->
                                            </select>
        {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
    </div>
</div>
  
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('medical_school') ? 'has-error' : ''}}">

	 <label for="medical_school" class="col-md-12 control-label">Medical school<span id="required_star">*</span></label>
    <div class="col-md-12">
         <input class="form-control" type="text" name="medical_school" value="{{$profile->medical_school}}" required="">
      <!--   {!! Form::text('medical_school', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        {!! $errors->first('medical_school', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('residency') ? 'has-error' : ''}}">
    
	 <label for="Residency" class="col-md-12 control-label">Residency<span id="required_star">*</span></label>
    <div class="col-md-12">
       <!--  {!! Form::text('residency', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        <input class="form-control" type="text" name="residency" value="{{$profile->residency}}" required="">
        {!! $errors->first('residency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('phone') ? 'has-error' : ''}}">
  
	 <label for="Phone" class="col-md-12 control-label">Phone<span id="required_star">*</span></label>
    <div class="col-md-12">
       <input class="form-control" type="text" name="phone" value="{{$profile->phone}}" required="">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

                                         <!--    <label>Speciality</label> -->
                                          

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Speciality') ? 'has-error' : ''}}">
    
	 <label for="Speciality" class="col-md-12 control-label">Speciality<span id="required_star">*</span></label>
		
    <div class="col-md-12">
          <?php
                                                $expertise = $profile->Speciality;
                                               // dd($expertise);
                                            ?>
                                            <select class="form-control" name="speciality"  id="mySelect" onchange="myFunction()"  required>
                                             <!--<option value="{{Auth::user()->profile->expertise}}" disabled selected>Select Your Speciality </option>-->
                                            
                                              @foreach($speciality as $value)
												      <?php 
                                            if($expertise == $value->id){

                                              $selected = "selected";
                                          
                                            }
                                            else{
                                              $selected = '';
                                              
                                          }
                                          ?>			
                                              <option value="{{$value->id}}" {{$selected}}>{{$value->name}}</option>
                                              @endforeach
                                             
                                            </select>
        <!-- {!! Form::text('Speciality', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Speciality', '<p class="help-block">:message</p>') !!} -->
    </div>
</div>



<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Speciality') ? 'has-error' : ''}}">
   
	 <label for="price" class="col-md-12 control-label">Fee (₦ - Nigerian Naira)<span id="required_star">*</span></label>
    <div class="col-md-12">
        <input class="form-control" type="number" name="price" value="{{$profile->price}}" required="">
      <!--   {!! Form::number('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('MDCN') ? 'has-error' : ''}}">
  
	<label for="MDCN" class="col-md-12 control-label">MDCN<span id="required_star">*</span></label>
    <div class="col-md-12">
      <!--   {!! Form::text('MDCN', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
       <input class="form-control" type="text" name="MDCN" value="{{$doctor->MDCN}}" required="">
        {!! $errors->first('MDCN', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('pic') ? 'has-error' : ''}}">

		<label for="image" class="col-md-12 control-label">Profile Picture<span id="required_star">*</span></label>
    <div class="col-md-12">
        
      <div class="max-text">
        <img alt="" class="img-responsive" id="banner1" 
        src="{{ isset($profile)?asset($profile->pic):asset('images/upload.jpg') }}" style=" width: 30%; "> 
        <br/>
      </div>
        <br/>
        {!! Form::file('pic', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pic', '<p class="help-block">:message</p>') !!}
         <p class="text-danger">Upload only PNG | JPG | Size:1 MB file</p>
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


<style type="text/css">
    
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

span#required_star {
    color: red;
}

 body
{
  font-family: Arial, Sans-serif;
}
label.error
{
color:red;
font-family:verdana, Helvetica;
}
</style>


<script type="text/javascript">
  
function myFunction() {
  var x = document.getElementById("mySelect").value;
 // console.log(x);
}
</script>


