<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sender
 *
 * @property int $id
 * @property int $users_id
 * @property int $documents_id
 * @property string $agreement_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereAgreementDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereDocumentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereUsersId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
class Sender extends Model
{
    //
}
