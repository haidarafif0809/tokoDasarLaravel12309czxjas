<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controller\StokAwalController;
use App\StokAwal;


class StokAwalTest extends TestCase
{

	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStokAwalCrud()
    {
    	
    	//testing tambah data
        $stok_awal = StokAwal::create([ "id_produk" => "Afif","nomor_faktur" => "081222498686","jumlah_produk"=>"dsfsddsdsf","keterangan"=>"r534543","user_buat"=>"asdad","user_edit"=>"dasds"]);
		$this->seeInDatabase('stok_awals', [
         "id_produk" => "Afif","nomor_faktur" => "081222498686","jumlah_produk"=>"dsfsddsdsf","keterangan"=>"r534543","user_buat"=>"asdad","user_edit"=>"dasds"
      ]);

		// testing update data
		StokAwal::find($stok_awal->id)->update(["id_produk" => "Rama","nomor_faktur" => "04334/ksldf","jumlah_produk"=>"sad","keterangan"=>"sad","user_buat"=>"rtt","user_edit"=>"fgf"]);
		$this->seeInDatabase('stok_awals', [
         "id_produk" => "Rama","nomor_faktur" => "043ksldf","jumlah_produk"=>"sad","keterangan"=>"sad","user_buat"=>"rtt","user_edit"=>"fgf"
      ]);

		//teting delete data 
		$hapus_stok_awal = StokAwal::destroy($stok_awal->id);
		$this->assertTrue($hapus_stok_awal);

    }

     





}
