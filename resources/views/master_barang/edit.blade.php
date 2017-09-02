@extends('layouts.app')

@section('content')
	
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_barang') }}">Produk</a></li>
					<li class="active">Edit Produk</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Produk</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($barang, ['url' => route('master_barang.update', $barang->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_barang._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	
@endsection
	