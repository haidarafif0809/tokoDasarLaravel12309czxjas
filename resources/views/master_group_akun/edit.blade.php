@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }} ">Home</a></li>
					<li><a href="{{ url('/master_group_akun') }}">Group Akun</a></li>
					<li class="active">Edit Group Akun</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Group Akun</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($master_group_akun, ['url' => route('master_group_akun.update', $master_group_akun->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('master_group_akun._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
	