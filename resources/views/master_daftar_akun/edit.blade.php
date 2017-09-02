@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_daftar_akun') }}">Daftar Akun</a></li>
					<li class="active">Edit Daftar Akun</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Daftar Akun</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_daftar_akun, ['url' => route('master_daftar_akun.update', $master_daftar_akun->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_daftar_akun._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

@endsection
	