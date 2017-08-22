<?php

use Illuminate\Database\Seeder;
use App\GroupAkun;

class GroupAkunSeeder extends Seeder
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
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1"; 
    $group_akun->nama_group_akun = "ASET"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Member";  
    $group_akun->save();

    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2"; 
    $group_akun->nama_group_akun = "ASET 2"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Aset lancar"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Member";  
    $group_akun->save();

    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "3"; 
    $group_akun->nama_group_akun = "Kas"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Member";  
    $group_akun->save();
    }
}
