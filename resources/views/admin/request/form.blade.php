<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('symtoms') ? 'has-error' : ''}}">
    {!! Form::label('symtoms', 'Symtoms', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('symtoms', null, ('' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('symtoms', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('attachments') ? 'has-error' : ''}}">
    {!! Form::label('attachments', 'Attachments', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('attachments', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('attachments', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('booking_type') ? 'has-error' : ''}}">
    {!! Form::label('booking_type', 'Booking Type', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('booking_type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('booking_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('time') ? 'has-error' : ''}}">
    {!! Form::label('time', 'Time', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('time', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
