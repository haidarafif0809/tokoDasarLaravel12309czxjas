@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/stok-awal') }}">Stok Awal</a></li>
					<li class="active">Edit Stok Awal</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Stok Awal <b>{{$stokawal->nomor_faktur}}</b></h2>
					</div>

					<div class="panel-body">
						{!! Form::model($stokawal, ['url' => route('stok-awal.update', $stokawal->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
	  
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
								{!! Form::text('keterangan', null, ['class'=>'form-control','placeholder'=>'Keterangan','required','autocomplete'=>'off', 'id'=>'keterangan']) !!}
							{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
						</div>
						</div>   
		   				
						<div class="form-group">
							<div class="col-md-6 col-md-offset-2">
								{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
							</div>
						</div>

		   				{!! Form::close() !!} 
					</div>
				</div>
			</div>
		</div>

@endsection
	