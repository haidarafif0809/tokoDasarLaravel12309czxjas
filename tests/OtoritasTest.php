<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Role;

class OtoritasTest extends TestCase
{ 
	use DatabaseTransactions;

	public function testOtoritasCrud()
    {  
    	//MEMBUAT DATA
    	$password = bcrypt('rahasia');
        $otoritas = Role::create(['name' => 'role_testing', 'display_name' => 'Role Testing']);

    	//MENGECEK DATA YANG BARU DI BUAT
        $this -> seeInDatabase('roles', ['name' => 'role_testing', 'display_name' => 'Role Testing']); 

    	//MENGUBAH DATA YANG BARU DI BUAT
        Role::find($otoritas->id)->update(['name' => 'role_testing_update', 'display_name' => 'Role Testing Update']);
 		
    	//MENGECEK DATA YANG BARU DI UBAH
 		$this->seeInDatabase('roles',['name' => 'role_testing_update', 'display_name' => 'Role Testing Update']);

    	//MENGHAPUS DATA YANG DI BUAT
 		Role::destroy($otoritas->id); 
 		$otoritas = Role::find($otoritas->id);
 		$this->assertEquals(null,$otoritas);
    }
}
