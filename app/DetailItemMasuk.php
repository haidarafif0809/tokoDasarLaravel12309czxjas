<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailItemMasuk extends Model
{
    //
     protected $fillable = ['id_detail_item_masuk','no_faktur','id_produk','jumlah_produk'];
     protected $primaryKey = 'id_detail_item_masuk';

    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }
}
