<?php

namespace App\Http\Controllers;

use App\Package;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    const SENDER = 1;
    const COURIER = 2;

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
     * Create new package
     *
     * @OA\Post(
     *     path="/v1/packages",
     *     operationId="createPackage",
     *     tags={"Packages"},
     *     summary="Create new package",
     *     security={
     *         {"passport": {}},
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Package"},
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(ref="#/components/schemas/Package"),
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
    public function createPackage(Request $request)
    {
        // Validate parameters
        $this->validate($request, [
            'contents'                => 'required|string',
            'list_package_type_id'    => 'required|integer|exists:list_package_types,id',
            'pickup_location'         => 'required|string',
            'pickup_date'             => 'required|date|after_or_equal:today',
            'pickup_time'             => 'date_format:H:i',
            'pickup_note'             => 'string',
            'delivery_location'       => 'required|string',
            'delivery_date'           => 'required|date|after_or_equal:today',
            'delivery_time'           => 'date_format:H:i',
            'delivery_note'           => 'string',
            'price'                   => 'required|numeric|min:0',
            'price_max_increase'      => 'numeric|min:0',
            'list_insurance_range_id' => 'required|integer|exists:list_insurance_ranges,id',
            'alternative_contact'     => 'string',
            'password'                => 'string|min:1',
        ]);

        // Create package
        try {
            $package = Package::create([
                'sender_id'               => Auth::user()->sender->id,
                'contents'                => $request->get('contents'),
                'list_package_type_id'    => $request->get('list_package_type_id'),
                'pickup_location'         => $request->get('pickup_location'),
                'pickup_date'             => $request->get('pickup_date'),
                'pickup_time'             => $request->has('pickup_time')
                    ? $request->get('pickup_time') : null,
                'pickup_note'             => $request->has('pickup_note')
                    ? $request->get('pickup_note') : null,
                'delivery_location'       => $request->get('delivery_location'),
                'delivery_date'           => $request->get('delivery_date'),
                'delivery_time'           => $request->has('delivery_time')
                    ? $request->get('delivery_time') : null,
                'delivery_note'           => $request->has('delivery_note')
                    ? $request->get('delivery_note') : null,
                'price'                   => $request->get('price'),
                'price_max_increase'      => $request->has('price_max_increase')
                    ? $request->get('price_max_increase') : null,
                'list_insurance_range_id' => $request->has('list_insurance_range_id')
                    ? $request->get('list_insurance_range_id') : null,
                'alternative_contact'     => $request->has('alternative_contact')
                    ? $request->get('alternative_contact') : null,
                'password'                => $request->has('password')
                    ? $request->get('password') : null,
            ]);

            return response()->json($package, 201);

        } catch (QueryException $e) {
            return $this->apiResponse(500);
        }
    }

    /**
     * Get logged in sender packages
     *
     * @OA\Get(
     *     path="/v1/packages/sender",
     *     operationId="getCurrentSenderPackages",
     *     tags={"Packages"},
     *     summary="Get logged in sender packages",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Package")
     *         ),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=404, description="Not Found"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentSenderPackages()
    {
        return $this->getUserPackages(Auth::user()->id,
            PackageController::SENDER);
    }

    /**
     * Get logged in courier packages
     *
     * @OA\Get(
     *     path="/v1/packages/courier",
     *     operationId="getCurrentCourierPackages",
     *     tags={"Packages"},
     *     summary="Get logged in courier packages",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Package")
     *         ),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=404, description="Not Found"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentCourierPackages()
    {
        return $this->getUserPackages(Auth::user()->id,
            PackageController::COURIER);
    }

    /**
     * @param int $userId
     * @param int $userType
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserPackages($userId, $userType)
    {
        try {
            // Get user
            $user = User::findOrFail($userId);
            $packages = [];

            // Get packages
            if ($userType == PackageController::SENDER) {
                // Get packages where user is sender
                $sender = $user->sender;

                if ($sender) {
                    $packages = $sender->packages;
                }
            } else {
                // Get packages where user is courier
                $courier = $user->courier;

                if ($courier) {
                    $packages = $courier->packages;
                }
            }

            return response()->json($packages);

        } catch (ModelNotFoundException $e) {
            // If user doesn't exist, return not found
            return $this->apiResponse(404);
        } catch (\Exception $e) {
            return $this->apiResponse(500);
        }
    }
}