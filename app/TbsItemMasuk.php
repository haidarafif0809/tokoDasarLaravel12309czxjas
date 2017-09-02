<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbsItemMasuk extends Model
{
    //
     protected $fillable = ['id','session_id','id_produk','jumlah_produk'];

    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }
}
