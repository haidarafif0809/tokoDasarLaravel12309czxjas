<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{

      protected $fillable = ['id','kode_barang','kode_barcode','nama_barang','harga_beli','harga_jual','harga_jual2','harga_jual3','harga_jual4','harga_jual5','harga_jual6','harga_jual7','satuans_id','kategori_barangs_id','gudangs_id','status','supliers_id','limit_stok','over_stok','berkaitan_dgn_stok','jenis_barang','tipe_barang','golongan','golongan_barang'];

	
    // relasi ke satuan
   	public function satuan(){
   		return $this->belongsTo('App\Satuan','satuans_id','id');
   	}

   	    // relasi ke kategori
   	public function kategoribarang(){
   		return $this->belongsTo('App\KategoriBarang','kategori_barangs_id','id');
   	}


   	    // relasi ke suplier
   	public function supliers(){
   		return $this->belongsTo('App\Suplier','supliers_id','id');
   	}
}
