<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\ApiController;

class AuthController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['validateToken','getUser']]);
    }

    public function postLogin(Request $req)
    {
        # code...
    }

    public function postRegister(Request $req)
    {
        # code...
    }

    public function getUser(Request $req)
    {
        # code...
    }

    public function validateToken(Request $req)
    {
        # code...
    }

}
