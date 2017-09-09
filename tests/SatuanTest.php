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



      protected function setUp()
    {
        parent::setUp();
        /*kode untuk menset base url nya jadi localhost
          karena kalau gak localhost jadi tidak bisa jalan testing http nya
         selalu responnya 404 */
        URL::forceRootUrl('https://localhost');
    
    }


   
    public function testCrudSatuan()
    {
        $satuan = Satuan::create(['nama_satuan' => 'testing satuan']);

        $this->assertDatabaseHas('satuans',['nama_satuan' => 'testing satuan']);

        Satuan::find($satuan->id)->update(['nama_satuan' => 'update satuan']);
 		
 		$this->assertDatabaseHas('satuans',['nama_satuan' => 'update satuan']);

 		Satuan::destroy($satuan->id);
 		$satuan = Satuan::find($satuan->id);
 		$this->assertEquals(null,$satuan);


    }

    public function testHTTPTambahSatuan (){

      
  

        $user = App\User::find(1);

        $response = $this->actingAs($user)->json('POST', route('master_satuan.store'), ['nama_satuan' => 'Satuan Test']);

        $response->assertStatus(302)
                 ->assertRedirect(route('master_satuan.index'));
        

        $response2 = $this->get($response->headers->get('location'))->assertSee('Berhasil Menambah Satuan Satuan Test');

        $this->assertDatabaseHas('satuans',['nama_satuan' => 'Satuan Test']);
    }

    public function testHTTPHapusSatuan(){


        $satuan = Satuan::create(['nama_satuan' => 'testing satuan']);
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->json('POST', route('master_satuan.destroy',$satuan->id), ['_method' => 'DELETE']);

        $response->assertStatus(302)
                 ->assertRedirect(route('master_satuan.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee('Satuan Berhasil Di Hapus');

        

    }

    public function testHTTPUpdateSatuan (){

        $satuan = Satuan::create(['nama_satuan' => 'testing satuan']);
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->get(route('master_satuan.edit',$satuan->id));

        $response->assertStatus(200)
                 ->assertSee('Edit Satuan');

     
    }

    public function testHTTPEditSatuan (){

        
        $satuan = Satuan::create(['nama_satuan' => 'testing satuan']);
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->json('POST', route('master_satuan.update',$satuan->id), ['_method' => 'PUT','nama_satuan' => 'testing satuan update']);

        $response->assertStatus(302)
                 ->assertRedirect(route('master_satuan.index'));
        
         $response2 = $this->get($response->headers->get('location'))->assertSee('Berhasil Mengubah Satuan testing satuan update');

     
    }


  
}
