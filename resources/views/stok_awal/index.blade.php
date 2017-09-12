@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Home</a></li>
				<li class="active">Stok Awal</li>
			</ul>
 
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Stok Awal</h2>
				</div>

				<div class="panel-body">
					@if(Laratrust::can('tambah_stok_awal'))
						<p> <button type="button" data-toggle="modal" data-target="#cari_produk" data-backdrop="" class="btn btn-primary" ><i class="material-icons">add</i>  Tambah Stok Awal</button> </p>
					@endif
					<div class="table-responsive">
					{!! $html->table(['class'=>'table-striped table']) !!}
					</div>
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
          <h4 class="modal-title">Modal Stok Awal</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => route('stok-awal.proses_tambah_stok_awal'),'method' => 'post', 'class'=>'form-horizontal']) !!}
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

				<div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
					{!! Form::label('keterangan', 'Keterangan', ['class'=>'col-md-3 control-label']) !!}
					<div class="col-md-6">
						{!! Form::text('keterangan', null, ['class'=>'form-control','placeholder'=>'Keterangan','autocomplete'=>'off', 'id'=>'keterangan']) !!}
						{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
					</div>
				</div>   
        </div>

         <div class="modal-footer"> 
                   <button type="submit" class="btn btn-success" ><i class="material-icons">save</i> Simpan</button>
		   {!! Form::close() !!} 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
      
    </div>
  </div> 
  <!-- penutup modal -->

  
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
