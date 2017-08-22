<?php

use Illuminate\Database\Seeder;
use App\Pelanggan;


class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    // Membuat sample pelanggan
    $pelanggan = new Pelanggan();
    $pelanggan->kode_pelanggan = "1"; 
    $pelanggan->nama_pelanggan = "TB. A"; 
    $pelanggan->no_telpon = "01";  
    $pelanggan->tanggal_lahir = "16/08/2017"; 
    $pelanggan->alamat = "Bandar Lampung 1";  
    $pelanggan->save();

    // Membuat sample pelanggan
    $pelanggan = new Pelanggan();
    $pelanggan->kode_pelanggan = "2"; 
    $pelanggan->nama_pelanggan = "TB. B"; 
    $pelanggan->no_telpon = "02";  
    $pelanggan->tanggal_lahir = "16/08/2017"; 
    $pelanggan->alamat = "Bandar Lampung 2";  
    $pelanggan->save();

    // Membuat sample pelanggan
    $pelanggan = new Pelanggan();
    $pelanggan->kode_pelanggan = "3"; 
    $pelanggan->nama_pelanggan = "TB. C"; 
    $pelanggan->no_telpon = "03";  
    $pelanggan->tanggal_lahir = "16/08/2017"; 
    $pelanggan->alamat = "Bandar Lampung 3";  
    $pelanggan->save();
    }
}
