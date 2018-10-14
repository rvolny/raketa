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
 * @property string $language ISO 639-1
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Conversation[] $conversationsHi
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Conversation[] $conversationsLo
 * @property-read \App\Courier $courier
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Package[] $packagesAsCourier
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Package[] $packagesAsSender
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read \App\Sender $sender
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePicturePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
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
 *     description="User that needs to be added / modified",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/User")
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;

    /**
     * @OA\Property(format="int64")
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
     * @OA\Property(format="email")
     * @var string
     */
    private $email;

    /**
     * @OA\Property(format="timestamp")
     * @var string
     */
    private $email_verified_at;

    /**
     * @OA\Property(format="password")
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
     * @var string
     */
    private $language;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sender()
    {
        return $this->hasOne('App\Sender');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function courier()
    {
        return $this->hasOne('App\Courier');
    }

    /**
     * Get packages where user is sender
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packagesAsSender()
    {
        return $this->hasMany('App\Package', 'user_id_sender');
    }

    /**
     * Get packages where user is courier
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packagesAsCourier()
    {
        return $this->hasMany('App\Package', 'user_id_courier');
    }
}
