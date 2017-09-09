<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\TbsItemKeluar;
use App\DetailItemKeluar;
use App\ItemKeluar;
use App\User;

class ItemKeluarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;

       protected function setUp()
    {
        parent::setUp();
        /*kode untuk menset base url nya jadi localhost
          karena kalau gak localhost jadi tidak bisa jalan testing http nya
         selalu responnya 404 */
        URL::forceRootUrl('https://localhost');
    
    }

    public function testTbsItemKeluarCrud()
    {
    	//INSERT (CREATE)
        $tbsItemKeluar = TbsItemKeluar::create(['session_id' => 'asdjiurjfkcdsuklsdfks', 'id_produk' => '1', 'jumlah_produk' => '2']);
        $this -> assertDatabaseHas('tbs_item_keluars', ['session_id' => 'asdjiurjfkcdsuklsdfks', 'id_produk' => '1', 'jumlah_produk' => '2']);

        //HAPUS
        TbsItemKeluar::destroy($tbsItemKeluar->id);
        $tbsItemKeluar = TbsItemKeluar::find($tbsItemKeluar->id);
        $this->assertEquals(null, $tbsItemKeluar);

    }

    // public function testSelesaiItemKeluar(){
    // 	//LOGIN SEBAGAI ADMIN
    // 	$user = User::find(1);
    // 	$response = $this->actingAs($user)->json('POST', route('item-keluar.store'), ['keterangan' => '-']);

    // 	$response->assertRedirectedTo(route('item-keluar.index'));
    	
    // 	$this->followRedirects($response)->see('Berhasil Melakukan Transaksi Item Keluar');

    //     $this -> assertDatabaseHas('item_keluars', ['no_faktur' => '1/IK/09/17', 'total' => '50000', 'user_buat' => '1', 'user_edit' => '1']);

    //     $this -> assertDatabaseHas('detail_item_keluars', ['no_faktur' => '1/IK/09/17', 'id_produk' => '1', 'jumlah_produk' => '2']);
    // }
}