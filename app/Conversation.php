<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Conversation
 *
 * @property int $id
 * @property int $users_id_lo
 * @property int $users_id_hi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUsersIdHi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUsersIdLo($value)
 * @mixin \Eloquent
 */
class Conversation extends Model
{
    //
}
