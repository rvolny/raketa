<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Package
 *
 * @property int $id
 * @property int $user_id_sender
 * @property int|null $user_id_courier
 * @property string $contents
 * @property string|null $photo_path
 * @property int $list_package_type_id
 * @property string $pickup_location
 * @property string $pickup_date
 * @property string|null $pickup_time
 * @property string|null $pickup_note
 * @property string $delivery_location
 * @property string $delivery_date
 * @property string|null $delivery_time
 * @property string|null $delivery_note
 * @property float $price
 * @property string $currency ISO 4217
 * @property float|null $price_max_increase
 * @property int|null $list_insurance_range_id
 * @property string|null $alternative_contact
 * @property string|null $password
 * @property int|null $conversation_id
 * @property string|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Conversation|null $conversation
 * @property-read \App\User|null $courier
 * @property-read \App\ListInsuranceRange $insuranceRange
 * @property-read \App\ListPackageType $packageType
 * @property-read \App\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereAlternativeContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereListInsuranceRangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereListPackageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePriceMaxIncrease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUserIdCourier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUserIdSender($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="Package model",
 *     title="Package model",
 *     required={"contents", "list_package_type_id", "pickup_location", "pickup_date",
 *         "delivery_location", "delivery_date", "price"},
 *     @OA\Xml(
 *         name="Package"
 *     )
 * )
 * @OA\RequestBody (
 *     request="Package",
 *     description="Package that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/Package")
 * )
 */
class Package extends Model
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
    private $user_id_sender;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $user_id_courier;

    /**
     * @OA\Property()
     * @var string
     */
    private $contents;

    /**
     * @OA\Property()
     * @var string
     */
    private $photo_path;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $list_package_type_id;

    /**
     * @OA\Property()
     * @var string
     */
    private $pickup_location;

    /**
     * @OA\Property(format="date")
     * @var string
     */
    private $pickup_date;

    /**
     * @OA\Property(format="time")
     * @var string
     */
    private $pickup_time;

    /**
     * @OA\Property()
     * @var string
     */
    private $pickup_note;

    /**
     * @OA\Property()
     * @var string
     */
    private $delivery_location;

    /**
     * @OA\Property(format="date")
     * @var string
     */
    private $delivery_date;

    /**
     * @OA\Property(format="time")
     * @var string
     */
    private $delivery_time;

    /**
     * @OA\Property()
     * @var string
     */
    private $delivery_note;

    /**
     * @OA\Property(format="float")
     * @var float
     */
    private $price;

    /**
     * @OA\Property()
     * @var string
     */
    private $currency;

    /**
     * @OA\Property(format="float")
     * @var float
     */
    private $price_max_increase;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $list_insurance_range_id;

    /**
     * @OA\Property()
     * @var string
     */
    private $alternative_contact;

    /**
     * @OA\Property()
     * @var string
     */
    private $password;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $conversation_id;

    /**
     * @OA\Property(format="date-time")
     * @var string
     */
    private $delivered_at;

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
            'user_id_sender',
            'contents',
            'list_package_type_id',
            'pickup_location',
            'pickup_date',
            'pickup_time',
            'pickup_note',
            'delivery_location',
            'delivery_date',
            'delivery_time',
            'delivery_note',
            'price',
            'price_max_increase',
            'list_insurance_range_id',
            'alternative_contact',
            'password',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo('App\User', 'user_id_sender');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courier()
    {
        return $this->belongsTo('App\User', 'user_id_courier');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function packageType()
    {
        return $this->belongsTo('App\ListPackageType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function insuranceRange()
    {
        return $this->belongsTo('App\ListInsuranceRange');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conversation()
    {
        return $this->belongsTo('App\Conversation');
    }
}
