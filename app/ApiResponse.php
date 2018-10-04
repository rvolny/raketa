<?php

namespace App;

/**
 * Class ApiResponse
 *
 * @OA\Schema(
 *     description="Api response",
 *     title="Api response"
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
    private $type;

    /**
     * @OA\Property()
     * @var string
     */
    private $message;

}
