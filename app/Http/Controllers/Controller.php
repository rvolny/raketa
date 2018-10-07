<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @OA\Info(
     *     version="1.0",
     *     title="Gagarin API",
     *     description="API for Gagarin clients",
     *     @OA\Contact(
     *         email="elman22@users.noreply.github.com"
     *     ),
     *     @OA\License(
     *         name="Proprietary",
     *         url="http://www.gagarin.sk"
     *     )
     * )
     */

    /**
     * @OA\Tag(
     *     name="Users",
     *     description="Operations about users",
     * )
     * @OA\Tag(
     *     name="Senders",
     *     description="Operations about senders",
     * )
     * @OA\Tag(
     *     name="Couriers",
     *     description="Operations about couriers",
     * )
     * @OA\Tag(
     *     name="Packages",
     *     description="Operations about packages",
     * )
     * @OA\Tag(
     *     name="Messages",
     *     description="Operations about Messages",
     * )
     * @OA\Tag(
     *     name="Wallets",
     *     description="Operations about Wallets",
     * )
     */

    /**
     * @OA\Server(
     *     url=L5_SWAGGER_CONST_HOST,
     *     description="L5 Swagger OpenApi dynamic host server"
     * )
     */

    /**
     * Return JSON error
     *
     * @link https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
     *
     * @param $code
     * @param null $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiResponse($code, $message = null)
    {
        if ($message == null) {
            $message = 'Generic Error';
        }

        switch ($code) {
            case 400:
                $message = 'Bad Request';
                break;
            case 401:
                $message = 'Unauthorized';
                break;
            case 403:
                $message = 'Forbidden';
                break;
            case 404:
                $message = 'Not Found';
                break;
            case 405:
                $message = 'Method Not Allowed';
                break;
            case 418:
                $message = 'I\'m a teapot';
                break;
            case 500:
                $message = 'Internal Server Error';
                break;
        }

        return response()->json([
            'code'    => $code,
            'message' => $message,
        ],
            $code);
    }
}
