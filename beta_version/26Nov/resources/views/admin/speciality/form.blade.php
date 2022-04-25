<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('symtom') ? 'has-error' : ''}}">
    {!! Form::label('symtom', 'symtom', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">

        <!-- multi select -->
        <?php $prodArr = isset($speciality)?explode(",",$speciality->symtom):array();  ?>

       
       @if($options)
        <select name="option[]" multiple="multiple"  class="js-example-tags form-control" id= "e2" >
              @foreach($options as $value)

                 <?php // if($lang->id)
                    $selected = '';
                    if (in_array($value->name, $prodArr)) { ?>

                         <option selected="selected" value="{{  $value->name }}">{{ $value->name}}</option>

                   <?php

                    } else {

                    ?>
                       <option  value="{{  $value->name }}">{{ $value->name }}</option>

                <?php

                    }

                 ?>
              @endforeach
        </select>
        @endif
        <!-- multi select -->


          {{--  {!! Form::text('symtom', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}   --}}


        {!! $errors->first('symtom', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
