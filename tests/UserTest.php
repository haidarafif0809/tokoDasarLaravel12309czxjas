<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
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

	public function testUserCrud()
    {  
    	//MEMBUAT DATA
    	$password = bcrypt('rahasia');
        $user = User::create(['name' => 'testing', 'email' => 'testing@gmail.com', 'password' =>  $password,'alamat'=>'jalan testing','status'=>'0']);

    	//MENGECEK DATA YANG BARU DI BUAT
        $this -> assertDatabaseHas('users', ['name' => 'testing', 'email' => 'testing@gmail.com', 'password' => $password,'alamat'=>'jalan testing','status'=>'0']); 

    	//MENGUBAH DATA YANG BARU DI BUAT
        User::find($user->id)->update(['name' => 'testing update', 'email' => 'testingupdate@gmail.com', 'password' => $password,'alamat'=>'jalan testing update','status'=>'0']);
 		
    	//MENGECEK DATA YANG BARU DI UBAH
 		$this->assertDatabaseHas('users',['name' => 'testing update', 'email' => 'testingupdate@gmail.com', 'password' => $password,'alamat'=>'jalan testing update','status'=>'0']);

    	//MENGHAPUS DATA YANG DI BUAT
 		User::destroy($user->id); 
 		$user = User::find($user->id);
 		$this->assertEquals(null,$user);
    }

    public function testHTTPHapusUser(){
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->json('POST', route('master_users.destroy',2), ['_method' => 'DELETE']);

        $response->assertStatus(302)
                 ->assertRedirect(route('master_users.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee('User Berhasil Di Hapus');

        $this->assertDatabaseMissing('users', ['id'=> 2]);
    }
    public function testHTTPUbahUser(){
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->json('POST', route('master_users.update',2), [
            'name'   => 'usertesting',
            'email'     => 'usertesting@gmail.com' , 
            'alamat'    => 'alamattesting',
            'role_id'    => '1',
            'role_lama'    => '2',
            '_method' => 'PUT'
            ]);

        $response->assertStatus(302)
                 ->assertRedirect(route('master_users.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee("Berhasil Mengubah User usertesting");
        $this->assertDatabaseHas('users', [ 'name'   => 'usertesting',
            'email'     => 'usertesting@gmail.com' , 
            'alamat'    => 'alamattesting',]);


    } 
    public function testHTTPResetPasswordUser(){
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->get( route('master_users.reset',2));

        $response->assertStatus(302)
                 ->assertRedirect(route('master_users.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee("Password Berhasil Di Reset");


    }  

    public function testHTTPKonfirmasiUser(){
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->get( route('master_users.konfirmasi',2));

        $response->assertStatus(302)
                 ->assertRedirect(route('master_users.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee("User Berhasil Di konfirmasi");

        $this->assertDatabaseHas('users',['id' => 2,'status' => 1]);


    }  public function testHTTPTidakJadiKonfirmasiUser(){
        
        $user = App\User::find(1);

        $response = $this->actingAs($user)->get( route('master_users.no_konfirmasi',2));

        $response->assertStatus(302)
                 ->assertRedirect(route('master_users.index'));
        
        $response2 = $this->get($response->headers->get('location'))->assertSee("User Tidak Di konfirmasi");

         $this->assertDatabaseHas('users',['id' => 2,'status' => 0]);


    }
}
