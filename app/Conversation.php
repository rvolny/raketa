<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Conversation
 *
 * @property int $id
 * @property int $user_id_lo
 * @property int $user_id_hi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Message[] $messages
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUserIdHi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUserIdLo($value)
 * @mixin \Eloquent
 */
class Conversation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'user_id_lo',
            'user_id_hi',
        ];

    /**
     * Get the messages for conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    /**
     * Return existing conversation or create new
     * Lower user id must be always in $user_id_lo
     *
     * @param int $user_id_1
     * @param int $user_id_2
     *
     * @return Conversation|Conversation[]|\Illuminate\Database\Eloquent\Collection|Model|mixed|null|object
     */
    public static function findOrNewConversation(int $user_id_1, int $user_id_2)
    {
        // Conversations always have lower user id in $user_id_lo
        $user_id_lo = $user_id_1;
        $user_id_hi = $user_id_2;

        if ($user_id_1 > $user_id_2) {
            $user_id_lo = $user_id_2;
            $user_id_hi = $user_id_1;
        }

        // Look for existing conversation first
        $conversation = Conversation::find([
            'user_id_lo' => $user_id_lo,
            'user_id_hi' => $user_id_hi,
        ])->first();

        // If conversation doesn't exist, create new
        if ( ! $conversation) {
            $conversation = Conversation::create([
                'user_id_lo' => $user_id_lo,
                'user_id_hi' => $user_id_hi,
            ]);
        }

        return $conversation;
    }
}
