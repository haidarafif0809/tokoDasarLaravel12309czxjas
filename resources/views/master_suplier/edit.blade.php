@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_suplier') }}">Suplier</a></li>
					<li class="active">Edit Suplier</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Suplier</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_suplier, ['url' => route('master_suplier.update', $master_suplier->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_suplier._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	
@endsection
	