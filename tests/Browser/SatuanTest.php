<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Satuan;
use App\User;

class SatuanTest extends DuskTestCase
{
     public function testTambahSatuan(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Satuan')
                  ->clickLink('Tambah Satuan')
                  ->type('nama_satuan','ABC')
                  ->press('Simpan')
                  ->assertSee('Berhasil Menambah Satuan ABC');
        });

       

    } 

    public function testUbahSatuan(){



        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Satuan')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABC')
                              ->clickLink('Ubah');
                    })
                  ->assertSee('Edit Satuan')
                  ->type('nama_satuan','ABCD')
                  ->press('Simpan')
                  ->assertSee('Berhasil Mengubah Satuan ABCD')
                  ;
        });

    }   
     public function testHapusSatuan(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Satuan')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABCD')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Satuan Berhasil Di Hapus');

                 
        });

    }  

    public function testTidakBolehHapusSatuan(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Satuan')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('BUNGKUS')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Satuan Tidak Bisa Di Hapus Karena Masih Memiliki Produk');

                 
        });

    }   

     public function testNamaSatuanTidakBolehSama(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Satuan')
                  ->clickLink('Tambah Satuan')
                  ->type('nama_satuan','BUNGKUS')
                  ->press('Simpan')
                  ->type('nama_satuan','fokus')
                  ->assertSee('Mohon Maaf nama satuan yang anda isi sudah ada.');
        });

    }


}
