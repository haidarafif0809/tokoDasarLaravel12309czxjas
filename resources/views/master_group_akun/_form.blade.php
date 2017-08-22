<div class="form-group{{ $errors->has('kode_group_akun') ? ' has-error' : '' }}">
	{!! Form::label('kode_group_akun', 'Kode Group Akun', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_group_akun', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('kode_group_akun', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nama_group_akun') ? ' has-error' : '' }}">
	{!! Form::label('nama_group_akun', 'Nama Group Akun', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_group_akun', null, ['class'=>'form-control','required','autocomplete'=>'off']) !!}
		{!! $errors->first('nama_group_akun', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}">
	{!! Form::label('parent', 'Sub Dari', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('parent', []+App\GroupAkun::pluck('nama_group_akun','kode_group_akun')->all(), null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => '-']) !!}
		{!! $errors->first('parent', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('kategori_akun') ? ' has-error' : '' }}">
	{!! Form::label('kategori_akun', 'Kategori Akun', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('kategori_akun', ['Aktiva'=>'Aktiva','Kewajiban'=>'Kewajiban','Modal'=>'Modal','Pendapatan'=>'Pendapatan','HPP'=>'HPP','Biaya'=>'Biaya','Pendapatan Lain'=>'Pendapatan Lain','Biaya Lain'=>'Biaya Lain'], null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Pilih Kategori Akun']) !!}
		{!! $errors->first('kategori_akun', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tipe_akun') ? ' has-error' : '' }}">
	{!! Form::label('tipe_akun', 'Tipe Akun', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('tipe_akun', ['Akun Header'=>'Akun Header','Kas & Bank'=>'Kas & Bank','Piutang Dagang'=>'Piutang Dagang','Piutang Non Dagang'=>'Piutang Non Dagang','Persediaan'=>'Persediaan','Investasi Portofolio'=>'Investasi Portofolio','Pajak Dibayar Dimuka'=>'Pajak Dibayar Dimuka','Beban Bayar Dimuka'=>'Beban Bayar Dimuka','Aktiva Tetap'=>'Aktiva Tetap','Akumulasi Penyusutan'=>'Akumulasi Penyusutan','Hutang Dagang'=>'Hutang Dagang','Pendapatan Diterima Dimuka'=>'Pendapatan Diterima Dimuka','Beban YMH Dibayar'=>'Beban YMH Dibayar','Hutang Pajak'=>'Hutang Pajak','Hutang Bank Jangka Pendek'=>'Hutang Bank Jangka Pendek','Hutang Bukan Bank Jangka Pendek'=>'Hutang Bukan Bank Jangka Pendek','Hutang Non Dagang'=>'Hutang Non Dagang','Ekuitas'=>'Ekuitas','Pendapatan Penjualan'=>'Pendapatan Penjualan','Pendapatan Diluar Usaha'=>'Pendapatan Diluar Usaha','Harga Pokok Penjualan'=>'Harga Pokok Penjualan','Beban Administrasi dan Umum'=>'Beban Administrasi dan Umum','Beban Penjualan'=>'Beban Penjualan','Beban Pemansaran'=>'Beban Pemansaran','Beban Operasional'=>'Beban Operasional','Beban Diluar Usaha'=>'Beban Diluar Usaha','Bunga Pinjaman'=>'Bunga Pinjaman','Hutang Bank Jangka Panjang'=>'Hutang Bank Jangka Panjang','Hutang Bukan Bank Jangka Panjang'=>'Hutang Bukan Bank Jangka Panjang','Deviden'=>'Deviden','Beban Pajak Penghasilan'=>'Beban Pajak Penghasilan'], null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Pilih Tipe Akun']) !!}
		{!! $errors->first('tipe_akun', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
