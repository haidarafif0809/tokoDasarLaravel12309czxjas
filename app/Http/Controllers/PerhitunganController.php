<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    //

    public function pertambahan($angka_1,$angka_2){

    	$perhitungan = $angka_1 + $angka_2;

    	return $perhitungan;
    }

   public function pengurangan($angka_1,$angka_2){
   	$perhitungan = $angka_1 - $angka_2;
   	return $perhitungan;
   }
}
