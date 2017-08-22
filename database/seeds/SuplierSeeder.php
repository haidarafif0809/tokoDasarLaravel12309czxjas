<?php

use Illuminate\Database\Seeder;
use App\Suplier;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    // Membuat sample suplier
    $suplier = new Suplier();
    $suplier->nama_suplier = "Umum 1";
    $suplier->alamat = "-";
    $suplier->no_telpon = "01";
    $suplier->save();

    // Membuat sample suplier
    $suplier = new Suplier();
    $suplier->nama_suplier = "Umum 2";
    $suplier->alamat = "-";
    $suplier->no_telpon = "02";
    $suplier->save();

    // Membuat sample suplier
    $suplier = new Suplier();
    $suplier->nama_suplier = "Umum 3";
    $suplier->alamat = "-";
    $suplier->no_telpon = "03";
    $suplier->save();

    }
}
