@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }} ">Home</a></li>
				<li><a href="{{ url('/admin/master_kategori_barang') }}">Kategori Barang</a></li>
				<li class="active">Tambah Kategori Barang</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah Kategori Barang</h2>
				</div>

				<div class="panel-body">
					{!! Form::open(['url' => route('master_kategori_barang.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
					@include('master_kategori_barang._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
