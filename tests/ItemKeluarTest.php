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

    public function testTbsItemKeluar()
    {
    	//INSERT (CREATE)
        $tbsItemKeluar = TbsItemKeluar::create(['session_id' => 'asdjiurjfkcdsuklsdfks', 'id_produk' => '1', 'jumlah_produk' => '2']);
        $this -> seeInDatabase('tbs_item_keluars', ['session_id' => 'asdjiurjfkcdsuklsdfks', 'id_produk' => '1', 'jumlah_produk' => '2']);

        //HAPUS
        TbsItemKeluar::destroy($tbsItemKeluar->id);
        $tbsItemKeluar = TbsItemKeluar::find($tbsItemKeluar->id);
        $this->assertEquals(null, $tbsItemKeluar);

		/*
        //BATAL
        TbsItemKeluar::find($tbsItemKeluar->session_id)->delete($tbsItemKeluar->session_id);
        $tbsItemKeluar = TbsItemKeluar::find($tbsItemKeluar->session_id);
        $this->assertEquals(null, $tbsItemKeluar);
        */

    }

    public function testSelesaiItemKeluar(){
    	//LOGIN SEBAGAI ADMIN
    	$user = User::find(1);
    	$response = $this->actingAs($user)->json('POST', route('item-keluar.store'), ['nomor_faktur' => '1/IK/09/17', 'total' => '50000', 'user_buat' => '1', 'user_edit' => '1']);

    	$response->assertRedirectedTo(route('item-keluar.index'));
    	
    	$response = $this->followRedirects($response)->see('Berhasil Melakukan Transaksi Item Keluar');

    	$itemKeluar = ItemKeluar::create(['nomor_faktur' => '1/IK/09/17', 'total' => '50000', 'user_buat' => '1', 'user_edit' => '1']);
        $this -> seeInDatabase('item_keluars', ['nomor_faktur' => '1/IK/09/17', 'total' => '50000', 'user_buat' => '1', 'user_edit' => '1']);

    	$detailItemKeluar = DetailItemKeluar::create(['no_faktur' => '1/IK/09/17', 'id_produk' => '1', 'jumlah_produk' => '2']);
        $this -> seeInDatabase('detail_item_keluars', ['no_faktur' => '1/IK/09/17', 'id_produk' => '1', 'jumlah_produk' => '2']);
    }
}
