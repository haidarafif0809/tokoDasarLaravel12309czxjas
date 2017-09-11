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

	public function testOtoritasCrud()
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
}
