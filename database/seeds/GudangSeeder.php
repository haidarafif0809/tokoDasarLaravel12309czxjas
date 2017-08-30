<?php

use Illuminate\Database\Seeder;
use App\Gudang;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // Membuat sample Gudang
    $gudang = new Gudang();
    $gudang->kode_gudang = "GD001"; 
    $gudang->nama_gudang = "Gudang A"; 
    $gudang->save();
    // Membuat sample Gudang
    $gudang = new Gudang();
    $gudang->kode_gudang = "GD002"; 
    $gudang->nama_gudang = "Gudang B"; 
    $gudang->save();
    // Membuat sample Gudang
    $gudang = new Gudang();
    $gudang->kode_gudang = "GD003"; 
    $gudang->nama_gudang = "Gudang C"; 
    $gudang->save();
    // Membuat sample Gudang
    $gudang = new Gudang();
    $gudang->kode_gudang = "GD004"; 
    $gudang->nama_gudang = "Gudang D"; 
    $gudang->save();
    }
}
