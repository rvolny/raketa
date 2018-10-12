<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Courier
 *
 * @property int $id
 * @property int $user_id
 * @property int $document_id
 * @property string $agreement_checked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereAgreementCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereUserId($value)
 * @mixin \Eloquent
 * @OA\Schema(
 *     description="Courier model",
 *     title="Courier model",
 *     required={"document", "agreement_checked_at"},
 *     @OA\Xml(
 *         name="Courier"
 *     )
 * )
 * @OA\RequestBody(
 *     request="Courier",
 *     description="Courier that needs to be added / updated",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="application/json",
 *         @OA\Schema(
 *             allOf={
 *                 @OA\Schema(ref="#/components/schemas/Courier"),
 *                 @OA\Schema(
 *                     required={"document"},
 *                     @OA\Property(property="document", ref="#/components/schemas/Document")
 *                 )
 *             }
 *         )
 *     )
 * )
 */
class Courier extends Model
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
    private $user_id;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $document_id;

    /**
     * @OA\Property(format="date-time")
     * @var string
     */
    private $agreement_checked_at;

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
            'user_id',
            'document_id',
            'agreement_checked_at',
        ];
}
