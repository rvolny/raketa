<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sender
 *
 * @property int $id
 * @property int $user_id
 * @property int $document_id
 * @property string $agreement_checked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereAgreementCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereUserId($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="Sender model",
 *     title="Sender model",
 *     required={"document", "agreement_checked_at"},
 *     @OA\Xml(
 *         name="Sender"
 *     )
 * )
 * @OA\RequestBody (
 *     request="Sender",
 *     description="Sender that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/Sender")
 * )
 */
class Sender extends Model
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
    private $document_id;

    /**
     * @OA\Property(title="document", ref="#/components/schemas/Document")
     * @var integer
     */
    private $document;

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
