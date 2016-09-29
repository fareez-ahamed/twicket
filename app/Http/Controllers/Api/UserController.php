<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\User;
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

    /**
     * Create a new user
     */
    public function createUser(Request $req)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|unique'
        ]);

        try
        {
            User::create($req->only('name','email'));

            return $this->respondWithSuccess();
        }
        catch (ValidationException $e)
        {
            return $this->respondWithValidationError($e);
        }
        catch (Exception $e)
        {
            return $this->respondWithError($e);
        }

    }

}
