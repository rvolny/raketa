<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Courier
 *
 * @property int $id
 * @property int $users_id
 * @property int $documents_id
 * @property string $agreement_checked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereAgreementCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereDocumentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereUsersId($value)
 * @mixin \Eloquent
 */
class Courier extends Model
{
    //
}
