<?php
$speciality = DB::table('specialities')->get();

?>

<input type="hidden" name="customer_status" value="3">
<input type="hidden" name="Is_approved" value="Approved">
<input type="hidden" name="user_id" value="{{$doctor->id}}">
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        <input class="form-control" type="text" name="name" value="{{$doctor->name}}" required="">
      <!--   {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->

        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        <input class="form-control" type="text" name="email" value="{{$doctor->email}}" required="">
      <!--   {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
 
		<input type="password" name="password" class="form-control"  value="{{$doctor->password}}">
      
    </div>
</div>
    
                <h2> Physician Profile</h2>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('medical_school') ? 'has-error' : ''}}">
    {!! Form::label('medical_school', 'Medical school', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
         <input class="form-control" type="text" name="medical_school" value="{{$profile->medical_school}}" required="">
      <!--   {!! Form::text('medical_school', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        {!! $errors->first('medical_school', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('residency') ? 'has-error' : ''}}">
    {!! Form::label('residency', 'Residency', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
       <!--  {!! Form::text('residency', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        <input class="form-control" type="text" name="residency" value="{{$profile->residency}}" required="">
        {!! $errors->first('residency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

                                         <!--    <label>Speciality</label> -->
                                          

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Speciality') ? 'has-error' : ''}}">
    {!! Form::label('Speciality', 'Speciality', ['class' => 'col-md-12 control-label']) !!}
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
    {!! Form::label('price', 'Fee', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        <input class="form-control" type="number" name="price" value="{{$profile->price}}" required="">
      <!--   {!! Form::number('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('MDCN') ? 'has-error' : ''}}">
    {!! Form::label('MDCN', 'MDCN', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
      <!--   {!! Form::text('MDCN', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} -->
       <input class="form-control" type="text" name="MDCN" value="{{$doctor->MDCN}}" required="">
        {!! $errors->first('MDCN', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

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



    
</style>

<script type="text/javascript">
  
function myFunction() {
  var x = document.getElementById("mySelect").value;
  console.log(x);
}
</script>