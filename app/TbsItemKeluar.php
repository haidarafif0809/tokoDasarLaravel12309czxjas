<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbsItemKeluar extends Model
{
     protected $fillable = ['id_tbs_item_keluar','session_id','id_produk','jumlah_produk'];
     protected $primaryKey = 'id_tbs_item_keluar';

    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }
}
