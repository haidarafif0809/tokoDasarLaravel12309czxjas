<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Satuan;
use App\User;
class SatuanTest extends TestCase
{

	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCrudSatuan()
    {
        $satuan = Satuan::create(['nama_satuan' => 'testing satuan']);

        $this->seeInDatabase('satuans',['nama_satuan' => 'testing satuan']);

        Satuan::find($satuan->id)->update(['nama_satuan' => 'update satuan']);
 		
 		$this->seeInDatabase('satuans',['nama_satuan' => 'update satuan']);

 		Satuan::destroy($satuan->id);
 		$satuan = Satuan::find($satuan->id);
 		$this->assertEquals(null,$satuan);


    }
  
}
