@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12"> 

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Ubah Password</h2>
					</div>

					<div class="panel-body">  
						{!! Form::model($user, ['url' => route('users.proses_ubah_password', $user->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}

						<div class="form-group{{ $errors->has('password_awal') ? ' has-error' : '' }}">
							{!! Form::label('password_awal', 'Password Awal', ['class'=>'col-md-2 control-label']) !!}
							<div class="col-md-4">
								<input id="password_awal" type="password" class="form-control" name="password_awal" required> 
								{!! $errors->first('password_awal', '<p class="help-block">:message</p>') !!}
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							{!! Form::label('password', 'Password Baru', ['class'=>'col-md-2 control-label']) !!}
							<div class="col-md-4">
								<input id="password" type="password" class="form-control" name="password" required> 
								{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
							</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							{!! Form::label('password_confirmation', 'Konfirmasi Password', ['class'=>'col-md-2 control-label']) !!}
							<div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
								{!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4 col-md-offset-2">
								{!! Form::submit('Ubah Password', ['class'=>'btn btn-primary']) !!}
							</div>
						</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
	