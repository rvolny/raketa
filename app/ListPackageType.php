<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ListPackageType
 *
 * @property int $id
 * @property string $package_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType wherePackageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="List package type model",
 *     title="List package type model",
 *     required={"package_type"},
 *     @OA\Xml(
 *         name="ListPackageType"
 *     )
 * )
 * @OA\RequestBody (
 *     request="ListPackageType",
 *     description="Package type that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/ListPackageType")
 * )
 */
class ListPackageType extends Model
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
    private $package_type;

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
            'package_type',
        ];
}
