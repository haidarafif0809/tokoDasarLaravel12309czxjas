<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class ItemMasukTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testTambahTbsLewatBarcode(){

        $this->browse(function ($first, $second) {
            
                $browser =  $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Item Masuk')
                  ->assertVisible('#link-tambah-item-masuk')
                    ->visit(
                        $first->attribute('#link-tambah-item-masuk', 'href')
                    )
                
                  ->assertSee('Tambah Item Masuk')
                  ->type('#kode_barcode','5700011001')
                  ->click('#btnBarcode')
                  ->assertSee('SUKSES');
                  
        });  

    } 
    public function testTambahTbsLewatModal(){

        $this->browse(function ($first, $second) {
            
                $browser =  $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Item Masuk')
                  ->assertVisible('#link-tambah-item-masuk')
                    ->visit(
                        $first->attribute('#link-tambah-item-masuk', 'href')
                    )
                
                  ->assertSee('Tambah Item Masuk')
                  ->click('#cari_produk')
                  ->assertSee('Data Produk')
                  ;
                $browser->script("document.getElementById('pilih_produk').selectize.setValue('1');");

                $browser->assertSee('KECAP ASIN ABC')
                ->assertVisible('#btn-submit-produk-modal')
                ->press('#btn-submit-produk-modal')
                ->assertSee('SUKSES');
                  
        });  

    } 

    public function testSelesai(){

           $this->browse(function ($first, $second) {
            
                $browser =  $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Item Masuk')
                  ->assertVisible('#link-tambah-item-masuk')
                    ->visit(
                        $first->attribute('#link-tambah-item-masuk', 'href')
                    )
                
                  ->assertSee('Tambah Item Masuk')
                  ->click('#cari_produk')
                  ->assertSee('Data Produk')
                  ;
                $browser->script("document.getElementById('pilih_produk').selectize.setValue('1');");

                $browser->assertSee('KECAP ASIN ABC')
                ->assertVisible('#btn-submit-produk-modal')
                ->press('#btn-submit-produk-modal')
                ->assertSee('SUKSES')
                ->click('#btnSelesai')
                ->assertSee('Anda Yakin Ingin Menyelesaikan Transaksi Ini')
                ->type('#keterangan','keterangan testing')
                ->press('#btn-simpan-item-masuk')
                ->assertSee('SUKSES : BERHASIL MELAKUKAN TRANSAKSI ITEM MASUK');
                  
        });  
    }  

     public function testBatal(){

           $this->browse(function ($first, $second) {
            
                $browser =  $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Item Masuk')
                  ->assertVisible('#link-tambah-item-masuk')
                    ->visit(
                        $first->attribute('#link-tambah-item-masuk', 'href')
                    )
                
                  ->assertSee('Tambah Item Masuk')
                  ->click('#cari_produk')
                  ->assertSee('Data Produk')
                  ;
                $browser->script("document.getElementById('pilih_produk').selectize.setValue('1');");

                $browser->assertSee('KECAP ASIN ABC')
                ->assertVisible('#btn-submit-produk-modal')
                ->press('#btn-submit-produk-modal')
                ->assertSee('SUKSES')
                ->click('#btnBatal')
                ->driver->switchTo()->alert()->accept()
                ;

                $browser->assertSee('SUKSES : BERHASIL MEMBATALKAN ITEM MASUK')
                ->assertDontSee('KECAP ASIN ABC'
                  );
                  
        });  
    } 
    public function testHapusTbs(){

           $this->browse(function ($first, $second) {
            
                $browser =  $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Item Masuk')
                  ->assertVisible('#link-tambah-item-masuk')
                    ->visit(
                        $first->attribute('#link-tambah-item-masuk', 'href')
                    )
                
                  ->assertSee('Tambah Item Masuk')
                  ->click('#cari_produk')
                  ->assertSee('Data Produk')
                  ;
                //untuk memilih option di select yang pakai selectize
                $browser->script("document.getElementById('pilih_produk').selectize.setValue('1');");

                $browser->assertSee('KECAP ASIN ABC')
                ->assertVisible('#btn-submit-produk-modal')
                ->press('#btn-submit-produk-modal')
                ->assertSee('SUKSES')
                ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                ->with('.table', function ($table) {
                        $table->assertSee('KECAP ASIN ABC')
                              ->press('Hapus');
                    })
                //untuk menclick tombol oke di alert dialog javascript
                ->driver->switchTo()->alert()->accept()
                ;

                $browser->assertSee('SUKSES : BERHASIL MENGHAPUS PRODUK')
                ->assertDontSee('KECAP ASIN ABC'
                  );
                  
        });  
    }

}
