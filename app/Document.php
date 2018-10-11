<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Document
 *
 * @property int $id
 * @property int $list_document_type_id
 * @property string $scan_front_path
 * @property string|null $scan_back_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereListDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanBackPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanFrontPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="Document model",
 *     title="Document model",
 *     required={"list_document_type_id", "scan_front"},
 *     @OA\Xml(
 *         name="Document"
 *     )
 * )
 * @OA\RequestBody (
 *     request="Document",
 *     description="Document that needs to be added",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(ref="#/components/schemas/Document")
 *     )
 * )
 */
class Document extends Model
{
    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $list_document_type_id;

    /**
     * @OA\Property()
     * @var string
     */
    private $scan_front_path;

    /**
     * @OA\Property(format="binary")
     * @var string
     */
    private $scan_front;

    /**
     * @OA\Property()
     * @var string
     */
    private $scan_back_path;

    /**
     * @OA\Property(format="binary")
     * @var string
     */
    private $scan_back;

    /**
     * @OA\Property(type="string", format="date-time")
     * @var \Illuminate\Support\Carbon
     */
    private $created_at;

    /**
     * @OA\Property(type="string", format="date-time")
     * @var \Illuminate\Support\Carbon
     */
    private $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'list_document_type_id',
            'scan_front_path',
            'scan_back_path',
        ];
}
