<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ItemMasuk extends Model
{
    //
     protected $fillable = ['id','no_faktur','keterangan','total','user_buat','user_edit','created_at','updated_at'];
     
    public function user_buat(){
		return $this->hasOne('App\User','id','user_buat');
	}

    public function user_edit(){
		return $this->hasOne('App\User','id','user_edit');
	}

	//MODEL EVENT DELETE ITEM MASUK -> DETAIL ITEM MASUK
  	public static function boot() {
    parent::boot();
      
    self::deleting(function($itemMasuk) {

     

      $hpp_terpakai =  Hpp::where('no_faktur_hpp_masuk', $itemMasuk->no_faktur)->count();
      
      if ($hpp_terpakai > 0) {

         $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">error</i>
                    </div>
                    <b>Gagal : Item Masuk Sudah Terpakai Tidak Boleh Di Hapus</b>
                </div>';

          Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=> $pesan_alert
            ]);
        return false;
      }
      else {
        DetailItemMasuk::where('no_faktur', $itemMasuk->no_faktur)->delete();
        Hpp::where('no_faktur', $itemMasuk->no_faktur)->delete();

        return true;
      }
 
    
    });   

    self::creating(function($itemMasuk) {


      $total_nilai_item_keluar = Hpp::where('no_faktur', $itemMasuk->no_faktur)->sum('total_nilai');

     $itemMasuk->total = $total_nilai_item_keluar;

      return true;
    
    });  




  }
}