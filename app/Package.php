<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Package
 *
 * @property int $id
 * @property int $senders_id
 * @property int $couriers_id
 * @property string $contents
 * @property string|null $photo_path
 * @property int $list_package_types_id
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
 * @property int|null $list_insurance_ranges_id
 * @property string|null $alternative_contact
 * @property string|null $password
 * @property int $conversations_id
 * @property string|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereAlternativeContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereConversationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCouriersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereListInsuranceRangesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereListPackageTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePriceMaxIncrease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereSendersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Package extends Model
{
    //
}
