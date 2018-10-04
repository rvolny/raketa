<?php

namespace App\Http\Controllers;

class ConversationController extends Controller
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
     *     path="/v1/conversations/{conversation_id}",
     *     operationId="getConversation",
     *     tags={"Messages"},
     *     summary="Get conversation with specified user",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Parameter(
     *         name="conversation_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="integer")
     *     ),
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
    public function getConversation()
    {
        // TODO add Gate to verify access to conversation
    }
}