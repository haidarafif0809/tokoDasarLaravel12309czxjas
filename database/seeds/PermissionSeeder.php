<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SATUAN        
        Permission::create(['name'=> 'tambah_satuan','display_name' => 'Tambah Satuan','grup'=>'satuan']);
        Permission::create(['name'=> 'edit_satuan','display_name' => 'Edit Satuan','grup'=>'satuan']);
        Permission::create(['name'=> 'hapus_satuan','display_name' => 'Hapus Satuan','grup'=>'satuan']);
        Permission::create(['name'=> 'lihat_satuan','display_name' => 'Lihat Satuan','grup'=>'satuan']);
        //USER
        Permission::create(['name'=> 'tambah_user','display_name' => 'Tambah User','grup'=>'user']);
        Permission::create(['name'=> 'edit_user','display_name' => 'Edit User','grup'=>'user']);
        Permission::create(['name'=> 'hapus_user','display_name' => 'Hapus User','grup'=>'user']);
        Permission::create(['name'=> 'lihat_user','display_name' => 'Lihat User','grup'=>'user']);
        Permission::create(['name'=> 'konfirmasi_user','display_name' => 'Konfirmasi User','grup'=>'user']);
        Permission::create(['name'=> 'reset_password_user','display_name' => 'Reset Password User','grup'=>'user']);
        //OTORITAS
        Permission::create(['name'=> 'tambah_otoritas','display_name' => 'Tambah Otoritas','grup'=>'otoritas']);
        Permission::create(['name'=> 'edit_otoritas','display_name' => 'Edit Otoritas','grup'=>'otoritas']);
        Permission::create(['name'=> 'hapus_otoritas','display_name' => 'Hapus Otoritas','grup'=>'otoritas']);
        Permission::create(['name'=> 'lihat_otoritas','display_name' => 'Lihat Otoritas','grup'=>'otoritas']);
        Permission::create(['name'=> 'permission_otoritas','display_name' => 'Permission Otoritas','grup'=>'otoritas']);
        // SUPLIER        
        Permission::create(['name'=> 'tambah_suplier','display_name' => 'Tambah Suplier','grup'=>'suplier']);
        Permission::create(['name'=> 'edit_suplier','display_name' => 'Edit Suplier','grup'=>'suplier']);
        Permission::create(['name'=> 'hapus_suplier','display_name' => 'Hapus Suplier','grup'=>'suplier']);
        Permission::create(['name'=> 'lihat_suplier','display_name' => 'Lihat Suplier','grup'=>'suplier']);
        // KATEGORI PRODUK        
        Permission::create(['name'=> 'tambah_kategori_produk','display_name' => 'Tambah Kategori Produk','grup'=>'kategori_produk']);
        Permission::create(['name'=> 'edit_kategori_produk','display_name' => 'Edit Kategori Produk','grup'=>'kategori_produk']);
        Permission::create(['name'=> 'hapus_kategori_produk','display_name' => 'Hapus Kategori Produk','grup'=>'kategori_produk']);
        Permission::create(['name'=> 'lihat_kategori_produk','display_name' => 'Lihat Kategori Produk','grup'=>'kategori_produk']);
        // Pelanggan        
        Permission::create(['name'=> 'tambah_pelanggan','display_name' => 'Tambah Pelanggan','grup'=>'pelanggan']);
        Permission::create(['name'=> 'edit_pelanggan','display_name' => 'Edit Pelanggan','grup'=>'pelanggan']);
        Permission::create(['name'=> 'hapus_pelanggan','display_name' => 'Hapus Pelanggan','grup'=>'pelanggan']);
        Permission::create(['name'=> 'lihat_pelanggan','display_name' => 'Lihat Pelanggan','grup'=>'pelanggan']);
        // PRODUK        
        Permission::create(['name'=> 'tambah_produk','display_name' => 'Tambah Produk','grup'=>'produk']);
        Permission::create(['name'=> 'edit_produk','display_name' => 'Edit Produk','grup'=>'produk']);
        Permission::create(['name'=> 'hapus_produk','display_name' => 'Hapus Produk','grup'=>'produk']);
        Permission::create(['name'=> 'lihat_produk','display_name' => 'Lihat Produk','grup'=>'produk']);
        // DAFTAR AKUN        
        Permission::create(['name'=> 'tambah_daftar_akun','display_name' => 'Tambah Daftar Akun','grup'=>'daftar_akun']);
        Permission::create(['name'=> 'edit_daftar_akun','display_name' => 'Edit Daftar Akun','grup'=>'daftar_akun']);
        Permission::create(['name'=> 'hapus_daftar_akun','display_name' => 'Hapus Daftar Akun','grup'=>'daftar_akun']);
        Permission::create(['name'=> 'lihat_daftar_akun','display_name' => 'Lihat Daftar Akun','grup'=>'daftar_akun']);

    } 
}
