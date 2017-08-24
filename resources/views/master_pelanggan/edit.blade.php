@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_pelanggan') }}">Pelanggan</a></li>
					<li class="active">Edit Pelanggan</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Pelanggan</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_pelanggan, ['url' => route('master_pelanggan.update', $master_pelanggan->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_pelanggan._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
	