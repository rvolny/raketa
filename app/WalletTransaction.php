<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WalletTransaction
 *
 * @property int $id
 * @property int $wallet_id
 * @property float $balance_change
 * @property int $user_id Transaction created by
 * @property string $transaction_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereBalanceChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereWalletId($value)
 * @mixin \Eloquent
 */
class WalletTransaction extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts
        = [
            'created_at' => 'datetime:c',
            'updated_at' => 'datetime:c',
        ];
}
