<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class DetailItemKeluar extends Model
{
     protected $fillable = ['no_faktur','id_produk','jumlah_produk'];
     protected $primaryKey = 'id_detail_item_keluar';

    	public function produk()
		  {
		  	return $this->hasOne('App\Barang','id','id_produk');
		  }

//CEK STOK PRODUK
	public function stok_produk($id_produk, $jumlah_keluar){
		$stok_produk = Hpp::select([DB::raw('IFNULL(SUM(jumlah_masuk),0) - IFNULL(SUM(jumlah_keluar),0) as jumlah_produk')])->where('id_barang', $id_produk)->first();

		$data_produk = Barang::select('nama_barang')->where('id', $id_produk)->first();

		$sisa_stok_keluar = $stok_produk->jumlah_produk - $jumlah_keluar;

		if ($sisa_stok_keluar < 0) {


					$pesan_alert = 
					'<div class="container-fluid">
	                    <div class="alert-icon">
	                    <i class="material-icons">error</i>
	                    </div>
                    		<b>Gagal : Stok " '.$data_produk->nama_barang.' " Tidak Mencukupi Untuk Dikeluarkan, Sisa Produk = " '.$stok_produk->jumlah_produk.' "</b>
                		</div>';

				        Session::flash("flash_notification", [
				            "level"     => "danger",
				            "message"   => $pesan_alert
				        ]);

			return false;
		}
		else{
			return true;
		}	
	}


//MODEL EVENT INSERT HPP KELUAR
	public static function boot() {
		parent::boot();
			
		static::creating(function($detailItemKeluar) {

			$jumlah_produk_keluar = $detailItemKeluar->jumlah_produk;

//HANYA PRODUK DENGAN GOLONGAN BARANG = BARANG YG DI CREATING KE HPP
			if ($detailItemKeluar->produk->golongan_barang == 1) {

				$stok = Hpp::select([DB::raw('IFNULL(SUM(jumlah_masuk),0) - IFNULL(SUM(jumlah_keluar),0) as stok_produk')])->where('id_barang', $detailItemKeluar->id_produk)->first();

				$sisa_stok_keluar = $stok->stok_produk - $jumlah_produk_keluar;

				if ($sisa_stok_keluar < 0) {

					return false;

				}
				else{

						while ($jumlah_produk_keluar > 0) {

						$hpp = DB::table('hpp AS hpp_masuk')->select([DB::raw('jumlah_masuk - IFNULL((SELECT SUM(jumlah_keluar) as jumlah_keluar FROM hpp WHERE id_barang = "'.$detailItemKeluar->id_produk.'" AND no_faktur_hpp_masuk = hpp_masuk.no_faktur),0) as sisa_hpp'), 'no_faktur', 'harga_unit'])
						->where('id_barang', $detailItemKeluar->id_produk)->where('jenis_hpp', 1)
						->having('sisa_hpp', '>', 0)
						->orderBy('created_at', 'ASC')->first();

							$jumlah_hpp_masuk = $hpp->sisa_hpp;

							if ($jumlah_produk_keluar == $jumlah_hpp_masuk) {

								$total_nilai = $jumlah_produk_keluar * $hpp->harga_unit;

								Hpp::create([
						            'no_faktur' => $detailItemKeluar->no_faktur,
						            'no_faktur_hpp_masuk' =>$hpp->no_faktur,
						            'id_barang' => $detailItemKeluar->id_produk,
						            'jenis_transaksi' =>'Item Keluar',
						            'jumlah_keluar' => $jumlah_produk_keluar,
						            'harga_unit' => $hpp->harga_unit,
						            'total_nilai' => $total_nilai,
						            'jenis_hpp' => 0

						        ]);

						        $jumlah_produk_keluar = 0;
							}
							else if ($jumlah_produk_keluar > $jumlah_hpp_masuk) {
								

								$total_nilai = $jumlah_produk_keluar * $hpp->harga_unit;
								
								Hpp::create([
						            'no_faktur' => $detailItemKeluar->no_faktur,
						            'no_faktur_hpp_masuk' =>$hpp->no_faktur,
						            'id_barang' => $detailItemKeluar->id_produk,
						            'jenis_transaksi' =>'Item Keluar',
						            'jumlah_keluar' => $jumlah_hpp_masuk,
						            'harga_unit' => $hpp->harga_unit,
						            'total_nilai' => $total_nilai,
						            'jenis_hpp' => 0

						        ]);

					       	$jumlah_produk_keluar -= $jumlah_hpp_masuk;
	

							}
							else if ($jumlah_produk_keluar < $jumlah_hpp_masuk) {


								$total_nilai = $jumlah_produk_keluar * $hpp->harga_unit;

								Hpp::create([
						            'no_faktur' => $detailItemKeluar->no_faktur,
						            'no_faktur_hpp_masuk' =>$hpp->no_faktur,
						            'id_barang' => $detailItemKeluar->id_produk,
						            'jenis_transaksi' =>'Item Keluar',
						            'jumlah_keluar' => $jumlah_produk_keluar,
						            'harga_unit' => $hpp->harga_unit,
						            'total_nilai' => $total_nilai,
						            'jenis_hpp' => 0

						        ]);
						       	$jumlah_produk_keluar = 0;

							}							

						} // END WHILE

						return true;

				} // END IF STOK < 0

			} // END GOL. BARANG == BARANG				
			
		});
	} // END EVENT
}