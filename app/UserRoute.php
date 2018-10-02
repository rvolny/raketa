<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserRoute
 *
 * @property int $id
 * @property int $couriers_id
 * @property string $destination
 * @property string $recurrence
 * @property int $list_transportation_types_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereCouriersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereListTransportationTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereRecurrence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserRoute extends Model
{
    //
}
