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
     * Get messages for logged in user
     *
     * @OA\Get(
     *     path="/v1/messages",
     *     operationId="getMessages",
     *     tags={"Messages"},
     *     summary="Get logged-in user messages",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Message")
     *         ),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=403, description="Forbidden")
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function getMessages() {

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
    public function createMessage() {

    }
}