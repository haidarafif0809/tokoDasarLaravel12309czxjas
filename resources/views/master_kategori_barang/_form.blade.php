<div class="form-group{{ $errors->has('nama_kategori_barang') ? ' has-error' : '' }}">
	{!! Form::label('nama_kategori_barang', 'Nama Kategori Barang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_kategori_barang', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('nama_kategori_barang', '<p class="help-block">:message</p>') !!}
	</div> 
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
</div>
