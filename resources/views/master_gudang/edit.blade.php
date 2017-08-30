@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_gudang') }}">Gudang</a></li>
					<li class="active">Edit Gudang</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Gudang</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_gudang, ['url' => route('master_gudang.update', $master_gudang->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_gudang._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
	