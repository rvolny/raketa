<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    const PUBLIC_STORAGE = 'public/packages';
    const PUBLIC_URL_PATH = '/storage/packages/';

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
     * Upload new file
     *
     * @OA\Post(
     *     path="/v1/files",
     *     operationId="uploadFile",
     *     tags={"Files"},
     *     summary="Upload a file",
     *     security={
     *         {"passport": {}},
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/File"},
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(ref="#/components/schemas/File"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=422, description="Unprocessable Entity"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     *
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFile(Request $request)
    {
        // Validate input parameters
        $this->validate($request, [
            'file' => 'required|file|mimetypes:image/*',
        ]);

        $path = $request->file('file')->store(self::PUBLIC_STORAGE);
        $response = ['file_path' => self::PUBLIC_URL_PATH.basename($path)];

        return response()->json($response, 201);
    }

}
