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
	Route::resource('master_setting_akun', 'SettingAkunController'); 



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
  
	Route::post('master_setting_akun/table_data_item',[
	'middleware' => ['auth'],
	'as' => 'table.data_item',
	'uses' => 'SettingAkunController@table_data_item'
	]);

	Route::post('master_setting_akun/table_akun_pembelian',[
	'middleware' => ['auth'],
	'as' => 'table.akun_pembelian',
	'uses' => 'SettingAkunController@table_akun_pembelian'
	]);

	Route::post('master_setting_akun/table_akun_retur_pembelian',[
	'middleware' => ['auth'],
	'as' => 'table.akun_retur_pembelian',
	'uses' => 'SettingAkunController@table_akun_retur_pembelian'
	]);

	Route::post('master_setting_akun/table_akun_penjualan',[
	'middleware' => ['auth'],
	'as' => 'table.akun_penjualan',
	'uses' => 'SettingAkunController@table_akun_penjualan'
	]);

	Route::post('master_setting_akun/table_akun_retur_penjualan',[
	'middleware' => ['auth'],
	'as' => 'table.akun_retur_penjualan',
	'uses' => 'SettingAkunController@table_akun_retur_penjualan'
	]);

	Route::post('master_setting_akun/table_akun_hutang_piutang',[
	'middleware' => ['auth'],
	'as' => 'table.akun_hutang_piutang',
	'uses' => 'SettingAkunController@table_akun_hutang_piutang'
	]);


	Route::post('master_setting_akun/table_modal_dan_laba',[
	'middleware' => ['auth'],
	'as' => 'table.modal_dan_laba',
	'uses' => 'SettingAkunController@table_modal_dan_laba'
	]);

});