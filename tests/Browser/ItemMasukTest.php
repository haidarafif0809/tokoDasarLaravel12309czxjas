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

      $bulan_sekarang = date('m');

      $tahun_sekarang = date('Y');
      $tahun_terakhir = substr($tahun_sekarang, 2);
       //mengecek jumlah karakter dari bulan sekarang
        $cek_jumlah_bulan = strlen($bulan_sekarang);

      //jika jumlah karakter dari bulannya sama dengan 1 maka di tambah 0 di depannya
        if ($cek_jumlah_bulan == 1) {
          $bulan_terakhir = "0".$bulan_sekarang;
         }
        else{
          $bulan_terakhir = $bulan_sekarang;
         }

      $no_faktur = '1/IM/'.$bulan_terakhir.'/'.$tahun_terakhir;

           $this->browse(function ($first, $second) use ($no_faktur){
            
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
                ->assertSee('SUKSES : BERHASIL MELAKUKAN TRANSAKSI ITEM MASUK')
                ->whenAvailable('.js-confirm', function ($table) {})
                ->with('.table', function ($table) use ($no_faktur) {
                          $table->assertSee('55000.00'

                            )->assertSee($no_faktur

                            );
                      });
                  
        });  
    }  

 public function testSelesaiBelumAdaProduk(){

           $this->browse(function ($first, $second) {
            
                $browser =  $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Item Masuk')
                  ->assertVisible('#link-tambah-item-masuk')
                    ->visit(
                        $first->attribute('#link-tambah-item-masuk', 'href')
                    )
                
                  ->assertSee('Tambah Item Masuk') 
                  ->click('#btnSelesai')
                  ->assertSee('Anda Yakin Ingin Menyelesaikan Transaksi Ini')
                  ->type('#keterangan','keterangan testing')
                  ->press('#btn-simpan-item-masuk')
                  ->assertSee('GAGAL : BELUM ADA PRODUK YANG DI INPUTKAN');
                  
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
                ->waitFor('.js-confirm')
                ->with('.table', function ($table) {
                        $table->assertSee('KECAP ASIN ABC')
                        //cari tombol hapus tbs item masuk dan scroll ke sana
                        ->element('.btn-hapus-tbs')->getLocationOnScreenOnceScrolledIntoView();
                        //form hapus tbs item masuknya di submit
                        $table->element('.form-hapus-tbs')->submit();
                      
                    })
                //untuk menclick tombol oke di alert dialog javascript untuk menghapus tbs item masuk
                ->driver->switchTo()->alert()->accept()
                ;

                $browser->assertSee('SUKSES : BERHASIL MENGHAPUS PRODUK')
                ->assertDontSee('KECAP ASIN ABC'
                  );
                  
        });  
    } 
    public function testHapusItemMasuk(){

      $bulan_sekarang = date('m');

      $tahun_sekarang = date('Y');
      $tahun_terakhir = substr($tahun_sekarang, 2);
       //mengecek jumlah karakter dari bulan sekarang
        $cek_jumlah_bulan = strlen($bulan_sekarang);

      //jika jumlah karakter dari bulannya sama dengan 1 maka di tambah 0 di depannya
        if ($cek_jumlah_bulan == 1) {
          $bulan_terakhir = "0".$bulan_sekarang;
         }
        else{
          $bulan_terakhir = $bulan_sekarang;
         }

      $no_faktur = '1/IM/'.$bulan_terakhir.'/'.$tahun_terakhir;

           $this->browse(function ($first, $second) use ($no_faktur) {
            
                $browser =  $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('Item Masuk');

                  $browser->whenAvailable('.js-confirm', function ($table) {
                         

                                ;
                      })
                  ->with('.table', function ($table) use ($no_faktur){
                          $table->assertSee($no_faktur)
                                ->press('Hapus');
                      })
                  //untuk menclick tombol oke di alert dialog javascript
                  ->driver->switchTo()->alert()->accept()
                  ;

                  $browser->assertDontSee($no_faktur
                  )->assertSee('SUKSES : ITEM MASUK BERHASIL DIHAPUS');
                  
        });  
    }



}
