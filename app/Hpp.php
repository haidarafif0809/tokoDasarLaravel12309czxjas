<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hpp extends Model
{
    protected $fillable = ['no_faktur', 'no_faktur_hpp_masuk', 'no_faktur_hpp_keluar', 'kode_barang', 'jenis_transaksi', 'jumlah_kuantitas', 'sisa_harga', 'harga_unit', 'total_nilai', 'jenis_hpp'];
}
