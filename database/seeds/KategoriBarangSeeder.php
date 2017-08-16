<?php

use Illuminate\Database\Seeder;
use App\KategoriBarang;

class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    // Membuat sample kategori barang
    $kategori_barang = new KategoriBarang();
    $kategori_barang->nama_kategori_barang = "SEMBAKOk"; 
    $kategori_barang->save();

    // Membuat sample kategori barang
    $kategori_barang = new KategoriBarang();
    $kategori_barang->nama_kategori_barang = "FITTING"; 
    $kategori_barang->save();

    // Membuat sample kategori barang
    $kategori_barang = new KategoriBarang();
    $kategori_barang->nama_kategori_barang = "PIPA"; 
    $kategori_barang->save();
    
    // Membuat sample kategori barang
    $kategori_barang = new KategoriBarang();
    $kategori_barang->nama_kategori_barang = "GUTTER"; 
    $kategori_barang->save();
    }
}
