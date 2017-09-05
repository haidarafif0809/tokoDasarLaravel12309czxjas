<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMasuk extends Model
{
    //
     protected $fillable = ['id','no_faktur','keterangan','total','user_buat','user_edit','created_at','updated_at'];
     
    public function user_buat(){
		return $this->hasOne('App\User','id','user_buat');
	}

    public function user_edit(){
		return $this->hasOne('App\User','id','user_edit');
	}

	//MODEL EVENT DELETE ITEM MASUK -> DETAIL ITEM MASUK
  	public static function boot() {
    parent::boot();
      
    self::deleting(function($itemMasuk) {

      DetailItemMasuk::where('no_faktur', $itemMasuk->no_faktur)->delete();

      return true;
    
    });
  }
}