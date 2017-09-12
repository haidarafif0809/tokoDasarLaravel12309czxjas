
@foreach($permission as $permissions)


<div class="checkbox">
	<label>
	@if(App\PermissionRole::where('role_id',$master_otoritas->id)->where('permission_id',$permissions->id)->count() == 1) 

	{!! Form::checkbox($permissions->name, '1',['checked' => '']) !!}

	@else 

	{!! Form::checkbox($permissions->name, '1') !!}

	@endif
	{{ $permissions->display_name }}
	</label>
</div>


@endforeach

{!! Form::submit('Submit',['class'=>'btn btn-lg btn-default']) !!}