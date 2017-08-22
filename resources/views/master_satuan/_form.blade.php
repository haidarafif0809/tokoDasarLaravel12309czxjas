<div class="form-group{{ $errors->has('nama_satuan') ? ' has-error' : '' }}">
	{!! Form::label('nama_satuan', 'Nama Satuan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_satuan', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('nama_satuan', '<p class="help-block">:message</p>') !!}
	</div> 
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
</div>
