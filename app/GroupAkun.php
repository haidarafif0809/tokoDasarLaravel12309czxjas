<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAkun extends Model
{ 
     protected $fillable = ['id','kode_group_akun','nama_group_akun','parent','kategori_akun','tipe_akun','user_buat','user_edit','created_at','updated_at'];
}
