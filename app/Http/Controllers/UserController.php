<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
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
     * Get logged in user info
     *
     * @OA\Get(
     *     path="/v1/me",
     *     operationId="getCurrentUserInfo",
     *     tags={"Users"},
     *     summary="Get logged-in user info",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/User")
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
    public function getCurrentUserInfo()
    {
        return $this->getUserInfo(Auth::user()->id);
    }

    /**
     * Get user info for given userId
     *
     * @param $userId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function getUserInfo($userId)
    {
        try {
            // Retrieve user
            $user = User::findOrFail($userId);

            return response()->json($user);

        } catch (ModelNotFoundException $e) {
            // If user doesn't exist, return not found
            return $this->apiResponse(404);
        }
    }

    /**
     * Update existing user
     *
     * @OA\Patch(
     *     path="/v1/users/{user_id}",
     *     operationId="updateUser",
     *     tags={"Users"},
     *     summary="Update existing user",
     *     security={
     *         {"passport": {}},
     *     },
     *     @OA\Parameter(
     *         name="user_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     requestBody={"$ref": "#/components/requestBodies/User"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Items(ref="#/components/schemas/User")
     *         ),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=404, description="Not Found"),
     *     @OA\Response(response=422, description="Unprocessable Entity"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @param Request $request
     * @param int $userId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request, int $userId)
    {
        // Validate parameters
        $this->validate($request, [
            'name'     => 'string|min:2',
            'surname'  => 'string|min:2',
            'password' => 'string|min:8',
        ]);

        try {
            $user = User::findOrFail($userId);

            // Check Gate
            if (Gate::allows('user_access_gate', $user)) {

                if ($request->has('name')) {
                    $user->name = $request->name;
                }

                if ($request->has('surname')) {
                    $user->surname = $request->surname;
                }

                if ($request->has('password')) {
                    $user->password = bcrypt($request->password);
                }

                $user->save();

                return response()->json($user, 200);
            } else {
                return $this->apiResponse(403);
            }
        } catch (ModelNotFoundException $e) {
            // If user doesn't exist, return not found
            return $this->apiResponse(404);

        }
    }
}