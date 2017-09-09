<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StokAwal;

class StokAwal extends Model
{
    //
        protected $fillable = ['nomor_faktur','id_produk','jumlah_produk','keterangan','user_buat','user_edit'];


    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }

    	public function user_buat(){
			return $this->hasOne('App\User','id','user_buat');
		}

    	public function user_edit(){
			return $this->hasOne('App\User','id','user_edit');
		}


		//MODEL EVENT DELETE ITEM KELUAR -> DETAIL ITEM KELUAR
	public static function boot() {
		parent::boot();
			
		self::deleting(function($stokAwal) {

			

			return true;
		
		});
	}



}
