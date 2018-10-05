<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserRoute
 *
 * @property int $id
 * @property int $courier_id
 * @property string $destination
 * @property string $recurrence
 * @property int $list_transportation_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereCourierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereListTransportationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereRecurrence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserRoute extends Model
{
    //
}
