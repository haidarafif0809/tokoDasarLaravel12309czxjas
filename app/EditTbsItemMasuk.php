<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditTbsItemMasuk extends Model
{
    //
     protected $fillable = ['id_edit_tbs_item_masuk','no_faktur','session_id','id_produk','jumlah_produk'];
     protected $primaryKey = 'id_edit_tbs_item_masuk';

    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }
}
