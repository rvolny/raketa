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
     *
     * @OA\Tag(
     *     name="Packages",
     *     description="Operations about packages",
     * )
     */

    /**
     * @OA\Server(
     *     url=L5_SWAGGER_CONST_HOST,
     *     description="L5 Swagger OpenApi dynamic host server"
     * )
     */
}
