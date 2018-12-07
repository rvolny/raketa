<?php

namespace App\Http\Controllers;

use App\Document;
use App\Sender;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
     * Create new sender
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
        // Validate input parameters
        $this->validate($request, [
            'list_document_type_id' => 'required|integer|exists:list_document_types,id',
            'agreement_checked_at'  => 'required|before_or_equal:now',
            'scan_front'            => 'required|file|mimetypes:image/*,application/pdf',
            'scan_back'             => 'file|mimetypes:image/*,application/pdf',
        ]);

        // Check gate that user can add sender
        if (Gate::allows('sender_access_gate', $userId)) {
            // User is allowed to create sender
            $user = Auth::user();

            // Generate random hashes for file names
            $scanFrontHash = bin2hex(random_bytes(8));
            $scanBackHash = bin2hex(random_bytes(8));

            // Get absolute private path
            // Documents are not directly accessible via web server
            $privatePath = storage_path().Document::PRIVATE_DOCUMENT_PATH.'/';

            // Check front scan
            $scanFrontFile = $request->file('scan_front');
            if ( ! $scanFrontFile->isValid()) {
                return $this->apiResponse(422);
            }

            // Check back scan
            $scanBackFile = null;
            if ($request->hasFile('scan_back')) {
                $scanBackFile = $request->file('scan_back');
                if ( ! $scanBackFile->isValid()) {
                    return $this->apiResponse(422);
                }
            }

            // Prepare front scan filename and path
            $scanFrontOriginalFilename
                = $scanFrontFile->getClientOriginalName();
            $scanFrontFilename = $user->id.'__'.$scanFrontHash.'__'
                .$scanFrontOriginalFilename;
            // TODO check if file doesn't exist yet. If it does, change hash
            $scanFrontRelativePath = Document::PRIVATE_DOCUMENT_PATH.'/'
                .$scanFrontFilename;

            // Prepare back scan filename and path
            $scanBackFilename = null;
            $scanBackRelativePath = null;
            $scanBackOriginalFilename = null;

            if ($scanBackFile) {
                $scanBackOriginalFilename
                    = $scanBackFile->getClientOriginalName();
                $scanBackFilename = $user->id.'__'.$scanBackHash.'__'
                    .$scanBackOriginalFilename;
                // TODO check if file doesn't exist yet. If it does, change hash
                $scanBackRelativePath = Document::PRIVATE_DOCUMENT_PATH.'/'
                    .$scanBackFilename;
            }

            try {
                // Move front scan to private storage
                $scanFrontFile->move($privatePath, $scanFrontFilename);

                // Move back scan to private storage
                if ($scanBackFile) {
                    $scanBackFile->move($privatePath, $scanBackFilename);
                }

                // Begin transaction
                DB::beginTransaction();

                // Create document with file uploads
                $document = Document::create([
                    'list_document_type_id' => $request->get('list_document_type_id'),
                    'scan_front_path'       => $scanFrontRelativePath,
                    'scan_front_filename'   => $scanFrontOriginalFilename,
                    'scan_back_path'        => $scanBackRelativePath,
                    'scan_back_filename'    => $scanBackOriginalFilename,
                ]);

                // Create sender data
                $sender = Sender::create([
                    'user_id'              => $user->id,
                    'document_id'          => $document->id,
                    'agreement_checked_at' => Carbon::parse($request->get('agreement_checked_at'))
                        ->toDateTimeString(),
                ]);

                // Add user role sender
                $user->assignRole('sender');

                // All OK, finish transaction
                DB::commit();

                return response()->json($sender, 201);

            } catch (\Exception $e) {
                // Something went wrong, transaction rollback
                DB::rollBack();

                // Delete residual uploaded files
                unlink($privatePath.$scanFrontFilename);
                if ($scanBackFile) {
                    unlink($privatePath.$scanBackFilename);
                }

                return $this->apiResponse(405);
            }
        } else {
            return $this->apiResponse(403);
        }
    }
}
