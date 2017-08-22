@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/admin/master_otoritas') }}"> Otoritas</a></li>
					<li class="active">Edit  Otoritas</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit  Otoritas</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_otoritas, ['url' => route('master_otoritas.update', $master_otoritas->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_otoritas._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
	