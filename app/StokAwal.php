<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;



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

			$jumlah_produk = $StokAwal->jumlah_produk;
			$harga_beli = $StokAwal->produk->harga_beli;

			$total_nilai = $harga_beli * $jumlah_produk;
//ambil data BARANG YG DI CREATING KE HPP

					Hpp::create([
			            'no_faktur' => $StokAwal->nomor_faktur,
			            'id_barang' => $StokAwal->id_produk,
			            'jenis_transaksi' =>'Stok Awal',
			            'jumlah_masuk' => $jumlah_produk,
			            'harga_unit' => $harga_beli,
			            'total_nilai' => $total_nilai,
			            'jenis_hpp' => 1

			        ]);
			
			
		});//end CREATING data masuk ke hpp 


    self::deleting(function($StokAwal) {

      $hpp_terpakai =  Hpp::where('no_faktur_hpp_masuk', $StokAwal->nomor_faktur)->count();
      
      if ($hpp_terpakai > 0) {

         $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">error</i>
                    </div>
                    <b>Gagal : Stok Awal Sudah Terpakai Tidak Boleh Di Hapus</b>
                </div>';

          Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=> $pesan_alert
            ]);
        return false;
      }
      else {

        Hpp::where('no_faktur', $StokAwal->nomor_faktur)->delete();
        return true;
      }
 
    
    });  



	}// end boot() function event



}
