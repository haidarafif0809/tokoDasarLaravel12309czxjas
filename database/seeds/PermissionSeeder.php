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
        //

        Permission::create(['name'=> 'tambah_satuan','display_name' => 'Tambah Satuan','grup'=>'satuan']);
        Permission::create(['name'=> 'edit_satuan','display_name' => 'Edit Satuan','grup'=>'satuan']);
        Permission::create(['name'=> 'hapus_satuan','display_name' => 'Hapus Satuan','grup'=>'satuan']);
        Permission::create(['name'=> 'lihat_satuan','display_name' => 'Lihat Satuan','grup'=>'satuan']);

        Permission::create(['name'=> 'tambah_user','display_name' => 'Tambah User','grup'=>'user']);
        Permission::create(['name'=> 'edit_user','display_name' => 'Edit User','grup'=>'user']);
        Permission::create(['name'=> 'hapus_user','display_name' => 'Hapus User','grup'=>'user']);
        Permission::create(['name'=> 'lihat_user','display_name' => 'Lihat User','grup'=>'user']);
        Permission::create(['name'=> 'konfirmasi_user','display_name' => 'Konfirmasi User','grup'=>'user']);
        Permission::create(['name'=> 'reset_password_user','display_name' => 'Reset Password User','grup'=>'user']);
    } 
}
