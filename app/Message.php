<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @property int $id
 * @property int $conversation_id
 * @property int $user_id_from
 * @property string $message
 * @property string $received_at
 * @property string|null $read_at
 * @property string $ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Conversation $Conversation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUserIdFrom($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="Message model",
 *     title="Message model",
 *     required={"conversation_id", "message"},
 *     @OA\Xml(
 *         name="Message"
 *     )
 * )
 * @OA\RequestBody (
 *     request="Message",
 *     description="Message that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/Message")
 * )
 */
class Message extends Model
{
    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $conversation_id;

    /**
     * @OA\Property(format="int64")
     * @var integer
     */
    private $user_id_from;

    /**
     * @OA\Property()
     * @var string
     */
    private $message;

    /**
     * @OA\Property(format="date-time")
     * @var string
     */
    private $received_at;

    /**
     * @OA\Property(format="date-time")
     * @var string
     */
    private $read_at;

    /**
     * @OA\Property(format="ip")
     * @var string
     */
    private $ip;

    /**
     * @OA\Property(type="string", format="date-time")
     * @var \Illuminate\Support\Carbon
     */
    private $created_at;

    /**
     * @OA\Property(type="string", format="date-time")
     * @var \Illuminate\Support\Carbon
     */
    private $updated_at;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts
        = [
            'received_at' => 'datetime:c',
            'read_at'     => 'datetime:c',
            'created_at'  => 'datetime:c',
            'updated_at'  => 'datetime:c',
        ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'conversation_id',
            'user_id_from',
            'message',
            'received_at',
            'read_at',
            'ip',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'ip',
        ];

    /**
     * Get the conversation that owns message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function Conversation()
    {
        return $this->belongsTo('App\Conversation');
    }
}
