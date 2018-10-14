<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TransportationOffer
 *
 * @property int $id
 * @property int $user_id_sender
 * @property int|null $user_id_courier
 * @property int $package_id
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereUserIdCourier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereUserIdSender($value)
 * @mixin \Eloquent
 */
class TransportationOffer extends Model
{
    //
}
