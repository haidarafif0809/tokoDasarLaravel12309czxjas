<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class PelangganTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testTambahPelanggan(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Pelanggan')
                  ->clickLink('Tambah Pelanggan')
                  ->type('kode_pelanggan','1')
                  ->type('nama_pelanggan','ABC');
                    $first->script("document.getElementById('pilih_level_harga').selectize.setValue('level_1');");  
                    $first->assertSee('Level 1')
                  ->type('tanggal_lahir','01/09/2017')
                  ->type('no_telpon','09999999')
                  ->type('alamat','-')
                  ->press('Simpan')
                  ->assertSee('Berhasil Menambah Pelanggan ABC');
        }); 
    } 

    public function testUbahPelanggan(){
  
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Pelanggan')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABC')
                              ->clickLink('Ubah');
                    })
                  ->assertSee('Edit Pelanggan')
                  ->type('kode_pelanggan','1')
                  ->type('nama_pelanggan','ABCD');
                    $first->script("document.getElementById('pilih_level_harga').selectize.setValue('level_2');");  
                    $first->assertSee('Level 2')
                  ->type('tanggal_lahir','09/09/2017')
                  ->type('no_telpon','099999')
                  ->type('alamat','Alamat Update')
                  ->press('Simpan')
                  ->assertSee('Berhasil Mengubah Pelanggan ABCD');
        }); 
    }   

     public function testHapusOtoritas(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Pelanggan')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABCD')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Pelanggan Berhasil Di Hapus');

                 
        });

    }  

     public function testKodePelangganTidakBolehSama(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Pelanggan')
                  ->clickLink('Tambah Pelanggan')
                  ->type('kode_pelanggan','2')
                  ->type('nama_pelanggan','ABCD');
                    $first->script("document.getElementById('pilih_level_harga').selectize.setValue('level_2');");  
                    $first->assertSee('Level 2')
                  ->type('tanggal_lahir','09/09/2017')
                  ->type('no_telpon','099999')
                  ->type('alamat','-')
                  ->press('Simpan')
                  ->type('kode_pelanggan','fokus')
                  ->assertSee('Mohon Maaf kode pelanggan yang anda isi sudah ada.');
        });

    }

     public function testKodePelangganTidakBolehSamaKetikaEdit(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Pelanggan')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('TB. B')
                              ->clickLink('Ubah');
                    })
                  ->assertSee('Edit Pelanggan')
                  ->type('kode_pelanggan','3')
                  ->type('nama_pelanggan','ABCD');
                    $first->script("document.getElementById('pilih_level_harga').selectize.setValue('level_2');");  
                    $first->assertSee('Level 2')
                  ->type('tanggal_lahir','09/09/2017')
                  ->type('no_telpon','099999')
                  ->type('alamat','-')
                  ->press('Simpan')
                  ->type('kode_pelanggan','fokus')
                  ->assertSee('Mohon Maaf kode pelanggan yang anda isi sudah ada.');
        });

    }


}
