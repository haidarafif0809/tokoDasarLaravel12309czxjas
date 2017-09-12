<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */


    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testRegistrasiUser(){
        $this->browse(function ($first, $second) {
            $first
                  ->visit('/register')
                  ->type('name','abctesting')
                  ->type('email','abctesting@gmail.com')
                  ->type('alamat','alamattesting')
                  ->type('password','passwordtest')
                  ->type('password_confirmation','passwordtest')
                  //klik tombol registrasi
                  ->press('.btn-primary')
                  ->assertSee('Anda Tidak Bisa Login Di Karenakan Belum DI Konfirmasi Oleh Admin.');

                 
        });
    }   
    
    public function testUbahUser(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('User')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('abctesting@gmail.com')
                              ->clickLink('Ubah');
                    });

            $first->assertSee('Edit User')
              ->type('name','abctestingubah')
              ->type('email','abctestingubah@gmail.com')
              ->type('alamat','alamattestingubah')
               //klik tombol registrasi
              ->press('.btn-primary')
              ->assertSee('Berhasil Mengubah User'
                );
               

                 
        });
    }

    


    public function testResetPasswordUser(){

          $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('User')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee('abctestingubah@gmail.com')
                              ->press('Reset Password');
                    })
                  ->driver->switchTo()->alert()->accept();

            $first
              ->assertSee('Password Berhasil Di Reset'
                );
               

                 
        });
    }

    public function testLoginDenganPasswordReset(){

        User::where('email','abctestingubah@gmail.com')->update(['status' => 1]);

          $this->browse(function ($first, $second) {
            $first
                  ->visit('/home')
                  ->clickLink('Logout')
                  ->visit('/login')
                  ->assertSee('E-Mail Address')
                  ->type('#email','abctestingubah@gmail.com')
                  ->type('#password','123456')
                  //klik tombol registrasi
                  ->press('.btn-primary')
                  ->assertDontSee('Anda Tidak Bisa Login Di Karenakan Belum DI Konfirmasi Oleh Admin.');

                 
        });
    }
    public function testHapusUser(){

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(2))
                  ->visit('/home')
                  ->clickLink('User')
                  ->whenAvailable('.js-confirm', function ($table) {
                       

                              ;
                    })
                  ->with('.table', function ($table) {
                        $table->assertSee(' admin@gmail.com')
                              ->press('Hapus');
                    })
                  ->driver->switchTo()->alert()->accept();
            $first->assertSee('User Berhasil Di Hapus');

                 
        });

    }  
}
