<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SuplierSeeder::class);
        $this->call(SatuanSeeder::class);
        $this->call(KategoriBarangSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(BarangTableSeeder::class);
        $this->call(GroupAkunSeeder::class);
        $this->call(DaftarAkunSeeder::class);

    }
}
