<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wallets_id')->unsigned();
            $table->float('balance_change', 8, 2);
            $table->integer('users_id')->unsigned()
                ->comment('Transaction created by');
            $table->enum('transaction_type',
                ['CARD', 'CASH', 'TRANSFER', 'PAYMENT', 'MANUAL']);
            $table->timestamps();

            $table->foreign('wallets_id')->references('id')->on('wallets');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_transactions');
    }
}
