<?php

namespace App\Http\Controllers;

use App\ListPackageType;

class ListPackageTypeController extends Controller
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
     * Get list package types
     *
     * @OA\Get(
     *     path="/v1/lists/package-types",
     *     operationId="getPackageTypes",
     *     tags={"Lists"},
     *     summary="Get package types",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ListPackageType")
     *         ),
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPackageTypes()
    {
        return response()->json(ListPackageType::all());
    }
}