<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ListDocumentType
 *
 * @property int $id
 * @property string $document_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="List document type model",
 *     title="List document type model",
 *     required={"document_type"},
 *     @OA\Xml(
 *         name="ListDocumentType"
 *     )
 * )
 * @OA\RequestBody (
 *     request="ListDocumentType",
 *     description="Document type that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/ListDocumentType")
 * )
 */
class ListDocumentType extends Model
{
    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $id;

    /**
     * @OA\Property()
     * @var string
     */
    private $document_type;

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
            'document_type',
        ];
}
