<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Role;

class OtoritasTest extends TestCase
{ 
	use DatabaseTransactions;

       protected function setUp()
    {
        parent::setUp();
        /*kode untuk menset base url nya jadi localhost
          karena kalau gak localhost jadi tidak bisa jalan testing http nya
         selalu responnya 404 */
        URL::forceRootUrl('https://localhost');
    
    }

	public function testOtoritasCrudDatabaseOtoritas()
    {  
    	//MEMBUAT DATA

    	$password = bcrypt('rahasia');
        $otoritas = Role::create(['name' => 'role_testing', 'display_name' => 'Role Testing']);

    	//MENGECEK DATA YANG BARU DI BUAT
        $this -> assertDatabaseHas('roles', ['name' => 'role_testing', 'display_name' => 'Role Testing']); 

    	//MENGUBAH DATA YANG BARU DI BUAT
        Role::find($otoritas->id)->update(['name' => 'role_testing_update', 'display_name' => 'Role Testing Update']);
 		
    	//MENGECEK DATA YANG BARU DI UBAH
 		$this->assertDatabaseHas('roles',['name' => 'role_testing_update', 'display_name' => 'Role Testing Update']);

    	//MENGHAPUS DATA YANG DI BUAT
 		Role::destroy($otoritas->id); 
 		$otoritas = Role::find($otoritas->id);
 		$this->assertEquals(null,$otoritas);
    }

    public function testHTTPTambahOtoritas (){
 
        $user = App\User::find(1); 
        $response = $this->actingAs($user)->json('POST', route('master_otoritas.store'), ['name' => 'abc','display_name'=>'ABC']);

        $response->assertStatus(302)
                 ->assertRedirect(route('master_otoritas.index'));
        

        $response2 = $this->get($response->headers->get('location'))->assertSee('Berhasil Menambah Otoritas ABC');

        $this->assertDatabaseHas('role_user',['name' => 'abc','display_name'=>'ABC']);
    }

    public function testHTTPUpdateOtoritas (){

        $otoritas = Role::create(['name' => 'abc','display_name'=>'ABC']); 
        $user = App\User::find(1); 
        $response = $this->actingAs($user)->get(route('master_otoritas.edit',$otoritas->id)); 
        $response->assertStatus(200)
                 ->assertSee('Edit Otoritas');
 
    }

    public function testHTTPEditSatuan (){
 
        $satuan = Role::create(['name' => 'abc','display_name'=>'ABC']); 
        $user = App\User::find(1); 
        $response = $this->actingAs($user)->json('POST', route('master_otoritas.update',$satuan->id), ['_method' => 'PUT','name' => 'abc_update','display_name'=>'ABC UPDATE']); 
        $response->assertStatus(302)
                 ->assertRedirect(route('master_otoritas.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee('Berhasil Mengubah Otoritas ABC UPDATE');
 
    }


    public function testHTTPHapusOtoritas(){ 
        $otoritas = Role::create(['name' => 'abc','display_name'=>'ABC']); 
        $user = App\User::find(1);

        $response = $this->actingAs($user)->json('POST', route('master_otoritas.destroy',$otoritas->id), ['_method' => 'DELETE']);

        $response->assertStatus(302)
                 ->assertRedirect(route('master_otoritas.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee('Otoritas Berhasil Di Hapus');

        

    }

}
