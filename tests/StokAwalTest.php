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

       protected function setUp()
    {
        parent::setUp();
        /*kode untuk menset base url nya jadi localhost
          karena kalau gak localhost jadi tidak bisa jalan testing http nya
         selalu responnya 404 */
        URL::forceRootUrl('https://localhost');
    
    }
    public function testStokAwalCrud()
    {
    	
    	//testing tambah data
        $stok_awal = StokAwal::create(["nomor_faktur" => "1/SA/09/17","id_produk" => "1","jumlah_produk"=>"1","keterangan"=>"-","user_buat"=>"1","user_edit"=>"1"]);

		$this->assertDatabaseHas('stok_awals', ["nomor_faktur" => "1/SA/09/17","id_produk" => "1","jumlah_produk"=>"1","keterangan"=>"-","user_buat"=>"1","user_edit"=>"1"]);

		// testing update data
		StokAwal::find($stok_awal->id)->update(["id_produk" => "2","jumlah_produk"=>"2","keterangan"=>"-","user_buat"=>"1","user_edit"=>"1"]);

		$this->assertDatabaseHas('stok_awals', ["id_produk" => "2","jumlah_produk"=>"2","keterangan"=>"-","user_buat"=>"1","user_edit"=>"1"]);

		//teting delete data 
		$hapus_stok_awal = StokAwal::destroy($stok_awal->id);

        $stok_awal = StokAwal::find($stok_awal->id);
		$this->assertEquals(null,$stok_awal);

    }

     





}
