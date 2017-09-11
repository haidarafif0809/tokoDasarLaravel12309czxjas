<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemKeluar extends Model
{
	//Kolom mana saja yg boleh diisi / update melalui method create atau update
    protected $fillable = ['no_faktur','keterangan','total','user_buat','user_edit'];

    public function user_buat(){
		return $this->hasOne('App\User','id','user_buat');
	}

    public function user_edit(){
		return $this->hasOne('App\User','id','user_edit');
	}

//MODEL EVENT DELETE ITEM KELUAR -> DETAIL ITEM KELUAR
	public static function boot() {
		parent::boot();
			
		self::deleting(function($itemKeluar) {

			DetailItemKeluar::where('no_faktur', $itemKeluar->no_faktur)->delete();
			Hpp::where('no_faktur', $itemKeluar->no_faktur)->delete();

			return true;
		
		});

//AMBIL NILAI TOTAL ITEM KELUAR
		self::creating(function($itemKeluar) {

			$total_nilai_item_keluar = Hpp::where('no_faktur', $itemKeluar->no_faktur)->sum('total_nilai');
			$itemKeluar->total = $total_nilai_item_keluar;

			return true;
	    
	    });  
	}
}
