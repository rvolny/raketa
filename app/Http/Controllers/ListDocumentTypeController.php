<?php

namespace App\Http\Controllers;

use App\ListDocumentType;

class ListDocumentTypeController extends Controller
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
     * Get list document types
     *
     * @OA\Get(
     *     path="/v1/lists/document-types",
     *     operationId="getDocumentTypes",
     *     tags={"Lists"},
     *     summary="Get document types",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ListDocumentType")
     *         ),
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDocumentTypes()
    {
        return response()->json(ListDocumentType::all());
    }

}
