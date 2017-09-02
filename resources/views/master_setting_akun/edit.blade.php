@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_setting_akun') }}">Setting Akun</a></li>
					<li class="active">Edit Setting Akun</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Setting Akun</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_setting_akun, ['url' => route('master_setting_akun.update', $master_setting_akun->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_setting_akun._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

@endsection
	