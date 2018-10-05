<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Support\Facades\Gate;

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
     *     summary="Get specified conversation",
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
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     *
     * @param int $conversationId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConversation(int $conversationId)
    {
        // Retrieve conversation
        $conversation = Conversation::find($conversationId);

        // If conversation doesn't exist, return not found
        if ( ! $conversation) {
            return $this->apiResponse(404);
        }

        // Check Gate
        if (Gate::allows('conversation_read_gate', $conversation)) {
            // User is allowed to read conversation
            return response()->json($conversation->messages);
        } else {
            return $this->apiResponse(403);
        }
    }
}