<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Satuan;

class LoginTest extends DuskTestCase
{
 


    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'rahasia')
                    ->press('LOGIN')
                    ->assertSee('Toko Dasar');
        });
    }

   


}
