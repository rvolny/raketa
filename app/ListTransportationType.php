<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ListTransportationType
 *
 * @property int $id
 * @property string $transportation_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereTransportationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="List transportation type model",
 *     title="List transportation type model",
 *     required={"transportation_type"},
 *     @OA\Xml(
 *         name="ListTransportationType"
 *     )
 * )
 * @OA\RequestBody (
 *     request="ListTransportationType",
 *     description="Transportation type that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/ListTransportationType")
 * )
 */
class ListTransportationType extends Model
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
    private $transportation_type;

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
            'transportation_type',
        ];
}
