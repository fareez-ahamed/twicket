<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Respond in json with the given data and headers.
     *
     * @param  array  $data
     * @param  array  $headers
     * @return \Illuminate\Http\Response
     */
    public function respond($data, $statusCode, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }

    /**
     * Responds with success flag true
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function respondWithSuccess($data = [])
    {
        return $this->respond([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * Responds with validation errors
     * @param  [type] $error [description]
     * @return [type]        [description]
     */
    public function respondWithError($error, $statusCode)
    {
        $errors = is_string($errors) ? [$errors] : $errors->getErrors()->all();

        return $this->respond([
            'success' => false,
            'errors'  => $errors
        ], $statusCode);
    }

    /**
     * Responds with validation errors
     * @param  [type] $error [description]
     * @return [type]        [description]
     */
    public function respondWithValidationError($error)
    {
        return $this->respondWithError($error, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Responds an internal server error
     * @param  string $errors [description]
     * @return [type]         [description]
     */
    public function respondInternalError($errors = "An unknown error occured, try sometime later.")
    {
        return $this->respondWithError($error, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

}
