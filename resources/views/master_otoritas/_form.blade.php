<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama Otoritas', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('name', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
	{!! Form::label('display_name', 'Display Nama Otoritas', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('display_name', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	{!! Form::label('description', 'Deskripsi', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('description', null, ['class'=>'form-control','autocomplete'=>'off']) !!}
		{!! $errors->first('description', '<p class="help-block">:message</p>') !!}
	</div>
</div> 

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
