<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations; 
use App\User;

class SuplierTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testTambahSuplier(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Suplier')
                  ->clickLink('Tambah Suplier')
                  ->type('nama_suplier','Abc Nama')
                  ->type('alamat','Abc Alamat')
                  ->type('no_telpon','Abc Nomor')
                  ->press('Simpan')
                  ->assertSee('Berhasil Menambah Suplier Abc Nama');
        });  
    }

    public function testUbahSuplier(){ 

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Suplier')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('Nama Suplier')
                              ->clickLink('Ubah');
                    })
                  ->assertSee('Edit Suplier')
                  ->type('nama_suplier','Abc Nama Edit')
                  ->type('alamat','Abc Alamat Edit')
                  ->type('no_telpon','Abc Nomor Edit')
                  ->press('Simpan')
                  ->assertSee('Berhasil Mengubah Suplier Abc Nama Edit');
        }); 
    }   
 
     public function testHapusSuplier(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Suplier')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('Abc Nama Edit')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Suplier Berhasil Di Hapus');

                 
        });

    }

     public function testNamaOtoritasTidakBolehSama(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Suplier')
                  ->clickLink('Tambah Suplier')
                  ->type('nama_suplier','Umum 1')
                  ->type('alamat','-')
                  ->type('no_telpon','01')
                  ->press('Simpan')
                  ->type('nama_suplier','fokus')
                  ->assertSee('Mohon Maaf nama suplier yang anda isi sudah ada.');
        });

    }
}
