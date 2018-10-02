<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WalletTransaction
 *
 * @property int $id
 * @property int $wallets_id
 * @property float $balance_change
 * @property int $users_id Transaction created by
 * @property string $transaction_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereBalanceChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereWalletsId($value)
 * @mixin \Eloquent
 */
class WalletTransaction extends Model
{
    //
}
