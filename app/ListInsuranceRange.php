<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ListInsuranceRange
 *
 * @property int $id
 * @property string $insurance_range
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereInsuranceRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereUpdatedAt($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="List insurance range model",
 *     title="List insurance range model",
 *     required={"insurance_range"},
 *     @OA\Xml(
 *         name="ListInsuranceRange"
 *     )
 * )
 * @OA\RequestBody (
 *     request="ListInsuranceRange",
 *     description="Insurance range that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/ListInsuranceRange")
 * )
 */
class ListInsuranceRange extends Model
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
    private $insurance_range;

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
            'insurance_range',
        ];
}
