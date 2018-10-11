<?php

namespace App\Http\Controllers;

use App\Document;
use App\Sender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SenderController extends Controller
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
     *     path="/v1/users/{user_id}/sender",
     *     operationId="createSender",
     *     tags={"Senders"},
     *     summary="Create sender for a user",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Parameter(
     *         name="user_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     requestBody={"$ref": "#/components/requestBodies/Sender"},
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(ref="#/components/schemas/Sender"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=405, description="Method Not Allowed"),
     *     @OA\Response(response=422, description="Unprocessable Entity"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @param Request $request
     * @param int $userId
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSender(Request $request, int $userId)
    {
        // TODO Finish file uploads

        // Validate input parameters
        $this->validate($request, [
            'document.list_document_type_id' => 'required|integer|exists:list_document_types,id',
            // 'scan_front'                     => 'required|file',
            // 'scan_back'                      => 'file',
            'agreement_checked_at'           => 'required|before_or_equal:now',
        ]);

        // Check gate that user can add sender
        if (Gate::allows('sender_access_gate', $userId)) {
            // User is allowed to create sender
            try {
                // TODO Save uploaded files

                $postedDocument = $request->get('document');
                $user = Auth::user();

                // Begin transaction
                DB::beginTransaction();

                // Create document with file uploads
                $document = Document::create([
                    'list_document_type_id' => $postedDocument['list_document_type_id'],
                    'scan_front_path'       => '__TODO__dummy_path',
                    'scan_back_path'        => '__TODO__dummy_path',
                ]);

                // Create sender data
                $sender = Sender::create([
                    'user_id'              => $user->id,
                    'document_id'          => $document->id,
                    'agreement_checked_at' => $request->get('agreement_checked_at'),
                ]);

                // Add user role sender
                $user->assignRole('sender');

                // All OK, finish transaction
                DB::commit();

                return response()->json($sender, 201);

            } catch (\Exception $e) {
                // Something went wrong, transaction rollback
                DB::rollBack();

                // TODO: delete uploads

                return $this->apiResponse(405);
            }
        } else {
            return $this->apiResponse(403);
        }
    }
}