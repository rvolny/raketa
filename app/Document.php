<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Document
 *
 * @property int $id
 * @property int $list_document_type_id
 * @property string $scan_front_path
 * @property string $scan_front_filename
 * @property string|null $scan_back_path
 * @property string|null $scan_back_filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereListDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanBackFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanBackPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanFrontFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanFrontPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="Document model",
 *     title="Document model",
 *     required={"list_document_type_id", "scan_front_path", "scan_front_filename"},
 *     @OA\Xml(
 *         name="Document"
 *     )
 * )
 */
class Document extends Model
{

    const PRIVATE_DOCUMENT_PATH = '/app/private';

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
     * @OA\Property()
     * @var string
     */
    private $scan_front_filename;

    /**
     * @OA\Property()
     * @var string
     */
    private $scan_back_path;

    /**
     * @OA\Property()
     * @var string
     */
    private $scan_back_filename;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts
        = [
            'created_at' => 'datetime:c',
            'updated_at' => 'datetime:c',
        ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'list_document_type_id',
            'scan_front_path',
            'scan_front_filename',
            'scan_back_path',
            'scan_back_filename',
        ];
}
