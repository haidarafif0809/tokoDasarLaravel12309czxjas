<div class="form-group{{ $errors->has('kode_pelanggan') ? ' has-error' : '' }}">
	{!! Form::label('kode_pelanggan', 'Kode Pelanggan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_pelanggan', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('kode_pelanggan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nama_pelanggan') ? ' has-error' : '' }}">
	{!! Form::label('nama_pelanggan', 'Nama Pelanggan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_pelanggan', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('nama_pelanggan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('level_harga') ? ' has-error' : '' }}">
	{!! Form::label('level_harga', 'Level Harga', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('level_harga', ['Level 1'=>'Level 1','Level 2'=>'Level 2','Level 3'=>'Level 3','Level 4'=>'Level 4','Level 5'=>'Level 5','Level 6'=>'Level 6','Level 7'=>'Level 7',], null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Pilih Level Harga']) !!}
		{!! $errors->first('level_harga', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('tanggal_lahir', null, ['class'=>'form-control datepicker','required','autocomplete'=>'off']) !!}
		{!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('no_telpon') ? ' has-error' : '' }}">
	{!! Form::label('no_telpon', 'Nomor Telpon', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_telpon', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('no_telpon', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
	{!! Form::label('alamat', 'Alamat', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('alamat', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
