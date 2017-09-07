<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
	use DatabaseTransactions;

	public function testUserCrud()
    {  
    	//MEMBUAT DATA
    	$password = bcrypt('rahasia');
        $user = User::create(['name' => 'testing', 'email' => 'testing@gmail.com', 'password' =>  $password,'alamat'=>'jalan testing','status'=>'0']);

    	//MENGECEK DATA YANG BARU DI BUAT
        $this -> seeInDatabase('users', ['name' => 'testing', 'email' => 'testing@gmail.com', 'password' => $password,'alamat'=>'jalan testing','status'=>'0']); 

    	//MENGUBAH DATA YANG BARU DI BUAT
        User::find($user->id)->update(['name' => 'testing update', 'email' => 'testingupdate@gmail.com', 'password' => $password,'alamat'=>'jalan testing update','status'=>'0']);
 		
    	//MENGECEK DATA YANG BARU DI UBAH
 		$this->seeInDatabase('users',['name' => 'testing update', 'email' => 'testingupdate@gmail.com', 'password' => $password,'alamat'=>'jalan testing update','status'=>'0']);

    	//MENGHAPUS DATA YANG DI BUAT
 		User::destroy($user->id); 
 		$user = User::find($user->id);
 		$this->assertEquals(null,$user);
    }
}
