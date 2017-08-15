<div class="form-group{{ $errors->has('nama_suplier') ? ' has-error' : '' }}">
	{!! Form::label('nama_suplier', 'Nama Suplier', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_suplier', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('nama_suplier', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
	{!! Form::label('alamat', 'Alamat Suplier', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('alamat', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('no_telpon') ? ' has-error' : '' }}">
	{!! Form::label('no_telpon', 'Nomor Telpon', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_telpon', null, ['class'=>'form-control','autocomplete'=>'off']) !!}
		{!! $errors->first('no_telpon', '<p class="help-block">:message</p>') !!}
	</div>
</div> 

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
