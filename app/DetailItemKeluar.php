<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailItemKeluar extends Model
{
     protected $fillable = ['no_faktur','id_produk','jumlah_produk'];
     protected $primaryKey = 'id_detail_item_keluar';

    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }
}
