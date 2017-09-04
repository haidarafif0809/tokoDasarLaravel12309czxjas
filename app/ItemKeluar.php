<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemKeluar extends Model
{
    protected $fillable = ['id','nomor_faktur','keterangan','total','user_buat','user_edit','created_at','updated_at'];

    public function user_buat(){
		return $this->hasOne('App\User','id','user_buat');
	}

    public function user_edit(){
		return $this->hasOne('App\User','id','user_edit');
	}
}
