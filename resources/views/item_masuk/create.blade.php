@extends('layouts.app')

@section('content')

<!-- MODAL PILIH PRODUK -->
  <div class="modal" id="modal_produk" role="dialog" data-backdrop="">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Produk</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => route('item-masuk.proses_tambah_tbs_item_masuk'),'method' => 'post', 'class'=>'form-horizontal']) !!}
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
						{!! Form::text('jumlah_produk', 1, ['class'=>'form-control','placeholder'=>'Jumlah Produk','required','autocomplete'=>'off', 'id'=>'jumlah_produk']) !!}
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
<!-- / MODAL PILIH PRODUK -->

<!-- MODAL TOMBOL SELESAI -->
  <div class="modal" id="modal_selesai" role="dialog" data-backdrop="">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
				  <div class="alert-icon">
					<i class="material-icons">info_outline</i> <b>Anda Yakin Ingin Menyelesaikan Transaksi Ini ?</b>
				</div>
		</h4>
        </div>

        {!! Form::open(['url' => route('item-masuk.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
	        <div class="modal-body">
	        	<textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="5">-</textarea>
	        </div>
	        <div class="modal-footer"> 
			  {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}			    
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	    {!! Form::close() !!}
      </div>
      
    </div>
  </div>
<!-- / MODAL TOMBOL SELESAI -->

	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }} ">Home</a></li>
				<li>Persediaan</li> 
				<li><a href="{{ url('/item-masuk') }}">Item Masuk</a></li>
				<li class="active">Tambah Item Masuk</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah Item Masuk</h2>
				</div>

				<div class="panel-body">
					<div class="row">
						
						<div class="col-md-6">
							<!--FORM BARCODE ITEM Masuk -->
								{!! Form::open(['url' => route('item-masuk.proses_barcode_item_masuk'),'method' => 'post', 'class'=>'form-horizontal']) !!}
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
						
						<div class="col-md-4"></div>
						<div class="col-md-2">
							<!-- TOMBOL BATAL -->
							{!! Form::open(['url' => route('item-masuk.proses_hapus_semua_tbs_item_masuk'),'method' => 'post', 'class' => 'form-group js-confirm', 'data-confirm' => 'Apakah Anda Ingin Membatalkan Item Masuk ?']) !!} 
						       		{!! Form::submit('Batal (F10}', ['class'=>'btn btn-danger', 'id'=>'btnBatal']) !!}
						       		
						    <!--- TOMBOL SELESAI -->
						       	<button type="button" class="btn btn-primary" id="btnSelesai" data-toggle="modal" data-target="#modal_selesai">Selesai (F8)</button>
							{!! Form::close() !!}
						</div>

					<!--TOMBOL SELESAI & BATAL -->
						<div class="col-md-4">
								<div class="form-group col-md-3">
					       			 
					       			  	
								</div>
								<div class="form-group col-md-2">												       			   
					       			
								</div>										
						</div>

					</div>
					<!--TABEL TBS ITEM Masuk -->
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