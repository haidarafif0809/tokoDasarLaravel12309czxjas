<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations; 
use App\User;

class OtoritasTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testTambahOtoritas(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Otoritas')
                  ->clickLink('Tambah Otoritas')
                  ->type('name','abc')
                  ->type('display_name','ABC')
                  ->press('Simpan')
                  ->assertSee('Berhasil Menambah Otoritas ABC');
        });  
    } 

    public function testUbahOtoritas(){ 

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Otoritas')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABC')
                              ->clickLink('Ubah');
                    })
                  ->assertSee('Edit Otoritas')
                  ->type('name','abcd')
                  ->type('display_name','ABCD')
                  ->press('Simpan')
                  ->assertSee('Berhasil Mengubah Otoritas ABCD');
        }); 
    }   

     public function testHapusOtoritas(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Otoritas')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABCD')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Otoritas Berhasil Di Hapus');

                 
        });

    }

    public function testTidakBolehHapusOtoritas(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Otoritas')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('Admin')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Otoritas tidak bisa dihapus karena masih memiliki User');      
        }); 
    } 
     public function testNamaOtoritasTidakBolehSama(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Otoritas')
                  ->clickLink('Tambah Otoritas')
                  ->type('name','admin')
                  ->type('display_name','Admin')
                  ->press('Simpan')
                  ->type('name','fokus')
                  ->assertSee('Mohon Maaf name yang anda isi sudah ada.');
        });

    }
}
