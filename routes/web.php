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
	Route::resource('master_gudang', 'GudangController'); 
	Route::resource('item-masuk', 'ItemMasukController');
	Route::resource('item-keluar', 'ItemKeluarController');
	Route::resource('stok-awal', 'StokAwalController');


//STOK AWAL 
	Route::post('/stok-awal/proses-tambah-stok-awal',[
	'middleware' => ['auth'],
	'as' => 'stok-awal.proses_tambah_stok_awal',
	'uses' => 'StokAwalController@proses_tambah_stok_awal'
	]);


//ITEM KELUAR
	Route::post('/item-keluar/proses-tambah-tbs-item-keluar',[
	'middleware' => ['auth'],
	'as' => 'item-keluar.proses_tambah_tbs_item_keluar',
	'uses' => 'ItemKeluarController@proses_tambah_tbs_item_keluar'
	]);

	Route::post('/item-keluar/proses-hapus-semua-tbs-item-keluar/',[
	'middleware' => ['auth'],
	'as' => 'item-keluar.proses_hapus_semua_tbs_item_keluar',
	'uses' => 'ItemKeluarController@proses_hapus_semua_tbs_item_keluar'
	]);

	Route::delete('/item-keluar/proses-hapus-tbs-item-keluar/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-keluar.proses_hapus_tbs_item_keluar',
	'uses' => 'ItemKeluarController@proses_hapus_tbs_item_keluar'
	]);

	Route::post('/item-keluar/proses-barcode-item-keluar',[
	'middleware' => ['auth'],
	'as' => 'item-keluar.proses_barcode_item_keluar',
	'uses' => 'ItemKeluarController@proses_barcode_item_keluar'
	]);

//ITEM MASUK
	Route::get('/item-masuk/proses-form-edit/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_form_edit',
	'uses' => 'ItemMasukController@proses_form_edit'
	]);

	Route::post('/item-masuk/proses-tambah-tbs-item-masuk',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_tambah_tbs_item_masuk',
	'uses' => 'ItemMasukController@proses_tambah_tbs_item_masuk'
	]);

	Route::post('/item-masuk/proses-tambah-edit-tbs-item-masuk/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_tambah_edit_tbs_item_masuk',
	'uses' => 'ItemMasukController@proses_tambah_edit_tbs_item_masuk'
	]);

	Route::post('/item-masuk/proses-hapus-tbs-item-masuk/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_hapus_tbs_item_masuk',
	'uses' => 'ItemMasukController@proses_hapus_tbs_item_masuk'
	]);

	Route::post('/item-masuk/proses-hapus-edit-tbs-item-masuk/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_hapus_edit_tbs_item_masuk',
	'uses' => 'ItemMasukController@proses_hapus_edit_tbs_item_masuk'
	]);

	Route::post('/item-masuk/proses-hapus-semua-tbs-item-masuk/',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_hapus_semua_tbs_item_masuk',
	'uses' => 'ItemMasukController@proses_hapus_semua_tbs_item_masuk'
	]);

	Route::post('/item-masuk/proses-hapus-semua-edit-tbs-item-masuk/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_hapus_semua_edit_tbs_item_masuk',
	'uses' => 'ItemMasukController@proses_hapus_semua_edit_tbs_item_masuk'
	]);

	Route::post('/item-masuk/proses-edit-item-masuk/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_edit_item_masuk',
	'uses' => 'ItemMasukController@proses_edit_item_masuk'
	]);

	Route::post('/item-masuk/proses-barcode-item-masuk',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_barcode_item_masuk',
	'uses' => 'ItemmasukController@proses_barcode_item_masuk'
	]);

	Route::post('/item-masuk/proses-barcode-edit-item-masuk/{id}',[
	'middleware' => ['auth'],
	'as' => 'item-masuk.proses_barcode_edit_item_masuk',
	'uses' => 'ItemmasukController@proses_barcode_edit_item_masuk'
	]);

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