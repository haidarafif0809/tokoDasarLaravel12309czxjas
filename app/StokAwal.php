<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StokAwal;

class StokAwal extends Model
{
    //
        protected $fillable = ['nomor_faktur','id_produk','jumlah_produk','keterangan','user_buat','user_edit'];


    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }

    	public function user_buat(){
			return $this->hasOne('App\User','id','user_buat');
		}

    	public function user_edit(){
			return $this->hasOne('App\User','id','user_edit');
		}


		//MODEL EVENT DELETE ITEM KELUAR -> DETAIL ITEM KELUAR
	public static function boot() {
		parent::boot();
			
		self::creating(function($StokAwal) {

			$data_barang = Barang::select(['golongan_barang', 'kode_barang','harga_beli'])->where('id', $StokAwal->id_produk)->first();
			$jumlah_produk = $StokAwal->jumlah_produk;
			$harga_beli = $data_barang->harga_beli;

			$total_nilai = $harga_beli * $jumlah_produk;
//ambil data BARANG YG DI CREATING KE HPP

				while ($jumlah_produk > 0) {

					Hpp::create([
			            'no_faktur' => $StokAwal->no_faktur,
			            'no_faktur_hpp_masuk' =>$hpp_masuk->no_faktur_hpp_masuk,
			            'no_faktur_hpp_keluar' =>$StokAwal->no_faktur,
			            'kode_barang' => $data_barang->kode_barang,
			            'jenis_transaksi' =>'Item Keluar',
			            'jumlah_kuantitas' => $StokAwal->jumlah_produk,
			            'sisa_harga' => 0,
			            'harga_unit' => $harga_beli,
			            'total_nilai' => $total_nilai,
			            'jenis_hpp' => 0

			        ]);

			       	$jumlah_produk = 0;

				}
			
		});
	}



}
