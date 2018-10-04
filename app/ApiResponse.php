<?php

namespace App;

/**
 * Class ApiResponse
 *
 * @OA\Schema(
 *     description="Api response model",
 *     title="Api response model"
 * )
 */
class ApiResponse
{
    /**
     * @OA\Property()
     * @var int
     */
    private $code;

    /**
     * @OA\Property()
     * @var string
     */
    private $message;

}
