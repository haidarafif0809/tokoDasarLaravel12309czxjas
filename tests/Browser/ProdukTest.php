<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class ProdukTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testTambahProduk(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/master_barang') 
                  ->clickLink('Tambah Produk')
                  ->type('kode_barcode','5700021000')
                  ->type('kode_barang','B000')
                  ->type('nama_barang','ABC');
                    $first->script("document.getElementById('pilih_golongan_barang').selectize.setValue('Barang');");  
                    $first->assertSee('Barang');
                    $first->script("document.getElementById('pilih_kategori_barang').selectize.setValue('2');");  
                    $first->assertSee('FITTING')
                  ->type('harga_beli','1000')
                  ->type('harga_jual','2000');
                    $first->script("document.getElementById('pilih_satuan').selectize.setValue('8');");  
                    $first->assertSee('BUNGKUS');
                    $first->script("document.getElementById('pilih_status').selectize.setValue('Aktif');");  
                    $first->assertSee('Aktif')
                  ->type('limit_stok','100')
                  ->type('over_stok','100')
                  ->press('Simpan')
                  ->assertSee('Berhasil Menambahkan Produk ABC');
        }); 
    } 

    public function testUbahProduk(){

 
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/master_barang')  
                  ->whenAvailable('.js-confirm', function ($table) { 
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABC')
                              ->clickLink('Ubah');
                    })
                  ->assertSee('Edit Produk')
                  ->type('kode_barcode','5700021001')
                  ->type('kode_barang','B001')
                  ->type('nama_barang','ABCD');
                    $first->script("document.getElementById('pilih_golongan_barang').selectize.setValue('Barang');");  
                    $first->assertSee('Barang');
                    $first->script("document.getElementById('pilih_kategori_barang').selectize.setValue('2');");  
                    $first->assertSee('FITTING')
                  ->type('harga_beli','10000')
                  ->type('harga_jual','20000');
                    $first->script("document.getElementById('pilih_satuan').selectize.setValue('8');");  
                    $first->assertSee('BUNGKUS');
                    $first->script("document.getElementById('pilih_status').selectize.setValue('Aktif');");  
                    $first->assertSee('Aktif')
                  ->type('limit_stok','1000')
                  ->type('over_stok','1000')
                  ->press('Simpan')
                  ->assertSee('Berhasil Mengubah Produk ABCD');
        }); 
    }   

     public function testHapusProduk(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/master_barang')  
                  ->whenAvailable('.js-confirm', function ($table) {  
                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('ABCD')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('Barang Berhasil Di Hapus');

                 
        });

    }

     public function testNamaProdukTidakBolehSama(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/master_barang') 
                  ->clickLink('Tambah Produk')
                  ->type('kode_barcode','5700021002')
                  ->type('kode_barang','B002')
                  ->type('nama_barang','MINYAK BIMOLI 1 L ');
                    $first->script("document.getElementById('pilih_golongan_barang').selectize.setValue('Barang');");  
                    $first->assertSee('Barang');
                    $first->script("document.getElementById('pilih_kategori_barang').selectize.setValue('2');");  
                    $first->assertSee('FITTING')
                  ->type('harga_beli','1000')
                  ->type('harga_jual','2000');
                    $first->script("document.getElementById('pilih_satuan').selectize.setValue('8');");  
                    $first->assertSee('BUNGKUS');
                    $first->script("document.getElementById('pilih_status').selectize.setValue('Aktif');");  
                    $first->assertSee('Aktif')
                  ->type('limit_stok','100')
                  ->type('over_stok','100')
                  ->press('Simpan')
                  ->type('kode_barcode','fokus')
                  ->assertSee('Mohon Maaf kode barcode yang anda isi sudah ada.');
        });

    }  
}
