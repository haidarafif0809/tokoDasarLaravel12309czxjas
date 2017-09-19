<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class KategoriProdukTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testTambahKategoriProduk(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Kategori Produk')
                  ->clickLink('Tambah Kategori Produk')
                  ->type('nama_kategori_barang','ABC') 
                  ->press('Simpan')
                  ->assertSee('Berhasil Menambah Kategori Produk ABC');
        });  
    } 

    public function testUbahKategoriProduk(){ 

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Kategori Produk')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABC')
                              ->clickLink('Ubah');
                    })
                  ->assertSee('Edit Kategori Produk')
                  ->type('nama_kategori_barang','ABC EDIT') 
                  ->press('Simpan')
                  ->assertSee('Berhasil Mengubah Kategori Produk ABC EDIT');
        }); 
    }   

     public function testHapusKategoriProduk(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Kategori Produk')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABC EDIT')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Kategori Produk Berhasil Di Hapus');

                 
        });

    }

    public function testTidakBolehHapusKategoriProduk(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Kategori Produk')
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('FITTING')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Kategori Produk Tidak Bisa Di Hapus Karena Masih Memiliki Produk');      
        }); 
    } 

     public function testNamaKategoriProdukTidakBolehSama(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Kategori Produk')
                  ->clickLink('Tambah Kategori Produk')
                  ->type('nama_kategori_barang','FITTING') 
                  ->press('Simpan')
                  ->type('nama_kategori_barang','fokus')
                  ->assertSee('Mohon Maaf nama kategori barang yang anda isi sudah ada.');
        });

    }
}
