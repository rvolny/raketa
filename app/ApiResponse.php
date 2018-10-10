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
     * @OA\Property(format="int32")
     * @var integer
     */
    private $code;

    /**
     * @OA\Property()
     * @var string
     */
    private $message;

}
