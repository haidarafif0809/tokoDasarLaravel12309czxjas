<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index'); 

Route::group(['middleware' => 'auth'], function()
{
    
	Route::resource('master_users', 'UserController'); 
	Route::resource('master_otoritas', 'OtoritasController'); 
	Route::resource('master_suplier', 'SuplierController'); 
	Route::resource('master_satuan', 'SatuanController'); 
	Route::resource('master_kategori_barang', 'KategoriBarangController'); 
	Route::resource('master_pelanggan', 'PelangganController');  
	Route::resource('master_pelanggan', 'PelangganController'); 
	Route::resource('master_barang', 'BarangController'); 
	Route::resource('master_group_akun', 'GroupAkunController'); 
	Route::resource('master_daftar_akun', 'DaftarAkunController'); 



	Route::get('/ubah-password',[
	'middleware' => ['auth'],
	'as' => 'users.ubah_password',
	'uses' => 'UbahPasswordController@ubah_password'
	]);

	Route::put('/proses-ubah-password/{id}',[
	'middleware' => ['auth'],
	'as' => 'users.proses_ubah_password',
	'uses' => 'UbahPasswordController@proses_ubah_password'
	]); 

	Route::get('master_users/konfirmasi/{id}',[
	'middleware' => ['auth','role:admin'],
	'as' => 'master_users.konfirmasi',
	'uses' => 'UserController@konfirmasi'
	]);

	Route::get('master_users/reset/{id}',[
	'middleware' => ['auth','role:admin'],
	'as' => 'master_users.reset',
	'uses' => 'UserController@reset'
	]);

	Route::get('master_users/no_konfirmasi/{id}',[
	'middleware' => ['auth'],
	'as' => 'master_users.no_konfirmasi',
	'uses' => 'UserController@no_konfirmasi'
	]);	
  
});