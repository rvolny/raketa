<?php

namespace App\Http\Controllers;

use App\ListInsuranceRange;

class ListInsuranceRangeController extends Controller
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
     * Get list insurance ranges
     *
     * @OA\Get(
     *     path="/v1/lists/insurance-ranges",
     *     operationId="getInsuranceRanges",
     *     tags={"Lists"},
     *     summary="Get insurance ranges",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ListInsuranceRange")
     *         ),
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getInsuranceRanges()
    {
        return response()->json(ListInsuranceRange::all());
    }
}