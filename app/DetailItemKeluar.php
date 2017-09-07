<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DetailItemKeluar extends Model
{
     protected $fillable = ['no_faktur','id_produk','jumlah_produk'];
     protected $primaryKey = 'id_detail_item_keluar';

    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }

	//MODEL EVENT INSERT HPP KELUAR
	public static function boot() {
		parent::boot();
			
		self::creating(function($detailItemKeluar) {

			$tipe_barang = Barang::select(['golongan_barang', 'kode_barang'])->where('id', $detailItemKeluar->id_produk)->first();
			$jumlah_produk = $detailItemKeluar->jumlah_produk;

//HANYA PRODUK DENGAN GOLONGAN BARANG = BARANG YG DI CREATING KE HPP


				$hpp_masuk = Hpp::select(['jumlah_kuantitas', 'no_faktur', 'sisa_harga', 'no_faktur_hpp_masuk'])
					->where('kode_barang', $tipe_barang->kode_barang)
					->groupBy('id')->orderBy('created_at')->first();

print_r($tipe_barang);
				exit();
					
				$hpp_keluar = Hpp::select(['jumlah_kuantitas', 'no_faktur', 'sisa_harga', 'no_faktur_hpp_keluar'])
					->where('kode_barang', $tipe_barang->kode_barang)
					->groupBy('id')->orderBy('created_at')->first();

				
				while ($jumlah_produk > 0) {

					Hpp::create([
			            'no_faktur' => $detailItemKeluar->no_faktur,
			            'no_faktur_hpp_masuk' =>$hpp_masuk->no_faktur_hpp_masuk,
			            'no_faktur_hpp_keluar' =>$detailItemKeluar->no_faktur,
			            'kode_barang' => $tipe_barang->kode_barang,
			            'jenis_transaksi' =>'Item Keluar',
			            'jumlah_kuantitas' => $detailItemKeluar->jumlah_produk,
			            'sisa_harga' => 0,
			            'harga_unit' => 1500,
			            'total_nilai' => 1500,
			            'jenis_hpp' => 0

			        ]);

			       	$jumlah_produk = 0;

				}
			
		});
	}
}
