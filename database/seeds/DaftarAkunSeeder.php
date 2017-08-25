<?php

use Illuminate\Database\Seeder;
use App\DaftarAkun;

class DaftarAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "4-1500"; 
    $daftar_akun->nama_daftar_akun = "Potongan Jual"; 
    $daftar_akun->group_akun = "4-1000";  
    $daftar_akun->kategori_akun = "Pendapatan"; 
    $daftar_akun->tipe_akun = "Pendapatan Penjualan";  
    $daftar_akun->user_buat = "Member";  
    $daftar_akun->save();

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-1100"; 
    $daftar_akun->nama_daftar_akun = "Harga Pokok Penjualan Toko"; 
    $daftar_akun->group_akun = "5-1000";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Member";  
    $daftar_akun->save();

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-1200"; 
    $daftar_akun->nama_daftar_akun = "Harga Pokok Penjualan Toko"; 
    $daftar_akun->group_akun = "5-1000";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Member";  
    $daftar_akun->save();  
    }
}
