<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Package
 *
 * @property int $id
 * @property int $sender_id
 * @property int $courier_id
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
 * @property int $conversation_id
 * @property string|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereAlternativeContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCourierId($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Package extends Model
{
    //
}
