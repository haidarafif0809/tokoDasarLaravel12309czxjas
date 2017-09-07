<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarAkun extends Model
{ 
     protected $fillable = ['kode_daftar_akun','nama_daftar_akun','group_akun','kategori_akun','tipe_akun','user_buat','user_edit','created_at','updated_at'];

    	// relasi ke group akun
    	public function group_akun()
		  {
		  	return $this->hasOne('App\GroupAkun','id','group_akun');
		  }
}
