<div class="form-group{{ $errors->has('kode_barcode') ? ' has-error' : '' }}">
	{!! Form::label('kode_barcode', 'Barcode', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_barcode', null, ['class'=>'form-control','placeholder'=>'Barcode','autocomplete'=>'off']) !!}
		{!! $errors->first('kode_barcode', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('kode_barang') ? ' has-error' : '' }}">
	{!! Form::label('kode_barang', 'Kode Produk', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_barang', null, ['class'=>'form-control','placeholder'=>'Kode Produk','required','autocomplete'=>'off']) !!}
		{!! $errors->first('kode_barang', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
	{!! Form::label('nama_barang', 'Nama Produk', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_barang', null, ['class'=>'form-control','placeholder'=>'Nama Produk','required','autocomplete'=>'off']) !!}
		{!! $errors->first('nama_barang', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('golongan_barang') ? ' has-error' : '' }}">
	{!! Form::label('golongan_barang', 'Golongan Produk', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('golongan_barang', 
		['Barang'=>'Barang',
		'Jasa'=>'Jasa'], 
		null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Silahkan Pilih']) !!}
		{!! $errors->first('golongan_barang', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('kategori_barangs_id') ? ' has-error' : '' }}">
	{!! Form::label('kategori_barangs_id', 'Kategori Produk', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('kategori_barangs_id', 
		[''=>'']+App\KategoriBarang::pluck('nama_kategori_barang','id')->all(),
		null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Silahkan Pilih']) !!}
		{!! $errors->first('kategori_barangs_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
	{!! Form::label('harga_beli', 'Harga', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-2">
		{!! Form::number('harga_beli', null, ['class'=>'form-control','placeholder' => 'Harga Beli','required','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_beli', '<p class="help-block">:message</p>') !!}
	</div>

	<div class="col-md-2">
		{!! Form::number('harga_jual', null, ['class'=>'form-control','required','placeholder' => 'Harga Jual Level 1','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
	</div>

</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
	{!! Form::label('', '', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-2">
		{!! Form::number('harga_jual2', null, ['class'=>'form-control','placeholder' => 'Harga Jual Level 2','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_jual2', '<p class="help-block">:message</p>') !!}
	</div>

	<div class="col-md-2">
		{!! Form::number('harga_jual3', null, ['class'=>'form-control','placeholder' => 'Harga Jual Level 3','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_jual3', '<p class="help-block">:message</p>') !!}
	</div>

</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
	{!! Form::label('', '', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-2">
		{!! Form::number('harga_jual4', null, ['class'=>'form-control','placeholder' => 'Harga Jual Level 4','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_jual4', '<p class="help-block">:message</p>') !!}
	</div>

	<div class="col-md-2">
		{!! Form::number('harga_jual5', null, ['class'=>'form-control','placeholder' => 'Harga Jual Level 5','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_jual5', '<p class="help-block">:message</p>') !!}
	</div>

</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
	{!! Form::label('', '', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-2">
		{!! Form::number('harga_jual6', null, ['class'=>'form-control','placeholder' => 'Harga Jual Level 6','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_jual6', '<p class="help-block">:message</p>') !!}
	</div>

	<div class="col-md-2">
		{!! Form::number('harga_jual7', null, ['class'=>'form-control','placeholder' => 'Harga Jual Level 7','autocomplete'=>'off']) !!}
		{!! $errors->first('harga_jual7', '<p class="help-block">:message</p>') !!}
	</div>

</div>

<div class="form-group{{ $errors->has('satuans_id') ? ' has-error' : '' }}">
	{!! Form::label('satuans_id', 'Satuan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('satuans_id', 
		[''=>'']+App\Satuan::pluck('nama_satuan','id')->all(),
		null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Silahkan Pilih']) !!}
		{!! $errors->first('satuans_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
	{!! Form::label('status', 'Status', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('status', 
		['Aktif'=>'Aktif',
		'Tidak Aktif'=>'Tidak Aktif'], 
		null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Silahkan Pilih']) !!}
		{!! $errors->first('status', '<p class="help-block">:message</p>') !!}
	</div>
</div>
  
<div class="form-group{{ $errors->has('limit_stok') ? ' has-error' : '' }}">
	{!! Form::label('limit_stok', 'Limit Stok', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('limit_stok', null, ['class'=>'form-control','placeholder' => 'Limit Stok','required','autocomplete'=>'off']) !!}
		{!! $errors->first('limit_stok', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('over_stok') ? ' has-error' : '' }}">
	{!! Form::label('over_stok', 'Over Stok', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('over_stok', null, ['class'=>'form-control','placeholder' => 'Over Stok','required','autocomplete'=>'off']) !!}
		{!! $errors->first('over_stok', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
