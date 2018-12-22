<?php

namespace App;

/**
 * App\File
 *
 * @OA\Schema (
 *     description="File model",
 *     title="File model",
 *     required={"file"},
 *     @OA\Xml(
 *         name="File",
 *     )
 * )
 * @OA\RequestBody (
 *     request="File",
 *     description="File that needs to be uploaded",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(
 *             required={"file"},
 *             @OA\Property(property="file", format="binary", description="File")
 *         )
 *     )
 * )
 */
class File
{
    /**
     * @OA\Property()
     * @var string
     */
    private $file_path;
}
