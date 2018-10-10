<?php

namespace App\Http\Controllers;

use App\ListTransportationType;

class ListTransportationTypeController extends Controller
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
     * Get list transportation types
     *
     * @OA\Get(
     *     path="/v1/lists/transportation-types",
     *     operationId="getTransportationTypes",
     *     tags={"Lists"},
     *     summary="Get transportation types",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ListTransportationType")
     *         ),
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTransportationTypes()
    {
        return response()->json(ListTransportationType::all());
    }
}