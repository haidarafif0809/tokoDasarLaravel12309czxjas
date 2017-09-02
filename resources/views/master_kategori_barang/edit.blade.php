@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_kategori_barang') }}">Kategori Produk</a></li>
					<li class="active">Edit Kategori Produk</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Kategori Produk</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_kategori_barang, ['url' => route('master_kategori_barang.update', $master_kategori_barang->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_kategori_barang._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	
@endsection
	