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
}
