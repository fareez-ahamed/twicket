<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\ApiController;

class UserController extends ApiController
{

    /**
     * Get the current logged in user
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCurrentUser(Request $request)
    {
        return $request->user();
    }

}
