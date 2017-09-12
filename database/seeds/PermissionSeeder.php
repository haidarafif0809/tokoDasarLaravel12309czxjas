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

        Permission::create(['name'=> 'tambah_satuan','display_name' => 'Tambah Satuan']);
        Permission::create(['name'=> 'edit_satuan','display_name' => 'Edit Satuan']);
        Permission::create(['name'=> 'hapus_satuan','display_name' => 'Hapus Satuan']);
        Permission::create(['name'=> 'lihat_satuan','display_name' => 'Lihat Satuan']);
    }
}
