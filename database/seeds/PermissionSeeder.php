<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // MASTER DATA          
        $lihat_master_data = Permission::create(['name'=> 'lihat_master_data','display_name' => 'Lihat Master Data','grup'=>'master_data']);
        // AKUNTASI        
        $lihat_akuntasi = Permission::create(['name'=> 'lihat_akuntasi','display_name' => 'Lihat Akuntasi','grup'=>'akuntasi']);
        // PERSEDIAAN        
        $lihat_persediaan = Permission::create(['name'=> 'lihat_persediaan','display_name' => 'Lihat Persediaan','grup'=>'persediaan']);
        // SATUAN        
        $tambah_satuan = Permission::create(['name'=> 'tambah_satuan','display_name' => 'Tambah Satuan','grup'=>'satuan']);
        $edit_satuan = Permission::create(['name'=> 'edit_satuan','display_name' => 'Edit Satuan','grup'=>'satuan']);
        $hapus_satuan = Permission::create(['name'=> 'hapus_satuan','display_name' => 'Hapus Satuan','grup'=>'satuan']);
        $lihat_satuan = Permission::create(['name'=> 'lihat_satuan','display_name' => 'Lihat Satuan','grup'=>'satuan']);
        //USER
        $tambah_user = Permission::create(['name'=> 'tambah_user','display_name' => 'Tambah User','grup'=>'user']);
        $edit_user = Permission::create(['name'=> 'edit_user','display_name' => 'Edit User','grup'=>'user']);
        $hapus_user = Permission::create(['name'=> 'hapus_user','display_name' => 'Hapus User','grup'=>'user']);
        $lihat_user = Permission::create(['name'=> 'lihat_user','display_name' => 'Lihat User','grup'=>'user']);
        $konfirmasi_user = Permission::create(['name'=> 'konfirmasi_user','display_name' => 'Konfirmasi User','grup'=>'user']);
        $reset_password_user = Permission::create(['name'=> 'reset_password_user','display_name' => 'Reset Password User','grup'=>'user']);
        //OTORITAS
        $tambah_otoritas = Permission::create(['name'=> 'tambah_otoritas','display_name' => 'Tambah Otoritas','grup'=>'otoritas']);
        $edit_otoritas = Permission::create(['name'=> 'edit_otoritas','display_name' => 'Edit Otoritas','grup'=>'otoritas']);
        $hapus_otoritas = Permission::create(['name'=> 'hapus_otoritas','display_name' => 'Hapus Otoritas','grup'=>'otoritas']);
        $lihat_otoritas = Permission::create(['name'=> 'lihat_otoritas','display_name' => 'Lihat Otoritas','grup'=>'otoritas']);
        $permission_otoritas = Permission::create(['name'=> 'permission_otoritas','display_name' => 'Permission Otoritas','grup'=>'otoritas']);
        // SUPLIER        
        $tambah_suplier = Permission::create(['name'=> 'tambah_suplier','display_name' => 'Tambah Suplier','grup'=>'suplier']);
        $edit_suplier = Permission::create(['name'=> 'edit_suplier','display_name' => 'Edit Suplier','grup'=>'suplier']);
        $hapus_suplier = Permission::create(['name'=> 'hapus_suplier','display_name' => 'Hapus Suplier','grup'=>'suplier']);
        $lihat_suplier = Permission::create(['name'=> 'lihat_suplier','display_name' => 'Lihat Suplier','grup'=>'suplier']);
        // KATEGORI PRODUK        
        $tambah_kategori_produk = Permission::create(['name'=> 'tambah_kategori_produk','display_name' => 'Tambah Kategori Produk','grup'=>'kategori_produk']);
        $edit_kategori_produk = Permission::create(['name'=> 'edit_kategori_produk','display_name' => 'Edit Kategori Produk','grup'=>'kategori_produk']);
        $hapus_kategori_produk = Permission::create(['name'=> 'hapus_kategori_produk','display_name' => 'Hapus Kategori Produk','grup'=>'kategori_produk']);
        $lihat_kategori_produk = Permission::create(['name'=> 'lihat_kategori_produk','display_name' => 'Lihat Kategori Produk','grup'=>'kategori_produk']);
        // Pelanggan        
        $tambah_pelanggan = Permission::create(['name'=> 'tambah_pelanggan','display_name' => 'Tambah Pelanggan','grup'=>'pelanggan']);
        $edit_pelanggan = Permission::create(['name'=> 'edit_pelanggan','display_name' => 'Edit Pelanggan','grup'=>'pelanggan']);
        $hapus_pelanggan = Permission::create(['name'=> 'hapus_pelanggan','display_name' => 'Hapus Pelanggan','grup'=>'pelanggan']);
        $lihat_pelanggan = Permission::create(['name'=> 'lihat_pelanggan','display_name' => 'Lihat Pelanggan','grup'=>'pelanggan']);
        // PRODUK        
        $tambah_produk = Permission::create(['name'=> 'tambah_produk','display_name' => 'Tambah Produk','grup'=>'produk']);
        $edit_produk = Permission::create(['name'=> 'edit_produk','display_name' => 'Edit Produk','grup'=>'produk']);
        $hapus_produk = Permission::create(['name'=> 'hapus_produk','display_name' => 'Hapus Produk','grup'=>'produk']);
        $lihat_produk = Permission::create(['name'=> 'lihat_produk','display_name' => 'Lihat Produk','grup'=>'produk']);
        // DAFTAR AKUN        
        $tambah_daftar_akun = Permission::create(['name'=> 'tambah_daftar_akun','display_name' => 'Tambah Daftar Akun','grup'=>'daftar_akun']);
        $edit_daftar_akun = Permission::create(['name'=> 'edit_daftar_akun','display_name' => 'Edit Daftar Akun','grup'=>'daftar_akun']);
        $hapus_daftar_akun = Permission::create(['name'=> 'hapus_daftar_akun','display_name' => 'Hapus Daftar Akun','grup'=>'daftar_akun']);
        $lihat_daftar_akun = Permission::create(['name'=> 'lihat_daftar_akun','display_name' => 'Lihat Daftar Akun','grup'=>'daftar_akun']);
        // GROUP AKUN        
        $tambah_group_akun = Permission::create(['name'=> 'tambah_group_akun','display_name' => 'Tambah Group Akun','grup'=>'group_akun']);
        $edit_group_akun = Permission::create(['name'=> 'edit_group_akun','display_name' => 'Edit Group Akun','grup'=>'group_akun']);
        $hapus_group_akun = Permission::create(['name'=> 'hapus_group_akun','display_name' => 'Hapus Group Akun','grup'=>'group_akun']);
        $lihat_group_akun = Permission::create(['name'=> 'lihat_group_akun','display_name' => 'Lihat Group Akun','grup'=>'group_akun']);
        // SETTING AKUN         
        $edit_setting_akun = Permission::create(['name'=> 'edit_setting_akun','display_name' => 'Edit Setting Akun','grup'=>'setting_akun']); 
        $lihat_setting_akun = Permission::create(['name'=> 'lihat_setting_akun','display_name' => 'Lihat Setting Akun','grup'=>'setting_akun']);
        // ITEM KELUAR
        $tambah_item_keluar = Permission::create(['name'=> 'tambah_item_keluar','display_name' => 'Tambah Item Keluar','grup'=>'item_keluar']);
        $edit_item_keluar = Permission::create(['name'=> 'edit_item_keluar','display_name' => 'Edit Item Keluar','grup'=>'item_keluar']);
        $hapus_item_keluar = Permission::create(['name'=> 'hapus_item_keluar','display_name' => 'Hapus Item Keluar','grup'=>'item_keluar']);
        $lihat_item_keluar = Permission::create(['name'=> 'lihat_item_keluar','display_name' => 'Lihat Item Keluar','grup'=>'item_keluar']);
        // ITEM MASUK
        $tambah_item_masuk = Permission::create(['name'=> 'tambah_item_masuk','display_name' => 'Tambah Item Masuk','grup'=>'item_masuk']);
        $edit_item_masuk = Permission::create(['name'=> 'edit_item_masuk','display_name' => 'Edit Item Masuk','grup'=>'item_masuk']);
        $hapus_item_masuk = Permission::create(['name'=> 'hapus_item_masuk','display_name' => 'Hapus Item Masuk','grup'=>'item_masuk']);
        $lihat_item_masuk = Permission::create(['name'=> 'lihat_item_masuk','display_name' => 'Lihat Item Masuk','grup'=>'item_masuk']);
        // STOK AWAL
        $tambah_stok_awal = Permission::create(['name'=> 'tambah_stok_awal','display_name' => 'Tambah Stok Awal','grup'=>'stok_awal']);
        $edit_stok_awal = Permission::create(['name'=> 'edit_stok_awal','display_name' => 'Edit Stok Awal','grup'=>'stok_awal']);
        $hapus_stok_awal = Permission::create(['name'=> 'hapus_stok_awal','display_name' => 'Hapus Stok Awal','grup'=>'stok_awal']);
        $lihat_stok_awal = Permission::create(['name'=> 'lihat_stok_awal','display_name' => 'Lihat Stok Awal','grup'=>'stok_awal']);
         
         $role = Role::find(1);
          $role->attachPermissions([$lihat_master_data,
                $lihat_akuntasi,
                $lihat_persediaan,
                $tambah_satuan,
                $edit_satuan,
                $hapus_satuan,
                $lihat_satuan,
                $tambah_user,
                $edit_user,
                $hapus_user,
                $lihat_user,
                $konfirmasi_user,
                $lihat_otoritas,
                $permission_otoritas,
                $tambah_suplier,
                $reset_password_user,
                $tambah_otoritas,
                $edit_otoritas,
                $hapus_otoritas,
                $edit_suplier,
                $hapus_suplier,
                $lihat_suplier,
                $tambah_kategori_produk,
                $edit_kategori_produk,
                $hapus_kategori_produk,
                $lihat_kategori_produk,
                $tambah_pelanggan,
                $edit_pelanggan,
                $hapus_pelanggan,
                $lihat_pelanggan,
                $tambah_produk,
                $edit_produk,
                $hapus_produk,
                $lihat_produk,
                $tambah_daftar_akun,
                $edit_daftar_akun,
                $hapus_daftar_akun,
                $lihat_daftar_akun,
                $tambah_group_akun,
                $edit_group_akun,
                $hapus_group_akun,
                $lihat_group_akun,
                $edit_setting_akun,
                $lihat_setting_akun,
                $tambah_item_keluar,
                $edit_item_keluar,
                $hapus_item_keluar,
                $lihat_item_keluar,
                $tambah_item_masuk,
                $edit_item_masuk,
                $hapus_item_masuk,
                $lihat_item_masuk,
                $tambah_stok_awal,
                $edit_stok_awal,
                $hapus_stok_awal,
                $lihat_stok_awal]);


    } 
}
