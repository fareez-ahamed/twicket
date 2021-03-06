<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    /**
     * GET /api/user
     *
     * @return void
     */
    public function test_get_user()
    {
        $this->actingAsAhamed()
             ->json('get','/api/user')
             ->seeJson(['name' => 'Ahamed']);
    }

    /**
     * Create a new user
     * POST /api/user
     *
     * @return void
     */
    // public function test_create_user()
    // {
    //     $this->actingAsAhamed()
    //          ->json('post','/api/user',[
    //              'name' => 'John Doe',
    //              'email'=> 'john@gmail.com'
    //          ])->seeJson();
    // }

}
