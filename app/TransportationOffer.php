<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TransportationOffer
 *
 * @property int $id
 * @property int $senders_id
 * @property int $couriers_id
 * @property int $packages_id
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereCouriersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer wherePackagesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereSendersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TransportationOffer extends Model
{
    //
}
