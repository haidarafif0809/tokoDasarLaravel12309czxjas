<div class="form-group{{ $errors->has('display_nama_setting_akun') ? ' has-error' : '' }}">
	{!! Form::label('display_nama_setting_akun', 'Nama Setting Akun', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('display_nama_setting_akun', null, ['class'=>'form-control','required','readonly','autocomplete'=>'off']) !!}
		{!! $errors->first('display_nama_setting_akun', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('id_akun') ? ' has-error' : '' }}">
	{!! Form::label('id_akun', 'Akun', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('id_akun', []+App\DaftarAkun::select([DB::raw('CONCAT(kode_daftar_akun, " - ", nama_daftar_akun) AS data_akun'),'id'])->pluck('data_akun','id')->all(), null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => '-']) !!}
		{!! $errors->first('id_akun', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>