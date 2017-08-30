@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }} ">Home</a></li>
				<li><a href="{{ url('/item-masuk') }}">Item Masuk</a></li>
				<li class="active">Tambah Item Masuk</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah Item Masuk</h2>
				</div>

				<div class="panel-body">  
					<div class="col-md-10">
						<div class="col-md-1" style="margin-right: 5%;">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#cari_produk">Cari Produk</button>
						</div>

						<div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}"> 
							<div class="col-md-4">
								{!! Form::text('barcode', null, ['class'=>'form-control','placeholder'=>'Barcode','required','autocomplete'=>'off']) !!}
								{!! $errors->first('barcode', '<p class="help-block">:message</p>') !!}
							</div> 
								{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
						</div> 
					</div>


       			   {!! Form::open(['url' => route('item-masuk.proses_hapus_semua_tbs_item_masuk'),'method' => 'post', 'class' => 'form-inline js-confirm', 'data-confirm' => 'Apakah Anda Ingin Membatalkan Item Masuk']) !!} 
					<button type="button" class="btn btn-primary">Selesai</button>
		 			  {!! Form::submit('Batal', ['class'=>'btn btn-danger']) !!}
		           {!! Form::close() !!} 

					{!! $html->table(['class'=>'table-striped table']) !!} 
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
  <div class="modal" id="cari_produk" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => route('item-masuk.proses_tambah_tbs_item_masuk'),'method' => 'post', 'class'=>'form-horizontal']) !!}
          <div class="form-group{{ $errors->has('id_produk') ? ' has-error' : '' }}">
				{!! Form::label('id_produk', 'Produk', ['class'=>'col-md-3 control-label']) !!}
				<div class="col-md-6">
					{!! Form::select('id_produk', []+App\Barang::select([DB::raw('CONCAT(kode_barang, " - ", nama_barang) AS data_barang'),'id'])->pluck('data_barang','id')->all(), null, ['class'=>'form-control js-selectize-reguler','required', 'placeholder' => '-']) !!}
					{!! $errors->first('id_produk', '<p class="help-block">:message</p>') !!}
				</div>
			</div>

			<div class="form-group{{ $errors->has('jumlah_produk') ? ' has-error' : '' }}">
				{!! Form::label('jumlah_produk', 'Jumlah Produk', ['class'=>'col-md-3 control-label']) !!}
				<div class="col-md-6">
					{!! Form::text('jumlah_produk', null, ['class'=>'form-control','placeholder'=>'Jumlah Barang','required','autocomplete'=>'off']) !!}
					{!! $errors->first('jumlah_produk', '<p class="help-block">:message</p>') !!}
				</div>
			</div> 
        </div>
        <div class="modal-footer"> 
		   {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
		   {!! Form::close() !!} 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
@endsection


@section('scripts')
{!! $html->scripts() !!}
<script type="text/javascript">
	// confirm delete
		$(document.body).on('submit', '.js-confirm', function () {
		var $el = $(this)
		var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini\
	?'
		var c = confirm(text);
		return c;
	});  
</script>
@endsection