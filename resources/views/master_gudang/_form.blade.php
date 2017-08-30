<div class="form-group{{ $errors->has('kode_gudang') ? ' has-error' : '' }}">
	{!! Form::label('kode_gudang', 'Kode Gudang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_gudang', null, ['class'=>'form-control','placeholder'=>'Kode Gudang','required','autocomplete'=>'off']) !!}
		{!! $errors->first('kode_gudang', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nama_gudang') ? ' has-error' : '' }}">
	{!! Form::label('nama_gudang', 'Nama Gudang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_gudang', null, ['class'=>'form-control','placeholder'=>'Nama Gudang','required','autocomplete'=>'off']) !!}
		{!! $errors->first('nama_gudang', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>