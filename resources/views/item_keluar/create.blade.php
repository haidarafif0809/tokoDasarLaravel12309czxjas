@extends('layouts.app')

@section('content')

<!-- Modal Produk -->
  <div class="modal" id="modal_produk" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Produk</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => route('item-keluar.proses_tambah_tbs_item_keluar'),'method' => 'post', 'class'=>'form-horizontal']) !!}
	          <div class="form-group{{ $errors->has('id_produk') ? ' has-error' : '' }}">
					{!! Form::label('id_produk', 'Pilih Produk', ['class'=>'col-md-3 control-label']) !!}
					<div class="col-md-6">
						{!! Form::select('id_produk', []+App\Barang::select([DB::raw('CONCAT(kode_barang, " - ", nama_barang) AS data_barang'),'id'])->pluck('data_barang','id')->all(), null, ['class'=>'form-control js-selectize-reguler','required', 'placeholder' => '--SILAKAN PILIH--', 'id'=>'pilih_produk']) !!}
						{!! $errors->first('id_produk', '<p class="help-block">:message</p>') !!}
					</div>
				</div>

				<div class="form-group{{ $errors->has('jumlah_produk') ? ' has-error' : '' }}">
					{!! Form::label('jumlah_produk', 'Jumlah Produk', ['class'=>'col-md-3 control-label']) !!}
					<div class="col-md-6">
						{!! Form::text('jumlah_produk', null, ['class'=>'form-control','placeholder'=>'Jumlah Produk','required','autocomplete'=>'off', 'id'=>'jumlah_produk']) !!}
						{!! $errors->first('jumlah_produk', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
        </div>
        <div class="modal-footer"> 
		   {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
		   {!! Form::close() !!} 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }} ">Home</a></li>
				<li><a href="{{ url('/item-keluar') }}">Item Keluar</a></li>
				<li class="active">Tambah Item Keluar</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah Item Keluar</h2>
				</div>

				<div class="panel-body">
					<div class="row">
						
						<div class="col-md-6">
							<!--FORM BARCODE ITEM KELUAR -->
								{!! Form::open(['url' => route('item-keluar.proses_barcode_item_keluar'),'method' => 'post', 'class'=>'form-horizontal']) !!}
									<div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}"> 
										<div class="col-md-6">				
											{!! Form::text('barcode', null, ['class'=>'form-control','placeholder'=>'Barcode','required','autocomplete'=>'off', 'id'=>'kode_barcode']) !!}
											{!! $errors->first('barcode', '<p class="help-block">:message</p>') !!}
										</div> 
											{!! Form::submit('Simpan (F2)', ['class'=>'btn btn-success']) !!}

							<!--TOMBOL CARI PRODUK -->										
										<button type="button" class="btn btn-info" id="cari_produk" data-toggle="modal" data-target="#modal_produk">Cari Produk (F1)</button>
									</div> 
								{!! Form::close() !!}
						</div>
						
						<div class="col-md-6">
							<!--FORM BARCODE ITEM KELUAR -->
								{!! Form::open(['url' => route('item-keluar.proses_barcode_item_keluar'),'method' => 'post', 'class'=>'form-horizontal']) !!}
									<div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}"> 
										<div class="col-md-6">				
											{!! Form::text('barcode', null, ['class'=>'form-control','placeholder'=>'Barcode','required','autocomplete'=>'off', 'id'=>'kode_barcode']) !!}
											{!! $errors->first('barcode', '<p class="help-block">:message</p>') !!}
										</div> 
									</div> 
								{!! Form::close() !!}
						</div>

					<!--TOMBOL SELESAI & BATAL -->
						<div class="col-md-4">
								<div class="form-group col-md-6"><br><br>
									<textarea name = "keterangan" id="keterangan" rows="1" cols="50" class="form-control" placeholder="Keterangan (F7)"></textarea>
								</div>
								<div class="form-group col-md-3">
					       			{!! Form::open(['url' => route('item-keluar.store'),'method' => 'post', 'class' => 'form-group js-confirm', 'id' => 'keterangan', 'data-confirm' => 'Apakah Anda Yakin Ingin Menyelesaikan Item Keluar ?']) !!} 
					       			  	{!! Form::submit('Selesai (F8)', ['class'=>'btn btn-primary', 'id'=>'btnSelesai']) !!}
								    {!! Form::close() !!}
								</div>
								<div class="form-group col-md-2">												       			   
					       			{!! Form::open(['url' => route('item-keluar.proses_hapus_semua_tbs_item_keluar'),'method' => 'post', 'class' => 'form-group js-confirm', 'data-confirm' => 'Apakah Anda Ingin Membatalkan Item Keluar ?']) !!} 
					       			 	{!! Form::submit('Batal (F10}', ['class'=>'btn btn-danger', 'id'=>'btnBatal']) !!}
								    {!! Form::close() !!}
								</div>										
						</div>

					</div>
					<!--TABEL TBS ITEM KELUAR -->
			         {!! $html->table(['class'=>'table-striped table']) !!} 
				</div><!-- / PANEL BODY -->
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $html->scripts() !!}

	<script type="text/javascript">
		$(document).ready(function(){
    		$("#kode_barcode").focus();
		});
	</script>
	<script type="text/javascript">
	// Konfirmasi Penghapusan
		$(document.body).on('submit', '.js-confirm', function () {
			var $btnHapus = $(this)
			var text = $btnHapus.data('confirm') ? $btnHapus.data('confirm') : 'Anda yakin melakukan tindakan ini ?'
			var pesan_konfirmasi = confirm(text);
			return pesan_konfirmasi;
		});  
	</script>



 	<script type="text/javascript">
 	//TOMBOL CARI
 	shortcut.add("f1", function() {
        $("#cari_produk").click();
    	$("#jumlah_produk").click();
    })

 	//KETERANGAN
 	shortcut.add("f7", function() {
        $("#keterangan").focus();
    })
    
 	//TOMBOL SELESAI
 	shortcut.add("f8", function() {
        $("#btnSelesai").click();
    })
    
 	//TOMBOL BATAL
 	shortcut.add("f10", function() {
        $("#btnBatal").click();
    })
 	</script>
<!-- js untuk tombol shortcut -->
@endsection