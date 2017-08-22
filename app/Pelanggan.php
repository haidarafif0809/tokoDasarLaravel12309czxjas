<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
     protected $fillable = ['id','kode_pelanggan','nama_pelanggan','no_telpon','tanggal_lahir','alamat','level_harga',',default_pelanggan','flafon','flafon_usia'];
}
