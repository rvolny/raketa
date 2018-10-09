<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserPublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Create new user
     *
     * @OA\Post(
     *     path="/v1/users",
     *     operationId="createUser",
     *     tags={"Users"},
     *     summary="Create new user",
     *     requestBody={"$ref": "#/components/requestBodies/User"},
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(ref="#/components/schemas/User"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=422, description="Unprocessable Entity"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        // Validate parameters
        $this->validate($request, [
            'name'     => 'required|min:2',
            'surname'  => 'required|min:2',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        // Create user
        try {
            $user = User::create([
                'name'     => $request->get('name'),
                'surname'  => $request->get('surname'),
                'email'    => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'language' => 'sk',
            ]);

            return response()->json($user, 201);

        } catch (QueryException $e) {
            return $this->apiResponse(500);
        }
    }
}