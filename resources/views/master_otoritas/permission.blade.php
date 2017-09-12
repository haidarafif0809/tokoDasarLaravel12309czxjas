@extends('layouts.app')

@section('content')
	
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_otoritas') }}"> Otoritas</a></li>
					<li class="active">Setting Permisson</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Setting  Permisson <b>{{ $master_otoritas->display_name }}</b></h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_otoritas, ['url' => route('otoritas.permission.edit', $master_otoritas->id), 'method' => 'put', null,'class'=>'form-horizontal']) !!}
						@include('master_otoritas._form_permission')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	
@endsection
	