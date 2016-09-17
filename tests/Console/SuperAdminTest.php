<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Artisan;

class SuperAdminTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_setup_admin_command()
    {
        $email = 'test@email.com';

        $returnCode = Artisan::call('setup:admin',[
            'email' => $email,
            'name'  => 'Tester'
        ]);

        $this->assertEquals($returnCode, 0);

        $this->seeInDatabase('users',[
            'email' => $email
        ]);

    }
}
