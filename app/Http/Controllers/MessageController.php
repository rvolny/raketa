<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(ref="#/components/schemas/Message"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=422, description="Unprocessable Entity"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMessage(Request $request)
    {
        // Validate parameters
        $this->validate($request, [
            'conversation_id' => 'required|integer',
            'message'         => 'required|string',
        ]);

        // Retrieve conversation
        $conversation = Conversation::find($request->get('conversation_id'));

        // If conversation doesn't exist, return not found
        if ( ! $conversation) {
            return $this->apiResponse(404);
        }

        // Check Gate
        if (Gate::allows('conversation_access_gate', $conversation)) {
            // User is allowed to create message in conversation
            try {
                $message = Message::create([
                    'conversation_id' => $request->get('conversation_id'),
                    'user_id_from'    => Auth::user()->id,
                    'message'         => $request->get('message'),
                    'received_at'     => now(),
                    'read_at'         => null,
                    'ip'              => $request->ip(),
                ]);

                return response()->json($message, 201);

            } catch (QueryException $e) {
                return $this->apiResponse(500);
            }
        } else {
            return $this->apiResponse(403);
        }
    }
}
