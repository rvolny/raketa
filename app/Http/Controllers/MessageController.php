<?php

namespace App\Http\Controllers;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create new message
     *
     * @OA\Post(
     *     path="/v1/messages",
     *     operationId="createMessage",
     *     tags={"Messages"},
     *     summary="Create new message",
     *     security={
     *         {"passport": {}},
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Message"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=403, description="Forbidden")
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function createMessage()
    {
        // TODO add Gate to verify access to conversation
    }
}