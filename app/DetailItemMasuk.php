<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailItemMasuk extends Model
{ 
     protected $fillable = ['no_faktur','id_produk','jumlah_produk'];
     protected $primaryKey = 'id_detail_item_masuk';

        // relasi ke produk
    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }
}
