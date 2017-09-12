<div class="row">
	<div class="col-sm-2">
		<b>Satuan</b>
		@foreach($permission_satuan as $permissions) 
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
	</div>

	<div class="col-sm-2">
		<b>User</b>
		@foreach($permission_user as $permissions) 
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
	</div>

	<div class="col-sm-2">
		<b>Otoritas</b>
		@foreach($permission_otoritas as $permissions) 
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
	</div>

	<div class="col-sm-2">
		<b>Suplier</b>
		@foreach($permission_suplier as $permissions) 
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
	</div>

	<div class="col-sm-2">
		<b>Kategoir Produk</b>
		@foreach($permission_kategori_produk as $permissions) 
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
	</div>

	<div class="col-sm-2">
		<b>Pelanggan</b>
		@foreach($permission_pelanggan as $permissions) 
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
	</div> 
</div>

<div class="row">
	<div class="col-sm-2">
		<b>Produk</b>
		@foreach($permission_produk as $permissions) 
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
	</div>

	<div class="col-sm-2">
		<b>Daftar Akun</b>
		@foreach($permission_daftar_akun as $permissions) 
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
	</div>

	<div class="col-sm-2">
		<b>Group Akun</b>
		@foreach($permission_group_akun as $permissions) 
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
	</div>
</div>
{!! Form::submit('Submit',['class'=>'btn btn-lg btn-default']) !!}