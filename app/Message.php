<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @property int $id
 * @property int|null $users_id_from Null means the message is from system itself
 * @property int $users_id_to
 * @property string $message
 * @property string $received_at
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUsersIdFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUsersIdTo($value)
 * @mixin \Eloquent
 *
 * @OA\Schema(
 *     description="Message model",
 *     title="Message model",
 *     required={"id", "users_id_to", "message"},
 *     @OA\Xml(
 *         name="Message"
 *     )
 * )
 */
class Message extends Model
{
    /**
     * @OA\Property()
     * @var integer
     */
    private $id;

    /**
     * @OA\Property()
     * @var integer
     */
    private $users_id_from;

    /**
     * @OA\Property()
     * @var integer
     */
    private $users_id_to;

    /**
     * @OA\Property()
     * @var string
     */
    private $message;

    /**
     * @OA\Property()
     * @var datetime
     */
    private $received_at;

    /**
     * @OA\Property()
     * @var datetime
     */
    private $read_at;
}
