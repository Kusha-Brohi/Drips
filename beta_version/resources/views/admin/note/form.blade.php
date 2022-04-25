<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('Appearance') ? 'has-error' : ''}}">
    {!! Form::label('Appearance', 'Appearance', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('Appearance', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Appearance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('objective') ? 'has-error' : ''}}">
    {!! Form::label('objective', 'Objective', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('objective', null, ('' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('objective', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
