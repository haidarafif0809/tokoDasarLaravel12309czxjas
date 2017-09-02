@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_satuan') }}">Satuan</a></li>
					<li class="active">Edit Satuan</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Satuan</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_satuan, ['url' => route('master_satuan.update', $master_satuan->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_satuan._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

@endsection
	