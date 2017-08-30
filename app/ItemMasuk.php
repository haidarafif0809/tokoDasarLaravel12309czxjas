<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMasuk extends Model
{
    //
     protected $fillable = ['id','nomor_faktur','keterangan','total','user_buat','user_edit','created_at','updated_at'];
}
