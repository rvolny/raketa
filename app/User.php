<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $picture_path
 * @property int|null $sender_id
 * @property int|null $courier_id
 * @property int|null $wallet_id
 * @property string $language ISO 639-1
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Conversation[] $conversationsHi
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Conversation[] $conversationsLo
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCourierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePicturePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWalletId($value)
 * @mixin \Eloquent
 * @OA\Schema (
 *     description="User model",
 *     title="User model",
 *     required={"name", "surname", "email", "password"},
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 * @OA\RequestBody (
 *     request="User",
 *     description="User that needs to be added",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/User")
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;

    /**
     * @OA\Property()
     * @var integer
     */
    private $id;

    /**
     * @OA\Property()
     * @var string
     */
    private $name;

    /**
     * @OA\Property()
     * @var string
     */
    private $surname;

    /**
     * @OA\Property()
     * @var string
     */
    private $email;

    /**
     * @OA\Property()
     * @var datetime
     */
    private $email_verified_at;

    /**
     * @OA\Property()
     * @var string
     */
    private $password;

    /**
     * @OA\Property()
     * @var string
     */
    private $picture_path;

    /**
     * @OA\Property()
     * @var integer
     */
    private $sender_id;

    /**
     * @OA\Property()
     * @var integer
     */
    private $courier_id;

    /**
     * @OA\Property()
     * @var integer
     */
    private $wallet_id;

    /**
     * @OA\Property()
     * @var string
     */
    private $language;

    /**
     * @OA\Property()
     * @var datetime
     */
    private $created_at;

    /**
     * @OA\Property()
     * @var datetime
     */
    private $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name',
            'surname',
            'email',
            'password',
            'language',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password',
            'remember_token',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversationsLo()
    {
        return $this->hasMany('App\Conversation', 'user_id_lo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversationsHi()
    {
        return $this->hasMany('App\Conversation', 'user_id_hi');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function conversations()
    {
        return collect([$this->conversationsLo(), $this->conversationsHi()]);
    }
}
