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

    public function testCreateSatuan(){

    	//admin
    	$user = User::find(1); 
		
		 $response = $this->actingAs($user)->json('POST', route('master_satuan.store'), ['nama_satuan' => 'Sally']);

		 $response->assertRedirectedTo(route('master_satuan.index'));

         $this->followRedirects($response)->see('');   		
    }


}
