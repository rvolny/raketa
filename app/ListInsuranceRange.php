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
     * @OA\Property()
     * @var integer
     */
    private $id;

    /**
     * @OA\Property()
     * @var string
     */
    private $insurance_range;

    /**
     * @OA\Property()
     * @var datetime
     */
    private $created_at;

    /**
     * @OA\Property()
     * @var datetime
     */
    private $updated_at;

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
