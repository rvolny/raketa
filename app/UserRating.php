<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserRating
 *
 * @property int $id
 * @property int $users_id
 * @property int $users_id_rating_from
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereUsersIdRatingFrom($value)
 * @mixin \Eloquent
 */
class UserRating extends Model
{
    //
}
